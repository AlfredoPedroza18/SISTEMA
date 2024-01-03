<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\MasterEsePlantilla;
use DB;

class PlantillaGenericaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla", "READONLY",
        array(
            "IdPlantilla" => '-1'
            )
        );

        return view("ESE.plantillaG.plantillagenericaindex",["plantillas"=>$Plantilla]);

    }

    public function ValidacionPG(Request $request)
    {
        $datos=$request->input('datos');
        $res='';
        $rl='';
        $entr='';
        $query = DB::select("Select master_ese_agrupador.IdAgrupador,master_ese_agrupador.Etiqueta, master_ese_agrupador.IdContenedor From master_ese_agrupador inner join master_ese_contenedor ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
        where master_ese_agrupador.IdContenedor = $datos");

        foreach ($query as $opt) {
            $res=$res."<option value='".$opt->IdAgrupador."' >".$opt->Etiqueta."</option>";
        }

        $queryL = DB::select("Select master_ese_entrada.IdEntrada,master_ese_entrada.Etiqueta, master_ese_entrada.IdAgrupador
        From master_ese_entrada
        inner join master_ese_agrupador ON master_ese_agrupador.IdAgrupador = master_ese_entrada.IdAgrupador
        inner join master_ese_contenedor ON master_ese_contenedor.IdContenedor = master_ese_agrupador.IdContenedor
        where master_ese_agrupador.IdContenedor = $datos");

        foreach ($queryL as $optL) {
            $rl=$rl."<option value='".$optL->IdEntrada."' >".$optL->Etiqueta."</option>";
        }

        $queryOrd = DB::select("Select master_ese_entrada.IdEntrada,master_ese_entrada.Etiqueta, master_ese_entrada.IdAgrupador
        From master_ese_entrada
        inner join master_ese_agrupador ON master_ese_agrupador.IdAgrupador = master_ese_entrada.IdAgrupador
        inner join master_ese_contenedor ON master_ese_contenedor.IdContenedor = master_ese_agrupador.IdContenedor
        where master_ese_agrupador.IdContenedor = $datos limit 1");

        foreach ($queryOrd as $optL) {
            $entr=$optL->IdEntrada;
        }

        $query_max=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $entr");
        foreach ($query_max as $c) {
            $MaxO = $c->MOrden;
        }
            $Orden= $MaxO+1;

        // var_dump($res);
        return array($res, $rl,$entr);

    }

    public function ValidacionPC(Request $request)
    {
        $datos=$request->input('datos');
        $agr=$request->input('agr');
        $rl='';
        $queryL = DB::select("Select master_ese_entrada.IdEntrada,master_ese_entrada.Etiqueta, master_ese_entrada.IdAgrupador
        From master_ese_entrada
        inner join master_ese_agrupador ON master_ese_agrupador.IdAgrupador = master_ese_entrada.IdAgrupador
        inner join master_ese_contenedor ON master_ese_contenedor.IdContenedor = master_ese_agrupador.IdContenedor
        where master_ese_agrupador.IdAgrupador = $datos");

        foreach ($queryL as $optL) {
            $rl=$rl."<option value='".$optL->IdEntrada."' >".$optL->Etiqueta."</option>";
        }

        $queryOrd = DB::select("Select master_ese_entrada.IdEntrada,master_ese_entrada.Etiqueta, master_ese_entrada.IdAgrupador
        From master_ese_entrada
        inner join master_ese_agrupador ON master_ese_agrupador.IdAgrupador = master_ese_entrada.IdAgrupador
        inner join master_ese_contenedor ON master_ese_contenedor.IdContenedor = master_ese_agrupador.IdContenedor
        where master_ese_agrupador.IdAgrupador = $datos limit 1");

        foreach ($queryOrd as $optL) {
            $entr=$optL->IdEntrada;
        }

        $query_max=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $entr");
        foreach ($query_max as $c) {
            $MaxO = $c->MOrden;
        }
            $Orden= $MaxO+1;


        return array($rl,$Orden);
    }

    public function ValidacionPOrd(Request $request)
    {
        $datos=$request->input('datos');

        $query_max=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $datos");
        foreach ($query_max as $c) {
            $MaxO = $c->MOrden;
        }
            $Orden= $MaxO+1;
        return array($Orden);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",
        array(
            "IdPlantillaEntrada" => '0',
            "IdPlantilla" => '0'
        )
    );
    $v="0";

    $campos=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mee.Clasificacion,
    IF(
     mee.Clasificacion<>'N/A',
     CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Clasificacion, ' - ', mee.Etiqueta),
     CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Etiqueta)
    )Campo

    FROM master_ese_entrada mee
    inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador
    inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor
    ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");

    // $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');
    $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');

    $tipos=DB::select('SELECT * FROM master_ese_tipos');

    return view("ESE.plantillaG.plantillagenerica",["pentrada"=>$Plantilla, "campos"=>$campos, "servicios"=>$ts, "tipos"=>$tipos, "VaIn"=>$v, "OrdenC"=>null]);
    }

    public function GuardarPlantilla(Request $request)
    {
        $ts = $request->ts;
        $dp = $request->DescripcionPlantilla;
        $Tiposervicios = $request->Tiposervicios;
        // dd($dp);
        $plantilla       = new MasterEsePlantilla();


        $plantilla->IdTipoServicio          = $ts;
        $plantilla->DescripcionPlantilla    = $dp;
        $plantilla->IdTipos                 = $Tiposervicios;
        $plantilla->save();

        $idp= $plantilla->IdPlantilla;
        $v= "1";

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",
            array(
                "IdPlantillaEntrada" => '-1',
                "IdPlantilla" => $idp
            )
        );

        $campos=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mee.Clasificacion,
        IF(
         mee.Clasificacion<>'N/A',
         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Clasificacion, ' - ', mee.Etiqueta),
         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Etiqueta)
        )Campo

       FROM master_ese_entrada mee
      inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador
      inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor
      ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");

    //     $campos 	  = DB::select( $cam );



        // $campos=DB::select('SELECT Etiqueta FROM master_ese_entrada');
        $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');

        $tipos=DB::select('SELECT * FROM master_ese_tipos');

        // return view("ESE.plantillaG.plantillagenerica",["pentrada"=>$Plantilla, "contenedor"=>$c, "servicios"=>$ts , "IdPlantilla"=>$idp, "VaIn"=>$v, "OrdenC"=>null]);
        return view("ESE.plantillaG.plantillagenerica",["pentrada"=>$Plantilla,"campos"=>$campos, "servicios"=>$ts, "tipos"=>$tipos, "IdPlantilla"=>$idp, "VaIn"=>$v, "OrdenC"=>null]);

    }

    public function GuardarEntradaPlantilla(Request $request)
    {
        $IdCampo=$request->input('IdCampo');
        $ids = explode(':', $IdCampo);
        $IdContenedor=$ids[0];
        $IdAgrupador=$ids[1];
        $IdEntrada=$ids[2];
        $Clasificacion=$ids[3];

        // $IdEntrada = $request->campo;
        $IdPlantilla = $request->IdPlantilla;

        $query_max=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $IdEntrada");
        foreach ($query_max as $c) {
            $MaxO = $c->MOrden;
        }
        $Orden= $MaxO+1;

        $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",
            array(
                "IdEntrada" => $IdEntrada,
                "IdPlantilla" => $IdPlantilla,
                "Orden" => $Orden
                )
        );


        $v= "1";

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",
            array(
                "IdPlantillaEntrada" => '-1',
                "IdPlantilla" => $IdPlantilla
            )
        );

        $campos=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mee.Clasificacion,
        IF(
         mee.Clasificacion<>'N/A',
         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Clasificacion, ' - ', mee.Etiqueta),
         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Etiqueta)
        )Campo

       FROM master_ese_entrada mee
      inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador
      inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor
      ORDER BY mee.IdEntrada=$IdEntrada DESC, mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");

        // $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');
        $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');

        $tipos=DB::select('SELECT * FROM master_ese_tipos');

        // return view("ESE.plantillaG.plantillagenerica",["pentrada"=>$Plantilla, "contenedor"=>$c, "servicios"=>$ts , "IdPlantilla"=>$IdPlantilla, "VaIn"=>$v]);
        return view("ESE.plantillaG.plantillagenerica",["pentrada"=>$Plantilla, "campos"=>$campos, "servicios"=>$ts, "tipos"=>$tipos, "IdPlantilla"=>$IdPlantilla, "VaIn"=>$v]);

    }

    public function UpdatePlantilla(Request $request)
    {
        $ts = $request->input('arr');
        $a=count($ts);
        for($i = 0; $i < $a; $i++){
            $ck = $ts[$i];
            $i++;
            $IdPlantillaEntrada = $ts[$i];
            $i++;
            $Grupo = $ts[$i];
            $i++;
            $Subgrupo = $ts[$i];
            $i++;
            $Clasificacion = $ts[$i];
            $i++;
            $Campo = $ts[$i];
            $i++;
            $Requerido = $ts[$i];
            if ($Requerido=='true') {
                $Requerido=1;
            }else{
                $Requerido=0;
            }
            $i++;
            $VFr = $ts[$i];

            if ($VFr=='true') {
                $VFr=1;
            }else{
                $VFr=0;
            }
            $i++;
            $VRep = $ts[$i];
            if ($VRep=='true') {
                $VRep=1;
            }else{
                $VRep=0;
            }
            $i++;
            $VGrd = $ts[$i];
            if ($VGrd=='true') {
                $VGrd=1;
            }else{
                $VGrd=0;
            }
            $i++;
            $TemE = $ts[$i];
            if ($TemE=='true') {
                $TemE=1;
            }else{
                $TemE=0;
            }



            $guardarCambios=DB::table('master_ese_plantilla_entrada')
            ->where("IdPlantillaEntrada",$IdPlantillaEntrada)
            ->update([
                "Requerido" => $Requerido,
                "VisibleReportes" => $VFr,
                "VisibleForms" => $VRep,
                "VisibleGrids" => $VGrd,
                "TempUsrEdita" => $TemE

            ]);

        }

        // return redirect('/PlantillaGenerica')
        //         ->with(['success' => ' El registro se guardo con éxito',
        //             'type'    => 'success']);
        return response()->json(['status_alta' => 'success']);

    }

    public function DeletePlantilla(Request $request)
    {
        $id=$request->input('datos');
        $ts = $request->input('arr');
        $a=count($ts);
        for($i = 0; $i < $a; $i++){
            $ck = $ts[$i];
            $i++;
            $IdPlantillaEntrada = $ts[$i];
            $i++;
            $Grupo = $ts[$i];
            $i++;
            $Subgrupo = $ts[$i];
            $i++;
            $Clasificacion = $ts[$i];
            $i++;
            $Campo = $ts[$i];
            $i++;
            $Requerido = $ts[$i];
            if ($Requerido=='true') {
                $Requerido=1;
            }else{
                $Requerido=0;
            }
            $i++;
            $VFr = $ts[$i];

            if ($VFr=='true') {
                $VFr=1;
            }else{
                $VFr=0;
            }
            $i++;
            $VRep = $ts[$i];
            if ($VRep=='true') {
                $VRep=1;
            }else{
                $VRep=0;
            }
            $i++;
            $VGrd = $ts[$i];
            if ($VGrd=='true') {
                $VGrd=1;
            }else{
                $VGrd=0;
            }
            $i++;
            $TemE = $ts[$i];
            if ($TemE=='true') {
                $TemE=1;
            }else{
                $TemE=0;
            }


              DB::table('master_ese_plantilla_entrada')->where('IdPlantillaEntrada', '=', $IdPlantillaEntrada)->delete();

        }



        return response()->json($id);

    }

    public function PlantillaR($id)
    {


        // $IdPlantilla = $request->IdPlantilla;
        // dd($id);
        $v= "1";

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",
            array(
                "IdPlantillaEntrada" => '-1',
                "IdPlantilla" => $id
            )
        );

        // $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');

        $campos=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mee.Clasificacion,
        IF(
         mee.Clasificacion<>'N/A',
         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Clasificacion, ' - ', mee.Etiqueta),
         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Etiqueta)
        )Campo

       FROM master_ese_entrada mee
      inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador
      inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor
      ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");

        $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');

        $tipos=DB::select('SELECT * FROM master_ese_tipos');

        return view("ESE.plantillaG.plantillagenerica",["pentrada"=>$Plantilla, "campos"=>$campos, "servicios"=>$ts, "tipos"=>$tipos, "IdPlantilla"=>$id, "VaIn"=>$v]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $v= "1";

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",
            array(
                "IdPlantillaEntrada" => '-1',
                "IdPlantilla" => $id
            )
        );

        // $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');

        $campos=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mee.Clasificacion,
        IF(
         mee.Clasificacion<>'N/A',
         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Clasificacion, ' - ', mee.Etiqueta),
         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Etiqueta)
        )Campo

        FROM master_ese_entrada mee
        inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador
        inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor
        ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");

        $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');

        $tipos=DB::select('SELECT * FROM master_ese_tipos');

        return view("ESE.plantillaG.plantillagenerica",["pentrada"=>$Plantilla, "campos"=>$campos, "servicios"=>$ts, "tipos"=>$tipos, "IdPlantilla"=>$id, "VaIn"=>$v]);

        // foreach ($TipoServicio as  $ts) {
        //     $IdTipoServicio=$ts->IdTipoServicio;
        //     $Descripcion=$ts->Descripcion;

        // }

        //       return view("ESE.catalogos.tiposservicioedit")
        //       ->with('IdTipoServicio', $IdTipoServicio)
        //       ->with('Descripcion', $Descripcion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //     $UpdateTipoServicio=MasterConsultas::exeSQLStatement("update_catalogo_tiposservicio", "UPDATE",
    //     array(
    //         "Descripcion" => $request->input('Descripcion'),
    //         "IdTipoServicio" => $id
    //     )
    // );


    // return redirect('/CatalogoTiposServicio')
    // ->with(['success' =>  $request->input('Descripcion') . ' se actualizó con éxito',
    //     'type'    => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_cliente WHERE IdPlantilla =$id) as Exst");
        foreach ($queryEXST as $p) {
            $Exst=$p->Exst;
        }
        if(($Exst==0) ){
            $DeletePlantilla=MasterConsultas::exeSQLStatement("delete_plantilla_entrada", "UPDATE",
                array(
                    "id" => $id
                )
            );
            return redirect('/PlantillaGenerica')
                ->with(['success' => ' El registro se eliminó con éxito',
                    'type'    => 'success']);
		}else{
            return redirect('/PlantillaGenerica')
                ->with(['success' => ' No se puede eliminar. Existe una Plantilla Cliente Asociada.',
                    'type'    => 'success']);
        }


    }
}

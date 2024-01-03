<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class CamposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Campos = MasterConsultas::exeSQL("master_ese_entrada", "READONLY",
            array(
                "IdEntrada" => '-1'
            )
        );

        // $c=DB::select('SELECT IdAgrupador,Etiqueta FROM master_ese_agrupador');
        $c=DB::select('SELECT ma.IdAgrupador,
        Concat(mc.Etiqueta, " / ", ma.Etiqueta) as Etiqueta,
        mc.Orden as OC, ma.Orden as OA
        FROM master_ese_agrupador ma
        INNER JOIN master_ese_contenedor as mc ON mc.IdContenedor = ma.IdContenedor
        ORDER BY mc.Orden, ma.Orden');
        $f=DB::select('SELECT DISTINCT(Formato) FROM master_ese_entrada');

        return view("ESE.catalogos.camposindex",["campos"=>$Campos, "agrupador"=>$c, "ordencampoCC"=>null, "formatos"=>$f]);
    }

    public function Filtro(Request $request)
    {
        $cod = $request->input('valcnt');
        if ($cod == ''){
            return redirect('/Campos')
            ->with(['success' => ' Se debe seleccionar un Agrupador',
                'type'    => 'success']);

        }else{
            // $queryS=DB::select('SELECT IdAgrupador,Etiqueta FROM master_ese_agrupador');
            $queryS=DB::select('SELECT ma.IdAgrupador,
            Concat(mc.Etiqueta, " / ", ma.Etiqueta) as Etiqueta,
            mc.Orden as OC, ma.Orden as OA
            FROM master_ese_agrupador ma
            INNER JOIN master_ese_contenedor as mc ON mc.IdContenedor = ma.IdContenedor
            ORDER BY mc.Orden, ma.Orden');

            $queryB='SELECT IdEntrada, Etiqueta,
            Clasificacion,Orden,Formato,Longitud,CampoNombre,Dimensiones,Items,CampoNombre,
            (select ma.Etiqueta from master_ese_agrupador as ma where ma.IdAgrupador= master_ese_entrada.IdAgrupador) as Agrupador
            FROM master_ese_entrada WHERE master_ese_entrada.IdAgrupador = ?
            order by master_ese_entrada.Clasificacion,master_ese_entrada.Orden asc';

            $bem=DB::select($queryB,[$cod]);

            // $query_max=DB::select("Select max(Orden) as MOrden from master_ese_entrada where IdAgrupador = $cod");
            // foreach ($query_max as $c) {
            //     $MaxO = $c->MOrden;
            // }
            //     $Orden= $MaxO+1;
            // $query_max=DB::select("SELECT * From master_ese_entrada where IdAgrupador = $cod and Clasificacion='{$clas}'");
            // $MaxO = count($query_max);
            // $Orden= $MaxO+1;

                $f=DB::select('SELECT DISTINCT(Formato) FROM master_ese_entrada');

            // return view("ESE.catalogos.camposxagrupadores",['campos'=>$bem,'agrupador'=>$queryS,'cntC'=>$cod, 'ordencampoCC'=>$Orden, "formatos"=>$f]);
            return view("ESE.catalogos.camposxagrupadores",['campos'=>$bem,'agrupador'=>$queryS,'cntC'=>$cod, 'ordencampoCC'=>null, "formatos"=>$f]);
        }

    }

    public function reacomodar(Request $request){

      MasterConsultas::exeSQL("master_ese_opdate_pisicion", "Update",
          array(
              "IdEntrada" => $request->input('Id'),
              "Orden" => $request->input('Valor')
          )
      );

      MasterConsultas::exeSQL("master_ese_opdate_pisicion", "Update",
          array(
              "IdEntrada" => $request->input('IdDes'),
              "Orden" => $request->input('ValorDes')
          )
      );
        // echo $request->input('Id').' '.$request->input('Valor').' '.$request->input('IdDes').' '.$request->input('ValorDes');
    }
    public function FiltroOrden($id,$clas)
    {
        // $query_max=DB::select("Select max(Orden) as MOrden from master_ese_entrada where IdAgrupador = $id");
        // foreach ($query_max as $c) {
        //     $MaxO = $c->MOrden;
        // }
        //     $Orden= $MaxO+1;

        $query_max=DB::select("SELECT * From master_ese_entrada where IdAgrupador = $id and Clasificacion='{$clas}'");
        $MaxO = count($query_max);
        $Orden= $MaxO+1;

        return array($Orden);
    }

    public function ValidacionCampN(Request $request)
    {
        $datos=$request->input('datos');
        $res='';

        $query = DB::select("select count(*) as cont from master_ese_entrada where CampoNombre = '{$datos}'");

        foreach ($query as $g) {
            $res = $g->cont;
          }

           return $res;
    }

    public function ValidacionCampNEdit(Request $request)
    {
        $datoOrig=$request->input('datoOrig');
        $datos=$request->input('datos');
        $res='';

        $query = DB::select("select count(*) as cont from master_ese_entrada where CampoNombre = '{$datos}' and CampoNombre not in ('{$datoOrig}')");

        foreach ($query as $g) {
            $res = $g->cont;
          }

           return $res;
    }

    public function ActualizarC(Request $request)
    {
        $id = $request->IdEntrada;
        $etq = $request->nombrecampo;
         $clasifc = $request->clasificacioncampo;
        $f = $request->formE;
        $lc = $request->longitudcampo;
        $cn = $request->camponombre;
        $ca = $request->cantidadapariciones;
        $dc = $request->dimensionescampo;
        $ic = $request->itemscampo;

        $NombreCampoOrig = $request->NombreCampoOrig;
        $res='';
        $query = DB::select("select count(*) as cont from master_ese_entrada where CampoNombre = '{$cn}' and CampoNombre not in ('{$NombreCampoOrig}')");

        foreach ($query as $g) {
            $res = $g->cont;
        }

        if ($res==0){

            $UpdateCampo=MasterConsultas::exeSQLStatement("update_catalogo_entrada", "UPDATE",
                        array(
                            // "Clasificacion" => $clasifc,
                            "Etiqueta" => $etq,
                            "Formato" => $f,
                            "Longitud" => $lc,
                            "Dimensiones" => $dc,
                            "Items" => $ic,
                            "CampoNombre" => $cn,
                            "CantidadApariciones" => $ca,
                            "IdEntrada" => $id
                        )
                    );

                return redirect('/Campos')
                ->with(['success' =>  ' El registro se actualizó con éxito',
                    'type'    => 'success']);
        }else{
             return redirect('/Campos');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }



    public function GCampo(Request $request)
    {

        $etq = $request->nombrecampoC;

        $oc = $request->ordencampoCC;
        $agr = $request->cntC;
        $clas = $request->clasificacioncampoC;
        $frm = $request->formC;
        $lng = $request->longitudcampoC;
        $camponombre = $request->camponombreC;
        $ca = $request->cantidadaparicionesC;
        $dimen = $request->dimensionescampoC;
        $itm = $request->itemscampoC;
        // dd($cnt);
        if ($agr == ''){
            return redirect('/Campos')
            ->with(['success' => ' Se debe seleccionar un Agrupador',
                'type'    => 'success']);

        }else{
            $oc=1;
            $res='';
            $query = DB::select("select count(*) as cont from master_ese_entrada where CampoNombre = '{$camponombre}'");

        foreach ($query as $g) {
            $res = $g->cont;
          }

          $sql = DB::select("select (Orden+1) as orden from master_ese_entrada where Clasificacion = '{$clas}' and IdAgrupador = $agr order by Orden desc limit 1");

      foreach ($sql as $g) {
          $oc = $g->orden;
          echo $oc;
        }

            if ($res==0){
                $AltaCampos=MasterConsultas::exeSQLStatement("create_catalogo_entrada", "UPDATE",
                array(
                    "Etiqueta" => $etq,
                    "Orden" => $oc,
                    "Clasificacion" => $clas,
                    "Formato" => $frm,
                    "Longitud" => $lng,
                    "CampoNombre" => $camponombre,
                    "CantidadApariciones" => $ca,
                    "Dimensiones" => $dimen,
                    "Items" => $itm,
                    "IdAgrupador" => $agr
                    )
                );


                // $queryS=DB::select('SELECT IdAgrupador,Etiqueta FROM master_ese_agrupador');
                $queryS=DB::select('SELECT ma.IdAgrupador,
                Concat(mc.Etiqueta, " / ", ma.Etiqueta) as Etiqueta,
                mc.Orden as OC, ma.Orden as OA
                FROM master_ese_agrupador ma
                INNER JOIN master_ese_contenedor as mc ON mc.IdContenedor = ma.IdContenedor
                ORDER BY mc.Orden, ma.Orden');

                $queryB='SELECT IdEntrada, Etiqueta,
                Clasificacion,Orden,Formato,Longitud,CampoNombre,Dimensiones,Items,CampoNombre,
                (select ma.Etiqueta from master_ese_agrupador as ma where ma.IdAgrupador= master_ese_entrada.IdAgrupador) as Agrupador
                FROM master_ese_entrada WHERE master_ese_entrada.IdAgrupador = ?
                order by master_ese_entrada.Clasificacion,master_ese_entrada.Orden asc';
                $bem=DB::select($queryB,[$agr]);

                // $query_max=DB::select("Select max(Orden) as MOrden from master_ese_entrada where IdAgrupador = $agr and Clasificacion='{$clas}'");
                // foreach ($query_max as $c) {
                //     $MaxO = $c->MOrden;
                // }
                // $Orden= $MaxO+1;
                $query_max=DB::select("SELECT * From master_ese_entrada where IdAgrupador = $agr and Clasificacion='{$clas}'");
                // foreach ($query_max as $c) {
                    $MaxO = count($query_max);
                // }
                $Orden= $MaxO+1;

                $f=DB::select('SELECT DISTINCT(Formato) FROM master_ese_entrada');
                // return redirect('/CamposxAgrupadores')
                // ->with(['success' => ' Se debe seleccionar un Agrupador',
                //     'type'    => 'success']);

                return view("ESE.catalogos.camposxagrupadores",['campos'=>$bem,'agrupador'=>$queryS,'ordencampoCC'=>$Orden, 'cntC'=>$agr, "formatos"=>$f]);
            }else{
                $queryS=DB::select('SELECT ma.IdAgrupador,
                Concat(mc.Etiqueta, " / ", ma.Etiqueta) as Etiqueta,
                mc.Orden as OC, ma.Orden as OA
                FROM master_ese_agrupador ma
                INNER JOIN master_ese_contenedor as mc ON mc.IdContenedor = ma.IdContenedor
                ORDER BY mc.Orden, ma.Orden');

                $queryB='SELECT IdEntrada, Etiqueta,
                Clasificacion,Orden,Formato,Longitud,CampoNombre,Dimensiones,Items,CampoNombre,
                (select ma.Etiqueta from master_ese_agrupador as ma where ma.IdAgrupador= master_ese_entrada.IdAgrupador) as Agrupador
                FROM master_ese_entrada WHERE master_ese_entrada.IdAgrupador = ?
                order by master_ese_entrada.Clasificacion,master_ese_entrada.Orden asc';
                $bem=DB::select($queryB,[$agr]);

                $f=DB::select('SELECT DISTINCT(Formato) FROM master_ese_entrada');
                return view("ESE.catalogos.camposxagrupadores",['campos'=>$bem,'cntC'=>$agr,'agrupador'=>$queryS,'ordencampoCC'=>null,"formatos"=>$f]);
            }

        }



    }

    public function ActualizarCampxA(Request $request)
    {
        $cod = $request->cnt;
        // dd($cod);
        $id = $request->IdEntrada;
        $etq = $request->nombrecampo;
        $clasifc = $request->clasificacioncampo;
        $f = $request->formE;
        $lc = $request->longitudcampo;
        $cn = $request->camponombre;
        $ca = $request->cantidadapariciones;
        $dc = $request->dimensionescampo;
        $ic = $request->itemscampo;

        $NombreCampoOrig = $request->NombreCampoOrig;
        $res='';
        $query = DB::select("select count(*) as cont from master_ese_entrada where CampoNombre = '{$cn}' and CampoNombre not in ('{$NombreCampoOrig}')");

        foreach ($query as $g) {
            $res = $g->cont;
        }

        if ($res==0){
            $UpdateCampo=MasterConsultas::exeSQLStatement("update_catalogo_entrada", "UPDATE",
            array(
                // "Clasificacion" => $clasifc,
                "Etiqueta" => $etq,
                "Formato" => $f,
                "Longitud" => $lc,
                "Dimensiones" => $dc,
                "Items" => $ic,
                "CampoNombre" => $cn,
                "CantidadApariciones" => $ca,
                "IdEntrada" => $id
                )
            );

            if($clasifc != 'N/A'){
              MasterConsultas::exeSQLStatement("update_entrada_cantidades", "UPDATE",
                          array(
                               "Clasificacion" => $clasifc,
                               "CantidadApariciones" => $ca
                          )
                      );
            }


            $queryS=DB::select('SELECT ma.IdAgrupador,
            Concat(mc.Etiqueta, " / ", ma.Etiqueta) as Etiqueta,
            mc.Orden as OC, ma.Orden as OA
            FROM master_ese_agrupador ma
            INNER JOIN master_ese_contenedor as mc ON mc.IdContenedor = ma.IdContenedor
            ORDER BY mc.Orden, ma.Orden');

        $queryB='SELECT IdEntrada, Etiqueta,
        Clasificacion,Orden,Formato,Longitud,CampoNombre,Dimensiones,Items,CampoNombre,
        (select ma.Etiqueta from master_ese_agrupador as ma where ma.IdAgrupador= master_ese_entrada.IdAgrupador) as Agrupador
        FROM master_ese_entrada WHERE master_ese_entrada.IdAgrupador = ?
        order by master_ese_entrada.Clasificacion,master_ese_entrada.Orden asc';
            $bem=DB::select($queryB,[$cod]);

                $f=DB::select('SELECT DISTINCT(Formato) FROM master_ese_entrada');

            return view("ESE.catalogos.camposxagrupadores",['campos'=>$bem,'agrupador'=>$queryS,'cnt'=>$cod,'cntC'=>$cod, 'ordencampoCC'=>null, "formatos"=>$f]);
        }else{
            $queryS=DB::select('SELECT ma.IdAgrupador,
            Concat(mc.Etiqueta, " / ", ma.Etiqueta) as Etiqueta,
            mc.Orden as OC, ma.Orden as OA
            FROM master_ese_agrupador ma
            INNER JOIN master_ese_contenedor as mc ON mc.IdContenedor = ma.IdContenedor
            ORDER BY mc.Orden, ma.Orden');

            $queryB='SELECT IdEntrada, Etiqueta,
            Clasificacion,Orden,Formato,Longitud,CampoNombre,Dimensiones,Items,CampoNombre,
            (select ma.Etiqueta from master_ese_agrupador as ma where ma.IdAgrupador= master_ese_entrada.IdAgrupador) as Agrupador
            FROM master_ese_entrada WHERE master_ese_entrada.IdAgrupador = ?
            order by master_ese_entrada.Clasificacion,master_ese_entrada.Orden asc';
                $bem=DB::select($queryB,[$cod]);

                    $f=DB::select('SELECT DISTINCT(Formato) FROM master_ese_entrada');

                return view("ESE.catalogos.camposxagrupadores",['campos'=>$bem,'agrupador'=>$queryS,'cnt'=>$cod,'cntC'=>$cod, 'ordencampoCC'=>null, "formatos"=>$f]);

        }

    }

    public function GuardarCampo(Request $request)
    {
        $etq = $request->nombrecampoC;
        $oc = $request->ordencampoCC;
        $agr = $request->cntC;
        $clas = $request->clasificacioncampoC;
        $frm = $request->formC;
        $lng = $request->longitudcampoC;
        $camponombre = $request->camponombreC;
        $ca = $request->cantidadaparicionesC;
        $dimen = $request->dimensionescampoC;
        $itm = $request->itemscampoC;
        // $a=$request->all();
        // dd($camponombre);
        $oc=1;
        $res='';
            $query = DB::select("select count(*) as cont from master_ese_entrada where CampoNombre = '{$camponombre}'");

        foreach ($query as $g) {
            $res = $g->cont;
          }

          $sql = DB::select("select (Orden+1) as orden from master_ese_entrada where Clasificacion = '{$clas}' and IdAgrupador = $agr order by Orden desc limit 1");

      foreach ($sql as $g) {
          $oc = $g->orden;
        }

        if ($res==0){
            $AltaCampos=MasterConsultas::exeSQLStatement("create_catalogo_entrada", "UPDATE",
                array(
                    "Etiqueta" => $etq,
                    "Orden" => $oc,
                    "Clasificacion" => $clas,
                    "Formato" => $frm,
                    "Longitud" => $lng,
                    "CampoNombre" => $camponombre,
                    "CantidadApariciones" => $ca,
                    "Dimensiones" => $dimen,
                    "Items" => $itm,
                    "IdAgrupador" => $agr
                    )
            );

            return redirect('/Campos')
                ->with(['success' =>  ' El registro se agregó con éxito',
                    'type'    => 'success']);

        }else{
            return redirect('/Campos');
        }

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
        //
    }

    public function editarC($id)
    {


          $Campo = MasterConsultas::exeSQL("master_ese_entrada", "READONLY",
        array(
            "IdEntrada" => $id

        )
        );


        foreach ($Campo as  $agr) {
            $IdEntrada=$agr->IdEntrada;
            $Etiqueta=$agr->Etiqueta;
            $Orden=$agr->Orden;
            $IdAgrupador=$agr->IdAgrupador;
            $Clasificacion=$agr->Clasificacion;
            $Formato=$agr->Formato;
            $Longitud=$agr->Longitud;
            $CampoNombre=$agr->CampoNombre;
            $CantidadApariciones=$agr->CantidadApariciones;
            $Dimensiones=$agr->Dimensiones;
            $Items=$agr->Items;


        }
        $res='';
        $res2='';

        $c=DB::select("SELECT IdAgrupador,Etiqueta FROM master_ese_agrupador ORDER BY IdAgrupador = $IdAgrupador DESC");

        foreach ($c as $opt) {
            $res=$res."<option value='".$opt->IdAgrupador."' >".$opt->Etiqueta."</option>";
          }

          $f=DB::select("SELECT DISTINCT(Formato) FROM master_ese_entrada ORDER BY Formato = '{$Formato}' DESC");

          foreach ($f as $opt) {
              $res2=$res2."<option value='".$opt->Formato."' >".$opt->Formato."</option>";
            }
            // return array($Formato);
        return array($res,$res2,$Etiqueta,$Orden,$IdEntrada,$Clasificacion,$Longitud,$CampoNombre,$CantidadApariciones,$Dimensiones,$Items);

    }

    public function editarAxCamp($id)
    {
        $Campo = MasterConsultas::exeSQL("master_ese_entrada", "READONLY",
        array(
            "IdEntrada" => $id

        )
        );


        foreach ($Campo as  $agr) {
            $IdEntrada=$agr->IdEntrada;
            $Etiqueta=$agr->Etiqueta;
            $Orden=$agr->Orden;
            $IdAgrupador=$agr->IdAgrupador;
            $Clasificacion=$agr->Clasificacion;
            $Formato=$agr->Formato;
            $Longitud=$agr->Longitud;
            $CampoNombre=$agr->CampoNombre;
            $CantidadApariciones=$agr->CantidadApariciones;
            $Dimensiones=$agr->Dimensiones;
            $Items=$agr->Items;


        }
        $res='';
        // $c=DB::select("SELECT IdAgrupador,Etiqueta FROM master_ese_agrupador ORDER BY IdAgrupador = $IdAgrupador DESC");

        $f=DB::select("SELECT DISTINCT(Formato) FROM master_ese_entrada ORDER BY Formato = '{$Formato}' DESC");

        foreach ($f as $opt) {
            $res=$res."<option value='".$opt->Formato."' >".$opt->Formato."</option>";
          }

          return array($IdAgrupador,$res,$Etiqueta,$Orden,$IdEntrada,$Clasificacion,$Longitud,$CampoNombre,$CantidadApariciones,$Dimensiones,$Items);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

          $sql="select count(*) as c from master_ese_agrupador where IdAgrupador =
            (select e.IdAgrupador from master_ese_entrada as e where e.IdEntrada = {$id} )";

          $dato=DB::select($sql);

          $valor=0;
            foreach ($dato as $g) {
              $valor = $g->c;
            }
            if($valor==0){
              $DeleteSubgrupo=MasterConsultas::exeSQLStatement("delete_catalogo_entrada", "UPDATE",
              array(
                  "IdEntrada" => $id
              )
              );
              return redirect('/Campos')
                      ->with(['success' => ' El registro se eliminó con éxito',
                          'type'    => 'success']);
            }else{

            return redirect('/Campos')
                    ->with(['success' => ' El registro no se puede eliminar por que se utiliza en otra interfaz',
                        'type'    => 'danger']);
            }




    }
}

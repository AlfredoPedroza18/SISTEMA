<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\MasterEsePlantillaCliente;
use DB;

class AsignacionPlantillaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_cliente", "READONLY",
        array(
            "IdPlantillaCliente" => '-1',
            "Activo" => 'Si'
            )
        );

        return view("ESE.plantillaC.plantillaclienteindex",["plantillas"=>$Plantilla]);
    }

    public function indexPC($idc)
    {
        $cod = $idc;
        // dd($cod);
        $clientes=DB::select("SELECT c.id as IdCliente, c.nombre_comercial AS Nombre FROM clientes c ORDER BY c.id = $cod DESC");

        $queryB='Select p.*, e.nombre_comercial as Cliente, mp.DescripcionPlantilla as Plantilla,
        (select Descripcion from master_ese_tiposervicio as sp where sp.IdTipoServicio = mp.IdTipoServicio) as Servicio,
        (select Tipos from master_ese_tipos as sp where sp.IdTipos = mp.IdTipos) as TipoServicio
        From master_ese_plantilla_cliente as p
        Inner Join master_ese_plantilla mp ON mp.IdPlantilla = p.IdPlantilla
        Inner Join clientes e on e.id = p.IdCliente
        Where p.IdCliente = :IdCliente and p.Activo="Si"';

        $plantillas=DB::select($queryB,[$cod]);

        return view("ESE.NuevaOS.plantillasxcliente",['plantillas'=>$plantillas,'clientes'=>$clientes,'cntC'=>$cod]);
    }

    public function ValidacionPG(Request $request)
    {
        $datos=$request->input('datos');
        $res='';
        $rl='';
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
        // var_dump($res);
        return array($res, $rl);

    }

    public function ValidacionPC(Request $request)
    {
        $datos=$request->input('datos');
        $rl='';
        $queryL = DB::select("Select master_ese_entrada.IdEntrada,master_ese_entrada.Etiqueta, master_ese_entrada.IdAgrupador
        From master_ese_entrada
        inner join master_ese_agrupador ON master_ese_agrupador.IdAgrupador = master_ese_entrada.IdAgrupador
        inner join master_ese_contenedor ON master_ese_contenedor.IdContenedor = master_ese_agrupador.IdContenedor
        where master_ese_agrupador.IdAgrupador = $datos");

        foreach ($queryL as $optL) {
            $rl=$rl."<option value='".$optL->IdEntrada."' >".$optL->Etiqueta."</option>";
        }
        return array($rl);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_cliente_entrada", "READONLY",
        array(
            "IdPlantillaClienteEntrada" => '0',
            "Activo" => 'Si',
            "IdPlantillaCliente" => '0'
        )
    );
    $v="0";
    $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');
    $clientes=DB::select('SELECT c.id as IdCliente, c.nombre_comercial AS Nombre FROM clientes c');
    $servicios=DB::select('SELECT IdTipoServicio,Descripcion as Servicio FROM master_ese_tiposervicio');

    $tipos=DB::select('SELECT * FROM master_ese_tipos');
    // $cl=[''=>'Seleccione un Cliente'];
    // $clientes=DB::select('SELECT IdCliente,Nombre FROM master_clientes');
    //     foreach($clientes as $clientes){
    //         $cl[$clientes->IdCliente]=$clientes->Nombre;
    //     }
    $plantillas=DB::select('SELECT IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla');

    return view("ESE.plantillaC.plantillacliente",["pentrada"=>$Plantilla, "contenedor"=>$c, "servicios"=>$servicios, "tipos"=>$tipos, "clientes"=>$clientes, "plantillas"=>$plantillas , "VaIn"=>$v, "id"=>0]);
    }


    public function createpc($idc)
    {
        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_cliente_entrada", "READONLY",
            array(
                "IdPlantillaClienteEntrada" => '0',
                "Activo" => 'Si',
                "IdPlantillaCliente" => '0'
            )
        );
        $v="0";
        $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');

        $clientes=DB::select("SELECT c.id as IdCliente, c.nombre_comercial AS Nombre FROM clientes c where c.id=$idc");
    //     $cl=[];
    //    $clientes=DB::select("SELECT IdCliente,Nombre FROM master_clientes ORDER BY IdCliente=$idc DESC");
    //     foreach($clientes as $clientes){
    //         $cl[$clientes->IdCliente]=$clientes->Nombre;
    //     }
        $servicios=DB::select('SELECT IdTipoServicio,Descripcion as Servicio FROM master_ese_tiposervicio');
        $plantillas=DB::select('SELECT IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla');

    $tipos=DB::select('SELECT * FROM master_ese_tipos');

        return view("ESE.plantillaC.plantillacliente",["pentrada"=>$Plantilla, "contenedor"=>$c, "servicios"=>$servicios, "tipos" =>$tipos, "clientes"=>$clientes, "plantillas"=>$plantillas , "VaIn"=>$v, "id"=>$idc]);
    }


    public function FPlantillas($ids, $idTipo)
    {
        $rl="<option value=''>Seleccione una Plantilla</option>";
        $plantillas=DB::select("Select IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla WHERE IdTipoServicio = $ids and IdTipos = $idTipo");

        foreach ($plantillas as $optL) {
            $rl=$rl."<option value='".$optL->IdPlantilla."' >".$optL->DescripcionPlantilla."</option>";
        }

        return array($rl);
    }


    public function GuardarPlantilla(Request $request)
    {
        // $ct = $request->ct;
        // $ct = $request->input('ct');
        $cts = json_encode($request->input('ct'));
        
        $ct = array_map('intval', json_decode($cts, true));
        // $pl = $request->pl;
        $pl = $request->input('pl');
        // dd($dp);
       
        // $opt = explode(',', $ct);
        // $idpc=array();
        $idpcc=array();
        for ($x = 0; $x < count($ct); $x++) {
           
            
            $plantilla       = new MasterEsePlantillaCliente();


            $plantilla->IdPlantilla        = $pl;
            $plantilla->IdCliente          = $ct[$x];
            $plantilla->save(); 
   
            $idp= $plantilla->IdPlantilla;
            $idpc= $plantilla->IdPlantillaCliente;
             $idpcc[]=[$idpc];
             $idpcu=$idpc;
           $this->GuardarEntradaPlantilla($idp,$idpc);
      
            

        } 
        return array($idpcu,$cts,$idpcc);
    //    return response()->json($idpcc);
        // $idp= $plantilla->IdPlantillaCliente;
        // $v= "1";

        // $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_cliente_entrada", "READONLY",
        //     array(
        //         "IdPlantillaClienteEntrada" => '-1',
        //         "IdPlantillaCliente" => $idp
        //     )
        // );

        // $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');
        // $clientes=DB::select('SELECT IdCliente,Nombre FROM master_clientes');
        // $plantillas=DB::select('SELECT IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla');
        // return view("ESE.plantillaC.plantillacliente",["pentrada"=>$Plantilla, "contenedor"=>$c, "clientes"=>$clientes, "plantillas"=>$plantillas , "IdPlantillaCliente"=>$idp, "VaIn"=>$v]);
        // return view("ESE.plantillaG.plantillagenerica",["pentrada"=>$Plantilla, "contenedor"=>$c, "servicios"=>$ts , "IdPlantilla"=>$idp, "VaIn"=>$v]);

    }

    public function GuardarEntradaPlantilla($idp,$idpc)
    {
        $sql='';
        $i=1;
        $queryL = DB::select("select * from master_ese_plantilla_entrada
        where IdPlantilla= $idp");
        // $c=count($queryL);

            foreach($queryL as $name){

                $IdPlantillaEntrada = $name->IdPlantillaEntrada;
                $IdEntrada          = $name->IdEntrada;
                $IdPlantilla        = $name->IdPlantilla;
                $Requerido          = $name->Requerido;
                $VisibleReportes    = $name->VisibleReportes;
                $VisibleForms       = $name->VisibleForms;
                $VisibleGrids       = $name->VisibleGrids;
                $VisibleOSClientes  = $name->VisibleOSClientes;
                $TempUsrEdita       = $name->TempUsrEdita;
                $Orden              = $name->Orden;
                $Indice              = $name->Indice;
                $Presencial         = $name->Presencial;
                $Telefonico         = $name->Telefonico;
                if(count($queryL) == $i){
                  $sql.=" ($IdEntrada,$idpc,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$Indice, $Presencial, $Telefonico)";
                }else{
                    $sql.=" ($IdEntrada,$idpc,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$Indice, $Presencial, $Telefonico),";
                }

                $i++;

        }

        DB::insert("INSERT INTO master_ese_plantilla_cliente_entrada (IdEntrada,IdPlantillaCliente,Requerido,VisibleReportes,VisibleForms,VisibleGrids,VisibleOSClientes,TempUsrEdita,Orden,Indice,Presencial,Telefonico) VALUES $sql");

        // return response()->json($idpc);
    }

    public function GuardarEntradaPlantillaEdit($idp,$idpc)
    {

        $queryL = DB::select("select * from master_ese_plantilla_entrada
        where IdPlantilla= $idp");

        // $c=count($queryL);

        foreach($queryL as $name){

            $IdPlantillaEntrada = $name->IdPlantillaEntrada;
            $IdEntrada          = $name->IdEntrada;
            $IdPlantilla        = $name->IdPlantilla;
            $Requerido          = $name->Requerido;
            $VisibleReportes    = $name->VisibleReportes;
            $VisibleForms       = $name->VisibleForms;
            $VisibleGrids       = $name->VisibleGrids;
            $TempUsrEdita       = $name->TempUsrEdita;
            $Orden              = $name->Orden;
            $Indice              = $name->Indice;
            if(count($queryL) == $i){
              $sql.=" ($IdEntrada,$idpc,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$TempUsrEdita,$Orden,$Indice)";
            }else{
                $sql.=" ($IdEntrada,$idpc,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$TempUsrEdita,$Orden,$Indice),";
            }

            $i++;

    }

    DB::insert("INSERT INTO master_ese_plantilla_cliente_entrada (IdEntrada,IdPlantillaCliente,Requerido,VisibleReportes,VisibleForms,VisibleGrids,TempUsrEdita,Orden,Indice) VALUES $sql");


        // return redirect('/PlantillaCliente')
        //         ->with(['success' => ' El registro se agregó con éxito',
        //             'type'    => 'success']);

        $v= "1";

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_cliente_entrada", "READONLY",
            array(
                "IdPlantillaClienteEntrada" => '-1',
                "Activo" => 'Si',
                "IdPlantillaCliente" => $idpc
            )
        );

        foreach ($Plantilla as $opt) {
            $Descripcion=$opt->DescripcionPlantilla;
           }

        $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');
        $clientes=DB::select('SELECT c.id as IdCliente, c.nombre_comercial AS Nombre FROM clientes c');
        $plantillas=DB::select('SELECT IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla');

        return view("ESE.plantillaC.plantillace",["pentrada"=>$Plantilla, "contenedor"=>$c, "clientes"=>$clientes, "plantillas"=>$plantillas , "VaIn"=>$v, "Descripcion"=>$Descripcion]);

    }


    public function UpdatePlantilla(Request $request)
    {
        $idsEntradas=array();
        $IdPlantillaClienteA=array();
        // $Idserv = $request->input('Idserv');
        $plantillasclientes = $request->input('plantillasclientes');
        $opt = array_map('intval', explode(',', $plantillasclientes));
        // $ts = $request->input('arr');
        // $opt = explode(',', $integerIDs);
        for ($x = 0; $x < count($opt); $x++) {
            $ts = $request->input('arr');
            // $a=count($ts);
            for($i = 0; $i < count($ts); $i++){
                $ck = $ts[$i];
                $i++;
                $IdPlantillaClienteEntrada = $ts[$i];
                $i++;
                $Grupo = $ts[$i];
                $i++;
                $Subgrupo = $ts[$i];
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
                $VSolc = $ts[$i];
                if ($VSolc=='true') {
                    $VSolc=1;
                }else{
                    $VSolc=0;
                }
                $i++;
                $presencial = $ts[$i];
                if ($presencial=='true') {
                    $presencial=1;
                }else{
                    $presencial=0;
                }
    
                $i++;
                $telefonico = $ts[$i];
                if ($telefonico=='true') {
                    $telefonico=1;
                }else{
                    $telefonico=0;
                }
                $i++;
                $TemE = $ts[$i];
                if ($TemE=='true') {
                    $TemE=1;
                }else{
                    $TemE=0;
                }
    
                $IdPlantillaClienteA=$opt[$x];
            //     $datosentrada=DB::select("select e.IdEntrada, e.Etiqueta from master_ese_plantilla_cliente as pc
            //     inner join master_ese_plantilla as p on p.IdPlantilla = pc.IdPlantilla
            //     Inner join master_ese_plantilla_entrada as pe on pe.IdPlantilla = p.IdPlantilla
            //     Inner join master_ese_entrada as e on e.IdEntrada = pe.IdEntrada
            //    where IdPlantillaCliente='{$IdPlantillaClienteA}' and e.Etiqueta='{$Campo}'");
            $datosentrada=DB::select("select mepce.IdEntrada, e.Etiqueta from master_ese_plantilla_cliente AS pc
                                    INNER JOIN master_ese_plantilla_cliente_entrada mepce ON pc.IdPlantillaCliente = mepce.IdPlantillaCliente
                                    Inner join master_ese_entrada as e on e.IdEntrada = mepce.IdEntrada
                                    WHERE pc.IdPlantillaCliente='{$IdPlantillaClienteA}' 
                                    AND mepce.IdPlantillaClienteEntrada = {$IdPlantillaClienteEntrada}");
        
                foreach ($datosentrada as $de) {
                    $IdEntradaP = $de->IdEntrada;
                    // $Etiqueta = $de->Etiqueta;
                   
                }
                 $idsEntradas[]=[$IdPlantillaClienteA];
                // $guardarCambios=DB::table('master_ese_plantilla_cliente_entrada')
                // ->where("IdPlantillaClienteEntrada",$IdPlantillaClienteEntrada)
                // ->update([
                //     "Requerido" => $Requerido,
                //     "VisibleReportes" => $VFr,
                //     "VisibleForms" => $VRep,
                //     "VisibleGrids" => $VGrd,
                //     "VisibleOSClientes" => $VSolc,
                //     "TempUsrEdita" => $TemE
    
                // ]);
                
                DB::update("update master_ese_plantilla_cliente_entrada set Requerido='{$Requerido}', 
                VisibleReportes='{$VRep}',
                VisibleForms='{$VFr}',
                VisibleGrids='{$VGrd}',
                VisibleOSClientes='{$VSolc}',
                TempUsrEdita='{$TemE}',
                Presencial='{$presencial}',
                Telefonico='{$telefonico}'  
                where  IdEntrada='{$IdEntradaP}' and IdPlantillaCliente='{$IdPlantillaClienteA}'");
    
                // $datosservicios=DB::select("select GROUP_CONCAT(se.IdServicioEse) as Servicios from master_ese_srv_servicio se where se.IdPlantillaCliente='{$IdPlantillaClienteA}'");
                // foreach ($datosservicios as $ds) {
                //     $IdsServicios = $ds->Servicios;
                   
                // }
                // if($IdsServicios!=null){
                //     $optS = explode(',', $IdsServicios);
                //     for ($s = 0; $s < count($optS); $s++) {
                //         $IdServicioS=$optS[$s];
                //         DB::update("update master_ese_srv_entrada set Requerido='{$Requerido}', VisibleReportes='{$VRep}',VisibleForms='{$VFr}',VisibleGrids='{$VGrd}',VisibleOSClientes='{$VSolc}',TempUsrEdita='{$TemE}' where  IdEntrada='{$IdEntradaP}' and IdServicioEse='{$IdServicioS}'");
                //     }
                // }
                
                $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_srv_servicio WHERE IdPlantillaCliente='{$IdPlantillaClienteA}' ) as Exst");

                foreach ($queryEXST as $p) {
                    $Exst=$p->Exst;

                }

                if(($Exst==1) ){
                    $datosPCS=DB::select("select pc.IdPlantilla, pc.IdCliente from master_ese_srv_servicio se Inner Join master_ese_plantilla_cliente pc on pc.IdPlantillaCliente = se.IdPlantillaCliente where se.IdPlantillaCliente='{$IdPlantillaClienteA}'");
                    foreach ($datosPCS as $dpcls) {
                        $IdPlantillaPCS = $dpcls->IdPlantilla;
                        $IdClientePCS = $dpcls->IdCliente;
                       
                    }
    
                    $IdsPCS=DB::select("select GROUP_CONCAT(DISTINCT(pc.IdPlantillaCliente)) as PlantillasClientes from master_ese_plantilla_cliente pc where pc.IdPlantilla='{$IdPlantillaPCS}' and pc.IdCliente='{$IdClientePCS}'");
                    foreach ($IdsPCS as $idsPC) {
                        $PlantillaPCLS = $idsPC->PlantillasClientes;
                       
                    }
    
                    if($PlantillaPCLS!=null){
                        $optPCLS = explode(',', $PlantillaPCLS);
                        for ($pcss = 0; $pcss < count($optPCLS); $pcss++) {
                            $IdPlantillaCCS=$optPCLS[$pcss];
                            $datosservicios=DB::select("select GROUP_CONCAT(se.IdServicioEse) as Servicios,pc.IdPlantilla, pc.IdCliente from master_ese_srv_servicio se Inner Join master_ese_plantilla_cliente pc on pc.IdPlantillaCliente = se.IdPlantillaCliente where se.IdPlantillaCliente='{$IdPlantillaCCS}'");
                            foreach ($datosservicios as $ds) {
                                $IdsServicios = $ds->Servicios;
                               
                            }
    
                            if($IdsServicios!=null){
                                $optS = explode(',', $IdsServicios);
                                for ($s = 0; $s < count($optS); $s++) {
                                    $IdsServicios=$optS[$s];
                                    DB::update("update master_ese_srv_entrada set Requerido='{$Requerido}', 
                                    VisibleReportes='{$VRep}',
                                    VisibleForms='{$VFr}',
                                    VisibleGrids='{$VGrd}',
                                    VisibleOSClientes='{$VSolc}',
                                    TempUsrEdita='{$TemE}',
                                    Presencial='{$presencial}',
                                    Telefonico='{$telefonico}' 
                                    where  IdEntrada='{$IdEntradaP}' and IdServicioEse='{$IdsServicios}'");
                                }
                            }
                        }
                    }
                }

            }
        } 
        return array($idsEntradas);
        // return response()->json(['status_alta' => 'success']);


        // // return redirect('/PlantillaGenerica')
        // //         ->with(['success' => ' El registro se guardo con éxito',
        // //             'type'    => 'success']);
        // return response()->json(['status_alta' => 'success']);

    }

    public function DeletePlantilla(Request $request)
    {
        $id=$request->input('datos');
        $ts = $request->input('arr');
        $a=count($ts);
        for($i = 0; $i < $a; $i++){
            $ck = $ts[$i];
            $i++;
            $IdPlantillaClienteEntrada = $ts[$i];
            $i++;
            $Grupo = $ts[$i];
            $i++;
            $Subgrupo = $ts[$i];
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

            $UpdatePlantillaG=MasterConsultas::exeSQLStatement("update_plantilla_cliente_entradas", "UPDATE",
                    array(
                        "IdPlantillaClienteEntrada" => $IdPlantillaClienteEntrada
                    )
                );


            //   DB::table('master_ese_plantilla_cliente_entrada')->where('IdPlantillaClienteEntrada', '=', $IdPlantillaClienteEntrada)->delete();

        }



        return response()->json($id);

    }

    public function ReasignarPlantilla(Request $request)
    {
        $id=$request->input('datos');
        $queryL = DB::select("select * from master_ese_plantilla_cliente
        where IdPlantillaCliente= $id and Activo='Si'");

        foreach ($queryL as $p) {
            $IdPlantilla=$p->IdPlantilla;
        }

        $queryPGE = DB::select("select *,
        (SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_cliente_entrada WHERE IdEntrada =mepe.IdEntrada and IdPlantillaCliente=$id and Indice= mepe.Indice) as Exst ) 
        from master_ese_plantilla_entrada mepe
        where IdPlantilla= $IdPlantilla and
        (SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_cliente_entrada WHERE IdEntrada =mepe.IdEntrada and IdPlantillaCliente=$id and Indice= mepe.Indice) as Exst ) = 0");
  
        $CountRow=count($queryPGE);

        $sql="";
        $row=0;
        foreach($queryPGE as $field){
            $IdPlantillaEntrada = $field->IdPlantillaEntrada;
            $IdEntradaPG        = $field->IdEntrada;
            $IdPlantilla        = $field->IdPlantilla;
            $Requerido          = $field->Requerido;
            $VisibleReportes    = $field->VisibleReportes;
            $VisibleForms       = $field->VisibleForms;
            $VisibleGrids       = $field->VisibleGrids;
            $VisibleOSClientes  = $field->VisibleOSClientes;
            $TempUsrEdita       = $field->TempUsrEdita;
            $Orden              = $field->Orden;
            $Indice             = $field->Indice;
            $presencial         = $field->Presencial;
            $telefonico         = $field->Telefonico;
            if ($row == 0){
                $sql.=" ($IdEntradaPG,$id,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$Indice,$presencial,$telefonico)";
            }else if($row == $CountRow-1){
                $sql.=", ($IdEntradaPG,$id,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$Indice,$presencial,$telefonico);";
            }
            else{
                $sql.=", ($IdEntradaPG,$id,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$Indice,$presencial,$telefonico)";
            }
            $row++;
 
        }  
        if($CountRow > 0){
            DB::insert("INSERT INTO master_ese_plantilla_cliente_entrada (IdEntrada,IdPlantillaCliente,Requerido,VisibleReportes,VisibleForms,VisibleGrids,VisibleOSClientes,TempUsrEdita,Orden,Indice,Presencial,Telefonico) VALUES $sql");
        }  
        
        //SEGMENTO UPDATE CAMPO EN SRV 

        $queryPCServ = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_srv_servicio WHERE IdPlantillaCliente=$id ) as ExstPC");
        foreach ($queryPCServ as $pcs) {
            $ExstPC=$pcs->ExstPC;
        }

        if($ExstPC==1){
            $queryServEntr = DB::select("SELECT * FROM master_ese_plantilla_cliente_entrada mepe WHERE NOT EXISTS (SELECT NULL FROM master_ese_srv_entrada mse WHERE mse.IdEntrada = mepe.IdEntrada) and mepe.IdPlantillaCliente=$id and mepe.Activo = 'Si'");
            $CountRowServ=count($queryServEntr);
            $sqlServ="";
            $rowServ=0;
            $ttttt=0;

            $queryServ = DB::select("select GROUP_CONCAT(se.IdServicioEse) as Servicios from master_ese_srv_servicio se where se.IdPlantillaCliente=$id");
               foreach ($queryServ as $ds) {
                    $IdsServicios = $ds->Servicios;
                   
                }
               
                $optS = explode(',', $IdsServicios);
                for ($s = 0; $s < count($optS); $s++) {
                    $IdServicioS=$optS[$s];
                    $NomFEse="EstudioE".$IdServicioS."_".$IdServicioS;
                    foreach($queryServEntr as $field){
                        $IdEntradaPG        = $field->IdEntrada;
                        $Requerido          = $field->Requerido;
                        $VisibleReportes    = $field->VisibleReportes;
                        $VisibleForms       = $field->VisibleForms;
                        $VisibleGrids       = $field->VisibleGrids;
                        $VisibleOSClientes  = $field->VisibleOSClientes;
                        $TempUsrEdita       = $field->TempUsrEdita;
                        $Orden              = $field->Orden;
                        $Indice             = $field->Indice;
                        $presencial         = $field->Presencial;
                        $telefonico         = $field->Telefonico;
                        if ($rowServ == 0){
                            $sqlServ.=" ($IdEntradaPG,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$IdServicioS,$Indice,'{$NomFEse}',$presencial,$telefonico)";
                        }
                        else{
                            $sqlServ.=", ($IdEntradaPG,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$IdServicioS,$Indice,'{$NomFEse}',$presencial,$telefonico)";
                        }
                        $rowServ++;
                    }  
                    $sql123=$sqlServ;
              
                    
                }
                if(count($queryServEntr) > 0){
                    DB::insert("INSERT INTO master_ese_srv_entrada (IdEntrada,Requerido,VisibleReportes,VisibleForms,VisibleGrids,VisibleOSClientes,TempUsrEdita,Orden,IdServicioEse,Indice,NomFEse,Presencial,Telefonico) VALUES $sqlServ");
                }
                
                
        }

        //FIN SEGMENTO UPDATE CAMPO SRV
        // $res=array("sql"=>$sql,"id"=>$id,"CountRow"=>$CountRow);
        return response()->json($id);

    }

    public function PlantillaR($id,$idcs,$idspcs)
    {


        // $IdPlantilla = $request->IdPlantilla;
        // dd($id);
        $v= "1";

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_cliente_entrada", "READONLY",
            array(
                "IdPlantillaClienteEntrada" => '-1',
                "Activo" => 'Si',
                "IdPlantillaCliente" => $id
            )
        );

        $servicios=DB::select('SELECT IdTipoServicio,Descripcion as Servicio FROM master_ese_tiposervicio');

        $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');
        $clientes=DB::select('SELECT c.id as IdCliente, c.nombre_comercial AS Nombre FROM clientes c');
        $plantillas=DB::select('SELECT IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla');
        $tipos=DB::select('SELECT * FROM master_ese_tipos');

        return view("ESE.plantillaC.plantillacliente",["pentrada"=>$Plantilla, "contenedor"=>$c, "servicios"=>$servicios, "tipos"=>$tipos,"clientes"=>$clientes, "IdPlantillaCliente"=>$id, "plantillas"=>$plantillas , "VaIn"=>$v, "id"=>0,"IdClientes"=>$idcs,"IdPlantillasClientes"=>$idspcs]);

    }

    public function PlantillaRPC($id,$idc)
    {


        // $IdPlantilla = $request->IdPlantilla;
        // dd($id);
        $v= "1";

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_cliente_entrada", "READONLY",
            array(
                "IdPlantillaClienteEntrada" => '-1',
                "Activo" => 'Si',
                "IdPlantillaCliente" => $id
            )
        );

        $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');
        $clientes=DB::select("SELECT c.id as IdCliente, c.nombre_comercial AS Nombre FROM clientes c where c.id=$idc");
        $plantillas=DB::select('SELECT IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla');
        $servicios=DB::select('SELECT IdTipoServicio,Descripcion as Servicio FROM master_ese_tiposervicio');
        $tipos=DB::select('SELECT * FROM master_ese_tipos');

        return view("ESE.plantillaC.plantillacliente",["pentrada"=>$Plantilla, "contenedor"=>$c, "servicios"=>$servicios, "tipos"=>$tipos, "clientes"=>$clientes, "IdPlantillaCliente"=>$id, "plantillas"=>$plantillas , "VaIn"=>$v, "id"=>0]);

    }

    public function PlantillaREdit($id)
    {


        // $IdPlantilla = $request->IdPlantilla;
        // dd($id);
        $v= "1";

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_cliente_entrada", "READONLY",
            array(
                "IdPlantillaClienteEntrada" => '-1',
                "Activo" => 'Si',
                "IdPlantillaCliente" => $id
            )
        );

        foreach ($Plantilla as $opt) {
            $Descripcion=$opt->DescripcionPlantilla;
           }

        $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');
        $clientes=DB::select('SELECT c.id as IdCliente, c.nombre_comercial AS Nombre FROM clientes c');
        $plantillas=DB::select('SELECT IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla');
        $servicios=DB::select('SELECT IdTipoServicio,Descripcion as Servicio FROM master_ese_tiposervicio');
        $tipos=DB::select('SELECT * FROM master_ese_tipos');

        return view("ESE.plantillaC.plantillace",["pentrada"=>$Plantilla, "contenedor"=>$c, "servicios"=>$servicios, "tipos"=>$tipos,"clientes"=>$clientes, "IdPlantillaCliente"=>$id, "plantillas"=>$plantillas , "VaIn"=>$v,"Descripcion"=>$Descripcion, "id"=>0]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_cliente_entrada", "READONLY",
            array(
                "IdPlantillaClienteEntrada" => '-1',
                "Activo" => 'Si',
                "IdPlantillaCliente" => $id
            )
        );
        $Descripcion='';
        foreach ($Plantilla as $opt) {
            $Descripcion=$opt->DescripcionPlantilla;
           }

        $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');
        $clientes=DB::select('SELECT c.id as IdCliente, c.nombre_comercial AS Nombre FROM clientes c');
        $plantillas=DB::select('SELECT IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla');
        $servicios=DB::select('SELECT IdTipoServicio,Descripcion as Servicio FROM master_ese_tiposervicio');
        $tipos=DB::select('SELECT * FROM master_ese_tipos');

        return view("ESE.plantillaC.plantillace",["pentrada"=>$Plantilla, "contenedor"=>$c,"servicios"=>$servicios, "tipos"=>$tipos, "clientes"=>$clientes, "IdPlantillaCliente"=>$id, "plantillas"=>$plantillas , "VaIn"=>$v, "Descripcion"=>$Descripcion]);

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
        $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_srv_servicio WHERE IdPlantillaCliente =$id) as Exst ");

                foreach ($queryEXST as $p) {
                    $Exst=$p->Exst;

                }

                if(($Exst==0) ){
                    $guardarCambios=DB::table('master_ese_plantilla_cliente')
                    ->where("IdPlantillaCliente",$id)
                    ->update([
                        "Activo" => 'No'

                    ]);
                    return redirect('/PlantillaCliente')
                            ->with(['success' => ' El registro se eliminó con éxito',
                                'type'    => 'success']);
                }else{
                    return redirect('/PlantillaCliente')
                    ->with(['success' => ' El registro se encuentra en uso. No se puede eliminar.',
                        'type'    => 'success']);
                }


    }

    public function GetDataPlantillaCliente($IdPlantillaCliente){
        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_cliente", "READONLY",
        array(
            "IdPlantillaCliente" => $IdPlantillaCliente,
            "Activo" => 'Si'
            )
        );
        return  response()->json($Plantilla);
    }
    public function SaveDataPlantillaCliente(Request $request){
        $guardarCambios=DB::table('master_ese_plantilla_cliente')
        ->where("IdPlantillaCliente",$request->IdPlantillaCliente)
        ->update([
            "NombrePlantillaCliente" => $request->NombrePlantillaCliente,

        ]);
        return redirect('/PlantillaCliente')
        ->with(['success' => ' El registro se actualizo con éxito',
            'type'    => 'success']);
    }
}

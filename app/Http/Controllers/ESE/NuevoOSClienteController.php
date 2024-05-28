<?php
namespace App\Http\Controllers\ESE;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Bussines\MasterConsultas;
use App\MasterEsePlantillaCliente;
use App\MasterEseServicio;
use App\MasterEseAsignacion;
use App\MasterEseServicioEntrada;
use App\MasterEseServicioOS;
use App\Http\Controllers\ESE\Notificaciones;
use Auth;
class NuevoOSClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ids=DB::select('select id from clientes limit 1');
      if(isset($ids[0]->IdCliente)){
        //si hay clientes cargados se selecciona en automatico el primero
        $cod=$ids[0]->IdCliente;
        //$clientes=DB::select("SELECT IdCliente,Nombre FROM master_clientes ORDER BY IdCliente = $cod DESC");
        $idcn_user = auth()->user()->idcn;
        
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $clientes=DB::select('SELECT id AS IdCliente,nombre_comercial AS Nombre FROM clientes where tipo=2 ORDER by nombre_comercial asc');
        }else{
            $clientes=DB::select('SELECT id AS IdCliente,nombre_comercial AS Nombre FROM clientes where tipo=2 AND id_cn='.$idcn_user.' ORDER by nombre_comercial asc'); 
        }
        $servicios=DB::select("select IdTipoServicio, Descripcion, DescripcionServicioInfo,TotServ, Color  FROM
        ((Select mp.IdTipoServicio AS IdTipoServicio, serv.Color as Color, serv.Descripcion AS Descripcion,serv.DescripcionServicioInfo
         AS DescripcionServicioInfo, count(mp.IdTipoServicio) as TotServ
        from master_ese_srv_servicio ms
        Inner join master_ese_plantilla_cliente mpc on mpc.IdPlantillaCliente = ms.IdPlantillaCliente
        Inner Join master_ese_plantilla mp ON mp.IdPlantilla = mpc.IdPlantilla
        Inner Join master_ese_tiposervicio serv ON serv.IdTipoServicio = mp.IdTipoServicio
             where ms.IdCliente = $cod and ms.Estatus='Creada'
        GROUP BY serv.IdTipoServicio)
        UNION ALL
        (Select ts.IdTipoServicio AS IdTipoServicio, ts.Color as Color, ts.Descripcion AS 
        Descripcion,ts.DescripcionServicioInfo AS DescripcionServicioInfo, 0 as TotServ
            From master_ese_tiposervicio as ts )) as TServ
        GROUP BY IdTipoServicio");
            return view("ESE.NuevaOSCliente.nuevaOSClientexCliente",["clientes"=>$clientes, "servicios"=>$servicios,'cntC'=>$cod]);
      }else{
        // en caso de que no haya clientes cargados se direcciona este interfaz
         // $clientes=DB::select('SELECT IdCliente,Nombre FROM master_clientes');

         $idcn_user = auth()->user()->idcn;
         if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')) {
            $clientes=DB::select('SELECT id AS IdCliente,nombre_comercial AS Nombre FROM clientes where tipo=2 ORDER by nombre_comercial asc');
            }else{
             $clientes=DB::select('SELECT id AS IdCliente,nombre_comercial AS Nombre FROM clientes where tipo=2 AND id_cn='.$idcn_user.' order by nombre_comercial asc');
        }
          $servicios = MasterConsultas::exeSQL("master_ese_tiposervicio", "READONLY",
          array(
                  "IdTipoServicio" => '-1'
              )
          );

          $cc = DB::select ("SELECT u.idCliente as idc, c.nombre_comercial as nc FROM users as u  
          INNER JOIN clientes c on c.id = u.idcliente
          WHERE u.id = ?", [auth()->user()->id]);

          

          return view("ESE.NuevaOSCliente.nuevaOSClienteindex",["clientes"=>$clientes, "servicios"=>$servicios, "cc"=> $cc ]);
      }
    }

    public function FiltroPC(Request $request)
    {
        $cod = $request->input('cntC');
       $idcn_user = auth()->user()->idcn;
       if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')) {
        $clientes=DB::select('SELECT id AS IdCliente,nombre_comercial AS Nombre FROM clientes where tipo=2 ORDER by nombre_comercial asc');
           
        }else{
            $clientes=DB::select('SELECT id AS IdCliente,nombre_comercial AS Nombre FROM clientes where tipo=2 AND id_cn='.$idcn_user.' order by nombre_comercial asc');
        }
        $servicios=DB::select("select IdTipoServicio, Descripcion, DescripcionServicioInfo,TotServ, Color  FROM
        ((Select mp.IdTipoServicio AS IdTipoServicio, serv.Color as Color, serv.Descripcion AS Descripcion,serv.DescripcionServicioInfo AS DescripcionServicioInfo, count(mp.IdTipoServicio) as TotServ
        from master_ese_srv_servicio ms
        Inner join master_ese_plantilla_cliente mpc on mpc.IdPlantillaCliente = ms.IdPlantillaCliente
        Inner Join master_ese_plantilla mp ON mp.IdPlantilla = mpc.IdPlantilla
        Inner Join master_ese_tiposervicio serv ON serv.IdTipoServicio = mp.IdTipoServicio
         where ms.IdCliente = $cod and ms.Estatus='Creada'
    GROUP BY serv.IdTipoServicio)
    UNION ALL
    (Select ts.IdTipoServicio AS IdTipoServicio, ts.Color as Color, ts.Descripcion AS Descripcion,ts.DescripcionServicioInfo AS DescripcionServicioInfo, 0 as TotServ
        From master_ese_tiposervicio as ts )) as TServ
    GROUP BY IdTipoServicio");

        return view("ESE.NuevaOSCliente.nuevaOSClientexCliente",
                    ["clientes"=>$clientes, 
                    "servicios"=>$servicios,
                    'cntC'=>$cod]);
    }

    public function PlantOS($ids,$idc)
    {

        $cred = DB::select("SELECT cc.Restantes as Restantes  FROM cred_count cc WHERE cc.IdModulo =6 AND cc.IdCliente = $idc");

        $creditos = (count($cred)==0)?0:$cred[0]->Restantes;

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_cliente_entrada", "READONLY",
        array(
            "IdPlantillaClienteEntrada" => '0',
            "Activo" => 'Si',
            "IdPlantillaCliente" => '0'
        )
    );
    $v="0";
    $cont=0;
    $nservicio=[];
    $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');
    $clientes=DB::select('SELECT IdCliente,Nombre FROM master_clientes');
    $nservicio=DB::select("SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio WHERE IdTipoServicio=$ids");
    foreach ($nservicio as $sp) {
                    $nomserv = $sp->Descripcion;
                    $TSPlantilla=$sp->IdTipoServicio;
    }
    $tservicios=DB::select('SELECT * FROM master_ese_tipos');
    $plantillas=DB::select('SELECT IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla');
    if($TSPlantilla==2){
        $modalidades = DB::select("SELECT * FROM master_ese_modalidad WHERE idModalidad=1 order by IdModalidad=2 DESC");
    }else {
        if (($TSPlantilla == 1) || ($TSPlantilla == 13)) {
            $modalidades = DB::select("SELECT * FROM master_ese_modalidad order by IdModalidad=2 DESC");
        } else {
            $modalidades = DB::select("SELECT * FROM master_ese_modalidad ");
        }
    }
    $plantillasPorClientes = MasterConsultas::exeSQL("PlantillaPorCliente","READONLY",array("IdCliente" =>"$idc","IdTipos" =>"0","IdTipoServicio"=>"$ids"));
    $prioridades=DB::select("SELECT * FROM master_ese_prioridades order by IdPrioridad desc");
    $plantillaG=DB::select("Select IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla WHERE IdTipoServicio= $ids");


    $solicitante = DB::select('SELECT CONCAT(IFNULL(con.nombre_con,""), " ", IFNULL(con.apellido_paterno_con,""), " ", IFNULL(con.apellido_materno_con,""), " ") AS solicitante FROM contactos con WHERE con.id_cliente = '.$idc);
    return view("ESE.NuevaOSCliente.nuevaOSClientecreate",

                [ 
                
                "creditos"=>$creditos,

                "solicitante" =>$solicitante,

                "tservicios"=>$tservicios,

                "servi"=>$ids, 

                "plantillas"=>$plantillas,

                "plantillaG"=>$plantillaG , 

                "VaIn"=>$v, 

                "id"=>0, 

                "IdCliente"=>$idc,

                "nservicio"=>$nomserv,

                "IdServicioEse"=>null,

                "IdPlantillaCliente"=>null,

                "modalidades"=>$modalidades,

                "prioridades"=>$prioridades,

                "cont"=>$cont,

                "plantillasPorClientes"=>$plantillasPorClientes
            ]);
    }

    public function ConfiguracionOSPC($id,$idc,$ids,$hrefO,$idPlantillaCliente,$solicitante)
    {
        $cred = DB::select("SELECT cc.Restantes as Restantes, cc.Usados as Usados  FROM cred_count cc WHERE cc.IdModulo =6 AND cc.IdCliente = $idc");

        $creditos = (count($cred)==0)?0:$cred[0]->Restantes;

        $creditos -= 1;

        $usados = $cred[0]->Usados +1;


        $credxserv = DB::select("SELECT * FROM cred_kardex cc WHERE cc.IdModulo =6 AND cc.IdCliente = $idc AND Estatus = 'Activo' ORDER BY cc.fecha ASC LIMIT 1");

        if(count($credxserv)>0){
            $contadora = (int) $credxserv[0]->Restantes -1;
            $idP = $credxserv[0]->id;
            $estatuso = ($contadora == 0)?"Finalizado":"Activo";
            
            DB::table("cred_kardex")
                        ->where("id",$idP)
                        ->where("IdCliente",$idc)
                        ->where("IdModulo",6)
                        ->update([
                            "Restantes" => $contadora,
                            "Estatus" => $estatuso
                        ]);
        }

        if(count($cred)>0){
            DB::table("cred_count")
                        ->where("IdCliente",$idc)
                        ->where("IdModulo",6)
                        ->update([
                            "Usados" => $usados,
                            "Restantes" => $creditos
                        ]);
        }

        if($creditos == 5){
            $ntf = new Notificaciones();
            $clt = DB::select("select u.id from users u where u.IdCliente = $idc");
            $ntf->notificaUsuariosCred('EJE-CREDITOS','Cliente',$idc);
            $ntf->notificaUsuariosCred('CLTE-CREDITOS','Ejecutivo',$idc);
        }

        $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_entrada WHERE IdPlantilla =$id) as Exst ");
        foreach ($queryEXST as $p) {
            $Exst=$p->Exst;
        }
        if(($Exst==0) ){
            // return array(0);
        }else{
            // esto se realizara si y solo si es por primera vez la creacion de solicitar servicio al cliente
            if($idPlantillaCliente == 0){
                $totalPlantillaCliente = DB::select("SELECT
                                                        COUNT(mepc.Activo) AS count,

                                                        mepc.*

                                                    FROM master_ese_plantilla_cliente mepc

                                                    WHERE mepc.IdCliente = $idc

                                                    AND mepc.IdPlantilla = $id

                                                    AND mepc.Activo = 'Si'

                                                    ORDER BY mepc.IdPlantillaCliente DESC LIMIT 1");
                $idPlantillaCliente = ($totalPlantillaCliente[0]->count > 0)?$totalPlantillaCliente[0]->IdPlantillaCliente:$idPlantillaCliente;
            }
            $DataPlantillaCliente=DB::select("SELECT * FROM master_ese_plantilla_cliente mepc WHERE mepc.IdPlantilla=$id AND mepc.IdCliente=$idc and mepc.IdPlantillaCliente=$idPlantillaCliente and mepc.Activo='Si'  
            ORDER BY mepc.IdPlantillaCliente DESC LIMIT 1");
           if(count($DataPlantillaCliente) > 0){
               foreach($DataPlantillaCliente as $r){
                   $IdPlantillaCliente= $r->IdPlantillaCliente;
               } 
                $idp = $id;
                $idpc = $IdPlantillaCliente;
           }else{
               $plantilla       = new MasterEsePlantillaCliente();
               $plantilla->IdPlantilla        = $id;
               $plantilla->IdCliente          = $idc;
               $plantilla->save();
               $idp= $plantilla->IdPlantilla;
               $idpc= $plantilla->IdPlantillaCliente;
               $this->GuardarEntradaPlantilla($idp,$idpc,$idc);
           }

            $queryMod = DB::select("select mp.IdTipoServicio,mp.DescripcionPlantilla
            from master_ese_plantilla mp
            Inner join master_ese_plantilla_cliente mpc on mp.IdPlantilla = mpc.IdPlantilla
            where mpc.IdPlantilla=$idp");

            foreach ($queryMod as $p) {
                $NPlantilla=$p->DescripcionPlantilla;
                $TSPlantilla=$p->IdTipoServicio;
            }
            if(strpos($NPlantilla,'Telefónic')> -1){
                if(($TSPlantilla==1) || ($TSPlantilla==13)){
                    $IdModalidad=2;  
                }else{
                    $IdModalidad=1;
                }
            }else{
                if(($TSPlantilla==1) || ($TSPlantilla==13)){
                    $IdModalidad=2;  
                }elseif($TSPlantilla==2){
                    $IdModalidad=1;
                }else{
                     $IdModalidad=2;
                }
            }

            if($ids==0){
                $ids=null;
            }

            $sqls='';
            $i=1;
                    $Servicio  = MasterEseServicio::Create(["IdCliente" => $idc,

                    "IdPlantillaCliente"     => $idpc,

                    "IdTipoServicio"         => $ids,

                    "IdModalidad"            => $IdModalidad,

                    "IdPrioridad"            => 3,

                    "Comentarios"            => null,

                    "Estatus"                => 'Creada',

                    "SyncGrid"               => 1,

                    "SyncData"               => 0,

                    "FechaCreacion"          => date('Y-m-d H:i:s'),

                    "MinutosEjecucionInves"  => 0

                    ]);

                    $IdServicioEse=$Servicio->IdServicioEse;

                    DB::update("UPDATE master_ese_srv_servicio SET solicitante = '$solicitante' WHERE idservicioese = $IdServicioEse");

                    $IdPC=$Servicio->IdPlantillaCliente;

                    $IdPrioridad=$Servicio->IdPrioridad;
                    // return array($idpc,$hrefO);
                    $Asignacion = MasterEseAsignacion::Create(['IdServicioEse' => $IdServicioEse,

                                        'IdLider'       => null,

                                        'IdAnalista'    => null,

                                        'IdInvestigador'=> null,

                                        'IdAnalistaSec' => null

                                        ]);

                    $queryL = DB::select("select * from master_ese_plantilla_cliente_entrada
                    where IdPlantillaCliente= $IdPC and Activo='Si'");

                    $hrefO='EstudioE'.$IdServicioEse.'_'.$IdServicioEse;
                    $queryNM = DB::select("select Descripcion as NModalidad from master_ese_modalidad WHERE IdModalidad=$IdModalidad");
                    foreach($queryNM as $m){
                        $NModalidad=$m->NModalidad;
                    }

                    $queryNP = DB::select("select Descripcion as NPrioridad from master_ese_prioridades WHERE IdPrioridad=$IdPrioridad");
                    foreach($queryNP as $p){
                        $NPrioridad=$p->NPrioridad;
                    }
                    foreach($queryL as $name){

                        $IdEntrada                 = $name->IdEntrada;

                        $Requerido                 = $name->Requerido;

                        $VisibleReportes           = $name->VisibleReportes;

                        $VisibleForms              = $name->VisibleForms;

                        $VisibleGrids              = $name->VisibleGrids;

                        $VisibleOSClientes         = $name->VisibleOSClientes;

                        $TempUsrEdita              = $name->TempUsrEdita;

                        $Orden                     = $name->Orden;

                        $Indice                    = $name->Indice;

                        $Presencial                = $name->Presencial;

                        $Telefonico                = $name->Telefonico;

                        if(count($queryL) == $i){
                        $sqls.=" ($IdEntrada,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$IdServicioEse,$Indice,'{$hrefO}', $Presencial, $Telefonico)";
                        }else{
                            $sqls.=" ($IdEntrada,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$IdServicioEse,$Indice,'{$hrefO}', $Presencial, $Telefonico),";

                        }
                        $i++;
                }
                DB::insert("INSERT INTO master_ese_srv_entrada (IdEntrada,Requerido,VisibleReportes,VisibleForms,VisibleGrids,VisibleOSClientes,TempUsrEdita,Orden,IdServicioEse,Indice,NomFEse,Presencial,Telefonico) VALUES $sqls");
                    $ServicioOS  = MasterEseServicioOS::Create([
                    "IdCliente"      => $idc,
                    "IdModulo"       => 1,
                    "IdServicioSRV"  => $IdServicioEse,
                    "Estatus"        => 'Creada',
                    "FechaSolicitud" => date('Y-m-d H:i:s')
                    ]);
                $user = \Auth::user();
                $sql = DB::select("select count(*) as dato from master_ese_srv_kardex where Movimiento = 'Solicitud' and IdServicioEse = $IdServicioEse");
                $ban=false;
                foreach ($sql as $g) {
                  if($g->dato==0){
                    $ban=true;
                  }
                }
                if($ban){
                  MasterConsultas::exeSQLStatement("insert_kardex", "UPDATE",
                      array(
                          "id"=>'1',
                          "IdServicioEse" => $IdServicioEse,
                          "Movimiento" => 'Creada',
                          "IdUsuario" => $user->username
                          )
                  );
                }

                $rlmod='';
                $rlpri='';
                if($IdModalidad!=null){
                    $modalidades=DB::select("SELECT IdModalidad,Descripcion FROM master_ese_modalidad ORDER BY IdModalidad=$IdModalidad DESC");
                    foreach ($modalidades as $md) {
                        $rlmod=$rlmod."<option value='".$md->IdModalidad."' >".$md->Descripcion."</option>";
                    }
                }else{
                    $modalidades=DB::select("SELECT IdModalidad,Descripcion FROM master_ese_modalidad");
                }
                if($IdPrioridad!=null){
                    $prioridades=DB::select("SELECT IdPrioridad,Descripcion FROM master_ese_prioridades ORDER BY IdPrioridad=$IdPrioridad DESC");
                    foreach ($prioridades as $pr) {
                        $rlpri=$rlpri."<option value='".$pr->IdPrioridad."' >".$pr->Descripcion."</option>";
                    }
                }else{
                    $prioridades=DB::select("SELECT IdPrioridad,Descripcion FROM master_ese_prioridades");
                }
                if($IdModalidad==1){
                    $queryExstEtqMC = DB::select("SELECT EXISTS(SELECT 1 from master_ese_contenedor
                    Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                    Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                    Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                    Where master_ese_srv_entrada.IdServicioEse = $IdServicioEse
                    and ((master_ese_entrada.Etiqueta='Ciudad / Municipio / Alcaldía') || (master_ese_entrada.Etiqueta='Código Postal') 
                    || (master_ese_entrada.Etiqueta='Colonia'))) as ExstEtqMC");
                    foreach ($queryExstEtqMC as $p) {
                        $ExstEtqMC=$p->ExstEtqMC;
                    }

                    if($ExstEtqMC==1 ){
                        $queryEntrEtq = DB::select("SELECT (CASE WHEN master_ese_entrada.Etiqueta='Ciudad / Municipio / Alcaldía' THEN master_ese_srv_entrada.IdServicioEseEntrada 
                        WHEN master_ese_entrada.Etiqueta='Código Postal' THEN master_ese_srv_entrada.IdServicioEseEntrada 
                        WHEN master_ese_entrada.Etiqueta='Colonia' THEN master_ese_srv_entrada.IdServicioEseEntrada END) as IdServicioEseEntrada from master_ese_contenedor
                       Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                       Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                       Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                       Where master_ese_srv_entrada.IdServicioEse = $IdServicioEse and ((master_ese_entrada.Etiqueta='Ciudad / Municipio / Alcaldía') 
                       || (master_ese_entrada.Etiqueta='Código Postal') || (master_ese_entrada.Etiqueta='Colonia'))");
                        foreach ($queryEntrEtq as $c) {
                            $identradasrv=$c->IdServicioEseEntrada;
                            DB::update("update master_ese_srv_entrada set VisibleOSClientes=0 where IdServicioEse = $IdServicioEse and IdServicioEseEntrada = $identradasrv");
                          }
                    }
                }
                else{
                    $queryExstEtqMC = DB::select("SELECT EXISTS(SELECT 1 from master_ese_contenedor
                    Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                    Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                    Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                    Where master_ese_srv_entrada.IdServicioEse = $IdServicioEse 
                    and ((master_ese_entrada.Etiqueta='Ciudad / Municipio / Alcaldía') || (master_ese_entrada.Etiqueta='Código Postal') 
                    || (master_ese_entrada.Etiqueta='Colonia'))) as ExstEtqMC");
                    foreach ($queryExstEtqMC as $p) {
                        $ExstEtqMC=$p->ExstEtqMC;
                    }
                    if($ExstEtqMC==1 ){
                        $queryEntrEtq = DB::select("SELECT (CASE WHEN master_ese_entrada.Etiqueta='Ciudad / Municipio / Alcaldía' THEN master_ese_srv_entrada.IdServicioEseEntrada 
                        WHEN master_ese_entrada.Etiqueta='Código Postal' THEN master_ese_srv_entrada.IdServicioEseEntrada 
                        WHEN master_ese_entrada.Etiqueta='Colonia' THEN master_ese_srv_entrada.IdServicioEseEntrada END) as IdServicioEseEntrada from master_ese_contenedor
                       Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                       Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                       Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                       Where master_ese_srv_entrada.IdServicioEse = $IdServicioEse and ((master_ese_entrada.Etiqueta='Ciudad / Municipio / Alcaldía') 
                       || (master_ese_entrada.Etiqueta='Código Postal') || (master_ese_entrada.Etiqueta='Colonia'))");

                            foreach ($queryEntrEtq as $c) {
                                $identradasrv=$c->IdServicioEseEntrada;
                                DB::update("update master_ese_srv_entrada set VisibleOSClientes=1 where IdServicioEse = $IdServicioEse and IdServicioEseEntrada = $identradasrv");
                              }
                    }
                }
                return array($IdServicioEse,$hrefO,$IdPC,$IdModalidad,$IdPrioridad,$modalidades,$rlpri,$NModalidad,$NPrioridad,$TSPlantilla);
        }
    }

    public function DeletePlantilla($idse)
    {
        try {
            $Servicio=DB::select("select ms.IdServicioEse, mp.IdTipoServicio, mp.DescripcionPlantilla, mp.IdTipos, mp.IdPlantilla, ms.IdPlantillaCliente, ms.IdCliente
            from master_ese_plantilla mp
            inner join master_ese_plantilla_cliente mpc on mp.IdPlantilla = mpc.IdPlantilla
            inner join master_ese_srv_servicio ms on ms.IdPlantillaCliente = mpc.IdPlantillaCliente
            where ms.IdServicioEse=$idse");
            foreach ($Servicio as $sp) {
                $IdServicio = $sp->IdTipoServicio;
                $IdCliente = $sp->IdCliente;
            }
            DB::delete("delete from master_ese_srv_kardex where IdServicioEse = $idse");
            DB::delete("delete from master_ese_srv_entrada where IdServicioEse = $idse");
            DB::delete("delete from master_ese_srv_os where IdServicioSRV = $idse");
            DB::delete("delete from master_ese_srv_servicio where IdServicioEse = $idse");
            return array("success",$idse,$IdCliente,$IdServicio);
        } catch (\Exception $e) {
            return array("error",$idse,"error: ".$e->getMessage()." Line: ".$e->getLine());
        }
    }

    public function DeletePlantillaI($idse)
    {
        $Servicio=DB::select("select ms.IdServicioEse, mp.IdTipoServicio, mp.DescripcionPlantilla, mp.IdTipos, mp.IdPlantilla, ms.IdPlantillaCliente, ms.IdCliente
        from master_ese_plantilla mp
        inner join master_ese_plantilla_cliente mpc on mp.IdPlantilla = mpc.IdPlantilla
        inner join master_ese_srv_servicio ms on ms.IdPlantillaCliente = mpc.IdPlantillaCliente
        where ms.IdServicioEse=$idse");
        foreach ($Servicio as $sp) {
            $IdServicio = $sp->IdTipoServicio;
            $IdCliente = $sp->IdCliente;
        }
        $queryDK = DB::select("DELETE master_ese_srv_kardex
        FROM master_ese_srv_kardex
        WHERE master_ese_srv_kardex.IdServicioEse = $idse");
        $queryDD = DB::select("DELETE  master_ese_srv_servicio, master_ese_srv_entrada, master_ese_srv_asignacion,master_ese_plantilla_cliente, master_ese_plantilla_cliente_entrada
        FROM master_ese_srv_servicio
        INNER JOIN master_ese_srv_entrada on master_ese_srv_entrada.IdServicioEse = master_ese_srv_servicio.IdServicioEse
        INNER JOIN master_ese_srv_asignacion on master_ese_srv_asignacion.IdServicioEse = master_ese_srv_servicio.IdServicioEse
        INNER JOIN master_ese_plantilla_cliente_entrada on master_ese_plantilla_cliente_entrada.IdPlantillaCliente = master_ese_srv_servicio.IdPlantillaCliente
        INNER JOIN master_ese_plantilla_cliente on master_ese_plantilla_cliente.IdPlantillaCliente = master_ese_srv_servicio.IdPlantillaCliente
        WHERE master_ese_srv_servicio.Estatus = 'Creada' AND master_ese_srv_servicio.IdServicioEse= $idse");
        return redirect('/ServClientes/'.$IdCliente.'/'.$IdServicio)
        ->with(['success' => ' El registro se eliminó con éxito',
            'type'    => 'success']);
        // return array($idse,$IdCliente,$IdServicio);
    }

    public function GuardarEntradaPlantilla($idp,$idpc,$idc)
    {
        $sql='';
        $i=1;
                    $queryPL = DB::select("select pc.* from master_ese_plantilla_cliente pc where pc.IdPlantilla = '{$idp}' and pc.IdCliente='{$idc}' order by pc.IdPlantillaCliente desc limit 1");
                    // $queryPL = DB::select("select pc.* from master_ese_plantilla_cliente pc Inner Join master_ese_plantilla_cliente_entrada pce on pce.IdPlantillaCliente=pc.IdPlantillaCliente where pc.IdPlantilla ='{$idp}' and pc.IdCliente='{$idc}' order by pc.IdPlantillaCliente desc limit 1");
                    foreach($queryPL as $mpc){
                        $IdPlantillaCC=$mpc->IdPlantillaCliente;
                    }
                    $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_cliente_entrada pce Inner Join master_ese_plantilla_cliente pc on pc.IdPlantillaCliente = pce.IdPlantillaCliente where pc.IdPlantillaCliente='{$IdPlantillaCC}') as Exst");
                    foreach ($queryEXST as $p) {
                        $Exst=$p->Exst;
                    }

                    if(($Exst==1) ){
                        $queryLPCC = DB::select("select pce.* from master_ese_plantilla_cliente_entrada pce Inner Join master_ese_plantilla_cliente pc on pc.IdPlantillaCliente = pce.IdPlantillaCliente where pc.IdPlantillaCliente = '{$IdPlantillaCC}'");
                            foreach($queryLPCC as $name){

                                $IdEntrada          = $name->IdEntrada;
                                
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

                                if(count($queryLPCC) == $i){
                                $sql.=" ($IdEntrada,$idpc,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$Indice,$Presencial,$Telefonico)";
                                }else{
                                    $sql.=" ($IdEntrada,$idpc,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$Indice,$Presencial,$Telefonico),";
                                }
                                $i++;
                        }
                        DB::insert("INSERT INTO master_ese_plantilla_cliente_entrada (IdEntrada,IdPlantillaCliente,Requerido,VisibleReportes,VisibleForms,VisibleGrids,VisibleOSClientes,TempUsrEdita,Orden,Indice,Presencial,Telefonico) VALUES $sql");
                    }
                    else{
                    $queryL = DB::select("select * from master_ese_plantilla_entrada
                    where IdPlantilla= $idp");
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
                            $sql.=" ($IdEntrada,$idpc,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$Indice,$Presencial,$Telefonico)";
                            }else{
                                $sql.=" ($IdEntrada,$idpc,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$Indice,$Presencial,$Telefonico),";
                            }
                            $i++;
                    }
                    DB::insert("INSERT INTO master_ese_plantilla_cliente_entrada (IdEntrada,IdPlantillaCliente,Requerido,VisibleReportes,VisibleForms,VisibleGrids,VisibleOSClientes,TempUsrEdita,Orden,Indice,Presencial,Telefonico) VALUES $sql");
                }
        return response()->json($idpc);
    }

    public function DatosPlantillaN($nombre,$TipoModalidad)
    {
        try {
            $res='';

            $res2='';

            $res3='';

            $res4='';

            $res5='';

            $res6='';

            $res7='';
            $condicionModalidad = ($TipoModalidad == "Presencial")?" master_ese_srv_entrada.Presencial = 1 ":" master_ese_srv_entrada.Telefonico=1 ";
            $queryDP = DB::select("select  DISTINCT(master_ese_contenedor.Etiqueta) as Grupo, master_ese_contenedor.IdContenedor,master_ese_agrupador.Etiqueta as Agrupador, master_ese_agrupador.IdAgrupador
            from master_ese_contenedor
            Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
            Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
            Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
            Where master_ese_srv_entrada.NomFEse ='{$nombre}' and master_ese_contenedor.VisibleContactos=1 and master_ese_srv_entrada.VisibleOSClientes=1 and $condicionModalidad
            ");

            $data=array();

            $data2=array();

            $data3=array();

            $data4=array();

            $data5=array();

            $data6=array();

            $data7=array();

            for($i=0;$i<count($queryDP);$i++){
                $queryDPE = DB::select("select master_ese_srv_entrada.IdServicioEseEntrada,master_ese_entrada.Etiqueta as entrada,master_ese_entrada.IdEntrada, master_ese_entrada.Formato as Type,master_ese_entrada.Items,
                CAST(SUBSTRING_INDEX(master_ese_entrada.Longitud, 'c', -1) AS UNSIGNED) as Maxm, master_ese_srv_entrada.Requerido,master_ese_srv_entrada.VisibleForms,
                master_ese_entrada.CampoNombre,master_ese_agrupador.IdAgrupador,master_ese_entrada.Clasificacion,master_ese_entrada.CantidadApariciones,master_ese_srv_entrada.Indice,master_ese_srv_entrada.ValorCargado,master_ese_srv_entrada.NomFEse
                from master_ese_contenedor
                Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                Where master_ese_contenedor.VisibleContactos=1 and master_ese_srv_entrada.VisibleOSClientes=1 and master_ese_srv_entrada.NomFEse='{$nombre}' and $condicionModalidad order by master_ese_agrupador.IdAgrupador,master_ese_srv_entrada.Indice,master_ese_entrada.Orden");
                foreach($queryDP as $name){
                    $res="<a style='display:none;' href=#".str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Grupo)))." aria-controls='".$queryDP[$i]->Grupo."' role='tab' data-toggle='tab'>".$queryDP[$i]->Grupo."</a>";
                    $res2="<span  role='tabpanel' id='".str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Grupo)))."' aria-labelledby='".str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Grupo)))."-tab'>
                    </span>";
                    $res3="<legend id='A".str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Agrupador)))."'>".$queryDP[$i]->Agrupador."</legend>";

                    $res4=str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Grupo)));

                    $res7=$queryDP[$i]->IdAgrupador;

                    $data[$queryDP[$i]->IdContenedor]=[$res];

                    $data2[$queryDP[$i]->IdContenedor]=[$res2];

                    $data3[]=[$res3];

                    $data4[]=[$res4];

                    $data7[]=[$res7];

                    $i ++;
                }

                for($j=0;$j<count($queryDPE);$j++){
                    foreach ($queryDPE as $entr) {
                        $res6=$queryDPE[$j]->IdAgrupador;
                    //TEXTO
                    if($queryDPE[$j]->Type == 'Texto'){
                        // if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaCP(this.name)' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                        </span></td></tr>";

                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaCP(this.name)' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                        </span></td></tr>";

                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                        </span></td></tr>";

                                    }else{
                                        $res5="<tr><td><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);UpdateCandidato(".$queryDPE[$j]->IdEntrada.",this.value,".$queryDPE[$j]->NomFEse.");' value='".$queryDPE[$j]->ValorCargado."'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                        </td></tr>";
                                    }

                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onfocus='EtiquetaCP(this.name)' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'  data-nameese='".$nombre."' required>
                                        </span></td></tr>";

                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'  data-nameese='".$nombre."' required>
                                        </span></td></tr>";

                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'  data-nameese='".$nombre."' required>
                                        </span></td></tr>";

                                    }else{
                                        $res5="<tr><td><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class='input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);UpdateCandidato(".$queryDPE[$j]->IdEntrada.",this.value,".$queryDPE[$j]->NomFEse.");'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                        </td></tr>";
                                    }
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' value='".$queryDPE[$j]->ValorCargado."' onfocus='EtiquetaCP(this.name)' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                        </span></td></tr>";

                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                        </span></td></tr>";

                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                        </span></td></tr>";

                                    }else{
                                        $res5="<tr><td><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);UpdateCandidato(".$queryDPE[$j]->IdEntrada.",this.value,".$queryDPE[$j]->NomFEse.");'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                        </td></tr>";
                                    }

                                }else{

                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onfocus='EtiquetaCP(this.name)' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                        </span></td></tr>";

                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                        </span></td></tr>";

                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                        </span></td></tr>";

                                    }else{
                                        $res5="<tr><td><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class='input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);UpdateCandidato(".$queryDPE[$j]->IdEntrada.",this.value,".$queryDPE[$j]->NomFEse.");'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                        </td></tr>";

                                    }
                                }
                            }
                    }
                    //NÚMERO
                    if($queryDPE[$j]->Type == 'Número'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){

                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."' required>
                                    </span></td></tr>";

                                }else{

                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."' required>
                                    </span></td></tr>";
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                    <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                    </span></td></tr>";

                                }else{
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                    <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                    </span></td></tr>";
                                }
                            }
                        }
                    }
                    //Correo
                    if($queryDPE[$j]->Type == 'Correo'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input min='0' type='email' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."' required>
                                    </span></td></tr>";
                                }else{
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input min='0' type='email' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."' required>
                                    </span></td></tr>";
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input min='0' type='email' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                    </span></td></tr>";
                                }else{
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input min='0' type='email' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                    </span></td></tr>";
                                }
                            }
                        }
                    }
                    //Inicia validación de fecha de nacimiento
                    if($queryDPE[$j]->Type == 'FechaNacimiento'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->entrada == 'Fecha de nacimiento')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                        </span></td></tr>";
                                    }

                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->entrada == 'Fecha de nacimiento')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                        </span></td></tr>";
                                    }
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->entrada == 'Fecha de nacimiento')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                        </span></td></tr>";
                                    }

                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->entrada == 'Fecha de nacimiento')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                        </span></td></tr>";
                                    }
                                }
                            }
                        }
                    }
                    //Finaliza validación de fecha de nacimiento
                    //FECHA
                    if($queryDPE[$j]->Type == 'Fecha'){
                        // if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <input type='date'  class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' required value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                    </td></tr>";

                                }else{
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <input type='date'  class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' required value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                    </td></tr>";
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                    <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                    </td></tr>";

                                }else{
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                    <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                    </td></tr>";
                                }
                            }
                    }
                    //COMBO
                    if($queryDPE[$j]->Type == 'Combo'){
                            $rl='';
                            $opt = explode(',', $queryDPE[$j]->Items);
                            $valu = $queryDPE[$j]->ValorCargado;
                            for ($x = 0; $x < count($opt); $x++) {
                                    if ($valu==$opt[$x]){
                                        $rl=$rl."<option selected value='".$opt[$x]."'>".$opt[$x]."</option>";
                                      }
                                      else{
                                        $rl=$rl."<option value='".$opt[$x]."' >".$opt[$x]."</option>";
                                      }
                            }
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."' required>
                                        <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                        </select>
                                        </span></td></tr>";

                                    }else{
                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."' required>
                                        <option value=''>Seleccione una Opción</option>
                                        ".$rl."
                                        </select>
                                        </td></tr>";
                                    }

                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."' required>
                                        <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                        </select>
                                        </span></td></tr>";

                                    }else{
                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."' required>
                                        <option value=''>
                                        </option>
                                        ".$rl."
                                        </select>
                                        </td></tr>";
                                    }
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."'>
                                        <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                            </select>
                                            </span></td></tr>";

                                    }else{
                                        $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                        <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."'>
                                        <option value=''>Seleccione una Opción</option>
                                        ".$rl."
                                        </select>
                                        </td></tr>";
                                    }

                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."'>
                                        <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                            </select>
                                            </span></td></tr>";

                                    }else{
                                        $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                        <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."'>
                                        <option value=''>Seleccione una Opción</option>
                                        ".$rl."
                                        </select>
                                        </td></tr>";
                                    }
                                }
                            }
                    }
                    //PDF
                    if($queryDPE[$j]->Type == 'PDF'){
                        // if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if($queryDPE[$j]->ValorCargado != ''){
                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-body'>
                                                        <iframe src='data:application/pdf;base64," . $queryDPE[$j]->ValorCargado . "' frameborder='0' scrolling='no' width='565' height='500'></iframe>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";

                                    }else{
                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";
                                    }

                                }else{
                                    if($queryDPE[$j]->ValorCargado != ''){
                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-body'>
                                                        <iframe src='data:application/pdf;base64," . $queryDPE[$j]->ValorCargado . "' frameborder='0' scrolling='no' width='565' height='500'></iframe>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";
                                       
                                    }else{

                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";
                                    }
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if($queryDPE[$j]->ValorCargado != ''){
                                        $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-body'>
                                                        <iframe src='data:application/pdf;base64," . $queryDPE[$j]->ValorCargado . "' frameborder='0' scrolling='no' width='565' height='500'></iframe>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";
                                       
                                    }else{
                                        $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";
                                    }

                                }else{
                                    if($queryDPE[$j]->ValorCargado != ''){
                                        $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-body'>
                                                        <iframe src='data:application/pdf;base64," . $queryDPE[$j]->ValorCargado . "' frameborder='0' scrolling='no' width='565' height='500'></iframe>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";
                                        
                                    }else{
                                        $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";
                                    }
                                }
                            }
                    }
                    //MONEDA
                    if($queryDPE[$j]->Type == 'Moneda'){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <div class='input-group'>
                                        <span class='input-group-addon'>$</span>
                                        <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' required>
                                    </div>
                                    </td></tr>";

                                }else{
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <div class='input-group'>
                                        <span class='input-group-addon'>$</span>
                                        <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' required>
                                    </div>
                                    </td></tr>";
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                    <div class='input-group'>
                                        <span class='input-group-addon'>$</span>
                                        <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'>
                                    </div>
                                    </td></tr>";

                                }else{
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                    <div class='input-group'>
                                        <span class='input-group-addon'>$</span>
                                        <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'>
                                    </div>
                                    </td></tr>";
                                }
                            }
                    }
                    //SELECCION MULTIPLE
                    if($queryDPE[$j]->Type == 'Selección Multiple'){
                            $rl='';
                            $opt = explode(',', $queryDPE[$j]->Items);
                            for ($x = 0; $x < count($opt); $x++) {
                                if($queryDPE[$j]->Requerido == 1){
                                    $rl=$rl."<label><input type='checkbox' class=' entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$opt[$x]."' required> ".$opt[$x]."</label><br>";

                                }else{
                                    $rl=$rl."<label><input type='checkbox' class=' entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$opt[$x]."' > ".$opt[$x]."</label><br>";
                                }
                            }
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td><br><br>
                                        ".$rl."
                                        </td></tr>";

                                }else{
                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td><br><br>
                                        ".$rl."
                                        </td></tr>";
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td><br><br>
                                    ".$rl."
                                    </td></tr>";

                                }else{
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td><br><br>
                                    ".$rl."
                                    </td></tr>";
                                }
                            }
                    }
                    //JPEG
                    if($queryDPE[$j]->Type == 'JPEG'){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if($queryDPE[$j]->ValorCargado != ''){
                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                    <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-body'>
                                                                <img src='data:image/jpeg;base64," . $queryDPE[$j]->ValorCargado . "' class='img-responsive'>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </td></tr>";

                                    }else{
                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </td></tr>";
                                    }

                                }else{
                                    if($queryDPE[$j]->ValorCargado != ''){
                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                    <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-body'>
                                                                <img src='data:image/jpeg;base64," . $queryDPE[$j]->ValorCargado . "' class='img-responsive'>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </td></tr>";

                                    }else{
                                        $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </td></tr>";
                                    }
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if($queryDPE[$j]->ValorCargado != ''){
                                        $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                    <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-body'>
                                                                <img src='data:image/jpeg;base64," . $queryDPE[$j]->ValorCargado . "' class='img-responsive'>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </td></tr>";

                                    }else{
                                        $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </td></tr>";
                                    }

                                }else{
                                    if($queryDPE[$j]->ValorCargado != ''){
                                        $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                    <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-body'>
                                                                <img src='data:image/jpeg;base64," . $queryDPE[$j]->ValorCargado . "' class='img-responsive'>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </td></tr>";

                                    }else{
                                        $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </td></tr>";
                                    }
                                }
                            }
                    }
                    //MATRIZ DE TEXTO
                    if($queryDPE[$j]->Type == 'MatrizTexto'){

                            $rl='';

                            $rl2='';

                            $op=$queryDPE[$j]->ValorCargado;

                            $optM=json_decode($op,true);

                            $opt = explode(',', $queryDPE[$j]->Items);
                            for ($x = 0; $x < count($opt); $x++) {
                                    if($queryDPE[$j]->Requerido == 1){
                                        if($queryDPE[$j]->Maxm == 0){
                                            $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                            $rl2=$rl2."<td>
                                                <input type='text' class='matriztexto input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."' onkeyup='Capturar()' required onblur='GuardadoInput(this.name, this.value);'>
                                            </td>";

                                        }else{
                                            $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                            $rl2=$rl2."<td>
                                                    <input type='text' class='matriztexto input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."'  required onblur='GuardadoInput(this.name, this.value);' >
                                                </td>";
                                        }

                                    }else{
                                        if($queryDPE[$j]->Maxm == 0){
                                            $rl=$rl."<th>".$opt[$x]."' </th>";
                                            $rl2=$rl2."<td>
                                                    <input type='text' class='matriztexto input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' >
                                                </td>";

                                        }else{
                                            $rl=$rl."<th>".$opt[$x]."' </th>";
                                            $rl2=$rl2."<td>
                                                    <input type='text' class='matriztexto input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' >
                                                </td>";
                                        }
                                    }
                            }
                                    $res5="<tr><td> <table id='data-table' class='display table table-striped table-bordered table-responsive'><thead><tr><th></th>".$rl."</tr></thead><tbody>
                                        <tr><td>".$queryDPE[$j]->entrada."</td>".$rl2."</tbody></table>
                                        </td></tr>";
                    }
                    //MATRIZ NUMERO
                    if($queryDPE[$j]->Type == 'MatrizNúmero'){

                            $rl='';

                            $rl2='';

                            $op=$queryDPE[$j]->ValorCargado;

                            $optM=json_decode($op,true);

                            $opt = explode(',', $queryDPE[$j]->Items);

                            for ($x = 0; $x < count($opt); $x++) {
                                if($queryDPE[$j]->Requerido == 1){
                                    if($queryDPE[$j]->Maxm == 0){
                                        $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                            <input type='number'class='matriznumero input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onkeyup='Capturar()' required onblur='GuardadoInput(this.name, this.value);' >
                                         </td>";

                                    }else{
                                        $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                                <input type='number'class='matriznumero input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' required onblur='GuardadoInput(this.name, this.value);' >
                                             </td>";
                                    }

                                }else{
                                    if($queryDPE[$j]->Maxm == 0){
                                        $rl=$rl."<th>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                                <input type='number'class='matriznumero input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' >
                                             </td>";

                                    }else{
                                        $rl=$rl."<th>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                                <input type='number'class='matriznumero input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' >
                                             </td>";
                                    }
                                }
                            }
                                    $res5="<tr><td> <table id='data-table' class='display table table-striped table-bordered table-responsive'><thead><tr><th></th>".$rl."</tr></thead><tbody>
                                        <tr><td>".$queryDPE[$j]->entrada."</td>".$rl2."</tbody></table>
                                        </td></tr>";
                    }
                    //MATRIZ FECHA
                    if($queryDPE[$j]->Type == 'MatrizFecha'){

                            $rl='';

                            $rl2='';

                            $op=$queryDPE[$j]->ValorCargado;

                            $optM=json_decode($op,true);

                            $opt = explode(',', $queryDPE[$j]->Items);

                            for ($x = 0; $x < count($opt); $x++) {
                                if($queryDPE[$j]->Requerido == 1){
                                    if($queryDPE[$j]->Maxm == 0){
                                        $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                            <input style='width:100px' type='date' class='matrizfecha input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onchange='Capturar()' required onblur='GuardadoInput(this.name, this.value);' >
                                         </td>";

                                    }else{
                                        $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                                <input style='width:100px' type='date' class='matrizfecha input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onchange='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' required onblur='GuardadoInput(this.name, this.value);' >
                                             </td>";
                                    }

                                }else{
                                    if($queryDPE[$j]->Maxm == 0){
                                        $rl=$rl."<th>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                                <input style='width:100px' type='date' class='matrizfecha input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' >
                                             </td>";

                                    }else{
                                        $rl=$rl."<th>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                                <input style='width:100px' type='date' class='matrizfecha input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onchange='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' >
                                             </td>";
                                    }
                                }
                            }
                                    $res5="<tr><td> <table id='data-table' class='display table table-striped table-bordered table-responsive'><thead><tr><th></th>".$rl."</tr></thead><tbody>
                                        <tr><td>".$queryDPE[$j]->entrada."</td>".$rl2."</tbody></table>
                                        </td></tr>";
                    }
                        $data5[]=[$res5];
                        $data6[]=[$res6];
                        $j ++;
                    }
                }
                return array($data,$data2,$data3,$data4,$data5,$data6,$data7);
            }
        } catch (\Exception $e) {
            return array($e->getMessage(),$e->getCode(), $e->getLine());
        }
    }

    public function DatosPlantilla($id,$nombre,$TipoModalidad)
    {

        $res='';

        $res2='';

        $res3='';

        $res4='';

        $res5='';

        $res6='';

        $res7='';

        $condicionModalidad = ($TipoModalidad == "Presencial")?" master_ese_srv_entrada.Presencial = 1 ":" master_ese_srv_entrada.Telefonico=1 ";
        $queryDP = DB::select("select  DISTINCT(master_ese_contenedor.Etiqueta) as Grupo, master_ese_contenedor.IdContenedor,master_ese_agrupador.Etiqueta as Agrupador, master_ese_agrupador.IdAgrupador
        from master_ese_contenedor
        Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
        Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
        Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
        Where master_ese_srv_entrada.NomFEse ='{$nombre}' and  master_ese_contenedor.VisibleContactos=1 and master_ese_srv_entrada.VisibleOSClientes=1 and $condicionModalidad
        ");

        $data=array();

        $data2=array();

        $data3=array();

        $data4=array();

        $data5=array();

        $data6=array();

        $data7=array();

        for($i=0;$i<count($queryDP);$i++){
            $queryDPE = DB::select("select master_ese_srv_entrada.IdServicioEseEntrada,master_ese_entrada.Etiqueta as entrada,master_ese_entrada.IdEntrada, master_ese_entrada.Formato as Type,master_ese_entrada.Items,
            CAST(SUBSTRING_INDEX(master_ese_entrada.Longitud, 'c', -1) AS UNSIGNED) as Maxm, master_ese_srv_entrada.Requerido,master_ese_srv_entrada.VisibleForms,
            master_ese_entrada.CampoNombre,master_ese_agrupador.IdAgrupador,master_ese_entrada.Clasificacion,master_ese_entrada.CantidadApariciones,master_ese_srv_entrada.Indice,master_ese_srv_entrada.ValorCargado,master_ese_srv_entrada.NomFEse
            from master_ese_contenedor
            Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
            Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
            Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
            Where master_ese_contenedor.VisibleContactos=1 and master_ese_srv_entrada.VisibleOSClientes=1 and master_ese_srv_entrada.NomFEse='{$nombre}' and $condicionModalidad  order by master_ese_agrupador.IdAgrupador,master_ese_srv_entrada.Indice,master_ese_entrada.Orden");
            foreach($queryDP as $name){
                $res="<a style='display:none;' href=#".str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Grupo)))." aria-controls='".$queryDP[$i]->Grupo."' role='tab' data-toggle='tab'></a>";
                $res2="<span  role='tabpanel' id='".str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Grupo)))."' aria-labelledby='".str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Grupo)))."-tab'>
                </span>";
                $res3="<legend id='A".str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Agrupador)))."'>".$queryDP[$i]->Agrupador."</legend>";
                $res4=str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Grupo)));
                $res7=$queryDP[$i]->IdAgrupador;
                $data[$queryDP[$i]->IdContenedor]=[$res];
                $data2[$queryDP[$i]->IdContenedor]=[$res2];
                $data3[]=[$res3];
                $data4[]=[$res4];
                $data7[]=[$res7];
                $i ++;
            }
            for($j=0;$j<count($queryDPE);$j++){
                foreach ($queryDPE as $entr) {
                    $res6=$queryDPE[$j]->IdAgrupador;
                    //TEXTO
                if($queryDPE[$j]->Type == 'Texto'){
                        if($queryDPE[$j]->Requerido == 1){
                            if($queryDPE[$j]->Maxm == 0){
                                if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaCP(this.name)' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                    </span></td></tr>";
                                }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaCP(this.name)' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                    </span></td></tr>";

                                }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                    </span></td></tr>";

                                }else{
                                    $res5="<tr><td><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);UpdateCandidato(".$queryDPE[$j]->IdEntrada.",this.value,".$queryDPE[$j]->NomFEse.");' value='".$queryDPE[$j]->ValorCargado."'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                    </td></tr>";
                                }

                            }else{
                                if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                    <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onfocus='EtiquetaCP(this.name)' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                    </span></td></tr>";

                                }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                    <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                    </span></td></tr>";

                                }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                    <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                    </span></td></tr>";

                                }else{
                                    $res5="<tr><td><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class='input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);UpdateCandidato(".$queryDPE[$j]->IdEntrada.",this.value,".$queryDPE[$j]->NomFEse.");'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."' required>
                                    </td></tr>";
                                }
                            }

                        }else{
                            if($queryDPE[$j]->Maxm == 0){
                                if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' value='".$queryDPE[$j]->ValorCargado."' onfocus='EtiquetaCP(this.name)' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                    </span></td></tr>";

                                }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                    </span></td></tr>";

                                }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                    </span></td></tr>";

                                }else{
                                    $res5="<tr><td><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);UpdateCandidato(".$queryDPE[$j]->IdEntrada.",this.value,".$queryDPE[$j]->NomFEse."); '  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                    </td></tr>";
                                }

                            }else{
                                if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onfocus='EtiquetaCP(this.name)' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                    </span></td></tr>";

                                }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                    </span></td></tr>";

                                }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                    </span></td></tr>";

                                }else{
                                    $res5="<tr><td><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class='input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);UpdateCandidato(".$queryDPE[$j]->IdEntrada.",this.value,".$queryDPE[$j]->NomFEse.");'  data-titleInput='".$queryDPE[$j]->entrada."' data-nameese='".$nombre."'>
                                    </td></tr>";
                                }
                            }
                        }
                }
                //NÚMERO
                if($queryDPE[$j]->Type == 'Número'){
                    if($queryDPE[$j]->VisibleForms == 1){
                        if($queryDPE[$j]->Requerido == 1){
                            if($queryDPE[$j]->Maxm == 0){
                                $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."' required>
                                </span></td></tr>";

                            }else{
                                $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."' required>
                                </span></td></tr>";
                            }

                        }else{
                            if($queryDPE[$j]->Maxm == 0){
                                $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                </span></td></tr>";

                            }else{
                                $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                </span></td></tr>";
                            }
                        }
                    }
                }
                //Correo
                if($queryDPE[$j]->Type == 'Correo'){
                    if($queryDPE[$j]->VisibleForms == 1){
                        if($queryDPE[$j]->Requerido == 1){
                            if($queryDPE[$j]->Maxm == 0){
                                $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                <input min='0' type='email' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."' required>
                                </span></td></tr>";

                            }else{
                                $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                <input min='0' type='email' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."' required>
                                </span></td></tr>";
                            }

                        }else{
                            if($queryDPE[$j]->Maxm == 0){
                                $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                <input min='0' type='email' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                </span></td></tr>";

                            }else{
                                $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                <input min='0' type='email' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-nameese='".$nombre."'>
                                </span></td></tr>";
                            }
                        }
                    }
                }
                //Inicia validación de fecha de nacimiento
                if($queryDPE[$j]->Type == 'FechaNacimiento'){
                    if($queryDPE[$j]->VisibleForms == 1){
                        if($queryDPE[$j]->Requerido == 1){
                            if($queryDPE[$j]->Maxm == 0){
								if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->entrada == 'Fecha de nacimiento')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'>
                                    </span></td></tr>";
                                }
                            }else{
								if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->entrada == 'Fecha de nacimiento')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'>
                                    </span></td></tr>";
                                }
                            }
                        }else{
                            if($queryDPE[$j]->Maxm == 0){
								if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->entrada == 'Fecha de nacimiento')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'>
                                    </span></td></tr>";

                                }
                            }else{
								if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->entrada == 'Fecha de nacimiento')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'>
                                    </span></td></tr>";
                                }
                            }
                        }
                    }
                }
				//Finaliza validación de fecha de nacimiento
                //FECHA
                if($queryDPE[$j]->Type == 'Fecha'){
                        if($queryDPE[$j]->Requerido == 1){
                            if($queryDPE[$j]->Maxm == 0){
                                $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                <input type='date'  class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' required value='".$queryDPE[$j]->ValorCargado."'>
                                </td></tr>";

                            }else{
                                $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                <input type='date'  class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' required value='".$queryDPE[$j]->ValorCargado."'>
                                </td></tr>";
                            }

                        }else{
                            if($queryDPE[$j]->Maxm == 0){
                                $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'>
                                </td></tr>";
                            }else{
                                $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                <input type='date'  class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'>
                                </td></tr>";
                            }
                        }
                }
                //COMBO
                if($queryDPE[$j]->Type == 'Combo'){

                        $rl='';

                        $opt = explode(',', $queryDPE[$j]->Items);

                        $valu = $queryDPE[$j]->ValorCargado;

                        for ($x = 0; $x < count($opt); $x++) {
                                if ($valu==$opt[$x]){
                                    $rl=$rl."<option selected value='".$opt[$x]."'>".$opt[$x]."</option>";
                                  }else{
                                    $rl=$rl."<option value='".$opt[$x]."' >".$opt[$x]."</option>";
                                  }
                        }
                        if($queryDPE[$j]->Requerido == 1){
                            if($queryDPE[$j]->Maxm == 0){
                                if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."' required>
                                    <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                    </select>
                                    </span></td></tr>";

                                }else{
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."' required>
                                    <option value=''>Seleccione una Opción</option>
                                    ".$rl."
                                    </select>
                                    </td></tr>";
                                }

                            }else{
                                if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."' required>
                                    <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                    </select>
                                    </span></td></tr>";

                                }else{
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."' required>
                                    <option value=''>Seleccione una Opción</option>
                                    ".$rl."
                                    </select>
                                    </td></tr>";
                                }
                            }

                        }else{
                            if($queryDPE[$j]->Maxm == 0){
                                if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."'>
                                    <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                        </select>
                                        </span></td></tr>";

                                }else{
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                    <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."'>
                                    <option value=''>Seleccione una Opción</option>
                                    ".$rl."
                                    </select>
                                    </td></tr>";
                                }

                            }else{
                                if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                    $res5="<tr><td><span class='".str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_"."{$nombre}"."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."'>
                                    <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                        </select>
                                        </span></td></tr>";

                                }else{
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                    <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar();GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-nameese='".$nombre."'>
                                    <option value=''>Seleccione una Opción</option>
                                    ".$rl."
                                    </select>
                                    </td></tr>";
                                }
                            }
                        }
                }
                //PDF
                if($queryDPE[$j]->Type == 'PDF'){
                        if($queryDPE[$j]->Requerido == 1){
                            if($queryDPE[$j]->Maxm == 0){
                                if($queryDPE[$j]->ValorCargado != ''){
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                        <div class='form-group'>
                                            <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                            <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                            <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-body'>
                                                    <iframe src='data:application/pdf;base64," . $queryDPE[$j]->ValorCargado . "' frameborder='0' scrolling='no' width='565' height='500'></iframe>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div id='lbError' class='warning'></div>
                                        </div>
                                    </form>
                                    </td></tr>";

                                }else{
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                        <div class='form-group'>
                                            <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                            <div id='lbError' class='warning'></div>
                                        </div>
                                    </form>
                                    </td></tr>";
                                }

                            }else{
                                if($queryDPE[$j]->ValorCargado != ''){
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                        <div class='form-group'>
                                            <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                            <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                            <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-body'>
                                                    <iframe src='data:application/pdf;base64," . $queryDPE[$j]->ValorCargado . "' frameborder='0' scrolling='no' width='565' height='500'></iframe>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div id='lbError' class='warning'></div>
                                        </div>
                                    </form>
                                    </td></tr>";

                                }else{
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                        <div class='form-group'>
                                            <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                            <div id='lbError' class='warning'></div>
                                        </div>
                                    </form>
                                    </td></tr>";
                                }
                            }

                        }else{
                            if($queryDPE[$j]->Maxm == 0){
                                if($queryDPE[$j]->ValorCargado != ''){
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                    <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                        <div class='form-group'>
                                            <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                            <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                            <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-body'>
                                                    <iframe src='data:application/pdf;base64," . $queryDPE[$j]->ValorCargado . "' frameborder='0' scrolling='no' width='565' height='500'></iframe>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div id='lbError' class='warning'></div>
                                        </div>
                                    </form>
                                    </td></tr>";

                                }else{
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                    <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                        <div class='form-group'>
                                            <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                            <div id='lbError' class='warning'></div>
                                        </div>
                                    </form>
                                    </td></tr>";
                                }

                            }else{
                                if($queryDPE[$j]->ValorCargado != ''){
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                    <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                        <div class='form-group'>
                                            <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                            <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                            <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-body'>
                                                    <iframe src='data:application/pdf;base64," . $queryDPE[$j]->ValorCargado . "' frameborder='0' scrolling='no' width='565' height='500'></iframe>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div id='lbError' class='warning'></div>
                                        </div>
                                    </form>
                                    </td></tr>";

                                }else{
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                    <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                        <div class='form-group'>
                                            <input type='file' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                            <div id='lbError' class='warning'></div>
                                        </div>
                                    </form>
                                    </td></tr>";
                                }
                            }
                        }
                }
                //MONEDA
                if($queryDPE[$j]->Type == 'Moneda'){
                        if($queryDPE[$j]->Requerido == 1){
                            if($queryDPE[$j]->Maxm == 0){
                                $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                <div class='input-group'>
                                    <span class='input-group-addon'>$</span>
                                    <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' required>
                                </div>
                                </td></tr>";

                            }else{
                                $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                <div class='input-group'>
                                    <span class='input-group-addon'>$</span>
                                    <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' required>
                                </div>
                                </td></tr>";
                            }

                        }else{
                            if($queryDPE[$j]->Maxm == 0){
                                $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                <div class='input-group'>
                                    <span class='input-group-addon'>$</span>
                                    <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'>
                                </div>
                                </td></tr>";

                            }else{
                                $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                <div class='input-group'>
                                    <span class='input-group-addon'>$</span>
                                    <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'>
                                </div>
                                </td></tr>";
                            }
                        }
                }
                //SELECCION MULTIPLE
                if($queryDPE[$j]->Type == 'Selección Multiple'){

                        $rl='';

                        $opt = explode(',', $queryDPE[$j]->Items);
                        for ($x = 0; $x < count($opt); $x++) {
                            if($queryDPE[$j]->Requerido == 1){
                                $rl=$rl."<label><input type='checkbox' class=' entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$opt[$x]."' required> ".$opt[$x]."</label><br>";
                            }else{
                                $rl=$rl."<label><input type='checkbox' class=' entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' value='".$opt[$x]."' > ".$opt[$x]."</label><br>";
                            }
                        }
                        if($queryDPE[$j]->Requerido == 1){
                            if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td><br><br>
                                    ".$rl."
                                    </td></tr>";
                            }else{
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td><br><br>
                                    ".$rl."
                                    </td></tr>";
                            }
                        }else{
                            if($queryDPE[$j]->Maxm == 0){
                                $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td><br><br>
                                ".$rl."
                                </td></tr>";

                            }else{
                                $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td><br><br>
                                ".$rl."
                                </td></tr>";
                            }
                        }
                }
                //JPEG
                if($queryDPE[$j]->Type == 'JPEG'){
                        if($queryDPE[$j]->Requerido == 1){
                            if($queryDPE[$j]->Maxm == 0){
                                if($queryDPE[$j]->ValorCargado != ''){
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-body'>
                                                            <img src='data:image/jpeg;base64," . $queryDPE[$j]->ValorCargado . "' class='img-responsive'>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";

                                }else{
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";
                                }

                            }else{
                                if($queryDPE[$j]->ValorCargado != ''){
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-body'>
                                                            <img src='data:image/jpeg;base64," . $queryDPE[$j]->ValorCargado . "' class='img-responsive'>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";

                                }else{
                                    $res5="<tr><td><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";
                                }
                            }

                        }else{
                            if($queryDPE[$j]->Maxm == 0){
                                if($queryDPE[$j]->ValorCargado != ''){
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-body'>
                                                            <img src='data:image/jpeg;base64," . $queryDPE[$j]->ValorCargado . "' class='img-responsive'>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";

                                }else{
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";
                                }

                            }else{
                                if($queryDPE[$j]->ValorCargado != ''){
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                <div id='myModal".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-body'>
                                                            <img src='data:image/jpeg;base64," . $queryDPE[$j]->ValorCargado . "' class='img-responsive'>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";

                                }else{
                                    $res5="<tr><td>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <input type='file' accept='.jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </td></tr>";
                                }
                            }
                        }
                }
                //MATRIZ DE TEXTO
                if($queryDPE[$j]->Type == 'MatrizTexto'){

                        $rl='';

                        $rl2='';

                        $op=$queryDPE[$j]->ValorCargado;

                        $optM=json_decode($op,true);

                        $opt = explode(',', $queryDPE[$j]->Items);
                        for ($x = 0; $x < count($opt); $x++) {
                                if($queryDPE[$j]->Requerido == 1){
                                    if($queryDPE[$j]->Maxm == 0){
                                        $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                            <input type='text' class='matriztexto input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."' onkeyup='Capturar()' required onblur='GuardadoInput(this.name, this.value);'>
                                        </td>";

                                    }else{
                                        $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                                <input type='text' class='matriztexto input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."'  required onblur='GuardadoInput(this.name, this.value);' >
                                            </td>";
                                    }

                                }else{
                                    if($queryDPE[$j]->Maxm == 0){
                                        $rl=$rl."<th>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                                <input type='text' class='matriztexto input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' >
                                            </td>";

                                    }else{
                                        $rl=$rl."<th>".$opt[$x]."' </th>";
                                        $rl2=$rl2."<td>
                                                <input type='text' class='matriztexto input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' >
                                            </td>";
                                    }
                                }
                        }
                                $res5="<tr><td> <table id='data-table' class='display table table-striped table-bordered table-responsive'><thead><tr><th></th>".$rl."</tr></thead><tbody>
                                    <tr><td>".$queryDPE[$j]->entrada."</td>".$rl2."</tbody></table>
                                    </td></tr>";
                }
                //MATRIZ NUMERO
                if($queryDPE[$j]->Type == 'MatrizNúmero'){

                        $rl='';

                        $rl2='';

                        $op=$queryDPE[$j]->ValorCargado;

                        $optM=json_decode($op,true);

                        $opt = explode(',', $queryDPE[$j]->Items);

                        for ($x = 0; $x < count($opt); $x++) {

                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                    $rl2=$rl2."<td>
                                        <input type='number'class='matriznumero input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onkeyup='Capturar()' required onblur='GuardadoInput(this.name, this.value);' >
                                     </td>";

                                }else{
                                    $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                    $rl2=$rl2."<td>
                                            <input type='number'class='matriznumero input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' required onblur='GuardadoInput(this.name, this.value);' >
                                         </td>";
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    $rl=$rl."<th>".$opt[$x]."' </th>";
                                    $rl2=$rl2."<td>
                                            <input type='number'class='matriznumero input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onkeyup='Capturar()' onblur='GuardadoInput(this.name, this.value);' >
                                         </td>";

                                }else{
                                    $rl=$rl."<th>".$opt[$x]."' </th>";
                                    $rl2=$rl2."<td>
                                            <input type='number'class='matriznumero input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onkeyup='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' >
                                         </td>";
                                }
                            }
                        }
                                $res5="<tr><td> <table id='data-table' class='display table table-striped table-bordered table-responsive'><thead><tr><th></th>".$rl."</tr></thead><tbody>
                                    <tr><td>".$queryDPE[$j]->entrada."</td>".$rl2."</tbody></table>
                                    </td></tr>";
                }
                //MATRIZ FECHA
                if($queryDPE[$j]->Type == 'MatrizFecha'){

                        $rl='';

                        $rl2='';

                        $op=$queryDPE[$j]->ValorCargado;

                        $optM=json_decode($op,true);

                        $opt = explode(',', $queryDPE[$j]->Items);

                        for ($x = 0; $x < count($opt); $x++) {

                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                    $rl2=$rl2."<td>
                                        <input style='width:100px' type='date' class='matrizfecha input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onchange='Capturar()' required onblur='GuardadoInput(this.name, this.value);' >
                                     </td>";

                                }else{
                                    $rl=$rl."<th id='requerido'>".$opt[$x]."' </th>";
                                    $rl2=$rl2."<td>
                                            <input style='width:100px' type='date' class='matrizfecha input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onchange='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' required onblur='GuardadoInput(this.name, this.value);' >
                                         </td>";
                                }

                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    $rl=$rl."<th>".$opt[$x]."' </th>";
                                    $rl2=$rl2."<td>
                                            <input style='width:100px' type='date' class='matrizfecha input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onchange='Capturar()' onblur='GuardadoInput(this.name, this.value);' >
                                         </td>";

                                }else{
                                    $rl=$rl."<th>".$opt[$x]."' </th>";
                                    $rl2=$rl2."<td>
                                            <input style='width:100px' type='date' class='matrizfecha input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onchange='Capturar()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' >
                                         </td>";
                                }
                            }
                        }
                                $res5="<tr><td> <table id='data-table' class='display table table-striped table-bordered table-responsive'><thead><tr><th></th>".$rl."</tr></thead><tbody>
                                    <tr><td>".$queryDPE[$j]->entrada."</td>".$rl2."</tbody></table>
                                    </td></tr>";
                }
                    $data5[]=[$res5];
                    $data6[]=[$res6];
                    $j ++;
                }
            }
            return array($data,$data2,$data3,$data4,$data5,$data6,$data7);
        }
      }

      public function valuescampos(Request $request)
    {
        $datos=$request->input('name');
        $res='';
        $rl='';
        $queryf = DB::select("Select master_ese_entrada.Formato From master_ese_entrada
        Inner Join master_ese_srv_entrada on master_ese_srv_entrada.IdEntrada=  master_ese_entrada.IdEntrada
        where master_ese_srv_entrada.IdServicioEseEntrada = $datos");

        foreach ($queryf as $f) {
            $fr=$f->Formato;
        }
        if($fr=='Selección Multiple'){
            $query = DB::select("Select master_ese_srv_entrada.ValorCargado From master_ese_srv_entrada
            Inner Join master_ese_entrada on master_ese_entrada.IdEntrada=  master_ese_srv_entrada.IdEntrada
            where master_ese_srv_entrada.IdServicioEseEntrada = $datos and master_ese_entrada.Formato='Selección Multiple'");
            foreach ($query as $opt) {
                $im=$opt->ValorCargado;
            }
        }
        if($fr=='MatrizTexto'){
            $query = DB::select("Select master_ese_srv_entrada.ValorCargado From master_ese_srv_entrada
            Inner Join master_ese_entrada on master_ese_entrada.IdEntrada=  master_ese_srv_entrada.IdEntrada
            where master_ese_srv_entrada.IdServicioEseEntrada = $datos and master_ese_entrada.Formato='MatrizTexto'");
            foreach ($query as $opt) {
                $im=$opt->ValorCargado;
            }
        }
        if($fr=='MatrizFecha'){
            $query = DB::select("Select master_ese_srv_entrada.ValorCargado From master_ese_srv_entrada
            Inner Join master_ese_entrada on master_ese_entrada.IdEntrada=  master_ese_srv_entrada.IdEntrada
            where master_ese_srv_entrada.IdServicioEseEntrada = $datos and master_ese_entrada.Formato='MatrizFecha'");
            foreach ($query as $opt) {
                $im=$opt->ValorCargado;
            }
        }
        if($fr=='MatrizNúmero'){
            $query = DB::select("Select master_ese_srv_entrada.ValorCargado From master_ese_srv_entrada
            Inner Join master_ese_entrada on master_ese_entrada.IdEntrada=  master_ese_srv_entrada.IdEntrada
            where master_ese_srv_entrada.IdServicioEseEntrada = $datos and master_ese_entrada.Formato='MatrizNúmero'");
            foreach ($query as $opt) {
                $im=$opt->ValorCargado;
            }
        }
        return array($datos,$im,$fr);
    }

    public function GuardarFile(Request $request,$id){
        //obtenemos el campo file definido en el formulario
            $file = $request->file($id);

            $imagedata = file_get_contents($file);

            $base64 = base64_encode($imagedata);

            $srv_entr = MasterEseServicioEntrada::where('IdServicioEseEntrada', $id)->first();

            $srv_entr->update(['ValorCargado' => $base64]);

            return response()->json('success');
    }

      public function GuardarEstudio(Request $request)
      {
        $valuesEntr=$request->input('valuesEntr');
        $keysEntr=$request->input('keysEntr');
        $id=$request->input('IdServicioEse');
        for($i=0;$i<count($keysEntr);$i++){
                $srv_entr = MasterEseServicioEntrada::where('IdServicioEseEntrada', $keysEntr[$i])->first();
                $srv_entr->update(['ValorCargado' => $valuesEntr[$i]]);
        }
            return response()->json(array(
                'status_alta' => 'success',
                'IdServicioEse' => $id,
            ));
    }
//SE CAMBIO EL QUERY PARA REALIZAR LA VALIDACIÓN SOBRE LOS CAMPOS REQUERIDOS
    public function GuardarEstudioInput($id,$value,$ids, $type)
    {
        if(($type == 'matriztexto')||($type == 'matriznumero')||($type == 'matrizfecha')){
            $result=explode(',',$value);
            $value=json_encode($result, JSON_FORCE_OBJECT);
        }
              $srv_entr = MasterEseServicioEntrada::where('IdServicioEseEntrada', $id)->first();
              $srv_entr->update(['ValorCargado' => $value]);

        $calculado = DB::select("select mec.idContenedor,
        case 
            when mesa.ValorCargado is null then false
            when mee.Formato = 'Combo' then mee.Items like concat('%',concat(mesa.ValorCargado, '%'))
            when mee.Formato in ('Fecha', 'Moneda', 'Número', 'TextArea', 'Texto') and (length(mesa.ValorCargado) > cast(replace(mee.Longitud, 'C','') as UNSIGNED) or length(mesa.ValorCargado) = 0 ) then false
            when mee.Formato = 'JPEG' and (length(mesa.ValorCargado) = 0 or mesa.ValorCargado is null) then false
            when mee.Formato = 'Checkbox' and mesa.ValorCargado not in ('No', 'Si') then false 
            else true
        end as isValid 
        from master_ese_contenedor mec
        Inner Join master_ese_agrupador mea  ON mea.IdContenedor = mec.IdContenedor
        Inner Join master_ese_entrada mee ON mee.IdAgrupador = mea.IdAgrupador
        Inner Join master_ese_srv_entrada mesa ON mesa.IdEntrada = mee.IdEntrada
        where mesa.IdServicioEse = ? and mesa.Requerido = 1 and mec.IdContenedor = (select mea.IdContenedor  from master_ese_srv_entrada mese 
        join master_ese_entrada mee on mese.IdEntrada = mee.IdEntrada 
        join master_ese_agrupador mea on mee.IdAgrupador = mea.IdAgrupador 
        where mese.IdServicioEseEntrada = ?)", [$ids,$id]);

        $toValido = true;
            foreach ($calculado as $c) {
                $dato=$c->idContenedor;
                if ($c->isValid ==false){
                    $toValido = false;
                }
            }

            if($toValido){
                $result = 'verde';
            }else {
                $result = 'amarrillo';
            }

    
    return response()->json(array($dato,$result));
  }

  public function ServClientes($idc,$ids)
  {
    $Servicio=DB::select("select ms.IdServicioEse, mp.IdTipoServicio, mp.DescripcionPlantilla, mp.IdTipos, mp.IdPlantilla, ms.IdPlantillaCliente,ms.IdPrioridad, ms.IdModalidad
    from master_ese_plantilla mp inner join master_ese_plantilla_cliente mpc on mp.IdPlantilla = mpc.IdPlantilla
    inner join master_ese_srv_servicio ms on ms.IdPlantillaCliente = mpc.IdPlantillaCliente
    where ms.IdCliente = $idc and ms.Estatus='Creada' and  mp.IdTipoServicio=$ids");
    $IdTipoServicio = $ids;
    $cont=0;
    $IdServicioEse = $Servicio[0]->IdServicioEse;
    $ids="0";
    foreach ($Servicio as $sp) {
        $IdServicio = $sp->IdTipoServicio;
        $nplantilla = $sp->DescripcionPlantilla;
        $tserv = $sp->IdTipos;
        $IdPlantilla = $sp->IdPlantilla;
        $IdPlantillaCliente = $sp->IdPlantillaCliente;
        $IdModalidad = $sp->IdModalidad;
        $IdPrioridad = $sp->IdPrioridad;
        $ids.=",$sp->IdServicioEse";
        $cont++;
    }
      $nservicio=DB::select("SELECT Descripcion FROM master_ese_tiposervicio WHERE IdTipoServicio=$IdServicio");
      foreach ($nservicio as $sp) {
                      $nomserv = $sp->Descripcion;
      }
      if($tserv!=null){
          $tservicios=DB::select("SELECT * FROM master_ese_tipos WHERE IdTipos=$tserv");
      }else{
          $tservicios=DB::select("SELECT * FROM master_ese_tipos");
      }
      if($IdModalidad!=null){
          $modalidades=DB::select("SELECT * FROM master_ese_modalidad ORDER BY IdModalidad=$IdModalidad DESC");
      }else{
          $modalidades=DB::select("SELECT * FROM master_ese_modalidad");
      }
      if($IdPrioridad!=null){
          $prioridades=DB::select("SELECT * FROM master_ese_prioridades ORDER BY IdPrioridad=$IdPrioridad DESC");
      }else{
          $prioridades=DB::select("SELECT * FROM master_ese_prioridades");
      }

      $plantillas=DB::select("SELECT IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla WHERE IdPlantilla=$IdPlantilla");
      $plantillaG=DB::select("Select IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla WHERE IdTipoServicio= $IdServicio and IdPlantilla=$IdPlantilla");
      $plantillasPorClientes = MasterConsultas::exeSQL("PlantillaPorCliente","READONLY",array("IdCliente" =>"$idc","IdTipos" =>"$tserv","IdTipoServicio"=>"$IdTipoServicio"));
      return view("ESE.NuevaOSCliente.nuevaOSClienteedit",
                ["tservicios"=>$tservicios,
                 "servi"=>$IdServicio, 
                 "plantillas"=>$plantillas,
                 "plantillaG"=>$plantillaG , 
                 "IdCliente"=>$idc,
                 "nservicio"=>$nomserv,
                 "IdServicioEse"=>$IdServicioEse,
                 "IdPlantillaCliente"=>$IdPlantillaCliente,
                 "IdPlantilla"=>$IdPlantilla,
                 "modalidades"=>$modalidades,
                 "prioridades"=>$prioridades,
                 "ids"=>$ids,
                 "cont"=>$cont,
                 "plantillasPorClientes" => $plantillasPorClientes
                ]);
  }

  public function SolicitarOSC($idc,$ids)
  {
    try {
        $sql = DB::select("Select ms.IdServicioEse, mp.IdTipoServicio,ms.Estatus as EstatusESE,mos.Estatus as EstatusOS,mem.Descripcion as modalidad
        from master_ese_srv_servicio ms Inner Join master_ese_srv_os mos on mos.IdServicioSRV = ms.IdServicioEse
        Inner join master_ese_plantilla_cliente mpc on mpc.IdPlantillaCliente = ms.IdPlantillaCliente
        Inner Join master_ese_plantilla mp ON mp.IdPlantilla = mpc.IdPlantilla 
		INNER JOIN master_ese_modalidad mem ON mem.IdModalidad = ms.IdModalidad
        where ms.IdCliente = $idc and ms.Estatus='Creada' and  mp.IdTipoServicio=$ids");
        foreach ($sql as $g) {
             DB::update("update master_ese_srv_servicio set Estatus='Creada' where IdServicioEse = $g->IdServicioEse");
              DB::update("update master_ese_srv_os set Estatus='En Proceso', FechaCierre=null where IdServicioSRV = $g->IdServicioEse");
              $IdServicioEse = $g->IdServicioEse;
              $EstadoCandidato = "";
              $EstadoMunicipioColonia = DB::select("SELECT mese.ValorCargado, mee.CampoNombre FROM master_ese_srv_entrada mese
                                                  INNER JOIN master_ese_entrada mee ON (mee.IdEntrada = mese.IdEntrada)
                                                  WHERE mese.IdServicioEse = ? AND (mee.CampoNombre = 'EstadoRepublica' OR mee.CampoNombre = 'MunicipioEstado' OR mee.CampoNombre = 'Colonia')
                                                  ORDER BY mee.IdEntrada DESC", [$IdServicioEse]);
              if(count($EstadoMunicipioColonia) > 0){
                  foreach($EstadoMunicipioColonia as $item){
                      if($item->CampoNombre == "EstadoRepublica") $EstadoCandidato = $item->ValorCargado; 
                  }
              }
              /*se obtiene el analista y analista secundario con menos servicios asigandos  */
              $LastAnalist = MasterConsultas::exeSQL("getLastAnalistOrInvestigator","READONLY",array("_type"=>"analist","_idc"=>"$idc"));
              $LastAnalist = (count($LastAnalist) > 0)?$LastAnalist[0]->IdAnalistOrIdInvestigator:226;
              $LastAnalistSecundary = MasterConsultas::exeSQL("getLastAnalistOrInvestigator","READONLY",array("_type"=>"analistSecundary"));
              $LastAnalistSecundary = (count($LastAnalistSecundary) > 0)?$LastAnalistSecundary[0]->IdAnalistOrIdInvestigator:0;
              $LastLider = MasterConsultas::exeSQL("getLastLider","READONLY",array("_type"=>"lider","_idc"=>"$idc"));
              $LastLider = (count($LastLider) > 0)?$LastLider[0]->IdLider:0;
              //se asigna el id del "No aplica Investigador" cuando el tipo de modalidad es telefonica
              $investigator =  0;
              DB::table('master_ese_srv_asignacion')
                      ->where('IdServicioEse', $IdServicioEse)
                      ->update([
                          'IdLider' => ($LastLider > 0)?$LastLider:null,
                          'IdAnalista' => ($LastAnalist > 0)?$LastAnalist:null,
                          'IdAnalistaSec' => ($LastAnalistSecundary > 0)?$LastAnalistSecundary:null,
                          'IdInvestigador' => ($investigator > 0)?$investigator:null
                      ]);       
                $ntf = new Notificaciones();
            if($LastLider != null)
              $ntf->notificaUsuarios($g->IdServicioEse,'LIDER-SOLICITUD','Lider',$LastLider);
            if($idc != null) {
                $clt = DB::select("select u.id from users u inner join master_ese_srv_servicio ms on u.IdCliente=ms.IdCliente where IdServicioEse = $IdServicioEse");
                $ntf->notificaUsuarios($g->IdServicioEse,'CLTE-NOTIFICACION','Cliente',$clt[0]->id);
            }
            
        }   // query de insertar nueva solicitud, cierre y cancelacion en la tabla Listado Kardex DINAMICO
            $Nombre_usuario = Auth::user();
                DB::table("kardex_general")->insert(["id_cn"=>$idc,"id_usuario"=>$Nombre_usuario->id,"id_modulo"=>6,"id_submodulo"=>26,"id_accion"=>1,"id_objeto"=>$ids,"descripcion"=>"Se genero nueva solicitud: $Nombre_usuario->username","fecha"=>date("Y-m-d H:i:sa")]);
            return array($idc);
    } catch (\Exception $e) {
        return array($idc,"error: ".$e->getMessage()." ".$e->getLine());
    }
  }

  public function FiltroPCR($cliente)

    {
        $clientes=DB::select("SELECT id as IdCliente,nombre_comercial as Nombre FROM clientes ORDER BY id  asc");
        $servicios=DB::select("select IdTipoServicio, Descripcion, DescripcionServicioInfo,TotServ, Color  FROM
        ((Select mp.IdTipoServicio AS IdTipoServicio, serv.Color as Color, serv.Descripcion AS Descripcion,serv.DescripcionServicioInfo AS DescripcionServicioInfo, count(mp.IdTipoServicio) as TotServ
        from master_ese_srv_servicio ms Inner join master_ese_plantilla_cliente mpc on mpc.IdPlantillaCliente = ms.IdPlantillaCliente
        Inner Join master_ese_plantilla mp ON mp.IdPlantilla = mpc.IdPlantilla
        Inner Join master_ese_tiposervicio serv ON serv.IdTipoServicio = mp.IdTipoServicio
        where ms.IdCliente = $cliente and ms.Estatus='Creada' GROUP BY serv.IdTipoServicio) UNION ALL
        (Select ts.IdTipoServicio AS IdTipoServicio, ts.Color as Color, ts.Descripcion AS Descripcion,ts.DescripcionServicioInfo AS DescripcionServicioInfo, 0 as TotServ
        From master_ese_tiposervicio as ts )) as TServ GROUP BY IdTipoServicio");
        return view("ESE.NuevaOSCliente.nuevaOSClientexCliente",["clientes"=>$clientes, "servicios"=>$servicios,'cntC'=>$cliente]);
    }

    public function UpdatePrioridad($idp,$idse)
    {
     DB::update("update master_ese_srv_servicio set IdPrioridad=$idp where IdServicioEse = $idse");
     $queryNP = DB::select("select Descripcion as NPrioridad from master_ese_prioridades WHERE IdPrioridad=$idp");
        foreach($queryNP as $p){
            $NPrioridad=$p->NPrioridad;
        }
     return array($NPrioridad);
    }

    public function UpdateModalidad($idm,$idse)
    {
     DB::update("update master_ese_srv_servicio set IdModalidad=$idm where IdServicioEse = $idse");
     return array(0);
    }

  public function ConfiguracionOSEdit($id,$idc)
    {
      // edicion de servicios o servicios pendientes
        $IdServicioEse = $id;
        $Servicio=DB::select("select ms.IdServicioEse, mp.IdTipoServicio, mp.DescripcionPlantilla, mp.IdTipos, mp.IdPlantilla, ms.IdPlantillaCliente,ms.IdPrioridad, ms.IdModalidad
        from master_ese_plantilla mp inner join master_ese_plantilla_cliente mpc on mp.IdPlantilla = mpc.IdPlantilla
        inner join master_ese_srv_servicio ms on ms.IdPlantillaCliente = mpc.IdPlantillaCliente
        where ms.IdServicioEse=$IdServicioEse");
        foreach ($Servicio as $sp) {
            $IdServicio = $sp->IdTipoServicio;
            $nplantilla = $sp->DescripcionPlantilla;
            $tserv = $sp->IdTipos;
            $IdPlantilla = $sp->IdPlantilla;
            $IdPlantillaCliente = $sp->IdPlantillaCliente;
            $IdModalidad = $sp->IdModalidad;
            $IdPrioridad = $sp->IdPrioridad;
        }
    $nservicio=DB::select("SELECT Descripcion FROM master_ese_tiposervicio WHERE IdTipoServicio=$IdServicio");
    foreach ($nservicio as $sp) {
                    $nomserv = $sp->Descripcion;
    }
    $v="0";
    if($tserv!=null){
        $tservicios=DB::select("SELECT * FROM master_ese_tipos WHERE IdTipos=$tserv");

    }else{
        $tservicios=DB::select("SELECT * FROM master_ese_tipos");
    }
    if($IdModalidad!=null){
        $modalidades=DB::select("SELECT * FROM master_ese_modalidad ORDER BY IdModalidad=$IdModalidad DESC");

    }else{
        $modalidades=DB::select("SELECT * FROM master_ese_modalidad");
    }
    if($IdPrioridad!=null){
        $prioridades=DB::select("SELECT * FROM master_ese_prioridades ORDER BY IdPrioridad=$IdPrioridad DESC");

    }else{
        $prioridades=DB::select("SELECT * FROM master_ese_prioridades");
    }
    $plantillas=DB::select("SELECT IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla WHERE IdPlantilla=$IdPlantilla");
    $plantillaG=DB::select("Select IdPlantilla,DescripcionPlantilla FROM master_ese_plantilla WHERE IdTipoServicio= $IdServicio and IdPlantilla=$IdPlantilla");
    return view("ESE.NuevaOSCliente.nuevaOSClienteedit",[ "tservicios"=>$tservicios,"servi"=>$IdServicio, "plantillas"=>$plantillas,"plantillaG"=>$plantillaG , "VaIn"=>$v, "id"=>0, "IdCliente"=>$idc,"nservicio"=>$nomserv,"IdServicioEse"=>$IdServicioEse,"IdPlantillaCliente"=>$IdPlantillaCliente,"IdPlantilla"=>$IdPlantilla,"modalidades"=>$modalidades,"prioridades"=>$prioridades]);
    }

    public function FormatosTab($id){
        $res='';

        $res2='';

        $TipoModalidad = "";

        $data=array();

        $data2=array();

        $dataModalidad = array();

        $queryFormatos = DB::select("select master_ese_srv_entrada.IdServicioEseEntrada,master_ese_entrada.Etiqueta as entrada, master_ese_srv_entrada.NomFEse,
        master_ese_agrupador.IdAgrupador,master_ese_entrada.Clasificacion,master_ese_entrada.CantidadApariciones,master_ese_contenedor.IdContenedor,
        mem.Descripcion from master_ese_contenedor Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
        Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
        Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
        INNER JOIN master_ese_srv_servicio mess ON master_ese_srv_entrada.IdServicioEse = mess.IdServicioEse
        INNER JOIN master_ese_modalidad mem ON mess.IdModalidad = mem.IdModalidad
        Where master_ese_srv_entrada.IdServicioEse = $id and master_ese_srv_entrada.VisibleForms =1 and master_ese_contenedor.VisibleContactos=1
        group by master_ese_srv_entrada.NomFEse order by master_ese_agrupador.IdAgrupador,master_ese_srv_entrada.Indice,master_ese_entrada.Orden;");
        for($i=0;$i<count($queryFormatos);$i++){
            foreach($queryFormatos as $name){
                $res=$queryFormatos[$i]->NomFEse;
                $data[]=[$res];
                $data2[]=[$res2];
                $dataModalidad[] = [$queryFormatos[$i]->Descripcion]; 
                $i++;
            }
        }
        return array($data,$data2,$dataModalidad);
    }

    public function title($id){
        $Servicios=DB::select("Select ms.IdServicioEse, mp.IdTipoServicio, serv.Descripcion,ms.IdCliente, mc.Nombre as Cliente,mp.DescripcionPlantilla as Formato,
        ms.FechaCreacion,ms.IdPrioridad,ms.IdModalidad,
        (select p.Descripcion from master_ese_prioridades as p where p.IdPrioridad = ms.IdPrioridad) as Prioridad,
        ( select m.Descripcion from master_ese_modalidad as m where m.IdModalidad = ms.IdModalidad) Modalidad,
        (select ValorCargado from master_ese_srv_entrada where IdEntrada = 1 and IdServicioEse = ms.IdServicioEse) as Candidato
        from master_ese_srv_servicio ms Inner join master_ese_plantilla_cliente mpc on mpc.IdPlantillaCliente = ms.IdPlantillaCliente
        Inner Join master_ese_plantilla mp ON mp.IdPlantilla = mpc.IdPlantilla
        Inner Join master_ese_tiposervicio serv ON serv.IdTipoServicio = mp.IdTipoServicio
        Inner Join master_clientes mc ON mc.IdCliente = ms.IdCliente
        where ms.IdServicioEse = $id");
        $candidato = ($Servicios[0]->Candidato=='')?"N/A":$Servicios[0]->Candidato;
        $result = $candidato."-".$Servicios[0]->Descripcion."-".$Servicios[0]->Modalidad."-".$Servicios[0]->Prioridad."-".$Servicios[0]->IdPrioridad."-".$Servicios[0]->IdModalidad."-".$Servicios[0]->IdTipoServicio;
        return $result;
    }

    public function FPlantillasCOS($ids,$IdCliente,$IdTipoServicio)
    {
        $rl="<option value=''>Seleccione una Plantilla</option>";
        $plantillas = MasterConsultas::exeSQL("PlantillaPorCliente","READONLY",array("IdCliente" =>"$IdCliente","IdTipos" =>"$ids","IdTipoServicio"=>"$IdTipoServicio"));
        foreach ($plantillas as $optL) {
            if($optL->IdPlantilla != null){
                $value = $optL->IdPlantilla."-".$optL->IdPlantillaCliente;
                $rl=$rl."<option value='".$value."' >".$optL->NombrePlantilla."</option>";
            }
        }
        return array($rl);
    }
    /** * Show the form for creating a new resource.  ** @return \Illuminate\Http\Response */
    /** * Store a newly created resource in storage. ** @param  \Illuminate\Http\Request  $request * @return \Illuminate\Http\Response */
    /** * Display the specified resource.** @param  int  $id * @return \Illuminate\Http\Response */
    /** * Show the form for editing the specified resource. ** @param  int  $id* @return \Illuminate\Http\Response */
    /** * Update the specified resource in storage.** @param  \Illuminate\Http\Request  $request * @param  int  $id * @return \Illuminate\Http\Response*/
    /** * Remove the specified resource from storage. * * @param  int  $id * @return \Illuminate\Http\Response*/

    public function deleteOS($idc,$idS){
      $result = 'listo';
      $sql = DB::select("Select ms.IdServicioEse, mp.IdTipoServicio
        from master_ese_srv_servicio ms
        Inner join master_ese_plantilla_cliente mpc on mpc.IdPlantillaCliente = ms.IdPlantillaCliente
        Inner Join master_ese_plantilla mp ON mp.IdPlantilla = mpc.IdPlantilla
        where ms.IdCliente = $idc and ms.Estatus='Creada' and  mp.IdTipoServicio=$idS");
    
      $servicios = count($sql);
      
      if($servicios > 0){
        $cred = DB::select("SELECT cc.Restantes as Restantes, cc.Usados as Usados  FROM cred_count cc WHERE cc.IdModulo =6 AND cc.IdCliente = $idc");

        $creditos = (count($cred)==0)?0:$cred[0]->Restantes;

        $creditos += $servicios;

        $usados = $cred[0]->Usados - $servicios;

        if(count($cred)>0){
            DB::table("cred_count")
                        ->where("IdCliente",$idc)
                        ->where("IdModulo",6)
                        ->update([
                            "Usados" => $usados,
                            "Restantes" => $creditos
                        ]);
        }
      }
        
        foreach ($sql as $g) {
          DB::delete("delete from master_ese_srv_kardex where IdServicioEse = $g->IdServicioEse");
          DB::delete("delete from master_ese_srv_entrada where IdServicioEse = $g->IdServicioEse");
          DB::delete("delete from master_ese_srv_os where IdServicioSRV = $g->IdServicioEse");
          DB::delete("delete from master_ese_srv_servicio where IdServicioEse = $g->IdServicioEse");
        }
        $result = 'listo';
      return $result;
    }

    public function searchRfc($rfc){
        $result = MasterConsultas::exeSQL("search_rfc","READONLY",array("paramrfc" => "$rfc"));
        $td = "";
        foreach($result as $item){
            $td = $td."<tr>

                        <td>".$item->NombreCandidato." ".$item->ApellidoPaternoCandidato." ".$item->ApellidoMaternoCandidato."</td>

                        <td>$item->NombreCliente</td>

                        <td>$item->estudio</td>

                        <td>$item->FechaCreacion</td>

                        <td><button class='btn btn-primary' onclick='copyinfo(".$item->IdServicioEse.",".$item->IdCliente.")'>Seleccionar</button></td>                        

                       </tr>";
        }
        return [count($result),$td];
    }

    public function getdataForNewEse($IdServicioEse){
        $result = MasterConsultas::exeSQL("get_datos_para_nuevo_ese","READONLY",array("paramIdServicioEse" => "$IdServicioEse"));
        return $result;
    }

    public function notificacionSolicitarOSC(Request $request){
        $cliente = [];
        $idcn = 0;
        $lider = [];
        $resultSqlLider = "";
        $resultSqlCliente = DB::select("SELECT u.email,c.nombre_comercial AS cliente,u.idcn
                                FROM clientes c
                                INNER JOIN users u
                                ON c.id_user = u.id
                                WHERE c.id = $request->idCliente");

        $ana = DB::select("SELECT * from master_ese_srv_asignacion a
        WHERE a.IdServicioEse =   $request->sv");

        $analis = "";
        foreach ($ana as $a){
            $analis = $a->IdAnalista;
            $lider = $a->IdLider;
        }

        if(count($resultSqlCliente) > 0){
            $cliente = array("nombre" => $resultSqlCliente[0]->cliente,
                             "email" => $resultSqlCliente[0]->email);
            $idcn = $resultSqlCliente[0]->idcn;
        }

        if($idcn > 0){
            $resultSqlLider = DB::select("SELECT (SELECT u1.email FROM users u1 WHERE u1.id = u.id AND u1.IdRol = 99) AS email,
                                            (SELECT CONCAT(u1.name,' ',u1.apellido_paterno,' ',u1.apellido_materno) AS nombreuser  FROM users u1 WHERE u1.id = u.id AND u1.IdRol = 99) AS nombreuser
                                            FROM users u
                                            WHERE u.IdRol = 99 limit 1");
        }
        $notification = new Notificaciones();
        $clt = DB::select("select u.id from users u inner join master_ese_srv_servicio ms on u.IdCliente=ms.IdCliente where IdServicioEse = $request->sv");
        $resultSendNotification=$notification->notificaUsuarios($request->sv,'ANALISTA-SOLICITUD','Analista',$analis);
        $notification->notificaUsuarios($request->sv,'SOLICITUD-LIDER','Lider',$lider);
        $notification->notificaUsuarios($request->sv,'SOLICITUD-CLIENTE','Cliente',$clt[0]->id);
        $notification->notificaUsuarios($request->sv,'SOLICITUD-CANDIDATO','Candidato',null);
        //$resultSendNotification=$notification->notificationRequestService(["SOLICITUD-CLIENTE","SOLICITUD-CANDIDATO","SOLICITUD-LIDER"],$cliente,$request->candidatos,$resultSqlLider);
        
        return ["isSendEmail" =>$resultSendNotification];
    }
}
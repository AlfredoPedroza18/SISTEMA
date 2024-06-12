<?php
namespace App\Http\Controllers\ESE;
use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;
use ZipStream\Option\Archive;
use App\Http\Controllers\ESE\Notificaciones;

class IncidenciasController extends Controller
{

    public function index ()

    {

        $idcn = -1;
        $IdCliente =-1;

        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo'))
            $idcn = -1;
        else
            $idcn = Auth::user()->idcn;

        if(Auth::user()->tipo == "c"){

            $IdCliente =Auth::user()->IdCliente;

        }

        $lista = DB::select("SELECT st.nombre as nombreT, es.Id AS EIL, c.id as id_c , c.nombre_comercial AS cliente, cn.nombre AS centro, esd.Candidato, 
        CONCAT(IFNULL(u.name,''),' ',IFNULL(u.apellido_paterno,''),' ',IFNULL(u.apellido_materno,'')) AS analista,
        es.Estatus AS estatus, esd.Solicitante AS solicitante, esd.incidenciaLegal as incidencia
        FROM eis_servicios es 
        INNER JOIN clientes c ON es.IdClientes = c.id
        INNER JOIN centros_negocio cn ON es.Id_cn = cn.id
        INNER JOIN users u ON u.id = es.Id_analista
        INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
        INNER JOIN eis_servicio_tipo st on es.tipo = st.id
        WHERE ($idcn = -1 OR ($idcn <> -1 AND es.Id_cn = $idcn))
        AND ($IdCliente= -1 OR ($IdCliente <> -1 AND es.IdClientes = $IdCliente))
        AND c.tipo = 2 ORDER BY es.id DESC");

        return view( " ESE.listadoOS.Incidencias " ,[ "lista" => $lista]);
    }

    public function  CrearServicio($IdCliente){
        $nombreContacto = DB::select("select concat(nombre_con,' ',ifnull(apellido_paterno_con,''),' ',ifnull(apellido_materno_con,'')) as name from contactos where id_cliente = $IdCliente");
        $servicios = DB::select("select * from eis_servicio_tipo");
        return view( " ESE.Incidencias.IncidenciasCreate ",[

            "contactos"  => $nombreContacto,
            "IdCLiente" => $IdCliente,
            "servicios" => $servicios
        ]);
    }

    public function EditarServicio($IdCliente,$IdServicio){
        $nombreContacto = DB::select("select concat(nombre_con,' ',ifnull(apellido_paterno_con,''),' ',ifnull(apellido_materno_con,'')) as name from contactos where id_cliente = $IdCliente");
        $servicios = DB::select("select * from eis_servicio_tipo");
      
        $lista = DB::select("SELECT  esd.*,es.tipo as tipo
        FROM eis_servicios es 
        INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
        WHERE es.id = $IdServicio AND es.IdClientes = $IdCliente");


        return view( " ESE.Incidencias.incidenciasUpdate ",[

            "contactos"  => $nombreContacto,
            "IdCliente" => $IdCliente,
            "IdServicio" =>$IdServicio,
            "datos" => $lista[0],
            "servicios" => $servicios
        ]);
    }

    public function obtenerDatos($IdCliente,$IdServicio){
        $lista = DB::select("SELECT  esd.*
        FROM eis_servicios es 
        INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
        WHERE es.id = $IdServicio AND es.IdClientes = $IdCliente");

        $curp =  json_decode($lista[0]->curp);
        return response()->json([
            "data" =>$lista,
            "curp" =>$curp
        ]);

    }

    public function guardarServicio($IdCliente, Request $request){

        $id_cn = DB::select("SELECT id_cn FROM clientes where id = $IdCliente");
            

        if( Auth::user()->tipo == "c" ){

            $listaAnalista = DB::select("SELECT id_ejecutivo FROM clientes where id = $IdCliente");
            

            $analista = $listaAnalista[0]->id_ejecutivo;

        }else{
            $analista =  Auth::user()->id;
        }

        $id_servicio = DB::table("eis_servicios")->insertGetId([

            "IdClientes" => $IdCliente,
            "Id_cn" => $id_cn[0]->id_cn,
            "Id_analista" =>$analista,
            "Estatus" => "Activo",
            "tipo"=>$request->tipo,
            "creacion" =>date("Y-m-d")

        ]);


        
       


        $status = "success";


        return response()->json([

            "status" =>$status,
            "id_servicio" => $id_servicio,
         
        ]);
    }
    

    public function finalizarServicio($IdCliente, $IdServicio,Request $request){
        $status = "success";

        $id_servicio = DB::table("eis_servicios")
        ->where("Id" , $IdServicio)
        ->where("IdClientes", $IdCliente)
        ->update([
            "Estatus" => "Finalizado"
        ]);

        $ntf = new Notificaciones();
        $v = $ntf->notificaUsuariosInci('CLTE_INCI_Fin','Cliente',$IdServicio);
        $ntf->notificaUsuariosInci('EJE_INCI_Fin','Ejecutivo',$IdServicio);

        return response()->json([

            "status" =>$status
        
        ]);
    }

    public function cancelarServicio($IdCliente, $IdServicio,Request $request){
        $status = "success";

        $id_servicio = DB::table("eis_servicios")
        ->where("Id" , $IdServicio)
        ->where("IdClientes", $IdCliente)
        ->update([
            "Estatus" => "Cancelado"
        ]);

        $ntf = new Notificaciones();
        $v = $ntf->notificaUsuariosInci('CLTE_INCI_Can','Cliente',$IdServicio);
        $ntf->notificaUsuariosInci('EJE_INCI_Can','Ejecutivo',$IdServicio);
        

        return response()->json([

            "status" =>$status
        
        ]);
    }
    public function guardarInputsUpdate($IdCliente, $IdServicio,Request $request){
        
        $status = "success";

        $id_servicio = DB::table("eis_servicio_detalle")
        ->where("IdServicio" , $IdServicio)
        ->update([

            
            "Solicitante" => $request->solicitante,
            "Candidato" => $request->candidato,
            "FechaNacimiento" => $request->fecha,
            "LugarNacimiento" => $request->lugar,
            "ineDelantero"  => ($request->ineD =="")?NULL:$request->ineD ,
            "ineTraseros"  => ($request->ineT=="")?NULL:$request->ineT,
            "curp"  => ($request->curp=="")?NULL:$request->curp,
            "nss"  => ($request->nss=="")?NULL:$request->nss,
            "rfc"  => ($request->rfc=="")?NULL:$request->rfc,
            "actaNacimiento"  => ($request->act=="")?NULL:$request->act,
            "compDomicilio"  => ($request->comD=="")?NULL:$request->comD,
            "incidenciaLegal"  => ($request->inci=="")?NULL:$request->inci,
            "domicilio"=>($request->domiclio=="")?"":$request->domiclio,
            "telefono" =>($request->tel=="")?"":$request->tel,
            "tipops"=>$request->tipo2,
            "correo"=>$request->correo,
            "escolaridad"=>$request->escolaridad,
            "puesto"=>$request->puesto,
            
        ]);

       

        return response()->json([

            "status" =>$status
        
        ]);
    }


    public function guardarInputs($IdCliente, $IdServicio,Request $request) {
       
        $status = "success";
        $id_servicio = DB::table("eis_servicio_detalle")->insertGetId([

            "IdServicio" =>$IdServicio,
            "Solicitante" => $request->solicitante,
            "Candidato" => $request->candidato,
            "FechaNacimiento" => $request->fecha,
            "LugarNacimiento" => $request->lugar,
            "ineDelantero"  => ($request->ineD =="")?NULL:$request->ineD ,
            "ineTraseros"  => ($request->ineT=="")?NULL:$request->ineT,
            "curp"  => ($request->curp=="")?NULL:$request->curp,
            "nss"  => ($request->nss=="")?NULL:$request->nss,
            "rfc"  => ($request->rfc=="")?NULL:$request->rfc,
            "actaNacimiento"  => ($request->act=="")?NULL:$request->act,
            "compDomicilio"  => ($request->comD=="")?NULL:$request->comD,
            "domicilio"=>($request->domiclio=="")?"":$request->domiclio,
            "telefono" =>($request->tel=="")?"":$request->tel,
            "tipops"=>$request->tipo2,
            "correo"=>$request->correo,
            "escolaridad"=>$request->escolaridad,
            "puesto"=>$request->puesto,


        ]);

        $ntf = new Notificaciones();
        $v = $ntf->notificaUsuariosInci('CLTE_INCI_C','Cliente',$IdServicio);
        $ntf->notificaUsuariosInci('EJE_INCI_C','Ejecutivo',$IdServicio);
        

        return response()->json([

            "status" =>$status,
            "id_servicio" => $id_servicio
        
        ]);
    }
    public function guardarDocumentos($IdCliente, $IdServicio, $index,Request $request) {
        
        $file = $request->file($index);

        $imagedata = file_get_contents($file);

        $base64 = base64_encode($imagedata);

        $status = "success";

        $archivo = ["","ineDelantero", "ineTraseros", "curp", "actaNacimiento", "compDomicilio", "rfc","nss"];

        DB::table("eis_servicio_detalle")
        ->where("IdServicio",$IdServicio)
        ->update([
            $archivo[$index]  => $base64
        ]);

        return response()->json([

            "status" =>$base64,
            
        
        ]);

    }
}
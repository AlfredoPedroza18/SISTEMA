<?php



namespace App\Http\Controllers\Utilerias;



use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use App\Bussines\MasterConsultas;
use DB;
use Illuminate\Support\Facades\Auth;

class creditosController extends Controller

{

    public function index(){

        $idcn = -1;
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo'))
            $idcn = -1;
        else
            $idcn = Auth::user()->idcn;
            

        $listadoCreditos = DB::select("
            SELECT  ck.Restantes as res,DATE_FORMAT(ck.Fecha,'%d-%M-%Y') AS fecha, ck.Estatus AS estatus, ck.id as id, ck.Solicitante , c.nombre_comercial AS nombreC, m.nombre AS modulo, ck.Creditos FROM cred_kardex AS ck
            INNER JOIN clientes c ON c.id = ck.IdCliente
            INNER JOIN modulos m ON m.id = ck.IdModulo
            where (-1 = $idcn OR ( -1<>$idcn AND c.id_cn = $idcn)) ORDER BY ck.id desc 
        ");

        return view("utilerias.creditos.creditosindex",[
            "listadoCreditos"=>$listadoCreditos
            
        ]);
    }

    public function crear()

    {

        $idcn = -1;
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo'))
            $idcn = -1;
        else
            $idcn = Auth::user()->idcn;

        $Clientes =  DB::select("SELECT id,nombre_comercial FROM clientes WHERE tipo = 2 
        AND (-1 = $idcn OR ( -1<>$idcn AND id_cn = $idcn)) ORDER BY nombre_comercial ASC");

        $Modulos = DB::select("SELECT id, nombre FROM modulos where id = 6 ORDER BY nombre ASC");

        return view("utilerias.creditos.creditoscrear",[
            "clientes"=>$Clientes,
            "modulos"=>$Modulos
        ]);

    }

    public function Utileria_contacto($IdCliente)

    {

        $nombreContacto = DB::select("select concat(nombre_con,' ',ifnull(apellido_paterno_con,''),' ',ifnull(apellido_materno_con,'')) as name from contactos where id_cliente = $IdCliente");
        
        $list = "<option value='0'>Seleccione un contacto</option>";

        foreach($nombreContacto as $con){
            $list .= "<option value='{$con->name}'>{$con->name}</option>";
        }

        return response()->json(array(
                'status_alta' => "success",
                'contactos'=>$list
        ));


    }

    public function obtenerCantidadCre($IdCliente,$IdModulo) 
    
    {
        
        $cantidad = 0;
        $validarConteo = DB::select("select * from cred_count where idcliente = $IdCliente AND idModulo = $IdModulo");
        if(count($validarConteo) != 0)
            $cantidad = (int) $validarConteo[0]->Restantes;
    
        return  response()->json(array(
            'cantidad'=>$cantidad
        ));
    }

    public function registrarCreditos( $IdCliente, Request $request )
    
    {

        $mensaje = "";
        $status = "";
        $contacto = $request->contacto;
        $creditos = $request->creditos;
        $modulo = $request->modulo;
        $fecha = date("Y-m-d");

        if(!is_numeric($IdCliente) || !is_numeric($creditos) || !is_numeric($modulo)){
            $status = "error";
            $mensaje = "favor de ingresar numero";
        }else{

            if($IdCliente == 0 || $contacto == "0" || $creditos <= 0 || $modulo == 0 ){
                $status = "error";
                $mensaje = "Favor de seleccionar todos los datos y revisar que los creditos no sean iguales o menores a 0";
            }else{

                DB::table("cred_kardex")->insert([

                    "IdCliente" => $IdCliente,
                    "IdModulo" => $modulo,
                    "Creditos" => $creditos,
                    "Solicitante"=> $contacto,
                    "fecha"=> $fecha,
                    "Estatus" => "Activo",
                    "Restantes"=> $creditos

                ]);

                $validarConteo = DB::select("select * from cred_count where idcliente = $IdCliente AND idModulo = $modulo");

                if(count($validarConteo) == 0){
                    
                    DB::table("cred_count")->insert([
                        "IdCliente" => $IdCliente,
                        "IdModulo" => $modulo,
                        "Disponibles" => $creditos,
                        "Usados" => 0,
                        "Restantes" => $creditos
                    ]);

                    $status = "success";
                    $mensaje = "Creditos ingresados Correctamente";
                }else{

                    $disponibles = (int) $validarConteo[0]->Disponibles + $creditos;
                    $restantes = (int) $validarConteo[0]->Restantes + $creditos;

                    DB::table("cred_count")
                    ->where("IdCliente",$IdCliente)
                    ->where("IdModulo",$modulo)
                    ->update([
                        "Disponibles" => $disponibles,
                        "Restantes" => $restantes
                    ]);

                    $status = "success";
                    $mensaje = "Creditos ingresados Correctamente";
                }

            }
        }

        return response()->json(array(
            'status_alta' => $status,
            'mensaje'=>$mensaje
        ));
    }

    function eliminarCreditos($IdKardex){

        $mensaje = "";
        $status = "";
        $id = $IdKardex;

        $servicio = DB::select("SELECT * FROM cred_kardex where id = $id");

        if($servicio[0]->Estatus == "Cancelado"){
            $status = "cancel";
        }else{
            $validar = -1;
            $total = DB::select("SELECT * FROM cred_count where IdModulo =".$servicio[0]->IdModulo." AND IdCliente=".$servicio[0]->IdCliente);
            $validar = (int) $total[0]->Restantes - (int) $servicio[0]->Creditos;
            
            $restantes = (int) $total[0]->Restantes - (int) $servicio[0]->Creditos;
            $disponibles = (int) $total[0]->Disponibles - (int) $servicio[0]->Creditos;

            if($validar < 0){
                $status = "error";
            }else{

                DB::table("cred_kardex")
                    ->where("id",$id)
                    ->update([
                        "Estatus" => "Cancelado",
                    ]);
                
                DB::table("cred_count")
                    ->where("IdCliente",$servicio[0]->IdCliente)
                    ->where("IdModulo",$servicio[0]->IdModulo)
                    ->update([
                        "Disponibles" => $disponibles,
                        "Restantes" => $restantes
                        
                    ]);

                $status = "success";
            }

        }

        return response()->json(array(
            'status' => $status,
            'mensaje'=>$mensaje
        ));
    }
}

<?php

namespace App\Http\Controllers\Utilerias;



use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use App\Bussines\MasterConsultas;
use DB;
use Illuminate\Support\Facades\Auth;

class firmaController extends Controller

{

    public function index(){



        $lista = DB::select("select * from firma_correo");
        $lista_cn = DB::select("select * from centros_negocio");

        return view("utilerias.firma.firma_correo_index",[
            
            "lista"=>$lista,
            "lista_cn"=>$lista_cn
            
        ]);
    }

    public function crear(){
        return view("utilerias.firma.firma_add",[            
        ]);
    }

    public function saveP( Request $request){


        DB::table("firma_correo")->insert([

            "nombreP" => $request->nombre,
            "fondoF" => $request->fondo,
            "infoF" => $request->info,
            "empresaF"=> $request->empresa,
            "aviso"=>$request->aviso

        ]);


        return response()->json([

            "status" =>"succes"
            
        ]);
        
    }

    public function editar($idPlantilla){

        $datos = DB::select("select * from firma_correo where id = $idPlantilla");

        return view("utilerias.firma.firma_edi",[
            
            "data" => $datos[0],
            "idP"=>$idPlantilla

        ]);
    }

    public function updateP( Request $request, $idp){


        DB::table("firma_correo")        
        ->where("Id",$idp)
        ->update([

            "nombreP" => $request->nombre,
            "fondoF" => $request->fondo,
            "infoF" => $request->info,
            "empresaF"=> $request->empresa,
            "aviso"=>$request->aviso

        ]);


        return response()->json([

            "status" =>"succes"
            
        ]);
        
    }

    public function asignar($idp, $idcn){

        $status = "";
        $message = "";

        $contar = DB::select("select * from firma_correo_asig sa inner join firma_correo fc on sa.id_plantilla = fc.id where id_cn = $idcn");

        if(count($contar)>= 1){
            $status = "exist";
            $message = "Este centro de negocios tiene la pantilla '". $contar[0]->nombreP ."' asignada";
        }else{

            DB::table("firma_correo_asig")->insert([

                "id_plantilla" => $idp,
                "id_cn" => $idcn,
    
            ]);

            
            $status = "success";
            $message = "Plantilla Asiganada Correctamente";
        }


        return response()->json([

            "status" =>$status,
            "message" =>$message
            
        ]);
    }

    public function cambiar($idp, $idcn){

        $status = "";
        $message = "";

     
            DB::table("firma_correo_asig")
            
            ->where("Id_cn", $idcn)
            ->update([

                "id_plantilla" => $idp,
    
            ]);

            
            $status = "success";
            $message = "Plantilla Cambiada Correctamente";


        return response()->json([

            "status" =>$status,
            "message" =>$message
            
        ]);
    }
}
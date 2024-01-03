<?php

namespace App\Http\Controllers\apiresources;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\Bussines\MobileLogin;

class RecursosStaticosController extends Controller
{
    public function fotoEmpleado(Request $request)
    {
        $idEmpleado = $request->input('IdPersonal');
        $msql = MasterConsultas::exeSQL('mod_empleado_foto','READONLY',array("idPersonal"=>$idEmpleado));

        if (!file_exists(public_path(). '/user_photo/')) {
            mkdir(public_path(). '/user_photo/', 0777, true);
        }

        if (isset($msql) && count($msql) == 1 && isset($msql[0]->Imagen) && $msql[0]->Imagen != "")
        {
            $path = public_path(). '/user_photo/'. $idEmpleado . '.jpg';
            $myfile = fopen($path, "w") or die("Unable to open file!");
            fwrite($myfile, $msql[0]->Imagen);
            fclose($myfile);

            return response()->download($path, $idEmpleado . '.jpg', ['Content-Type' => ': image/jpeg']);
        }else{
            $path = public_path(). '/user_photo/default.jpg';
            return response()->download($path, $idEmpleado . '.jpg', ['Content-Type' => ': image/jpeg']);
        }


    }

}

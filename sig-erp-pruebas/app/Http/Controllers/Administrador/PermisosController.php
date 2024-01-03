<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bican\Roles\Models\Permission as Permiso;


class PermisosController extends Controller
{
    public function listaModulosPrincipales()
    {
    	$lista_modulos = Permiso::where('root',0)->get();



    	return response()->json(['data' => $lista_modulos]);
    }

    public function listaSubModulos(Request $request)
    {
    	$lista_modulos = Permiso::where('root',$request->parent)->get();


    	return response()->json(['data' => $lista_modulos]);
    }
}

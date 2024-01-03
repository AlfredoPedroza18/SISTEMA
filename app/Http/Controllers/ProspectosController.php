<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use App\Cliente;
use App\Contacto;

class ProspectosController extends Controller
{



    public function altaProspecto()
    {
        $lista_estados  = null;
        $estados        = DB::table('estados')->get();

        foreach ($estados as $estado) {
            $lista_estados[$estado->id] = $estado->nombre_estado;
        }
        return view('prospectos.index',['estados'=>$lista_estados]);
    }


    public function guardar(Request $request)
    {
        $request->session()->flush();


        $asignacion_cn = DB::select('SELECT * FROM estados_asignados_cn WHERE id = ?',[$request->id_cn]);
        $ejecutivo_sr       = DB::select('SELECT * FROM users WHERE idcn = ? AND ejecutivo_sr = 1',[$asignacion_cn[0]->id_cn]);
        

        if($ejecutivo_sr){    

            $prospecto  = new Cliente;
            $contacto   = new Contacto;
            
            $prospecto->nombre_comercial = $request->nombre_comercial;
            $prospecto->id_user    = $ejecutivo_sr[0]->id;
            $prospecto->id_cn      = $asignacion_cn[0]->id_cn;
            $prospecto->save();



            $contacto->telefono1  = $request->telefono1;
            $contacto->correo1    = $request->correo1;
            $contacto->nombre_con = $request->nombre_comercial;
            $contacto->id_cliente = $prospecto->id;

            $contacto->save();


            if($prospecto && $contacto){
                Session::put('alta','success');            
            }
        }


        
        
        return redirect()->action('ProspectosController@altaProspecto');
    }
    
}

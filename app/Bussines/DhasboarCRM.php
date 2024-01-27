<?php

namespace app\Bussines;

use App\Bussines\MasterConsultas;

use DB;
use Illuminate\Support\Facades\Auth;
use Twilio\TwiML\Voice\Client;

class Dashboard

{

    public function iniciarDataosDashboard (){
        
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $id_cn = -1;
        }else{
            if(Auth::user()->tipo == "s"){
                $id_cn = Auth::user()->idcn;
            }
        }

        
        
        return [];
    } 
    public function filtros($tipo ){

    } 

}
<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\MasterEsePlantillaCliente;
use DB;

class NotificaWeb extends Controller
{
    public function notificacion(){
      
      $datos="";$val=0;$not="";$leido="";
      $user = \Auth::user();
      $query = DB::select("select n.*,
        if( TIMESTAMPDIFF(DAY, DATE(n.Fecha), DATE(NOW())) = 0,
            if(TIMESTAMPDIFF(HOUR, TIME(n.Fecha), TIME(NOW())) = 0,
               Concat(TIMESTAMPDIFF(MINUTE , TIME(n.Fecha), TIME(NOW())),' Minutos'), Concat(TIMESTAMPDIFF(HOUR, TIME(n.Fecha), TIME(NOW())),' Horas') ),
            Concat(TIMESTAMPDIFF(DAY, DATE(n.Fecha), DATE(NOW())),' Días')) as tiempo
        from master_ese_notificaciones_web as n where n.Leido = 0 AND n.fecha <= NOW() AND n.IdUsuario = $user->id order by Fecha desc");

        foreach ($query as $g) {
          $val++;
          $not.="<li class='media'>
               <div class='row'>
               <button class='fondo' ";
               
          
          if($g->IdEse != 0)  
              $not .= "onclick='enlace($g->IdNotificacion,$g->IdEse);'";
          
          
          $not .=" >
                 <div class='media-left col-sm-2'><i class='fa fa-bullhorn media-object bg-blue'></i></div>
                 <div class='col-sm-10'>
                     <h6 class='media-heading'> $g->Titulo </h6>
                     <div  style='color:#000;' >
                        $g->Mensaje
                     </div>
                     <div class='text-muted f-s-11'> hace $g->tiempo</div>
                 </div>

                 </button>
               <div>

         </li>";
        }

        if($val>0){
          $leido .= "<div class='custom-control custom-checkbox'>
            <input type='checkbox' class='custom-control-input' id='customCheck1' onclick='leidos();' value='on'>
            <label class='custom-control-label' for='customCheck1'> <small>Marcar notificaciones como leido </small> </label>
          </div>";
        }

      $datos .= "<li class='dropdown-header'>
        Notificaciones
      </li>
      <li class='dropdown-footer text-center'>
          $leido
            </li>
            $not
          <li class='dropdown-footer text-center'></li>";
      return array($datos,$val) ;

    }

    public function Leidos($id,$IdEse){
      $user = \Auth::user();
      $datos="";$val=0;$not="";$leido="";
      if($id!=0){
        // una notificacion leida
          $query = DB::update("UPDATE master_ese_notificaciones_web SET Leido = 1 where IdAnio = year(now()) and IdNotificacion = $id");
         session_start();
          $_SESSION["IdEse"] = $IdEse;
          return array($id,$IdEse);
      }else{
        // se marcan todas las notificaciones como leidas
        $query = DB::update("UPDATE master_ese_notificaciones_web SET Leido = 1 where IdUsuario = $user->id");

        $datos .= "<li class='dropdown-header'> Notificaciones </li>
        <li class='dropdown-footer text-center'> </li>
        <li class='dropdown-footer text-center'></li>";

        return array($datos,$val) ;

      }


    }
}

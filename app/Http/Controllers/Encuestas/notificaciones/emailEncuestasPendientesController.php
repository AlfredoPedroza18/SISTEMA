<?php
namespace App\Http\Controllers\Encuestas\notificaciones;

use App\Bussines\MasterConsultas;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Encuestas\Notificaciones;
use App\Utils\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class emailEncuestasPendientesController extends Controller
{
    public function send(){
        $MasterConsultas = new MasterConsultas;
        $data = $MasterConsultas->exeSQL("encuestas_en_proceso","READONLY",[]);
        $notificaciones = new Notificaciones;
        foreach ($data as $key => $value) {
            $body = $this->getBodyEmail($value->Nombre, $value->links, $value->Estatus);
            $notificaciones->send_phpMailerEncuesta($value->Correo,$value->Nombre,"NOM035 - Aviso de Encuestas Pendientes e Impletas", $body,"","");
        }     
        
        // Storage::append(public_path()."/logsendemailbat.txt",$text);
    }
    private function getBodyEmail($nombre, $link, $status){
        $meridiem = date('A');
        $saludo = ($meridiem == "AM") ? "Buenos días": "Buenas tardes";
        $body = "
        <p>{$saludo} estimado {$nombre}, Aún tienes en proceso algunas de las encuestas sobre la NOM 035 <b>ENTORNO LABORAL</b> y/o <b>IDENTIFICACIÓN DE RIESGO PSICOSOCIAL</b>.</p>
        <p>Favor de continuar respondiendo los datos en los links recibidos en tu correro.</p> 
        <p>{$link}</p>

        ";
        return $body;
    }
}
<?php

namespace App\Bussines;

use App\Exceptions\APIException;
use App\MasterConsultasSQL;
use App\MobileSessions;
use Exception;

use Laminas\Http\Request;
use Laminas\Http\Client;

class NotificacionesPush
{
    private $mcu;
    private $dbIndex;
    private $db;

    public  function pushFirebaseFCM($id, $titulo, $mnsaje, $tipo, $detalle)
    {

        $para['registration_ids'] = array($id);
        $para['notification']["text"] = $mnsaje;
        $para['notification']["title"] = $titulo;
        $para['notification']["sound"] =  "kids_game_bright_plucked";//"default";
        $para['data']["id"] = $tipo;
        $para['data']["status"] = $detalle;

        $client = new Client();
        $client->setRawBody(\Laminas\Json\Json::encode($para));
        $client->setOptions( [
            'maxredirects' => 0,
            'timeout'      => 30,
        ]);
        $client->setMethod('POST');
        $client->setHeaders([
            'Content-Type' => 'application/json',
            'Content-Length' => strlen(\Laminas\Json\Json::encode($para)),
            'Authorization' => 'key=AAAAQDjZFbU:APA91bFIHYZ5IwqPVpXecNczTOgTVAg3uJpnSt4CW61LKad_w0AJhZoVB8Cg-zW7WdOBRC4TqUaWdPtO2HWf52BSJXw9Q-iguoOQA27xVCVJojXqecLztBGFyj-pl00jKKa5E5lDqa9d'
        ]);
        $client->setUri('https://fcm.googleapis.com/fcm/send');
        $response = $client->send();
        if ($response->isSuccess()) {
            $r =   \Laminas\Json\Json::decode($response->getBody() );
        }else{
            $r["success"] = false;
        }
        return $r;
    }

}

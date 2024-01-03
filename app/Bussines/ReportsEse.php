<?php
namespace App\Bussines;
use App\Exceptions\APIException;

use Exception;
use Laminas\Http\Request;
use Laminas\Http\Client;

class ReportsEse
{

    public function GetPathReport($IdServicioEse,$idReporte)
    {
        
        // Parametros
        $para['idBaseDatos'] = 1;
        $para['idReporte'] = (int)$idReporte;
        $para['parametros']  = [
                0 => [
                    'nombreParametro' => 'IdServicioEse',
                    'valor' => "$IdServicioEse",
                    'tipo' => 'Integer'
                ]
            ];
    
        $client = new Client();
        $client->setRawBody(\Laminas\Json\Json::encode($para));
        $client->setOptions( [
            'maxredirects' => 0,
            'timeout'      => 120,
        ]);
        $client->setMethod('POST');
        $client->setHeaders([
            'Content-Type' => 'application/json',
            'Content-Length' => strlen(\Laminas\Json\Json::encode($para,true))
        ]);

        $client->setUri('http://localhost:2078/');
        //$client->setUri('http://localhost:5002/api/reportes/generarpath');
        // $client->setUri('http://localhost:50516/api/reportes/generarpath');
        $response = $client->send();

        if ($response->isSuccess()) {
           $r =  \Laminas\Json\Json::decode($response->getBody());
        }else{
            $r = array("success" => false);
        }

        return $r;
    }
}
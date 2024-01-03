<?php
namespace App\Bussines;
use App\Exceptions\APIException;

use Exception;
use Laminas\Http\Request;
use Laminas\Http\Client;

class ReportsNom035
{

    public function GetReport($idReporte,$idpersonal,$idcliente)
    {
        
        // Parametros

        $para['idReporte'] = (int)$idReporte;
        $para['parametrosDetalles']  = [
                0 => [
                    'parametrosdetalle' => json_encode([
                        "cuestionario_guia_1" => [
                            "IdPersonal" => $idpersonal,
                            "IdCliente" => $idcliente
                        ]
                    ])
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

        $client->setUri('http://localhost:5002/api/reportesnom035/generarpathnom035');
        $response = $client->send();

        if ($response->isSuccess()) {
           $r =  \Laminas\Json\Json::decode($response->getBody());
        }else{
            $r = array("success" => false);
        }

        return $r;
    }
}
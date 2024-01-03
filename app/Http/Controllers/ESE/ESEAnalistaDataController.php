<?php

namespace App\Http\Controllers\ESE;

use App\MasterEseServicio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ESEAnalistaDataController extends Controller
{
    public function validateStatusCaptura(){
        $Servicio  = MasterEseServicio::Create(["IdCliente" => $idc,
            "IdPlantillaCliente"     => $id,
            "IdModalidad"            => null,
            "IdPrioridad"            => 3,
            "Comentarios"            => null,
            "Estatus"                => 'Creada',
            "SyncGrid"               => 1,
            "SyncData"               => 0,
            "FechaCreacion"          => date('Y-m-d H:i:s'),
            "IdTipoServicio"         => $tipo,
            "MinutosEjecucionInves"  => 0
        ]);


        $IdServicioEse=$Servicio->IdServicioEse;

    }
}

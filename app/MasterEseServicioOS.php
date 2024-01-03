<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterEseServicioOS extends Model
{
    public $timestamps = false;
    protected $table = 'master_ese_srv_os';
    protected $primaryKey = 'IdServicioOS';
    protected $fillable = [
        'IdServicioSRV',
        'IdModulo',
        'IdCliente',
        'Estatus',
        'FechaSolicitud',
        'FechaCierre',
        'VarServicio',
        'PrecioFacturable',
        'NumFactura'
    ];
}

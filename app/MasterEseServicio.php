<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterEseServicio extends Model
{
    public $timestamps = false;
    protected $table = 'master_ese_srv_servicio';
    protected $primaryKey = 'IdServicioEse';
    protected $fillable = [
        'IdServicioEse',
        'IdCliente',
        'IdPlantillaCliente',
        'IdTipoServicio',
        'IdModalidad',
        'IdPrioridad',
        'Comentarios',
        'Estatus',
        'SyncGrid',
        'SyncData',
        'FechaCreacion',
        'MinutosEjecucionInves'
    ];
}

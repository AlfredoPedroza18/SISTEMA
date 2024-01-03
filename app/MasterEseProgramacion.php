<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterEseProgramacion extends Model
{
    public $timestamps = false;
    protected $table = 'master_ese_srv_programacion';
    protected $primaryKey = 'IdServicioEse';
    protected $fillable = [
        'IdServicioEse',
        'FechaEjecucion',
        'FechaEjecucionReal',
        'Estatus'
    ];
}

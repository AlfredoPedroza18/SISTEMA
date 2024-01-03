<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterEseAsignacion extends Model
{
    public $timestamps = false;
    protected $table = 'master_ese_srv_asignacion';
    protected $primaryKey = 'IdServicioEse';
    protected $fillable = [
        'IdServicioEse',
        'IdLider',
        'IdEjecutivo',
        'IdAnalista',
        'IdInvestigador',
        'IdAnalistaSec',
    ];
}

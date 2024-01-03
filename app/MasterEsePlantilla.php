<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterEsePlantilla extends Model
{
    public $timestamps = false;
    protected $table = 'master_ese_plantilla';
    protected $primaryKey = 'IdPlantilla';
    protected $fillable = [
        'IdPlantilla',
        'IdTipoServicio',
        'DescripcionPlantilla'
    ];
}

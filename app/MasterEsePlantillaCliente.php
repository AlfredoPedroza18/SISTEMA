<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterEsePlantillaCliente extends Model
{
    public $timestamps = false;
    protected $table = 'master_ese_plantilla_cliente';
    protected $primaryKey = 'IdPlantillaCliente';
    protected $fillable = [
        'IdPlantillaCliente',
        'IdPlantilla',
        'IdCliente'
    ];
}

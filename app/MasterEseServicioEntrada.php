<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterEseServicioEntrada extends Model
{
    public $timestamps = false;
    protected $table = 'master_ese_srv_entrada';
    protected $primaryKey = 'IdServicioEseEntrada';
    protected $fillable = [
        'IdEntrada',
        'Requerido',
        'VisibleReportes',
        'VisibleForms',
        'VisibleGrids',
        'VisibleOSClientes',
        'TempUsrEdita',
        'Orden',
        'ValorCargado',
        'IdServicioEse',
        'Indice',
        'NomFEse'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizadorPsicometricoCatalogo extends Model
{
    protected $table='crm_cotizaciones_psicometrico';
    public $timestamps=false;
    protected $fillable=[
     'id_cotizacion',
     'tipo_prueba',
     'pruebas',
     'cantidad',
     'costo_unitario',
     'iva',
     'total',
     'fecha_cotizacion'
    ];
}

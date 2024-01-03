<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizadorESE extends Model
{
    protected $table='crm_cotizaciones_ese';
    public $timestamps=false;
    protected $fillable=[
    'id_tipo_estudio',
    'id_cotizacion',
	'cantidad',
	'costo',
	'porcentaje',
	'subtotal',
	'iva',
	'total',
	'fecha_cotzacion'

    ];
}

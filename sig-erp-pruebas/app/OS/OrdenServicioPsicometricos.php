<?php

namespace App\OS;

use Illuminate\Database\Eloquent\Model;

class OrdenServicioPsicometricos extends Model
{
    protected 	$table		='ordenes_servicio_psicometrico';
    public 		$timestamps	=false;
    protected 	$fillable	= ['id_os',
						      'tipo_prueba',
						      'pruebas',
						      'cantidad',
						      'costo_unitario',
						      'iva',
						      'total',
						      'fecha_cotizacion'
						     ];

    public function orden_servicio()
    {
    	return $this->belongsTo('App\OS\OrdenServicio','id_os');
    }
}

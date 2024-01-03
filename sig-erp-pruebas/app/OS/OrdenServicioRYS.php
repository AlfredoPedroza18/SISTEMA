<?php

namespace App\OS;

use Illuminate\Database\Eloquent\Model;

class OrdenServicioRYS extends Model
{
    protected $table 		= 'ordenes_servicio_rys';
    protected $fillable		= [	'id_os',
    							'cantidad_vacantes',
    							'puesto_requerido',
    							'sueldo_mensual',
    							'porcentaje',
    							'propuesta_economica',
    							'iva',
    							'total',
    							'garantia_rys'
    						  ];
    
    public 	  $timestamps	= false;

    public function orden_servicio()
    {
    	return $this->belongsTo('App\OS\OrdenServicio','id_os');
    }
}

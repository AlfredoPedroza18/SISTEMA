<?php

namespace App\OS;

use Illuminate\Database\Eloquent\Model;

class OrdenServicioEse extends Model
{
    protected $table 	  = 'ordenes_servicio_ese';
    public 	  $timestamps = false;

    protected $fillable	  = [   'id_tipo_estudio',
							    'id_os',
								'cantidad',
								'costo',
								'porcentaje',
								'subtotal',
								'iva',
								'total',
								'fecha_cotzacion'
						    ];



	public function orden_servicio()
    {
    	return $this->belongsTo('App\OS\OrdenServicio','id_os');
    }

    public function estudiosEse()
    {
    	return $this->hasMany('App\ESE\EstudioEse','id_os_ese');
    }
}

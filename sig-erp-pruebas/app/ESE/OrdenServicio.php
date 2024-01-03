<?php

namespace App\ESE;

use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
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
}

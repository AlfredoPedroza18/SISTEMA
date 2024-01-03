<?php

namespace App\ESE;

use Illuminate\Database\Eloquent\Model;

class OrdenServicioDetalle extends Model
{
    protected $table 	  = 'estudio_ese_detalle';
    public 	  $timestamps = false;

    protected $fillable	  = [   'id_tipo_estudio',
							    'id_os',
								'costo',
								'prioridad',
								'estado',
								'subtotal',
								'iva',
								'total',
								'fecha_ingreso',
								'fecha_actualizacion',
								'id_status',
								'id_cliente',
								'id_os_ese'

						    ];
}

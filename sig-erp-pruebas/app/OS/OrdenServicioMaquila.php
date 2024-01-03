<?php

namespace App\OS;

use Illuminate\Database\Eloquent\Model;

class OrdenServicioMaquila extends Model
{
    protected $table 	  = 'ordenes_servicio_maquila';
    protected $fillable   = ['id_os','id_paquete','num_empleados','costo_unitario','subtotal','iva','total'];
    public 	  $timestamps = false;



    public function orden_servicio()
    {
    	return $this->belongsTo('App\OS\OrdenServicio','id_os');
    }
}

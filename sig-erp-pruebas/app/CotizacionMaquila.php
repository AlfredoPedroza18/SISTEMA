<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionMaquila extends Model
{
    protected $table 	  = 'crm_cotizaciones_maquila';
    protected $fillable   = ['id_cotizacion','id_paquete','num_empleados','costo_unitario','subtotal','iva','total'];
    public 	  $timestamps = false;

}




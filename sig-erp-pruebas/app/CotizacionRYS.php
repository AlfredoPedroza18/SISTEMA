<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionRYS extends Model
{
    protected $table 		= 'crm_cotizaciones_rys';
    protected $fillable		= ['id_cotizacion','cantidad_vacantes','puesto_requerido','sueldo_mensual','porcentaje','propuesta_economica','iva','total','garantia_rys'];
    public 	  $timestamps	= false;

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratoGenerico extends Model
{
   protected 	$table 		= 'crm_contratos_genericos';
    protected 	$fillable 	= ['id_contrato','id_producto','cantidad','costo_unitario','subtotal','iva','total'];
    public 		$timestamps = false;
}

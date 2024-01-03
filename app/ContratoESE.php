<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratoESE extends Model
{
    protected 	$table 		= 'crm_contratos_ese';
    protected 	$fillable 	= ['id_contrato','id_tipo_estudio','id_cotizacion','cantidad','costo','porcentaje','subtotal','iva','total'];
    public 		$timestamps = false;
}

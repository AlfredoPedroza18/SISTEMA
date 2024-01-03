<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table 	 = 'crm_contratos';
    protected $fillable	 = [ 'no_contrato'	, 'id_cn'		, 'id_facturadora'		, 'id_usuario', 
							 'id_cotizacion', 'id_cliente'	, 'consecutivo_servicio', 'fecha_inicio',
							 'fecha_fin'	, 'id_servicio'	, 'id_plantilla_generica', ''
						   ]; 
	public 	  $timestamps = false;

}

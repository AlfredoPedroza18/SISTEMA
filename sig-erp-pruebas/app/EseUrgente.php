<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EseUrgente extends Model
{
	protected $table 		= 'crm_tc_cotizador_ese_costo_urgente';
    protected $fillable 	= ['id_servicio_ese','tipo_estudio','costo'];
    public 	  $timestamps  	= false;
    //
}

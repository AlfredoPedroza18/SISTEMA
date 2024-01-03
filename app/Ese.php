<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ese extends Model
{
	protected $table 		= 'crm_tc_cotizador_ese_costos';
    protected $fillable 	= ['id_servicio_ese','tipo_estudio','costo'];
    public 	  $timestamps  	= false;
    //
}

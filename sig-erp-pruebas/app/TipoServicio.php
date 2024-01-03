<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    protected $table 		= 'crm_tc_cotizador_ese_costos';
    protected $fillable 	= ['tipo_estudio'];
    public 	  $timestamps  	= false;

    public function estudiosEse()
    {
    	return $this->hasMany('App\ESE\EstudioEse','id_tipo_estudio');
    }
}

<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class EscolaridadObservacionesRoa extends Model
{
   protected $table 		= 'ese_grupo_roa_escolaridad_obs';
    protected $fillable		= [	'id_formato','observaciones'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function observacionesescolaridad()
    {
    	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

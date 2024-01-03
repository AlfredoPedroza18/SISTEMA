<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class AbandonoEscolarRoa extends Model
{
    protected $table 		= 'ese_grupo_roa_escolaridad_abandono';
    protected $fillable		= [	'id_formato','si_tunco','si_estudiando'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }

  }

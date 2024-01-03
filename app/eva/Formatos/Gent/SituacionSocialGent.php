<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class SituacionSocialGent extends Model
{
    protected $table 	= 'ese_gent_situacion_social';
    protected $fillable = [ 'pertenece_organizaciones',
							'demanda_laboral',
							'motivo_demanda',
							'interes_corto_plazo',
							'interes_mediano_plazo',
							'interes_largo_plazo',
							'pasatiempos',];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

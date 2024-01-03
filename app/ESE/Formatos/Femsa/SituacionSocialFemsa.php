<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class SituacionSocialFemsa extends Model
{
    protected $table 	= 'ese_femsa_situacion_social';
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
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

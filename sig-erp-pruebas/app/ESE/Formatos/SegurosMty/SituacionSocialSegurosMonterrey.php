<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class SituacionSocialSegurosMonterrey extends Model
{
    protected $table 	= 'ese_seguros_monterrey_situacion_social';
    protected $fillable = [ 'pertenece_organizaciones','demanda_laboral','motivo_demanda','interes_corto_plazo',
    						'interes_mediano_plazo','interes_largo_plazo','pasatiempos'];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

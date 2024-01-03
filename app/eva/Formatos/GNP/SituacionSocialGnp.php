<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class SituacionSocialGnp extends Model
{
     protected $table='ese_gnp_situacion_social';
    protected $fillable=[
    					'id_formato',
    					'pertenece_sindicato',
						'detencion',
						'especificacion_detencion',
						'interes_corto',
						'interes_mediano',
						'interes_largo',
						'pasatiempos'    					
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function gnpsituacion()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

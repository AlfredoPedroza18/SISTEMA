<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class SituacionSocialRoa extends Model
{
    protected $table='ese_grupo_roa_situacion_social';
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

   public function esesituacion()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

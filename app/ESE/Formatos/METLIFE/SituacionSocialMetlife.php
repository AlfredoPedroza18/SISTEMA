<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class SituacionSocialMetlife extends Model
{
   
     protected $table='ese_metlife_situacion_social';
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
    	   	return $this->belongsTo( FormatoMetlife::class, 'id_formato' );
    }
}

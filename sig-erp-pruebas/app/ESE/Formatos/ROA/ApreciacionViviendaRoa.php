<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class ApreciacionViviendaRoa extends Model
{
    protected $table='ese_grupo_roa_apreciacion_vivienda';
    protected $fillable=[
  						'id_formato',
						'nivel_eco_alta',
						'nivel_eco_media_alta',
						'nivel_eco_media',
						'nivel_eco_media_baja',
						'nivel_eco_baja',
						'construccion_antigua',
						'construccion_sencilla',
						'construccion_moderna',
						'construccion_semi_moderna',
						'construccion_convencional',
						'conservacion_excelente',
						'conservacion_bueno',
						'conservacion_regular',
						'conservacion_malo',
						'conservacion_pesimo',
						'mobiliario_completo',
						'mobiliario_incompleto',
						'mobiliario_escueto',
						'corte_variado',
						'corte_conservador',
						'corte_moderno',
						'corte_colonial',
						'corte_sencillo',
						'condiciones_internas',
						'condiciones_externas',
						'familiares_enla_empresa',
						'familiares_parentesco',
						'entero_vacante',
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function eseapreciacion()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

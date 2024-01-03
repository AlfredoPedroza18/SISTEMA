<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class HabitosRoa extends Model
{
       protected $table='ese_grupo_roa_habitos';
    protected $fillable=[
					'id_formato',
					'tipo_bebida',
					'tipo_bebida_cantidad',
					'tipo_bebida_frecuencia',
					'tipo_fuma',
					'tipo_fuma_cantidad',
					'tipo_fuma_frecuencia',
					'tipo_antidepresivos',
					'tipo_antidepresivos_cantidad',
					'tipo_antidepresivos_frecuencia',
					'realiza_actividad_fisica',
					'tipo_actividad_fisica',
					'tipo_actividad_pareja',
					'tipo_actividad_familia',
					'tipo_actividad_cuales',
					'actividad_diario',
					'actividad_social',
					'actividad_deportiva',
					'actividad_religiosa',
					'actividad_cultural',
					'tipo_actividad_pareja_desc',
					'tipo_actividad_familia_desc',
					'actividad_semanal',
					'actividad_quincenal',
					'actividad_mensual'
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function esehabitos()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

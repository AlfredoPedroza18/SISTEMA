<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class HabitosGnp extends Model
{
    
       protected $table='ese_gnp_habitos';
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
					'actividad_mensual',
					'que_medicamento',
					'medicamento_frecuencia',
					'medicamento_dosis'

						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function gnphabitos()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

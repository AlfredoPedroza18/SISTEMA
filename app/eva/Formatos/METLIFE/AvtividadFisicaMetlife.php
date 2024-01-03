<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class AvtividadFisicaMetlife extends Model
{
    protected $table='ese_metlife_actividad_fisica';
    protected $fillable=[
    					'id_formato',
    					'caso_emergencia',
						'caso_telefono',
						'actividad_fisica',
						'actividad_social',
						'actividad_deportiva',
						'actividad_religiosa',
						'actividad_cultural',
						'tiempo_diario',
						'tiempo_semanal',
						'tiempo_quincenal',
						'tiempo_mensual',
    					
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function eseactividad()
    {
    	   	return $this->belongsTo( FormatoMetlife::class, 'id_formato' );
    }
}

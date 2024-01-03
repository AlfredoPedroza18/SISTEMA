<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class ApreciacionViviendaMetlife extends Model
{
 protected $table='ese_metlife_apreciacion_vivienda';
    protected $fillable=[
    					'id_formato',
    					'condiciones_alta', 
						'orden_alta', 
						'calidad_alta', 
						'conservacion_alta', 
						'espacio_sobrado', 
						'condiciones_malta', 
						'orden_malta', 
						'calidad_malta', 
						'conservacion_malta', 
						'espacio_suficiente', 
						'condiciones_media', 
						'[orden_media', 
						'calidad_media', 
						'conservacion_media', 
						'espacio_limitado', 
						'condiciones_media_baja', 
						'orden_media_baja', 
						'calidad_media_baja', 
						'conservacion_media_baja', 
						'espacio_insuficiente', 
						'condiciones_baja', 
						'orden_baja', 
						'calidad_baja', 
						'conservacion_baja', 
						'tiene_familiares',
						'especificacion',
						'entero_vacante'
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function eseapreciacion()
    {
    	   	return $this->belongsTo( FormatoMetlife::class, 'id_formato' );
    }
}

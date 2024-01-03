<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class EscolaridadGnp extends Model
{
    protected $table='ese_gnp_escolaridad';
    protected $fillable=[
    					'id_formato',
    					'institucion_primaria',
						'domicilio_primaria',
						'periodo_primaria',
						'anos_primaria',
						'comprobante_primaria',
						'institucion_secundaria',
						'domicilio_secundaria',
						'periodo_secundaria',
						'anos_secundaria',
						'comprobante_secundaria',
						'institucion_tecnica',
						'domicilio_tecnica',
						'periodo_tecnica',
						'anos_tecnica',
						'comprobante_tecnica',
						'institucion_preparatoria',
						'domicilio_preparatoria',
						'periodo_preparatoria',
						'anos_preparatoria',
						'comprobante_preparatoria',
						'institucion_profesiona',
						'domicilio_profesional',
						'periodo_profesional',
						'anos_profesional',
						'comprobante_profesional ',
						'institucion_otro',
						'domicilio_otro',
						'periodo_otro',
						'anos_otro',
						'comprobante_otro',
						'escolaridad_observaciones',
						'si_trunco',
						'si_estudiando'
    				   ];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

     public function gnpescolaridad()
    {
    	   return $this->belongsto(FormatoGnp::class,'id_formato');
    }
}

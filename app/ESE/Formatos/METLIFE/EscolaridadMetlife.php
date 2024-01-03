<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class EscolaridadMetlife extends Model
{
    protected $table='ese_metlife_escolaridad';
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
						'escolaridad_observaciones'
    				   ];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

     public function ese_escolaridad()
    {
    	   return $this->belongsto(FormatoMetlife::class,'id_formato');
    }
}

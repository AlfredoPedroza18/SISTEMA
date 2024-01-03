<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class SituacionEconomicaGnp extends Model
{
    protected $table='ese_gnp_situacioneconomica';
    protected   $fillable=[
						'id_formato',
						'conceptoinUno',
						'tipoinUno',
						'ingresosUno',
						'egresosUno',
						'conceptoinDos',
						'tipoinDos',
						'ingresosDos',
						'egresosDos',
						'conceptoinTres',
						'tipoinTres',
						'ingresosTres',
						'egresosTres',
						'conceptoinCuatro',
						'tipoinCuatro',
						'ingresosCuatro',
						'egresosCuatro',
						'conceptoinCinco',
						'tipoinCinco',
						'ingresosCinco',
						'egresosCinco',
						'conceptoinSeis',
						'tipoinSeis',
						'ingresosSeis',
						'egresosSeis',
						'conceptoinSiete',
						'tipoinSiete',
						'ingresosSiete',
						'egresosSiete',
						'conceptoinOcho',
						'tipoinOcho',
						'ingresosOcho',
						'egresosOcho',
						'conceptoinNueve',
						'tipoinNueve',
						'ingresosNueve',
						'egresosNueve',
						'conceptoinDiez',
						'tipoinDiez',
						'ingresosDiez',
						'egresosDiez',
						'conceptoinOnce',
						'tipoinOnce',
						'ingresosOnce',
						'egresosOnce',
						'deficit_seconomica',
						'observaciones_seconomica'
 		 		];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function gnpsiteco()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

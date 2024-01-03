<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class SituacionEconomicaMetlife extends Model
{
   protected $table='ese_metlife_situacioneconomica';
    protected $fillable=[
                        'id_formato',
						'conceptoinUno',
						'ingresosUno',
						'egresosUno',
						'conceptoinDos',
						'ingresosDos',
						'egresosDos',
						'conceptoinTres',
						'ingresosTres',
						'egresosTres',
						'conceptoinCuatro',
						'ingresosCuatro',
						'egresosCuatro',
						'conceptoinCinco',
						'ingresosCinco',
						'egresosCinco',
						'conceptoinSeis',
						'ingresosSeis',
						'egresosSeis',
						'conceptoinSiete',
						'ingresosSiete',
						'egresosSiete',
						'conceptoinOcho',
						'ingresosOcho',
						'egresosOcho',
						'conceptoinNueve',
						'ingresosNueve',
						'egresosNueve'
		    ];
    protected $hidden=['id'];
    public $timestamps	= false;

     public function ese_situacioneconomica()
    {
    	   return $this->belongsto(FormatoMetlife::class,'id_formato');
    }
}

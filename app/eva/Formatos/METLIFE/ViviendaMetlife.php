<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class ViviendaMetlife extends Model
{
    protected $table='ese_metlife_vivienda';
    protected $fillable=[
    					'id_formato',
						'vivienda_propia',
						'propiedad_sola',
						'servicio_luz',
						'distribucion_sala',
						'economico_alto',
						'vivienda_rentada',
						'propiedad_duplex',
						'servicio_agua',
						'distribucion_comedor',
						'economico_malto',
						'vivienda_hipoteca',
						'propiedad_huespedes',
						'servicio_pavimentacion',
						'distribucion_recamara',
						'economico_medio',
						'vivienda_congelada',
						'propiedad_depto',
						'servicio_drenaje',
						'distribucion_cocina',
						'economico_mediobajo',
						'vivienda_prestada',
						'propiedad_condominio',
						'ervicio_telefono',
						'distribucion_bano',
						'economico_bajo',
						'vivienda_padres',
						'propiedad_vecindad',
						'servicio_refrigerador',
						'distribucion_garaje',
						'vivienda_otro',
						'propiedad_otro',
						'servicio_boiler',
						'distribucion_biblioteca',
						'personas_viven'
		    ];
    protected $hidden=['id'];
    public $timestamps	= false;

     public function ese_vivienda()
    {
    	   return $this->belongsto(FormatoMetlife::class,'id_formato');
    }
}

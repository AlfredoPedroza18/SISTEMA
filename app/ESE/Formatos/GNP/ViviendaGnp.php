<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class ViviendaGnp extends Model
{
    protected $table='ese_gnp_info_vivienda';
    protected $fillable=[
						 'id_formato',
						'vivienda_propia',
						'vivienda_rentada',
						'vivienda_hipotecada',
						'vivienda_congelada',
						'vivienda_prestada',
						'vivienda_padres',
						'vivienda_otro',
						'inmueble_casa',
						'inmueble_departamento',
						'inmueble_duplex',
						'inmueble_condominio',
						'inmueble_vecindad',
						'inmueble_cuarto',
						'inmueble_otro',
						'servicios_luz',
						'servicios_agua',
						'servicios_pavimentacien',
						'servicios_drenaje',
						'servicios_telefono',
						'servicios_seg_publica',
						'servicios_alumbrado',
						'distribucion_sala',
						'distribucion_comedor',
						'distribucion_recámara',
						'distribucion_cocina',
						'distribucion_bano',
						'distribucion_garaje',
						'distribucion_biblioteca',
						'distribucion_jardín',
						'distribucion_zotehuela',
						'distribucion_patio',
						'distribucion_estudio',
						'distribucion_cuarto_de_servicio',
						'personas_viven'
		    ];
    protected $hidden=['id'];
    public $timestamps	= false;

     public function gnp_vivienda()
    {
    	   return $this->belongsto(FormatoGnp::class,'id_formato');
    }
}

<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class DatosGeneralesGnp extends Model
{
    protected $table='ese_gnp_datos_generales';
    protected $fillable=[
 		 		'id_formato',
				'nombre_general',
				'sexo',
				'edad',
				'edo_civil',
				'fecha_matrimonio',
				'calle',
				'num_ext',
				'num_int',
				'lugar_nac',
				'nacionalidad',
				'colonia',
				'fecha_nac',
				'puesto',
				'cp',
				'tiem_dom',
				'celular',
				'municipio',
				'email',
				'telefono',
				'tiempo_domicilio',
				'telefono_recados',
				'entre_calles'
 		 		];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function gnpdatosgenerales()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

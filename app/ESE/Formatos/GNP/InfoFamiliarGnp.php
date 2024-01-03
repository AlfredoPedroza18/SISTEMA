<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class InfoFamiliarGnp extends Model
{
    protected $table='ese_gnp_info_fam';
    protected $fillable=[
 		 		'id_formato',
				'id_formato',
				'con_quien_vive',
				'relacion_familia',
				'familiares_extrangero',
				'familiares_interior_republica',
				'frecuencia_visita',
				'observaciones'
 		 		];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function gnpinfofam()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class InfoFamiliarRoa extends Model
{
    protected $table='ese_grupo_roa_info_fam';
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

   public function roainfofam()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

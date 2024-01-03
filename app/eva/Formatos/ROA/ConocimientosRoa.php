<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class ConocimientosRoa extends Model
{
      protected $table='ese_grupo_roa_conocimientos';
    protected $fillable=[     'id_formato',
							 'paqueteria',
							 'porcentaje'
							 ];
	protected $hidden 		=['id'];
	public 	  $timestamps	=false;

	public function ConoMet(){
	return $this->belongsTo(FormatoRoa::class,'id_formato');
		
	}
}

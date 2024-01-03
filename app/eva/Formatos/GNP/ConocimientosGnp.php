<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class ConocimientosGnp extends Model
{
    protected $table='ese_gnp_conocimientos';
    protected $fillable=[     'id_formato',
							 'paqueteria',
							 'porcentaje'
							 ];
	protected $hidden 		=['id'];
	public 	  $timestamps	=false;

	public function ConoMet(){
	return $this->belongsTo(FormatoGnp::class,'id_formato');
		
	}
}

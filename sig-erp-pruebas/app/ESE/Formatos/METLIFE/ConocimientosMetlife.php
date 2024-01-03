<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class ConocimientosMetlife extends Model
{
    protected $table='ese_metlife_conocimientos';
    protected $fillable=[     'id_formato',
							 'paqueteria',
							 'porcentaje'
							 ];
	protected $hidden 		=['id'];
	public 	  $timestamps	=false;

	public function ConoMet(){
	return $this->belongsTo(FormatoMetlife::class,'id_formato');
		
	}
}

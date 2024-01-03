<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class FamiliaGnp extends Model
{
    protected $table='ese_gnp_familia';
    protected $fillable=[     
    						 'id_formato',
							  'parentesco',
							  'nombre',
							  'edad',
							  'ocupacion',
							  'edo_cvil_familia',
							  'domicilio'
							 ];
	protected $hidden 		=['id'];
	public 	  $timestamps	=false;

	public function FamiGnp(){
	return $this->belongsTo(FormatoGnp::class,'id_formato');
		
	}
}

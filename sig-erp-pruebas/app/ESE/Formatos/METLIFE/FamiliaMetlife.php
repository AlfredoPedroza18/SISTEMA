<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class FamiliaMetlife extends Model
{
    protected $table='ese_metlife_familia';
    protected $fillable=[     
    						 'id_formato',
							  'parentesco',
							  'nombre',
							  'edad',
							  'ocupacion'
							 ];
	protected $hidden 		=['id'];
	public 	  $timestamps	=false;

	public function FamiMet(){
	return $this->belongsTo(FormatoMetlife::class,'id_formato');
		
	}
}

<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class FamiliaRoa extends Model
{
     protected $table='ese_grupo_roa_familia';
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

	public function FamiMet(){
	return $this->belongsTo(FormatoRoa::class,'id_formato');
		
	}
}

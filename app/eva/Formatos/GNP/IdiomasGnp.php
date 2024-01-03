<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class IdiomasGnp extends Model
{
    protected $table ='ese_gnp_idiomas';
    protected $fillable=[	
						 'id_formato',
						 'idioma', 
						 'hablado', 
						 'leido', 
						 'escrito', 
						 'comprension', 
						 'porcentaje'
					  ];
	protected $hidden 		=['id'];
    public 	  $timestamps	=false;

    public function idiomasRealizados(){
    	return $this->belongsto(FormatoGnp::class,'id_formato');
    }
}

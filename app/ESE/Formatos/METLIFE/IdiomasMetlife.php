<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class IdiomasMetlife extends Model
{
    protected $table ='ese_metlife_idiomas';
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
    	return $this->belongsto(FormatoMetlife::class,'id_formato');
    }
}

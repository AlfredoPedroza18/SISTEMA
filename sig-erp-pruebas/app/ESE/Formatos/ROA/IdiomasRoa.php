<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class IdiomasRoa extends Model
{
  protected $table ='ese_grupo_roa_idiomas';
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
    	return $this->belongsto(FormatoRoa::class,'id_formato');
    }
}

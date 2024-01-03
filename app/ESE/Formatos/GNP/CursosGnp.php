<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class CursosGnp extends Model
{
 protected $table ='ese_gnp_cursos';
    protected $fillable=[	
					    'id_formato',
					    'de',
					    'a',
					    'realizo'
					  ];
	protected $hidden 		=['id'];
    public 	  $timestamps	=false;

    public function cursoRealizadoGnp(){
    	return $this->belongsto(FormatoGnp::class,'id_formato');
    }
}

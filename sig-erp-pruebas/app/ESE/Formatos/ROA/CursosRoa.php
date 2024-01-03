<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class CursosRoa extends Model
{
    protected $table ='ese_grupo_roa_cursos';
    protected $fillable=[	
					    'id_formato',
					    'de',
					    'a',
					    'realizo'
					  ];
	protected $hidden 		=['id'];
    public 	  $timestamps	=false;

    public function cursoRealizadoRoa(){
    	return $this->belongsto(FormatoRoa::class,'id_formato');
    }
}

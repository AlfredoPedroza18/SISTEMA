<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class CursosMetlife extends Model
{
    protected $table ='ese_metlife_cursos';
    protected $fillable=[	
					    'id_formato',
					    'de',
					    'a',
					    'realizo'
					  ];
	protected $hidden 		=['id'];
    public 	  $timestamps	=false;

    public function cursoRealizado(){
    	return $this->belongsto(FormatoMetlife::class,'id_formato');
    }

}

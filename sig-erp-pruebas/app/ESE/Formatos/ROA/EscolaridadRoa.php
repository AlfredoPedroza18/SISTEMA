<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class EscolaridadRoa extends Model
{
    protected $table ='ese_grupo_roa_escolaridad';
    protected $fillable=[	
						'id_formato',
						'grado',
						'institucion',
						'domicilio',
						'periodos',
						'años',
						'comprobante',
						'folio'
					  ];
	protected $hidden 		=['id'];
    public 	  $timestamps	=false;

    public function escolaridadRoa(){
    	return $this->belongsto(FormatoRoa::class,'id_formato');
    }
}

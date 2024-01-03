<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class ReferenciasPersonalesRoa extends Model
{
    protected $table ='ese_grupo_roa_referencias_personales';
    protected $fillable=[	
						'id_formato',
						'nombre_referencia',
						'celular_referencia',
						'domicilio_referencia',
						'telefono_referencia',
						'ocupacion_referencia',
						'empresa_referencia',
						'parentesco_referencia',
						'tiempo_conocerlo_referencia',
						'comentarios_referencias'
					  ];
	protected $hidden 		=['id'];
    public 	  $timestamps	=false;

    public function ese_referencias(){
    	return $this->belongsTo(FormatoRoa::class,'id_formato');
    }
}

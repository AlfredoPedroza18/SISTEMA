<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class ReferenciasPersonalesMetlife extends Model
{
    protected $table ='ese_metlife_referencias_personales';
    protected $fillable=[	
						 'id_formato',
						 'nombre_referencia',
						 'celular_referencia',
						 'domicilio_referencia',
						 'telefono_referencia',
						 'ocupacion_referencia',
						 'tiempo_conocerlo_referencia',
						 'comentarios_referencia'
					  ];
	protected $hidden 		=['id'];
    public 	  $timestamps	=false;

    public function ese_referencias(){
    	return $this->belongsTo(FormatoMetlife::class,'id_formato');
    }
   }

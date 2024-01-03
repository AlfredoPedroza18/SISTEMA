<?php

namespace App\ESE;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table 		= 'ese_candidato';
    public 	  $timestamps	= false;
    protected $hidden 		= [ 'id','fecha_alta' ];
    protected $fillable 	= [ 'nombre'			,'apellido_paterno'	,'apellido_materno',
    							'telefono'			,'telefono_aux'		,'email',
    							'cp'				,'ciudad'			,'delegacion',
    							'colonia'			,'calle'			,'numero_exterior',
								'numero_interior'	,'sexo'				,'fecha_alta' ];

    public function estudioEse()
    {
    	return $this->belongsTo('App\ESE\EstudioEse','id_ese');	
    }

    public function getNombreCompletoAttribute()
    {
        return $this->attributes['nombre'] . ' ' . $this->attributes['apellido_paterno'] . ' ' . $this->attributes['apellido_materno'];
    }
    
}

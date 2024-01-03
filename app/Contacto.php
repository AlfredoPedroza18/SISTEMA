<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table 	= 'contactos';
    protected $fillable = [     'id_cliente'  ,'nombre_con'  		 ,'cargo'		,'departamento', 
                                'genero_con' ,'fecha_nacimiento_con','telefono1'   ,'telefono2'   ,
                                'ext1'        ,'ext2'		         ,'celular1'    ,'celular2'    ,
                                'correo1'     ,'correo2'		     ,'pagina_web'  ,'apellido_materno_con',
                                'apellido_paterno_con'  ];
    public 	  $timestamps = false;

    public function clientes(){
        return $this->belongsToMany('App\Cliente');
    }

    public function nombre_contacto()
    {
        return $this->nombre_con . ' ' . $this->apellido_paterno_con . ' ' . $this->apellido_materno_con . ' ' . $this->telefono1;
    }
}

<?php

namespace App\Administrador;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table 		= "modulos";
    protected $fillable 	= ["id_usuario","nombre","descripcion","fecha"];
    public 	  $timestamps 	= false;


    public function submodulo()
    {
        return $this->hasMany( 'App\Administrador\SubModulo','id_modulo' );
    }

    	
}

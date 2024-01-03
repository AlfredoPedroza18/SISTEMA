<?php

namespace App\Administrador;

use Illuminate\Database\Eloquent\Model;

class SubModulo extends Model
{
    protected $table 		= "sub_modulos";
    protected $fillable 	= ["id_usuario","id_modulo","nombre","descripcion","fecha"];
    public 	  $timestamps	= false;

    public function submodulo()
    {
        return $this->belongsTo('App\Administrador\Modulo');
    }
}

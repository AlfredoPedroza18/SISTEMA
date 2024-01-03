<?php

namespace App\Administrador;

use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    protected $table 		= "acciones";
    protected $fillable 	= ["nombre","descripcion","fecha"];
    public 	  $timestamps	= false;

}

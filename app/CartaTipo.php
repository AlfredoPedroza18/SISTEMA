<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartaTipo extends Model
{
    protected $table 	  = 'cartas_tipo';
    protected $fillable   = ['contenido','id_usuario','fecha_alta','titulo','descripcion']; 
    public 	  $timestamps = false;
}

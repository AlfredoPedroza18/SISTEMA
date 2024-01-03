<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrador extends Model
{
    protected $table 	  = 'borradores_email';
    protected $fillable   = ['id_usuario', 'titulo', 'descripcion', 'para', 'asunto', 'contenido','datos_adjuntos'];
    public 	  $timestamps = false;

    
}

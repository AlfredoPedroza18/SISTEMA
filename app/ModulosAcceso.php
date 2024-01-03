<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModulosAcceso extends Model
{
    protected $table = 'modulos_acceso';
    protected $fillable = [
                            'IdModulo',
                            'Codigo',
                            'Nombre'
                           ];
    public 	  $timestamps 	= false;
}

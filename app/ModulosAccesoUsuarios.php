<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModulosAccesoUsuarios extends Model
{
    protected $table = 'modulos_acceso_usuarios';
    protected $fillable = [
                            'IdUsuarioModulo',
                            'IdModulo',
                            'IdUsuario'
                           ];
    public 	  $timestamps 	= false;
}

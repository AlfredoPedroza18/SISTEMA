<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionUsuario extends Model
{
    protected $table = 'configuracion_usuarios';

    public function usuarios()
    {
    	return $this->belongsToMany(User::class,'configuracion_modulos','id_configuracion','id_usuario');
    }
}

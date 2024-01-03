<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionFecha extends Model
{
    protected $table = 'configuracion_fechas';
    protected $dates = ['fecha_fin','fecha_inicio'];
    public $timestamps = false;

    public function usuarios()
    {
    	return $this->belongsToMany(User::class,'configuracion_modulos','id_configuracion','id_usuario');
    }
}

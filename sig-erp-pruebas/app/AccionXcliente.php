<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccionXcliente extends Model
{
    //
    public $timestamps=false;
    protected $table='kardex';
    protected $fillable=[  	'id' ,
							'actividad',
							'hr_inicio' ,
							'hr_fin',
							'tiempo_accion',
							'fecha_seguimiento',
							'fecha_accion',
							'descripcion',
							'ruta',
							'id_user',
							'id_cliente'];


}

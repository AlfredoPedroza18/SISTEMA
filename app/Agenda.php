<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
	public $timestamps=false;
    protected $table='agenda';
    protected $fillable=[
    'evento',
    'hora_inicio',
    'hora_fin',
    'fecha_inicio',
    'fecha_fin',
    'ocurrencia_evento',
    'id_usuario'

    ];
}

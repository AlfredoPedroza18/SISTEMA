<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class HabitosDetalleHddisc extends Model
{
    protected $table = 'ese_hddisc_habitos_detalle';
    protected $fillable = ['tipo','respuesta','cantidad','diario','semanal','quincenal','ocasional'];
    public $timestamps = false;


    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }


}

<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class HabitosHddisc extends Model
{
    protected $table = 'ese_hddisc_habitos';
    protected $fillable = ['realiza_actividad','tipo_actividad','tiempo_dedicado','cuales'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

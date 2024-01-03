<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class HabitosGent extends Model
{
    protected $table = 'ese_gent_habitos';
    protected $fillable = ['realiza_actividad','tipo_actividad','tiempo_dedicado','cuales'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

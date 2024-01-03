<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class HabitosFemsa extends Model
{
    protected $table = 'ese_femsa_habitos';
    protected $fillable = ['realiza_actividad','tipo_actividad','tiempo_dedicado','cuales'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class EscolaridadObservacionesFemsa extends Model
{
    protected $table 	= 'ese_femsa_escolaridad_obs';
    protected $fillable = [ 'trunco_abandono','estudia_horario','observaciones', ];
    public $timestamps  = false;


    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

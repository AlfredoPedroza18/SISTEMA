<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class EscolaridadObservacionesGent extends Model
{
    protected $table 	= 'ese_gent_escolaridad_obs';
    protected $fillable = [ 'trunco_abandono','estudia_horario','observaciones', ];
    public $timestamps  = false;


    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class EscolaridadObservacionesHddisc extends Model
{
    protected $table 	= 'ese_hddisc_escolaridad_obs';
    protected $fillable = [ 'trunco_abandono','estudia_horario','observaciones', ];
    public $timestamps  = false;


    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

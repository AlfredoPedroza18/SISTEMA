<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class ResumenFemsa extends Model
{
    protected $table 	= 'ese_femsa_resumen';
    protected $fillable = [ 'fecha','empresa','nombre','puesto','status','situacion_socioeconomica','escolaridad',
    						'trayectoria_laboral','disponibilidad','puntualidad','presentacion','respuestas','incidentes_seguridad',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

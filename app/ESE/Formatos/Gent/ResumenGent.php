<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class ResumenGent extends Model
{
    protected $table 	= 'ese_gent_resumen';
    protected $fillable = [ 'fecha','empresa','nombre','puesto','status','situacion_socioeconomica','escolaridad',
    						'trayectoria_laboral','disponibilidad','puntualidad','presentacion','respuestas','incidentes_seguridad',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

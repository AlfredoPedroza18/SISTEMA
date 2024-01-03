<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class ResumenHddisc extends Model
{
    protected $table 	= 'ese_hddisc_resumen';
    protected $fillable = [ 'fecha','empresa','nombre','puesto','status','situacion_socioeconomica','escolaridad',
    						'trayectoria_laboral','disponibilidad','puntualidad','presentacion','respuestas','incidentes_seguridad',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

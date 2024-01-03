<?php

namespace App\ESE\Formatos\Evenplan;

use Illuminate\Database\Eloquent\Model;

class ResumenEvenplan extends Model
{
    protected $table = 'ese_evenplan_resumen';
    protected $fillable = [ 'id_formato','candidato','puesto_solicitado','cliente',
    						'atencion_a','calificacion_excelente','calificacion_bueno',
    						'calificacion_regular','calificacion_malo','calificacion_muy_malo',
    						'resultado','observaciones_personal','observaciones_familiar',
    						'observaciones_escolar','observaciones_economico','observaciones_laboral',
    						'observaciones_finales'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoEvenplan::class, 'id_formato' );
    }
}

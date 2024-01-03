<?php

namespace App\ESE\Formatos\Evenplan;

use Illuminate\Database\Eloquent\Model;

class ReferenciaPersonalEvenplan extends Model
{
    protected $table 	= 'ese_evenplan_referencias_personales';
    protected $fillable = [ 'id_formato','da_referencia','ocupacion','domicilio','telefono',
    						'tiempo_conocerlo','relacion_candidato','comentarios'];
    public $timestamps 	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoEvenplan::class, 'id_formato' );
    }
}

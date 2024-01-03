<?php

namespace App\ESE\Formatos\Evenplan;

use Illuminate\Database\Eloquent\Model;

class EscolaridadDetalleEvenplan extends Model
{
    protected $table 	= 'ese_evenplan_escolaridad_detalle';
    protected $fillable = ['id_formato', 'estudia_actualmente', 'donde','horario'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoEvenplan::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class DisponibilidadSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_disponibilidad';
    protected $fillable = ['empleado_actualmente','dispuesto_viajar','cambiar_residencia','comenzar_trabajar'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

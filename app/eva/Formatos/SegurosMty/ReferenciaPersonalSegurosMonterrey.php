<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class ReferenciaPersonalSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_referencias_personales';
    protected $fillable = ['nombre_referencia','celular','domicilio','telefono','ocupacion','tiempo_conocerlo','comentarios'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

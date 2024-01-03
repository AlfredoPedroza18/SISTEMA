<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class DisponibilidadGent extends Model
{
    protected $table = 'ese_gent_disponibilidad';
    protected $fillable = [	'empleado_actualmente','dispuesto_viajar','cambiar_residencia','comenzar_trabajar','famliar_empresa',
							'famliar_empresa_detalle',];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

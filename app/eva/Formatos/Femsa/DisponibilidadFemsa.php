<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class DisponibilidadFemsa extends Model
{
    protected $table = 'ese_femsa_disponibilidad';
    protected $fillable = [	'empleado_actualmente','dispuesto_viajar','cambiar_residencia','comenzar_trabajar','famliar_empresa',
							'famliar_empresa_detalle',];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class DisponibilidadHddisc extends Model
{
    protected $table = 'ese_hddisc_disponibilidad';
    protected $fillable = [	'empleado_actualmente','dispuesto_viajar','cambiar_residencia','comenzar_trabajar','famliar_empresa',
							'famliar_empresa_detalle',];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

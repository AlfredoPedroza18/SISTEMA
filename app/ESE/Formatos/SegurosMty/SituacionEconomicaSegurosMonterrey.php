<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class SituacionEconomicaSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_situacion_economica';
    protected $fillable = [ 'i_concepto1','i_monto1','i_concepto2','i_monto2','i_concepto3','i_monto3',
							'i_concepto4','i_monto4','i_concepto5','i_monto5','i_concepto6','i_monto6',
							'i_concepto7','i_monto7','i_concepto8','i_monto8','i_concepto9','i_monto9',
                            'i_concepto10','i_monto10','e_concepto10','e_monto10',
							'i_total','e_concepto1','e_monto1','e_concepto2','e_monto2','e_concepto3','e_monto3',
							'e_concepto4','e_monto4','e_concepto5','e_monto5','e_concepto6','e_monto6',
							'e_concepto7','e_monto7','e_concepto8',	'e_monto8','e_concepto9','e_monto9','e_total',
    ];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

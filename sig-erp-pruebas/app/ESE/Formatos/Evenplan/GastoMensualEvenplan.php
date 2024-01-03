<?php

namespace App\ESE\Formatos\Evenplan;

use Illuminate\Database\Eloquent\Model;

class GastoMensualEvenplan extends Model
{
    protected $table 	= 'ese_evenplan_gastos_mensuales';
    protected $fillable = [ 'id_formato','e_alimentacion','e_renta','e_servicios','e_transportes','e_escolares',
    						'e_ropa_calzado','e_servicio_domestico','e_creditos','e_diversiones','e_otros',
    						'e_total','i_ingreso0','i_ingreso1','i_ingreso2','i_ingreso3','i_ingreso0_concepto',
    						'i_ingreso1_concepto','i_ingreso2_concepto','i_ingreso3_concepto','i_total',
    						'total_diferencia','observaciones'];
    public $timestamps 	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoEvenplan::class, 'id_formato' );
    }
}

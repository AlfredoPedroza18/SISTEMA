<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class PadecimientoHddisc extends Model
{
    protected $table 	= 'ese_hddisc_padecimientos';
    protected $fillable = [ 'acidez',
							'insomnio',
							'debilidad',
							'ansiedad',
							'escalofrios',
							'mareos',
							'dolor_cabeza',
							'manos_temblorosas',
							'taquicardia',
							'estrenimiento',
							'alergia',
							'tipo',
							'tratamiento_medico',
							'tratamiento_medico_desc',
							'medicamento_controlado',
							'medicamento_controlado_desc',];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

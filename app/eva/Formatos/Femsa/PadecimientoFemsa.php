<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class PadecimientoFemsa extends Model
{
    protected $table 	= 'ese_femsa_padecimientos';
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
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

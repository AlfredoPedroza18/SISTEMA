<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class PadecimientosRoa extends Model
{
     protected $table='ese_grupo_roa_padecimientos';
    protected $fillable=[
						'id_formato',
						'acidez',
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
						'medicamento_controlado_desc'
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function esepadecimientos()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

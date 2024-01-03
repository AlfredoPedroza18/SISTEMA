<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class PadecimientosGnp extends Model
{
    protected $table='ese_gnp_padecimientos';
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

   public function gnppadecimientos()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

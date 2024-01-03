<?php

namespace App\ESE\Formatos\BCM;

use Illuminate\Database\Eloquent\Model;

class ReferenciasLaboralesBcm extends Model
{
   
	protected $table 		= 'ese_bcm_referencias_laborales';
    protected $fillable		= [	'id_formato',
								'empresa_empresa',
								'empresa_candidato',
								'periodo_empresa',
								'periodo_candidato',
								'motivo_salida_empresa',
								'motivo_salida_candidato'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoBcm::class, 'id_formato' );
    }
}

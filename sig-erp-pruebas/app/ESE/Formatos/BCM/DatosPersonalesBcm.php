<?php

namespace App\ESE\Formatos\BCM;

use Illuminate\Database\Eloquent\Model;

class DatosPersonalesBcm extends Model
{
   protected $table 		= 'ese_bcm_datos_personales';
    protected $fillable		= [	'id_formato','celular','telefono_casa','fecha_nacimiento','lugar_nacimiento','domicilio_actual','entre_calles',
    							'tiempo_radicar_domicilio_actual', 'domicilio_anterior','tiempo_radicar_domicilio_anterior',
								'edad','sexo','edo_civil','cp'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoBcm::class, 'id_formato' );
    }
}

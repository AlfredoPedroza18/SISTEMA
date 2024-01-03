<?php

namespace App\ESE\Formatos\BCM;

use Illuminate\Database\Eloquent\Model;

class TipoViviendaBcm extends Model
{
    protected $table 		= 'ese_bcm_tipo_vivienda';
    protected $fillable		= [	'id_formato',
								'propia',
								'hipotecada',
								'rentada',
								'prestada',
								'padres',
								'observaciones'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoBcm::class, 'id_formato' );
    }
}

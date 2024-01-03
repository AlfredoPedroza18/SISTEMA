<?php

namespace App\ESE\Formatos\BCM;

use Illuminate\Database\Eloquent\Model;

class DescripcionViviendaBcm extends Model
{
    protected $table 		= 'ese_bcm_descripcion_vivienda';
    protected $fillable		= [	'id_formato','ubicacion','exterior'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoBcm::class, 'id_formato' );
    }
}

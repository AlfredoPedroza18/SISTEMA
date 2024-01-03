<?php

namespace App\ESE\Formatos\BCM;

use Illuminate\Database\Eloquent\Model;

class ObservacionDomicilioBcm extends Model
{
    protected $table 		= 'ese_bcm_obs_viven_dom';
    protected $fillable		= [	'id_formato','descripcion'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoBcm::class, 'id_formato' );
    }
}

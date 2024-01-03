<?php

namespace App\ESE\Formatos\BCM;

use Illuminate\Database\Eloquent\Model;

class GapsBcm extends Model
{
   protected $table 		= 'ese_bcm_gaps';
    protected $fillable		= [	'id_formato','periodo'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoBcm::class, 'id_formato' );
    }
}

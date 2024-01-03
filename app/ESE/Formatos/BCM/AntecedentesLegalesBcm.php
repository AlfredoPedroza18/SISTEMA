<?php

namespace App\ESE\Formatos\BCM;

use Illuminate\Database\Eloquent\Model;

class AntecedentesLegalesBcm extends Model
{
    protected $table 		= 'ese_bcm_antecedentes_legales';
    protected $fillable		= [	'id_formato','demanda_laboral','descripcion'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoBcm::class, 'id_formato' );
    }
}

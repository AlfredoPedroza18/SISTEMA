<?php

namespace App\ESE\Formatos\BCM;

use Illuminate\Database\Eloquent\Model;

class ResultadoBcm extends Model
{
   protected $table 		= 'ese_bcm_resultados';
    protected $fillable		= [	'id_formato','candidato','fecha_visita','resultado_candidato','resultados','observaciones'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoBcm::class, 'id_formato' );
    }
}

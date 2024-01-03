<?php

namespace App\ESE\Formatos\BCM;

use Illuminate\Database\Eloquent\Model;

class EscolaridadBcm extends Model
{
   protected $table 		= 'ese_bcm_escolaridad';
    protected $fillable		= [	'id_formato',
								'grado',
								'institucion',
								'lugar',
								'periodo',
								'certificado',
								'corroboro_datos',
								'verifico_con_institucion',
								'observaciones'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoBcm::class, 'id_formato' );
    }
}

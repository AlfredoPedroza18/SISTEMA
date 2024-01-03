<?php

namespace App\ESE\Formatos\BCM;

use Illuminate\Database\Eloquent\Model;

class PersonasDomicilioBcm extends Model
{
    protected $table 		= 'ese_bcm_personas_viven_en_domicilio';
    protected $fillable		= [	'id_formato',
								'parentesco',
								'nombre',
								'edad',
								'edo_civil',
								'ocupacion',
								'depende_del_candidato'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoBcm::class, 'id_formato' );
    }
}

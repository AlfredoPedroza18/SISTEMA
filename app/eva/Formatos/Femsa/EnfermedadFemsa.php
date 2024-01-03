<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class EnfermedadFemsa extends Model
{
    protected $table 	= 'ese_femsa_enfermedades';
    protected $fillable = [ 'estado_salud',
							'anemia',
							'gastritis',
							'ulcera',
							'asma',
							'espalda',
							'artritis',
							'gripe',
							'migrania',
							'bronquitis',
							'presion_alta',
							'presion_baja',
							'rinon',
							'epilepsia',
							'problemas_cardiacos',];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

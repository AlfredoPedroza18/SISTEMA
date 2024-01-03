<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class EnfermedadGent extends Model
{
    protected $table 	= 'ese_hddisc_enfermedades';
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
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class EnfermedadesGnp extends Model
{
    protected $table='ese_gnp_enfermedades';
    protected $fillable=[
                         'id_formato',
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
                         'problemas_cardiacos',
						 'estado_salud'
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function gnpenfermedad()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

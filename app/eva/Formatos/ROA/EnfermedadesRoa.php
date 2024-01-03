<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class EnfermedadesRoa extends Model
{
   protected $table='ese_grupo_roa_enfermedades';
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

   public function eseenfermedad()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

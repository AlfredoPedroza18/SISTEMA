<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class DisponibilidadRoa extends Model
{
   protected $table='ese_grupo_roa_disponibilidad';
    protected $fillable=[
    						'id_formato',
		    				'empleado_actualmente',
							'disponible_viajar',
							'cambiar_residencia',
							'fecha_laboral',
							'tiene_familiares',
							'nombre_familiar'
		    					
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function esedisponibilidad()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

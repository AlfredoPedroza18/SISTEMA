<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class DisponibilidadGnp extends Model
{
    protected $table='ese_gnp_disponibilidad';
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

   public function gnpdisponibilidad()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

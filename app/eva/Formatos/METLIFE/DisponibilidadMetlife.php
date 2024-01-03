<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class DisponibilidadMetlife extends Model
{
    protected $table='ese_metlife_disponibilidad';
    protected $fillable=[
    						'id_formato',
		    				'empleado_actualmente',
							'disponible_viajar',
							'cambiar_residencia',
							'fecha_laboral',
		    					
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function esedisponibilidad()
    {
    	   	return $this->belongsTo( FormatoMetlife::class, 'id_formato' );
    }
}

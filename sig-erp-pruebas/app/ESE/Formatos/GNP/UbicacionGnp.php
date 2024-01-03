<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class UbicacionGnp extends Model
{
   protected $table='ese_gnp_ubicacion';
    protected $fillable=[
    					'id_formato',
    					'distancia_trabajo',
  						'medio_transporte',
  						'descripcion_vivienda'
    					
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function gnpubicacion()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

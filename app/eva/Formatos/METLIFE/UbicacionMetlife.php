<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class UbicacionMetlife extends Model
{
     protected $table='ese_metlife_ubicacion';
    protected $fillable=[
    					'id_formato',
    					'distancia_trabajo',
  						'medio_transporte'
    					
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function eseubicacion()
    {
    	   	return $this->belongsTo( FormatoMetlife::class, 'id_formato' );
    }
}

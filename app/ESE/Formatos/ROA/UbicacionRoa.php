<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class UbicacionRoa extends Model
{
    protected $table='ese_grupo_roa_ubicacion';
    protected $fillable=[
    					'id_formato',
    					'distancia_trabajo',
  						'medio_transporte'
    					
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function eseubicacion()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

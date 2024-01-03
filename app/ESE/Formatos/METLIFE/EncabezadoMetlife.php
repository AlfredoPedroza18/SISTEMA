<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class EncabezadoMetlife extends Model
{
    protected $table='ese_metlife_encabezado';
    protected $fillable=[
    			'id_formato',
 		 		'fecha_ese',
  				'empresa',
  				'nombre' ,
  				'puesto' ,
  				'resultado_ese',
  				'situacion_economica',
  				'escolaridad',
  				'trayectoria_laboral'];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function eseencabezado()
    {
    	   	return $this->belongsTo( FormatoMetlife::class, 'id_formato' );
    }

}


  
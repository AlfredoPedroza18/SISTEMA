<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class EncabezadoGnp extends Model
{
    protected $table='ese_gnp_encabezado';
    protected $fillable=[
 		 		'id_formato',
				'fecha_ese',
				'nombre',
				'empresa',
				'puesto',
				'resultado_ese',
				'situacion_economica',
				'escolaridad',
				'trayectoria_laboral',
				'valor_calificado_disponibilidad',
				'valor_calificado_puntualidad',
				'valor_calificado_presentacion',
				'valor_calificado_comentario',
				'entrevista_tipo',
				'observaciones_datos'
 		 		];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function gnpencabezado()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

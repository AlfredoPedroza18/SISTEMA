<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class EncabezadoRoa extends Model
{
   protected $table='ese_grupo_roa_encabezado';
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
				'entrevista_tipo'
 		 		];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function roaencabezado()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

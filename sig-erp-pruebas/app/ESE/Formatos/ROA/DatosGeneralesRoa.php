<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class DatosGeneralesRoa extends Model
{
    protected $table='ese_grupo_roa_datos_generales';
    protected $fillable=[
 		 		'id_formato',
				'nombre_general',
				'sexo',
				'edad',
				'edo_civil',
				'fecha_matrimonio',
				'calle',
				'num_ext',
				'num_int',
				'lugar_nac',
				'nacionalidad',
				'colonia',
				'fecha_nac',
				'puesto',
				'cp',
				'tiem_dom',
				'celular',
				'municipio',
				'email',
				'telefono',
				'tiempo_domicilio',
				'telefono_recados',
				'entre_calles',
				'observaciones_doc_general'
 		 		];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function roadatosgenerales()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

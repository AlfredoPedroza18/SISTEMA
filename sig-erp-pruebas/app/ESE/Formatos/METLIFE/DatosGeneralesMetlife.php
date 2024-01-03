<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class DatosGeneralesMetlife extends Model
{
    protected $table='ese_metlife_datos_generales';
    protected $fillable=[
    	'id_formato',
		'nombre_general',
		'domicilio',
		'num_int_ext',
		'lugar_nac',
		'nacionalidad',
		'colonia',
		'fecha_nac',
		'puesto',
		'cp',
		'tiem_dom',
		'celular',
		'municipio',
		'telefono',
		'entre_calles'
		    ];
    protected $hidden=['id'];
    public $timestamps	= false;

     public function ese_datos_generale()
    {
    	   return $this->belongsto(FormatoMetlife::class,'id_formato');
    }
}

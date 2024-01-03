<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class DatosGeneralesSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_datos_generales';
    protected $fillable = [ 'id_formato', 'nombre_candidato', 'sexo', 'domicilio', 'colonia',
    						'lugar_nacimiento', 'nacionalidad', 'edad', 'fecha_nacimiento',
    						'edo_civil', 'puesto', 'tiempo_domicilio', 'celular',
    						'municipio', 'cp', 'telefono', 'entre_calles'];

    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

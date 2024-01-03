<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class ReferenciaPersonalFemsa extends Model
{
    protected $table = 'ese_femsa_referencias_personales';
    protected $fillable = [	'nombre_referencia',
							'celular',
							'domicilio',
							'telefono',
							'ocupacion',
							'empresa',
							'parentesco',
							'frecuencia_visita',
							'aval',
							'aval_detalle',
							'concepto',
							'problema',
							'problema_detalle',
							'tomando',
							'recomendaria',
							'comentarios',];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

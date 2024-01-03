<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class ReferenciaPersonalGent extends Model
{
    protected $table = 'ese_gent_referencias_personales';
    protected $fillable = [	'nombre_referencia',
							'celular',
							'domicilio',
							'telefono',
							'ocupacion',
							'empresa',
							'parentesco',
							'tiempo_conocerlo',
							'comentarios',];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class EscolaridadSegurosMonterrey extends Model
{
    protected $table 	= 'ese_seguros_monterrey_escolaridad';
    protected $fillable = [ 'id_formato',
							'grado',
							'institucion',
							'domicilio',
							'periodo',
							'anios',
							'comprobante',
						   ];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

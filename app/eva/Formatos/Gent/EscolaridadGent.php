<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class EscolaridadGent extends Model
{
    protected $table 	= 'ese_gent_escolaridad';
    protected $fillable = [ 'id_formato',
							'grado',
							'institucion',
							'domicilio',
							'periodo',
							'anios',
							'comprobante',
							'folio',
						   ];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class EscolaridadFemsa extends Model
{
    protected $table 	= 'ese_femsa_escolaridad';
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
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

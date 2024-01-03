<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class EscolaridadHddisc extends Model
{
    protected $table 	= 'ese_hddisc_escolaridad';
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
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class TIpoPropiedadSegurosMonterrey extends Model
{
    protected $table 	= 'ese_seguros_monterrey_tipo_propiedad';
    protected $fillable = [ 'sola',
							'duplex',
							'huespedes',
							'depto',
							'condominio',
							'vecindad',
							'otro' ];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

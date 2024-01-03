<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class TIpoPropiedadGent extends Model
{
    protected $table 	= 'ese_gent_tipo_propiedad';
    protected $fillable = [ 'casa',
							'depto',
							'duplex',
							'condominio',
							'vecindad',
							'cuarto',
							'otro', ];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

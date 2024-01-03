<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class TIpoPropiedadFemsa extends Model
{
    protected $table 	= 'ese_femsa_tipo_propiedad';
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
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

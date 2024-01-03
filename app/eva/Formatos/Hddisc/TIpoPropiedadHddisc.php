<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class TIpoPropiedadHddisc extends Model
{
    protected $table 	= 'ese_hddisc_tipo_propiedad';
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
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

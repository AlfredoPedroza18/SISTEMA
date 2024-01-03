<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class ViviendaConservacionFemsa extends Model
{
    protected $table 	= 'ese_femsa_info_vivienda_conservacion';
    protected $fillable = [ 'excelente',
							'bueno',
							'regular',
							'malo',
							'pesimo',];
    public $timestamps  = false;


    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }

}

<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class ViviendaConstruccionFemsa extends Model
{
    protected $table 	= 'ese_femsa_info_vivienda_construccion';
    protected $fillable = [	'antigua',
							'sencilla',
							'moderna',
							'semi_moderna',
							'convencional',];
    public $timestamps  = false;

     
    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }

}

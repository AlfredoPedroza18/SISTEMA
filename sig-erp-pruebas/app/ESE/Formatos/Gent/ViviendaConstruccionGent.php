<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class ViviendaConstruccionGent extends Model
{
    protected $table 	= 'ese_gent_info_vivienda_construccion';
    protected $fillable = [	'antigua',
							'sencilla',
							'moderna',
							'semi_moderna',
							'convencional',];
    public $timestamps  = false;

     
    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }

}

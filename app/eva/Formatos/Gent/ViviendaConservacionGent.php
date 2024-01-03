<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class ViviendaConservacionGent extends Model
{
    protected $table 	= 'ese_gent_info_vivienda_conservacion';
    protected $fillable = [ 'excelente',
							'bueno',
							'regular',
							'malo',
							'pesimo',];
    public $timestamps  = false;


    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }

}

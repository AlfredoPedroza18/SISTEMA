<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class ViviendaConservacionHddisc extends Model
{
    protected $table 	= 'ese_hddisc_info_vivienda_conservacion';
    protected $fillable = [ 'excelente',
							'bueno',
							'regular',
							'malo',
							'pesimo',];
    public $timestamps  = false;


    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }

}

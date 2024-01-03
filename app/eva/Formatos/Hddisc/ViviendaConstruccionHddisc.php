<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class ViviendaConstruccionHddisc extends Model
{
    protected $table 	= 'ese_hddisc_info_vivienda_construccion';
    protected $fillable = [	'antigua',
							'sencilla',
							'moderna',
							'semi_moderna',
							'convencional',];
    public $timestamps  = false;

     
    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }

}

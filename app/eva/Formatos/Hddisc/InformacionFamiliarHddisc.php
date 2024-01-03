<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class InformacionFamiliarHddisc extends Model
{
    protected $table 	= 'ese_hddisc_informacion_familiar';
    protected $fillable = [ 'habita_actualmente',
							'relacion',
							'familiares_extranjero',
							'interior_republica',
							'visita_frecuencia',
							'observaciones',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class DomicilioUbicacionHddisc extends Model
{
    protected $table 	= 'ese_hddisc_ubicacion_domicilio';
    protected $fillable = ['distancia_domicilio','transporte_utiliza'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

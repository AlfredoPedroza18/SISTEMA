<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class DomicilioUbicacionFemsa extends Model
{
    protected $table 	= 'ese_femsa_ubicacion_domicilio';
    protected $fillable = ['distancia_domicilio','transporte_utiliza'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

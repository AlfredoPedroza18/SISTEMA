<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class DomicilioUbicacionGent extends Model
{
    protected $table 	= 'ese_gent_ubicacion_domicilio';
    protected $fillable = ['distancia_domicilio','transporte_utiliza'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

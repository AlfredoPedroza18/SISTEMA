<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionGeneral extends Model
{
    protected $table = 'crm_cotizaciones_generico';
    public $timestamps = false;


    const SERVICIO = 4;

    public function cotizacion()
    {
    	return $this->belongsTo( Cotizacion::class, 'id_cotizacion');
    }

    public function servicio()
    {
    	return $this->belongsTo( Servicio::class, 'id_producto');
    }
}

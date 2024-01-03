<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class ViviendaEspacioSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_vivienda_espacio'; 
    protected $fillable = ['sobrado','suficiente','limitado','insuficiente'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

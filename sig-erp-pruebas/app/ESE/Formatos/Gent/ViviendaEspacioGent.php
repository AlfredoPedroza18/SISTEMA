<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class ViviendaEspacioGent extends Model
{
    protected $table = 'ese_gent_vivienda_espacio'; 
    protected $fillable = ['sobrado','suficiente','limitado','insuficiente'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

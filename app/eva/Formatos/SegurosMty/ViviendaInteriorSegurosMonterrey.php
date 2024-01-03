<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class ViviendaInteriorSegurosMonterrey extends Model
{
    protected $table 	= 'ese_seguros_monterrey_vivienda_condiciones_interiores';
    protected $fillable = ['alta','media_alta','media','media_baja','baja'];
    public $timestamps  = false;

     
    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }

}

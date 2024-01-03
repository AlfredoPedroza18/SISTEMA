<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class DatoFamiliarSegurosMonterrey extends Model
{
    protected $table 	= 'ese_seguros_monterrey_datos_familiares';
    protected $fillable = [ 'observaciones'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

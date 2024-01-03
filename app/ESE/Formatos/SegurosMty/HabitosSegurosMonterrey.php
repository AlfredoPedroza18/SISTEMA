<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class HabitosSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_habitos';
    protected $fillable = ['realiza_actividad','tipo_actividad','tiempo_dedicado'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

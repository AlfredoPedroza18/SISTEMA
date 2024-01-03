<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class ViviendaServiciosSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_info_vivienda_servicios';
    protected $fillable = [ 'luz', 'agua', 'pavimento','drenaje','telefono','refrigerador','boiler'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

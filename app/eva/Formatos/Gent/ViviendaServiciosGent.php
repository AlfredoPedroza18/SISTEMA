<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class ViviendaServiciosGent extends Model
{
    protected $table = 'ese_gent_info_vivienda_servicios';
    protected $fillable = [ 'luz', 'agua', 'pavimento','drenaje','telefono','seg_publica','boiler'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

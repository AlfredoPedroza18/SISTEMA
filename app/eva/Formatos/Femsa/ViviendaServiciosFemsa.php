<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class ViviendaServiciosFemsa extends Model
{
    protected $table = 'ese_femsa_info_vivienda_servicios';
    protected $fillable = [ 'luz', 'agua', 'pavimento','drenaje','telefono','seg_publica','boiler'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

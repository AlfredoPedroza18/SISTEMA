<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class ViviendaServiciosHddisc extends Model
{
    protected $table = 'ese_hddisc_info_vivienda_servicios';
    protected $fillable = [ 'luz', 'agua', 'pavimento','drenaje','telefono','seg_publica','boiler'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

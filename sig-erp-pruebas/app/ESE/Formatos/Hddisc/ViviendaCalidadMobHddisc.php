<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class ViviendaCalidadMobHddisc extends Model
{
    protected $table 	= 'ese_hddisc_info_vivienda_mobiliario';
    protected $fillable = [ 'completo','incompleto','escueto',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }

}

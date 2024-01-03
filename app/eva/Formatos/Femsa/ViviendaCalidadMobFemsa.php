<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class ViviendaCalidadMobFemsa extends Model
{
    protected $table 	= 'ese_femsa_info_vivienda_mobiliario';
    protected $fillable = [ 'completo','incompleto','escueto',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }

}

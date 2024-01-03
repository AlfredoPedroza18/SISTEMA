<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class ViviendaNivelHddisc extends Model
{
    protected $table = 'ese_hddisc_info_vivienda_nivel_economico';
    protected $fillable = [ 'alta',
							'media_alta',
							'media',
							'media_baja',
							'baja',];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }

}

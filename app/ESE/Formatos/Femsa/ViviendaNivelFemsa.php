<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class ViviendaNivelFemsa extends Model
{
    protected $table = 'ese_femsa_info_vivienda_nivel_economico';
    protected $fillable = [ 'alta',
							'media_alta',
							'media',
							'media_baja',
							'baja',];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }

}

<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class ViviendaNivelGent extends Model
{
    protected $table = 'ese_gent_info_vivienda_nivel_economico';
    protected $fillable = [ 'alta',
							'media_alta',
							'media',
							'media_baja',
							'baja',];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }

}

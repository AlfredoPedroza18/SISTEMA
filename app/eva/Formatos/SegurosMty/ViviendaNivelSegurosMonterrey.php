<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class ViviendaNivelSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_info_vivienda_nivel_economico';
    protected $fillable = [ 'alto','medio_alto','medio','medio_bajo','bajo'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }

}

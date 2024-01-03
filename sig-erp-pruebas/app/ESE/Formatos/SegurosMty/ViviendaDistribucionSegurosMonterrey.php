<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class ViviendaDistribucionSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_info_vivienda_distribucion';
    protected $fillable = [ 'sala', 'comedor',  'recamara', 'cocina','banio','garaje','biblioteca'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }

}

<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class TIpoViviendaHddisc extends Model
{
    protected $table = 'ese_hddisc_tipo_vivienda';
    protected $fillable = [ 'propia',
                            'rentada',
                            'hipotecada',
                            'congelada',
                            'prestada',
                            'de_padres',
                            'otro',
                            'viven_domicilio',   ];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

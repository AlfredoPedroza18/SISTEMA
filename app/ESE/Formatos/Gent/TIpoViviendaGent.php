<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class TIpoViviendaGent extends Model
{
    protected $table = 'ese_gent_tipo_vivienda';
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
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

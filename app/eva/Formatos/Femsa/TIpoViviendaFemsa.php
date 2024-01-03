<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class TIpoViviendaFemsa extends Model
{
    protected $table = 'ese_femsa_tipo_vivienda';
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
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

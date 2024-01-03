<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class TIpoViviendaSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_tipo_vivienda';
    protected $fillable = [ 'propia',
							'rentada',
							'hipotecada',
							'congelada',
                            'prestada',
							'de_padres',
							'otro',
                            'viven_domicilio'   ]; 
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

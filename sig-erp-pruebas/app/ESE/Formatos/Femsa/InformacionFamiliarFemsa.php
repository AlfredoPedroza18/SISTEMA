<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class InformacionFamiliarFemsa extends Model
{
    protected $table 	= 'ese_femsa_informacion_familiar';
    protected $fillable = [ 'habita_actualmente',
							'relacion',
							'familiares_extranjero',
							'interior_republica',
							'visita_frecuencia',
							'observaciones',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

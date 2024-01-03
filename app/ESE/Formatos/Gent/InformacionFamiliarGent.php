<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class InformacionFamiliarGent extends Model
{
    protected $table 	= 'ese_gent_informacion_familiar';
    protected $fillable = [ 'habita_actualmente',
							'relacion',
							'familiares_extranjero',
							'interior_republica',
							'visita_frecuencia',
							'observaciones',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

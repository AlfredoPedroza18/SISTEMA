<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class DatoFamiliarFemsa extends Model
{
    protected $table 	= 'ese_femsa_datos_familiares';
    protected $fillable = [ 'parentesco',
							'nombre',
							'edad',
							'edo_civil',
							'ocupacion',
							'domicilio',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

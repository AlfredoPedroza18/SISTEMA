<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class DatoFamiliarGent extends Model
{
    protected $table 	= 'ese_gent_datos_familiares';
    protected $fillable = [ 'parentesco',
							'nombre',
							'edad',
							'edo_civil',
							'ocupacion',
							'domicilio',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

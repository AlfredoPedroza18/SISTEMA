<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class AtencionMedicaFemsa extends Model
{
    protected $table 	= 'ese_femsa_familiares_atencion_medica';
    protected $fillable = [ 'atencion_medica','padecimiento','accidente_llamar','telefono',];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

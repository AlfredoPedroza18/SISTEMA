<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class AtencionMedicaGent extends Model
{
    protected $table 	= 'ese_gent_familiares_atencion_medica';
    protected $fillable = [ 'atencion_medica','padecimiento','accidente_llamar','telefono',];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

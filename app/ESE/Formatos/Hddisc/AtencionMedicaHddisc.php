<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class AtencionMedicaHddisc extends Model
{
    protected $table 	= 'ese_hddisc_familiares_atencion_medica';
    protected $fillable = [ 'atencion_medica','padecimiento','accidente_llamar','telefono',];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

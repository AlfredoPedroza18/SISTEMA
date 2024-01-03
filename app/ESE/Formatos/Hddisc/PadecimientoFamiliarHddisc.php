<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class PadecimientoFamiliarHddisc extends Model
{
    protected $table 	= 'ese_hddisc_familiares_padecimientos';
    protected $fillable = [ 'nombre','parentesco','padecimiento',];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

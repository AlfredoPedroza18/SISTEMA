<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class PadecimientoFamiliarFemsa extends Model
{
    protected $table 	= 'ese_femsa_familiares_padecimientos';
    protected $fillable = [ 'nombre','parentesco','padecimiento',];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

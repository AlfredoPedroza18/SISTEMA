<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class PadecimientoFamiliarGent extends Model
{
    protected $table 	= 'ese_gent_familiares_padecimientos';
    protected $fillable = [ 'nombre','parentesco','padecimiento',];
	public $timestamps  = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

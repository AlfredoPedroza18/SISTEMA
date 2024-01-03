<?php

namespace App\ESE;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'ese_imagenes';
    protected $fillable		= [	'id_ese','carpeta','archivo','tipo'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function estudioEse()
    {
    	return $this->belongsTo('App\ESE\EstudioEse','id_ese');
    }
}

<?php
namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;

class OtraFuenteIngresoJll extends Model
{
	protected $table 		= 'ese_jll_otras_fuentes_ingreso';
    protected $fillable		= [	'id_formato','descripcion'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoJll::class, 'id_formato' );
    }


}
<?php
namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;

class DescripcionViviendaJll extends Model
{
	protected $table 		= 'ese_jll_descripcion_vivienda';
    protected $fillable		= [	'id_formato','ubicacion','exterior'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoJll::class, 'id_formato' );
    }

}
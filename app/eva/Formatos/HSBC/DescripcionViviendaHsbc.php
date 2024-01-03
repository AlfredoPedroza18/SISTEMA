<?php
namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;

class DescripcionViviendaHsbc extends Model
{
	protected $table 		= 'ese_hsbc_descripcion_vivienda';
    protected $fillable		= [	'id_formato','ubicacion','exterior'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }

}
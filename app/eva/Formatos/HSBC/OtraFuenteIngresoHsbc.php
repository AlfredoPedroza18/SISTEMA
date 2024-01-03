<?php
namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;

class OtraFuenteIngresoHsbc extends Model
{
	protected $table 		= 'ese_hsbc_otras_fuentes_ingreso';
    protected $fillable		= [	'id_formato','descripcion'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }


}
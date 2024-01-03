<?php
namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;

class AntecedentesLegales extends Model
{
	protected $table 		= 'ese_hsbc_antecedentes_legales';
    protected $fillable		= [	'id_formato','demanda_laboral','descripcion'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }
}
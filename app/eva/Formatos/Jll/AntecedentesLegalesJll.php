<?php
namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;

class AntecedentesLegalesJll extends Model
{
	protected $table 		= 'ese_jll_antecedentes_legales';
    protected $fillable		= [	'id_formato','demanda_laboral','descripcion'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoJll::class, 'id_formato' );
    }
}
<?php
namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;

class ResultadoJll extends Model
{
	protected $table 		= 'ese_jll_resultados';
    protected $fillable		= [	'id_formato','candidato','fecha_visita','resultado_candidato','resultados','observaciones'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }

}
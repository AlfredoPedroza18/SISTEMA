<?php
namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;

class ResultadoHsbc extends Model
{
	protected $table 		= 'ese_hsbc_resultados';
    protected $fillable		= [	'id_formato','candidato','fecha_visita','resultado_candidato','resultados','observaciones'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }

}
<?php
namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;

class ReferenciasLaboralesHsbc extends Model
{
	protected $table 		= 'ese_hsbc_referencias_laborales';
    protected $fillable		= [	'id_formato',
								'empresa_empresa',
								'empresa_candidato',
								'periodo_empresa',
								'periodo_candidato',
								'motivo_salida_empresa',
								'motivo_salida_candidato'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }

}
<?php
namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;

class ReferenciasLaboralesJll extends Model
{
	protected $table 		= 'ese_jll_referencias_laborales';
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
    	return $this->belongsTo( FormatoJll::class, 'id_formato' );
    }

}
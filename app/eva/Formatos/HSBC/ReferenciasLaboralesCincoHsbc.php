<?php
namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;

class ReferenciasLaboralesCincoHsbc extends Model
{
	protected $table 		= 'ese_hsbc_ref_lab_cinco_anios';
    protected $fillable		= [	'id_formato',
								'empresa',
								'direccion',
								'giro',
								'telefono',
								'puesto_candidato',
								'puesto_empresa',
								'puesto_jefe_inmediato',
								'fecha_ingreso_candidato',
								'fecha_ingreso_empresa',
								'fecha_ingreso_jefe_inmediato',
								'fecha_salida_candidato',
								'fecha_salida_empresa',
								'fecha_salida_jefe_inmediato',
								'sueldo_final_candidato',
								'sueldo_final_empresa',
								'sueldo_final_jefe_inmediato',
								'funciones_candidato',
								'funciones_empresa',
								'funciones_jefe_inmediato',
								'motivo_salida_candidato',
								'motivo_salida_empresa',
								'motivo_salida_jefe_inmediato',
								'ultimo_jefe_candidato',
								'ultimo_jefe_empresa',
								'ultimo_jefe_jefe_inmediato',
								'puesto_del_jefe_candidato',
								'puesto_del_jefe_empresa',
								'puesto_del_jefe_jefe_inmediato',
								'puesto_da_informacion_candidato',
								'puesto_da_informacion_empresa',
								'puesto_da_informacion_jefe_inmediato',
								'contratar_nuevamente_candidato',
								'contratar_nuevamente_empresa',
								'contratar_nuevamente_jefe_inmediato',
								'da_informacion_candidato',
								'da_informacion_empresa',
								'da_informacion_jefe_inmediato'];
								
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }

}
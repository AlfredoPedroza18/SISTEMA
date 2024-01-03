<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class ReferenciasLaboralesRoa extends Model
{
    protected $table='ese_grupo_roa_referencias_laborales';
    protected $fillable=[
	    					 'id_formato',
							  'empresa_laboral',
							  'telefono_laboral',
							  'giro_laboral',
							  'celular_laboral',
							  'direccion_laboral',
							  'puesto_inicial_laboral',
							  'sueldo_inicial_laboral',
							  'fecha_ingreso_laboral',
							  'ultimo_puesto_laboral',
							  'sueldo_final_laboral',
							  'fecha_egreso_laboral',
							  'nombre_jinmediato_laboral',
							  'jpuesto_laboral',
							  'tiempo_dependio_laboral',
							  'principales_funciones_laboral',
							  'asistencia_laboral',
							'puntualidad_laboral',
							'honradez_laboral',
							'responsabilidad_laboral',
							'disponibilidad_laboral',
							'compromiso_empresa_laboral',
							'iniciativa_laboral',
							'calidad_trabajo_laboral',
							'trabajo_equipo_laboral',
							'trabajo_bajo_presión_laboral',
							'trato_jefe_laboral',
							'trato_compañeros_laboral',
							'productividad_capacidad_laboral',
							'liderazgo_laboral',
							'tipo_contrato_laboral',
							'motivo_separacion_laboral',
							'adeudo_laboral',
							'sindicato_laboral',
							'contrataria_laboral',
							'observaciones_laboral',
							'informo_sobre_puesto_laboral',
							'puesto_informo_laboral'

						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function esereflab()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class InformacionLaboralHddisc extends Model
{
    protected $table = 'ese_hddisc_informacion_laboral';
    protected $fillable = [ 'empresa','telefono','giro','celular','direccion','puesto_inicial','sueldo_inicial',
                            'fecha_ingreso','ultimo_puesto','sueldo_final','fecha_egreso','jefe_inmediato','jefe_puesto',
                            'jefe_tiempo_dependio','funciones','asistencia','puntualidad','honradez','responsabilidad',
                            'disponibilidad','compromiso','iniciativa','calidad_trabajo','trabajo_equipo','trabajo_presion',
                            'trato_jefe','trato_companeros','productividad_capacidad','liderazgo','tipo_contrato','motivo_separacion',
                            'robo','robo_detalle','adeudo','sindicato','contratar_nuevamente','informo','puesto_informa','observaciones',];
	public $timestamps = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

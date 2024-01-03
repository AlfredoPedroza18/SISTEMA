<?php

namespace App\ESE\Formatos\Evenplan;

use Illuminate\Database\Eloquent\Model;

class ReferenciaEconomicaEvenplan extends Model
{
    protected $table = 'ese_evenplan_referencias_economicas';
    protected $fillable = [ 'id_formato','vivienda','cuenta_con_servicios','tipo_casa','mobiliario','limpieza',
    						'orden','automovil_propio','marca_auto','anio','bienes_raices','ubicacion_bienes_raices',
    						'tdc','tdc_institucion'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoEvenplan::class, 'id_formato' );
    }
}

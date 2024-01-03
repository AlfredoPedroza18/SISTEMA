<?php

namespace App\ESE\Formatos\Evenplan;

use Illuminate\Database\Eloquent\Model;

class ReferenciaLaboralEvenplan extends Model
{
    protected $table 	= 'ese_evenplan_referencias_laborales';
    protected $fillable = [ 'id_formato','nombre_empresa','jefe_inmediato','puesto','domicilio','telefono',
    						'fecha_ingreso','puesto_inicial','salario_inicial','fecha_egreso','puesto_final',
    						'salario_final','tuvo_personal','cotizo_imss','motivo_separacion','causa',
    						'pesona_recomendable','volverian_contratar','da_referencia','da_referencia_puesto',
    						'honradez','calidad_trabajo','relacion_superiores','relacion_companeros',
    						'puntualidad','responsabilidad','comprobante','observaciones'];
    public $timestamps 	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoEvenplan::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class DocumenRoa extends Model
{
    protected $table= 'ese_grupo_roa_documentacion';
    protected $fillable=[
						'id_formato',
						'acta_acta',
						'acta_ano',
						'acta_libro',
						'acta_oficialia',
						'acta_cotejo',
						'elector_clave',
						'elector_numero',
						'elector_coincide_direccion',
						'elector_direccion',
						'elector_cotejo',
						'curp',
						'curp_cotejo',
						'rfc',
						'rfc_cotejo',
						'afore_numero',
						'afore_institucion',
						'afore_cotejo',
						'imss',
						'imss_cotejo',
						'compr_estudios_institucion',
						'compr_estudios_institucion_cotejo',
						'compr_estudios_documento',
						'compr_estudios_folio',
						'compr_estudios_documento_cotejo',
						'compr_estudios_grado',
						'compr_estudios_grado_cotejo',
						'compr_estudios_licenciatura',
						'compr_estudios_licenciatura_cotejo',
						'compr_domicilio_titular',
						'compr_domicilio_servicio',
						'compr_domicilio_servicio_cotejo',
						'licencia_tipo',
						'licencia_vigencia',
						'licencia_vigencia_cotejo',
						'cedula_numero',
						'cedula_numero_cotejo',
						'pasaporte_numero',
						'pasaporte_cotejo',
						'creditoinfo_numero',
						'creditoinfo_cotejo',
						'creditofonacot_numero',
						'creditofonacot_cotejo',
						'cartilla_matricula',
						'cartilla_liberacion',
						'cartilla_cotejo',
						'acta_matrimonio_juzgado',
						'acta_matrimonio_numero',
						'acta_matrimonio_cotejo',
						'ultimo_recibo_empresa',
						'ultimo_recibo_puesto',
						'ultimo_recibo_ingreso',
						'ultimo_recibo_cotejo',
						'documentacion_observaciones'
 		 		];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function roadocumentacion()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

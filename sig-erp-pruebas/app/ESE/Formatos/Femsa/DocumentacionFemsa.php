<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class DocumentacionFemsa extends Model
{
    protected $table 	= 'ese_femsa_documentacion';
    protected $fillable = [ 'id_formato',
							'acta_no',
							'acta_anio',
							'acta_libro',
							'acta_oficialia',
							'acta_corroboro',
							'ine_clave_',
							'ine_no',
							'ine_direccion_actual',
							'ine_direccion',
							'ine__corroboro',
							'curp',
							'curp_corroboro',
							'rfc_no',
							'rfc_corroboro',
							'afore_no',
							'afore_institucion',
							'afore_corroboro',
							'nss_no',
							'nss_corroboro',
							'ce_institucion',
							'ce_documento',
							'ce_folio',
							'ce_grado',
							'ce_licenciatura',
							'ce_corroboro',
							'cd_titular',
							'cd_servicio_fecha',
							'cd_corroboro',
							'licencia_manejo_tipo',
							'licencia_manejo_no_vig',
							'licencia_manejo_corroboro',
							'cedula_no',
							'cedula_corroboro',
							'pasaporte_no',
							'pasaporte_corroboro',
							'infonavit_no',
							'infonavit_corroboro',
							'fonacot_no',
							'fonacot_corroboro',
							'cartilla_matricula',
							'cartilla_liberacion',
							'cartilla_corroboro',
							'actam_juzgado',
							'actam_no',
							'actam_corroboro',
							'recibo_percepciones_empresa',
							'recibo_percepciones_puesto',
							'recibo_percepciones_ingreso',
							'recibo_percepciones_corroboro',
							'observaciones'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

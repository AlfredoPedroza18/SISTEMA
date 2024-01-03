<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class DocumentacionMetlife extends Model
{
    protected $table='ese_metlife_documentacion';
    protected $fillable=[
    					'acta_ano' ,  
						'acta_foja' ,
						'acta_libro',
						'acta_cotejo',
						'fotografia',
						'fotografia_cotejo' ,
						'elector_clave',
						'elector_ocr',
						'elector_cotejo' ,
						'curp',
						'curp_cotejo' ,
						'comprobante_servicio',
						'comprobante_fecha',
						'comprobante_titular',
						'comprobante_cotejo',
						'imss',
						'imss_cotejo',
						'afore' ,
						'afore_cotejo',
						'carta',
						'carta_cotejo',
						'recibo_nomina',
						'recibo_nomina_cotejo',
						'inscripcion_rfc',
						'inscripcion_rfc_cotejo',
						'constancia_estudios',
						'constancia_estudios_cotejo',
						'acta_matrimonio_acta',
						'acta_matrimonio_foja',
						'acta_matrimonio_libro',
						'acta_matrimonio_cotejo',
						'acta_nac_conyugue_ano',
						'acta_nac_conyugue_foja',
						'acta_nac_conyugue_libro',
						'acta_nac_conyugue_cotejo',
						'acta_nac_hijos',
						'acta_nac_hijos_cotejo',
						'buro_credito',
						'buro_credito_cotejo',
						'documentacion_observaciones'
   						 ];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

    public function eseDocumentacion (){

    	return $this->belongsto(FormatoMetlife::class,'id_formato');
    }
}

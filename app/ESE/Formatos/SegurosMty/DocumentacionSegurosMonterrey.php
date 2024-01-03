<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class DocumentacionSegurosMonterrey extends Model
{
    protected $table 	= 'ese_seguros_monterrey_documentacion';
    protected $fillable = [ 'id_formato',
							'identificacion_no',
							'identificacion_corroboro',
							'acta_nacimiento_no',
							'acta_nacimiento_corroboro',
							'comprobante_dom_no',
							'comprobante_dom_corroboro',
							'rfc_no',
							'rfc_corroboro',
							'nss_no',
							'nss_corroboro',
							'infonavit_no',
							'infonavit_corroboro',
							'curp_no',
							'curp_corroboro',
							'comprobante_estudios_no',
							'comprobante_estudios_corroboro',
							'observaciones',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

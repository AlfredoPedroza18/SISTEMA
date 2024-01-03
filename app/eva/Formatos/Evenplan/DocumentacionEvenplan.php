<?php

namespace App\ESE\Formatos\Evenplan;

use Illuminate\Database\Eloquent\Model;

class DocumentacionEvenplan extends Model
{
    protected $table 	= 'ese_evenplan_documentacion';
    protected $fillable = [ 'id_formato','acta_nacimiento_no','acta_nacimiento_descripcion','acta_matrimonio_no',
    						'acta_matrimonio_descripcion','comprobante_domicilio_no','comprobante_domicilio_descripcion',
    						'comprobante_estudios_no','comprobante_estudios_descripcion','identificacion_no',
    						'identificacion_descripcion','curp_no','curp_descripcion','nss_no','nss_descripcion',
    						'rfc_no','rfc_descripcion'];
    public $timestamps 	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoEvenplan::class, 'id_formato' );
    }
}

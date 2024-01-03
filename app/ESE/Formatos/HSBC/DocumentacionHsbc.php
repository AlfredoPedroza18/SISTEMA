<?php
namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;

class DocumentacionHsbc extends Model
{

	protected $table 		= 'ese_hsbc_documentacion';
    protected $fillable		= [	'id_formato',
								'ine_no_doc',
								'ine_observaciones',
								'pasaporte_no_doc',
								'pasaporte_observaciones',
								'cedula_no_doc',
								'cedula_observaciones',
								'seguro_afiliado_no',
								'seguro_afiliado_observaciones',
								'rfc_no',
								'rfc_observaciones',
								'vivio_otro_pais' ];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }


}

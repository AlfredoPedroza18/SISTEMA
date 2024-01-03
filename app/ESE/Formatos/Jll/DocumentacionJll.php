<?php
namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;

class DocumentacionJll extends Model
{

	protected $table 		= 'ese_jll_documentacion';
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
    	return $this->belongsTo( FormatoJll::class, 'id_formato' );
    }


}

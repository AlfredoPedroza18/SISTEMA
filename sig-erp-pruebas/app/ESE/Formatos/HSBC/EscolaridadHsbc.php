<?php
namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;

class EscolaridadHsbc extends Model
{
	protected $table 		= 'ese_hsbc_escolaridad';
    protected $fillable		= [	'id_formato',
								'grado',
								'institucion',
								'lugar',
								'periodo',
								'certificado',
								'corroboro_datos',
								'verifico_con_institucion',
								'observaciones'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }
}

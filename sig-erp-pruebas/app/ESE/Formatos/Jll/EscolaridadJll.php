<?php
namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;

class EscolaridadJll extends Model
{
	protected $table 		= 'ese_jll_escolaridad';
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
    	return $this->belongsTo( FormatoJll::class, 'id_formato' );
    }
}

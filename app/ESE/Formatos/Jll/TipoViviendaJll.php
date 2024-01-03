<?php
namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;

class TipoViviendaJll extends Model
{
	protected $table 		= 'ese_jll_tipo_vivienda';
    protected $fillable		= [	'id_formato',
								'propia',
								'hipotecada',
								'rentada',
								'prestada',
								'padres',
								'observaciones'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoJll::class, 'id_formato' );
    }
}
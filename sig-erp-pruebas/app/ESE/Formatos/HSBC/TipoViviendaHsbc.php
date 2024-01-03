<?php
namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;

class TipoViviendaHsbc extends Model
{
	protected $table 		= 'ese_hsbc_tipo_vivienda';
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
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }
}
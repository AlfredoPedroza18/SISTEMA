<?php
namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;

class ObservacionDomicilioJll extends Model
{
	protected $table 		= 'ese_jll_obs_viven_dom';
    protected $fillable		= [	'id_formato','descripcion'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoJll::class, 'id_formato' );
    }
}
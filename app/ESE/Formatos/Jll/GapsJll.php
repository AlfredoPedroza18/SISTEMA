<?php
namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;

class GapsJll extends Model
{
	protected $table 		= 'ese_jll_gaps';
    protected $fillable		= [	'id_formato','periodo'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoJll::class, 'id_formato' );
    }
}
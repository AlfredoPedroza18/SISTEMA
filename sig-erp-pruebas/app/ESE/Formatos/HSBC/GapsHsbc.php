<?php
namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;

class GapsHsbc extends Model
{
	protected $table 		= 'ese_hsbc_gaps';
    protected $fillable		= [	'id_formato','periodo'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }
}
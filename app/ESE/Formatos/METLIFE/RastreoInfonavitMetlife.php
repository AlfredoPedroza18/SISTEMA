<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class RastreoInfonavitMetlife extends Model
{
    protected $table='ese_metlife_rastreo_infonavit';
    protected $fillable=[
    					'id_formato',
    					'rastreo_infonavit'
    					  					
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function eserastreo()
    {
    	   	return $this->belongsTo( FormatoMetlife::class, 'id_formato' );
    }
}

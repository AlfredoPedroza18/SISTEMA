<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class RastreoInfonavitSegurosMonterrey extends Model
{
    protected $table='ese_seguros_monterrey_rastreo_infonavit';
    protected $fillable=['id_formato','codigo_rastreo'];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

    public function ese()
    {
    	   	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

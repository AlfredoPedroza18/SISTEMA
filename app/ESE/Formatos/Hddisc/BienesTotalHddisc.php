<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class BienesTotalHddisc extends Model
{
    protected $table 	= 'ese_hddisc_bienes_totales';
    protected $fillable = [ 'valor','pagado','adeudo','ubicacion'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

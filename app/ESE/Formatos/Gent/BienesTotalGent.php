<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class BienesTotalGent extends Model
{
    protected $table 	= 'ese_gent_bienes_totales';
    protected $fillable = [ 'valor','pagado','adeudo','ubicacion'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class BienesTotalFemsa extends Model
{
    protected $table 	= 'ese_femsa_bienes_totales';
    protected $fillable = [ 'valor','pagado','adeudo'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

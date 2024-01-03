<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class ConocimientosFemsa extends Model
{
    protected $table 	= 'ese_femsa_conocmientos_habilidades';
    protected $fillable = [ 'paqueteria','porcentaje'];
    public $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

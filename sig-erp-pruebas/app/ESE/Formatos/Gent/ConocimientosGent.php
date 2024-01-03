<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class ConocimientosGent extends Model
{
    protected $table 	= 'ese_gent_conocmientos_habilidades';
    protected $fillable = [ 'paqueteria','porcentaje'];
    public $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

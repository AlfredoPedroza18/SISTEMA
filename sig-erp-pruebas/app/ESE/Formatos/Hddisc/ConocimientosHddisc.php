<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class ConocimientosHddisc extends Model
{
    protected $table 	= 'ese_hddisc_conocmientos_habilidades';
    protected $fillable = [ 'paqueteria','porcentaje'];
    public $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

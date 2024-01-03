<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class DatoFamiliarHddisc extends Model
{
    protected $table 	= 'ese_hddisc_datos_familiares';
    protected $fillable = [ 'parentesco',
							'nombre',
							'edad',
							'edo_civil',
							'ocupacion',
							'domicilio',];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

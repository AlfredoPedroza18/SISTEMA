<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class ReferenciaPersonalHddisc extends Model
{
    protected $table = 'ese_hddisc_referencias_personales';
    protected $fillable = [	'nombre_referencia',
							'celular',
							'domicilio',
							'telefono',
							'ocupacion',
							'empresa',
							'parentesco',
							'tiempo_conocerlo',
							'comentarios',];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

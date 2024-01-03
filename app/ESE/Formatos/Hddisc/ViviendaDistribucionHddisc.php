<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class ViviendaDistribucionHddisc extends Model
{
    protected $table = 'ese_hddisc_info_vivienda_distribucion';
    protected $fillable = [ 'sala',
							'comedor',
							'recamara',
							'cocina',
							'banio',
							'garaje',
							'biblioteca',
							'jardin',
							'zotehuela',
							'patio',
							'estudio',
							'cuarto_servicio',];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }

}

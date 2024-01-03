<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class ViviendaDistribucionGent extends Model
{
    protected $table = 'ese_gent_info_vivienda_distribucion';
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
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }

}

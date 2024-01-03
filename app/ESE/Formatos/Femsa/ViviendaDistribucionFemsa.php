<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class ViviendaDistribucionFemsa extends Model
{
    protected $table = 'ese_femsa_info_vivienda_distribucion';
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
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }

}

<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class ViviendaCorteFemsa extends Model
{
    protected $table = 'ese_femsa_info_vivienda_corte';
    protected $fillable = [	'variado',
							'conservador',
							'moderno',
							'colonial',
							'condiciones_externas',
							'condiciones_internas',];
    public $timestamps = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }

}

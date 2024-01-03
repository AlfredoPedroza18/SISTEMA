<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class BienesGnp extends Model
{
    protected $table='ese_gnp_bienes';
    protected $fillable=[
						'id_formato',
						'propiedad_candidato',
						'propiedad_tipo',
						'propiedad_valor',
						'propiedad_pagado',
						'propiedad_adeudo',
						'credito',
						'credito_tipo',
						'credito_valor',
						'credito_pagado',
						'credito_adeudo',
						'inversiones',
						'inversiones_tipo',
						'inversiones_valor',
						'inversiones_pagado',
						'inversiones_adeudo',
						'automoviles',
						'automoviles_tipo',
						'automoviles_valor',
						'automoviles_pagado',
						'automoviles_adeudo',
						'ubicacion_propipedad'
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function gnpbienes()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

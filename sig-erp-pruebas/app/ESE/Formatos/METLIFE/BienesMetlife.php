<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;

class BienesMetlife extends Model
{
    protected $table='ese_metlife_bienes';
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
						'automoviles_adeudo'
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function esebienes()
    {
    	   	return $this->belongsTo( FormatoMetlife::class, 'id_formato' );
    }
}

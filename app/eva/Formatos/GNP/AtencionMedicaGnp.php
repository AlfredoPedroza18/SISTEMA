<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class AtencionMedicaGnp extends Model
{
   protected $table='ese_gnp_atencion_medica';
    protected $fillable=[
							'id_formato',
							'atencion',
							'quie_esposa',
							'quien_hijos',
							'quien_padres',
							'quien_otros',
							'quien_otros_desc',
							'cual_padecimiento',
							'tratamiento',
							'frecuencia_medica',
							'accidente_llamar',
							'accidente_telefono'
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function gnpatencion()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

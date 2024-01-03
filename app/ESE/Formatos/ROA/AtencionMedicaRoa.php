<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class AtencionMedicaRoa extends Model
{
    protected $table='ese_grupo_roa_atencion_medica';
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

   public function esatencion()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

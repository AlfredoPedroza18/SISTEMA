<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;

class TratamientoSaludRoa extends Model
{
    protected $table='ese_grupo_roa_enfermedades_padecidas';
    protected $fillable=[
                         'id_formato',
						'nombre',
						'parentesco',
						'padecimiento'
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function esetratamiento()
    {
    	   	return $this->belongsTo( FormatoRoa::class, 'id_formato' );
    }
}

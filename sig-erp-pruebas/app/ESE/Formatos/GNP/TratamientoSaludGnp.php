<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;

class TratamientoSaludGnp extends Model
{
    protected $table='ese_gnp_enfermedades_padecidas';
    protected $fillable=[
                         'id_formato',
						'nombre',
						'parentesco',
						'padecimiento'
						
    			];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

   public function gnptratamiento()
    {
    	   	return $this->belongsTo( FormatoGnp::class, 'id_formato' );
    }
}

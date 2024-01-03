<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class BienesFemsa extends Model
{
    protected $table = 'ese_femsa_bienes';
    protected $fillable = [ 'activo',
							'tiene',
							'tipo',
							'valor',
							'pagado',
							'adeudo',];
	public $timestamps = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

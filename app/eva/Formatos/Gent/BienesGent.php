<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class BienesGent extends Model
{
    protected $table = 'ese_gent_bienes';
    protected $fillable = [ 'activo',
							'tiene',
							'tipo',
							'valor',
							'pagado',
							'adeudo',];
	public $timestamps = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

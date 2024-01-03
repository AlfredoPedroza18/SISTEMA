<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class BienesSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_bienes';
    protected $fillable = [ 'activo',
							'tiene',
							'tipo',
							'valor',
							'pagado',
							'adeudo',];
	public $timestamps = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

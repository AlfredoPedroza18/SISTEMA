<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class BienesHddisc extends Model
{
    protected $table = 'ese_hddisc_bienes';
    protected $fillable = [ 'activo',
							'tiene',
							'tipo',
							'valor',
							'pagado',
							'adeudo',];
	public $timestamps = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

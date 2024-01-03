<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class FamiliarEmpresaHddisc extends Model
{
    protected $table = 'ese_hddisc_familiar_empresa';
    protected $fillable = ['familiar_empresa','familiar_empresa_si','familiar_empresa_no','entero_vacante'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }
}

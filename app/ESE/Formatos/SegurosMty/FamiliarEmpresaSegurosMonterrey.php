<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class FamiliarEmpresaSegurosMonterrey extends Model
{
    protected $table = 'ese_seguros_monterrey_familiar_empresa';
    protected $fillable = ['familiar_empresa','familiar_empresa_si','familiar_empresa_no','entero_vacante'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }
}

<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class FamiliarEmpresaFemsa extends Model
{
    protected $table = 'ese_femsa_familiar_empresa';
    protected $fillable = ['familiar_empresa','familiar_empresa_si','familiar_empresa_no','entero_vacante'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
}

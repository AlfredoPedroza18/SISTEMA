<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class FamiliarEmpresaGent extends Model
{
    protected $table = 'ese_gent_familiar_empresa';
    protected $fillable = ['familiar_empresa','familiar_empresa_si','familiar_empresa_no','entero_vacante'];
    public $timestamps = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }
}

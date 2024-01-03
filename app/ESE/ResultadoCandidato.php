<?php

namespace App\ESE;

use Illuminate\Database\Eloquent\Model;
use App\ESE\EstudioEse;

class ResultadoCandidato extends Model
{
	protected $table = 'ese_resultados';
    public function ese()
    {
    	return $this->hasMany( EstudioEse::class,'resultado_ese' );
    }
}

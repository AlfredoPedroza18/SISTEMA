<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class CursoFemsa extends Model
{
    protected $table 	= 'ese_femsa_cursos';
    protected $fillable = [ 'de','a','curso'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }

}

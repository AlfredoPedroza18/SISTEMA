<?php

namespace App\ESE\Formatos\SegurosMty;

use Illuminate\Database\Eloquent\Model;

class CursoSegurosMonterrey extends Model
{
    protected $table 	= 'ese_seguros_monterrey_cursos';
    protected $fillable = [ 'de', 'a', 'curso'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoSegurosMonterrey::class, 'id_formato' );
    }

}

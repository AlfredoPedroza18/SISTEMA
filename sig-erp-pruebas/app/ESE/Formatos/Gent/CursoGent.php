<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class CursoGent extends Model
{
    protected $table 	= 'ese_gent_cursos';
    protected $fillable = [ 'de', 'curso'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
    }

}

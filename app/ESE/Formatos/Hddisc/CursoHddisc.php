<?php

namespace App\ESE\Formatos\Hddisc;

use Illuminate\Database\Eloquent\Model;

class CursoHddisc extends Model
{
    protected $table 	= 'ese_hddisc_cursos';
    protected $fillable = [ 'de', 'curso'];
    public $timestamps  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoHddisc::class, 'id_formato' );
    }

}

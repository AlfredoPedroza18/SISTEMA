<?php

namespace App\ESE\Formatos\Evenplan;

use Illuminate\Database\Eloquent\Model;

class IdiomaEvenplan extends Model
{
    protected $table 	  = 'ese_evenplan_idiomas';
    protected $fillable   = [ 'id_formato','idioma','porcentaje','certificacion'];
    public $timestamps 	  = false;

    public function formato()
    {
    	return $this->belongsTo( FormatoEvenplan::class, 'id_formato' );
    }

}

<?php

namespace App\ESE\Formatos\Evenplan;

use Illuminate\Database\Eloquent\Model;

class EscolaridadEvenplan extends Model
{
    protected $table 	= 'ese_evenplan_escolaridad';
    protected $fillable = [ 'id_formato','nivel_escolar','institucion','certificado'];
    public $timestamps 	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoEvenplan::class, 'id_formato' );
    }
}

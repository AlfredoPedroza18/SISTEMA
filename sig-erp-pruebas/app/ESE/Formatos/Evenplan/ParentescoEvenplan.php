<?php

namespace App\ESE\Formatos\Evenplan;

use Illuminate\Database\Eloquent\Model;

class ParentescoEvenplan extends Model
{
    protected $table 	= 'ese_evenplan_constitucion_familiar';
    protected $fillable = [ 'id_formato','parentesco','nombre','edad','ocupacion'];
    public $timestamps 	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoEvenplan::class, 'id_formato' );
    }
}

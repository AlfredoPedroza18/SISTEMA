<?php

namespace App\ESE\Formatos\Evenplan;

use Illuminate\Database\Eloquent\Model;

class DatosPersonalesEvenplan extends Model
{
    protected $table 	= 'ese_evenplan_datos_personales';
    protected $fillable = [ 'id_formato','nombre','calle','cp','colonia','cd_residencia',
    						'celular','telefono_local','email','fecha_nacimiento','lugar_nacimiento',
    						'edad','edo_civil','fecha_matrimonio','hijos'];
	public $timestamps 	= false; 

	public function formato()
    {
    	return $this->belongsTo( FormatoEvenplan::class, 'id_formato' );
    }   						
}

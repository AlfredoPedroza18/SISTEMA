<?php
namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;

class PersonasDomicilioJll extends Model
{
	protected $table 		= 'ese_jll_personas_viven_en_domicilio';
    protected $fillable		= [	'id_formato',
								'parentesco',
								'nombre',
								'edad',
								'edo_civil',
								'ocupacion',
								'depende_del_candidato'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function formato()
    {
    	return $this->belongsTo( FormatoJll::class, 'id_formato' );
    }

}
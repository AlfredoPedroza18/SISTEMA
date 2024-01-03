<?php
namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;

class PersonasDomicilioHsbc extends Model
{
	protected $table 		= 'ese_hsbc_personas_viven_en_domicilio';
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
    	return $this->belongsTo( FormatoHsbc::class, 'id_formato' );
    }

}
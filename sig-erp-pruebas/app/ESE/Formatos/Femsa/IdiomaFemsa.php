<?php

namespace App\ESE\Formatos\Femsa;

use Illuminate\Database\Eloquent\Model;

class IdiomaFemsa extends Model
{
    protected $table 	= 'ese_femsa_idiomas';
    protected $fillable = [ 'idioma',
							'hablado',
							'leido',
							'escrito',
							'comprension',
							'porcentaje'];
	public $timestamps = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoFemsa::class, 'id_formato' );
    }
    public function getPorcentajeTotalAttribute()
    {
    	return  ( floatval($this->hablado) + floatval($this->leido) + floatval($this->escrito) + floatval($this->comprension) ) / 4;
    }

    public function setProcentajeAttribute( $porcentaje )
    {
    	$this->porcentaje = $this->porcentaje_total;
    }
}

<?php

namespace App\ESE\Formatos\Gent;

use Illuminate\Database\Eloquent\Model;

class IdiomaGent extends Model
{
    protected $table 	= 'ese_gent_idiomas';
    protected $fillable = [ 'idioma',
							'hablado',
							'leido',
							'escrito',
							'comprension',
							'porcentaje'];
	public $timestamps = false;

	public function formato()
    {
    	return $this->belongsTo( FormatoGent::class, 'id_formato' );
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

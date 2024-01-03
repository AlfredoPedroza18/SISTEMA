<?php

namespace App\ESE\Formatos\HSBC;

use Illuminate\Database\Eloquent\Model;
use App\ESE\EstudioEse;
use App\Helpers\TraitMethodsModel;

class FormatoHsbc extends Model
{
	use TraitMethodsModel;
	protected $table = 'ese_formatos_hsbc';
    protected $fillable		= [	'id_ese'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function ese()
    {
    	return $this->belongsTo( EstudioEse::class,'id_ese' );
    }
    public function resultado()
    {
    	return $this->hasOne( ResultadoHsbc::class, 'id_formato' );    	
    }
	public function datosPersonales()
	{
		return $this->hasOne( DatosPersonalesHsbc::class, 'id_formato');		
	}

	public function documentacion()
	{
		return $this->hasOne( DocumentacionHsbc::class, 'id_formato' );		
	}
	public function antecedentesLegales()
	{
		return $this->hasOne( AntecedentesLegales::class, 'id_formato' );		
	}
	public function referenciasLaborales()
	{
		return $this->hasMany( ReferenciasLaboralesHsbc::class, 'id_formato' );		
	}
	public function gaps()
	{
		return $this->hasOne( GapsHsbc::class, 'id_formato' );		
	}
	public function referenciasLaboralesCinco()
	{
		return $this->hasMany( ReferenciasLaboralesCincoHsbc::class, 'id_formato' );		
	}
	public function otroIngreso()
	{
		return $this->hasOne( OtraFuenteIngresoHsbc::class, 'id_formato' );		
	}
	public function escolaridad()
	{
		return $this->hasOne( EscolaridadHsbc::class, 'id_formato' );		
	}
	public function vivenEnDomicilio()
	{
		return $this->hasMany( PersonasDomicilioHsbc::class, 'id_formato' );		
	}
	public function observacionesVivenEnDomicilio()
	{
		return $this->hasOne( ObservacionDomicilioHsbc::class, 'id_formato' );		
	}
	public function descripcionVivienda()
	{
		return $this->hasOne( DescripcionViviendaHsbc::class, 'id_formato' );		
	}
	public function tipoVivienda()
	{
		return $this->hasOne( TipoViviendaHsbc::class, 'id_formato' );		
	}


}
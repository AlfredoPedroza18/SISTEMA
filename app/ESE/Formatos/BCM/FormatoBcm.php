<?php

namespace App\ESE\Formatos\BCM;

use Illuminate\Database\Eloquent\Model;
use App\ESE\EstudioEse;
use App\Helpers\TraitMethodsModel;

class FormatoBcm extends Model
{
	use TraitMethodsModel;
    protected $table = 'ese_formatos_bcm';
    protected $fillable		= [	'id_ese'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function ese()
    {
    	return $this->belongsTo( EstudioEse::class,'id_ese' );
    }
    public function resultado()
    {
    	return $this->hasOne( ResultadoBcm::class, 'id_formato' );    	
    }
	public function datosPersonales()
	{
		return $this->hasOne( DatosPersonalesBcm::class, 'id_formato');		
	}

	public function documentacion()
	{
		return $this->hasOne( DocumentacionBcm::class, 'id_formato' );		
	}
	public function antecedentesLegales()
	{
		return $this->hasOne( AntecedentesLegalesBcm::class, 'id_formato' );		
	}
	public function referenciasLaborales()
	{
		return $this->hasMany( ReferenciasLaboralesBcm::class, 'id_formato' );		
	}
	public function gaps()
	{
		return $this->hasOne( GapsBcm::class, 'id_formato' );		
	}
	public function referenciasLaboralesCinco()
	{
		return $this->hasMany( ReferenciasLaboralesCincoBcm::class, 'id_formato' );		
	}
	public function otroIngreso()
	{
		return $this->hasOne( OtraFuenteIngresoBcm::class, 'id_formato' );		
	}
	public function escolaridad()
	{
		return $this->hasOne( EscolaridadBcm::class, 'id_formato' );		
	}
	public function vivenEnDomicilio()
	{
		return $this->hasMany( PersonasDomicilioBcm::class, 'id_formato' );		
	}
	public function observacionesVivenEnDomicilio()
	{
		return $this->hasOne( ObservacionDomicilioBcm::class, 'id_formato' );		
	}
	public function descripcionVivienda()
	{
		return $this->hasOne( DescripcionViviendaBcm::class, 'id_formato' );		
	}
	public function tipoVivienda()
	{
		return $this->hasOne( TipoViviendaBcm::class, 'id_formato' );		
	}

}

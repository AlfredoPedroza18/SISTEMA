<?php

namespace App\ESE\Formatos\Jll;

use Illuminate\Database\Eloquent\Model;
use App\ESE\EstudioEse;
use App\Helpers\TraitMethodsModel;

class FormatoJll extends Model
{
	use TraitMethodsModel;
	protected $table = 'ese_formatos_jll';
    protected $fillable		= [	'id_ese'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function ese()
    {
    	return $this->belongsTo( EstudioEse::class,'id_ese' );
    }
    public function resultado()
    {
    	return $this->hasOne( ResultadoJll::class, 'id_formato' );    	
    }
	public function datosPersonales()
	{
		return $this->hasOne( DatosPersonalesJll::class, 'id_formato');		
	}

	public function documentacion()
	{
		return $this->hasOne( DocumentacionJll::class, 'id_formato' );		
	}
	public function antecedentesLegales()
	{
		return $this->hasOne( AntecedentesLegalesJll::class, 'id_formato' );		
	}
	public function referenciasLaborales()
	{
		return $this->hasMany( ReferenciasLaboralesJll::class, 'id_formato' );		
	}
	public function gaps()
	{
		return $this->hasOne( GapsJll::class, 'id_formato' );		
	}
	public function referenciasLaboralesCinco()
	{
		return $this->hasMany( ReferenciasLaboralesCincoJll::class, 'id_formato' );		
	}
	public function otroIngreso()
	{
		return $this->hasOne( OtraFuenteIngresoJll::class, 'id_formato' );		
	}
	public function escolaridad()
	{
		return $this->hasOne( EscolaridadJll::class, 'id_formato' );		
	}
	public function vivenEnDomicilio()
	{
		return $this->hasMany( PersonasDomicilioJll::class, 'id_formato' );		
	}
	public function observacionesVivenEnDomicilio()
	{
		return $this->hasOne( ObservacionDomicilioJll::class, 'id_formato' );		
	}
	public function descripcionVivienda()
	{
		return $this->hasOne( DescripcionViviendaJll::class, 'id_formato' );		
	}
	public function tipoVivienda()
	{
		return $this->hasOne( TipoViviendaJll::class, 'id_formato' );		
	}


}
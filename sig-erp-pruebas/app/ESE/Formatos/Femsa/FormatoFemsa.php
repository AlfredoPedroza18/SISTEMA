<?php

namespace App\ESE\Formatos\Femsa;

use App\ESE\EstudioEse;
use Illuminate\Model;
use App\Helpers\TraitMethodsModel;

class FormatoFemsa extends Model
{
	use TraitMethodsModel;
    protected $table    = 'ese_formatos_Femsa';
    protected $fillable = ['id_ese'];
    public $timestamps  = false;


    public function ese()
    {
        return $this->belongsTo( EstudioEse::class,'id_ese' );
    }

    public function resumen()
	{
		return $this->hasOne( ResumenFemsa::class, 'id_formato');
	}

	public function datos_generales()
	{
		return $this->hasOne( DatosGeneralesFemsa::class, 'id_formato');
	}

	public function documentacion()
	{
		return $this->hasOne( DocumentacionFemsa::class,'id_formato');
	}

	public function escolaridad()
	{
		return $this->hasMany( EscolaridadFemsa::class,'id_formato');
	}

	public function escolaridad_obs()
	{
		return $this->hasOne( EscolaridadObservacionesFemsa::class,'id_formato');
	}

	public function cursos()
	{
		return $this->hasMany( CursoFemsa::class,'id_formato');
	}

	public function idiomas()
	{
		return $this->hasMany( IdiomaFemsa::class,'id_formato');
	}

	public function conocmientos_habilidades()
	{
		return $this->hasMany( ConocimientosFemsa::class,'id_formato');
	}

	public function datos_familiares()
	{
		return $this->hasMany( DatoFamiliarFemsa::class,'id_formato');
	}

	public function informacion_familiar()
	{
		return $this->hasOne( InformacionFamiliarFemsa::class,'id_formato');							  
	}

	public function situacion_economica()
	{
		return $this->hasOne( SituacionEconomicaFemsa::class,'id_formato');
	}

	public function bienes()
	{
		return $this->hasMany( BienesFemsa::class,'id_formato');
	}

	public function bienes_totales()
	{
		return $this->hasOne( BienesTotalFemsa::class,'id_formato');
	}

	public function tipo_vivienda()
	{
		return $this->hasOne( TIpoViviendaFemsa::class,'id_formato');
	}

	public function tipo_propiedad()
	{
		return $this->hasOne( TIpoPropiedadFemsa::class,'id_formato');
	}

	public function info_vivienda_servicios()
	{
		return $this->hasOne( ViviendaServiciosFemsa::class,'id_formato');
	}

	public function info_vivienda_distribucion()
	{
		return $this->hasOne( ViviendaDistribucionFemsa::class,'id_formato');
	}

	public function info_vivienda_nivel_economico()
	{
		return $this->hasOne( ViviendaNivelFemsa::class,'id_formato');
	}

	public function vivienda_construccion()
	{
		return $this->hasOne( ViviendaConstruccionFemsa::class,'id_formato');
	}

	public function vivienda_conservacion()
	{
		return $this->hasOne( ViviendaConservacionFemsa::class,'id_formato');
	}

	public function vivienda_calidad_mobiliario()
	{
		return $this->hasOne( ViviendaCalidadMobFemsa::class,'id_formato');
	}

	public function vivienda_corte()
	{
		return $this->hasOne( ViviendaCorteFemsa::class,'id_formato');
	}

	public function familiar_empresa()
	{
		return $this->hasOne( FamiliarEmpresaFemsa::class,'id_formato');
	}

	public function ubicacion_domicilio()
	{
		return $this->hasOne( DomicilioUbicacionFemsa::class,'id_formato');
	}

	public function situacion_social()
	{
		return $this->hasOne( SituacionSocialFemsa::class,'id_formato');
	}

	public function enfermedad()
	{
		return $this->hasOne( EnfermedadFemsa::class, 'id_formato' );
	}

	public function padecimiento()
	{
		return $this->hasOne( PadecimientoFemsa::class, 'id_formato' );
	}

	public function padecimiento_familiar()
	{
		return $this->hasMany( PadecimientoFamiliarFemsa::class, 'id_formato' );
	}

	public function atencion_medica()
	{
		return $this->hasOne( AtencionMedicaFemsa::class, 'id_formato' );
	}

	public function habitos_detalle()
	{
		return $this->hasMany( HabitosDetalleFemsa::class,'id_formato');
	}

	public function habitos()
	{
		return $this->hasOne( HabitosFemsa::class,'id_formato');
	}
	
	public function disponibilidad()
	{
		return $this->hasOne( DisponibilidadFemsa::class,'id_formato');
	}

	public function referencias_personales()
	{
		return $this->hasMany( ReferenciaPersonalFemsa::class,'id_formato');
	}

	public function informacion_laboral()
	{
		return $this->hasMany( InformacionLaboralFemsa::class,'id_formato');
	}

    
}

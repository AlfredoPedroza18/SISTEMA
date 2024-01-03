<?php

namespace App\ESE\Formatos\SegurosMty;

use App\ESE\EstudioEse;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\TraitMethodsModel;

class FormatoSegurosMonterrey extends Model 
{
	use TraitMethodsModel;
    protected $table    = 'ese_formatos_seguros_monterrey';
    protected $fillable = ['id_ese'];
    public $timestamps  = false;


    public function ese()
    {
        return $this->belongsTo( EstudioEse::class,'id_ese' );
    }

    public function resumen()
	{
		return $this->hasOne( ResumenSegurosMonterrey::class, 'id_formato');
	}

	public function datos_generales()
	{
		return $this->hasOne( DatosGeneralesSegurosMonterrey::class, 'id_formato');
	}

	public function documentacion()
	{
		return $this->hasOne( DocumentacionSegurosMonterrey::class,'id_formato');
	}

	public function escolaridad()
	{
		return $this->hasMany( EscolaridadSegurosMonterrey::class,'id_formato');
	}

	public function escolaridad_obs()
	{
		return $this->hasOne( EscolaridadObservacionesSegurosMonterrey::class,'id_formato');
	}

	public function cursos()
	{
		return $this->hasMany( CursoSegurosMonterrey::class,'id_formato');
	}

	public function idiomas()
	{
		return $this->hasMany( IdiomaSegurosMonterrey::class,'id_formato');
	}

	public function conocmientos_habilidades()
	{
		return $this->hasMany( ConocimientosSegurosMonterrey::class,'id_formato');
	}

	public function datos_familiares()
	{
		return $this->hasOne( DatoFamiliarSegurosMonterrey::class,'id_formato');
	}

	public function situacion_economica()
	{
		return $this->hasOne( SituacionEconomicaSegurosMonterrey::class,'id_formato');
	}

	public function bienes()
	{
		return $this->hasMany( BienesSegurosMonterrey::class,'id_formato');
	}

	public function bienes_totales()
	{
		return $this->hasOne( BienesTotalSegurosMonterrey::class,'id_formato');
	}

	public function tipo_vivienda()
	{
		return $this->hasOne( TIpoViviendaSegurosMonterrey::class,'id_formato');
	}

	public function tipo_propiedad()
	{
		return $this->hasOne( TIpoPropiedadSegurosMonterrey::class,'id_formato');
	}

	public function info_vivienda_servicios()
	{
		return $this->hasOne( ViviendaServiciosSegurosMonterrey::class,'id_formato');
	}

	public function info_vivienda_distribucion()
	{
		return $this->hasOne( ViviendaDistribucionSegurosMonterrey::class,'id_formato');
	}

	public function info_vivienda_nivel_economico()
	{
		return $this->hasOne( ViviendaNivelSegurosMonterrey::class,'id_formato');
	}

	public function vivienda_condiciones_interiores()
	{
		return $this->hasOne( ViviendaInteriorSegurosMonterrey::class,'id_formato');
	}

	public function vivienda_orden_limpieza()
	{
		return $this->hasOne( ViviendaLimpiezaSegurosMonterrey::class,'id_formato');
	}

	public function vivienda_calidad_mobiliario()
	{
		return $this->hasOne( ViviendaCalidadMobSegurosMonterrey::class,'id_formato');
	}

	public function vivienda_conservacion_mobiliario()
	{
		return $this->hasOne( ViviendaConservacionMobSegurosMonterrey::class,'id_formato');
	}

	public function vivienda_espacio()
	{
		return $this->hasOne( ViviendaEspacioSegurosMonterrey::class,'id_formato');
	}

	public function familiar_empresa()
	{
		return $this->hasOne( FamiliarEmpresaSegurosMonterrey::class,'id_formato');
	}

	public function referencias_personales()
	{
		return $this->hasMany( ReferenciaPersonalSegurosMonterrey::class,'id_formato');
	}

	public function situacion_social()
	{
		return $this->hasOne( SituacionSocialSegurosMonterrey::class,'id_formato');
	}

	public function habitos_detalle()
	{
		return $this->hasMany( HabitosDetalleSegurosMonterrey::class,'id_formato');
	}

	public function habitos()
	{
		return $this->hasOne( HabitosSegurosMonterrey::class,'id_formato');
	}

	public function disponibilidad()
	{
		return $this->hasOne( DisponibilidadSegurosMonterrey::class,'id_formato');
	}

	public function ubicacion_domicilio()
	{
		return $this->hasOne( DomicilioUbicacionSegurosMonterrey::class,'id_formato');
	}

	public function informacion_laboral()
	{
		return $this->hasMany( InformacionLaboralSegurosMonterrey::class,'id_formato');
	}

	public function rastreo_infonavit()
	{
		return $this->hasOne( RastreoInfonavitSegurosMonterrey::class,'id_formato');
	}	

    
}

<?php

namespace App\ESE\Formatos\Hddisc;

use App\ESE\EstudioEse;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\TraitMethodsModel;

class FormatoHddisc extends Model
{
	use TraitMethodsModel;
    protected $table    = 'ese_formatos_hddisc';
    protected $fillable = ['id_ese'];
    public $timestamps  = false;


    public function ese()
    {
        return $this->belongsTo( EstudioEse::class,'id_ese' );
    }

    public function resumen()
	{
		return $this->hasOne( ResumenHddisc::class, 'id_formato');
	}

	public function datos_generales()
	{
		return $this->hasOne( DatosGeneralesHddisc::class, 'id_formato');
	}

	public function documentacion()
	{
		return $this->hasOne( DocumentacionHddisc::class,'id_formato');
	}

	public function escolaridad()
	{
		return $this->hasMany( EscolaridadHddisc::class,'id_formato');
	}

	public function escolaridad_obs()
	{
		return $this->hasOne( EscolaridadObservacionesHddisc::class,'id_formato');
	}

	public function cursos()
	{
		return $this->hasMany( CursoHddisc::class,'id_formato');
	}

	public function idiomas()
	{
		return $this->hasMany( IdiomaHddisc::class,'id_formato');
	}

	public function conocmientos_habilidades()
	{
		return $this->hasMany( ConocimientosHddisc::class,'id_formato');
	}

	public function datos_familiares()
	{
		return $this->hasMany( DatoFamiliarHddisc::class,'id_formato');
	}

	public function informacion_familiar()
	{
		return $this->hasOne( InformacionFamiliarHddisc::class,'id_formato');							  
	}

	public function situacion_economica()
	{
		return $this->hasOne( SituacionEconomicaHddisc::class,'id_formato');
	}

	public function bienes()
	{
		return $this->hasMany( BienesHddisc::class,'id_formato');
	}

	public function bienes_totales()
	{
		return $this->hasOne( BienesTotalHddisc::class,'id_formato');
	}

	public function tipo_vivienda()
	{
		return $this->hasOne( TIpoViviendaHddisc::class,'id_formato');
	}

	public function tipo_propiedad()
	{
		return $this->hasOne( TIpoPropiedadHddisc::class,'id_formato');
	}

	public function info_vivienda_servicios()
	{
		return $this->hasOne( ViviendaServiciosHddisc::class,'id_formato');
	}

	public function info_vivienda_distribucion()
	{
		return $this->hasOne( ViviendaDistribucionHddisc::class,'id_formato');
	}

	public function info_vivienda_nivel_economico()
	{
		return $this->hasOne( ViviendaNivelHddisc::class,'id_formato');
	}

	public function vivienda_construccion()
	{
		return $this->hasOne( ViviendaConstruccionHddisc::class,'id_formato');
	}

	public function vivienda_conservacion()
	{
		return $this->hasOne( ViviendaConservacionHddisc::class,'id_formato');
	}

	public function vivienda_calidad_mobiliario()
	{
		return $this->hasOne( ViviendaCalidadMobHddisc::class,'id_formato');
	}

	public function vivienda_corte()
	{
		return $this->hasOne( ViviendaCorteHddisc::class,'id_formato');
	}

	public function familiar_empresa()
	{
		return $this->hasOne( FamiliarEmpresaHddisc::class,'id_formato');
	}

	public function ubicacion_domicilio()
	{
		return $this->hasOne( DomicilioUbicacionHddisc::class,'id_formato');
	}

	public function situacion_social()
	{
		return $this->hasOne( SituacionSocialHddisc::class,'id_formato');
	}

	public function enfermedad()
	{
		return $this->hasOne( EnfermedadHddisc::class, 'id_formato' );
	}

	public function padecimiento()
	{
		return $this->hasOne( PadecimientoHddisc::class, 'id_formato' );
	}

	public function padecimiento_familiar()
	{
		return $this->hasMany( PadecimientoFamiliarHddisc::class, 'id_formato' );
	}

	public function atencion_medica()
	{
		return $this->hasOne( AtencionMedicaHddisc::class, 'id_formato' );
	}

	public function habitos_detalle()
	{
		return $this->hasMany( HabitosDetalleHddisc::class,'id_formato');
	}

	public function habitos()
	{
		return $this->hasOne( HabitosHddisc::class,'id_formato');
	}
	
	public function disponibilidad()
	{
		return $this->hasOne( DisponibilidadHddisc::class,'id_formato');
	}

	public function referencias_personales()
	{
		return $this->hasMany( ReferenciaPersonalHddisc::class,'id_formato');
	}

	public function informacion_laboral()
	{
		return $this->hasMany( InformacionLaboralHddisc::class,'id_formato');
	}

    
}

<?php

namespace App\ESE\Formatos\Gent;

use App\ESE\EstudioEse;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\TraitMethodsModel;

class FormatoGent extends Model
{
	use TraitMethodsModel;
    protected $table    = 'ese_formatos_gent';
    protected $fillable = ['id_ese'];
    public $timestamps  = false;


    public function ese()
    {
        return $this->belongsTo( EstudioEse::class,'id_ese' );
    }

    public function resumen()
	{
		return $this->hasOne( ResumenGent::class, 'id_formato');
	}

	public function datos_generales()
	{
		return $this->hasOne( DatosGeneralesGent::class, 'id_formato');
	}

	public function documentacion()
	{
		return $this->hasOne( DocumentacionGent::class,'id_formato');
	}

	public function escolaridad()
	{
		return $this->hasMany( EscolaridadGent::class,'id_formato');
	}

	public function escolaridad_obs()
	{
		return $this->hasOne( EscolaridadObservacionesGent::class,'id_formato');
	}

	public function cursos()
	{
		return $this->hasMany( CursoGent::class,'id_formato');
	}

	public function idiomas()
	{
		return $this->hasMany( IdiomaGent::class,'id_formato');
	}

	public function conocmientos_habilidades()
	{
		return $this->hasMany( ConocimientosGent::class,'id_formato');
	}

	public function datos_familiares()
	{
		return $this->hasMany( DatoFamiliarGent::class,'id_formato');
	}

	public function informacion_familiar()
	{
		return $this->hasOne( InformacionFamiliarGent::class,'id_formato');							  
	}

	public function situacion_economica()
	{
		return $this->hasOne( SituacionEconomicaGent::class,'id_formato');
	}

	public function bienes()
	{
		return $this->hasMany( BienesGent::class,'id_formato');
	}

	public function bienes_totales()
	{
		return $this->hasOne( BienesTotalGent::class,'id_formato');
	}

	public function tipo_vivienda()
	{
		return $this->hasOne( TIpoViviendaGent::class,'id_formato');
	}

	public function tipo_propiedad()
	{
		return $this->hasOne( TIpoPropiedadGent::class,'id_formato');
	}

	public function info_vivienda_servicios()
	{
		return $this->hasOne( ViviendaServiciosGent::class,'id_formato');
	}

	public function info_vivienda_distribucion()
	{
		return $this->hasOne( ViviendaDistribucionGent::class,'id_formato');
	}

	public function info_vivienda_nivel_economico()
	{
		return $this->hasOne( ViviendaNivelGent::class,'id_formato');
	}

	public function vivienda_construccion()
	{
		return $this->hasOne( ViviendaConstruccionGent::class,'id_formato');
	}

	public function vivienda_conservacion()
	{
		return $this->hasOne( ViviendaConservacionGent::class,'id_formato');
	}

	public function vivienda_calidad_mobiliario()
	{
		return $this->hasOne( ViviendaCalidadMobGent::class,'id_formato');
	}

	public function vivienda_corte()
	{
		return $this->hasOne( ViviendaCorteGent::class,'id_formato');
	}

	public function familiar_empresa()
	{
		return $this->hasOne( FamiliarEmpresaGent::class,'id_formato');
	}

	public function ubicacion_domicilio()
	{
		return $this->hasOne( DomicilioUbicacionGent::class,'id_formato');
	}

	public function situacion_social()
	{
		return $this->hasOne( SituacionSocialGent::class,'id_formato');
	}

	public function enfermedad()
	{
		return $this->hasOne( EnfermedadGent::class, 'id_formato' );
	}

	public function padecimiento()
	{
		return $this->hasOne( PadecimientoGent::class, 'id_formato' );
	}

	public function padecimiento_familiar()
	{
		return $this->hasMany( PadecimientoFamiliarGent::class, 'id_formato' );
	}

	public function atencion_medica()
	{
		return $this->hasOne( AtencionMedicaGent::class, 'id_formato' );
	}

	public function habitos_detalle()
	{
		return $this->hasMany( HabitosDetalleGent::class,'id_formato');
	}

	public function habitos()
	{
		return $this->hasOne( HabitosGent::class,'id_formato');
	}
	
	public function disponibilidad()
	{
		return $this->hasOne( DisponibilidadGent::class,'id_formato');
	}

	public function referencias_personales()
	{
		return $this->hasMany( ReferenciaPersonalGent::class,'id_formato');
	}

	public function informacion_laboral()
	{
		return $this->hasMany( InformacionLaboralGent::class,'id_formato');
	}

    
}

<?php

namespace App\ESE\Formatos\Evenplan;

use App\ESE\EstudioEse;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\TraitMethodsModel;

class FormatoEvenplan extends Model
{
    use TraitMethodsModel;
    protected $table = 'ese_formatos_evenplan';
    protected $fillable		= [	'id_ese'];
	protected $hidden 		= [ 'id'];
    public 	  $timestamps	= false;

    public function ese()
    {
        return $this->belongsTo( EstudioEse::class,'id_ese' );
    }

    public function resumen()
    {
    	return $this->hasOne(ResumenEvenplan::class,'id_formato');
    }

    public function datosPersonales()
    {
    	return $this->hasOne(DatosPersonalesEvenplan::class,'id_formato');
    }

    public function escolaridad()
    {
    	return $this->hasMany(EscolaridadEvenplan::class,'id_formato');
    }

    public function escolaridadDetalle()
    {
        return $this->hasOne(EscolaridadDetalleEvenplan::class,'id_formato');
    }

    public function idiomas()
    {
    	return $this->hasMany(IdiomaEvenplan::class,'id_formato');
    }

    public function parentesco()
    {
    	return $this->hasMany(ParentescoEvenplan::class,'id_formato');
    }

    public function documentacion()
    {
    	return $this->hasOne(DocumentacionEvenplan::class,'id_formato');
    }

    public function referenciasEconomicas()
    {
    	return $this->hasOne(ReferenciaEconomicaEvenplan::class,'id_formato');
    }

    public function gastosMensuales()
    {
    	return $this->hasOne(GastoMensualEvenplan::class,'id_formato');
    }

    public function referenciaLaboral()
    {
    	return $this->hasMany(ReferenciaLaboralEvenplan::class,'id_formato');
    }

    public function referenciaPersonal()
    {
    	return $this->hasMany(ReferenciaPersonalEvenplan::class,'id_formato');
    }
}



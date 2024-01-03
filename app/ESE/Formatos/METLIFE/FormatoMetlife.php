<?php

namespace App\ESE\Formatos\METLIFE;

use Illuminate\Database\Eloquent\Model;
use App\ESE\EstudioEse;
use App\Helpers\TraitMethodsModel;

class FormatoMetlife extends Model
{
    use TraitMethodsModel;
    protected $table='ese_formatos_metlife';
    protected $fillable=['id_ese'];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

     public function ese()
    {
    	return $this->belongsTo(EstudioEse::class,'id_ese' );
    }

    public function encabezado(){

    	return $this->hasOne(EncabezadoMetlife::class,'id_formato');
    }
    public function datosGenerales(){
        return $this->hasOne(DatosGeneralesMetlife::class,'id_formato');
    }
      public function documentacion(){
        return $this->hasOne(DocumentacionMetlife::class,'id_formato');
    }
     public function escolaridadmet(){
        return $this->hasOne(EscolaridadMetlife::class,'id_formato');
    }
    public function cursoMet(){
        return $this->hasMany(CursosMetlife::class,'id_formato');        
    }
     public function idiomas(){
        return $this->hasMany(IdiomasMetlife::class,'id_formato');        
    }
     public function conocimientos_(){
        return $this->hasMany(ConocimientosMetlife::class,'id_formato');        
    }
    public function familia(){
        return $this->hasMany(FamiliaMetlife::class,'id_formato');        
    }
    public function situacionEconomica(){
       return $this->hasOne(SituacionEconomicaMetlife::class,'id_formato');
    }
    public function bienes(){
       return $this->hasOne(BienesMetlife::class,'id_formato');
    }
     public function vivienda(){
       return $this->hasOne(ViviendaMetlife::class,'id_formato');
    }

    public function apreciacionVivienda(){
        return $this->hasOne(ApreciacionViviendaMetlife::class,'id_formato');
    }
     public function ubicacionDomicilio(){
        return $this->hasOne(UbicacionMetlife::class,'id_formato');
    }
    public function situacionSocial(){
        return $this->hasOne(SituacionSocialMetlife::class,'id_formato');
    }
    public function casoEmergencia(){

          return $this->hasOne(AvtividadFisicaMetlife::class,'id_formato');
    }
    public function disponible(){
           return $this->hasOne(DisponibilidadMetlife::class,'id_formato');
    }
    public function rastreoInfonavit(){
           return $this->hasOne(RastreoInfonavitMetlife::class,'id_formato');
    }
     public function referenciaPersonal(){
        return $this->hasMany(ReferenciasPersonalesMetlife::class,'id_formato');        
    }
    public function referenciaLaborales(){
        return $this->hasMany(ReferenciasLaboralesMetlife::class,'id_formato');
    }

}

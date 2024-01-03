<?php

namespace App\ESE\Formatos\ROA;

use Illuminate\Database\Eloquent\Model;
use App\ESE\EstudioEse;
use App\Helpers\TraitMethodsModel;

class FormatoRoa extends Model
{
    use TraitMethodsModel;
    protected $table='ese_formatos_roa';
    protected $fillable=['id_ese'];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

     public function ese()
    {
    	return $this->belongsTo(EstudioEse::class,'id_ese' );
    }
    public function encabezado(){

    	return $this->hasOne(EncabezadoRoa::class,'id_formato');
    }
    public function datosGenerales(){
          
         return $this->hasOne(DatosGeneralesRoa::class,'id_formato');
    }
    public function documentacionRoa(){
          
         return $this->hasOne(DocumenRoa::class,'id_formato');
    }
     public function escolariRoa(){
        return $this->hasMany(EscolaridadRoa::class,'id_formato');        
    }
     public function abandonoEscolar(){
          
         return $this->hasOne(AbandonoEscolarRoa::class,'id_formato');
    }
    public function ObsEscolar(){
          
         return $this->hasOne(EscolaridadObservacionesRoa::class,'id_formato');
    }
    public function cursoMet(){
        return $this->hasMany(CursosRoa::class,'id_formato');        
    }
    public function idiomas(){
        return $this->hasMany(IdiomasRoa::class,'id_formato');        
    }
    public function conocimientos_(){
      return $this->hasMany(ConocimientosRoa::class,'id_formato');        
    }
     public function familia(){
        return $this->hasMany(FamiliaRoa::class,'id_formato');        
    }
     public function infoFamiliar(){
        return $this->hasOne(InfoFamiliarRoa::class,'id_formato'); 
     }
     public function situacionEconomica(){
        return $this->hasOne(SituacionEconomicaRoa::class,'id_formato'); 
     }
      public function bienes(){
        return $this->hasOne(BienesRoa::class,'id_formato'); 
     }
       public function vivienda(){
        return $this->hasOne(ViviendaRoa::class,'id_formato'); 
     }
       public function apreciacionVivienda(){
        return $this->hasOne(ApreciacionViviendaRoa::class,'id_formato');
    }
      public function ubicacionDomicilio(){
        return $this->hasOne(UbicacionRoa::class,'id_formato');
    }
     public function situacionSocial(){
         return $this->hasOne(SituacionSocialRoa::class,'id_formato');
     }
     public function enfermedad(){
         return $this->hasOne(EnfermedadesRoa::class,'id_formato');
     }
      public function padecimientos(){
         return $this->hasOne(PadecimientosRoa::class,'id_formato');
     }
      public function edoSalud(){
        return $this->hasMany(TratamientoSaludRoa::class,'id_formato');        
    }
    public function atencion(){
         return $this->hasOne(AtencionMedicaRoa::class,'id_formato');
     }
     public function habitoCostumbre(){
         return $this->hasOne(HabitosRoa::class,'id_formato');
     }
      public function disponible(){
           return $this->hasOne(DisponibilidadRoa::class,'id_formato');
    }
      public function referenciaPersonal(){
        return $this->hasMany(ReferenciasPersonalesRoa::class,'id_formato');        
    }
     public function referenciaLaborales(){
        return $this->hasMany(ReferenciasLaboralesRoa::class,'id_formato');
    }

    
}

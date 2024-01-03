<?php

namespace App\ESE\Formatos\GNP;

use Illuminate\Database\Eloquent\Model;
use App\ESE\EstudioEse;
use TraitMethodsModel;

class FormatoGnp extends Model
{
    use TraitMethodsModel;
    protected $table='ese_formatos_gnp';
    protected $fillable=['id_ese'];
    protected $hidden=['id'];
    public 	  $timestamps	= false;

     public function ese()
    {
    	return $this->belongsTo(EstudioEse::class,'id_ese' );
    }
    public function encabezado(){

    	return $this->hasOne(EncabezadoGnp::class,'id_formato');
    }
    public function datosGenerales(){
          
         return $this->hasOne(DatosGeneralesGnp::class,'id_formato');
    }
     public function escolaridadmet(){
        return $this->hasOne(EscolaridadGnp::class,'id_formato');
    }
     public function cursoMet(){
        return $this->hasMany(CursosGnp::class,'id_formato');        
    }
     public function idiomas(){
        return $this->hasMany(IdiomasGnp::class,'id_formato');        
    }
     public function conocimientos_(){
      return $this->hasMany(ConocimientosGnp::class,'id_formato');        
    }
     public function familia(){
        return $this->hasMany(FamiliaGnp::class,'id_formato');        
    }
     public function infoFamiliar(){
        return $this->hasOne(InfoFamiliarGnp::class,'id_formato'); 
     }
     public function situacionEconomica(){
        return $this->hasOne(SituacionEconomicaGnp::class,'id_formato'); 
     }
     public function bienes(){
        return $this->hasOne(BienesGnp::class,'id_formato'); 
     }
     public function vivienda(){
        return $this->hasOne(ViviendaGnp::class,'id_formato'); 
     }
       public function apreciacionVivienda(){
        return $this->hasOne(ApreciacionViviendaGnp::class,'id_formato');
    }
    public function ubicacionDomicilio(){
        return $this->hasOne(UbicacionGnp::class,'id_formato');
    }
     public function situacionSocial(){
         return $this->hasOne(SituacionSocialGnp::class,'id_formato');
     }
    public function enfermedad(){
         return $this->hasOne(EnfermedadesGnp::class,'id_formato');
     }
    public function padecimientos(){
         return $this->hasOne(PadecimientosGnp::class,'id_formato');
     }
    public function edoSalud(){
        return $this->hasMany(TratamientoSaludGnp::class,'id_formato');        
    }
    public function atencion(){
         return $this->hasOne(AtencionMedicaGnp::class,'id_formato');
     }
     public function habitoCostumbre(){
         return $this->hasOne(HabitosGnp::class,'id_formato');
     }
      public function disponible(){
           return $this->hasOne(DisponibilidadGnp::class,'id_formato');
    }
    public function referenciaLaborales(){
        return $this->hasMany(ReferenciasLaboralesGnp::class,'id_formato');
    }
}

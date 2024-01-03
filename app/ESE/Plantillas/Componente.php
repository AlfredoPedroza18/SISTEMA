<?php

namespace App\ESE\Plantillas;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    protected $table	  = 'ese_plantillas_componentes';
    protected $fillable	  = ['id_plantilla','nombre','descripcion'];
    public 	  $timestamps = false;

    public function getNombreAttribute( $value )
    {
        return ucwords($value);
    } 

    public function setNombreAttribute( $value )
    {
        $this->attributes['nombre'] = strtolower($value);
    }

    public function getDescripcionAttribute( $value )
    {
    	return ucfirst( $value );
    }

    public function setDescripcionAttribute( $value )
    {
    	$this->attributes['descripcion'] = $value;
    }

    public function plantilla()
    {
    	return $this->belongsTo('App\ESE\Plantillas\PlantillaBase','id_plantilla');
    }

    public function campos()
    {
    	return $this->hasMany('App\ESE\Plantillas\Campo','id_componente');
    }

    public function getClassNameAttribute()
    {
    	$str_class = explode(' ',$this->attributes['nombre']);
    	$class = implode('_', $str_class);
    	return $class;
    }

    
}

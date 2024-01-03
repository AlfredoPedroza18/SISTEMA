<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroNegocio extends Model
{
    protected $table = 'centros_negocio';
    protected $fillable = ['nombre','nomenclatura','cp','estado','municipio','colonia','calle','no_exterior','no_interior','ubicacion','telefono','id_user'];


    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }


    public function ejecutivos()
    {
    	return $this->hasMany('App\User','idcn');
    }

    public function clientes_demo()
    {
        return $this->belongsToMany('App\Cliente','asignacion_cn','id_cn','id_cliente');
    }

    public function ordenes_servicio()
    {
        return $this->hasMany('App\OS\OrdenServicio','id_cn');
    }

    public function cotizaciones()
    {
        return $this->hasMany( Cotizacion::class ,'id_cn');
    }

    public function getDireccionCompletaAttribute()
    {
        return  'Gen-T, ' . $this->attributes['calle'] . ' # ' . 
                            $this->attributes['no_exterior'] . ' Interior ' .
                            $this->attributes['no_interior'] . ', Col. ' . 
                            $this->attributes['colonia'] . ', C.P. ' . 
                            $this->attributes['cp'];
    }

    public function getComplementoDireccionAttribute()
    {
        return  $this->attributes['municipio'] . ' ' .
                $this->attributes['estado'];
    }

    
}





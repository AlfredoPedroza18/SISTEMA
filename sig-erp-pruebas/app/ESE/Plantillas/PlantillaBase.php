<?php

namespace App\ESE\Plantillas;

use Illuminate\Database\Eloquent\Model;

class PlantillaBase extends Model
{

    const REFERENCIAS_LABORALES  = 2;
    const REFERENCIAS_PERSONALES = 3;
    const BECAS                  = 4;
    const JLL                    = 5;
    const EVENPLAN               = 6;
    const METLIFE                = 7;
    const HSBC                   = 8;
    const ROA                    = 10;
    const SGMTY                  = 9;
    const HDDISC                 = 11;
    const FEMSA                  = 13;
    const GNP                    = 12;
    const BCM                    = 14;
    const GENT                   = 15;




    protected $table = 'ese_plantillas_base';
    protected $fillable		= [	'tipo','nombre','descripcion' ];
	protected $hidden 		= [ 'id','fecha_alta'];
    public 	  $timestamps	= false;

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

    public function componentes()
    {
    	return $this->hasMany('App\ESE\Plantillas\Componente','id_plantilla');
    }

    public function formatos()
    {
    	return $this->hasMany('App\ESE\Plantillas\Formato','id_plantilla');
    }

    public function getTipoAttribute( $value )
    {
        $tipo = '';
        switch ( $value ) {
            case self::GENT:
                    $tipo = 'gent';
                break;
            case self::REFERENCIAS_LABORALES:
                    $tipo = 'referencias-laborales';
                break;
            case self::REFERENCIAS_PERSONALES:
                    $tipo = 'referencias-personales';
                break;
            case self::BECAS:
                    $tipo = 'estudio-becas';
                break;
            case self::JLL:
                    $tipo = 'jll';
                break;
            case self::EVENPLAN:
                    $tipo = 'evenplan';
                break;
            case self::METLIFE:
                    $tipo = 'metlife';
                break;
            case self::HSBC:
                    $tipo = 'hsbc';
                break;
            case self::ROA:
                    $tipo = 'roa';
                break;

            case self::SGMTY:
                    $tipo = 'sgmty';
                break;
            case self::HDDISC:
                    $tipo = 'hddisc';
                break;
            case self::FEMSA:
                    $tipo = 'femsa';
                break;
            case self::GNP:
                    $tipo = 'gnp';
                break;
             case self::BCM:
                    $tipo = 'bcm';
                break;
             
            default:
                    $tipo = 'no aplica';
                break;
        }
        return $tipo;
    }


    
}

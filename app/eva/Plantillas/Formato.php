<?php

namespace App\ESE\Plantillas;

use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
	const GENT 		             = 15;
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
    const GNP                    =12;
    const BCM                    =14;
    const TEMPLATE_STATIC        = 2;
  
    // const EVENPLAN  = 2;
    // const HSBC       = 3;
    // const METLIFE   = 4;
    // const SGMTY      = 5;


    

    protected $table 	  = 'ese_formatos';
    protected $fillable	  = ['id_plantilla','nombre','descripcion'];
    public 	  $timestamps = false;

    public function getNombreAttribute( $name )
    {
    	return ucwords( $name );
    }

    public function setNombreAttribute( $name )
    {
    	$this->attributes['nombre'] = trim( strtolower( $name ) );
    }

    public function getDescripcionAttribute( $description )
    {
    	return ucfirst( $description );
    }

    public function setDescripcionAttribute( $description )
    {
    	$this->attributes['descripcion'] = trim( strtolower($description) );
    }

    public function plantilla()
    {
        return $this->belongsTo('App\ESE\Plantillas\PlantillaBase','id_plantilla');
    }

    public function campos()
    {
    	return $this->belongsToMany('App\ESE\Plantillas\Campo','ese_campos_formatos','id_formato','id_campo');
    } 

    public function estudios()
    {
        return $this->hasMany('App\ESE\EstudioEse','id_plantilla');
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
                    $tipo= 'roa';
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

    public function isStaticTemplate()
    {
        return $this->tipo_formato == self::TEMPLATE_STATIC;
    }

    public function getUrl()
    {
        $url   = '';
        $value = $this->id_plantilla;

        switch ( $value ) {
            case self::GENT:
                    $url = 'formato-gent.edit';
                break;
            case self::REFERENCIAS_LABORALES:
                    $url = 'referencias-laborales';
                break;
            case self::REFERENCIAS_PERSONALES:
                    $url = 'referencias-personales';
                break;
            case self::BECAS:
                    $url = 'estudio-becas';
                break;
            case self::JLL:
                    $url = 'formato-jll.edit';
                break;
            case self::EVENPLAN:
                    $url = 'formato-evenplan.edit';
                break;
            case self::METLIFE:
                    $url = 'formato-metlife.edit';
                break;
            case self::HSBC:
                    $url = 'formato-hsbc.edit';
                break;
           case self::ROA:
                    $url = 'formato-roa.edit';
                break;
            case self::SGMTY:
                    $url = 'formato-sgmty.edit';
                break;
            case self::HDDISC:
                    $url = 'formato-hddisc.edit';
                break;
            case self::FEMSA:
                    $url = 'formato-femsa.edit';
                break;
            case self::GNP:
                    $url = 'formato-gnp.edit';
                break;
            case self::BCM:
                    $url = 'formato-bcm.edit';
                break;
            default:
                    $url = 'no aplica';
                break;
        }
        return $url;
    }
}

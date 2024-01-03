<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RYS extends Model
{
    protected $table 		= 'crm_tc_cotizador_rys';
    protected $fillable 	= ['inicio','fin','porcentaje_servicio'];
    public 	  $timestamps  	= false;
    

    public static function isAvailable($inicio)
    {
    	$available  = true;
    	$rango 		= self::where('inicio','<=',$inicio)->where('fin','>=',$inicio)->get();
    	$resultado	= count( $rango );
    	
    	if( $resultado )
    	{
    		$available = false;
    	}

    	return $available;
    }

}

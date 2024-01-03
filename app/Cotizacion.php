<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table 		= 'crm_cotizaciones';
    protected $dates = ['fecha_cotizacion'];
    protected $fillable		= [
            'id_cn','id_usuario','id_cliente','id_servicio','subtotal','iva','total','contrato','porcentaje_descuento','porcentaje'
            ];
    public 	  $timestamps	= false;


    public function generales()
    {
    	return $this->hasMany( CotizacionGeneral::class, 'id_cotizacion' );
    }

    public function cn()
    {
    	return $this->belongsTo( CentroNegocio::class, 'id_cn' );
    }

    public function cliente()
    {
    	return $this->belongsTo( Cliente::class, 'id_cliente' );
    }

    public function ejecutivo()
    {
        return $this->belongsTo( User::class, 'id_usuario' );
    }

    public function getMontoDescuentoAttribute()
    {
        $descuento;
        if( $this->porcentaje == '0' )
        {
            $descuento = $this->descuento;
        }else{
            $descuento = $this->subtotal * ($this->descuento/100);
        }
        return $descuento; 
    }
    

}

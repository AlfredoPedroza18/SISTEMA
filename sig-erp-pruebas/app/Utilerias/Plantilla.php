<?php

namespace App\Utilerias;

use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    protected $table   = 'plantillas_cotizaciones';
    public $timestamps = false;

    public function scopeActive( $params )
    {
    	return $params->where('status' , '1');
    }
	public function setEncabezadoFondoAttribute( $value )
	{
		if( $value == 'rgb(0, 0, 0)' )
		{
			$this->attributes['encabezado_fondo'] = '#000000';
		}else{
			$this->attributes['encabezado_fondo'] = $value;
		}
	}

	public function setEncabezadoLetraAttribute( $value )
	{
		if( $value == 'rgb(0, 0, 0)' )
		{
			$this->attributes['encabezado_letra'] = '#000000';
		}else{
			$this->attributes['encabezado_letra'] = $value;
		}
	}

	public function setEncabezadoDetalleFondoAttribute( $value )
	{
		if( $value == 'rgb(0, 0, 0)' )
		{
			$this->attributes['encabezado_detalle_fondo'] = '#000000';
		}else{
			$this->attributes['encabezado_detalle_fondo'] = $value;
		}
	}

	public function setEncabezadoDetalleLetraAttribute( $value )
	{
		if( $value == 'rgb(0, 0, 0)' )
		{
			$this->attributes['encabezado_detalle_letra'] = '#000000';
		}else{
			$this->attributes['encabezado_detalle_letra'] = $value;
		}
	}

	public function setFechaTotalFondoAttribute( $value )
	{
		if( $value == 'rgb(0, 0, 0)' )
		{
			$this->attributes['fecha_total_fondo'] = '#000000';
		}else{
			$this->attributes['fecha_total_fondo'] = $value;
		}
	}

	public function setFechaTotalLetraAttribute( $value )
	{
		if( $value == 'rgb(0, 0, 0)' )
		{
			$this->attributes['fecha_total_letra'] = '#000000';
		}else{
			$this->attributes['fecha_total_letra'] = $value;
		}
	}

	public function setLetraGeneralAttribute( $value )
	{
		if( $value == 'rgb(0, 0, 0)' )
		{
			$this->attributes['letra_general'] = '#000000';
		}else{
			$this->attributes['letra_general'] = $value;
		}
	}


}

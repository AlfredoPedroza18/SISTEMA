<?php

namespace App\OS;

use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
	protected $table 		= 'ordenes_servicio';
	protected $fillable		= ['id_cn','id_usuario','id_cliente','id_servicio','subtotal','iva','total','contrato'];
	public 	  $timestamps	= false;
    

    public function cliente()
    {
        return $this->belongsTo('App\Cliente','id_cliente');
    }

    public function ordendes_servicio_ese()
    {
    	return $this->hasMany('App\OS\OrdenServicioEse','id_os');
    }

    public function ordenes_servicio_rys()
    {
    	return $this->hasMany('App\OS\OrdenServicioRYS','id_os');
    }

    public function ordendes_servicio_maquila()
    {
    	return $this->hasMany('App\OS\OrdenServicioMaquila','id_os');
    }

    public function ordendes_servicio_psicometricos()
    {
    	return $this->hasMany('App\OS\OrdenServicioPsicometricos','id_os');
    }

    public function centro_negocio()
    {
        return $this->belongsTo('App\CentroNegocio','id_cn');
    }
}

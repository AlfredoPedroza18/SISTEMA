<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cliente extends Model   
{

    protected $table = 'clientes';           

    
    protected $fillable = [
				            'id_cn',
				            'tipo',
							'id_ejecutivo',
							'contrato_a',
							'id_user',
							'nombre_comercial',     
							'forma_juridica',        
							'razon_social',   
							'fecha_constitucion',        
							'nombre',                
							'apellido_paterno',      
							'apellido_materno',      
							'genero',                
							'fecha_nacimiento_pros', 
							'lugar_nacimiento',      
							'clase_pm',              
							'rfc',
							'curp',                  
							'registro_patronal',  
							'registro_p',   
							'actividad_economica',
							'status',
							'df_cp',
							'df_estado',
							'df_municipio',
							'df_ciudad',
							'df_colonia',
							'df_calle',
							'df_num_exterior',
							'df_num_interior',
							'dc_cp',
							'dc_estado',
							'dc_municipio',
							'dc_ciudad',
							'dc_colonia',
							'dc_calle',
							'dc_num_exterior',
							'dc_num_interior',
							'medio_contacto',
							'tipo_cliente',
							'comentario',
							'db_forma_pago',
							'db_banco',
							'db_dias_credito',
							'db_limite_credito',
							'db_cta_clientes',
							'db_clabe',
							'db_iva',
							'id_contacto_principal' 
				          ];
            

    public function scopeClientes( $query )
    {
    	if( !auth()->user()->is('admin') )
    	{
    		return $query->where('id_cn', auth()->user()->idcn);
    	}

    	return $query;
    }

    public function contactos(){
    	return $this->hasMany('App\Contacto','id_cliente');
    }

    public function contacto_principal(){
    	return $this->contactos->where('principal',1)->first();
    }

    public function centro_negocio()
    {
    	return $this->belongsToMany('App\CentroNegocio','asignacion_cn','id_cn','id_cliente');
    }

    protected function isCnActual( $id_cliente, $id_cn )
    {
    	$clienteCn = "	SELECT id_cliente, GROUP_CONCAT(id_cn ORDER BY fecha_asignacion DESC SEPARATOR ',')  AS lista_cn
						FROM asignacion_cn	
						WHERE asignacion_cn.id_cliente = $id_cliente
						GROUP BY id_cliente "; 
		$result 	  = DB::select( $clienteCn ); 

		if( !$result ) return false;
		$id_ultimo_cn = explode( ',',$result[0]->lista_cn );

		return $id_cn == $id_ultimo_cn[0];

    }

    protected function cnActual( $id_cliente, $id_cn )
    {
    	$clienteCn = "	SELECT id_cliente, GROUP_CONCAT(id_cn ORDER BY fecha_asignacion DESC SEPARATOR ',')  AS lista_cn
						FROM asignacion_cn	
						WHERE asignacion_cn.id_cliente = $id_cliente
						GROUP BY id_cliente "; 
		$result 	  = DB::select( $clienteCn ); 

		if( !$result ) return $id_cn;
		
		$id_ultimo_cn = explode( ',',$result[0]->lista_cn );

		return $id_ultimo_cn[0];
    } 

    public function estudiosEse()
    {
    	return $this->hasMany('App\ESE\EstudioEse','id_cliente');
    }

    public function cotizacion()
    {
    	return $this->hasOne( Cotizacion::class, 'id_cliente' );
    }

    public function getDireccionCompletaAttribute()
    {
        return  $this->attributes['df_calle'] . ' # ' . 
                $this->attributes['df_num_exterior'] . ' Interior ' .
                $this->attributes['df_num_interior'] . ', Col. ' . 
                $this->attributes['df_colonia'] . ', C.P. ' . 
                $this->attributes['df_cp'];
                
    }

    public function getComplementoDireccionAttribute()
    {
        return 	$this->attributes['df_municipio'] . ' ' .
                $this->attributes['df_estado'];
    }

}
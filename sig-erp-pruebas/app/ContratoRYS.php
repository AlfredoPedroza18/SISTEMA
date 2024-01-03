<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratoRYS extends Model
{
    protected 	$table 		= 'crm_contratos_rys';
    protected 	$fillable 	= [	'id_contrato', 'cantidad_vacantes'		, 'puesto_requerido'	, 'sueldo_mensual',
								'porcentaje' , 'propuesta_economica'	, 'iva'					, 'total'
							  ]; 
    public 		$timestamps = false;
}

//Psicometricas es el contrato de rys   pendiente Anexos
//El de Maquila es el de tercerizacion   pendiente Anexos
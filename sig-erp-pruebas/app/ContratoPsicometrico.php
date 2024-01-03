<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratoPsicometrico extends Model
{
    protected 	$table 		 = 'crm_contratos_psicometricos';
    protected 	$fillable 	 = ['id_contrato','tipo_prueba','pruebas','costo_unitario','iva','total'];
    public 		$timestamps	 = false;
}

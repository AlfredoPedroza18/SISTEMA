<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratoMaquila extends Model
{
    protected $table 	= 'crm_contratos_maquila';
    protected $fillable = ['id_contrato', 'id_paquete', 'num_empleados', 'costo_unitario', 'subtotal', 'iva', 'total'];
    public $timestamps	= false;
}

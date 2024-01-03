<?php

namespace App\administrador;

use Illuminate\Database\Eloquent\Model;

class CotizadorGeneral extends Model
{
    protected $table="crm_cotizador_general";
    protected $fillable=["nombre",
    					 "descripcion",
    					 "costo_unitario",
    					 "iva"

    ];
}

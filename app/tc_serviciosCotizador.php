<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tc_serviciosCotizador extends Model
{
	public $timestamps=false;
    $protected=$table='crm_tc_servicioscotizador';
    $protected=$fillable=[
    'id',
    'servicio'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejecutivo extends Model
{
	protected 	$table = 'ejecutivos';
    protected 	$fillable =['id_cn','id_puesto','nombre','ap_paterno','ap_materno'];
       
}

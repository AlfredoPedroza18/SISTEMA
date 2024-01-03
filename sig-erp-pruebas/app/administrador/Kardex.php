<?php

namespace App\Administrador;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Kardex extends Model
{
    protected 	$table 		= "kardex_general";
    protected 	$fillable 	= ["id_cn","id_usuario","id_modulo","id_submodulo","id_accion","id_objeto","descripcion"];
    public 		$timestamps	= false;  


    public function usuario()
    {
    	return $this->belongsTo(User::class,'id_usuario');
    }  

}

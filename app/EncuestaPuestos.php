<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaPuestos extends Model
{
    //
    protected $table = 'ev_puestos';
    protected $fillable = ['Descripcion','IdCliente'];

    public static function puestos($id){
    	return EncuestaPuestos::where('IdCliente','=',$id)
    	->get();
    }
}

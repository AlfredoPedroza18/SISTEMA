<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    //
    public $table = "ev_departamentos";
    
    //public $fillable = ['Descripcion'];
    public $fillable = ['IdCliente', 'Descripcion'];
}

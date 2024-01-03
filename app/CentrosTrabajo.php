<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentrosTrabajo extends Model
{
    public $table = "ev_centros_trabajo";
    
    //public $fillable = ['Descripcion'];
    public $fillable = ['IdCliente', 'Descripcion', 'Cantidad'];
}

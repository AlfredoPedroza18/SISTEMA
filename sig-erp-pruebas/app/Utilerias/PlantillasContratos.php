<?php

namespace App\Utilerias;

use Illuminate\Database\Eloquent\Model;

class PlantillasContratos extends Model
{
    protected $table 	  = 'plantillas_contratos';
    protected $fillable   = ['contenido','id_usuario','fecha_alta','titulo','descripcion','status']; 
    public 	  $timestamps = false;
}



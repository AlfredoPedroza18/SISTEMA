<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $table 		= 'crm_expedientes_clientes';
    protected $fillable		= ['id_cliente','id_user','ruta','nombre','carpeta_cliente','fecha'];
    public 	  $timestamps	= false;
}

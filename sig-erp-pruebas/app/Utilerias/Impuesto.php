<?php

namespace App\Utilerias;

use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    protected $table 		= 'impuestos';
    protected $hidden 		= ['fecha_alta','status','id_cn'];
    public 	  $timestamps 	= false;

}

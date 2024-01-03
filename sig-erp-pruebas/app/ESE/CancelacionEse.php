<?php

namespace App\ESE;

use Illuminate\Database\Eloquent\Model;

class CancelacionEse extends Model
{
     protected $table='ese_cancelacion_ese';
     protected $fillable		= ['comentario_cancelacion'];
	protected $hidden 		= ['id_os'];
    public 	  $timestamps	= false;

     public function cancelar()
    {
    	return $this->hasMany('App\ESE\EstudioEse','id');
    }

}

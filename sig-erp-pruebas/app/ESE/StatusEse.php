<?php

namespace App\ESE;

use Illuminate\Database\Eloquent\Model;

class StatusEse extends Model
{
    protected $table 		= 'ese_status';
    protected $fillable 	= ['nombre','descripcion'];
    protected $hidden 		= ['id','fecha_alta','fecha_update'];
    public 	  $timestamps 	= false;

    public function estudiosEse()
    {
    	return $this->hasMany('App\ESE\EstudioEse','id_status');
    }


}

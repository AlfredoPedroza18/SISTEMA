<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    protected $table 		= 'prioridades';
    protected $fillable 	= ['nombre','descripcion','numero_maximo_dias'];
    public 	  $timestamps  	= false;

    public function estudiosEse()
    {
    	return $this->hasMany('App\ESE\EstudioEse','prioridad');
    }

    public function isNormal()
    {
    	return ($this->attributes['slug'] == 'normal');
    }

    public function isUrgente()
    {
    	return ($this->attributes['slug'] == 'urgente');	
    }

    
}

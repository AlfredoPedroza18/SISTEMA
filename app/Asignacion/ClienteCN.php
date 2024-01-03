<?php

namespace App\Asignacion;

use Illuminate\Database\Eloquent\Model;

class ClienteCN extends Model
{
    
	protected $table 	 = 'asignacion_cn';
	protected $fillable  = [ 'id_cn','id_cliente','id_usuario' ];
	public    $timestamps = false;
    
    public function cliente()
    {
    	return $this->belongsTo('App\Cliente','id');
    }
}

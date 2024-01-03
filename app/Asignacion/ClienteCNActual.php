<?php

namespace App\Asignacion;

use Illuminate\Database\Eloquent\Model;

class ClienteCNActual extends Model
{

    protected $table 	 = 'cliente_cn_actual';
	protected $fillable  = [ 'id_cn','id_cliente' ];
	public    $timestamps = false;
}

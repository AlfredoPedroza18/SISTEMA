<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
	protected $table = 'master_perfiles';
    protected $primaryKey = 'IdPerfil';
    protected $fillable = ['IdPerfil','Perfil','EditaMontos','GuardarReportes','Activo','AccesoEscritorio'];
    public 	  $timestamps 	= false;
}

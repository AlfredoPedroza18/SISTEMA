<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterModulos extends Model
{
    protected $table = 'master_modulos';
    protected $fillable = [
                            'IdModulo',
                            'NombreForm',
                            'NombreGrupo',
                            'Caption',
                            'Acceder',
                            'Editar',
                            'Eliminar',
                            'Insertar',
                            'Exportar',
                            'Plantilla',
                            'Importar',
                            'Imprimir',
                            'IdPerfil',
                            'IdUsuario'
                           ];
                           public 	  $timestamps 	= false;
}

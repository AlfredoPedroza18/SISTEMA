<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturadora extends Model
{
    protected $table = 'facturadoras';

    protected $fillable = ['nombre',
  'forma_juridica',
  'razon_social',
  'nombre',
  'nombre_curp',
  'apellido_paterno',
  'apellido_materno',
  'genero',
  'curp',
  'fecha_constitucion',
  'FechainicioOperaciones',
  'registroMercantil',
  'fecha_nacimiento_pros',
  'lugar_nacimiento',
  'clase_pm',
  'rfc',
  'actividad_economica',
  'rlegal_nombre',
  'rlegal_apaterno',
  'rlegal_amaterno',
  'rlegal_telefono',
  'rlegal_correo',
  'paginaWeb',
  'df_cp',
  'df_estado',
  'df_municipio',
  'df_colonia',
  'df_calle',
  'df_num_exterior',
  'df_num_interior',
  'id_user'
    ];
}

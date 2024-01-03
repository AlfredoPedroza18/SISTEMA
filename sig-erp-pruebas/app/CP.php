<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CP extends Model
{
   protected $table='codigospostales';

   protected $fillable=[
   'CodigoPostal',
   'Colonia',
   'Municipio',
   'Estado'
   ];
}

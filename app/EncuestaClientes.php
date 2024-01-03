<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaClientes extends Model
{
    //
    protected $table = 'ev_personal';
    protected $fillable = ['IdPersonal'];
}

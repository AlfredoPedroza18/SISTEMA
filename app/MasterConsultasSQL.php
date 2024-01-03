<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterConsultasSQL extends Model
{
    public $timestamps = false;
    protected $table = 'master_consultassql';
    protected $primaryKey = 'IdConsulta';
}

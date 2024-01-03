<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterMenu extends Model
{
    protected $table = 'master_menu';
    protected $fillable = ['Idmenu','Nombreform','Nombregrupo','caption'];
}

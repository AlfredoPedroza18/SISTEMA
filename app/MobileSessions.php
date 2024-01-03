<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MobileSessions extends Model
{
    public $timestamps = false;
    protected $table = 'mobile_sessions';
    protected $primaryKey = 'id';
}

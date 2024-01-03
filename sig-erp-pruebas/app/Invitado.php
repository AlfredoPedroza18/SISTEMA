<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Invitado extends Authenticatable
{
	protected $table = 'invitados';     
}

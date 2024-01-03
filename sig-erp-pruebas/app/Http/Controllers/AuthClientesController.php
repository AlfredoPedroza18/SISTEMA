<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthClientesController extends Controller
{
	use AuthenticatesUsers;
	
	protected $loginView 			      = 'auth.clientes.login';
  protected $guard 	 			        = 'expediente';
  protected $redirectAfterLogout 	= 'login/clientes';
    //protected $username 			= 'name';   



  public function authenticated()
  {
  	return redirect('expediente/files');
  }

}

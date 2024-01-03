<?php
namespace App\Http\Controllers\Auth;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo           = '/home';
    protected $redirectAfterLogout  = '/';
    protected $username             = 'username';
    protected $redirectForeingTo    = 'estudio-ese';
    //protected $username = 'email';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tipo' => $data['tipo'],
            'password' => bcrypt($data['password']),
        ]);
    }

     public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'email';
    }

     public function showRegistrationForm()
    {
        $queryCN=DB::select("SELECT id,nombre,nomenclatura FROM centros_negocio");
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }
        return view('auth.register',['listaCN'=>$queryCN]);
    }

    public function staff(Request $request, $id)
    {
        $user = Auth::user();
        if($user->id==$id){
            return '/dashboard';
        }
    }

    public function redirectPath()
    {   $user = Auth::user();
        $accion_kardex  = Accion::where('slug','login')->get();
        $submodulo      = SubModulo::where('slug','administrador.login')->get();
        $modulo         = Modulo::where('slug','administrador')->get();
        $kardex = Kardex::create([  "id_cn"         => $user->idcn,
                                    "id_usuario"    => $user->id,
                                    "id_modulo"     => $modulo[0]->id,
                                    "id_submodulo"  => $submodulo[0]->id,
                                    "id_accion"     => $accion_kardex[0]->id,
                                    "id_objeto"     => $user->id,
                                    "descripcion"   => "Login Usuario: " . $user->name . " (" . $user->username . ")"]);
        if (\Auth::user()->tipo == 's') {
            return '/home';
        }
        elseif ((\Auth::user()->tipo == 'e')){
            return '/dashboardEmpleado';
        }
        elseif((\Auth::user()->tipo == 'c')){
            return '/dashboard';
        }
        elseif((\Auth::user()->tipo == 'f')){
            return '/dashboard';
        }
        else{
            return '/logout';
        }
    }
}


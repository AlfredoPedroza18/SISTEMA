<?php



namespace App;



//use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Passwords\CanResetPassword;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Bican\Roles\Traits\HasRoleAndPermission;

use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

use App\Administrador\Kardex;

use Carbon\Carbon;

use App\ConfiguracionFecha;

use App\ConfiguracionUsuario;



class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract

{

    use Authenticatable, CanResetPassword, HasRoleAndPermission;

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */



    const FORANEO = 'f';



    protected $fillable = [

        'idcn',

        'IdPuesto',

        'name',

        'email', 

        'password',

        'username',

        'nick_name',

        'id', // se agrego la variable para que funcione el kardex

        'apellido_paterno',

        'apellido_materno',

        'telefono_movil',

        'telefono_oficina',

        'tipo',

        'password_aux',

        'IdPersonal',

        'IdCliente',

        'IdPerfil',

        'password_mobile',

        'IdRol',

        'IdEmpleado',

        'password_ese_mobile',

        'EditaMontos',

        'GuardarReportes',

        'fileBase64'

    ];



    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    protected $hidden = [

        'password', 'remember_token','created_at','updated_at','driver'

    ];



    public function centro_negocio()

    {

        return $this->belongsTo('App\CentroNegocio','idcn');

    }



    public function estudios_ese()

    {

        return $this->belongsToMany('App\ESE\EstudioEse','ese_usuarios','id_usuario','id_estudio')

                    ->withPivot('id_estudio','id_usuario','principal','status');

    }



    public function getNombreEjecutivoAttribute()

    {

        return $this->name . ' ' . $this->apellido_paterno . ' ' . $this->apellido_materno;

    }



    public function isForeing()

    {

        return $this->tipo === self::FORANEO  ? true : false;

    }



    public function kardex()

    {

        return $this->hasMany(Kardex::class,'id_usuario');

    }



    public function getimagenFirmaAttribute()

    {

        return $this->path.'/'.$this->file;

    }



    public function configuracion_fecha()

    {

        return $this->belongsToMany(ConfiguracionFecha::class,'configuracion_modulos','id_usuario','id_configuracion');

    }



    public function configuracion_usuarios()

    {

        return $this->belongsToMany(ConfiguracionUsuario::class,'configuracion_usuarios_pivot','id_usuario','id_configuracion');

    }



    public function isAbleEnter($module)

    {

        $configuracion = $this->configuracion_fecha()->where('slug',$module)->get();

        $result = ConfiguracionFecha::where('slug',$module)

                                ->where('fecha_inicio','<=', Carbon::now()->format('Y-m-d 00:00:00') )

                                ->where('fecha_fin','>=', Carbon::now()->format('Y-m-d 00:00:00') )->count();



        



        return ( $result > 0);

    }



    public function isAbleCreateUser()

    {

        return $configuracion = ConfiguracionUsuario::first();

        

    }

}








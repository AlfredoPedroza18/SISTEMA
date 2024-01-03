<?php
namespace App\Http\Controllers\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;
class EmpleadoViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $id = Auth::user()->IdPersonal;
     
        $query='select p.IdPersonal,p.IdEmpresa,p.Nombre,p.Apaterno,p.Amaterno,p.Edad,p.Sexo,p.FechaNacimiento,p.Telefono,emp.FK_Titulo,p.CodigoPersonal,
          p.Movil,p.CorreoElectronico,ifnull(p.Imagen,null) as Imagen,
          concat( p.APaterno,\' \', p.AMaterno, \' \', p.Nombre ) as NombrePCompleto,
          concat( p.APaterno,\' \', p.AMaterno) as Apellidos, p.Curp, p.Rfc, p.NSS, 
          concat( p.Calle,\' \', p.NoExt,\' \', p.Colonia,\' \', p.CodigoPostal,\' \', ciu.FK_Ciudad,\' \', p.Estado) as Direccion
          from master_personal as p
          INNER join
          rh_contratacion as co
          on (co.IdPersonal = p.IdPersonal and  co.IdContratacion = (Select max(IdContratacion) from rh_contratacion where Idpersonal = p.Idpersonal))
          INNER join users u
          on u.IdPersonal = p.IdPersonal
          INNER join master_empresa emp
          on emp.IdEmpresa = p.IdEmpresa
          LEFT join master_ciudad ciu
          on ciu.IdCiudad = p.IdCiudad
          Where p.IdPersonal= ? ';

        /*========CP========*/
        $empleado=DB::select($query,[$id]);

        foreach ($empleado as  $Dempleado) {
            $nombre=$Dempleado->Nombre;
            $apellidos=$Dempleado->Apellidos;
            $apaterno=$Dempleado->Apaterno;
            $amaterno=$Dempleado->Amaterno;
            $edad=$Dempleado->Edad;
            $sexo=$Dempleado->Sexo;
            $fechanacimiento=$Dempleado->FechaNacimiento;
            $telefono=$Dempleado->Telefono;
            $movil=$Dempleado->Movil;
            $email=$Dempleado->CorreoElectronico;
            $imagen=$Dempleado->Imagen;
            $curp=$Dempleado->Curp;
            $rfc=$Dempleado->Rfc;
            $nss=$Dempleado->NSS;
            $direccion=$Dempleado->Direccion;
            $empresa=$Dempleado->FK_Titulo;
            $codigopersonal=$Dempleado->CodigoPersonal;
        }
       // $rows = $empleado->fetch_assoc();
        $uri = 'data:image/jpeg;base64,' . $imagen;
       // echo '<img class="avatar border-white" src="' . $uri . '"  />';
        //return view("administrador.empleados.empleado",["uri"=>$uri]);
        return view("administrador.empleados.empleado")
            ->with('nombre',$nombre)
            ->with('apellidos',$apellidos)
            ->with('apaterno',$apaterno)
            ->with('amaterno',$amaterno)
            ->with('edad',$edad)
            ->with('sexo',$sexo)
            ->with('fechanacimiento',$fechanacimiento)
            ->with('telefono',$telefono)
            ->with('movil',$movil)
            ->with('email',$email)
            ->with('uri',$uri)
            ->with('rfc',$rfc)
            ->with('curp',$curp)
            ->with('nss',$nss)
            ->with('direccion',$direccion)
            ->with('empresa',$empresa)
            ->with('codigopersonal',$codigopersonal)
            ;

       // return view("administrador.empleados.empleado",array(['nombrese'=>$nombre]));

       // return view("administrador.empleados.empleado",['nombre'=>$empleado]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        /*$files = $request->file('file');
        foreach($files as $file) {
            File::create([
                'path' => $file->store('public/storage')
            ]);

        }
        return redirect('/subir/app')->with('success','Se ha subido el archivo correctamente.');*/
    }

    public function showUploadFile(Request $request) {

        $image = $request->file('image');

        $fullName=$image->getClientOriginalName();
        $sname=explode('.',$fullName)[0];

        $name = $sname.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('appGent/');
        $image->move($destinationPath, $name);


        return back()->with('success','Se ha subido el apk correctamente.');


    }


    public function cuentaPerfil(){

        $username = Auth::user()->username;
        $password = Auth::user()->password_aux;
        $id = Auth::user()->IdPersonal;
        $query='select p.IdPersonal,emp.FK_Titulo
          from master_personal as p
          INNER join
          rh_contratacion as co
          on (co.IdPersonal = p.IdPersonal and  co.IdContratacion = (Select max(IdContratacion) from rh_contratacion where Idpersonal = p.Idpersonal))
          INNER join users u
          on u.IdPersonal = p.IdPersonal
          INNER join master_empresa emp
          on emp.IdEmpresa = p.IdEmpresa
          LEFT join master_ciudad ciu
          on ciu.IdCiudad = p.IdCiudad
          Where p.IdPersonal= ? ';
        /*========CP========*/
        $empleado=DB::select($query,[$id]);
        foreach ($empleado as  $Dempleado) {
            $empresa=$Dempleado->FK_Titulo;
        }
        return view('administrador.empleados.cuenta-perfil')
            ->with('username',$username)
            ->with('password',$password)
            ->with('empresa',$empresa);
    }

    public function showChangePasswordForm(){
        $id = Auth::user()->IdPersonal;
     
        $query='select p.IdPersonal,emp.FK_Titulo
          from master_personal as p
          INNER join
          rh_contratacion as co
          on (co.IdPersonal = p.IdPersonal and  co.IdContratacion = (Select max(IdContratacion) from rh_contratacion where Idpersonal = p.Idpersonal))
          INNER join users u
          on u.IdPersonal = p.IdPersonal
          INNER join master_empresa emp
          on emp.IdEmpresa = p.IdEmpresa
          LEFT join master_ciudad ciu
          on ciu.IdCiudad = p.IdCiudad
          Where p.IdPersonal= ? ';

        /*========CP========*/
        $empleado=DB::select($query,[$id]);

        foreach ($empleado as  $Dempleado) {
           
            $empresa=$Dempleado->FK_Titulo;
            
        }
        return view('administrador.empleados.changepassword')->with('empresa',$empresa);
    }
    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Su contraseña actual no coincide con la contraseña que proporcionó. Inténtelo de nuevo.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","La nueva contraseña no puede ser la misma que su contraseña actual. Por favor, elija una contraseña diferente.");
        }

        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|confirmed',
            // 'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->password_aux = $request->get('new-password');
        $password =  $user->password_aux;
        $contr='SELECT AES_ENCRYPT(?, "DSAI2020") as pw';
            $datos=DB::select($contr,[$password]);
            $contras="";
            foreach ($datos as  $dato) {
                $contras = $dato->pw;
            }

        $user->password_mobile= $contras;
        $user->save();
        return redirect()->back()->with("success","La contraseña ha sido cambiada correctamente.");
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function downloadApp()
    {
        $file= public_path(). "/appGent/GenT.apk";

        $headers = array(
            'Content-Type: application/apk',
        );

        return response()->download($file, 'GenT.apk', $headers);
    }

    public function showdownload()
    {
        return view('administrador.empleados.download-apk');
    }

    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Administrador;

    use Illuminate\Http\Request;
    //use App\Http\Requests;
    use App\Http\Controllers\Controller;
    /*use App\Facturadora;
    use App\Contrato;
    use App\Administrador\Kardex;
    use App\Administrador\SubModulo;
    use App\Administrador\Modulo;
    use App\Administrador\Accion;*/
    use DB;
    use comments;
    use Illuminate\Routing\Redirector;
    use Illuminate\Session\SessionManager;
    use Illuminate\Support\Facades\Mail;
    use phpDocumentor\Reflection\Location;

    //use Illuminate\Redis\Database;

    class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $EC=DB::table('empleados_cliente AS ec')
            ->select('ec.IdEmpleado', 'c.nombre', 'me.FK_Titulo',DB::raw('CONCAT(ec.Nombre,'.'" "'.', ec.APaterno,'.'" "'.', ec.AMaterno) AS Empleado'),'ec.Nickname','ec.Email','ec.FechaAlta','ec.Activo')
            ->join('admin_master_demo.clientes AS c', 'ec.IdCliente', '=', 'c.id')
            ->join('master_empresa AS me', 'ec.IdEmpresa', '=', 'me.IdEmpresa')
            ->get();
        return view('administrador.empleados.empleado', ["empleados_cliente"=>$EC]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $IdCliente='';
        $Cliente=DB::table('admin_master_demo.clientes')->select('nombre')->where('nombre', '=', (env('DB_DATABASE')))->get();
        foreach($Cliente as $Cliente) {
            $IdCliente = $Cliente->nombre;
        }
        $IdEmpresa=[];
        $Empresa=DB::table('master_empresa')->select('FK_Titulo')->get();
        foreach($Empresa as $Empresa){
            $IdEmpresa[$Empresa->FK_Titulo]=$Empresa->FK_Titulo;
        }
        return view('administrador.empleados.empleado-alta', ["IdCliente"=>$IdCliente, "IdEmpresa"=>$IdEmpresa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $N='Nombre';
        $Noi=$request->input('Nombre');
        $Ap='APaterno';
        $Api=$request->input('APaterno');
        $Am='AMaterno';
        $Ami=$request->input('AMaterno');
        $C='Curp';
        $Ci=$request->input('Curp');
        $Nk='Nickname';
        $Nki=$request->input('Nickname');
        $Pw='Password';
        $Pwi=$request->input('Password');
        $T='Telefono';
        $Ti=$request->input('Telefono');
        $E='Email';
        $Ei=$request->input('Email');
        $Ic='IdCliente';
        $Cliente=DB::table('admin_master_demo.clientes')->select('id')->where('nombre', '=', (env('DB_DATABASE')))->get();
        foreach($Cliente as $Cliente) {
            $Ici = $Cliente->id;
        }
        $Ie='IdEmpresa';
        $Iei=$request->input('Empresa');
        $Empresa=DB::table('master_empresa')->select('IdEmpresa')->where('FK_Titulo', '=', $Iei)->get();
        foreach($Empresa as $Empresa){
            $IdF=$Empresa->IdEmpresa;
        }
        $A='Activo';
        $Ai=$request->input('Activo');
        $G='Genero';
        $Gi=$request->input('Genero');
        $F='FechaNacimiento';
        $Fi=$request->input('FechaN');
        Mail::send('administrador.correo.email', $request->all(), function($msj) use($Ei){
            $msj->to($Ei)->subject('Prueba');
        });
        $Insert=DB::table('empleados_cliente')->insert([$N=>$Noi, $Ap=>$Api, $Am=>$Ami, $C=>$Ci, $Nk=>$Nki.'.'.$Noi.'.'.$Api.'.'.$Ami.'.'.$Ci, $Pw=>$Pwi, $T=>$Ti, $E=>$Ei, $Ic=>$Ici, $Ie=>$IdF, $A=>$Ai, 'FechaAlta'=>date('Y-m-d H:i:s'), $G=>$Gi, $F=>$Fi]);
        return redirect()->route('sig-erp-crm::empleados.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $IdEmpleado)
    {
        $Noi=$request->input('Nombre');
        $Cliente=env('DB_DATABASE');
        $IdEmpresa=[];
        $Empresa=DB::table('master_empresa')->get();
        foreach($Empresa as $Empresa){
            $IdEmpresa[$Empresa->IdEmpresa]=$Empresa->FK_Titulo;
        }
        return view('administrador.empleados.empleado-edit', ["IdCliente"=>$Cliente,"IdEmpresa"=>$IdEmpresa, "ConNombre"=>$Noi]);
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
    public function destroy($IdEmpleado)
    {
        $delete=DB::table('empleados_cliente')->where('IdEmpleado', '=', $IdEmpleado)->delete();
        return redirect()->route('sig-erp-crm::empleados.index');
    }
}

<?php

namespace App\Http\Controllers\Administrador;

use App\Administrador\Accion;
use App\Administrador\Kardex;
use App\Administrador\Modulo;
use App\Administrador\SubModulo;
use App\MasterPuesto;
use App\Facturadora;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class MasterPuestoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $CatalogoPuesto=DB::table('master_puesto')->get();
        return view("administrador.CatalogoPuestos.CatalogoPuestos")
        ->with('CatalogoPuesto',$CatalogoPuesto);
    }

    public function create(Request $request)
    {
        
        $empresa = [];
        $empresas = Facturadora::all();
        $Activo='Si';
        foreach ($empresas as $emp) {
            $empresa[$emp->IdEmpresa] = $emp->FK_Titulo;
        }
     
        return view("administrador.CatalogoPuestos.form-catalogopuestos")
        ->with('empresas',$empresa)
        ->with('Activo',$Activo); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  $puestos=MasterPuesto::create($request->all());
        $Cod='Codigo';
        $Codigo=$request->input('Codigo');
        $N='Nombre';
        $Nombre=$request->input('Nombre');
        $Ac='Activo';
      //  $Activo=$request->input('Activo');
        $IE='IdEmpresa';
        $IdEmpresa=$request->input('IdEmpresa');
        if (Input::get('Activo')) {
            $Activo='Si';
        } else {
           $Activo='No';
        }

           $Insert=DB::table('master_puesto')->insert([$Cod=>$Codigo, $N=>$Nombre, $IE=>$IdEmpresa, $Ac=>$Activo]);
           return redirect()->route('sig-erp-crm::CatalogoPuestos.index');

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

    public function ValidacionClientes(Request $request)
    {   
       $datos=$request->all();

       return $datos ; 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Puestos=MasterPuesto::find($id); 
        $Empresa=DB::table('master_empresa')->get();
        foreach($Empresa as $Empresa){
            $IdEmpresa[$Empresa->IdEmpresa]=$Empresa->FK_Titulo;
        }
       // dd($Puestos->Activo);
        if($Puestos){
            return view("administrador.CatalogoPuestos.edit-catalogopuestos")
            ->with('Puestos',$Puestos)
            ->with('empresas',$IdEmpresa)
            ->with('Activo',$Puestos->Activo);
        }
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
        $IPuesto = Input::all();
        if (Input::get('Activo')) {
                    $Activo='Si';
                } else {
                   $Activo='No';
                }

        $updatePuesto = MasterPuesto::find($id);
      
        $updatePuesto->Codigo = $IPuesto['Codigo'];
        $updatePuesto->Nombre = $IPuesto['Nombre'];
        $updatePuesto->IdEmpresa = $IPuesto['IdEmpresa'];
        $updatePuesto->Activo = $Activo;
      
        $updatePuesto->save();      
        // return response()->json(['status_alta' => 'successEditado']);
        return redirect()->route('sig-erp-crm::CatalogoPuestos.index');
             // return redirect('/departamentos');
             //   ->with(['status_alta' => 'successDepartamento']);
        
            

         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
     
        $EPuesto = MasterPuesto::find($id);
        $Nombre  = $EPuesto->Nombre;
        $IdPuesto      = $EPuesto->IdPuesto;
        $EPuesto->delete();
        $modulo         = Modulo::where('slug','administrador')->get();
        $submodulo      = SubModulo::where('slug','administrador.empresas.facturadoras')->get();
        $accion_kardex  = Accion::where('slug','alta')->get();

        $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                    "id_usuario"    => $request->user()->id,
                                    "id_modulo"     => $modulo[0]->id,
                                    "id_submodulo"  => $submodulo[0]->id,
                                    "id_accion"     => $accion_kardex[0]->id,
                                    "id_objeto"     => $IdPuesto,
                                    "descripcion"   => "Eliminación Catalogo Puesto: " . $Nombre]);

        return response()->json(['status_alta' => 'successEliminado']);

        
    }
}
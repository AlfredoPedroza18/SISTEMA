<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\CentroNegocio;
use App\User;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;


class departamentosController extends Controller
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
    public function index()
    {
          $cn=DB::table('centros_negocio')->get();
          return view("administrador.departamentos.departamentos",["cn"=>$cn]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          // Listado de CP
            $cp=DB::table('codigospostales')->get();
            $cp_select=[''=>'Seleccione un CP...'];
            foreach ($cp as  $cps) {
                $cp_select[$cps->CodigoPostal]=$cps->CodigoPostal;
            }
         return view("administrador.departamentos.form-departamentos",['cp'=>$cp_select,'lugar_nacimiento']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamentos=CentroNegocio::create($request->all());
        if($departamentos){

            $modulo         = Modulo::where('slug','administrador')->get();
            $submodulo      = SubModulo::where('slug','administrador.departamentos')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $departamentos->id,
                                        "descripcion"   => "Alta Centro de Negocios: " . $departamentos->nombre]);
            return response()->json(['status_alta' => 'success']);
        }

        
            return response()->json(['status_alta' => 'wrong']);

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
    public function edit($id)
    {
        $depCn=CentroNegocio::find($id);
         // Listado de CP
            $cp=DB::table('codigospostales')->get();
            $cp_select=[''=>'Seleccione un CP...'];
            foreach ($cp as  $cps) {
                $cp_select[$cps->CodigoPostal]=$cps->CodigoPostal;
            }
        if($depCn){
              return view("administrador.departamentos.edit-departamento",['depCn'=>$depCn,'cp'=>$cp_select]);
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
        $updateDepto=CentroNegocio::find($id);


        if($updateDepto){
            $updateDepto->update($request->all());

            $modulo         = Modulo::where('slug','administrador')->get();
            $submodulo      = SubModulo::where('slug','administrador.departamentos')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $updateDepto->id,
                                        "descripcion"   => "Actualización Centro de Negocios: " . $updateDepto->nombre]);
            return response()->json(['status_alta' => 'success']);
        }
            

        
            return response()->json(['status_alta' => 'wrong']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id )
    {
        $idCn=User::where('idcn',$id)->first();
//dd($idCn);

        if($idCn){
         return response()->json(['status_alta' => 'successDepartamento']);
    }else{

        $centroNegocio  = CentroNegocio::find($id);
        $modulo         = Modulo::where('slug','administrador')->get();
        $submodulo      = SubModulo::where('slug','administrador.departamentos')->get();
        $accion_kardex  = Accion::where('slug','alta')->get();

        $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                    "id_usuario"    => $request->user()->id,
                                    "id_modulo"     => $modulo[0]->id,
                                    "id_submodulo"  => $submodulo[0]->id,
                                    "id_accion"     => $accion_kardex[0]->id,
                                    "id_objeto"     => $centroNegocio->id,
                                    "descripcion"   => "Eliminación Centro de Negocios: " . $centroNegocio->nombre]);
        $centroNegocio->delete();
        return response()->json(['status_alta' => 'successEliminado']);

        }
    }
}

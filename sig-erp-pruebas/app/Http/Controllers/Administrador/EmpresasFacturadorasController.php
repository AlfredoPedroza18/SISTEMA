<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Facturadora;
use App\Contrato;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;
use DB;


class EmpresasFacturadorasController extends Controller
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
            $empresaFacturadora=DB::table('facturadoras')->get();
            //dd($empresaFacturadora);
      if($empresaFacturadora)          
        return view("administrador.empresas.empresa",["empresa"=>$empresaFacturadora]);
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
                $cp_select[$cps->FK_CodigoPostal]=$cps->FK_CodigoPostal;
            }

            $lugar_nacimiento = [];
            $estados = DB::table('estados')->get();
            foreach ($estados as $estado) {
                $lugar_nacimiento[$estado->renapo] = $estado->nombre_estado;
            }
            $actividad_economica = [];
            $actividad = DB::table('actividad_economica')->get();
            foreach ($actividad as $act) {
                $actividad_economica[$act->id] = $act->actividad_economica;
            }

        //
        return view("administrador.empresas.alta-empresa",['cp'=>null,'lugar_nacimiento' => $lugar_nacimiento,'actividad_economica' => $actividad_economica]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
          $empresaFacturadora=Facturadora::create($request->all());


          if($empresaFacturadora)
          {
                $modulo         = Modulo::where('slug','administrador')->get();
                $submodulo      = SubModulo::where('slug','administrador.empresas.facturadoras')->get();
                $accion_kardex  = Accion::where('slug','alta')->get();

                $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                            "id_usuario"    => $request->user()->id,
                                            "id_modulo"     => $modulo[0]->id,
                                            "id_submodulo"  => $submodulo[0]->id,
                                            "id_accion"     => $accion_kardex[0]->id,
                                            "id_objeto"     => $empresaFacturadora->id,
                                            "descripcion"   => "Alta Empresa Facturadora: " . $empresaFacturadora->nombre]);
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
        //
        $Facturadora=Facturadora::find($id);
          // Listado de CP
            $cp=DB::table('codigospostales')->get();
            $cp_select=[''=>'Seleccione un CP...'];
            foreach ($cp as  $cps) {
                $cp_select[$cps->FK_CodigoPostal]=$cps->FK_CodigoPostal;
            }

            $lugar_nacimiento = [];
            $estados = DB::table('estados')->get();
            foreach ($estados as $estado) {
                $lugar_nacimiento[$estado->renapo] = $estado->nombre_estado;
            }
            $actividad_economica = [];
            $actividad = DB::table('actividad_economica')->get();
            foreach ($actividad as $act) {
                $actividad_economica[$act->id] = $act->actividad_economica;
            }
        if($Facturadora)
            return view("administrador.empresas.edit-empresa",['facturadora'=>$Facturadora,'lugar_nacimiento'=>$lugar_nacimiento,'actividad_economica'=>$actividad_economica]);
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
       
        $updateEmpresa=Facturadora::find($id);

        if($updateEmpresa){
            $updateEmpresa->update($request->all());

            $modulo         = Modulo::where('slug','administrador')->get();
            $submodulo      = SubModulo::where('slug','administrador.empresas.facturadoras')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $updateEmpresa->id,
                                        "descripcion"   => "Actualización Empresa Facturadora: " . $updateEmpresa->nombre]);

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
    public function destroy(Request $request,$id)
    {
        $facturadoraContrato=Contrato::where('id_facturadora',$id)->first();
        if($facturadoraContrato){            
            return response()->json(['status_alta' => 'successEmpresa']);
    }else{
        
        $facturadoraContrato = Facturadora::find($id);
        $nombre_facturadora  = $facturadoraContrato->nombre;
        $id_facturadora      = $facturadoraContrato->id;
        $facturadoraContrato->delete();
        $modulo         = Modulo::where('slug','administrador')->get();
        $submodulo      = SubModulo::where('slug','administrador.empresas.facturadoras')->get();
        $accion_kardex  = Accion::where('slug','alta')->get();

        $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                    "id_usuario"    => $request->user()->id,
                                    "id_modulo"     => $modulo[0]->id,
                                    "id_submodulo"  => $submodulo[0]->id,
                                    "id_accion"     => $accion_kardex[0]->id,
                                    "id_objeto"     => $id_facturadora,
                                    "descripcion"   => "Eliminación Empresa Facturadora: " . $nombre_facturadora]);

        return response()->json(['status_alta' => 'successEliminado']);

        }
    }
}

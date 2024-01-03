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
use Illuminate\Support\Facades\Input;


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
    public function create(Request $request)
    {
        $cod = $request->input('cp');
        $query='Select cp.IdCodigoPostal, cp.CodigoPostal, cp.CodigoEstado,    
        cp.CodigoMunicipio, 
        e.FK_nombre_estado as estado, 
        e.IdEstado, 
        m.Descripcion as Municipio, 
        m.IdMunicipio, l.Descripcion as localidad, 
        l.IdLocalidad, 
        col.Colonia, 
        p.IdPais   
        From cfdi_codigopostal as cp
        INNER JOIN estados e on e.Codigo = cp.CodigoEstado 
        left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio
        left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad
        left join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)
        left join master_pais as p on (p.IdPais = e.IdPais) 
        Where (CodigoPostal = -1 or (CodigoPostal <> -1 and cp.CodigoPostal = ?)) 
        ORDER BY CodigoPostal Asc ';


        // Listado de CP
        $lugar_nacimiento = [];
        $estados = DB::table('estados')->get();
        foreach ($estados as $estado) {
            $lugar_nacimiento[$estado->FK_nombre_estado] = $estado->FK_nombre_estado;
        }

        /*========QUERY CP========*/
        $cp=DB::select($query,[$cod]);
        /*========VARIABLES========*/

        $codpost="";
        $State="";
        $IdState="";
        $Municipio="";
        $Colonia="";
        $IdPais="";
        $Localidad="";

        /*========ACCESO OCULTO IDPAIS,IDESTADO ========*/
        foreach ($cp as  $cps) {
            $codpost=$cps->CodigoPostal;
            $State=$cps->estado;
            $IdState=$cps->IdEstado;
            $Municipio=$cps->Municipio;
            $Colonia=$cps->Colonia;
            $Localidad=$cps->localidad;
            $IdPais=$cps->IdPais;


        }
       
       

        //dd($col);

        // Listado de CP
           // $cp=DB::table('codigospostales')->get();
           // $cp_select=[''=>'Seleccione un CP...'];
           /* foreach ($cp as  $cps) {
                $cp_select[$cps->CodigoPostal]=$cps->CodigoPostal;
            }*/
        return view("administrador.departamentos.form-departamentos")
            ->with('cp', $codpost)
            ->with('State', $State)
            ->with('IdState', $IdState)
            ->with('Municipio',$Municipio)
            ->with('Colonia', $Colonia)
            ->with('Localidad', $Localidad)
            ->with('IdPais', $IdPais)
            ->with('lugar_nacimiento',$lugar_nacimiento);
      //   return view("administrador.departamentos.form-departamentos",['cp'=>$cp_select,'lugar_nacimiento']);
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
        $cod=$depCn->cp;
        $query='Select cp.IdCodigoPostal, cp.CodigoPostal, cp.CodigoEstado,    
        cp.CodigoMunicipio, 
        e.FK_nombre_estado as estado, 
        e.IdEstado, 
        m.Descripcion as Municipio, 
        m.IdMunicipio, l.Descripcion as localidad, 
        l.IdLocalidad, 
        col.Colonia, 
        p.IdPais   
        From cfdi_codigopostal as cp
        INNER JOIN estados e on e.Codigo = cp.CodigoEstado 
        left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio
        left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad
        left join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)
        left join master_pais as p on (p.IdPais = e.IdPais) 
        Where (CodigoPostal = -1 or (CodigoPostal <> -1 and cp.CodigoPostal = ?)) 
        ORDER BY CodigoPostal Asc ';

        /*========CP========*/
        $cp=DB::select($query,[$cod]);
        /*========VARIABLES========*/

        $codpost="";
        $State="";
        $IdState="";
        $Municipio="";
        $Colonia="";
        $IdPais="";
        $Localidad="";

        /*========ACCESO OCULTO IDPAIS,IDESTADO ========*/
        foreach ($cp as  $cps) {
            $codpost=$cps->CodigoPostal;
            $State=$cps->estado;
            $IdState=$cps->IdEstado;
            $Municipio=$cps->Municipio;
            $Colonia=$cps->Colonia;
            $Localidad=$cps->localidad;
            $IdPais=$cps->IdPais;


        }
         // Listado de CP
           /* $cp=DB::table('codigospostales')->get();
            $cp_select=[''=>'Seleccione un CP...'];
            foreach ($cp as  $cps) {
                $cp_select[$cps->CodigoPostal]=$cps->CodigoPostal;
            }*/
        if($depCn){
            return view("administrador.departamentos.edit-departamento")
                ->with('depCn',$depCn)
                ->with('cp', $codpost)
                ->with('State', $State)
                ->with('IdState', $IdState)
                ->with('Municipio',$Municipio)
                ->with('Colonia', $Colonia)
                ->with('Localidad', $Localidad)
                ->with('IdPais', $IdPais);
              //return view("administrador.departamentos.edit-departamento",['depCn'=>$depCn,'cp'=>$cp_select]);
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




          //  return response()->json(['status_alta' => 'success']);


            if(Input::get('Guardar')) {
                return redirect('/departamentos')
                    ->with(['success' =>  $updateDepto . ' se actualizó con éxito',
                        'type'    => 'success']);

            } elseif(Input::get('Buscar')) {
                return redirect('/departamentos/'.$id.'/edit')
                    ->with('success',$updateDepto)
                    ->withInput(request()->all());
            }


             // return redirect('/departamentos');
             //   ->with(['status_alta' => 'successDepartamento']);
        }
            

        
          //  return response()->json(['status_alta' => 'wrong']);

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

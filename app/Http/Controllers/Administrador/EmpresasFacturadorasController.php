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
use Illuminate\Support\Facades\Input;
use App\Bussines\MasterConsultas;


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
        $empresaFacturadora=DB::table('master_empresa')->where('TipoEmpresa','=','FACTURADORA')->get();
        return view("administrador.empresas.empresa",["empresa"=>$empresaFacturadora,"TiposEmpresas" => "Facturadoras"]);
    }

    public function indexEmpresaMaquiladora()
    {
        $empresaMaquiladora=DB::table('master_empresa')->where('TipoEmpresa','=','MAQUILADORA')->get();
        return view("administrador.empresas.empresa",["empresa"=>$empresaMaquiladora,"TiposEmpresas" => "Maquiladoras"]);
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $TipoEmpresa = $request->input("TipoEmpresa");
        if($TipoEmpresa != ''){
            if($TipoEmpresa == "FACTURADORA") $TipoEmpresa="EmpresasFacturadoras";
            if($TipoEmpresa == "MAQUILADORA") $TipoEmpresa="EmpresasMaquiladoras";
        }
        $url_referer = explode("/",$_SERVER['HTTP_REFERER']);
        // $cod = $request->input('CP');
        // $query='Select cp.IdCodigoPostal, cp.CodigoPostal, cp.CodigoEstado,    
        // cp.CodigoMunicipio, 
        // e.FK_nombre_estado as estado, 
        // e.IdEstado, 
        // m.Descripcion as Municipio, 
        // m.IdMunicipio, l.Descripcion as localidad, 
        // l.IdLocalidad, 
        // col.Colonia, 
        // p.IdPais   
        // From cfdi_codigopostal as cp
        // INNER JOIN estados e on e.Codigo = cp.CodigoEstado 
        // left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio
        // left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad
        // left join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)
        // left join master_pais as p on (p.IdPais = e.IdPais) 
        // Where (CodigoPostal = -1 or (CodigoPostal <> -1 and cp.CodigoPostal = :CodigoPostal)) 
        // ORDER BY CodigoPostal Asc ';


        // Listado de CP
        $lugar_nacimiento = [];
        $estados = DB::table('estados')->get();
        foreach ($estados as $estado) {
            $lugar_nacimiento[$estado->FK_nombre_estado] = $estado->FK_nombre_estado;
        }
        $actividad_economica = [];
        $actividad = DB::table('actividad_economica')->get();
        foreach ($actividad as $act) {
            $actividad_economica[$act->id] = $act->actividad_economica;
        }

        $departamento = [];
        $depto = DB::table('master_departamento')->get();
        foreach ($depto as $depto) {
            $departamento[$depto->IdDepartamento] = $depto->FK_Nombre;
        }

        $regimenfiscal = [];
        $regfiscal = DB::table('cfdi_tipo_regimen_fiscal')->get();
        foreach ($regfiscal as $regfiscal) {
            $regimenfiscal[$regfiscal->Descripcion] = $regfiscal->Descripcion;
        }

         /*========QUERY CP========*/
        //  $cp=DB::select($query,[$cod]);
          /*========VARIABLES========*/

        //  $codpost="";
        //  $State="";
        //  $IdState="";
        //  $Municipio="";
        //  $Colonia="";
        //  $IdPais="";
        //  $Localidad="";

         
        /*========ACCESO OCULTO IDPAIS,IDESTADO ========*/
        //  foreach ($cp as  $cps) {
        //      $codpost=$cps->CodigoPostal;
        //      $State=$cps->estado;
        //      $IdState=$cps->IdEstado;  
        //      $Municipio=$cps->Municipio; 
        //      $Colonia=$cps->Colonia;
        //      $Localidad=$cps->localidad;
        //      $IdPais=$cps->IdPais;
             

        //  }

        //  $col = explode(";", $Colonia);

        // dd($col);
        
    return view("administrador.empresas.alta-empresa")
    ->with('cp', null)
    ->with('State', null)
    ->with('IdState', null)
    ->with('Municipio',null)
    ->with('Colonia', null)
    ->with('Localidad', null)
    ->with('IdPais', null)
    ->with('lugar_nacimiento',$lugar_nacimiento)
    ->with('actividad_economica',$actividad_economica)
    ->with('departamento',$departamento)
    ->with('regimenfiscal',$regimenfiscal)
    ->with('url_referer',($TipoEmpresa == '')?end($url_referer):$TipoEmpresa);

}

public function searchCP(Request $Request){

    $cod = $Request->cp;
    $query= "Select
      cp.IdCodigoPostal,
      p.IdPais,
      e.IdEstado,
      e.FK_nombre_estado as estado,
      m.IdMunicipio,
      m.Descripcion as Municipio,
      l.IdLocalidad,
      l.Descripcion as localidad,
      col.Colonia
       From    cfdi_codigopostal as cp
      INNER JOIN estados e on e.Codigo = cp.CodigoEstado
      left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio
      left  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad
      left join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)
      left join master_pais as p on (p.IdPais = e.IdPais)
       Where    cp.CodigoPostal = '{$cod}'
       ORDER BY CodigoPostal Asc" ;

    $CodigoPostal=DB::select($query);

    $result='';
    $IdEstado=0;
    foreach ($CodigoPostal as $cp) {
      $IdEstado=$cp->IdEstado;
      $result.= "$cp->IdCodigoPostal|$cp->IdPais|$cp->IdEstado|$cp->estado|$cp->IdMunicipio|$cp->Municipio|$cp->IdLocalidad|$cp->localidad|$cp->Colonia";
    }

   
    return response()->json(['result' => $result]);
  }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $empresaFacturadora=Facturadora::create($request->all());
            // $empresaFacturadora=$request->all();
     
            
              if($empresaFacturadora)
              {
                $IDEmpresa=$empresaFacturadora->IdEmpresa;
                    // $modulo         = Modulo::where('slug','administrador')->get();
                    // $submodulo      = SubModulo::where('slug','administrador.empresas.facturadoras')->get();
                    // $accion_kardex  = Accion::where('slug','alta')->get();
    
                    // $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                    //                             "id_usuario"    => $request->user()->id,
                    //                             "id_modulo"     => $modulo[0]->id,
                    //                             "id_submodulo"  => $submodulo[0]->id,
                    //                             "id_accion"     => $accion_kardex[0]->id,
                    //                             "id_objeto"     => $empresaFacturadora->id,
                    //                             "descripcion"   => "Alta Empresa Facturadora: " . $empresaFacturadora->nombre]);
                    $EmpresaCI = MasterConsultas::exeSQLStatement("sql_carga_inicial", "UPDATE",
                    array(
                        "IdEmpresa" => $IDEmpresa)
                    );
    
                
    
                    clearstatcache();
                    return response()->json(['status_alta' => 'success']);
              }
    
            
                return response()->json(['status_alta' => 'wrong']);
        } catch (\Exception $e) {
            return response()->json(['status_alta' => 'error',
                                    'message' => $e->getMessage()]);
        }

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
    public function edit(Request $request,$id)
    {
        //
        $Facturadora=Facturadora::find($id);
        //$cod=95726;
        //$cod = $request->input('cp');
        $cod=$Facturadora->CP;
        
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
        
        
        $lugar_nacimiento = [];
        $estados = DB::table('estados')->get();
        foreach ($estados as $estado) {
            $lugar_nacimiento[$estado->FK_nombre_estado] = $estado->FK_nombre_estado;
        }
        $actividad_economica = [];
        $actividad = DB::table('actividad_economica')->get();
        foreach ($actividad as $act) {
            $actividad_economica[$act->id] = $act->actividad_economica;
        }
        $departamento = [];
        $depto = DB::table('master_departamento')->get();
        foreach ($depto as $deptos) {
            $departamento[$deptos->IdDepartamento] = $deptos->FK_Nombre;
        }
        $regimenfiscal = [];
        $regfiscal = DB::table('cfdi_tipo_regimen_fiscal')->get();
        foreach ($regfiscal as $regfiscal) {
            $regimenfiscal[$regfiscal->Descripcion] = $regfiscal->Descripcion;
        }
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
       $col = explode(";", $Colonia);

  
       
    //   dd($colon);
    $TipoEmpresa = $Facturadora->TipoEmpresa;
    if($TipoEmpresa != ''){
        if($TipoEmpresa == "FACTURADORA") $TipoEmpresa="EmpresasFacturadoras";
        if($TipoEmpresa == "MAQUILADORA") $TipoEmpresa="EmpresasMaquiladoras";
    }
    $url_referer = explode("/",$_SERVER['HTTP_REFERER']);
        return view("administrador.empresas.edit-empresa")
            ->with('facturadora',$Facturadora)
            ->with('cp', $codpost)
            ->with('State', $State)
            ->with('IdState', $IdState)
            ->with('Municipio',$Municipio)
            ->with('Colonia', $Colonia)
            ->with('Localidad', $Localidad)
            ->with('IdPais', $IdPais)
            ->with('lugar_nacimiento',$lugar_nacimiento)
            ->with('actividad_economica',$actividad_economica)
            ->with('departamento',$departamento)
            ->with('regimenfiscal',$regimenfiscal)
            ->with('url_referer',($TipoEmpresa == '')?end($url_referer):$TipoEmpresa);
        //return view("administrador.empresas.edit-empresa",['facturadora'=>$Facturadora,'cp'=>$cp_select,'lugar_nacimiento'=>$lugar_nacimiento,'actividad_economica'=>$actividad_economica, 'departamento' => $departamento, 'regimenfiscal' => $regimenfiscal]);
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
                "descripcion"   => "Actualización Empresa Facturadora: " . $updateEmpresa->id]);

            //  return response()->json(['status_alta' => 'success']);
            // return redirect('/EmpresasFacturadoras');
            if(Input::get('Guardar')) {
                return redirect((Input::get('TipoEmpresa') == "FACTURADORA")?'/EmpresasFacturadoras':'/EmpresasMaquiladoras')
                    ->with(['success' =>  $updateEmpresa . ' se actualizó con éxito',
                        'type'    => 'success']);

            } elseif(Input::get('Buscar')) {
                return redirect('/EmpresasFacturadoras/'.$id.'/edit')
                    ->with('success',$updateEmpresa)
                    ->withInput(request()->all());
            }

        }



        //  return response()->json(['status_alta' => 'wrong']);
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
        $nombre_facturadora  = $facturadoraContrato->FK_Titulo;
        $id_facturadora      = $facturadoraContrato->IdEmpresa;
        DB::table('nom_tiponomina')->where('IdEmpresa', '=', $id)->delete();
        DB::table('nom_concepto')->where('IdEmpresa', '=', $id)->delete();
        DB::table('rptn_reporte')->where('IdEmpresa', '=', $id)->delete();
        DB::table('master_empresa')->where('IdEmpresa', '=', $id)->delete();
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


    public function EditEmpres(){
        
    }



}

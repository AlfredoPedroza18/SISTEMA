<?php

namespace App\Http\Controllers\Utilerias;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utilerias\PlantillasContratos;

use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;


use DB;

class PlantillasContratosController extends Controller
{
   /*  public function __construct()
    {
        $this->middleware('auth');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('utilerias.plantillas-contratos.contratos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('utilerias.plantillas-contratos.alta-contratos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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
     
       # $carta_tipo = CartaTipo::find($id);
        $contrato = PlantillasContratos::find($id);
       
        return view('utilerias.plantillas-contratos.edit-contrato',['contrato' => $contrato]);
        #return view('crm.carta_tipo.edit-carta-tipo',['carta_tipo' => $carta_tipo]);
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

               
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        /*$cartaTipo =  CartaTipo::find($id);

        if($cartaTipo){


            $modulo         = Modulo::where('slug','crm')->get();
            $submodulo      = SubModulo::where('slug','crm.carta.tipo')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $cartaTipo->id,
                                        "descripcion"   => "Eliminación Carta tipo: " . $cartaTipo->titulo]);
            $cartaTipo->delete();

            return response()->json(['status_alta' => 'success']);
        }

        return response()->json(['status_alta' => 'wrong']); */
        $ConTratos =  PlantillasContratos::find($id);
        $ConTratos->delete();
    }


    public function listaPlantillasContratos(Request $request)
    {   
        $plantillas_contratos='';

        $query =    " SELECT plantillas_contratos.id, IFNULL(plantillas_contratos.titulo,'')      AS titulo, ".
                           " IFNULL(plantillas_contratos.descripcion,'') AS descripcion, ".
                           " IFNULL(plantillas_contratos.contenido,'')   AS contenido, ".
                           " IFNULL(users.name,'')             AS usuario ".
                    " FROM plantillas_contratos ".
                    " LEFT JOIN users ON plantillas_contratos.id_usuario = users.id ".
                    "WHERE plantillas_contratos.status=1";
        $plantillas_contratos = DB::select($query);

        
        #return response()->json($cartas tipo);
        return response()->json($plantillas_contratos);
    }

    public function getPlantllasContrato(Request $request){
        $plantilla_contratos='';

        $query =    " SELECT plantillas_contratos.id, IFNULL(plantillas_contratos.titulo,'')      AS titulo, ".
                           " IFNULL(plantillas_contratos.descripcion,'') AS descripcion, ".
                           " IFNULL(plantillas_contratos.contenido,'')   AS contenido, ".
                           " IFNULL(users.name,'')             AS usuario ".
                    " FROM plantillas_contratos ".
                    " LEFT JOIN users ON plantillas_contratos.id_usuario = users.id ".
                    " WHERE plantillas_contratos.id =  ? ";
        $plantilla_contratos = DB::select($query,[$request->id_carta_tipo]);

        return response()->json($plantilla_contratos);
    }

    public  function GuardarContrato(Request $request){
         $contratos = PlantillasContratos::create($request->all());
        
        if($contratos){
            $modulo         = Modulo::where('slug','utilerias')->get();
            $submodulo      = SubModulo::where('slug','plantillas.contratos')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $contratos->id,
                                        "descripcion"   => "Alta de plantilla de contrato: " . $contratos->titulo]);
            return response()->json(['status_alta' =>'success']);
        }

        return response()->json(['status_alta' =>'wrong']);
        
    }
    public function UpdateContratos(Request $request){
   

        $contratos = PlantillasContratos::find($request->id);
        $id_original = $contratos->id_usuario;
        $fecha_original = $contratos->fecha_alta;

        $contratos->update($request->all());
        $contratos->id_usuario = $id_original;
        $contratos->fecha_alta = $fecha_original;
        $contratos->save();

        if($contratos){
            $modulo         = Modulo::where('slug','utilerias')->get();
            $submodulo      = SubModulo::where('slug','plantillas.contratos')->get();
            $accion_kardex  = Accion::where('slug','modificacion')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $contratos->id,
                                        "descripcion"   => "Modificación de la plantilla de contrato: " . $contratos->titulo]);
            return response()->json(['status_alta' =>'success']);
        }

        return response()->json(['status_alta' =>'wrong']);
        
         return response()->json(['status_alta' => 'success']);
    }
     public function BajaPlantillasContratos(Request $request){
   

        $contratos = PlantillasContratos::find($request->id);
        
        $contratos->status = 2;
        $contratos->save();
          if($contratos){
            $modulo         = Modulo::where('slug','utilerias')->get();
            $submodulo      = SubModulo::where('slug','plantillas.contratos')->get();
            $accion_kardex  = Accion::where('slug','baja')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $contratos->id,
                                        "descripcion"   => "Baja de la plantilla de contrato: " . $contratos->titulo]);
            return response()->json(['status_alta' =>'success']);
        }

        return response()->json(['status_alta' =>'wrong']);
        
    }
}

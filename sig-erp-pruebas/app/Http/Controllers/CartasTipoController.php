<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CartaTipo;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;

use DB;

class CartasTipoController extends Controller
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


        return view('crm.carta_tipo.cartas-tipo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crm.carta_tipo.alta-carta-tipo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carta_tipo = CartaTipo::create($request->all());

        if($carta_tipo){
            $modulo         = Modulo::where('slug','crm')->get();
            $submodulo      = SubModulo::where('slug','crm.carta.tipo')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $carta_tipo->id,
                                        "descripcion"   => "Alta Carta tipo: " . $carta_tipo->titulo]);
            return response()->json(['status_alta' =>'success']);
        }

        return response()->json(['status_alta' =>'wrong']);
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

        $carta_tipo = CartaTipo::find($id);
        return view('crm.carta_tipo.edit-carta-tipo',['carta_tipo' => $carta_tipo]);
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
        $carta_tipo = CartaTipo::find($id);
        $id_original = $carta_tipo->id_usuario;
        $fecha_original = $carta_tipo->fecha_alta;

        $carta_tipo->update($request->all());
        $carta_tipo->id_usuario = $id_original;
        $carta_tipo->fecha_alta = $fecha_original;
        $carta_tipo->save();    
        
        if($carta_tipo){

            $modulo         = Modulo::where('slug','crm')->get();
            $submodulo      = SubModulo::where('slug','crm.carta.tipo')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $carta_tipo->id,
                                        "descripcion"   => "Actulización Carta tipo: " . $carta_tipo->titulo]);
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
        $cartaTipo =  CartaTipo::find($id);

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

        return response()->json(['status_alta' => 'wrong']);
    }


    public function listaCartasTipo(Request $request)
    {   
        $cartas_tipo='';

        $query =    " SELECT cartas_tipo.id, IFNULL(cartas_tipo.titulo,'')      AS titulo, ".
                           " IFNULL(cartas_tipo.descripcion,'') AS descripcion, ".
                           " IFNULL(cartas_tipo.contenido,'')   AS contenido, ".
                           " IFNULL(users.name,'')             AS usuario ".
                    " FROM cartas_tipo ".
                    " LEFT JOIN users ON cartas_tipo.id_usuario = users.id";
        $cartas_tipo = DB::select($query);
        
        return response()->json($cartas_tipo);

    }

    public function getCartaTipo(Request $request){
        $cartas_tipo='';

        $query =    " SELECT cartas_tipo.id, IFNULL(cartas_tipo.titulo,'')      AS titulo, ".
                           " IFNULL(cartas_tipo.descripcion,'') AS descripcion, ".
                           " IFNULL(cartas_tipo.contenido,'')   AS contenido, ".
                           " IFNULL(users.name,'')             AS usuario ".
                    " FROM cartas_tipo ".
                    " LEFT JOIN users ON cartas_tipo.id_usuario = users.id ".
                    " WHERE cartas_tipo.id =  ? ";
        $cartas_tipo = DB::select($query,[$request->id_carta_tipo]);

        return response()->json($cartas_tipo);
    }
}

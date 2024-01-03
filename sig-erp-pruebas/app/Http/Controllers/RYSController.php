<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\RYS;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;

use DB;

class RYSController extends Controller
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
        $listaServiciosRys = RYS::all();
        return view('administrador.servicios.rys.index',['lista_rys' => $listaServiciosRys]);
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

        $this->validate($request,[  'inicio'    => 'required',
                                    'fin'       => 'required',
                                    'porcentaje_servicio' => 'required',
                                    ]);
        
        if(RYS::isAvailable($request->inicio)){
            

            $rys = RYS::create( $request->all() );

            if( $rys ){

                return redirect()
                      ->route('sig-erp-crm::modulo.administrador.servicios.rys.index')
                      ->with(['success' => ' el registro se inserto con éxito',
                              'type'    => 'success']);
            }
            
        }


        return redirect()
                      ->route('sig-erp-crm::modulo.administrador.servicios.rys.index')
                      ->with(['success' => ' el rango ' . $request->inicio . ' a '. $request->fin .' NO esta disponible',
                              'type'    => 'warning']);

        

        

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
    public function getServicioRys(Request $request)
    {

        $rys = RYS::find( $request->id );    

        if($rys)
        {
            return response()->json(["data" => $rys],200);    
        }

        return response()->json([],404);
        
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
        $rys = RYS::find( $id );

        if( $rys ){
            $rys->update( $request->all() );

            $descripcion = 'Modificación de rango Reclutamiento y Selección inicio: ' . $rys->inicio . ' fin ' . $rys->fin . ' porcentaje servicio ' .$rys->porcentaje_servicio;
            $usuario     = $request->user();
            $this->kardex( 'cotizadores', 'cotizadores.rys', 'alta', $descripcion, $usuario, $rys );

            return redirect()
                  ->route('sig-erp-crm::modulo.administrador.servicios.rys.index')
                  ->with(['success' => ' el registro se actualizó con éxito',
                          'type'    => 'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       

        return redirect()
                  ->route('sig-erp-crm::modulo.administrador.servicios.rys.index')
                  ->with(['success' => $id . ' se elimino con éxito',
                          'type'    => 'success']);
    }


    public function generaCosto(Request $request){

        $cantidad = $request->numero_vacantes_rys;
        $query    = 'SELECT * FROM crm_tc_cotizador_rys where ? between inicio and fin';
        $result   = DB::select($query,[$cantidad]); 

        return response()->json(['porcentaje' => $result[0]->porcentaje_servicio]);
    }


    private function kardex( $modulo = 'cotizadores', $submodulo = 'cotizadores.ese', $accionKardex = 'alta', $descripcion, $usuario, $objeto )
    {       

        $modulo         = Modulo::where('slug',$modulo)->get();
        $submodulo      = SubModulo::where('slug', $submodulo)->get();
        $accion_kardex  = Accion::where('slug',$accionKardex )->get();

        $kardex = Kardex::create([  "id_cn"         => $usuario->idcn,
                                    "id_usuario"    => $usuario->id,
                                    "id_modulo"     => $modulo[0]->id,
                                    "id_submodulo"  => $submodulo[0]->id,
                                    "id_accion"     => $accion_kardex[0]->id,
                                    "id_objeto"     => $objeto->id,
                                    "descripcion"   => $descripcion ]);
    }
}

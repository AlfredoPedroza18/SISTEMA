<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ese;
use App\EseUrgente;
use App\Prioridad;
use App\TipoServicio;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;

use DB;

class EseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista_ese = DB::select('SELECT     
                                    crm_tc_cotizador_ese_costos.id,
                                    prioridades.nombre AS tipo,    
                                    crm_tc_cotizador_ese_costos.tipo_estudio,
                                    prioridad_tipo_servicio.precio AS costo,
                                    prioridad_tipo_servicio.fecha
                                FROM prioridades 
                                INNER JOIN prioridad_tipo_servicio ON prioridad_tipo_servicio.id_prioridad = prioridades.id
                                INNER JOIN crm_tc_cotizador_ese_costos ON crm_tc_cotizador_ese_costos.id = prioridad_tipo_servicio.id_tipo_servicio
                                ORDER BY prioridades.nombre');

        $prioridades = $this->getPrioridades();
        $estudios    = $this->getTiposEstudio();



        
        return view('administrador.servicios.ese.index',['lista_ese' => $lista_ese,'prioridades' => $prioridades,'estudios' => $estudios ]);
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

        $resultado = DB::table('prioridad_tipo_servicio')->insert([
                        [ 'id_prioridad'     => $request->prioridad,
                          'id_tipo_servicio' => $request->id_servicio_ese,
                          'precio'           => $request->costo
                        ]
                        
                    ]);


        if( $resultado ){

            $prioridad   = Prioridad::find( $request->prioridad );
            $tipoEstudio = TipoServicio::find( $request->id_servicio_ese ); 

            $descripcion = 'Alta paquete ' . $prioridad->nombre . ' - ' . $tipoEstudio->tipo_estudio . ' costo ' . $request->costo;
            $usuario     = $request->user();
            $this->kardex( 'cotizadores', 'cotizadores.ese', 'alta', $descripcion, $usuario, $prioridad );

            return redirect()
                      ->route('sig-erp-crm::modulo.administrador.servicios.ese.index')
                      ->with(['success' => ' el registro se inserto con éxito',
                              'label'   => 'Servicio ESE: ',
                              'type'    => 'success']);
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

    public function getListadoTiposEstudio()
    {
        $tipos_estudio = $this->getTiposEstudio();
        $prioridades   = $this->getPrioridades();


        return response()->json(['data' => ['tipos_estudio' => $tipos_estudio, 'prioridades' => $prioridades]],200);
    }

    private function getPrioridades()
    {
        $query = 'SELECT * FROM prioridades ORDER BY nombre ASC';

        $listaPrioridades = DB::select( $query );

        return $listaPrioridades;
    }

    private function getTiposEstudio()
    {
        $query = 'SELECT * FROM crm_tc_cotizador_ese_costos';

        $listaTiposEstudios = DB::select( $query );

        return $listaTiposEstudios;

    }

    public function getPrioridad(Request $request)
    {
        $id        = $request->id_prioridad;
        $prioridad = Prioridad::find( $id );

        if( $prioridad ){
            return response()->json(['data' => ['status' => 'success', 'prioridad' => $prioridad]],200);
        }

        return response()->json(['data' => ['status' => 'wrong', 'prioridad' => null]],404);
    }

    public function savePrioridad(Request $request)
    { 
        $prioridad = Prioridad::create( $request->all() );

        if( $prioridad )
        {

            $descripcion = 'Alta prioridad ' . $prioridad->nombre;
            $usuario     = $request->user();
            $this->kardex( 'cotizadores', 'cotizadores.ese', 'alta', $descripcion, $usuario, $prioridad );
            return redirect()
                      ->route('sig-erp-crm::modulo.administrador.servicios.ese.index')
                      ->with(['success' => ' se inserto con éxito',
                              'label'   => 'Prioridad ' . $prioridad->nombre .':',
                              'type'    => 'success']);
        }

        return redirect()
                      ->route('sig-erp-crm::modulo.administrador.servicios.ese.index')
                      ->with(['success' => ' el registro NO se inserto con éxito',
                              'label'   => 'UPSS !',
                              'type'    => 'danger']);
    }

    public function saveTipoServicio(Request $request)
    {
        

        $tipoServicio = TipoServicio::create( $request->all() );

        if( $tipoServicio )
        {

            $tipoServicio->id_servicio_ese = $tipoServicio->id;
            $tipoServicio->save();

            $descripcion = 'Alta tipo servicio ' . $tipoServicio->tipo_estudio;
            $usuario     = $request->user();
            $this->kardex( 'cotizadores', 'cotizadores.ese', 'alta', $descripcion, $usuario, $tipoServicio );

            return redirect()
                      ->route('sig-erp-crm::modulo.administrador.servicios.ese.index')
                      ->with(['success' => ' se inserto con éxito',
                              'label'   => 'Tipo Servicio ' . $tipoServicio->tipo_estudio .':',
                              'type'    => 'success']);
        }

        return redirect()
                      ->route('sig-erp-crm::modulo.administrador.servicios.ese.index')
                      ->with(['success' => ' el registro NO se inserto con éxito',
                              'label'   => 'UPSS !',
                              'type'    => 'danger']);
    }

    public function editPrioridad(Request $request)
    {
        $prioridad      = Prioridad::find( $request->id_prioridad_edit );
        $nameOld        = $prioridad->nombre;
        $descripcionOld = $prioridad->descripcion;
        if( $prioridad ){
            $prioridad->update($request->all()); 

            $descripcion = 'Modificación de la prioridad ' . $nameOld . ' descripcion: ' . $descripcionOld. ' a ' . $prioridad->nombre . ' descripcion: ' .$prioridad->descripcion;
            $usuario     = $request->user();
            $this->kardex( 'cotizadores', 'cotizadores.ese', 'modificacion', $descripcion, $usuario, $prioridad );

            return redirect()
                      ->route('sig-erp-crm::modulo.administrador.servicios.ese.index')
                      ->with(['success' => ' se actualizo con éxito',
                              'label'   => 'Prioridad ' . $prioridad->nombre .':',
                              'type'    => 'success']);
        }

        return redirect()
                      ->route('sig-erp-crm::modulo.administrador.servicios.ese.index')
                      ->with(['success' => ' no se encontro el registro',
                              'label'   => 'UPSS !',
                              'type'    => 'danger']);

    }

    public function getTipoEstudio(Request $request)
    {
        $tipoServicio = TipoServicio::find( $request->id_tipo_estudio);

        if( $tipoServicio ){
            return response()->json(['data' => ['status' => 'success', 'tipo_servicio' => $tipoServicio]],200);
        }

        return response()->json(['data' => ['status' => 'wrong', 'tipo_servicio' => null]],404);
        
       

    }

    public function editTipoEstudio(Request $request)
    {        

        $tipoServicio = TipoServicio::find( $request->id_tipo_servicio_edit);
        $nameOld      = $tipoServicio->tipo_estudio;

        if( $tipoServicio ){
            $tipoServicio->update( $request->all() );
            
            $descripcion = 'Modificación del tipo de estudio ' . $nameOld . ' a ' . $tipoServicio->tipo_estudio;
            $usuario     = $request->user();
            $this->kardex( 'cotizadores', 'cotizadores.ese', 'modificacion', $descripcion, $usuario, $tipoServicio );

            return redirect()
                      ->route('sig-erp-crm::modulo.administrador.servicios.ese.index')
                      ->with(['success' => ' se actualizo con éxito',
                              'label'   => 'Tipo Servicio ' . $tipoServicio->tipo_estudio .':',
                              'type'    => 'success']);
        }

        return redirect()
                      ->route('sig-erp-crm::modulo.administrador.servicios.ese.index')
                      ->with(['success' => ' no se encontro el registro',
                              'label'   => 'UPSS !',
                              'type'    => 'danger']);
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

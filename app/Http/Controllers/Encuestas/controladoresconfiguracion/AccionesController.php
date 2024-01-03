<?php

namespace App\Http\Controllers\Encuestas\controladoresConfiguracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bussines\MasterConsultas;
use App\Http\Controllers\Controller;
use App\ESE\EstudioEse;
use Carbon\Carbon;
use App\User;
use App\CentroNegocio;
use Illuminate\Support\Collection;
use App\MasterClientes;
use App\Bussines\Dashboard;
use DB;

class AccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data = null;
        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        } 
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $sql = MasterConsultas::exeSQL("ev_acciones", "READONLY",
        array(
            "IdAccion" => '-1'
        )
        );
        return view("Encuestas.configuracion.configuracionsecciones.acciones.index",$data,["listaAcciones"=>$sql]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAC(Request $request){
        $data = null;
        $activo = 'Si';

        if( $request->user()->isAdmin() ){
            $data = $this->initFieldsAdmin();
        } else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $ev_dimension =DB::select('SELECT * FROM ev_dimension');
        $ev_encuesta =DB::select('SELECT *, ev.Descripcion AS DescripcionEncuesta FROM ev_encuesta ev WHERE Activo = "'.$activo.'"');
        $clientes = DB::select('SELECT Id AS Id,nombre_comercial AS Nombre FROM clientes');


        return view("Encuestas.configuracion.configuracionsecciones.acciones.create.create",$data,[
            "listaDimension"=>$ev_dimension,
            "listaEncuesta"=>$ev_encuesta,
            "clientes"=>$clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $IdCliente=$request->input('cntC');
        $IdDimension=$request->input('dimension');
        $IdEncuesta=$request->input('encuesta');
        $Descripcion=$request->input('descripcion');
        $Predeterminado=$request->input('default');

        //$buscarregistro=DB::select('SELECT * FROM ev_acciones WHERE IdDimension = '.$IdDimension.' AND IdCliente = '.$IdCliente.' AND IdEncuestaCliente = '.$IdEncuesta.' AND Descripcion="'.$Descripcion.'"');
        $buscarregistro=DB::select('SELECT * FROM ev_acciones WHERE IdDimension = '.$IdDimension.' AND IdCliente = '.$IdCliente.' AND IdEncuestaCliente = '.$IdEncuesta);
        
        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('/encuestas/configuracion/acciones')->with(['success' => ' La acción '.$request->input('descripcion').' ya existe para el cliente con las caracteristicas previamente elegidas',
            'type'    => 'danger']);
        }else{
            $AltaTiposServicio=MasterConsultas::exeSQLStatement("create_ev_acciones", "UPDATE",
                    array(
                        "IdCliente" => $IdCliente,
                        "IdDimension" => $IdDimension,
                        "IdEncuestaCliente" => $IdEncuesta,
                        "Descripcion" => $Descripcion,
                        "Predeterminado" => $Predeterminado
                    )
                );
            return redirect('/encuestas/configuracion/acciones')->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
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
        $editarAcciones=DB::select('select * from ev_acciones where IdAccion='.$id);
        
        foreach ($editarAcciones as  $acciones) {
            $IdAccion=$acciones->IdAccion;
            $IdDimension=$acciones->IdDimension;
            $IdCliente=$acciones->IdCliente;
            $IdEncuestaCliente=$acciones->IdEncuestaCliente;
            $Descripcion=$acciones->Descripcion;
            $Predeterminado = $acciones->Predeterminado;
        }

        $nombredelCLI=DB::select('SELECT nombre_comercial AS Empresa FROM clientes WHERE Id='.$IdCliente);

        foreach($nombredelCLI as $ncli){
            $Cliente=$ncli->Empresa;
        }

        $queryDimension = DB::select("SELECT *, Descripcion AS DescripcionDimension FROM ev_dimension");
        $sqlVerDimension =DB::select('SELECT *, Descripcion AS DescripcionDimensionOriginal FROM ev_dimension WHERE IdDimension = '.$IdDimension);
        foreach($sqlVerDimension as $ncli){
            $DescripcionDimensionOriginal=$ncli->DescripcionDimensionOriginal;
        }

        $queryEncuesta = DB::select("SELECT *, Descripcion AS DescripcionEncuesta FROM ev_encuesta");
        $sqlEncuesta =DB::select('SELECT *, Descripcion AS DescripcionEncuestaOriginal FROM ev_encuesta WHERE IdEncuesta = '.$IdEncuestaCliente);
        foreach($sqlEncuesta as $ncli){
            $DescripcionEncuestaOriginal=$ncli->DescripcionEncuestaOriginal;
        }


        return view("Encuestas.configuracion.configuracionsecciones.acciones.edit.edit",
        [
            "queryDimension"=>$queryDimension,
            "sqlVerDimension"=>$sqlVerDimension,

            "queryEncuesta"=>$queryEncuesta,
            "sqlEncuesta"=>$sqlEncuesta
        ]
        )
        ->with('IdAccion', $IdAccion)
        ->with('IdDimension', $IdDimension)
        ->with('IdCliente', $IdCliente)
        ->with('IdEncuestaCliente', $IdEncuestaCliente)
        ->with('Descripcion', $Descripcion)
        ->with('DescripcionDimensionOriginal', $DescripcionDimensionOriginal)
        ->with('DescripcionEncuestaOriginal', $DescripcionEncuestaOriginal)
        ->with('Predeterminado', $Predeterminado)
        ->with('Cliente', $Cliente);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $IdCliente=$request->input('cliente');
        $IdDimension=$request->input('dimension');
        $IdEncuesta=$request->input('encuesta');
        $Descripcion=$request->input('descripcion');
        $Predeterminado=$request->input('default');
       
        //$buscarregistro=DB::select('select * from ev_departamentos where IdCliente='.$IdCliente.' AND Descripcion="'.$Descripcion.'"');
        $buscarregistro=DB::select('SELECT * FROM ev_acciones WHERE IdAccion <>'.$id.' AND IdDimension = '.$IdDimension.' AND IdCliente = '.$IdCliente.' AND IdEncuestaCliente = '.$IdEncuesta.' AND Descripcion ="'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return redirect('/encuestas/configuracion/acciones')
            ->with(['success' => ' Error al actualizar, el departamento '.$request->input('descripcion').' ya existe para el cliente',
            'type'    => 'danger']);
        }else{

        $sqlActualizar = DB::table('ev_acciones')->where('IdAccion',$id)->update(
            array(
            'IdEncuestaCliente'=>$request->$IdEncuesta,
            'IdDimension'=>$request->$IdDimension,
            'Descripcion'=>$request->$Descripcion,
            'Predeterminado'=>$request->$Predeterminado
        ));

        $actualizarDepartamento = DB::table('ev_acciones')->where('IdAccion',$id)->update(
            array(
            'IdDimension'=>$request->input('dimension'),
            'IdEncuestaCliente'=>$request->input('encuesta'),
            'Descripcion'=>$request->input('descripcion'),
            'Predeterminado'=>$request->input('default')
        ));


        return redirect('/encuestas/configuracion/acciones')
        ->with(['success' => ' El registro '.$request->input('Descripcion').' se actualizó con éxito',
        'type'    => 'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $resultadoError = null;
        
        try {
            DB::delete("delete from ev_acciones WHERE IdAccion = $id");
        }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
        }finally{
            if($resultadoError=='Si'){
                return redirect('/encuestas/configuracion/acciones')
                ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                'type'    => 'danger']);
            }else{
                return redirect('/encuestas/configuracion/acciones')
                ->with(['success' => ' El registro se eliminó con éxito',
                'type'    => 'success']);
            }
        }
    }

    private function initFieldsAdmin()
    {
        $inicio_mes         = Carbon::now()->startOfMonth()->format('Y-m-d');
        $fin_mes            = Carbon::now()->endOfMonth()->format('Y-m-d');
        $estudios           = EstudioEse::whereBetween('fecha_cierre',[$inicio_mes . ' 00:01:01',$fin_mes .' 23:59:59'])->get();
        $estudios_proceso   = EstudioEse::whereBetween('fecha_actualizacion',[$inicio_mes . ' 00:01:01',$fin_mes .' 23:59:59'])->get();
        $estudios_solicitud = EstudioEse::whereBetween('fecha_ingreso',[$inicio_mes . ' 00:01:01',$fin_mes .' 23:59:59'])->get();

        $estudios_cerrados    = $estudios->where('id_status',EstudioEse::CERRADA);
        $estudios_procesando  = $estudios_proceso->where('id_status',EstudioEse::PROCESO);
        $estudios_facturar    = $estudios_cerrados;
        $estudios_solicitados = $estudios_solicitud->where('id_status',EstudioEse::SIN_INICIAR);
        $estudios_urgentes    = [];
        $estudios_normales    = [];

        foreach( $estudios_proceso as $estudio ) { 
                if( $estudio->prioridad_estudio->isUrgente() ) $estudios_urgentes[] = $estudio;
                if($estudio->prioridad_estudio->isNormal() )  $estudios_normales[]  = $estudio;
        }        

        return ['estudios_cerrados'    => $estudios_cerrados,
                'estudios_facturar'    => $estudios_facturar,
                'estudios_proceso'     => $estudios_procesando,
                'estudios_mes'         => $estudios,
                'estudios_solicitados' => $estudios_solicitados,
                'estudios_normales'    => $estudios_normales,
                'estudios_urgentes'    => $estudios_urgentes, ];
    }
}

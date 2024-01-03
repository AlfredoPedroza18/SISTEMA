<?php

namespace App\Http\Controllers\Encuestas;

use app\Bussines\Dashboard;
use App\Bussines\MasterConsultas;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

use App\ESE\EstudioEse;
use App\User;
use App\CentroNegocio;
use App\MasterClientes;
use App\CentrosTrabajo;
use App\Departamentos;
use DB;
use Crypt;

class EditarSolicitudController extends Controller
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
        $listaEncuestas = MasterConsultas::exeSQL("ev_lista_encuestas", "READONLY",
            array(
                "IdServicio" => '-1'
            )
        );

        // $revisiones = DB::select("select a.Descripcion, b.IdCliente, c.nombre_comercial from ev_encuesta as a inner join ev_acciones as b inner join clientes as c on b.IdCliente = c.id where -1;");

        if ($request->user()->isAdmin()) {
            $data = $this->initFieldsAdmin();
        } else {
            $data = $this->initFieldsUser($request->user());
        }

        return view("Encuestas.encuestas.index", ["listaEncuestas" => $listaEncuestas]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $centroTrabajo = MasterConsultas::exeSQL("ev_obtener_departamentos", "READONLY",
            array(
                "IdServicio" => $id
            )
        );

        $ev_servicio = DB::SELECT('SELECT * FROM ev_servicio WHERE IdServicio = ' . $id);
        $departamentos = DB::SELECT('SELECT * FROM ev_departamentos WHERE IdCliente = ' . $ev_servicio[0]->IdCliente);

        $ev_puestos = DB::SELECT('SELECT * FROM ev_puestos WHERE IdCliente =' . $ev_servicio[0]->IdCliente);

        $cliente = DB::select("SELECT c.id ,c.nombre_comercial FROM clientes c WHERE c.id =".$ev_servicio[0]->IdCliente.";");
        $periodo = DB::select("SELECT evp.IdPeriodo, evp.Fecha FROM ev_periodos evp WHERE evp.IdPeriodo = ".$ev_servicio[0]->IdPeriodo.";");

        return view("Encuestas.encuestas.edit",
            [
                "centroTrabajo" => $centroTrabajo,
                "departamentos" => $departamentos,
                "ev_puestos" => $ev_puestos,
                "id"=>$id,
                "idcliente"=>$ev_servicio[0]->IdCliente,
                "cliente"=>$cliente,
                "periodo"=>$periodo
            ]);
    }

    public function eliminarCentroTrabajo($id)
    {
        $resultadoError = null;
        try {
            DB::delete("delete from ev_centros_trabajo WHERE IdCentro = $id");
        } catch (\Exception $e) {
            if ($e->getMessage()) {
                $resultadoError = 'Si';
                $conocerError = $e->getMessage();
            }
        } finally {
            if ($resultadoError == 'Si') {
                return redirect()->back()->with(['success' => 'Ocurrió un error al eliminar el registro, contacte al equipo de soporte',
                    'type' => 'danger']);;
            } else {
                return redirect()->back()->with(['success' => 'Centro de trabajo eliminado con éxito',
                    'type' => 'success']);;
            }
        }
    }

    public function eliminarDepartamentos($id)
    {
        $resultadoError = null;
        try {
            DB::delete("delete from ev_departamentos WHERE IdDeptoCliente = $id");
        } catch (\Exception $e) {
            if ($e->getMessage()) {
                $resultadoError = 'Si';
                $conocerError = $e->getMessage();
            }
        } finally {
            if ($resultadoError == 'Si') {
                return redirect()->back()->with(['success' => 'Ocurrió un error al eliminar el registro, contacte al equipo de soporte',
                    'type' => 'danger']);;
            } else {
                return redirect()->back()->with(['success' => 'Departamento eliminado con éxito',
                    'type' => 'success']);;
            }
        }
    }

    public function storeCT(Request $request)
    {
        $IdCliente = $request->input('idcliente');
        $idServicio = $request->input('idservicio');

        $encuestas = DB::select('select * from ev_encuesta where Activo="Si"');

        foreach ($request->addmore as $key) {
            //Consultamos centros de trabajos existentes
            $buscarregistro = DB::select('select * from ev_centros_trabajo where IdCliente=' . $IdCliente . ' AND Descripcion="' . str_replace('"', '', json_encode($key['Descripcion'])) . '"');
            $arrayvacio = empty($buscarregistro);

            if ($arrayvacio == false) {
                return redirect()->back()->with(['success' => 'Este Centro de Trabajo ya existe',
                    'type' => 'danger']);;
            } else {
                $idCentro = DB::table('ev_centros_trabajo')->insertGetId([
                    'IdCliente' => $IdCliente,
                    'Descripcion' => str_replace('"', '', json_encode($key['Descripcion']))
                ]);

                //ev_servicio_cliente
                $idServicioCliente = DB::table('ev_servicio_cliente')->insertGetId([
                    'IdServicio' => $idServicio,
                    'IdCentro' => $idCentro,
                    'CantidadCentro' => json_decode($key['Cantidad'])
                ]);

                $cantidad = json_decode($key['Cantidad']);

                while($cantidad>0){
                    $IdPersonal = DB::table('ev_personal')->insertGetId([
                        'IdCliente' => $IdCliente,
                        'IdCentroTrabajo' => $idCentro
                    ]);

                    
                    $CodigoUnico="COD-P".$IdPersonal;


                    foreach($encuestas as $encuesta){
                        $Link="https://www.sistemagent.com:8000/erp-demo/public/startEncuesta/".$encuesta->IdEncuesta."/".$idServicioCliente."/".$CodigoUnico;

                        $idServicioDetalle = DB::table('ev_servicio_detalle')->insertGetId([
                            'IdServicio_cliente' => $idServicioCliente,
                            'IdEncuesta' => $encuesta->IdEncuesta,
                            'IdPersonal' => $IdPersonal,
                            'CodigoUnico' => $CodigoUnico,
                            'Link' => $Link
                        ]);
                    }

                $cantidad--;
                }
            }
        }
        return redirect()->back()->with(['success' => 'Centro (s) creado (s) con éxito',
            'type' => 'success']);
    }

    public function updateCentroTrabajo(Request $request, $id)
    {
        $IdCliente = $request->input('idcliente');
        $idServicio = $request->input('idservicio');
        $ctDescripcion = $request->input('ctDescripcion');
        $idCT = $request->input('idCT');

        $ctCantidad = $request->input('ctCantidad');

        $cantidActual = DB::select('select * from ev_servicio_cliente where IdCentro=' . $id);

        foreach($cantidActual as $ca){
            $cantActual=$ca->CantidadCentro;
            $idServicioCliente = $ca->IdServicio_cliente;
        }

        $encuestas = DB::select('select * from ev_encuesta where Activo="Si"');

        $buscarregistro = DB::select('select * from ev_centros_trabajo where IdCliente=' . $IdCliente . ' AND IdCentro<>' . $id . ' AND Descripcion="' . $ctDescripcion . '"');

        $arrayvacio = empty($buscarregistro);

        if ($arrayvacio == false) {
            return redirect()->back()->with(['success' => 'Este centro de trabajo ya existe',
                'type' => 'danger']);;
        } else {
            $actualizarDescripcionCT = DB::table('ev_centros_trabajo')->where('IdCentro', $id)->update(
                array(
                    'Descripcion' => $ctDescripcion
                ));

            $actualizarCantidadCT = DB::table('ev_servicio_cliente')->where('IdCentro', $id)->update(
                array(
                    'CantidadCentro' => $ctCantidad
                ));
            
            if($cantActual<$ctCantidad){
                $cantidad=$ctCantidad-$cantActual;
                while($cantidad>0){
                    $IdPersonal = DB::table('ev_personal')->insertGetId([
                        'IdCliente' => $IdCliente,
                        'IdCentroTrabajo' => $idCT
                    ]);

                    $fechAct=Carbon::now();

                    
                    $CodigoUnico="COD-P".$IdPersonal;


                    foreach($encuestas as $encuesta){
                        $Link="https://www.sistemagent.com:8000/erp-demo/public/startEncuesta/".$encuesta->IdEncuesta."/".$idServicioCliente."/".$CodigoUnico;
                        $idServicioDetalle = DB::table('ev_servicio_detalle')->insertGetId([
                            'IdServicio_cliente' => $idServicioCliente,
                            'IdEncuesta' => $encuesta->IdEncuesta,
                            'IdPersonal' => $IdPersonal,
                            'CodigoUnico' => $CodigoUnico,
                            'Link' => $Link,
                            'Fecha' => $fechAct
                        ]);
                    }

                $cantidad--;
                }
            }

            return redirect()->back()->with(['success' => 'Centro de trabajo actualizado con éxito',
                'type' => 'success']);;
        }
    }

    public function storeDepartamentos(Request $request){
        $IdCliente = $request->input('idcliente');
        $idServicio = $request->input('idservicio');

        
        $buscarregistro = DB::select('select * from ev_departamentos where IdCliente='.$IdCliente);
        $contadep = 0;

        
        foreach ($request->addmoreDepartamentos as $key) {
            foreach($buscarregistro as $row){
                if($row->Descripcion == $key['Descripcion']){
                    $contadep++;
                }
            }
    
            if($contadep < 1){
                $idDepartamento = DB::table('ev_departamentos')->insertGetId([
                    'IdCliente' => $IdCliente,
                    'Descripcion' => str_replace('"','',json_encode($key['Descripcion']))
                ]);
            }
        }

        return redirect()->back()->with(['success' => 'Departamento (s) creado (s) con éxito', 'type' => 'success']);
    }

    public function storePuestos(Request $request){
        $IdCliente = $request->input('idcliente');
        $idServicio = $request->input('idservicio');

        $buscarregistro = DB::select('select * from ev_puestos where IdCliente='.$IdCliente);
        $contapue = 0;

        foreach ($request->addmorePuestos as $key) {
            foreach($buscarregistro as $row){
                if($row->Descripcion == $key['Descripcion']){
                    $contapue++;
                }
            }
            if($contapue < 1){
                DB::table('ev_puestos')->insert([
                    'IdCliente' => $IdCliente,
                    'Descripcion' => str_replace('"','',json_encode($key['Descripcion'],JSON_UNESCAPED_UNICODE))
                ]);
            }
        }

        return redirect()->back()->with(['success' => 'Puesto (s) creado (s) con éxito', 'type' => 'success']);
    }

    public function updateDepartamento(Request $request, $id)
    {
        $IdCliente = $request->input('idcliente');
        $idServicio = $request->input('idservicio');
        $deptoDescripcion = $request->input('deptoDescripcion');
        $idDepto = $request->input('idDepto');

        $ctCantidad = $request->input('ctCantidad');

        $buscarregistro = DB::select('select * from ev_departamentos where IdCliente=' . $IdCliente . ' AND idDeptoCliente<>' . $id . ' AND Descripcion="' . $deptoDescripcion . '"');

        $arrayvacio = empty($buscarregistro);

        if ($arrayvacio == false) {
            return redirect()->back()->with(['success' => 'Este departamaento ya existe',
                'type' => 'danger']);;
        } else {
            $actualizarDescripcionCT = DB::table('ev_departamentos')->where('IdDeptoCliente', $id)->update(
                array(
                    'Descripcion' => $deptoDescripcion
                ));
            return redirect()->back()->with(['success' => 'Departamento con éxito',
                'type' => 'success']);;
        }
    }

    public function eliminarPuestos($id)
    {
        $resultadoError = null;

        try {
            DB::delete("delete from ev_puestos WHERE IdPuestoCliente = $id");
        } catch (\Exception $e) {
            if ($e->getMessage()) {
                $resultadoError = 'Si';
                $conocerError = $e->getMessage();
            }
        } finally {
            if ($resultadoError == 'Si') {
                return redirect()->back()->with(['success' => 'Ocurrió un error al eliminar el registro, contacte al equipo de soporte',
                    'type' => 'danger']);;
            } else {
                return redirect()->back()->with(['success' => 'Puesto eliminado con éxito',
                    'type' => 'success']);;
            }
        }
    }

    public function updatePuesto(Request $request, $id)
    {
        $IdCliente = $request->input('idcliente');
        $idPuesto = $request->input('idPuesto');
        $puestoDescripcion = $request->input('puestoDescripcion');
        $idDepto = $request->input('idDepto');

        $ctCantidad = $request->input('ctCantidad');

        $buscarregistro = DB::select('select * from ev_puestos where IdCliente=' . $IdCliente . ' AND IdPuestoCliente<>' . $id . ' AND Descripcion="' . $puestoDescripcion . '"');

        $arrayvacio = empty($buscarregistro);

        if ($arrayvacio == false) {
            return redirect()->back()->with(['success' => 'Este Puesto ya existe',
                'type' => 'danger']);;
        } else {
            $actualizarDescripcionCT = DB::table('ev_puestos')->where('IdPuestoCliente', $id)->update(
                array(
                    'Descripcion' => $puestoDescripcion
                ));
            return redirect()->back()->with(['success' => 'Puesto con éxito',
                'type' => 'success']);;
        }
    }


    private function initFieldsAdmin()
    {
        $inicio_mes = Carbon::now()->startOfMonth()->format('Y-m-d');
        $fin_mes = Carbon::now()->endOfMonth()->format('Y-m-d');
        $estudios = EstudioEse::whereBetween('fecha_cierre', [$inicio_mes . ' 00:01:01', $fin_mes . ' 23:59:59'])->get();
        $estudios_proceso = EstudioEse::whereBetween('fecha_actualizacion', [$inicio_mes . ' 00:01:01', $fin_mes . ' 23:59:59'])->get();
        $estudios_solicitud = EstudioEse::whereBetween('fecha_ingreso', [$inicio_mes . ' 00:01:01', $fin_mes . ' 23:59:59'])->get();

        $estudios_cerrados = $estudios->where('id_status', EstudioEse::CERRADA);
        $estudios_procesando = $estudios_proceso->where('id_status', EstudioEse::PROCESO);
        $estudios_facturar = $estudios_cerrados;
        $estudios_solicitados = $estudios_solicitud->where('id_status', EstudioEse::SIN_INICIAR);
        $estudios_urgentes = [];
        $estudios_normales = [];

        foreach ($estudios_proceso as $estudio) {
            if ($estudio->prioridad_estudio->isUrgente()) $estudios_urgentes[] = $estudio;
            if ($estudio->prioridad_estudio->isNormal()) $estudios_normales[] = $estudio;
        }

        return ['estudios_cerrados' => $estudios_cerrados,
            'estudios_facturar' => $estudios_facturar,
            'estudios_proceso' => $estudios_procesando,
            'estudios_mes' => $estudios,
            'estudios_solicitados' => $estudios_solicitados,
            'estudios_normales' => $estudios_normales,
            'estudios_urgentes' => $estudios_urgentes,];
    }

    private function initFieldsUser(User $usuario){
        /************************************************************************************************/

        $lista_estudios = $this->getEstudiosUser($usuario);
        $estudios = $this->getEstudiosFilterMonth($lista_estudios);
        $estudios_cerrados = $this->getEstudiosFilterMonthClosed($lista_estudios);
        $estudios_solicitud = $this->getEstudiosFilterMonthRequest($lista_estudios);

        $estudios_procesando = $estudios->where('id_status', EstudioEse::PROCESO);
        $estudios_facturar = $estudios_cerrados;
        $estudios_solicitados = $estudios_solicitud->where('id_status', EstudioEse::SIN_INICIAR);
        $estudios_urgentes = [];
        $estudios_normales = [];


        foreach ($estudios as $estudio) {
            if ($estudio->prioridad_estudio->isUrgente()) $estudios_urgentes[] = $estudio;
            if ($estudio->prioridad_estudio->isNormal()) $estudios_normales[] = $estudio;
        }

        return ['estudios_cerrados' => $estudios_cerrados,
            'estudios_facturar' => $estudios_facturar,
            'estudios_proceso' => $estudios,
            'estudios_mes' => $estudios,
            'estudios_solicitados' => $estudios_solicitados,
            'estudios_normales' => $estudios_normales,
            'estudios_urgentes' => $estudios_urgentes,];
    }
}

<?php

namespace App\Http\Controllers\Encuestas\ControladoresCatalogos;

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
use App\EncuestaClientes;
use App\EncuestaPuestos;
use DB;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Personal_EvaluacionController extends Controller
{
    private $variable_a_la_que_quiero_acceder;

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
        $data = null;
        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        }
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $sql = MasterConsultas::exeSQL("ev_personal", "READONLY",
            array(
                "IdPersonal" => '-1'
            )
        );


        return view("Encuestas.catalogos.formularios.catalogodepersonalevaluacion.index",$data,["lista"=>$sql]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $data = null;
        $Activo='Si';

        if( $request->user()->isAdmin() )
        {
            $data = $this->initFieldsAdmin();
        }
        else{
            $data = $this->initFieldsUser( $request->user() );
        }

        $Clientes = DB::table('clientes')->get();

        $clientes = ['Seleccione un Cliente'];
        foreach ($Clientes as $edo) {
            $clientes[$edo->id] = $edo->nombre_comercial;
            $codE=$edo->id;
        }


        $queryGenero = DB::select("SELECT *, Descripcion AS DescripcionGenero FROM master_genero"); 
        $queryEstadoCivil = DB::select("SELECT *, Descripcion AS DescripcionEstadoCivil FROM master_estadocivil");
        $queryNivelEstudio = DB::select("SELECT *, Descripcion AS DescripcionNivelEstudios FROM master_nivel_estudios"); 
        $queryTipoPuesto = DB::select("SELECT *, Descripcion AS DescripcionTipoPuesto FROM ev_tipo_puesto");
        $queryTipoContrato = DB::select("SELECT *, Descripcion AS DescripcionTipoContrato FROM ev_tipo_contrato");

        $queryTipoPersonal = DB::select("SELECT *, Descripcion AS DescripcionTipoPersonal FROM ev_tipo_personal");
        $queryTipoJornada = DB::select("SELECT *, Descripcion AS DescripcionTipoJornada FROM ev_tipo_jornada");
        $queryAntiguedad = DB::select("SELECT *, Descripcion AS DescripcionAntiguedad FROM ev_antiguedad");
        $queryExperiencia= DB::select("SELECT *, Descripcion AS DescripcionExperiencia FROM ev_experiencia");
       
        $Encuesta = DB::table('ev_encuesta')->get();

        $encuesta = ['Seleccione un Tipo de Encuesta'];
        foreach ($Encuesta as $edo) {
            $encuesta[$edo->IdEncuesta] = $edo->Descripcion;
            $codE=$edo->IdEncuesta;
        }
        

        return view("Encuestas.catalogos.formularios.catalogodepersonalevaluacion.create.create",
             $data,["queryGenero"=>$queryGenero,
                    "queryEstadoCivil"=>$queryEstadoCivil,
                    "queryNivelEstudio"=>$queryNivelEstudio,
                    "queryTipoPuesto"=>$queryTipoPuesto,
                    "queryTipoContrato"=>$queryTipoContrato,
                    "queryTipoPersonal"=>$queryTipoPersonal,
                    "queryTipoJornada"=>$queryTipoJornada,
                    "queryAntiguedad"=>$queryAntiguedad,
                    "queryExperiencia"=>$queryExperiencia   
                    ])
             ->with('id', $clientes)
             ->with('IdEncuesta',$encuesta);
    }

    public function ValidacionAnonima(Request $request){
        $encuestas=$request->input('encuestas');
        $res='';
        $query = DB::select("SELECT * FROM ev_encuesta  WHERE IdEncuesta = $encuestas");

        foreach ($query as $opt) {
            $res=$res."<option value='".$opt->IdEncuesta."' >".$opt->Anonima."</option>";
        }

        return array($res);

    }

    public function ValidacionesDepartamentos(Request $request){
        $datos=$request->input('datos');

        $res='';
        $query = DB::select("SELECT * FROM ev_departamentos WHERE IdCliente = $datos");

        foreach ($query as $opt) {
            $res=$res."<option value='".$opt->IdDeptoCliente."' >".$opt->Descripcion."</option>";
        }
        return array($res);
    }

    public function ValidacionesCentroTrabajo(Request $request){
        $datos=$request->input('datos');
        $res='';
        $query = DB::select("SELECT * FROM ev_centros_trabajo WHERE IdCliente = $datos");

        foreach ($query as $opt) {
            $res=$res."<option value='".$opt->IdCentro."' >".$opt->Descripcion."</option>";
        }
        return array($res);
    }

    public function ValidacionesPuestos(Request $request){
        $datos=$request->input('datos');
        $res='';
        $query = DB::select("SELECT * FROM ev_puestos WHERE IdCliente = $datos");

        foreach ($query as $opt) {
            $res=$res."<option value='".$opt->IdPuestoCliente."' >".$opt->Descripcion."</option>";
        }
        return array($res);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $esAnonimo = $request->input('txtAnonimo');

        if($esAnonimo=='Si'){
            //GUARDAMOS SÓLO CLIENTE, TIPO ENCUESTA, CENTRODE TRABAJO, DEPARTAMENTO, NOMBRE, PUESTOS, CORREO, TELEFONO
            $AltaTiposServicio=MasterConsultas::exeSQLStatement("create_ev_personalSi", "UPDATE",
                array(
                    "IdCliente" => $request->input('nombre3'),
                    "Nombre" => $request->input('nombre'),
                    "IdCentroTrabajo" => $request->input('CentroDeTrabajo'),
                    "IdDeptoCliente" => $request->input('CodigoDepartamento'),
                    "IdPuestoCliente" => $request->input('Puestos'),
                    "Correo" => $request->input('correo'),
                    "Telefono" => $request->input('telefono'),
                    "IdEncuesta" => $request->input('anonimo')
                )
            );

         }else{
            $AltaTiposServicio=MasterConsultas::exeSQLStatement("create_ev_personal", "UPDATE",
            array(
                "IdCliente" => $request->input('nombre3'),
                "Nombre" => $request->input('nombre'),
                "FechaNacimiento" => $request->input('fecha'),
                "IdDeptoCliente" => $request->input('CodigoDepartamento'),
                "IdCentroTrabajo" => $request->input('CentroDeTrabajo'),
                "IdPuestoCliente" => $request->input('Puestos'),
                "IdTipoPuesto" => $request->input('tipoPuesto'),
                "IdTipoContrato" => $request->input('tipoContrato'),
                "IdTipoPersonal" => $request->input('tipoPersonal'),
                "IdTipoJornada" => $request->input('tipoJornada'),
                "IdAntiguedad" => $request->input('antiguedad'),
                "IdExperiencia" => $request->input('experiencia'),
                "IdNivelEstudio" => $request->input('nivelEstudios'),
                "RolaTurno" => $request->input('rolaTurno'),
                "IdGenero" => $request->input('genero'),
                "IdEstadoCivil" => $request->input('estadoCivil'),
                "IdEncuesta" => $request->input('anonimo')
            )
        );
        }

    return redirect('/catalogo_encuestas/personal_evaluacion')->with(['success' => ' El registro se guardo con éxito',
    'type'    => 'success']);

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
    public function edit($id){
        $data = null;
        $formularioAnonimo = "Si";

        $editarCT=DB::select('SELECT * FROM ev_personal where IdPersonal='.$id);

        foreach ($editarCT as  $editCT) {
            $IdPersonal=$editCT->IdPersonal;
            $IdCliente=$editCT->IdCliente;
            $Nombre=$editCT->Nombre;
            $FechaNacimiento=$editCT->FechaNacimiento;
            $IdDeptoCliente=$editCT->IdDeptoCliente;

            $IdCentroTrabajo=$editCT->IdCentroTrabajo;
            $IdPuestoCliente=$editCT->IdPuestoCliente;
            $IdTipoPuesto=$editCT->IdTipoPuesto;
            $IdTipoContrato=$editCT->IdTipoContrato;

            $IdTipoPersonal=$editCT->IdTipoPersonal;
            $IdTipoJornada=$editCT->IdTipoJornada;
            $IdAntiguedad=$editCT->IdAntiguedad;
            $IdExperiencia=$editCT->IdExperiencia;
            
            $IdNivelEstudio=$editCT->IdNivelEstudio;
            $RolaTurno=$editCT->RolaTurno;
            $Correo=$editCT->Correo;
            $Telefono=$editCT->Telefono;
            
            $IdGenero=$editCT->IdGenero;
            $IdEstadoCivil=$editCT->IdEstadoCivil;
            $IdEncuesta=$editCT->IdEncuesta;
        }

        $queryEstadoCivil = DB::select("SELECT *, Descripcion AS DescripcionEstadoCivil FROM master_estadocivil");
        $queryNivelEstudio = DB::select("SELECT *, Descripcion AS DescripcionNivelEstudios FROM master_nivel_estudios"); 
        $queryTipoPuesto = DB::select("SELECT *, Descripcion AS DescripcionTipoPuesto FROM ev_tipo_puesto");
        $queryTipoContrato = DB::select("SELECT *, Descripcion AS DescripcionTipoContrato FROM ev_tipo_contrato");

        $queryTipoPersonal = DB::select("SELECT *, Descripcion AS DescripcionTipoPersonal FROM ev_tipo_personal");
        $queryTipoJornada = DB::select("SELECT *, Descripcion AS DescripcionTipoJornada FROM ev_tipo_jornada");
        $queryAntiguedad = DB::select("SELECT *, Descripcion AS DescripcionAntiguedad FROM ev_antiguedad");
        $queryExperiencia= DB::select("SELECT *, Descripcion AS DescripcionExperiencia FROM ev_experiencia");
        $queryGenero =  DB::select("SELECT *, Descripcion AS DescripcionGenero FROM master_genero");

        //INICIAN COMBOS DINAMICOS
        $queryCentroNegocios =  DB::select("SELECT *, Descripcion AS DescripcionCentroTrabajo FROM ev_centros_trabajo WHERE IdCliente =".$IdCliente);
        $queryDepartamentos =  DB::select("SELECT *, Descripcion AS DescripcionDepartamento FROM ev_departamentos WHERE IdCliente  =".$IdCliente);
        $queryPuestos =  DB::select("SELECT *, Descripcion AS DescripcionPuesto FROM ev_puestos WHERE IdCliente=".$IdCliente);
        //FINALIZA COMBOS DINAMICOS
        
        $sqlClientes=DB::select('SELECT nombre_comercial AS Empresa FROM clientes WHERE Id='.$IdCliente);

        foreach($sqlClientes as $ncli){
            $Cliente=$ncli->Empresa;
        }

        $sqlVerCentroTrabajo =DB::select('SELECT Descripcion AS DescripcionCentroTrabajoOriginal FROM ev_centros_trabajo WHERE IdCentro='.$IdCentroTrabajo);
        foreach($sqlVerCentroTrabajo as $ncli){
            $DescripcionCentroTrabajoOriginal=$ncli->DescripcionCentroTrabajoOriginal;
        }

        $sqlVerDepartamentos =DB::select('SELECT *, Descripcion AS DescripcionDepartamentoOriginal FROM ev_departamentos WHERE IdDeptoCliente ='.$IdDeptoCliente);
        foreach($sqlVerDepartamentos as $ncli){
            $DescripcionDepartamentoOriginal=$ncli->DescripcionDepartamentoOriginal;
        }

        $sqlVerPuesto =DB::select('SELECT *, Descripcion AS DescripcionPuestoOriginal FROM ev_puestos WHERE IdPuestoCliente='.$IdPuestoCliente);
        foreach($sqlVerPuesto as $ncli){
            $DescripcionPuestoOriginal=$ncli->DescripcionPuestoOriginal;
        }

        //select * from ev_encuesta where IdEncuesta = 11 AND Anonima = "Si";
        $sqlAnonimos=DB::select('SELECT *, Anonima AS DescripcionAnonima from ev_encuesta where IdEncuesta = '.$IdEncuesta);
        foreach($sqlAnonimos as $ncli){
            $DescripcionAnonima=$ncli->DescripcionAnonima;
        }

        if($DescripcionAnonima<>'Si') {
            $sqlVerEstadoCivil =DB::select('SELECT *, Descripcion AS DescripcionEstadoCivilDos FROM master_estadocivil WHERE IdEstadoCivil = '.$IdEstadoCivil);
            foreach($sqlVerEstadoCivil as $ncli){
                $DescripcionEstadoCivilDos=$ncli->DescripcionEstadoCivilDos;
            }
    
            $sqlVerNivelEstudios =DB::select('SELECT Descripcion AS DescripcionNivelEstudiosOriginal FROM master_nivel_estudios WHERE IdNivelEstudio = '.$IdNivelEstudio);
            foreach($sqlVerNivelEstudios as $ncli){
                $DescripcionNivelEstudiosOriginal=$ncli->DescripcionNivelEstudiosOriginal;
            }
    
            $sqlVerGenero =DB::select('SELECT Descripcion AS DescripcionGeneroOriginal FROM master_genero WHERE IdGenere='.$IdGenero);
            foreach($sqlVerGenero as $ncli){
                $DescripcionGeneroOriginal=$ncli->DescripcionGeneroOriginal;
            }
    
            $sqlVerTipoContrato =DB::select('SELECT *, Descripcion AS DescripcionTipoContratOriginal FROM ev_tipo_contrato WHERE IdTipoContrato='.$IdTipoContrato);
            foreach($sqlVerTipoContrato as $ncli){
                $DescripcionTipoContratOriginal=$ncli->DescripcionTipoContratOriginal;
            }
    
            
            $sqlVerTipoPersonal =DB::select('SELECT *, Descripcion AS DescripcionTipoPersonalOriginal FROM ev_tipo_personal WHERE IdTipoPersonal ='.$IdTipoPersonal);
            foreach($sqlVerTipoPersonal as $ncli){
                $DescripcionTipoPersonalOriginal=$ncli->DescripcionTipoPersonalOriginal;
            }
    
            $sqlVerTipoJornada =DB::select('SELECT *, Descripcion AS DescripcionTipoJornadaOriginal FROM ev_tipo_jornada WHERE IdTipoJornada ='.$IdTipoJornada);
            foreach($sqlVerTipoJornada as $ncli){
                $DescripcionTipoJornadaOriginal=$ncli->DescripcionTipoJornadaOriginal;
            }
    
            $sqlVerAntiguedad =DB::select('SELECT *, Descripcion AS DescripcionAntiguedadOriginal FROM ev_antiguedad WHERE IdAntiguedad = '.$IdAntiguedad);
            foreach($sqlVerAntiguedad as $ncli){
                $DescripcionAntiguedadOriginal=$ncli->DescripcionAntiguedadOriginal;
            }
    
            $sqlVerExperiencia =DB::select('SELECT *, Descripcion AS DescripcionExperienciaOriginal FROM ev_experiencia WHERE IdExperiencia ='.$IdExperiencia);
            foreach($sqlVerExperiencia as $ncli){
                $DescripcionExperienciaOriginal=$ncli->DescripcionExperienciaOriginal;
            }

            $banderaDescripcionAnonina = "Si";

            return view("Encuestas.catalogos.formularios.catalogodepersonalevaluacion.edit.edit",
            ["queryEstadoCivil"=>$queryEstadoCivil,
             "sqlVerEstadoCivil"=>$sqlVerEstadoCivil,
             
             "queryNivelEstudio"=>$queryNivelEstudio,
             "sqlVerNivelEstudios"=>$sqlVerNivelEstudios,
 
             "queryGenero"=>$queryGenero,
             "sqlVerGenero"=>$sqlVerGenero,
 
              "sqlVerCentroTrabajo"=>$sqlVerCentroTrabajo,
              "queryCentroNegocios"=>$queryCentroNegocios,
 
              "sqlVerDepartamentos"=>$sqlVerDepartamentos,
              "queryDepartamentos"=>$queryDepartamentos,
 
              "sqlVerPuesto"=>$sqlVerPuesto,
              "queryPuestos"=>$queryPuestos,
              
              "queryTipoContrato"=>$queryTipoContrato,
              "sqlVerTipoContrato"=>$sqlVerTipoContrato,
 
              "queryTipoPersonal"=>$queryTipoPersonal,
              "sqlVerTipoPersonal"=>$sqlVerTipoPersonal,
              
              "queryTipoJornada"=>$queryTipoJornada,
              "sqlVerTipoJornada"=>$sqlVerTipoJornada,
 
              "queryAntiguedad"=>$queryAntiguedad,
              "sqlVerAntiguedad"=>$sqlVerAntiguedad,
 
              "queryExperiencia"=>$queryExperiencia,
              "sqlVerExperiencia"=>$sqlVerExperiencia,

              "banderaDescripcionAnonina"=>$banderaDescripcionAnonina
             ]
 
             )
             
             ->with('IdPersonal',$IdPersonal)
             ->with('IdCliente', $IdCliente)
             ->with('Cliente', $Cliente)
             ->with('Nombre', $Nombre)
             ->with('RolaTurno', $RolaTurno)
 
             ->with('DescripcionEstadoCivilDos',$DescripcionEstadoCivilDos)
             ->with('DescripcionNivelEstudiosOriginal',$DescripcionNivelEstudiosOriginal)
             ->with('DescripcionGeneroOriginal',$DescripcionGeneroOriginal)
             ->with('DescripcionCentroTrabajoOriginal',$DescripcionCentroTrabajoOriginal)
             ->with('DescripcionDepartamentoOriginal',$DescripcionDepartamentoOriginal)
             ->with('DescripcionPuestoOriginal',$DescripcionPuestoOriginal)
             ->with('DescripcionTipoContratOriginal',$DescripcionTipoContratOriginal)
             ->with('DescripcionTipoPersonalOriginal',$DescripcionTipoPersonalOriginal)
             ->with('DescripcionTipoJornadaOriginal',$DescripcionTipoJornadaOriginal)
             ->with('DescripcionAntiguedadOriginal',$DescripcionAntiguedadOriginal)
             ->with('DescripcionExperienciaOriginal',$DescripcionExperienciaOriginal)
 
             ->with('IdEstadoCivil', $IdEstadoCivil)
             ->with('FechaNacimiento', $FechaNacimiento)
             ->with('IdNivelEstudio', $IdNivelEstudio)
             ->with('IdDeptoCliente', $IdDeptoCliente)
             ->with('IdCentroTrabajo', $IdCentroTrabajo)
             ->with('IdPuestoCliente', $IdPuestoCliente)
             ->with('IdTipoContrato',$IdTipoContrato)
             ->with('IdTipoPersonal',$IdTipoPersonal)
             ->with('IdTipoJornada',$IdTipoJornada)
             ->with('IdAntiguedad',$IdAntiguedad)
             ->with('IdExperiencia',$IdExperiencia)
             ->with('IdGenero', $IdGenero);
    
        }else{
            return view("Encuestas.catalogos.formularios.catalogodepersonalevaluacion.create.editNoAnonimo",
            [
              "sqlVerCentroTrabajo"=>$sqlVerCentroTrabajo,
              "queryCentroNegocios"=>$queryCentroNegocios,
 
              "sqlVerDepartamentos"=>$sqlVerDepartamentos,
              "queryDepartamentos"=>$queryDepartamentos,
 
              "sqlVerPuesto"=>$sqlVerPuesto,
              "queryPuestos"=>$queryPuestos,
             ]
 
             )
             ->with('IdPersonal',$IdPersonal)
             ->with('IdCliente', $IdCliente)
             ->with('Cliente', $Cliente)
             ->with('Nombre', $Nombre)
             ->with('RolaTurno', $RolaTurno)
             ->with('Correo', $Correo)
             ->with('Telefono', $Telefono)
 
             ->with('DescripcionDepartamentoOriginal',$DescripcionDepartamentoOriginal)
             ->with('DescripcionPuestoOriginal',$DescripcionPuestoOriginal)
             ->with('DescripcionCentroTrabajoOriginal',$DescripcionCentroTrabajoOriginal)
 
             ->with('IdDeptoCliente', $IdDeptoCliente)
             ->with('IdCentroTrabajo', $IdCentroTrabajo)
             ->with('IdPuestoCliente', $IdPuestoCliente);
        }
        

            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id){

        if ($request->input('txtbanderaDescripcionAnonina')) {
            $actualizarRangoEdades = DB::table('ev_personal')->where('IdPersonal',$id)->update(
                array(
                    'IdCentroTrabajo'=>$request->input('cnCentroTrabajo'),
                    'IdDeptoCliente'=>$request->input('cnDepartamento'),
                    'Nombre'=>$request->input('Nombre'),
            
                    'IdGenero'=>$request->input('Genero'),
                    'FechaNacimiento'=>$request->input('fecha'),
                    'IdEstadoCivil'=>$request->input('cnEstadoCivil'),
                    
                    'IdPuestoCliente'=>$request->input('cnPuesto'),
                    'IdTipoContrato'=>$request->input('cnTipoContrato'),
                    'IdTipoPersonal'=>$request->input('cnTipoPersonal'),
                    
                    'IdTipoJornada'=>$request->input('cnTipoJornada'),
                    'IdAntiguedad'=>$request->input('cnAntiguedad'),
                    'IdExperiencia'=>$request->input('cnExperiencia'),
                    
                    'IdTipoPuesto'=>$request->input('cnTipoPuesto'),
                    'RolaTurno'=>$request->input('cnRolaTurno'),
                    'IdNivelEstudio'=>$request->input('cnNivelEstudio')
                    )
                );
                    
            return redirect('/catalogo_encuestas/personal_evaluacion')
            ->with(['success' => ' El personal '.$request->input('nombre').' se actualizó con éxito',
            'type'    => 'success']);
            # code...
        }else{
            $actualizarRangoEdades = DB::table('ev_personal')->where('IdPersonal',$id)->update(
                array(
                    'IdPuestoCliente'=>$request->input('cnPuesto'),
                    'IdDeptoCliente'=>$request->input('cnDepartamento'),
                    'IdCentroTrabajo'=>$request->input('cnCentroTrabajo'),

                    'Correo'=>$request->input('Correo'),
                    'Telefono'=>$request->input('Telefono'),

                    )
                );
                    
            return redirect('/catalogo_encuestas/personal_evaluacion')
            ->with(['success' => ' El personal '.$request->input('Nombre').' se actualizó con éxito',
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
            DB::delete("delete from ev_personal WHERE IdPersonal = $id");
        }catch (\Exception $e) {
            if($e->getMessage()){
                $resultadoError = 'Si';
            }
        }finally{
            if($resultadoError=='Si'){
                return redirect('/catalogo_encuestas/personal_evaluacion')
                ->with(['success' => 'Error al eliminar el registro, este ya se encuentra en uso dentro de algún catálogo/configuración',
                'type'    => 'danger']);
            }else{
                return redirect('/catalogo_encuestas/personal_evaluacion')
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

    private function initFieldsUser( User $usuario )
    {
        /************************************************************************************************/

        $lista_estudios     = $this->getEstudiosUser( $usuario );
        $estudios           = $this->getEstudiosFilterMonth( $lista_estudios );
        $estudios_cerrados  = $this->getEstudiosFilterMonthClosed( $lista_estudios );
        $estudios_solicitud = $this->getEstudiosFilterMonthRequest( $lista_estudios );

        $estudios_procesando  = $estudios->where('id_status',EstudioEse::PROCESO);
        $estudios_facturar    = $estudios_cerrados;
        $estudios_solicitados = $estudios_solicitud->where('id_status',EstudioEse::SIN_INICIAR);
        $estudios_urgentes    = [];
        $estudios_normales    = [];


        foreach( $estudios as $estudio ) {
                if( $estudio->prioridad_estudio->isUrgente() ) $estudios_urgentes[] = $estudio;
                if( $estudio->prioridad_estudio->isNormal() )  $estudios_normales[]  = $estudio;
        }

        return ['estudios_cerrados'    => $estudios_cerrados,
                'estudios_facturar'    => $estudios_facturar,
                'estudios_proceso'     => $estudios,
                'estudios_mes'         => $estudios,
                'estudios_solicitados' => $estudios_solicitados,
                'estudios_normales'    => $estudios_normales,
                'estudios_urgentes'    => $estudios_urgentes, ];
    }

    private function getEstudiosUser(User $usuario)
    {
        $cn      = CentroNegocio::with('ordenes_servicio.ordendes_servicio_ese.estudiosEse')->where( 'id', $usuario->idcn )->get()[0];
        $ordenes = $cn->ordenes_servicio;
        $estudios = new Collection();

        foreach( $ordenes as $orden ){
            if( $orden->ordendes_servicio_ese->count() > 0 )
            {
                $ordenes_ese = $orden->ordendes_servicio_ese;
                foreach( $ordenes_ese as $orden_ese ){
                    if( $orden_ese->estudiosEse->count() > 0 )
                    {
                        $estudios = $estudios->merge( $orden_ese->estudiosEse );
                    }
                }
            }
        }

        return $estudios;
    }

    private function getEstudiosFilterMonth(Collection $lista_estudios)
    {
        $estudios = new Collection();

        $lista_estudios->map(function ($item, $key) use( $estudios ) {

            if( $item->isBetweenMonth() ){
                $estudios = $estudios->push( $item );
            }
        });

        return $estudios;
    }

    private function getEstudiosFilterMonthClosed(Collection $lista_estudios)
    {
        $estudios_cerrados = new Collection();

        $lista_estudios->map(function ($item, $key) use( $estudios_cerrados ) {

            if( $item->isClosed() ){
                $estudios_cerrados = $estudios_cerrados->push( $item );
            }
        });

        return $estudios_cerrados;
    }

    private function getEstudiosFilterMonthRequest(Collection $lista_estudios)
    {
        $estudios_pedidos = new Collection();

        $lista_estudios->map(function ($item, $key) use( $estudios_pedidos ) {

            if( $item->isRequestMonth() ){
                $estudios_pedidos = $estudios_pedidos->push( $item );
            }
        });

        return $estudios_pedidos;
    }
    private function DataDashboard()
    {
        $clientes=DB::select('select IdCliente, CONCAT("Concesión ",Nombre) as Nombre from master_clientes');
        $estatus_proceso=DB::select('select Estatus from master_ese_srv_os GROUP BY Estatus');
        $investigadores=DB::select('select
                                    mee.IdEmpleado,
                                    concat(mee.Nombre," ",
                                                ifnull(mee.SegundoNombre,"")," ",
                                                mee.ApellidoPaterno," ",
                                                ifnull( mee.ApellidoMaterno,"") )
                                    as NombreCompleto,
                                    e.FK_nombre_estado  as Estado
                                    from master_ese_empleado as mee
                                    Inner Join users as u ON u.IdEmpleado = mee.IdEmpleado
                                    Inner Join master_ese_mobile_settings as mems ON mems.IdRolInvestigador = u.IdRol
                                    Inner join estados as e on e.IdEstado = mee.IdEstado');
        $tiposClientes=array("Interno","Externo");
        $totalservicios=DB::select('select count(ess.IdServicioEse) TotalServicios
                                    from master_ese_srv_servicio ess');
        $totalporservicio=DB::select('select et.Descripcion,
                                        (select COUNT(ess1.IdServicioEse) as totalReferenciaslaborales
                                            from master_ese_plantilla_cliente epc1
                                            INNER JOIN master_ese_srv_servicio ess1 ON ess1.IdPlantillaCliente = epc1.IdPlantillaCliente
                                            INNER JOIN master_ese_plantilla ep1 ON epc1.IdPlantilla = ep1.IdPlantilla
                                            INNER JOIN master_ese_tiposervicio et1 ON ep1.IdTipoServicio = et1.IdTipoServicio
                                            where et1.IdTipoServicio = et.IdTipoServicio) total
                                        from master_ese_plantilla_cliente epc
                                        INNER JOIN master_ese_srv_servicio ess ON ess.IdCliente = epc.IdCliente
                                        INNER JOIN master_ese_plantilla ep ON epc.IdPlantilla = ep.IdPlantilla
                                        INNER JOIN master_ese_tiposervicio et ON ep.IdTipoServicio = et.IdTipoServicio
                                        GROUP BY et.Descripcion');
        $prioridadservicios=DB::select('SELECT ep.Descripcion,
                                        (SELECT COUNT(ep1.IdPrioridad) as totalprioridadbaja
                                            FROM master_ese_srv_servicio ess1
                                            INNER JOIN master_ese_prioridades ep1 ON ess1.IdPrioridad = ep1.IdPrioridad
                                            where ep1.IdPrioridad=ep.IdPrioridad) as total
                                        FROM master_ese_srv_servicio ess
                                        INNER JOIN master_ese_prioridades ep ON ess.IdPrioridad = ep.IdPrioridad
                                        GROUP BY ep.Descripcion  ORDER BY ep.IdPrioridad ASC');
        $modalidadservicios=DB::select('SELECT em.Descripcion,
                                        (SELECT COUNT(ess1.IdModalidad) TotalPresencial
                                        FROM master_ese_modalidad em1
                                        INNER JOIN master_ese_srv_servicio ess1
                                        ON ess1.IdModalidad = em1.IdModalidad
                                        WHERE em1.IdModalidad=em.IdModalidad) as total
                                        FROM master_ese_modalidad em
                                        INNER JOIN master_ese_srv_servicio ess
                                        ON ess.IdModalidad = em.IdModalidad
                                        GROUP BY em.Descripcion');


        foreach($totalservicios as $tsrv){
                $Totalservicio = $tsrv->TotalServicios;
        }
        return ["clientes"=>$clientes,
                "estatus_proceso"=>$estatus_proceso,
                "investigadores"=>$investigadores,
                "tiposClientes"=>$tiposClientes,
                "Totalservicio"=>$Totalservicio,
                "totalporservicio"=>$totalporservicio,
                "prioridadservicios"=>$prioridadservicios,
                "modalidadservicios"=>$modalidadservicios
               ];
    }
    //Filtros
    public function getDataChart($Id,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $chart = $objDashboard->GetDataChartDashboard($Id,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($chart);
    }
    public function GetDataByClient($IdCliente,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByClient($IdCliente,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetDataByInvestigator($IdInvestigador,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByInvestigator($IdInvestigador,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetDataByAnalist($IdAnalista,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByAnalist($IdAnalista,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetDataByPeriod($Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByPeriod($Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetDataByTypeClient($TipoCliente,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByTypeClient($TipoCliente,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }

    public function GetDataByStatusProcess($Estatus,$Dateini,$Dateend)
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataDashboardByStatusProcess($Estatus,$Dateini,$Dateend);
        unset($objDashboard);
        return response()->json($data);
    }
    //Limpiar filtros
    public function GetClients()
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->GetDataClients();
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetInvestigators()
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->getDataInvestigators();
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetAnalists()
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->getDataAnalists();
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetTypeClients()
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->getDataTypeClients();
        unset($objDashboard);
        return response()->json($data);
    }
    public function GetStatusProcess()
    {
        $objDashboard = new Dashboard();
        $data = $objDashboard->getDataStatusProcess();
        unset($objDashboard);
        return response()->json($data);
    }
    function GetBoxHeader(){
        $objDashboard = new Dashboard();
        $initdatadashboad = $objDashboard->initDataDashboard();
        unset($objDashboard);
        return response()->json($initdatadashboad);
    }
    function GetDataByAll(){

    }

    //funcion para importar datos desde excel
    public function importExcel(){

        $data = array();

        $the_file = 'archivos/Plantilla Personal Encuestas Datos.xlsx';
       try{

           $spreadsheet = IOFactory::load($the_file);
           $sheet        = $spreadsheet->setActiveSheetIndex(1);
           $row_limit    = $sheet->getHighestDataRow();
           $column_limit = $sheet->getHighestDataColumn();
           $centros = array(); 
           $puestos = array();
           $deptos  = array();
           $data    = array(); 
           $Cliente = '1';
           $IdServ  = '218';

// CENTROS DE TRABAJO 
           $row_rangeC    = range( 3, $row_limit );
           $column_rangeC = range( 'B', $column_limit );
           $startcountC = 3;
           foreach ($row_rangeC as $rowC ) {
            if ($sheet->getCell('B'.$rowC )->getValue()!=''){
                $centros[] = [ 
                'IdCliente' => $Cliente,
                'Descripcion' =>$sheet->getCell('B'.$rowC )->getValue(),
                'Activo' => 'Si' ];
            }
           $startcountC++;
       }
       DB::table('ev_centros_trabajo')->insert($centros);
       
// DEPARTAMENTOS 
           $row_rangeD    = range( 3, $row_limit );
           $column_rangeD = range( 'D', $column_limit);
           $startcountD = 3;
           foreach ($row_rangeD as $rowD ) {         
            if ($sheet->getCell('D'.$rowD )->getValue()!=''){
                $deptos[] = [ 
                'IdCliente' => $Cliente,
                'Descripcion' =>$sheet->getCell('D'.$rowD )->getValue(),
                'Activo' => 'Si' ];
            }
           $startcountD++;
       }
       DB::table('ev_departamentos')->insert($deptos);
       
// PUESTOS
       $row_rangeP    = range( 3, $row_limit );
       $column_rangeP = range( 'F', $column_limit);
       $startcountP = 3;
       foreach ($row_rangeP as $rowP ) {         
        if ($sheet->getCell('F'.$rowP )->getValue()!=''){
            $puesto[] = [ 
            'IdCliente' => $Cliente,
            'Descripcion' =>$sheet->getCell('F'.$rowP )->getValue(),
            'Activo' => 'Si'
            ];
        }
         $startcountP++;
        }
        DB::table('ev_puestos')->insert($puesto);
// INSERTAR DATOS DE HOJA 1
        $sheet        = $spreadsheet->setActiveSheetIndex(0);
        $row_limit    = $sheet->getHighestDataRow();
        $column_limit = $sheet->getHighestDataColumn();
        $row_range    = range( 2, $row_limit );
        $column_range = range( 'A', $column_limit);
        $startcount = 2;

           // importación en ev_personal
           foreach ($row_range as $row ) {
                if ($sheet->getCell('B'.$row )->getValue()!=''){

                    $ID_CT = DB::table('ev_centros_trabajo')
                    ->where('IdCliente', '=', $Cliente)
                    ->where('Descripcion', '=', $sheet->getCell('A'.$row )->getValue())
                    ->value('IdCentro');

                    $data[] = [ 
                    'IdCliente' => $Cliente,
                    'Nombre' =>$sheet->getCell('B'.$row )->getValue(),
                    'IdCentroTrabajo' => $ID_CT,
                    'Correo' => $sheet->getCell('C'.$row )->getValue(),
                    'Telefono' => $sheet->getCell('D'.$row )->getValue()   
                    ];
                }
               $startcount++;
           }

           DB::table('ev_personal')->insert($data);

           // tabla de servicios cliente
           $sheet        = $spreadsheet->setActiveSheetIndex(1);
           $row_limit    = $sheet->getHighestDataRow();
           $column_limit = $sheet->getHighestDataColumn();
           $row_rangeC    = range( 3, $row_limit );
           $column_rangeC = range( 'B', $column_limit );
           $startcountC = 3;
           $sevices = array(); 
           foreach ($row_rangeC as $rowC ) {
            if ($sheet->getCell('B'.$rowC )->getValue()!=''){
                
                $cts = DB::table('ev_centros_trabajo')
                ->where('IdCliente', '=', $Cliente)
                ->where('Descripcion', '=', $sheet->getCell('B'.$rowC )->getValue())
                ->orderBy('IdCentro','DESC')->value('IdCentro');
                
                $ct_count = DB::table('ev_personal')
                    ->where('IdCliente', '=', $Cliente)
                    ->where('IdCentroTrabajo', '=', $cts)
                    ->count();

                $services[] = [ 
                    'IdServicio'    => $IdServ,
                    'IdCentro'      => $cts,
                    'CantidadCentro' => $ct_count
                ];
                


            }
           $startcountC++;
        }
           
        DB::table('ev_servicio_cliente')->insert($services);
            


       } catch (Exception $e) {
           //$error_code = $e->errorInfo[1];
           //return back()->withErrors('There was a problem uploading the data!');
       }
       // return back()->withSuccess('Great! Data has been successfully uploaded.');

       return 'Importación realizada';
       
    }

}

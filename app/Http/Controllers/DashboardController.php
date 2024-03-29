<?php



namespace App\Http\Controllers;


use App\Bussines\DhasboarCRM;
use Illuminate\Http\Request;
use App\Bussines\MasterConsultas;


use App\Http\Requests;
use App\Servicio;
use DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller

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

    public function filtroDash($fechaIni,$fechaFin,$tipo,$cliente,$accion,$cn){
        $objDashboard = new DhasboarCRM();
        $chart = $objDashboard->filtrosDash($fechaIni,$fechaFin,$tipo,$cliente,$accion,$cn);
        unset($objDashboard);

        return response()->json([$chart]);

    }

    public function iniciarDash($fechaIni,$fechaFin){
        $objDashboard = new DhasboarCRM();
        $chart = $objDashboard->iniciarDataosDashboard($fechaIni,$fechaFin);
        unset($objDashboard);


        return response()->json([$chart]);
    }

    public function index(Request $request)

    {

        $servicio = DB::select("SELECT servicio from  crm_cotizador_servicio");
        
       $servicios = array();
        foreach($servicio as $srv){
            array_push($servicios,$srv->servicio);
        }
            
        $op = DB::select ('SELECT u.idempleado as e FROM users u 
        WHERE u.id = ?', [$request->user()->id]);
        

        $e="";
        foreach($op as $o){
            $e = $o->e;
        }
       
        $ESEinvA = DB::select('SELECT COUNT(msa.IdInvestigador) as numero FROM master_ese_srv_asignacion msa
        INNER JOIN master_ese_srv_servicio ms ON msa.IdServicioEse = ms.IdServicioEse
        WHERE msa.IdInvestigador = ? AND ms.estatus <> "Cancelado" AND ms.estatus <> "Cerrado"',[$e]);

        $ESEinvT = DB::select('SELECT COUNT(msa.IdInvestigador) as numero FROM master_ese_srv_asignacion msa
        INNER JOIN master_ese_srv_servicio ms ON msa.IdServicioEse = ms.IdServicioEse
        WHERE msa.IdInvestigador = ? ;',[$e]);



        $Qtotal = "SELECT COUNT(IdServicioEse) as numero FROM master_ese_srv_servicio s INNER JOIN users u on u.IdCliente = s.IdCliente  WHERE u.id =?";

        $ESE = DB::select($Qtotal,[$request->user()->id]);

        $nESE = "";
        foreach ($ESE as $n){
            $nESE = $n->numero;
        }

        

        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){

             
            
            
            $query_cotizaciones =   "SELECT    crm_cotizaciones.id,

                                            clientes.nombre_comercial as nombre,

                                            contactos.nombre_con as contacto,

                                            contactos.telefono1 as telefono,

                                            contactos.celular1 as celular,

                                            crm_cotizaciones.total as total,

                                            DATEDIFF(CURDATE(),crm_cotizaciones.fecha_cotizacion)/30 AS FECHA,

                                            DATE_ADD(crm_cotizaciones.fecha_cotizacion, interval 4 month) as mes_vencer,

                                            crm_cotizador_servicio.servicio
                                        FROM clientes

                                           inner join crm_cotizaciones on crm_cotizaciones.id_cliente = clientes.id 

                                            LEFT JOIN contactos ON contactos.id_cliente=clientes.id AND contactos.principal = 1

                                            LEFT JOIN crm_cotizador_servicio ON crm_cotizaciones.id_servicio=crm_cotizador_servicio.id

                                            LEFT JOIN centros_negocio ON clientes.id_cn=centros_negocio.id and centros_negocio.id=crm_cotizaciones.id_cn
                                            

                                        ORDER BY total DESC LIMIT 10"; 

            $prospectos=DB::select($query_cotizaciones);

            

        }else{
            
            
                $query_cotizaciones =   "SELECT    crm_cotizaciones.id,

                clientes.nombre_comercial as nombre,

                contactos.nombre_con as contacto,

                contactos.telefono1 as telefono,

                contactos.celular1 as celular,

                crm_cotizaciones.total as total,

                DATEDIFF(CURDATE(),crm_cotizaciones.fecha_cotizacion)/30 AS FECHA,

                DATE_ADD(crm_cotizaciones.fecha_cotizacion, interval 4 month) as mes_vencer,

                crm_cotizador_servicio.servicio 
                           FROM clientes

               inner join crm_cotizaciones on crm_cotizaciones.id_cliente = clientes.id 

                LEFT JOIN contactos ON contactos.id_cliente=clientes.id AND contactos.principal = 1

                LEFT JOIN crm_cotizador_servicio ON crm_cotizaciones.id_servicio=crm_cotizador_servicio.id

                LEFT JOIN centros_negocio ON clientes.id_cn=centros_negocio.id and centros_negocio.id=crm_cotizaciones.id_cn
                
                where clientes.id_cn= ?

                                        ORDER BY total DESC LIMIT 10"; 

            $prospectos=DB::select($query_cotizaciones,[$request->user()->idcn]);



        }

        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){

                    $agenda=DB::select(

                    "SELECT agenda.*,users.name 

                    FROM agenda

                    LEFT JOIN users ON agenda.id_usuario=users.id

                    WHERE agenda.fecha_inicio >=CURDATE() AND agenda.status=1 AND agenda.id_usuario=users.id

                    ORDER BY fecha_inicio ASC LIMIT 10 ");



                }

                else{

                    $agenda=DB::select(

                    "SELECT agenda.* 

                    FROM agenda

                    WHERE agenda.fecha_inicio >=CURDATE() AND agenda.status=1  AND agenda.id_usuario=?

                    ORDER BY fecha_inicio ASC LIMIT 10",[$request->user()->id]);

                }

        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
        

            $query_contratos="

                    SELECT *,

                    DATEDIFF(fecha_fin,CURDATE()) AS dias_vencer,

                    DATE_FORMAT(crm_contratos.fecha_fin,'%Y-%m-%d') as fecha_fin,

                    users.name

                    FROM crm_contratos

                    LEFT JOIN clientes ON crm_contratos.id_cliente=clientes.id

                    LEFT JOIN users ON crm_contratos.id_usuario=users.id

                    WHERE fecha_fin >= CURDATE() 

                    AND fecha_fin <= DATE_ADD(CURDATE(), INTERVAL 30 DAY) LIMIT 10";

                    $contratos=DB::select($query_contratos); 

        }else{

        $query_contratos="

                    SELECT *,

                    DATEDIFF(fecha_fin,CURDATE()) AS dias_vencer,

                    DATE_FORMAT(crm_contratos.fecha_fin,'%Y-%m-%d') as fecha_fin

                    FROM crm_contratos

                    LEFT JOIN clientes ON crm_contratos.id_cliente=clientes.id

                    LEFT JOIN users ON crm_contratos.id_usuario=users.id

                    WHERE fecha_fin >= CURDATE() 

                    AND fecha_fin <= DATE_ADD(CURDATE(), INTERVAL 30 DAY) AND idcn=? LIMIT 10";

            $contratos=DB::select($query_contratos,[$request->user()->idcn]);



        }

                


        //dd($contratos);

    


        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $cn = -1;
        }else{
            
                $cn = Auth::user()->idcn;
            
        }

        $cli_pros =  MasterConsultas::exeSQL("clientes_cn", "READONLY",
            array(
                "id_cn"=>$cn, 
            )
        );

        $departamentos =  MasterConsultas::exeSQL("bashboard_crm_departamento", "READONLY",
            array(
                "id"=>$cn, 
            )
        );


        $logo = DB::select("select logo from master_ese_logo");


        return view('crm.dashboard.crm-dashboard',['prospectos'=>$prospectos,
        'ESEinvT'=>$ESEinvT,
        'ESEinvA'=>$ESEinvA,
        'agenda'=>$agenda,"contrato"=>$contratos,"nESE"=>$nESE,
        "cli_pros"=>$cli_pros,
        "departamentos"=> $departamentos,
        "servicios"=>$servicios,
        "logo" => $logo[0]->logo
        ]);

    }

    public function tipoCliente ($id_tipo){
        
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $cn = -1;
        }else{
                $cn = Auth::user()->idcn;
            
        }

        $clientes_tipo =  MasterConsultas::exeSQL("clientes_tipo", "READONLY",
            array(
                "id_cn"=>$cn, 
                "tipo" => $id_tipo
            )
        );
        return response()->json($clientes_tipo);
    }


    public function Administrador(Request $request)

    {


        $Qtotal = "SELECT COUNT(IdServicioEse) as numero FROM `master_ese_srv_servicio` s INNER JOIN users u on u.IdCliente = s.IdCliente INNER JOIN clientes c on c.id_user = u.id WHERE u.id = ?;";

        $nESE = DB::select(

            $Qtotal,[$request->user()->id]);

        if($request->user()->is('admin')){

            $query_cotizaciones =   "SELECT    crm_cotizaciones.id,

                                            clientes.nombre_comercial as nombre,

                                            contactos.nombre_con as contacto,

                                            contactos.telefono1 as telefono,

                                            contactos.celular1 as celular,

                                            crm_cotizaciones.total as total,

                                            DATEDIFF(CURDATE(),crm_cotizaciones.fecha_cotizacion)/30 AS FECHA,

                                            DATE_ADD(crm_cotizaciones.fecha_cotizacion, interval 4 month) as mes_vencer,

                                            crm_tc_servicioscotizador.servicio

                                        FROM clientes

                                            LEFT JOIN users             ON users.id = clientes.id_user

                                            LEFT JOIN  crm_cotizaciones ON clientes.id=crm_cotizaciones.id_cliente 

                                                                    AND crm_cotizaciones.id_usuario = users.id

                                            LEFT JOIN contactos ON contactos.id_cliente=clientes.id

                                            LEFT JOIN crm_tc_servicioscotizador ON crm_cotizaciones.id_servicio=crm_tc_servicioscotizador.id

                                            LEFT JOIN centros_negocio ON clientes.id_cn=centros_negocio.id and centros_negocio.id=crm_cotizaciones.id_cn

                                        ORDER BY total DESC LIMIT 10"; 

            $prospectos=DB::select($query_cotizaciones);

            

        }else{

                $query_cotizaciones =   "SELECT    crm_cotizaciones.id,

                                            clientes.nombre_comercial as nombre,

                                            contactos.nombre_con as contacto,

                                            contactos.telefono1 as telefono,

                                            contactos.celular1 as celular,

                                            crm_cotizaciones.total as total,

                                            DATEDIFF(CURDATE(),crm_cotizaciones.fecha_cotizacion)/30 AS FECHA,

                                            DATE_ADD(crm_cotizaciones.fecha_cotizacion, interval 4 month) as mes_vencer,

                                            crm_tc_servicioscotizador.servicio

                                        FROM clientes

                                            LEFT JOIN users             ON users.id = clientes.id_user

                                            LEFT JOIN  crm_cotizaciones ON clientes.id=crm_cotizaciones.id_cliente 

                                                                    AND crm_cotizaciones.id_usuario = users.id

                                            LEFT JOIN contactos ON contactos.id_cliente=clientes.id

                                            LEFT JOIN crm_tc_servicioscotizador ON crm_cotizaciones.id_servicio=crm_tc_servicioscotizador.id

                                        WHERE users.id = ?  and users.idcn=? AND crm_cotizaciones.contrato != 1 

                                        ORDER BY total DESC LIMIT 10"; 

            $prospectos=DB::select($query_cotizaciones,[$request->user()->id,$request->user()->idcn]);



        }

                if($request->user()->is('admin')){

                    $agenda=DB::select(

                    "SELECT agenda.*,users.name 

                    FROM agenda

                    LEFT JOIN users ON agenda.id_usuario=users.id

                    WHERE agenda.fecha_inicio >=CURDATE() AND agenda.status=1 AND agenda.id_usuario=users.id

                    ORDER BY fecha_inicio ASC LIMIT 10 ");



                }

                else{

                    $agenda=DB::select(

                    "SELECT agenda.* 

                    FROM agenda

                    WHERE agenda.fecha_inicio >=CURDATE() AND agenda.status=1  AND agenda.id_usuario=?

                    ORDER BY fecha_inicio ASC LIMIT 10",[$request->user()->id]);

                }

        if($request->user()->is('admin')){

            $query_contratos="

                    SELECT *,

                    DATEDIFF(fecha_fin,CURDATE()) AS dias_vencer,

                    DATE_FORMAT(crm_contratos.fecha_fin,'%Y-%m-%d') as fecha_fin,

                    users.name

                    FROM crm_contratos

                    LEFT JOIN clientes ON crm_contratos.id_cliente=clientes.id

                    LEFT JOIN users ON crm_contratos.id_usuario=users.id

                    WHERE fecha_fin >= CURDATE() 

                    AND fecha_fin <= DATE_ADD(CURDATE(), INTERVAL 30 DAY) LIMIT 10";

                    $contratos=DB::select($query_contratos);





            

        }else{

        $query_contratos="

                    SELECT *,

                    DATEDIFF(fecha_fin,CURDATE()) AS dias_vencer,

                    DATE_FORMAT(crm_contratos.fecha_fin,'%Y-%m-%d') as fecha_fin

                    FROM crm_contratos

                    LEFT JOIN clientes ON crm_contratos.id_cliente=clientes.id

                    LEFT JOIN users ON crm_contratos.id_usuario=users.id

                    WHERE fecha_fin >= CURDATE() 

                    AND fecha_fin <= DATE_ADD(CURDATE(), INTERVAL 30 DAY) and id_usuario=? AND idcn=? LIMIT 10";

            $contratos=DB::select($query_contratos,[$request->user()->id,$request->user()->idcn]);



        }

                
        $fecha = DB::select("select MONTH(CURDATE()) as mes");
        $Año = DB::select("select YEAR(CURDATE()) año");
        $array = array(
            1  => "Enero",
            2  => "Febrero",
            3  => "Marzo",
            4  => "Abril",
            5  => "Mayo",
            6  => "Junio",
            7  => "Julio",
            8  => "Agosto",
            9  => "Septiembre",
            10  => "Octubre",
            11 => "Noviembre",
            12 => "Diciembre"
        );

        $mes= "";
        for( $i = 1; $i<=12;$i++){
            if($fecha[0]->mes == $i )
                $mes = $array[$i] . "-" . $Año[0]->año;
        }
        //dd($contratos);
        $query_clientes = "Select count(id) as con from clientes where  Month(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE()) AND tipo = 2 ";
        $query_pros = "Select count(id) as con from clientes where month(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE()) AND tipo = 1 ";
        $queryMontoCotizaciones = 'SELECT IFNULL(FORMAT(SUM(total),2),"00.00") AS total_cotizaciones FROM crm_cotizaciones WHERE crm_cotizaciones.contrato = 0 AND 
        Month(crm_cotizaciones.fecha_cotizacion) = MONTH(CURDATE()) AND YEAR(crm_cotizaciones.fecha_cotizacion) = YEAR(CURDATE()) ';


        $cli=DB::select($query_clientes);
        $pros=DB::select($query_pros);
        $Mcot =DB::select($queryMontoCotizaciones);

        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $cn = -1;
        }else{
            
                $cn = Auth::user()->idcn;
            
        }

        $cli_pros =  DB::select ("SELECT * from clientes where id_cn = $cn " );

        return view('crm.dashboard.crm-dashboard',[
            "Mcot"=>$Mcot,
            "pros"=>$pros,
            "cli"=>$cli,
            "mes"=>$mes,
            'prospectos'=>$prospectos,
            'agenda'=>$agenda,
            "contrato"=>$contratos,
            "nESE"=>$nESE,
            "cli_pros"=>$cli_pros
        ]);

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

        //

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



    public function cuadrosEstadisticos(Request $request)

    {

        $iduser=$request->user()->id;

        $idcn=$request->user()->idcn;



        if($request->user()->is('admin')){

          $total_cotizaciones = DB::select('SELECT  IFNULL( FORMAT(SUM(total),2),0) AS total_cotizaciones FROM crm_cotizaciones WHERE MONTH(fecha_cotizacion) =  MONTH(CURRENT_DATE()) and contrato=0');

        }else{

           

          $total_cotizaciones = DB::select("SELECT  IFNULL( FORMAT(SUM(total),2),0) AS total_cotizaciones FROM crm_cotizaciones WHERE id_usuario=$iduser and id_cn=$idcn and MONTH(fecha_cotizacion) =  MONTH(CURRENT_DATE()) and contrato=0");

        }

       if($request->user()->is('admin')){

        $total_contratos = DB::select('SELECT IFNULL( FORMAT(SUM(crm_cotizaciones.total),2) , 0) AS total_contratos FROM crm_contratos 

                                            LEFT JOIN crm_cotizaciones ON crm_contratos.id_cotizacion=crm_cotizaciones.id

                                       WHERE MONTH(crm_contratos.fecha_cotizacion) =  MONTH(CURRENT_DATE())');

        }else{

                

          $total_contratos = DB::select("SELECT IFNULL( FORMAT(SUM(crm_cotizaciones.total),2) , 0) AS total_contratos FROM crm_contratos 

                                            LEFT JOIN crm_cotizaciones ON crm_contratos.id_cotizacion=crm_cotizaciones.id

            WHERE crm_contratos.id_usuario=$iduser and crm_contratos.id_cn=$idcn and MONTH(crm_contratos.fecha_cotizacion) =  MONTH(CURRENT_DATE())");

        

        }



        if($request->user()->is('admin')){

        $total_clientes = DB::select("SELECT COUNT(DISTINCT(crm_contratos.id_cliente)) as total_clientes, MONTH(NOW())-1 AS mes_actual

                                      FROM  clientes

                                        LEFT JOIN crm_contratos ON clientes.id=crm_contratos.id_cliente

                                      WHERE clientes.tipo=2 and MONTH(crm_contratos.fecha_cotizacion)= MONTH( current_date() );");

         }else{

             $total_clientes = DB::select("SELECT COUNT(DISTINCT(crm_contratos.id_cliente)) as total_clientes, MONTH(NOW())-1 AS mes_actual

                                      FROM  clientes

                                        LEFT JOIN crm_contratos ON clientes.id=crm_contratos.id_cliente

                                      WHERE clientes.id_user=$iduser and clientes.id_cn=$idcn and clientes.tipo=2 and MONTH(crm_contratos.fecha_cotizacion)= MONTH( current_date() );");



         }

        if($request->user()->is('admin')){

        $total_prospectos = DB::select("SELECT COUNT(*) total_prospectos

                                FROM  clientes

                                WHERE clientes.tipo=1 and MONTH(clientes.created_at)=MONTH(current_date())");

        }else{

         $total_prospectos = DB::select("SELECT COUNT(*) total_prospectos

                                FROM  clientes

                                WHERE clientes.id_user=$iduser and clientes.id_cn=$idcn and clientes.tipo=1 and MONTH(clientes.created_at)=MONTH(current_date())");



        }

        //$Prospectos_clientes = DB::select();

        return response()->json([$total_cotizaciones,$total_contratos,$total_clientes,$total_prospectos]);



    }



    public function portletClientesMes( $fechaIni)

    {

       
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $id_cn = -1;
        }else{
            if(Auth::user()->tipo == "s"){
                $id_cn = Auth::user()->idcn;
            }
        }

        $resultado =  MasterConsultas::exeSQL("deashboard_grafica", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
            
            )
        );

        return response()->json($resultado);

    }

    public function portletCotizacionesMes($fechaIni, $fechaFin){
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $id_cn = -1;
        }else{
            if(Auth::user()->tipo == "s"){
                $id_cn = Auth::user()->idcn;
            }
        }

        $resultado =  MasterConsultas::exeSQL("dashboard_crm_grafico_coti", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            
            )
        );

        return response()->json($resultado);
    }

    public function portletContratosMes($fechaIni, $fechaFin){
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $id_cn = -1;
        }else{
            if(Auth::user()->tipo == "s"){
                $id_cn = Auth::user()->idcn;
            }
        }

        $resultado =  MasterConsultas::exeSQL("dashboard_crm_grafico_contra", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            
            )
        );

        return response()->json($resultado);
    }

    public function portletClientes($fechaIni, $fechaFin){
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $id_cn = -1;
        }else{
            if(Auth::user()->tipo == "s"){
                $id_cn = Auth::user()->idcn;
            }
        }

        $nuevos =  MasterConsultas::exeSQL("dashboard_crm_clientes_nuevos", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            
            )
        );

        $activos =  MasterConsultas::exeSQL("dashboard_crm_clientes_activos", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            
            )
        );

        $inactivos =  MasterConsultas::exeSQL("dashboard_crm_clientes_inactivos", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            
            )
        );

        return response()->json([$nuevos,$activos,$inactivos]);
    }

}


<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;



use App\Http\Requests;

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

    public function filtroDash($mes,$anio){
        $query_clientes = "Select count(id) as con from clientes where  Month(created_at) = {$mes} AND YEAR(created_at) = {$anio} AND tipo = 2 ";
        $query_pros = "Select count(id) as con from clientes where month(created_at) = {$mes} AND YEAR(created_at) = {$anio} AND tipo = 1 ";
        $queryMontoCotizaciones = 'SELECT IFNULL(FORMAT(SUM(total),2),"00.00") AS total_cotizaciones FROM crm_cotizaciones WHERE crm_cotizaciones.contrato = 0 AND 
        Month(crm_cotizaciones.fecha_cotizacion) = '.$mes.' AND YEAR(crm_cotizaciones.fecha_cotizacion) = '.$anio.'';

        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
        }else{
            $queryMontoCotizaciones .= 'AND crm_cotizaciones.id_cn = ' . Auth::user()->idcn;
            $query_clientes.= " AND id_cn = ". Auth::user()->idcn;
            $query_pros .= " AND id_cn = ". Auth::user()->idcn;

        }
        $pros=DB::select($query_pros);
        $cli=DB::select($query_clientes);
        
        $Mcot=DB::select($queryMontoCotizaciones);

        $TotalCota = $Mcot[0]->total_cotizaciones;
        $TotalClientes = $cli[0]->con;
        $TotalProspectos = $pros[0]->con;
        $TotalClientesProspectos = $TotalClientes + $TotalProspectos;

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

        $meses= "";
        for( $i = 1; $i<=12;$i++){
            if($mes == $i )
                $meses = $array[$i] . "-" .$anio;
        }
        return response()->json(["TotalCota"=> $TotalCota,
            "TotalClientes"=>$TotalClientes,
            "TotalProspectos"=>$TotalProspectos,
            "TotalClientesProspectos"=>$TotalClientesProspectos,
            "meses"=>$meses
        ]);

    }
    public function index(Request $request)

    {

        
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

        $query_clientes = "Select count(id) as con from clientes where  Month(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE()) AND tipo = 2 ";
        $query_pros = "Select count(id) as con from clientes where month(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE()) AND tipo = 1 ";
        $queryMontoCotizaciones = 'SELECT IFNULL(FORMAT(SUM(total),2),"00.00") AS total_cotizaciones FROM crm_cotizaciones WHERE crm_cotizaciones.contrato = 0 AND 
        Month(crm_cotizaciones.fecha_cotizacion) = MONTH(CURDATE()) AND YEAR(crm_cotizaciones.fecha_cotizacion) = YEAR(CURDATE()) ';


        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){

             
            
            
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
            $queryMontoCotizaciones .= 'AND crm_cotizaciones.id_cn = ' . Auth::user()->idcn;
            $query_clientes.= " AND id_cn = ?";
            $query_pros .= " AND id_cn = ?";
            
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

                    AND fecha_fin <= DATE_ADD(CURDATE(), INTERVAL 30 DAY) and id_usuario=? AND idcn=? LIMIT 10";

            $contratos=DB::select($query_contratos,[$request->user()->id,$request->user()->idcn]);



        }

                


        //dd($contratos);

        $pros=DB::select($query_pros,[Auth::user()->idcn]);
        $cli=DB::select($query_clientes,[Auth::user()->idcn]);
        $Mcot=DB::select($queryMontoCotizaciones);

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
        return view('crm.dashboard.crm-dashboard',['prospectos'=>$prospectos,
        'mes'=>$mes,
        'pros'=>$pros,
        'cli'=>$cli,
        'ESEinvT'=>$ESEinvT,
        'ESEinvA'=>$ESEinvA,
        'agenda'=>$agenda,"contrato"=>$contratos,"nESE"=>$nESE,
        'Mcot'=>$Mcot]);

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

                

        //dd($contratos);

        return view('crm.dashboard.crm-dashboard',['prospectos'=>$prospectos,'agenda'=>$agenda,"contrato"=>$contratos,"nESE"=>$nESE]);

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



    public function portletClientesMes(Request $request)

    {

        $iduser=$request->user()->id;

        $idcn=$request->user()->idcn;

        if($request->user()->is('admin')){

        $clientes_mes = 'SELECT 

                            MONTH(crm_contratos.fecha_cotizacion) -1 AS meses_cotizaciones,

                            crm_contratos.id_servicio,

                            COUNT(DISTINCT crm_contratos.id_cliente) AS numero_clientes    

                        FROM crm_contratos

                            LEFT JOIN crm_cotizaciones  ON crm_cotizaciones.id = crm_contratos.id_cotizacion

                            LEFT JOIN clientes          ON crm_contratos.id_cliente=clientes.id



                        GROUP BY    

                            meses_cotizaciones,

                            crm_contratos.id_servicio

                        ORDER BY 1';

                        $resultado = DB::select($clientes_mes);

        }else{

            $clientes_mes = "SELECT 

                            MONTH(crm_contratos.fecha_cotizacion) -1 AS meses_cotizaciones,

                            crm_contratos.id_servicio,

                            COUNT(DISTINCT crm_contratos.id_cliente) AS numero_clientes    

                        FROM crm_contratos

                            LEFT JOIN crm_cotizaciones  ON crm_cotizaciones.id = crm_contratos.id_cotizacion

                            LEFT JOIN clientes          ON crm_contratos.id_cliente=clientes.id

                        where crm_contratos.id_usuario=$iduser and crm_contratos.id_cn=$idcn



                        GROUP BY    

                            meses_cotizaciones,

                            crm_contratos.id_servicio

                        ORDER BY 1";

                        $resultado = DB::select($clientes_mes);



        }

        



        return response()->json($resultado);

    }

}


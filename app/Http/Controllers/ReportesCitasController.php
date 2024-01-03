<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ReportesCitasController extends Controller
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
            $query_cn= DB::select("SELECT * FROM centros_negocio");
            $cn_select=['%'=>'Seleccione una CN...',"%"=>'Todos'];
            foreach ($query_cn as  $cn) {
                $cn_select[$cn->id]=$cn->nomenclatura;
            }
             $query_user= DB::select("SELECT * FROM users");
            $user_select=["%"=>'Todos'];
            foreach ($query_user as  $user) {
                $user_select[$user->id]=$user->name;
            }
       return view("crm.reportes.crm-reportes_cita",["cn"=>$cn_select,"user"=>$user_select]);
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

     public function listarCitas(Request $request){

        $fecha_inicio="";
        $fecha_inic="";
            if($request->finicio==''){
            $fecha_inicio=" and agenda.fecha_inicio like '%' ";
            }
                else{
                   $fechai=explode("/",$request->finicio);
                   $fecha_inic=$fechai[2]."-".$fechai[0]."-".$fechai[1];
               }
        
       $fecha_fin="";
      
        if($request->ffin==''){
            $fecha_fin="";
            }
                    else{
               $fechaf=explode("/",$request->ffin);
               $fecha_fin=$fechaf[2]."-".$fechaf[0]."-".$fechaf[1];
           }
    
    $fechas="";
     if($request->finicio!="" and $request->ffin!=""){
     $fechas=" and agenda.fecha_inicio between  DATE_FORMAT('$fecha_inic','%Y-%m-%d') and  DATE_FORMAT('$fecha_fin','%Y-%m-%d')";

     }

        $cn="";
            if($request->cn=='%'){
            $cn="";
            }elseif($request->cn==''){
            $cn="";  
            }else{
                $cn= " and users.idcn=$request->cn";            
            }
          $status="";
            if($request->status=='%'){
            $status="";
            }elseif($request->status==''){
            $status="";
            }
            else{
                $status= " and agenda.status=$request->status";            
            }
        $usuario="";
            if($request->usuario=='%'){
            $usuario="";
            }elseif($request->usuario==''){
            $usuario="";
            }else{
                $usuario= " and agenda.id_usuario=$request->usuario";    
            }

        $queryAgenda="";
        $queryAgenda.="SELECT ".
               "agenda.id as ideve,".
               "agenda.evento as evento,".
               "agenda.fecha_inicio as start,".
               "agenda.fecha_fin as end,".
               "agenda.hora_inicio as h_start,".
               "agenda.hora_fin as h_end,".
               "users.name as name ".
               "FROM agenda ".
               "left join users on agenda.id_usuario=users.id ";
/*
        $queryAgenda.="WHERE agenda.status=1 and agenda.id_usuario= ? and users.idcn=?";
        $agendaList =  DB::select($queryAgenda,[$request->user()->id,$request->user()->idcn]);
        */
        if($request->user()->is('admin')){
        $queryAgenda.="WHERE 1=1".$status.$usuario.$cn.$fechas.$fecha_inicio;
        $agendaList =  DB::select($queryAgenda);
        }else{
        $queryAgenda.="WHERE agenda.id_usuario=? and users.idcn=? ".$status.$fechas.$fecha_inicio;
        $agendaList =  DB::select($queryAgenda,[$request->user()->id,$request->user()->idcn]);
        }
       // dd($queryAgenda);

               return response()->json($agendaList);




     }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Agenda;
use DB;
/* ----Pertenecen a modelos del Kardex -- */
use App\Administrador\Kardex;
use App\Administrador\Modulo;
use App\Administrador\SubModulo;
use App\Administrador\Accion;
/* ----Pertenecen al Kardex -- */

class agendaController extends Controller
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
        if($request->user()->is('admin')){
        $queryAgenda="SELECT ".
               "agenda.id as ideve,".
               "agenda.evento as evento,".
               "agenda.fecha_inicio as start,".
               "agenda.fecha_fin as end ".
               "FROM agenda ".
               "left join users on agenda.id_usuario=users.id ".
               "WHERE agenda.status=1";

        $agendaList =  DB::select($queryAgenda);
    }else{
        $queryAgenda="SELECT ".
               "agenda.id as ideve,".
               "agenda.evento as evento,".
               "agenda.fecha_inicio as start,".
               "agenda.fecha_fin as end ".
               "FROM agenda ".
               "left join users on agenda.id_usuario=users.id ".
               "WHERE agenda.status=1 and agenda.id_usuario= ?";

        $agendaList =  DB::select($queryAgenda,[$request->user()->id]);

    }


         return view('crm.agenda.crm-agenda',['agendaList'=>$agendaList]);
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
        $agenda=Agenda::create($request->all());
        $final_f_inicio=$agenda->fecha_inicio;
        $final_f_fin=$agenda->fecha_fin;
        $hr_inicio=$agenda->hora_inicio;
        $hr_fin=$agenda->hora_fin;
        $agenda->f_inicio=$final_f_inicio."T".$hr_inicio;
        $agenda->f_fin=$final_f_fin."T".$hr_fin;
        $agenda->save();
        if($agenda)
        {
           $id_modulo=Modulo::where('slug','crm')->get();
           $id_SubModulo=SubModulo::where('slug','crm.agenda')->get();
           $id_accion=Accion::where('slug','alta')->get();
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$agenda->id,
            'descripcion'=>'Se Agendo un evento. Descripción: '.$agenda->evento.'Fecha:'.$final_f_inicio .' a '. $final_f_fin.' Hora:'.$hr_inicio.' a '.$hr_fin
            ]);
            $Kardex->save();
            return response()->json(['status_alta'=>'success']);
        }
        else
        {
          return response()->json(['status_alta'=>'wrong']);   
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
        
         $queryAgenda="SELECT ".
               "agenda.id as ideve,".
               "agenda.evento as evento,".
               "agenda.fecha_inicio as start,".
               "agenda.fecha_fin as end ".
               "FROM agenda ".
               "left join users on agenda.id_usuario=users.id ".
               "WHERE agenda.id_usuario= ?";

        $agendaList =  DB::select($queryAgenda,[$id]);
   
        return view("crm.agenda.crm-agenda",['agendaList'=>$agendaList]);
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

        $cancel=null;
        $cancel =Agenda::find($id);
        $cancel->status=0;// 1 evento activo y 0 cancelado
               $cancel->save();

       /* $cancelEvent= $request->input('cancel');
            for($i=0; $i < count($cancelEvent); $i++){
               $cancel =Agenda::find($cancelEvent[$i]);
               $cancel->status=0;// 1 evento activo y 0 cancelado
               $cancel->save();
}*/
    if($cancel){

           $id_modulo=Modulo::where('slug','crm')->get();
           $id_SubModulo=SubModulo::where('slug','crm.agenda')->get();
           $id_accion=Accion::where('slug','baja')->get();
           $Kardex=Kardex::create([
            'id_cn'=>$request->user()->idcn,
            'id_usuario'=>$request->user()->id,
            'id_modulo'=>$id_modulo[0]->id,
            'id_submodulo'=>$id_SubModulo[0]->id,
            'id_accion'=>$id_accion[0]->id,
            'id_objeto'=>$cancel->id,
            'descripcion'=>'Se Cancelo el siguiente evento de la Agenda. Descripción: '.$cancel->evento.'Fecha:'.$cancel->fecha_inicio .' a '. $cancel->fecha_fin.' Hora:'.$cancel->hora_inicio.' a '.$cancel->hora_fin
            ]);
            $Kardex->save();
        return response()->json(['status_alta'=>'success']);
     }
        return response()->json(['status_alta'=>'wrong']);
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
    public function listadoEventos(Request $request)
    {

        $query="SELECT ".
               "evento as title,".
               "f_inicio as start,".
               "f_fin as end ".
               "FROM agenda ".
               "left join users on agenda.id_usuario=users.id ".
               "WHERE agenda.status=1 and agenda.id_usuario=".$request->iduser;

        $agenda =  DB::select($query);

        return response()->json($agenda);

    } 
}

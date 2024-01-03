<?php

namespace App\Http\Controllers\Encuestas\controladorSugerencias;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\EstudioEse;
use Carbon\Carbon;
use App\User;
use App\CentroNegocio;
use Illuminate\Support\Collection;
use App\MasterClientes;
use App\Bussines\Dashboard;
use DB;
use App\Bussines\MasterConsultas;
use Illuminate\Support\Facades\Redirect;


class SugerenciasController extends Controller
{   

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index($IdCliente, $IdPeriodo){
        $centros = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
        WHERE es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo);

        $quejas = MasterConsultas::exeSQL("ev_tipo_quejas", "READONLY",
        array(
            "IdTipoQueja" => '-1'
        ));

        $datosCliente = DB::select('select * from clientes where id='.$IdCliente);

        $datosServ = DB::select('select * from ev_servicio where IdCliente='.$IdCliente.' AND IdPeriodo='.$IdPeriodo);

        $FechaLimit = date("d-m-Y", strtotime($datosServ[0]->dFechaVigenciaLink));
        $now= Carbon::now();
        $fechaactual = $now->format('d-m-Y');

            return view("Encuestas.sugerencias.index",
            ['idCliente'=>$IdCliente, 
            'idPeriodo'=>$IdPeriodo,
            'centros'=>$centros,
            'quejas'=>$quejas,
            'datosCliente'=>$datosCliente,
            'datosServ'=>$datosServ, 'fechaactual'=>$fechaactual, 'FechaLimit'=>$FechaLimit]);
        
    }

    public function storeSug(Request $request){
        //$buscar = DB::select('select * from ev_sugerencias where IdCliente = '.$request->idCliente.' AND Anonimo = "No" AND Correo = "'.$request->correoqueja.'"');

        //$arrayvacio=empty($buscar);

        

        $AltaTiposServicio=MasterConsultas::exeSQLStatement("ev_create_sugerencias", "UPDATE",
                    array(
                        "Comentario" => $request->mensaje,
                        "Personal" => "",
                        "Cliente" => $request->idCliente,
                        "Centro" => $request->centroqueja,
                        "Queja" => $request->tipoqueja,
                        "Anonimo" => $request->anonimo,
                        "Nombre" => $request->nombrequeja,
                        "Correo" => $request->correoqueja
                    )
        );

        return redirect()->back()->with(['success' => 'Comentario enviado con éxito.',
                'type' => 'success']);
        
    }

}

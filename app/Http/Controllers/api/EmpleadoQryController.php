<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\Bussines\MobileLogin;

class EmpleadoQryController extends Controller
{
    public function datos(Request $request, $idPersonal)
    {
        //$data = dd(json_decode($request->getContent(), true));
       // $idEmpleado = $request->input('idPersonal');

        $response["body"]["data"]["count"] = 0;
        $response["body"]["data"]["rows"] = [];

        $msql = MasterConsultas::exeSQL('mob_usuario_info','READONLY',array("IdPersonal"=>$idPersonal));

        if (isset($msql))
        {
            $msql[0]->Imagen = url('/') . '/resources/empleado_foto?IdPersonal='.$idPersonal;

            $response["body"]["data"]["count"] = count($msql);
            $response["body"]["data"]["rows"] = $msql;
        }

        return Response::JSON($response) ;
    }

    public function historicoAhorro(Request $request, $idPersonal, $page, $results)
    {
        //$data = dd(json_decode($request->getContent(), true));
        //$idEmpleado = $request->input('idPersonal');
        $msql = MasterConsultas::exePagedSQL('mob_master_personalhistorialAhorro','READONLY',$page, $results,
            array("IdPersonal"=>$idPersonal));

        if (isset($msql))
        {
            $response["body"] = $msql ; // count($msql);
        }
        return Response::JSON($response) ;

    }

    public function historicoPermisosAusencia(Request $request, $idPersonal, $page, $results)
    {

        $msql = MasterConsultas::exePagedSQL('mob_master_personalhistorialpermisos','READONLY',$page, $results,
            array("IdPersonal"=>$idPersonal));

        if (isset($msql))
        {
            $response["body"] = $msql ; // count($msql);
        }

        return Response::JSON($response) ;
    }

    public function historicoAusenciaIncapacidades(Request $request, $idPersonal, $page, $results)
    {
        $msql = MasterConsultas::exePagedSQL('mob_master_personalincapacidad','READONLY',$page, $results,
            array("IdPersonal"=>$idPersonal));

        if (isset($msql))
        {
            $response["body"] = $msql ; // count($msql);
        }
        return Response::JSON($response) ;
    }

    public function historicoVacaciones(Request $request, $idPersonal, $page, $results)
    {
        $msql = MasterConsultas::exePagedSQL('mob_master_personalvacaciones','READONLY',$page, $results,
            array("IdPersonal"=>$idPersonal));

        if (isset($msql))
        {
            $response["body"] = $msql ; // count($msql);
        }
        return Response::JSON($response) ;
    }

    public function historicoPrestamos(Request $request, $idPersonal, $page, $results)
    {

        $msql = MasterConsultas::exePagedSQL('mob_nom_prestamos','READONLY',$page, $results,
            array("IdPersonal"=>$idPersonal));

        if (isset($msql))
        {
            $response["body"] = $msql ; // count($msql);
        }
        return Response::JSON($response) ;
    }
}

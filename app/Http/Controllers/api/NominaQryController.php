<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use App\Bussines\MobileLogin;

class NominaQryController extends Controller
{

    public function nominaInfo(Request $request, $idPersonal, $page, $results)
    {
        //$data = dd(json_decode($request->getContent(), true));
        $msql = MasterConsultas::exePagedSQL('mob_nom_header','READONLY',$page, $results,
            array("IdPersonal"=>$idPersonal));

        if (isset($msql))
        {
            $response["body"] = $msql ; // count($msql);
        }
        return $response ;
    }

    public function nominaDetalle(Request $request , $idPersonal,$idNomina, $page, $results)
    {
        //$data = dd(json_decode($request->getContent(), true));

        $msql = MasterConsultas::exePagedSQL('mob_nom_header','READONLY',$page, $results,
            array("IdPersonal"=>$idPersonal));

        if (isset($msql))
        {
            $response["body"] = $msql ; // count($msql);
        }
        return $response ;
    }

}

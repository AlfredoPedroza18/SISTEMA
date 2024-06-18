<?php

namespace app\Bussines;

use App\Bussines\MasterConsultas;

use DB;
use Illuminate\Support\Facades\Auth;
use Twilio\TwiML\Voice\Client;

class DashboardPL

{


    public function Filtros($IdCliente, $IdAnalista, $IdTipo, $Estatus, $Datein, $Dateend, $solicitanteF)
    {
        
        $ini = $Datein;
        $fin = $Dateend;

        $idCn = -1;
        if (auth()->user()->is('admin') || auth()->user()->is('adminvalkyrie') || auth()->user()->is('admingent') || auth()->user()->is('admindesarrollo')) {
        } else {
            if (Auth::user()->tipo == "s")
                $idCn = Auth::user()->idcn;
        }

        $totalPruebas = DB::select("SELECT COUNT(es.id) as total FROM eis_servicios es 
                                INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                INNER JOIN clientes cli ON cli.id = es.IdClientes
                                WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini')
                                AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                AND (-1=$IdAnalista OR (-1<>$IdAnalista AND es.Id_analista = $IdAnalista))
                                AND (-1=$IdTipo OR (-1<>$IdTipo AND es.tipo = $IdTipo))
                                AND ('-1'='$Estatus' OR ('-1'<>'$Estatus' AND es.Estatus = '$Estatus'))
                                AND ('-1'='$solicitanteF' OR ('-1'<>'$solicitanteF' AND esd.Solicitante = '$solicitanteF'))
                                ORDER BY cli.nombre ASC
                            ");


        $totalPruebaTipo = DB::select("SELECT (SELECT COUNT(es.id) as total FROM eis_servicios es 
                                    INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                    INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                    INNER JOIN clientes cli ON cli.id = es.IdClientes
                                    WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini')
                                    AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                    AND (-1=$IdAnalista OR (-1<>$IdAnalista AND es.Id_analista = $IdAnalista))
                                    AND (-1=$IdTipo OR (-1<>$IdTipo AND es.tipo = $IdTipo))
                                    AND ('-1'='$Estatus' OR ('-1'<>'$Estatus' AND es.Estatus = '$Estatus'))
                                    AND ('-1'='$solicitanteF' OR ('-1'<>'$solicitanteF' AND esd.Solicitante = '$solicitanteF'))
                                    AND es.tipo = tp.id
                                    ORDER BY cli.nombre ASC) total2, tp.nombre
                                    FROM eis_servicio_tipo tp;
                                ");

        $totalPruebaEstatus = DB::select("SELECT (SELECT COUNT(es.id) as total FROM eis_servicios es 
                                    INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                    INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                    INNER JOIN clientes cli ON cli.id = es.IdClientes
                                    WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini')
                                    AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                    AND (-1=$IdAnalista OR (-1<>$IdAnalista AND es.Id_analista = $IdAnalista))
                                    AND (-1=$IdTipo OR (-1<>$IdTipo AND es.tipo = $IdTipo))
                                    AND ('-1'='$Estatus' OR ('-1'<>'$Estatus' AND es.Estatus = '$Estatus'))
                                    AND ('-1'='$solicitanteF' OR ('-1'<>'$solicitanteF' AND esd.Solicitante = '$solicitanteF'))
                                    AND es.Estatus = tp.estatus
                                    ORDER BY cli.nombre ASC) total2, tp.estatus
                                    FROM eis_status tp;
                                ");

        $clientesPl2 = DB::select("SELECT DISTINCT cli.nombre_comercial AS nombre, cli.id FROM eis_servicios es 
            INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
            INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
            INNER JOIN clientes cli ON cli.id = es.IdClientes
            WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini')
            AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
            AND (-1=$IdAnalista OR (-1<>$IdAnalista AND es.Id_analista = $IdAnalista))
            AND (-1=$IdTipo OR (-1<>$IdTipo AND es.tipo = $IdTipo))
            AND ('-1'='$Estatus' OR ('-1'<>'$Estatus' AND es.Estatus = '$Estatus'))
            AND ('-1'='$solicitanteF' OR ('-1'<>'$solicitanteF' AND esd.Solicitante = '$solicitanteF'))
                        ORDER BY cli.nombre ASC
        ");

        $solicitantePl2 = DB::select("SELECT DISTINCT esd.Solicitante FROM eis_servicios es 
            INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
            INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
            INNER JOIN clientes cli ON cli.id = es.IdClientes
            WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini')
            AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
            AND (-1=$IdAnalista OR (-1<>$IdAnalista AND es.Id_analista = $IdAnalista))
            AND (-1=$IdTipo OR (-1<>$IdTipo AND es.tipo = $IdTipo))
            AND ('-1'='$Estatus' OR ('-1'<>'$Estatus' AND es.Estatus = '$Estatus'))
            AND ('-1'='$solicitanteF' OR ('-1'<>'$solicitanteF' AND esd.Solicitante = '$solicitanteF'))
            ORDER BY cli.nombre ASC
        ");

        $analistaPl2 = DB::select("SELECT DISTINCT CONCAT(us.name,' ', IFNULL(us.apellido_paterno,''),' ', IFNULL(us.apellido_materno,'')) AS nombre , us.id AS id FROM eis_servicios es 
            INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
            INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
            INNER JOIN clientes cli ON cli.id = es.IdClientes
            INNER JOIN users us ON us.id = es.Id_analista
            WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini')
            AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
            AND (-1=$IdAnalista OR (-1<>$IdAnalista AND es.Id_analista = $IdAnalista))
            AND (-1=$IdTipo OR (-1<>$IdTipo AND es.tipo = $IdTipo))
            AND ('-1'='$Estatus' OR ('-1'<>'$Estatus' AND es.Estatus = '$Estatus'))
            AND ('-1'='$solicitanteF' OR ('-1'<>'$solicitanteF' AND esd.Solicitante = '$solicitanteF'))
            ORDER BY cli.nombre ASC;
        ");


        return [
            "totalPruebas"=>$totalPruebas[0]->total,
            "totalPruebaTipo"=>$totalPruebaTipo,
            "totalPruebaEstatus"=>$totalPruebaEstatus,
            "clientesPl2"=>$clientesPl2,
            "solicitantePl2"=>$solicitantePl2,
            "analistaPl2"=>$analistaPl2

        ];
    }

    public function initDataDashboard()

    {
        $log = DB::select(
            "SELECT logo as logo from master_ese_logo"
        );

        $logo = "";
        foreach ($log as $l) {
            $logo = $l->logo;
        }

        $IdCliente = -1;
        if (Auth::user()->tipo == "c") 
            $IdCliente =Auth::user()->IdCliente;

        $fecha= date("Y-m-d");
		$nuevafecha = strtotime ( '-30 day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
        
        $ini = $nuevafecha;
        $fin = $fecha;

        $idCn = -1;
        if (auth()->user()->is('admin') || auth()->user()->is('adminvalkyrie') || auth()->user()->is('admingent') || auth()->user()->is('admindesarrollo')) {
        } else {
            if (Auth::user()->tipo == "s")
                $idCn = Auth::user()->idcn;
        }

        $clientesPl = DB::select("SELECT DISTINCT cli.nombre_comercial AS nombre , cli.id AS idc FROM eis_servicios es 
                            INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                            INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                            INNER JOIN clientes cli ON cli.id = es.IdClientes
                            WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn))
                            AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                            ORDER BY cli.nombre ASC;
                        ");

        $analistaPl = DB::select("SELECT DISTINCT CONCAT(us.name,' ', IFNULL(us.apellido_paterno,''),' ', IFNULL(us.apellido_materno,'')) AS nombre , us.id AS id FROM eis_servicios es 
                            INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                            INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                            INNER JOIN clientes cli ON cli.id = es.IdClientes
                            INNER JOIN users us ON us.id = es.Id_analista
                            WHERE (-1=$idCn OR (-1<>$idCn AND us.idcn = $idCn))
                            AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                            ORDER BY cli.nombre ASC;
                        ");

        $tipoPruebaPl = DB::select("SELECT * FROM eis_servicio_tipo est");


        $solicitantePl = DB::select("SELECT DISTINCT esd.Solicitante FROM eis_servicios es 
                                INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                INNER JOIN clientes cli ON cli.id = es.IdClientes
                                WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn))
                                AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                ORDER BY cli.nombre ASC;
                            ");

        $totalPruebas = DB::select("SELECT COUNT(es.id) as total FROM eis_servicios es 
                                INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                INNER JOIN clientes cli ON cli.id = es.IdClientes
                                WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini')
                                AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                ORDER BY cli.nombre ASC
                            ");

        $totalPruebaTipo = DB::select("SELECT (SELECT COUNT(es.id) as total FROM eis_servicios es 
                                INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                INNER JOIN clientes cli ON cli.id = es.IdClientes
                                WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini') AND es.tipo = tp.id
                                AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                ORDER BY cli.nombre ASC) total2, tp.nombre
                                FROM eis_servicio_tipo tp;
                            ");
        
        $totalPruebaEstatus = DB::select("SELECT (SELECT COUNT(es.id) as total FROM eis_servicios es 
                                INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                INNER JOIN clientes cli ON cli.id = es.IdClientes
                                WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini') AND es.Estatus = tp.estatus
                                AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                ORDER BY cli.nombre ASC) total2, tp.estatus
                                FROM eis_status tp;
                            ");

        $clientesPl2 = DB::select("SELECT DISTINCT cli.nombre_comercial AS nombre, cli.id FROM eis_servicios es 
                                INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                INNER JOIN clientes cli ON cli.id = es.IdClientes
                                WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini')
                                AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                ORDER BY cli.nombre ASC
                            ");

        $solicitantePl2 = DB::select("SELECT DISTINCT esd.Solicitante FROM eis_servicios es 
                                INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                INNER JOIN clientes cli ON cli.id = es.IdClientes
                                WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini')
                                AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                ORDER BY cli.nombre ASC
                            ");

        $analistaPl2 = DB::select("SELECT DISTINCT CONCAT(us.name,' ', IFNULL(us.apellido_paterno,''),' ', IFNULL(us.apellido_materno,'')) AS nombre , us.id AS id FROM eis_servicios es 
                                INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                INNER JOIN clientes cli ON cli.id = es.IdClientes
                                INNER JOIN users us ON us.id = es.Id_analista
                                WHERE (-1=$idCn OR (-1<>$idCn AND us.idcn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini')
                                AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                ORDER BY cli.nombre ASC;
                            ");


        return [


            "clientesPl" => $clientesPl,
            "tipoPruebaPl" => $tipoPruebaPl,
            "analistaPl" => $analistaPl,
            "solicitantePl" => $solicitantePl,
            "totalPruebas" => $totalPruebas[0]->total,
            "totalPruebaTipo" => $totalPruebaTipo,
            "totalPruebaEstatus" => $totalPruebaEstatus, 
            "clientesPl2" => $clientesPl2,
            "solicitantePl2" => $solicitantePl2,
            "analistaPl2" => $analistaPl2,
            "logo" => $logo,


        ];
    }

   
    public function GetDataChartDashboard($Id, $Dateini, $Dateend)

    {

        $fin = $Dateend;
        $ini =  $Dateini;

        $IdCliente = -1;
        if (Auth::user()->tipo == "c") 
            $IdCliente =Auth::user()->IdCliente;

        $idCn =-1;
        if (auth()->user()->is('admin') || auth()->user()->is('adminvalkyrie') || auth()->user()->is('admingent') || auth()->user()->is('admindesarrollo')) {
        } else {
            if (Auth::user()->tipo == "s")
                $idCn = Auth::user()->idcn;
        }

        
        $totalPruebaTipo = DB::select("SELECT (SELECT COUNT(es.id) as total FROM eis_servicios es 
                                INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                INNER JOIN clientes cli ON cli.id = es.IdClientes
                                WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini') AND es.tipo = tp.id
                                AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                ORDER BY cli.nombre ASC) total2, tp.nombre
                                FROM eis_servicio_tipo tp;
                            ");
        
        $totalPruebaEstatus = DB::select("SELECT (SELECT COUNT(es.id) as total FROM eis_servicios es 
                                INNER JOIN eis_servicio_detalle esd ON esd.IdServicio = es.Id
                                INNER JOIN eis_servicio_tipo est ON est.id = es.tipo 
                                INNER JOIN clientes cli ON cli.id = es.IdClientes
                                WHERE (-1=$idCn OR (-1<>$idCn AND cli.id_cn = $idCn)) AND (CAST(es.creacion AS DATE) <= '$fin' AND CAST(es.creacion AS DATE) >= '$ini') AND es.Estatus = tp.estatus
                                AND (-1=$IdCliente OR (-1<>$IdCliente AND es.IdClientes = $IdCliente))
                                ORDER BY cli.nombre ASC) total2, tp.estatus
                                FROM eis_status tp;
                            ");

        return [

            "totalPruebaTipo" => $totalPruebaTipo,
            "totalPruebaEstatus" => $totalPruebaEstatus

        ];
    }

 
}

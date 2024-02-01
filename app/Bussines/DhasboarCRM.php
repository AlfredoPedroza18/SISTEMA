<?php

namespace app\Bussines;

use App\Bussines\MasterConsultas;

use DB;
use Illuminate\Support\Facades\Auth;
use Twilio\TwiML\Voice\Client;

class DhasboarCRM

{

    public function filtrosDash($fechaIni,$fechaFin,$tipo,$cliente,$accion,$cn){

        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
                $id_cn = $cn;
        }else{
            if(Auth::user()->tipo == "s"){
                $id_cn = Auth::user()->idcn;
            }
        }

        if($tipo == 2){
            $TotalClientes =  MasterConsultas::exeSQL("dashboard_crm_totalClientesFiltro", "READONLY",
                array(
                    "tipo" => $tipo,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );

            $TotalProspectos =  MasterConsultas::exeSQL("dashboard_crm_totalClientesFiltro", "READONLY",
                array(
                    "tipo" => 3,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );

            $Clientes = MasterConsultas::exeSQL("dashboard_crm_clientes_filtro", "READONLY",
                array(
                    "tipo" => $tipo,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );

            $Prospectos = MasterConsultas::exeSQL("dashboard_crm_prospectos_filtro", "READONLY",
                array(
                    "tipo" => 3,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );
        }elseif($tipo == 1){
            $TotalClientes =  MasterConsultas::exeSQL("dashboard_crm_totalClientesFiltro", "READONLY",
                array(
                    "tipo" => 3,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );

            $TotalProspectos =  MasterConsultas::exeSQL("dashboard_crm_totalClientesFiltro", "READONLY",
                array(
                    "tipo" => $tipo,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );

            $Clientes = MasterConsultas::exeSQL("dashboard_crm_clientes_filtro", "READONLY",
                array(
                    "tipo" => 3,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );

            $Prospectos = MasterConsultas::exeSQL("dashboard_crm_prospectos_filtro", "READONLY",
                array(
                    "tipo" => $tipo,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );
        }elseif($tipo == -1){
            $TotalClientes =  MasterConsultas::exeSQL("dashboard_crm_totalClientesFiltro", "READONLY",
                array(
                    "tipo" => 2,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );

            $TotalProspectos =  MasterConsultas::exeSQL("dashboard_crm_totalClientesFiltro", "READONLY",
                array(
                    "tipo" => 1,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );

            $Clientes = MasterConsultas::exeSQL("dashboard_crm_clientes_filtro", "READONLY",
                array(
                    "tipo" => 2,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );

            $Prospectos = MasterConsultas::exeSQL("dashboard_crm_prospectos_filtro", "READONLY",
                array(
                    "tipo" => 1,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
            );
        }

        $TotalClientesProspectos =   MasterConsultas::exeSQL("dashboard_crm_totalClientesFiltro", "READONLY",
                array(
                    "tipo" => $tipo,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
         );


        $TotalCotizaiconesMonto =  MasterConsultas::exeSQL("dashboard_crm_totalCotizaiconesMonto_filtro", "READONLY",
                array(
                    "tipo" => $tipo,
                    "id_cn"=>$id_cn, 
                    "fechaIni"=>$fechaIni,
                    "fechaFin"=>$fechaFin,
                    "accion" => $accion,
                    "cliente" => $cliente
                )
        );

        $TotalCotizaiconesCantidad =  MasterConsultas::exeSQL("dashboard_crm_totalCotizacionesCantidad_filtro", "READONLY",
            array(
                "tipo" => $tipo,
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin,
                "accion" => $accion,
                "cliente" => $cliente
            )
        );

        $TotalContratosMonto =  MasterConsultas::exeSQL("dashboard_crm_totalContratosMonto_filtro", "READONLY",
            array(
                "tipo" => $tipo,
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin,
                "accion" => $accion,
                "cliente" => $cliente
            )
        );

        $TotalContratosCantidad =  MasterConsultas::exeSQL("dahsboard_crm_totalContratosCantidad_filtro", "READONLY",
            array(
                "tipo" => $tipo,
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin,
                "accion" => $accion,
                "cliente" => $cliente
            )
        );

       
        $Asignacion = MasterConsultas::exeSQL("dashboard_crm_asignacion", "READONLY",
        array(
            "id_cn"=>$id_cn, 
            "fechaIni"=>$fechaIni,
            "fechaFin"=>$fechaFin
            )
        );

        $Accion = MasterConsultas::exeSQL("dashboard_crm_accion_filtro", "READONLY",
            array(
                "tipo" => $tipo,
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin,
                "accion" => $accion,
                "cliente" => $cliente
            )
        );

        return ["TotalClientes" => $TotalClientes, 'TotalProspectos'=> $TotalProspectos,"TotalClientesProspectos" => $TotalClientesProspectos,
        "TotalCotizaiconesMonto"=>$TotalCotizaiconesMonto,"TotalCotizaiconesCantidad"=>$TotalCotizaiconesCantidad,"TotalContratosMonto"=>$TotalContratosMonto,"TotalContratosCantidad"=>$TotalContratosCantidad,
        "Clientes" => $Clientes, "Prospectos"=>$Prospectos,"Asignacion"=>$Asignacion,"Accion"=>$Accion];
    }

    public function iniciarDataosDashboard ($fechaIni,$fechaFin){
        
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $id_cn = -1;
        }else{
            if(Auth::user()->tipo == "s"){
                $id_cn = Auth::user()->idcn;
            }
        }

        $TotalClientes =  MasterConsultas::exeSQL("dashboard_crm_totalClientes", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            )
        );

        $TotalProspectos =  MasterConsultas::exeSQL("dashboard_crm_totalProspectos", "READONLY",
            array(
                "id_cn"=>$id_cn,
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            )
        );

        $TotalClientesProspectos =  MasterConsultas::exeSQL("dashboard_crm_totalClientesProspectos", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            )
        );

        $TotalCotizaiconesMonto =  MasterConsultas::exeSQL("dashboard_crm_totalCotizaiconesMonto", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            )
        );

        $TotalCotizaiconesCantidad =  MasterConsultas::exeSQL("dashboard_crm_totalCotizaiconesCantidad", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            )
        );

        $TotalContratosMonto =  MasterConsultas::exeSQL("dashboard_crm_totalContratosMonto", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            )
        );

        $TotalContratosCantidad =  MasterConsultas::exeSQL("dashboard_crm_totalContratosCantidad", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            )
        );

        $Clientes = MasterConsultas::exeSQL("dashboard_crm_Clientes", "READONLY",
            array(
                "id_cn"=>$id_cn, 
                "fechaIni"=>$fechaIni,
                "fechaFin"=>$fechaFin
            )
        );

        $Prospectos = MasterConsultas::exeSQL("dashboard_crm_Prospectos", "READONLY",
        array(
            "id_cn"=>$id_cn, 
            "fechaIni"=>$fechaIni,
            "fechaFin"=>$fechaFin
            )
        );
       
        $Asignacion = MasterConsultas::exeSQL("dashboard_crm_asignacion", "READONLY",
        array(
            "id_cn"=>$id_cn, 
            "fechaIni"=>$fechaIni,
            "fechaFin"=>$fechaFin
            )
        );

        $Accion = MasterConsultas::exeSQL("dashboard_crm_accion", "READONLY",
        array(
            "id_cn"=>$id_cn, 
            "fechaIni"=>$fechaIni,
            "fechaFin"=>$fechaFin
            )
        );
        
        
        
        return [ "TotalClientes" => $TotalClientes, 'TotalProspectos'=> $TotalProspectos,"TotalClientesProspectos" => $TotalClientesProspectos,
                 "TotalCotizaiconesMonto"=>$TotalCotizaiconesMonto,"TotalCotizaiconesCantidad"=>$TotalCotizaiconesCantidad,"TotalContratosMonto"=>$TotalContratosMonto,"TotalContratosCantidad"=>$TotalContratosCantidad,
                 "Clientes" => $Clientes, "Prospectos"=>$Prospectos,"Asignacion"=>$Asignacion,"Accion"=>$Accion
                ];
    } 

    public function filtros($tipo ){

    } 

}
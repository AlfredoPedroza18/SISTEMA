<?php

namespace App\Http\Controllers\Encuestas;
   

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

class AccionesEntornoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request,$id,$id2) {

        $arrayCentros = [];
        $arrayDepartamentos = [];
        $arrayGenero = [];
        $arrayEdad = [];
        $arrayEstadoCivil = [];
        $arrayNivelEstudio = [];
        $arrayPuesto = [];
        $arrayTipoPuesto = [];
        $i = 0;

        $datosCliente = DB::select('SELECT c.nombre_comercial,ep.Fecha FROM clientes c INNER JOIN ev_periodos ep WHERE c.id ='.$id.' AND ep.IdPeriodo ='.$id2);
        //consultas para llenar los filtros
        $genero = MasterConsultas::exeSQL("ev_genero", "READONLY",
            array(
                "IdGenero" => -1
            )
        );

        // foreach($genero as $row){
        //     $arrayGenero[$i] = $row->Descripcion;
        //     $i++;
        // }

        $antiguedad = MasterConsultas::exeSQL("ev_antiguedad", "READONLY",
            array(
                "IdAntiguedad" => -1
            )
        );


        // $departamentos = MasterConsultas::exeSQL("ev_departamento_encuesta", "READONLY",
        //     array(
        //         "IdCliente" => $id
        //     )
        // );
        $estadocivil = MasterConsultas::exeSQL("ev_estadocivil", "READONLY",
            array(
                "IdEstadoCivil" => -1
            )
        );
        $experiencialaboral = MasterConsultas::exeSQL("ev_experiencialaboral", "READONLY",
            array(
                "IdExperiencia" => -1
            )
        );
        $puestocliente = MasterConsultas::exeSQL("ev_puesto_encuesta", "READONLY",
            array(
                "IdCliente" => $id
            )
        );
        $rangoedad = MasterConsultas::exeSQL("ev_rango_edad", "READONLY",
            array(
                "IdRango" => -1
            )
        );
        $tipocontrato = MasterConsultas::exeSQL("ev_tipo_contrato", "READONLY",
            array(
                "IdTipoContrato" => -1
            )
        );
        $tipojornada = MasterConsultas::exeSQL("ev_tipo_jornada", "READONLY",
            array(
                "IdTipoJornada" => -1
            )
        );
        $tipopersonal = MasterConsultas::exeSQL("ev_tipo_personal", "READONLY",
            array(
                "IdTipoPersonal" => -1
            )
        );
        $tipopuesto = MasterConsultas::exeSQL("ev_tipo_puesto", "READONLY",
            array(
                "IdTipoPuesto" => -1
            )
        );
        $nivelestudios = MasterConsultas::exeSQL("master_nivel_estudios", "READONLY",
            array(
                "IdNivelEstudio" => -1
            )
        );
        $centrostrabajo = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
        WHERE es.IdCliente = ".$id." and es.IdPeriodo = ".$id2);


        $departamentos = DB::select("SELECT ed.IdDeptoCliente,ed.Descripcion
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON esc.IdServicio = es.IdServicio
        INNER JOIN ev_servicio_detalle esd
        ON esd.IdServicio_cliente = esc.IdServicio_cliente
        INNER JOIN ev_personal ep
        ON ep.IdPersonal = esd.IdPersonal
        INNER JOIN ev_departamentos ed
        ON ed.IdDeptoCliente = ep.IdDeptoCliente
        where es.IdCliente =".$id." and es.IdPeriodo =".$id2." and esd.IdEncuesta = 12 GROUP BY ed.IdDeptoCliente;");


        $cantidadCentros = count($centrostrabajo);

        $IdPeriodo = $id2;
        $IdCliente = $id; 
        $suma = 0;

        $cantidadEncuestas = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
        WHERE es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo);

        $cantEncuestas = DB::select("select * 
        from ev_servicio es
        inner join ev_servicio_cliente esc
        on esc.IdServicio = es.IdServicio
        inner join ev_servicio_detalle esd
        on esd.IdServicio_cliente = esc.IdServicio_cliente
        where es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo." and esd.IdEncuesta = 12 and (esd.Estatus = 'Finalizado' or esd.Estatus = 'Proceso') group by esd.IdPersonal");

        $centrostrabajo22 = DB::select("select * 
        from ev_servicio es
        inner join ev_servicio_cliente esc
        on esc.IdServicio = es.IdServicio
        inner join ev_servicio_detalle esd
        on esd.IdServicio_cliente = esc.IdServicio_cliente
        where es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo." and esd.IdEncuesta = 12 and (esd.Estatus = 'Finalizado' or esd.Estatus = 'Proceso') group by esc.IdCentro");
        $suma2 = count($centrostrabajo22);
        $suma = count($cantEncuestas);

        // $dataGrafica = DB::select("select es.IdCliente, es.IdPeriodo, esd.IdPersonal, ep.Correo,ep.Nombre
        // from ev_servicio es
        // inner join ev_servicio_cliente esc
        // on esc.IdServicio = es.IdServicio
        // inner join ev_servicio_detalle esd
        // on esd.IdServicio_cliente = esc.IdServicio_cliente
        // inner join ev_personal ep
        // on ep.IdPersonal = esd.IdPersonal
        // where es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo." group by esd.IdPersonal");

        // $sinInformacion = 0;
        // $asignados = 0;

        // if(count($dataGrafica) > 0){
        //     foreach($dataGrafica as $row) {
        //         if($row->Correo != "" || $row->Correo != null){
        //             $asignados++;
        //         }else{
        //             $sinInformacion++;
        //         }
        //     }
        // }

        // foreach($cantidadEncuestas as $row){
        //     $suma = $suma + $row->CantidadCentro;
        // }

        $acciones = DB::select("select * from ev_acciones ea where ea.IdEncuestaCliente = 12 and ea.IdDimension = 15 and ea.IdCliente = $IdCliente");

        return view("Encuestas.nom035.accionesentorno",
        ['datos'=>$datosCliente,
        'genero'=>$genero,  
        'antiguedad'=>$antiguedad,
        'edad'=>$rangoedad,
        'departamento'=>$departamentos,
        'estadocivil'=> $estadocivil,
        'experiencialaboral'=>$experiencialaboral,
        'puestocliente'=>$puestocliente,
        'tipocontrato'=>$tipocontrato,
        'tipojornada'=>$tipojornada,
        'tipopersonal'=>$tipopersonal,
        'tipopuesto'=>$tipopuesto,
        'nivelestudios'=>$nivelestudios,
        'centrostrabajo'=>$centrostrabajo,
        'cantidadCentro'=>$cantidadCentros,
        'totalCentros'=>$suma2,
        'encuestas'=>$suma,
        'IdCliente'=>$IdCliente,
        'IdPeriodo'=>$IdPeriodo,
        'acciones'=>$acciones
        ]);
    }

    public function getFiltrar(Request $request){
        $sentencia = $request->jquery;
        $IdCliente = $request->IdCliente;
        $IdPeriodo = $request->IdPeriodo;

        $arrayCentros = [];
        $centrostraba = [];
        $cantCentros = [];
        $arrayPersonal= [];
        $arrayGenero = [];
        $labelsGenero = [];
        $cantGenero = [];
        $cantidadGenero = [];
        $arrayEdad = [];
        $cantEdad = [];
        $arrayEstudios = [];
        $cantEstudios = [];
        $arrayPuesto = [];
        $cantPuesto = [];
        $arrayTipoPuesto = [];
        $cantTipoPuesto = [];
        $arrayTotalDepartamentos = [];
        $arrayDepartamentos = [];
        $departamentosLabels = [];
        $cantDepartamentos = [];
        $estadoCivil = [];
        $cantEstadoCivil = [];
        $labelsEstadoCivil = [];
        $cantidadEstadoCivil = [];
        $contador = 0;
        $contt = 0;
        $i = 0;
        $indice = 0;

        $centrostrabajo = DB::select("SELECT 
        es.IdCliente, es.IdServicio, es.IdPeriodo, esc.CantidadCentro, esc.IdCentro, ect.Descripcion
        FROM ev_servicio es
        INNER JOIN ev_servicio_cliente esc
        ON es.IdServicio = esc.IdServicio
        INNER JOIN ev_centros_trabajo ect
        ON ect.IdCentro = esc.IdCentro
        WHERE es.IdCliente = ".$IdCliente." and es.IdPeriodo = ".$IdPeriodo);

        foreach($centrostrabajo as $row){
            $arrayCentros[$i] = $row->Descripcion;
            $arrayPersonal[$i] = $row->CantidadCentro;
            $i++;
        }

        $departamentos = DB::select("SELECT *, COUNT(ed.Descripcion) AS Total FROM ev_departamentos ed where ed.IdCliente = ".$IdCliente." GROUP BY ed.Descripcion;");
        $i = 0;
        foreach($departamentos as $row){
            $arrayDepartamentos[$i] = $row->Descripcion;
            $arrayTotalDepartamentos[$i] = $row->Total;
            $i++;
        }

        if($sentencia != ""){
            $datosGraficas = DB::select("SELECT es.IdCliente,es.IdPeriodo,esc.IdCentro, ect.Descripcion AS Centro, ep.IdPersonal,ep.IdGenero,ep.IdRango,ep.IdEstadoCivil,ep.IdNivelEstudio,ep.IdPuestoCliente,ep.IdTipoPuesto,ep.IdDeptoCliente,ep.IdCentroTrabajo, ep.IdTipoContrato,ep.IdTipoPersonal,ep.IdTipoJornada,ep.IdAntiguedad,ep.IdExperiencia,ep.RolaTurno,
            (select mg.Descripcion from master_genero mg where mg.IdGenere = ep.IdGenero) AS Genero,
            (select erd.Descripcion from ev_rango_edad erd where erd.IdRango = ep.IdRango) AS Edad,
            (select mec.Descripcion from master_estadocivil mec where mec.IdEstadoCivil = ep.IdEstadoCivil) AS EstadoCivil,
            (select mne.Descripcion from master_nivel_estudios mne where mne.IdNivelEstudio = ep.IdNivelEstudio) AS NivelEstudio,
            (select epc.Descripcion from ev_puestos epc where epc.IdPuestoCliente = ep.IdPuestoCliente) AS PuestoCliente,
            (select etp.Descripcion from ev_tipo_puesto etp where etp.IdTipoPuesto = ep.IdTipoPuesto) AS TipoPuesto,
            (select ed.Descripcion from ev_departamentos ed where ed.IdDeptoCliente = ep.IdDeptoCliente) AS  Departamento,
            (select ect.Descripcion from ev_centros_trabajo ect where ect.IdCentro = esc.IdCentro) AS CentroTrabajo,
            (select etc.Descripcion from ev_tipo_contrato etc where etc.IdTipoContrato = ep.IdTipoContrato) AS TipoContrato,
            (select etpe.Descripcion from ev_tipo_personal etpe where etpe.IdTipoPersonal = ep.IdTipoPersonal) AS TipoPersonal,
            (select etj.Descripcion from ev_tipo_jornada etj where etj.IdTipoJornada = ep.IdTipoJornada) AS TipoJornada,
            (select ea.Descripcion from ev_antiguedad ea where ea.IdAntiguedad = ep.IdAntiguedad) AS Antiguedad,
            (select ee.Descripcion from ev_experiencia ee where ee.IdExperiencia = ep.IdExperiencia) AS Experiencia
            FROM ev_servicio es
            INNER JOIN ev_servicio_cliente esc
            ON esc.IdServicio = es.IdServicio
            INNER JOIN ev_servicio_detalle esd
            ON esd.IdServicio_cliente = esc.IdServicio_cliente
            INNER JOIN ev_personal ep
            ON esd.IdPersonal = ep.IdPersonal
            INNER JOIN ev_centros_trabajo ect
            ON ect.IdCentro = esc.IdCentro
            where es.IdCliente =".$IdCliente." and es.IdPeriodo =".$IdPeriodo." and esd.IdEncuesta = 12  and ep.IdDeptoCliente <> '' and ep.IdEstadoCivil <> '' and ep.IdPuestoCliente <> '' and ep.IdTipoPuesto <> '' and ep.IdNivelEstudio <> '' and ep.IdRango <> '' and ep.IdGenero <> '' and ep.IdEstadoCivil <> '' and esd.IdEncuesta = 12".$sentencia);

            // if(count($datosGraficas) == 0){
            //     $datosGraficas = DB::select("SELECT es.IdCliente,es.IdPeriodo,esc.IdCentro, ect.Descripcion AS Centro, ep.IdPersonal,ep.IdGenero,ep.IdRango,ep.IdEstadoCivil,ep.IdNivelEstudio,ep.IdPuestoCliente,ep.IdTipoPuesto,ep.IdDeptoCliente,ep.IdCentroTrabajo, ep.IdTipoContrato,ep.IdTipoPersonal,ep.IdTipoJornada,ep.IdAntiguedad,ep.IdExperiencia,ep.RolaTurno,
            //     (select mg.Descripcion from master_genero mg where mg.IdGenere = ep.IdGenero) AS Genero,
            //     (select erd.Descripcion from ev_rango_edad erd where erd.IdRango = ep.IdRango) AS Edad,
            //     (select mec.Descripcion from master_estadocivil mec where mec.IdEstadoCivil = ep.IdEstadoCivil) AS EstadoCivil,
            //     (select mne.Descripcion from master_nivel_estudios mne where mne.IdNivelEstudio = ep.IdNivelEstudio) AS NivelEstudio,
            //     (select epc.Descripcion from ev_puestos epc where epc.IdPuestoCliente = ep.IdPuestoCliente) AS PuestoCliente,
            //     (select etp.Descripcion from ev_tipo_puesto etp where etp.IdTipoPuesto = ep.IdTipoPuesto) AS TipoPuesto,
            //     (select ed.Descripcion from ev_departamentos ed where ed.IdDeptoCliente = ep.IdDeptoCliente) AS  Departamento,
            //     (select ect.Descripcion from ev_centros_trabajo ect where ect.IdCentro = esc.IdCentro) AS CentroTrabajo,
            //     (select etc.Descripcion from ev_tipo_contrato etc where etc.IdTipoContrato = ep.IdTipoContrato) AS TipoContrato,
            //     (select etpe.Descripcion from ev_tipo_personal etpe where etpe.IdTipoPersonal = ep.IdTipoPersonal) AS TipoPersonal,
            //     (select etj.Descripcion from ev_tipo_jornada etj where etj.IdTipoJornada = ep.IdTipoJornada) AS TipoJornada,
            //     (select ea.Descripcion from ev_antiguedad ea where ea.IdAntiguedad = ep.IdAntiguedad) AS Antiguedad,
            //     (select ee.Descripcion from ev_experiencia ee where ee.IdExperiencia = ep.IdExperiencia) AS Experiencia
            //     FROM ev_servicio es
            //     INNER JOIN ev_servicio_cliente esc
            //     ON esc.IdServicio = es.IdServicio
            //     INNER JOIN ev_servicio_detalle esd
            //     ON esd.IdServicio_cliente = esc.IdServicio_cliente
            //     INNER JOIN ev_personal ep
            //     ON esd.IdPersonal = ep.IdPersonal
            //     INNER JOIN ev_centros_trabajo ect
            //     ON ect.IdCentro = esc.IdCentro
            //     where es.IdCliente =".$IdCliente." and es.IdPeriodo =".$IdPeriodo." and esd.IdEncuesta = 12");
            // }
        }else{
            $datosGraficas = DB::select("SELECT es.IdCliente,es.IdPeriodo,esc.IdCentro, ect.Descripcion AS Centro, ep.IdPersonal,ep.IdGenero,ep.IdRango,ep.IdEstadoCivil,ep.IdNivelEstudio,ep.IdPuestoCliente,ep.IdTipoPuesto,ep.IdDeptoCliente,ep.IdCentroTrabajo, ep.IdTipoContrato,ep.IdTipoPersonal,ep.IdTipoJornada,ep.IdAntiguedad,ep.IdExperiencia,ep.RolaTurno,
            (select mg.Descripcion from master_genero mg where mg.IdGenere = ep.IdGenero) AS Genero,
            (select erd.Descripcion from ev_rango_edad erd where erd.IdRango = ep.IdRango) AS Edad,
            (select mec.Descripcion from master_estadocivil mec where mec.IdEstadoCivil = ep.IdEstadoCivil) AS EstadoCivil,
            (select mne.Descripcion from master_nivel_estudios mne where mne.IdNivelEstudio = ep.IdNivelEstudio) AS NivelEstudio,
            (select epc.Descripcion from ev_puestos epc where epc.IdPuestoCliente = ep.IdPuestoCliente) AS PuestoCliente,
            (select etp.Descripcion from ev_tipo_puesto etp where etp.IdTipoPuesto = ep.IdTipoPuesto) AS TipoPuesto,
            (select ed.Descripcion from ev_departamentos ed where ed.IdDeptoCliente = ep.IdDeptoCliente) AS  Departamento,
            (select ect.Descripcion from ev_centros_trabajo ect where ect.IdCentro = esc.IdCentro) AS CentroTrabajo,
            (select etc.Descripcion from ev_tipo_contrato etc where etc.IdTipoContrato = ep.IdTipoContrato) AS TipoContrato,
            (select etpe.Descripcion from ev_tipo_personal etpe where etpe.IdTipoPersonal = ep.IdTipoPersonal) AS TipoPersonal,
            (select etj.Descripcion from ev_tipo_jornada etj where etj.IdTipoJornada = ep.IdTipoJornada) AS TipoJornada,
            (select ea.Descripcion from ev_antiguedad ea where ea.IdAntiguedad = ep.IdAntiguedad) AS Antiguedad,
            (select ee.Descripcion from ev_experiencia ee where ee.IdExperiencia = ep.IdExperiencia) AS Experiencia
            FROM ev_servicio es
            INNER JOIN ev_servicio_cliente esc
            ON esc.IdServicio = es.IdServicio
            INNER JOIN ev_servicio_detalle esd
            ON esd.IdServicio_cliente = esc.IdServicio_cliente
            INNER JOIN ev_personal ep
            ON esd.IdPersonal = ep.IdPersonal
            INNER JOIN ev_centros_trabajo ect
            ON ect.IdCentro = esc.IdCentro
            where es.IdCliente =".$IdCliente." and es.IdPeriodo =".$IdPeriodo." and esd.IdEncuesta = 12 and ep.IdDeptoCliente <> '' 
            and ep.IdEstadoCivil <> '' and ep.IdPuestoCliente <> '' and ep.IdTipoPuesto <> '' and ep.IdNivelEstudio <> '' 
            and ep.IdRango <> '' and ep.IdGenero <> '' and ep.IdEstadoCivil <> ''");
        }

        //SE OBTIENEN LOS DATOS PARA GRAFICAR ESTADO CIVIL
        for($i = 0;$i < count($datosGraficas);$i++){
            $contador = 0;
            if($i == 0){
                $estadoCivil[$i] = $datosGraficas[$i]->EstadoCivil;
                for($k = 0; $k < count($datosGraficas); $k++){
                    if($estadoCivil[$i]==$datosGraficas[$k]->EstadoCivil){
                        $contt++;
                    }
                }
                $cantEstadoCivil[$i]=$contt;
            }else{
                for($j = 0;$j<count($estadoCivil);$j++){
                  if($datosGraficas[$i]->EstadoCivil==$estadoCivil[$j]){
                    $contador = 1;
                  }
                  if($j == (count($estadoCivil)-1)){
                    if($contador != 1){
                        $indice++;
                        $estadoCivil[$indice]=$datosGraficas[$i]->EstadoCivil;
                    }
                  }
                }
                $contt = 0;
                for($p = 0; $p < count($datosGraficas); $p++){
                    if($estadoCivil[$indice]==$datosGraficas[$p]->EstadoCivil){
                        $contt++;
                    }
                }
                $cantEstadoCivil[$indice]=$contt;
            }
        }

        $getEstadoCivil = DB::select('select me.Descripcion from master_estadocivil me;');

        for($i=0;$i<count($getEstadoCivil);$i++){
            $labelsEstadoCivil[$i] = $getEstadoCivil[$i]->Descripcion;
        }

        for($i=0;$i<count($estadoCivil);$i++){
            for($j=0;$j<count($labelsEstadoCivil);$j++){
                if($estadoCivil[$i]==$labelsEstadoCivil[$j]){
                    $cantidadEstadoCivil[$j]= $cantEstadoCivil[$i];
                }else{
                    if(isset($cantidadEstadoCivil[$j])){
                    }else{
                        $cantidadEstadoCivil[$j]=0; 
                    }
                }
            }
        }

          
        //SE OBTIENEN LOS DATOS PARA GRAFICAR CENTROS TRABAJO
        $indice = 0;
        $contt = 0;
        for($i = 0;$i < count($datosGraficas);$i++){
            $contador = 0;
            if($i == 0){
                $centrostraba[$i] = $datosGraficas[$i]->Centro;
                for($k = 0; $k < count($datosGraficas); $k++){
                    if($centrostraba[$i]==$datosGraficas[$k]->Centro){
                        $contt++;
                    }
                }
                $cantCentros[$i]=$contt;
            }else{
                for($j = 0;$j<count($centrostraba);$j++){
                  if($datosGraficas[$i]->Centro==$centrostraba[$j]){
                    $contador = 1;
                  }
                  if($j == (count($centrostraba)-1)){
                    if($contador != 1){
                        $indice++;
                        $centrostraba[$indice]=$datosGraficas[$i]->Centro;
                    }
                  }
                }
                $contt = 0;
                for($p = 0; $p < count($datosGraficas); $p++){
                    if($centrostraba[$indice]==$datosGraficas[$p]->Centro){
                        $contt++;
                    }
                }
                $cantCentros[$indice]=$contt;
            }
        }

             
        //SE OBTIENEN LOS DATOS PARA GRAFICAR DEPARTAMENTOS
        $indice = 0;
        $contt = 0;
        for($i = 0;$i < count($datosGraficas);$i++){
            $contador = 0;
            if($i == 0){
                $departamentosLabels[$i] = $datosGraficas[$i]->Departamento;
                for($k = 0; $k < count($datosGraficas); $k++){
                    if($departamentosLabels[$i]==$datosGraficas[$k]->Departamento){
                        $contt++;
                    }
                }
                $cantDepartamentos[$i]=$contt;
            }else{
                for($j = 0;$j<count($departamentosLabels);$j++){
                  if($datosGraficas[$i]->Departamento==$departamentosLabels[$j]){
                    $contador = 1;
                  }
                  if($j == (count($departamentosLabels)-1)){
                    if($contador != 1){
                        $indice++;
                        $departamentosLabels[$indice]=$datosGraficas[$i]->Departamento;
                    }
                  }
                }
                $contt = 0;
                for($p = 0; $p < count($datosGraficas); $p++){
                    if($departamentosLabels[$indice]==$datosGraficas[$p]->Departamento){
                        $contt++;
                    }
                }
                $cantDepartamentos[$indice]=$contt;
            }
        }

        //SE OBTIENEN LOS DATOS PARA GRAFICAR GENERO
        $indice = 0;
        $contt = 0;
        for($i = 0;$i < count($datosGraficas);$i++){
            $contador = 0;
            if($i == 0){
                $arrayGenero[$i] = $datosGraficas[$i]->Genero;
                for($k = 0; $k < count($datosGraficas); $k++){
                    if($arrayGenero[$i]==$datosGraficas[$k]->Genero){
                        $contt++;
                    }
                }
                $cantGenero[$i]=$contt;
            }else{
                for($j = 0;$j<count($arrayGenero);$j++){
                  if($datosGraficas[$i]->Genero==$arrayGenero[$j]){
                    $contador = 1;
                  }
                  if($j == (count($arrayGenero)-1)){
                    if($contador != 1){
                        $indice++;
                        $arrayGenero[$indice]=$datosGraficas[$i]->Genero;
                    }
                  }
                }
                $contt = 0;
                for($p = 0; $p < count($datosGraficas); $p++){
                    if($arrayGenero[$indice]==$datosGraficas[$p]->Genero){
                        $contt++;
                    }
                }
                $cantGenero[$indice]=$contt;
            }
        }

        $getGenero = DB::select('select mg.Descripcion from master_genero mg;');

        for($i=0;$i<count($getGenero);$i++){
            $labelsGenero[$i] = $getGenero[$i]->Descripcion;
        }

        for($i=0;$i<count($arrayGenero);$i++){
            for($j=0;$j<count($labelsGenero);$j++){
                if($arrayGenero[$i]==$labelsGenero[$j]){
                    $cantidadGenero[$j]= $cantGenero[$i];
                }else{
                    if(isset($cantidadGenero[$j])){
                    }else{
                        $cantidadGenero[$j]=0; 
                    }
                }
            }
        }

        //SE OBTIENEN LOS DATOS PARA GRAFICAR EDAD
        $indice = 0;
        $contt = 0;
        for($i = 0;$i < count($datosGraficas);$i++){
            $contador = 0;
            if($i == 0){
                $arrayEdad[$i] = $datosGraficas[$i]->Edad;
                for($k = 0; $k < count($datosGraficas); $k++){
                    if($arrayEdad[$i]==$datosGraficas[$k]->Edad){
                        $contt++;
                    }
                }
                $cantEdad[$i]=$contt;
            }else{
                for($j = 0;$j<count($arrayEdad);$j++){
                  if($datosGraficas[$i]->Edad==$arrayEdad[$j]){
                    $contador = 1;
                  }
                  if($j == (count($arrayEdad)-1)){
                    if($contador != 1){
                        $indice++;
                        $arrayEdad[$indice]=$datosGraficas[$i]->Edad;
                    }
                  }
                }
                $contt = 0;
                for($p = 0; $p < count($datosGraficas); $p++){
                    if($arrayEdad[$indice]==$datosGraficas[$p]->Edad){
                        $contt++;
                    }
                }
                $cantEdad[$indice]=$contt;
            }
        }

        //SE OBTIENEN LOS DATOS PARA GRAFICAR NIVEL ESTUDIO
        $indice = 0;
        $contt = 0;
        for($i = 0;$i < count($datosGraficas);$i++){
            $contador = 0;
            if($i == 0){
                $arrayEstudios[$i] = $datosGraficas[$i]->NivelEstudio;
                for($k = 0; $k < count($datosGraficas); $k++){
                    if( $arrayEstudios[$i]==$datosGraficas[$k]->NivelEstudio){
                        $contt++;
                    }
                }
                $cantEstudios[$i]=$contt;
            }else{
                for($j = 0;$j<count( $arrayEstudios);$j++){
                    if($datosGraficas[$i]->NivelEstudio== $arrayEstudios[$j]){
                    $contador = 1;
                    }
                    if($j == (count( $arrayEstudios)-1)){
                    if($contador != 1){
                        $indice++;
                        $arrayEstudios[$indice]=$datosGraficas[$i]->NivelEstudio;
                    }
                    }
                }
                $contt = 0;
                for($p = 0; $p < count($datosGraficas); $p++){
                    if($arrayEstudios[$indice]==$datosGraficas[$p]->NivelEstudio){
                        $contt++;
                    }
                }
                $cantEstudios[$indice]=$contt;
            }
        }

        //SE OBTIENEN LOS DATOS PARA GRAFICAR OCUPACION/PUESTO
        $indice = 0;
        $contt = 0;
        for($i = 0;$i < count($datosGraficas);$i++){
            $contador = 0;
            if($i == 0){
                $arrayPuesto[$i] = $datosGraficas[$i]->PuestoCliente;
                for($k = 0; $k < count($datosGraficas); $k++){
                    if($arrayPuesto[$i]==$datosGraficas[$k]->PuestoCliente){
                        $contt++;
                    }
                }
                $cantPuesto[$i]=$contt;
            }else{
                for($j = 0;$j<count($arrayPuesto);$j++){
                    if($datosGraficas[$i]->PuestoCliente== $arrayPuesto[$j]){
                    $contador = 1;
                    }
                    if($j == (count($arrayPuesto)-1)){
                    if($contador != 1){
                        $indice++;
                        $arrayPuesto[$indice]=$datosGraficas[$i]->PuestoCliente;
                    }
                    }
                }
                $contt = 0;
                for($p = 0; $p < count($datosGraficas); $p++){
                    if($arrayPuesto[$indice]==$datosGraficas[$p]->PuestoCliente){
                        $contt++;
                    }
                }
                $cantPuesto[$indice]=$contt;
            }
        }

         //SE OBTIENEN LOS DATOS PARA GRAFICAR TIPO/PUESTO
         $indice = 0;
         $contt = 0;
         for($i = 0;$i < count($datosGraficas);$i++){
             $contador = 0;
             if($i == 0){
                $arrayTipoPuesto[$i] = $datosGraficas[$i]->TipoPuesto;
                 for($k = 0; $k < count($datosGraficas); $k++){
                     if($arrayTipoPuesto[$i]==$datosGraficas[$k]->TipoPuesto){
                         $contt++;
                     }
                 }
                 $cantTipoPuesto[$i]=$contt;
             }else{
                 for($j = 0;$j<count($arrayTipoPuesto);$j++){
                     if($datosGraficas[$i]->TipoPuesto== $arrayTipoPuesto[$j]){
                     $contador = 1;
                     }
                     if($j == (count($arrayTipoPuesto)-1)){
                     if($contador != 1){
                         $indice++;
                         $arrayTipoPuesto[$indice]=$datosGraficas[$i]->TipoPuesto;
                     }
                     }
                 }
                 $contt = 0;
                 for($p = 0; $p < count($datosGraficas); $p++){
                     if($arrayTipoPuesto[$indice]==$datosGraficas[$p]->TipoPuesto){
                         $contt++;
                     }
                 }
                 $cantTipoPuesto[$indice]=$contt;
             }
         }


         $datosGrid = DB::select("SELECT ec.IdCategoria, ec.Descripcion AS Categoria,ed.IdDominio,ed.Descripcion AS Dominio,edm.IdDimension, edm.Descripcion AS Dimension FROM ev_categorias ec
         INNER JOIN ev_dominio ed
         ON ed.IdCategoria = ec.IdCategoria
         INNER JOIN ev_dimension edm
         ON edm.IdDominio = ed.IdDominio GROUP BY edm.IdDimension;");

         $dominioss = DB::select("SELECT ec.IdCategoria, ec.Descripcion AS Categoria,ed.IdDominio,ed.Descripcion AS Dominio,edm.IdDimension, edm.Descripcion AS Dimension FROM ev_categorias ec
         INNER JOIN ev_dominio ed
         ON ed.IdCategoria = ec.IdCategoria
         INNER JOIN ev_dimension edm
         ON edm.IdDominio = ed.IdDominio GROUP BY edm.IdDominio");

         $dimensiones = DB::select("SELECT ec.IdCategoria, ec.Descripcion AS Categoria,ed.IdDominio,ed.Descripcion AS Dominio,edm.IdDimension, edm.Descripcion AS Dimension FROM ev_categorias ec
         INNER JOIN ev_dominio ed
         ON ed.IdCategoria = ec.IdCategoria
         INNER JOIN ev_dimension edm
         ON edm.IdDominio = ed.IdDominio GROUP BY edm.IdDimension");

        //Obtener Categorias
        $indice = 0;
        $contt = 0;
        $categorias = [];
        $cantCategorias = [];
        for($i = 0;$i < count($datosGrid);$i++){
            $contador = 0;
            if($i == 0){
                $categorias[$i] = $datosGrid[$i]->Categoria;
                for($k = 0; $k < count($datosGrid); $k++){
                    if($categorias[$i]==$datosGrid[$k]->Categoria){
                        $contt++;
                    }
                }
                $cantCategorias[$i]=$contt;
            }else{
                for($j = 0;$j<count($categorias);$j++){
                if($datosGrid[$i]->Categoria==$categorias[$j]){
                    $contador = 1;
                }
                if($j == (count($categorias)-1)){
                    if($contador != 1){
                        $indice++;
                        $categorias[$indice]=$datosGrid[$i]->Categoria;
                    }
                }
                }
                $contt = 0;
                for($p = 0; $p < count($datosGrid); $p++){
                    if($categorias[$indice]==$datosGrid[$p]->Categoria){
                        $contt++;
                    }
                }
                $cantCategorias[$indice]=$contt;
            }
        }
        //Obtener dominios
        $indice = 0;
        $contt = 0;
        $dominios = [];
        $cantDominios = [];
        for($i = 0;$i < count($dominioss);$i++){
            $contador = 0;
            if($i == 0){
                $dominios[$i] = $dominioss[$i]->Categoria;
                for($k = 0; $k < count($dominioss); $k++){
                    if($dominios[$i]==$dominioss[$k]->Categoria){
                        $contt++;
                    }
                }
                $cantDominios[$i]=$contt;
            }else{
                for($j = 0;$j<count($dominios);$j++){
                if($dominioss[$i]->Categoria==$dominios[$j]){
                    $contador = 1;
                }
                if($j == (count($dominios)-1)){
                    if($contador != 1){
                        $indice++;
                        $dominios[$indice]=$dominioss[$i]->Categoria;
                    }
                }
                }
                $contt = 0;
                for($p = 0; $p < count($dominioss); $p++){
                    if($dominios[$indice]==$dominioss[$p]->Categoria){
                        $contt++;
                    }
                }
                $cantDominios[$indice]=$contt;
            }
        }
             //Obtener demension
             $indice = 0;
             $contt = 0;
             $dimension = [];
             $cantDimension = [];
             for($i = 0;$i < count($datosGrid);$i++){
                 $contador = 0;
                 if($i == 0){
                    $dimension[$i] = $datosGrid[$i]->Dominio;
                     for($k = 0; $k < count($datosGrid); $k++){
                         if($dimension[$i]==$datosGrid[$k]->Dominio){
                             $contt++;
                         }
                     }
                     $cantDimension[$i]=$contt;
                 }else{
                     for($j = 0;$j<count($dimension);$j++){
                     if($datosGrid[$i]->Dominio==$dimension[$j]){
                         $contador = 1;
                     }
                     if($j == (count($dimension)-1)){
                         if($contador != 1){
                             $indice++;
                             $dimension[$indice]=$datosGrid[$i]->Dominio;
                         }
                     }
                     }
                     $contt = 0;
                     for($p = 0; $p < count($datosGrid); $p++){
                         if($dimension[$indice]==$datosGrid[$p]->Dominio){
                             $contt++;
                         }
                     }
                     $cantDimension[$indice]=$contt;
                 }
             }

            if($sentencia != ""){
                $calificacionDimension = DB::select('select epe.IdCliente,epe.IdEncuesta,epe.IdPeriodo,epe.IdPregunta,epe.iValor, epe.IdPersonal,edp.IdDimension, ed.IdDominio, ec.IdCategoria, sum(epe.iValor)as calificacionDimension, count(DISTINCT epe.IdPersonal) as personal, (sum(epe.iValor)/count(DISTINCT epe.IdPersonal)) as promedio
                from ev_personal_encuesta epe
                inner join ev_dimension_pregunta edp
                on edp.IdPregunta = epe.IdPregunta
                inner join ev_dimension evd
                on evd.IdDimension = edp.IdDimension
                inner join ev_dominio ed
                on ed.IdDominio = evd.IdDominio
                inner join ev_categorias ec
                on ec.IdCategoria = ed.IdCategoria
                inner join ev_personal ep
                on ep.IdPersonal = epe.IdPersonal
                inner join ev_centros_trabajo ect
                on ect.IdCentro = epe.IdCentro
                inner join ev_servicio_cliente esc
                on esc.IdCentro = epe.IdCentro
                where epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' and epe.IdEncuesta = 12'.$sentencia.' GROUP BY edp.IdDimension');

                if(count($calificacionDimension)==0){
                    $calificacionDimension = DB::select('select epe.IdCliente,epe.IdEncuesta,epe.IdPeriodo,epe.IdPregunta,epe.iValor, epe.IdPersonal,edp.IdDimension, ed.IdDominio, ec.IdCategoria, sum(epe.iValor)as calificacionDimension, count(DISTINCT epe.IdPersonal) as personal, (sum(epe.iValor)/count(DISTINCT epe.IdPersonal)) as promedio
                    from ev_personal_encuesta epe
                    inner join ev_dimension_pregunta edp
                    on edp.IdPregunta = epe.IdPregunta
                    inner join ev_dimension evd
                    on evd.IdDimension = edp.IdDimension
                    inner join ev_dominio ed
                    on ed.IdDominio = evd.IdDominio
                    inner join ev_categorias ec
                    on ec.IdCategoria = ed.IdCategoria
                    where epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' and epe.IdEncuesta = 12 GROUP BY edp.IdDimension');
                }
            }else{
                $calificacionDimension = DB::select('select epe.IdCliente,epe.IdEncuesta,epe.IdPeriodo,epe.IdPregunta,epe.iValor, epe.IdPersonal,edp.IdDimension, ed.IdDominio, ec.IdCategoria, sum(epe.iValor)as calificacionDimension, count(DISTINCT epe.IdPersonal) as personal, (sum(epe.iValor)/count(DISTINCT epe.IdPersonal)) as promedio
                from ev_personal_encuesta epe
                inner join ev_dimension_pregunta edp
                on edp.IdPregunta = epe.IdPregunta
                inner join ev_dimension evd
                on evd.IdDimension = edp.IdDimension
                inner join ev_dominio ed
                on ed.IdDominio = evd.IdDominio
                inner join ev_categorias ec
                on ec.IdCategoria = ed.IdCategoria
                where epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' and epe.IdEncuesta = 12 GROUP BY edp.IdDimension');
            }

            $suma = 0;
            foreach($calificacionDimension as $row){
                $suma = $suma + $row->promedio;
            }

             $ddominio = $calificacionDimension[0]->IdDominio;
             $sumariesgoentorno = 0;
             $riesgoxdominio = [];
             $indexriesgo = 0;

             foreach($calificacionDimension as $row){
                $indexriesgo++;
                if($row->IdDominio != $ddominio){
                    array_push($riesgoxdominio, $sumariesgoentorno);
                    $sumariesgoentorno = 0;
                    $ddominio = $row->IdDominio;
                    $sumariesgoentorno = $sumariesgoentorno + $row->promedio;
                    if($indexriesgo == (count($calificacionDimension))){
                        array_push($riesgoxdominio, $sumariesgoentorno);
                    }
                }else{
                    $sumariesgoentorno = $sumariesgoentorno + $row->promedio;
                    if($indexriesgo == (count($calificacionDimension))){
                        array_push($riesgoxdominio, $sumariesgoentorno);
                    }
                }
             }

             $ddcategoria = $calificacionDimension[0]->IdCategoria;
             $sumariesgoentorno = 0;
             $riesgoxcategoria = [];
             $indexriesgo = 0;

             foreach($calificacionDimension as $row){
                $indexriesgo++;
                if($row->IdCategoria != $ddcategoria){
                    array_push($riesgoxcategoria, $sumariesgoentorno);
                    $sumariesgoentorno = 0;
                    $ddcategoria = $row->IdCategoria;
                    $sumariesgoentorno = $sumariesgoentorno + $row->promedio;
                    if($indexriesgo == (count($calificacionDimension))){
                        array_push($riesgoxcategoria, $sumariesgoentorno);
                    }
                }else{
                    $sumariesgoentorno = $sumariesgoentorno + $row->promedio;
                    if($indexriesgo == (count($calificacionDimension))){
                        array_push($riesgoxcategoria, $sumariesgoentorno);
                    }
                }
             }

             $calificaciontotal = DB::select('select epe.IdEncuesta,epe.IdCliente, epe.IdCentro, epe.IdPeriodo,epe.IdPregunta,epe.iValor,epe.IdPersonal, sum(epe.iValor) as calificacion
             from ev_personal_encuesta epe
             inner join ev_dimension_pregunta edp
             on edp.IdPregunta = epe.IdPregunta
             where epe.IdEncuesta = 12 and epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' GROUP BY epe.IdPersonal');
             

        return response()->json(['data'=>$centrostraba,'data2'=>$cantCentros,'data3'=>$departamentosLabels,'data4'=>$cantDepartamentos,'data5'=>$labelsEstadoCivil,'data6'=>$cantidadEstadoCivil,'data7'=> $labelsGenero,'data8'=>$cantidadGenero,'data9'=>$arrayEdad,'data10'=>$cantEdad,'data11'=>$arrayEstudios,'data12'=>$cantEstudios,'data13'=>$arrayPuesto,'data14'=>$cantPuesto,'data15'=>$arrayTipoPuesto,'data16'=>$cantTipoPuesto,'data17'=>$categorias,'data18'=>$cantDominios,'data19'=>$dominioss,'data21'=>$dimension,'data22'=>$cantDimension,'data23'=>$dimensiones,'data24'=>$datosGraficas,'calificacion'=>$calificaciontotal,'calificaciondimension'=>$calificacionDimension,'riesgodominio'=>$riesgoxdominio,'riesgocategoria'=>$riesgoxcategoria,'suma'=>$suma]);

    }

    public function getDimensiones(Request $request){
        $IdDimension = $request->IdDimension;
        $IdCliente = $request->IdCliente;
        $IdPeriodo = $request->IdPeriodo;
        $query = $request->Sentencia;

        $IdCentro = $request->IdCentro;

        

        $respuestas = DB::select('select epe.IdPersonal,epe.IdCentro,epe.IdCliente,epe.IdEncuesta,epe.IdPeriodo,epe.IdRespuestaDet,edp.IdDimension,edp.IdPregunta,ep.IdPregunta,ep.Pregunta,ep.iOrden,epe.iValor,er.Descripcion,count(er.IdRespuesta) as cantRespuesta
        from ev_personal_encuesta epe
        inner join ev_dimension_pregunta edp
        on edp.IdPregunta = epe.IdPregunta
        inner join ev_pregunta ep
        on ep.IdPregunta = epe.IdPregunta
        inner join ev_respuesta_detalle erd
        on erd.IdRespuestaDet = epe.IdRespuestaDet
        inner join ev_respuesta er
        on er.IdRespuesta = erd.IdRespuesta
        where epe.IdCliente = '.$IdCliente.' and epe.IdPeriodo = '.$IdPeriodo.' and epe.IdEncuesta = 12 and edp.IdDimension = '.$IdDimension.' '.$query.' group by edp.IdDimension,edp.IdPregunta,er.IdRespuesta');

        $preguntasbydimension = DB::select("SELECT edp.IdDimension,edp.IdDimensionPreg, edp.IdPregunta, ed.Descripcion, ep.Pregunta from ev_dimension_pregunta edp 
        INNER JOIN ev_dimension ed 
        ON edp.IdDimension = ed.IdDimension 
        INNER JOIN ev_pregunta ep 
        ON edp.IdPregunta = ep.IdPregunta
        WHERE edp.IdDimension =".$IdDimension);

        $acciones = DB::select("select * from ev_acciones ea where ea.IdEncuestaCliente = 12 and ea.IdDimension = ".$IdDimension." and ea.IdCliente = ".$IdCliente);

        $accionestabla = DB::select("select *,(select ea.Descripcion from ev_acciones ea where ea.IdAccion = ead.IdAccion)AS Accion from ev_accion_detalle ead where ead.IdDimension = ".$IdDimension." and ead.IdCliente =".$IdCliente." and ead.IdCentro =".$IdCentro);

        return response()->json(['data'=>$preguntasbydimension,'data2'=>$acciones,'data3'=>$accionestabla,'data4'=>$respuestas]);
    }

    public function setAccion(Request $request){
        $IdCliente=$request->IdCliente;
        $IdDimension=$request->IdDimension;
        $Comentario=$request->comentario;
        $IdPeriodo=$request->IdPeriodo;
        $IdAccion=$request->IdAccion;
        $IdCentro = $request->IdCentro;

        $buscarregistro=DB::select('SELECT * FROM ev_accion_detalle WHERE IdDimension = '.$IdDimension.' AND IdCliente = '.$IdCliente.' AND IdAccion ='.$IdAccion.' AND IdCentro ='.$IdCentro);
        
        
        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            $accionestabla = DB::select("select *,(select ea.Descripcion from ev_acciones ea where ea.IdAccion = ead.IdAccion)AS Accion from ev_accion_detalle ead where ead.IdDimension = ".$IdDimension." and ead.IdCliente =".$IdCliente." and ead.IdCentro =".$IdCentro);
            return response()->json(['data'=>false,'data2'=>$accionestabla]);
        }else{
            $AltaTiposServicio=MasterConsultas::exeSQLStatement("create_ev_acciones_detalle", "UPDATE",
                array(
                    "IdCliente" => $IdCliente,
                    "IdPeriodo" =>$IdPeriodo,
                    "IdDimension" => $IdDimension,
                    "IdAccion" => $IdAccion,
                    "Descripcion" => $Comentario,
                    "IdCentro" => $IdCentro
                )
            );

            $accionestabla = DB::select("select *,(select ea.Descripcion from ev_acciones ea where ea.IdAccion = ead.IdAccion)AS Accion from ev_accion_detalle ead where ead.IdDimension = ".$IdDimension." and ead.IdCliente =".$IdCliente." and ead.IdCentro =".$IdCentro);

            return response()->json(['data'=>true,'data2'=>$accionestabla]);
        }
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
        $IdCliente=$request->IdCliente;
        $IdDimension=$request->IdDimension;
        $IdEncuesta=12;
        $Descripcion=$request->descripcion;

        $buscarregistro=DB::select('SELECT * FROM ev_acciones WHERE IdDimension = '.$IdDimension.' AND IdCliente = '.$IdCliente.' AND IdEncuestaCliente = '.$IdEncuesta.' AND Descripcion ='.'"'.$Descripcion.'"');

        $arrayvacio=empty($buscarregistro);

        if($arrayvacio==false){
            return response()->json(['data'=>false,'data2'=>$acciones]);
        }else{
            $AltaTiposServicio=MasterConsultas::exeSQLStatement("create_ev_acciones", "UPDATE",
                    array(
                        "IdCliente" => $IdCliente,
                        "IdDimension" => $IdDimension,
                        "IdEncuestaCliente" => $IdEncuesta,
                        "Descripcion" => $Descripcion
                    )
                );

            $acciones = DB::select("select * from ev_acciones ea where ea.IdEncuestaCliente = 12 and ea.IdDimension = ".$IdDimension." and ea.IdCliente = ".$IdCliente);
            return response()->json(['data'=>true,'data2'=>$acciones]);
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
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }
}

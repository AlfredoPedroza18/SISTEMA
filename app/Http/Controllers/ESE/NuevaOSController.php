<?php
namespace App\Http\Controllers\ESE;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;
use App\MasterEseServicio;
use App\MasterEseAsignacion;
use App\MasterEseProgramacion;
use App\MasterEseServicioEntrada;
use App\MasterEseServicioOS;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Http\Controllers\ESE\Notificaciones;
use App\Bussines\NotificacionesPush;
use App\Bussines\ReportsEse;
use Illuminate\Support\Facades\Auth;
use Laminas\Http\Client;
use PDF;


class NuevaOSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $clientes=DB::select('SELECT IdCliente,Nombre FROM master_clientes');
        $plantillas = MasterConsultas::exeSQL("master_ese_plantilla_cliente", "READONLY",
        array(
            "IdPlantillaCliente" => 0
        )
    );
        return view("ESE.NuevaOS.nuevaOSindex",["clientes"=>$clientes, "plantillas"=>$plantillas ]);
    }

    public function FiltroPC(Request $request)
    {
        $cod = $request->input('valcnt');
        $clientes=DB::select("SELECT IdCliente,Nombre FROM master_clientes ORDER BY IdCliente = $cod DESC");
        $queryB='Select p.*, e.Nombre as Cliente, mp.DescripcionPlantilla as Plantilla,
        (select Descripcion from master_ese_tiposervicio as sp where sp.IdTipoServicio = mp.IdTipoServicio) as Servicio,
        (select Tipos from master_ese_tipos as sp where sp.IdTipos = mp.IdTipos) as TipoServicio
        From master_ese_plantilla_cliente as p
        Inner Join master_ese_plantilla mp ON mp.IdPlantilla = p.IdPlantilla
        Inner Join master_clientes e on e.IdCliente = p.IdCliente
        Where p.IdCliente = :IdCliente';

        $plantillas=DB::select($queryB,[$cod]);
        return view("ESE.NuevaOS.plantillasxcliente",['plantillas'=>$plantillas,'clientes'=>$clientes,'cntC'=>$cod]);
    }

    public function search(){
      $type = $_POST['type'];
      $c = $_POST['c'];
      if($type == 'Ejecutivos'){

                $Ejecutivos=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
                from master_ese_empleado
                Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
                Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolEjecutivo = users.IdRol");

                $table='';
                foreach ($Ejecutivos as $i) {
                  $table.='<tr><td> '.$i->NombreCompleto.'</td> <td>'.$i->Colonia.'</td> <td>'.$i->Activo.'</td> <td> <button type="button" class="btn btn-primary btn-sm" onclick="select('.$i->IdEmpleado.');">Seleccionar</button> </td> </tr>';
                }
                echo $table;

      }else if ($type == 'Analista') {

                $Analistas=DB::select("select users.* , CONCAT(ifnull( users.name,'' ),' ', IFNULL( users.apellido_paterno, ''),' ', IFNULL( users.apellido_materno, '')) as NombreCompleto,
                (SELECT COUNT(IdAnalista) FROM master_ese_srv_asignacion WHERE IdAnalista=users.id) numServicioAsignado
                from users Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolAnalista = users.IdRol 
                OR master_ese_mobile_settings.IdRolCoordinador = users.IdRol
                Inner Join clientes c on c.id_cn=users.idcn and c.id=$c
                ORDER BY numServicioAsignado ASC");

                $table='';
                foreach ($Analistas as $i) {
                  $table.='<tr><td> '.$i->NombreCompleto.'</td> <td>'.$i->Colonia.'</td> <td>'.$i->Activo.'</td> <td>'.$i->numServicioAsignado.'</td> <td> <button type="button" class="btn btn-primary btn-sm" onclick="select('.$i->IdEmpleado.');">Seleccionar</button> </td> </tr>';
                }
                echo $table;
    }else if ($type == 'AnalistaSecundario') {

        $Analistas=DB::select("select users.* , CONCAT(ifnull( users.name,'' ),' ', IFNULL( users.apellido_paterno, ''),' ', IFNULL( users.apellido_materno, '')) as NombreCompleto,
        (SELECT COUNT(IdAnalista) FROM master_ese_srv_asignacion WHERE IdAnalista=users.id) numServicioAsignado
        from users Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolAnalista = users.IdRol 
        OR master_ese_mobile_settings.IdRolCoordinador = users.IdRol
        ORDER BY numServicioAsignado ASC");

        $table='';
        foreach ($Analistas as $i) {
          $table.='<tr><td> '.$i->NombreCompleto.'</td> <td>'.$i->Colonia.'</td> <td>'.$i->Activo.'</td> <td>'.$i->numServicioAsignado.'</td> <td> <button type="button" class="btn btn-primary btn-sm" onclick="select('.$i->IdEmpleado.');">Seleccionar</button> </td> </tr>';
        }

        echo $table;
    }else if ($type == 'Lideres') {

                $Coordinadores=DB::select("select * , concat(ifnull( users.name,'' ),' ', ifnull( users.apellido_paterno, ''),' ', ifnull( users.apellido_materno, '')) as NombreCompleto
                from users  Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolCoordinador = users.IdRol
                Inner Join clientes c on c.id_cn=users.idcn and c.id=$c");

                $table='';
                foreach ($Coordinadores as $i) {
                  $table.='<tr><td> '.$i->NombreCompleto.'</td> <td>'.$i->Colonia.'</td> <td>'.$i->Activo.'</td> <td> <button type="button" class="btn btn-primary btn-sm" onclick="select('.$i->id.');">Seleccionar</button> </td> </tr>';
                }
                echo $table;
      }else if($type == 'iventigador'){
        $IdServicioEse = $_POST['idser'];

          $Investigadores=DB::select("select * ,master_ese_empleado.EstatusInvestigadorId s ,master_ese_empleado.telefonomovil tel, concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto,
          e.FK_nombre_estado  as Estado, (select e.ArchivoFoto from master_ese_empleadosdocumentos as e where e.IdEmpleado = master_ese_empleado.IdEmpleado ) AS Foto_e,
          (SELECT COUNT(IdInvestigador) FROM master_ese_srv_asignacion WHERE IdInvestigador = master_ese_empleado.IdEmpleado) numServicioAsignado
          from master_ese_empleado
          Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
          Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
          INNER JOIN master_ese_cobertura_inv meci ON  master_ese_empleado.IdEmpleado = meci.IdEmpleado
          inner join estados as e on e.IdEstado = meci.IdEstado
          where e.FK_nombre_estado like '%{$_POST['estado']}%'
          GROUP BY master_ese_empleado.IdEmpleado
          ORDER BY numServicioAsignado ASC");

        $table='';
        $coorde='';
        $lat='';
        $log='';
        $title='';
        foreach ($Investigadores as $i) {
           if($i->s == 1)
                $s = "Apto";
           if($i->s == 3)
                $s = "No Apto";
           if($i->s == 2)
                $s = "Restringido";
          $table.='<tr><td> <input id="'.$i->IdEmpleado.'" type="hidden" value="'.$i->Foto_e.'"> '.$i->NombreCompleto.'</td> <td>'.$i->tel.'</td><td>'.$s.'</td><td> <button type="button" class="btn btn-primary btn-sm" onclick="PreviewImage('.$i->IdEmpleado.');">Ver</button> </td> <td>'.$i->numServicioAsignado.'</td> <td> <button type="button" class="btn btn-primary btn-sm" onclick="select('.$i->IdEmpleado.');">Seleccionar</button> </td> </tr>';
          $coorde = explode(",",$i->CoordenadasGmaps);
          if(count($coorde)>1){
            $lat.="$coorde[0]|";
            $log.="$coorde[1]|";
          }
          $title.="$i->NombreCompleto|";
        }
        return array($table,$lat,$log,$title,$IdServicioEse);
      }else if($type == 'iventigador'){
          $IdServicioEse = $_POST['idser'];

          $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto,
         e.FK_nombre_estado  as Estado,
        (select e.ArchivoFoto from master_ese_empleadosdocumentos as e where e.IdEmpleado = master_ese_empleado.IdEmpleado ) as Foto_e
          from master_ese_empleado
          Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
          Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
          inner join estados as e on e.IdEstado = master_ese_empleado.IdEstado
          where e.FK_nombre_estado like '%{$_POST['estado']}%'");

          $table='';
          $coorde='';
          $lat='';
          $log='';
          $title='';
          foreach ($Investigadores as $i) {
              $table.='<tr><td> <input id="'.$i->IdEmpleado.'" type="hidden" value="'.$i->Foto_e.'"> '.$i->NombreCompleto.'</td> <td>'.$i->Colonia.'</td> <td>'.$i->Activo.'</td> <td> <button type="button" class="btn btn-primary btn-sm" onclick="PreviewImage('.$i->IdEmpleado.');">Ver</button> </td> <td> <button type="button" class="btn btn-primary btn-sm" onclick="select('.$i->IdEmpleado.');">Seleccionar</button> </td> </tr>';
              $coorde = explode(",",$i->CoordenadasGmaps);
              if(count($coorde)>1){
                  $lat.="$coorde[0]|";
                  $log.="$coorde[1]|";
              }
              $title.="$i->NombreCompleto|";
          }
          return array($table,$lat,$log,$title,$IdServicioEse);
      }else if($type == 'iventigadorMunicipio'){
          $IdServicioEse = $_POST['idser'];

          $Investigadores=DB::select("SELECT *,master_ese_empleado.EstatusInvestigadorId s,master_ese_empleado.telefonomovil tel,master_ese_empleadosdocumentos.ArchivoFoto AS Foto_e , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto,
                                    (SELECT COUNT(IdInvestigador) FROM master_ese_srv_asignacion WHERE IdInvestigador = master_ese_empleado.IdEmpleado) numServicioAsignado
                                    from master_ese_empleado
                                    Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
                                    Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
                                    left Join master_region_inv ON master_region_inv.IdInvestigador = master_ese_empleado.IdEmpleado
                                    INNER JOIN master_ese_cobertura_inv meci ON master_ese_empleado.IdEmpleado = meci.IdEmpleado
                                    INNER JOIN master_municipios mm ON meci.IdMunicipio = mm.IdMunicipio
                                    INNER JOIN master_ese_empleadosdocumentos ON master_ese_empleadosdocumentos.IdEmpleado = master_ese_empleado.IdEmpleado
                                    where mm.Descripcion LIKE '%{$_POST['municipio']}%'
                                    ORDER BY numServicioAsignado ASC");


          $table='';
          $coorde='';
          $lat='';
          $log='';
          $title='';
          foreach ($Investigadores as $i) {
            if($i->s == 1)
                $s = "Apto";
            if($i->s == 3)
                $s = "No Apto";
            if($i->s == 2)
                $s = "Restringido";
              
              $table.='<tr><td> <input id="'.$i->IdEmpleado.'" type="hidden" value="'.$i->Foto_e.'"> '.$i->NombreCompleto.'</td><td>'.$i->tel.'</td><td>'.$s.'</td> <td> <button type="button" class="btn btn-primary btn-sm" onclick="PreviewImage('.$i->IdEmpleado.');">Ver</button> </td> <td>'.$i->numServicioAsignado.'</td> <td> <button type="button" class="btn btn-primary btn-sm" onclick="select('.$i->IdEmpleado.');">Seleccionar</button> </td> </tr>';
              $coorde = explode(",",$i->CoordenadasGmaps);
              if(count($coorde)>1){
                  $lat.="$coorde[0]|";
                  $log.="$coorde[1]|";
              }
              $title.="$i->NombreCompleto|";
          }
          return array($table,$lat,$log,$title,$IdServicioEse);
      }
    }

    public function searchIRegion(){
        $type = $_POST['type'];
        if($type == 'iventigador'){
            $IdServicioEse = $_POST['idser'];

            $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto,
         e.FK_nombre_estado  as Estado, (select e.ArchivoFoto from master_ese_empleadosdocumentos as e where e.IdEmpleado = master_ese_empleado.IdEmpleado ) as Foto_e
          from master_ese_empleado Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
          Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
          inner join estados as e on e.IdEstado = master_ese_empleado.IdEstado
          where e.FK_nombre_estado like '%{$_POST['estado']}%'");


            $table='';
            $coorde='';
            $lat='';
            $log='';
            $title='';
            foreach ($Investigadores as $i) {
                $table='';
                $table.='<tr><td> <input id="'.$i->IdEmpleado.'" type="hidden" value="'.$i->Foto_e.'"> '.$i->NombreCompleto.'</td> 
                <td>'.$i->Colonia.'</td> <td>'.$i->Activo.'</td> 
                 <td> <button type="button" class="btn btn-primary btn-sm" onclick="PreviewImage('.$i->IdEmpleado.');">Ver</button> </td> 
                 <td> <button type="button" class="btn btn-primary btn-sm" onclick="select('.$i->IdEmpleado.');">Seleccionar</button> </td> </tr>';
                echo $table;
                $coorde = explode(",",$i->CoordenadasGmaps);
                if(count($coorde)>1){
                    $lat.="$coorde[0]|";
                    $log.="$coorde[1]|";
                }
                $title.="$i->NombreCompleto|";
            }
            return array($table,$lat,$log,$title,$IdServicioEse);
        }
    }

    public function pdfdocumentos($idEse){    
        $fotos[]="";
        $nombres=[
            "ArchivoCurp",
            "ImssArchivo",
            "RfcArchivo",
            "CartaRecomendacionArchivo",
            "ReciboNominaArchivo",
            "ArchivoCreditoInfonavit",
            "CreditoFonacotArchivo",
            "ArchivoIne",
            "UltimoGradoArchivo",
            "ArchivoActaNacimientoHijo",
            "ArchivoActaNacimientoHijo",
            "ArchivoActaNacimiento",
            "ArchivoComprobanteDom",
            "ArchivoActaMatrimonio",
            "ArchivoActaNacimientoConyugue"
        ];

        $IdServicioEse=$idEse;
        $resultActual = DB::select("SELECT  srve.ValorCargado, mee.CampoNombre
        FROM master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
        INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
        INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
        WHERE srve.IdServicioEse=? and c.Etiqueta = 'documentación' order by mee.orden asc;",[$IdServicioEse]);

        $o=0;
        foreach($resultActual as $ou){
            for($j=0; $j<=14;$j++){
                if($ou->CampoNombre==$nombres[$j]) {$fotos[$o]=$ou->ValorCargado; $o++;};
            }
        }
        $souer = 'data:application/pdf;base64,"'.$fotos[0].'"';
        $target= "o.png";
        session_start();
        // DOMPDF según el tipo de documento a imprimir o la cantidad puede ser muy exigente así que aumentamos la memoria disponible
        ini_set("memory_limit", "256M");
        $pdf = PDF::loadView('ESE.pdf.pdf-documentos',['fotos'=>$fotos]);
        return $pdf->stream();
    }
    
    public function pdf($id,$idc){
        $IdServicioEse = $id;
        $IdRegion=0;
        $IdEstado=0;

        $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
            from master_ese_empleado
            Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
            Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol");

        $investigadores = [];
        foreach ($Investigadores as $invs) {
            $investigadores[$invs->IdEmpleado] = $invs->NombreCompleto;
        }

        $resultActual = DB::select("SELECT  srve.ValorCargado, mee.CampoNombre
        FROM master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
        INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
        INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
        WHERE srve.IdServicioEse=? and c.Etiqueta = 'datos generales';",[$IdServicioEse]);

        //DATOS GENERALES
        $domi="";
        $col="";
        $puesto="";
        $mun="";
        $NumeroInteriorExterior="";
        $postal="";
        $cel="";
        $tel="";
        $domiA="";
        $domiAT="";
        $domiT="";
        $corE="";
        $entreC="";
        $nac="";
        $nacLug="";
        $estC="";

        $candidato="";
        $ApellidoPaternoCandidato ="";
        $ApellidoMaternoCandidato ="";
        foreach($resultActual as $ou){
            if($ou->CampoNombre=='ApellidoPaternoCandidato') $ApellidoPaternoCandidato=$ou->ValorCargado;
            if($ou->CampoNombre=='ApellidoMaternoCandidato') $ApellidoMaternoCandidato=$ou->ValorCargado;
            if($ou->CampoNombre=='NombreCandidato') $candidato=$ou->ValorCargado;
            if($ou->CampoNombre=='PuestoCandidato') $puesto=$ou->ValorCargado;
            if($ou->CampoNombre=='Domicilio') $domi=$ou->ValorCargado;
            if($ou->CampoNombre=='Colonia') $col=$ou->ValorCargado;
            if($ou->CampoNombre=='MunicipioEstado') $mun=$ou->ValorCargado;
            if($ou->CampoNombre=='NumeroInteriorExterior') $NumeroInteriorExterior=$ou->ValorCargado;
            if($ou->CampoNombre=='CodigoPostal') $postal=$ou->ValorCargado;
            if($ou->CampoNombre=='Celular') $cel=$ou->ValorCargado;
            if($ou->CampoNombre=='Telefono') $tel=$ou->ValorCargado;
            if($ou->CampoNombre=='DomicilioAnterior') $domiA=$ou->ValorCargado;
            if($ou->CampoNombre=='TiempoVivirDomicilio') $domiT=$ou->ValorCargado;
            if($ou->CampoNombre=='TiempoVivirDomicilioAnterior') $domiAT=$ou->ValorCargado;
            if($ou->CampoNombre=='CorreoElectronico') $corE=$ou->ValorCargado;
            if($ou->CampoNombre=='EntreCalles') $entreC=$ou->ValorCargado;
            if($ou->CampoNombre=='FechaNacimiento') $nac=date("d-m-Y",strtotime($ou->ValorCargado));
            if($ou->CampoNombre=='LugarNacimiento') $nacLug=$ou->ValorCargado;
            if($ou->CampoNombre=='EdoCivil') $estC=$ou->ValorCargado;
        }
        $candidato .= " ".$ApellidoPaternoCandidato;
        $candidato .= " ".$ApellidoMaternoCandidato;
        if($cel!=""){
            $arr1 = str_split($cel);
            $cel = "";
            for($i=0;$i<count($arr1); $i++){
                if($i==3||$i==6){
                    $cel .= '-';
                }
                $cel .= $arr1[$i];
            }
        }
        if($tel!=""){
            $arr2 = str_split($tel);
            $tel = "";
            for($i=0;$i<count($arr2); $i++){
                if($i==3||$i==6){
                    $tel .= '-';
                }
                $tel .= $arr2[$i];
            }
        }
        //Documentacio
        $resultActual = DB::select("SELECT  srve.ValorCargado, mee.CampoNombre
        FROM master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
        INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
        INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
        WHERE srve.IdServicioEse=? and c.Etiqueta = 'documentación' order by mee.orden asc;",[$IdServicioEse]);

        $AnioActaNacimineto = "";
        $AplicaActaNacimineto = "";
        $FojaActaNacimiento = "";
        $LibroActaNacimiento = "";
        $ValidacionActaNacimiento = "";
        $NoActaNacimiento = "";
        $AplicaIne ="";
        $ClaveIne ="";
        $OCRIne ="";
        $ValidacionIne ="";
        $AplicaCurp = "";
        $CurpONaturlizacion = "";
        $ValidaionCurp = "";
        $AplicaComDomicilio	="";
        $FechaComDomicilio	="";
        $RelacionComDomicilio	="";
        $ServicioComDomicilio	="";
        $TitularComDomicilio	="";
        $ValidacionComDomicilio	="";
        $ImssAplica="";
        $ImssNumAfiliacion="";
        $ImssValidacion="";
        $RfcAplica="";
        $RfcEmpresa="";
        $RfcValidacion="";
        $CreditoInfonavitAplica="";
        $CreditoInfonavitNum="";
        $CreditoInfonavitMonto="";
        $CreditoInfonavitValidacion="";
        $CreditoFonacotAplica="";
        $CreditoFonacotMonto="";
        $CreditoFonacotNum="";
        $CreditofonacotValidacion="";
        $UltimoGradoAplica="";
        $UltimoGradoEscuela="";
        $UltimoGradoGrado="";
        $UltimoGradoValidacion="";
        $ReciboNominaAplica="";
        $ReciboNominaFecha="";
        $ReciboNominaEmpresa="";
        $ReciboNominaValidacion="";
        $NoActaMatrimonio="";
        $AnioActaMatrimonio="";
        $AplicaActaMatrimonio="";
        $FojaActaMatrimonio="";
        $LibroActaMatrimonio="";
        $ValidacionActaMatrimonio="";
        $NoActaNacimientoConyugue="";
        $AnioActaNacimientoConyugue="";
        $AplicaActaNacimientoConyugue="";
        $FojaActaNacimientoConyugue="";
        $LibroActaNacimientoConyugue="";
        $ValidacionActaNacimientoConyugue="";
        $CartaRecomendacionAplica="";
        $CartaRecomendacionEmpresa="";
        $CartaRecomendacionValidacion="";

        foreach($resultActual as $ou){
            if($ou->CampoNombre=='AnioActaNacimineto') $AnioActaNacimineto=$ou->ValorCargado;
            if($ou->CampoNombre=='AplicaActaNacimineto') $AplicaActaNacimineto=$ou->ValorCargado;
            if($ou->CampoNombre=='FojaActaNacimiento') $FojaActaNacimiento=$ou->ValorCargado;
            if($ou->CampoNombre=='LibroActaNacimiento') $LibroActaNacimiento=$ou->ValorCargado;
            if($ou->CampoNombre=='ValidacionActaNacimiento') $ValidacionActaNacimiento=$ou->ValorCargado;
            if($ou->CampoNombre=='NoActaNacimiento') $NoActaNacimiento=$ou->ValorCargado;
            if($ou->CampoNombre=='AplicaIne') $AplicaIne=$ou->ValorCargado;
            if($ou->CampoNombre=='ClaveIne') $ClaveIne=$ou->ValorCargado;
            if($ou->CampoNombre=='OCRIne') $OCRIne=$ou->ValorCargado;
            if($ou->CampoNombre=='ValidacionIne') $ValidacionIne=$ou->ValorCargado;
            if($ou->CampoNombre=='AplicaCurp') $AplicaCurp=$ou->ValorCargado;
            if($ou->CampoNombre=='CurpONaturlizacion') $CurpONaturlizacion=$ou->ValorCargado;
            if($ou->CampoNombre=='ValidacionIne') $ValidaionCurp=$ou->ValorCargado;
            if($ou->CampoNombre=='AplicaComDomicilio') $AplicaComDomiciliop=$ou->ValorCargado;
            if($ou->CampoNombre=='FechaComDomicilio') $FechaComDomicilio=$ou->ValorCargado;
            if($ou->CampoNombre=='RelacionComDomicilio') $RelacionComDomicilio=$ou->ValorCargado;
            if($ou->CampoNombre=='ServicioComDomicilio') $ServicioComDomicilio=$ou->ValorCargado;
            if($ou->CampoNombre=='TitularComDomicilio') $TitularComDomicilio=$ou->ValorCargado;
            if($ou->CampoNombre=='ValidacionComDomicilio') $ValidacionComDomicilio=$ou->ValorCargado;
            if($ou->CampoNombre=='ImssAplica') $ImssAplica=$ou->ValorCargado;
            if($ou->CampoNombre=='ImssNumAfiliacion') $ImssNumAfiliacion=$ou->ValorCargado;
            if($ou->CampoNombre=='ImssValidacion') $ImssValidacion=$ou->ValorCargado;
            if($ou->CampoNombre=='RfcAplica') $RfcAplica=$ou->ValorCargado;
            if($ou->CampoNombre=='RfcEmpresa') $RfcEmpresa=$ou->ValorCargado;
            if($ou->CampoNombre=='RfcValidacion') $RfcValidacion=$ou->ValorCargado;
            if($ou->CampoNombre=='CreditoInfonavitAplica') $CreditoInfonavitAplica=$ou->ValorCargado;
            if($ou->CampoNombre=='CreditoInfonavitNum') $CreditoInfonavitNum=$ou->ValorCargado;
            if($ou->CampoNombre=='CreditoInfonavitMonto') $CreditoInfonavitMonto=$ou->ValorCargado;
            if($ou->CampoNombre=='CreditoInfonavitValidacion') $CreditoInfonavitValidacion=$ou->ValorCargado;
            if($ou->CampoNombre=='CreditoFonacotAplica') $CreditoFonacotAplica=$ou->ValorCargado;
            if($ou->CampoNombre=='CreditoFonacotMonto') $CreditoFonacotMonto=$ou->ValorCargado;
            if($ou->CampoNombre=='CreditoFonacotNum') $CreditoFonacotNum=$ou->ValorCargado;
            if($ou->CampoNombre=='CreditofonacotValidacion') $CreditofonacotValidacion=$ou->ValorCargado;
            if($ou->CampoNombre=='UltimoGradoAplica') $UltimoGradoAplica=$ou->ValorCargado;
            if($ou->CampoNombre=='UltimoGradoEscuela') $UltimoGradoEscuela=$ou->ValorCargado;
            if($ou->CampoNombre=='UltimoGradoGrado') $UltimoGradoGrado=$ou->ValorCargado;
            if($ou->CampoNombre=='UltimoGradoValidacion') $UltimoGradoValidacion=$ou->ValorCargado;
            if($ou->CampoNombre=='ReciboNominaAplica') $ReciboNominaAplica=$ou->ValorCargado;
            if($ou->CampoNombre=='ReciboNominaFecha') $ReciboNominaFecha=$ou->ValorCargado;
            if($ou->CampoNombre=='ReciboNominaEmpresa') $ReciboNominaEmpresa=$ou->ValorCargado;
            if($ou->CampoNombre=='ReciboNominaValidacion') $ReciboNominaValidacion=$ou->ValorCargado;
            if($ou->CampoNombre=='NoActaMatrimonio') $NoActaMatrimonio=$ou->ValorCargado;
            if($ou->CampoNombre=='AnioActaMatrimonio') $AnioActaMatrimonio=$ou->ValorCargado;
            if($ou->CampoNombre=='AplicaActaMatrimonio') $AplicaActaMatrimonio=$ou->ValorCargado;
            if($ou->CampoNombre=='FojaActaMatrimonio') $FojaActaMatrimonio=$ou->ValorCargado;
            if($ou->CampoNombre=='LibroActaMatrimonio') $LibroActaMatrimonio=$ou->ValorCargado;
            if($ou->CampoNombre=='ValidacionActaMatrimonio') $ValidacionActaMatrimonio=$ou->ValorCargado;
            if($ou->CampoNombre=='AnioActaNacimientoConyugue') $AnioActaNacimientoConyugue=$ou->ValorCargado;
            if($ou->CampoNombre=='AplicaActaNacimientoConyugue') $AplicaActaNacimientoConyugue=$ou->ValorCargado;
            if($ou->CampoNombre=='FojaActaNacimientoConyugue') $FojaActaNacimientoConyugue=$ou->ValorCargado;
            if($ou->CampoNombre=='LibroActaNacimientoConyugue') $LibroActaNacimientoConyugue=$ou->ValorCargado;
            if($ou->CampoNombre=='ValidacionActaNacimientoConyug') $ValidacionActaNacimientoConyugue=$ou->ValorCargado;
            if($ou->CampoNombre=='NoActaNacimientoConyugue') $NoActaNacimientoConyugue=$ou->ValorCargado;
            if($ou->CampoNombre=='CartaRecomendacionEmpresa'&& $ou->ValorCargado!="" && $ou->ValorCargado!="NA") $CartaRecomendacionEmpresa.=$ou->ValorCargado.'; ';
            if($ou->CampoNombre=='CartaRecomendacionValidacion') $CartaRecomendacionValidacion=$ou->ValorCargado;
        }
        $o=0;
        $p=0;
        $q=0;
        $r=0;
        $s=0;
        $t=0;
        $AnioNacimientoHijo=[" "," "," "," "];
        $AplicaActaNacimientoHijo=[" "," "," "," "];
        $FojaActaNacimientoHijo=[" "," "," "," "];
        $LibroNoActaNacimientoHijo=[" "," "," "," "];
        $ValidacionActaNacimientoHijo=[" "," "," "," "];
        $NoActaNacimientoHijo=["","","",""];
        
        foreach($resultActual as $ou){
            if($ou->CampoNombre=='AnioNacimientoHijo') {$AnioNacimientoHijo[$o]=$ou->ValorCargado; $o++;};
            if($ou->CampoNombre=='AplicaActaNacimientoHijo') {$AplicaActaNacimientoHijo[$p]=$ou->ValorCargado; $p++;};
            if($ou->CampoNombre=='FojaActaNacimientoHijo') {$FojaActaNacimientoHijo[$q]=$ou->ValorCargado; $q++;};
            if($ou->CampoNombre=='LibroNoActaNacimientoHijo') {$LibroNoActaNacimientoHijo[$r]=$ou->ValorCargado; $r++;};
            if($ou->CampoNombre=='ValidacionActaNacimientoHijo') {$ValidacionActaNacimientoHijo[$s]=$ou->ValorCargado; $s++;};
            if($ou->CampoNombre=='NoActaNacimientoHijo') {$NoActaNacimientoHijo[$t]=$ou->ValorCargado; $t++;};
        }
        //Consulta escolaridad
        $resultActual = DB::select("SELECT  srve.ValorCargado, mee.CampoNombre
        FROM master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
        INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
        INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
        WHERE srve.IdServicioEse=? and c.Etiqueta = 'escolaridad' order by mee.orden asc;",[$IdServicioEse]);

        $EscolaridadObservaciones=" ";
        $EscolaridadIdioma=[" "," "];
        $EscolaridadIdiomaComprobante=[" "," "];
        $EscolaridadIdiomaNombres=[" "," "];
        $EscolaridadIdiomaNivel=[" "," "];
        
        $o=0;
        $p=0;
        $q=0;
        $r=0;

        //Idiomas
        foreach($resultActual as $ou){
            if($ou->CampoNombre=='EscolaridadObservaciones') $EscolaridadObservaciones=$ou->ValorCargado;
            if($ou->CampoNombre=='EscolaridadIdioma') {$EscolaridadIdioma[$o]=$ou->ValorCargado; $o++;};
            if($ou->CampoNombre=='EscolaridadIdiomaComprobante') {$EscolaridadIdiomaComprobante[$p]=$ou->ValorCargado; $p++;};
            if($ou->CampoNombre=='EscolaridadIdiomaNombre') {$EscolaridadIdiomaNombres[$q]=$ou->ValorCargado; $q++;};
            if($ou->CampoNombre=='EscolaridadIdiomaNivel') {$EscolaridadIdiomaNivel[$r]=$ou->ValorCargado; $r++;};
        }
        $o=0;
        $p=0;
        $q=0;
        $r=0;
        $s=0;
        $t=0;
        $u=0;
        $EscolaridadAnios=[" "," "];
        $EscolaridadAplica=[" "," "];
        $EscolaridadComprobante=[" "," "];
        $EscolaridadDomicilio=[" "," "];
        $EscolaridadUltimoGrado=[" "," "];
        $EscolaridadInstitucion=[" "," "];
        $EscolaridadPeriodo=[" "," "];

        //Escuelas

        foreach($resultActual as $ou){
            if($ou->CampoNombre=='EscolaridadAnios') {$EscolaridadAnios[$o]=$ou->ValorCargado; $o++;};
            if($ou->CampoNombre=='EscolaridadAplica') {$EscolaridadAplica[$p]=$ou->ValorCargado; $p++;};
            if($ou->CampoNombre=='EscolaridadComprobante') {$EscolaridadComprobante[$q]=$ou->ValorCargado; $q++;};
            if($ou->CampoNombre=='EscolaridadDomicilio') {$EscolaridadDomicilio[$r]=$ou->ValorCargado; $r++;};
            if($ou->CampoNombre=='EscolaridadUltimoGrado') {$EscolaridadUltimoGrado[$s]=$ou->ValorCargado; $s++;};
            if($ou->CampoNombre=='EscolaridadInstitucion') {$EscolaridadInstitucion[$t]=$ou->ValorCargado; $t++;};
            if($ou->CampoNombre=='EscolaridadPeriodo') {$EscolaridadPeriodo[$u]=$ou->ValorCargado; $u++;};
        }

        //SITUACIÓN SOCIAL Y ECONÓMICA
        $resultActual = DB::select("SELECT  srve.ValorCargado, mee.CampoNombre
        FROM master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
        INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
        INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
        WHERE srve.IdServicioEse=? and c.Etiqueta = 'SITUACIÓN SOCIAL Y ECONÓMICA' order by mee.orden asc;",[$IdServicioEse]);


            $ComentarioAnalista='';
            $AptoAnalista='';
            $EstatusAnalista='';
            $DictamenAnalista=DB::select("select * from master_ese_srv_dictamen_eval where IdServicioEse=$IdServicioEse");

        foreach ($DictamenAnalista as $p) {
            $ComentarioAnalista=$p->Comentarios;
            $AptoAnalista=$p->Apto;
            $EstatusAnalista=$p->Estatus;
        }
        $SitEcoCortoPlazo="";
        $SitEcoMedianoPlazo="";
        $SitEcoLargoPlazo="";
        $SitEcoPrincipalesPrincipales="";
        $SitEcoEmerNombre="";
        $SitEcoEmerAplicaCelular="";
        $SitEcoEmerCelular="";
        $SitEcoEmerRelacion="";
        $SitEcoEmerAplicaTelefono="";
        $SitEcoEmerNombreTelefonoFijo="";
        $SitEcoEmerTipoSangre="";
        $SitEcoDatoMedEnfermedadCro="";
        $SitEcoDatoMedEnfermedadCroNomb="";
        $SitEcoDatoMedTratamientoMed="";
        $SitEcoDatoMedTratamientoMedNom="";
        $SitEcoDatoMedAlergico="";
        $SitEcoDatoMedAlergiaNombre="";
        $SitEcoDatoMedControlado="";
        $SitEcoDatoMedControladoNombre="";
        $ViviendaTipoLuz="";
        $ViviendaTipoAgua="";
        $ViviendaTipoGas="";
        $ViviendaTipoDrenaje="";
        $ViviendaTipoTipoCasa="";
        $SitEcoLaViviendaEs="";
        $SitEcoObservaciones="";
        $ViviendaTipoCalidadMobiliario="";
        $ViviendaTipoCalidadLimpieza="";
        $ViviendaTipoCalidadOrden="";
        $ViviendaTipoCalidadGeneral="";
        $ViviendaTipoNivelSocioeconomic="";

        foreach($resultActual as $ou){
            if($ou->CampoNombre=='SitEcoCortoPlazo') $SitEcoCortoPlazo=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoMedianoPlazo') $SitEcoMedianoPlazo=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoLargoPlazo') $SitEcoLargoPlazo=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoPrincipalesPrincipales') $SitEcoPrincipalesPrincipales=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEmerNombre') $SitEcoEmerNombre=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEmerAplicaCelular') $SitEcoEmerAplicaCelular=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEmerCelular') $SitEcoEmerCelular=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEmerRelacion') $SitEcoEmerRelacion=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEmerAplicaTelefono') $SitEcoEmerAplicaTelefono=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEmerNombreTelefonoFijo') $SitEcoEmerNombreTelefonoFijo=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEmerTipoSangre') $SitEcoEmerTipoSangre=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoDatoMedEnfermedadCro') $SitEcoDatoMedEnfermedadCro=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoDatoMedEnfermedadCroNomb') $SitEcoDatoMedEnfermedadCroNomb=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoDatoMedTratamientoMed') $SitEcoDatoMedTratamientoMed=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoDatoMedTratamientoMedNom') $SitEcoDatoMedTratamientoMedNom=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoDatoMedAlergico') $SitEcoDatoMedAlergico=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoDatoMedAlergiaNombre') $SitEcoDatoMedAlergiaNombre=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoDatoMedControlado') $SitEcoDatoMedControlado=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoDatoMedControladoNombre') $SitEcoDatoMedControladoNombre=$ou->ValorCargado;
            if($ou->CampoNombre=='ViviendaTipoLuz') $ViviendaTipoLuz=$ou->ValorCargado;
            if($ou->CampoNombre=='ViviendaTipoAgua') $ViviendaTipoAgua=$ou->ValorCargado;
            if($ou->CampoNombre=='ViviendaTipoGas') $ViviendaTipoGas=$ou->ValorCargado;
            if($ou->CampoNombre=='ViviendaTipoDrenaje') $ViviendaTipoDrenaje=$ou->ValorCargado;
            if($ou->CampoNombre=='ViviendaTipoTipoCasa') $ViviendaTipoTipoCasa=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoLaViviendaEs') $SitEcoLaViviendaEs=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoObservaciones') $SitEcoObservaciones=$ou->ValorCargado; 
            if($ou->CampoNombre=='ViviendaTipoCalidadMobiliario') $ViviendaTipoCalidadMobiliario=$ou->ValorCargado; 
            if($ou->CampoNombre=='ViviendaTipoCalidadLimpieza') $ViviendaTipoCalidadLimpieza=$ou->ValorCargado; 
            if($ou->CampoNombre=='ViviendaTipoCalidadOrden') $ViviendaTipoCalidadOrden=$ou->ValorCargado; 
            if($ou->CampoNombre=='ViviendaTipoCalidadGeneral') $ViviendaTipoCalidadGeneral=$ou->ValorCargado; 
            if($ou->CampoNombre=='ViviendaTipoNivelSocioeconomic') $ViviendaTipoNivelSocioeconomic=$ou->ValorCargado; 
        }

        $o=0;
        $p=0;
        $q=0;
        $r=0;
        $s=0;
        $t=0;
        $u=0;
        $v=0;

        $SitEcoDatoFamiliarAplica=["","","","","",""];
        $SitEcoDatoFamiliarNombre=["","","","","",""];
        $SitEcoDatoFamiliarParentesco=["","","","","",""];
        $SitEcoDatoFamiliarEdad=["","","","","",""];
        $SitEcoDaboFamiliarEstadoCivil=["","","","","",""];
        $SitEcoDatoFamiliarOcupacion=["","","","","",""];
        $SitEcoDatoFamiliarEmpresa=["","","","","",""];
        $SitEcoDatoFamiliarDireccion=["","","","","",""];

        foreach($resultActual as $ou){
            if($ou->CampoNombre=='SitEcoDatoFamiliarAplica') {$SitEcoDatoFamiliarAplica[$o]=$ou->ValorCargado; $o++;};
            if($ou->CampoNombre=='SitEcoDatoFamiliarNombre') {$SitEcoDatoFamiliarNombre[$p]=$ou->ValorCargado; $p++;};
            if($ou->CampoNombre=='SitEcoDatoFamiliarParentesco') {$SitEcoDatoFamiliarParentesco[$q]=$ou->ValorCargado; $q++;};
            if($ou->CampoNombre=='SitEcoDatoFamiliarEdad') {$SitEcoDatoFamiliarEdad[$r]=$ou->ValorCargado; $r++;};
            if($ou->CampoNombre=='SitEcoDaboFamiliarEstadoCivil') {$SitEcoDaboFamiliarEstadoCivil[$s]=$ou->ValorCargado; $s++;};
            if($ou->CampoNombre=='SitEcoDatoFamiliarOcupacion') {$SitEcoDatoFamiliarOcupacion[$t]=$ou->ValorCargado; $t++;};
            if($ou->CampoNombre=='SitEcoDatoFamiliarEmpresa') {$SitEcoDatoFamiliarEmpresa[$u]=$ou->ValorCargado; $u++;};
            if($ou->CampoNombre=='SitEcoDatoFamiliarDireccion') {$SitEcoDatoFamiliarDireccion[$v]=$ou->ValorCargado; $v++;};
        }

        $o=0;
        $p=0;
        $q=0;
        $r=0;
        $s=0;
        $t=0;
        $u=0;
        $v=0;

        $SitEcoIngMenAplica=["","","","","",""];
        $SitEcoIngMenMonto=["","","","","",""];
        $SitEcoIngMenTipo=["","","","","",""];
        $SitEcoIngMenDescripcion=["","","","","",""];
        $SitEcoEgreMenEconomia="";
        $SitEcoEgreMenAlimentacion="";
        $SitEcoEgreMenTipo="";
        $SitEcoEgreMenTipoMonto="";
        $SitEcoEgreMenServicios="";
        $SitEcoEgreMenCreditos="";
        $SitEcoEgreMenGastos="";
        $SitEcoEgreMenDiversiones="";
        $SitEcoEgreMenOtros="";
        $SitEcoEgreMenDeficitSolventa="";
        $SitEcoBienesraices="";
        $SitEcoAutoMarca="";
        $SitEcoUbicacion="";
        $SitEcoCreditos="";
        $SitEcoCreditosMontoTotal="";
        $SitEcoComentarios="";
        
        foreach($resultActual as $ou){
            if($ou->CampoNombre=='SitEcoIngMenAplica') {$SitEcoIngMenAplica[$o]=$ou->ValorCargado; $o++;};
            if($ou->CampoNombre=='SitEcoIngMenTipo') {$SitEcoIngMenTipo[$p]=$ou->ValorCargado; $p++;};
            if($ou->CampoNombre=='SitEcoIngMenMonto') {$SitEcoIngMenMonto[$q]=$ou->ValorCargado; $q++;};
            if($ou->CampoNombre=='SitEcoIngMenDescripcion') {$SitEcoIngMenDescripcion[$r]=$ou->ValorCargado; $r++;};
            if($ou->CampoNombre=='SitEcoEgreMenEconomia') $SitEcoEgreMenEconomia=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEgreMenAlimentacion') $SitEcoEgreMenAlimentacion=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEgreMenTipo') $SitEcoEgreMenTipo=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEgreMenTipoMonto') $SitEcoEgreMenTipoMonto=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEgreMenServicios') $SitEcoEgreMenServicios=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEgreMenCreditos') $SitEcoEgreMenCreditos=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEgreMenGastos') $SitEcoEgreMenGastos=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEgreMenDiversiones') $SitEcoEgreMenDiversiones=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEgreMenOtros') $SitEcoEgreMenOtros=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoEgreMenDeficitSolventa') $SitEcoEgreMenDeficitSolventa=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoCreditosMontoTotal') $SitEcoCreditosMontoTotal=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoComentarios') $SitEcoComentarios=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoBienesraices') $SitEcoBienesraices=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoAutoMarca') $SitEcoAutoMarca=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoUbicacion') $SitEcoUbicacion=$ou->ValorCargado;
            if($ou->CampoNombre=='SitEcoCreditos') $SitEcoCreditos=$ou->ValorCargado;
        }

        $contadora=0;
        for($z=0; $z<6;$z++){
            if($SitEcoDatoFamiliarAplica[$z]=='Si'){
                $contadora++;
            }
        }

        $TtotalIngresos = 0.0;
        for($j=0;$j<6;$j++){
        
            if($SitEcoIngMenMonto[$j]!='')$TtotalIngresos += $SitEcoIngMenMonto[$j];
        }

        $TtotalEgresos = 0.0;

        if($SitEcoEgreMenDiversiones!="") $TtotalEgresos +=$SitEcoEgreMenDiversiones;
        if($SitEcoEgreMenAlimentacion!="") $TtotalEgresos += $SitEcoEgreMenAlimentacion;
        if($SitEcoEgreMenTipoMonto!="") $TtotalEgresos += $SitEcoEgreMenTipoMonto;
        if($SitEcoEgreMenServicios!="") $TtotalEgresos += $SitEcoEgreMenServicios;
        if($SitEcoEgreMenCreditos!="") $TtotalEgresos += $SitEcoEgreMenCreditos;
        if($SitEcoEgreMenGastos!="") $TtotalEgresos += $SitEcoEgreMenGastos;
        if($SitEcoEgreMenOtros!="") $TtotalEgresos += $SitEcoEgreMenOtros;

        if($SitEcoEmerCelular!=""){
            $arr1 = str_split($SitEcoEmerCelular);
            $SitEcoEmerCelular = "";
            for($i=0;$i<count($arr1); $i++){
                if($i==3||$i==6){
                    $SitEcoEmerCelular .= '-';
                }
                $SitEcoEmerCelular .= $arr1[$i];
            }
        }

        if($SitEcoEmerNombreTelefonoFijo!=""){
            $arr2 = str_split($SitEcoEmerNombreTelefonoFijo);
            $SitEcoEmerNombreTelefonoFijo = "";
            for($i=0;$i<count($arr2); $i++){
                if($i==3||$i==6){
                    $SitEcoEmerNombreTelefonoFijo .= '-';
                }
                $SitEcoEmerNombreTelefonoFijo .= $arr2[$i];
            }
        }

        //Referecnias personales 
        $resultActual = DB::select("SELECT  srve.ValorCargado, mee.CampoNombre
        FROM master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
        INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
        INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
        WHERE srve.IdServicioEse=? and c.Etiqueta = 'REFERENCIAS PERSONALES' order by mee.orden asc;",[$IdServicioEse]);

        $RefPerAplica=["","",""];
        $RefPerComentarios=["","",""];
        $RefPerNombre=["","",""];
        $RefPerRelacion=["","",""];
        $RefPerTelefono=["","",""];
        $RefPerTiempoConocer=["","",""];

        $o=0;
        $p=0;
        $q=0;
        $r=0;
        $s=0;
        $t=0;
        $u=0;
        foreach($resultActual as $ou){
            if($ou->CampoNombre=='RefPerAplica') {$RefPerAplica[$o]=$ou->ValorCargado; $o++;};
            if($ou->CampoNombre=='RefPerComentarios') {$RefPerComentarios[$p]=$ou->ValorCargado; $p++;};
            if($ou->CampoNombre=='RefPerNombre') {$RefPerNombre[$q]=$ou->ValorCargado; $q++;};
            if($ou->CampoNombre=='RefPerRelacion') {$RefPerRelacion[$r]=$ou->ValorCargado; $r++;};
            if($ou->CampoNombre=='RefPerTelefono') {$RefPerTelefono[$s]=$ou->ValorCargado; $s++;};
            if($ou->CampoNombre=='RefPerTiempoConocer') {$RefPerTiempoConocer[$t]=$ou->ValorCargado; $t++;};
        }

        for($j=0;$j<=2;$j++){
            if($RefPerTelefono[$j]!=""){
                $arr1 = str_split($RefPerTelefono[$j]);
                $RefPerTelefono[$j] = "";
                for($i=0;$i<count($arr1); $i++){
                    if($i==3||$i==6){
                        $RefPerTelefono[$j] .= '-';
                    }
                    $RefPerTelefono[$j] .= $arr1[$i];
                }
            }
        }

        //Antecedentes legales
        $resultActual = DB::select("SELECT  srve.ValorCargado, mee.CampoNombre
        FROM master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
        INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
        INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
        WHERE srve.IdServicioEse=? and c.Etiqueta = 'Antecedentes legales' order by mee.orden asc;",[$IdServicioEse]);

        $AntLegDescripcion="";
        $AntLegAlgunaVezFueDetenido="";
        $AntLeg="";
        $LaboFamiliarPuesto="";
        $LaboFamiliarNombre="";
        $LaboFamiliar="";
        $LaboDesicionCambioLaboral="";
        $LaboEnteroVacante="";
        $LaboDisponibilidadViajarMotivo="";
        $LaboDisponibilidadViajar="";
        $LaboDisponibiliddadCambiarResM="";
        $LaboDisponibiliddadCambiarRes="";
        $LaboFechaIntegracion="";

        foreach($resultActual as $ou){
            if($ou->CampoNombre=='AntLegDescripcion') $AntLegDescripcion=$ou->ValorCargado;
            if($ou->CampoNombre=='AntLegAlgunaVezFueDetenido') $AntLegAlgunaVezFueDetenido=$ou->ValorCargado;
            if($ou->CampoNombre=='AntLeg') $AntLeg=$ou->ValorCargado;
            if($ou->CampoNombre=='LaboFamiliarPuesto') $LaboFamiliarPuesto=$ou->ValorCargado;
            if($ou->CampoNombre=='LaboFamiliar') $LaboFamiliar=$ou->ValorCargado;
            if($ou->CampoNombre=='LaboDesicionCambioLaboral') $LaboDesicionCambioLaboral=$ou->ValorCargado;
            if($ou->CampoNombre=='LaboEnteroVacante') $LaboEnteroVacante=$ou->ValorCargado;
            if($ou->CampoNombre=='LaboDisponibilidadViajarMotivo') $LaboDisponibilidadViajarMotivo=$ou->ValorCargado;
            if($ou->CampoNombre=='LaboDisponibilidadViajar') $LaboDisponibilidadViajar=$ou->ValorCargado;
            if($ou->CampoNombre=='LaboDisponibiliddadCambiarResM') $LaboDisponibiliddadCambiarResM=$ou->ValorCargado;
            if($ou->CampoNombre=='LaboDisponibiliddadCambiarRes') $LaboDisponibiliddadCambiarRes=$ou->ValorCargado;
            if($ou->CampoNombre=='LaboFechaIntegracion') $LaboFechaIntegracion=$ou->ValorCargado;
            if($ou->CampoNombre=='LaboFamiliarNombre') $LaboFamiliarNombre=$ou->ValorCargado;
        }

         //Trayectoria laboral
         $resultActual = DB::select("SELECT  srve.ValorCargado, mee.CampoNombre
         FROM master_ese_srv_entrada srve 
         inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
         INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
         INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
         WHERE srve.IdServicioEse=? and c.Etiqueta = 'Trayectoria Laboral' order by mee.orden asc;",[$IdServicioEse]);

            $TrayecLaboralAplica=["","","","","",""];
            $TrayecLaboralCausa=["","","","","",""];
            $TrayecLaboralCelularJefe=["","","","","",""];
            $TrayecLaboralCriCalidadTrabajo=["","","","","",""];
            $TrayecLaboralCriIniciativa=["","","","","",""];
            $TrayecLaboralCriProductividad=["","","","","",""];
            $TrayecLaboralCriPuntualidad=["","","","","",""];
            $TrayecLaboralCriRelacionCompan=["","","","","",""];
            $TrayecLaboralCriRelacionSuperi=["","","","","",""];
            $TrayecLaboralCriResponsabilida=["","","","","",""];
            $TrayecLaboralCriHonradez=["","","","","",""];
            $TrayecLaboralDireccion=["","","","","",""];
            $TrayecLaboralEmail=["","","","","",""];
            $TrayecLaboralEmpleoActual=["","","","","",""];
            $TrayecLaboralEgreso=["","","","","",""];
            $TrayecLaboralIngreso=["","","","","",""];
            $TrayecLaboralGiro=["","","","","",""];
            $TrayecLaboralMotivoSeparacion=["","","","","",""];
            $TrayecLaboralnformo=["","","","","",""];
            $TrayecLaboralTefeInmediato=["","","","","",""];
            $TrayecLaboralNombreEmpresa=["","","","","",""];
            $TrayecLaboralObservaciones=["","","","","",""];
            $TrayecLaboralPrincipalesFunci=["","","","","",""];
            $TrayecLaboralPuestoEvaluaDes=["","","","","",""];
            $TrayecLaboralTltimoPuesto=["","","","","",""];
            $TrayecLaboralTuestoInicial=["","","","","",""];
            $TrayecLaboralPuestoJefeInmed=["","","","","",""];
            $TrayecLaboralRazonSocial=["","","","","",""];
            $TrayecLaboralTalarioFinal=["","","","","",""];
            $TrayecLaboralTalarioInicial=["","","","","",""];
            $TrayecLaboralTelOficina=["","","","","",""];
            $TrayecLaboralTipo_de_contrato=["","","","","",""];
            $TrayecLaboralCualSindicato=["","","","","",""];
            $TrayecLaboralPertenecioSindica=["","","","","",""];
            $TrayecLaboralSeriaRecontratabl=["","","","","",""];

        $o=0;
        $oo=0;
        $ooo=0;
        $p=0;
        $pp=0;
        $ppp=0;
        $q=0;
        $qq=0;
        $qqq=0;
        $r=0;
        $rr=0;
        $rrr=0;
        $s=0;
        $ss=0;
        $sss=0;
        $t=0;
        $tt=0;
        $ttt=0;
        $u=0;
        $uu=0;
        $uuu=0;
        $w=0;
        $ww=0;
        $www=0;
        $x=0;
        $xx=0;
        $xxx=0;
        $y=0;
        $yy=0;
        $yyy=0;
        $z=0;
        $zz=0;
        $zzz=0;
        $v=0;
        $vv=0;
        $z=0;
        foreach($resultActual as $ou){
            if($ou->CampoNombre=='TrayecLaboralAplica') {$TrayecLaboralAplica[$o]=$ou->ValorCargado; $o++; };
            if($ou->CampoNombre=='TrayecLaboralCausa') {$TrayecLaboralCausa[$oo]=$ou->ValorCargado; $oo++; };
            if($ou->CampoNombre=='TrayecLaboralCelularJefe') {$TrayecLaboralCelularJefe[$ooo]=$ou->ValorCargado; $ooo++; };
            if($ou->CampoNombre=='TrayecLaboralCriCalidadTrabajo') {$TrayecLaboralCriCalidadTrabajo[$p]=$ou->ValorCargado; $p++; };
            if($ou->CampoNombre=='TrayecLaboralCriIniciativa') {$TrayecLaboralCriIniciativa[$pp]=$ou->ValorCargado; $pp++; };
            if($ou->CampoNombre=='TrayecLaboralCriProductividad') {$TrayecLaboralCriProductividad[$ppp]=$ou->ValorCargado; $ppp++; };
            if($ou->CampoNombre=='TrayecLaboralCriPuntualidad') {$TrayecLaboralCriPuntualidad[$q]=$ou->ValorCargado; $q++; };
            if($ou->CampoNombre=='TrayecLaboralCriRelacionCompan') {$TrayecLaboralCriRelacionCompan[$qq]=$ou->ValorCargado; $qq++; };
            if($ou->CampoNombre=='TrayecLaboralCriRelacionSuperi') {$TrayecLaboralCriRelacionSuperi[$qqq]=$ou->ValorCargado; $qqq++; };
            if($ou->CampoNombre=='TrayecLaboralCriResponsabilida') {$TrayecLaboralCriResponsabilida[$r]=$ou->ValorCargado; $r++; };
            if($ou->CampoNombre=='TrayecLaboralCriHonradez') {$TrayecLaboralCriHonradez[$rr]=$ou->ValorCargado; $rr++; };
            if($ou->CampoNombre=='TrayecLaboralDireccion') {$TrayecLaboralDireccion[$rrr]=$ou->ValorCargado; $rrr++; };
            if($ou->CampoNombre=='TrayecLaboralEmail') {$TrayecLaboralEmail[$s]=$ou->ValorCargado; $s++; };
            if($ou->CampoNombre=='TrayecLaboralEmpleoActual') {$TrayecLaboralEmpleoActual[$ss]=$ou->ValorCargado; $ss++; };
            if($ou->CampoNombre=='TrayecLaboralEgreso') {$TrayecLaboralEgreso[$sss]=date("d-m-Y",strtotime($ou->ValorCargado)); $sss++; };
            if($ou->CampoNombre=='TrayecLaboralIngreso') {$TrayecLaboralIngreso[$t]=date("d-m-Y",strtotime($ou->ValorCargado)); $t++; };
            if($ou->CampoNombre=='TrayecLaboralGiro') {$TrayecLaboralGiro[$tt]=$ou->ValorCargado; $tt++; };
            if($ou->CampoNombre=='TrayecLaboralMotivoSeparacion') {$TrayecLaboralMotivoSeparacion[$ttt]=$ou->ValorCargado; $ttt++; };
            if($ou->CampoNombre=='TrayecLaboralnformo') {$TrayecLaboralnformo[$u]=$ou->ValorCargado; $u++; };
            if($ou->CampoNombre=='TrayecLaboralTefeInmediato') {$TrayecLaboralTefeInmediato[$uu]=$ou->ValorCargado; $uu++; };
            if($ou->CampoNombre=='TrayecLaboralNombreEmpresa') {$TrayecLaboralNombreEmpresa[$uuu]=$ou->ValorCargado; $uuu++; };
            if($ou->CampoNombre=='TrayecLaboralObservaciones') {$TrayecLaboralObservaciones[$w]=$ou->ValorCargado; $w++; };
            if($ou->CampoNombre=='TrayecLaboralPrincipalesFunci') {$TrayecLaboralPrincipalesFunci[$ww]=$ou->ValorCargado; $ww++; };
            if($ou->CampoNombre=='TrayecLaboralPuestoEvaluaDes') {$TrayecLaboralPuestoEvaluaDes[$www]=$ou->ValorCargado; $www++; };
            if($ou->CampoNombre=='TrayecLaboralTltimoPuesto') {$TrayecLaboralTltimoPuesto[$x]=$ou->ValorCargado; $x++; };
            if($ou->CampoNombre=='TrayecLaboralTuestoInicial') {$TrayecLaboralTuestoInicial[$xx]=$ou->ValorCargado; $xx++; };
            if($ou->CampoNombre=='TrayecLaboralPuestoJefeInmed') {$TrayecLaboralPuestoJefeInmed[$xxx]=$ou->ValorCargado; $xxx++; };
            if($ou->CampoNombre=='TrayecLaboralRazonSocial') {$TrayecLaboralRazonSocial[$y]=$ou->ValorCargado; $y++; };
            if($ou->CampoNombre=='TrayecLaboralTalarioFinal') {$TrayecLaboralTalarioFinal[$yy]=$ou->ValorCargado; $yy++; };
            if($ou->CampoNombre=='TrayecLaboralTalarioInicial') {$TrayecLaboralTalarioInicial[$z]=$ou->ValorCargado; $z++; };
            if($ou->CampoNombre=='TrayecLaboralTelOficina') {$TrayecLaboralTelOficina[$zz]=$ou->ValorCargado; $zz++; };
            if($ou->CampoNombre=='TrayecLaboralTipo de contrato') {$TrayecLaboralTipo_de_contrato[$zzz]=$ou->ValorCargado; $zzz++; };
            if($ou->CampoNombre=='TrayecLaboralCualSindicato') {$TrayecLaboralCualSindicato[$yyy]=$ou->ValorCargado; $yyy++; };
            if($ou->CampoNombre=='TrayecLaboralPertenecioSindica') {$TrayecLaboralPertenecioSindica[$v]=$ou->ValorCargado; $v++; };
            if($ou->CampoNombre=='TrayecLaboralSeriaRecontratabl') {$TrayecLaboralSeriaRecontratabl[$vv]=$ou->ValorCargado; $vv++; };
        }
        for($j=0; $j<=5;$j++){
            if( $TrayecLaboralEgreso[$j] =='31-12-1969'){
                $TrayecLaboralEgreso[$j]="-";
            }
            if( $TrayecLaboralIngreso[$j] =='31-12-1969'){
                $TrayecLaboralIngreso[$j]="-";
            }
        }
        if( $nac =='31-12-1969'){
                $nac="-";
        }
        $contadora=0;
        for($z=0; $z<6;$z++){
            if($TrayecLaboralAplica[$z]=='Si'){
                $contadora++;
            }
        }
        for($j=0;$j<=5;$j++){
            if($TrayecLaboralCelularJefe[$j]!=""){
                $arr1 = str_split($TrayecLaboralCelularJefe[$j]);
                $TrayecLaboralCelularJefe[$j] = "";
                for($i=0;$i<count($arr1); $i++){
                    if($i==3||$i==6){
                        $TrayecLaboralCelularJefe[$j] .= '-';
                    }
                    $TrayecLaboralCelularJefe[$j] .= $arr1[$i];
                }
            }
        }
        for($j=0;$j<=5;$j++){
            if($TrayecLaboralTelOficina[$j]!=""){
                $arr1 = str_split($TrayecLaboralTelOficina[$j]);
                $TrayecLaboralTelOficina[$j] = "";
                for($i=0;$i<count($arr1); $i++){
                    if($i==3||$i==6){
                        $TrayecLaboralTelOficina[$j] .= '-';
                    }
                    $TrayecLaboralTelOficina[$j] .= $arr1[$i];
                }
            }
        }
        //Fotografias
        $resultActual = DB::select("SELECT  srve.ValorCargado, mee.CampoNombre
        FROM master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
        INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
        INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
        WHERE srve.IdServicioEse=? and c.Etiqueta = 'FOTOS DEL DOMICILIO';",[$IdServicioEse]);

        $FotoCandidato = "";
        $FotoDomicilioInterior = "";
        $FotoDomicilioExterior = "";

        foreach($resultActual as $ou){
            if($ou->CampoNombre=='FotoCandidato') $FotoCandidato=$ou->ValorCargado;
            if($ou->CampoNombre=='FotoDomicilioInterior') $FotoDomicilioInterior=$ou->ValorCargado;
            if($ou->CampoNombre=='FotoDomicilioExterior') $FotoDomicilioExterior=$ou->ValorCargado;
        }

        $resultActual = DB::select("SELECT  srve.ValorCargado, mee.CampoNombre
        FROM master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
        INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
        INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
        WHERE srve.IdServicioEse=? and c.Etiqueta = 'CROQUIS DE UBICACIÓN DEL DOMICILIO';",[$IdServicioEse]);
   
        // $Modalidades=DB::select("select * from master_ese_modalidad");
        $CroquisImagen="";
        $CroquisTiempo="";
        $CroquisMedioTransporte="";
       
        $modal =DB::select("SELECT Descripcion
                        from master_ese_modalidad M
                        JOIN master_ese_srv_servicio MS
                        ON M.IdModalidad = MS.IdModalidad WHERE MS.IdServicioEse = $IdServicioEse");
        
        foreach($resultActual as $ou){
            if($ou->CampoNombre=='CroquisImagen') $CroquisImagen=$ou->ValorCargado;
            if($ou->CampoNombre=='CroquisTiempo') $CroquisTiempo=$ou->ValorCargado;
            if($ou->CampoNombre=='CroquisMedioTransporte') $CroquisMedioTransporte=$ou->ValorCargado;
        }
        $moda="";
        foreach($modal as $d){
            $moda=$d->Descripcion;
        }

        $resultActual = DB::select("select us.fileBase64 as firma, us.telefono_movil as telefonoA, us.email as mail, concat(us.Name,' ',us.Apellido_Paterno,' ',ifnull( us.Apellido_Materno,'') ) as NombreCompleto
        from users as us
        inner join master_ese_srv_asignacion asif on asif.IdAnalista= us.id
        where asif.IdServicioEse=?;",[$IdServicioEse]);
        
        $nca="";
        $horaE="";
        $email="";
        $telefonoA="";
        $firma="";
        foreach($resultActual as $d){
            $nca=$d->NombreCompleto;
            $email=$d->mail;
            $telefonoA=$d->telefonoA;
            $firma=$d->firma;
        }

        $horaE="";
        $resultActual = DB::select("SELECT FechaEjecucion as fe FROM master_ese_srv_programacion WHERE IdServicioEse=?;",[$IdServicioEse]);
          
        foreach($resultActual as $d){
            $horaE=$d->fe;
        }

        $meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
        $dia ="";
        $mes ="";
        $año = "";
        
        $programacion = DB::select("SELECT mesp.*,DATE_FORMAT(mesp.FechaEjecucion,'%Y-%m-%d %H:%i') as DATE_FORMATTED FROM master_ese_srv_programacion mesp WHERE mesp.IdServicioEse = ?", [$IdServicioEse]);

        foreach ($programacion as $item) {
            if($item->DATE_FORMATTED != null){
                $dateAndHour = explode(' ',$item->DATE_FORMATTED);
                $horaE = $dateAndHour[0];
            }
        }
        $me="";
        if($horaE!=""){
            $arr1 = str_split($horaE);
            for($i=0;$i<count($arr1); $i++){
                if($i<=3)$año .= $arr1[$i];
                if($i<=6 && $i>=5) $me .= $arr1[$i];
                if($i<=9 && $i>=8) $dia .= $arr1[$i];       
            }
        }
        for($i=1;$i<=12;$i++){
            if($me=="0".$i || $me=="".$i){
                $mes = $meses[$i-1];
            }
        }
        if($telefonoA!=""){
                $arr1 = str_split($telefonoA);
                $telefonoA = "";
                for($i=0;$i<count($arr1); $i++){
                    if($i==3||$i==6){
                        $telefonoA .= '-';
                    }
                    $telefonoA .= $arr1[$i];
                }
            }

          $clientes= DB::select("select s.*, (SELECT c.nombre_comercial as Nombre from clientes as c where c.id = s.IdCliente) as Cliente,
          (select os.IdServicioOS from master_ese_srv_os as os where os.IdServicioSRV = s.IdServicioEse ) as enlace
           from master_ese_srv_servicio as s where s.IdServicioEse = $IdServicioEse");

           $cliente='';$enlace='';
           foreach ($clientes as $g) {
             $cliente = $g->Cliente;
             $enlace=$g->enlace;
           }

        $ResumenEconomica = "";
        $ResumenEscolar = "";
        $ResumenTrayectoriaLaboral = "";
        $Disponibilidad = "";
        $Puntualidad = "";
        $Seriedad = "";
        $Actitud = ""; 
        $Confiabilidad = "";
        $Seguridad = "";
        $Presentacion = "";
        $Comentarios = "";
        $Estatus = "";

        $dictamenInvestigador = DB::select("SELECT mesdi.* FROM master_ese_srv_dictamen_inv mesdi WHERE mesdi.IdServicioEse = ?;", [$IdServicioEse]);

        foreach ($dictamenInvestigador as $value) {
            $ResumenEconomica = $value->ResumenSituacionEco;
            $ResumenEscolar = $value->ResumenEscolaridad;
            $ResumenTrayectoriaLaboral = $value->ResumenTrayectoriaLab;
            $Disponibilidad = $value->CandiatoDisponibilidad;
            $Puntualidad = $value->CandiatoPuntualidad;
            $Seriedad = $value->CandiatoSeriedad;
            $Actitud = $value->CandiatoActitud; 
            $Confiabilidad = $value->CandiatoConfiabilidad;
            $Seguridad = $value->CandiatoSeguridad;
            $Presentacion = $value->CandiatoPresentacion;
            $Comentarios = $value->Comentarios;
            $Estatus = $value->Estatus;           
        }

        $pdf = PDF::loadView('ESE.pdf.pdf-gent',[
            "horaE"=>$horaE,
            "dia"=>$dia,
            "mes"=>$mes,
            "año"=>$año,
            'contadora'=> $contadora,
            'firma'=>$firma,
            'nca'=>$nca,
            'email'=>$email,
            'telefonoA'=>$telefonoA,
            'CroquisImagen'=>$CroquisImagen,
            'CroquisTiempo'=>$CroquisTiempo,
            'CroquisMedioTransporte'=>$CroquisMedioTransporte,
            'IdCliente'=>$idc,  
            'IdServicioEse' => $IdServicioEse,
            'clientes'=>$cliente, 
            "candidato"=>$candidato,
            "ResumenEconomica" =>$ResumenEconomica,
            "ResumenEscolar" => $ResumenEscolar,
            "ResumenTrayectoriaLaboral" => $ResumenTrayectoriaLaboral,
            "Disponibilidad" => $Disponibilidad,
            "Puntualidad" => $Puntualidad,
            "Seriedad" => $Seriedad,
            "Actitud" => $Actitud,
            "Confiabilidad" => $Confiabilidad,
            "Seguridad" => $Seguridad,
            "Presentacion" => $Presentacion,
            "Comentarios" => $Comentarios,
            "Estatus" => $Estatus,
            "puesto"=> $puesto,
            'domi'=>$domi,
            'NumeroInteriorExterior'=>$NumeroInteriorExterior,
            'col'=>$col,
            'mun'=>$mun,
            'postal'=>$postal,
            'cel'=>$cel,
            'tel'=>$tel,
            'domiA'=>$domiA,
            'domiAT'=>$domiAT,
            'domiT'=>$domiT,
            'corE'=>$corE,
            'entreC'=>$entreC,
            'nac'=>$nac,
            'nacLug'=>$nacLug,
            'estC'=>$estC,
            'AnioActaNacimineto'	=> $AnioActaNacimineto,
            'AplicaActaNacimineto'	=> $AplicaActaNacimineto,
            'FojaActaNacimiento'	=> $FojaActaNacimiento,
            'LibroActaNacimiento'	=> $LibroActaNacimiento,
            'ValidacionActaNacimiento' =>	$ValidacionActaNacimiento,
            'NoActaNacimiento' => $NoActaNacimiento,
            'AplicaIne'	=>$AplicaIne,
            'ClaveIne'	=>$ClaveIne,
            'OCRIne'	=>$OCRIne,
            'ValidacionIne'	=>$ValidacionIne,
            'AplicaCurp'	=>$AplicaCurp,
            'CurpONaturlizacion'	=>$CurpONaturlizacion,
            'ValidaionCurp'	=>$ValidaionCurp,
            "AplicaComDomicilio"=>$AplicaComDomicilio,
            "FechaComDomicilio"=>date("d-m-Y",strtotime($FechaComDomicilio))	,
            "RelacionComDomicilio"=>$RelacionComDomicilio,
            "ServicioComDomicilio"=>$ServicioComDomicilio,
            "TitularComDomicilio"=>$TitularComDomicilio,
            "ValidacionComDomicilio"=>$ValidacionComDomicilio,
            "ImssAplica"=>$ImssAplica,
            "ImssNumAfiliacion"=>$ImssNumAfiliacion,
            "ImssValidacion"=>$ImssValidacion,
            "RfcAplica"=>$RfcAplica,
            "RfcEmpresa"=>$RfcEmpresa,
            "RfcValidacion"=>$RfcValidacion,
            "CreditoInfonavitAplica"=>$CreditoInfonavitAplica,
            "CreditoInfonavitNum"=>$CreditoInfonavitNum,
            "CreditoInfonavitMonto"=>$CreditoInfonavitMonto,
            "CreditoInfonavitValidacion"=>$CreditoInfonavitValidacion,
            "CreditoFonacotAplica"=>$CreditoFonacotAplica,
            "CreditoFonacotMonto"=>$CreditoFonacotMonto,
            "CreditoFonacotNum"=>$CreditoFonacotNum,
            "CreditofonacotValidacion"=>$CreditofonacotValidacion,
            "UltimoGradoAplica"=>$UltimoGradoAplica,
            "UltimoGradoEscuela"=>$UltimoGradoEscuela,
            "UltimoGradoGrado"=>$UltimoGradoGrado,
            "UltimoGradoValidacion"=>$UltimoGradoValidacion,
            "ReciboNominaAplica"=>$ReciboNominaAplica,
            "ReciboNominaFecha"=>$ReciboNominaFecha,
            "ReciboNominaEmpresa"=>$ReciboNominaEmpresa,
            "ReciboNominaValidacion"=>$ReciboNominaValidacion,
            "AnioActaMatrimonio"=>$AnioActaMatrimonio,
            "AplicaActaMatrimonio"=>$AplicaActaMatrimonio,
            "FojaActaMatrimonio"=>$FojaActaMatrimonio,
            "LibroActaMatrimonio"=>$LibroActaMatrimonio,
            "ValidacionActaMatrimonio"=>$ValidacionActaMatrimonio,
            "NoActaNacimientoConyugue"=>$NoActaNacimientoConyugue,
            "AnioActaNacimientoConyugue"=>$AnioActaNacimientoConyugue,
            "AplicaActaNacimientoConyugue"=>$AplicaActaNacimientoConyugue,
            "FojaActaNacimientoConyugue"=>$FojaActaNacimientoConyugue,
            "LibroActaNacimientoConyugue"=>$LibroActaNacimientoConyugue,
            "ValidacionActaNacimientoConyugue"=>$ValidacionActaNacimientoConyugue,
            'NoActaMatrimonio'=>$NoActaMatrimonio,
            "CartaRecomendacionAplica"=>$CartaRecomendacionAplica,
            "CartaRecomendacionEmpresa"=>$CartaRecomendacionEmpresa,
            "CartaRecomendacionValidacion"=>$CartaRecomendacionValidacion,
            'EscolaridadObservaciones' =>$EscolaridadObservaciones,
            "EscolaridadIdioma"=>$EscolaridadIdioma,
            "EscolaridadIdiomaComprobante"=>$EscolaridadIdiomaComprobante,
            "EscolaridadIdiomaNombres"=>$EscolaridadIdiomaNombres,
            "EscolaridadIdiomaNivel"=>$EscolaridadIdiomaNivel,
            "EscolaridadAnios"=>$EscolaridadAnios,
            "EscolaridadAplica"=>$EscolaridadAplica,
            "EscolaridadComprobante"=>$EscolaridadComprobante,
            "EscolaridadDomicilio"=>$EscolaridadDomicilio,
            "EscolaridadUltimoGrado"=>$EscolaridadUltimoGrado,
            "EscolaridadInstitucion"=>$EscolaridadInstitucion,
            "EscolaridadPeriodo"=>$EscolaridadPeriodo,
            "NoActaNacimientoHijo"=>$NoActaNacimientoHijo,
            "AnioNacimientoHijo"=>$AnioNacimientoHijo,
            "AplicaActaNacimientoHijo"=>$AplicaActaNacimientoHijo,
            "FojaActaNacimientoHijo"=>$FojaActaNacimientoHijo,
            "LibroNoActaNacimientoHijo"=>$LibroNoActaNacimientoHijo,
            "ValidacionActaNacimientoHijo"=>$ValidacionActaNacimientoHijo,
            "SitEcoCortoPlazo"=>$SitEcoCortoPlazo,
            "SitEcoMedianoPlazo"=>$SitEcoMedianoPlazo,
            "SitEcoLargoPlazo"=>$SitEcoLargoPlazo,
            "SitEcoPrincipalesPrincipales"=>$SitEcoPrincipalesPrincipales,
            "SitEcoEmerNombre"=>$SitEcoEmerNombre,
            "SitEcoEmerAplicaCelular"=>$SitEcoEmerAplicaCelular,
            "SitEcoEmerCelular"=>$SitEcoEmerCelular,
            "SitEcoEmerRelacion"=>$SitEcoEmerRelacion,
            "SitEcoEmerAplicaTelefono"=>$SitEcoEmerAplicaTelefono,
            "SitEcoEmerNombreTelefonoFijo"=>$SitEcoEmerNombreTelefonoFijo,
            "SitEcoEmerTipoSangre"=>$SitEcoEmerTipoSangre,
            "SitEcoDatoMedEnfermedadCro"=>$SitEcoDatoMedEnfermedadCro,
            "SitEcoDatoMedEnfermedadCroNomb"=>$SitEcoDatoMedEnfermedadCroNomb,
            "SitEcoDatoMedTratamientoMed"=>$SitEcoDatoMedTratamientoMed,
            "SitEcoDatoMedTratamientoMedNom"=>$SitEcoDatoMedTratamientoMedNom,
            "SitEcoDatoMedAlergico"=>$SitEcoDatoMedAlergico,
            "SitEcoDatoMedAlergiaNombre"=>$SitEcoDatoMedAlergiaNombre,
            "SitEcoDatoMedControlado"=>$SitEcoDatoMedControlado,
            "SitEcoDatoMedControladoNombre"=>$SitEcoDatoMedControladoNombre,
            "ViviendaTipoLuz"=>$ViviendaTipoLuz,
            "ViviendaTipoAgua"=>$ViviendaTipoAgua,
            "ViviendaTipoGas"=>$ViviendaTipoGas,
            "ViviendaTipoDrenaje"=>$ViviendaTipoDrenaje,
            "ViviendaTipoTipoCasa"=>$ViviendaTipoTipoCasa,
            'SitEcoLaViviendaEs'=>$SitEcoLaViviendaEs,
            "SitEcoObservaciones"=>$SitEcoObservaciones,
            "moda"=>$moda,
            "ViviendaTipoCalidadMobiliario"=>$ViviendaTipoCalidadMobiliario,
            "ViviendaTipoCalidadLimpieza"=>$ViviendaTipoCalidadLimpieza,
            "ViviendaTipoCalidadOrden"=>$ViviendaTipoCalidadOrden,
            "ViviendaTipoCalidadGeneral"=>$ViviendaTipoCalidadGeneral,
            "ViviendaTipoNivelSocioeconomic"=>$ViviendaTipoNivelSocioeconomic,
            "SitEcoDatoFamiliarAplica"=>$SitEcoDatoFamiliarAplica,
            "SitEcoDatoFamiliarNombre"=>$SitEcoDatoFamiliarNombre,
            "SitEcoDatoFamiliarParentesco"=>$SitEcoDatoFamiliarParentesco,
            "SitEcoDatoFamiliarEdad"=>$SitEcoDatoFamiliarEdad,
            "SitEcoDaboFamiliarEstadoCivil"=>$SitEcoDaboFamiliarEstadoCivil,
            "SitEcoDatoFamiliarOcupacion"=>$SitEcoDatoFamiliarOcupacion,
            "SitEcoDatoFamiliarEmpresa"=>$SitEcoDatoFamiliarEmpresa,
            "SitEcoDatoFamiliarDireccion"=>$SitEcoDatoFamiliarDireccion,
            "SitEcoIngMenAplica"=>$SitEcoIngMenAplica,
            "SitEcoIngMenMonto"=>$SitEcoIngMenMonto,
            "SitEcoIngMenTipo"=>$SitEcoIngMenTipo,
            "SitEcoIngMenDescripcion"=>$SitEcoIngMenDescripcion,
             "TtotalIngresos"=>$TtotalIngresos,
             "SitEcoEgreMenEconomia"=>$SitEcoEgreMenEconomia,
            "SitEcoEgreMenAlimentacion"=>$SitEcoEgreMenAlimentacion,
            "SitEcoEgreMenTipo"=>$SitEcoEgreMenTipo,
            "SitEcoEgreMenTipoMonto"=>$SitEcoEgreMenTipoMonto,
            "SitEcoEgreMenServicios"=>$SitEcoEgreMenServicios,
            "SitEcoEgreMenCreditos"=>$SitEcoEgreMenCreditos,
            "SitEcoEgreMenGastos"=>$SitEcoEgreMenGastos,
            "SitEcoEgreMenDiversiones"=>$SitEcoEgreMenDiversiones,
            "SitEcoEgreMenOtros"=>$SitEcoEgreMenOtros,
            "SitEcoEgreMenDeficitSolventa"=>$SitEcoEgreMenDeficitSolventa,
            "TtotalEgresos"=>$TtotalEgresos,
            'DictamenVal'=>$AptoAnalista,
            'FotoCandidato'=>$FotoCandidato,
            'FotoCandidato'=>$FotoCandidato,
            'FotoDomicilioInterior'=>$FotoDomicilioInterior,
            'FotoDomicilioExterior'=>$FotoDomicilioExterior,
            'SitEcoBienesraices'=>$SitEcoBienesraices,
            'SitEcoAutoMarca'=>$SitEcoAutoMarca,
            'SitEcoUbicacion'=>$SitEcoUbicacion,
            'SitEcoCreditos'=>$SitEcoCreditos,
            "RefPerAplica"=>$RefPerAplica,
            "RefPerComentarios"=>$RefPerComentarios,
            "RefPerNombre"=>$RefPerNombre,
            "RefPerRelacion"=>$RefPerRelacion,
            "RefPerTelefono"=>$RefPerTelefono,
            "RefPerTiempoConocer"=>$RefPerTiempoConocer,
            "SitEcoCreditosMontoTotal"=>$SitEcoCreditosMontoTotal,
            "SitEcoComentarios"=>$SitEcoComentarios,
            "AntLegDescripcion"=>$AntLegDescripcion,
            "AntLegAlgunaVezFueDetenido"=>$AntLegAlgunaVezFueDetenido,
            "AntLeg"=>$AntLeg,
            "LaboFamiliarPuesto"=>$LaboFamiliarPuesto,
            "LaboFamiliarNombre"=>$LaboFamiliarNombre,
            "LaboFamiliar"=>$LaboFamiliar,
            "LaboDesicionCambioLaboral"=>$LaboDesicionCambioLaboral,
            "LaboEnteroVacante"=>$LaboEnteroVacante,
            "LaboDisponibilidadViajarMotivo"=>$LaboDisponibilidadViajarMotivo,
            "LaboDisponibilidadViajar"=>$LaboDisponibilidadViajar,
            "LaboDisponibiliddadCambiarResM"=>$LaboDisponibiliddadCambiarResM,
            "LaboDisponibiliddadCambiarRes"=>$LaboDisponibiliddadCambiarRes,
            "LaboFechaIntegracion"=>$LaboFechaIntegracion,
            "TrayecLaboralAplica"=>$TrayecLaboralAplica,
            "TrayecLaboralCausa"=>$TrayecLaboralCausa,
            "TrayecLaboralCelularJefe"=>$TrayecLaboralCelularJefe,
            "TrayecLaboralCriCalidadTrabajo"=>$TrayecLaboralCriCalidadTrabajo,
            "TrayecLaboralCriIniciativa"=>$TrayecLaboralCriIniciativa,
            "TrayecLaboralCriProductividad"=>$TrayecLaboralCriProductividad,
            "TrayecLaboralCriPuntualidad"=>$TrayecLaboralCriPuntualidad,
            "TrayecLaboralCriRelacionCompan"=>$TrayecLaboralCriRelacionCompan,
            "TrayecLaboralCriRelacionSuperi"=>$TrayecLaboralCriRelacionSuperi,
            "TrayecLaboralCriResponsabilida"=>$TrayecLaboralCriResponsabilida,
            "TrayecLaboralCriHonradez"=>$TrayecLaboralCriHonradez,
            "TrayecLaboralDireccion"=>$TrayecLaboralDireccion,
            "TrayecLaboralEmail"=>$TrayecLaboralEmail,
            "TrayecLaboralEmpleoActual"=>$TrayecLaboralEmpleoActual,
            "TrayecLaboralEgreso"=>$TrayecLaboralEgreso,
            "TrayecLaboralIngreso"=>$TrayecLaboralIngreso,
            "TrayecLaboralGiro"=>$TrayecLaboralGiro,
            "TrayecLaboralMotivoSeparacion"=>$TrayecLaboralMotivoSeparacion,
            "TrayecLaboralnformo"=>$TrayecLaboralnformo,
            "TrayecLaboralTefeInmediato"=>$TrayecLaboralTefeInmediato,
            "TrayecLaboralNombreEmpresa"=>$TrayecLaboralNombreEmpresa,
            "TrayecLaboralObservaciones"=>$TrayecLaboralObservaciones,
            "TrayecLaboralPrincipalesFunci"=>$TrayecLaboralPrincipalesFunci,
            "TrayecLaboralPuestoEvaluaDes"=>$TrayecLaboralPuestoEvaluaDes,
            "TrayecLaboralTltimoPuesto"=>$TrayecLaboralTltimoPuesto,
            "TrayecLaboralTuestoInicial"=>$TrayecLaboralTuestoInicial,
            "TrayecLaboralPuestoJefeInmed"=>$TrayecLaboralPuestoJefeInmed,
            "TrayecLaboralRazonSocial"=>$TrayecLaboralRazonSocial,
            "TrayecLaboralTalarioFinal"=>$TrayecLaboralTalarioFinal,
            "TrayecLaboralTalarioInicial"=>$TrayecLaboralTalarioInicial,
            "TrayecLaboralTelOficina"=>$TrayecLaboralTelOficina,
            "TrayecLaboralTipo_de_contrato"=>$TrayecLaboralTipo_de_contrato,
            "TrayecLaboralCualSindicato"=>$TrayecLaboralCualSindicato,
            "TrayecLaboralPertenecioSindica"=>$TrayecLaboralPertenecioSindica,
            "TrayecLaboralSeriaRecontratabl"=>$TrayecLaboralSeriaRecontratabl

    ]);
        return $pdf->stream();
    }

    public function ConfiguracionOS($id,$idc)
    {

      $queryTipos = DB::select("select p.IdTipos from master_ese_plantilla_cliente as pc
            inner join master_ese_plantilla as p on p.IdPlantilla = pc.IdPlantilla
           where IdPlantillaCliente = $id");

      $tipo=0;
           foreach ($queryTipos as $g) {
             $tipo=$g->IdTipos;
           }
           $sqls='';
            $i=1;
                $Servicio  = MasterEseServicio::Create(["IdCliente" => $idc,
                "IdPlantillaCliente"     => $id,
                "IdModalidad"            => null,
                "IdPrioridad"            => 3,
                "Comentarios"            => null,
                "Estatus"                => 'Creada',
                "SyncGrid"               => 1,
                "SyncData"               => 0,
                "FechaCreacion"          => date('d-m-Y H:i:s'),
                "IdTipoServicio"         => $tipo,
                "MinutosEjecucionInves"  => 0
                ]);
                $IdServicioEse=$Servicio->IdServicioEse;
                $IdPC=$Servicio->IdPlantillaCliente;
                $Asignacion = MasterEseAsignacion::Create(['IdServicioEse' => $IdServicioEse,
                                    'IdLider'       => null,
                                    'IdAnalista'    => null,
                                    'IdInvestigador'=> null,
                                    'IdAnalistaSec' => null
                                    ]);

                $queryL = DB::select("select * from master_ese_plantilla_cliente_entrada
                where IdPlantillaCliente= $IdPC and Activo='Si'");

                foreach($queryL as $name){
                    $IdEntrada                 = $name->IdEntrada;
                    $Requerido                 = $name->Requerido;
                    $VisibleReportes           = $name->VisibleReportes;
                    $VisibleForms              = $name->VisibleForms;
                    $VisibleGrids              = $name->VisibleGrids;
                    $VisibleOSClientes         = $name->VisibleOSClientes;
                    $TempUsrEdita              = $name->TempUsrEdita;
                    $Orden                     = $name->Orden;
                    $Indice                    = $name->Indice;
                    if(count($queryL) == $i){
                    $sqls.=" ($IdEntrada,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$IdServicioEse,$Indice)";
                    }else{
                        $sqls.=" ($IdEntrada,$Requerido,$VisibleReportes,$VisibleForms,$VisibleGrids,$VisibleOSClientes,$TempUsrEdita,$Orden,$IdServicioEse,$Indice),";
                    }
                    $i++;
            }

            DB::insert("INSERT INTO master_ese_srv_entrada (IdEntrada,Requerido,VisibleReportes,VisibleForms,VisibleGrids,VisibleOSClientes,TempUsrEdita,Orden,IdServicioEse,Indice) VALUES $sqls");
                $ServicioOS  = MasterEseServicioOS::Create([
                "IdCliente"      => $idc,
                "IdModulo"      => 1,
                "IdServicioSRV"   => $IdServicioEse,
                "FechaSolicitud" => date('d-m-Y H:i:s')
                ]);

          $ntf = new Notificaciones();
          $ntf->notificaUsuarios($IdServicioEse,'CLTE-NOTIFICACION','Cliente',$idc);

          $queryExstEtqMC = DB::select("SELECT EXISTS(SELECT 1 from master_ese_contenedor
          Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
          Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
          Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
          Where master_ese_srv_entrada.IdServicioEse = $IdServicioEse and master_ese_srv_entrada.VisibleForms =1 
          and ((master_ese_entrada.Etiqueta='Ciudad / Municipio / Alcaldía') || (master_ese_entrada.Etiqueta='Código Postal'))) as ExstEtqMC");

          foreach ($queryExstEtqMC as $p) {
              $ExstEtqMC=$p->ExstEtqMC;
          }

        $Ejecutivos=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
        from master_ese_empleado Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
        Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolEjecutivo = users.IdRol");

        $ejecutivos = [];
            foreach ($Ejecutivos as $ejec) {
                $ejecutivos[$ejec->IdEmpleado] = $ejec->NombreCompleto;
            }

        $Analistas=DB::select("select * , CONCAT(ifnull( users.name,'' ),' ', IFNULL( users.apellido_paterno, ''),' ', IFNULL( users.apellido_materno, '')) as NombreCompleto
        from users  Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolAnalista = users.IdRol");

        $analistas = [];
            foreach ($Analistas as $an) {
                $analistas[$an->id] = $an->NombreCompleto;
            }
            //se modifico el query para que nos muestre la lista de investigadores que estan activos,no apto,restringido e inactivo
        $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',
        ifnull( master_ese_empleado.ApellidoMaterno,'') , ' - ', mei.Descripcion) as NombreCompleto
            from master_ese_empleado Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
            Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
            left join master_estatus_investigadores mei on master_ese_empleado.EstatusInvestigadorId  = mei.EstatusInvestigadorId 
            where master_ese_empleado.EstatusEmpleadosId>1
            ORDER BY NombreCompleto ASC" );

        $investigadores = [];
        foreach ($Investigadores as $invs) {
            $investigadores[$invs->IdEmpleado] = $invs->NombreCompleto;
        }

        $Coordinadores=DB::select("select * , concat(ifnull( users.name,'' ),' ', ifnull( users.apellido_paterno, ''),' ', ifnull( users.apellido_materno, '')) as NombreCompleto
        from users Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolCoordinador = users.IdRol");

        $coordinadores = [];
            foreach ($Coordinadores as $cr) {
                $coordinadores[$cr->id] = $cr->NombreCompleto;
            }

        $Modalidades=DB::select("select * from master_ese_modalidad");

        $modalidades = [];
            foreach ($Modalidades as $modd) {
                $modalidades[$modd->IdModalidad] = $modd->Descripcion;
            }

        $Prioridades=DB::select("select * from master_ese_prioridades");

        $prioridades = [];
            foreach ($Prioridades as $prio) {
                $prioridades[$prio->IdPrioridad] = $prio->Descripcion;

            }
            //se acomodo el query para pintar modalidades y prioridades
            $Plantillas=DB::select("SELECT mepc.*,mep.*,mepri.Descripcion as PrioridadDescrip,mem.Descripcion as ModalidadDescrip FROM master_ese_plantilla_cliente mepc 
            JOIN master_ese_plantilla mep ON mep.IdPlantilla = mepc.IdPlantilla 
            JOIN master_ese_srv_servicio mess ON mepc.IdPlantillaCliente = mess.IdPlantillaCliente
            join master_ese_prioridades mepri on mess.IdPrioridad = mepri.IdPrioridad 
            join master_ese_modalidad mem on mess.IdModalidad = mem.IdModalidad 
            WHERE mess.IdServicioEse in ($IdServicioEse)");

            $plantillas = [];
                $PrioridadDescrip = '';
                $ModalidadDescrip = '';
            $NamePlantilla='';
                foreach ($Plantillas as $plant) {
                    $plantillas[$plant->IdPlantillaCliente] = $plant->DescripcionPlantilla;
                    $PrioridadDescrip = $plant->PrioridadDescrip;
                    $ModalidadDescrip = $plant->ModalidadDescrip;
                  $NamePlantilla = $plant->DescripcionPlantilla;
                }
            $grupos=[];

            $queryInc=DB::select("select count(*) as count from master_ese_plantilla_cliente as pc
                inner join master_ese_plantilla as p on p.IdPlantilla = pc.IdPlantilla
                inner join master_ese_tiposervicio as t on t.IdTipoServicio = p.IdTipoServicio
                where t.Incidencias = 'Si'
                and pc.IdPlantillaCliente = (select IdPlantillaCliente from master_ese_srv_servicio where IdServicioESE = $IdServicioEse)");

              $Incidencias=0;
                foreach ($queryInc as $plant) {
                    $Incidencias=$plant->count;
                }

            $sqlMod = DB::select("select IdModalidad from master_ese_srv_servicio where IdServicioEse = $IdServicioEse");

            foreach ($sqlMod as $mpt) {
                $ValMod=$mpt->IdModalidad;
            }

            $queryDP="select  DISTINCT(master_ese_contenedor.Etiqueta) as Grupo, master_ese_contenedor.IdContenedor,master_ese_agrupador.Etiqueta as Agrupador, master_ese_agrupador.IdAgrupador
            ,CASE WHEN COUNT(IF(((master_ese_srv_entrada.ValorCargado is null) or (master_ese_srv_entrada.ValorCargado = '')) AND (master_ese_srv_entrada.VisibleForms=1)";

            if($ValMod == 1){               
                $queryDP.="  AND (master_ese_srv_entrada.Telefonico=1) AND (master_ese_srv_entrada.Requerido=1), 1, null)) > 0 THEN 'amarrillo' ELSE 'verde' END as 'colorEstat'
                from master_ese_contenedor Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                Where master_ese_srv_entrada.IdServicioEse = ? GROUP BY master_ese_contenedor.Etiqueta
                Order by master_ese_contenedor.IdContenedor ";
                $queryDP=DB::select($queryDP,[$IdServicioEse]);

            }

            else{
                $queryDP.="  AND (master_ese_srv_entrada.Presencial=1) AND (master_ese_srv_entrada.Requerido=1), 1, null)) > 0 THEN 'amarrillo' ELSE 'verde' END as 'colorEstat'
                from master_ese_contenedor
                Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                Where master_ese_srv_entrada.IdServicioEse = ? GROUP BY master_ese_contenedor.Etiqueta
                Order by master_ese_contenedor.IdContenedor ";

                $queryDP=DB::select($queryDP,[$IdServicioEse]);

            }

            $user = \Auth::user();
            $sql = DB::select("select count(*) as dato from master_ese_srv_kardex where Movimiento = 'Solicitud' and IdServicioEse = $IdServicioEse");
            $ban=false;
            foreach ($sql as $g) {
              if($g->dato==0){
                $ban=true;
              }
            }

            if($ban){
              MasterConsultas::exeSQLStatement("insert_kardex", "UPDATE",
                  array(
                      "id"=>'1',
                      "IdServicioEse" => $IdServicioEse,
                      "Movimiento" => 'Solicitud',
                      "IdUsuario" => $user->username
                      )
              );
            }

            $queryEXSTSN = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_srv_kardex mek where mek.IdServicioEse=$IdServicioEse and mek.Movimiento='Notificada') as ExstSN");
           
            foreach ($queryEXSTSN as $p) {
                $ExstSN=$p->ExstSN;
            }
            if($ExstSN==1){
                $Notificada='Notificada';
				$ProgramacionEjecucionGuardada='ProgramacionEjecucionGuardada';
            }else{
                $Notificada='';
				$ProgramacionEjecucionGuardada='';
            }

      $kardex = DB::select("select *,
            (select concat(name,' ',ifnull(apellido_paterno,''),' ',ifnull(apellido_materno,'')) from users where username = IdUsuario limit 1) as Nombre
             from master_ese_srv_kardex where IdServicioEse = $IdServicioEse");

             $clientes= DB::select("select s.*, (select c.Nombre from master_clientes as c where c.IdCliente = s.IdCliente) as Cliente,
             (select os.IdServicioOS from master_ese_srv_os as os where os.IdServicioSRV = s.IdServicioEse ) as enlace
              from master_ese_srv_servicio as s where s.IdServicioEse = $IdServicioEse");

              $cliente='';$enlace='';
              foreach ($clientes as $g) {
                $cliente = $g->Cliente;
                $enlace=$g->enlace;
              }

              $mOS=DB::select("select o.*,
                 (select c.Nombre from master_clientes as c where c.IdCliente = o.IdCliente ) as Cliente,
                 (select ValorCargado from master_ese_srv_entrada where IdEntrada = 1 and IdServicioEse = ms.IdServicioEse) as Candidato,
                 (select m.Nombre from master_ese_srv_modulos as m where m.IdModulo = o.IdModulo ) as modulo,
                 (Select ts.Descripcion from master_ese_tiposervicio as ts where ts.IdTipoServicio =
                  (select m.IdTipoServicio from master_ese_plantilla as m where m.IdPlantilla = pc.IdPlantilla)) as Servicio,
                (select m.Tipos from master_ese_tipos as m where m.IdTipos = ms.IdTipoServicio ) as TipoServicio,
                concat('#',o.IdServicioOS,' ESE: #', ms.IdServicioEse) as mascara,
                 (select cn.nomenclatura from centros_negocio as cn
                   Inner Join users us ON us.idcn = cn.id
                   Inner Join master_ese_srv_kardex mk ON mk.IdUsuario = us.username where mk.IdServicioEse = o.IdServicioSRV group by o.IdServicioSRV ) as departamento
                  from master_ese_srv_os as o
                  left join master_ese_srv_modulos mem on mem.IdModulo=o.IdModulo
                  Inner join master_ese_srv_servicio ms on ms.IdServicioEse=o.IdServicioSRV
                  inner join master_ese_plantilla_cliente as pc on pc.IdPlantillaCliente = ms.IdPlantillaCliente
               where o.IdModulo=mem.IdModulo and ms.IdServicioEse=$IdServicioEse order by o.IdServicioOS asc");

               $teleC = DB::select("select ValorCargado as num from master_ese_srv_entrada where IdEntrada = 7 and IdServicioEse = $IdServicioEse");

               $servicio='';
               if(isset($mOS[0]->Servicio)){
                 $servicio = $mOS[0]->Servicio." - ".$mOS[0]->TipoServicio;
               }
               $candidato='';
               if(isset($mOS[0]->Servicio)){
                 $candidato =$mOS[0]->Candidato;
               }

               $Ccandidato=$teleC[0]->num;
              
             

               $mascOS='';
              foreach ($mOS as $g) {
                $mascOS=$g->mascara;
              }

			  $datos= DB::select("select s.*,
              (select concat(name,' ',ifnull(apellido_paterno,''),' ',ifnull(apellido_materno,'')) from users where id = s.IdAnalista) as Analista,
              (select concat(Nombre,' ',ifnull(SegundoNombre,''),' ',ifnull(ApellidoPaterno,''),' ',ifnull(ApellidoMaterno,'')) from master_ese_empleado where IdEmpleado = s.IdInvestigador) as Investigador
              from master_ese_srv_asignacion as s where s.IdServicioEse = $IdServicioEse");

               $valor1='';
               $valor2='';
               $valor3='';
               $valor4='';
               $valor5='';
               $valor6='';
               foreach ($datos as $g) {
                 $valor1 = $g->IdLider;
                 $valor2 = $g->IdAnalista;
                 $valor3 = $g->IdInvestigador;
                 $valor4 = $g->IdAnalistaSec;
                 $valor5 = $g->Analista;
                 $valor6 = $g->Investigador;
               }

               $Estados = MasterConsultas::exeSQL("estados", "READONLY",
               array(
                   "IdEstado" => '-1',
                   "IdPais" => '-1'
                    )
                );

                $Regiones = MasterConsultas::exeSQL("master_regiones", "READONLY",
               array(
                   "IdRegion" => '-1'
                    )
                );

                $Municipios = DB::select("Select e.FK_nombre_estado as estado, e.IdEstado, m.Descripcion as Municipio, m.IdMunicipio
                From  estados e left join master_municipios m on m.CodigoEstado = e.Codigo");

                $asignacion = array($valor1,$valor2,$valor3,$valor4,$valor5,$valor6);

            return view("ESE.NuevaOS.form-configuracionesOS",['investigadores'=>$Investigadores,'ejecutivos'=>$Ejecutivos,'analistas'=>$Analistas,'coordinadores'=>$Coordinadores,'modalidades'=>$modalidades ,'prioridades'=>$prioridades, 
            'PrioridadDescrip' => $PrioridadDescrip, 'ModalidadDescrip' => $ModalidadDescrip,// se agregaron para anexar prioridad y modalidad en EstudioSocioEconomico
            'plantillas'=>$plantillas, 'IdCliente'=>$idc, 'grupos'=>$grupos, 'IdServicioEse' => $IdServicioEse, 'MascOS' => $mascOS,'status'=>$queryDP, 'kardex'=>$kardex, 'clientes'=>$cliente, 'enlace'=>$enlace,
            'asignacion'=>$asignacion,"NamePlantilla" => $NamePlantilla, "Incidencias" => $Incidencias,"servicio"=>$servicio, "candidato"=>$candidato,"Estados"=>$Estados,"Regiones"=>$Regiones,"Municipios"=>$Municipios,'Notificada'=>$Notificada,
            'ProgramacionEjecucionGuardada'=>null,'Comentarios'=>null,'DictamenVal'=>null,'EstatusEval'=>null,'Ccandidato'=>$Ccandidato]);
    }

    public function ConfiguracionOSEdit($id,$idc)
    {
        $IdServicioEse = $id;

         $Estatus_encabezado =  DB::select("select Estatus from master_ese_srv_servicio where IdServicioEse = ?",[ $IdServicioEse]);

        $IdRegion=0;
        $IdEstado=0;
        $queryExstEtqMC = DB::select("SELECT EXISTS(SELECT 1 from master_ese_contenedor
            Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
            Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
            Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
            Where master_ese_srv_entrada.IdServicioEse = $IdServicioEse and master_ese_srv_entrada.VisibleForms =1 
            and ((master_ese_entrada.Etiqueta='Ciudad / Municipio / Alcaldía') || (master_ese_entrada.Etiqueta='Código Postal'))) as ExstEtqMC");
        
        foreach ($queryExstEtqMC as $p) {
            $ExstEtqMC=$p->ExstEtqMC;
        }
        if($ExstEtqMC==1 ){

        $queryEntrEtq = DB::select("SELECT  master_ese_entrada.Etiqueta,(CASE WHEN master_ese_entrada.Etiqueta='Ciudad / Municipio / Alcaldía' THEN master_ese_srv_entrada.ValorCargado 
         WHEN master_ese_entrada.Etiqueta='Código Postal' THEN master_ese_srv_entrada.ValorCargado END) as ValorCargado from master_ese_contenedor
        Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
        Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
        Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
        Where master_ese_srv_entrada.IdServicioEse = $IdServicioEse and master_ese_srv_entrada.VisibleForms =1 and ((master_ese_entrada.Etiqueta='Ciudad / Municipio / Alcaldía') || (master_ese_entrada.Etiqueta='Código Postal'))");

            $MCPValue='';
            foreach ($queryEntrEtq as $p) {
                $Etiquet=$p->Etiqueta;
                $ValorC=$p->ValorCargado;
                if($Etiquet=='Ciudad / Municipio / Alcaldía' &&  $ValorC<>null){

                    $MunicipioVal=DB::select("select IdRegion from master_region_edo where Municipio = '{$ValorC}'");

                    foreach ($MunicipioVal as $p) {
                        $IdRegion=$p->IdRegion;
                    }

                    $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
                    from master_ese_empleado Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
                    Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
                    left Join master_region_inv ON master_region_inv.IdInvestigador = master_ese_empleado.IdEmpleado
                    Where master_region_inv.IdRegion = $IdRegion");

                }else if($Etiquet=='Código Postal' &&  $ValorC<>null){

                    $MunicipioVal=DB::select("Select m.Descripcion as Municipio From cfdi_codigopostal as cp
                    left join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio
                    Where cp.CodigoPostal = $ValorC");

                    foreach ($MunicipioVal as $p) {
                        $MCPValue=$p->Municipio;
                    }

                    $MunicipioVal=DB::select("select IdEstado, IdRegion from master_region_edo where Municipio = '{$MCPValue}'");

                    foreach ($MunicipioVal as $p) {
                        $IdRegion=$p->IdRegion;
                        $IdEstado=$p->IdEstado;
                    }
                    //SE MODIFICO EL QUERY PARA ELIMINAR DE LISTA LOS INACTIVOS
                    $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',
        ifnull( master_ese_empleado.ApellidoMaterno,'') , ' - ', mei.Descripcion) as NombreCompleto
                    from master_ese_empleado Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
                    Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
                    left Join master_region_inv ON master_region_inv.IdInvestigador = master_ese_empleado.IdEmpleado
                    left join master_estatus_investigadores mei on master_ese_empleado.EstatusInvestigadorId  = mei.EstatusInvestigadorId 
                    Where master_region_inv.IdRegion = $IdRegion and master_ese_empleado.EstatusEmpleadosId>1
                    ORDER BY NombreCompleto ASC");

                }else{
                    //SE MODIFICO EL QUERY PARA ELIMINAR DE LISTA LOS INACTIVOS
                    $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',
        ifnull( master_ese_empleado.ApellidoMaterno,'') , ' - ', mei.Descripcion) as NombreCompleto
                    from master_ese_empleado Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
                    Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
                    left join master_estatus_investigadores mei on master_ese_empleado.EstatusInvestigadorId  = mei.EstatusInvestigadorId 
                    where master_ese_empleado.EstatusEmpleadosId>1 
                    ORDER BY NombreCompleto ASC");
                }
            }

      }else{
        //SE MODIFICO EL QUERY PARA ELIMINAR DE LISTA LOS INACTIVOS
        $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',
        ifnull( master_ese_empleado.ApellidoMaterno,'') , ' - ', mei.Descripcion) as NombreCompleto
        from master_ese_empleado Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
        Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
        left join master_estatus_investigadores mei on master_ese_empleado.EstatusInvestigadorId  = mei.EstatusInvestigadorId 
        where master_ese_empleado.EstatusEmpleadosId>1
        ORDER BY NombreCompleto ASC");
      }

        //SE MODIFICO EL QUERY PARA ELIMINAR DE LISTA LOS INACTIVOS
        $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',
        ifnull( master_ese_empleado.ApellidoMaterno,'') , ' - ', mei.Descripcion) as NombreCompleto
        from master_ese_empleado Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
        Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
        left join master_estatus_investigadores mei on master_ese_empleado.EstatusInvestigadorId  = mei.EstatusInvestigadorId 
        where master_ese_empleado.EstatusEmpleadosId>1
        ORDER BY NombreCompleto ASC");
        //Fin de nuestras correcciones

        $investigadores = [];
            foreach ($Investigadores as $invs) {
                $investigadores[$invs->IdEmpleado] = $invs->NombreCompleto;
            }

        $Ejecutivos=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
        from master_ese_empleado Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
        Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolEjecutivo = users.IdRol");

        $ejecutivos = [];
            foreach ($Ejecutivos as $ejec) {
                $ejecutivos[$ejec->IdEmpleado] = $ejec->NombreCompleto;
            }

        $Analistas=DB::select("select users.* , CONCAT(ifnull( users.name,'' ),' ', IFNULL( users.apellido_paterno, ''),' ', IFNULL( users.apellido_materno, '')) as NombreCompleto
        from users Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolAnalista = users.IdRol 
        OR master_ese_mobile_settings.IdRolCoordinador = users.IdRol Inner Join clientes c on c.id_cn=users.idcn and c.id=$idc");

                $analistas = [];
            foreach ($Analistas as $an) {
				$analistas[$an->id] = $an->NombreCompleto;
            }

            $AnalistasSec=DB::select("select * , CONCAT(ifnull( users.name,'' ),' ', IFNULL( users.apellido_paterno, ''),' ', IFNULL( users.apellido_materno, '')) as NombreCompleto
            from users
            Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolAnalista = users.IdRol 
            OR master_ese_mobile_settings.IdRolCoordinador = users.IdRol");

                    $analistasSec = [];
                foreach ($AnalistasSec as $an) {
                    $analistasSec[$an->id] = $an->NombreCompleto;
                }

        $Coordinadores=DB::select("select users.* , CONCAT(ifnull( users.name,'' ),' ', IFNULL( users.apellido_paterno, ''),' ', IFNULL( users.apellido_materno, '')) as NombreCompleto
        from users Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolCoordinador = users.IdRol
        Inner Join clientes c on c.id_cn=users.idcn and c.id=$idc");

        $coordinadores = [];
            foreach ($Coordinadores as $cr) {
				$coordinadores[$cr->id] = $cr->NombreCompleto;
            }

        $Modalidades=DB::select("select (select IdModalidad from master_ese_modalidad where master_ese_modalidad.IdModalidad = master_ese_srv_servicio.IdModalidad) as IdModalidad,
        (select Descripcion from master_ese_modalidad where master_ese_modalidad.IdModalidad = master_ese_srv_servicio.IdModalidad) as Descripcion 
        from master_ese_srv_servicio where IdServicioEse = $IdServicioEse");

        $modalidades = [];
            foreach ($Modalidades as $modd) {
                $modalidades[$modd->IdModalidad] = $modd->Descripcion;
            }

        $Prioridades=DB::select("SELECT mep.* FROM master_ese_prioridades mep
        INNER JOIN master_ese_srv_servicio mess ON mep.IdPrioridad = mess.IdPrioridad
        WHERE mess.IdServicioEse = ?", [$IdServicioEse]);

        $prioridades = [];
            foreach ($Prioridades as $prio) {
                $prioridades[$prio->IdPrioridad] = $prio->Descripcion;
            }
            //se acomodo el query para pintar modalidades y prioridades
            $Plantillas=DB::select("SELECT mepc.*,mep.*,mepri.Descripcion as PrioridadDescrip,mem.Descripcion as ModalidadDescrip FROM master_ese_plantilla_cliente mepc 
            JOIN master_ese_plantilla mep ON mep.IdPlantilla = mepc.IdPlantilla 
            JOIN master_ese_srv_servicio mess ON mepc.IdPlantillaCliente = mess.IdPlantillaCliente
            join master_ese_prioridades mepri on mess.IdPrioridad = mepri.IdPrioridad 
            join master_ese_modalidad mem on mess.IdModalidad = mem.IdModalidad 
            WHERE mess.IdServicioEse IN ($IdServicioEse)");

            $plantillas = [];
            $PrioridadDescrip ='';
            $ModalidadDescrip ='';
            $NamePlantilla='';
                foreach ($Plantillas as $plant) {
                    $plantillas[$plant->IdPlantillaCliente] = $plant->DescripcionPlantilla;
                    $PrioridadDescrip = $plant->PrioridadDescrip;
                    $ModalidadDescrip = $plant->ModalidadDescrip;
                    $NamePlantilla = $plant->DescripcionPlantilla;
                }
            $grupos=[];

            $queryInc=DB::select("select count(*) as count from master_ese_plantilla_cliente as pc
                inner join master_ese_plantilla as p on p.IdPlantilla = pc.IdPlantilla
                inner join master_ese_tiposervicio as t on t.IdTipoServicio = p.IdTipoServicio
                where t.Incidencias = 'Si' and pc.IdPlantillaCliente = (select IdPlantillaCliente from master_ese_srv_servicio where IdServicioESE = $IdServicioEse)");

              $Incidencias=0;
                foreach ($queryInc as $plant) {
                    $Incidencias=$plant->count;
                }

                $sqlMod = DB::select("select IdModalidad from master_ese_srv_servicio where IdServicioEse = $IdServicioEse");

            foreach ($sqlMod as $mpt) {
                $ValMod=$mpt->IdModalidad;
            }

            $queryDP="";

            $queryDP="Select  DISTINCT(master_ese_contenedor.Etiqueta) as Grupo, master_ese_contenedor.IdContenedor,master_ese_agrupador.Etiqueta as Agrupador, master_ese_agrupador.IdAgrupador
            ,CASE WHEN COUNT(IF(((master_ese_srv_entrada.ValorCargado is null) or (master_ese_srv_entrada.ValorCargado = '')) AND (master_ese_srv_entrada.VisibleForms=1)";

            if($ValMod == 1){               
                $queryDP.="  AND (master_ese_srv_entrada.Telefonico=1) AND (master_ese_srv_entrada.Requerido=1), 1, null)) > 0 THEN 'amarrillo' ELSE 'verde' END as 'colorEstat'
                from master_ese_contenedor
                Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                Where master_ese_srv_entrada.IdServicioEse = ? GROUP BY master_ese_contenedor.Etiqueta
                Order by master_ese_contenedor.Orden, master_ese_agrupador.Orden ";

                $queryDP=DB::select($queryDP,[$IdServicioEse]);

            }

            else{
                $queryDP.="  AND (master_ese_srv_entrada.Presencial=1) AND (master_ese_srv_entrada.Requerido=1), 1, null)) > 0 THEN 'amarrillo' ELSE 'verde' END as 'colorEstat'
                from master_ese_contenedor
                Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                Where master_ese_srv_entrada.IdServicioEse = ? GROUP BY master_ese_contenedor.Etiqueta
                Order by master_ese_contenedor.Orden, master_ese_agrupador.Orden ";

                $queryDP=DB::select($queryDP,[$IdServicioEse]);

            }
            

            $sqlMasterEseSrvAsignacion = DB::select("select * from master_ese_srv_asignacion where IdServicioEse = $IdServicioEse");

            $showDialogProgamacionEjecucion = false;
            foreach ($sqlMasterEseSrvAsignacion as $g) {
              if(($g->IdLider != null && $g->IdInvestigador != null) && ($g->IdAnalista != null  || $g->IdAnalistaSec != null)){
                $showDialogProgamacionEjecucion = true;
              }
            }            

            $queryEXSTSN = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_srv_kardex mek where mek.IdServicioEse=$IdServicioEse and mek.Movimiento='Notificada') as ExstSN");

            foreach ($queryEXSTSN as $p) {
                $ExstSN=$p->ExstSN;
            }
            if($ExstSN==1){
                $Notificada='Notificada';
				$ProgramacionEjecucionGuardada='ProgramacionEjecucionGuardada';
            }else{
                $Notificada='';
				$ProgramacionEjecucionGuardada='';
            }

            $kardex = DB::select("select *,  
                  (select concat(name,' ',ifnull(apellido_paterno,''),' ',ifnull(apellido_materno,'')) from users where username = IdUsuario limit 1) as Nombre
                   from master_ese_srv_kardex where IdServicioEse = $IdServicioEse");

          $clientes= DB::select("select s.*, (SELECT c.nombre_comercial as Nombre from clientes as c where c.id = s.IdCliente) as Cliente,
          (select os.IdServicioOS from master_ese_srv_os as os where os.IdServicioSRV = s.IdServicioEse ) as enlace
           from master_ese_srv_servicio as s where s.IdServicioEse = $IdServicioEse");

           $cliente='';$enlace='';
           foreach ($clientes as $g) {
             $cliente = $g->Cliente;
             $enlace=$g->enlace;
           }

           $mOS=DB::select("select o.*,ms.IdServicioEse,
           (SELECT c.nombre_comercial as Nombre from clientes as c where c.id = o.IdCliente ) AS Cliente,
            CONCAT((select ValorCargado from master_ese_srv_entrada where IdEntrada = 1 and IdServicioEse = ms.IdServicioEse),' ',
            (select ValorCargado from master_ese_srv_entrada where IdEntrada = 497 and IdServicioEse = ms.IdServicioEse),' ',
            (select ValorCargado from master_ese_srv_entrada where IdEntrada = 498 and IdServicioEse = ms.IdServicioEse)) as Candidato,
            (select m.Nombre from master_ese_srv_modulos as m where m.IdModulo = o.IdModulo ) as modulo,
            (Select ts.Descripcion from master_ese_tiposervicio as ts where ts.IdTipoServicio =
            (select m.IdTipoServicio from master_ese_plantilla as m where m.IdPlantilla = pc.IdPlantilla)) as Servicio,
            (select m.Tipos from master_ese_tipos as m where m.IdTipos = ms.IdTipoServicio ) as TipoServicio, concat(' # ',o.IdServicioOS,' # ', ms.IdServicioEse) as mascara,
            (select cn.nomenclatura from centros_negocio as cn Inner Join users us ON us.idcn = cn.id
            Inner Join master_ese_srv_kardex mk ON mk.IdUsuario = us.username where mk.IdServicioEse = o.IdServicioSRV group by o.IdServicioSRV ) as departamento
            from master_ese_srv_os as o left join master_ese_srv_modulos mem on mem.IdModulo=o.IdModulo
            Inner join master_ese_srv_servicio ms on ms.IdServicioEse=o.IdServicioSRV
            inner join master_ese_plantilla_cliente as pc on pc.IdPlantillaCliente = ms.IdPlantillaCliente
            where o.IdModulo=mem.IdModulo and ms.IdServicioEse=$IdServicioEse order by o.IdServicioOS asc");

            $mascOS='';
           foreach ($mOS as $g) {
             $mascIdSOS=$g->IdServicioOS;
             $mascIdSESE=$g->IdServicioEse;
             $mascOS=$g->mascara;
           }
           $candidato='';
           if(isset($mOS[0]->Servicio)){
             $candidato =$mOS[0]->Candidato;
           }
           $servicio='';
           if(isset($mOS[0]->Servicio)){
             $servicio = $mOS[0]->Servicio." - ".$mOS[0]->TipoServicio;
           }
 
		$datos= DB::select("select s.*,
            (select concat(name,' ',ifnull(apellido_paterno,''),' ',ifnull(apellido_materno,'')) from users where id = s.IdAnalista) as Analista,
            (select concat(Nombre,' ',ifnull(SegundoNombre,''),' ',ifnull(ApellidoPaterno,''),' ',ifnull(ApellidoMaterno,'')) from master_ese_empleado where IdEmpleado = s.IdInvestigador) as Investigador
            from master_ese_srv_asignacion as s where s.IdServicioEse = $IdServicioEse");

        $valor1=0;$valor2=0;$valor3=0;$valor4=0;$valor5="";$valor6="";

        foreach ($datos as $g) {
            $valor1 = $g->IdLider;
            $valor2 = $g->IdAnalista;
            $valor3 = $g->IdInvestigador;
            $valor4 = $g->IdAnalistaSec;
            $valor5 = $g->Analista;
            $valor6 = $g->Investigador;
        }
        $asignacion = array($valor1,$valor2,$valor3,$valor4,$valor5,$valor6);

		$IdEstado=0;
		$IdRegion=0;
		$MCPValue='';
        //tabla de Estado de ESE modificación para un correcto orden alfabeticamente
        $Estados=DB::select("Select  e.IdEstado,e.Codigo,  e.FK_nombre_estado as nombre_estado, e.variable, e.renapo,  e.IdPais,    p.FK_Pais as Pais 
        From estados as e   
        inner join master_pais as p on(p.IdPais=e.IdPais) 
        ORDER BY nombre_estado ASC");

        $Regiones= DB::select("select r.* from master_regiones as r order by r.IdRegion asc");
        $Municipios= DB::select("Select e.FK_nombre_estado as estado, e.IdEstado, m.Descripcion as Municipio, m.IdMunicipio
        From estados e 
        left join master_municipios m on m.CodigoEstado = e.Codigo
        Where e.IdEstado=$IdEstado 
        order by Descripcion asc");

        //DICTAMEN ANALISTA

        $ComentarioAnalista='';
        $AptoAnalista='';
        $EstatusAnalista='';
        $DictamenAnalista=DB::select("select * from master_ese_srv_dictamen_eval where IdServicioEse=$IdServicioEse");

        foreach ($DictamenAnalista as $p) {
            $ComentarioAnalista=$p->Comentarios;
            $AptoAnalista=$p->Apto;
            $EstatusAnalista=$p->Estatus;
        }
         //FIN DICTAMEN ANALISTA
         $cpCandidate = -1;
         $sqlCpCandidate = MasterConsultas::exeSQL("get_cp_from_candidate","READONLY",array("paramIdServicioEse"=>$IdServicioEse));

         if(count($sqlCpCandidate) > 0) $cpCandidate = $sqlCpCandidate[0]->ValorCargado;
        //obtiene el id del estado de acuerdo el codigo p. del candidato

        $IdEstadoFromCpFromCandidate = MasterConsultas::exeSQL("get_info_estado_for_cp","READONLY",array("paraCodigoPostal" => $cpCandidate));

        if(count($IdEstadoFromCpFromCandidate) > 0) $IdEstado = $IdEstadoFromCpFromCandidate[0]->IdEstado;

        //obtiene los municipios de acuerdo el estado del candidato

        $stateFromCandidate = MasterConsultas::exeSQL("get_info_municipios_x_estado","READONLY",array("paramIdEstado" => $IdEstado));
        $EstadoCandidato = "";
        $MunicipioCandidato = "";
        $ColoniaCandidato = "";
        $EstadoMunicipioColonia = DB::select("SELECT mese.ValorCargado, mee.CampoNombre FROM master_ese_srv_entrada mese
                                            INNER JOIN master_ese_entrada mee ON (mee.IdEntrada = mese.IdEntrada)
                                            WHERE mese.IdServicioEse = ? AND (mee.CampoNombre = 'EstadoRepublica' OR mee.CampoNombre = 'MunicipioEstado' OR mee.CampoNombre = 'Colonia')
                                            ORDER BY mee.IdEntrada ASC", [$IdServicioEse]);

        if(count($EstadoMunicipioColonia) > 0){
            foreach($EstadoMunicipioColonia as $item){
                if($item->CampoNombre == "EstadoRepublica") $EstadoCandidato = $item->ValorCargado; 
                if($item->CampoNombre == "MunicipioEstado") $MunicipioCandidato = $item->ValorCargado; 
                if($item->CampoNombre == "Colonia") $ColoniaCandidato = $item->ValorCargado; 
            }
        }

        $ProgramacionEjecucionFecha = "";
        $ProgramacionEjecucionHora = "";
        $programacion = DB::select("SELECT mesp.*,DATE_FORMAT(mesp.FechaEjecucion,'%Y-%m-%d %H:%i') as DATE_FORMATTED FROM master_ese_srv_programacion mesp WHERE mesp.IdServicioEse = ?", [$IdServicioEse]);

        foreach ($programacion as $item) {
            if($item->DATE_FORMATTED != null){
                $dateAndHour = explode(' ',$item->DATE_FORMATTED);
                $ProgramacionEjecucionFecha = $dateAndHour[0];
                $ProgramacionEjecucionHora = $dateAndHour[1];
            }
        }

        //DICTAMEN INVESTIGADOR

        $ResumenEconomica = "";
        $ResumenEscolar = "";
        $ResumenTrayectoriaLaboral = "";
        $Disponibilidad = "";
        $Puntualidad = "";
        $Seriedad = "";
        $Actitud = ""; 
        $Confiabilidad = "";
        $Seguridad = "";
        $Presentacion = "";
        $Comentarios = "";
        $Estatus = "";
        $dictamenInvestigador = DB::select("SELECT mesdi.* FROM master_ese_srv_dictamen_inv mesdi WHERE mesdi.IdServicioEse = ?;", [$IdServicioEse]);

        foreach ($dictamenInvestigador as $value) {
            $ResumenEconomica = $value->ResumenSituacionEco;
            $ResumenEscolar = $value->ResumenEscolaridad;
            $ResumenTrayectoriaLaboral = $value->ResumenTrayectoriaLab;
            $Disponibilidad = $value->CandiatoDisponibilidad;
            $Puntualidad = $value->CandiatoPuntualidad;
            $Seriedad = $value->CandiatoSeriedad;
            $Actitud = $value->CandiatoActitud; 
            $Confiabilidad = $value->CandiatoConfiabilidad;
            $Seguridad = $value->CandiatoSeguridad;
            $Presentacion = $value->CandiatoPresentacion;
            $Comentarios = $value->Comentarios;
            $Estatus = $value->Estatus;           
        }

        $teleC = DB::select("select ValorCargado as num from master_ese_srv_entrada where IdEntrada = 7 and IdServicioEse = $IdServicioEse");
               $Ccandidato=$teleC[0]->num;

        if($Ccandidato!=""){
            $arr1 = str_split($Ccandidato);
            $Ccandidato = "";
            for($i=0;$i<count($arr1); $i++){
                if($i==3||$i==6){
                    $Ccandidato .= '-';
                }
                $Ccandidato .= $arr1[$i];
             }
        }

        return view("ESE.NuevaOS.form-configuracionesOS",[
            'Ccandidato'=>$Ccandidato,
            'Estatus_encabezado'=>$Estatus_encabezado ,
            'investigadores'=>$Investigadores,
            'ejecutivos'=>$Ejecutivos,
            'analistas'=>$Analistas,
            'analistasSec'=>$AnalistasSec,
            'coordinadores'=>$Coordinadores,
            'modalidades'=>$modalidades ,
            'prioridades'=>$prioridades,
            'PrioridadDescrip' => $PrioridadDescrip, // se agregaron para anexar prioridad y modalidad en EstudioSocioEconomico
            'ModalidadDescrip' => $ModalidadDescrip, // se agregaron para anexar prioridad y modalidad en EstudioSocioEconomico
            'plantillas'=>$plantillas, 
            'IdCliente'=>$idc, 
            'grupos'=>$grupos, 
            'IdServicioEse' => $IdServicioEse,
            'MascOS' => $mascOS, 
            'idOS' => $mascIdSOS,
            'idESE' => $mascIdSESE,
            'status'=>$queryDP, 
            'kardex'=>$kardex, 
            'clientes'=>$cliente, 
            'enlace'=>$enlace,
            'asignacion'=>$asignacion, 
            "NamePlantilla" => $NamePlantilla, 
            "Incidencias"=>$Incidencias,
            "servicio"=>$servicio, 
            "candidato"=>$candidato,
            "NombreCompletoCandidatoSinAcentos"=>$this->replaceSpecialCharacters($candidato),
            "Estados"=>$Estados,
            "Regiones"=>$Regiones,
            "Municipios"=>$Municipios,
            'Notificada'=>$Notificada,
            'ProgramacionEjecucionGuardada'=>$ProgramacionEjecucionGuardada,
            'ComentarioAnalista'=>$ComentarioAnalista,
            'DictamenVal'=>$AptoAnalista,
            'EstatusEval'=>$EstatusAnalista,
            'IdEstado'=>$IdEstado,
            'showDialogProgamacionEjecucion' => $showDialogProgamacionEjecucion,
            "cpCandidate" => $cpCandidate,
            "EstadoCandidato" => $EstadoCandidato,
            "MunicipioCandidato" => $MunicipioCandidato, 
            "ColoniaCandidato" =>$ColoniaCandidato,
            "stateFromCandidate" => $stateFromCandidate,
            "ProgramacionEjecucionFecha" => $ProgramacionEjecucionFecha,
            "ProgramacionEjecucionHora" => $ProgramacionEjecucionHora,
            "ResumenEconomica" =>$ResumenEconomica,
            "ResumenEscolar" => $ResumenEscolar,
            "ResumenTrayectoriaLaboral" => $ResumenTrayectoriaLaboral,
            "Disponibilidad" => $Disponibilidad,
            "Puntualidad" => $Puntualidad,
            "Seriedad" => $Seriedad,
            "Actitud" => $Actitud,
            "Confiabilidad" => $Confiabilidad,
            "Seguridad" => $Seguridad,
            "Presentacion" => $Presentacion,
            "Comentarios" => $Comentarios,
            "Estatus" => $Estatus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GuardarAsignacion(Request $request)
    {
        try {
            $user = Auth::user();
            if ($request->input('IdServicioEse') !== '') {
                $srv = MasterEseServicio::where('IdServicioEse', $request->input('IdServicioEse'))->first();
                 $srv->update(["IdModalidad"          => $request->input('IdModalidad'),
                    "IdPrioridad"            => $request->input('IdPrioridad'),
                    "Comentarios"            => $request->input('Comentarios'),
                    "Estatus"                => 'Asignada',
                    "SyncGrid"               => 1,
                    "SyncData"               => 0,
                    "MinutosEjecucionInves"  => 0
                 ]);
                    $IdServicioEse=$srv->IdServicioEse;
                    $srv_asg = MasterEseAsignacion::where('IdServicioEse', $request->input('IdServicioEse'))->first();
                    $IdLider=$request->input('IdLider');
                    $IdAnalista=$request->input('IdAnalista');
                    $IdInvestigador=$request->input('IdInvestigador');
                    $IdAnalistaSec=$request->input('IdAnalistaSec');
                    if($IdLider=='N/A'){
                        $IdLider=null;
                    }
                    if($IdAnalista=='N/A'){
                        $IdAnalista=null;
                    }        
                    if($IdInvestigador=='N/A'){
                        $IdInvestigador=226;
                    }
                    if($IdAnalistaSec=='N/A'){
                        $IdAnalistaSec=null;
                    }
                $srv_asg->update(['IdServicioEse' => $IdServicioEse,
                                'IdLider'       => $IdLider,
                                'IdAnalista'    => $IdAnalista,
                                'IdInvestigador'=> $IdInvestigador,
                                'IdAnalistaSec'=> $IdAnalistaSec
                                ]);        

                $srv_OS = MasterEseServicioOS::where('IdServicioSRV', $request->input('IdServicioEse'))->first();
                    $srv_OS->update(['IdServicioSRV' => $IdServicioEse,
                                    "IdModulo"       => 1,
                                    "IdCliente"      => $request->input('IdCliente'),
                                    "IdServicioOS"   => $IdServicioEse,
                                    "Estatus"        => 'Abierto'
                                    ]);

                $sql = DB::select("select count(*) as dato from master_ese_srv_kardex where Movimiento = 'Asignada' and IdServicioEse = ".$request->input('IdServicioEse'));

                    $insertKard=MasterConsultas::exeSQLStatement("insert_kardex", "UPDATE",

                        array(
                            "id"=>'2',
                            "IdServicioEse" => $request->input('IdServicioEse'),
                            "Movimiento" => 'Asignada',
                            "IdUsuario" => $user->username
                            )
                    );
                    if($IdAnalista!=null){
                        $ntf = new Notificaciones();

                        $clt = DB::select("select u.id from users u inner join master_ese_srv_servicio ms on u.IdCliente=ms.IdCliente where IdServicioEse = $IdServicioEse");

                        $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-ASIG','Analista',$IdAnalista);
                        //if($IdLider!=null){
                        //$ntf->notificaUsuarios($IdServicioEse,'LIDER-ASIGNACION','Lider',$IdLider);
                        //}
                    }
                    /*if($IdInvestigador != 1){
                        if($IdLider!=null){
                            $ntf->notificaUsuarios($IdServicioEse,'LIDER-ASIGN-INV','Lider',$IdLider);
                        }

                        if($IdAnalista!=null){
                            $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-INVS','Analista',$IdAnalista);
                        }

                        $IdUSer = DB::select("select id from users where IdEmpleado = $IdInvestigador");
                        $ntf->notificaUsuarios($IdServicioEse,'INV-ASIGNACION','Investigador',$IdUSer[0]->id);
                    }*/
                    
                    if($IdAnalistaSec!=2){
                        $ntf = new Notificaciones();
                        $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-SEC-ASIG','AnalistaSec',$IdAnalistaSec);
                    }
                    return response()->json(array(
                        'status_alta' => 'success',
                        'IdServicioEse' => $IdServicioEse,
                    ));
            }
        } catch (\Exception $e) {
            return response()->json(array(
                'status_alta' => 'error',
                'message' => $e->getMessage(),
                'IdServicioEse' => $IdServicioEse,
            ));
        }
    }

    public function GuardarProgramacionE(Request $request)
    {
        try {
            $user = \Auth::user();
            $id=$request->input('IdServicioEse');
            $horaPE=$request->input('horaPE');
            $fechaPE=$request->input('fechaPE');
            $FechaEjecucion=$request->input('fechaPE').' '.$request->input('horaPE');

            $sqlM = DB::select("select * from master_ese_srv_servicio where IdServicioEse = ".$request->input('IdServicioEse'));

            $sql = DB::select("select * from master_ese_srv_asignacion where IdServicioEse = ".$request->input('IdServicioEse'));

            $flap=false;
            $IdInvestigador=226;
            foreach ($sql as $g) {
                $IdInvestigador=$g->IdInvestigador;
                $IdAnalistaSec=$g->IdAnalistaSec;
                $IdAnalista=$g->IdAnalista;
                $IdLider=$g->IdLider;
              if(($g->IdLider != null && $g->IdInvestigador != null) && ($g->IdAnalista != null  || $g->IdAnalistaSec != null)){
                $flap=true;
              }else{
                foreach ($sqlM as $gM) {
                    if($gM->IdModalidad == 1 && $g->IdInvestigador == null) {
                        $flap=true;
                    }
                }
              }
            }
            if($flap==true){

                $ProgramacionEjecucionGuardada='ProgramacionEjecucionGuardada';

            }else{
                $ProgramacionEjecucionGuardada='';
            }
			//Aquí va la bandera para saber si ya se guardó la el programa de ejecución
			//Finaliza bandera de programación ejecución
            if($flap){
              $srv = MasterEseProgramacion::where('IdServicioEse', $request->input('IdServicioEse'))->first();
              if ($srv !== null) {
                  $srv->update(["IdServicioEse" => $id,
                  "FechaEjecucion"     => $FechaEjecucion,
                  "Estatus"            => 'Agendada'
                  ]);

                  DB::update("update master_ese_srv_servicio set Estatus='Programada' where IdServicioEse = $id");

              }else{
                  $Servicio  = MasterEseProgramacion::Create(["IdServicioEse" => $id,
                  "FechaEjecucion"     => $FechaEjecucion,
                  "Estatus"                => 'Agendada'
                  ]);

                  DB::update("update master_ese_srv_servicio set Estatus='Programada' where IdServicioEse = $id");

              }

              $sql = DB::select("select count(*) as dato from master_ese_srv_kardex where Movimiento = 'Programada' and IdServicioEse = ".$request->input('IdServicioEse'));

              $ban=false;
              foreach ($sql as $g) {
                if($g->dato==0){
                  $ban=true;
                }
              }
              if($ban){

                MasterConsultas::exeSQLStatement("insert_kardex", "UPDATE",

                    array(
                        "id"=>'3',
                        "IdServicioEse" => $request->input('IdServicioEse'),
                        "Movimiento" => 'Programada',
                        "IdUsuario" => $user->username
                        )
                );
              }else{

                DB::update("UPDATE master_ese_srv_kardex set Fecha = TIMESTAMP(NOW()), IdUsuario = '{$user->username}'  WHERE IdServicioEse = $id and Movimiento = 'Programada' ");

              }

              $clt = DB::select("select u.id from users u inner join master_ese_srv_servicio ms on u.IdCliente=ms.IdCliente where IdServicioEse = $id");

            
              $ntf = new Notificaciones();
              $ntf->notificaUsuarios($id,'CLTE-AGENDADO','Cliente',$clt[0]->id);
              
              
              $candidatos = MasterConsultas::exeSQL("get_info_cadidate_send_email","READONLY",array("paramIdServicioEse" => $request->input('IdServicioEse')));
              if($candidatos[0]->email != null){
                $ntf->notificaUsuarios($id,'EVAL-AGENDADO','Candidato',null);
              }
              
            if($IdLider != null){ 
                $ntf->notificaUsuarios($id,'LIDER-AGENDADO','Lider', $IdLider);
            }
            if($IdInvestigador != 1 && $IdInvestigador != null){ 
                $IdUSer = DB::select("select id from users where IdEmpleado = $IdInvestigador");

                $ntf->notificaUsuarios($id,'INV-AGENDADO','Investigador',$IdUSer[0]->id);
            }
            if($IdAnalista!=null ){
                $ntf->notificaUsuarios($id,'ANALISTA-AGENDADO','Analista',$IdAnalista);
            }
            if($IdAnalistaSec!=2 && $IdAnalistaSec!= null){
                $ntf->notificaUsuarios($id,'ANALISTA-SEC-AGENDADO','AnalistaSec',$IdAnalistaSec);
            }
                    return response()->json(array(
                        'status_alta' => 'success',
                        'IdServicioEse' => $id,
                    ));
            }else{
              return response()->json(array(
                  'status_alta' => 'warning',
                  'IdServicioEse' => $id,
              ));
            }
        } catch (\Exception $e) {
            return response()->json(array(
                'status_alta' => 'error',
                'message' => $e->getMessage(),
                'IdServicioEse' => $id,
            ));
        }
    }

    public function NotificarAlCorreo(Request $request){
        try{
            $IdServicioEse = $request->IdServicioEse;

            $user = \Auth::user();

            $personalNotificado= DB::select(
                "SELECT 0 IdConfEmail, 0 IdPlantillaEmail, u.email as Email, 'Lider' as Tipo, 'Normal' AS ModoEnvio, CONCAT(u.name, ' ', u.apellido_paterno, ' ', u.apellido_materno) AS NombreDestinatario FROM master_ese_srv_asignacion mesa 
                INNER join users u ON mesa.IdLider = u.id
                WHERE  mesa.IdServicioEse = $IdServicioEse AND 1=1 AND u.email <> ''
                union all
                SELECT 0 IdConfEmail, 0 IdPlantillaEmail, u.email as Email, 'Analista' as Tipo, 'Normal' AS ModoEnvio, CONCAT(u.name, ' ', u.apellido_paterno, ' ', u.apellido_materno) AS NombreDestinatario  FROM master_ese_srv_asignacion mesa 
                INNER join users u ON mesa.IdLider = u.id
                WHERE  mesa.IdServicioEse = $IdServicioEse AND 1=1  AND u.Email <> ''
                union all
                SELECT 0 IdConfEmail, 0 IdPlantillaEmail, mee.Email as Email, 'Investigador' as Tipo, 'Normal' AS ModoEnvio, CONCAT(mee.Nombre, ' ', mee.ApellidoPaterno, ' ', mee.ApellidoMaterno) AS NombreDestinatario  FROM master_ese_srv_asignacion mesa 
                INNER join master_ese_empleado mee ON mesa.IdInvestigador = mee.IdEmpleado
                WHERE  mesa.IdServicioEse = $IdServicioEse AND 1=1 AND mee.Email <> ''
            ");

            $candidato = MasterConsultas::exeSQL("get_info_cadidate_send_email","READONLY",array("paramIdServicioEse" => $IdServicioEse));

            $checkSqlNotificada = DB::select("select count(*) as dato from master_ese_srv_kardex where Movimiento = 'Notificada' and IdServicioEse = $IdServicioEse");

            $checkNotificada=false;
            foreach ($checkSqlNotificada as $g) {
              if($g->dato==0){
                $checkNotificada=true;
              }
            }
            if($checkNotificada){

              MasterConsultas::exeSQLStatement("insert_kardex", "UPDATE",

                  array(
                      "id"=>'3',
                      "IdServicioEse" => $request->input('IdServicioEse'),
                      "Movimiento" => 'Notificada',
                      "IdUsuario" => Auth::user()->username
                      )
              );
            }

            DB::update("update master_ese_srv_servicio set Estatus='Notificada' where IdServicioEse = $IdServicioEse");

            $notification = new Notificaciones();
            $response = $notification->sendNotification("ESE-PROGRAMACAION-EJECUCION",
                        array("IdServicio" => "$IdServicioEse"),
                        array("personal" => $personalNotificado,
                              "candidato" => $candidato));
            return response()->json(array(
                'status_alta' => 'success',
                'Notificada'=>'Notificada',
                'response' => $response 
            ));
        }catch(\Exception $e){
            return response()->json(array(
                'status_alta' => 'error',
                'error'=> $e->getMessage(),
            ));
        }
    }

    public function Notificar(Request $request)
    {
        $id = $request->input('IdServicioEse');
            $user = \Auth::user();

            $sql = DB::select("select count(*) as dato from master_ese_srv_kardex where Movimiento = 'Notificada' and IdServicioEse = ".$request->input('IdServicioEse'));

            $sql2 = DB::select("select count(*) as dato from master_ese_srv_kardex where Movimiento = 'Programada' and IdServicioEse = ".$request->input('IdServicioEse'));

            $ban=false; $bans=false;
            foreach ($sql as $g) {
              if($g->dato==0){
                $ban=true;
              }
            }
            foreach ($sql2 as $g) {
              if($g->dato>0){
                $bans=true;
              }
            }
            if($bans){
              if($ban){
                $msg = "Se te ha asignadado la orden de servicio numero $id";
                $titulo = "Aviso de OS $id";
                $tipo="Notificacion de OS $id";
                $detalle="Se te ha asignadado la orden de servicio numero $id";

                $notificacion = DB::select(
                    "SELECT u.username, m.FirebaseToken  FROM users AS u 
                    inner join master_ese_mobile_usr_device AS m ON m.IdUsuario='1'
                    left JOIN master_ese_empleado AS e ON e.IdEmpleado = u.IdEmpleado 
                    INNER JOIN master_ese_srv_asignacion AS s ON 
                    s.IdLider= u.id OR s.IdAnalista = u.id OR s.IdInvestigador = e.IdEmpleado
                    WHERE s.IdServicioEse = $id"
                );
                $not = new NotificacionesPush();
                foreach ($notificacion as $n) {
                  $not->pushFirebaseFCM($n->FirebaseToken, $titulo, $msg, $tipo, $detalle);
                }

                MasterConsultas::exeSQLStatement("insert_kardex", "UPDATE",

                    array(
                        "id"=>'4',
                        "IdServicioEse" => $request->input('IdServicioEse'),
                        "Movimiento" => 'Notificada',
                        "IdUsuario" => $user->username
                        )
                );

                $empleados = DB::select("select me.IdEmpleado
                from master_ese_empleado me
                Inner Join master_ese_srv_asignacion ma on ma.IdInvestigador = me.IdEmpleado
                where ma.IdServicioEse = $id
                union all
                select u.id as IdEmpleado
                from users u
                Inner Join master_ese_srv_asignacion ma on ma.IdAnalista = u.id or ma.IdLider = u.id or ma.IdAnalistaSec = u.id
                where ma.IdServicioEse = $id");

                foreach ($empleados as $n) {

                    MasterConsultas::exeSQLStatement("insert_notificaciones", "UPDATE",

                        array(
                            "IdEmpleado" => $n->IdEmpleado,
                            "Mensaje" => $msg,
                            "Leido" => 0,
                            "Titulo" => $titulo
                            )
                    );
                  }

                $kardex = DB::select("select *,
                      (select concat(name,' ',ifnull(apellido_paterno,''),' ',ifnull(apellido_materno,'')) from users where username = IdUsuario limit 1) as Nombre
                       from master_ese_srv_kardex where IdServicioEse = $id");

                $status ='';
                foreach ($kardex as $s) {
                $status.='<div class="col-sm-1">
                    <div style="position: relative;">
                      <div class="verde" class="normal" data-toggle="tooltip" data-placement="top" title="'.$s->Movimiento.'" ></div>
                      <div class="div" data-toggle="tooltip" data-placement="top" title=" '.$s->Movimiento.' ">
                        <label class="Estatus_cortar"> '.$s->Movimiento.' </label></div>
                    </div>
                  </div>';
                }
                return response()->json(array(
                    'status_alta' => 'success',
                    'IdServicioEse' => $id,
                    'estatus'=>$status,
                    'Notificada'=>'Notificada',
					'ProgramacionEjecucionGuardada'=>'ProgramacionEjecucionGuardada',
                ));
              }else{
                return response()->json(array(
                    'status_alta' => 'warning',
                    'IdServicioEse' => $id,
                ));
              }
            }else{
              return response()->json(array(
                  'status_alta' => 'warning',
                  'IdServicioEse' => $id,
              ));
            }
    }

    public  function pushFirebaseFCM($id, $titulo, $mnsaje, $tipo, $detalle)
    {
        $para['registration_ids'] = array($id);
        $para['notification']["text"] = $mnsaje;
        $para['notification']["title"] = $titulo;
        $para['notification']["sound"] =  "kids_game_bright_plucked";//"default";
        $para['data']["id"] = $tipo;
        $para['data']["status"] = $detalle;
        $client = new Client();
        $client->setRawBody(\Laminas\Json\Json::encode($para));
        $client->setOptions( [
            'maxredirects' => 0,
            'timeout'      => 30,
        ]);
        $client->setMethod('POST');
        $client->setHeaders([
            'Content-Type' => 'application/json',
            'Content-Length' => strlen(\Laminas\Json\Json::encode($para)),
            'Authorization' => 'key=AAAAQDjZFbU:APA91bFIHYZ5IwqPVpXecNczTOgTVAg3uJpnSt4CW61LKad_w0AJhZoVB8Cg-zW7WdOBRC4TqUaWdPtO2HWf52BSJXw9Q-iguoOQA27xVCVJojXqecLztBGFyj-pl00jKKa5E5lDqa9d'
        ]);
        $client->setUri('https://fcm.googleapis.com/fcm/send');
        $response = $client->send();
        if ($response->isSuccess()) {
            $r =   \Laminas\Json\Json::decode($response->getBody() );
        }else{
            $r["success"] = false;
        }
        return $r;
    }

    public function saveDictamenA(Request $request)
    {
        try {
            $IdServicioEse = $request->IdServicioEse;
            $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_srv_dictamen_eval mde where mde.IdServicioEse=$IdServicioEse) as Exst");
                foreach ($queryEXST as $p) {
                    $Exst=$p->Exst;
                }
            $queryEXSTDI = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_srv_dictamen_inv mdi where mdi.IdServicioEse=$IdServicioEse) as ExstDI");
            foreach ($queryEXSTDI as $p) {
                $ExstDI=$p->ExstDI;
            }

                if(($Exst==1) ){
                    DB::update("update master_ese_srv_dictamen_eval set Apto='{$request->input('Dictamen')}' where IdServicioEse = $IdServicioEse");   

                }else{
                    DB::insert('insert into master_ese_srv_dictamen_eval (IdServicioEse,Apto) values (?,?)', [$IdServicioEse,$request->Dictamen]);
                }

                if(($ExstDI==1) ){
                    DB::update("update master_ese_srv_dictamen_inv set Estatus='{$request->input('Dictamen')}' where IdServicioEse = $IdServicioEse");

                }else{
                    DB::insert('insert into master_ese_srv_dictamen_inv (IdServicioEse,Estatus) values (?,?)', [$IdServicioEse,$request->Dictamen]);

                }
                return response()->json(array(
                    'status_alta' => 'success',
                    'IdServicioEse' => $IdServicioEse,
                    'respDictamen' => $request->input('Dictamen'),
                ));
        } catch (\Exception $e) {
            return response()->json(array(
                'status_alta' => 'error',
                'message'=> $e->getMessage(),
                'linea'=> $e->getLine(),
                'IdServicioEse ' => $IdServicioEse
            ));            
        }
    }

    public function saveFormulario($IdServicioEse,$Estatus){
        try {
            $estatus=$Estatus;
            $estadoColor="";
            $user = \Auth::user();

            $sqlMod = DB::select("select IdModalidad from master_ese_srv_servicio where IdServicioEse = $IdServicioEse");

            

            foreach ($sqlMod as $mpt) {
                $ValMod=$mpt->IdModalidad;
            }
            $colores="";

            $colores="select  DISTINCT(master_ese_contenedor.Etiqueta) as Grupo, master_ese_contenedor.IdContenedor,master_ese_agrupador.Etiqueta as Agrupador, master_ese_agrupador.IdAgrupador
            ,CASE WHEN COUNT(IF(((master_ese_srv_entrada.ValorCargado is null) or (master_ese_srv_entrada.ValorCargado = '')) AND (master_ese_srv_entrada.VisibleForms=1)";

            if($ValMod == 1){               
                $colores.="  AND (master_ese_srv_entrada.Telefonico=1) AND (master_ese_srv_entrada.Requerido=1), 1, null)) > 0 THEN 'amarrillo' ELSE 'verde' END as 'colorEstat'
                from master_ese_contenedor
                Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                Where master_ese_srv_entrada.IdServicioEse = ? GROUP BY master_ese_contenedor.Etiqueta
                Order by master_ese_contenedor.IdContenedor ";

                $colores=DB::select($colores,[$IdServicioEse]);
            }
            else{
                $colores.="  AND (master_ese_srv_entrada.Presencial=1) AND (master_ese_srv_entrada.Requerido=1), 1, null)) > 0 THEN 'amarrillo' ELSE 'verde' END as 'colorEstat'
                from master_ese_contenedor
                Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                Where master_ese_srv_entrada.IdServicioEse = ? GROUP BY master_ese_contenedor.Etiqueta
                Order by master_ese_contenedor.IdContenedor ";

                $colores=DB::select($colores,[$IdServicioEse]);
            }
            $color='';
            $contarColorAmarillo = 0;
            foreach ($colores as $co) {
                $color=$co->colorEstat;
                if($color=='amarrillo'){
                    $estadoColor='amarillo';
                    $contarColorAmarillo = $contarColorAmarillo+1;
                }else{
                    $estadoColor='verde';
                }
            } 

            $ids = DB::select("SELECT * from master_ese_srv_asignacion where idServicioEse = $IdServicioEse");

            foreach ($ids as $id){
                $IdAnalista = $id->IdAnalista;
                $Investigador = $id->IdInvestigador;
                $IdAnalistaSec = $id->IdAnalistaSec;
            }

            
            

            if($contarColorAmarillo == 0 ){
                $ntf = new Notificaciones();

                if($Investigador != 1 && $Investigador != null){ 
                    $empleado = DB::select ("select * from users where idempleado = $Investigador"); 
                    $ntf->notificaUsuarios($IdServicioEse,'INVESTIGADOR-GUARDADO-FORM','Investigador',$empleado[0]->id);
                }
                if($IdAnalista!=null ){
                    $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-GUARDADO-FORM','Analista',$IdAnalista);
                }

                if($IdAnalistaSec!=null && $IdAnalistaSec != 2){
                    $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-SEC-GUARDADO-FORM','AnalistaSec',$IdAnalistaSec);
                }
                
                
                
                DB::update("UPDATE master_ese_srv_servicio ms SET ms.FechaEjecucionFinal = NOW(), ms.Estatus = 'Capturado'
                WHERE ms.IdServicioEse = ? ",[$IdServicioEse]); 
        
                DB::insert('INSERT INTO master_ese_srv_kardex ( idkardexese,Idservicioese,fecha,movimiento,IdUsuario)
                VALUES (4,"'.$IdServicioEse.'",NOW(),"Capturado","'.Auth::user()->username.'")');
            }

            return response()->json(array(
                'status_alta' => 'success',
                'color'=> $estadoColor,
                'resultadoConteoColor' => $contarColorAmarillo,
                'IdServicioEse' => $IdServicioEse,
            ));
        } catch (\Exception $e) {
            return response()->json(array(
                'status_alta' => 'error',
                'message'=> $e->getMessage(),
                'IdServicioEse ' => $IdServicioEse,
                'resultadoConteoColor' => $contarColorAmarillo,

            ));            
        }
    }

    public function saveAnalista(Request $request)
    {
        try {
            $IdServicioEse = $request->IdServicioEse;
            $sql = DB::select("select * from master_ese_srv_asignacion where IdServicioEse = ".$IdServicioEse);
            $IdInvestigador=1;
            foreach ($sql as $g) {
                $IdLider=$g->IdLider;
                $IdAnalistaSec=$g->IdAnalistaSec;
                $IdAnalista=$g->IdAnalista;
                $IdInvestigador = $g->IdInvestigador;
            }
            $estatus=$request->input('Estatus');
            $estadoColor="";
            $user = \Auth::user();
       $sqlMod = DB::select("select IdModalidad from master_ese_srv_servicio where IdServicioEse = $IdServicioEse");
            foreach ($sqlMod as $mpt) {
                $ValMod=$mpt->IdModalidad;
            }

            $colores="";
            $colores="select  DISTINCT(master_ese_contenedor.Etiqueta) as Grupo, master_ese_contenedor.IdContenedor,master_ese_agrupador.Etiqueta as Agrupador, master_ese_agrupador.IdAgrupador
            ,CASE WHEN COUNT(IF(((master_ese_srv_entrada.ValorCargado is null) or (master_ese_srv_entrada.ValorCargado = '')) AND (master_ese_srv_entrada.VisibleForms=1)";

            if($ValMod == 1){               
                $colores.="  AND (master_ese_srv_entrada.Telefonico=1) AND (master_ese_srv_entrada.Requerido=1), 1, null)) > 0 THEN 'amarrillo' ELSE 'verde' END as 'colorEstat'
                from master_ese_contenedor
                Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                Where master_ese_srv_entrada.IdServicioEse = ? GROUP BY master_ese_contenedor.Etiqueta
                Order by master_ese_contenedor.IdContenedor ";

                $colores=DB::select($colores,[$IdServicioEse]);
            }

            else{
                $colores.="  AND (master_ese_srv_entrada.Presencial=1) AND (master_ese_srv_entrada.Requerido=1), 1, null)) > 0 THEN 'amarrillo' ELSE 'verde' END as 'colorEstat'
                from master_ese_contenedor
                Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                Where master_ese_srv_entrada.IdServicioEse = ? GROUP BY master_ese_contenedor.Etiqueta
                Order by master_ese_contenedor.IdContenedor ";

                $colores=DB::select($colores,[$IdServicioEse]);

            }

            $color='';

            $contarColorAmarillo = 0;

            foreach ($colores as $co) {

                $color=$co->colorEstat;

                if($color=='amarrillo'){

                    $estadoColor='amarillo';

                    $contarColorAmarillo = $contarColorAmarillo+1;

                }else{

                    $estadoColor='verde';

                }

            }
                $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_srv_dictamen_eval mde where mde.IdServicioEse=$IdServicioEse) as Exst");
                        foreach ($queryEXST as $p) {
                            $Exst=$p->Exst;
                        }

                        if(($Exst==1) ){
                            DB::update("update master_ese_srv_dictamen_eval set Comentarios='{$request->input('Comentarios')}', Apto='{$request->input('Dictamen')}',Estatus='{$request->input('Estatus')}' where IdServicioEse = $IdServicioEse");
                            DB::update("update master_ese_srv_servicio set Estatus='{$estatus}' where IdServicioEse = $IdServicioEse");

                        }else{
                            MasterConsultas::exeSQLStatement("insert_evaluador", "UPDATE",
                            array(
                                "IdServicioEse" => $IdServicioEse,
                                "Apto" => $request->input('Dictamen'),
                                "Comentarios" => $request->input('Comentarios'),
                                "Estatus" => $request->input('Estatus')
                              )
                            );
                            DB::update("update master_ese_srv_servicio set Estatus='{$estatus}' where IdServicioEse = $IdServicioEse");
                        }

                        $qs = "";
                        if($estatus=='Pendiente'){
                            $qs = "5";
                        }elseif($estatus=='Cerrado'){
                            $qs = "6";
                        }elseif($estatus=='Cancelado'){
                            $qs = "7";
                        }
                        DB::insert('INSERT INTO master_ese_srv_kardex ( idkardexese,Idservicioese,fecha,movimiento,IdUsuario)
                             VALUES ('.$qs.',"'.$IdServicioEse.'",NOW(),"'.$estatus.'","'.Auth::user()->username.'")');

                        if($estatus=='Cerrado'){
                            DB::update("update master_ese_srv_servicio set Estatus='{$estatus}',  FechaCierre = now()  where IdServicioEse = $IdServicioEse");
                      
                            $ntf = new Notificaciones();
                            //GUARDADO
                            //$ntf->notificaUsuarios($IdServicioEse,'ANALISTA-GUARDADO','Analista',null);
                            //if($IdInvestigador != 1)
                            //$ntf->notificaUsuarios($IdServicioEse,'INV-GUARDADO','Investigador',null);
                            //CERRADO
                            $ntf->notificaUsuarios($IdServicioEse,'LIDER-CERRADO','Lider',$IdLider);
                            $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-CIERRE','Analista',$IdAnalista);
                            if($IdAnalistaSec != 2)
                                $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-SEC-CIERRE','AnalistaSec',$IdAnalistaSec);
                            $clt = DB::select("select u.id from users u inner join master_ese_srv_servicio ms on u.IdCliente=ms.IdCliente where IdServicioEse = $IdServicioEse");
                            $ntf->notificaUsuarios($IdServicioEse,'CLTE-CIERRE','Cliente',$clt[0]->id);
                        }

                        if($estatus=='Cancelado'){
                            $clt = DB::select("select u.id from users u inner join master_ese_srv_servicio ms on u.IdCliente=ms.IdCliente where IdServicioEse = $IdServicioEse");
                            $ntf = new Notificaciones();
                            $ntf->notificaUsuarios($IdServicioEse,'LIDER-CANCELADO','Lider',$IdLider);
                            $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-CANCELADO','Analista',$IdAnalista);
                            $ntf->notificaUsuarios($IdServicioEse,'CLIENTE-CANCELADO','Cliente',$clt[0]->id);
                            if($IdAnalistaSec != 2)
                                $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-SEC-CANCELADO','AnalistaSec',$IdAnalistaSec);
                            if($IdInvestigador != 1){
                                $IdUSer = DB::select("select id from users where IdEmpleado = $IdInvestigador");
                                $ntf->notificaUsuarios($IdServicioEse,'INVESTIGADOR-CANCELADO','Investigador',$IdUSer[0]->id);
                            }
                        }
                return response()->json(array(
                    'status_alta' => 'success',
                    'color'=> $estadoColor,
                    'resultadoConteoColor' => $contarColorAmarillo,
                    'IdServicioEse' => $IdServicioEse,
                ));
        } catch (\Exception $e) {
            return response()->json(array(
                'status_alta' => 'error',
                'message'=> $e->getMessage(),
                'IdServicioEse ' => $IdServicioEse,
            ));            
        }
    }

    public function DictamenInvestigador(Request $request)
    {

            

            $id = $request->input('IdServicioEse');
            $dic = DB::select ("Select Apto from master_ese_srv_dictamen_eval where IdServicioEse=$id");
            $valDic = "";
            foreach ($dic as $d) {
                $valDic=$d->Apto;
            }

            if($valDic == "" || $valDic == null){
                DB::insert('INSERT INTO master_ese_srv_kardex ( idkardexese,Idservicioese,fecha,movimiento,IdUsuario)
                             VALUES ("5","'.$id.'",NOW(),"Pendiente","'.Auth::user()->username.'")');
                DB::update("update master_ese_srv_servicio set Estatus='Pendiente' where IdServicioEse = $id");
                     
            }

            $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_srv_dictamen_inv mdi where mdi.IdServicioEse=$id) as Exst");

                    foreach ($queryEXST as $p) {
                        $Exst=$p->Exst;
                    }
                    if(($Exst==1) ){

                        DB::update("update master_ese_srv_dictamen_inv set ResumenSituacionEco='{$request->input('Resumen')}', ResumenEscolaridad='{$request->input('Escolar')}',ResumenTrayectoriaLab='{$request->input('Trayectoria')}',
                        CandiatoDisponibilidad='{$request->input('Disponibilidad')}', CandiatoPuntualidad='{$request->input('Puntualidad')}', CandiatoSeriedad='{$request->input('Seriedad')}',CandiatoActitud='{$request->input('Actitud')}',
                        CandiatoConfiabilidad='{$request->input('Confiabilidad')}',CandiatoSeguridad='{$request->input('Seguridad')}', CandiatoPresentacion='{$request->input('Presentacion')}', Comentarios='{$request->input('ComentariosDI')}',
                        Estatus='{$request->input('Estatus')}',EstatusIncidencias='{$request->input('Incidencias')}' where IdServicioEse = $id");
                    }else{

                        MasterConsultas::exeSQLStatement("insert_dictamen_investigador", "UPDATE",
                        array(
                            "IdServicioEse" => $request->input('IdServicioEse'),
                            "ResumenSituacionEco" => $request->input('Resumen'),
                            "ResumenEscolaridad" => $request->input('Escolar'),
                            "ResumenTrayectoriaLab" => $request->input('Trayectoria'),
                            "CandiatoDisponibilidad" => $request->input('Disponibilidad'),
                            "CandiatoPuntualidad" => $request->input('Puntualidad'),
                            "CandiatoSeriedad" => $request->input('Seriedad'),
                            "CandiatoActitud" => $request->input('Actitud'),
                            "CandiatoConfiabilidad" => $request->input('Confiabilidad'),
                            "CandiatoSeguridad" => $request->input('Seguridad'),
                            "CandiatoPresentacion" => $request->input('Presentacion'),
                            "Comentarios" => $request->input('ComentariosDI'),
                            "Estatus" => $request->input('Estatus'),
                            "Incidencias" => $request->input('Incidencias')
                          )
                        );
                    }

                $queryDPE = DB::select("select master_ese_srv_entrada.IdServicioEseEntrada,master_ese_entrada.Etiqueta as entrada, master_ese_entrada.Formato as Type,master_ese_entrada.Items,
                    CAST(SUBSTRING_INDEX(master_ese_entrada.Longitud, 'c', -1) AS UNSIGNED) as Maxm, master_ese_srv_entrada.Requerido,master_ese_srv_entrada.VisibleForms,
                    master_ese_entrada.CampoNombre,master_ese_agrupador.IdAgrupador,master_ese_entrada.Clasificacion,master_ese_entrada.CantidadApariciones,master_ese_srv_entrada.Indice,master_ese_srv_entrada.ValorCargado
                    from master_ese_contenedor
                    Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                    Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                    Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                    Where master_ese_srv_entrada.IdServicioEse = $id and master_ese_srv_entrada.VisibleForms =1 and master_ese_srv_entrada.Requerido =1
                    order by master_ese_agrupador.IdAgrupador,master_ese_srv_entrada.Indice,master_ese_entrada.Orden");
                    $cv=0;
                    for($j=0;$j<count($queryDPE);$j++){
                        if( ($queryDPE[$j]->ValorCargado=='') || ($queryDPE[$j]->ValorCargado==null) ){
                            $cv++;
                        }
                    }
          return response()->json(array(
              'status_alta' => 'success',
              "cv" => $cv,
          ));
    }

    public function DatosPlantilla($id)
    {
        try {
            $res='';
            $res2='';
            $res3='';
            $res4='';
            $res5='';
            $res6='';
            $res7='';

            $sqlMod = DB::select("select IdModalidad from master_ese_srv_servicio where IdServicioEse = $id");
            foreach ($sqlMod as $mpt) {
                $ValMod=$mpt->IdModalidad;
            }

            $queryDP = DB::select("select  DISTINCT(master_ese_contenedor.Etiqueta) as Grupo, master_ese_contenedor.IdContenedor,
            master_ese_agrupador.Etiqueta as Agrupador,master_ese_agrupador.IdAgrupador,
            master_ese_agrupador.Orden,master_ese_contenedor.Orden as ordenContenedor 
            from master_ese_contenedor
            Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
            Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
            Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
            Where master_ese_srv_entrada.IdServicioEse = $id and master_ese_srv_entrada.VisibleForms=1 
            order by master_ese_contenedor.Orden, master_ese_agrupador.Orden");

            $data=array();
            $data2=array();
            $data3=array();
            $data4=array();
            $data5=array();
            $data6=array();
            $data7=array();
            $aaa=array(); 
            $pclas=array(); 
            $pclasi=array(); 
            $pclasagr=array();
  
            $queryDPE ="SELECT
                master_ese_srv_entrada.IdServicioEseEntrada,
                master_ese_srv_entrada.IdServicioEse,
                master_ese_entrada.Etiqueta AS entrada,
                master_ese_entrada.Formato AS Type,
                master_ese_entrada.Items,
                CAST(SUBSTRING_INDEX (master_ese_entrada.Longitud, 'c', -1) AS UNSIGNED) AS Maxm,
                master_ese_srv_entrada.Requerido,
                master_ese_srv_entrada.VisibleForms,
                master_ese_entrada.CampoNombre,
                master_ese_agrupador.IdAgrupador,
                master_ese_entrada.Clasificacion,
                master_ese_entrada.CantidadApariciones,
                master_ese_srv_entrada.Indice,
                IF(master_ese_entrada.Formato <> 'PDF' AND master_ese_entrada.Formato <> 'JPEG', master_ese_srv_entrada.ValorCargado, '') AS ValorCargado,
                IF(master_ese_entrada.Formato = 'PDF' OR master_ese_entrada.Formato = 'JPEG',
                IF(master_ese_srv_entrada.ValorCargado <> '', 'TRUE', 'FALSE'), 'FALSE') flag_PDF_JPEG,
                master_ese_agrupador.Etiqueta,
                (SELECT count(mese.Indice) FROM master_ese_srv_entrada mese 
                INNER JOIN master_ese_entrada mee ON mee.IdEntrada = mese.IdEntrada 
                INNER JOIN master_ese_agrupador mea ON mea.IdAgrupador = mee.IdAgrupador
                WHERE mese.IdServicioEse =7
                AND mea.IdAgrupador = master_ese_entrada.IdAgrupador
                AND mee.IdEntrada = master_ese_entrada.IdEntrada) as repitition
            FROM master_ese_contenedor
                INNER JOIN master_ese_agrupador
                ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                INNER JOIN master_ese_entrada
                ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                INNER JOIN master_ese_srv_entrada
                ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada";

           if($ValMod == 1){               
                $queryDPE.=" WHERE master_ese_srv_entrada.IdServicioEse = ?
                AND master_ese_srv_entrada.VisibleForms = 1 and master_ese_srv_entrada.Telefonico=1
                ORDER BY master_ese_contenedor.orden, master_ese_agrupador.IdAgrupador, master_ese_srv_entrada.Indice, master_ese_entrada.orden ";
                $queryDPE=DB::select($queryDPE,[$id]);
            }
            else{
                $queryDPE.=" WHERE master_ese_srv_entrada.IdServicioEse = ?
                AND master_ese_srv_entrada.VisibleForms = 1 and master_ese_srv_entrada.Presencial=1
                ORDER BY master_ese_contenedor.orden, master_ese_agrupador.IdAgrupador, master_ese_srv_entrada.Indice, master_ese_entrada.orden ";
                $queryDPE=DB::select($queryDPE,[$id]);
            }
            for($i=0;$i<count($queryDP);$i++){
                foreach($queryDP as $name){
                    $href = $this->replaceSpecialCharacters($queryDP[$i]->Grupo);
                    $idTab = $href;
                    $res="<a href=#".$href." aria-controls='".$queryDP[$i]->Grupo."' role='tab' data-toggle='tab'>".$queryDP[$i]->Grupo."</a>";
                    $res2="<div class='tab-pane ' role='tabpanel' id='".$idTab."' aria-labelledby='".$idTab."-tab'>
                    </div>";
                    $res3="<legend id='A".str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Agrupador)))."'>".$queryDP[$i]->Agrupador."</legend>";
                    $res4=str_replace(' ','',(str_replace('Ó','O',$queryDP[$i]->Grupo)));
                    $res7=$queryDP[$i]->IdAgrupador;
                    $data[$queryDP[$i]->ordenContenedor]=[$res];
                    $data2[$queryDP[$i]->ordenContenedor]=[$res2];
                    $data3[]=[$res3];
                    $data4[]=[$res4];
                    $data7[]=[$res7];
                    $i ++;
                }
                for($j=0;$j<count($queryDPE);$j++){
                    foreach ($queryDPE as $entr) {
                        $res6=$queryDPE[$j]->IdAgrupador;
                        if(($queryDPE[$j]->Indice) > 0 && ($queryDPE[$j]->Clasificacion!='N/A') && ($queryDPE[$j]->Clasificacion!='Recibos de nómina (2 últimos)')){
                            $aaa[]=[str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_0"];
                            $pclas[]=str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)));
                            $pclasi[]=[str_replace(' ','',(str_replace('Ó','O',$queryDPE[$j]->Clasificacion)))."_".$queryDPE[$j]->Indice];
                            $pclasagr[]=[$queryDPE[$j]->IdAgrupador];
                            // $pclasi[]= array_merge($a4, [$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->Indice]);
                        }

                    $classSpan = $this->replaceSpecialCharacters($queryDPE[$j]->Clasificacion);
                    //TEXTO
                    if($queryDPE[$j]->Type == 'Texto'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == 'Puesto')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."'  data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == '¿Quién?')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Viajar')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Residencia')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaCP(this.name)'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaCP(this.name)'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'CURP o carta de naturalización')&&($queryDPE[$j]->CampoNombre == 'CurpONaturlizacion')&&($queryDPE[$j]->entrada == 'Clave')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Comprobante Afiliación IMSS')&&($queryDPE[$j]->CampoNombre == 'ImssNumAfiliacion')&&($queryDPE[$j]->entrada == 'Número Afiliación IMSS')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    //INICIO DE LA VALIDACIÓN PARA EL CONYUGE

                                    else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Acta')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Foja')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Libro')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Datos Médicos')&&($queryDPE[$j]->entrada == '¿Padece o ha padecido alguna enfermedad como crónica o degenerativa?')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Datos Médicos')&&($queryDPE[$j]->entrada == '¿Se encuentra bajo algún tratamiento médico?')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Datos Médicos')&&($queryDPE[$j]->entrada == '¿Es alérgico?')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Datos Médicos')&&($queryDPE[$j]->entrada == '¿Toma medicamento controlado?')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    //FINALIZA LA VALIDACIÓN PARA CONYUGE
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == 'Puesto')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == '¿Quién?')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Viajar')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Residencia')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onfocus='EtiquetaCP(this.name)'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'CURP o carta de naturalización')&&($queryDPE[$j]->CampoNombre == 'CurpONaturlizacion')&&($queryDPE[$j]->entrada == 'Clave')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' minlength='".$queryDPE[$j]->Maxm."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Comprobante Afiliación IMSS')&&($queryDPE[$j]->CampoNombre == 'ImssNumAfiliacion')&&($queryDPE[$j]->entrada == 'Número Afiliación IMSS')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' minlength='".$queryDPE[$j]->Maxm."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Acta')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Foja')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Libro')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    //FINALIZA LA VALIDACIÓN PARA CONYUGE								
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == 'Puesto')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == '¿Quién?')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Viajar')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Residencia')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice." idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onfocus='EtiquetaCP(this.name)' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'CURP o carta de naturalización')&&($queryDPE[$j]->CampoNombre == 'CurpONaturlizacion')&&($queryDPE[$j]->entrada == 'Clave')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Comprobante Afiliación IMSS')&&($queryDPE[$j]->CampoNombre == 'ImssNumAfiliacion')&&($queryDPE[$j]->entrada == 'Número Afiliación IMSS')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                    //INICIO DE LA VALIDACIÓN PARA EL CONYUGE
                                    else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Acta')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Foja')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Libro')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    //FINALIZA LA VALIDACIÓN PARA CONYUGE								
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == 'Puesto')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == '¿Quién?')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Viajar')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Residencia')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice." idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onfocus='EtiquetaCP(this.name)'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'MunicipioEstado')&&($queryDPE[$j]->entrada == 'Ciudad / Municipio / Alcaldía')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'CURP o carta de naturalización')&&($queryDPE[$j]->CampoNombre == 'CurpONaturlizacion')&&($queryDPE[$j]->entrada == 'Clave')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' minlength='".$queryDPE[$j]->Maxm."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Comprobante Afiliación IMSS')&&($queryDPE[$j]->CampoNombre == 'ImssNumAfiliacion')&&($queryDPE[$j]->entrada == 'Número Afiliación IMSS')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' minlength='".$queryDPE[$j]->Maxm."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                    //INICIO DE LA VALIDACIÓN PARA EL CONYUGE

                                    else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Acta')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Foja')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Libro')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                    //FINALIZA LA VALIDACIÓN PARA CONYUGE								
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                }
                            }
                        }
                    }
                     //TEXTAREA
                     if($queryDPE[$j]->Type == 'TextArea'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'Referencia')&&($queryDPE[$j]->entrada == 'Comentarios')){
                                        if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' required>La referencia describe a el candidato como una persona...por lo que le recomienda ampliamente.</textarea>
                                            </span></td></tr>";
                                        }else{
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' required>".$queryDPE[$j]->ValorCargado."</textarea>
                                            </span></td></tr>";
                                        }
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'RReferenciaP')&&($queryDPE[$j]->entrada == 'Resumen de referencias personales')){
                                        if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' required>Las referencias personales describen al candidato como una persona...</textarea>
                                            </span></td></tr>";
                                        }else{
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' required>".$queryDPE[$j]->ValorCargado."</textarea>
                                            </span></td></tr>";
                                        }
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Observaciones')&&($queryDPE[$j]->entrada == 'Observaciones')){
                                        if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' required>El candidato concluyó (último grado de estudios concluido) en (  ) , cursada en la (nombre de la escuela completo). Muestra (documento probatorio) como documento probatorio. (Si actualmente se encuentra estudiando, mencionarlo). Domina el idioma inglés en un (  )%.</textarea>
                                            </span></td></tr>";
                                        }else{
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rrows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' required>".$queryDPE[$j]->ValorCargado."</textarea>
                                            </span></td></tr>";
                                        }
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'ObservacionesSitEco')&&($queryDPE[$j]->entrada == 'Observaciones')){
                                        if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' required>El candidato habita en compañía de ..., en… propiedad de.. Los gastos del hogar son solventados por.., siendo suficientes para cubrir sus egresos. El candidato refiere ….tarjetas de crédito o departamentales.</textarea>
                                            </span></td></tr>";
                                        }else{
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rrows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' required>".$queryDPE[$j]->ValorCargado."</textarea>
                                            </span></td></tr>";
                                        }
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' required>".$queryDPE[$j]->ValorCargado."</textarea>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'Referencia')&&($queryDPE[$j]->entrada == 'Comentarios')){
                                        if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>La referencia describe a el candidato como una persona...por lo que le recomienda ampliamente.</textarea>
                                            </span></td></tr>";
                                        }else{
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>".$queryDPE[$j]->ValorCargado."</textarea>
                                            </span></td></tr>";
                                        }
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'RReferenciaP')&&($queryDPE[$j]->entrada == 'Resumen de referencias personales')){
                                        if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>Las referencias personales describen al candidato como una persona...</textarea>
                                            </span></td></tr>";
                                        }else{
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>".$queryDPE[$j]->ValorCargado."</textarea>
                                            </span></td></tr>";
                                        }
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Observaciones')&&($queryDPE[$j]->entrada == 'Observaciones')){
                                        if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>El candidato concluyó (último grado de estudios concluido) en (  ) , cursada en la (nombre de la escuela completo). Muestra (documento probatorio) como documento probatorio. (Si actualmente se encuentra estudiando, mencionarlo). Domina el idioma inglés en un (  )%.</textarea>
                                            </span></td></tr>";
                                        }else{
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>".$queryDPE[$j]->ValorCargado."</textarea>
                                            </span></td></tr>";
                                        }
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'ObservacionesSitEco')&&($queryDPE[$j]->entrada == 'Observaciones')){
                                        if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>El candidato habita en compañía de ..., en… propiedad de.. Los gastos del hogar son solventados por.., siendo suficientes para cubrir sus egresos. El candidato refiere ….tarjetas de crédito o departamentales.</textarea>
                                            </span></td></tr>";
                                        }else{
                                            $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>".$queryDPE[$j]->ValorCargado."</textarea>
                                            </span></td></tr>";
                                        }
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                        <textarea type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required>".$queryDPE[$j]->ValorCargado."</textarea>
                                        </span></td></tr>";
                                    }
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <textarea type='textarea' class=' input-group form-control entradas-g-a autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>".$queryDPE[$j]->ValorCargado."</textarea>
                                        </span></td></tr>";
                                }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <textarea type='textarea' class=' input-group form-control entradas-g-a autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>".$queryDPE[$j]->ValorCargado."</textarea>
                                        </span></td></tr>";
                                }
                            }
                        }
                    }

                    //INICIA EL TEXT AREA PARA LOS TEXTOS LARGOS

                    if($queryDPE[$j]->Type == 'TrayecLaboralPrincipalesFunci'){
                         if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == 'Puesto')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <textarea  type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required></textarea>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Viajar')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea  type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required></textarea>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Residencia')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <textarea  type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required></textarea>
                                        </span></td></tr>";
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea  type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required></textarea>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == 'Puesto')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea  type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required></textarea>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Viajar')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea  type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required></textarea>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Residencia')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea  type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required></textarea>
                                        </span></td></tr>";
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td>
                                            <textarea  type='textarea' class=' input-group form-control entradas-g-a required autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."' required></textarea>
                                        </span></td></tr>";
                                    }
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == 'Puesto')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea  type='input' class=' input-group form-control entradas-g-a autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Viajar')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea  type='input' class=' input-group form-control entradas-g-a autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Residencia')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <textarea  type='input' class=' input-group form-control entradas-g-a autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <textarea  type='input' class=' input-group form-control entradas-g-a autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'Laboral Familiar')&&($queryDPE[$j]->entrada == 'Puesto')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <input  type='input' class=' input-group form-control entradas-g-a autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Viajar')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <input  type='input' class=' input-group form-control entradas-g-a autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Laboral Disponibilidad Residencia')&&($queryDPE[$j]->entrada == 'Motivo')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <input  type='input' class=' input-group form-control entradas-g-a autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                            <input  type='input' class=' input-group form-control entradas-g-a autoExpand' rows='6' data-min-rows='6' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                }
                            }
                        }
                    }				
                    //FINALIZA EL TEXT AREA PARA LOS TEXTOS LARGOS
                    //NÚMERO
                    if($queryDPE[$j]->Type == 'Número'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaCP(this.name)'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }    
                                }                                
                                else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class=' input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaCP(this.name)'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                    </span></td></tr>";
                                }
                                else{
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                    </span></td></tr>";
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                    <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                    </span></td></tr>";
                                }
                                else if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'CodigoPostal')&&($queryDPE[$j]->entrada == 'Código Postal')){
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice." idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                    <input  type='text' class=' input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  value='".$queryDPE[$j]->ValorCargado."' onfocus='EtiquetaCP(this.name)' onblur='GuardadoInput(this.name, this.value);'data-titleInput='".$queryDPE[$j]->entrada."'>
                                    </span></td></tr>";
                                }
                                else{
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                    <input min='0' type='number' step='1' oninput='maxLengthCheck(this)' onkeypress='return isNumeric(event)' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                    </span></td></tr>";
                                }
                            }
                        }
                    }

                    //Correo
                    if($queryDPE[$j]->Type == 'Correo'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <input min='0' type='email' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                    </span></td></tr>";
                                }else{
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <input min='0' type='email' class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                    </span></td></tr>";
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                    <input min='0' type='email' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                    </span></td></tr>";
                                }else{
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                    <input min='0' type='email' class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                    </span></td></tr>";
                                }
                            }
                        }
                    }
                    //Finaliza tipo correo
                    //Inicia validación de fecha de nacimiento
                    if($queryDPE[$j]->Type == 'FechaNacimiento'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'Datos Personales')&&($queryDPE[$j]->entrada == 'Fecha de Nacimiento')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'Datos Personales')&&($queryDPE[$j]->entrada == 'Fecha de Nacimiento')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                        </span></td></tr>";
                                    }
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'Datos Personales')&&($queryDPE[$j]->entrada == 'Fecha de Nacimiento')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'Datos Personales')&&($queryDPE[$j]->entrada == 'Fecha de Nacimiento')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                }
                            }
                        }
                    }

                    //FINALIZA TIEMPO DE VIVIR	EN EL DOMICILIO ACTUAL			
                    //FECHA
                    if($queryDPE[$j]->Type == 'Fecha'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Fecha de Ingreso')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a required' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)'  onblur='GuardadoInput(this.name, this.value);' required value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>"; 
                                    }else if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Fecha de Egreso')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a required' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' required value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>"; 
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a required' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' required value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>"; 
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Fecha de Ingreso')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a required' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)'  onblur='GuardadoInput(this.name, this.value);' required value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Fecha de Egreso')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a required' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' required value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a required' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' required value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Fecha de Ingreso')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Fecha de Egreso')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Fecha de Ingreso')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Fecha de Egreso')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>";  
                                    }
                                }
                            }
                            if(($queryDPE[$j]->Clasificacion == 'Institucion profesional')&&($queryDPE[$j]->entrada == 'Fecha Ingreso')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <input type='date'  class='input-group form-control entradas-g-a required' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onfocus='EtiquetaFIV(this.name)'  onblur='GuardadoInput(this.name, this.value);' required value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                        </span></td></tr>"; 
                                    }
                        }
                    }
                    //COMBO
                    if($queryDPE[$j]->Type == 'Combo'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            $rl='';
                            $opt = explode(',', $queryDPE[$j]->Items);
                            $valu = $queryDPE[$j]->ValorCargado;
                            for ($x = 0; $x < count($opt); $x++) {
                                    if ($valu==$opt[$x]){
                                        $rl=$rl."<option selected value='".$opt[$x]."'>".$opt[$x]."</option>";
                                      }
                                      else{
                                        $rl=$rl."<option value='".$opt[$x]."' >".$opt[$x]."</option>";
                                      }
                            }
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."' required>
                                        <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                        </select>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Empleo actual')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."' required>
                                        <option value=''>Seleccione una Opción</option>
                                        ".$rl."
                                        </select>
                                        </span></td></tr>";
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label for='".$queryDPE[$j]->IdServicioEseEntrada."' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' id='requerido".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."' required>
                                        <option value=''>Seleccione una Opción</option>
                                        ".$rl."
                                        </select>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."' required>
                                        <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                        </select>
                                        </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Empleo actual')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."' required>
                                        <option value=''>Seleccione una Opción</option>
                                        ".$rl."
                                        </select>
                                        </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Validación')){
                                        //Inicio Abinadad
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."' required>
                                        <option value=''>Seleccione una Opción</option>
                                        ".$rl."
                                        </select>
                                        </span></td></tr>";
                                        //Finaliza Abinadad
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label for='".$queryDPE[$j]->IdServicioEseEntrada."' name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' id='requerido".$queryDPE[$j]->IdServicioEseEntrada."'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);autocompleteInput(this.name);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."' required>
                                        <option value=''>Seleccione una Opción</option>
                                        ".$rl."
                                        </select>
                                        </span></td></tr>";
                                    }
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);autocompleteInput(this.name);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."'>
                                        <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                            </select>
                                            </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Empleo actual')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);autocompleteInput(this.name);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."'>
                                            <option value=''>Seleccione una Opción</option>
                                            ".$rl."
                                            </select>
                                            </span></td></tr>";
                                    } else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Validación')){
                                        //Inicio Abinadad
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);autocomplete(this.name);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."' required>
                                        <option value=''>Seleccione una Opción</option>
                                        ".$rl."
                                        </select>
                                        </span></td></tr>";
                                        //Finaliza Abinadad
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);autocompleteInput(this.name);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."'>
                                            <option value=''>Seleccione una Opción</option>
                                            ".$rl."
                                            </select>
                                            </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'N/A')&&($queryDPE[$j]->CampoNombre == 'Colonia')&&($queryDPE[$j]->entrada == 'Colonia')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);autocompleteInput(this.name);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."'>
                                        <option value='".$queryDPE[$j]->ValorCargado."'>".$queryDPE[$j]->ValorCargado."</option>
                                            </select>
                                            </span></td></tr>";
                                    }else if(($queryDPE[$j]->Clasificacion == 'Empresa')&&($queryDPE[$j]->entrada == 'Empleo actual')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);autocompleteInput(this.name);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."'>
                                            <option value=''>Seleccione una Opción</option>
                                            ".$rl."
                                            </select>
                                            </span></td></tr>";
                                    }
                                    else if(($queryDPE[$j]->Clasificacion == 'Acta de nacimiento cónyuge')&&($queryDPE[$j]->entrada == 'Validación')){
                                        //Inicio Abinadad
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."_".$queryDPE[$j]->Indice."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);autocompleteInput(this.name);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."' required>
                                        <option value=''>Seleccione una Opción</option>
                                        ".$rl."
                                        </select>
                                        </span></td></tr>";
                                        //Finaliza Abinadad
                                    }
                                    else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label></td><td>
                                        <select class='input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' onchange='GuardadoInput(this.name, this.value);autocompleteInput(this.name);' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."' data-selectvalue='".$queryDPE[$j]->ValorCargado."'>
                                            <option value=''>Seleccione una Opción</option>
                                            ".$rl."
                                            </select>
                                            </span></td></tr>";
                                    }
                                }
                            }
                        }
                    }
                    //PDF
                    if($queryDPE[$j]->Type == 'PDF'){
                        $index = $queryDPE[$j]->Indice + 1;
                        $index = ($queryDPE[$j]->repitition > 1)?" {$index}":"";
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if($queryDPE[$j]->flag_PDF_JPEG == 'TRUE'){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ required'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Cambiar archivo</label>
                                                        <input type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <input type='file' placeholder='Cambiar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                        <!--<span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div> 
                                                </div>
                                                <div id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                    <br><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal".$queryDPE[$j]->IdServicioEseEntrada."'>Ver</button>
                                                    <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Eliminar</button>
                                                    <div id='lbError' class='warning'></div>                                               
                                                </div>
                                            </div>
                                        </form>
                                        </span></td></tr>";
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ required'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                                        <input type='file' placeholder='Cambiar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                </div>
                                                <div class='buttonFile' id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                    <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Ver</button>
                                                    <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Eliminar</button>
                                                 </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if($queryDPE[$j]->flag_PDF_JPEG == 'TRUE'){    
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ required'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Cambiar archivo</label>
                                                        <input type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <input type='file' placeholder='Cambiar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                </div>
                                                <div id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                    <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Ver</button>
                                                    <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Eliminar</button>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </div>
                                        </form>
                                        </span></td></tr>";
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'> 
                                                <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ required'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                                        <input type='file' placeholder='Cambiar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' required>
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                </div>
                                                <div class='buttonFile' id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                    <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Ver</button>
                                                    <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Eliminar</button>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </span></td></tr>";
                                    }
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if($queryDPE[$j]->flag_PDF_JPEG == 'TRUE'){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Cambiar archivo</label>
                                                        <input type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <input type='file' placeholder='Cambiar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                </div>
                                                <div id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                    <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Ver</button>
                                                    <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Eliminar</button>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </span></td></tr>";
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                                        <input type='file' placeholder='Cambiar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                </div>
                                                <div class='buttonFile' id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                    <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Ver</button>
                                                    <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Eliminar</button>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if($queryDPE[$j]->flag_PDF_JPEG == 'TRUE'){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Cambiar archivo</label>
                                                        <input type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <input type='file' placeholder='Cambiar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='validate(this.name);' >
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                </div>
                                                <div id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                    <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Ver</button>
                                                    <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Eliminar</button>
                                                    <div id='lbError' class='warning'></div>                                                
                                                </div>
                                            </div>
                                        </form>
                                        </span></td></tr>";
                                    }else{
                                            //se cambio el onblur por onchange este funciona para pestaña de documentación del acta de nacimiento 
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                        <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                            <div class='form-group'>
                                                <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;'>Seleccionar archivo</label>
                                                        <input type='file' placeholder='Cambiar archivo' accept='application/pdf' data-max-size='3' class='archivopdf input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onchange='validate(this.name);' >
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                </div>
                                                <div class='buttonFile' id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                    <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Ver</button>
                                                    <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Etiqueta.$index."\")'>Eliminar</button>
                                                </div>
                                                <div id='lbError' class='warning'></div>
                                            </div>
                                        </form>
                                        </span></td></tr>";
                                    }
                                }
                            }
                        }
                    }
                    //MONEDA
                    if($queryDPE[$j]->Type == 'Moneda'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <div class='input-group'>
                                        <span class='input-group-addon'>$</span>
                                        <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                    </div>
                                    </span></td></tr>";
                                }else{
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                    <div class='input-group'>
                                        <span class='input-group-addon'>$</span>
                                        <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a required'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required>
                                    </div>
                                    </span></td></tr>";
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                    <div class='input-group'>
                                        <span class='input-group-addon'>$</span>
                                        <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                    </div>
                                    </span></td></tr>";
                                }else{
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                    <div class='input-group'>
                                        <span class='input-group-addon'>$</span>
                                        <input type='number' min='0' step='0.01' data-number-to-fixed='2' data-number-stepfactor='100' class='currency input-group form-control entradas-g-a'  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."'>
                                    </div>
                                    </span></td></tr>";
                                }
                            }
                        }
                    }
                    //SELECCION MULTIPLE
                    if($queryDPE[$j]->Type == 'Selección Multiple'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            $rl='';
                            $opt = explode(',', $queryDPE[$j]->Items);
                            for ($x = 0; $x < count($opt); $x++) {
                                if($queryDPE[$j]->Requerido == 1){
                                    $rl=$rl."<label><input type='checkbox' class=' entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$opt[$x]."' data-titleInput='".$queryDPE[$j]->entrada."' required> ".$opt[$x]."</label><br>";
                                }else{
                                    $rl=$rl."<label><input type='checkbox' class=' entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$opt[$x]."' data-titleInput='".$queryDPE[$j]->entrada."'> ".$opt[$x]."</label><br>";
                                }
                            }
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td><br><br>
                                        ".$rl."
                                        </span></td></tr>";
                                }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td><br><br>
                                        ".$rl."
                                        </span></td></tr>";
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td><br><br>
                                    ".$rl."
                                    </span></td></tr>";
                                }else{
                                    $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td><br><br>
                                    ".$rl."
                                    </span></td></tr>";
                                }
                            }
                        }
                    }
                    //CHECKBOX
                    if($queryDPE[$j]->Type == 'Checkbox'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'></td><td>
                                        <input type='checkbox' class=' entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);'   value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required > <label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label>
                                        </span></td></tr>";
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'></td><td>
                                        <input type='checkbox' class=' entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);'   value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required checked> <label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'></td><td>
                                        <label><input type='checkbox' class=' entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);'  value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required > <label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label>
                                        </span></td></tr>";
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'></td><td>
                                        <label><input type='checkbox' class=' entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);'  value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' required checked> <label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label>
                                        </span></td></tr>";
                                    }
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'></td><td>
                                        <input type='checkbox' class=' entradas-g-a ' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' > <label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label>
                                        </span></td></tr>";
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'></td><td>
                                        <input type='checkbox' class=' entradas-g-a ' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' checked> <label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->ValorCargado == null) or ($queryDPE[$j]->ValorCargado=='')){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' ></label></td><td>
                                        <input type='checkbox' class=' entradas-g-a ' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' > <label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label>
                                        </span></td></tr>";
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' ></label></td><td>
                                        <input type='checkbox' class=' entradas-g-a ' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."'  onblur='GuardadoInput(this.name, this.value);' value='".$queryDPE[$j]->ValorCargado."' data-titleInput='".$queryDPE[$j]->entrada."' checked> <label id='requerido' name='".$queryDPE[$j]->Clasificacion." ".$queryDPE[$j]->entrada."' idInp='".$queryDPE[$j]->IdServicioEseEntrada."' for='".$queryDPE[$j]->IdServicioEseEntrada."' >".$queryDPE[$j]->entrada."</label>
                                        </span></td></tr>";
                                    }
                                }
                            }
                        }
                    }
                    //JPEG
                    if($queryDPE[$j]->Type == 'JPEG'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if($queryDPE[$j]->flag_PDF_JPEG == 'TRUE'){    
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ required' >
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;' >Seleccionar</label>
                                                        <input type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <input type='file' placeholder='Cambiar archivo' accept='.jpg, .jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='Recortar(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\");' required>
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                        <!--<span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span>-->
                                                    </div>
                                                    <div id='modalRecortar".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                        <div class='modal-dialog modal-lg' role='document'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h3 class='' id='modal-title'>Ajustar imagen</h3>
                                                                </div>
                                                            <div class='modal-body' id='modal-body-recortar'>
                                                                <div id='content-loading-file'>
                                                                    <center>
                                                                        <div class='col'>
                                                                            <div id='editor".$queryDPE[$j]->IdServicioEseEntrada."'></div>
                                                                        </div>
                                                                        <div class='col'>
                                                                            <canvas id='preview".$queryDPE[$j]->IdServicioEseEntrada."' style='display: none;'></canvas>
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' id='btnGuardarRecort' class='btn btn-info' onclick='validate(".$queryDPE[$j]->IdServicioEseEntrada.")'>Guardar</button>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cancelar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->entrada."\")'>Ver</button>   
                                                        <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\")'>Eliminar</button>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </span></td></tr>";
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ required' >
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;' >Seleccionar</label>
                                                        <input type='file' accept='.jpg, .jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='Recortar(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\");' required>
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        </div>
                                                        <div id='modalRecortar".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                        <div class='modal-dialog modal-lg' role='document'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                <h3 class='' id='modal-title'>Ajustar imagen</h3>
                                                                </div>
                                                            <div class='modal-body' id='modal-body-recortar'>
                                                                <div id='content-loading-file'>
                                                                    <center>
                                                                        <div class='col'>
                                                                            <div id='editor".$queryDPE[$j]->IdServicioEseEntrada."'></div>
                                                                        </div>
                                                                        <div class='col'>
                                                                            <canvas id='preview".$queryDPE[$j]->IdServicioEseEntrada."' style='display: none;'></canvas>
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' id='btnGuardarRecort' class='btn btn-info' onclick='validate(".$queryDPE[$j]->IdServicioEseEntrada.")'>Guardar</button>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cancelar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->entrada."\")'>Ver</button>
                                                        <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\")'>Eliminar</button>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </span></td></tr>";
                                    }
                                }else{
                                    if($queryDPE[$j]->flag_PDF_JPEG == 'TRUE'){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ required' >
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;' >Seleccionar</label>
                                                        <input type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <input type='file' placeholder='Cambiar archivo' accept='.jpg, .jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='Recortar(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\");' required>
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        </div>
                                                        <div id='modalRecortar".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                        <div class='modal-dialog modal-lg' role='document'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                <h3 class='' id='modal-title'>Ajustar imagen</h3>
                                                                </div>
                                                            <div class='modal-body' id='modal-body-recortar'>
                                                                <div id='content-loading-file'>
                                                                    <center>
                                                                        <div class='col'>
                                                                            <div id='editor".$queryDPE[$j]->IdServicioEseEntrada."'></div>
                                                                        </div>
                                                                        <div class='col'>
                                                                            <canvas id='preview".$queryDPE[$j]->IdServicioEseEntrada."' style='display: none;'></canvas>
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' id='btnGuardarRecort' class='btn btn-info' onclick='validate(".$queryDPE[$j]->IdServicioEseEntrada.")'>Guardar</button>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cancelar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->entrada."\")'>Ver</button>
                                                        <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\")'>Eliminar</button>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </span></td></tr>";
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'><label id='requerido'>".$queryDPE[$j]->entrada."</label></td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ required' >
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;' >Seleccionar</label>
                                                        <input type='file' accept='.jpg, .jpeg' class='archivojpeg input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='Recortar(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\");' required>
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        </div>
                                                        <div id='modalRecortar".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                        <div class='modal-dialog modal-lg' role='document'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h3 class='' id='modal-title'>Ajustar imagen</h3>
                                                                </div>
                                                            <div class='modal-body' id='modal-body-recortar'>
                                                                <div id='content-loading-file'>
                                                                    <center>
                                                                        <div class='col'>
                                                                            <div id='editor".$queryDPE[$j]->IdServicioEseEntrada."'></div>
                                                                        </div>
                                                                        <div class='col'>
                                                                            <canvas id='preview".$queryDPE[$j]->IdServicioEseEntrada."' style='display: none;'></canvas>
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' id='btnGuardarRecort' class='btn btn-info' onclick='validate(".$queryDPE[$j]->IdServicioEseEntrada.")'>Guardar</button>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cancelar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class='buttonFile' id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->entrada."\")'>Ver</button>
                                                        <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\")'>Eliminar</button>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </span></td></tr>";
                                    }
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if($queryDPE[$j]->flag_PDF_JPEG == 'TRUE'){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <div class='filePJ'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;' >Seleccionar</label>
                                                        <input type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <input type='file' placeholder='Cambiar archivo' accept='.jpg, .jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='Recortar(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\");' >
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        </div>
                                                        <div id='modalRecortar".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                        <div class='modal-dialog modal-lg' role='document'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h3 class='' id='modal-title'>Ajustar imagen</h3>
                                                                </div>
                                                            <div class='modal-body' id='modal-body-recortar'>
                                                                <div id='content-loading-file'>
                                                                    <center>
                                                                        <div class='col'>
                                                                            <div id='editor".$queryDPE[$j]->IdServicioEseEntrada."'></div>
                                                                        </div>
                                                                        <div class='col'>
                                                                            <canvas id='preview".$queryDPE[$j]->IdServicioEseEntrada."' style='display: none;'></canvas>
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' id='btnGuardarRecort' class='btn btn-info' onclick='validate(".$queryDPE[$j]->IdServicioEseEntrada.")'>Guardar</button>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cancelar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->entrada."\")'>Ver</button>
                                                        <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\")'>Eliminar</button>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </span></td></tr>";
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;' >Seleccionar</label>
                                                        <input type='file' accept='.jpg, .jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='Recortar(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\");' >
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        </div>
                                                        <div id='modalRecortar".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                        <div class='modal-dialog modal-lg' role='document'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h3 class='' id='modal-title'>Ajustar imagen</h3>
                                                                </div>
                                                            <div class='modal-body' id='modal-body-recortar'>
                                                                <div id='content-loading-file'>
                                                                    <center>
                                                                        <div class='col'>
                                                                            <div id='editor".$queryDPE[$j]->IdServicioEseEntrada."'></div>
                                                                        </div>
                                                                        <div class='col'>
                                                                            <canvas id='preview".$queryDPE[$j]->IdServicioEseEntrada."' style='display: none;'></canvas>
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' id='btnGuardarRecort' class='btn btn-info' onclick='validate(".$queryDPE[$j]->IdServicioEseEntrada.")'>Guardar</button>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cancelar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='buttonFile' id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->entrada."\")'>Ver</button>
                                                        <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\")'>Eliminar</button>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </span></td></tr>";
                                    }
                                }else{
                                    if($queryDPE[$j]->flag_PDF_JPEG == 'TRUE'){
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;' >Seleccionar</label>
                                                        <input type='image' src='https://www.sistemagent.com:8000/erp-demo/public/assets/img/7-72178_green-tick-simbolo-de-visto-verde.png' height='20' class='image_buscar' id='image".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <input type='file' placeholder='Cambiar archivo' accept='.jpg, .jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='Recortar(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\");' >
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        </div>
                                                        <div id='modalRecortar".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                        <div class='modal-dialog modal-lg' role='document'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h3 class='' id='modal-title'>Ajustar imagen</h3>
                                                                </div>
                                                            <div class='modal-body' id='modal-body-recortar'>
                                                                <div id='content-loading-file'>
                                                                    <center>
                                                                        <div class='col'>
                                                                            <div id='editor".$queryDPE[$j]->IdServicioEseEntrada."'></div>
                                                                        </div>
                                                                        <div class='col'>
                                                                            <canvas id='preview".$queryDPE[$j]->IdServicioEseEntrada."' style='display: none;'></canvas>
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' id='btnGuardarRecort' class='btn btn-info' onclick='validate(".$queryDPE[$j]->IdServicioEseEntrada.")'>Guardar</button>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cancelar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->entrada."\")'>Ver</button>    
                                                        <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\")'>Eliminar</button>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </span></td></tr>";      
                                    }else{
                                        $res5="<tr><td><span class='".$classSpan."_".$queryDPE[$j]->Indice."'>".$queryDPE[$j]->entrada."</td><td>
                                            <form name='my_form".$queryDPE[$j]->IdServicioEseEntrada."' id='my_form".$queryDPE[$j]->IdServicioEseEntrada."' enctype='multipart/form-data' onsubmit='return false'>
                                                <div class='form-group'>
                                                    <div id='filePJ".$queryDPE[$j]->IdServicioEseEntrada."' class='filePJ'>
                                                        <label id='buttonUP' for='".$queryDPE[$j]->IdServicioEseEntrada."' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;color: #fff;background:#f59c1a;border-color: #f59c1a;' >Seleccionar</label>
                                                        <input type='file' accept='.jpg, .jpeg' class='archivojpeg input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->IdServicioEseEntrada."' onblur='Recortar(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\");' >
                                                        <div id='buttonLoading".$queryDPE[$j]->IdServicioEseEntrada."' class='spinner-border text-warning' role='status'></div>
                                                        <!-- <span id='buttonUP' style='font-family: Verdana,Arial,sans-serif;font-size: 1em;'>Seleccionar</span> -->
                                                        </div>
                                                        <div id='modalRecortar".$queryDPE[$j]->IdServicioEseEntrada."' class='modal fade' tabindex='-1' role='dialog'>
                                                        <div class='modal-dialog modal-lg' role='document'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h3 class='' id='modal-title'>Ajustar imagen</h3>
                                                                </div>
                                                            <div class='modal-body' id='modal-body-recortar'>
                                                                <div id='content-loading-file'>
                                                                    <center>
                                                                        <div class='col'>
                                                                            <div id='editor".$queryDPE[$j]->IdServicioEseEntrada."'></div>
                                                                        </div>
                                                                        <div class='col'>
                                                                            <canvas id='preview".$queryDPE[$j]->IdServicioEseEntrada."' style='display: none;'></canvas>
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' id='btnGuardarRecort' class='btn btn-info' onclick='validate(".$queryDPE[$j]->IdServicioEseEntrada.")'>Guardar</button>
                                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cancelar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='buttonFile' id='buttonFile".$queryDPE[$j]->IdServicioEseEntrada."'>
                                                        <br><button type='button' class='btn btn-warning' onclick='showFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->Type."\",\"".$queryDPE[$j]->entrada."\")'>Ver</button>
                                                        <button type='button' class='btn btn-danger' onclick='removeFile(".$queryDPE[$j]->IdServicioEseEntrada.",".$id.",\"".$queryDPE[$j]->entrada."\")'>Eliminar</button>
                                                    </div>
                                                    <div id='lbError' class='warning'></div>
                                                </div>
                                            </form>
                                            </span></td></tr>";
                                    }
                                }
                            }
                        }
                    }
                    //MATRIZ DE TEXTO
                    if($queryDPE[$j]->Type == 'MatrizTexto'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            $rl='';
                            $rl2='';
                            $row= '' ;
                            $op=$queryDPE[$j]->ValorCargado;
                            $optM=json_decode($op,true);
                            $opt = explode(',', $queryDPE[$j]->Items);
                            for ($x = 0; $x < count($opt); $x++) {
                                if($queryDPE[$j]->Requerido == 1){
                                    if($queryDPE[$j]->Maxm == 0){
                                        $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\">
                                                        <div class=\"form-group\">
                                                            <label id='requerido'>".$opt[$x]." </label>
                                                            "."<input type='text' class='matriztexto input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."'  required onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";
                                    }else{
                                        $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\">
                                                        <div class=\"form-group\">
                                                            <label id='requerido'>".$opt[$x]." </label>
                                                            "."<input type='text' class='matriztexto input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."'  maxlength='".$queryDPE[$j]->Maxm."'  required onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";
                                    }
                                }else{
                                    if($queryDPE[$j]->Maxm == 0){
                                        $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\" >
                                                        <div class=\"form-group\">
                                                            <label>".$opt[$x]." </label>
                                                            "."<input type='text' class='matriztexto input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."'  onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";
                                    }else{
                                        $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\">
                                                        <div class=\"form-group\">
                                                            <label>".$opt[$x]." </label>
                                                            "."<input type='text' class='matriztexto input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' value='".$optM[$x]."'  maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";
                                    }
                                }
                            }                                    
                                    $res5 = "<span class='".$classSpan."_".$queryDPE[$j]->Indice."'><br>
                                                <div class='row justify-content-center' style='margin:0; border:1px solid #ccd0d4;'>
                                                    <div class='col text-center' style='background: #f0f3f5;'>
                                                        <label>".$queryDPE[$j]->entrada."</label>
                                                    </div>
                                                    <div class='col'>
                                                        ".$row."
                                                    </div>
                                                </div>
                                            </span>";
                        }
                    }
                    //MATRIZ NUMERO
                    if($queryDPE[$j]->Type == 'MatrizNúmero'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            $rl='';
                            $rl2='';
                            $row= '' ;
                            $op=$queryDPE[$j]->ValorCargado;
                            $optM=json_decode($op,true);
                            $opt = explode(',', $queryDPE[$j]->Items);
                            for ($x = 0; $x < count($opt); $x++) {
                                if($queryDPE[$j]->Requerido == 1){
                                    if($queryDPE[$j]->Maxm == 0){
                                         $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\">
                                                        <div class=\"form-group\">
                                                            <label id='requerido'>".$opt[$x]." </label>
                                                            "."<input min='0' type='number'class='matriznumero input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."'  required onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";
                                    }else{
                                        $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\">
                                                        <div class=\"form-group\">
                                                            <label id='requerido'>".$opt[$x]." </label>
                                                            "."<input min='0' type='number'class='matriznumero input-group form-control entradas-g-a required' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."'  maxlength='".$queryDPE[$j]->Maxm."' required onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";
                                    }
                                }else{
                                    if($queryDPE[$j]->Maxm == 0){
                                        $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\">
                                                        <div class=\"form-group\">
                                                            <label>".$opt[$x]." </label>
                                                            "."<input min='0' type='number'class='matriznumero input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onmouseup='onkeyup()' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";
                                    }else{
                                        $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\">
                                                        <div class=\"form-group\">
                                                            <label>".$opt[$x]." </label>
                                                            "."<input min='0' type='number'class='matriznumero input-group form-control entradas-g-a' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."' onmouseup='onkeyup()' maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";
                                    }
                                }
                            }
                                    $res5 = "<span class='".$classSpan."_".$queryDPE[$j]->Indice."'><br>
                                                <div class='row justify-content-center' style='margin:0; border:1px solid #ccd0d4;'>
                                                    <div class='col text-center' style='background: #f0f3f5;'>
                                                        <label>".$queryDPE[$j]->entrada."</label>
                                                    </div>
                                                    <div class='col'>
                                                        ".$row."
                                                    </div>
                                                </div>
                                            </span>";
                        }
                    }
                    //MATRIZ FECHA
                    if($queryDPE[$j]->Type == 'MatrizFecha'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            $rl='';
                            $rl2='';
                            $row= '' ;
                            $op=$queryDPE[$j]->ValorCargado;
                            $optM=json_decode($op,true);
                            $opt = explode(',', $queryDPE[$j]->Items);
                            for ($x = 0; $x < count($opt); $x++) {
                                if($queryDPE[$j]->Requerido == 1){
                                    if($queryDPE[$j]->Maxm == 0){
                                         $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\">
                                                        <div class=\"form-group\">
                                                            <label id='requerido'>".$opt[$x]." </label>
                                                            "."<input style='font-size: 12px' type='date' class='matrizfecha input-group form-control entradas-g-a required' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."'  required onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";
                                    }else{
                                        $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\">
                                                        <div class=\"form-group\">
                                                            <label id='requerido'>".$opt[$x]." </label>
                                                            "."<input style='font-size: 12px' type='date' class='matrizfecha input-group form-control entradas-g-a required' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."'  maxlength='".$queryDPE[$j]->Maxm."' required onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";
                                    }
                                }else{
                                    if($queryDPE[$j]->Maxm == 0){
                                        $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\">
                                                        <div class=\"form-group\">
                                                            <label>".$opt[$x]." </label>
                                                            "."<input style='font-size: 12px' type='date' class='matrizfecha input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."'  onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";                                             
                                    }else{
                                        $row .= "<div class=\"row\" style=\"margin-right:1px; margin-left:1px;\">
                                                    <div class=\"col-sm-12\">
                                                        <div class=\"form-group\">
                                                            <label>".$opt[$x]." </label>
                                                            "."<input style='font-size: 12px' type='date' class='matrizfecha input-group form-control entradas-g-a' max='".date('d-m-Y')."' name='".$queryDPE[$j]->IdServicioEseEntrada."[".$x."]' id='".$queryDPE[$j]->CampoNombre."' value='".$optM[$x]."'  maxlength='".$queryDPE[$j]->Maxm."' onblur='GuardadoInput(this.name, this.value);' data-titleInput='".$queryDPE[$j]->entrada."'>"."
                                                        </div>
                                                    </div>
                                                </div>";                                              
                                    }
                                }
                            }		 
                                $res5 = "<span class='".$classSpan."_".$queryDPE[$j]->Indice."'><br>
                                            <div class='row justify-content-center' style='margin:0; border:1px solid #ccd0d4;'>
                                                <div class='col text-center' style='background: #f0f3f5;'>
                                                    <label>".$queryDPE[$j]->entrada."</label>
                                                </div>
                                                <div class='col'>
                                                    ".$row."
                                                </div>
                                            </div>
                                        </span>";
                        }
                    }
                    //BUTTON
                    if($queryDPE[$j]->Type == 'Button'){
                        if($queryDPE[$j]->VisibleForms == 1){
                            if($queryDPE[$j]->Requerido == 1){
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'GuardarFormularioEnvio')&&($queryDPE[$j]->entrada == 'Guardar')){
                                        $res5="<tr><td><span class='col-sm-5 col-sm-offset-4 ".$classSpan."_".$queryDPE[$j]->Indice."'></td><td>
                                        <a class='btn btn-success btn-block '  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onclick='saveFormulario();' >".$queryDPE[$j]->entrada."</a>
                                        </span></td></tr>";
                                    }
                                }else{
                                    if(($queryDPE[$j]->Clasificacion == 'GuardarFormularioEnvio')&&($queryDPE[$j]->entrada == 'Guardar')){
                                        $res5="<tr><td><span class='col-sm-5 col-sm-offset-4 ".$classSpan."_".$queryDPE[$j]->Indice."'></td>
                                        <a class='btn btn-success btn-block ' name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."' onclick='saveFormulario();' >".$queryDPE[$j]->entrada."</a>
                                        </span></td></tr>";
                                    }
                                }
                            }else{
                                if($queryDPE[$j]->Maxm == 0){
                                    if(($queryDPE[$j]->Clasificacion == 'GuardarFormularioEnvio')&&($queryDPE[$j]->entrada == 'Guardar')){
                                        $res5="<tr><td><span class='col-sm-5 col-sm-offset-4 ".$classSpan."_".$queryDPE[$j]->Indice."'></td><td>
                                        <a class='btn btn-success btn-block '  name='".$queryDPE[$j]->IdServicioEseEntrada."' id='".$queryDPE[$j]->CampoNombre."' maxlength='".$queryDPE[$j]->Maxm."' value='".$queryDPE[$j]->ValorCargado."'  onclick='saveFormulario();' >".$queryDPE[$j]->entrada."</a>
                                        </span></td></tr>";
                                    }
                                }
                            }
                        }
                    }
                        $data5[]=[$res5];
                        $data6[]=[$res6];
                        $j ++;
                    }
                }
                return array($data,$data2,$data3,$data4,$data5,$data6,$data7,$pclas,$pclasi,$pclasagr,$aaa);
            }
        } catch (\Exception $e) {
            return array($e->getMessage(),$e->getCode(),$e->getLine());
        }
    }

      public function valuescampos(Request $request){
        $datos=$request->input('name');
        $res='';
        $rl='';

        $queryf = DB::select("Select master_ese_entrada.Formato From master_ese_entrada
        Inner Join master_ese_srv_entrada on master_ese_srv_entrada.IdEntrada=  master_ese_entrada.IdEntrada
        where master_ese_srv_entrada.IdServicioEseEntrada = $datos");

        foreach ($queryf as $f) {
            $fr=$f->Formato;
        }
        if($fr=='Selección Multiple'){

            $query = DB::select("Select master_ese_srv_entrada.ValorCargado From master_ese_srv_entrada
            Inner Join master_ese_entrada on master_ese_entrada.IdEntrada=  master_ese_srv_entrada.IdEntrada
            where master_ese_srv_entrada.IdServicioEseEntrada = $datos and master_ese_entrada.Formato='Selección Multiple'");

            foreach ($query as $opt) {
                $im=$opt->ValorCargado;
            }
        }
        if($fr=='MatrizTexto'){

            $query = DB::select("Select master_ese_srv_entrada.ValorCargado From master_ese_srv_entrada
            Inner Join master_ese_entrada on master_ese_entrada.IdEntrada=  master_ese_srv_entrada.IdEntrada
            where master_ese_srv_entrada.IdServicioEseEntrada = $datos and master_ese_entrada.Formato='MatrizTexto'");

            foreach ($query as $opt) {
                $im=$opt->ValorCargado;
            }
        }
        if($fr=='MatrizFecha'){

            $query = DB::select("Select master_ese_srv_entrada.ValorCargado From master_ese_srv_entrada
            Inner Join master_ese_entrada on master_ese_entrada.IdEntrada=  master_ese_srv_entrada.IdEntrada
            where master_ese_srv_entrada.IdServicioEseEntrada = $datos and master_ese_entrada.Formato='MatrizFecha'");

            foreach ($query as $opt) {
                $im=$opt->ValorCargado;
            }
        }
        if($fr=='MatrizNúmero'){

            $query = DB::select("Select master_ese_srv_entrada.ValorCargado From master_ese_srv_entrada
            Inner Join master_ese_entrada on master_ese_entrada.IdEntrada=  master_ese_srv_entrada.IdEntrada
            where master_ese_srv_entrada.IdServicioEseEntrada = $datos and master_ese_entrada.Formato='MatrizNúmero'");

            foreach ($query as $opt) {
                $im=$opt->ValorCargado;
            }
        }
        return array($datos,$im,$fr);
    }

    public function GuardarFile(Request $request,$id){
        //obtenemos el campo file definido en el formulario
            $file = $request->file($id);
            $imagedata = file_get_contents($file);
            $base64 = base64_encode($imagedata);
            $srv_entr = MasterEseServicioEntrada::where('IdServicioEseEntrada', $id)->first();
            $srv_entr->update(['ValorCargado' => $base64]);

            $sqlMod = DB::select("select IdModalidad from master_ese_srv_servicio where IdServicioEse =  (select IdServicioEse from master_ese_srv_entrada where IdServicioEseEntrada = $id)");

            foreach ($sqlMod as $mpt) {
                $ValMod=$mpt->IdModalidad;
            }
            $calculado="";

            $calculado="select  master_ese_contenedor.IdContenedor,master_ese_contenedor.Etiqueta, count(master_ese_contenedor.Etiqueta) as dato
            from master_ese_contenedor
            Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
            Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
            Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
            Where master_ese_srv_entrada.IdServicioEse =
            (select IdServicioEse from master_ese_srv_entrada where IdServicioEseEntrada = ?)
            and master_ese_srv_entrada.ValorCargado <> '' and master_ese_srv_entrada.Requerido=1 and master_ese_srv_entrada.VisibleForms=1
            and master_ese_contenedor.Etiqueta = (select  master_ese_contenedor.Etiqueta
            from master_ese_contenedor
            Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
            Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
            Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
            and master_ese_srv_entrada.IdServicioEseEntrada = ?)";

            if($ValMod == 1){               

                $calculado.="  and master_ese_srv_entrada.Telefonico=1 ";

                $calculado=DB::select($calculado,[$id,$id]);

            }
            else{

                $calculado.="  and master_ese_srv_entrada.Presencial=1 ";

                $calculado=DB::select($calculado,[$id,$id]);
            }
            $real="";

            $real="select  master_ese_contenedor.IdContenedor,master_ese_contenedor.Etiqueta, count(master_ese_contenedor.Etiqueta) as dato
            from master_ese_contenedor
            Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
            Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
            Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
            Where master_ese_srv_entrada.IdServicioEse =
            (select IdServicioEse from master_ese_srv_entrada where IdServicioEseEntrada = ?)
            and master_ese_srv_entrada.ValorCargado <> '' and master_ese_srv_entrada.Requerido=1 and master_ese_srv_entrada.VisibleForms=1 and master_ese_contenedor.Etiqueta = (select  master_ese_contenedor.Etiqueta
            from master_ese_contenedor
            Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
            Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
            Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
            and master_ese_srv_entrada.IdServicioEseEntrada = ?)";

            if($ValMod == 1){               

                $real.="  and master_ese_srv_entrada.Telefonico=1 ";

                $real=DB::select($real,[$id,$id]);            
            }
            else{

                $real.="  and master_ese_srv_entrada.Presencial=1 ";

                $real=DB::select($real,[$id,$id]);
            }
                $cal=0;$rea=-1;$dato='';$result='';
                foreach ($calculado as $c) {
                $cal=$c->dato;
                }
                foreach ($real as $c) {
                $rea=$c->dato;
                $dato=$c->IdContenedor;
                }
                if($cal==$rea){
                $result = 'verde';

                    $calcFile = DB::select("select  master_ese_srv_entrada.IdServicioEseEntrada,master_ese_srv_entrada.IdServicioEse,count(master_ese_entrada.Etiqueta) as entrada,master_ese_entrada.Formato,master_ese_srv_entrada.IdEntrada,cast(master_ese_srv_entrada.ValorCargado as char) as ValorCargado
                    from master_ese_srv_entrada
                    Inner Join master_ese_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                    Where master_ese_srv_entrada.IdServicioEse = (select IdServicioEse from master_ese_srv_entrada where IdServicioEseEntrada = :id) and (master_ese_entrada.Formato='JPEG' or master_ese_entrada.Formato='PDF') and master_ese_srv_entrada.Requerido=1",[":id"=>$id]);

                    $realFile = DB::select("select  master_ese_srv_entrada.IdServicioEseEntrada,master_ese_srv_entrada.IdServicioEse,count(master_ese_entrada.Etiqueta) as entrada,master_ese_entrada.Formato,master_ese_srv_entrada.IdEntrada,cast(master_ese_srv_entrada.ValorCargado as char) as ValorCargado
                    from master_ese_srv_entrada
                    Inner Join master_ese_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                    Where master_ese_srv_entrada.IdServicioEse = (select IdServicioEse from master_ese_srv_entrada where IdServicioEseEntrada = :id) and (master_ese_entrada.Formato='JPEG' or master_ese_entrada.Formato='PDF') and master_ese_srv_entrada.Requerido=1 and master_ese_srv_entrada.ValorCargado <> ''",[":id"=>$id]);

                    if($calcFile[0]->entrada==$realFile[0]->entrada){

                        $sql = DB::select("select * from master_ese_srv_asignacion where IdServicioEse = (select IdServicioEse from master_ese_srv_entrada where IdServicioEseEntrada = $id)");

                        foreach ($sql as $g) {
                            $IdAnalista=$g->IdAnalista;
                        }

                        $candidato = MasterConsultas::exeSQL("get_info_cadidate_send_email","READONLY",array("paramIdServicioEse" => $realFile[0]->IdServicioEse));


                    }
                }elseif ($cal>0) {
                $result = 'amarrillo';
                }else{
                $result = 'normal';
                }
            return response()->json(array($base64,$dato,$result));
    }

      public function GuardarEstudio(Request $request)
      {
        $valuesEntr=$request->input('valuesEntr');
        $keysEntr=$request->input('keysEntr');
        $id=$request->input('IdServicioEse');
        for($i=0;$i<count($keysEntr);$i++){
                $srv_entr = MasterEseServicioEntrada::where('IdServicioEseEntrada', $keysEntr[$i])->first();
                $srv_entr->update(['ValorCargado' => $valuesEntr[$i]]);
        }
            return response()->json(array(
                'status_alta' => 'success',
                'IdServicioEse' => $id,
            ));
    }

//SE CAMBIO EL QUERY PARA REALIZAR LA VALIDACIÓN SOBRE LOS CAMPOS REQUERIDOS
    public function GuardarEstudioInput(Request $request)
    {
        try {
            $id = $request->input("id");
            $value =   $request->input("value");
            // $value =   json_encode($request->input("value"), JSON_FORCE_OBJECT);
            $ids = $request->input("ids");
            $type = $request->input("type");
            // if($value=="")
            // $value=null;
            $srv_entr = MasterEseServicioEntrada::where('IdServicioEseEntrada', $id)->first();
            $srv_entr->update(['ValorCargado' => $value]);

            $sqlMod = DB::select("select IdModalidad from master_ese_srv_servicio where IdServicioEse = $ids");
            foreach ($sqlMod as $mpt) {
                $ValMod=$mpt->IdModalidad;
            }

            $calculado="select mec.idContenedor,
            case 
                when mesa.ValorCargado is null then false
                when mee.Formato = 'Combo' then mee.Items like concat('%',concat(mesa.ValorCargado, '%'))
                when mee.Formato in ('Fecha', 'Moneda', 'Número', 'TextArea', 'Texto') and (length(mesa.ValorCargado) > cast(replace(mee.Longitud, 'C','') as UNSIGNED) or length(mesa.ValorCargado) = 0 ) then false
                when mee.Formato = 'JPEG' and (length(mesa.ValorCargado) = 0 or mesa.ValorCargado is null) then false
                when mee.Formato = 'Checkbox' and mesa.ValorCargado not in ('No', 'Si') then false 
                else true
            end as isValid 
            from master_ese_contenedor mec
            Inner Join master_ese_agrupador mea  ON mea.IdContenedor = mec.IdContenedor
            Inner Join master_ese_entrada mee ON mee.IdAgrupador = mea.IdAgrupador
            Inner Join master_ese_srv_entrada mesa ON mesa.IdEntrada = mee.IdEntrada
            where mesa.IdServicioEse = ? and mesa.Requerido = 1 and mec.IdContenedor = (select mea.IdContenedor  from master_ese_srv_entrada mese 
            join master_ese_entrada mee on mese.IdEntrada = mee.IdEntrada 
            join master_ese_agrupador mea on mee.IdAgrupador = mea.IdAgrupador 
            where mese.IdServicioEseEntrada = ?)";

            if($ValMod == 1){               
                $calculado.="  and mesa.Telefonico=1 ";
            }
            else{
                $calculado.="  and mesa.Presencial=1 ";
            }
            $calculado=DB::select($calculado,[$ids,$id]);

            $toValido = true;
            foreach ($calculado as $c) {
                $dato=$c->idContenedor;
                if ($c->isValid ==false){
                    $toValido = false;
                }
            }

            if($toValido){
                $result = 'verde';
            }else {
                $result = 'amarrillo';
            }
            return response()->json(array("status" => "success",$dato,$result,$value));
        } catch (\Exception $e) {
            return response()->json(array("status" => "error",$e->getLine(),$e->getMessage(),$e->getCode()));
        }
    }

  public function validacionAmarillos(){
	  if($cal>0){
		  $color='Amarillo';
		  return view('configuracionesOS')->with('color',$color);
	  }
  }

  public function GetFilePreview($IdServicioEse){
      try {
        $status='';
        $b64Dpdf='';
        $idReport=0;
        $NamePlantilla='';
        $NameFile='';
        $typeservice='';
        $typePlantilla='';
        $NameReport='';
        $NombrePlantillaCliente = '';

        $DescripcionPlantilla=MasterConsultas::exeSQL("Get_information_plantilla","READONLY",array("IdServicioEse"=>$IdServicioEse));

        foreach($DescripcionPlantilla as $dp)
        {
            $NameFile = $dp->NombreArchivo;
            $NamePlantilla=$dp->DescripcionPlantilla;
            $typePlantilla = $dp->Tipos;
            $typeservice = $dp->Descripcion;
            $NombrePlantillaCliente = $dp->NombrePlantillaCliente;
        }
        $NameFile = str_replace(" ","_",$NameFile);

        $InformationReport=MasterConsultas::exeSQL("Get_name_report","READONLY",array("NamePlantilla"=>$NameFile));

        foreach($InformationReport as $ir)
        {
           $NameReport = $ir->OrigenArchivoFR;
           $idReport = $ir->IdReportes;
        }
        if(!empty($NameReport))
        {
            $objReportsEse = new ReportsEse();
            $response = $objReportsEse->GetPathReport($IdServicioEse,$idReport);
            $fileUrl='';
            if($response->success == true)
            {
                $fileUrl = $response->filePath;
                $pathPDF = $fileUrl;
                if(file_exists($pathPDF))
                {
                    $file = file_get_contents($pathPDF);
                    $b64Dpdf = base64_encode($file);
                    $status = "200";
                    unlink($pathPDF);
                }
            }else
            {
                $b64Dpdf = "No data";
                $status = "500";
            }
            unset($objReportsEse);
        }else{
            $b64Dpdf = "No data";
            $status = "404";
        }
        return response()->json(array(
            'status' => $status,
            'b64pdf' => $b64Dpdf,
            'NameFile' => $NameFile,
            'typePlantilla' => $typePlantilla,
            'NameReport' => $NameReport,
            'NamePlantilla' => $NamePlantilla,
            'path'=>$response
        ));
      } catch (\Exception $e) {
            return response()->json(array(
                'status' => "500",
                "error" => "error ".$e->getMessage()." ".$e->getLine()
            ));
      }
  }

     public function store(Request $request)
    {
    }

    protected function random_string() {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );
        for($i=0; $i<10; $i++) {
           $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

     public function searchEdo($idRegion){
        
        $Estados=DB::select("Select DISTINCT(e.IdEstado),e.Codigo,  e.FK_nombre_estado as Estado, e.variable, e.renapo,  e.IdPais,    p.FK_Pais as Pais 
        From estados as e   
        inner join master_pais as p on(p.IdPais=e.IdPais) 
        inner join master_region_edo mre on (mre.IdEstado=e.IdEstado)
        Where mre.IdRegion=$idRegion");

        return response()->json($Estados);
     }

     public function searchCity($idState){

        $Ciudades = MasterConsultas::exeSQL("master_ciudad", "READONLY",

            array(
                "IdCiudad" => '-1',
                "IdEstado" => $idState,
                "Codigo" => '-1',
                "Activo" => '-1'
            )
        );
        return response()->json($Ciudades);
     }

     public function searchRegion($IdRegion){

        $Regiones = MasterConsultas::exeSQL("get_info_municipios_x_estado","READONLY",array("paramIdEstado" => $IdRegion));
    
        return response()->json($Regiones);
     }

     public function searchColiniaCologne($ciudad){

        $Colonias = MasterConsultas::exeSQL("SearchColonia", "READONLY",

            array(
                "Ciudad" => $ciudad
            )
        );
        return response()->json($Colonias);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
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

    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
    }

    /**
     * Envio de correo para Ese cerrado,para analista
     */

    public function sendNotificationEseClose($IdServicioEse){
        $response['message'] = "";
        $response['isSendEmail'] = false;
        try {
            $IdCliente = 0;
            $idcn = 0;

            $resultSqlEstatus = DB::select("SELECT mde.Estatus FROM master_ese_srv_dictamen_eval mde where mde.IdServicioEse=?", [$IdServicioEse]);

            $resultSqlIdCliente = DB::select("SELECT mess.IdCliente FROM master_ese_srv_servicio mess WHERE mess.IdServicioEse = ?", [$IdServicioEse]);

            if(count($resultSqlIdCliente) > 0)
                $IdCliente = $resultSqlIdCliente[0]->IdCliente;
            if(count($resultSqlEstatus) > 0){
                if($resultSqlEstatus[0]->Estatus != '' && $resultSqlEstatus[0]->Estatus == "Cerrado"){

                    $resultSqlCliente = MasterConsultas::exeSQL("get_info_client_for_send_email","READONLY",array("paramIdCliente" => $IdCliente));

                    if(count($resultSqlCliente) > 0)
                        $idcn = $resultSqlCliente[0]->idcn;

                   $resultSqlLider = MasterConsultas::exeSQL("get_info_lider_for_send_email","READONLY",array("IdServicioEse" => $IdServicioEse));

                   $resultSqlAnalista = MasterConsultas::exeSQL("get_info_analista_for_send_email","READONLY",array("IdServicioEse" => $IdServicioEse));

                   $candidato = MasterConsultas::exeSQL("get_info_cadidate_send_email","READONLY",array("paramIdServicioEse" => $IdServicioEse));

                   $notification = new Notificaciones();
                   $responseNotification = $notification->sendNotification("ANALISTA-CIERRE",
                   array("IdServicioEse" => $IdServicioEse,
                         "Analista" => $resultSqlAnalista[0]->nombre,
                         "Cliente" => $resultSqlCliente[0]->nombre,
                         "candidato" => $candidato[0]->nombre,
                         "PuestoCandidato" => $candidato[0]->PuestoCandidato
                        ),
                   array($resultSqlCliente,$resultSqlLider));
                    $response['message'] = $responseNotification['message'];
                    $response['isSendEmail'] = $responseNotification['isSendEmail'];
                    return $response;                         
                }       
            }
            $response['message'] = "Para que se envie la notificación el Estatus debe ser cerrado";
            return $response;    
        } catch (\Exception $e) {
            $response['message'] = "Ocurrió un error al obtener los datos, error: ".$e->getMessage();
            return $response;
        }
    }

    public function getJsonSummary($IdServicioEse){

        $grupos = DB::select("Select concat('|',GROUP_CONCAT(DISTINCT(master_ese_contenedor.Etiqueta) SEPARATOR ','),'|') as Grupo
        from master_ese_contenedor
        Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
        Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
        Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
        Where master_ese_srv_entrada.IdServicioEse = :IdServicioEse and master_ese_srv_entrada.VisibleForms=1 
        and master_ese_contenedor.Etiqueta != 'DOCUMENTACIÓN'
        and master_ese_contenedor.Etiqueta != 'FOTOS DEL DOMICILIO'
        and master_ese_contenedor.Etiqueta != 'CROQUIS DE UBICACIÓN DEL DOMICILIO'
        order by master_ese_contenedor.Orden, master_ese_agrupador.Orden", [":IdServicioEse"=>$IdServicioEse]);

        $grupos=str_replace('|','"',$grupos[0]->Grupo);
        $grupos=explode(",",$grupos);
        foreach($grupos as $key => $val) {
            if($val == 'SITUACIÓN SOCIAL Y ECONÓMICA') {
                $item = $grupos[$key];
                unset($grupos[$key]);
                array_push($grupos, $item); 
                break;
            }
        }
        $grupos=str_replace('"','',implode(",",$grupos));
        $grupos = $this->replaceAccents($grupos);

        $result = DB::select("SELECT getjsonResumenEstudio(:id,:grupos) as resultJson", [":id"=>$IdServicioEse,":grupos"=>$grupos]);

      $opt=json_decode($result[0]->resultJson,true);
      $indiceActual=$opt['indiceActualValor'];
      if($indiceActual!=null){

        $queryAnterI = DB::select("select GROUP_CONCAT(if(mee.CampoNombre='TrayecLaboralAplica' and srve.ValorCargado='Si' and srve.Indice != :indiceActual,if(mee.CampoNombre='TrayecLaboralEmpleoActual' and srve.ValorCargado!='Si' ,NULL,srve.Indice),NULL)) as IndiceAnterior from master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada 
        where srve.IdServicioEse=:IdServicioEse",['IdServicioEse' => $IdServicioEse,'indiceActual' => $indiceActual]);

      }else{

        $queryAnterI = DB::select("select GROUP_CONCAT(if(mee.CampoNombre='TrayecLaboralAplica' and srve.ValorCargado='Si',if(mee.CampoNombre='TrayecLaboralEmpleoActual' and srve.ValorCargado!='Si' ,NULL,srve.Indice),NULL)) as IndiceAnterior from master_ese_srv_entrada srve 
        inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada 
        where srve.IdServicioEse=:IdServicioEse",['IdServicioEse' => $IdServicioEse]);
      }
      $indiceAnterior=$queryAnterI[0]->IndiceAnterior;
      $res="";
      $resAnt="";
      if($indiceActual!=null){

            $resultActual= DB::select("SELECT CONCAT('{',GROUP_CONCAT(
                 CONCAT(CONCAT('|',IF(srve.Indice > 0 ,CONCAT(mee.CampoNombre, srve.Indice) ,mee.CampoNombre),'Valor','|', ':'), 
                IF(mee.Formato LIKE 'Matriz%' ,NULL,CONCAT('|',CAST(IF(srve.ValorCargado IS NULL OR srve.ValorCargado = '', '', srve.ValorCargado) AS char),'|'))) order by srve.Indice,mee.orden) ,'}')as empleoA
                FROM master_ese_srv_entrada srve 
                inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
                INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
                INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
                where srve.IdServicioEse=:IdServicioEse and c.Etiqueta = 'TRAYECTORIA LABORAL' and FIND_IN_SET(srve.Indice, :indice)
                order by srve.Indice,mee.orden",['IdServicioEse' => $IdServicioEse,'indice' => $indiceActual]);

            $desempQueryS= DB::select("SELECT concat('{',
                concat('|','Excelente','|',':','|',SUM(CASE WHEN srve.ValorCargado = 'Excelente' THEN 4 ELSE 0 END),'|',','),
                concat('|','Bueno','|',':','|',SUM(CASE WHEN srve.ValorCargado = 'Bueno' THEN 3 ELSE 0 END),'|',','),
                concat('|','Regular','|',':','|',SUM(CASE WHEN srve.ValorCargado = 'Regular' THEN 2 ELSE 0 END),'|',','),
                concat('|','Malo','|',':','|',SUM(CASE WHEN srve.ValorCargado = 'Malo' THEN 1 ELSE 0 END),'|') ,'}') as Desemp
           from master_ese_srv_entrada srve 
           inner join master_ese_entrada mee on mee.IdEntrada = srve.IdEntrada
           where (mee.CampoNombre='TrayecLaboralCriHonradez' or mee.CampoNombre='TrayecLaboralCriCalidadTrabajo' 
           or mee.CampoNombre='TrayecLaboralCriRelacionSuperi' or mee.CampoNombre='TrayecLaboralCriRelacionCompan' 
           or mee.CampoNombre='TrayecLaboralCriProductividad' or mee.CampoNombre='TrayecLaboralCriIniciativa' 
           or mee.CampoNombre='TrayecLaboralCriPuntualidad' or mee.CampoNombre='TrayecLaboralCriResponsabilida') 
           and srve.IdServicioEse = :IdServicioEse and srve.Indice=:indice",['IdServicioEse' => $IdServicioEse,'indice' => $indiceActual]);

        if($desempQueryS[0]->Desemp!=null){
            $desempQuery=str_replace('|','"',$desempQueryS[0]->Desemp);
            $trDesemp=json_decode($desempQuery,true);
            $cantD = max($trDesemp);
            $desemp = array_search($cantD, $trDesemp);
        }
                $resultActual=str_replace('|','"',$resultActual[0]->empleoA);
            $trActual=json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $resultActual), true);
            if($indiceActual==0){
                $nombEmp='TrayecLaboralNombreEmpresaValor';
                $rsoc='TrayecLaboralRazonSocialValor';
                $fecIn='TrayecLaboralIngresoValor';
                $ultPuesto='TrayecLaboralTltimoPuestoValor';
                $nomInform='TrayecLaboralnformoValor';
                $puestInform='TrayecLaboralPuestoEvaluaDesValor';
            }else{
                $nombEmp='TrayecLaboralNombreEmpresa'.$indiceActual.'Valor';
                $rsoc='TrayecLaboralRazonSocial'.$indiceActual.'Valor';
                $fecIn='TrayecLaboralIngreso'.$indiceActual.'Valor';
                $ultPuesto='TrayecLaboralTltimoPuesto'.$indiceActual.'Valor';
                $nomInform='TrayecLaboralnformo'.$indiceActual.'Valor';
                $puestInform='TrayecLaboralPuestoEvaluaDes'.$indiceActual.'Valor';
            }
            $NombreEmpresaValor=$trActual[$nombEmp];
            $RazonSocialValor=$trActual[$rsoc];
            $FechaIngresoValor=$trActual[$fecIn];
            $UltimoPuestoValor=$trActual[$ultPuesto];
            $NombreInformoValor=$trActual[$nomInform];
            $PuestoInformoValor=$trActual[$puestInform];
            $cantEmp = explode(',' , $indiceActual);
            for($i=0;$i<count($cantEmp);$i++){
                if($desempQueryS[0]->Desemp!=null){
                    $res=$res."refiere estar laborando en $NombreEmpresaValor/$RazonSocialValor, de $FechaIngresoValor a la fecha, ocupando el puesto de $UltimoPuestoValor. La referencia se corrobora con $NombreInformoValor, quien es $PuestoInformoValor, indica que el candidato ha tenido un desempeño $desemp .";
                }else{
                    $res=$res."refiere estar laborando en $NombreEmpresaValor/$RazonSocialValor, de $FechaIngresoValor a la fecha, ocupando el puesto de $UltimoPuestoValor. La referencia se corrobora con $NombreInformoValor, quien es $PuestoInformoValor.";
                }
            }
      }
      if($indiceAnterior!=null){

            $resultAnterior= DB::select("SELECT CONCAT('{',  GROUP_CONCAT( CONCAT(
                     CONCAT('|',IF(srve.Indice > 0 ,
                     CONCAT(mee.CampoNombre, srve.Indice) ,mee.CampoNombre),'Valor','|', ':'),  
                     CONCAT('|',CAST(IF(srve.ValorCargado IS NULL OR srve.ValorCargado = '', '', srve.ValorCargado) AS char),'|') ) ) order by srve.Indice,mee.orden),'}')as empleoE
            FROM master_ese_srv_entrada srve 
            inner join master_ese_entrada mee on mee.IdEntrada=srve.IdEntrada
            INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
            INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
            where srve.IdServicioEse=:IdServicioEse and c.Etiqueta = 'TRAYECTORIA LABORAL' and FIND_IN_SET(srve.Indice, :indice)
            order by srve.Indice,mee.orden",['IdServicioEse' => $IdServicioEse,'indice' => $indiceAnterior]);

            $resultAnterior=str_replace('|','"',$resultAnterior[0]->empleoE);
            $trAnterior=json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $resultAnterior), true);
            $cantEmp = explode(',' , $indiceAnterior);
            for($i=0;$i<count($cantEmp);$i++){

                $desempQueryS= DB::select("SELECT concat('{',
                    concat('|','Excelente','|',':','|',SUM(CASE WHEN srve.ValorCargado = 'Excelente' THEN 4 ELSE 0 END),'|',','),
                    concat('|','Bueno','|',':','|',SUM(CASE WHEN srve.ValorCargado = 'Bueno' THEN 3 ELSE 0 END),'|',','),
                    concat('|','Regular','|',':','|',SUM(CASE WHEN srve.ValorCargado = 'Regular' THEN 2 ELSE 0 END),'|',','),
                    concat('|','Malo','|',':','|',SUM(CASE WHEN srve.ValorCargado = 'Malo' THEN 1 ELSE 0 END),'|') ,'}') as Desemp
               from master_ese_srv_entrada srve 
               inner join master_ese_entrada mee on mee.IdEntrada = srve.IdEntrada
               where (mee.CampoNombre='TrayecLaboralCriHonradez' or mee.CampoNombre='TrayecLaboralCriCalidadTrabajo' 
               or mee.CampoNombre='TrayecLaboralCriRelacionSuperi' or mee.CampoNombre='TrayecLaboralCriRelacionCompan' 
               or mee.CampoNombre='TrayecLaboralCriProductividad' or mee.CampoNombre='TrayecLaboralCriIniciativa' 
               or mee.CampoNombre='TrayecLaboralCriPuntualidad' or mee.CampoNombre='TrayecLaboralCriResponsabilida') 
               and srve.IdServicioEse = :IdServicioEse and srve.Indice=:indice",['IdServicioEse' => $IdServicioEse,'indice' => $cantEmp[$i]]);

                if($desempQueryS[0]->Desemp!=null){
                    $desempQuery=str_replace('|','"',$desempQueryS[0]->Desemp);
                    $trDesemp=json_decode($desempQuery,true);
                    $cantD = max($trDesemp);
                    $desemp = array_search($cantD, $trDesemp);
                }
                if($cantEmp[$i]==0){
                    $nombEmp='TrayecLaboralNombreEmpresaValor';
                    $rsoc='TrayecLaboralRazonSocialValor';
                    $fecIn='TrayecLaboralIngresoValor';
                    $fecEg='TrayecLaboralEgresoValor';
                    $ultPuesto='TrayecLaboralTltimoPuestoValor';
                    $nomInform='TrayecLaboralnformoValor';
                    $puestInform='TrayecLaboralPuestoEvaluaDesValor';
                }else{
                    $nombEmp='TrayecLaboralNombreEmpresa'.$cantEmp[$i].'Valor';
                    $rsoc='TrayecLaboralRazonSocial'.$cantEmp[$i].'Valor';
                    $fecIn='TrayecLaboralIngreso'.$cantEmp[$i].'Valor';
                    $fecEg='TrayecLaboralEgreso'.$cantEmp[$i].'Valor';
                    $ultPuesto='TrayecLaboralTltimoPuesto'.$cantEmp[$i].'Valor';
                    $nomInform='TrayecLaboralnformo'.$cantEmp[$i].'Valor';
                    $puestInform='TrayecLaboralPuestoEvaluaDes'.$cantEmp[$i].'Valor';
                }
                $NombreEmpresaValor=$trAnterior[$nombEmp];
                $RazonSocialValor=$trAnterior[$rsoc];
                $FechaIngresoValor=$trAnterior[$fecIn];
                $FechaEgresoValor=$trAnterior[$fecEg];
                $UltimoPuestoValor=$trAnterior[$ultPuesto];
                $NombreInformoValor=$trAnterior[$nomInform];
                $PuestoInformoValor=$trAnterior[$puestInform];
                if($desempQueryS[0]->Desemp!=null){
                    if($cantEmp[$i]==0){
                        $resAnt=$resAnt."refiere haber laborado en $NombreEmpresaValor/$RazonSocialValor, de $FechaIngresoValor a $FechaEgresoValor, ocupando el puesto de $UltimoPuestoValor. La referencia se corrobora con $NombreInformoValor, quien es $PuestoInformoValor, indica que el candidato ha tenido un desempeño $desemp .";
                    }
                    else{
                        $resAnt=$resAnt." Anterior a este laboró para $NombreEmpresaValor/$RazonSocialValor de $FechaIngresoValor a $FechaEgresoValor, ocupando el puesto de $UltimoPuestoValor. La referencia se corrobora con $NombreInformoValor, quien es $PuestoInformoValor, indica que el candidato ha tenido un desempeño $desemp. ";
                    }
                }
                else{
                    if($cantEmp[$i]==0){
                        $resAnt=$resAnt."refiere haber laborado en $NombreEmpresaValor/$RazonSocialValor, de $FechaIngresoValor a $FechaEgresoValor, ocupando el puesto de $UltimoPuestoValor. La referencia se corrobora con $NombreInformoValor, quien es $PuestoInformoValor.";
                    }else{
                        $resAnt=$resAnt." Anterior a este laboró para $NombreEmpresaValor/$RazonSocialValor de $FechaIngresoValor a $FechaEgresoValor, ocupando el puesto de $UltimoPuestoValor. La referencia se corrobora con $NombreInformoValor, quien es $PuestoInformoValor. ";   
                    }
                }
            }
      }

      $dictamen = DB::select("SELECT Apto from master_ese_srv_dictamen_eval where IdServicioEse=$IdServicioEse");

      $egresosS = DB::select("SELECT sum(srve.ValorCargado) as Egresos from master_ese_srv_entrada srve inner join master_ese_entrada mee on mee.IdEntrada = srve.IdEntrada where (mee.CampoNombre='SitEcoEgreMenAlimentacion' or mee.CampoNombre='SitEcoEgreMenServicios' or mee.CampoNombre='SitEcoEgreMenTipoMonto' or mee.CampoNombre='SitEcoEgreMenCreditos' or mee.CampoNombre='SitEcoEgreMenGastos' or mee.CampoNombre='SitEcoEgreMenDiversiones' or mee.CampoNombre='SitEcoEgreMenOtros') and srve.IdServicioEse = $IdServicioEse");

      $ingresosS = DB::select("SELECT sum(srve.ValorCargado) as Ingresos from master_ese_srv_entrada srve inner join master_ese_entrada mee on mee.IdEntrada = srve.IdEntrada where (mee.CampoNombre='SitEcoIngMenMonto' or mee.CampoNombre='SitEcoIngMenMonto1' or mee.CampoNombre='SitEcoIngMenMonto2' or mee.CampoNombre='SitEcoIngMenMonto3' or mee.CampoNombre='SitEcoIngMenMonto4' or mee.CampoNombre='SitEcoIngMenMonto5') and srve.IdServicioEse = $IdServicioEse");

      $egresos=$egresosS[0]->Egresos;
      $ingresos=$ingresosS[0]->Ingresos;
      if($egresos>$ingresos){
        $totalIngresos='insuficientes';
      }else{
        $totalIngresos='suficientes';
      }
      if(!empty($dictamen)){
        $dict=$dictamen[0]->Apto;
      }else{
        $dict="";
      }

        $sqlMod = DB::select("select IdModalidad from master_ese_srv_servicio where IdServicioEse = $IdServicioEse");

        foreach ($sqlMod as $mpt) {
            $ValMod=$mpt->IdModalidad;
        }
      return array("data" => (count($result) > 0)?$result[0]->resultJson:$result,"EmpleoActual"=>$res,"EmpleoAnterior"=>$resAnt,"Dictamen"=>$dict,"TotalIngresos"=>$totalIngresos,"grupos"=>$grupos,"IdMod"=>$ValMod);
    }

//---------------------------------------------

    public function replaceSpecialCharacters($text){
        $lettersSpecial = array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä','é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë','í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î','ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô','ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü','ñ', 'Ñ', 'ç', 'Ç');
        $lettersNormal = array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A','e', 'e', 'e', 'e', 'E', 'E', 'E', 'E','i', 'i', 'i', 'i', 'I', 'I', 'I', 'I','o', 'o', 'o', 'o', 'O', 'O', 'O', 'O','u', 'u', 'u', 'u', 'U', 'U', 'U', 'U','n', 'N', 'c', 'C');
        $specialCharacters = array("\\", "-","#", "@", "|", "!", "\"","·", "$", "%", "&", "/","(", ")", "?", "'", "¡","¿", "[", "^", "]","+", "}", "{", "¨", "´",">", "< ", ";", ",", ":",".", " ");
        $Characters = "";
        $text = str_replace($lettersSpecial,$lettersNormal,$text);
        $text = str_replace($specialCharacters,$Characters,$text);
        return $text;
    }

    public function replaceAccents($text){
        $lettersSpecial = array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä','é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë','í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î','ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô','ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü','ñ', 'Ñ', 'ç', 'Ç');
        $lettersNormal = array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A','e', 'e', 'e', 'e', 'E', 'E', 'E', 'E','i', 'i', 'i', 'i', 'I', 'I', 'I', 'I','o', 'o', 'o', 'o', 'O', 'O', 'O', 'O','u', 'u', 'u', 'u', 'U', 'U', 'U', 'U','n', 'N', 'c', 'C');
        $Characters = "";
        $text = str_replace($lettersSpecial,$lettersNormal,$text);
        return $text;
    }

    public function getFiles($IdServicioEseEntrada,$IdServicioEse){
        try {
            $base64 = DB::select("SELECT  mese.ValorCargado
                                FROM master_ese_srv_entrada mese
                                WHERE mese.IdServicioEseEntrada = ?
                                AND mese.IdServicioEse = ? ",  [$IdServicioEseEntrada,$IdServicioEse] );

            $base64 = $base64[0]->ValorCargado;
            return response()->json(array("status" => "success","data"=>$base64));
        } catch (\Exception $e) {
            return response()->json(array("status" => "error","message" =>$e->getMessage()));
        }
    }

    public function deleteFiles($IdServicioEseEntrada,$IdServicioEse){
        try {

            DB::update("update master_ese_srv_entrada set ValorCargado = '' WHERE IdServicioEseEntrada = ? AND IdServicioEse = ?", [$IdServicioEseEntrada,$IdServicioEse]);

            return response()->json(array("status" => "success"));
        } catch (\Exception $e) {
            return response()->json(array("status" => "error","message"=>$e->getMessage()));
        }
    }

    public function ESEvencimiento(Request $request){

            $PrevioInicio= DB::select("SELECT CASE  WHEN TIMESTAMPDIFF(DAY, CURDATE(),FE.FechaEjecucion) =1 THEN 'PREVIO INICIO' 
            WHEN TIMESTAMPDIFF(DAY, CURDATE(),FE.FechaEjecucion) >1 THEN 'PROXIMA'
            ELSE 'VENCIDA' END as Resultado,FE.* FROM master_ese_srv_programacion FE HAVING Resultado='PREVIO INICIO'");

            $sql = DB::select("select * from master_ese_srv_asignacion where IdServicioEse = ".$PrevioInicio[0]->IdServicioEse);

            foreach ($sql as $g) {
                $IdAnalista=$g->IdAnalista;
                $IdInvestigador=$g->IdInvestigador;
            }
            if(!empty($PrevioInicio)){
                $ntf = new Notificaciones();
                foreach($PrevioInicio as $p){
                    $ntf->notificaUsuarios($p->IdServicioEse,'ANALISTA-TIEMPOPREVIO','Analista',$IdAnalista);
                    $ntf->notificaUsuarios($p->IdServicioEse,'CANDIDATO-TIEMPOPREVIO','Candidato',null);
                    $IdUSer = DB::select("select id from users where IdEmpleado = $IdInvestigador");
                    $ntf->notificaUsuarios($p->IdServicioEse,'INV-TIEMPOPREVIO','Investigador',$IdUSer[0]->id);
                } 
            }

            $PorvencerNormal= DB::select("SELECT CASE WHEN TIMESTAMPDIFF(DAY, CURDATE(),FE.FechaEjecucion) =4 
            THEN 'POR VENCER' END as Resultado,FE.* ,MP.Descripcion as Prioridad 
            FROM master_ese_srv_programacion FE 
            INNER JOIN master_ese_srv_servicio MS on MS.IdServicioEse=FE.IdServicioEse
            INNER JOIN master_ese_prioridades MP on MP.IdPrioridad = MS.IdPrioridad
            HAVING Resultado='POR VENCER' AND Prioridad='Normal'");

            if(!empty($PorvencerNormal)){
                $ntf = new Notificaciones();
                foreach($PorvencerNormal as $p){
                    $ntf->notificaUsuarios($p->IdServicioEse,'LIDER-PORVENCER','Lider',null);
                    $ntf->notificaUsuarios($p->IdServicioEse,'ANALISTA-PORVENCER','Analista',null);
                } 
            }

            $PorvencerUrgente= DB::select("SELECT CASE  WHEN TIMESTAMPDIFF(DAY, CURDATE(),FE.FechaEjecucion) =2 
            THEN 'POR VENCER'END as Resultado,FE.* ,MP.Descripcion as Prioridad 
            FROM master_ese_srv_programacion FE 
            INNER JOIN master_ese_srv_servicio MS on MS.IdServicioEse=FE.IdServicioEse
            INNER JOIN master_ese_prioridades MP on MP.IdPrioridad = MS.IdPrioridad
            HAVING Resultado='POR VENCER' AND Prioridad='Urgente'");

            if(!empty($PorvencerUrgente)){
                $ntf = new Notificaciones();
                foreach($PorvencerUrgente as $p){
                    $ntf->notificaUsuarios($p->IdServicioEse,'LIDER-PORVENCER','Lider',null);
                    $ntf->notificaUsuarios($p->IdServicioEse,'ANALISTA-PORVENCER','Analista',null);
                } 
            }

            $DesfaceNormal= DB::select("SELECT CASE WHEN TIMESTAMPDIFF(DAY,FE.FechaEjecucion,CURDATE()) =6 
            THEN 'DESFACE' END as Resultado,FE.* ,MP.Descripcion as Prioridad 
            FROM master_ese_srv_programacion FE 
            INNER JOIN master_ese_srv_servicio MS on MS.IdServicioEse=FE.IdServicioEse
            INNER JOIN master_ese_prioridades MP on MP.IdPrioridad = MS.IdPrioridad
            HAVING Resultado='DESFACE' AND Prioridad='Normal'");

            if(!empty($DesfaceNormal)){
                $ntf = new Notificaciones();
                foreach($DesfaceNormal as $p){
                    $ntf->notificaUsuarios($p->IdServicioEse,'LIDER-DESFACE','Lider',null);
                    $ntf->notificaUsuarios($p->IdServicioEse,'ANALISTA-DESFACE','Analista',$IdAnalista);
                } 
            }

            $DesfaceUrgente= DB::select("SELECT CASE WHEN TIMESTAMPDIFF(DAY,FE.FechaEjecucion,CURDATE()) =4 
            THEN 'DESFACE' END as Resultado,FE.* ,MP.Descripcion as Prioridad 
            FROM master_ese_srv_programacion FE 
            INNER JOIN master_ese_srv_servicio MS on MS.IdServicioEse=FE.IdServicioEse
            INNER JOIN master_ese_prioridades MP on MP.IdPrioridad = MS.IdPrioridad
            HAVING Resultado='DESFACE' AND Prioridad='Urgente'");

            if(!empty($DesfaceUrgente)){
                $ntf = new Notificaciones();
                foreach($DesfaceUrgente as $p){
                    $ntf->notificaUsuarios($p->IdServicioEse,'LIDER-DESFACE','Lider',null);
                    $ntf->notificaUsuarios($p->IdServicioEse,'ANALISTA-DESFACE','Analista',$IdAnalista);
                } 
            }
            return array('Notificaciones enviadas.');
    }

    public function ConfirmacionAnalista(Request $request){
        try{

            
 
            
            


                $IdServicioEse = $request->IdServicioEse;
              
                $candidato = MasterConsultas::exeSQL("get_info_cadidate_send_email","READONLY",array("paramIdServicioEse" => $IdServicioEse));
                $sql = DB::select("select * from master_ese_srv_asignacion where IdServicioEse = ".$IdServicioEse);
                foreach ($sql as $g) {

                    $IdAnalista=$g->IdAnalista;

                    $IdLider=$g->IdLider;

                    $IdAnalistaSec=$g->IdAnalistaSec;

                    $IdInvestigador= $g->IdInvestigador;
                }
                $clt = DB::select("select u.id from users u inner join master_ese_srv_servicio ms on u.IdCliente=ms.IdCliente where IdServicioEse = $IdServicioEse");
                $IdUSer = DB::select("select id from users where IdEmpleado = $IdInvestigador");
                $ntf = new Notificaciones();
                //$ntf->notificaUsuarios($IdServicioEse,'LIDER-CONFIRMACIONAN','Lider',$IdLider);
                $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-CONFIRMACIONAN','Analista',$IdAnalista);
                if($IdAnalistaSec != null && $IdAnalistaSec != 2)
                    $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-SEC-CONFIRMACIONAN','AnalistaSec',$IdAnalistaSec);
                //$ntf->notificaUsuarios($IdServicioEse,'CLIENTE-CONFIRMACIONAN','Cliente',$clt[0]->id);
                //if($IdInvestigador != null && $IdInvestigador != 1 )
                //$ntf->notificaUsuarios($IdServicioEse,'INV-CONFIRMACIONINV','Investigador',$IdUSer[0]->id);

                //if($candidato[0]->email != null)
                //$ntf->notificaUsuarios($IdServicioEse,'CANDIDATO-CONFIRMACIONAN','Candidato',null);
                return response()->json(array(
                    'status_alta' => 'success'
                ));
        }catch(\Exception $e){
            return response()->json(array(
                'status_alta' => 'error'
            ));
        }
    }

    public function ConfirmacionInvestigador(Request $request){
        try{
                $IdServicioEse = $request->IdServicioEse;
                $sql = DB::select("select * from master_ese_srv_asignacion where IdServicioEse = $IdServicioEse");
                foreach ($sql as $g) {
                    $IdAnalista=$g->IdAnalista;
                    $IdLider=$g->IdLider;
                    $IdInvestigador= $g->IdInvestigador;
                }
                $IdUSer = DB::select("select id from users where IdEmpleado = $IdInvestigador");
                $ntf = new Notificaciones();
                $ntf->notificaUsuarios($IdServicioEse,'LIDER-CONFIRMACIONINV','Lider',$IdLider);
                $ntf->notificaUsuarios($IdServicioEse,'ANALISTA-CONFIRMACIONINV','Analista',$IdAnalista);
                $ntf->notificaUsuarios($IdServicioEse,'INV-CONFIRMACIONINV','Investigador',$IdUSer[0]->id);
                return response()->json(array(
                    'status_alta' => 'success'
                ));
        }catch(\Exception $e){
            return response()->json(array(
                'status_alta' => 'error'
            ));
        }
    }

    public function saveResetValueInput(Request $request){
        try {
            $objects = $request->input("allInputs");
            $IdServicioEse = $request->input("IdServicioEse");
            $InputIgnore = $request->input("InputIgnore");
            foreach ($objects as $object) {
                if($object['name'] != '' && $object['type'] != 'image' && $object['type'] != 'file'){
                    if($object['name'] != $InputIgnore){
                        DB::update("update master_ese_srv_entrada set ValorCargado = '' WHERE IdServicioEseEntrada = ? AND IdServicioEse = ?", [$object['name'],$IdServicioEse]);
                    }
                }
            }  
            return response()->json(array("status" => "success"));
        } catch (\Exception $e) {
            return response()->json(array("status" => "error", "error" => $e->getMessage()));
        }
    }
}
<?php

namespace app\Bussines;

use App\Bussines\MasterConsultas;

use DB;
use Illuminate\Support\Facades\Auth;
use Twilio\TwiML\Voice\Client;

class Dashboard

{


    public function Filtros($IdCliente, $IdAnalista, $IdInvestigador, $IdModalidad, $Datein, $Dateend)
    {

        $totalestatus_proces = "SELECT DISTINCT ms1.Estatus, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		  WHERE ms.Estatus = ms1.Estatus";

        //Ya no ocupa ninguna correccion
        $totalservicioss = "SELECT COUNT(ms.IdServicioEse) AS TotalServicios
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse";
        //Ya no ocupa ninguna correccion
        $cliente = "SELECT DISTINCT c.id as IdCliente , c.nombre_comercial AS Nombre
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse";
        //Ya no ocupa ninguna correccion
        $investigador = 'SELECT DISTINCT sa.IdInvestigador AS IdEmpleado, 
        (SELECT 
            CONCAT(IFNULL(e.Nombre,"")," ",IFNULL(e.SegundoNombre,"")," ",IFNULL(e.ApellidoMaterno,"")," ",IFNULL(e.ApellidoPaterno,""))
        FROM master_ese_empleado e where e.IdEmpleado = sa.IdInvestigador 
        ) as NombreCompleto
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
        ';

        //Ya no ocupa ninguna correccion
        $analis = 'SELECT DISTINCT sa.IdAnalista AS IdEmpleado, 
        (SELECT 
            CONCAT(IFNULL(us.name,"")," ", IFNULL(us.apellido_paterno,""), " ",IFNULL(us.apellido_materno,""))
         FROM users us WHERE id = sa.IdAnalista)
         as NombreCompleto
            FROM users u
            INNER JOIN clientes c ON c.id = u.IdCliente
            INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
            INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
            INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
            INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
            INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
            INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
            INNER JOIN centros_negocio cn ON cn.id = u.idcn
            INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
            INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
            INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse';

        $tiposs = "SELECT tp1.*, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		  WHERE tp1.IdTipos = mt.IdTipos";

        $totalporserviciosss = "SELECT mtip.*, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		WHERE mts.IdTipoServicio = mtip.IdTipoServicio";

        $prioridad = "SELECT p1.Descripcion, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		  WHERE p1.IdPrioridad = mp.IdPrioridad ";

        $modalidad = "SELECT mm1.Descripcion, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		  WHERE mm.IdModalidad = mm1.idmodalidad  ";

        $dicta = "SELECT DISTINCT inv.Estatus, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
        INNER JOIN master_ese_srv_dictamen_inv inv1 ON inv1.IdServicioEse = ms.IdServicioEse
		  WHERE inv1.Estatus = inv.Estatus";

        $dataRespuestaAgend = "SELECT (DATEDIFF(po.FechaEjecucion,ms.FechaCreacion)) as desface
        FROM users u
     INNER JOIN clientes c ON c.id = u.IdCliente
     INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
      INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
     INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
     INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
     INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
     INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
     INNER JOIN centros_negocio cn ON cn.id = u.idcn
     INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
     INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
     INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
     INNER JOIN master_ese_srv_programacion po ON po.IdServicioEse = ms.IdServicioEse
      ";

        $dataRespuestaIS = "     SELECT ms.IdServicioEse,(DATEDIFF(ms.FechaEjecucionFinal,po.FechaEjecucion)+1) as desface
      FROM users u
   INNER JOIN clientes c ON c.id = u.IdCliente
   INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
    INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
   INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
   INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
   INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
   INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
   INNER JOIN centros_negocio cn ON cn.id = u.idcn
   INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
   INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
   INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
   INNER JOIN master_ese_srv_programacion po ON po.IdServicioEse = ms.IdServicioEse";

        $TiempoRes = "SELECT mp.Tiempo,(DATEDIFF(ms.FechaCierre,ms.FechaCreacion)+1) as desface
    FROM users u
 INNER JOIN clientes c ON c.id = u.IdCliente
 INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
  INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
 INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
 INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
 INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
 INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
 INNER JOIN centros_negocio cn ON cn.id = u.idcn
 INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
 INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
 INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
 INNER JOIN master_ese_srv_programacion po ON po.IdServicioEse = ms.IdServicioEse";

        if ($IdCliente != 'NA') {
            $totalservicioss .= " where ms.idcliente = $IdCliente";
            $tiposs .= " AND ms.idcliente = $IdCliente";
            $totalporserviciosss .= " AND ms.idcliente = $IdCliente";
            $prioridad .= " AND ms.idcliente = $IdCliente";
            $cliente .= " where ms.idcliente = $IdCliente";
            $investigador .= " where ms.idcliente = $IdCliente";
            $analis .= " where ms.idcliente = $IdCliente";
            $modalidad .= " AND ms.idcliente = $IdCliente";
            $totalestatus_proces .= " AND ms.idcliente = $IdCliente";
            $dicta .= " AND ms.idcliente = $IdCliente";
            $dataRespuestaAgend .= " where ms.idcliente = $IdCliente";
            $dataRespuestaIS .= " where ms.idcliente = $IdCliente";
            $TiempoRes .= " where ms.idcliente = $IdCliente";
        }

        if ($IdCliente != 'NA' && $IdAnalista != 'NA') {
            $totalservicioss .= " AND sa.idanalista = $IdAnalista";
            $tiposs .= " AND sa.idanalista = $IdAnalista";
            $totalporserviciosss .= " AND sa.idanalista = $IdAnalista";
            $prioridad  .= " AND sa.idanalista = $IdAnalista";
            $cliente .= " AND sa.idanalista = $IdAnalista";
            $investigador .= " AND sa.idanalista = $IdAnalista";
            $analis .= " AND sa.idanalista = $IdAnalista";
            $modalidad .= " AND sa.idanalista = $IdAnalista";
            $totalestatus_proces .= " AND sa.idanalista = $IdAnalista";
            $dicta .= " AND sa.idanalista = $IdAnalista";
            $dataRespuestaAgend .= " AND sa.idanalista = $IdAnalista";
            $dataRespuestaIS .= " AND sa.idanalista = $IdAnalista";
            $TiempoRes .= " AND sa.idanalista = $IdAnalista";
        } elseif ($IdCliente == 'NA' && $IdAnalista != 'NA') {
            $totalservicioss .= " where sa.idanalista = $IdAnalista";
            $tiposs .= " AND sa.idanalista = $IdAnalista";
            $totalporserviciosss .= " AND sa.idanalista = $IdAnalista";
            $prioridad .= " AND sa.idanalista = $IdAnalista";
            $cliente .= " where sa.idanalista = $IdAnalista";
            $investigador .= " where sa.idanalista = $IdAnalista";
            $analis .= " where sa.idanalista = $IdAnalista";
            $modalidad .= " AND sa.idanalista = $IdAnalista";
            $totalestatus_proces .= " AND sa.idanalista = $IdAnalista";
            $dicta .= " AND sa.idanalista = $IdAnalista";
            $dataRespuestaAgend .= " where sa.idanalista = $IdAnalista";
            $dataRespuestaIS .= " where sa.idanalista = $IdAnalista";
            $TiempoRes .= " where sa.idanalista = $IdAnalista";
        }

        if (($IdCliente != 'NA' || $IdAnalista != 'NA') && $IdInvestigador != 'NA') {
            $totalservicioss .= " AND sa.idinvestigador = $IdInvestigador";
            $tiposs .= " AND sa.idinvestigador = $IdInvestigador";
            $totalporserviciosss .= " AND sa.idinvestigador = $IdInvestigador";
            $prioridad .= " AND sa.idinvestigador = $IdInvestigador";
            $cliente .= " AND sa.idinvestigador = $IdInvestigador";
            $investigador .= " AND sa.idinvestigador = $IdInvestigador";
            $analis .= " AND sa.idinvestigador = $IdInvestigador";
            $modalidad .= " AND sa.idinvestigador = $IdInvestigador";
            $totalestatus_proces .= " AND sa.idinvestigador = $IdInvestigador";
            $dicta .= " AND sa.idinvestigador = $IdInvestigador";
            $dataRespuestaAgend .= " AND sa.idinvestigador = $IdInvestigador";
            $dataRespuestaIS .= " AND sa.idinvestigador = $IdInvestigador";
            $TiempoRes .= " AND sa.idinvestigador = $IdInvestigador";
        } elseif ($IdCliente == 'NA' && $IdAnalista == 'NA' && $IdInvestigador != 'NA') {
            $totalservicioss .= " where sa.idinvestigador = $IdInvestigador";
            $tiposs .= " AND sa.idinvestigador = $IdInvestigador";
            $totalporserviciosss .= " AND sa.idinvestigador = $IdInvestigador";
            $prioridad .= " AND sa.idinvestigador = $IdInvestigador";
            $cliente .= " where sa.idinvestigador = $IdInvestigador";
            $investigador .= " where sa.idinvestigador = $IdInvestigador";
            $analis .= " where sa.idinvestigador = $IdInvestigador";
            $modalidad .= " AND sa.idinvestigador = $IdInvestigador";
            $totalestatus_proces .= " AND sa.idinvestigador = $IdInvestigador";
            $dicta .= " AND sa.idinvestigador = $IdInvestigador";
            $dataRespuestaAgend .= " where sa.idinvestigador = $IdInvestigador";
            $dataRespuestaIS .= " where sa.idinvestigador = $IdInvestigador";
            $TiempoRes .= " where sa.idinvestigador = $IdInvestigador";
        }

        if (($IdCliente != 'NA' || $IdAnalista != 'NA' || $IdInvestigador != 'NA') && $IdModalidad != 'NA') {
            $totalservicioss .= " AND ms.IdModalidad = $IdModalidad";
            $tiposs .= " AND ms.idmodalidad = $IdModalidad";
            $totalporserviciosss .= " AND ms.idmodalidad = $IdModalidad";
            $prioridad .= " AND ms.idmodalidad = $IdModalidad";
            $cliente .= " AND ms.idmodalidad = $IdModalidad";
            $investigador .= " AND ms.idmodalidad = $IdModalidad";
            $analis .= " AND ms.idmodalidad = $IdModalidad";
            $modalidad .= " AND ms.idmodalidad = $IdModalidad";
            $totalestatus_proces .= " AND ms.idmodalidad = $IdModalidad";
            $dicta .= " AND ms.idmodalidad = $IdModalidad";
            $dataRespuestaAgend .= " AND ms.idmodalidad = $IdModalidad";
            $dataRespuestaIS .= " AND ms.idmodalidad = $IdModalidad";
            $TiempoRes .= " AND ms.idmodalidad = $IdModalidad";

            
        } elseif ($IdCliente == 'NA' && $IdAnalista == 'NA' && $IdInvestigador == 'NA' && $IdModalidad != 'NA') {
            $totalservicioss .= " where ms.idmodalidad = $IdModalidad";
            $tiposs .= " AND ms.idmodalidad = $IdModalidad";
            $totalporserviciosss .= " AND ms.idmodalidad = $IdModalidad";
            $prioridad .= " AND ms.idmodalidad = $IdModalidad";
            $cliente .= " where ms.idmodalidad = $IdModalidad";
            $investigador .= " where ms.idmodalidad = $IdModalidad";
            $analis .= " where ms.idmodalidad = $IdModalidad";
            $modalidad .= " AND ms.idmodalidad = $IdModalidad";
            $totalestatus_proces .= " AND ms.idmodalidad = $IdModalidad";
            $dicta .= " AND ms.idmodalidad = $IdModalidad";
            $dataRespuestaAgend .= " where ms.idmodalidad = $IdModalidad";
            $dataRespuestaIS .= " where ms.idmodalidad = $IdModalidad";
            $TiempoRes .= " where ms.idmodalidad = $IdModalidad";
        }

        if (($IdCliente != 'NA' || $IdAnalista != 'NA' || $IdInvestigador != 'NA' || $IdModalidad != 'NA') && $Datein != 0) {
            $totalservicioss .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $tiposs .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $totalporserviciosss .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $prioridad .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $cliente .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $investigador .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $analis .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $modalidad .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $totalestatus_proces .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $dicta .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $dataRespuestaAgend .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $dataRespuestaIS .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $TiempoRes .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
        } elseif ($IdCliente == 'NA' && $IdAnalista == 'NA' && $IdInvestigador == 'NA' && $IdModalidad == 'NA' && $Datein != 0) {
            $totalservicioss .= " where CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $tiposs .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $totalporserviciosss .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $prioridad .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $cliente .= " where CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $investigador .= " where CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $analis .= " where CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $modalidad .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $totalestatus_proces .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $dicta .= " AND CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $dataRespuestaAgend .= " Where CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $dataRespuestaIS .= " where CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
            $TiempoRes .= " where CAST(ms.FechaCreacion AS DATE)>= '$Datein' AND CAST(ms.FechaCreacion AS DATE)<= '$Dateend'";
        }



        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
        
        }else{
            if ($IdCliente == 'NA' && $IdAnalista == 'NA' && $IdInvestigador == 'NA' && $IdModalidad == 'NA' && $Datein == 0) {
                if(Auth::user()->tipo == "s"){
                    $cliente .=" where c.id_cn = ".Auth::user()->idcn;
                    $analis .=" where c.id_cn = ".Auth::user()->idcn;
                    $investigador .=" where c.id_cn = ".Auth::user()->idcn;
                    $modalidad .= " AND c.id_cn = ".Auth::user()->idcn;
                    $prioridad .= " AND c.id_cn = ".Auth::user()->idcn;
                    $tiposs .= " AND c.id_cn = ".Auth::user()->idcn;
                    $totalporserviciosss .= " AND c.id_cn = ".Auth::user()->idcn;
                    $totalestatus_proces .= " AND c.id_cn = ".Auth::user()->idcn;
                    $dicta .= " AND c.id_cn = ".Auth::user()->idcn;
                    $totalservicioss  .= " where c.id_cn = ".Auth::user()->idcn;
                }
            }elseif($IdCliente == 'NA' && $IdAnalista == 'NA' && $IdInvestigador == 'NA' && $IdModalidad == 'NA' && $Datein != 0){
                if(Auth::user()->tipo == "s"){
                    $cliente .=" AND c.id_cn = ".Auth::user()->idcn;
                    $analis .=" AND c.id_cn = ".Auth::user()->idcn;
                    $investigador .=" AND c.id_cn = ".Auth::user()->idcn;
                    $modalidad .= " AND c.id_cn = ".Auth::user()->idcn;
                    $prioridad .= " AND c.id_cn = ".Auth::user()->idcn;
                    $tiposs .= " AND c.id_cn = ".Auth::user()->idcn;
                    $totalporserviciosss .= " AND c.id_cn = ".Auth::user()->idcn;
                    $totalestatus_proces .= " AND c.id_cn = ".Auth::user()->idcn;
                    $dicta .= " AND c.id_cn = ".Auth::user()->idcn;
                    $totalservicioss  .= " AND c.id_cn = ".Auth::user()->idcn;
                }
            }
        }

        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
        
        }else{
            if ($IdCliente == 'NA' && $IdAnalista == 'NA' && $IdInvestigador == 'NA' && $IdModalidad != 'NA') {
                if(Auth::user()->tipo == "s"){
                    $cliente .=" AND c.id_cn = ".Auth::user()->idcn;
                    $analis .=" AND c.id_cn = ".Auth::user()->idcn;
                    $investigador .=" AND c.id_cn = ".Auth::user()->idcn;
                    $modalidad .= " AND c.id_cn = ".Auth::user()->idcn;
                    $prioridad .= " AND c.id_cn = ".Auth::user()->idcn;
                    $tiposs .= " AND c.id_cn = ".Auth::user()->idcn;
                    $totalporserviciosss .= " AND c.id_cn = ".Auth::user()->idcn;
                    $totalestatus_proces .= " AND c.id_cn = ".Auth::user()->idcn;
                    $dicta .= " AND c.id_cn = ".Auth::user()->idcn;
                    $totalservicioss  .= " AND c.id_cn = ".Auth::user()->idcn;
                }
            }
        }

        $modalidad .= ") as Total
        FROM master_ese_modalidad mm1";
        $prioridad .= ") as Total
        FROM master_ese_prioridades p1";
        $tiposs .= ") as Total
        FROM master_ese_tipos tp1";
        $totalporserviciosss .= " ) as Total
        FROM master_ese_tiposervicio mtip";
        $totalestatus_proces .= ") as Total
        FROM master_ese_srv_servicio ms1	";
        $dicta .= " ) as Total
        FROM master_ese_srv_dictamen_inv inv order by inv.estatus desc";

        $estatus_proceso = DB::select("SELECT DISTINCT mo.Estatus
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse");

        $dictamen = DB::select($dicta);
        $totalestatus_proceso = DB::select($totalestatus_proces);
        $totalservicios = DB::select($totalservicioss);
        $tipos = DB::select($tiposs);
        $totalporservicio = DB::select($totalporserviciosss);
        $prioridadservicios = DB::select($prioridad);
        $modalidadservicios = DB::select($modalidad);
        $clientes = DB::select($cliente);
        $investigadores = DB::select($investigador);
        $analistas = DB::select($analis);
        $dataRespuestaAgenda = DB::select($dataRespuestaAgend);
        $dataRespuestaISL = DB::select($dataRespuestaIS);
        $dataTR = DB::select($TiempoRes);
        foreach ($totalservicios as $tsrv) {

            $Totalservicio = $tsrv->TotalServicios;
        }

        $respuestaAgenda = $this->ResponseTime($dataRespuestaAgenda);

        $respuestaISL = $this->ResponseTime2($dataRespuestaISL);

        $TiempoRespuesta = $this->ResponseTime3($dataTR);

        return [
            "TiempoRespuesta" => $TiempoRespuesta,
            "respuestaISL" => $respuestaISL,
            "respuestaAgenda" => $respuestaAgenda,
            "dictamen" => $dictamen,
            "totalestatus_proceso" => $totalestatus_proceso,
            "estatus_proceso" => $estatus_proceso,
            "analistas" => $analistas,
            "investigadores" => $investigadores,
            "clientes" => $clientes,
            "Totalservicio" => $Totalservicio,
            "tipos" => $tipos,
            "totalporservicio" => $totalporservicio,
            "prioridadservicios" => $prioridadservicios,
            "modalidadservicios" => $modalidadservicios
        ];
    }

    public function initDataDashboard()

    {
        $log =DB::select(
            "SELECT logo as logo from master_ese_logo"
        );

        $logo = "";
        foreach ($log as $l){
            $logo = $l->logo;
        }

        $clientesFiltr = "SELECT DISTINCT c.id, c.nombre_comercial 
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse";

        $analistaFiltr = 'SELECT DISTINCT sa.IdAnalista AS id, 
        (SELECT 
            CONCAT(IFNULL(us.name,"")," ", IFNULL(us.apellido_paterno,""), " ",IFNULL(us.apellido_materno,""))
         FROM users us WHERE id = sa.IdAnalista)
         as nombre
            FROM users u
            INNER JOIN clientes c ON c.id = u.IdCliente
            INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
            INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
            INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
            INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
            INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
            INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
            INNER JOIN centros_negocio cn ON cn.id = u.idcn
            INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
            INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
            INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse';

        $investigadorFiltr = 'SELECT DISTINCT sa.IdInvestigador AS IdEmpleado, 
        (SELECT 
            CONCAT(IFNULL(e.Nombre,"")," ",IFNULL(e.SegundoNombre,"")," ",IFNULL(e.ApellidoPaterno,"")," ",IFNULL(e.ApellidoMaterno,""))
        FROM master_ese_empleado e where e.IdEmpleado = sa.IdInvestigador 
        ) as nombre
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse';

        $modalidadFiltro = DB::select("SELECT DISTINCT m.IdModalidad,m.Descripcion FROM master_ese_modalidad AS m
        INNER Join master_ese_srv_servicio ms ON ms.IdModalidad = m.IdModalidad
        order BY m.IdModalidad ASC;");

        if (Auth::user()->tipo == 'c') {
            $analistaFiltr .= " where c.id = " . Auth::user()->IdCliente;
            $investigadorFiltr .= " where c.id = " . Auth::user()->IdCliente;
        }

        
        $totalestatus_proces = "SELECT DISTINCT ms1.Estatus, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		  WHERE ms.Estatus = ms1.Estatus";

        //Ya no ocupa ninguna correccion
        $totalservicioss = "SELECT COUNT(ms.IdServicioEse) AS TotalServicios
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse";
        //Ya no ocupa ninguna correccion
        $cliente = "SELECT DISTINCT c.id as IdCliente , c.nombre_comercial AS Nombre
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse";
        //Ya no ocupa ninguna correccion
        $investigador = 'SELECT DISTINCT sa.IdInvestigador AS IdEmpleado, 
        (SELECT 
            CONCAT(IFNULL(e.Nombre,"")," ",IFNULL(e.SegundoNombre,"")," ",IFNULL(e.ApellidoPaterno,"")," ",IFNULL(e.ApellidoMaterno,""))
        FROM master_ese_empleado e where e.IdEmpleado = sa.IdInvestigador 
        ) as NombreCompleto
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
        ';

        //Ya no ocupa ninguna correccion
        $analis = 'SELECT DISTINCT sa.IdAnalista AS IdEmpleado, 
        (SELECT 
            CONCAT(IFNULL(us.name,"")," ", IFNULL(us.apellido_paterno,""), " ",IFNULL(us.apellido_materno,""))
         FROM users us WHERE id = sa.IdAnalista)
         as NombreCompleto
            FROM users u
            INNER JOIN clientes c ON c.id = u.IdCliente
            INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
            INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
            INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
            INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
            INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
            INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
            INNER JOIN centros_negocio cn ON cn.id = u.idcn
            INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
            INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
            INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse';

        $tiposs = "SELECT tp1.*, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		  WHERE tp1.IdTipos = mt.IdTipos";

        $totalporserviciosss = "SELECT mtip.*, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		WHERE mts.IdTipoServicio = mtip.IdTipoServicio";

        $prioridad = "SELECT p1.Descripcion, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		  WHERE p1.IdPrioridad = mp.IdPrioridad ";

        $modalidad = "SELECT mm1.Descripcion, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		  WHERE mm.IdModalidad = mm1.idmodalidad  ";

        $dicta = "SELECT DISTINCT inv.Estatus, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
        INNER JOIN master_ese_srv_dictamen_inv inv1 ON inv1.IdServicioEse = ms.IdServicioEse
		  WHERE inv1.Estatus = inv.Estatus";


        if (Auth::user()->tipo == "c") {
            $modalidad .= " AND c.id = " . Auth::user()->IdCliente;
            $prioridad .= " AND c.id = " . Auth::user()->IdCliente;
            $tiposs .= " AND c.id = " . Auth::user()->IdCliente;
            $totalporserviciosss .= " AND c.id = " . Auth::user()->IdCliente;
            $totalestatus_proces .= " AND c.id = " . Auth::user()->IdCliente;
            $dicta .= " AND c.id = " . Auth::user()->IdCliente;
            $cliente .= " Where c.id = " . Auth::user()->IdCliente;
            $analis .= " where c.id = " . Auth::user()->IdCliente;
            $investigador .= " where c.id = " . Auth::user()->IdCliente;
            $totalservicioss  .= " where c.id = " . Auth::user()->IdCliente;
        }
        
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
        
        }else{
            if(Auth::user()->tipo == "s"){
                $clientesFiltr .=" where c.id_cn = ".Auth::user()->idcn;
                $analistaFiltr .=" where c.id_cn = ".Auth::user()->idcn;
                $investigadorFiltr .=" where c.id_cn = ".Auth::user()->idcn;
                $cliente .=" where c.id_cn = ".Auth::user()->idcn;
                $analis .=" where c.id_cn = ".Auth::user()->idcn;
                $investigador .=" where c.id_cn = ".Auth::user()->idcn;

                $modalidad .= " AND c.id_cn = ".Auth::user()->idcn;
                $prioridad .= " AND c.id_cn = ".Auth::user()->idcn;
                $tiposs .= " AND c.id_cn = ".Auth::user()->idcn;
                $totalporserviciosss .= " AND c.id_cn = ".Auth::user()->idcn;
                $totalestatus_proces .= " AND c.id_cn = ".Auth::user()->idcn;
                $dicta .= " AND c.id_cn = ".Auth::user()->idcn;
                $totalservicioss  .= " where c.id_cn = ".Auth::user()->idcn;
            }
        }

        $modalidad .= ") as Total
        FROM master_ese_modalidad mm1";
        $prioridad .= ") as Total
        FROM master_ese_prioridades p1";
        $tiposs .= ") as Total
        FROM master_ese_tipos tp1";
        $totalporserviciosss .= " ) as Total
        FROM master_ese_tiposervicio mtip";
        $totalestatus_proces .= ") as Total
        FROM master_ese_srv_servicio ms1";
        $dicta .= " ) as Total
        FROM master_ese_srv_dictamen_inv inv";

        $estatus_proceso = DB::select("SELECT DISTINCT mo.Estatus
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse");


        $analistaFiltro =  DB::select($analistaFiltr);
        $investigadorFiltro =  DB::select($investigadorFiltr);
        $clientesFiltro = DB::select($clientesFiltr);
        $date_now = date('Y-m-d'); //Datos que nos da le fecha actual
        $totalservicios = DB::select($totalservicioss);
        $tipos = DB::select($tiposs);
        $totalporservicio = DB::select($totalporserviciosss);
        $prioridadservicios = DB::select($prioridad);
        $modalidadservicios = DB::select($modalidad);
        $clientes = DB::select($cliente);
        $investigadores = DB::select($investigador);
        $analistas = DB::select($analis);
        foreach ($totalservicios as $tsrv) {

            $Totalservicio = $tsrv->TotalServicios;
        }

        $tiposClientes = MasterConsultas::exeSQL("filter_tipoclient", "READONLY", array("IdCliente" => -1));

        return [
            "logo"=>$logo,
            "clientesFiltro" => $clientesFiltro,
            "analistaFiltro" => $analistaFiltro,
            "investigadorFiltro" => $investigadorFiltro,
            "modalidadFiltro" => $modalidadFiltro,
            "tiposClientes" => $tiposClientes,
            "clientes" => $clientes,
            "estatus_proceso" => $estatus_proceso,
            "investigadores" => $investigadores,
            "analistas" => $analistas,
            "Totalservicio" => $Totalservicio,
            "totalporservicio" => $totalporservicio,
            "prioridadservicios" => $prioridadservicios,
            "modalidadservicios" => $modalidadservicios,
            "tipos" => $tipos,
            "date_now" => $date_now
        ];
    }

    public function GetDataDashboardByClient($IdCliente, $Dateini, $Dateend)

    {

        $estatus_proceso = MasterConsultas::exeSQL(
            "dashboard_estatus",
            "READONLY",

            array(
                "IdServicioOS" => -1,

                "IdCliente" => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $investigadores = MasterConsultas::exeSQL(
            "filter_investigator_by_client",
            "READONLY",

            array(
                'IdCliente' => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $analistas = MasterConsultas::exeSQL(
            "filter_analist_by_client",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $tiposClientes = MasterConsultas::exeSQL("filter_tipoclient", "READONLY", array("IdCliente" => $IdCliente));

        $totalservicios = MasterConsultas::exeSQL(
            "total_servicios",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        foreach ($totalservicios as $tsrv) {

            $Totalservicio = $tsrv->TotalServicios;
        }

        $tipos = MasterConsultas::exeSQL(
            "total_tipos",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        //charts

        $totalporservicio = MasterConsultas::exeSQL(
            "total_tipos_servicios",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $prioridadservicios = MasterConsultas::exeSQL(
            "total_prioridad",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $modalidadservicios = MasterConsultas::exeSQL(
            "total_modalidad",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $totalestatus_proceso = MasterConsultas::exeSQL(
            "dashboard_estatus_del_proceso",
            "READONLY",

            array(
                "IdServicioOS" => -1,

                "IdCliente" => $IdCliente,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );

        $dictamen = MasterConsultas::exeSQL(
            "dashboard_dictamen",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $dictamenIncidencias = MasterConsultas::exeSQL(
            "dashboard_dictamen_incidencias",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $facturacionglobal = MasterConsultas::exeSQL(
            "dashboard_facturacion_global",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );

        $facturacion_x_servicios = MasterConsultas::exeSQL(
            "dashboard_facturacion_x_servicios",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );



        $dataRespuestaAgenda = MasterConsultas::exeSQL(
            "tiempo_respuesta_agenda",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $dataRespuestaISL = MasterConsultas::exeSQL(
            "tiempo_respuesta_ISL",
            "READONLY",

            array(
                "IdCliente" => $IdCliente,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $respuestaAgenda = $this->ResponseTime($dataRespuestaAgenda);

        $respuestaISL = $this->ResponseTime($dataRespuestaISL);

        return [

            "estatus_proceso" => $estatus_proceso,

            "investigadores" => $investigadores,

            "analistas" => $analistas,

            "tiposClientes" => $tiposClientes,

            "Totalservicio" => $Totalservicio,

            "totalporservicio" => $totalporservicio,

            "prioridadservicios" => $prioridadservicios,

            "modalidadservicios" => $modalidadservicios,

            "totalestatus_proceso" => $totalestatus_proceso,

            "dictamen" => $dictamen,

            "facturacionglobal" => $facturacionglobal,

            "facturacion_x_servicios" => $facturacion_x_servicios,

            "tipos" => $tipos,

            "dictamenIncidencias" => $dictamenIncidencias,

            "respuestaAgenda" => $respuestaAgenda,

            "respuestaISL" => $respuestaISL

        ];
    }

    public function GetDataChartDashboard($Id, $Dateini, $Dateend)

    {
        if (Auth::user()->tipo == "c") {
            $Id = Auth::user()->IdCliente;
            $Dateini = -1;
            $Dateend = -1;
        } else {
            $Id = $Id;
        }

        $totalservicios = MasterConsultas::exeSQL(
            "total_servicios",
            "READONLY",

            array(
                "IdCliente" => $Id,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => -1

            )
        );

        foreach ($totalservicios as $tsrv) {

            $Totalservicio = $tsrv->TotalServicios;
        }

        $totalporserviciosss = "SELECT mtip.*, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		WHERE mts.IdTipoServicio = mtip.IdTipoServicio";

$prioridad = "SELECT p1.Descripcion, (SELECT COUNT(ms.IdServicioEse)
FROM users u
INNER JOIN clientes c ON c.id = u.IdCliente
INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
INNER JOIN centros_negocio cn ON cn.id = u.idcn
INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
  WHERE p1.IdPrioridad = mp.IdPrioridad ";

$modalidad = "SELECT mm1.Descripcion, (SELECT COUNT(ms.IdServicioEse)
FROM users u
INNER JOIN clientes c ON c.id = u.IdCliente
INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
INNER JOIN centros_negocio cn ON cn.id = u.idcn
INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
  WHERE mm.IdModalidad = mm1.idmodalidad  ";        

        

     
        $totalestatus_proces =  "	SELECT DISTINCT ms1.Estatus, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
		  WHERE ms.Estatus = ms1.Estatus";


        $dataRespuestaAgend = "
        SELECT (DATEDIFF(po.FechaEjecucion,ms.FechaCreacion)+1) as desface
        FROM users u
            INNER JOIN clientes c ON c.id = u.IdCliente
            INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
            INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
            INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
            INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
            INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
            INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
            INNER JOIN centros_negocio cn ON cn.id = u.idcn
            INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
            INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
            INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
            INNER JOIN master_ese_srv_programacion po ON po.IdServicioEse = ms.IdServicioEse
        ";

        $dataRespuestaIS = "     SELECT ms.IdServicioEse,(DATEDIFF(ms.FechaEjecucionFinal,po.FechaEjecucion)+1) as desface
      FROM users u
   INNER JOIN clientes c ON c.id = u.IdCliente
   INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
    INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
   INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
   INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
   INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
   INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
   INNER JOIN centros_negocio cn ON cn.id = u.idcn
   INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
   INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
   INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
   INNER JOIN master_ese_srv_programacion po ON po.IdServicioEse = ms.IdServicioEse";

        $TiempoRes = "SELECT mp.Tiempo,(DATEDIFF(ms.FechaCierre,ms.FechaCreacion)+1) as desface
    FROM users u
 INNER JOIN clientes c ON c.id = u.IdCliente
 INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
  INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
 INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
 INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
 INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
 INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
 INNER JOIN centros_negocio cn ON cn.id = u.idcn
 INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
 INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
 INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
 INNER JOIN master_ese_srv_programacion po ON po.IdServicioEse = ms.IdServicioEse";

        $dicta = "SELECT DISTINCT inv.Estatus, (SELECT COUNT(ms.IdServicioEse)
        FROM users u
        INNER JOIN clientes c ON c.id = u.IdCliente
        INNER JOIN master_ese_srv_servicio ms ON u.IdCliente = ms.IdCliente
        INNER JOIN master_ese_plantilla_cliente pc ON ms.IdPlantillaCliente = pc.IdPlantillaCliente
        INNER JOIN master_ese_plantilla p ON p.IdPlantilla= pc.IdPlantilla
        INNER JOIN master_ese_tipos mt ON p.IdTipos = mt.IdTipos
        INNER JOIN master_ese_tiposervicio mts ON mts.IdTipoServicio= p.IdTipoServicio
        INNER JOIN master_ese_modalidad mm ON ms.IdModalidad = mm.IdModalidad
        INNER JOIN centros_negocio cn ON cn.id = u.idcn
        INNER JOIN master_ese_prioridades mp ON mp.IdPrioridad = ms.IdPrioridad
        INNER JOIN master_ese_srv_os mo ON mo.IdServicioSRV = ms.IdServicioEse
        INNER JOIN master_ese_srv_asignacion sa ON ms.IdServicioEse = sa.IdServicioEse
        INNER JOIN master_ese_srv_dictamen_inv inv1 ON inv1.IdServicioEse = ms.IdServicioEse
		  WHERE inv1.Estatus = inv.Estatus"; 

        if (Auth::user()->tipo == 'c') {
            $totalestatus_proces .= " AND c.id= " . Auth::user()->IdCliente;
            $dataRespuestaAgend .= " AND c.id= " . Auth::user()->IdCliente;
            $dataRespuestaIS .= " AND c.id= " . Auth::user()->IdCliente;
            $TiempoRes .= " AND c.id= " . Auth::user()->IdCliente;
            $dicta .= " AND c.id= " . Auth::user()->IdCliente;
            $totalporserviciosss.=  " AND c.id= " . Auth::user()->IdCliente;
            $modalidad.=  " AND c.id= " . Auth::user()->IdCliente;
            $prioridad.=  " AND c.id= " . Auth::user()->IdCliente;
        }


        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
        
        }else{
            if(Auth::user()->tipo == "s"){
            $totalestatus_proces .= " AND c.id_cn= " . Auth::user()->idcn;
            $dataRespuestaAgend .= " AND c.id_cn= " . Auth::user()->idcn;
            $dataRespuestaIS .= " AND c.id_cn= " . Auth::user()->idcn;
            $TiempoRes .= " AND c.id_cn= " . Auth::user()->idcn;
            $dicta .= " AND c.id_cn= " . Auth::user()->idcn;
            $totalporserviciosss.=  " AND c.id_cn= " . Auth::user()->idcn;
            $modalidad.=  " AND c.id_cn= " . Auth::user()->idcn;
            $prioridad.=  " AND c.id_cn= " . Auth::user()->idcn;
            }
        }

        $dataRespuestaAgenda = DB::select($dataRespuestaAgend);

        $totalestatus_proces .= ") as Total
        FROM master_ese_srv_servicio ms1 ";

        $dicta .= " ) as Total
        FROM master_ese_srv_dictamen_inv inv order by inv.estatus desc";

        $totalporserviciosss .= " ) as Total
        FROM master_ese_tiposervicio mtip";

        $modalidad .= ") as Total
        FROM master_ese_modalidad mm1";
        $prioridad .= ") as Total
        FROM master_ese_prioridades p1";

        $totalestatus_proceso = DB::select($totalestatus_proces);
        $totalporservicio = DB::select($totalporserviciosss);
        $dictamen = DB::select($dicta);
        $prioridadservicios = DB::select($prioridad);
        $modalidadservicios =DB::select($modalidad);
        $dictamenIncidencias = MasterConsultas::exeSQL(
            "dashboard_dictamen_incidencias",
            "READONLY",

            array(
                "IdCliente" => $Id,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );


        $dataRespuestaAgenda = DB::select($dataRespuestaAgend);
        $dataRespuestaISL = DB::select($dataRespuestaIS);
        $dataTR = DB::select($TiempoRes);
        foreach ($totalservicios as $tsrv) {

            $Totalservicio = $tsrv->TotalServicios;
        }

        $respuestaAgenda = $this->ResponseTime($dataRespuestaAgenda);

        $respuestaISL = $this->ResponseTime2($dataRespuestaISL);

        $TiempoRespuesta = $this->ResponseTime3($dataTR);

        return [

            "TiempoRespuesta"=>$TiempoRespuesta,

            "Totalservicio" => $Totalservicio,

            "totalporservicio" => $totalporservicio,

            "prioridadservicios" => $prioridadservicios,

            "modalidadservicios" => $modalidadservicios,

            "totalestatus_proceso" => $totalestatus_proceso,

            "dictamen" => $dictamen,


            "dictamenIncidencias" => $dictamenIncidencias,

            "respuestaAgenda" => $respuestaAgenda,

            "respuestaISL" => $respuestaISL

        ];
    }

    public function GetDataDashboardByInvestigator($IdInvestigador, $Dateini, $Dateend)

    {

        $estatus_proceso = MasterConsultas::exeSQL(
            "filter_estatus_inv",
            "READONLY",

            array(
                "IdServicioOS" => -1,

                "IdInvestigador" => $IdInvestigador,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );

        $clientes = MasterConsultas::exeSQL(
            "filter_client_by_inv",
            "READONLY",

            array(
                'IdInvestigador' => $IdInvestigador

            )
        );

        $analistas = MasterConsultas::exeSQL(
            "filter_analist_by_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $tiposClientes = MasterConsultas::exeSQL(
            "filter_tipoclient_by_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador

            )
        );

        $totalservicios = MasterConsultas::exeSQL(
            "filter_total_servicios_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        foreach ($totalservicios as $tsrv) {

            $Totalservicio = $tsrv->TotalServicios;
        }

        $tipos = MasterConsultas::exeSQL(
            "filter_total_tipos_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        //charts

        $totalporservicio = MasterConsultas::exeSQL(
            "filter_total_tipos_servicios_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $prioridadservicios = MasterConsultas::exeSQL(
            "filter_total_prioridad_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $modalidadservicios = MasterConsultas::exeSQL(
            "filter_total_modalidad_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $totalestatus_proceso = MasterConsultas::exeSQL(
            "filter_estatus_del_proceso_inv",
            "READONLY",

            array(
                "IdServicioOS" => -1,

                "IdInvestigador" => $IdInvestigador,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );

        $dictamen = MasterConsultas::exeSQL(
            "filter_dictamen_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $dictamenIncidencias = MasterConsultas::exeSQL(
            "filter_dictamen_incidencias_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $facturacionglobal = MasterConsultas::exeSQL(
            "filter_facturacion_global_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );

        $facturacion_x_servicios = MasterConsultas::exeSQL(
            "filter_facturacion_x_servicios_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );



        $dataRespuestaAgenda = MasterConsultas::exeSQL(
            "filter_tiempo_respuesta_agenda_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $dataRespuestaISL = MasterConsultas::exeSQL(
            "filter_tiempo_respuesta_ISL_inv",
            "READONLY",

            array(
                "IdInvestigador" => $IdInvestigador,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $respuestaAgenda = $this->ResponseTime($dataRespuestaAgenda);

        $respuestaISL = $this->ResponseTime($dataRespuestaISL);



        return [

            "estatus_proceso" => $estatus_proceso,

            "clientes" => $clientes,

            "analistas" => $analistas,

            "tiposClientes" => $tiposClientes,

            "Totalservicio" => $Totalservicio,

            "totalporservicio" => $totalporservicio,

            "prioridadservicios" => $prioridadservicios,

            "modalidadservicios" => $modalidadservicios,

            "totalestatus_proceso" => $totalestatus_proceso,

            "dictamen" => $dictamen,

            "facturacionglobal" => $facturacionglobal,

            "facturacion_x_servicios" => $facturacion_x_servicios,

            "tipos" => $tipos,

            "dictamenIncidencias" => $dictamenIncidencias,

            "respuestaAgenda" => $respuestaAgenda,

            "respuestaISL" => $respuestaISL

        ];
    }

    public function GetDataDashboardByAnalist($IdAnalista, $Dateini, $Dateend)

    {

        $estatus_proceso = MasterConsultas::exeSQL(
            "filter_estatus_analist",
            "READONLY",

            array(
                "IdServicioOS" => -1,

                "IdAnalista" => $IdAnalista,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );

        $clientes = MasterConsultas::exeSQL(
            "filter_client_by_analist",
            "READONLY",

            array(
                'IdAnalista' => $IdAnalista

            )
        );

        $investigadores = MasterConsultas::exeSQL(
            "filter_investigator_by_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $tiposClientes = MasterConsultas::exeSQL(
            "filter_tipoclient_by_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista

            )
        );

        $totalservicios = MasterConsultas::exeSQL(
            "filter_total_servicios_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        foreach ($totalservicios as $tsrv) {

            $Totalservicio = $tsrv->TotalServicios;
        }

        $tipos = MasterConsultas::exeSQL(
            "filter_total_tipos_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        //charts

        $totalporservicio = MasterConsultas::exeSQL(
            "filter_total_tipos_servicios_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $prioridadservicios = MasterConsultas::exeSQL(
            "filter_total_prioridad_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $modalidadservicios = MasterConsultas::exeSQL(
            "filter_total_modalidad_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $totalestatus_proceso = MasterConsultas::exeSQL(
            "filter_estatus_del_proceso_analist",
            "READONLY",

            array(
                "IdServicioOS" => -1,

                "IdAnalista" => $IdAnalista,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );

        $dictamen = MasterConsultas::exeSQL(
            "filter_dictamen_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $dictamenIncidencias = MasterConsultas::exeSQL(
            "filter_dictamen_incidencias_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $facturacionglobal = MasterConsultas::exeSQL(
            "filter_facturacion_global_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );

        $facturacion_x_servicios = MasterConsultas::exeSQL(
            "filter_facturacion_x_servicios_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );

        $dataRespuestaAgenda = MasterConsultas::exeSQL(
            "filter_tiempo_respuesta_agenda_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $dataRespuestaISL = MasterConsultas::exeSQL(
            "filter_tiempo_respuesta_ISL_analist",
            "READONLY",

            array(
                "IdAnalista" => $IdAnalista,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $respuestaAgenda = $this->ResponseTime($dataRespuestaAgenda);

        $respuestaISL = $this->ResponseTime($dataRespuestaISL);

        return [

            "estatus_proceso" => $estatus_proceso,

            "clientes" => $clientes,

            "investigadores" => $investigadores,

            "tiposClientes" => $tiposClientes,

            "Totalservicio" => $Totalservicio,

            "totalporservicio" => $totalporservicio,

            "prioridadservicios" => $prioridadservicios,

            "modalidadservicios" => $modalidadservicios,

            "totalestatus_proceso" => $totalestatus_proceso,

            "dictamen" => $dictamen,

            "facturacionglobal" => $facturacionglobal,

            "facturacion_x_servicios" => $facturacion_x_servicios,

            "tipos" => $tipos,

            "dictamenIncidencias" => $dictamenIncidencias,

            "respuestaAgenda" => $respuestaAgenda,

            "respuestaISL" => $respuestaISL

        ];
    }

    public function GetDataDashboardByPeriod($Dateini, $Dateend)

    {

        $clientes = MasterConsultas::exeSQL(
            "dashboard_clientes",
            "READONLY",

            array("IdCliente" => -1)
        );

        $estatus_proceso = MasterConsultas::exeSQL(
            "dashboard_estatus",
            "READONLY",

            array(
                "IdServicioOS" => -1,

                "IdCliente" => -1,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend
            )
        );

        $investigadores = MasterConsultas::exeSQL(
            "dashboard_investigadores",
            "READONLY",

            array(
                'IdCliente' => -1,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $analistas = MasterConsultas::exeSQL(
            "dashboard_analistas",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $tiposClientes = MasterConsultas::exeSQL("filter_tipoclient", "READONLY", array("IdCliente" => -1));

        $totalservicios = MasterConsultas::exeSQL(
            "total_servicios",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $totalporservicio = MasterConsultas::exeSQL(
            "total_tipos_servicios",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $prioridadservicios = MasterConsultas::exeSQL(
            "total_prioridad",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $modalidadservicios = MasterConsultas::exeSQL(
            "total_modalidad",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $tipos = MasterConsultas::exeSQL(
            "total_tipos",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );



        foreach ($totalservicios as $tsrv) {

            $Totalservicio = $tsrv->TotalServicios;
        }

        $totalestatus_proceso = MasterConsultas::exeSQL(
            "dashboard_estatus_del_proceso",
            "READONLY",

            array(
                "IdServicioOS" => -1,

                "IdCliente" => -1,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );

        $dictamen = MasterConsultas::exeSQL(
            "dashboard_dictamen",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $dictamenIncidencias = MasterConsultas::exeSQL(
            "dashboard_dictamen_incidencias",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $facturacionglobal = MasterConsultas::exeSQL(
            "dashboard_facturacion_global",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend
            )
        );

        $facturacion_x_servicios = MasterConsultas::exeSQL(
            "dashboard_facturacion_x_servicios",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend
            )
        );

        $dataRespuestaAgenda = MasterConsultas::exeSQL(
            "tiempo_respuesta_agenda",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $dataRespuestaISL = MasterConsultas::exeSQL(
            "tiempo_respuesta_ISL",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $respuestaAgenda = $this->ResponseTime($dataRespuestaAgenda);

        $respuestaISL = $this->ResponseTime($dataRespuestaISL);

        return [

            "clientes" => $clientes,

            "tiposClientes" => $tiposClientes,

            "estatus_proceso" => $estatus_proceso,

            "investigadores" => $investigadores,

            "analistas" => $analistas,

            "Totalservicio" => $Totalservicio,

            "totalestatus_proceso" => $totalestatus_proceso,

            "totalporservicio" => $totalporservicio,

            "prioridadservicios" => $prioridadservicios,

            "modalidadservicios" => $modalidadservicios,

            "tipos" => $tipos,

            "dictamen" => $dictamen,

            "facturacionglobal" => $facturacionglobal,

            "facturacion_x_servicios" => $facturacion_x_servicios,

            "dictamenIncidencias" => $dictamenIncidencias,

            "respuestaAgenda" => $respuestaAgenda,

            "respuestaISL" => $respuestaISL

        ];
    }

    public function GetDataDashboardByTypeClient($TipoCliente, $Dateini, $Dateend)

    {

        try {

            $clientes = MasterConsultas::exeSQL(
                "filter_client_by_tipocliente",
                "READONLY",

                array("TipoCliente" => $TipoCliente)
            );

            $estatus_proceso = MasterConsultas::exeSQL(
                "filter_estatus_tipocliente",
                "READONLY",

                array(
                    "IdServicioOS" => -1,

                    "TipoCliente" => $TipoCliente,

                    "FechaSolicitudIni" => $Dateini,

                    "FechaSolicitudFin" => $Dateend
                )
            );

            $investigadores = MasterConsultas::exeSQL(
                "filter_investigator_by_tipocliente",
                "READONLY",

                array(
                    'TipoCliente' => $TipoCliente,

                    "FechaCreacionIni" => $Dateini,

                    "FechaCreaciondFin" => $Dateend
                )
            );

            $analistas = MasterConsultas::exeSQL(
                "filter_analist_by_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaCreacionIni" => $Dateini,

                    "FechaCreaciondFin" => $Dateend
                )
            );



            $totalservicios = MasterConsultas::exeSQL(
                "filter_total_servicios_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaCreacionIni" => $Dateini,

                    "FechaCreaciondFin" => $Dateend

                )
            );

            foreach ($totalservicios as $tsrv) {

                $Totalservicio = $tsrv->TotalServicios;
            }

            $totalporservicio = MasterConsultas::exeSQL(
                "filter_total_tipos_servicios_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaCreacionIni" => $Dateini,

                    "FechaCreaciondFin" => $Dateend

                )
            );

            $prioridadservicios = MasterConsultas::exeSQL(
                "filter_total_prioridad_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaCreacionIni" => $Dateini,

                    "FechaCreaciondFin" => $Dateend

                )
            );

            $modalidadservicios = MasterConsultas::exeSQL(
                "filter_total_modalidad_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaCreacionIni" => $Dateini,

                    "FechaCreaciondFin" => $Dateend

                )
            );

            $tipos = MasterConsultas::exeSQL(
                "filter_total_tipos_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaCreacionIni" => $Dateini,

                    "FechaCreaciondFin" => $Dateend

                )
            );





            $totalestatus_proceso = MasterConsultas::exeSQL(
                "filter_estatus_del_proceso_tipocliente",
                "READONLY",

                array(
                    "IdServicioOS" => -1,

                    "TipoCliente" => $TipoCliente,

                    "FechaSolicitudIni" => $Dateini,

                    "FechaSolicitudFin" => $Dateend

                )
            );

            $dictamen = MasterConsultas::exeSQL(
                "filter_dictamen_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaCreacionIni" => $Dateini,

                    "FechaCreaciondFin" => $Dateend

                )
            );

            $dictamenIncidencias = MasterConsultas::exeSQL(
                "filter_dictamen_incidencias_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaCreacionIni" => $Dateini,

                    "FechaCreaciondFin" => $Dateend

                )
            );

            $facturacionglobal = MasterConsultas::exeSQL(
                "filter_facturacion_global_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaSolicitudIni" => $Dateini,

                    "FechaSolicitudFin" => $Dateend
                )
            );

            $facturacion_x_servicios = MasterConsultas::exeSQL(
                "filter_facturacion_x_servicios_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaSolicitudIni" => $Dateini,

                    "FechaSolicitudFin" => $Dateend
                )
            );

            $dataRespuestaAgenda = MasterConsultas::exeSQL(
                "filter_tiempo_respuesta_agenda_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaCreacionIni" => $Dateini,

                    "FechaCreaciondFin" => $Dateend
                )
            );

            $dataRespuestaISL = MasterConsultas::exeSQL(
                "filter_tiempo_respuesta_ISL_tipocliente",
                "READONLY",

                array(
                    "TipoCliente" => $TipoCliente,

                    "FechaCreacionIni" => $Dateini,

                    "FechaCreaciondFin" => $Dateend
                )
            );

            $respuestaAgenda = $this->ResponseTime($dataRespuestaAgenda);

            $respuestaISL = $this->ResponseTime($dataRespuestaISL);

            return [

                "clientes" => $clientes,

                "estatus_proceso" => $estatus_proceso,

                "investigadores" => $investigadores,

                "analistas" => $analistas,

                "Totalservicio" => $Totalservicio,

                "totalporservicio" => $totalporservicio,

                "prioridadservicios" => $prioridadservicios,

                "modalidadservicios" => $modalidadservicios,

                "tipos" => $tipos,

                "totalestatus_proceso" => $totalestatus_proceso,

                "dictamen" => $dictamen,

                "facturacionglobal" => $facturacionglobal,

                "facturacion_x_servicios" => $facturacion_x_servicios,

                "dictamenIncidencias" => $dictamenIncidencias,

                "respuestaAgenda" => $respuestaAgenda,

                "respuestaISL" => $respuestaISL

            ];
        } catch (Exception $e) {

            return [

                "error" => $e->getMessage()

            ];
        }
    }

    public function GetDataDashboardByStatusProcess($Estatus, $Dateini, $Dateend)

    {

        $clientes = MasterConsultas::exeSQL(
            "filter_client_by_estatusproceso",
            "READONLY",

            array("Estatus" => $Estatus)
        );

        $tiposClientes = MasterConsultas::exeSQL("filter_tipoclient_by_estatusproceso", "READONLY", array("Estatus" => $Estatus));

        $investigadores = MasterConsultas::exeSQL(
            "filter_investigator_by_estatusproceso",
            "READONLY",

            array(
                'Estatus' => $Estatus,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $analistas = MasterConsultas::exeSQL(
            "filter_analist_by_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );



        $totalservicios = MasterConsultas::exeSQL(
            "filter_total_servicios_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        foreach ($totalservicios as $tsrv) {

            $Totalservicio = $tsrv->TotalServicios;
        }

        $totalporservicio = MasterConsultas::exeSQL(
            "filter_total_tipos_servicios_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $prioridadservicios = MasterConsultas::exeSQL(
            "filter_total_prioridad_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $modalidadservicios = MasterConsultas::exeSQL(
            "filter_total_modalidad_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $tipos = MasterConsultas::exeSQL(
            "filter_total_tipos_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );





        $totalestatus_proceso = MasterConsultas::exeSQL(
            "filter_estatus_del_proceso_estatusproceso",
            "READONLY",

            array(
                "IdServicioOS" => -1,

                "Estatus" => $Estatus,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend

            )
        );

        $dictamen = MasterConsultas::exeSQL(
            "filter_dictamen_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $dictamenIncidencias = MasterConsultas::exeSQL(
            "filter_dictamen_incidencias_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend

            )
        );

        $facturacionglobal = MasterConsultas::exeSQL(
            "filter_facturacion_global_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend
            )
        );

        $facturacion_x_servicios = MasterConsultas::exeSQL(
            "filter_facturacion_x_servicios_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaSolicitudIni" => $Dateini,

                "FechaSolicitudFin" => $Dateend
            )
        );

        $dataRespuestaAgenda = MasterConsultas::exeSQL(
            "filter_tiempo_respuesta_agenda_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $dataRespuestaISL = MasterConsultas::exeSQL(
            "filter_tiempo_respuesta_ISL_estatusproceso",
            "READONLY",

            array(
                "Estatus" => $Estatus,

                "FechaCreacionIni" => $Dateini,

                "FechaCreaciondFin" => $Dateend
            )
        );

        $respuestaAgenda = $this->ResponseTime($dataRespuestaAgenda);

        $respuestaISL = $this->ResponseTime($dataRespuestaISL);

        return [

            "clientes" => $clientes,

            "tiposClientes" => $tiposClientes,

            "investigadores" => $investigadores,

            "analistas" => $analistas,

            "Totalservicio" => $Totalservicio,

            "totalporservicio" => $totalporservicio,

            "prioridadservicios" => $prioridadservicios,

            "modalidadservicios" => $modalidadservicios,

            "tipos" => $tipos,

            "totalestatus_proceso" => $totalestatus_proceso,

            "dictamen" => $dictamen,

            "facturacionglobal" => $facturacionglobal,

            "facturacion_x_servicios" => $facturacion_x_servicios,

            "dictamenIncidencias" => $dictamenIncidencias,

            "respuestaAgenda" => $respuestaAgenda,

            "respuestaISL" => $respuestaISL

        ];
    }



    private function ResponseTime($result)
    {

        $Desfasada = 0;

        $d1 = 0;

        $d2 = 0;

        $d3 = 0;

        foreach ($result as $r) {

            if ($r->desface == 1) {

                $d1 +=  1;
            }

            if ($r->desface == 2) {

                $d2 +=  1;
            }

            if ($r->desface == 3) {

                $d3 +=  1;
            }

            if ($r->desface >= 4) {

                $Desfasada +=  1;
            }
        }



        return ["Desfasada" => $Desfasada, "d1" => $d1, "d2" => $d2, "d3" => $d3];
    }


    private function ResponseTime2($result)
    {

        $Desfasada = 0;

        $d1 = 0;

        foreach ($result as $r) {

            if ($r->desface == 1 || $r->desface == 2) {

                $d1++;
            }

            if ($r->desface > 2) {

                $Desfasada +=  1;
            }
        }

        return ["Desfasada" => $Desfasada, "d1" => $d1];
    }

    private function ResponseTime3($result)
    {

        $Desfasada = 0;

        $d1 = 0;

        foreach ($result as $r) {

            if ($r->desface != 0 && $r->desface <= ($r->Tiempo + 1)) {

                $d1++;
            } else if ($r->desface != 0) {

                $Desfasada +=  1;
            }
        }

        return ["Desfasada" => $Desfasada, "d1" => $d1];
    }
    //Funciones para limpiar filtros

    public function GetDataClients()
    {

        $clientes = MasterConsultas::exeSQL(
            "dashboard_clientes",
            "READONLY",

            array("IdCliente" => -1)
        );

        return ["clientes" => $clientes];
    }

    public function getDataInvestigators()
    {

        $investigadores = MasterConsultas::exeSQL(
            "dashboard_investigadores",
            "READONLY",

            array(
                'IdCliente' => -1,

                "FechaCreacionIni" => -1,

                "FechaCreaciondFin" => -1
            )
        );

        return ["investigadores" => $investigadores];
    }

    public function getDataAnalists()
    {

        $analistas = MasterConsultas::exeSQL(
            "dashboard_analistas",
            "READONLY",

            array(
                "IdCliente" => -1,

                "FechaCreacionIni" => -1,

                "FechaCreaciondFin" => -1
            )
        );

        return ["analistas" => $analistas];
    }

    public function getDataTypeClients()
    {

        $tiposClientes = MasterConsultas::exeSQL("filter_tipoclient", "READONLY", array("IdCliente" => -1));

        return ["tiposClientes" => $tiposClientes];
    }

    public function getDataStatusProcess()
    {

        $estatus_proceso = MasterConsultas::exeSQL(
            "dashboard_estatus",
            "READONLY",

            array(
                "IdServicioOS" => -1,

                "IdCliente" => -1,

                "FechaSolicitudIni" => -1,

                "FechaSolicitudFin" => -1
            )
        );

        return ["estatus_proceso" => $estatus_proceso];
    }
}

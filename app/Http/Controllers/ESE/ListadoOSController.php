<?php
namespace App\Http\Controllers\ESE;
use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;

class ListadoOSController extends Controller
{
    // se agregaron variables para filtrado por tipos (s,f,c,administrador)
    private $idPerfilAdministrador =["1","2","17","18"];
    private $idAnalista = ["98","120"];
    private $queryParaFiltrar = "SELECT
    ms.*, mc.nombre_comercial AS Cliente,
    mm.descripcion AS Modalidad,
    CONCAT((SELECT
        descripcion
      FROM master_ese_tiposervicio AS tp
      WHERE tp.IdTipoServicio = mp.IdTipoServicio), ' ',
    IFNULL((SELECT
        CONCAT(' - ', tp.Tipos)
      FROM master_ese_tipos AS tp
      WHERE tp.IdTipos = mp.IdTipos), '')
    ) AS servicio,
    (SELECT
        os.IdServicioOS
      FROM master_ese_srv_os AS os
      WHERE os.IdServicioSRV = ms.IdServicioEse) AS os,
    mpr.descripcion AS Prioridad,
    mp.DescripcionPlantilla AS Formato,
    CONCAT((SELECT
        CAST(mese.ValorCargado AS char) AS Candidato
      FROM master_ese_srv_entrada AS mese
      WHERE mese.IdServicioEse = ms.IdServicioEse
      AND mese.IdEntrada = 1), ' ', (SELECT
        CAST(mese.ValorCargado AS char) AS Candidato
      FROM master_ese_srv_entrada AS mese
      WHERE mese.IdServicioEse = ms.IdServicioEse
      AND mese.IdEntrada = 497), ' ', (SELECT
        CAST(mese.ValorCargado AS char) AS Candidato
      FROM master_ese_srv_entrada AS mese
      WHERE mese.IdServicioEse = ms.IdServicioEse
      AND mese.IdEntrada = 498)) AS Candidato,
    a.IdInvestigador,
    mee.IdEmpleado,
    u.id IdUsuario ,
    CONCAT(mee.nombre, ' ', IFNULL(mee.ApellidoPaterno, ''), ' ', IFNULL(mee.ApellidoMaterno, '')) AS Investigador,
    (SELECT
        CONCAT(e.name, ' ', IFNULL(e.apellido_paterno, ''), ' ', IFNULL(e.apellido_materno, ''))
      FROM users AS e
      WHERE e.id = a.IdAnalista) AS Analista,
    CONCAT(cn.nombre, ' (', cn.nomenclatura, ')') AS centro_negocio,

    (SELECT Estatus FROM master_ese_srv_dictamen_inv WHERE master_ese_srv_dictamen_inv.IdServicioEse = ms.IdServicioEse) as EstatusE
  FROM master_ese_srv_servicio AS ms
    INNER JOIN clientes mc
      ON mc.id = ms.IdCliente
    INNER JOIN centros_negocio cn
      ON mc.id_cn = cn.id
    INNER JOIN master_ese_plantilla_cliente mcl
      ON mcl.IdPlantillaCliente = ms.IdPlantillaCliente
    INNER JOIN master_ese_plantilla mp
      ON mp.IdPlantilla = mcl.IdPlantilla
    LEFT JOIN master_ese_modalidad mm
      ON mm.IdModalidad = ms.IdModalidad
    LEFT JOIN master_ese_prioridades mpr
      ON mpr.IdPrioridad = ms.IdPrioridad
    LEFT JOIN master_ese_srv_asignacion AS a
      ON a.IdServicioEse = ms.IdServicioEse
    left join master_ese_empleado mee on mee.IdEmpleado = a.IdInvestigador 
    left join users u on u.IdEmpleado = mee.IdEmpleado ";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $contarAnalistaSec = DB::select("select count(ms.idservicioESE) as con from master_ese_srv_servicio ms
        inner join master_ese_srv_asignacion a on a.idservicioese = ms.idservicioESE
        where  a.IdAnalistaSec = ? AND ms.estatus <> 'Cerrado' AND ms.estatus <> 'Cancelado'", [Auth::user()->id]);

        $contarA = "";
        foreach ($contarAnalistaSec as $c ){ $contarA = $c->con;}

        if(Auth::user()->tipo == "s" ){
            if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
                $ListadoOS = MasterConsultas::exeSQL("master_ese_srv_servicio", "READONLY",
                array(
                    "IdServicioEse" => '-1'
                    )
                );
            }else{
                $ListadoOS = MasterConsultas::exeSQL("master_ese_srv_servicio", "READONLY",

                array(
    
                    "IdServicioEse" => '-1',
                    "idcn"=> Auth::user()->idcn
    
                    )
    
                );
            }

        }elseif(Auth::user()->tipo == "c"){
        $ListadoOS = DB :: select('SELECT pc.IdPlantillaCliente AS IdPlantillaCliente,p.DescripcionPlantilla AS Formato,ms.IdServicioEse AS IdServicioEse, ms.Estatus AS Estatus, mo.IdServicioOS AS os,concat(mts.Descripcion,"-",mt.Tipos) AS servicio,u.idcn, u.idcliente AS IdCliente, u.username, c.nombre_comercial AS Cliente, mm.Descripcion AS Modalidad,CONCAT ( IFNULL (cn.nombre,"")," (",ifnull(cn.nomenclatura,""),")") AS centro_negocio,mp.Descripcion AS Prioridad,
        ifnull(
            (select concat(IFNULL(e.Nombre,""), " ", IFNULL(e.SegundoNombre,"")," ",IFNULL(e.ApellidoPaterno,"")," ", IFNULL(e.ApellidoMaterno,""))
            FROM master_ese_empleado e INNER JOIN master_ese_srv_asignacion a ON e.IdEmpleado = a.IdInvestigador WHERE a.IdServicioEse = ms.IdServicioEse),"" 
        ) AS Investigador,
        ifnull(
            (select concat(IFNULL(u.name,""), " ", IFNULL(u.apellido_paterno,"")," ",IFNULL(u.apellido_materno,""))
            FROM users u INNER JOIN master_ese_srv_asignacion a ON u.Id = a.IdAnalista WHERE a.IdServicioEse = ms.IdServicioEse),"" 
        ) AS Analista,
        IFNULL(
            CONCAT (IFNULL ((SELECT mse.ValorCargado FROM master_ese_entrada  me
                        INNER JOIN master_ese_srv_entrada mse ON me.IdEntrada = mse.IdEntrada 
                        WHERE mse.IdServicioEse = ms.IdServicioEse AND me.CampoNombre = "NombreCandidato"), "")," ",
                        IFNULL ((SELECT mse.ValorCargado FROM master_ese_entrada  me
                        INNER JOIN master_ese_srv_entrada mse ON me.IdEntrada = mse.IdEntrada 
                        WHERE mse.IdServicioEse = ms.IdServicioEse AND me.CampoNombre = "apellidopaternoCandidato"), "")," ",
                        IFNULL ((SELECT mse.ValorCargado FROM master_ese_entrada  me
                        INNER JOIN master_ese_srv_entrada mse ON me.IdEntrada = mse.IdEntrada 
                        WHERE mse.IdServicioEse = ms.IdServicioEse AND me.CampoNombre = "apellidomaternoCandidato"), "")
                        ),""
        ) AS Candidato,
        (SELECT IFNULL (Estatus , "S/N") FROM master_ese_srv_dictamen_inv WHERE master_ese_srv_dictamen_inv.IdServicioEse = ms.IdServicioEse) as EstatusE
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
        WHERE  u.username = ?  ORDER BY ms.IdServicioEse DESC ', [Auth::user()->username]);
        
    }elseif(Auth::user()->tipo == "f"){

        $op = DB::select ('SELECT u.idEmpleado as e FROM users u

        WHERE u.id = ?', [Auth::user()->id]);
        
        $e="";
        foreach($op as $o){
            $e = $o->e;
        }

            $ListadoOS = DB :: select($this->queryParaFiltrar.' WHERE  a.IdInvestigador = ?  ORDER BY ms.IdServicioEse DESC', [$e]);
        }

		$BuscarAlgunOSCerrado = DB::select("SELECT * FROM master_ese_srv_dictamen_eval;");
		$BuscarAlgunOSCerradoDos = DB::select("SELECT Estatus from master_ese_srv_dictamen_eval");
        $status = DB::select("SELECT DISTINCT mess.Estatus FROM master_ese_servicio_estatus mess ");
        $centro_negocio = DB::select("SELECT cn.id, CONCAT(cn.nombre,' (',cn.nomenclatura,')') AS centronegocio FROM centros_negocio cn");
        return view("ESE.listadoOS.listadoOSindex",
                    ["listadoOS"=>$ListadoOS,
                     "BuscarAlgunOSCerrado"=>$BuscarAlgunOSCerrado,
                     "BuscarAlgunOSCerradoDos"=>$BuscarAlgunOSCerradoDos,
                     "status" => $status,
                     "centro_negocio" => $centro_negocio,
                     "contarA" => $contarA
                    ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      session_start();
      $ListadoOSFilter = (isset($_SESSION["IdEse"]))?$_SESSION["IdEse"]:0;
	   $BuscarAlgunOSCerrado = DB::select("SELECT IdServicioEse FROM master_ese_srv_dictamen_eval");
	   $BuscarAlgunOSCerradoDos = DB::select("SELECT Estatus from master_ese_srv_dictamen_eval");
       session_destroy();
       return view("ESE.listadoOS.OSindex",["listadoOS"=>$this->listaOSXCN(),"ListadoOSFilter"=>$ListadoOSFilter,"BuscarAlgunOSCerrado"=>$BuscarAlgunOSCerrado,"BuscarAlgunOSCerradoDos"=>$BuscarAlgunOSCerradoDos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        try {
            $valor = explode("-",$id);
            $IdServicioEse = $valor[0];
            $idc = $valor[1];
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
                          from master_ese_empleado
                          Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
                          Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
                          left Join master_region_inv ON master_region_inv.IdInvestigador = master_ese_empleado.IdEmpleado
                          Where master_region_inv.IdRegion = $IdRegion");
                      }else if($Etiquet=='Código Postal' &&  $ValorC<>null){
                          $MunicipioVal=DB::select("Select m.Descripcion as Municipio
                          From cfdi_codigopostal as cp
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
                          $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
                          from master_ese_empleado
                          Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
                          Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol
                          left Join master_region_inv ON master_region_inv.IdInvestigador = master_ese_empleado.IdEmpleado
                          Where master_region_inv.IdRegion = $IdRegion ");
                      }else{
                          $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
                          from master_ese_empleado
                          Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
                          Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol");
                      }
                  }
            }else{
              $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
              from master_ese_empleado
              Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
              Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol");
            }
              //Corrección del botón Gustavo - Abinadad
              $Investigadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
              from master_ese_empleado
              Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
              Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolInvestigador = users.IdRol");
              //Fin de nuestras correcciones
              $investigadores = [];
                  foreach ($Investigadores as $invs) {
                      $investigadores[$invs->IdEmpleado] = $invs->NombreCompleto;
                  }
              $Ejecutivos=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
              from master_ese_empleado
              Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
              Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolEjecutivo = users.IdRol");
              $ejecutivos = [];
                  foreach ($Ejecutivos as $ejec) {
                      $ejecutivos[$ejec->IdEmpleado] = $ejec->NombreCompleto;
                  }
              $Analistas=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
              from master_ese_empleado
              Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
              Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolAnalista = users.IdRol
                      WHERE Curp!='0'");
              $analistas = [];
                  foreach ($Analistas as $an) {
                      $analistas[$an->IdEmpleado] = $an->NombreCompleto;
                  }
              $Coordinadores=DB::select("select * , concat(master_ese_empleado.Nombre,' ',ifnull(master_ese_empleado.SegundoNombre,''),' ',master_ese_empleado.ApellidoPaterno,' ',ifnull( master_ese_empleado.ApellidoMaterno,'') ) as NombreCompleto
              from master_ese_empleado
              Inner Join users ON users.IdEmpleado = master_ese_empleado.IdEmpleado
              Inner Join master_ese_mobile_settings ON master_ese_mobile_settings.IdRolCoordinador = users.IdRol");
              $coordinadores = [];
                  foreach ($Coordinadores as $cr) {
                      $coordinadores[$cr->IdEmpleado] = $cr->NombreCompleto;
                  }
              $Modalidades=DB::select("select (select IdModalidad from master_ese_modalidad where master_ese_modalidad.IdModalidad = master_ese_srv_servicio.IdModalidad) as IdModalidad,
              (select Descripcion from master_ese_modalidad where master_ese_modalidad.IdModalidad = master_ese_srv_servicio.IdModalidad) as Descripcion 
              from master_ese_srv_servicio where IdServicioEse = $IdServicioEse");
              $modalidades = [];
                  foreach ($Modalidades as $modd) {
                      $modalidades[$modd->IdModalidad] = $modd->Descripcion;
                  }
              $Prioridades=DB::select("select * from master_ese_prioridades");
              $prioridades = [];
                  foreach ($Prioridades as $prio) {
                      $prioridades[$prio->IdPrioridad] = $prio->Descripcion;
                  }
                  $Plantillas=DB::select("select * from master_ese_plantilla_cliente
                  Inner Join master_ese_plantilla ON master_ese_plantilla.IdPlantilla = master_ese_plantilla_cliente.IdPlantilla
                  where IdPlantillaCliente = (select IdPlantillaCliente from master_ese_srv_servicio where IdServicioESE = $IdServicioEse)");
                  $plantillas = [];
                  $NamePlantilla='';
                      foreach ($Plantillas as $plant) {
                          $plantillas[$plant->IdPlantillaCliente] = $plant->DescripcionPlantilla;
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

                  $queryDP = DB::select("select  DISTINCT(master_ese_contenedor.Etiqueta) as Grupo, master_ese_contenedor.IdContenedor,master_ese_agrupador.Etiqueta as Agrupador, master_ese_agrupador.IdAgrupador
                  ,CASE WHEN COUNT(IF((master_ese_srv_entrada.ValorCargado is null) AND (master_ese_srv_entrada.VisibleForms=1) AND (master_ese_srv_entrada.Requerido=1), 1, null)) > 0 THEN 'amarrillo' ELSE 'verde' END as 'colorEstat'
                  from master_ese_contenedor
                  Inner Join master_ese_agrupador ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor
                  Inner Join master_ese_entrada ON master_ese_entrada.IdAgrupador = master_ese_agrupador.IdAgrupador
                  Inner Join master_ese_srv_entrada ON master_ese_srv_entrada.IdEntrada = master_ese_entrada.IdEntrada
                  Where master_ese_srv_entrada.IdServicioEse = $IdServicioEse GROUP BY master_ese_contenedor.Etiqueta
                  Order by master_ese_contenedor.IdContenedor
                  ");

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

                 $mOS=DB::select("select o.*,
                 (SELECT c.nombre_comercial as Nombre from clientes as c where c.id = o.IdCliente ) as Cliente,
                 (select ValorCargado from master_ese_srv_entrada where IdEntrada = 1 and IdServicioEse = ms.IdServicioEse) as Candidato,
                 (select m.Nombre from master_ese_srv_modulos as m where m.IdModulo = o.IdModulo ) as modulo,
                 (Select ts.Descripcion from master_ese_tiposervicio as ts where ts.IdTipoServicio =
                 (select m.IdTipoServicio from master_ese_plantilla as m where m.IdPlantilla = pc.IdPlantilla)) as Servicio,
                 (select m.Tipos from master_ese_tipos as m where m.IdTipos = ms.IdTipoServicio ) as TipoServicio,
                 concat('ESEOS#', ms.IdServicioEse) as mascara,
                 (select cn.nomenclatura from centros_negocio as cn
                   Inner Join users us ON us.idcn = cn.id
                   Inner Join master_ese_srv_kardex mk ON mk.IdUsuario = us.username where mk.IdServicioEse = o.IdServicioSRV group by o.IdServicioSRV ) as departamento
                  from master_ese_srv_os as o
                  left join master_ese_srv_modulos mem on mem.IdModulo=o.IdModulo
                  Inner join master_ese_srv_servicio ms on ms.IdServicioEse=o.IdServicioSRV
                  inner join master_ese_plantilla_cliente as pc on pc.IdPlantillaCliente = ms.IdPlantillaCliente
                  where o.IdModulo=mem.IdModulo and ms.IdServicioEse=$IdServicioEse order by o.IdServicioOS desc");
                  $mascOS='';
                 foreach ($mOS as $g) {
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
                (select concat(Nombre,' ',ifnull(SegundoNombre,''),' ',ifnull(ApellidoPaterno,''),' ',ifnull(ApellidoMaterno,'')) from master_ese_empleado where IdEmpleado = s.IdAnalista) as Analista,
                (select concat(Nombre,' ',ifnull(SegundoNombre,''),' ',ifnull(ApellidoPaterno,''),' ',ifnull(ApellidoMaterno,'')) from master_ese_empleado where IdEmpleado = s.IdInvestigador) as Investigador
                from master_ese_srv_asignacion as s where s.IdServicioEse = $IdServicioEse");
                 $valor1;$valor2;$valor3;$valor4;$valor5;$valor6;
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

              $Estados=DB::select("Select  e.IdEstado,e.Codigo,  e.FK_nombre_estado as nombre_estado, e.variable, e.renapo,  e.IdPais,    p.FK_Pais as Pais 
              From estados as e   
              inner join master_pais as p on(p.IdPais=e.IdPais) 
              ORDER BY IdEstado=$IdEstado desc");

               $Regiones= DB::select("select r.* from master_regiones as r order by r.IdRegion=$IdRegion desc");
               $Municipios= DB::select("Select 
               e.FK_nombre_estado as estado, 
               e.IdEstado, 
               m.Descripcion as Municipio, 
               m.IdMunicipio
                From  estados e 
               left join master_municipios m on m.CodigoEstado = e.Codigo
                Where   e.IdEstado=$IdEstado 
               order by Descripcion = '{$MCPValue}' desc");
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
               if(count($sqlCpCandidate) > 0)
                  $cpCandidate = $sqlCpCandidate[0]->ValorCargado;
              //obtiene las regiones de acuerdo el codigo p. del candidato
              $regionFromCpFromCandidate = MasterConsultas::exeSQL("get_region_for_cp","READONLY",array("paramCodigoPostal" => $cpCandidate));
              //obtiene el id del estado de acuerdo el codigo p. del candidato
              $IdEstadoFromCpFromCandidate = MasterConsultas::exeSQL("get_info_estado_for_cp","READONLY",array("paraCodigoPostal" => $cpCandidate));
              if(count($IdEstadoFromCpFromCandidate) > 0)
                  $IdEstado = $IdEstadoFromCpFromCandidate[0]->IdEstado;
              return view("ESE.NuevaOS.form-configuracionesOS",['investigadores'=>$Investigadores,'ejecutivos'=>$Ejecutivos,'analistas'=>$Analistas,'coordinadores'=>$Coordinadores,'modalidades'=>$modalidades ,'prioridades'=>$prioridades,
              'plantillas'=>$plantillas, 'IdCliente'=>$idc, 'grupos'=>$grupos, 'IdServicioEse' => $IdServicioEse,'MascOS' => $mascOS, 'status'=>$queryDP, 'kardex'=>$kardex, 'clientes'=>$cliente, 'enlace'=>$enlace,
              'asignacion'=>$asignacion, "NamePlantilla" => $NamePlantilla, "Incidencias"=>$Incidencias,"servicio"=>$servicio, "candidato"=>$candidato,"Estados"=>$Estados,"Regiones"=>$Regiones,"Municipios"=>$Municipios,'Notificada'=>$Notificada,
              'ProgramacionEjecucionGuardada'=>$ProgramacionEjecucionGuardada,'Comentarios'=>$ComentarioAnalista,'DictamenVal'=>$AptoAnalista,'EstatusEval'=>$EstatusAnalista,'IdEstado'=>$IdEstado,"regionFromCpFromCandidate" =>$regionFromCpFromCandidate]);
        } catch (\Exception $e) {
            $r=$e->getMessage()." ".$e->getLine();
            return  $r;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
      $ListadoOS=DB::select("select o.*, (select c.nombre_comercial from clientes as c where c.id = o.IdCliente ) as Cliente,
      FORMAT( o.Costo ,2,'de_MX') AS Costo_fort, FORMAT( o.PrecioFacturable ,2,'de_MX') AS Precio_fort,
      mem.Nombre as modulo, concat('OS: # ',o.IdServicioOS,' ESE: # ', ms.IdServicioEse) as mascara
      from master_ese_srv_os as o
      left join master_ese_srv_modulos mem on mem.IdModulo=o.IdModulo
      Inner join master_ese_srv_servicio ms on ms.IdServicioEse=o.IdServicioSRV
      where IdServicioOS = $id");
      $datos = array();
      foreach ($ListadoOS as $g) {

        $datos[0]=$g->IdServicioOS;

        $datos[1]=$g->Cliente;

        $datos[2]=$g->modulo;

        $datos[3]=$g->Estatus;

        $datos[4]=$g->FechaSolicitud;

        $datos[5]=$g->FechaCierre;

        $datos[6]=$g->VarServicio;

        $datos[7]=str_replace(",", "", $g->Precio_fort);

        $datos[8]=$g->NumFactura;

        $datos[9]=$g->IdServicioSRV;

        $datos[10]=$g->DocumentoFactura;

        $datos[11]=str_replace(",", "", $g->Costo_fort);

        $datos[12]=$g->EstatusCobro;

        $datos[13]=$g->FechaFactura;

        $datos[14]=$g->FechaCobro;

        $datos[15]=$g->mascara;

        $datos[16]=$g->IdServicioSRV."-".$g->IdCliente;
      }
       return view("ESE.listadoOS.listadoOSedit",["datos"=>$datos]);
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
      $destinationPath = 'uploads';

        $Valor = $request->input('VarServicio');

        $precioFac = $request->input('precio');

        $cierre = $request->input('cierre');

        $numFac = $request->input('numeroFactura');

        $costo = $request->input('costo');

        $doc=$request->file('documento');

        $name=null;

        if($doc){
            $name='os-'.$id.'.pdf';
            $doc->move($destinationPath,$name);
        }else{
          $ListadoOS=DB::select("select DocumentoFactura from master_ese_srv_os where IdServicioOS = $id");
          foreach ($ListadoOS as $g) {
            $name = $g->DocumentoFactura;
          }
        }
        $Status = $request->input('cobro');
        $FechaFac = $request->input('facturaF');
        $FechaC = $request->input('CobroF');

        MasterConsultas::exeSQLStatement("update_orden_servicio", "UPDATE",
            array(
                "IdServicioOS"=>$id,
                "VarServicio" => $Valor,
                "PrecioFactura" => $precioFac,
                "FechaCierre" => $cierre,
                "NumFactura" => $numFac,
                "DocumentoFactura" => $name,
                "EstatusCobro" => $Status,
                "FechaFactura" => $FechaFac,
                "FechaCobro" => $FechaC,
                "Costo"=>$costo
                )
        );
		 $BuscarAlgunOSCerrado = DB::select("SELECT * FROM master_ese_srv_dictamen_eval");
		 	   $BuscarAlgunOSCerradoDos = DB::select("SELECT Estatus from master_ese_srv_dictamen_eval");
         $ListadoOSFilter = (isset($_SESSION["IdEse"]))?$_SESSION["IdEse"]:0;
       return view("ESE.listadoOS.OSindex",["listadoOS"=>$this->listaOSXCN(),"ListadoOSFilter"=>$ListadoOSFilter,"BuscarAlgunOSCerrado"=>$BuscarAlgunOSCerrado,"BuscarAlgunOSCerradoDos"=>$BuscarAlgunOSCerradoDos]);
    }

    public function updateC(Request $request)
    {
        $id = $request->IdServicioOS;
        //ANT
        $FechaSolicitud = $request->FechaSolicitud;
        $CostoM = $request->CostoM;
        $PrecioFacturable = $request->PrecioFacturable;
        //CIERRE
        $comentario = $request->comentario;
        $cierre = $request->fechacierre;
        $precio = $request->precioM;
        //CANCELACION
        $motivocancelacion = $request->comentarioCancelacion;
        $cancelacion = $request->fechacancelacion;
        $costo = $request->costoC;
        if($comentario!=null){
            $Mesaje_De_Accion = "Cerrado"; 
            $Accion = 7;
            MasterConsultas::exeSQLStatement("update_os_st", "UPDATE",
                array(
                    "IdServicioOS"=>$id,
                    "Estatus" => 'Cerrado',
                    "PrecioFacturable" => $precio,
                    "Costo" => $CostoM,
                    "FechaSolicitud" => $FechaSolicitud,
                    "FechaCierre" => $cierre,
                    "Comentario" => $comentario
                )
            );
        }
        if($motivocancelacion!=null){
            $Mesaje_De_Accion = "Cancelado";
            $Accion = 8;
            MasterConsultas::exeSQLStatement("update_os_st", "UPDATE",
                array(
                    "IdServicioOS"=>$id,
                    "Estatus" => 'Cancelado',
                    "PrecioFacturable" => $PrecioFacturable,
                    "Costo" => $costo,
                    "FechaSolicitud" => $FechaSolicitud,
                    "FechaCierre" => $cancelacion,
                    "Comentario" => $motivocancelacion
                )
            );
        }
        $Nombre_usuario = Auth::user();  // query de insertar nueva solicitud, cierre y cancelacion en la tabla Listado Kardex DNAMICO
        DB::table("kardex_general")->insert(["id_cn"=>21,"id_usuario"=>$Nombre_usuario->id,"id_modulo"=>7,"id_submodulo"=>26,"id_accion"=>$Accion,"id_objeto"=>$id,"descripcion"=>"La Solucitud $id fue $Mesaje_De_Accion por  $Nombre_usuario->username","fecha"=>date("Y-m-d H:i:sa")]);
        return $this->create();
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

    public function cancelService($IdServicioEse,$IdPlantillaCliente,$IdCliente,$usuarioCancel){
        $response['success'] = false;
        $response['message'] = "";
        $response['sendNotification'] = false;
        $cliente = [];
        $candidato = [];
        $idcn = 0;
        try {
            $updateEstatusServicio = DB::update('UPDATE master_ese_srv_servicio mess SET mess.Estatus = "Cancelado" WHERE mess.IdServicioEse = ?', [$IdServicioEse]);
            $updateEstatusOS = DB::update('UPDATE master_ese_srv_os meso SET meso.Estatus = "Cancelado" WHERE meso.IdServicioSRV = ?', [$IdServicioEse]);
            $resultSqlCliente = DB::select("SELECT u.email,c.nombre_comercial AS cliente,u.idcn
                                FROM clientes c
                                INNER JOIN users u
                                ON c.id_user = u.id
                                WHERE c.id = $IdCliente");   
            if(count($resultSqlCliente) > 0){
                $cliente = array("nombre" => $resultSqlCliente[0]->cliente,
                                "email" => $resultSqlCliente[0]->email);
                $idcn = $resultSqlCliente[0]->idcn;
            }  
            if($idcn > 0){
                $resultSqlLider = DB::select("SELECT 
                                                (SELECT u1.email FROM users u1 WHERE u1.id = u.id AND u1.IdRol = 105) AS email,
                                                (SELECT CONCAT(u1.name,' ',u1.apellido_paterno,' ',u1.apellido_materno) AS nombreuser  FROM users u1 WHERE u1.id = u.id AND u1.IdRol = 105) AS nombre
                                                FROM users u
                                                INNER JOIN cliente_cn_actual cca1
                                                ON u.id = cca1.id_cliente
                                                INNER JOIN centros_negocio cn
                                                ON cn.id = u.idcn
                                                WHERE u.idcn = $idcn  
                                                AND u.IdRol = 105;");
            }  
            $resultSqlCandidato = DB::select("SELECT GROUP_CONCAT(mese.ValorCargado ORDER BY mese.ValorCargado DESC SEPARATOR ' ') AS nombre, 
                                            (SELECT mese.ValorCargado as correo FROM master_ese_srv_entrada mese 
                                            INNER JOIN master_ese_entrada mee ON mese.IdEntrada = mee.IdEntrada
                                            WHERE mese.IdServicioEse=$IdServicioEse AND mee.CampoNombre = 'CorreoElectronico') correo
                                            FROM master_ese_srv_entrada mese 
                                            INNER JOIN master_ese_entrada mee ON mese.IdEntrada = mee.IdEntrada
                                            WHERE mese.IdServicioEse=$IdServicioEse AND (mee.CampoNombre = 'NombreCandidato' 
                                            OR mee.CampoNombre = 'ApellidoPaternoCandidato'
                                            OR mee.CampoNombre = 'ApellidoMaternoCandidato')
                                            ");
            if(count($resultSqlCandidato) > 0){
                $candidato = array("nombre" => $resultSqlCandidato[0]->nombre,
                                    "email" => $resultSqlCandidato[0]->correo);
            }
            $response['success'] = true; 
            $notification = new Notificaciones();
            $resultSendNotification = $notification->sendNotification("SERVICIO-CANCELAR",
                                        array("Usuario" => $usuarioCancel,"IdServicio" => $IdServicioEse),
                                        array([$cliente],[$candidato],$resultSqlLider));
            $response['sendNotification'] = $resultSendNotification;
            return [$response,$cliente,$candidato,$resultSqlLider];
        } catch (\Exception $e) {
            $response['message'] = "Ocurrio un error al cancelar el servicio";
            return [$response,$e->getMessage()];
        }
    }
    //se modificaron las validaciones por código repetitivo y no hacia correcto filtro staff,administrador, cliente, investigador y empleado.
    public function filterOs($typeFilter,$paramFilter,$isClient)
    {
        $userInfo = Auth::user();
        $readOnlyString = "READONLY";
        $queryToExecute = "master_ese_srv_servicio";
        $filterToApply = array("IdServicioEse" => '-1'); 
        $parametrosParaFiltrar = [];
        if($paramFilter != '-1' && $userInfo->tipo != "f"){
            switch ($typeFilter) {
                case "Estatus":
                    $this->queryParaFiltrar .= "WHERE ms.estatus=?";
                    break;
                case "Centro_negcio":
                    $this->queryParaFiltrar .= "WHERE FIND_IN_SET(cn.id, ?)"; 
                    break;
            }
            $parametrosParaFiltrar = [$paramFilter];
            switch ($userInfo->tipo){
                case "c":
                    $this->queryParaFiltrar .= " AND mc.id=?";
                    $parametrosParaFiltrar = [$paramFilter,$userInfo->IdCliente];
                    break;
                case "s":
                    if(in_array($userInfo->IdRol,$this->idAnalista) || !in_array($userInfo->IdPerfil,$this->idPerfilAdministrador)){
                        $this->queryParaFiltrar .= " AND cn.id=?";
                        $parametrosParaFiltrar = [$paramFilter,$userInfo->idcn];
                    }
                    break;
            }
            $info = DB::select($this->queryParaFiltrar,$parametrosParaFiltrar);
        } else if ($userInfo->tipo == "f") {
            $queryToExecute = "get_info_by_investigador";
            $filterToApply = array("paramFilter" => "$paramFilter","parmaIdCliente"=>$isClient, "userId" => $userInfo->id); 
            $info = MasterConsultas::exeSQL(
                $queryToExecute, 
                $readOnlyString,
                $filterToApply
            );
        } else if($userInfo->tipo == "c"){
            $this->queryParaFiltrar .= "where mc.id=?";
            array_push($parametrosParaFiltrar,$userInfo->IdCliente);
            $info = DB::select($this->queryParaFiltrar,$parametrosParaFiltrar);
        }
        else if($userInfo->tipo == "s"){
            if(in_array($userInfo->IdRol,$this->idAnalista) || !in_array($userInfo->IdPerfil,$this->idPerfilAdministrador)){
                $this->queryParaFiltrar .= "where cn.id=?";
                array_push($parametrosParaFiltrar,$userInfo->idcn);
            }
            $info = DB::select($this->queryParaFiltrar,$parametrosParaFiltrar);
        }else {
            $info = MasterConsultas::exeSQL(
                $queryToExecute, 
                $readOnlyString,
                $filterToApply
            );
        }
       
        $tbody = "";
        $tr = "";
        $td = ""; 
        foreach ($info as $LOS) {

            $tr = "";

            $td = ""; 

            $tr .= "<tr>";

                $td .= "<td> $LOS->IdServicioEse </td>";

                $td .= "<td>ESE# $LOS->IdServicioEse </td>";

                $td .= "<td> $LOS->servicio </td>";

                $td .= "<td> $LOS->Cliente </td>";

                $td .= "<td> $LOS->centro_negocio </td>";

                $td .= "<td> $LOS->Candidato </td>";

                $td .= "<td> $LOS->Analista </td>";

                $td .= "<td> $LOS->Investigador </td>";

                $td .= "<td> $LOS->Modalidad </td>";

                $td .= "<td> $LOS->Prioridad </td>";

                $badge = ($LOS->Estatus=='Asignada')?'badge-success':'badge-primary';

                $td .= "<td class=\"text-center\"><span class=\"badge $badge\"> $LOS->Estatus</span></td>";

                $td .= "<td> $LOS->Formato </td>";

                $td .= "<td> $LOS->EstatusE </td>";

                $td .= "<td class=\"text-center\" style=\"width:10%;\">";

                $td .= "<a href=\"ConfiguracionOSEdit/$LOS->IdServicioEse/$LOS->IdCliente\" class=\"btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar Registro\"><i class=\"fa fa-pencil\"></i></a>&nbsp&nbsp

                <input type=\"hidden\"  value=\"\" data-id=\"\">";

                if (Auth::user()->tipo == "c"){
                    $name = Auth::user()->name;
                    $td .= "<button class=\"btn btn-danger btn-icon btn-circle btn-sm\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Cancelar Registro\" onclick=\"cancelService( $LOS->os ,$LOS->IdPlantillaCliente,$LOS->IdCliente,'$name')\"><i class=\"fa fa-ban\" aria-hidden=\"true\"></i></button>";   
                }

            $td .= "</td>";

            $tr .=  $td; 

            $tr .= "</tr>";

            $tbody .= $tr;

        }
        return $tbody;
    }
    //Listado por #OS auto filtrado por departamento del usuario (administrador ve todos)
    private function listaOSXCN(){ 
        if(auth()->user()->is('admin')||auth()->user()->is('adminvalkyrie')||auth()->user()->is('admingent')||auth()->user()->is('admindesarrollo')){
            $ListadoOS=DB::select("select distinct o.*, FORMAT(o.Costo, 2, 'de_MX') AS costo_moneda, 
            FORMAT(o.PrecioFacturable, 2, 'de_MX') AS factura_moneda, c.nombre_comercial as Cliente, mem.Nombre as modulo,
            concat(o.IdServicioSRV,'-',o.IdCliente ) as idValor,
            concat(mem.Nombre, '#', ms.IdServicioEse) as mascara, cn.nomenclatura as departamento
            from master_ese_srv_os o    
            left join master_ese_srv_modulos mem on mem.IdModulo=o.IdModulo
            Inner join master_ese_srv_servicio ms on ms.IdServicioEse=o.IdServicioSRV
            Inner join clientes c on c.id = o.IdCliente
            Inner Join master_ese_srv_kardex mk on mk.IdServicioEse = o.IdServicioSRV 
            Inner join centros_negocio cn ON c.id_cn = cn.id
            where o.IdModulo=mem.IdModulo
            order by o.IdServicioOS DESC");
          } else{
              $ListadoOS=DB::select("select distinct o.*, FORMAT(o.Costo, 2, 'de_MX') AS costo_moneda, 
              FORMAT(o.PrecioFacturable, 2, 'de_MX') AS factura_moneda, c.nombre_comercial as Cliente, mem.Nombre as modulo,
              concat(o.IdServicioSRV,'-',o.IdCliente ) as idValor,
              concat(mem.Nombre, '#', ms.IdServicioEse) as mascara, cn.nomenclatura as departamento
              from master_ese_srv_os o    
              left join master_ese_srv_modulos mem on mem.IdModulo=o.IdModulo
              Inner join master_ese_srv_servicio ms on ms.IdServicioEse=o.IdServicioSRV
              Inner join clientes c on c.id = o.IdCliente
              Inner Join master_ese_srv_kardex mk on mk.IdServicioEse = o.IdServicioSRV 
              Inner join centros_negocio cn ON c.id_cn = cn.id
              where o.IdModulo=mem.IdModulo
              AND cn.id = ?
              order by o.IdServicioOS DESC", [Auth::user()->idcn]);
             }
             return $ListadoOS; 
    }

    public function listadoAnalistasec(){

        $ListadoOS = DB :: select($this->queryParaFiltrar .' where a.idanalistasec = ?  ORDER BY ms.IdServicioEse DESC', [Auth::user()->id]);

        $BuscarAlgunOSCerrado = DB::select("SELECT * FROM master_ese_srv_dictamen_eval;");
        $BuscarAlgunOSCerradoDos = DB::select("SELECT Estatus from master_ese_srv_dictamen_eval");
        $status = DB::select("SELECT DISTINCT mess.Estatus FROM master_ese_srv_servicio mess WHERE mess.Estatus <> 'Solicitando';");
        $centro_negocio = DB::select("SELECT cn.id, CONCAT(cn.nombre,' (',cn.nomenclatura,')') AS centronegocio FROM centros_negocio cn");


        return view("ESE.listadoOS.listadoOSAnalistaSec",
        ["listadoOS"=>$ListadoOS,
        "BuscarAlgunOSCerrado"=>$BuscarAlgunOSCerrado,
        "BuscarAlgunOSCerradoDos"=>$BuscarAlgunOSCerradoDos,
        "status" => $status,
        "centro_negocio" => $centro_negocio
        ]);
}

    public function listadoNo($id){

    $ListadoOS = DB :: select($this->queryParaFiltrar .' where ms.IdServicioEse ='.$id.' ORDER BY ms.IdServicioEse DESC', [Auth::user()->id]);

    $BuscarAlgunOSCerrado = DB::select("SELECT * FROM master_ese_srv_dictamen_eval;");
    $BuscarAlgunOSCerradoDos = DB::select("SELECT Estatus from master_ese_srv_dictamen_eval");
    $status = DB::select("SELECT DISTINCT mess.Estatus FROM master_ese_srv_servicio mess WHERE mess.Estatus <> 'Solicitando';");
    $centro_negocio = DB::select("SELECT cn.id, CONCAT(cn.nombre,' (',cn.nomenclatura,')') AS centronegocio FROM centros_negocio cn");


    return view("ESE.listadoOS.listadoNo",
    ["listadoOS"=>$ListadoOS,
    "BuscarAlgunOSCerrado"=>$BuscarAlgunOSCerrado,
    "BuscarAlgunOSCerradoDos"=>$BuscarAlgunOSCerradoDos,
    "status" => $status,
    "centro_negocio" => $centro_negocio
    ]);
}

public function filterOsAnalistaSec($paramFilter1,$paramFilter2)
{
    $infoQ = $this->queryParaFiltrar. " where a.idanalistasec = ?";
   

   if($paramFilter1 != '-1'){
        $infoQ .= " AND ms.Estatus = '$paramFilter1'";
   }
   
   if($paramFilter2 != '-1'){
        $infoQ .= " AND cn.id = '$paramFilter2'";
   }

   $infoQ .= " ORDER BY ms.IdServicioEse DESC";
   $info = DB :: select($infoQ, [Auth::user()->id]);

    $tbody = "";
    $tr = "";
    $td = ""; 
    foreach ($info as $LOS) {

        $tr = "";

        $td = ""; 

        $tr .= "<tr>";

            $td .= "<td> $LOS->IdServicioEse </td>";

            $td .= "<td>ESE# $LOS->IdServicioEse </td>";

            $td .= "<td> $LOS->servicio </td>";

            $td .= "<td> $LOS->Cliente </td>";

            $td .= "<td> $LOS->centro_negocio </td>";

            $td .= "<td> $LOS->Candidato </td>";

            $td .= "<td> $LOS->Analista </td>";

            $td .= "<td> $LOS->Investigador </td>";

            $td .= "<td> $LOS->Modalidad </td>";

            $td .= "<td> $LOS->Prioridad </td>";

            $badge = ($LOS->Estatus=='Asignada')?'badge-success':'badge-primary';

            $td .= "<td class=\"text-center\"><span class=\"badge $badge\"> $LOS->Estatus</span></td>";

            $td .= "<td> $LOS->Formato </td>";

            $td .= "<td class=\"text-center\" style=\"width:10%;\">";

            $td .= "<a href=\"ConfiguracionOSEdit/$LOS->IdServicioEse/$LOS->IdCliente\" class=\"btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar Registro\"><i class=\"fa fa-pencil\"></i></a>&nbsp&nbsp

            <input type=\"hidden\"  value=\"\" data-id=\"\">";

            if (Auth::user()->tipo != "c"){

                $td .= "<button type=\"submit\" class=\"btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Eliminar Registro\">
                            <i class=\"fa fa-trash-o\"></i>
                        </button>";

            }
            if (Auth::user()->tipo == "c"){
                $name = Auth::user()->name;
                $td .= "<button class=\"btn btn-danger btn-icon btn-circle btn-sm\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Cancelar Registro\" onclick=\"cancelService( $LOS->os ,$LOS->IdPlantillaCliente,$LOS->IdCliente,'$name')\"><i class=\"fa fa-ban\" aria-hidden=\"true\"></i></button>";   
            }

        $td .= "</td>";

        $tr .=  $td; 

        $tr .= "</tr>";

        $tbody .= $tr;

    }
    return $tbody;
}
}
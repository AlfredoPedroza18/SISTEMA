<?php


namespace App\Http\Controllers\Nomina;


use App\Http\Controllers\Controller;
use DB;
use Fpdf\Fpdf;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;

class ReciboPDFController extends Controller
{

    public function Bnom(Request $request)
    {
        setlocale(LC_MONETARY,"es_MX");

        $id = $request->input('per');
        $idnom = $request->input('nom');
        $idEmp=$request->input('emp');
         $cod="-1";
        $vis="-1";
        $imp="si";

        $titulo="";
        $direccion="";
        $rfc="";
        $reg="";
        $nombre="";
        $rfcP="";
        $curp="";
        $imss="";
        $puesto="";
        $departamento="";
//            $logotipo="";
        $selloSAT='';
        $selloCFDI='';
        $nCertificado='';
        $version='';
        $fechatimbre='';
        $foliofiscal='';
        $certificadoSAT='';

        $fecha1="";
        $fecha2="";
        $fechaAntiguedad="";
        $salarioDiario="";
        $salarioDiarioIntegrado="";
        $PerC[]="";
        $PerN[]= "";
        $PerV[]= "";
        $DedC[]= "";
        $DedN[]= "";
        $DedV[]= "";


        $datosPer=DB::select('
select
    e.Logotipo,
    e.RazonSocial as ERazonSocial,
    e.Calle as ECalle, e.NoExt as ENoExt, e.Colonia as EColonia, e.CP as ECP,
    e.Rfc as ERfc, e.RegPatronal as ERegPatronal,

  p.IdPersonal,
  p.CodigoPersonal,
  p.APaterno as PAPaterno,
  p.AMaterno as PAMaterno,
  p.Nombre as PNombre,
  p.Rfc as RfcPersonal,
  p.Curp as CurpPersonal,
  p.NSS as IMSSPersonal,
  mp.Nombre as Puesto,
  md.FK_Nombre as Departamento,
  rp.sRegistroPatronal as RegPatronal,

  co.Antiguedad as FechaAntiguedad,
  co.Ingreso as FechaReingreso,
 Round(( Select DATEDIFF(FechaReingreso, FechaAntiguedad))/365,2) as Ant1,
 Round(( Select DATEDIFF( n.FechaTerminoNomina, FechaReingreso) )/365,2) as Ant2,
 (Select Ant1 + Ant2) as AntiguedadTotal,
 (Select Round(AntiguedadTotal,0)) as AntiguedadInteger,

 ifnull(prd.Factor,1) AS FactorInt,
 ifnull(prd.Vacaciones,0) as DiasVacaciones,
 ifnull(prd.Prima,0) as PrimaVacacional,
 ifnull(prd.Aguinaldo,0) as DiasAguinaldo,

 tisn.EntidadFederativa,
 tisnd.Tasa as TasaISN,

 co.SalarioDiario,
 round((Select FactorInt * SalarioDiario),2) as SalarioDiarioIntegrado,

 tim.IdIMSS,
 tim.FechaAplicacion,
 tim.TopeEyM,
 tim.TopeIM,
 tim.CuotaFija,
 tim.ExcedentePatronal,
 tim.DineroPatronal,
 tim.GastosPatronal,
 tim.Retiro,
 tim.Guarderias,
 tim.IVPatronal,
 tim.CVPatronal,
 tim.InfAportPatronal,
 tim.InfSegDesempleoObrero,
 tim.Infonavit,
 tim.ExcedenteObrero,
 tim.DineroObrero,
 tim.GastosObrero,
 tim.IVObrero,
 tim.CVObrero,

 uma.FechaAplicacion as FechaAplicacionUMA,
 uma.Diario AS DiarioUMA,
 uma.Mensual AS MensualUMA,
 uma.Anual AS AnualUMA,

smi.FechaAplicacion as FechaAplicacionSM,
 smi.ZonaA as SalMinA,
 smi.ZonaB as SalMinB,
 smi.ZonaC as SalMinC,

 n.IdNomina,
 n.IdTipoNomina,
 tn.FK_TituloNomina as TipoNomina,
 n.FechaNomina as FechaInicioNomina,
 n.FechaTerminoNomina,
 if( co.Inicio>n.FechaNomina, co.Inicio, n.FechaNomina) as FechaInicioReal,
 (n.FechaTerminoNomina - (Select FechaInicioReal)+1) as DiasPeriodo,
 (n.FechaTerminoNomina - (Select FechaInicioReal)+1) as DiasNomina,
 n.Dias as DiasNomina,
 DAY(LAST_DAY(n.FechaTerminoNomina)) AS DiasDelMes,

 DomingosEnPeriodo(n.FechaNomina,n.FechaTerminoNomina) as Num_Domingos,

 mt.Descripcion,
 ifnull(mt.HorasJornadas,8) as HorasJornadas,


 nt.UUID,
 nt.SelloCFDI,
 nt.SelloSat,
 nt.CadenaOriginal,
 nt.NoCertificadoSat,
 nt.FechaTimbrado,
 nt.Qr,
 nt.NoSerieEmisor
from master_personal p

left join
  rh_contratacion as co on (co.IdPersonal = p.IdPersonal and co.IdContratacion= (Select max(IdContratacion) from rh_contratacion where Idpersonal = p.Idpersonal))
left join master_puesto mp on co.IdPuesto = mp.IdPuesto
left join master_departamento md on co.IdDepartamento = md.IdDepartamento
left join master_empresa e on e.IdEmpresa=p.IdEmpresa
left join nom_registrospatronales rp on rp.IdRegistroPatronal=co.IdRegistroPatronal

left join nom_tiponomina tn on (co.IdTipoNomina = tn.IdTipoNomina)
left join nom_nomina n on (n.IdNomina = '.$idnom.')
 left join nom_timbrado nt on nt.IdNomina=n.IdNomina and co.IdPersonal = nt.IdPersonal

LEFT join master_turnos mt on co.IdTurno = mt.IdTurnos

left join nom_tabla_imss tim on (tim.FechaAplicacion=(Select Max(FechaAplicacion) from nom_tabla_imss))
left join nom_tabla_uma uma on ( uma.FechaAplicacion=(Select Max(FechaAplicacion) from nom_tabla_uma))
left join nom_tabla_salariominimo as smi on (smi.FechaAplicacion= (Select Max(FechaAplicacion) from nom_tabla_salariominimo))

left join nom_prestaciones pr on pr.IdPrestaciones=co.IdTablaPrestaciones
left join nom_prestaciones_detalle prd on pr.IdPrestaciones = prd.IdPrestaciones and prd.Anio = Round(((DateDiff(co.Ingreso, co.Antiguedad)/365)+(DateDiff(n.FechaTerminoNomina , co.Ingreso ) /365)),0)

left join nom_tabla_isn tisn on co.IdTablaISN = tisn.IdTablaISN
left join nom_tabla_isn_detalle tisnd on tisn.IdTablaISN = tisnd.IdTablaISN AND tisnd.FechaAplicacion = (Select max(FechaAplicacion) from nom_tabla_isn_detalle where IdTablaISN = tisn.IdTablaISN)
where
 (('.$id.'= -1 or ('.$id.' <> -1 and p.IdPersonal = '.$id.')) and
          ('.$idEmp.'= -1 or ('.$idEmp.' <> -1 and p.IdEmpresa = '.$idEmp.' or isnull(p.IdEmpresa))) and
  ('.$cod.' = -1 or ('.$cod.' <> -1 and FIND_IN_SET(p.CodigoPersonal, '.$cod.'))) and
  ('.$idnom.' = -1 or ('.$idnom.'<>-1 and '.$idnom.'=n.IdNomina)))');

        $datos=DB::select('select
  DATE_FORMAT((Select FechaNomina), "%d %b %Y") as FechaNomina, DATE_FORMAT((Select FechaTerminoNomina), "%d %b %Y") as FechaTerminoNomina,
  nd.IdNominaDetalle,
  tn.FK_TituloNomina,
  c.CodigoConcepto,
  c.Clave,
  c.Nombre as CNombre,
	c.Activo,
    -- Antiguedad y salarios
  co.Antiguedad as FechaAntiguedad,
  co.Ingreso as FechaReingreso,
 Round(( Select DATEDIFF(FechaReingreso, FechaAntiguedad))/365,2) as Ant1,
 Round(( Select DATEDIFF( n.FechaTerminoNomina , FechaReingreso) )/365,2) as Ant2,
 (Select Ant1 + Ant2) as AntiguedadTotal,
 (Select Round(AntiguedadTotal,0)) as AntiguedadInteger,
 co.SalarioDiario,
 ifnull((Select BuscarFactorIntegracion( co.IdTablaPrestaciones, Round(AntiguedadTotal,0) )),1) as FactorInt,
 round((Select FactorInt * SalarioDiario),2) as SalarioDiarioIntegrado,

 nr.MontoValor as ValorConcepto,
 LEFT(c.Modo, 3) as T,

c.Modo

from nom_nomina n
inner join nom_nominadetalle nd on nd.IdNomina = n.IdNomina
inner join nom_tiponomina tn on n.IdTipoNomina = tn.IdTipoNomina
inner join nom_nominadetalle_resultados nr on (nr.IdNominaDetalle = nd.IdNominaDetalle and nr.MontoValor <> 0)
left join nom_concepto c on ( nr.IdConcepto = c.IdConcepto) and c.IdEmpresa = nd.IdEmpresa
inner join master_personal p on p.IdPersonal = nd.IdPersonal
left join
  rh_contratacion as co on (co.IdPersonal = p.IdPersonal and co.IdContratacion= (Select max(IdContratacion) from rh_contratacion where Idpersonal = p.Idpersonal))
where
  ('.$id.' = -1 or ('.$id.' <> -1 and FIND_IN_SET(p.IdPersonal, '.$id.'))) and
  ('.$cod.' = -1 or ('.$cod.' <> -1 and FIND_IN_SET(p.CodigoPersonal, '.$cod.'))) and
  ('.$idnom.' = -1 or ('.$idnom.'<>-1 and '.$idnom.'=n.IdNomina)) and

   ('.$vis.'=-1 or ('.$vis.'<>-1 and '.$vis.' = c.Visible)) and
   ("'.$imp.'"=-1 or ("'.$imp.'"<>-1 and "'.$imp.'" = c.Imprime))
   and c.Activo="Si" and c.Aplica="Si"
  order by c.CodigoConcepto asc');

        foreach ($datosPer as $dat)
        {

            $titulo=$dat->ERazonSocial;
            $direccion='Calle '.$dat->ECalle.' '.$dat->ENoExt.', Col. '.$dat->EColonia.', CP: '.$dat->ECP;
            $rfc=$dat->ERfc;
            $reg=$dat->ERegPatronal;
            $nombre=$dat->PNombre.' '.$dat->PAPaterno.' '.$dat->PAMaterno;
            $rfcP=$dat->RfcPersonal;
            $curp=$dat->CurpPersonal;
            $imss=$dat->IMSSPersonal;
            $puesto=$dat->Puesto;
            $departamento=$dat->Departamento;
            $selloSAT=$dat->SelloSat;
            $selloCFDI=$dat->SelloCFDI;
            $nCertificado=$dat->NoSerieEmisor;
            $fechatimbre=$dat->FechaTimbrado;
            $foliofiscal=$dat->UUID;
            $certificadoSAT=$dat->NoCertificadoSat;

            $logotipo='data://text/plain;base64,'.base64_encode($dat->Logotipo);
           /* $ruta=base64_decode($dat->Logotipo);
            $destino='assets/img/login-bg/';
            copy($ruta,$destino);*/


        }
        foreach ($datos as $dat1)
        {
            $fecha1=$dat1 -> FechaNomina;
            $fecha2=$dat1 -> FechaTerminoNomina;
            $fechaAntiguedad=$dat1 ->FechaAntiguedad;
            $salarioDiario=$dat1 ->SalarioDiario;
            $salarioDiarioIntegrado=$dat1 ->SalarioDiarioIntegrado;

        }
       // echo "<img WIDTH='400' HEIGHT='600' src='".$logotipo. "' /> ";
        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->Image('assets/img/login-bg/gen-t-recursos-humano.jpg',10,8,33, 33);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(80);
        $pdf->Cell(30,10,$titulo,0,0,'C');
        $pdf->Ln(5);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 15, "Calle: ".$direccion, 0, 0, 'C');
        $pdf->Ln(5);

        $pdf->Cell(0, 15, "Folio: ", 0, 0, 'R');
        $pdf->Ln(5);

        $pdf->Cell(0, 15, "RFC:".$rfc, 0, 0, 'L');
        $pdf->Cell(0, 15, "Tipo de Comprobante: ", 0, 0, 'R');
        $pdf->Ln(5);

        $pdf->Cell(0, 15, "Registro Patronal IMMS: ".$reg, 0, 0, 'L');
        $pdf->Cell(0, 15, "Fecha de Comprobante: ", 0, 0, 'R');
        $pdf->Ln(15);

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetFillColor(88,190, 251);
        $pdf->cell(0, 6, "COMPROBANTE DE NOMINA",'B', 0, 'C', true);
        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 10);
        $pdf->cell(0, 0, "Número: ",'0', 0, 'L');
        $pdf->SetY(52);$pdf->SetX(150);
        $pdf->cell(0, 4, "Periodo de Pago",'B', 0, 'C');
        $pdf->Ln(10);

        $pdf->SetY(60);
        $pdf->cell(0, 0, "Nombre: ".$nombre,'0', 0, 'L');
        $pdf->SetFont('Arial', '', 8);

        $pdf->SetY(59);$pdf->SetX(125);
        $pdf->cell(0, 0, "del",'0', 0, 'C');
        $pdf->SetX(170);
        $pdf->cell(0, 0, "al",'0', 0, 'C');
        $pdf->Ln(4);
        $pdf->SetX(125);
        $pdf->SetFont('Arial', '', 9);
        $pdf->cell(0, 0, "".$fecha1,'0', 0, 'C');
        $pdf->SetX(170);
        $pdf->cell(0, 0, "".$fecha2,'0', 0, 'C');
        $pdf->Ln(1);

        $pdf->SetY(66);
        $pdf->SetFont('Arial', '', 10);
        $pdf->cell(55, 0, "RFC: ".$rfcP,'0', 0, 'L');
        $pdf->cell(50, 0, "CURP: ".$curp,'0', 0, 'L');
        $pdf->Ln(6);
        $pdf->cell(100, 0, "IMSS: ".$imss,'0', 0, 'L');
        $pdf->cell(85, 0, "Fecha de ingreso: ".$fechaAntiguedad,'0', 0, 'L');
        $pdf->Ln(6);
        $pdf->cell(100, 0, "Departamento: ".$departamento,'0', 0, 'L');
        $pdf->cell(85, 0, "Salario Diario: ".$salarioDiario,'0', 0, 'L');
        $pdf->Ln(6);
        $pdf->cell(100, 0, "Puesto: ".$puesto,'0', 0, 'L');
        $pdf->cell(85, 0, "Salario Diario Integrado: ".$salarioDiarioIntegrado,'0', 0, 'L');
        $pdf->Ln(6);


        $pdf->cell(0, 0, "",'B', 0, 'C');
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->SetFillColor(88,190, 251);
        $pdf->cell(20, 5, "Clave",'0', 0, 'C', true);
        $pdf->cell(45, 5, "Percepción",'0', 0, 'C', true);
        $pdf->cell(25, 5, "Monto",'0', 0, 'C', true);
        $pdf->cell(10, 0, "",'0', 0, 'C');
        $pdf->cell(20, 5, "Clave",'0', 0, 'C', true);
        $pdf->cell(45, 5, "Deducción",'0', 0, 'C', true);
        $pdf->cell(25, 5, "Monto",'0', 0, 'C', true);
        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 8);
        $pdf->SetFillColor(255,255, 255);

        foreach ($datos as $datosNom) {


            if ($datosNom->T == 'PER') {

                $PerC[] = $datosNom->CodigoConcepto;
                $PerN[] = $datosNom->CNombre;
                $PerV[] = $datosNom->ValorConcepto;
            } elseif ($datosNom->T == 'DED') {

                $DedC[] = $datosNom->CodigoConcepto;
                $DedN[] = $datosNom->CNombre;
                $DedV[] = $datosNom->ValorConcepto;


            }

        }
        $TotalPer=0;
        $TotalDed=0;
        $Total=0;

        IF(count($PerC)>0){
            for ($i=1; $i<count($PerC); $i++){

                $CodigoPer=$PerC[$i];
                $NombrePer=$PerN[$i];
                $ValorPerF=number_format($PerV[$i],2, '.',',');
                $CodigoDed=$DedC[$i];
                $NombreDed=$DedN[$i];
                $ValorDedF=number_format($DedV[$i],2, '.',',');
                $TotalPer=$TotalPer+$PerV[$i];
                $TotalDed=$TotalDed+$DedV[$i];

                $pdf->cell(18, 0,$CodigoPer , '0', 0, 'C', true);
                $pdf->cell(44, 0, $NombrePer, '0', 0, 'L', true);
                $pdf->cell(23, 0, "$ ".$ValorPerF, '0', 0, 'R', true);
                $pdf->cell(14, 0, "", '0', 0, 'C');
                $pdf->cell(18, 0, $CodigoDed, '0', 0, 'C', true);
                $pdf->cell(44, 0, $NombreDed, '0', 0, 'L', true);
                $pdf->cell(24, 0, "$ ".$ValorDedF, '0', 0, 'R', true);
                $pdf->Ln(5);
            }
            if($TotalPer>$TotalDed){
                $Total=$TotalPer-$TotalDed;
            }else{
                $Total=$TotalDed-$TotalPer;
            }
        }

        $pdf->Ln(8);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->cell(60, 0, "Total de Percepciones: ",'0', 0, 'C');
        $pdf->cell(30, 0, "$ ".number_format($TotalPer,2, '.',','),'0', 0, 'C');
        $pdf->cell(10, 0, " ",'0', 0, 'C');
        $pdf->cell(60, 0, "Total de Deducciones: ",'0', 0, 'C');
        $pdf->cell(30, 0, "$ ".number_format($TotalDed,2, '.',','),'0', 0, 'C');

        $pdf->Ln(7);
        $pdf->cell(100, 0, " ",'0', 0, 'C');
        $pdf->cell(60, 0, "Total Pagado: ",'0', 0, 'C');
        $pdf->cell(30, 0, "$ ".number_format($Total,2, '.',','),'0', 0, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetFillColor(88,190, 251);
        $pdf->cell(0, 6, "Sello Digital del CFDI",'B', 0, 'C', true);
        $pdf->Ln(4);
        $pdf->cell(0, 0,$selloCFDI ,'0', 0, 'C', true);
        $pdf->Ln(13);

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetFillColor(88,190, 251);
        $pdf->cell(0, 6, "Sello del SAT",'B', 0, 'C', true);
        $pdf->Ln(4);
        $pdf->cell(0, 0,$selloSAT ,'0', 0, 'C', true);
        $pdf->Ln(13);

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetFillColor(88,190, 251);
        $pdf->cell(0, 6, "Certificado Original del Complemento de Certificado Digital del SAT",'B', 0, 'C', true);
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 9);
        $pdf->cell(60, 0, " ",'0', 0, 'C');
        $pdf->cell(0, 0, "No. Certificado: ".$nCertificado,'0', 0, 'L');
        $pdf->Ln(6);
        $pdf->cell(60, 0, " ",'0', 0, 'C');
        $pdf->cell(0, 0, "Versión: 1.1",'0', 0, 'L');
        $pdf->Ln(6);
        $pdf->cell(60, 0, " ",'0', 0, 'C');
        $pdf->cell(0, 0, "Fecha de Timbre: ".$fechatimbre,'0', 0, 'L');
        $pdf->Ln(6);
        $pdf->cell(60, 0, " ",'0', 0, 'C');
        $pdf->cell(0, 0, "Folio Fiscal: ".$foliofiscal,'0', 0, 'L');
        $pdf->Ln(6);
        $pdf->cell(60, 0, " ",'0', 0, 'C');
        $pdf->cell(0, 0, "Certificado SAT: ".$certificadoSAT,'0', 0, 'L');

        $pdf->Ln(30);
       $pdf->cell(0, 0, "Este documento es una representación impresa de un CFDI ",'0', 0, 'C');


        $pdf->Output('D', 'ReciboEmpleado_'.date("Y-m-d_H:i:s").'.pdf', true);
    }


   public function getImage($dataURI){
        $img = explode(',',$dataURI,2);
        $pic = 'data://text/plain;base64,'.$img[1];
        $type = explode("/", explode(':', substr($dataURI, 0, strpos($dataURI, ';')))[1])[1]; // get the image type
        if ($type=="png"||$type=="jpeg"||$type=="gif") return array($pic, $type);
        return false;
      }


    public function DetalleNom(Request $request)
    {
      $idnom = $request->input('nom');
      $idEmp=$request->input('emp');
      //echo $idnom;
      $Nombre="";$rfc="";$rp="";$domicilio="";$cp="";$col="";
      $empresa=DB::select("select * from master_empresa where IdEmpresa = {$idEmp}");

        $nom='Select
            p.IdPersonal,
            co.SalarioDiario,
            n.Dias,n.Codigo,n.Titulo,n.Anio,tn.Etiqueta,
            p.Curp as CURPPersonal,
            p.NSS as IMSSPersonal,
            mp.Codigo as pCod,
            mp.Nombre as Puesto,
            md.FK_Nombre as Departamento,
            rp.sRegistroPatronal as RegPatronal,
            co.IdCliente,
            co.IdGerencia,
            (Select Nombre from master_clientes where IdCliente = co.IdCliente) as cliente,
            (Select Codigo from master_clientes where IdCliente = co.IdCliente) as CodCliente,
            (Select Descripcion from master_gerencia where IdGerencia = co.IdGerencia) as gerencia,
            (Select Codigo from master_gerencia where IdGerencia = co.IdGerencia) as CodGerencia,
            emp.RazonSocial,
            emp.Logotipo,
            emp.Rfc,
            emp.RegPatronal,
            p.IdPersonal,
            nd.IdNominaDetalle,
            tn.FK_TituloNomina,
            c.CodigoConcepto,
            c.Clave,
            c.Nombre,

            co.Antiguedad as FechaAntiguedad,
            co.Ingreso as FechaReingreso,
           Round(( Select DATEDIFF(FechaReingreso, FechaAntiguedad))/365,2) as Ant1,
           Round(( Select DATEDIFF( n.FechaTerminoNomina , FechaReingreso) )/365,2) as Ant2,
           (Select Ant1 + Ant2) as AntiguedadTotal,
            co.SalarioDiario,
            ifnull((Select BuscarFactorIntegracion( co.IdTablaPrestaciones, Round(AntiguedadTotal,0) )),1) as FactorInt,
            round((Select FactorInt * SalarioDiario),2) as SalarioDiarioIntegrado,

            concat(
           p.CodigoPersonal,":",p.Nombre, " " , p.APaterno, " " ,
           -- p.AMaterno,"|", md.IdDepartamento,":",md.FK_Nombre, "|","RFC:",
           p.AMaterno,"|",ifnull( md.IdDepartamento,""),":",ifnull(md.FK_Nombre,""), "|","RFC:",
           p.Rfc,"|","CURP:",p.Curp,"|","SD: $",
           co.SalarioDiario, " ","SDI: $",
           (if(round((Select FactorInt * SalarioDiario),2) is null,0,round((Select FactorInt * SalarioDiario),2)))) as Personal,

            nr.MontoValor as ValorConcepto,
            LEFT(c.Modo, 3) as T,
            if(LEFT(c.Modo, 3)="PER",(Select ValorConcepto),"") as Percepcion,
            if(LEFT(c.Modo, 3)="DED",(Select ValorConcepto),"") as Deduccion,
            if ((Select T)="PER","PERCEPCION",
              IF ((Select T)="DED","DEDUCCION", c.Modo)
            ) as Modo
          from nom_nomina n
          inner join nom_nominadetalle nd on nd.IdNomina = n.IdNomina
          inner join nom_nominadetalle_resultados nr on (nr.IdNominaDetalle = nd.IdNominaDetalle and nr.MontoValor > 0)
          inner join nom_tiponomina tn on n.IdTipoNomina = tn.IdTipoNomina
          left join nom_concepto c on ( nr.IdConcepto = c.IdConcepto)
          inner join master_personal p on p.IdPersonal = nd.IdPersonal
          inner join master_empresa emp on emp.IdEmpresa = nd.IdEmpresa
          left join
          rh_contratacion as co on (co.IdPersonal = p.IdPersonal and co.IdContratacion= nd.IdContrato)
          left join master_puesto mp on co.IdPuesto = mp.IdPuesto
          left join master_departamento md on co.IdDepartamento = md.IdDepartamento
          left join nom_registrospatronales rp on rp.IdRegistroPatronal=co.IdRegistroPatronal
          where
          n.IdNomina = '.$idnom.' and c.Imprime="Si" and nd.IdNominaDetalle is not null order by Departamento,p.IdPersonal,CodigoConcepto';

      foreach ($empresa as $d) {
        $Nombre=$d->FK_Titulo;
        $rfc=$d->Rfc;
        $rp=$d->RegPatronal;
        $domicilio=$d->Calle.' No. '.$d->NoExt;
        $col=$d->Colonia;
        $cp=$d->CP;
      }

      $detalle=DB::select($nom);
      $numero_filas = count($detalle) - 1;
      if($numero_filas>0){

        $personal="";$cliente='';$nm='';
      $exp;$id="";$tn='';$anio='';
      $detalle;$det='';$aux='';
      $Codigo='';$Titulo='';$Anio='';$Etiqueta='';
      $tper=0;$tdep=0;$dep='';
      $dias='';$numP='';$persecion='';$MontoP='';
      $numD='';$deduccion='';$MontoD='';$idPersonal=0;
      foreach ($detalle as $g) {$idPersonal=$g->IdPersonal; break;}
      foreach ($detalle as $g) {

        $cliente=$g->CodCliente;
        $Codigo=$g->Codigo;
        $Titulo=$g->Titulo;
        $Anio=$g->Anio;
        $Etiqueta=$g->Etiqueta;

        $dias='<tr><td>'.$g->Dias.'</td></tr>';

        if($idPersonal==$g->IdPersonal){

            if($g->Modo==="PERCEPCION"){
                $numP.='<tr><td>'.$g->CodigoConcepto.'</td></tr>';
                $persecion.='<tr><td>'.$g->Nombre.'</td></tr>';
                $MontoP.='<tr><td>'.number_format($g->Percepcion, 2, '.', ',').'</td></tr>';
                $tper=$tper+$g->Percepcion;
            }else if($g->Modo==="DEDUCCION"){
                $numD.='<tr><td>'.$g->CodigoConcepto.'</td></tr>';
                $deduccion.='<tr><td>'.$g->Nombre.'</td></tr>';
                $MontoD.='<tr><td>'.number_format($g->Deduccion, 2, '.', ',').'</td></tr>';
                $tdep=$tdep+$g->Deduccion;
            }
        }else{
          $exp=explode('|',$g->Personal);
          $personal= '<tr><td style="padding-left:30px; font-size:12px"><strong> Departamento Nombre: '.$exp[1].'</strong></td></tr> <tr><td>'.$exp[0].'</td></tr> <tr><td>'.$exp[1].'</td></tr>
          <tr><td>'.$exp[2].'</td></tr> <tr><td>'.$exp[3].'</td></tr> <tr><td>'.$exp[4].'</td></tr>';

          $det=$det.'<table style="width: 100%; font-size:10px;"><tr>
            <td style="width: 25%; "> <table>'.$personal.'</table></td>
            <td style="width: 5%; "> <table >'.$dias.'</table></td>
            <td style="width: 5%;"><table>'.$numP.'</table></td>
            <td style="width: 20%;"> <table>'.$persecion.'</table></td>
            <td style="width: 10%; text-align:right;"> <table>'.$MontoP.'</table></td>
            <td style="width: 5%;"> <table>'.$numD.'</table></td>
            <td style="width: 20%;"> <table>'.$deduccion.'</table></td>
            <td style="width: 10%; text-align:right;"> <table>'.$MontoD.'</table></td>
          </tr>
          <tr>
            <td style="width: 25%; "> <strong> TOTAL NETO:</strong></td>
            <td style="width: 5%; > '.number_format(($tper-$tdep), 2, '.', ',').'</td>
            <td style="width: 5%;"></td>
            <td style="width: 20%;"> <strong> PERCEPCIONES:</strong></td>
            <td style="width: 11%;"> '.number_format($tper, 2, '.', ',').'</td>
            <td style="width: 5%;"> </td>
            <td style="width: 20%;"> <strong> DEDUCCIONES:</strong></td>
            <td style="width: 11%;"> '.number_format($tdep, 2, '.', ',').'</td>
          </tr>
          </table> <hr>';
          $dias='';$numP='';$persecion='';$MontoP='';
          $numD='';$deduccion='';$MontoD='';
          $tper=0;$tdep=0;
          if($g->Modo==="PERCEPCION"){
              $numP.='<tr><td>'.$g->CodigoConcepto.'</td></tr>';
              $persecion.='<tr><td>'.$g->Nombre.'</td></tr>';
              $MontoP.='<tr><td>'.number_format($g->Percepcion, 2, '.', ',').'</td></tr>';
              $tper=$tper+$g->Percepcion;
          }else if($g->Modo==="DEDUCCION"){
              $numD.='<tr><td>'.$g->CodigoConcepto.'</td></tr>';
              $deduccion.='<tr><td>'.$g->Nombre.'</td></tr>';
              $MontoD.='<tr><td>'.number_format($g->Deduccion, 2, '.', ',').'</td></tr>';
              $tdep=$tdep+$g->Deduccion;
          }
        }

        $idPersonal=$g->IdPersonal;
          $aux='<table style="width: 100%; font-size:10px;"><tr>
          <td style="width: 25%; "> <table>'.$personal.'</table></td>
          <td style="width: 5%; "> <table >'.$dias.'</table></td>
          <td style="width: 5%;"><table>'.$numP.'</table></td>
          <td style="width: 20%;"> <table>'.$persecion.'</table></td>
          <td style="width: 10%; text-align:right;"> <table>'.$MontoP.'</table></td>
          <td style="width: 5%;"> <table>'.$numD.'</table></td>
          <td style="width: 20%;"> <table>'.$deduccion.'</table></td>
          <td style="width: 10%; text-align:right;"> <table>'.$MontoD.'</table></td>
        </tr>
        <tr>
          <td style="width: 25%; "> <strong> TOTAL NETO:</strong></td>
          <td style="width: 5%; > '.number_format(($tper-$tdep), 2, '.', ',').'</td>
          <td style="width: 5%;"></td>
          <td style="width: 20%;"> <strong> PERCEPCIONES:</strong></td>
          <td style="width: 11%;"> '.number_format($tper, 2, '.', ',').'</td>
          <td style="width: 5%;"> </td>
          <td style="width: 20%;"> <strong> DEDUCCIONES:</strong></td>
          <td style="width: 11%;"> '.number_format($tdep, 2, '.', ',').'</td>
        </tr>
        </table> <hr>';
      }

      $sqlDep='Select
            md.IdDepartamento,
            p.IdPersonal,
            count(p.IdPersonal) as numPersonas,
            c.CodigoConcepto,
            md.FK_Nombre as Departamento,
            c.Nombre,
            nr.MontoValor,
            LEFT(c.Modo, 3) as T,
            if(LEFT(c.Modo, 3)="PER",(SUM(nr.MontoValor)),"") as Percepcion,
            if(LEFT(c.Modo, 3)="DED",(SUM(nr.MontoValor)),"") as Deduccion,
            if ((Select T)="PER","PERCEPCION",
              IF ((Select T)="DED","DEDUCCION", c.Modo)
            ) as Modo
          from nom_nomina n
          inner join nom_nominadetalle nd on nd.IdNomina = n.IdNomina
          inner join nom_nominadetalle_resultados nr on (nr.IdNominaDetalle = nd.IdNominaDetalle and nr.MontoValor > 0)
          inner join nom_tiponomina tn on n.IdTipoNomina = tn.IdTipoNomina
          left join nom_concepto c on ( nr.IdConcepto = c.IdConcepto)
          inner join master_personal p on p.IdPersonal = nd.IdPersonal
          inner join master_empresa emp on emp.IdEmpresa = nd.IdEmpresa
          left join
          rh_contratacion as co on (co.IdPersonal = p.IdPersonal and co.IdContratacion= nd.IdContrato)
          left join master_puesto mp on co.IdPuesto = mp.IdPuesto
          left join master_departamento md on co.IdDepartamento = md.IdDepartamento
          left join nom_registrospatronales rp on rp.IdRegistroPatronal=co.IdRegistroPatronal
          where
          n.IdNomina = '.$idnom.' and c.Imprime="Si" and nd.IdNominaDetalle is not null
          group by Departamento, CodigoConcepto
          order by Departamento, p.IdPersonal, CodigoConcepto';

      $NomDep=DB::select($sqlDep);
      $Departamento='';$idper=0;
       foreach ($NomDep as $g) {$Departamento=$g->Departamento; break;}
      $numP='';$persecion='';$MontoP='';
      $numD='';$deduccion='';$MontoD='';
      $Departamento='';$depart='';$c=0;$departAux='';
      $nun='';$tdep=0;$tper=0;
      foreach ($NomDep as $g) {
        if($Departamento==$g->Departamento){

          if($g->Modo=="PERCEPCION"){
              $numP.='<tr><td>'.$g->CodigoConcepto.'</td></tr>';
              $persecion.='<tr><td>'.$g->Nombre.'</td></tr>';
              $MontoP.='<tr><td>'.number_format($g->Percepcion, 2, '.', ',').'</td></tr>';
              $tper=$tper+$g->Percepcion;
          }else if($g->Modo=="DEDUCCION"){
              $numD.='<tr><td>'.$g->CodigoConcepto.'</td></tr>';
              $deduccion.='<tr><td>'.$g->Nombre.'</td></tr>';
              $MontoD.='<tr><td>'.number_format($g->Deduccion, 2, '.', ',').'</td></tr>';
              $tdep=$tdep+$g->Deduccion;
          }
        }else{
            $depart=$depart.'<tr>
              <td colspan="8" style="background:#bad4ff;border-top-style:solid; border-top-width:1px;">Departamento Nombre:'.$Departamento.'
              <br><br># Empleados:'.$nun.'</td></tr><tr>
              <td style="width: 25%; "> </td>
              <td style="width: 5%; "> </td>
              <td style="width: 5%;"><table>'.$numP.'</table></td>
              <td style="width: 20%;"> <table>'.$persecion.'</table></td>
              <td style="width: 10%; text-align:right;"> <table>'.$MontoP.'</table></td>
              <td style="width: 5%;"> <table>'.$numD.'</table></td>
              <td style="width: 20%;"> <table>'.$deduccion.'</table></td>
              <td style="width: 10%; text-align:right;"> <table>'.$MontoD.'</table></td>

            </tr>
            <tr>
              <td colspan="2" style="padding-top:-10px"> <hr> </td>
              <td></td>
              <td colspan="2" style="padding-top:-10px"> <hr> </td>
              <td></td>
              <td colspan="2" style="padding-top:-10px"> <hr> </td>

            </tr>
            <tr>
              <td style="width: 25%; background:#e0e0e0;"> <strong> TOTAL NETO:</strong></td>
              <td style="width: 5%; > '.number_format(($tper-$tdep), 2, '.', ',').'</td>
              <td style="width: 5%;"></td>
              <td style="width: 20%; background:#e0e0e0;"> <strong> PERCEPCIONES:</strong></td>
              <td style="width: 10%;"> '.number_format($tper, 2, '.', ',').'</td>
              <td style="width: 5%;"> </td>
              <td style="width: 20%; background:#e0e0e0;"> <strong> DEDUCCIONES:</strong></td>
              <td style="width: 10%;"> '.number_format($tdep, 2, '.', ',').'</td>
            </tr>';
            $dias='';$numP='';$persecion='';$MontoP='';
            $numD='';$deduccion='';$MontoD='';
            $tper=0;$tdep=0;
            if($g->Modo=="PERCEPCION"){
                $numP.='<tr><td>'.$g->CodigoConcepto.'</td></tr>';
                $persecion.='<tr><td>'.$g->Nombre.'</td></tr>';
                $MontoP.='<tr><td>'.number_format($g->Percepcion, 2, '.', ',').'</td></tr>';
                $tper=$tper+$g->Percepcion;
            }else if($g->Modo=="DEDUCCION"){
                $numD.='<tr><td>'.$g->CodigoConcepto.'</td></tr>';
                $deduccion.='<tr><td>'.$g->Nombre.'</td></tr>';
                $MontoD.='<tr><td>'.number_format($g->Deduccion, 2, '.', ',').'</td></tr>';
                $tdep=$tdep+$g->Deduccion;
            }

        }
        $departAux='<tr>
          <td colspan="8" style="background:#bad4ff;border-top-style:solid; border-top-width:1px;">Departamento Nombre:'.$Departamento.'
          <br><br># Empleados:'.$nun.'</td></tr><tr>
          <td style="width: 25%; "> </td>
          <td style="width: 5%; "> </td>
          <td style="width: 5%;"><table>'.$numP.'</table></td>
          <td style="width: 20%;"> <table>'.$persecion.'</table></td>
          <td style="width: 10%; text-align:right;"> <table>'.$MontoP.'</table></td>
          <td style="width: 5%;"> <table>'.$numD.'</table></td>
          <td style="width: 20%;"> <table>'.$deduccion.'</table></td>
          <td style="width: 10%; text-align:right;"> <table>'.$MontoD.'</table></td>

        </tr>
        <tr>
          <td colspan="2" style="padding-top:-10px"> <hr> </td>
          <td></td>
          <td colspan="2" style="padding-top:-10px"> <hr> </td>
          <td></td>
          <td colspan="2" style="padding-top:-10px"> <hr> </td>

        </tr>
        <tr>
          <td style="width: 25%; background:#e0e0e0;"> <strong> TOTAL NETO:</strong></td>
          <td style="width: 5%; > '.number_format(($tper-$tdep), 2, '.', ',').'</td>
          <td style="width: 5%;"></td>
          <td style="width: 20%; background:#e0e0e0;"> <strong> PERCEPCIONES:</strong></td>
          <td style="width: 10%;"> '.number_format($tper, 2, '.', ',').'</td>
          <td style="width: 5%;"> </td>
          <td style="width: 20%; background:#e0e0e0;"> <strong> DEDUCCIONES:</strong></td>
          <td style="width: 10%;"> '.number_format($tdep, 2, '.', ',').'</td>
        </tr>';
        $Departamento=$g->Departamento;
        $nun=$g->numPersonas;
      }

      $sqlTotal='Select
      md.IdDepartamento,
      p.IdPersonal,
      count(p.IdPersonal) as numPersonas,
      c.CodigoConcepto,
      md.FK_Nombre as Departamento,
      c.Nombre,
      nr.MontoValor,
      LEFT(c.Modo, 3) as T,
      if(LEFT(c.Modo, 3)="PER",(SUM(nr.MontoValor)),"") as Percepcion,
      if(LEFT(c.Modo, 3)="DED",(SUM(nr.MontoValor)),"") as Deduccion,
      if ((Select T)="PER","PERCEPCION",
      IF ((Select T)="DED","DEDUCCION", c.Modo)
      ) as Modo
      from nom_nomina n
      inner join nom_nominadetalle nd on nd.IdNomina = n.IdNomina
      inner join nom_nominadetalle_resultados nr on (nr.IdNominaDetalle = nd.IdNominaDetalle and nr.MontoValor > 0)
      inner join nom_tiponomina tn on n.IdTipoNomina = tn.IdTipoNomina
      left join nom_concepto c on ( nr.IdConcepto = c.IdConcepto)
      inner join master_personal p on p.IdPersonal = nd.IdPersonal
      inner join master_empresa emp on emp.IdEmpresa = nd.IdEmpresa
      left join
      rh_contratacion as co on (co.IdPersonal = p.IdPersonal and co.IdContratacion= nd.IdContrato)
      left join master_puesto mp on co.IdPuesto = mp.IdPuesto
      left join master_departamento md on co.IdDepartamento = md.IdDepartamento
      left join nom_registrospatronales rp on rp.IdRegistroPatronal=co.IdRegistroPatronal
      where
      n.IdNomina = '.$idnom.' and c.Imprime="Si" and nd.IdNominaDetalle is not null
      group by CodigoConcepto
      order by Departamento, p.IdPersonal, CodigoConcepto';

      $NomDep=DB::select($sqlTotal);
      $Departamento='';$idper=0;
      // foreach ($NomDep as $g) {$Departamento=$g->Departamento; break;}
      $numP='';$persecion='';$MontoP='';
      $numD='';$deduccion='';$MontoD='';
      $Departamento='';$depart='';$c=0;$departX='';
      $nun='';$tdep=0;$tper=0;$total='';
      foreach ($NomDep as $g) {
        if($g->Modo=="PERCEPCION"){
            $numP.='<tr><td>'.$g->CodigoConcepto.'</td></tr>';
            $persecion.='<tr><td>'.$g->Nombre.'</td></tr>';
            $MontoP.='<tr><td>'.number_format($g->Percepcion, 2, '.', ',').'</td></tr>';
            $tper=$tper+$g->Percepcion;
        }else if($g->Modo=="DEDUCCION"){
            $numD.='<tr><td>'.$g->CodigoConcepto.'</td></tr>';
            $deduccion.='<tr><td>'.$g->Nombre.'</td></tr>';
            $MontoD.='<tr><td>'.number_format($g->Deduccion, 2, '.', ',').'</td></tr>';
            $tdep=$tdep+$g->Deduccion;
        }
        $total='<tr>
          <td colspan="8" style="background:#bad4ff;border-top-style:solid; border-top-width:1px;">Departamento Nombre:'.$Departamento.'
          <br><br># Empleados:'.$nun.'</td></tr><tr>
          <td style="width: 25%; "> </td>
          <td style="width: 5%; "> </td>
          <td style="width: 5%;"><table>'.$numP.'</table></td>
          <td style="width: 20%;"> <table>'.$persecion.'</table></td>
          <td style="width: 10%; text-align:right;"> <table>'.$MontoP.'</table></td>
          <td style="width: 5%;"> <table>'.$numD.'</table></td>
          <td style="width: 20%;"> <table>'.$deduccion.'</table></td>
          <td style="width: 10%; text-align:right;"> <table>'.$MontoD.'</table></td>

        </tr>
        <tr>
          <td colspan="2" style="padding-top:-10px"> <hr> </td>
          <td></td>
          <td colspan="2" style="padding-top:-10px"> <hr> </td>
          <td></td>
          <td colspan="2" style="padding-top:-10px"> <hr> </td>

        </tr>
        <tr>
          <td style="width: 25%; background:#e0e0e0;"> <strong> TOTAL NETO:</strong></td>
          <td style="width: 5%; > '.number_format(($tper-$tdep), 2, '.', ',').'</td>
          <td style="width: 5%;"></td>
          <td style="width: 20%; background:#e0e0e0;"> <strong> PERCEPCIONES:</strong></td>
          <td style="width: 10%;"> '.number_format($tper, 2, '.', ',').'</td>
          <td style="width: 5%;"> </td>
          <td style="width: 20%; background:#e0e0e0;"> <strong> DEDUCCIONES:</strong></td>
          <td style="width: 10%;"> '.number_format($tdep, 2, '.', ',').'</td>

        </tr>';
      }
      $html2pdf = new Html2Pdf( 'L' , 'A4' , 'es' );
      $html=  '
        <page>
          <table style="width:100%; font-family:arial;">
            <tr>
              <td style="width: 30%; text-align:center;">
                <img width="130" src="assets/img/login-bg/gen-t-recursos-humano.jpg" >
              </td>
              <td style="width:40%; padding-left: 100px; font-size:12px; text-align:center;">
              <table style="width:100%;">
                <tr><td>'.$Nombre.'</td> </tr>
                <tr><td><strong>*Listado Nomina Detalle '.$Anio.'</strong></td></tr>
                <tr><td><br></td></tr>
                <tr><td>Numero de Nomina='.$Codigo.'</td></tr>
                <tr><td>Tipo de Periodo='.$Etiqueta.'</td></tr>
                <tr><td>Año de Periodo='.$Anio.'</td></tr>
                <tr><td><br>Cliente='.$cliente.'</td></tr>
              </table>
              </td>
              <td style="width: 30%; text-align:right; font-size:12px;">
              <table style="width:100%; padding-left: 90px;">
                <tr><td><br></td></tr>
                <tr><td><br></td></tr>
                <tr><td>'.$Titulo.'</td></tr>
                <tr><td> RFC:'.$rfc.'</td> </tr>
                <tr><td> Regimen Patronal'.$rp.'</td> </tr>
                <tr><td> Domicilio Fiscal'.$domicilio.'</td> </tr>
                <tr><td> ,'.$col.', CP:'.$cp.'</td> </tr>
              </table>
              </td>
            </tr>
            <tr>
              <td colspan="3">
              <hr>
                <table style="width: 100%; font-size:10px;">
                  <tr>
                    <td style="width: 25%;">Empleado</td>
                    <td style="width: 5%;">Dias</td>
                    <td style="width: 5%;">#</td>
                    <td style="width: 20%;">Percepciones</td>
                    <td style="width: 10%;">Monto</td>
                    <td style="width: 5%;">#</td>
                    <td style="width: 20%;">Deducciones</td>
                    <td style="width: 10%;">Monto</td>
                  </tr>
                </table>
              <hr>
            </td>
          </tr>
          </table>
          '.$det.$aux.'
          </page>
          <page>
          <table style="width:100%; font-family:arial;">
            <tr>
              <td style="width: 30%; text-align:center;">
                <img width="130" src="assets/img/login-bg/gen-t-recursos-humano.jpg" >
              </td>
              <td style="width:40%; padding-left: 100px; font-size:12px; text-align:center;">
              <table style="width:100%;">
                <tr><td>'.$Nombre.'</td> </tr>
                <tr><td><strong>*Listado Nomina Detalle '.$Anio.'</strong></td></tr>
                <tr><td><br></td></tr>
                <tr><td>Numero de Nomina='.$Codigo.'</td></tr>
                <tr><td>Tipo de Periodo='.$Etiqueta.'</td></tr>
                <tr><td>Año de Periodo='.$Anio.'</td></tr>
                <tr><td><br>Cliente='.$cliente.'</td></tr>
              </table>
              </td>
              <td style="width: 30%; text-align:right; font-size:12px;">
              <table style="width:100%; padding-left: 90px;">
                <tr><td><br></td></tr>
                <tr><td><br></td></tr>
                <tr><td>'.$Titulo.'</td></tr>
                <tr><td> RFC:'.$rfc.'</td> </tr>
                <tr><td> Regimen Patronal'.$rp.'</td> </tr>
                <tr><td> Domicilio Fiscal'.$domicilio.'</td> </tr>
                <tr><td> ,'.$col.', CP:'.$cp.'</td> </tr>
              </table>
              </td>
            </tr>
          </table>
          <table style="width: 100%; font-size:12px;">
          '.$depart.$departAux.'
          </table>
          <table style="width: 100%; font-size:12px;">
          '.$total.'
          </table>
        </page>';
       //echo $html;
        $html2pdf->writeHTML($html);
        $html2pdf->output('CONCENTRADO_'.$Nombre.'_'.date("Y-m-d_H:i:s").'.pdf','D');

      }
      else{
        return redirect('/Concentrado-Cliente')
        ->with(['success' => '' . ' NO HAY DATOS ',
                'type'    => 'success']);
      }
      
    }

}

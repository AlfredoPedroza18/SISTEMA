<style>
  .page-break {
    page-break-after: always;
  }

  .pee {
    width: 700px;
    height: 440px;
  }

  td,

  p {
    font-family: Arial, Helvetica, sans-serif;
    border: solid 0.05px black;
  }

  p {
    text-align: center;
    color: white;
    background-color: #F78C1E;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    width: 740px;
    margin: 10 0 0 -15;
    font-weight: bold;
    border: solid 0.5px black;
    padding: 1px 10px 1px 10px;
  }



  .fecha {
    border-collapse: collapse;
    margin: -60 0 0 360;
    border-spacing: 0;
    font-size: 8;
    width: 30px;
  }

  .naranja {
    color: white;
    background-color: #F78C1E;
    text-align: center;
    font-size: 12px;
    width: 60px;
    font-weight: bold;
    border: solid 0.05px black;
  }

  .blanco {
    text-align: center;
    font-size: 11px;
    width: 60px;
    padding: 3px 10px 3px 10px;
  }

  .sinTabla {
    border-collapse: collapse;
    margin-top: 20px;
    width: 400px;
    border-spacing: 0;
    font-size: 11px;
    width: 30px;
    text-align: center;
    border: none;
  }

  .sinTabla2 td {
    border: none;
    font-size: 12px;
    text-align: center;
    padding-right: 8px;
  }

  .sinTabla td {
    border: none;
    font-size: 10px;
  }

  .tabla {
    border-collapse: collapse;
    margin: 10 0 0 -15;
    border-spacing: 0;
    font-size: 12px;
    width: 740px;
  }

  .tabla td {
    font-size: 11px;
  }

  .sinTabla2 {
    border-collapse: collapse;
    margin: 10 0 0 -15;
    border-spacing: 0;
    font-size: 12px;
    width: 740px;
    border: none;
  }

  .gris {
    margin: 0;
    background-color: #cdcdcd;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    padding: 3px 0px 3px 0px;
    font-weight: bold;
    border: solid 0.5px black;
  }

  .gris_blanca {
    padding: 2 0 2 2;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 11px;
    border: solid 0.5px black;
    text-align: justify;

  }
</style>


<div class="page-break">
  <img src="assets/img/favi-ico/gent.jpg" alt="logo gent" width="150px" style="margin: -20 0 0 -20;">
  <p style="font-size: 14px; width: 300px; margin: -60 0 0 100; font-weight:bold; border: solid 0.5px black; padding: 1px 10px 1px 10px;">ESTUDIO SOCIOECONÓMICO</p>
  <table class="fecha">
    <tr>
      <td class="naranja">DÍA</td>
      <td class="naranja">MES</td>
      <td class="naranja">AÑO</td>
    </tr>
    <tr>
      <td class="blanco">&nbsp;{{$dia}}</td>
      <td class="blanco">&nbsp;{{$mes}}</td>
      <td class="blanco">&nbsp;{{$año}}</td>
    </tr>


  </table>

  <table style="margin: -20 0 0 407; border-collapse:collapse; border-spacing:0;">
    <tr>
      <td class="blanco" style="padding: 1px 1px 1px 1px; width: 110px; height: 100px;">
        @if($FotoCandidato=="") &nbsp; @else
        <img padding=0 src='data:image/jpeg;base64,"{{$FotoCandidato}}"' style='width:110px; height:100px;' alt='Prueba'>
        @endif
      </td>
    </tr>
    <tr>
      <td class="blanco" @if($DictamenVal=='Apto' ) style="background-color: #2ECC71 ;" @endif @if($DictamenVal=='No Apto' ) style="background-color: #E74C3C;" @endif @if($DictamenVal=='Apto a Reserva' ) style="background-color: #F4D03F;" @endif>@if($DictamenVal=='') &nbsp; @endif {{$DictamenVal}}</td>
    </tr>
  </table>

  <table class="sinTabla" style="margin-top: -50; margin-bottom: 20;">

    <tr>
      <td style="width: 60px;  padding: 3px 10px 3px 10px; font-weight:bold; font-size: 11px;">Empresa:</td>
      <td style="border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($clientes=='') &nbsp; @endif {{$clientes}}</td>
    </tr>
    <tr>
      <td style="width: 60px;  padding: 3px 10px 3px 10px; font-weight:bold; font-size: 11px;">Nombre:</td>
      <td style="border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
    </tr>
    <tr>
      <td style="width: 60px;  padding: 3px 10px 3px 10px; font-weight:bold; font-size: 11px;">Puesto:</td>
      <td style="width: 340px; border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
    </tr>
  </table>

  <p style="margin-top: 10px;">RESUMEN</p>

  <table class="tabla">
    <tr>
      <td class="gris" style="font-size: 12px;">1. Situación Socioeconómica</td>
    </tr>
    <tr>
      <td class='gris_blanca' style="width: 740px;  padding: 3px 10px 3px 10px; height:70px;">@if($ResumenEconomica=='') &nbsp; @endif {{$ResumenEconomica}}</td>
    </tr>
  </table>

  <table class="tabla">
    <tr>
      <td class="gris" style="font-size: 12px;">2. Escolaridad </td>
    </tr>
    <tr>
      <td class='gris_blanca' style="width: 740px;  padding: 3px 10px 3px 10px; height:70px;">@if($ResumenEscolar=='') &nbsp; @endif {{$ResumenEscolar}}</td>
    </tr>
  </table>

  <table class="tabla">
    <tr>
      <td class="gris" style="font-size: 12px;">3. Trayectoria Laboral</td>
    </tr>
    <tr>
      <td class='gris_blanca' style="width: 740px;  padding: 3px 10px 3px 10px; height:150px;">@if($ResumenTrayectoriaLaboral=='') &nbsp; @endif {{$ResumenTrayectoriaLaboral}}</td>
    </tr>
  </table>

  <table class="tabla">

    <tr>
      <td class="gris" colspan="5" style="font-size: 12px;">4. Valores calificados del candidato durante la aplicación del Estudio Socioeconómico</td>
    </tr>
    <tr>
      <td class="gris" style="width: 110px;">VALOR</td>
      <td class="gris" style="width: 50px;">BUENA</td>
      <td class="gris" style="width: 50px;">REGULAR</td>
      <td class="gris" style="width: 50px;">MALA</td>
      <td class="gris" style="width: 230px;">COMENTARIOS</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="width: 80px;">Disponibilidad</td>
      <td class="gris_blanca" @if($Disponibilidad=="Bueno" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Disponibilidad=="Regular" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Disponibilidad=="Malo" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td rowspan="7" class="gris_blanca" style="padding-left: 2px; padding-right: 2px;">@if ($Comentarios=='') &nbsp; @endif {{$Comentarios}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="width: 80px;">Puntualidad</td>
      <td class="gris_blanca" @if($Puntualidad=="Bueno" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Puntualidad=="Regular" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Puntualidad=="Malo" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca">Seriedad</td>
      <td class="gris_blanca" @if($Seriedad=="Bueno" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Seriedad=="Regular" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Seriedad=="Malo" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca">Actitud</td>
      <td class="gris_blanca" @if($Actitud=="Bueno" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Actitud=="Regular" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Actitud=="Malo" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca">Confiabilidad</td>
      <td class="gris_blanca" @if($Confiabilidad=="Bueno" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Confiabilidad=="Regular" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Confiabilidad=="Malo" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca">Seguridad en sí mismo</td>
      <td class="gris_blanca" @if($Seguridad=="Bueno" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Seguridad=="Regular" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Seguridad=="Malo" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca">Presentación</td>
      <td class="gris_blanca" @if($Presentacion=="Bueno" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Presentacion=="Regular" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
      <td class="gris_blanca" @if($Presentacion=="Malo" ) style="background-color: #F78C1E;" @endif>&nbsp;</td>
    </tr>

  </table>

  <table class="tabla">
    <tr>
      <td class="gris_blaca" style="border-bottom: none; height: 30px; padding-left: 5px; padding-top: 0px;" colspan="3">Realizó Investigación:</td>
    </tr>
    <tr>
      <td class="gris_blaca" style="height: 70px; text-align: center; border-top:none; border-bottom: none; " colspan="3">
        &nbsp; @if($firma!=null)<img src='data:image/jpeg;base64,"{{$firma}}"' alt="Fiema" width="180px" height="68px">@endif
      </td>
    </tr>
    <tr>
      <td style=" padding-bottom: 5px ; height: 15px; border-top: none; border-right: none;">&nbsp;</td>
      <td class="gris_blaca" style="text-align: center; border-left: none; border-right: none; width: 220px;">&nbsp;{{$nca}}</td>
      <td style="border-left: none; height: 15px; border-top: none;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blaca" colspan="3" style="height: 20px; padding: 5px;">{{$direccionL}} Tel.: @if($telefonoA=='') &nbsp; @else {{$telefonoA}} @endif, @if($email=='') &nbsp; @else {{$email}} @endif Declaración: El entrevistado declara que la información manifestada en este estudio es verdadera, por lo cual tendrá vigencia y entrará en vigor el Art. 47 Fracc. I de la L.F.T.
      </td>
    </tr>
  </table>

</div>


<div class="page-break">
  <img src="assets/img/favi-ico/gent.jpg" alt="logo gent" width="150px" style="margin: -20 0 0 -20;">
  <table class="sinTabla" style="margin-top: -20; margin-left: 100;">

    <tr>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Nombre:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($candidato=='') &nbsp; @endif {{$candidato}} </td>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Puesto:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
    </tr>

  </table>

  <p style="font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px;">DATOS GENERALES</p>

  <table class="tabla" width=740px; style="margin-top: 0;">

    <tr>
      <td class="gris_blanca" style="width:155px; font-weight:bold;">Nombre del candidato:</td>
      <td class="gris_blanca" colspan="5">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold; ">Calle:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($domi=='') &nbsp; @endif {{$domi}}</td>
      <td class="gris_blanca" style="font-weight:bold;">Número int. y ext:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($NumeroInteriorExterior=='') &nbsp; @endif {{$NumeroInteriorExterior}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold; ">Colonia:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($col=='') &nbsp; @endif {{$col}}</td>
      <td class="gris_blanca" style="font-weight:bold; ">Municipio/ Estado:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($mun=='') &nbsp; @endif {{$mun}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold;">Código Postal:</td>
      <td class="gris_blanca" style="text-align: center;">@if($postal=='') &nbsp; @endif {{$postal}}</td>
      <td class="gris_blanca" style="font-weight:bold; ">Celular:</td>
      <td class="gris_blanca" style="text-align: center;">@if($cel=='NA')  - @else @if($cel=='') &nbsp; @endif {{$cel}} @endif</td>
      <td class="gris_blanca" style="font-weight:bold; ">Teléfono:</td>
      <td class="gris_blanca" style="text-align: center;">@if($tel=='NA') - @else @if($tel=='') &nbsp; @endif {{$tel}} @endif</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold;">Tiempo en el domicilio:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($domiT=='') &nbsp; @endif {{$domiT}}</td>
      <td class="gris_blanca" style="font-weight:bold;">Entre calles:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($entreC=='') &nbsp; @endif {{$entreC}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold;">Domicilio anterior:</td>
      <td class="gris_blanca" colspan="4" style="text-align: center;">@if($domiA=='') &nbsp; @endif {{$domiA}}</td>
      <td class="gris_blanca" style="text-align: center;">@if($domiA=='No aplica') - @else @if($domiAT=='') &nbsp; @endif {{$domiAT}} @endif</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold;">Fecha de nacimiento:</td>
      <td class="gris_blanca" colspan="2" style="text-align: center;">@if($nac=='') &nbsp; @endif {{$nac}}</td>
      <td class="gris_blanca" style="font-weight:bold;">Lugar:</td>
      <td class="gris_blanca" colspan="2" style="text-align: center;">@if($nacLug=='') &nbsp; @endif {{$nacLug}}</td>

    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold;">Estado civil:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($estC=='') &nbsp; @endif {{$estC}}</td>
      <td class="gris_blanca" style="font-weight:bold;">Correo electrónico:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($corE=='') &nbsp; @endif {{$corE}}</td>
    </tr>

  </table>

  <p style="font-family: century-gothic, sans-serif;  text-align: center;">DOCUMENTACIÓN</p>

  <table class="tabla" style="margin-top: 0;">
    <tr>
      <td class="gris_blanca" style="font-weight:bold; width:190px; text-align: center;">Documentos</td>
      <td class="gris_blanca" style="font-weight:bold;  text-align: center;" colspan="8">N° de certificado</td>
      <td class="gris_blanca" style="font-weight:bold; width:134px; text-align: center;">Cotejo con documento</td>
    </tr>
  </table>

  <table class="tabla" style="margin-top: 0;">
  <tr>
      <td class="gris_blanca" style="border-top: none; width: 190px;">Acta de nacimiento</td>
      <td class="gris_blanca" style="border-top: none; font-weight:bold; width:36px;">Acta:</td>
      <td class="gris_blanca" style="border-top: none; width:65px; text-align: center;">@if($NoActaNacimiento=='NA') No aplica @else @if($NoActaNacimiento=='') &nbsp; @endif {{$NoActaNacimiento}}  @endif</td>
      <td class="gris_blanca" style="border-top: none; font-weight:bold; width:36px; text-align: center;">Año:</td>
      <td class="gris_blanca" style="border-top: none; width:65px; text-align: center;">@if($NoActaNacimiento=='NA') - @else @if($AnioActaNacimineto=='') &nbsp; @endif {{$AnioActaNacimineto}} @endif</td>
      <td class="gris_blanca" style="border-top: none; font-weight:bold; width:36px; text-align: center;">Foja:</td>
      <td class="gris_blanca" style=" border-top: none; width:65px; text-align: center;">@if($NoActaNacimiento=='NA') - @else @if($FojaActaNacimiento=='') &nbsp; @endif {{$FojaActaNacimiento}}  @endif</td>
      <td class="gris_blanca" style="border-top: none; font-weight:bold; width:36px;">Libro:</td>
      <td class="gris_blanca" style="border-top: none; width:65px; text-align: center;">@if($NoActaNacimiento=='NA') - @else @if($LibroActaNacimiento=='') &nbsp; @endif {{$LibroActaNacimiento}}  @endif</td>
      <td class="gris_blanca" style=" border-top: none; text-align: center; width: 134px;">@if($ValidacionActaNacimiento=='') &nbsp; @endif {{$ValidacionActaNacimiento}}</td>
    </tr>
  </table>
  
  <table class="tabla" style="margin-top: 0;">
  <tr>
      <td class="gris_blanca" style="border-top: none;">Identificación oficial vigente</td>
      <td class="gris_blanca"  style="font-weight:bold; text-align: center; border-top: none;">Clave/Núm:</td>
      <td class="gris_blanca"  style="text-align: center; border-top: none;">@if($ClaveIne=='NA') No aplica @else @if($ClaveIne=='') &nbsp; @endif {{$ClaveIne}} @endif</td>
      <td class="gris_blanca"  style="font-weight:bold; text-align: center; border-top: none;">OCR/Cad:</td>
      <td class="gris_blanca"  style="text-align: center; border-top: none;">@if($ClaveIne=='NA') - @else  @if($OCRIne=='') &nbsp; @endif {{$OCRIne}} @endif</td>
      <td class="gris_blanca" style="text-align: center; border-top: none;">@if($ValidacionIne=='') &nbsp; @endif {{$ValidacionIne}}</td>
    </tr>
    <tr>
      <td class="gris_blanca">CURP o carta de naturalización</td>
      <td class="gris_blanca" colspan="4" style="text-align: center;"> @if($CurpONaturlizacion=='NA') No aplica @else  @if($CurpONaturlizacion=='') &nbsp; @endif {{$CurpONaturlizacion}} @endif</td>
      <td class="gris_blanca" style="text-align: center;">@if($ValidaionCurp=='') &nbsp; @endif {{$ValidaionCurp}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" rowspan="2">Comprobante de domicilio</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Servicio:</td>
      <td class="gris_blanca" style="text-align: center;">@if($ServicioComDomicilio=='NA') No aplica @else  @if($ServicioComDomicilio=='') &nbsp; @endif {{$ServicioComDomicilio}} @endif</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Fecha:</td>
      <td class="gris_blanca" style="text-align: center;">@if($ServicioComDomicilio=='NA') - @else  @if($FechaComDomicilio=='') &nbsp; @endif  {{$FechaComDomicilio}} @endif</td>
      <td class="gris_blanca" rowspan="2" style="text-align: center;">@if($ValidacionComDomicilio=='') &nbsp; @endif {{$ValidacionComDomicilio}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Titular:</td>
      <td class="gris_blanca"  style="text-align: center;">@if($ServicioComDomicilio=='NA') - @else  @if($TitularComDomicilio=='') &nbsp; @endif {{$TitularComDomicilio}} @endif</td>
      <td class="gris_blanca"  style="font-weight:bold; text-align: center;">Relación:</td>
      <td class="gris_blanca"  style="text-align: center;">@if($ServicioComDomicilio=='NA') - @else  @if($RelacionComDomicilio=='') &nbsp; @endif {{$RelacionComDomicilio}} @endif</td>

    </tr>
    <tr>
      <td class="gris_blanca">Número de Seguro Social</td>
      <td class="gris_blanca" style="text-align: center;" colspan="4">@if($ImssNumAfiliacion=='NA') No aplica @else  @if($ImssNumAfiliacion=='') &nbsp; @endif {{$ImssNumAfiliacion}} @endif</td>
      <td class="gris_blanca" style="text-align: center;">@if($ImssValidacion=='') &nbsp; @endif {{$ImssValidacion}}</td>
    </tr>
    <tr>
      <td class="gris_blanca">Carta de recomendación</td>
      <td class="gris_blanca" colspan="4" style="text-align: center;">@if($CartaRecomendacionEmpresa=='') No aplica @endif {{$CartaRecomendacionEmpresa}}</td>
      <td class="gris_blanca" style="text-align: center;">@if($CartaRecomendacionEmpresa=='') No aplica @endif @if($CartaRecomendacionEmpresa!='') Presenta Original @endif</td>
    </tr>
    <tr>
      <td class="gris_blanca">Recíbos de nómina (2 últimos)</td>
      <td class="gris_blanca" style="text-align: center;" colspan="4">@if($ReciboNominaEmpresa=='NA') No aplica @else  @if($ReciboNominaEmpresa=='') &nbsp; @endif {{$ReciboNominaEmpresa}} @endif</td>
      <td class="gris_blanca" style="text-align: center;">@if($ReciboNominaValidacion=='') &nbsp; @endif {{$ReciboNominaValidacion}}</td>
    </tr>
    <tr>
      <td class="gris_blanca">Constancia de inscripción RFC</td>
      <td class="gris_blanca" style="text-align: center;" colspan="4">@if($RfcEmpresa=='NA') No aplica @else @if($RfcEmpresa=='') &nbsp; @endif {{$RfcEmpresa}} @endif</td>
      <td class="gris_blanca" style="text-align: center;">@if($RfcValidacion=='') &nbsp; @endif {{$RfcValidacion}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="width: 190px;">Último Comprobante de estudios</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; width: 65px;">Escuela:</td>
      <td class="gris_blanca" style="text-align: center; width: 181px;"> @if($UltimoGradoEscuela=='') &nbsp; @endif @if($UltimoGradoEscuela=='NA') No aplica @else {{$UltimoGradoEscuela}} @endif</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; width: 65px;">Grado:</td>
      <td class="gris_blanca" style="text-align: center; width: 103px;">@if($UltimoGradoGrado=='') &nbsp; @endif @if($UltimoGradoEscuela=='NA') - @else {{$UltimoGradoGrado}} @endif</td>
      <td class="gris_blanca" style="text-align: center; width: 134px;">@if($UltimoGradoValidacion=='') &nbsp; @endif {{$UltimoGradoValidacion}}</td>
    </tr>    
  </table>

  <table class="tabla" style="margin-top: 0;">
  <tr>
      <td class="gris_blanca" rowspan="2" style="width: 190px; border-top: none;">Créditos</td>
      <td class="gris_blanca"  style="font-weight:bold; text-align: center; width: 65px; border-top: none;">INFONAVIT:</td>
      <td class="gris_blanca"  style="text-align: center; padding: 1px 0 1px 0px; width: 360px; border-top: none;">@if($CreditoInfonavitMonto=='NA') No aplica @else @if($CreditoInfonavitMonto=='') &nbsp; @endif {{$CreditoInfonavitMonto}} @endif</td>
      <td class="gris_blanca" style="text-align: center; width: 134px; border-top: none;">@if($CreditoInfonavitValidacion=='') &nbsp; @endif {{$CreditoInfonavitValidacion}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">FONACOT:</td>
      <td class="gris_blanca" style="text-align:center">@if($CreditoFonacotNum=='NA') No aplica @else @if($CreditoFonacotNum=='') &nbsp; @endif {{$CreditoFonacotNum}} @endif</td>
      <td class="gris_blanca" style="text-align: center;">@if($CreditofonacotValidacion=='') &nbsp; @endif {{$CreditofonacotValidacion}}</td>
    </tr>
  </table>

  <table class="tabla" style="margin-top: 0;">
  <tr>
      <td class="gris_blanca" style="width: 190px; border-top: none;">Acta de matrimonio</td>
      <td class="gris_blanca" style="font-weight:bold; width:36px; border-top: none; text-align: center">Acta:</td>
      <td class="gris_blanca" style="width:65px; text-align: center; border-top: none; ">@if($NoActaMatrimonio=='' ) &nbsp; @endif @if($AplicaActaMatrimonio=='Si') {{$NoActaMatrimonio}} @else No aplica @endif</td>
      <td class="gris_blanca" style="font-weight:bold; width:36px; border-top: none;  text-align: center;">Año:</td>
      <td class="gris_blanca" style="width:65px; text-align: center; border-top: none;">@if($AnioActaMatrimonio=='') &nbsp; @endif @if($AplicaActaMatrimonio=='Si') {{$AnioActaMatrimonio}} @else - @endif</td>
      <td class="gris_blanca" style="font-weight:bold; width:36px; border-top: none; text-align: center">Foja:</td>
      <td class="gris_blanca" style="width:65px; text-align: center; border-top: none;">@if($FojaActaMatrimonio=='') &nbsp; @endif @if($AplicaActaMatrimonio=='Si') {{$FojaActaMatrimonio}} @else - @endif</td>
      <td class="gris_blanca" style="font-weight:bold; width:36px; border-top: none;  text-align: center">Libro:</td>
      <td class="gris_blanca" style="width:65px; text-align: center; border-top: none;">@if($LibroActaMatrimonio=='') &nbsp; @endif @if($AplicaActaMatrimonio=='Si') {{$LibroActaMatrimonio}} @else - @endif</td>
      <td class="gris_blanca" style="text-align: center; width: 134px; border-top: none;">@if($ValidacionActaMatrimonio=='') &nbsp; @endif @if($AplicaActaMatrimonio=='Si') {{$ValidacionActaMatrimonio}} @else No aplica @endif</td>
    </tr>
    <tr>
      <td class="gris_blanca">Acta de nacimiento cónyuge</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center">Acta:</td>
      <td class="gris_blanca" style=" text-align: center;">@if($NoActaNacimientoConyugue=='') &nbsp; @endif @if($AplicaActaNacimientoConyugue=='Si') {{$NoActaNacimientoConyugue}} @else No aplica @endif</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Año:</td>
      <td class="gris_blanca" style=" text-align: center;">@if($AnioActaNacimientoConyugue=='') &nbsp; @endif @if($AplicaActaNacimientoConyugue=='Si') {{$AnioActaNacimientoConyugue}} @else - @endif</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center">Foja:</td>
      <td class="gris_blanca" style=" text-align: center;">@if($FojaActaNacimientoConyugue=='') &nbsp; @endif @if($AplicaActaNacimientoConyugue=='Si') {{$FojaActaNacimientoConyugue}} @else - @endif</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center">Libro:</td>
      <td class="gris_blanca" style=" text-align: center;">@if($LibroActaNacimientoConyugue=='') &nbsp; @endif @if($AplicaActaNacimientoConyugue=='Si') {{$LibroActaNacimientoConyugue}} @else - @endif</td>
      <td class="gris_blanca" style=" text-align: center;">@if($ValidacionActaNacimientoConyugue=='') &nbsp; @endif @if($AplicaActaNacimientoConyugue=='Si') {{$ValidacionActaNacimientoConyugue}} @else Noaplica @endif</td>
    </tr>

    @for($j=0;$j<=3;$j++) @if($AplicaActaNacimientoHijo[$j]=='si' ||$AplicaActaNacimientoHijo[$j]=='Si' ) <tr>
      <td class="gris_blanca">Acta de nacimiento hijos</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; ">Acta:</td>
      <td class="gris_blanca" style=" text-align: center">@if($NoActaNacimientoHijo[$j]=='') &nbsp; @endif {{$NoActaNacimientoHijo[$j]}}</td>
      <td class="gris_blanca" style="font-weight:bold;  text-align: center;">Año:</td>
      <td class="gris_blanca" style=" text-align: center">@if($AnioNacimientoHijo[$j]=='') &nbsp; @endif {{$AnioNacimientoHijo[$j]}}</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center ">Foja:</td>
      <td class="gris_blanca" style=" text-align: center">@if($FojaActaNacimientoHijo[$j]=='') &nbsp; @endif {{$FojaActaNacimientoHijo[$j]}}</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center">Libro:</td>
      <td class="gris_blanca" style=" text-align: center">@if($LibroNoActaNacimientoHijo[$j]=='') &nbsp; @endif {{$LibroNoActaNacimientoHijo[$j]}}</td>
      <td class="gris_blanca" style=" text-align: center;">@if($ValidacionActaNacimientoHijo[$j]=='') &nbsp; @endif {{$ValidacionActaNacimientoHijo[$j]}}</td>
      </tr>
      @endif
      @endfor

      @if($AplicaActaNacimientoHijo[0]=='No'&&$AplicaActaNacimientoHijo[1]=='No'&&$AplicaActaNacimientoHijo[2]=='No'&&$AplicaActaNacimientoHijo[3]=='No' )
      
      @for($j=0;$j<=1;$j++)
      <tr>
        <td class="gris_blanca" style="width: 190px;">Acta de nacimiento hijos</td>
        <td class="gris_blanca" style="font-weight:bold; width:36px; text-align: center;">Acta:</td>
        <td class="gris_blanca" style="width:65px; text-align: center;">No aplica</td>
        <td class="gris_blanca" style="font-weight:bold; width:36px; text-align: center;">Año:</td>
        <td class="gris_blanca" style="width:65px; text-align: center;">-</td>
        <td class="gris_blanca" style="font-weight:bold; width:36px; text-align: center;">Foja:</td>
        <td class="gris_blanca" style="width:65px; text-align: center;">-</td>
        <td class="gris_blanca" style="font-weight:bold; width: 36px; text-align: center;">Libro:</td>
        <td class="gris_blanca" style="width:65px; text-align: center;">-</td>
        <td class="gris_blanca" style="width:134px; text-align: center;">No aplica</td>
      </tr>

      @endfor
      @endif
  </table>
 
  <p style="font-family: century-gothic, sans-serif;  text-align: center;">ESCOLARIDAD</p>
  <table class="tabla" style="margin-top: 0;">
    <tr>
      <th class="gris">Último grado</th>
      <th class="gris">Institución</th>
      <th class="gris">Domicilio</th>
      <th class="gris">Periodo</th>
      <th class="gris">Años</th>
      <th class="gris">Comprobante</th>
    </tr>

    @for($j=0;$j<=1;$j++) @if($EscolaridadAplica[$j]=='si' ||$EscolaridadAplica[$j]=='Si' ) <tr>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">@if($EscolaridadUltimoGrado[$j]=='') &nbsp; @endif {{$EscolaridadUltimoGrado[$j]}}</td>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">@if($EscolaridadInstitucion[$j]=='') &nbsp; @endif {{$EscolaridadInstitucion[$j]}}</td>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">@if($EscolaridadDomicilio[$j]=='') &nbsp; @endif {{$EscolaridadDomicilio[$j]}}</td>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">@if($EscolaridadPeriodo[$j]=='') &nbsp; @endif {{$EscolaridadPeriodo[$j]}}</td>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">@if($EscolaridadAnios[$j]=='') &nbsp; @endif {{$EscolaridadAnios[$j]}}</td>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">@if($EscolaridadComprobante[$j]=='') &nbsp; @endif {{$EscolaridadComprobante[$j]}}</td>
      </tr>

      @endif
      @endfor

      @if(($EscolaridadAplica[0]=='No' ||$EscolaridadAplica[0]=='no')&&($EscolaridadAplica[1]=='No' ||$EscolaridadAplica[1]=='no'))
      <tr>
        <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">No aplica</td>
        <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">No aplica</td>
        <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">No aplica</td>
        <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">No aplica</td>
        <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">No aplica</td>
        <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">No aplica</td>
      </tr>
      @endif
  </table>

  <table class="tabla">
    <tr>
      <td class="gris" colspan="3">Idiomas</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; width:246px">Idioma</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; width:246px">Nivel de dominio</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; width:247px">Comprobante</td>
    </tr>
    @for($j=0;$j<=1;$j++) @if($EscolaridadIdioma[$j]=='si' ||$EscolaridadIdioma[$j]=='Si' ) <tr>
      <td class="gris_blanca" style="text-align: center; ">@if($EscolaridadIdiomaNombres[$j]=='') &nbsp; @endif {{$EscolaridadIdiomaNombres[$j]}}</td>
      <td class="gris_blanca" style="text-align: center;">@if($EscolaridadIdiomaNivel[$j]=='') &nbsp; @endif {{$EscolaridadIdiomaNivel[$j]}}%</td>
      <td class="gris_blanca" style="text-align: center;">@if($EscolaridadIdiomaComprobante[$j]=='') &nbsp; @endif {{$EscolaridadIdiomaComprobante[$j]}}</td>
      </tr>
      @endif
      @endfor

      @if(($EscolaridadIdioma[0]=='no' ||$EscolaridadIdioma[0]=='No')&&($EscolaridadIdioma[1]=='no' ||$EscolaridadIdioma[1]=='No') )
      <tr>
        <td class="gris_blanca" style="text-align: center; ">No aplica</td>
        <td class="gris_blanca" style="text-align: center;">No aplica</td>
        <td class="gris_blanca" style="text-align: center;">No aplica</td>
      </tr>
      @endif
  </table>


  <table class="tabla">
    <tr>
      <th class="gris">Observaciones</th>
    </tr>
    <tr>
      <th class="gris_blanca" style="font-weight:100; height: 50px;">@if($EscolaridadObservaciones=='') &nbsp; @endif {{$EscolaridadObservaciones}}</th>
    </tr>
  </table>

</div>



<div class="page-break">
  <img src="assets/img/favi-ico/gent.jpg" alt="logo gent" width="150px" style="margin: -20 0 0 -20;">
  <table class="sinTabla" style="margin-top: -20; margin-left: 100;">
    <tr>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Nombre:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Puesto:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
    </tr>
  </table>

  <p style="font-family: century-gothic, sans-serif; margin-bottom: 0px; text-align: center;">SITUACIÓN SOCIAL Y ECONÓMICA</p>

  <p class="gris" style="margin-left:-20px; margin-top: 0px;  margin-bottom: 0px; width: 760px; font-family: century-gothic, sans-serif; font-size: 12px; text-align: center; color:black">Datos familiares </p>

  <table class="tabla" style="margin-top: 0;">
    <tr>
      <td class="gris" style="text-align: center; font-weight: bold; width: 170px; height:18px;">Nombre</td>
      <td class="gris" style="text-align: center; font-weight: bold; width: 60px;">Parentesco</td>
      <td class="gris" style="text-align: center; font-weight: bold; width: 55px;">Edad</td>
      <td class="gris" style="text-align: center; font-weight: bold; width: 70px">Estado civil</td>
      <td class="gris" style="text-align: center; font-weight: bold;">Ocupación</td>
      <td class="gris" style="text-align: center; font-weight: bold;">Empresa</td>
      <td class="gris" style="text-align: center; font-weight: bold;">Dirección</td>
    </tr>
    @for($j=0;$j<=5;$j++) @if($SitEcoDatoFamiliarAplica[$j]=='si' ||$SitEcoDatoFamiliarAplica[$j]=='Si' ) <tr>
      <td class="gris_blanca" style="text-align: center; height:18px ;">@if($SitEcoDatoFamiliarNombre[$j]=='') &nbsp; @endif {{$SitEcoDatoFamiliarNombre[$j]}}</td>
      <td class="gris_blanca" style="text-align: center; ">@if($SitEcoDatoFamiliarParentesco[$j]=='') &nbsp; @endif {{$SitEcoDatoFamiliarParentesco[$j]}}</td>
      <td class="gris_blanca" style="text-align: center; ">@if($SitEcoDatoFamiliarEdad[$j]=='') &nbsp; @endif {{$SitEcoDatoFamiliarEdad[$j]}}</td>
      <td class="gris_blanca" style="text-align: center; ">@if($SitEcoDaboFamiliarEstadoCivil[$j]=='') &nbsp; @endif {{$SitEcoDaboFamiliarEstadoCivil[$j]}}</td>
      <td class="gris_blanca" style="text-align: center; ">@if($SitEcoDatoFamiliarOcupacion[$j]=='') &nbsp; @endif {{$SitEcoDatoFamiliarOcupacion[$j]}}</td>
      <td class="gris_blanca" style="text-align: center; ">@if($SitEcoDatoFamiliarEmpresa[$j]=='') &nbsp; @endif {{$SitEcoDatoFamiliarEmpresa[$j]}}</td>
      <td class="gris_blanca" style="text-align: center; ">@if($SitEcoDatoFamiliarDireccion[$j]=='') &nbsp; @endif {{$SitEcoDatoFamiliarDireccion[$j]}}</td>
      </tr>
      @endif
      @endfor

      @for($j=0;$j<=5;$j++) @if($SitEcoDatoFamiliarAplica[$j]=='No' ||$SitEcoDatoFamiliarAplica[$j]=='no' ) <tr>
        <td class="gris_blanca" style="text-align: center; height:18px ;">No aplica</td>
        <td class="gris_blanca" style="text-align: center; ">-</td>
        <td class="gris_blanca" style="text-align: center; ">-</td>
        <td class="gris_blanca" style="text-align: center; ">-</td>
        <td class="gris_blanca" style="text-align: center; ">-</td>
        <td class="gris_blanca" style="text-align: center; ">-</td>
        <td class="gris_blanca" style="text-align: center; ">-</td>
        </tr>
        @endif
        @endfor
  </table>

  <table class="tabla">
    <tr>
      <td class="gris" style="text-align: left; width: 420px; padding-left: 4px; height: 18px;">¿Padece o ha padecido alguna enfermedad como crónica o degenerativa?</td>
      <td class="gris_blanca" style="text-align: center; width: 30px; @if($SitEcoDatoMedEnfermedadCro=='Si') background-color:#F78C1E @endif">Si</td>
      <td class="gris_blanca" style="text-align: center; width: 30px; @if($SitEcoDatoMedEnfermedadCro=='No') background-color:#F78C1E @endif">No</td>
      <td class="gris_blanca" style="text-align: center; width:73px;">¿Cuál?</td>
      <td class="gris_blanca" style=" text-align:center; ">@if($SitEcoDatoMedEnfermedadCroNomb=='') &nbsp; @endif {{$SitEcoDatoMedEnfermedadCroNomb}}</td>
    </tr>
    <tr>
      <td class="gris" style="text-align: left;  padding-left: 4px; height: 18px;">¿Se encuentra bajo algún tratamiento médico?</td>
      <td class="gris_blanca" style="text-align: center; @if($SitEcoDatoMedTratamientoMed=='Si') background-color:#F78C1E @endif">Si</td>
      <td class="gris_blanca" style="text-align: center; @if($SitEcoDatoMedTratamientoMed=='No') background-color:#F78C1E @endif">No</td>
      <td class="gris_blanca" style="text-align: center;">¿Cuál?</td>
      <td class="gris_blanca" style="text-align:center;  ">@if($SitEcoDatoMedTratamientoMedNom=='') &nbsp; @endif {{$SitEcoDatoMedTratamientoMedNom}}</td>
    </tr>
    <tr>
      <td class="gris" style="text-align: left;  padding-left: 4px; height: 18px;">¿Es alérgico?</td>
      <td class="gris_blanca" style="text-align: center; @if($SitEcoDatoMedAlergico=='Si') background-color:#F78C1E @endif">Si</td>
      <td class="gris_blanca" style="text-align: center; @if($SitEcoDatoMedAlergico=='No') background-color:#F78C1E @endif">No</td>
      <td class="gris_blanca" style="text-align: center;">¿A qué?</td>
      <td class="gris_blanca" style=" text-align:center;">@if($SitEcoDatoMedAlergiaNombre=='') &nbsp; @endif {{$SitEcoDatoMedAlergiaNombre}}</td>
    </tr>
    <tr>
      <td class="gris" style="text-align: left;  padding-left: 4px; height: 18px;">¿Toma medicamento controlado?</td>
      <td class="gris_blanca" style="text-align: center; @if($SitEcoDatoMedControlado=='Si') background-color:#F78C1E @endif">Si</td>
      <td class="gris_blanca" style="text-align: center; @if($SitEcoDatoMedControlado=='No') background-color:#F78C1E @endif">No</td>
      <td class="gris_blanca" style="text-align: center;">¿Cuál?</td>
      <td class="gris_blanca" style=" text-align:center; ">@if($SitEcoDatoMedControladoNombre=='') &nbsp; @endif {{$SitEcoDatoMedControladoNombre}}</td>
    </tr>
  </table>

  <table class="sinTabla2">
    <tr>
      <td class="gris" rowspan="3" style="border:solid 0.05px black; width: 120px; ">En caso de emergencia</td>
      <td style="border-top:solid 0.05px black;  width: 90px;">Nombre:</td>
      <td style="border-bottom: solid 0.05px black;border-top: solid 0.05px black; padding: 3px 10px 3px 10px; width: 270px;">@if($SitEcoEmerNombre=='') &nbsp; @endif {{$SitEcoEmerNombre}}</td>
      <td style=" border-top: solid 0.05px black; width: 90px;">Celular:</td>
      <td style="border-bottom: solid 0.05px black; border-top: solid 0.05px black; width: 110px; border-right: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($SitEcoEmerAplicaCelular=='Si') @if($SitEcoEmerCelular=='') &nbsp; @endif {{$SitEcoEmerCelular}} @else No aplica @endif</td>
    </tr>
    <tr>
      <td>Relación:</td>
      <td style="border-bottom: solid 0.05px black;  padding: 3px 10px 3px 10px;">@if($SitEcoEmerRelacion=='') &nbsp; @endif {{$SitEcoEmerRelacion}}</td>
      <td style="border-bottom:none ;">Telefono:</td>
      <td style="border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px; border-right: solid 0.05px black;">@if($SitEcoEmerAplicaTelefono=='Si') @if($SitEcoEmerNombreTelefonoFijo=='') &nbsp; @endif {{$SitEcoEmerNombreTelefonoFijo}} @else No aplica @endif</td>
    </tr>
    <tr>
      <td style=" border-bottom: solid 0.05px black;;">Tipo de sangre:</td>
      <td style="border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px; text-align: center;">@if($SitEcoEmerTipoSangre=='') &nbsp; @endif {{$SitEcoEmerTipoSangre}}</td>
      <td style="border-bottom: solid 0.05px black;">&nbsp;</td>
      <td style="border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px; border-right: solid 0.05px black;">&nbsp;</td>

    </tr>
  </table>
  <table class="tabla">
    <tr>
      <td class="gris" style="text-align: center; height:18px ;">Objetivo a corto plazo</td>
      <td class="gris" style="text-align: center;">Objetivo a medio plazo</td>
      <td class="gris" style="text-align: center;">Objetivo a largo plazo</td>
      <td class="gris" style="text-align: center;">Principales pasatiempos</td>
    </tr>
    <tr>
      <td class="gris_blanca " style="height: 30px; text-align: center;">@if($SitEcoCortoPlazo=='') &nbsp; @endif {{$SitEcoCortoPlazo}}</td>
      <td class="gris_blanca" style="text-align: center;">@if($SitEcoMedianoPlazo=='') &nbsp; @endif {{$SitEcoMedianoPlazo}}</td>
      <td class="gris_blanca" style="text-align: center;">@if($SitEcoLargoPlazo=='') &nbsp; @endif {{$SitEcoLargoPlazo}}</td>
      <td class="gris_blanca" style="text-align: center;">@if($SitEcoPrincipalesPrincipales=='') &nbsp; @endif {{$SitEcoPrincipalesPrincipales}}</td>
    </tr>
  </table>
  <table class="tabla">
    <tr>
      <td class="gris" colspan="9" style="height:18px ;">Tipo de vivienda</td>
    </tr>
    <tr>

      <td class="gris_blanca" style="text-align: center; height:18px ; font-weight: bold; width: 90px;">La vivienda es:</td>
      <td class="gris_blanca" style="text-align: center; width: 80px;">@if($SitEcoLaViviendaEs=='') &nbsp; @endif {{$SitEcoLaViviendaEs}}</td>
      <td class="gris_blanca" style="text-align: center; font-weight: bold; width: 90px;">Observaciones:</td>
      <td class="gris_blanca" style="text-align: center;">@if($SitEcoObservaciones=='') &nbsp; @endif {{$SitEcoObservaciones}}</td>
      <td class="gris_blanca" style="text-align: center; font-weight: bold; width: 70px;">Servicios:</td>
      <td class="gris_blanca" style="text-align: center; width: 40px; height: 20px; @if($ViviendaTipoLuz=='Si') background-color:#F78C1E @endif">Luz</td>
      <td class="gris_blanca" style="text-align: center; width: 40px; @if($ViviendaTipoAgua=='Si') background-color:#F78C1E @endif">Agua</td>
      <td class="gris_blanca" style="text-align: center; width: 40px; @if($ViviendaTipoGas=='Si') background-color:#F78C1E @endif">Gas</td>
      <td class="gris_blanca" style="text-align: center; width: 50px; @if($ViviendaTipoDrenaje=='Si') background-color:#F78C1E @endif">Drenaje</td>
    </tr>
  </table>

  <table class="tabla">
    <tr>
      <td class="gris" colspan="5" style="height:18px ;">Tipo de casa habitación</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px; @if($ViviendaTipoTipoCasa=='Casa') background-color:#F78C1E; @endif">Casa</td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px; @if($ViviendaTipoTipoCasa=='Departamento') background-color:#F78C1E; @endif">Departamento</td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px; @if($ViviendaTipoTipoCasa=='Condominio') background-color:#F78C1E; @endif">Condominio</td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px; @if($ViviendaTipoTipoCasa=='Unidad Habitacional') background-color:#F78C1E; @endif">Unidad Habitacional</td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px; @if($ViviendaTipoTipoCasa=='Vivienda popular') background-color:#F78C1E; @endif">Vivienda Popular</td>
    </tr>
  </table>

  @if($moda=="Presencial"||$moda=="presencial")
  <table class="tabla">
    <tr>
      <td class="gris" style="height:18px ;">Mobiliario</td>
      <td class="gris">Limpieza</td>
      <td class="gris">Orden</td>
      <td class="gris">Calidad</td>
    </tr>
    <tr>
      <td class="gris_blanco" style="text-align: center; height:18px ;">@if($ViviendaTipoCalidadMobiliario=='') &nbsp; @endif {{$ViviendaTipoCalidadMobiliario}}</td>
      <td class="gris_blanco" style="text-align: center;">@if($ViviendaTipoCalidadLimpieza=='') &nbsp; @endif {{$ViviendaTipoCalidadLimpieza}}</td>
      <td class="gris_blanco" style="text-align: center;">@if($ViviendaTipoCalidadOrden=='') &nbsp; @endif {{$ViviendaTipoCalidadOrden}}</td>
      <td class="gris_blanco" style="text-align: center;">@if($ViviendaTipoCalidadGeneral=='') &nbsp; @endif {{$ViviendaTipoCalidadGeneral}}</td>
    </tr>
  </table>
  @endif

  <table class="sinTabla2">
    <tr>
      <td class="gris" colspan="9" style="border: solid 1px black;">Economía mensual</td>
    </tr>
    <tr>
      <td class="gris" style="border: solid 1px black ; height:18px ;">Ingreso</td>
      <td class="gris" style="border: solid 1px black ;">Tipo</td>
      <td class="gris" style="border: solid 1px black ;" colspan="2">Monto</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="3">Alimentación</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">@if($SitEcoEgreMenAlimentacion=='') - @else {{number_format($SitEcoEgreMenAlimentacion)}}.00 @endif</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">@if($SitEcoIngMenAplica[0]=='Si') @if($SitEcoIngMenDescripcion[0]=='') &nbsp; @endif {{$SitEcoIngMenDescripcion[0]}} @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black ;">@if($SitEcoIngMenAplica[0]=='Si') @if($SitEcoIngMenTipo[0]=='') &nbsp; @endif {{$SitEcoIngMenTipo[0]}} @else - @endif</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; @if($SitEcoIngMenAplica[0]=='Si')text-align: right;  @endif width:70px;">@if($SitEcoIngMenAplica[0]=='Si') @if($SitEcoIngMenMonto[0]=='') &nbsp; @endif {{number_format($SitEcoIngMenMonto[0])}}.00 @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black; width:80px; @if($SitEcoEgreMenTipo=='Renta') background-color: #F78C1E  @endif">Renta</td>
      <td class="gris_blanca" style="border: solid 1px black ; width:80px; @if($SitEcoEgreMenTipo=='Hipoteca') background-color: #F78C1E  @endif">Hipoteca</td>
      <td class="gris_blanca" style="border: solid 1px black ; width:80px; @if($SitEcoEgreMenTipo=='Predial') background-color: #F78C1E  @endif">Predial</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right; width:70px;">@if($SitEcoEgreMenTipoMonto=='') - @else {{number_format($SitEcoEgreMenTipoMonto)}}.00 @endif</td>
    </tr>

    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">@if($SitEcoIngMenAplica[1]=='Si') @if($SitEcoIngMenDescripcion[1]=='') &nbsp; @endif {{$SitEcoIngMenDescripcion[1]}} @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black ;">@if($SitEcoIngMenAplica[1]=='Si') @if($SitEcoIngMenTipo[1]=='') &nbsp; @endif {{$SitEcoIngMenTipo[1]}} @else - @endif</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; @if($SitEcoIngMenAplica[1]=='Si')text-align: right;  @endif width:70px;">@if($SitEcoIngMenAplica[1]=='Si') @if($SitEcoIngMenMonto[1]=='') &nbsp; @endif {{number_format($SitEcoIngMenMonto[1])}}.00 @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="3">Servicios (agua, luz, gas, teléfono)</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">@if($SitEcoEgreMenServicios=='') - @else {{number_format($SitEcoEgreMenServicios)}}.00 @endif</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">@if($SitEcoIngMenAplica[2]=='Si') @if($SitEcoIngMenDescripcion[2]=='') &nbsp; @endif {{$SitEcoIngMenDescripcion[2]}} @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black ;">@if($SitEcoIngMenAplica[2]=='Si') @if($SitEcoIngMenTipo[2]=='') &nbsp; @endif {{$SitEcoIngMenTipo[2]}} @else - @endif</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; @if($SitEcoIngMenAplica[2]=='Si')text-align: right;  @endif width:70px;">@if($SitEcoIngMenAplica[2]=='Si') @if($SitEcoIngMenMonto[2]=='') &nbsp; @endif {{number_format($SitEcoIngMenMonto[2])}}.00 @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="3">Créditos (TDC y plan tarifario)</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">@if($SitEcoEgreMenCreditos=='') - @else {{number_format($SitEcoEgreMenCreditos)}}.00 @endif</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">@if($SitEcoIngMenAplica[3]=='Si') @if($SitEcoIngMenDescripcion[3]=='') &nbsp; @endif {{$SitEcoIngMenDescripcion[3]}} @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black ;">@if($SitEcoIngMenAplica[3]=='Si') @if($SitEcoIngMenTipo[3]=='') &nbsp; @endif {{$SitEcoIngMenTipo[3]}} @else - @endif</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; @if($SitEcoIngMenAplica[3]=='Si')text-align: right;  @endif width:70px;">@if($SitEcoIngMenAplica[3]=='Si') @if($SitEcoIngMenMonto[3]=='') &nbsp; @endif {{number_format($SitEcoIngMenMonto[3])}}.00 @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="3">Gastos escolares</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">@if($SitEcoEgreMenGastos=='') - @else {{number_format($SitEcoEgreMenGastos)}}.00 @endif</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">@if($SitEcoIngMenAplica[4]=='Si') @if($SitEcoIngMenDescripcion[4]=='') &nbsp; @endif {{$SitEcoIngMenDescripcion[4]}} @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black ;">@if($SitEcoIngMenAplica[4]=='Si') @if($SitEcoIngMenTipo[4]=='') &nbsp; @endif {{$SitEcoIngMenTipo[4]}} @else - @endif</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; @if($SitEcoIngMenAplica[4]=='Si')text-align: right;  @endif width:70px;">@if($SitEcoIngMenAplica[4]=='Si') @if($SitEcoIngMenMonto[4]=='') &nbsp; @endif {{number_format($SitEcoIngMenMonto[4])}}.00 @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="3">Diversiones</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">@if($SitEcoEgreMenDiversiones=='') - @else {{number_format($SitEcoEgreMenDiversiones)}}.00 @endif</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">@if($SitEcoIngMenAplica[5]=='Si') @if($SitEcoIngMenDescripcion[5]=='') &nbsp; @endif {{$SitEcoIngMenDescripcion[5]}} @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black ;">@if($SitEcoIngMenAplica[5]=='Si') @if($SitEcoIngMenTipo[5]=='') &nbsp; @endif {{$SitEcoIngMenTipo[5]}} @else - @endif</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; @if($SitEcoIngMenAplica[5]=='Si')text-align: right;  @endif width:70px;">@if($SitEcoIngMenAplica[5]=='Si') @if($SitEcoIngMenMonto[5]=='') &nbsp; @endif {{number_format($SitEcoIngMenMonto[5])}}.00 @else - @endif</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="3">Otros</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">@if($SitEcoEgreMenOtros=='') - @else {{number_format($SitEcoEgreMenOtros)}}.00 @endif</td>
    </tr>

    <tr>
      <td class="gris" style="border: solid 1px black; height:18px ;" colspan="2">Total Ingresos</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; @if($TtotalIngresos!='' || $TtotalIngresos!=0.0 || $TtotalIngresos!=0) text-align: right; @endif">@if($TtotalIngresos=='' || $TtotalIngresos==0.0 || $TtotalIngresos==0) - @else {{number_format($TtotalIngresos)}}.00 @endif</td>
      <td class="gris" style="border: solid 1px black ;" colspan="3">Total egresos</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; @if($TtotalEgresos!='' || $TtotalEgresos!=0.0 || $TtotalEgresos!=0) text-align: right; @endif">@if($TtotalEgresos==''||$TtotalEgresos == 0.0 ||$TtotalEgresos == 0) - @else {{number_format($TtotalEgresos)}}.00 @endif</td>
    </tr>
    <tr>
      <td class="gris" style="border: solid 1px black; height:18px ;" colspan="2">Diferencia</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; text-align: right ;">{{number_format($TtotalIngresos-$TtotalEgresos)}}.00</td>
      <td class="gris" style="border: solid 1px black; height: 20px;" colspan="3">Si existe déficit, ¿como lo solventa?</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="2">@if($SitEcoEgreMenDeficitSolventa=='no aplica') No aplica @else @if($SitEcoEgreMenDeficitSolventa=='') - @else {{$SitEcoEgreMenDeficitSolventa}} @endif @endif</td>
    </tr>


  </table>
</div>


<div class="page-break">
  <img src="assets/img/favi-ico/gent.jpg" alt="logo gent" width="150px" style="margin: -20 0 0 -20;">
  <table class="sinTabla" style="margin-top: -20; margin-left: 100;">

    <tr>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Nombre:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Puesto:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
    </tr>

  </table>

  <table class="tabla">
    <tr>
      <td class="gris" style="height: 18px;" colspan="8">Patrimonio</td>
    </tr>

    <tr>
      <td class="gris" style="height: 18px;">Automóvil</td>
      <td class="gris_blanca" style="height: 18px; text-align: center;">@if($SitEcoAutoMarca=='') - @else {{$SitEcoAutoMarca}} @endif</td>
      <td class="gris" style="height: 18px;">Bienes raíces</td>
      <td class="gris_blanca" style="@if($SitEcoBienesraices=='Si') background-color: #F78C1E ;@endif text-align: center; height: 18px;">Si</td>
      <td class="gris_blanca" style="@if($SitEcoBienesraices=='No') background-color: #F78C1E ;@endif text-align: center; height: 18px;">No</td>
      <td class="gris" style="height: 18px;">Ubicación</td>
      <td class="gris_blanca" style="height: 18px; text-align: center;" colspan="2">@if($SitEcoUbicacion=='') - @else {{$SitEcoUbicacion}} @endif</td>
    </tr>

    <tr>
      <td class="gris" colspan="2" style="height: 18px;">Tarjetas de crédito o departamento</td>
      <td colspan="3" class="gris_blanca" style="text-align: center;">@if($SitEcoCreditos=='') - @else {{$SitEcoCreditos}} @endif</td>
      <td class="gris">Monto de crédito</td>
      <td style="text-align: left; border-right: none; ">$</td>
      <td style="margin-right: solid 1px black; border-left: none; text-align: right;">@if($SitEcoCreditosMontoTotal=='') &nbsp; @else {{number_format($SitEcoCreditosMontoTotal)}}.00 @endif</td>
    </tr>
  </table>

  <table class="tabla">
    <tr>
      <td class="gris" style="height: 18px;">Observaciones</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="height: 70px;"> @if($SitEcoComentarios=='') &nbsp; @else {{$SitEcoComentarios}} @endif</td>
    </tr>
  </table>

  <p style="font-family: century-gothic, sans-serif;  text-align: center;">REFERENCIAS PERSONALES</p>
  @for($j=0;$j<=2;$j++) @if($RefPerAplica[$j]=='Si')
   <table class="tabla" style="margin-top:20px margin-bottom=20px">
    <tr>
      <td class="gris" style="width:165px; height: 20px;">Nombre:</td>
      <td class="gris_blanca" style="text-align: center; height: 18px;">@if($RefPerNombre[$j]=='') &nbsp; @else {{$RefPerNombre[$j]}} @endif</td>
      <td class="gris" style="width: 80px; height: 20px;">Teléfono:</td>
      <td class="gris_blaca" style="text-align: center; height: 18px;"> @if($RefPerTelefono[$j]=='') &nbsp; @else {{$RefPerTelefono[$j]}} @endif</td>
    </tr>
    <tr>
      <td class="gris" style="height: 20px;">Tiempo de conocer:</td>
      <td class="gris_blanca" style="text-align: center; height: 18px; ">@if($RefPerTiempoConocer[$j]=='') &nbsp; @else {{$RefPerTiempoConocer[$j]}} @endif</td>
      <td class="gris" style="height: 20px;">Relación:</td>
      <td class="gris_blaca" style="text-align: center; height: 18px;">@if($RefPerRelacion[$j]=='') &nbsp; @else {{$RefPerRelacion[$j]}} @endif</td>
    </tr>
    <tr>
      <td class="gris">Comentarios:</td>
      <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">@if($RefPerComentarios[$j]=='') &nbsp; @else {{$RefPerComentarios[$j]}} @endif</td>
    </tr>
    </table>

    @endif

    @if($RefPerAplica[$j]=='No')
    <table class="tabla">
      <tr>
        <td class="gris" style="width:165px; height: 18px;">Nombre:</td>
        <td class="gris_blanca" style="text-align: center;">No aplica</td>
        <td class="gris" style="width: 80px">Telefono:</td>
        <td class="gris_blaca" style="text-align: center;">No aplica</td>
      </tr>
      <tr>
        <td class="gris">Tiempo de conocer:</td>
        <td class="gris_blanca" style="text-align: center; height: 18px;">No aplica</td>
        <td class="gris">Relación</td>
        <td class="gris_blaca" style="text-align: center;">No aplica</td>
      </tr>
      <tr>
        <td class="gris">Comentarios:</td>
        <td class="gris_blanca" style="height: 45px; text-align: center;" colspan="3" >No aplica</td>
      </tr>
    </table>
    @endif

    @endfor
    <p style="font-family: century-gothic, sans-serif;  text-align: center;">LABORAL</p>


    <table class="tabla">
      <tr>
        <td class="gris" colspan="3" style="height: 18px;">¿Ha tenido alguna demanda laboral, civil, mercantil o penal, o ha sido detenida alguna vez?</td>
        <td class="gris_blaca" style="height: 18px; background-color: #F78C1E; width: 50px; text-align: center;">@if($AntLegAlgunaVezFueDetenido=='') &nbsp; @else {{$AntLegAlgunaVezFueDetenido}} @endif</td>
      </tr>
      <tr>
        <td class="gris" style="width: 90px; height: 18;">Descripcion</td>
        <td class="gris_blaca" colspan="3" style="text-align: center; height: 18px;">@if($AntLegDescripcion=='') &nbsp; @else {{$AntLegDescripcion}} @endif</td>
      </tr>
    </table>
    <table class="tabla">
      <tr>
        <td class="gris" style="width: 320px; height: 18px;">¿Tiene familiares o conocidos dentro de la empresa?</td>
        <td class="gris_blanca" style="height: 18px; background-color: #F78C1E; width: 40px; text-align: center;">@if($LaboFamiliar=='') &nbsp; @else {{$LaboFamiliar}} @endif</td>
        <td class="gris" style="width: 50px; height: 18px;">¿Quién?</td>
        <td class="gris_blaca" style="height: 18px; text-align: center;">@if($LaboFamiliarNombre=='') &nbsp; @else {{$LaboFamiliarNombre}} @endif</td>
        <td class="gris" style="height: 18px; width: 50px;">Puesto:</td>
        <td class="gris_blaca" style="height: 18px; text-align: center;">@if($LaboFamiliarPuesto=='') &nbsp; @else {{$LaboFamiliarPuesto}} @endif</td>
      </tr>
      <tr>
        <td class="gris" style="height: 18px;">¿Cómo se enteró de la vacante?</td>
        <td class="gris_blanca" style="height: 18px; text-align: center;" colspan="5">@if($LaboEnteroVacante=='') &nbsp; @else {{$LaboEnteroVacante}} @endif</td>
      </tr>
      <tr>
        <td class="gris" style="height: 18px;">Si está empleado actualmente, ¿por qué desea cambiar?</td>
        <td class="gris_blanca" style="height: 18px; text-align: center;" colspan="5">@if($LaboDesicionCambioLaboral=='') &nbsp; @else {{$LaboDesicionCambioLaboral}} @endif</td>
      </tr>
      <tr>
        <td class="gris" style="height: 18px;">¿Tiene disponibilidad para viajar?</td>
        <td class="gris_blanca" style="background-color: #F78C1E; text-align: center;">@if($LaboDisponibilidadViajar=='') &nbsp; @else {{$LaboDisponibilidadViajar}} @endif</td>
        <td class="gris" style="height: 18px;">Motivo:</td>
        <td class="gris_blaca" colspan="3" style="height: 18px; text-align: center;">@if($LaboDisponibilidadViajar=='') &nbsp; @else @if($LaboDisponibilidadViajar=='Si') No aplica @else @if($LaboDisponibilidadViajarMotivo!="") {{$LaboDisponibilidadViajarMotivo}} @else &nbsp; @endif @endif @endif</td>
      </tr>
      <tr>
        <td class="gris" style="height: 18px;">¿Tiene disponibilidad para cambiar de residencia?</td>
        <td class="gris_blanca" style="height: 18px; background-color: #F78C1E; text-align: center;">@if($LaboDisponibiliddadCambiarRes=='') &nbsp; @else {{$LaboDisponibiliddadCambiarRes}} @endif</td>
        <td class="gris" style="height: 18px;">Motivo</td>
        <td class="gris_blaca" colspan="3" style=" height: 18px; text-align: center;">@if($LaboDisponibiliddadCambiarResM=='') &nbsp; @else @if($LaboDisponibiliddadCambiarRes=='Si') No aplica @else {{$LaboDisponibiliddadCambiarResM}} @endif @endif</td>
      </tr>
      <tr>
        <td class="gris" style="height: 18px;">¿A partir de que fecha puede comenzar a trabajar?</td>
        <td class="gris_blanca" colspan="5" style="text-align: center;">@if($LaboFechaIntegracion=='') &nbsp; @else {{$LaboFechaIntegracion}} @endif</td>
      </tr>
    </table>
</div>





<div class="page-break">
  &nbsp;
  @php $lo=0; @endphp
  @php $lo2=0; @endphp
  @for($j=0;$j<=2;$j++) 
    
  @if($TrayecLaboralAplica[$lo]=='No' || $TrayecLaboralAplica[$lo]==null )
  @if($lo!=6)
   @if($TrayecLaboralAplica[$lo+1]=='Si' ) 
   <img src="assets/img/favi-ico/gent.jpg" alt="logo gent" width="150px" style="margin: -20 0 0 -20;">
    <table class="sinTabla" style="margin-top: -20; margin-left: 100;">

      <tr>
        <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Nombre:</td>
        <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
        <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Puesto:</td>
        <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
      </tr>
    </table>
    @endif
    @endif
  @else

  <img src="assets/img/favi-ico/gent.jpg" alt="logo gent" width="150px" style="margin: -20 0 0 -20;">
    <table class="sinTabla" style="margin-top: -20; margin-left: 100;">

      <tr>
        <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Nombre:</td>
        <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
        <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Puesto:</td>
        <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
      </tr>
    </table>
  @endif

    @for($z=0;$z<=1;$z++) @if($TrayecLaboralAplica[$lo]=='Si' || $TrayecLaboralAplica[$lo]=='SI' || $TrayecLaboralAplica[$lo]=='si' ) <!--<p style="font-family: century-gothic, sans-serif; font-size: 9; text-align: center; margin-bottom: 0;">Trayectoria laboral</p>
      -->
      @php $lo2++; @endphp
      <p style="font-family: century-gothic, sans-serif;  text-align: center; margin-bottom: 0;"> TRAYECTORIA LABORAL</p>

      <table class="tabla" style="margin-top: 0px;">
        <tr>
          <td class="gris" style="width: 100px;">Empresa:</td>
          <td class="gris_blanca" style="width: 640px; @if($TrayecLaboralNombreEmpresa[$lo]=='NA') text-align:center; @endif">@if($TrayecLaboralNombreEmpresa[$lo]=='') &nbsp; @else
          @if($TrayecLaboralNombreEmpresa[$lo]=='NA') No aplica @else {{$TrayecLaboralNombreEmpresa[$lo]}} @endif @endif</td>
        </tr>
        <tr>
          <td class="gris" style="width: 100px;">Giro:</td>
          <td class="gris_blanca" style="width: 640px; @if($TrayecLaboralGiro[$lo]=='') text-align:center; @endif">@if($TrayecLaboralGiro[$lo]=='') &nbsp; @else
          @if($TrayecLaboralGiro[$lo]=='') No aplica @else {{$TrayecLaboralGiro[$lo]}} @endif @endif</td>
        </tr>
        <tr>
          <td class="gris" style="width: 100px;">Dirección:</td>
          <td class="gris_blanca" style="width: 640px;">@if($TrayecLaboralDireccion[$lo]=='') &nbsp; @else 
          @if($TrayecLaboralDireccion[$lo]=='NA') No aplica @else {{$TrayecLaboralDireccion[$lo]}} @endif @endif</td>
        </tr>
      </table>
      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 101px; ">e-mail:</td>
          <td class="gris_blanca" style="width: 259px; border-top: none; text-align: center;">@if($TrayecLaboralEmail[$lo]=='') &nbsp; @else {{$TrayecLaboralEmail[$lo]}} @endif</td>
          <td class="gris" style="width: 90px;">Oficina:</td>
          <td class="gris_blanca" style="width: 100px; border-top: none; text-align: center;">@if($TrayecLaboralTelOficina[$lo]=='') &nbsp; @else {{$TrayecLaboralTelOficina[$lo]}} @endif</td>
          <td class="gris" style="width: 90px; ">Celular jefe:</td>
          <td class="gris_blanca" style="width: 100px; border-top: none; text-align: center;">@if($TrayecLaboralCelularJefe[$lo]=='') &nbsp; @else {{$TrayecLaboralCelularJefe[$lo]}} @endif</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 0;">
      <tr>
          <td class="gris" style="width: 101px;">Puesto Inicial:</td>
          <td class="gris_blanca" style="width: 259px; text-align: center; border-top: none;">@if($TrayecLaboralTuestoInicial[$lo]=='') &nbsp; @else {{$TrayecLaboralTuestoInicial[$lo]}} @endif</td>
          <td class="gris" style="width: 90px; ">Salario Inicial:</td>
          <td class="gris_blanca" style="width: 14px; border-right: none; padding: 0 0 0 2px; border-top: none;  ">$</td>
          <td class="gris_blanca" style="width: 82px; text-align: right; border-left: none ; border-top: none; padding-right: 2px;">@if($TrayecLaboralTalarioInicial[$lo]=='') &nbsp; @else {{number_format($TrayecLaboralTalarioInicial[$lo])}}.00 @endif</td>
          <td class="gris" style="width: 90px;">Ingreso</td>
          <td class="gris_blanca" style="width: 100px; text-align: center; border-top: none;">@if($TrayecLaboralIngreso[$lo]=='') &nbsp; @else {{$TrayecLaboralIngreso[$lo]}} @endif</td>
        </tr>

        <tr>
          <td class="gris" style="width: 101px;">Puesto Final:</td>
          <td class="gris_blanca" style="width: 259px; text-align: center; border-top: none; border-bottom: none;">@if($TrayecLaboralTltimoPuesto[$lo]=='') &nbsp; @else {{$TrayecLaboralTltimoPuesto[$lo]}} @endif</td>
          <td class="gris" style="width: 90px; ">Salario Inicial:</td>
          <td class="gris_blanca" style="width: 14px; border-right: none; padding: 0 0 0 2px; border-top: none; border-bottom: none;">$</td>
          <td class="gris_blanca" style="width: 82px; text-align: right; border-left: none ; border-top: none; border-bottom: none; padding-right: 2px;">@if($TrayecLaboralTalarioFinal[$lo]=='') &nbsp; @else {{number_format($TrayecLaboralTalarioFinal[$lo])}}.00 @endif</td>
          <td class="gris" style="width: 90px;">Egreso</td>
          <td class="gris_blanca" style="width: 100px; text-align: center; border-top: none; border-bottom: none;">@if($TrayecLaboralEgreso[$lo]=='') &nbsp; @else {{$TrayecLaboralEgreso[$lo]}} @endif</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 100px;">Jefe inmediato</td>
          <td class="gris_blaca" style="width: 258px; height: 12px; text-align: center;">@if($TrayecLaboralTefeInmediato[$lo]=='') &nbsp; @else {{$TrayecLaboralTefeInmediato[$lo]}} @endif</td>
          <td class="gris" style="width: 190px;">Puesto/ área/ departamento</td>
          <td class="gris_blaca" style="width: 192px; height: 12px; text-align: center;">@if($TrayecLaboralPuestoJefeInmed[$lo]=='') &nbsp; @else {{$TrayecLaboralPuestoJefeInmed[$lo]}} @endif</td>
        </tr>
      </table>
      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 246px;" >Principales funciones del candidato:</td>
          <td class="gris_blaca" style="width: 494px; height: 30px; text-align: center;" >@if($TrayecLaboralPrincipalesFunci[$lo]=='') &nbsp; @else {{$TrayecLaboralPrincipalesFunci[$lo]}} @endif</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 101px;">Tipo de contrato:</td>
          <td class="gris_blaca" style="width: 145px; border-top: none; text-align: center;">@if($TrayecLaboralTipo_de_contrato[$lo]=='') &nbsp; @else {{$TrayecLaboralTipo_de_contrato[$lo]}} @endif</td>
          <td class="gris" style="width: 217px;">¿Perteneció a algún Sindicato?</td>
          <td class="gris_blanca" style="width: 30px;  text-align: center; background-color: #F78C1E;">@if($TrayecLaboralPertenecioSindica[$lo]=='') &nbsp; @else @if($TrayecLaboralPertenecioSindica[$lo]!='No aplica') {{$TrayecLaboralPertenecioSindica[$lo]}} @else N/A @endif @endif</td>
          <td class="gris" style="width: 50px;">¿Cuál?</td>
          <td class="gris_blanca" style="width: 197px; border-top: none; text-align: center;">@if($TrayecLaboralCualSindicato[$lo]=='') &nbsp; @else {{$TrayecLaboralCualSindicato[$lo]}} @endif</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 101px;">Motivo de separación:</td>
          <td class="gris_blaca" style="width: 145px; border-top: none; text-align: center;">@if($TrayecLaboralMotivoSeparacion[$lo]=='') &nbsp; @else {{$TrayecLaboralMotivoSeparacion[$lo]}} @endif</td>
          <td class="gris" style="width: 50px;">Causa:</td>
          <td class="gris_blanca" style="width: 197px; border-top: none; text-align: center;">@if($TrayecLaboralCausa[$lo]=='') &nbsp; @else {{$TrayecLaboralCausa[$lo]}} @endif</td>
          <td class="gris" style="width: 150px">¿Sería recontratable?:</td>
          <td class="gris_blanca" style="width: 97px; border-top: none; text-align: center;">@if($TrayecLaboralSeriaRecontratabl[$lo]=='') &nbsp; @else {{$TrayecLaboralSeriaRecontratabl[$lo]}} @endif</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 10px;">
        <tr>
          <td class="gris" colspan="6">Evaluación de desempeño</td>
        </tr>
        <tr>
          <td class="gris" style="width: 170px;">Criterios:</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Excelente</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Bueno</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Regular</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Malo</td>
          <td class="gris" style="width: 300px;">Observaciones</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Honradez</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriHonradez[$lo]=='Excelente') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriHonradez[$lo]=='Bueno') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriHonradez[$lo]=='Regular') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriHonradez[$lo]=='Malo') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" rowspan="4" style="text-align: center;">@if($TrayecLaboralObservaciones[$lo]=='') &nbsp; @else {{$TrayecLaboralObservaciones[$lo]}} @endif</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Calidad en el trabajo </td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriCalidadTrabajo[$lo]=='Excelente') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriCalidadTrabajo[$lo]=='Bueno') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriCalidadTrabajo[$lo]=='Regular') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriCalidadTrabajo[$lo]=='Malo') background-color:#F78C1E; @endif">&nbsp;</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Relación con superiores </td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriRelacionSuperi[$lo]=='Excelente') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriRelacionSuperi[$lo]=='Bueno') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriRelacionSuperi[$lo]=='Regular') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriRelacionSuperi[$lo]=='Malo') background-color:#F78C1E; @endif">&nbsp;</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Relación con compañeros</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriRelacionCompan[$lo]=='Excelente') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriRelacionCompan[$lo]=='Bueno') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriRelacionCompan[$lo]=='Regular') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriRelacionCompan[$lo]=='Malo') background-color:#F78C1E; @endif">&nbsp;</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Productividad</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriProductividad[$lo]=='Excelente') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriProductividad[$lo]=='Bueno') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriProductividad[$lo]=='Regular') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriProductividad[$lo]=='Malo') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris">Informó:</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Iniciativa</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriIniciativa[$lo]=='Excelente') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriIniciativa[$lo]=='Bueno') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriIniciativa[$lo]=='Regular') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriIniciativa[$lo]=='Malo') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style="text-align: center;">@if($TrayecLaboralnformo[$lo]=='') &nbsp; @else {{$TrayecLaboralnformo[$lo]}} @endif</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Puntualidad</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriPuntualidad[$lo]=='Excelente') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriPuntualidad[$lo]=='Bueno') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriPuntualidad[$lo]=='Regular') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriPuntualidad[$lo]=='Malo') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris">Puesto</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Responsabilidad</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriResponsabilida[$lo]=='Excelente') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriResponsabilida[$lo]=='Bueno') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriResponsabilida[$lo]=='Regular') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style=" @if($TrayecLaboralCriResponsabilida[$lo]=='Malo') background-color:#F78C1E; @endif">&nbsp;</td>
          <td class="gris_blanca" style="text-align: center;">@if($TrayecLaboralPuestoEvaluaDes[$lo]=='') &nbsp; @else {{$TrayecLaboralPuestoEvaluaDes[$lo]}} @endif</td>
        </tr>
      </table>
      @endif
      @php $lo++; @endphp
      @endfor

      @endfor

      @if($contadora==1 || $contadora==3 ||$contadora==5 )
      
      <p style="font-family: century-gothic, sans-serif;  text-align: center;"> TRAYECTORIA LABORAL</p>

      <table class="tabla" >
        <tr>
          <td class="gris" style="width: 100px; ">Empresa:</td>
          <td class="gris_blanca" style="width: 640px; text-align: center;">No aplica</td>
        </tr>
        <tr>
          <td class="gris" style="width: 100px;">Giro:</td>
          <td class="gris_blanca" style="width: 640px; text-align: center;">No aplica</td>
        </tr>
        <tr>
          <td class="gris" style="width: 100px;">Dirección:</td>
          <td class="gris_blanca" style="width: 640px; text-align: center;">No aplica</td>
        </tr>
      </table>
      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 101px; ">e-mail:</td>
          <td class="gris_blanca" style="width: 259px; border-top: none; text-align: center;"> No aplica</td>
          <td class="gris" style="width: 90px;">Oficina:</td>
          <td class="gris_blanca" style="width: 100px; border-top: none; text-align: center;">No aplica</td>
          <td class="gris" style="width: 90px; ">Celular jefe:</td>
          <td class="gris_blanca" style="width: 100px; border-top: none; text-align: center;">No aplica</td>
        </tr>
     </table>

     <table class="tabla" style="margin-top: 0;">
      <tr>
          <td class="gris" style="width: 101px;">Puesto Inicial:</td>
          <td class="gris_blanca" style="width: 259px; text-align: center; border-top: none;">No aplica</td>
          <td class="gris" style="width: 90px; ">Salario Inicial:</td>
          <td class="gris_blanca" style="width: 14px; border-right: none; padding: 0 0 0 2px; border-top: none;">$</td>
          <td class="gris_blanca" style="width: 84px; text-align: center; border-left: none ; border-top: none;">-</td>
          <td class="gris" style="width: 90px;">Ingreso</td>
          <td class="gris_blanca" style="width: 100px; text-align: center; border-top: none;">No aplica</td>
        </tr>

        <tr>
          <td class="gris" style="width: 101px;">Puesto Final:</td>
          <td class="gris_blanca" style="width: 259px; text-align: center; border-top: none; border-bottom: none;">No aplica</td>
          <td class="gris" style="width: 90px; ">Salario Inicial:</td>
          <td class="gris_blanca" style="width: 14px; border-right: none; padding: 0 0 0 2px; border-top: none; border-bottom: none;">$</td>
          <td class="gris_blanca" style="width: 84px; text-align: center; border-left: none ; border-top: none; border-bottom: none;">-</td>
          <td class="gris" style="width: 90px;">Egreso</td>
          <td class="gris_blanca" style="width: 100px; text-align: center; border-top: none; border-bottom: none;">No aplica</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 100px;">Jefe inmediato</td>
          <td class="gris_blaca" style="width: 258px; height: 12px; text-align: center;">No aplica</td>
          <td class="gris" style="width: 190px;">Puesto/ área/ departamento</td>
          <td class="gris_blaca" style="width: 192px; height: 12px; text-align: center;">No aplica</td>
        </tr>
      </table>
      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 246px;" >Principales funciones del candidato:</td>
          <td class="gris_blaca" style="width: 494px; height: 30px; text-align: center;" >No aplica</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 101px;">Tipo de contrato:</td>
          <td class="gris_blaca" style="width: 145px; border-top: none; text-align: center;">No aplica</td>
          <td class="gris" style="width: 217px;">¿Perteneció a algún Sindicato?</td>
          <td class="gris_blanca" style="width: 30px;  text-align: center; ">-</td>
          <td class="gris" style="width: 50px;">¿Cuál?</td>
          <td class="gris_blanca" style="width: 197px; border-top: none; text-align: center;">No aplica</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 101px;">Motivo de separación:</td>
          <td class="gris_blaca" style="width: 145px; border-top: none; text-align: center;">No aplica</td>
          <td class="gris" style="width: 50px;">Causa:</td>
          <td class="gris_blanca" style="width: 197px; border-top: none; text-align: center;">No aplica</td>
          <td class="gris" style="width: 150px">¿Sería recontratable?:</td>
          <td class="gris_blanca" style="width: 97px; border-top: none; text-align: center;">No aplica</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 10px;">
        <tr>
          <td class="gris" colspan="6">Evaluación de desempeño</td>
        </tr>
        <tr>
          <td class="gris" style="width: 170px;">Criterios:</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Excelente</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Bueno</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Regular</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Malo</td>
          <td class="gris" style="width: 300px;">Observaciones</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Honradez</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca">&nbsp;</td>
          <td class="gris_blanca" rowspan="4" style="text-align: center;">No aplica</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Calidad en el trabajo </td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca">&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Relación con superiores </td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Relación con compañeros</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Productividad</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris">Informó:</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Iniciativa</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca">&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" style="text-align: center;"> No aplica</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Puntualidad</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca">&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris">Puesto</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Responsabilidad</td>
          <td class="gris_blanca" style=" ">&nbsp;</td>
          <td class="gris_blanca" style=" ">&nbsp;</td>
          <td class="gris_blanca" style="">&nbsp;</td>
          <td class="gris_blanca" style=" ">&nbsp;</td>
          <td class="gris_blanca" style="text-align: center;">No aplica</td>
        </tr>
      </table>
      @endif

      @if($contadora==0 )
      <img src="assets/img/favi-ico/gent.jpg" alt="logo gent" width="150px" style="margin: -20 0 0 -20;">
  <table class="sinTabla" style="margin-top: -20; margin-left: 100;">

    <tr>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Nombre:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px; ">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Puesto:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
    </tr>

  </table>
      @for($t=0;$t<=1;$t++)

      
      <p style="font-family: century-gothic, sans-serif;  text-align: center;"> TRAYECTORIA LABORAL </p>

      <table class="tabla" >
        <tr>
          <td class="gris" style="width: 100px; ">Empresa:</td>
          <td class="gris_blanca" style="width: 640px; text-align: center;">No aplica</td>
        </tr>
        <tr>
          <td class="gris" style="width: 100px;">Giro:</td>
          <td class="gris_blanca" style="width: 640px; text-align: center;">No aplica</td>
        </tr>
        <tr>
          <td class="gris" style="width: 100px;">Dirección:</td>
          <td class="gris_blanca" style="width: 640px; text-align: center;">No aplica</td>
        </tr>
      </table>
      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 101px; ">e-mail:</td>
          <td class="gris_blanca" style="width: 259px; border-top: none; text-align: center;"> No aplica</td>
          <td class="gris" style="width: 90px;">Oficina:</td>
          <td class="gris_blanca" style="width: 100px; border-top: none; text-align: center;">No aplica</td>
          <td class="gris" style="width: 90px; ">Celular jefe:</td>
          <td class="gris_blanca" style="width: 100px; border-top: none; text-align: center;">No aplica</td>
        </tr>

      </table>

      <table class="tabla" style="margin-top: 0;">
      <tr>
          <td class="gris" style="width: 101px;">Puesto Inicial:</td>
          <td class="gris_blanca" style="width: 259px; text-align: center; border-top: none;">No aplica</td>
          <td class="gris" style="width: 90px; ">Salario Inicial:</td>
          <td class="gris_blanca" style="width: 14px; border-right: none; padding: 0 0 0 2px; border-top: none;">$</td>
          <td class="gris_blanca" style="width: 84px; text-align: center; border-left: none ; border-top: none;">-</td>
          <td class="gris" style="width: 90px;">Ingreso</td>
          <td class="gris_blanca" style="width: 100px; text-align: center; border-top: none;">No aplica</td>
        </tr>

        <tr>
          <td class="gris" style="width: 101px;">Puesto Final:</td>
          <td class="gris_blanca" style="width: 259px; text-align: center; border-top: none; border-bottom: none;">No aplica</td>
          <td class="gris" style="width: 90px; ">Salario Inicial:</td>
          <td class="gris_blanca" style="width: 14px; border-right: none; padding: 0 0 0 2px; border-top: none; border-bottom: none;">$</td>
          <td class="gris_blanca" style="width: 84px; text-align: center; border-left: none ; border-top: none; border-bottom: none;">-</td>
          <td class="gris" style="width: 90px;">Egreso</td>
          <td class="gris_blanca" style="width: 100px; text-align: center; border-top: none; border-bottom: none;">No aplica</td>
        </tr>
      </table>
      
      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 100px;">Jefe inmediato</td>
          <td class="gris_blaca" style="width: 258px; height: 12px; text-align: center;">No aplica</td>
          <td class="gris" style="width: 190px;">Puesto/ área/ departamento</td>
          <td class="gris_blaca" style="width: 192px; height: 12px; text-align: center;">No aplica</td>
        </tr>
      </table>
      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 246px;" >Principales funciones del candidato:</td>
          <td class="gris_blaca" style="width: 494px; height: 30px; text-align: center;" >No aplica</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 101px;">Tipo de contrato:</td>
          <td class="gris_blaca" style="width: 145px; border-top: none; text-align: center;">No aplica</td>
          <td class="gris" style="width: 217px;">¿Perteneció a algún Sindicato?</td>
          <td class="gris_blanca" style="width: 30px;  text-align: center; ">-</td>
          <td class="gris" style="width: 50px;">¿Cuál?</td>
          <td class="gris_blanca" style="width: 197px; border-top: none; text-align: center;">No aplica</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 0;">
        <tr>
          <td class="gris" style="width: 101px;">Motivo de separación:</td>
          <td class="gris_blaca" style="width: 145px; border-top: none; text-align: center;">No aplica</td>
          <td class="gris" style="width: 50px;">Causa:</td>
          <td class="gris_blanca" style="width: 197px; border-top: none; text-align: center;">No aplica</td>
          <td class="gris" style="width: 150px">¿Sería recontratable?:</td>
          <td class="gris_blanca" style="width: 97px; border-top: none; text-align: center;">No aplica</td>
        </tr>
      </table>

      <table class="tabla" style="margin-top: 10px;">
        <tr>
          <td class="gris" colspan="6">Evaluación de desempeño</td>
        </tr>
        <tr>
          <td class="gris" style="width: 170px;">Criterios:</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Excelente</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Bueno</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Regular</td>
          <td class="gris_blanca" style="width: 65px; text-align: center;">Malo</td>
          <td class="gris" style="width: 300px;">Observaciones</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Honradez</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca">&nbsp;</td>
          <td class="gris_blanca" rowspan="4" style="text-align: center;">No aplica</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Calidad en el trabajo </td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca">&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Relación con superiores </td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Relación con compañeros</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Productividad</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris">Informó:</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Iniciativa</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca">&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" style="text-align: center;"> No aplica</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Puntualidad</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca">&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris_blanca" >&nbsp;</td>
          <td class="gris">Puesto</td>
        </tr>
        <tr>
          <td class="gris_blanca" style="text-align: center;">Responsabilidad</td>
          <td class="gris_blanca" style=" ">&nbsp;</td>
          <td class="gris_blanca" style=" ">&nbsp;</td>
          <td class="gris_blanca" style="">&nbsp;</td>
          <td class="gris_blanca" style=" ">&nbsp;</td>
          <td class="gris_blanca" style="text-align: center;">No aplica</td>
        </tr>
      </table>
      @endfor
      @endif
</div>

<div class="page-break">
  <img src="assets/img/favi-ico/gent.jpg" alt="logo gent" width="150px" style="margin: -20 0 0 -20;">
  <table class="sinTabla" style="margin-top: -20; margin-left: 100;">

    <tr>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Nombre:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Puesto:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
    </tr>

  </table>

  <p style="font-family: century-gothic, sans-serif;  text-align: center; margin-bottom: 0; margin-top: 40px;">CROQUIS DE UBICACIÓN DEL DOMICILIO</p>


  <table class="tabla" style="margin-top: 20px;">

    <tr>
      <td class="gris_blanca" style="border:none; text-align: center;  font-weight: bold; width:600px; height: 740px ; height: 600px;">
        @if($CroquisImagen=="") Fotografía del croquis del corquis de la ubicación de la vivienda @else
        <img padding=0 class="pee" src='data:image/jpeg;base64,"{{$CroquisImagen}}"' alt='Prueba' style="width: 700px; height: 600px;">
        @endif
      </td>
    </tr>

  </table>
  <table class="tabla" style="margin-top: 20px;">
    <tr>
      <td class="gris" style="height: 25px; width: 250px;">¿Cuánto tiempo realiza de su casa al trabajo?</td>
      <td class="gris_blaca" style="text-align: center;"> @if($CroquisTiempo=='') &nbsp; @else {{$CroquisTiempo}} @endif</td>
      <td class="gris" style="height: 25px; width: 200px;">¿Medio de transporte que utiliza?</td>
      <td class="gris_blanca" style="text-align: center;"> @if($CroquisMedioTransporte=='') &nbsp; @else {{$CroquisMedioTransporte}} @endif</td>
    </tr>
  </table>
</div>

<div class="page-break">
  <img src="assets/img/favi-ico/gent.jpg" alt="logo gent" width="150px" style="margin: -20 0 0 -20;">
  <table class="sinTabla" style="margin-top: -20; margin-left: 100;">

    <tr>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Nombre:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Puesto:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
    </tr>

  </table>

  <p style="font-family: century-gothic, sans-serif;  text-align: center; margin-bottom: 0; margin-top: 20px;">FOTOS DEL DOMICILIO</p>


  <table class="tabla" style="margin-top: 10px;">

    @if($FotoDomicilioInterior!="")
    <tr>
      <td class="gris_blanca" style="text-align: center; border: none; font-weight: bold;">
        @if($FotoDomicilioInterior=="") Fotografía interior del domicilio
        (candidato de cuerpo completo con panorama amplio y la toma debe de realizarse en horizontal) @else
        <img padding=0 class="pee" src='data:image/jpeg;base64,"{{$FotoDomicilioInterior}}"' alt='Prueba'>
        @endif
      </td>
    </tr>

    @else
    <tr>
      <td class="gris_blanca" style="text-align: center; width: 740px; height: 390px ; font-weight: bold;">Fotografía interior del domicilio
        (candidato de cuerpo completo, la fachada completa y la toma debe de realizarse en horizontal)</td>
    </tr>
    @endif
    <tr>
      <td class="gris_blanca" style="height: 10px; background-color:white; font-weight: bold; border: none">
        &nbsp;
      </td>
    </tr>

    @if($FotoDomicilioExterior!="")
    <tr>
      <td class="gris_blanca" style="text-align: center; border: none;">
        @if($FotoDomicilioExterior=="") Fotografía exterior del domicilio
        (candidato de cuerpo completo, la fachada completa y la toma debe de realizarse en horizontal) @else
        <img class="pee" padding=0 src='data:image/jpeg;base64,"{{$FotoDomicilioExterior}}"' alt='Prueba'>
        @endif
      </td>
    </tr>
    @else
    <tr>
      <td class="gris_blanca" style="text-align: center; width:600px; height: 390px ; font-weight: bold;">Fotografía exterior del domicilio
        (candidato de cuerpo completo, la fachada completa y la toma debe de realizarse en horizontal)</td>
    </tr>
    @endif

  </table>
</div>
<style>
  .page-break {
    page-break-after: always;
  }

  .pee {
    width: 500px;
    height: 250px;
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
  <p style="font-size: 14px; width: 300px; margin: -60 0 0 100; font-weight:bold; border: solid 0.5px black; padding: 1px 10px 1px 10px;">SOCIOECONOMIC STATUS</p>
  <table class="fecha">
    <tr>
      <td class="naranja">DAY</td>
      <td class="naranja">MONTH</td>
      <td class="naranja">YEAR</td>
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
      <td class="blanco" @if($DictamenVal=='Apto' ) style="background-color: #2ECC71 ;" @endif @if($DictamenVal=='No Apto' ) style="background-color: #E74C3C;" @endif @if($DictamenVal=='Apto a Reserva' ) style="background-color: #F4D03F;" @endif>@if($DictamenVal=='') &nbsp; @endif 
      @if($DictamenVal=='Apto' ) SUITABLE @endif @if($DictamenVal=='No Apto' ) NO SUITABLE @endif @if($DictamenVal=='Apto a Reserva' ) SUITABLE FOR RESERVATION @endif
      </td>
    </tr>
  </table>

  <table class="sinTabla" style="margin-top: -50; margin-bottom: 20;">

    <tr>
      <td style="width: 60px;  padding: 3px 10px 3px 10px; font-weight:bold; font-size: 11px;">Company name:</td>
      <td style="border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($clientes=='') &nbsp; @endif {{$clientes}}</td>
    </tr>
    <tr>
      <td style="width: 60px;  padding: 3px 10px 3px 10px; font-weight:bold; font-size: 11px;">Name:</td>
      <td style="border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
    </tr>
    <tr>
      <td style="width: 100px;  padding: 3px 10px 3px 10px; font-weight:bold; font-size: 11px;">Position:</td>
      <td style="width: 340px; border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
    </tr>
  </table>

  <p style="margin-top: 10px;">RESUME</p>

  <table class="tabla" style="margin-top: 0;">
    <tr>
      <td class="gris" style="font-size: 12px;" >1. Socioeconomic status</td>
    </tr>
    <tr>
      <td class='gris_blanca' style="width: 740px;  padding: 3px 10px 3px 10px; height:70px;">@if($ResumenEconomica=='') &nbsp; @endif {{$ResumenEconomica}}</td>
    </tr>
  </table>

  <p style="font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px;">GENERAL DATA</p>

  <table class="tabla" width=740px; style="margin-top: 0;">

    <tr>
      <td class="gris_blanca" style="width:155px; font-weight:bold;">Candidate name:</td>
      <td class="gris_blanca" colspan="5">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold; ">Address:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($domi=='') &nbsp; @endif {{$domi}}</td>
      <td class="gris_blanca" style="font-weight:bold;">Int. and ext. number:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($NumeroInteriorExterior=='') &nbsp; @endif {{$NumeroInteriorExterior}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold; ">Colony:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($col=='') &nbsp; @endif {{$col}}</td>
      <td class="gris_blanca" style="font-weight:bold; ">Municipality/State:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($mun=='') &nbsp; @endif {{$mun}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold;">Zip code:</td>
      <td class="gris_blanca" style="text-align: center;">@if($postal=='') &nbsp; @endif {{$postal}}</td>
      <td class="gris_blanca" style="font-weight:bold; ">Cell phone:</td>
      <td class="gris_blanca" style="text-align: center;">@if($cel=='NA') - @else @if($cel=='') &nbsp; @endif {{$cel}} @endif</td>
      <td class="gris_blanca" style="font-weight:bold; ">Telephone:</td>
      <td class="gris_blanca" style="text-align: center;">@if($tel=='NA') - @else @if($tel=='') &nbsp; @endif {{$tel}} @endif</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold;">Time living at home:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($domiT=='') &nbsp; @endif {{$domiT}}</td>
      <td class="gris_blanca" style="font-weight:bold;">Between strets:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($entreC=='') &nbsp; @endif {{$entreC}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold;">Previous address:</td>
      <td class="gris_blanca" colspan="4" style="text-align: center;">@if($domiA=='') &nbsp; @endif {{$domiA}}</td>
      <td class="gris_blanca" style="text-align: center;">@if($domiA=='Does not apply') - @else @if($domiAT=='') &nbsp; @endif {{$domiAT}} @endif</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold;">Date of birth:</td>
      <td class="gris_blanca" colspan="2" style="text-align: center;">@if($nac=='') &nbsp; @endif {{$nac}}</td>
      <td class="gris_blanca" style="font-weight:bold;">Place:</td>
      <td class="gris_blanca" colspan="2" style="text-align: center;">@if($nacLug=='') &nbsp; @endif {{$nacLug}}</td>

    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold;">Marital status:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($estC=='') &nbsp; @endif {{$estC}}</td>
      <td class="gris_blanca" style="font-weight:bold;">Email:</td>
      <td class="gris_blanca" style="text-align: center;" colspan="2">@if($corE=='') &nbsp; @endif {{$corE}}</td>
    </tr>

  </table>


  <table class="sinTabla" style=" margin-left: 100;">

    <tr>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Name:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($candidato=='') &nbsp; @endif {{$candidato}} </td>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Job Position:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
    </tr>

  </table>


  <p style="font-family: century-gothic, sans-serif;  text-align: center;">DOCUMENTATION</p>

  <table class="tabla" style="margin-top: 0;">
    <tr>
      <td class="gris_blanca" style="font-weight:bold; width:170px; text-align: center;">Documents</td>
      <td class="gris_blanca" style="font-weight:bold;  text-align: center;" colspan="8">Certificate No. </td>
      <td class="gris_blanca" style="font-weight:bold; width:134px; text-align: center;">Comparison with document</td>
    </tr>
  </table>


  <table class="tabla" style="margin-top: 0;">
    <tr>
      <td class="gris_blanca" style="border-top: none; width: 170px;">Valid official identification</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; border-top: none; width: 55px;">Key:</td>
      <td class="gris_blanca" style="text-align: center; border-top: none;">@if($ClaveIne=='NA') Does not apply @else @if($ClaveIne=='') &nbsp; @endif {{$ClaveIne}} @endif</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; border-top: none;">OCR:</td>
      <td class="gris_blanca" style="text-align: center; border-top: none;">@if($ClaveIne=='NA') - @else @if($OCRIne=='') &nbsp; @endif {{$OCRIne}} @endif</td>
      <td class="gris_blanca" style=" border-top: none; text-align: center; width: 134px;">@if($ValidacionIne=='') &nbsp; @endif {{$ValidacionIne}}</td>
    </tr>
    <tr>
      <td class="gris_blanca">CURP or naturalization letter</td>
      <td class="gris_blanca" colspan="4" style="text-align: center;"> @if($CurpONaturlizacion=='NA') Does not apply @else @if($CurpONaturlizacion=='') &nbsp; @endif {{$CurpONaturlizacion}} @endif</td>
      <td class="gris_blanca" style="text-align: center;">@if($ValidaionCurp=='') &nbsp; @endif {{$ValidaionCurp}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" rowspan="2">Proof of address</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Service:</td>
      <td class="gris_blanca" style="text-align: center;">@if($ServicioComDomicilio=='NA') Does not apply @else @if($ServicioComDomicilio=='') &nbsp; @endif {{$ServicioComDomicilio}} @endif</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Date:</td>
      <td class="gris_blanca" style="text-align: center;">@if($ServicioComDomicilio=='NA') - @else @if($FechaComDomicilio=='') &nbsp; @endif {{$FechaComDomicilio}} @endif</td>
      <td class="gris_blanca" rowspan="2" style="text-align: center;">@if($ValidacionComDomicilio=='') &nbsp; @endif {{$ValidacionComDomicilio}}</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Holder:</td>
      <td class="gris_blanca" style="text-align: center;">@if($ServicioComDomicilio=='NA') - @else @if($TitularComDomicilio=='') &nbsp; @endif {{$TitularComDomicilio}} @endif</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Relation:</td>
      <td class="gris_blanca" style="text-align: center;">@if($ServicioComDomicilio=='NA') - @else @if($RelacionComDomicilio=='') &nbsp; @endif {{$RelacionComDomicilio}} @endif</td>

    </tr>
    <tr>
      <td class="gris_blanca">Social Security Number</td>
      <td class="gris_blanca" style="text-align: center;" colspan="4">@if($ImssNumAfiliacion=='NA') Does not apply @else @if($ImssNumAfiliacion=='') &nbsp; @endif {{$ImssNumAfiliacion}} @endif</td>
      <td class="gris_blanca" style="text-align: center;">@if($ImssValidacion=='') &nbsp; @endif {{$ImssValidacion}}</td>
    </tr>
    <tr>
      <td class="gris_blanca">Proof of registration RFC</td>
      <td class="gris_blanca" style="text-align: center;" colspan="4">@if($RfcEmpresa=='NA') Does not apply @else @if($RfcEmpresa=='') &nbsp; @endif {{$RfcEmpresa}} @endif</td>
      <td class="gris_blanca" style="text-align: center;">@if($RfcValidacion=='') &nbsp; @endif 

        @if($RfcValidacion=='Presenta Original') Original Document @endif 
        @if($RfcValidacion=='Presenta Copia') Copy Document @endif 
        @if($RfcValidacion=='No Presenta') No Document @endif 
        @if($RfcValidacion=='No aplica') Does not apply @endif 
        &nbsp;
      </td>
    </tr>

  </table>

  <table class="tabla">
    <tr>
      <td class="gris" colspan="9" style="height:18px ;">Type of housing</td>
    </tr>
    <tr>

      <td class="gris_blanca" style="text-align: center; height:18px ; font-weight: bold; width: 90px;">The house is:</td>
      <td class="gris_blanca" style="text-align: center; width: 80px;">@if($SitEcoLaViviendaEs=='') &nbsp; @endif {{$SitEcoLaViviendaEs}}</td>
      <td class="gris_blanca" style="text-align: center; font-weight: bold; width: 90px;">Remarks:</td>
      <td class="gris_blanca" style="text-align: center;">@if($SitEcoObservaciones=='') &nbsp; @endif {{$SitEcoObservaciones}}</td>
      <td class="gris_blanca" style="text-align: center; font-weight: bold; width: 70px;">Services:</td>
      <td class="gris_blanca" style="text-align: center; width: 40px; height: 20px; @if($ViviendaTipoLuz=='Si') background-color:#F78C1E @endif">Energy</td>
      <td class="gris_blanca" style="text-align: center; width: 40px; @if($ViviendaTipoAgua=='Si') background-color:#F78C1E @endif">Water</td>
      <td class="gris_blanca" style="text-align: center; width: 40px; @if($ViviendaTipoGas=='Si') background-color:#F78C1E @endif">Gas</td>
      <td class="gris_blanca" style="text-align: center; width: 50px; @if($ViviendaTipoDrenaje=='Si') background-color:#F78C1E @endif">Drainage</td>
    </tr>
  </table>

  <table class="tabla">
    <tr>
      <td class="gris" colspan="5" style="height:18px ;">Type of house</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px; @if($ViviendaTipoTipoCasa=='Casa') background-color:#F78C1E; @endif">House</td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px; @if($ViviendaTipoTipoCasa=='Departamento') background-color:#F78C1E; @endif">Apartment </td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px; @if($ViviendaTipoTipoCasa=='Condominio') background-color:#F78C1E; @endif">Condominium</td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px; @if($ViviendaTipoTipoCasa=='Unidad Habitacional') background-color:#F78C1E; @endif">Housing unit</td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px; @if($ViviendaTipoTipoCasa=='Vivienda popular') background-color:#F78C1E; @endif">Popular Housing</td>
    </tr>
  </table>

  <table class="tabla">
    <tr>
      <td class="gris" style="height:18px ;">Furniture</td>
      <td class="gris">Cleaning</td>
      <td class="gris">Order</td>
      <td class="gris">Quality</td>
    </tr>
    <tr>
      <td class="gris_blanco" style="text-align: center; height:18px ;">@if($ViviendaTipoCalidadMobiliario=='') &nbsp; @endif {{$ViviendaTipoCalidadMobiliario}}</td>
      <td class="gris_blanco" style="text-align: center;">@if($ViviendaTipoCalidadLimpieza=='') &nbsp; @endif {{$ViviendaTipoCalidadLimpieza}}</td>
      <td class="gris_blanco" style="text-align: center;">@if($ViviendaTipoCalidadOrden=='') &nbsp; @endif {{$ViviendaTipoCalidadOrden}}</td>
      <td class="gris_blanco" style="text-align: center;">@if($ViviendaTipoCalidadGeneral=='') &nbsp; @endif {{$ViviendaTipoCalidadGeneral}}</td>
    </tr>
  </table>

  <table class="tabla" style="margin-top: 0;">
    <tr>
      <td class="gris_blaca" style="border-bottom: none; height: 30px; padding-left: 5px; padding-top: 0px;" colspan="3">Realizó Investigación:</td>
    </tr>
    <tr>
      <td class="gris_blaca" style=" text-align: center; border-top:none; border-bottom: none; " colspan="3">
        &nbsp; @if($firma!=null)<img src='data:image/jpeg;base64,"{{$firma}}"' alt="Fiema" width="180px" height="58px">@endif
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
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Name:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;">@if($candidato=='') &nbsp; @endif {{$candidato}}</td>
      <td style="width: 50px;  padding: 3px 10px 3px 10px; font-weight:bold;">Position:</td>
      <td style="width: 200px;  border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px;"> @if($puesto!="") {{$puesto}} @endif &nbsp;</td>
    </tr>

  </table>

  <p style="font-family: century-gothic, sans-serif;  text-align: center; margin-bottom: 0; margin-top: 40px;">SKETCH OF HOME LOCATION  </p>


  <table class="tabla" style="margin-top: 0px;">

    <tr>
      <td class="gris_blanca" style="border:none; text-align: center;  font-weight: bold; width:600px; height: 740px ; height: 250px;">
        @if($CroquisImagen=="") Photograph of the corquis sketch of the location of the home @else
        <img padding=0 class="pee" src='data:image/jpeg;base64,"{{$CroquisImagen}}"' alt='Prueba' style="width: 500px; height: 250px;">
        @endif
      </td>
    </tr>

  </table>
  <table class="tabla" style="margin-top: 20px;">
    <tr>
      <td class="gris" style="height: 20px; width: 250px;">¿How much time do you commute from home to work?</td>
      <td class="gris_blaca" style="text-align: center;"> @if($CroquisTiempo=='') &nbsp; @else {{$CroquisTiempo}} @endif</td>
      <td class="gris" style="height: 20px; width: 200px;">What type of transportation is used?</td>
      <td class="gris_blanca" style="text-align: center;"> @if($CroquisMedioTransporte=='') &nbsp; @else {{$CroquisMedioTransporte}} @endif</td>
    </tr>
  </table>

  <p style="font-family: century-gothic, sans-serif;  text-align: center; margin-bottom: 0; margin-top: 20px;">PHOTOS OF THE ADDRESS PHOTO OF THE CANDIDATE'S ADDRESS</p>

  <table class="tabla" style="margin-top: 0px;">

    @if($FotoDomicilioInterior!="")
    <tr>
      <td class="gris_blanca" style="text-align: center; border: none; font-weight: bold;">
        @if($FotoDomicilioInterior=="") Interior photography of the home
        (full body candidate with wide panorama and the shot must be taken horizontally) @else
        <img padding=0 class="pee" src='data:image/jpeg;base64,"{{$FotoDomicilioInterior}}"' alt='Prueba'>
        @endif
      </td>
    </tr>

    @else
    <tr>
      <td class="gris_blanca" style="text-align: center; width: 740px; height: 250px ; font-weight: bold;">Finterior photography of the home
      (full body candidate, the entire façade and the shot must be taken horizontally)</td>
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
        @if($FotoDomicilioExterior=="") Exterior photograph of the home
        (full body candidate, the entire façade and the shot must be taken horizontally) @else
        <img class="pee" padding=0 src='data:image/jpeg;base64,"{{$FotoDomicilioExterior}}"' alt='Prueba'>
        @endif
      </td>
    </tr>
    @else
    <tr>
      <td class="gris_blanca" style="text-align: center; width:600px; height: 250px ; font-weight: bold;">Exterior photograph of the home
      (full body candidate, the entire façade and the shot must be taken horizontally)</td>
    </tr>
    @endif

  </table>
</div>
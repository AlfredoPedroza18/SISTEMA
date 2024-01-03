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


<!-- 
  HOJA NUMERO 2
-->
<div class="page-break">

  <p style="font-size: 20px; font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px; margin-bottom: 0px;">VISIBLE EN SOLICITUD</DEL></p>

  &nbsp;
  @foreach ($resulActual1 as $ou)
  <p style=" background-color: white;  color: black; margin-top:none; text-align: left">{{$ou->Etiqueta}} &nbsp;</p>
  @endforeach

</div>

<div class="page-break">

  <p style="font-size: 20px; font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px; margin-bottom: 0px;">Datos Generales</p>

  <table class="tabla" style="margin-top: 10px;">
    <tr>
      <td class="gris" style="width: 600px; padding: 3px;">Campos Seleccionados</td>
      <td class="gris" style="text-align:center; text-align:center; width: 140px; padding: 3px;">N° Veces seleccionados
      </td>
    </tr>
  </table>
  <table class="tabla" style="margin-top: 10px;">


    @if(count($NombreCandidato)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Nombre Candidato</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($NombreCandidato)-1}}</td>
    </tr> @endif
    @if(count($ApellidoPaternoCandidato)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Apellido Paterno Candidato</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($ApellidoPaternoCandidato)-1}}</td>
    </tr> @endif
    @if(count($ApellidoMaternoCandidato)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Apellido Materno Candidato</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($ApellidoMaternoCandidato)-1}}</td>
    </tr> @endif
    @if(count($Domicilio)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Domicilio</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($Domicilio)-1}}</td>
    </tr> @endif
    @if(count($TiempoVivirDomicilio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Tiempo Vivir Domicilio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px; text-align: center;">{{count($TiempoVivirDomicilio)-1}}</td>
    </tr> @endif
    @if(count($NumeroInteriorExterior)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Número Interior Exterior</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($NumeroInteriorExterior)-1}}</td>
    </tr> @endif
    @if(count($Colonia)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Colonia</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($Colonia)-1}}</td>
    </tr> @endif
    @if(count($MunicipioEstado)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Municipio Estado</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($MunicipioEstado)-1}}</td>
    </tr> @endif
    @if(count($CodigoPostal)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Código Postal</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($CodigoPostal)-1}}</td>
    </tr> @endif
    @if(count($AplicaCelular)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Aplica Celular</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($AplicaCelular)-1}}</td>
    </tr> @endif
    @if(count($Celular)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Celular</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($Celular)-1}}</td>
    </tr> @endif
    @if(count($AplicaTelefono)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Aplica Teléfono</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($AplicaTelefono)-1}}</td>
    </tr> @endif
    @if(count($Telefono)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Teléfono</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($Telefono)-1}}</td>
    </tr> @endif
    @if(count($DomicilioAnterior)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Domicilio Anterior</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($DomicilioAnterior)-1}}</td>
    </tr> @endif
    @if(count($TiempoVivirDomicilioAnterior)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Tiempo Vivir Domicilio Anterior</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($TiempoVivirDomicilioAnterior)-1}}</td>
    </tr> @endif
    @if(count($EntreCalles)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Entre Calles</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($EntreCalles)-1}}</td>
    </tr> @endif
    @if(count($CorreoElectronico)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Correo Electrónico</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($CorreoElectronico)-1}}</td>
    </tr> @endif
    @if(count($FechaNacimiento)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Fecha Nacimiento</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($FechaNacimiento)-1}}</td>
    </tr> @endif
    @if(count($LugarNacimiento)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Lugar Nacimiento</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($LugarNacimiento)-1}}</td>
    </tr> @endif
    @if(count($EdoCivil)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Estado Civil</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($EdoCivil)-1}}</td>
    </tr> @endif
    @if(count($Nacionalidad)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Nacionalidad</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($Nacionalidad)-1}}</td>
    </tr> @endif
    @if(count($GradoParticipa)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Grado Participa</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($GradoParticipa)-1}}</td>
    </tr> @endif
    @if(count($MotivoSolicitudBeca)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Motivo Solicitud Beca</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($MotivoSolicitudBeca)-1}}</td>
    </tr> @endif
    @if(count($ViveCon)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Vive Con</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($ViveCon)-1}}</td>
    </tr> @endif
    @if(count($CandidatoFueraPaisSeisMeses)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Candidato Fuera Pais Seis Meses</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($CandidatoFueraPaisSeisMeses)-1}}</td>
    </tr> @endif
    @if(count($Edad)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Edad</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($Edad)-1}}</td>
    </tr> @endif
    @if(count($Sexo)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Sexo</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($Sexo)-1}}</td>
    </tr> @endif
    @if(count($PuestoCandidato)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Puesto Candidato</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($PuestoCandidato)-1}}</td>
    </tr> @endif
    @if(count($NombreEscuela)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Nombre Escuela</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($NombreEscuela)-1}}</td>
    </tr> @endif
    @if(count($Nombredelabeca)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Nombre de la beca</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($Nombredelabeca)-1}}</td>
    </tr> @endif
    @if(count($DatosGeneralesExtension)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Datos GeneralesExtension</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($DatosGeneralesExtension)-1}}</td>
    </tr> @endif
    @if(count($EstadoRepublica)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Estado Republica</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($EstadoRepublica)-1}}</td>
    </tr> @endif
    @if(count($Calle)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Calle</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($Calle)-1}}</td>
    </tr> @endif
    @if(count($NombreEmpresa)>1)<tr>
      <td class="gris_blanca" style=" padding: 3px;">Nombre Empresa</td>
      <td class="gris_blanca" style=" padding: 3px; text-align: center;">{{count($NombreEmpresa)-1}}</td>
    </tr> @endif

    <tr>
      <td class="gris" style=" padding: 3px;">&nbsp;</td>
      <td class="gris" style="padding: 3px;">&nbsp;</td>
    </tr>
  </table>

</div>

<div class="page-break">

  <p style="font-size: 20px; font-family: century-gothic, sans-serif;  text-align: center; margin-top: 8px; margin-bottom: 0px; ">DOCUMENTACIÓN</p>

  <table class="tabla" style="margin-top: 10px;">
    <tr>
      <td class="gris" style=" padding: 3px; width: 600px;">Campos Seleccionados</td>
      <td class="gris" style="padding: 3px; width: 140px;">N° Veces seleccionados
      </td>
    </tr>
  </table>
  <table class="tabla" style="margin-top: 10px;">

    @if(count($Aviso_de_privacidad)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aviso de privacidad</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($Aviso_de_privacidad)-1}}</td>
    </tr> @endif
    @if(count($AplicaActaNacimineto)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Acta de Nacimineto</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($AplicaActaNacimineto)-1}}</td>
    </tr> @endif
    @if(count($NoActaNacimiento)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">No. de Acta de Nacimiento</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($NoActaNacimiento)-1}}</td>
    </tr> @endif
    @if(count($AnioActaNacimineto)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Año Acta de Nacimineto</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($AnioActaNacimineto)-1}}</td>
    </tr> @endif
    @if(count($FojaActaNacimiento)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Foja Acta de Nacimiento</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($FojaActaNacimiento)-1}}</td>
    </tr> @endif
    @if(count($LibroActaNacimiento)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Libro Acta de Nacimiento</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($LibroActaNacimiento)-1}}</td>
    </tr> @endif
    @if(count($ValidacionActaNacimiento)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validacion Acta de Nacimiento</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ValidacionActaNacimiento)-1}}</td>
    </tr> @endif
    @if(count($ArchivoActaNacimiento)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo Acta de Nacimiento</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ArchivoActaNacimiento)-1}}</td>
    </tr> @endif
    @if(count($AplicaIne)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Identificación</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($AplicaIne)-1}}</td>
    </tr> @endif
    @if(count($TipoIdentificacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Tipo de Identificacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($TipoIdentificacion)-1}}</td>
    </tr> @endif
    @if(count($ClaveIne)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Clave/Número de Identificación</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ClaveIne)-1}}</td>
    </tr> @endif
    @if(count($OCRIne)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">OCR/Fecha de caducidad de Identificación</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($OCRIne)-1}}</td>
    </tr> @endif
    @if(count($ValidacionIne)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validacion de Identificación</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ValidacionIne)-1}}</td>
    </tr> @endif
    @if(count($ArchivoIne)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo de Identificación</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ArchivoIne)-1}}</td>
    </tr> @endif

    @if(count($AplicaCurp)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Curp o carta de naturalización</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($AplicaCurp)-1}}</td>
    </tr> @endif
    @if(count($CurpONaturlizacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Curp o carta de naturalización</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CurpONaturlizacion)-1}}</td>
    </tr> @endif
    @if(count($ValidaionCurp)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validaion del Curp o carta de naturalización</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ValidaionCurp)-1}}</td>
    </tr> @endif
    @if(count($ArchivoCurp)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo del Curp o carta de naturalización</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ArchivoCurp)-1}}</td>
    </tr> @endif
    @if(count($AplicaComDomicilio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Comprobante de Domicilio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($AplicaComDomicilio)-1}}</td>
    </tr> @endif
    @if(count($ServicioComDomicilio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Servicio del Comprobante de Domicilio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ServicioComDomicilio)-1}}</td>
    </tr> @endif
    @if(count($FechaComDomicilio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Fecha del Comprobante de Domicilio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($FechaComDomicilio)-1}}</td>
    </tr> @endif
    @if(count($TitularComDomicilio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Titular del Comprobante de Domicilio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($TitularComDomicilio)-1}}</td>
    </tr> @endif
    @if(count($RelacionComDomicilio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Relacion del Comprobante de Domicilio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($RelacionComDomicilio)-1}}</td>
    </tr> @endif
    @if(count($ValidacionComDomicilio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validacion del Comprobante de Domicilio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ValidacionComDomicilio)-1}}</td>
    </tr> @endif
    @if(count($ArchivoComprobanteDom)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo Comprobante de Domicilio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ArchivoComprobanteDom)-1}}</td>
    </tr> @endif
    @if(count($ImssAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Imss</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ImssAplica)-1}}</td>
    </tr> @endif
    @if(count($ImssNumAfiliacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Número de Afiliación Imss</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ImssNumAfiliacion)-1}}</td>
    </tr> @endif
    @if(count($ImssValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validación Imss</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ImssValidacion)-1}}</td>
    </tr> @endif
    @if(count($ImssArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo Imss</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ImssArchivo)-1}}</td>
    </tr> @endif
    @if(count($CartaRecomendacionAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Carta de Recomendación </td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CartaRecomendacionAplica)-1}}</td>
    </tr> @endif
    @if(count($CartaRecomendacionEmpresa)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Nombre de Empresa emisora de la carta</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CartaRecomendacionEmpresa)-1}}</td>
    </tr> @endif
    @if(count($CartaRecomendacionValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validación de la Carta de Recomendacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CartaRecomendacionValidacion)-1}}</td>
    </tr> @endif
    @if(count($CartaRecomendacionArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo de la Carta de Recomendacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CartaRecomendacionArchivo)-1}}</td>
    </tr> @endif

    @if(count($ReciboNominaAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Recibo de Nómina</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ReciboNominaAplica)-1}}</td>
    </tr> @endif
    @if(count($ReciboNominaEmpresa)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Nombre de la Empresa emisora del Recibo de Nómina</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ReciboNominaEmpresa)-1}}</td>
    </tr> @endif
    @if(count($ReciboNominaFecha)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Fecha del Recibo de Nómina</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ReciboNominaFecha)-1}}</td>
    </tr> @endif
    @if(count($ReciboNominaValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validación del Recibo de Nómina</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ReciboNominaValidacion)-1}}</td>
    </tr> @endif
    @if(count($ReciboNominaArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo del Recibo de Nómina</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ReciboNominaArchivo)-1}}</td>
    </tr> @endif
    @if(count($RfcAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica RFC</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($RfcAplica)-1}}</td>
    </tr> @endif
    @if(count($RfcEmpresa)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Clave de RFC</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($RfcEmpresa)-1}}</td>
    </tr> @endif
    @if(count($RfcValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validacion de RFC</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($RfcValidacion)-1}}</td>
    </tr> @endif
    @if(count($RfcArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo de RFC</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($RfcArchivo)-1}}</td>
    </tr> @endif

    @if(count($UltimoGradoAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Último Comprobante de Estudios</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($UltimoGradoAplica)-1}}</td>
    </tr> @endif
    @if(count($UltimoGradoEscuela)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Escuela del Comprobante de Estudios</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($UltimoGradoEscuela)-1}}</td>
    </tr> @endif

    @if(count($UltimoGradoGrado)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Grado del Comprobante de Estudios</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($UltimoGradoGrado)-1}}</td>
    </tr> @endif
    @if(count($UltimoGradoValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validación del Comprobante de Estudios</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($UltimoGradoValidacion)-1}}</td>
    </tr> @endif
    @if(count($UltimoGradoArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo del Comprobante de Estudios</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($UltimoGradoArchivo)-1}}</td>
    </tr> @endif
  </table>
  <table class="tabla" style="margin-top: 0;">
    @if(count($UltimoGradoProfesion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">UltimoGradoProfesion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($UltimoGradoProfesion)-1}}</td>
    </tr> @endif
    @if(count($CreditoInfonavitAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Crédito Infonavit</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoInfonavitAplica)-1}}</td>
    </tr> @endif
    @if(count($CreditoInfonavitNum)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Número del Crédito Infonavit</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoInfonavitNum)-1}}</td>
    </tr> @endif
    @if(count($CreditoInfonavitMonto)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Monto del Crédito Infonavit</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoInfonavitMonto)-1}}</td>
    </tr> @endif
    @if(count($CreditoInfonavitValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validación del Crédito Infonavit</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoInfonavitValidacion)-1}}</td>
    </tr> @endif
    @if(count($ArchivoCreditoInfonavit)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo del Crédito Infonavit</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ArchivoCreditoInfonavit)-1}}</td>
    </tr> @endif

    @if(count($CreditoFonacotAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Crédito Fonacot</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoFonacotAplica)-1}}</td>
    </tr> @endif
    @if(count($CreditoFonacotNum)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Número del Crédito Fonacot</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoFonacotNum)-1}}</td>
    </tr> @endif
    @if(count($CreditoFonacotMonto)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Monto del Crédito Fonacot</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoFonacotMonto)-1}}</td>
    </tr> @endif
    @if(count($CreditofonacotValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validación Crédito Fonacot</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditofonacotValidacion)-1}}</td>
    </tr> @endif
    @if(count($CreditoFonacotArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo del Crédito Fonacot</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoFonacotArchivo)-1}}</td>
    </tr> @endif
    @if(count($AplicaActaMatrimonio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Acta de Matrimonio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($AplicaActaMatrimonio)-1}}</td>
    </tr> @endif
    @if(count($NoActaMatrimonio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">No. de Acta de Matrimonio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($NoActaMatrimonio)-1}}</td>
    </tr> @endif
    @if(count($AnioActaMatrimonio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Año de Acta de Matrimonio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($AnioActaMatrimonio)-1}}</td>
    </tr> @endif
    @if(count($FojaActaMatrimonio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Foja de Acta de Matrimonio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($FojaActaMatrimonio)-1}}</td>
    </tr> @endif
    @if(count($LibroActaMatrimonio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Libro de Acta Matrimonio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($LibroActaMatrimonio)-1}}</td>
    </tr> @endif
    @if(count($ValidacionActaMatrimonio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validación de Acta de Matrimonio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ValidacionActaMatrimonio)-1}}</td>
    </tr> @endif
    @if(count($ArchivoActaMatrimonio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo de Acta de Matrimonio</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ArchivoActaMatrimonio)-1}}</td>
    </tr> @endif
    @if(count($AplicaActaNacimientoConyugue)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Acta de Nacimiento de Cónyugue</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($AplicaActaNacimientoConyugue)-1}}</td>
    </tr> @endif
    @if(count($NoActaNacimientoConyugue)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">No. de Acta Nacimiento de Cónyugue</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($NoActaNacimientoConyugue)-1}}</td>
    </tr> @endif
    @if(count($AnioActaNacimientoConyugue)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Año de Acta Nacimiento Cónyugue</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($AnioActaNacimientoConyugue)-1}}</td>
    </tr> @endif
    @if(count($FojaActaNacimientoConyugue)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Foja de Acta de Nacimiento Cónyugue</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($FojaActaNacimientoConyugue)-1}}</td>
    </tr> @endif
    @if(count($LibroActaNacimientoConyugue)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Libro de Acta Nacimiento Cónyugue</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($LibroActaNacimientoConyugue)-1}}</td>
    </tr> @endif
    @if(count($ValidacionActaNacimientoConyug)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validación de Acta Nacimiento Cónyugue</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ValidacionActaNacimientoConyug)-1}}</td>
    </tr> @endif
    @if(count($ArchivoActaNacimientoConyugue)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo de Acta Nacimiento Cónyugue</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ArchivoActaNacimientoConyugue)-1}}</td>
    </tr> @endif
    @if(count($AplicaActaNacimientoHijo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Acta Nacimiento de Hijo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($AplicaActaNacimientoHijo)-1}}</td>
    </tr> @endif
    @if(count($NoActaNacimientoHijo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">No. de Acta Nacimiento de Hijo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($NoActaNacimientoHijo)-1}}</td>
    </tr> @endif
    @if(count($AnioNacimientoHijo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Año de Acta de Nacimiento de Hijo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($AnioNacimientoHijo)-1}}</td>
    </tr> @endif
    @if(count($FojaActaNacimientoHijo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Foja de Acta de Nacimiento de Hijo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($FojaActaNacimientoHijo)-1}}</td>
    </tr> @endif
    @if(count($LibroNoActaNacimientoHijo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Libro de Acta de Nacimiento de Hijo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($LibroNoActaNacimientoHijo)-1}}</td>
    </tr> @endif
    @if(count($ValidacionActaNacimientoHijo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Validación de Acta Nacimiento de Hijo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ValidacionActaNacimientoHijo)-1}}</td>
    </tr> @endif
    @if(count($ArchivoActaNacimientoHijo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Archivo de Acta de Nacimiento de Hijo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($ArchivoActaNacimientoHijo)-1}}</td>
    </tr> @endif

    @if(count($CedulaProfesionalNo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CedulaProfesionalNo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CedulaProfesionalNo)-1}}</td>
    </tr> @endif
    @if(count($CedulaProfesionalValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CedulaProfesionalValidacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CedulaProfesionalValidacion)-1}}</td>
    </tr> @endif
    @if(count($CedulaProfesionalArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CedulaProfesionalArchivo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CedulaProfesionalArchivo)-1}}</td>
    </tr> @endif
    @if(count($CedulaProfesional)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CedulaProfesional</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CedulaProfesional)-1}}</td>
    </tr> @endif

    @if(count($CompAguaTitula)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompAguaTitula</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompAguaTitula)-1}}</td>
    </tr> @endif
    @if(count($CompAguaRelacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompAguaRelacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompAguaRelacion)-1}}</td>
    </tr> @endif
    @if(count($CompAguaFecha)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompAguaFecha</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompAguaFecha)-1}}</td>
    </tr> @endif
    @if(count($CompAguaPago)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompAguaPago</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompAguaPago)-1}}</td>
    </tr> @endif
    @if(count($CompAguaArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompAguaArchivo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompAguaArchivo)-1}}</td>
    </tr> @endif
    @if(count($CompAguaValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompAguaValidacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompAguaValidacion)-1}}</td>
    </tr> @endif
    @if(count($CompGasTitula)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompGasTitula</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompGasTitula)-1}}</td>
    </tr> @endif
    @if(count($CompGasRelacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompGasRelacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompGasRelacion)-1}}</td>
    </tr> @endif
    @if(count($CompGasFecha)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompGasFecha</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompGasFecha)-1}}</td>
    </tr> @endif
    @if(count($CompGasPago)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompGasPago</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompGasPago)-1}}</td>
    </tr> @endif
    @if(count($CompGasArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompGasArchivo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompGasArchivo)-1}}</td>
    </tr> @endif
    @if(count($CompGasValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompGasValidacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompGasValidacion)-1}}</td>
    </tr> @endif
    @if(count($CompLuzTitula)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompLuzTitula</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompLuzTitula)-1}}</td>
    </tr> @endif
    @if(count($CompLuzRelacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompLuzRelacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompLuzRelacion)-1}}</td>
    </tr> @endif
    @if(count($CompLuzFecha)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompLuzFecha</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompLuzFecha)-1}}</td>
    </tr> @endif
    @if(count($CompLuzPago)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompLuzPago</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompLuzPago)-1}}</td>
    </tr> @endif
    @if(count($CompLuzArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompLuzArchivo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompLuzArchivo)-1}}</td>
    </tr> @endif
    @if(count($CompLuzValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompLuzValidacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompLuzValidacion)-1}}</td>
    </tr> @endif
    @if(count($CompTelefonoTitula)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompTelefonoTitula</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompTelefonoTitula)-1}}</td>
    </tr> @endif
    @if(count($CompTelefonoRelacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompTelefonoRelacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompTelefonoRelacion)-1}}</td>
    </tr> @endif
    @if(count($CompTelefonoFecha)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompTelefonoFecha</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompTelefonoFecha)-1}}</td>
    </tr> @endif
    @if(count($CompTelefonoPago)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompTelefonoPago</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompTelefonoPago)-1}}</td>
    </tr> @endif
    @if(count($CompTelefonoArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompTelefonoArchivo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompTelefonoArchivo)-1}}</td>
    </tr> @endif
    @if(count($CompTelefonoValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CompTelefonoValidacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CompTelefonoValidacion)-1}}</td>
    </tr> @endif

    @if(count($EdoCtaBanco)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EdoCtaBanco</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($EdoCtaBanco)-1}}</td>
    </tr> @endif
    @if(count($EdoCtaArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EdoCtaArchivo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($EdoCtaArchivo)-1}}</td>
    </tr> @endif
    @if(count($EdoCtaValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EdoCtaValidacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($EdoCtaValidacion)-1}}</td>
    </tr> @endif
    @if(count($EdoCtaFecha)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EdoCtaFecha</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($EdoCtaFecha)-1}}</td>
    </tr> @endif
    @if(count($EdoCtaBanco2)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EdoCtaBanco2</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($EdoCtaBanco2)-1}}</td>
    </tr> @endif
    @if(count($EdoCtaFecha2)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EdoCtaFecha2</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($EdoCtaFecha2)-1}}</td>
    </tr> @endif
    @if(count($EdoCtaValidacion2)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EdoCtaValidacion2</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($EdoCtaValidacion2)-1}}</td>
    </tr> @endif
    @if(count($EdoCtaArchivo2)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EdoCtaArchivo2</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($EdoCtaArchivo2)-1}}</td>
    </tr> @endif
    @if(count($PasaporteNo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">PasaporteNo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($PasaporteNo)-1}}</td>
    </tr> @endif
    @if(count($PasaporteArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">PasaporteArchivo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($PasaporteArchivo)-1}}</td>
    </tr> @endif
    @if(count($PasaporteValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">PasaporteValidacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($PasaporteValidacion)-1}}</td>
    </tr> @endif
    @if(count($PasaporteAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">PasaporteAplica</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($PasaporteAplica)-1}}</td>
    </tr> @endif
    @if(count($CreditoHipotecarioNum)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CreditoHipotecarioNum</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoHipotecarioNum)-1}}</td>
    </tr> @endif
    @if(count($CreditoHipotecarioMonto)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CreditoHipotecarioMonto</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoHipotecarioMonto)-1}}</td>
    </tr> @endif
    @if(count($CreditoHipotecarioArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CreditoHipotecarioArchivo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoHipotecarioArchivo)-1}}</td>
    </tr> @endif
    @if(count($CreditoHipotecarioValidacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CreditoHipotecarioValidacion</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoHipotecarioValidacion)-1}}</td>
    </tr> @endif
    @if(count($CreditoHipotecarioAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">CreditoHipotecarioAplica</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($CreditoHipotecarioAplica)-1}}</td>
    </tr> @endif
    @if(count($DocumentacionObservaciones)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">DocumentacionObservaciones</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($DocumentacionObservaciones)-1}}</td>
    </tr> @endif
    @if(count($IncidenciaLegalesArchivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">IncidenciaLegalesArchivo</td>
      <td class="gris_blanca" style="text-align:center; text-align:center; width: 140px; padding: 3px;">{{count($IncidenciaLegalesArchivo)-1}}</td>
    </tr> @endif



    <tr>
      <td class="gris" style=" padding: 3px;">&nbsp;</td>
      <td class="gris" style="padding: 3px;">&nbsp;</td>
    </tr>
  </table>


</div>


<div class="page-break">

  <p style="font-size: 20px; font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px; margin-bottom: 0px;">ESCOLARIDAD</p>

  <table class="tabla" style="margin-top: 10px;">
    <tr>
      <td class="gris" style=" padding: 3px; width: 600px;">Campos Seleccionados</td>
      <td class="gris" style="padding: 3px; width: 140px;">N° Veces seleccionados
      </td>
    </tr>
  </table>
  <table class="tabla" style="margin-top: 10px;">
    @if(count($EscolaridadAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Institución</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadAplica)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadUltimoGrado)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Grado de Estudio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadUltimoGrado)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadInstitucion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Nombre de la Institución </td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadInstitucion)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadDomicilio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Domicilio de la Institución</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadDomicilio)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadPeriodo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Periodo cursado en la Institución</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadPeriodo)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadAnios)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Años en la Institución </td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadAnios)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadComprobante)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Comprobante de Escolaridad </td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadComprobante)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadIdioma)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Idioma</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadIdioma)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadIdiomaNombre)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Nombre del Idioma</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadIdiomaNombre)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadIdiomaNivel)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Nivel del Idioma</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadIdiomaNivel)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadIdiomaComprobante)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Comprobante del Idioma</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadIdiomaComprobante)-1}}</td>
    </tr> @endif

    @if(count($EscolaridadObservaciones)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Observaciones de Escolaridad</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadObservaciones)-1}}</td>
    </tr> @endif




    @if(count($EscolaridadBeca)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EscolaridadBeca</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadBeca)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadPorcentaje)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EscolaridadPorcentaje</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadPorcentaje)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadPersonaCoroborro)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EscolaridadPersonaCoroborro</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadPersonaCoroborro)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadVerificacionInstitu)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EscolaridadVerificacionInstitu</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadVerificacionInstitu)-1}}</td>
    </tr> @endif
    @if(count($EscolaridadProfesion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EscolaridadProfesion</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($EscolaridadProfesion)-1}}</td>
    </tr> @endif


    <tr>
      <td class="gris" style=" padding: 3px;">&nbsp;</td>
      <td class="gris" style="padding: 3px;">&nbsp;</td>
    </tr>
  </table>


</div>


<div class="page-break">

  <p style="font-size: 20px; font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px; margin-bottom: 0px;">SITUACIÓN ECONÓMICA Y SOCIAL</p>

  <table class="tabla" style="margin-top: 10px;">
    <tr>
      <td class="gris" style=" padding: 3px; width: 600px;">Campos Seleccionados</td>
      <td class="gris" style="padding: 3px; width: 140px;">N° Veces seleccionados
      </td>
    </tr>
  </table>
  <table class="tabla" style="margin-top: 10px;">
    @if(count($SitEcoDatoFamiliarAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Familia directa o personas que vivan en el domicilio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoFamiliarAplica)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoFamiliarNombre)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Nombre de Familia directa o personas que vivan en el domicilio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoFamiliarNombre)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoFamiliarParentesco)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Parentesco  de Familia directa o personas que vivan en el domicilio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoFamiliarParentesco)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoFamiliarEdad)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Edad  de Familia directa o personas que vivan en el domicilio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoFamiliarEdad)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDaboFamiliarEstadoCivil)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Estado Civil  de Familia directa o personas que vivan en el domicilio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDaboFamiliarEstadoCivil)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoFamiliarOcupacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Ocupación de Familia directa o personas que vivan en el domicilio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoFamiliarOcupacion)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoFamiliarEmpresa)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Empresa  de Familia directa o personas que vivan en el domicilio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoFamiliarEmpresa)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoFamiliarDireccion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Dirección  de Familia directa o personas que vivan en el domicilio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoFamiliarDireccion)-1}}</td>
    </tr> @endif
     @if(count($SitEcoDatoMedEnfermedadCro)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Padece o a padecido alguna enfermedad como crónica o degenerativa</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoMedEnfermedadCro)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoMedEnfermedadCroNomb)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">¿Cúal enfermedad crónica?</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoMedEnfermedadCroNomb)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoMedTratamientoMed)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">¿Se encuentra bajo algún tratamiento Medíco?</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoMedTratamientoMed)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoMedTratamientoMedNom)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">¿Cuál tratamiento?</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoMedTratamientoMedNom)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoMedAlergico)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">¿És alergíco?</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoMedAlergico)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoMedAlergiaNombre)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">¿A qué es alergíco?</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoMedAlergiaNombre)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoMedControlado)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">¿Toma medicamento Controlado?</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoMedControlado)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoMedControladoNombre)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">¿Cúal es el medicamento controlado?</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoMedControladoNombre)-1}}</td>
    </tr> @endif
    
    @if(count($SitEcoDatoFamiliarAporta)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoDatoFamiliarAporta</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoFamiliarAporta)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoFamiliarIngresoMensu)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoDatoFamiliarIngresoMensu</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoFamiliarIngresoMensu)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoFamiliarDependeCandi)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoDatoFamiliarDependeCandi</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoFamiliarDependeCandi)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEmerNombre)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Nombre de emergencia</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEmerNombre)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEmerAplicaCelular)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Celular</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEmerAplicaCelular)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEmerCelular)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Celular</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEmerCelular)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEmerRelacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Relación</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEmerRelacion)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEmerAplicaTelefono)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Télefono</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEmerAplicaTelefono)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEmerNombreTelefonoFijo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Télefono Fijo</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEmerNombreTelefonoFijo)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEmerTipoSangre)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Tipo Sangre</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEmerTipoSangre)-1}}</td>
    </tr> @endif
    @if(count($SitEcoCortoPlazo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Objetivo a corto Plazo</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoCortoPlazo)-1}}</td>
    </tr> @endif
    @if(count($SitEcoMedianoPlazo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Objetivo a mediano Plazo</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoMedianoPlazo)-1}}</td>
    </tr> @endif
    @if(count($SitEcoLargoPlazo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Objetivo a Largo Plazo</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoLargoPlazo)-1}}</td>
    </tr> @endif
    @if(count($SitEcoPrincipalesPrincipales)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Principales Pasatiempos</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoPrincipalesPrincipales)-1}}</td>
    </tr> @endif

    @if(count($SitEcoLaViviendaEs)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">La Vivienda Es</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoLaViviendaEs)-1}}</td>
    </tr> @endif
    @if(count($SitEcoObservaciones)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Propiedad de</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoObservaciones)-1}}</td>
    </tr> @endif
    @if(count($ViviendaTipoLuz)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Servicio de Luz</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoLuz)-1}}</td>
    </tr> @endif
    @if(count($ViviendaTipoAgua)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Servicio de Agua</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoAgua)-1}}</td>
    </tr> @endif
    @if(count($ViviendaTipoGas)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Servicio de Gas</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoGas)-1}}</td>
    </tr> @endif
    @if(count($ViviendaTipoDrenaje)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Servicio de Drenaje</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoDrenaje)-1}}</td>
    </tr> @endif
    @if(count($ViviendaTipoTipoCasa)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Tipo de casa habitación</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoTipoCasa)-1}}</td>
    </tr> @endif
     @if(count($ViviendaTipoCalidadMobiliario)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Mobiliario</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoCalidadMobiliario)-1}}</td>
    </tr> @endif
  @if(count($ViviendaTipoCalidadLimpieza)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Calidad de Limpieza</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoCalidadLimpieza)-1}}</td>
    </tr> @endif
    @if(count($ViviendaTipoCalidadOrden)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Calidad de Orden</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoCalidadOrden)-1}}</td>
    </tr> @endif
    @if(count($ViviendaTipoCalidadGeneral)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Calidad General de la vivienda</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoCalidadGeneral)-1}}</td>
    </tr> @endif
    @if(count($ViviendaTipoNivelSocioeconomic)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Tipo de zona</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoNivelSocioeconomic)-1}}</td>
    </tr> @endif
    
    @if(count($SitEcoIngMenAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Economía mensual Ingreso</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoIngMenAplica)-1}}</td>
    </tr> @endif
    @if(count($SitEcoIngMenDescripcion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Parentesco de Economía mensual Ingreso</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoIngMenDescripcion)-1}}</td>
    </tr> @endif
    @if(count($SitEcoIngMenTipo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Tipo Economía mensual Ingreso</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoIngMenTipo)-1}}</td>
    </tr> @endif
    @if(count($SitEcoIngMenMonto)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Monto Economía mensual Ingreso</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoIngMenMonto)-1}}</td>
    </tr> @endif

    @if(count($SitEcoEgreMenEconomia)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Economia</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEgreMenEconomia)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEgreMenAlimentacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Alimentación</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEgreMenAlimentacion)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEgreMenTipo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Tipo de vivienda </td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEgreMenTipo)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEgreMenTipoMonto)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Tipo de vivienda Monto</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEgreMenTipoMonto)-1}}</td>
    </tr> @endif
    </table>
    <table class="tabla" style="margin-top: 0;">
    @if(count($SitEcoEgreMenServicios)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Servicios</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEgreMenServicios)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEgreMenCreditos)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Creditos</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEgreMenCreditos)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEgreMenGastos)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Gastos Escolares</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEgreMenGastos)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEgreMenDiversiones)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Diversiones</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEgreMenDiversiones)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEgreMenOtros)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Otros</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEgreMenOtros)-1}}</td>
    </tr> @endif
    @if(count($SitEcoEgreMenDeficitSolventa)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Deficit como lo Solventa</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoEgreMenDeficitSolventa)-1}}</td>
    </tr> @endif


    @if(count($SitEcoAutoMarca)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Automóvil</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoAutoMarca)-1}}</td>
    </tr> @endif
    @if(count($SitEcoBienesraices)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Bienes raíces</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoBienesraices)-1}}</td>
    </tr> @endif
    @if(count($SitEcoUbicacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Ubicación</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoUbicacion)-1}}</td>
    </tr> @endif
    @if(count($SitEcoCreditos)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Tarjetas de Crédito o departamentales</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoCreditos)-1}}</td>
    </tr> @endif


    @if(count($SitEcoCreditosMontoTotal)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Monto de credito Total</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoCreditosMontoTotal)-1}}</td>
    </tr> @endif
    @if(count($SitEcoInversionAhorro)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoInversionAhorro</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoInversionAhorro)-1}}</td>
    </tr> @endif
    @if(count($SitEcoInversionAhorroMonto)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoInversionAhorroMonto</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoInversionAhorroMonto)-1}}</td>
    </tr> @endif
    @if(count($SitEcoAdeudo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoAdeudo</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoAdeudo)-1}}</td>
    </tr> @endif
    @if(count($SitEcoAduedoMonto)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoAduedoMonto</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoAduedoMonto)-1}}</td>
    </tr> @endif
    @if(count($SitEcoAvalNombres)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoAvalNombres</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoAvalNombres)-1}}</td>
    </tr> @endif
    @if(count($SitEcoCreditoAutomotriz)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoCreditoAutomotriz</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoCreditoAutomotriz)-1}}</td>
    </tr> @endif
    @if(count($SitEcocreditosAdeudos)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcocreditosAdeudos</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcocreditosAdeudos)-1}}</td>
    </tr> @endif
    @if(count($SitEcoComentarios)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Comentarios  Situación Economica y Social</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoComentarios)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDepPadres)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoDepPadres</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDepPadres)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDepPadresPorcentaje)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoDepPadresPorcentaje</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDepPadresPorcentaje)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDepTrabajaActualmente)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoDepTrabajaActualmente</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDepTrabajaActualmente)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDepTieneDependientes)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoDepTieneDependientes</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDepTieneDependientes)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDepDependientes)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoDepDependientes</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDepDependientes)-1}}</td>
    </tr> @endif
    @if(count($SitEcoCuentaConBeca)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoCuentaConBeca</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoCuentaConBeca)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDescripcionBecas)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoDescripcionBecas</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDescripcionBecas)-1}}</td>
    </tr> @endif
    @if(count($SitEcoProgramaSocial)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoProgramaSocial</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoProgramaSocial)-1}}</td>
    </tr> @endif
    @if(count($SitEcoProgramaSocialNombres)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoProgramaSocialNombres</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoProgramaSocialNombres)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDepTrabajaActualmenteHor)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoDepTrabajaActualmenteHor</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDepTrabajaActualmenteHor)-1}}</td>
    </tr> @endif
    @if(count($SitEcoDatoFamiliarObserGen)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">SitEcoDatoFamiliarObserGen</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($SitEcoDatoFamiliarObserGen)-1}}</td>
    </tr> @endif
    
    
  
    @if(count($ViviendaTipoHabitantes)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">ViviendaTipoHabitantes</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoHabitantes)-1}}</td>
    </tr> @endif

    
    @if(count($ViviendaTipoDescripcionExterio)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">ViviendaTipoDescripcionExterio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoDescripcionExterio)-1}}</td>
    </tr> @endif
   
    
    @if(count($ViviendaTipoMaterialCasa)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">ViviendaTipoMaterialCasa</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($ViviendaTipoMaterialCasa)-1}}</td>
    </tr> @endif
   





    
    
  

    <tr>
      <td class="gris" style=" padding: 3px;">&nbsp;</td>
      <td class="gris" style="padding: 3px;">&nbsp;</td>
    </tr>
  </table>


</div>


<div class="page-break">

  <p style="font-size: 20px; font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px; margin-bottom: 0px;">REFERENCIAS PERSONALES</p>
  <table class="tabla" style="margin-top: 10px;">
    <tr>
      <td class="gris" style=" padding: 3px; width: 600px;">Campos Seleccionados</td>
      <td class="gris" style="padding: 3px; width: 140px;">N° Veces seleccionados
      </td>
    </tr>
  </table>
  <table class="tabla" style="margin-top: 10px;">
    @if(count($RefPerAplica )>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;"> Aplica Referencia Personal </td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($RefPerAplica )-1}}</td>
    </tr> @endif
    @if(count($RefPerNombre )>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;"> Nombre de la Referecnia Personal </td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($RefPerNombre )-1}}</td>
    </tr> @endif
    @if(count($RefPerTiempoConocer )>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;"> Tiempo de conocer al candidato </td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($RefPerTiempoConocer )-1}}</td>
    </tr> @endif
    @if(count($RefPerTelefono )>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;"> Télefono de la Referecnia Personal</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($RefPerTelefono )-1}}</td>
    </tr> @endif
    @if(count($RefPerRelacion )>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;"> Relación con el Candidato</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($RefPerRelacion )-1}}</td>
    </tr> @endif
    @if(count($RefPerComentarios )>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;"> Comentario de la Referecnia Personal</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($RefPerComentarios )-1}}</td>
    </tr> @endif
    @if(count($RefPerResumen )>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;"> Resumen de las Referecnias Personales</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($RefPerResumen )-1}}</td>
    </tr> @endif
    

    <tr>
      <td class="gris" style=" padding: 3px;">&nbsp;</td>
      <td class="gris" style="padding: 3px;">&nbsp;</td>
    </tr>

  </table>


</div>

<div class="page-break">

  <p style="font-size: 20px; font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px; margin-bottom: 0px;">LABORAL</p>
  <table class="tabla" style="margin-top: 10px;">
    <tr>
      <td class="gris" style=" padding: 3px; width: 600px;">Campos Seleccionados</td>
      <td class="gris" style="padding: 3px; width: 140px;">N° Veces seleccionados
      </td>
    </tr>
  </table>
  <table class="tabla" style="margin-top: 10px;">
    @if(count($AntLeg)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Antecedentes Legales</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($AntLeg)-1}}</td>
    </tr> @endif
    @if(count($AntLegDescripcion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Descripcion de los Antecedentes Legales</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($AntLegDescripcion)-1}}</td>
    </tr> @endif
    @if(count($AntLegAlgunaVezFueDetenido)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Alguna Vez Fue Detenido</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($AntLegAlgunaVezFueDetenido)-1}}</td>
    </tr> @endif
    @if(count($LaboFamiliar)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Familiares Dentro de la Empresa</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($LaboFamiliar)-1}}</td>
    </tr> @endif
    @if(count($LaboFamiliarNombre)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Nombre del Familiar</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($LaboFamiliarNombre)-1}}</td>
    </tr> @endif
    @if(count($LaboFamiliarPuesto)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Puesto del Familiar</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($LaboFamiliarPuesto)-1}}</td>
    </tr> @endif
    @if(count($LaboEnteroVacante)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Como se Entero de la Vacante</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($LaboEnteroVacante)-1}}</td>
    </tr> @endif
    @if(count($LaboDesicionCambioLaboral)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Cambio de empleo motivo</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($LaboDesicionCambioLaboral)-1}}</td>
    </tr> @endif
    @if(count($LaboDisponibilidadViajar)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Disponibilidad de Viajar</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($LaboDisponibilidadViajar)-1}}</td>
    </tr> @endif
    @if(count($LaboDisponibilidadViajarMotivo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Motivo por el cual no puede viajar</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($LaboDisponibilidadViajarMotivo)-1}}</td>
    </tr> @endif
    @if(count($LaboDisponibiliddadCambiarRes)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Disponibilidad de Cambiar de Residencia</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($LaboDisponibiliddadCambiarRes)-1}}</td>
    </tr> @endif
    @if(count($LaboDisponibiliddadCambiarResM)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Motivo por el cual no puede Cambiar de Residencia </td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($LaboDisponibiliddadCambiarResM)-1}}</td>
    </tr> @endif
    @if(count($LaboFechaIntegracion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Fecha de Integración</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($LaboFechaIntegracion)-1}}</td>
    </tr> @endif
    <tr>
      <td class="gris" style=" padding: 3px;">&nbsp;</td>
      <td class="gris" style="padding: 3px;">&nbsp;</td>
    </tr>

  </table>


</div>

<div class="page-break">

  <p style="font-size: 20px; font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px; margin-bottom: 0px;">TRAYECTORIA LABORAL</DEL></p>
  <table class="tabla" style="margin-top: 10px;">
    <tr>
      <td class="gris" style=" padding: 3px; width: 600px;">Campos Seleccionados</td>
      <td class="gris" style="padding: 3px; width: 140px;">N° Veces seleccionados
      </td>
    </tr>
  </table>
  <table class="tabla" style="margin-top: 10px;">
    @if(count($TrayecLaboralAplica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Trayectoria Laboral</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralAplica)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralNombreEmpresa)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Nombre de la Empresa</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralNombreEmpresa)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralRazonSocial)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Razón Social de la Empresa</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralRazonSocial)-1}}</td>
    </tr> @endif
    @if(count($AplicaEmpresaTelefono)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Télefono</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($AplicaEmpresaTelefono)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralTelOficina)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Número de Télefono de Oficina</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralTelOficina)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralEXT)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">EXT</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralEXT)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralEmail)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Email de la Empresa</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralEmail)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralGiro)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Giro de la Empresa</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralGiro)-1}}</td>
    </tr> @endif
    @if(count($AplicaEmpresaCelular)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Aplica Celular</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($AplicaEmpresaCelular)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralCelularJefe)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Celular Jefe</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCelularJefe)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralDireccion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Dirección de la Empresa</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralDireccion)-1}}</td>
    </tr> @endif

    @if(count($TrayecLaboralTuestoInicial)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Puesto Inicial</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralTuestoInicial)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralTalarioInicial)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Salario Inicial</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralTalarioInicial)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralTltimoPuesto)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Puesto Final</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralTltimoPuesto)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralTalarioFinal)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Salario Final</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralTalarioFinal)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralIngreso)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Fecha de Ingreso</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralIngreso)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralEgreso)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Fecha de Egreso</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralEgreso)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralEmpleoActual)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Empleo Actual</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralEmpleoActual)-1}}</td>
    </tr> @endif

    @if(count($TrayecLaboralTefeInmediato)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Nombre del Jefe Inmediato</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralTefeInmediato)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralPuestoJefeInmed)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Puesto del Jefe Inmediato</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralPuestoJefeInmed)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralPrincipalesFunci)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Principales Funciones del Candidato</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralPrincipalesFunci)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralTipo_de_contrato)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Tipo de contrato</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralTipo_de_contrato)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralPertenecioSindica)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Perteneció a un Sindicato</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralPertenecioSindica)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralCualSindicato)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">A Cúal Sindicato Pertenecio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCualSindicato)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralMotivoSeparacion)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Motivo de Separación</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralMotivoSeparacion)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralCausa)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Causa de Separación</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCausa)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralSeriaRecontratabl)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Sería Recontratable</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralSeriaRecontratabl)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralCuentaConPrestamo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">TrayecLaboralCuentaConPrestamo</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCuentaConPrestamo)-1}}</td>
    </tr> @endif
   @if(count($TrayecLaboralCriHonradez)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Honradez</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCriHonradez)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralCriCalidadTrabajo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Calidad de Trabajo</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCriCalidadTrabajo)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralCriRelacionSuperi)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Relación con sus Superiores</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCriRelacionSuperi)-1}}</td>
    </tr> @endif

    @if(count($TrayecLaboralCriRelacionCompan)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Relación con sus Compañeros</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCriRelacionCompan)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralCriProductividad)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Productividad del Candidato</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCriProductividad)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralCriIniciativa)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Iniciativa del Candidato</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCriIniciativa)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralCriPuntualidad)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Puntualidad del Candidato</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCriPuntualidad)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralCriResponsabilida)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Responsabilida del Candidato</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralCriResponsabilida)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralObservaciones)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Observaciones</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralObservaciones)-1}}</td>
    </tr> @endif

    @if(count($TrayecLaboralnformo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Nombre de quien lnformó</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralnformo)-1}}</td>
    </tr> @endif
    @if(count($TrayecLaboralPuestoEvaluaDes)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Puesto de quien Informó</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($TrayecLaboralPuestoEvaluaDes)-1}}</td>
    </tr> @endif
    <tr>
      <td class="gris" style=" padding: 3px;">&nbsp;</td>
      <td class="gris" style="padding: 3px;">&nbsp;</td>
    </tr>
  </table>

</div>


<div class="page-break">

  <p style="font-size: 20px; font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px; margin-bottom: 0px;">FOTOS DEL CROQUIS</DEL></p>
  <table class="tabla" style="margin-top: 10px;">
    <tr>
      <td class="gris" style=" padding: 3px; width: 600px;">Campos Seleccionados</td>
      <td class="gris" style="padding: 3px; width: 140px;">N° Veces seleccionados
      </td>
    </tr>
  </table>
  <table class="tabla" style="margin-top: 10px;">
    @if(count($CroquisImagen)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Frotografia de croquis</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($CroquisImagen)-1}}</td>
    </tr> @endif
    @if(count($CroquisTiempo)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Tiempo que realiza del trabajo a casa</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($CroquisTiempo)-1}}</td>
    </tr> @endif
    @if(count($CroquisMedioTransporte)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Medio de transporte</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($CroquisMedioTransporte)-1}}</td>
    </tr> @endif
    <tr>
      <td class="gris" style=" padding: 3px;">&nbsp;</td>
      <td class="gris" style="padding: 3px;">&nbsp;</td>
    </tr>

  </table>

  <p style="font-size: 20px; font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px; margin-bottom: 0px;">FOTOS DEL DOMICILIO</DEL></p>
  <table class="tabla" style="margin-top: 10px;">
    <tr>
      <td class="gris" style=" padding: 3px; width: 600px;">Campos Seleccionados</td>
      <td class="gris" style="padding: 3px; width: 140px;">N° Veces seleccionados
      </td>
    </tr>
  </table>
  <table class="tabla" style="margin-top: 10px;">

    @if(count($FotoDomicilioExterior)>1)
    <tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Fotografía del exterior del domicilio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($FotoDomicilioExterior)-1}}</td>
    </tr> @endif
    @if(count($FotoDomicilioInterior)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Fotografía del interior del domicilio</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($FotoDomicilioInterior)-1}}</td>
    </tr> @endif
    @if(count($FotoCandidato)>1)<tr>
      <td class="gris_blanca" style="width: 600px; padding: 3px;">Fotografía del candidato</td>
      <td class="gris_blanca" style="text-align:center; width: 140px; padding: 3px;">{{count($FotoCandidato)-1}}</td>
    </tr> @endif
    <tr>
      <td class="gris" style=" padding: 3px;">&nbsp;</td>
      <td class="gris" style="padding: 3px;">&nbsp;</td>
    </tr>
  </table>

</div>

<!--<div class="page-break">


  <p style="font-family: century-gothic, sans-serif;  text-align: center; margin-top: 20px;">DATOS GENERALES</p>

  <table class="tabla" width=740px; style="margin-top: 0;">
    @if(count($NombreCandidato)>1)
    @for($i=1;$i<=count($NombreCandidato)-1;$i++) <tr>
      <td class="gris_blanca" style="width:155px; font-weight:bold;">Nombre del candidato</td>
      <td class="gris_blanca" colspan="5">&nbsp;</td>
      </tr>
      @endfor
      @else
      <tr>
        <td class="gris_blanca" style="width:155px; font-weight:bold;">&nbsp;</td>
        <td class="gris_blanca" colspan="5">&nbsp;</td>
      </tr>
      @endif

      @if((count($NumeroInteriorExterior) < count($Domicilio)) && count($Domicilio)>1)
        @for($i=1;$i<=count($Domicilio)-1;$i++) <tr>
          <td class="gris_blanca" style="font-weight:bold; ">Calle:</td>
          <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
          <td class="gris_blanca" style="font-weight:bold;">@if(count($NumeroInteriorExterior)-1>=$i) Número int. y ext: @endif &nbsp;</td>
          <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
          </tr>
          @endfor
          @elseif((count($NumeroInteriorExterior) > count($Domicilio)) && count($NumeroInteriorExterior)>1 )

          @for($i=1;$i<=count($NumeroInteriorExterior)-1;$i++) <tr>
            <td class="gris_blanca" style="font-weight:bold; ">@if(count($Domicilio)-1>=$i)Calle: @endif &nbsp;</td>
            <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
            <td class="gris_blanca" style="font-weight:bold;"> Número int. y ext: &nbsp;</td>
            <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
            </tr>
            @endfor

            @elseif((count($NumeroInteriorExterior) == count($Domicilio)) && count($NumeroInteriorExterior)>1 )
            <tr>
              <td class="gris_blanca" style="font-weight:bold; ">Calle</td>
              <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
              <td class="gris_blanca" style="font-weight:bold;"> Número int. y ext: &nbsp;</td>
              <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
            </tr>
            @else
            <tr>
              <td class="gris_blanca" style="font-weight:bold; ">&nbsp;</td>
              <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
              <td class="gris_blanca" style="font-weight:bold;">&nbsp;</td>
              <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
            </tr>
            @endif

            @if((count($MunicipioEstado) < count($Colonia)) && count($Colonia)>1)
              @for($i=1;$i<=count($Colonia)-1;$i++) <tr>
                <td class="gris_blanca" style="font-weight:bold; ">Colonia:</td>
                <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                <td class="gris_blanca" style="font-weight:bold; ">@if(count($MunicipioEstado)-1>=$i)Municipio/ Estado:@endif &nbsp;</td>
                <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                </tr>
                @endfor
                @elseif((count($MunicipioEstado) > count($Colonia)) && count($MunicipioEstado)>1 )

                @for($i=1;$i<=count($MunicipioEstado)-1;$i++) <tr>
                  <td class="gris_blanca" style="font-weight:bold; ">@if(count($Colonia)-1>=$i)Colonia:@endif&nbsp;</td>
                  <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                  <td class="gris_blanca" style="font-weight:bold; ">Municipio/ Estado:</td>
                  <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                  </tr>
                  @endfor

                  @elseif((count($MunicipioEstado) == count($Colonia)) && count($Colonia)>1 )
                  <tr>
                    <td class="gris_blanca" style="font-weight:bold; ">Colonia:</td>
                    <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                    <td class="gris_blanca" style="font-weight:bold; ">Municipio/ Estado:</td>
                    <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                  </tr>
                  @else
                  <tr>
                    <td class="gris_blanca" style="font-weight:bold; ">&nbsp;</td>
                    <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                    <td class="gris_blanca" style="font-weight:bold; ">&nbsp;</td>
                    <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                  </tr>
                  @endif

                  <tr>
                    <td class="gris_blanca" style="font-weight:bold;">Código Postal:</td>
                    <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
                    <td class="gris_blanca" style="font-weight:bold; ">Celular:</td>
                    <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
                    <td class="gris_blanca" style="font-weight:bold; ">Teléfono:</td>
                    <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
                  </tr>

                  @if((count($TiempoVivirDomicilio) < count($EntreCalles)) && count($EntreCalles)>1)
                    @for($i=1;$i<=count($EntreCalles)-1;$i++) <tr>
                      <td class="gris_blanca" style="font-weight:bold;">@if(count($TiempoVivirDomicilio)-1>=$i)Tiempo en el domicilio:@endif&nbsp;</td>
                      <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                      <td class="gris_blanca" style="font-weight:bold;">Entre calles:&nbsp;</td>
                      <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                      </tr>
                      @endfor
                      @elseif((count($TiempoVivirDomicilio) > count($EntreCalles)) && count($TiempoVivirDomicilio)>1 )

                      @for($i=1;$i<=count($TiempoVivirDomicilio)-1;$i++) <tr>
                        <td class="gris_blanca" style="font-weight:bold;">Tiempo en el domicilio:&nbsp;</td>
                        <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                        <td class="gris_blanca" style="font-weight:bold;">@if(count($EntreCalles)-1>=$i) Entre calles: @endif &nbsp;</td>
                        <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                        </tr>
                        @endfor

                        @elseif((count($TiempoVivirDomicilio) == count($EntreCalles)) && count($EntreCalles)>1 )
                        <tr>
                          <td class="gris_blanca" style="font-weight:bold;">Tiempo en el domicilio:</td>
                          <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                          <td class="gris_blanca" style="font-weight:bold;">Entre calles:</td>
                          <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                        </tr>
                        @else
                        <tr>
                          <td class="gris_blanca" style="font-weight:bold;">&nbsp;</td>
                          <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                          <td class="gris_blanca" style="font-weight:bold;">&nbsp;</td>
                          <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                        </tr>
                        @endif


                        @if(count($DomicilioAnterior)>1)
                        @for($i=1;$i<=count($DomicilioAnterior)-1;$i++) <tr>
                          <td class="gris_blanca" style="font-weight:bold;">Domicilio anterior:</td>
                          <td class="gris_blanca" colspan="4" style="text-align: center;">&nbsp;</td>
                          <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
                          </tr>
                          @endfor
                          @else
                          <tr>
                            <td class="gris_blanca" style="font-weight:bold;">&nbsp;</td>
                            <td class="gris_blanca" colspan="4" style="text-align: center;">&nbsp;</td>
                            <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
                          </tr>
                          @endif


                          @if((count($LugarNacimiento) < count($FechaNacimiento)) && count($FechaNacimiento)>1)
                            @for($i=1;$i<=count($FechaNacimiento)-1;$i++) <tr>
                              <td class="gris_blanca" style="font-weight:bold;">Fecha de nacimiento:</td>
                              <td class="gris_blanca" colspan="2" style="text-align: center;">&nbsp;</td>
                              <td class="gris_blanca" style="font-weight:bold;">@if(count($LugarNacimiento)-1>=$i)Lugar:@endif&nbsp;</td>
                              <td class="gris_blanca" colspan="2" style="text-align: center;">&nbsp;</td>

                              </tr>
                              @endfor
                              @elseif((count($LugarNacimiento) > count($FechaNacimiento)) && count($LugarNacimiento)>1 )

                              @for($i=1;$i<=count($LugarNacimiento)-1;$i++) <tr>
                                <td class="gris_blanca" style="font-weight:bold;">@if(count($FechaNacimiento)-1>=$i)Fecha de nacimiento:@endif&nbsp;</td>
                                <td class="gris_blanca" colspan="2" style="text-align: center;">&nbsp;</td>
                                <td class="gris_blanca" style="font-weight:bold;">Lugar:</td>
                                <td class="gris_blanca" colspan="2" style="text-align: center;">&nbsp;</td>

                                </tr>
                                @endfor

                                @elseif((count($LugarNacimiento) == count($FechaNacimiento)) && count($FechaNacimiento)>1 )
                                <tr>
                                  <td class="gris_blanca" style="font-weight:bold;">Fecha de nacimiento:</td>
                                  <td class="gris_blanca" colspan="2" style="text-align: center;">&nbsp;</td>
                                  <td class="gris_blanca" style="font-weight:bold;">Lugar:</td>
                                  <td class="gris_blanca" colspan="2" style="text-align: center;">&nbsp;</td>

                                </tr>
                                @else
                                <tr>
                                  <td class="gris_blanca" style="font-weight:bold;">&nbsp;</td>
                                  <td class="gris_blanca" colspan="2" style="text-align: center;">&nbsp;</td>
                                  <td class="gris_blanca" style="font-weight:bold;">&nbsp;</td>
                                  <td class="gris_blanca" colspan="2" style="text-align: center;">&nbsp;</td>

                                </tr>
                                @endif

                                @if((count($CorreoElectronico) < count($EdoCivil)) && count($EdoCivil)>1)
                                  @for($i=1;$i<=count($EdoCivil)-1;$i++) <tr>
                                    <td class="gris_blanca" style="font-weight:bold;">Estado civil:</td>
                                    <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                                    <td class="gris_blanca" style="font-weight:bold;">@if(count($CorreoElectronico)-1>=$i)Correo Electronico:@endif&nbsp;</td>
                                    <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                                    </tr>
                                    @endfor
                                    @elseif((count($CorreoElectronico) > count($EdoCivil)) && count($CorreoElectronico)>1 )

                                    @for($i=1;$i<=count($CorreoElectronico)-1;$i++) <tr>
                                      <td class="gris_blanca" style="font-weight:bold;">@if(count($EdoCivil)-1>=$i)Estado civil:@endif&nbsp;</td>
                                      <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                                      <td class="gris_blanca" style="font-weight:bold;">Correo electrónico:</td>
                                      <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                                      </tr>
                                      @endfor

                                      @elseif((count($CorreoElectronico) == count($EdoCivil)) && count($EdoCivil)>1 )
                                      <tr>
                                        <td class="gris_blanca" style="font-weight:bold;">Estado civil:</td>
                                        <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                                        <td class="gris_blanca" style="font-weight:bold;">Correo electrónico:</td>
                                        <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                                      </tr>
                                      @else
                                      <tr>
                                        <td class="gris_blanca" style="font-weight:bold;">&nbsp;</td>
                                        <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                                        <td class="gris_blanca" style="font-weight:bold;">&nbsp;</td>
                                        <td class="gris_blanca" style="text-align: center;" colspan="2">&nbsp;</td>
                                      </tr>
                                      @endif


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
      <td class="gris_blanca" style="border-top: none; width:65px; text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="border-top: none; font-weight:bold; width:36px; text-align: center;">Año:</td>
      <td class="gris_blanca" style="border-top: none; width:65px; text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="border-top: none; font-weight:bold; width:36px; text-align: center;">Foja:</td>
      <td class="gris_blanca" style=" border-top: none; width:65px; text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="border-top: none; font-weight:bold; width:36px;">Libro:</td>
      <td class="gris_blanca" style="border-top: none; width:65px; text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style=" border-top: none; text-align: center; width: 134px;">&nbsp;</td>
    </tr>
  </table>

  <table class="tabla" style="margin-top: 0;">
    <tr>
      <td class="gris_blanca" style="border-top: none;">Identificación oficial vigente</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; border-top: none;">Clave:</td>
      <td class="gris_blanca" style="text-align: center; border-top: none;">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; border-top: none;">OCR:</td>
      <td class="gris_blanca" style="text-align: center; border-top: none;">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center; border-top: none;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca">CURP o carta de naturalización</td>
      <td class="gris_blanca" colspan="4" style="text-align: center;"> &nbsp;</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca" rowspan="2">Comprobante de domicilio</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Servicio:</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Fecha:</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
      <td class="gris_blanca" rowspan="2" style="text-align: center;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Titular:</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Relación:</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>

    </tr>
    <tr>
      <td class="gris_blanca">Número de Seguro Social</td>
      <td class="gris_blanca" style="text-align: center;" colspan="4">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca">Carta de recomendación</td>
      <td class="gris_blanca" colspan="4" style="text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca">Recíbos de nómina (2 últimos)</td>
      <td class="gris_blanca" style="text-align: center;" colspan="4">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca">Constancia de inscripción RFC</td>
      <td class="gris_blanca" style="text-align: center;" colspan="4">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="width: 190px;">Último Comprobante de estudios</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; width: 65px;">Escuela:</td>
      <td class="gris_blanca" style="text-align: center; width: 181px;">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; width: 65px;">Grado:</td>
      <td class="gris_blanca" style="text-align: center; width: 103px;">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center; width: 134px;">&nbsp;</td>
    </tr>
  </table>

  <table class="tabla" style="margin-top: 0;">
    <tr>
      <td class="gris_blanca" rowspan="2" style="width: 190px; border-top: none;">Créditos</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; width: 65px; border-top: none;">INFONAVIT:</td>
      <td class="gris_blanca" style="text-align: center; padding: 1px 0 1px 0px; width: 360px; border-top: none;">&nbsp; </td>
      <td class="gris_blanca" style="text-align: center; width: 134px; border-top: none;"> &nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">FONACOT:</td>
      <td class="gris_blanca" style="text-align:center"> &nbsp;</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp; </td>
    </tr>
  </table>

  <table class="tabla" style="margin-top: 0;">
    <tr>
      <td class="gris_blanca" style="width: 190px; border-top: none;">Acta de matrimonio</td>
      <td class="gris_blanca" style="font-weight:bold; width:36px; border-top: none; text-align: center">Acta:</td>
      <td class="gris_blanca" style="width:65px; text-align: center; border-top: none; "> &nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; width:36px; border-top: none;  text-align: center;">Año:</td>
      <td class="gris_blanca" style="width:65px; text-align: center; border-top: none;">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; width:36px; border-top: none; text-align: center">Foja:</td>
      <td class="gris_blanca" style="width:65px; text-align: center; border-top: none;">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; width:36px; border-top: none;  text-align: center">Libro:</td>
      <td class="gris_blanca" style="width:65px; text-align: center; border-top: none;">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center; width: 134px; border-top: none;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca">Acta de nacimiento cónyuge</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center">Acta:</td>
      <td class="gris_blanca" style=" text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center;">Año:</td>
      <td class="gris_blanca" style=" text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center">Foja:</td>
      <td class="gris_blanca" style=" text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center">Libro:</td>
      <td class="gris_blanca" style=" text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style=" text-align: center;">&nbsp; </td>
    </tr>

    @for($j=0;$j<=3;$j++)<tr>
      <td class="gris_blanca">Acta de nacimiento hijos</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center; ">Acta:</td>
      <td class="gris_blanca" style=" text-align: center">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold;  text-align: center;">Año:</td>
      <td class="gris_blanca" style=" text-align: center">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center ">Foja:</td>
      <td class="gris_blanca" style=" text-align: center">&nbsp;</td>
      <td class="gris_blanca" style="font-weight:bold; text-align: center">Libro:</td>
      <td class="gris_blanca" style=" text-align: center">&nbsp;</td>
      <td class="gris_blanca" style=" text-align: center;">&nbsp;</td>
      </tr>
      @endfor


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

    @for($j=0;$j<=1;$j++)<tr>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="height: 40px; padding: 2 3 2 3; text-align: center;">&nbsp;</td>
      </tr>
      @endfor

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
    @for($j=0;$j<=1;$j++) <tr>
      <td class="gris_blanca" style="text-align: center; ">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center;"> &nbsp;%</td>
      <td class="gris_blanca" style="text-align: center;"> &nbsp;</td>
      </tr>
      @endfor

  </table>


  <table class="tabla">
    <tr>
      <th class="gris">Observaciones</th>
    </tr>
    <tr>
      <th class="gris_blanca" style="font-weight:100; height: 50px;"> &nbsp;</th>
    </tr>
  </table>
</div>

 
  HOJA NUMERO 3
-->
<!--<div class="page-break">

  <p style="font-family: century-gothic, sans-serif;  text-align: center;">SITUACIÓN SOCIAL Y ECONÓMICA</p>

  <p class="gris" style="margin-left:-20px; margin-top: 10px; width: 760px; font-family: century-gothic, sans-serif; font-size: 12px; text-align: center; color:black">Datos familiares </p>

  <table class="tabla">
    <tr>
      <td class="gris" style="text-align: center; font-weight: bold; width: 170px; height:18px;">Nombre</td>
      <td class="gris" style="text-align: center; font-weight: bold; width: 60px;">Parentesco</td>
      <td class="gris" style="text-align: center; font-weight: bold; width: 55px;">Edad</td>
      <td class="gris" style="text-align: center; font-weight: bold; width: 70px">Estado civil</td>
      <td class="gris" style="text-align: center; font-weight: bold;">Ocupación</td>
      <td class="gris" style="text-align: center; font-weight: bold;">Empresa</td>
      <td class="gris" style="text-align: center; font-weight: bold;">Dirección</td>
    </tr>
    @for($j=0;$j<=5;$j++) <tr>
      <td class="gris_blanca" style="text-align: center; height:18px ;">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center; ">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center; ">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center; ">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center; ">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center; ">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center; ">&nbsp;</td>
      </tr>
      @endfor

  </table>

  <table class="tabla">
    <tr>
      <td class="gris" style="text-align: left; width: 420px; padding-left: 4px; height: 18px;">¿Padece o ha padecido alguna enfermedad como crónica o degenerativa?</td>
      <td class="gris_blanca" style="text-align: center; width: 30px;">Si</td>
      <td class="gris_blanca" style="text-align: center; width: 30px;">No</td>
      <td class="gris_blanca" style="text-align: center; width:73px;">¿Cuál?</td>
      <td class="gris_blanca" style=" text-align:center; ">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris" style="text-align: left;  padding-left: 4px; height: 18px;">¿Se encuentra bajo algún tratamiento médico?</td>
      <td class="gris_blanca" style="text-align: center;">Si</td>
      <td class="gris_blanca" style="text-align: center;">No</td>
      <td class="gris_blanca" style="text-align: center;">¿Cuál?</td>
      <td class="gris_blanca" style="text-align:center;  ">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris" style="text-align: left;  padding-left: 4px; height: 18px;">¿Es alérgico?</td>
      <td class="gris_blanca" style="text-align: center; ">Si</td>
      <td class="gris_blanca" style="text-align: center;">No</td>
      <td class="gris_blanca" style="text-align: center;">¿A qué?</td>
      <td class="gris_blanca" style=" text-align:center;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris" style="text-align: left;  padding-left: 4px; height: 18px;">¿Toma medicamento controlado?</td>
      <td class="gris_blanca" style="text-align: center;">Si</td>
      <td class="gris_blanca" style="text-align: center;">No</td>
      <td class="gris_blanca" style="text-align: center;">¿Cuál?</td>
      <td class="gris_blanca" style=" text-align:center;">&nbsp;</td>
    </tr>
  </table>

  <table class="sinTabla2">
    <tr>
      <td class="gris" rowspan="3" style="border:solid 0.05px black; width: 120px; ">En caso de emergencia</td>
      <td style="border-top:solid 0.05px black;  width: 90px;">Nombre:</td>
      <td style="border-bottom: solid 0.05px black;border-top: solid 0.05px black; padding: 3px 10px 3px 10px; width: 270px;">&nbsp;</td>
      <td style=" border-top: solid 0.05px black; width: 90px;">Celular:</td>
      <td style="border-bottom: solid 0.05px black; border-top: solid 0.05px black; width: 110px; border-right: solid 0.05px black; padding: 3px 10px 3px 10px;">&nbsp;</td>
    </tr>
    <tr>
      <td>Relación:</td>
      <td style="border-bottom: solid 0.05px black;  padding: 3px 10px 3px 10px;">&nbsp;</td>
      <td style="border-bottom:none ;">Telefono:</td>
      <td style="border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px; border-right: solid 0.05px black;">&nbsp;</td>
    </tr>
    <tr>
      <td style=" border-bottom: solid 0.05px black;;">Tipo de sangre:</td>
      <td style="border-bottom: solid 0.05px black; padding: 3px 10px 3px 10px; text-align: center;">&nbsp;</td>
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
      <td class="gris_blanca " style="height: 30px; text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
    </tr>
  </table>
  <table class="tabla">
    <tr>
      <td class="gris" colspan="9" style="height:18px ;">Tipo de vivienda</td>
    </tr>
    <tr>

      <td class="gris_blanca" style="text-align: center; height:18px ; font-weight: bold; width: 90px;">La vivienda es:</td>
      <td class="gris_blanca" style="text-align: center; width: 80px;">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center; font-weight: bold; width: 90px;">Observaciones:</td>
      <td class="gris_blanca" style="text-align: center;">&nbsp;</td>
      <td class="gris_blanca" style="text-align: center; font-weight: bold; width: 70px;">Servicios:</td>
      <td class="gris_blanca" style="text-align: center; width: 40px; height: 20px; ">Luz</td>
      <td class="gris_blanca" style="text-align: center; width: 40px;">Agua</td>
      <td class="gris_blanca" style="text-align: center; width: 40px;">Gas</td>
      <td class="gris_blanca" style="text-align: center; width: 50px;">Drenaje</td>
    </tr>
  </table>

  <table class="tabla">
    <tr>
      <td class="gris" colspan="5" style="height:18px ;">Tipo de casa habitación</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px;">Casa</td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px;">Departamento</td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px;">Condominio</td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px;">Unidad Habitacional</td>
      <td class="gris_blanca" style="text-align: center; height: 20px; width: 148px;">Vivienda Popular</td>
    </tr>
  </table>


  <table class="tabla">
    <tr>
      <td class="gris" style="height:18px ;">Mobiliario</td>
      <td class="gris">Limpieza</td>
      <td class="gris">Orden</td>
      <td class="gris">Calidad</td>
    </tr>
    <tr>
      <td class="gris_blanco" style="text-align: center; height:18px ;">&nbsp;</td>
      <td class="gris_blanco" style="text-align: center;">&nbsp;</td>
      <td class="gris_blanco" style="text-align: center;">&nbsp;</td>
      <td class="gris_blanco" style="text-align: center;">&nbsp;</td>
    </tr>
  </table>


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
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black ;">&nbsp;</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; ">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black; width:80px; ">Renta</td>
      <td class="gris_blanca" style="border: solid 1px black ; width:80px; ">Hipoteca</td>
      <td class="gris_blanca" style="border: solid 1px black ; width:80px; ">Predial</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right; width:70px;">&nbsp;</td>
    </tr>

    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black ;">&nbsp;</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; width:70px;">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="3">Servicios (agua, luz, gas, teléfono)</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black ;">&nbsp;</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; width:70px;">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="3">Créditos (TDC y plan tarifario)</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black ;">&nbsp;</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; width:70px;">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="3">Gastos escolares</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black ;">&nbsp;</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; width:70px;">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="3">Diversiones</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="border: solid 1px black ; height:18px ;">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black ;">&nbsp;</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; width:15px;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; width:70px;">&nbsp;</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="3">Otros</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; text-align: right;">&nbsp;</td>
    </tr>

    <tr>
      <td class="gris" style="border: solid 1px black; height:18px ;" colspan="2">Total Ingresos</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; ">&nbsp;</td>
      <td class="gris" style="border: solid 1px black ;" colspan="3">Total egresos</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; border-right: solid 1px black; ">&nbsp;</td>
    </tr>
    <tr>
      <td class="gris" style="border: solid 1px black; height:18px ;" colspan="2">Diferencia</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ;">$</td>
      <td class="gris_blanca" style="border-bottom: solid 1px black ; text-align: right ;">&nbsp;</td>
      <td class="gris" style="border: solid 1px black; height: 20px;" colspan="3">Si existe déficit, ¿como lo solventa?</td>
      <td class="gris_blanca" style="border: solid 1px black ;" colspan="2">&nbsp;</td>
    </tr>

  </table>
</div>


    HOLA 4
-->

<!--<div class="page-break">


  <table class="tabla">
    <tr>
      <td class="gris" style="height: 18px;" colspan="8">Patrimonio</td>
    </tr>

    <tr>
      <td class="gris" style="height: 18px;">Automóvil</td>
      <td class="gris_blanca" style="height: 18px; text-align: center;">&nbsp;</td>
      <td class="gris" style="height: 18px;">Bienes raíces</td>
      <td class="gris_blanca" style=" text-align: center; height: 18px;">Si</td>
      <td class="gris_blanca" style=" text-align: center; height: 18px;">No</td>
      <td class="gris" style="height: 18px;">Ubicación</td>
      <td class="gris_blanca" style="height: 18px; text-align: center;" colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td class="gris" colspan="2" style="height: 18px;">Tarjetas de crédito o departamento</td>
      <td colspan="3" class="gris_blanca" style="text-align: center;">&nbsp;</td>
      <td class="gris">Monto de crédito</td>
      <td style="text-align: left; border-right: none; ">$</td>
      <td style="margin-right: solid 1px black; border-left: none; text-align: right;">&nbsp;</td>
    </tr>
  </table>

  <table class="tabla">
    <tr>
      <td class="gris" style="height: 18px;">Observaciones</td>
    </tr>
    <tr>
      <td class="gris_blanca" style="height: 70px;"> &nbsp;</td>
    </tr>
  </table>

  <p style="font-family: century-gothic, sans-serif;  text-align: center;">REFERENCIAS PERSONALES</p>

  @for($j=0;$j<=2;$j++) <table class="tabla" style="margin-top:20px margin-bottom=20px">
    @if((count($RefPerNombre) < count($RefPerTelefono)) && count($RefPerTelefono)>1)
      @for($i=1;$i<=count($RefPerTelefono)-1;$i++) <tr>
        <td class="gris" style="width:165px; height: 20px;">@if(count($RefPerNombre)-1>=$i) Nombre: @endif&nbsp;</td>
        <td class="gris_blanca" style="text-align: center; height: 18px;">&nbsp;</td>
        <td class="gris" style="width: 80px; height: 20px;">Teléfono:</td>
        <td class="gris_blaca" style="text-align: center; height: 18px;"> &nbsp;</td>
        </tr>
        @endfor
        @elseif((count($RefPerNombre) > count($RefPerTelefono)) && count($RefPerNombre)>1 )

        @for($i=1;$i<=count($RefPerNombre)-1;$i++) <tr>
          <td class="gris" style="width:165px; height: 20px;">Nombre:</td>
          <td class="gris_blanca" style="text-align: center; height: 18px;">&nbsp;</td>
          <td class="gris" style="width: 80px; height: 20px;">@if(count($RefPerTelefono)-1>=$i)Teléfono:@endif&nbsp;</td>
          <td class="gris_blaca" style="text-align: center; height: 18px;"> &nbsp;</td>
          </tr>
          @endfor

          @elseif((count($RefPerNombre) == count($RefPerTelefono)) && count($RefPerNombre)>1 )
          <tr>
            <td class="gris" style="width:165px; height: 20px;">Nombre:</td>
            <td class="gris_blanca" style="text-align: center; height: 18px;">&nbsp;</td>
            <td class="gris" style="width: 80px; height: 20px;">Teléfono:</td>
            <td class="gris_blaca" style="text-align: center; height: 18px;"> &nbsp;</td>
          </tr>
          @else
          <tr>
            <td class="gris" style="width:165px; height: 20px;">&nbsp;</td>
            <td class="gris_blanca" style="text-align: center; height: 18px;">&nbsp;</td>
            <td class="gris" style="width: 80px; height: 20px;">&nbsp;</td>
            <td class="gris_blaca" style="text-align: center; height: 18px;"> &nbsp;</td>
          </tr>
          @endif


          @if((count($RefPerRelacion) < count($RefPerTiempoConocer)) && count($RefPerTiempoConocer)>1)
            @for($i=1;$i<=count($RefPerTiempoConocer)-1;$i++) <tr>
              <td class="gris" style="height: 20px;">Tiempo de conocer:</td>
              <td class="gris_blanca" style="text-align: center; height: 18px; ">&nbsp;</td>
              <td class="gris" style="height: 20px;">@if(count($RefPerRelacion)-1>=$i)Relación:@endif&nbsp;:</td>
              <td class="gris_blaca" style="text-align: center; height: 18px;">&nbsp;</td>
              </tr>
              @endfor
              @elseif((count($RefPerRelacion) > count($RefPerTiempoConocer)) && count($RefPerRelacion)>1 )

              @for($i=1;$i<=count($RefPerRelacion)-1;$i++) <tr>
                <td class="gris" style="height: 20px;">@if(count($RefPerTiempoConocer)-1>=$i)Tiempo de conocer:@endif&nbsp;</td>
                <td class="gris_blanca" style="text-align: center; height: 18px; ">&nbsp;</td>
                <td class="gris" style="height: 20px;">Relación:</td>
                <td class="gris_blaca" style="text-align: center; height: 18px;">&nbsp;</td>
                </tr>
                @endfor

                @elseif((count($RefPerRelacion) == count($RefPerTiempoConocer)) && count($RefPerRelacion)>1 )
                <tr>
                  <td class="gris" style="height: 20px;">Tiempo de conocer:</td>
                  <td class="gris_blanca" style="text-align: center; height: 18px; ">&nbsp;</td>
                  <td class="gris" style="height: 20px;">Relación:</td>
                  <td class="gris_blaca" style="text-align: center; height: 18px;">&nbsp;</td>
                </tr>
                @else
                <tr>
                  <td class="gris" style="height: 20px;">&nbsp;</td>
                  <td class="gris_blanca" style="text-align: center; height: 18px; ">&nbsp;</td>
                  <td class="gris" style="height: 20px;">&nbsp;</td>
                  <td class="gris_blaca" style="text-align: center; height: 18px;">&nbsp;</td>
                </tr>
                @endif



                @if(count($RefPerComentarios)>4)

                @for ($h=1; $h<= (count($RefPerComentarios)/3)+1;$h++) @if((count($RefPerComentarios)-1)%3==0) <tr>
                  <td class="gris">Comentarios:</td>
                  <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">&nbsp;</td>
                  </tr>
                  @elseif((count($RefPerComentarios)-1)%2==0)

                  @if($j==0 || $j==1)
                  <tr>
                    <td class="gris">Comentarios:</td>
                    <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">&nbsp;</td>
                  </tr>
                  @else
                  <tr>
                    <td class="gris">&nbsp;</td>
                    <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">&nbsp;</td>
                  </tr>
                  @endif
                  @else
                  @if($j==0)
                  <tr>
                    <td class="gris">Comentarios:</td>
                    <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">&nbsp;</td>
                  </tr>
                  @else
                  <tr>
                    <td class="gris">&nbsp;</td>
                    <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">&nbsp;</td>
                  </tr>
                  @endif

                  @endif
                  @endfor
                  @elseif(count($RefPerComentarios)>1 && count($RefPerComentarios)<=4) @if((count($RefPerComentarios)-1)%3==0) <tr>
                    <td class="gris">Comentarios:</td>
                    <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">&nbsp;</td>
                    </tr>
                    @elseif((count($RefPerComentarios)-1)%2==0)

                    @if($j==0 || $j==1)
                    <tr>
                      <td class="gris">Comentarios:</td>
                      <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">&nbsp;</td>
                    </tr>
                    @else
                    <tr>
                      <td class="gris">&nbsp;</td>
                      <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">&nbsp;</td>
                    </tr>
                    @endif
                    @else
                    @if($j==0)
                    <tr>
                      <td class="gris">Comentarios:</td>
                      <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">&nbsp;</td>
                    </tr>
                    @else
                    <tr>
                      <td class="gris">&nbsp;</td>
                      <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">&nbsp;</td>
                    </tr>
                    @endif

                    @endif
                    @else

                    <tr>
                      <td class="gris">&nbsp;</td>
                      <td class="gris_blanca" style="height: 45px;" colspan="3" style="text-align: center;">&nbsp;</td>
                    </tr>

                    @endif

                    </table>

                    @endfor
                    <p style="font-family: century-gothic, sans-serif;  text-align: center;">LABORAL</p>


                    <table class="tabla">
                      <tr>
                        <td class="gris" colspan="3" style="height: 18px;">¿Ha tenido alguna demanda laboral, civil, mercantil o penal, o ha sido detenida alguna vez?</td>
                        <td class="gris_blaca" style="height: 18px; background-color: #F78C1E; width: 50px; text-align: center;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="gris" style="width: 90px; height: 18;">Descripcion</td>
                        <td class="gris_blaca" colspan="3" style="text-align: center; height: 18px;">&nbsp;</td>
                      </tr>
                    </table>
                    <table class="tabla">
                      <tr>
                        <td class="gris" style="width: 320px; height: 18px;">¿Tiene familiares o conocidos dentro de la empresa?</td>
                        <td class="gris_blanca" style="height: 18px; background-color: #F78C1E; width: 40px; text-align: center;">&nbsp;</td>
                        <td class="gris" style="width: 50px; height: 18px;">¿Quién?</td>
                        <td class="gris_blaca" style="height: 18px; text-align: center;">&nbsp;</td>
                        <td class="gris" style="height: 18px; width: 50px;">Puesto:</td>
                        <td class="gris_blaca" style="height: 18px; text-align: center;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="gris" style="height: 18px;">¿Cómo se enteró de la vacante?</td>
                        <td class="gris_blanca" style="height: 18px; text-align: center;" colspan="5">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="gris" style="height: 18px;">Si está empleado actualmente, ¿por qué desea cambiar?</td>
                        <td class="gris_blanca" style="height: 18px; text-align: center;" colspan="5">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="gris" style="height: 18px;">¿Tiene disponibilidad para viajar?</td>
                        <td class="gris_blanca" style="background-color: #F78C1E; text-align: center;">&nbsp;</td>
                        <td class="gris" style="height: 18px;">Motivo:</td>
                        <td class="gris_blaca" colspan="3" style="height: 18px; text-align: center;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="gris" style="height: 18px;">¿Tiene disponibilidad para cambiar de residencia?</td>
                        <td class="gris_blanca" style="height: 18px; background-color: #F78C1E; text-align: center;">&nbsp;</td>
                        <td class="gris" style="height: 18px;">Motivo</td>
                        <td class="gris_blaca" colspan="3" style=" height: 18px; text-align: center;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="gris" style="height: 18px;">¿A partir de que fecha puede comenzar a trabajar?</td>
                        <td class="gris_blanca" colspan="5" style="text-align: center;">&nbsp;</td>
                      </tr>
                    </table>
</div>



  HOJA NUMERO 7
--><!--
<div class="page-break">


  <p style="font-family: century-gothic, sans-serif;  text-align: center; margin-bottom: 0; margin-top: 20px;">CROQUIS DEL DOMICILIO</p>

  <table class="tabla" style="margin-top: 10px;">
    <tr>
      <td class="gris_blanca" style="text-align: center; width: 740px; height: 170px ; font-weight: bold;">Fotografía del croquis del domicilio</td>
    </tr>
  </table>

  </table>
  <table class="tabla" style="margin-top: 20px;">
    <tr>
      <td class="gris" style="height: 25px; width: 250px;">¿Cuánto tiempo realiza de su casa al trabajo?</td>
      <td class="gris_blaca" style="text-align: center;">&nbsp;</td>
      <td class="gris" style="height: 25px; width: 200px;">¿Medio de transporte que utiliza?</td>
      <td class="gris_blanca" style="text-align: center;"> &nbsp;</td>
    </tr>
  </table>

  <p style="font-family: century-gothic, sans-serif;  text-align: center; margin-bottom: 0; margin-top: 20px;">FOTOS DEL DOMICILIO</p>


  <table class="tabla" style="margin-top: 10px;">


    <tr>
      <td class="gris_blanca" style="text-align: center; width: 740px; height: 170px ; font-weight: bold;">Fotografía interior del domicilio
        (candidato de cuerpo completo, la fachada completa y la toma debe de realizarse en horizontal)</td>
    </tr>

    <tr>
      <td class="gris_blanca" style="text-align: center; width:600px; height: 170px ; font-weight: bold;">Fotografía exterior del domicilio
        (candidato de cuerpo completo, la fachada completa y la toma debe de realizarse en horizontal)</td>
    </tr>


  </table>
</div>-->
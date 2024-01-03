<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Example 1</title>

  {!! Html::style('assets/css/cotizacion_pdf/style.css') !!}
</head>
<body>




  <table  border="0" >
    <tbody>
  
      <tr>
        <th>
          {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg') !!}  
        </th>


        <th style="color:orange; font-size: 2em; text-align: center; width: 550px;">
          Cotización
        </th>
      </tr>
 
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
              {{ $datos_ese[0]->fecha_cotizacion }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
              {{ $datos_ese[0]->nombre_con }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
              {{ $datos_ese[0]->nombre_comercial }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
             {{ $datos_ese[0]->direccion }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
              ID:{{$datos_ese[0]->id}}
        </th>
      </tr>
      <tr>
        <td style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
          Propuesta <br> de  <br>servicio 
        </td>
         <td style="color:white;background-color: #FF8000; font-size: 1.5em; margin-top: 15px; border-radius: 5px; ">
          &nbsp;&nbsp;&nbsp; Estudios Socioeconómicos
        </td>
      </tr>
      <tr>
          <td colspan="2" style="font-family: Helvetica; text-align: justify; color: #585858">
            <br>
            Estimado cliente <br>  
            <p>
            Gen-T más que un proveedor, desea colaborar como su socio de negocio, al brindarle un servicio de calidad a un precio competitivo con la finalidad de lograr la mejor relación Costo-Beneficio.
            </p>
            <p>
              Nuestro interés es entablar una relación a largo plazo, basado en la integridad y transparencia que nos ha caracterizado con prestigiadas organizaciones.
            </p>
            <p>
              Por lo anterior y en base a sus requerimientos, ponemos a su consideración la siguiente propuesta económica:
            </p>

            <br>

            <p>
              CONTENIDO :
            </p>
            <p>
              <ul style="list-style:none;" class="lista">
                <li>I.  Alcance del servicio</li>
                <li>II. Propuesta económica</li>
                <li>III.Gestión general</li>
                <li>IV. Condiciones generales</li>
              </ul>
            </p>
            
          </td>
      </tr>
      </tbody>
  </table>
  <br><br><br><br><br><br><br><br><p>

  <table>
   <tbody>
      <tr>
        <td colspan="2" style="font-size: 1.5em; color: #FF8000;">
          I. ALCANCE DEL SERVICIO
        </td>
      </tr>
      <tr>
      <td colspan="2">
      <ul style="list-style:none;font-family: Helvetica; text-align: justify; color: #585858">
          <li>* Visita domiciliaria.</li>
          <li>* Datos familiares.</li>
          <li>* Cotejo de documentación original, no solicitamos copia, sólo previa autorización del cliente.</li>
          <li>* Situación económica.</li>
          <li>* Croquis del domicilio.</li>
          <li>* Situación social.</li>
          <li>* Estado de Salud.</li>
          <li>* Disponibilidad.</li>
          {{--<li>* Rastreo en el INFONAVIT.</li>--}}
          <li>* Investigación laboral (vía telefónica de 2 referencias)</li>
          <li>* Investigación personal (vía telefónica de 3 referencias)</li>
          <li>* 2 Fotografías del candidato y su domicilio (una al interior y una más de la fachada)</li>
          <li>* Tiempo de Respuesta de 3 - 5 días hábiles como máximo.</li>
          <li>* El estudio es entregado en formato PDF vía correo electrónico.</li>
      </ul>
      </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 1.5em; color: #FF8000;">
          II. PROPUESTA ECONÓMICA
        </td>
      </tr>
    </tbody>
    </table>
  <table>
     <tbody>
      <tr>
       <td  colspan="6" style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Estudios Socio-Económicos
       </td>
       </tr>
       <tr>
       <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Tipo de Estudio
       </td>
       <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Lugar de Aplicacion
       </td>
       <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Prioridad
       </td>
        <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Costo Unitario
       </td>
        <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Cantidad 
       </td>
        <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Subtotal
       </td>
       </tr>
         @foreach($datos_ese as $key=>$value)
       <tr> 
         <td style="text-align: center;">{{ $value->tipo_estudio }}</td>
         <td style="text-align: center;">{{ $value->estado }}</td>
         <td style="text-align: center;">{{ $value->prioridad }}</td>
         <td style="text-align: right;">${{ number_format($value->costo_ese,2)}}</td>
         <td style="text-align: center;">{{ $value->cantidad }}</td>
         <td style="text-align: right;">${{ number_format($value->subtotal_ese,2)}}</td>
       </tr>
       @endforeach
        <tr>
         <td  colspan="4"></td>
         <td style="text-align: right;">Subtotal:</td>
         <td style="text-align: right;">$ {{ number_format($datos_ese[0]->subtotal_cotizacion,2) }}</td>
       </tr>
        <tr>
         <td  colspan="4"></td>
         <td style="text-align: right;">Iva 16%:</td>
         <td style="text-align: right;">$ {{ number_format($datos_ese[0]->iva_cotizacion,2) }}</td>
       </tr>
       <tr>
         <td  colspan="4"></td>
         <td style="text-align: right;">Total:</td>
         <td style="text-align: right;">$ {{ number_format($datos_ese[0]->total_cotizacion,2) }}</td>
       </tr>
  </tbody>
  </table>
  <table>
  <tbody>
       <tr> 
          <td colspan="2" style="font-family: Helvetica; text-align: justify; color: #585858">
          <p>
             Cobertura nacional. En el caso donde el domicilio sea de difícil acceso, se agregará a la cotización el costo de los viáticos, previa autorización por parte del cliente.<br> 
             Costo de estudios en el Edo de Méx. $600.00<br>
             Costo de estudios urgentes, menos de 3 días, $700.00<br><br>
             Nuestros precios son más I.V.A.</p>
         </td>
       </tr>
       <tr>
        <td colspan="2" style="font-size: 1.5em; color: #FF8000;">
          III. GESTIÓN GENERAL
        </td>
       </tr>
       <tr>
          <td colspan="2"  style="font-family: Helvetica; text-align: justify; color: #585858"> 
          <br>
          Una vez recibida la solicitud, el ejecutivo de cuenta asignado, confirma la recepción del requerimiento, posteriormente se agenda la cita con el candidato, de esta manera en un periodo no mayor a 24 horas el cliente recibe la fecha en que quedo programada la visita o en su caso se da aviso si el candidato no ha sido localizado.
            
          </td>
       </tr>
   </tbody>
</table>
<br><br>
{{--
<table>
    <tbody>
       <tr>
        <td colspan="2" style="font-size: 1.3em; color: #FF8000;">
         SEGURIDAD DE LA INFORMACIÓN
        </td>
       </tr>

        <tr>
          <td colspan="2"  style="font-family: Helvetica; text-align: justify; color: #585858"> 
                  
          En cumplimento a la Ley Federal de Protección de Datos en Posesión de los Particulares Gen-T como parte integral del procedimiento hace entrega al candidato del aviso de privacidad confirmando así la autorización para el manejo de sus datos.
          <br><br>
          
          En relación a la seguridad digital de la información, Gen-T cuenta con la plataforma de seguridad de encriptación, Voltage Security, el cual cumple con altos estándares de codificación de datos, asegurando la transmisión de la información por medio de e-mail´s.
          
            
          </td>
       </tr>
  </tbody>
</table>--}}



<br><br>

{{-- 
<table>
  <tbody>
       <tr>
          <td colspan="2" style="font-size: 1.3em; color: #FF8000;">
          <p>
          </p>
            SERVICIOS NO INCLUIDOS
          </td>
        </tr>
        <tr>
         <td colspan="2"  style="font-family: Helvetica; text-align: justify; color: #585858"> 
         - Antecedentes no penales. Debido a que es un trámite personal, gratuito y se otorga de manera  inmediata, el trámite se realiza en la Secretaría de Seguridad Pública o en el gobierno del cada estado.<br><br>

          Actualmente en el D.F. y área metropolitana es gratuito, en el interior de la república tiene un costo entre $250.00 y $350.00 <br><br>

          - Demandas laborales. Existe un sistema en línea el cual indica si el candidato ha demandado o no a nivel nacional, sin embargo; no es muy confiable debido a que, si existe algún arreglo en conciliación y arbitraje no se verá publicada la demanda.<br><br>

          - Referencias vecinales. Esta acción debe ser llevada a cabo al concluir la visita en el domicilio del candidato sin que éste se encuentre presente, si se realiza de alguna otra manera ya no sería información veraz y certera.<br><br>

          Debido a la inseguridad, cada vez es mayor el número de personas que evitan proporcionar información tanto personal como de terceros.<br>

         </td>
        </tr>
    </tbody>
  </table>

  --}}
  <br><br>
  <table>
   <tbody>
        <tr>
          <td colspan="2" style="font-size: 1.3em; color: #FF8000;">
          <p>
          </p>
            NUESTRA GARANTIA
          </td>
        </tr>
        <tr>
        <td colspan="2"  style="font-family: Helvetica; text-align: justify; color: #585858"> 
        
        Encuestadores con la formación y experiencia necesaria para garantizar información veraz y certera requerida por {{ $datos_ese[0]->nombre_comercial }} de acuerdo a su filosofía, siendo este un servicio integral de su proceso de reclutamiento y selección de personal.
        </td>
        </tr>
  </tbody>
</table>
<br><br>
<table>
 <tbody>
        <tr>
          <td colspan="2" style="font-size: 1.3em; color: #FF8000;">
           IV. CONDICIONES GENERALES
          </td>
        </tr>
        <tr>
          <td colspan="2"  style="font-family: Helvetica; text-align: justify; color: #585858"> 
           <p>
           Gen-T, mantendrá la tarifa mencionada en función del cumplimiento de los siguientes puntos:<br>
            <ul> 
              <li> Aceptación y firma del Contrato de Servicio.</li>
              <li> Entrega de documentación del Cliente.</li>
              <li> Copia R1 (RFC Hacienda).</li>
              <li> Copia Acta Constitutiva con sello legible de Registro Público de Comercio.</li>
              <li> Copia Poder Notarial del Representante Legal.</li>
              <li> Copia Identificación Oficial Representante Legal.</li>
              <li> Copia Comprobante de Domicilio (antigüedad no menor a 3 meses).</li>

          </ul>
          </td>
        </tr>
        <tr>
          <td colspan="2"  style="font-family: Helvetica; text-align: justify; color: #585858"> 
          <br>
            Esperando que esta cotización sea favorable y nos permita contar con su preferencia, estamos seguros que Gen-T representa la alternativa con el nivel de calidad que espera usted y la empresa a la que representa, quedo a sus órdenes para cualquier consulta o aclaración.
          </td>
        </tr>
        <tr>
          <td colspan="2"  style="font-family: Helvetica; text-align: justify; color: #585858"> 
            Esta propuesta tiene una vigencia de 30 días.
          </td>          
        </tr> 
       

    </tbody>
    <tfoot style="text-align: center; position: fixed;">
      <tr>
          <td colspan="2" style="text-align: center"> 
         <em> Atentamente<br><br>
          {{  $datos_ese[0]->name }}<br>
          Área comercial</em>

            
          </td>
      </tr>
      <tr>
          <td colspan="2" style="text-align: center;font-family: Helvetica;color: #585858"> 
          <br>
         Para aceptar esta cotización, favor de firmar aquí y regresar: _____________________________



            
          </td>
      </tr>
      

    </tfoot>
  </table>
  <div class="footer">
  Gen-T Personal Outsourcing  Ohio 15 Col. Nápoles Delegación Benito Juárez CP. 03810, Ciudad de México <br> &nbsp; &nbsp; &nbsp;Teléfono (01 55) 5543-7222  areacomercial@gen-t.com.mx
 
  </div>
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Example 1</title>

  {!! Html::style('assets/css/cotizacion_pdf/style.css') !!}
</head>
<body>



  <table>
    <tbody>
      <tr>
        <th>
          {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg') !!}  
        </th>


        <th style="color:orange; font-size: 2em; text-align: center; width: 550px;">
          Orden de Servicio
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
              {{ $datos_maquila[0]->fecha_cotizacion }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
            {{ $datos_maquila[0]->nombre_con }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
              {{ $datos_maquila[0]->nombre_comercial }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
              {{ $datos_maquila[0]->direccion }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
              ID:{{ $datos_maquila[0]->id}}
        </th>
      </tr>
      <tr>
        <td style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
          Propuesta <br> de  <br>servicio 
        </td>
         <td style="color:white;background-color: #FF8000; font-size: 1.5em; margin-top: 15px; border-radius: 5px; ">
          &nbsp;&nbsp;&nbsp; Maquila de nómina
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
              CONTENIDO
            </p>
            <p>
              <ul class="lista">
                <li>I. Alcance del servicio</li>
                <li>II. Propuesta económica</li>
                <li>III. Condiciones generales</li>
              </ul>
            </p>
            
          </td>
      </tr>
    </tbody>
  </table>
  <br><br><br><br><br><br><br><br><p><br>
  <table>
   <tbody>
      <tr>
        <td colspan="2" style="font-size: 1.5em; color: #FF8000;">
         
          I. ALCANCE DEL SERVICIO
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-family: Helvetica; text-align: justify; color: #585858">
          <p>
            <h4 style="padding: 10px; color: #424242;">              
              PAQUETE 1
            </h4>
          </p>
          <p>
            <ul>
                <li>Recepción de información para corte.</li>
                <li>Captura de movimientos de nomina. </li>
                <li>Calculo, revisión e impresión de la nomina según periodo semanal, quincenal, mensual, etc. </li>
                <li>Generación de archivo para pago a empleados (layout)</li>
                <li>Nóminas especiales (Aguinaldos, PTU, etc.).</li>
                <li>Impresión de recibos de nomina regulares y especiales.</li>
                <li>Reportes relativos a las nominas.</li>
                <li>Determinación de impuestos relacionados con la nomina.</li>
                <li>Cálculo y generación de SUA.</li>                
            </ul>
          </p>
          <p>
            <h4 style="padding: 10px; color: #424242;">              
              PAQUETE 2  Incluye paquete 1 más:
            </h4>
          </p>
          <p>
            <ul>
                <li>Determinación de SDI (Salario Diario Integrado) por variables bimestral. </li>
                <li>Elaboración y presentación de avisos ante IMSS (Reingreso, altas, bajas o modificaciones de salario). </li>
                <li>Elaboración de cartas constancias de percepción.</li>
                <li>Elaboración de autorizaciones permanentes ante el IMSS.</li>
                <li>Cálculo anual del grado de riesgo de trabajo.</li>
                <li>Declaración informativa de sueldos y salarios</li>
            </ul>
          </p>

          <p>
            <h4 style="padding: 10px; color: #424242;">              
              SERVICIOS ADICIONALES
            </h4>
          </p>
          <p>
            <ul>
                <li>Dispersión de la nómina.</li>
                <li>Pago del SUA.</li>
                <li>Pago del impuesto sobre nomina.</li>
                
            </ul>
          </p>
          <p>
            <h4 style="padding: 10px; color: #424242;">              
             Garantía Gen-T 
            </h4>
          </p>
          <p>
            
Durante el contrato de servicio, todos los errores en cuestión de altas en el IMSS, reflejando en las diferencias de SUA, nos comprometemos a absorber los pagos, en caso de que se haya cometido un error, siempre y cuando el cliente haya proporcionado la información en tiempo y forma.

          </p>
        </td>
      </tr>
  </tbody>
</table>
<br><br><br><br>
<table>
  <tbody>
      <tr>
        <td colspan="2" style="font-size: 1.5em; color: #FF8000;" >
          <br>
                  II. PROPUESTA ECONÓMICA
        </td>
      </tr>
  </tbody>
  </table>
  <table >
    <tbody>
    <tr>
    <td  colspan="4" style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
      Maquila de nomina
       </td>
       </tr>
       <tr>
       <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Paquete
       </td>
         <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
        N° Empleados
         </td>
          <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
        Costo Unitario
         </td>
        <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
        Subtotal
         </td>
        
        
       </tr>
        @foreach($datos_maquila as $key=>$value)
       <tr> 
         <td style="text-align: left;">&nbsp;&nbsp;{{ $value->servicio_maquila }}&nbsp;&nbsp;</td>
         <td style="text-align: center;">&nbsp;&nbsp;{{ $value->num_empleados }}&nbsp;&nbsp;</td>
         <td style="text-align: right;">&nbsp;&nbsp;$ {{ number_format($value->costo_unitario,2) }}&nbsp;&nbsp;</td>
        <td style="text-align: right;">$ {{ number_format($value->subtotal_maquila,2) }}</strong></td>
                 
       </tr>
       @endforeach
       <tr>
         <td  colspan="2"></td>
         <td style="text-align: right;">Subtotal:</td>
         <td style="text-align: right;">$ {{ number_format($datos_maquila[0]->subtotal_cotizacion,2) }}</td>
       </tr>
        <tr>
         <td  colspan="2"></td>
         <td style="text-align: right;">Iva 16%:</td>
         <td style="text-align: right;">$ {{ number_format($datos_maquila[0]->iva_cotizacion,2) }}</td>
       </tr>
       <tr>
         <td  colspan="2"></td>
         <td style="text-align: right;">Total:</td>
         <td style="text-align: right;">$ {{ number_format($datos_maquila[0]->total_cotizacion,2) }}</td>
       </tr>
     </tbody>
  </table>

  <table>
     <tbody>
      <tr>
        <td colspan="2" >
          <br>
          <br>
          <br>
          <p style="font-size: 1.5em; color: #FF8000;">            
            III. CONDICIONES GENERALES
          </p>
        
            <p>
            <h4 style="padding: 10px; color: #424242;">              
              Gen-T, mantendrá la tarifa mencionada en función del cumplimiento de los siguientes puntos:
            </h4>
          </p>
          <p>
            <ul style="font-family: Helvetica; text-align: justify; color: #585858">
                <li>Aceptación y firma del Contrato de Servicio.</li>
                <li>Entrega de documentación del Cliente</li>
                <li>Copia R1 (RFC Hacienda).</li>
                <li>Copia Poder Notarial del Representante Legal.</li>
                <li>Copia Identificación Oficial Representante Legal.</li>
                <li>Copia Comprobante de Domicilio (antigüedad no menor a 3 meses).</li>
                <li>Pago puntual de facturas.</li>
            </ul>
          </p>
          <p style="font-family: Helvetica; text-align: justify; color: #585858">
            Esperando que esta cotización sea favorable y nos permita contar con su preferencia,  estamos seguros que Gen-T representa la alternativa con el nivel de calidad que espera usted y la empresa a la que representa, quedo a sus órdenes para cualquier consulta o aclaración.
          </p>
          <p style="font-family: Helvetica; text-align: justify; color: #585858">Esta propuesta tiene una vigencia de 30 días.</p>
          <p style="text-align: center;" class="final-firma">Atentamente</p><br>
          <p style="text-align: center;" class="final-firma">{{  $datos_maquila[0]->name }}</p>
          <p style="text-align: center;" class="final-firma">Área comercial</p><br>

          <p class="firma-acepto" style="font-family: Helvetica; text-align: justify; color: #585858">
            Para aceptar esta cotización, favor de firmar aquí y regresar: _____________________________
          </p>
        </td>
      </tr>

    </tbody>
    
  </table>

  <div class="footer" >
       Gen-T Personal Outsourcing  Ohio 15 Col. Nápoles Delegación Benito Juárez CP. 03810, Ciudad de México <br> &nbsp; &nbsp; &nbsp;Teléfono (01 55) 5543-7222  areacomercial@gen-t.com.mx
  </div>

</body>
</html>



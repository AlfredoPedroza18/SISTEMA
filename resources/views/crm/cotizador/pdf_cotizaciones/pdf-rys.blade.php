<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Example 1</title>

  {!! Html::style('assets/css/cotizacion_pdf/style_rys.css') !!}
</head>
<body>



  <table>
    <tbody>
      <tr class="encabezado">
        <th>
          {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg') !!}
        </th>
        <th style="color:orange; font-size: 2em; text-align: center; width: 550px;">
          Cotización
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
            {{ $datos_rys[0]->fecha_cotizacion }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
            {{  $datos_rys[0]->nombre_con }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
            {{  $datos_rys[0]->nombre_comercial }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
            {{ $datos_rys[0]->direccion }}
        </th>
      </tr>      
        <tr>
        <th colspan="2" style="text-align: right; color: #848484">
             ID: {{ $datos_rys[0]->id }}
        </th>
      </tr>
      <tr>
        <td style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
          Propuesta <br> de  <br>servicio 
        </td>
         <td style="color:white;background-color: #FF8000; font-size: 1.5em; margin-top: 15px; border-radius: 5px; ">
          &nbsp;&nbsp;&nbsp; Reclutamiento y Selección de Personal
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
      <br><br><br><br><br><br><br><br><br><p>
  <table>
    <tbody>
      <tr>
        <td colspan="2" style="font-size: 1.5em; color: #FF8000;">
         
          <p class="alcance-servicio">            
            I. ALCANCE DEL SERVICIO
          </p>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-family: Helvetica; text-align: justify; color: #585858">
          <p>          
            <ul class="alcance">
                <li>Reclutamos y seleccionamos.</li>
                <li>Envío de 1er terna de candidatos viables de acuerdo al perfil proporcionado por el cliente. </li>
                <li>Tiempo de reclutamiento de acuerdo al perfil. El tiempo estimado para el envío de la terna es de 5 - 10 días hábiles, el cual puede variar de acuerdo a la valoración por el área correspondiente.</li>
                <li>Verificación de referencias laborales.</li>
                <li>Garantía Gen-T: 1 reposición de la vacante que se generen por abandono de empleo durante los primeros {{ $datos_rys[0]->garantia_rys}} dìa(s). Es necesario se notifique a Gen-T máximo 3 días después de la baja de la persona.</li>
                <li>Es indispensable la retroalimentación por parte del cliente máximo 2 días posteriores al envío de candidatos, ya que de lo contrario Gen-T no se hace responsable de los tiempos de cobertura pactados.</li>
                
            </ul>
          </p>
          <p>Gen-T hace la búsqueda del perfil de acuerdo a las necesidades del cliente.</p>
          </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 1.5em; color: #FF8000; font-family: Platino;" >
          <br>
         
          II. PROPUESTA ECONÓMICA
        </td>
      </tr>
      <tr>
          <td colspan="2" style="font-size: 1.1em; color: #424242; text-align: justify; padding-top: 60px; ">          
              Para iniciar el servicio de Reclutamiento y Selección puro, es requisito indispensable la firma de la carta convenio, así como la entrega de la documentación completa por parte de cliente y el 30% de anticipo del servicio.
          </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 1.1em; color: #424242; text-align: justify; padding-top: 60px; ">          
          De acuerdo con la especialización, tiempo y experiencia que la proveedora debe aplicar durante el desarrollo de estos servicios, el cliente se obliga a cubrirle los honorarios establecidos con anterioridad, aún en los casos siguientes:
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-family: Helvetica; text-align: justify; color: #585858">
               
            <ol class="alcance">
                <li>Si contrata a cualquiera de los candidatos que le sean propuestos, omitiendo hacerlo del conocimiento de la proveedora.</li>
                <li>Si de alguna terna contrata a dos o más candidatos cubrirá los honorarios atendiendo cada contratación individual.</li>                
            </ol>          
          </td>
      </tr>
</tbody>
</table>
<br><br><br><br><br><br><br><p></p>
<table>
   <tbody>
    <!-- propuesta economica---->
    <tr>
    <td  colspan="4" style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Reclutamiento y Selección de Personal
       </td>
    </tr>
       <tr>
       <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Puestos  Requeridos
       </td>
         <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
        N° vacantes
         </td>
          <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Sueldo Mensual Promedio
         </td>
        <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
        Propuesta Economica
         </td>
        
       
  </tr>
        @foreach($datos_rys as $key=>$value)
       <tr> 
         <td style="text-align: left;">&nbsp;&nbsp;{{ $value->puesto_requerido }}&nbsp;&nbsp;</td>
         <td style="text-align: center;">&nbsp;&nbsp;{{ $value->cantidad_vacantes }}&nbsp;&nbsp;</td>
         <td style="text-align: center;">&nbsp;&nbsp;$ {{ number_format($value->sueldo_mensual,2) }}&nbsp;&nbsp;</strong></td>
        <td style="text-align: right;">&nbsp;&nbsp;$ {{ number_format($value->propuesta_economica,2) }}</td>
        
      
       </tr>
       @endforeach
       <tr>
         <td  colspan="2"></td>
         <td style="text-align: right;">Subtotal:</td>
         <td style="text-align: right;">$ {{ number_format($datos_rys[0]->subtotal_cotizacion,2) }}</td>
       </tr>
        <tr>
         <td  colspan="2"></td>
         <td style="text-align: right;">Iva 16%:</td>
         <td style="text-align: right;">$ {{ number_format($datos_rys[0]->iva_cotizacion,2) }}</td>
       </tr>
       <tr>
         <td  colspan="2"></td>
         <td style="text-align: right;">Total:</td>
         <td style="text-align: right;">$ {{ number_format($datos_rys[0]->total_cotizacion,2) }}</td>
       </tr>
</tbody>
</table>
<table>
<tbody>
<tr>
        <td colspan="2" >
          
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
                <li>Copia Acta Constitutiva con sello legible de Registro Público de Comercio.</li>
                <li>Copia Poder Notarial del Representante Legal.</li>
                <li>Copia Identificación Oficial Representante Legal.</li>
                <li>Copia Comprobante de Domicilio (antigüedad no menor a 3 meses).</li>
            </ul>
          </p>
          <p style="font-family: Helvetica; text-align: justify; color: #585858">
            Esperando que esta cotización sea favorable y nos permita contar con su preferencia,  estamos seguros que Gen-T representa la alternativa con el nivel de calidad que espera usted y la empresa a la que representa, quedo a sus órdenes para cualquier consulta o aclaración.
          </p>
          <p style="font-family: Helvetica; text-align: justify; color: #585858">Esta propuesta tiene una vigencia de 30 días.</p>
          <p style="text-align: center;" class="final-firma">Atentamente</p><br>
          <p style="text-align: center;" class="final-firma">{{  $datos_rys[0]->name }}</p>
          <p style="text-align: center;" class="final-firma">Área comercial</p>
<br>
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



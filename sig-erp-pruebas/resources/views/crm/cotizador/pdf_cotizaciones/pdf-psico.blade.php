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
            {{ $datos_psico[0]->fecha_cotizacion }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
            {{ $datos_psico[0]->nombre_con }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
                      {{ $datos_psico[0]->nombre_comercial }}
        </th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
            {{ $datos_psico[0]->direccion }}
        </th>
      </tr>
      
      <tr>
        <th colspan="2" style="text-align: right; color: #848484">
              ID:{{$datos_psico[0]->id}}
        </th>
      </tr>
      <tr>
        <td style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
          Propuesta <br> de  <br>servicio 
        </td>
         <td style="color:white;background-color: #FF8000; font-size: 1.5em; margin-top: 15px; border-radius: 5px; ">
          &nbsp;&nbsp;&nbsp; Pruebas psicométricas
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
                <li>III. Condiciones generales</li>
              </ul>
            </p>
            
          </td>
      </tr>
    </tbody>
</table>
<br><br><br>
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
            <li>* Aplicación e interpretación.</li>
            <li>* Reporte confidencial.</li>
        </ul>
        <br>
        <br>

        </td>
      </tr>
        </tbody>
 </table>
      
             {{--<center>{!! Html::image('recursos_cotizaciones/maquila/pruebas.jpg','',['class'=>'imgpruebas','style'=>'width:100% ;height:650px']) !!}</center> --}}
        
  <table>
    <thead style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
        <tr>
            <td colspan="3" style="font-size: 1.5em; color: white;">
                PRUEBAS SELECCIONADAS 
            </td>
        </tr>
        <tr>
            <th>Paquete</th>
            <th>Prueba</th>
            <th>Detalle</th>
        </tr>
    </thead>
    <tbody>


    
    @foreach($detalle_estudio as $detalle )
        <?php $pinto= true; ?>

        @foreach( $detalle['detalle'] as $tipo_prueba)
            <tr>

                @if( $pinto )
                <td rowspan="{{ count($detalle['detalle']) }}" style="background: #FAAC58; font-size: 1em; color: white;">
                    {{ $detalle['nombre_tipo'] }} 
                </td>
                <?php $pinto = false; ?>
                @endif
                <td style="background: #F7BE81; font-size: 1em; color: black;">{{ $tipo_prueba->prueba }}</td>
                <td style="background: #F7BE81; font-size: 1em; color: black;">{{ $tipo_prueba->evaluacion }}</td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
  </table>

 <br><br><br>
 <table>
  <tbody>
      <tr>
        <td colspan="2" style="font-size: 1.5em; color: #FF8000;">
        <br>
          II. PROPUESTA ECONÓMICA
        </td>
      </tr>
</tbody>
</table>
<br><br>
<table>
 <tbody>
      <tr>
       <td  colspan="4" style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Baterias Psicométricas</td>
       </tr>
       <tr>
       <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Tipo de Prueba
       </td>
       <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Costo Unitario 
       </td>
       <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Cantidad
       </td>
       <td   style="color:white;background-color: #FF8000;text-align: center;margin-top: 15px; border-radius: 5px; ">
       Costo
       </td>
       
       </tr>
       @foreach($datos_psico as $key=>$value)
       <tr> 
         <td style="text-align: center;">{{$value->tipo_prueba}}</td>
         <td style="text-align: center;">$ {{ number_format(($value->costo_unitario/$value->cantidad),2) }}</td>
         <td style="text-align: center;">{{$value->cantidad}}</td>
         <td style="text-align: center;">$ {{ number_format($value->costo_unitario,2)}}</td>
        
       </tr>
       @endforeach
     
        <tr>
            <td  colspan="2"></td>
            <td style="text-align: right;">Subtotal:</td>
            <td style="text-align: right;">$ {{ number_format($datos_psico[0]->subtotal_cotizacion,2) }}</td>
        </tr>
        <tr>
         <td  colspan="2"></td>
         <td style="text-align: right;">Iva 16%:</td>
         <td style="text-align: right;">$ {{ number_format($datos_psico[0]->iva_cotizacion,2) }}</td>
       </tr>
       <tr>
         <td  colspan="2"></td>
         <td style="text-align: right;">Total:</td>
         <td style="text-align: right;">$ {{ number_format($datos_psico[0]->total_cotizacion,2) }}</td>
       </tr>
</tbody>
</table>
<br><br>
<table>
<tbody>
       <tr>
        <td colspan="2" style="font-size: 1.5em; color: #FF8000;">
          III. CONDICIONES GENERALES<br><br>
        </td>
       </tr>
       <tr>
          <td colspan="2"  style="font-family: Helvetica; text-align: justify; color: #585858"> 
          <br>
          Gen-T, mantendrá la tarifa mencionada en función del cumplimiento de los siguientes puntos:<br>
          <ul style="list-style:none">
                
              <li> • Aceptación y firma del Contrato de Servicio.</li>
              <li> • Entrega de documentación del Cliente.</li>
              <li> • Copia R1 (RFC Hacienda).</li>
              <li> • Copia Acta Constitutiva con sello legible de Registro Público de Comercio.</li>
              <li> • Copia Poder Notarial del Representante Legal.</li>
              <li> • Copia Identificación Oficial Representante Legal.</li>
              <li> • Copia Comprobante de Domicilio (antigüedad no menor a 3 meses).</li>
              <li> • Pago puntual de facturas.</li>
         </ul>
            
          </td>
       </tr>
       
        <tr>
          <td colspan="2"  style="font-family: Helvetica; text-align: justify; color: #585858"> 
                  
          Esperando que esta cotización sea favorable y nos permita contar con su preferencia, estamos seguros que Gen-T representa la alternativa con el nivel de calidad que espera usted y la empresa a la que representa, quedo a sus órdenes para cualquier consulta o aclaración.
          
          </td>
       </tr>
       

    </tbody>
    <tfoot style="text-align: center; position: fixed;">
      <tr>
          <td colspan="2" style="text-align: center"> 
         <em> 
          Atentamente<br><br>
          {{  $datos_psico[0]->name }}<br>
          Área Comercial
          </em>
          <p><br>
            
          </td>
      </tr>
      <tr>
          <td colspan="2" style="text-align: left;font-family: Helvetica;color: #585858"> 
             Esta propuesta tiene una vigencia de 30 días.<br>        
          </td>
      </tr>

      <tr>
          <td colspan="2" style="text-align: left;font-family: Helvetica;color: #585858"> 
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



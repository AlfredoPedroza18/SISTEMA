<?php

header('Content-Type:application/msword');
header('Content-Disposition: attachment;filename="Contrato de maquila.doc"');
header('Pragma:no-cache');
header('Expires: 0');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Example 1</title>

  {!! Html::style('assets/css/cotizacion_pdf/style.css') !!}
</head>
<body style="font-size: 0.95em;">
<p style="text-align: right;">
No.<span style="text-decoration: underline;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$datos_contrato[0]->no_contrato}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
</p>
<strong><p style="text-align: justify;">
CONTRATO DE PRESTACION DE SERVICIOS PROFESIONALES QUE CELEBRAN POR UNA PARTE LA EMPRESA _____________, REPRESENTADA POR EL C. _____________________, EN SU CARÁCTER DE REPRESENTANTE LEGAL, A QUIEN EN LO SUCESIVO SE LE DENOMINARA “EL CLIENTE” Y POR LA OTRA PARTE ________________, REPRESENTADO POR EL C. ______________, A QUIEN EN LO SUCESIVO SE LE DENOMINARA “EL PRESTADOR”, AL TENOR DE LAS SIGUIENTES DECLARACIONES Y CLAUSULAS: 

</p></strong>
<p>
<center><strong>D E C L A R A C I O N E S</strong></center>
</p>
<p style="text-align: justify;">
I.- "EL CLIENTE" declara que:
</p>
<p style="text-align: justify;">
A).- Es una Sociedad legalmente constituida conforme a las leyes de la República Mexicana,  bajo la denominación de ____________, según se acredita con el testimonio notarial número _______, pasado ante la fe del Notario Público número ____ del ______ Lic. ______________________, y que se encuentra debidamente inscrita en el Registro Público de la Propiedad y del Comercio bajo el folio mercantil ________ domicilio social en _________________  y que su objeto social consiste principalmente en la administración de personal.
</p>
<p>
B).- Que su representante legal cuenta con las facultades necesarias y suficientes para celebrar el presente contrato y obligar a su poderdante en virtud del mismo. 
</p>
<p>
C).- Que su Registro Federal de Contribuyentes es ____________.

</p>
<p style="text-align: justify;">
D).- Que desea celebrar el presente contrato en los términos y condiciones que se establecen adelante. 
</p>

<p style="text-align: justify;">
<strong>II. Declara “EL PRESTADOR”, bajo protesta de decir verdad:</strong>
</p>
<p style="text-align: justify;">
A).- Que es una Sociedad Mercantil legalmente constituida conforme a las leyes de la República Mexicana, bajo la denominación de _____________,  según se acredita con el testimonio de la Escritura Pública Número __________ de fecha ___________, otorgada ante la fe del Licenciado ___________, Titular de la Notaría número _______, de _________, e inscrita en el Registro Público de la Propiedad y del Comercio bajo el folio Mercantil ______.
</p>
<p style="text-align: justify;" >
B).-  Que su representante legal cuenta con las facultades necesarias y suficientes para celebrar el presente contrato y obligarse a su poderdante en virtud del mismo, poderes que a la fecha no le han sido revocados ni modificado de ninguna forma, según consta en el mismo testimonio relacionado en el inciso A) inmediato anterior. 
<p >
C).-  Que su número de Registro Federal de Contribuyentes es el: ______________.
</p>
<p style="text-align: justify;">
D).- Que desea celebrar el presente contrato para prestar los trabajos y asesorías que más adelante se establecen, bajo los términos y condiciones que se detallan. Una vez expuesto lo anterior, las partes están de acuerdo en otorgar las siguientes:

</p>

<center><strong>C L Á U S U L A S</strong></center>
<p style="text-align: justify;">
<strong>PRIMERA- OBJETO DEL CONTRATO.</strong>
</p>
<p style="text-align: justify;">
“EL PRESTADOR” se obliga a realizar todas las actividades necesarias para la atención, asesoría y desarrollo de servicios de naturaleza _______ que requiera “EL CLIENTE”.
</p>
<p style="text-align: left;">
<strong>SEGUNDA.- VIGENCIA Y TERMINACIÓN ANTICIPADA</strong>
</p>
<p style="text-align: justify;">
El presente contrato estará vigente a partir de la fecha de su firma y tendrá una duración de _______ y se renovará de manera automática.
</p>
<p style="text-align: justify;">
Cualquiera de las partes podrá dar por terminado en cualquier tiempo, el presente contrato sin responsabilidad alguna para ella, previa notificación que dé a la otra por escrito con treinta días naturales de anticipación a la fecha en que surta dicha terminación. 
</p>
<p style="text-align: justify;">
Dicha notificación deberá de ser entregada y sellada en el domicilio señalado en la cláusula décima primera de este contrato. 
</p>
<p style="text-align: left;">
<strong>TERCERA.- CONTRAPRESTACIÓN Y FORMA DE PAGO.</strong>
</p>
<p style="text-align: justify;">
“EL CLIENTE” pagará por concepto de contraprestación la cantidad de $_____  (___________ 00/100 M.N.) más IVA, que considera las actividades siguientes:
</p>
<p style="text-align: justify;">
_________________________________________________________________________________________________________________________________________________________________________________________________________.
</p>
<p style="text-align: justify;">
“EL PRESTADOR” se obliga a entregar las facturas correspondientes de acuerdo a los requisitos fiscales y las políticas de “EL CLIENTE”.
</p>
<p style="text-align: justify;">
“EL CLIENTE” se obliga a cubrir el pago de los servicios otorgados por “EL PRESTADOR” mediante transferencia bancaria a la cuenta que “EL PRESTADOR” designe, una vez recibida la factura correspondiente. 
</p>

<p style="text-align: left;">
<strong>CUARTA.- OBLIGACIONES DE “EL CLIENTE” </strong>
</p>
<p style="text-align: justify;">
Cubrir en tiempo y forma las contraprestaciones pactadas en este contrato. 
</p>
<p style="text-align: left;">
<strong>
QUINTA.- GASTOS
</strong>
</p>
<p style="text-align: justify;">
En caso de que “ELPRESTADOR” requiera la contratación de terceros a fin de cubrir servicios complementarios a los contratados en el presente documento, tales como notarios públicos, peritos técnicos y traductores, “EL CLIENTE” designará a dicho profesionista o en su caso autorizará que “EL PRESTADOR” lo contrate, de ser así, cubrirá los gastos en que se incurra por tal motivo.  
</p>
<br>

<p style="text-align: left;">
<strong>
SEXTA.- RESPONSABILIDAD LABORAL
</strong>
</p>
<p style="text-align: justify;">
“EL PRESTADOR” se obliga a proporcionar los servicios objeto de este contrato en forma personal o con el personal especializado que juzgue necesario para el cumplimiento del mismo, bajo su exclusiva responsabilidad.
</p>
<p style="text-align: justify;">
Quedando claramente definido entre las partes contratantes que el presente contrato de prestación de servicios profesionales es de naturaleza netamente civil, por lo que no implica ni presupone una relación laboral entre “EL PRESTADOR” y sus empleados actuales o aquellos (incluidos subcontratistas) que tuviere que contratar para prestar los servicios y “EL CLIENTE”, en virtud de no existir servicio personal subordinado a cambio de un salario.
</p>
<p style="text-align: justify;">
“EL PRESTADOR” como empresario y patrón del personal que ocupase con motivo de los trabajos materia de este contrato, será el único responsable de las obligaciones derivadas de las disposiciones legales y demás ordenamientos en materia de trabajo y de seguridad social.
</p>
<p style="text-align: justify;">
En virtud de lo anterior “EL PRESTADOR”, libera desde este momento a “EL CLIENTE”, de cualquier responsabilidad laboral.
</p>
<p style="text-align: justify;">
“EL PRESTADOR” se obliga a indemnizar y sacar en paz y a salvo a “EL CLIENTE”, de cualquier reclamación, juicio laboral o de seguridad social presentado por los trabajadores de “EL PRESTADOR”  en contra de “EL CLIENTE”.
</p>
<p style="text-align: justify;">
De lo contrario “EL PRESTADOR” asumirá la defensa del caso como patrón, sin que por ello “EL CLIENTE”, pierda su derecho de asumir la defensa del asunto por si, sin embargo, el único responsable frente a sus trabajadores será siempre “EL PRESTADOR” y hará lo necesario para demostrar que no existe relación laboral de dichos trabajadores con “EL CLIENTE”. 
</p>
<p style="text-align: justify;">
Todos los gastos y costas que realice “EL CLIENTE”, por demandas laborales y/o de seguridad social, presentadas por los trabajadores de “EL PRESTADOR” incluyendo las costas y honorarios legales, así como, los daños y perjuicios que se lleguen a causar, serán pagadas al 100% (cien por ciento) por “EL PRESTADOR” a “EL CLIENTE”  dentro de los 45 (cuarenta y cinco) días  posteriores de notificado del adeudo, de lo contrario “EL PRESTADOR” pagara a “EL CLIENTE” el 2.5% (dos punto cinco por ciento)  de interés moratorios mensual hasta que dicha cantidad sea totalmente liquidada; siendo el presente convenio el instrumento más idóneo que en derecho proceda para hacer efectiva esta obligación de pago. 
</p>

<p style="text-align: left;">
<strong>
SEPTIMA.- INFORMACIÓN CONFIDENCIAL
</strong>
</p>
<p style="text-align: justify;">
Las partes se obligan a guardar absoluta confidencialidad y secreto profesional de toda aquella información y documentación que se proporcionen para la prestación de los servicios obligándose a no revelar a terceros los conocimientos que tengan por tal motivo. Asimismo, cada parte será responsable frente a la otra, cuando por el mal uso de la información o revelación a terceros no autorizados,cause algún daño a la otra parte, por lo que se obligan a hacer del conocimiento de todos sus empleados y dependientes que tengan acceso a la información proporcionada, de sus obligaciones respecto a la misma, encomendándolos a observar una absoluta confidencialidad y reserva en relación con la documentación e información en cuestión.
</p>
<p style="text-align: justify;">
La información y documentación que genere “EL PRESTADOR”, con motivo del presente contrato, será propiedad exclusiva de “EL CLIENTE”  y aquél se obliga a entregárselas a éste en su totalidad y a no divulgarla sin el previo consentimiento por escrito de “EL CLIENTE”.
</p>
<p style="text-align: justify;">
Asimismo, “EL PRESTADOR” será responsable solidario de sus empleados y/o subcontratistas de llegar a provocar daños o perjuicios a “EL CLIENTE”, como consecuencia del mal uso de la información confidencial proporcionada. 
</p>
<p style="text-align: justify;">
Adicionalmente a las obligaciones de confidencialidad establecidas en la presente cláusula las partes convienen en que en ningún tiempo ni momento, aun cuando el presente contrato hubiere terminado por cualquier causa, “EL PRESTADOR” podrá utilizar el nombre ó nombres comerciales, avisos comerciales o marcas, registrada o no, de “EL CLIENTE” y/o de cualquiera de sus partes relacionadas, filiales y/o subsidiarias, en cualquier medio o publicación de cualquier índole, prensa, medios electrónicos o de cualquier otra naturaleza, sin haber obtenido previa y por escrito la autorización de “EL CLIENTE”. 
</p>

<p style="text-align: left;">
<strong>
OCTAVA.- SUBCONTRATACIÓN Y CESIÓN DE DERECHOS
</strong>
</p>
<p style="text-align: justify;">
El presente contrato no podrá ser asignado, cedido o transferido por “EL PRESTADOR” en todo o en parte, a otra persona distinta, sea esta física o moral, sin el previo consentimiento por escrito de “EL CLIENTE”. 
</p>
<p style="text-align: justify;">
Por su parte “EL CLIENTE” podrá asignar, ceder o transferir el presente contrato a cualquiera de sus empresas subsidiarias o filiales o cualquiera de las empresas que sea parte relacionada de ella. 
</p>
<p style="text-align: left;">
<strong>
NOVENA.- CONFLICTO DE INTERESES.</strong>
</p>
<p style="text-align: justify;">
“EL PRESTADOR” manifiesta expresamente que ninguna persona física o moral que se encuentre directa o indirectamente relacionada con ella, es agente, empleado, proveedor, licenciatario, maquilador o mandatario de “EL CLIENTE” o de cualesquiera de sus filiales o subsidiarias. Las partes manifiestan expresamente que lo declarado con anterioridad fue una de las condiciones que condujeron a la celebración del presente contrato, y en caso de que no sea verdad, dará derecho a “EL CLIENTE” para solicitar la declaración de nulidad absoluta del presente contrato.
</p>
<br><br>
<p style="text-align: left">
<strong>DÉCIMA.- MODIFICACIONES </strong>
</p>
<p style="text-align: justify;">
Para cualquier modificación, adición, reforma o novación de este contrato, bastará con anexar al mismo el documento escrito y debidamente firmado por las partes que contenga tales conceptos.
</p>
<br>
<p style="text-align: left">
<strong>DECIMA PRIMERA.- DOMICILIOS  </strong>
</p>

<p style="text-align: justify;">
Para los efectos del presente contrato, las partes, respectivamente señalan como su domicilio el siguiente:
</p>
<p style="text-align: justify;"> 
“EL CLIENTE”<br>

_______________________________________________________________.<br>

“EL PRESTADOR”
_______________________________________________________________.<br>

</p>
<p style="text-align: justify;">
Las partes se obligan a comunicarse recíprocamente cualquier cambio de domicilio, en la inteligencia de que cualquier comunicación que se dirija al último domicilio que hayan señalado, surtirá sus efectos legales. 
</p>
<p style="text-align: left">
<strong>DECIMA SEGUNDA.- CASO FORTUITO O FUERZA MAYOR. </strong>
</p>
<p style="text-align: justify;">
Ninguna de las partes será responsable frente a la otra de daños, perjuicios, incumplimientos, obligaciones o pasivos que pudieran originarse por caso fortuito o de fuerza mayor, que estuvieran fuera de su control tales como, huelgas, paros, guerras, sabotajes, disposiciones oficiales, alteraciones públicas, movimientos telúricos, inundaciones, huracanes, manifestaciones de la naturaleza o del clima (nieve, granizo, etc.). Así mismo las partes quedarán exentas de responsabilidad por los actos realizados por las autoridades y entidades públicas que pudiesen afectar a la otra parte, siempre y cuando dichos actos no sean originados por algún incumplimiento o acto atribuible a alguna de las partes. 
</p>
<p style="text-align: left">
<strong>DECIMA TERCERA.- CAUSALES DE RESCISIÓN. </strong>
</p>
<p style="text-align: justify;">
Las partes ante la falta de cumplimiento de una de ellas a las obligaciones que adquieren en el presente contrato, podrán rescindirlo en forma inmediata, sin necesidad de declaración judicial, solamente mediante un comunicado por escrito enviado de la una a la otra con quince días de anticipación a la fecha en que surta efectos por incumplimiento de las obligaciones estipuladas en el presente contrato.

<p style="text-align: left">
<strong>
DECIMA CUARTA.- JURISDICCIÓN.</strong>
</p>
<p style="text-align: justify;">
Ambas partes renuncian al fuero que les corresponda o pudiera corresponderles en lo futuro, y al efecto se someten al de los Tribunales Civiles de la Ciudad de México y a lo establecido por el Código Civil de la misma entidad, para todos los efectos de interpretación y aplicación de cualquier consecuencia resultante de la aplicación del presente Contrato de Servicios Profesionales. 
</p>
<p style="text-align: left">
Leído el presente Contrato de Prestación de Servicios Profesionales, y enteradas las partes del contenido y alcance de todas y cada una de las cláusulas que en el mismo se precisan, lo firman por duplicado el día ___ de ______ del 20__.
</p>

<center>

<table >
<tbody>
 
   <tr>
     <td colspan="3">
          <center>___________________________________<br>
          “EL CLIENTE”<br>
         
         
    </td>
    <td colspan="3">
        <center> ______________________________<br>
        “EL PRESTADOR”<br>
       
       </td>
   </tr>
</tbody>
</table>
</center>












</body>
</html>



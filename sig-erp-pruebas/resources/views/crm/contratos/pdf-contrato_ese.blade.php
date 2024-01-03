<?php

header('Content-Type:application/msword');
header('Content-Disposition: attachment;filename="Contrato de servicios ESE.doc"');
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
<p style="text-align: justify;">
CONTRATO DE PRESTACIÓN DE SERVICIOS QUE CELEBRAN POR UNA PARTE LA EMPRESA ____________________________________, REPRESENTADA POR LA C. ____________________________________________, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ COMO “LA PROVEEDORA” Y POR LA OTRA, LA EMPRESA ____________________________________________, REPRESENTADA POR _______________________, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ COMO “EL CLIENTE”, DE CONFORMIDAD CON LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS:
</p>
<p>
<center><strong>D E C L A R A C I O N E S</strong></center>
</p>
<p style="text-align: justify;">
I.- Declara LA PROVEEDORA, por conducto de su representante legal, que:
</p>
<p style="text-align: justify;">
a) Es una sociedad mercantil debidamente constituida de acuerdo con las Leyes de la República Mexicana, como consta en el testimonio de la Escritura Pública número _____, de fecha __ de _______ de ____, otorgada ante la fe del ____________________________________________, titular de la Notaría Pública número ___, del Distrito Federal y que de conformidad con sus estatutos sociales vigentes, está facultado para celebrar el presente contrato.
</p>
<p>
b) Se encuentra inscrita en el Registro Federal de Contribuyentes _____________, cuyo Domicilio Fiscal se ubica en _________________________________________________________________________
</p>
<p>
c) Su objeto social consiste principalmente en la práctica de estudios socio económicos de todos los niveles ocupacionales en el sector empresarial.
</p>
<p style="text-align: justify;">
d) Dispone de los recursos humanos, administrativos, económicos y materiales propios y suficientes para cumplir con todas las obligaciones legales que deriven de la prestación de los servicios objeto de este contrato.
</p>
<p style="text-align: justify;">
e) Conoce las necesidades de EL CLIENTE, así como sus políticas, normas administrativas y conducta comercial, las cuales se obliga a cumplir durante la prestación de los servicios materia de este contrato.
</p>
<p style="text-align: justify;">
II. Declara EL CLIENTE, por conducto de su representante legal, que:
</p>
<p style="text-align: justify;">
a) Es una sociedad mercantil debidamente constituida de acuerdo con las Leyes de la República Mexicana, como consta en el testimonio de la Escritura Pública número _______, de fecha _____________, otorgada ante la fe del ___________________, titular de la Notaría Pública número ___, del ___________________, y que de conformidad con sus estatutos sociales vigentes, está facultado para celebrar el presente contrato.
</p>
<p style="text-align: justify;" >
b) Se encuentra inscrita en el Registro Federal de Contribuyentes con la nomenclatura _________________, cuyo Domicilio Fiscal se ubica en ______________________________________________________________________
<p >
c) Su objeto social consiste principalmente en 
_________________________________________________________________________<br>
_________________________________________________________________________<br>
_________________________________________________________________________<br>

</p>
<p style="text-align: justify;">
d) Es su interés contratar con LA PROVEEDORA, los servicios que son materia del presente contrato.
</p>
<p>
e) Cuenta con los recursos económicos para hacer frente a las obligaciones pecuniarias que se derivan de la celebración de este contrato.
</p> 
<p style="text-align: justify;">
III.- Declaran ambas partes, que se reconocen recíprocamente su capacidad para celebrar el presente Contrato de Prestación de Servicios.
</p>
<p style="text-align: justify;">
Con base en las declaraciones que anteceden, las partes se sujetan a las siguientes:
</p>
<center><strong>C L Á U S U L A S</strong></center>
<p style="text-align: justify;">
<strong>PRIMERA. OBJETO DEL CONTRATO.</strong>
</p>
<p style="text-align: justify;">
EL CLIENTE y LA PROVEEDORA, expresan que el objeto de este contrato, consiste en la prestación de servicios en el área de estudios socioeconómicos por parte de LA PROVEEDORA, a favor de EL CLIENTE, de acuerdo con los lineamientos que se determinan en el presente contrato.
</p>
<p style="text-align: left;">
<strong>SEGUNDA. CONTRAPRESTACION Y FORMA DE PAGO.</strong>
</p>
<p style="text-align: justify;">
Ambas partes, manifiestan que servicios, honorarios, gastos y términos de pago, que se generan por la prestación de los servicios que conforman la materia de este contrato, son los siguientes:
</p>
<p style="text-align: justify;">
Para la realización de los estudios EL CLIENTE proporcionará a LA PROVEEDORA:
</p>
<ul>
	<li>a) Nombre completo de la persona</li>
	<li>b) Teléfono personal, casa y/o trabajo.</li>
	<li>c) Domicilio y correo electrónico.</li>
</ul>
<p style="text-align: justify;">
Por su parte LA PROVEEDORA adquiere el compromiso de enviar a EL CLIENTE, por medio electrónico (Formato PDF), el informe final dentro de los 3 - 5 días hábiles una vez realizada la visita.
</p>
<p style="text-align: justify;">
Los honorarios que se generaran por cada estudio socioeconómico que se realice será por la cantidad de $550.00 (Quinientos cincuenta pesos 00/100) más IVA y en él Estado de México $600.00 (Seiscientos pesos 00/100) más IVA, los cuales se cubrirán por LA PROVEEDORA dentro de los 8 días siguientes a la fecha de recepción de la factura el cual efectuará a través de la transferencia electrónica a la cuenta bancaria que le indique LA PROVEEDORA.
</p>
<p style="text-align: justify;">
En el caso de estudios urgentes, (Menos de 3 días), el costo será de $700.00 más I.V.A.
</p>
<p style="text-align: justify;">
En el mismo contexto, EL CLIENTE y LA PROVEEDORA acuerdan que una vez iniciado un proceso de estudio, si EL CLIENTE, suspende o cancela el servicio, siempre y cuando la visita se haya realizado tendrá la obligación de cubrir a LA PROVEEDORA, la cantidad de $150.00 más IVA, por concepto de gasto administrativo generado, sin que dicha proveedora tenga la obligación de entregar a EL CLIENTE cualquier tipo de reporte o información sobre el candidato.
</p>
<p style="text-align: justify;">
Las partes acuerdan que en los casos en que el domicilio del candidato se ubique en un lugar o zona que represente un traslado extraordinario, acordarán los gastos de dicho traslado.
</p>
<p style="text-align: justify;">
Queda establecido que no procederá incremento alguno en el costo de los servicios, salvo que exista un acuerdo escrito firmado por LA PROVEEDORA y EL CLIENTE.
</p>


{{-- AQUI VOY PARA CONTINUAR CON LA MODIFICACIÓN DEL CONTRATO  --}}

<p style="text-align: left;">
<strong>TERCERA. OBLIGACIONES A CARGO DE LA PROVEEDORA.</strong>
</p>
<p style="text-align: justify;">
LA PROVEEDORA, acepta que durante la prestación de los servicios que son materia de este contrato, deberá:
</p>
<p style="text-align: justify;">
a) Prestar los servicios en los términos, condiciones, características y especificaciones de orden técnico y operativo, establecidos en este documento, con personal y recursos materiales propios, los cuales correrán bajo su cuenta, cargo y responsabilidad. </p>
<p style="text-align: justify;">
b) Atender puntualmente, las indicaciones que para el eficaz desempeño de los servicios reciba por parte de EL CLIENTE a través de la persona o personas autorizadas para ese efecto.
<p style="text-align: justify;"></p>
c) Presentar a EL CLIENTE, cada vez que lo solicite, un reporte por escrito que contenga el estado que guardan los servicios que otorga, así como sus comentarios respecto a ellos.
</p><br>
<p style="text-align: left;">
<strong>
CUARTA. OBLIGACIONES A CARGO DE EL CLIENTE.</strong>
</p>
<p style="text-align: justify;">
EL CLIENTE acepta que durante el desarrollo de los servicios que se describen en este contrato, deberá:
</p>
<p style="text-align: justify;">
a) Brindar el apoyo necesario a favor de LA PROVEEDORA, para el debido cumplimiento de los servicios que son materia del presente contrato.
</p>
<p style="text-align: justify;">
b) Cubrir oportunamente a LA PROVEEDORA, los honorarios y gastos que se generen por la prestación de sus servicios.
</p>

<p style="text-align: justify;">
c) Entregar a LA PROVEEDORA, la información y/o documentación necesaria para la prestación de los Servicios.
</p>
<p style="text-align: justify;">
d) Recibir la información y/o documentación que LA PROVEEDORA, le entregue al término de la vigencia del presente Contrato, siempre y cuando dicha información y/o documentación se ajuste a los requerimientos de este instrumento.
</p>
<p style="text-align: left;">
<strong>
QUINTA. CONFIDENCIALIDAD.
</strong>
</p>
<p style="text-align: justify;">
Las partes reconocen que durante la duración del presente contrato, recibirán, conocerán, observarán y tendrán acceso a información y datos considerados confidenciales de las mismas, incluyendo sin limitación todo tipo de secretos industriales, estrategias, políticas, procedimientos e información de carácter administrativo, así como cualquier otra información obtenida ya sea por escrito o que se encuentre grabada o registrada en la memoria de cualquier equipo de cómputo de las partes, o de manera ocular o verbal, directa o indirectamente y que será considerada para todos los efectos como confidencial.
</p>


<p style="text-align: justify;">
	Por lo que deberá ser guardada como confidencial por la parte receptora y no podrá divulgarse por cualquier medio, sin el previo consentimiento por escrito de la parte que haya proporcionado la Información confidencial, es por lo que la parte que la reciba se compromete a:
</p>


<p style="text-align: justify;">
a) Proteger dicha información confidencial utilizando todos los medios profesionales aplicables para alcanzar ese fin.
</p>
<p style="text-align: justify;">
b) Utilizar la información confidencial únicamente con el objetivo de ejecutar sus obligaciones en el marco de este contrato.
</p>

<p style="text-align: justify;">
c) Reproducir información confidencial únicamente en la medida necesaria para ejecutar sus obligaciones en el marco de este contrato.
</p>

<p style="text-align: justify;">
	Las partes acuerdan a su vez, que la obligación de mantener confidencial la información, pactada en este Contrato, tendrá una validez indefinida y en el supuesto de infringir esos compromisos, estarán expuestos a las sanciones que para ese efecto se contemplan en la Ley de la Propiedad Industrial, la Ley Federal del Derecho de Autor y el Código Penal.
</p>




<p style="text-align: left;">
<strong>
SEXTA. DURACIÓN.
</strong>
</p>
<p style="text-align: justify;">
El presente Contrato se celebra por tiempo indefinido, no obstante, LA PROVEEDORA y EL CLIENTE, podrán darlo por terminado con anticipación, con el único requisito de notificar esa decisión por escrito a la parte que corresponda, con por lo menos treinta días naturales antes del día en que se haya determinado concluirlo.
</p>
<p style="text-align: left;">
<strong>
SEPTIMA. RESCISIÓN.</strong>
</p>
<p style="text-align: justify;">
El presente contrato podrá rescindirse por el incumplimiento de alguna de las obligaciones a que se sujetan las partes, además de los supuestos siguientes:
</p>
<p style="text-align: justify;">
a) Si LA PROVEEDORA, no inicia, sin causa justificada en la fecha convenida la prestación de los servicios materia del presente contrato.</p>
<p style="text-align: justify;">
b) Si LA PROVEEDORA, no ejecuta debidamente las actividades inherentes a la prestación de los servicios objeto de este contrato, en contravención a las disposiciones y técnicas aplicables a la materia de los mismos.</p>
<p style="text-align: justify;">
c) Si EL CLIENTE, en forma injustificada retiene a LA PROVEEDORA, la contraprestación en la forma prevista en el presente Contrato.
</p>
<p style="text-align: justify;">
d) Si LA PROVEEDORA, no guarda estricta reserva en cuanto a la información que recibiere de EL CLIENTE, con motivo de la prestación de los servicios.
</p>
<p style="text-align: justify;">
e) Si alguna de las partes incumple con cualquiera de las obligaciones contraídas en el presente contrato o incurre en cualquier violación a las disposiciones y ordenamientos que lo regulan.
</p>


<p style="text-align: left;">
<strong>
OCTAVA. CESIÓN DE DERECHOS Y OBLIGACIONES.
</strong>
</p>
<p style="text-align: justify;">
Ninguna de las partes podrá ceder, enajenar o gravar en forma alguna sus derechos y obligaciones derivados de este Contrato, sin el consentimiento previo y por escrito otorgado por conducto de su representante legal, en el entendido de que de ser autorizada dicha cesión o traspaso de derechos y obligaciones, la parte que los ceda seguirá siendo responsable ante la otra parte por cualquier problema o contingencia que surja con el tercero al que le fueron cedidos o traspasados los derechos y obligaciones.
</p>

<p style="text-align: left;">
<strong>
NOVENA. MODIFICACIONES AL CONTRATO.</strong>
</p>
<p style="text-align: justify;">
Cualquier modificación que las partes deseen realizar al contenido del presente contrato, deberá efectuarse mediante acuerdo realizado por escrito y firmado por los representantes legales de ambas.</p>

<p style="text-align: left">
<strong>DECIMA. AUSENCIA DE VICIOS.</strong>
</p>
<p style="text-align: justify;">
Las partes declaran, que en la celebración del presente contrato no ha habido lesión, dolo, violencia, error, ni ningún otro vicio que pudiere afectar su existencia o validez, estando ambas partes conformes con la totalidad de sus términos.
</p>
<p style="text-align: left">
<strong>
DECIMA PRIMERA.  NOTIFICACIONES.</strong>
</p>
<p style="text-align: justify;">
Todos los avisos y notificaciones que las partes deban efectuarse, con relación al presente Contrato, deberán llevarse a cabo de manera escrita en los domicilios señalados en la presente cláusula y se entenderán como válidamente notificados, siempre que hayan sido entregados personalmente a representante autorizado de la otra parte, quien deberá firmar de recibido, o enviados por mensajería o correo certificado con acuse de recibo.
</p>

<p style="text-align: justify;">
	LA PROVEEDORA:____________________________
</p>
<p style="text-align: justify;">
	EL CLIENTE:____________________________
</p>
<p style="text-align: justify;">
	En el evento de que las partes cambien de domicilio, se obligan a dar aviso a la otra parte en un plazo de 15 días hábiles contados a partir de dicha situación, en caso contrario, las notificaciones que se realicen de manera judicial o extrajudicial, serán válidas, sin importar que se hubieren realizado en el domicilio inicialmente indicado.
</p>

<p style="text-align: left">
<strong>
DECIMA SEGUNDA. LEGISLACIÓN APLICABLE, JURISDICCIÓN Y COMPETENCIA.
</strong>
</p>
<p style="text-align: justify;">
Para cualquier necesidad de interpretación, controversia o reclamación que surja con relación a este Contrato o a la violación del mismo, las partes se someten irrevocablemente a las leyes aplicables y a los tribunales competentes en la Ciudad de México, renunciando expresamente a cualquier otro fuero que pudiera corresponderles por razón de su domicilio presente o futuro, de los lugares señalados por ellas para el cumplimiento de sus obligaciones o por cualquier otra causa generadora de competencia territorial.
</p>


<p style="text-align: justify;">
Las partes, completamente conscientes de los alcances y efectos legales de este Contrato y de que en su celebración no ha habido lesión, dolo, violencia, error, ni algún otro vicio de la voluntad que pudiere afectar su existencia o validez, firman el presente Contrato por duplicado en la Ciudad de México, el día __ del mes de ___ del año _____.
</p>

{{-- 
<p style="text-align: left">
<strong>
DECIMA TERCERA.  AUSENCIA DE VICIOS.
</strong>
</p>
<p style="text-align: justify;">
Las partes declaran, que en la celebración del presente contrato no ha habido lesión, dolo, violencia, error, ni ningún otro vicio que pudiere afectar su existencia o validez, estando ambas partes conformes con la totalidad de sus términos.
</p>
<p style="text-align: left">
<strong>
DECIMA CUARTA.  PREVALENCIA DEL CONTRATO.
</strong>
</p>
<p style="text-align: justify;">
El presente contrato da por terminado cualquier acuerdo verbal o escrito celebrado entre las partes con anterioridad a la firma del presente contrato.  
</p>
<p style="text-align: left">
<strong>
DECIMA QUINTA. NOTIFICACIONES.
</strong>
</p>
<p style="text-align: justify;">
Todos los avisos y notificaciones que las partes deban efectuarse, con relación al presente Contrato, deberán llevarse a cabo de manera escrita en los domicilios señalados en la presente cláusula y se entenderán como válidamente notificados, siempre que hayan sido entregados personalmente a representante autorizado de la otra parte, quien deberá firmar de recibido, o enviados por mensajería o correo certificado con acuse de recibo.
</p>


<p style="text-align: left">
LA PROVEEDORA: _________________________________________<br>

EL CLIENTE:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;_________________________________________
</p>
<p style="text-align: justify;">
En el evento de que las partes cambien de domicilio, se obligan a dar aviso a la otra parte en un plazo de 15 días hábiles contados a partir de dicha situación, en caso contrario, las notificaciones que se realicen de manera judicial o extrajudicial, serán válidas, sin importar que se hubieren realizado en el domicilio inicialmente indicado.
</p>
<p style="text-align: left">
<strong>
DECIMA SEXTA. LEGISLACIÓN APLICABLE, JURISDICCIÓN Y COMPETENCIA.
</strong>
</p>
<p style="text-align: justify;">
Para cualquier necesidad de interpretación, controversia o reclamación que surja con relación a este Contrato o a la violación del mismo, las partes se someten irrevocablemente a las leyes aplicables y a los tribunales competentes en la Ciudad de México, Distrito Federal, renunciando expresamente a cualquier otro fuero que pudiera corresponderles por razón de su domicilio presente o futuro, de los lugares señalados por ellas para el cumplimiento de sus obligaciones o por cualquier otra causa generadora de competencia territorial.
</p>
<p style="text-align: justify;">
Las partes, completamente conscientes de los alcances y efectos legales de este Contrato y de que en su celebración no ha habido lesión, dolo, violencia, error, ni algún otro vicio de la voluntad que pudiere afectar su existencia o validez, firman el presente Contrato por duplicado en la Ciudad de México, Distrito Federal el día __ del mes de ___ del año _____.
</p>
--}}
<br>
<center>

<table >
<tbody>
  <tr>
   <td colspan="3"><center>LA PROVEEDORA</center>  </td>           <td colspan="3"><center>EL CLIENTE</center></td>
   </tr>
   <tr>
     <td colspan="3">
          <center>___________________________________<br>
          NOMBRE DEL REPRESENTANTE LEGAL<br>
          Representante Legal de<br>
          NOMBRE DE LA EMPRESA  </center>
    </td>
    <td colspan="3">
        <center> ______________________________<br>
        NOMBRE DEL REPRESENTANTE LEGAL<br>
        Representante Legal de<br>
        NOMBRE DE LA EMPRESA</center>

    </td>
   </tr>
</tbody>
</table>
</center>
<p>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<p style="text-align: center;">
<strong> ANEXO </strong>
</p>
<p style="text-align: right;">
No. _______________
</p>
<p style="text-align: justify;">
ANEXO A AL CONTRATO DE PRESTACION DE SERVICIOS DE ESTUDIOS SOCIOECONÓMICOS QUE CELEBRAN POR UNA PARTE LA EMPRESA ___________________, REPRESENTADA POR ______________________________ A QUIEN EN LO SUCESIVO SE LE DENOMINARA “LA PROVEEDORA” Y POR LA OTRA ___________________________________________________, REPRESENTADA POR _____________________________________________________ A QUIEN EN LO SUCESIVO SE LE DENOMINARA “EL CLIENTE”, DE ACUERDO CON LAS SIGUIENTES DECLARACIONES Y CLAUSULAS:
</p>
<p>
<center><strong>
D E C L A R A C I O N E S </strong>
</center>
</p>
<p style="text-align: justify;">
I.- Declaran las partes, que ratifican el contenido integral del contrato de prestación de servicios de tercerización de personal que tienen celebrado.
</p>
<p style="text-align: justify;">
II.- Continúan declarando que con el fin de establecer los lineamientos específicos bajo los cuales se desarrollará la relación comercial que les une, celebran el presente acuerdo, por lo que se sujetan a las siguientes:
</p>
<p>
<center><strong>
     C L A U S U L A S
</strong></center>
</p>
<p style="text-align: left;">
<strong>PRIMERA.- SERVICIOS</strong>
</p>
<p style="text-align: justify;">
Los servicios que son materia de la contratación, consisten en:<strong>Estudios Socioeconómicos.</strong>
</p>
<p style="text-align: justify;">
<strong>Para la debida prestación de los servicios que son materia del contrato, EL CLIENTE se compromete a:</strong>
</p>
<p style="text-align: justify;padding-left: 80px">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	Para el servicio de estudio socio económico enviar nombre completo de la persona a aplicar el estudio socioeconómico, teléfono personal, casa y/o trabajo donde poder localizar al candidato, domicilio y correo electrónico.
</p>
<p style="text-align: justify;padding-left: 80px">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>b)	Cubrir a LA PROVEEDORA el monto total</strong> de la factura generada por la prestación de los servicios dentro de los <strong>8 días siguientes a su recepción</strong>
</p>
<p style="text-align: left;">
<strong>Por su parte LA PROVEEDORA se compromete a:</strong>
</p>
<p style="text-align: justify;">
a)	Para el servicio de estudios socioeconómicos enviar por medio electrónico el informe final de 3 - 5 días hábiles una vez realizada la visita, en formato PDF.
</p>
<p style="text-align: justify;">
<strong>b) Entregar una factura cada quince días</strong>
</p>
<p>
<center><strong>
SEGUNDA.- PROCESO DE COMUNICACIÓN
</strong></center>
</p>
<p style="text-align: justify;">
Para el oportuno y debido cumplimiento de los lineamientos a través de los cuales se desarrollara la relación comercial, EL CLIENTE y LA PROVEEDORA, determinan que las personas encargadas de llevar a cabo dicho proceso de comunicación serán:
</p>
<br>
<p style="text-align: left;">
EL CLIENTE
</p>
<p style="text-align: justify;">
_____________________ Teléfono ________________________________ Correo Electrónico: ____________________como responsable de la relación formal para la operación de este proyecto.
</p>
<p style="text-align: left;">
LA PROVEEDORA
</p>
<p style="text-align: justify;">
________________________ como ejecutivo de cuenta para proporcionar los servicios requeridos. Teléfono directo ________________, Correo Electrónico: ___________________________.
</p>
<p style="text-align: justify;">
En ese sentido, las partes ratifican que cualquier tipo de comunicación que se haya hecho utilizando las disposiciones anteriores, surtirá todos sus efectos y por tanto, no podrá alegarse desconocimiento o falta de notificación relacionada con los eventos, acciones o actos que hubieran sido informados o comunicados.
</p>
<p>
<center><strong>
TERCERA.- HONORARIOS Y GASTOS
</strong></center>
</p>
<p style="text-align: justify;">
EL CLIENTE y LA PROVEEDORA, están de acuerdo que los honorarios aplicables por la prestación de los servicios que son materia del contrato, serán los siguientes:
</p>
<p style="text-align: justify;">
<strong>a)	Para el servicio de Estudios Socioeconómicos serán de $550.00</strong> (Quinientos Cincuenta Pesos 00/100 M.N.) por estudio realizado más I.V.A. 
</p>
<p style="text-align: justify;"><p style="text-align: justify;">
b)	Para el caso de que el domicilio del candidato sea de difícil acceso se agregará el costo de viáticos previa autorización por parte de EL CLIENTE.
</p>
<p style="text-align: justify;">
c)	Los estudios aplicados en el Estado de México tendrán un costo de <strong>$600.00</strong> más I.V.A.
</p>
<p style="text-align: justify;">
d)	El Costo de estudios urgentes, requeridos en menos de 3 días, tendrán un costo de <strong>$700.00</strong> más I.V.A.
</p>
<p style="text-align: justify;">
e)	Para el servicio de estudios socioeconómicos una vez que haya iniciado un proceso de estudio, si EL CLIENTE, <strong>suspende o cancela el servicio</strong>, tendrá la obligación de cubrir a LA PROVEEDORA, la cantidad de <strong>$150.00</strong> como gasto administrativo ya generado <strong>siempre y cuando ya se haya realizado la visita.</strong>
</p>
<p style="text-align: justify;">
Por lo anterior, cualquier modificación sobre los servicios que deban prestarse o bien, el monto de los honorarios, deberá acordarse por escrito, ya que sin ese requisito no tendrá obligación la parte que corresponda de atender las sugerencias o solicitudes que sobre los puntos anteriores puedan emitirse.
</p>
<p style="text-align: justify;">
De manera especial, las partes acuerdan que en el supuesto de que EL CLIENTE no cubriera las cantidades derivadas de la prestación de los servicios en la forma y términos convenidos a LA PROVEEDORA, dicho cliente se obliga a pagar el 3 % de interés moratorio mensual, más los gastos que se generen con motivo de la cobranza  judicial o extra judicial que la proveedora deba cubrir hasta que el cliente cubra el monto total de la deuda más los intereses que se hubieran generado.
</p>
<p style="text-align: justify;">
Independientemente de lo anterior, LA PROVEEDORA podrá dar por terminado el contrato de servicios, sin que esa decisión pueda interferir, modificar o anular el proceso de cobranza indicado en el párrafo anterior.
</p>
<p>
<center><strong>
CUARTA.- INFORMACIÓN ESPECÍFICA
</strong>
<p style="text-align: left;">
Forma de facturación: __________________________________________
</p>
<p style="text-align: left;">
Información para transferencia bancaria
</p>
<p style="text-align: justify;">
Enteradas del contenido y alcance legal del presente documento, lo firman en la Ciudad de México, D.F. a los ___ días del mes de ______ de ____
</p>
<br>
<center>

<table >
<tbody>
  <tr>
   <td colspan="3"><center>LA PROVEEDORA </center>  </td>           <td colspan="3"><center>EL CLIENTE</center></td>
   </tr>
   <tr>
     <td colspan="3">
          <center>___________________________________<br>
          NOMBRE DEL REPRESENTANTE LEGAL<br>
          Representante Legal de<br>
          NOMBRE DE LA EMPRESA  </center>
    </td>
    <td colspan="3">
        <center> ______________________________<br>
        NOMBRE DEL REPRESENTANTE LEGAL<br>
        Representante Legal de<br>
        NOMBRE DE LA EMPRESA</center>

    </td>
   </tr>
</tbody>
</table>
</center>












</body>
</html>



@include("crm.cotizador.pdf_perzonalizado.plantillas.encabezado")

<style>
    .negritas{
        font-size: 13px;
        font-weight: bold;
    }

    .negritas2{
            font-size: 13px;
            font-weight: bold;
            color: #385b9a;
    }

    .listaNo li{
        font-size: 13px;
    }

    #pie2{
        position: absolute;
        margin-left: -727px;
        margin-top: 303px;
        width: 125%;
    }

    
    .firma{
        margin-top: 20px;
        width: 100%;
        text-align: center;
        position: absolute;
    }
</style>
<div style="page-break-after:always;">
    
<p style="text-align: right; margin-top: 10px;">CD. DEL CARMEN, CAMPECHE A {{ isset($cotizacion) ? strtoupper( $cotizacion->fecha_cotizacion->format('d M Y')) : \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        <p class="negritas" style="margin-bottom: 0;">AT’N.:</p>
        <p class="negritas" style="margin-top: 0;">@if(isset($cotizacion)) {{ $cotizacion->cliente->nombre_comercial }} @else &nbsp; @endif</p>
        <p class="negritas" style="text-align: right;">ASUNTO:</p>

        <p>&nbsp;</p>
        <p class="sangria">POR MEDIO DEL PRESENTE TENGO EL AGRADO DE ENVIARLE LA SIGUIENTE COTIZACIÓN: SERVICIO DE SOFTWARE ESPECIALIZADO ERP NOIL PARA MÓDULO DE ALMACÉN Y COMPRAS; IMPLEMENTACIÓN, CAPACITACIÓN, DESARROLLO PERSONALIZADO, CONSULTORÍAS Y SOPORTE TÉCNICO.  </p>
        <p class="sangria">TOMAMOS MUY EN CUENTA LA IMPORTANCIA DE NUESTROS PRODUCTOS Y SERVICIOS, ASÍ COMO EL COSTO-BENEFICIO QUE REPRESENTA PARA SU EMPRESA, POR LO CUAL DE ANTE MANO OFRECEMOS UN COMPROMISO TOTAL EN EL DESEMPEÑO DE NUESTROS TRABAJOS, ENFOCANDO LOS RECURSOS NECESARIOS PARA LOGRAR EL ÉXITO DEL PROYECTO.</p>
        
 
        <p style="margin: 0;">&nbsp;</p>
       <p class="negritas">DETALLE DE COTIZACIÓN SOFTWARE NOIL </p>

       @include("crm.cotizador.pdf_perzonalizado.plantillas.tabla_productos");
</div>

<div style="page-break-after:always;">
<p class="negritas">ESPECIFICACIONES COMERCIALES:</p>

<p class="negritas2">IMPLEMENTACIÓN DE MÓDULOS</p>
<p>LA ADAPTACIÓN DE FORMATOS INICIAL Y SU IMPLEMENTACIÓN SERÁN REALIZADOS EN UN PLAZO DE 15 DÍAS. A PATIR DE LOS 30 DÍAS, SE DA INICIO AL SERVICIO MENSUAL DE SOPORTE Y MANTENIMIENTO.</p>
<p class="negritas2">SERVICIO MENSUAL DE SOPORTE Y MANTENIMIENTO</p>
<p class="negritas">RECURSOS DE PERSONAL CONSIDERADOS:</p>
<p class="negritas">•	INGENIERO DE SOPORTE</p>
<p>SE ENCARGARÁ DE EJECUTAR ACTIVIDES DE SOPORTE Y ASISTENCIA PERSONALIZADA, CAPACITACIONES, IMPLEMENTACIÓN DE MEJORAS, ATENCIÓN A DUDAS Y PROGRAMACION DE REUNIONES PROGRAMADAS CON EL ÁREA DE DESARROLLO PARA AJUTES PERSONALIZADOS. ADEMAS DE MANTENIMIENTO DE BASE DE DATOS, COPIAS DE SEGURIDAD, CONFIGURACIÓN DE NUEVOS EQUIPOS.</p>
<p class="negritas">•	DESARROLLADOR DE SOFTWARE</p>
<p>PARA LAS ADAPTACIONES PERSONALIZADAS AL SOFTWARE, COORDINADOS CON INGENIERO DE SOPORTE.</p>
<p>UNA VEZ INICIADA LA IMPLEMENTACIÓN DE MÓDULOS SE REALIZARÁ CONTRATO DE SERVICIO.</p>
<p>SE INCLUYE ESPACIO EN LA NUBE PARA ALMACENAMIENTO DE BASE DE DATOS, Y DOCUMENTOS REQUERIDOS PARA CONSULTAS DESDE LA PLATAFORMA WEB SSPA Y NUEVOS ENLACES SOLICITADOS.</p>
<p>SE CREARÁ UNA FACTURA MENSUAL DE FORMA AUTOMÁTICA POR LOS SERVICIOS DE SOPORTE Y MANTENIMIETO PARA EL CLIENTE, A LA DENOMINACIÓN SOCIAL INDICADA.</p>
<p>LA FACTURA DEBERÁ SER PAGADA EN UN PLAZO DE 10 DÍAS O EN LOS PLAZOS PACTADOS CON EL ÁREA DE COMPRAS.</p>
<p>SE APLICA GARANTÍA EN CALIDAD DEL SERVICIO Y PRECIOS DURANTE EL TIEMPO DE CONTRATACIÓN DE ESTOS, COMO MÍNIMO EN LOS PRÓXIMOS 24 MESES. 
<p>PARA CUALQUIER ACLARACIÓN O DUDA DE LA PRESENTE COTIZACIÓN ESTOY A SUS ÓRDENES PARA AMPLIAR Y/O MEJORAR LOS SERVICIOS INCLUIDOS.
<p>SIN MAS POR EL MOMENTO ME DESPIDO DE UD. AGRADECIENDO DE ANTEMANO LA ATENCIÓN PRESTADA A UNA SERVIDORA.</p>
<p>PRECIOS COTIZADOS EN MONEDA NACIONAL</p>
<p class="negritas">ESTA COTIZACION TIENE VIGENCIA DE 30 DIAS</p>

<table class="firma">
        <tr>
            <td>&nbsp;</td>
            <td>ATENTAMENTE</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="border:none">&nbsp;</td>
            <td style="border-top: solid 1px; width: 250px;">RESPONSABLE DE ÁREA COMERCIAL</td>
            <td style="border:none">&nbsp;</td>
        </tr>
        
</table>

</div>
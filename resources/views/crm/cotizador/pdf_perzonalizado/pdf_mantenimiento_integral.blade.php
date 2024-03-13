@include("crm.cotizador.pdf_perzonalizado.plantillas.encabezado")

<div style="page-break-after:always;">
    
        <p>{{ isset($cotizacion) ? $cotizacion->fecha_cotizacion->format('d-m-Y') : \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        <p>AT’N.:</p>
        <p>@if(isset($cotizacion)) {{ $cotizacion->cliente->nombre_comercial }} @else &nbsp; @endif</p>
        <p>ASUNTO: </p>
        <p class="sangria">POR MEDIO DEL PRESENTE TENGO EL AGRADO DE ENVIARLE LA SIGUIENTE COTIZACIÓN: SERVICIO DE SOFTWARE ESPECIALIZADO ERP NOIL PARA MÓDULO DE ALMACÉN Y COMPRAS; IMPLEMENTACIÓN, CAPACITACIÓN, DESARROLLO PERSONALIZADO, CONSULTORÍAS Y SOPORTE TÉCNICO.  </p>
        <p class="sangria">TOMAMOS MUY EN CUENTA LA IMPORTANCIA DE NUESTROS PRODUCTOS Y SERVICIOS, ASÍ COMO EL COSTO-BENEFICIO QUE REPRESENTA PARA SU EMPRESA, POR LO CUAL DE ANTE MANO OFRECEMOS UN COMPROMISO TOTAL EN EL DESEMPEÑO DE NUESTROS TRABAJOS, ENFOCANDO LOS RECURSOS NECESARIOS PARA LOGRAR EL ÉXITO DEL PROYECTO.</p>
        <p>SERVICIO MENSUAL</p>
 
       <p>DETALLE DE COTIZACIÓN SOFTWARE NOIL </p>
</div>
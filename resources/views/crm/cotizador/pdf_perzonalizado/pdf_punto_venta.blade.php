@include("crm.cotizador.pdf_perzonalizado.plantillas.encabezado")

<div style="page-break-after:always;">
    
        <p>{{ isset($cotizacion) ? $cotizacion->fecha_cotizacion->format('d-m-Y') : \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        <p>AT’N.:</p>
        <p>@if(isset($cotizacion)) {{ $cotizacion->cliente->nombre_comercial }} @else &nbsp; @endif</p>
        <p>POR MEDIO DEL PRESENTE TENGO EL AGRADO DE ENVIARLE LA SIGUIENTE COTIZACIÓN: </p>
        <ul>
            <li>PUNTO DE VENTA SOFTWARE ERP NOIL</li>
            <li>ACCESORIOS</li>
        </ul>
        
        <p>DETALLE DE COTIZACIÓN</p>


        
        @include("crm.cotizador.pdf_perzonalizado.plantillas.tabla_productos");
</div>



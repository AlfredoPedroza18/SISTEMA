@include("crm.cotizador.pdf_perzonalizado.plantillas.encabezado")

<style>
    
    #pie4{
        position: absolute;
        margin-top: 882px;
        margin-left: -75px;
        width: 800px;
    }
    .negritas{
            font-size: 13px;
            font-weight: bold;
        }

    .listaNo li{
            font-size: 13px;
    }
    
    .sangria{
        text-indent: 40px;
    }

    #logo{
        width: 22cm;
        height: 3cm;
    }

    .negritas2{
            font-size: 13px;
            font-weight: bold;
            color: #385b9a;
    }

    .firma{
        margin-top: 40px;
        width: 100%;
        text-align: center;
        position: absolute;
    }
    
    p{
        font-size: 12px;
    }
</style>

<div style="page-break-after:always;">
        
        <p style="text-align: right; margin-top: 10px;">CD. DEL CARMEN, CAMPECHE A {{ isset($cotizacion) ? strtoupper( $cotizacion->fecha_cotizacion->format('d M Y')) : \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        <p class="negritas" style="margin-bottom: 0;">AT’N.:</p>
        <p class="negritas" style="margin-top: 0;">@if(isset($cotizacion)) {{ $cotizacion->cliente->nombre_comercial }} @else &nbsp; @endif</p>
        <p class="negritas" style="text-align: right;">ASUNTO:</p>

        <p style="text-align: center;">POR MEDIO DEL PRESENTE TENGO EL AGRADO DE ENVIARLE LA SIGUIENTE COTIZACIÓN:</p>

        <p>TOMAMOS MUY EN CUENTA LA IMPORTANCIA DE NUESTROS PRODUCTOS Y SERVICIOS, ASÍ COMO EL COSTO-BENEFICIO QUE REPRESENTA PARA SU EMPRESA, POR LO CUAL DE ANTE MANO OFRECEMOS UN COMPROMISO TOTAL EN EL DESEMPEÑO DE NUESTROS TRABAJOS, ENFOCANDO LOS RECURSOS NECESARIOS PARA LOGRAR EL ÉXITO DEL PROYECTO.</p>
        <p>&nbsp;</p>
        @include("crm.cotizador.pdf_perzonalizado.plantillas.tabla_productos");

        <p class="negritas" style="text-decoration: underline;">ESPECIFICACIONES COMERCIALES:</p>

        <p class="negritas2" >ACCESORIOS</p>
        <p>•	DISPONIBILIDAD VARIABLE EN CUALQUIER MOMENTO.</p>
        <p>•	EN CASO DE CANCELACIÓN SE REQUIERE UN 25% DEL VALOR DE LA PROPUESTA.</p>

        <p>PARA HACER LA COMPRA SE REQUIERE UN 50% DE ANTICIPO DEL TOTAL DE LA FACTURA, A PARTIR DE LA ACEPTACIÓN DE LA ORDEN DE COMPRA, EL SIGUIENTE PAGO SERÁ A LA ENTREGA DE LOS COMPONENTES.</p>
        <p>PRECIOS COTIZADOS EN MONEDA NACIONAL.</p>
        <p class="negritas">ESTA COTIZACION TIENE VIGENCIA DE 30 DIAS</p>
    

    <p class="sangria">SIN MAS POR EL MOMENTO ME DESPIDO DE UD. AGRADECIENDO DE ANTEMANO LA ATENCIÓN PRESTADA A UNA SERVIDORA</p>
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
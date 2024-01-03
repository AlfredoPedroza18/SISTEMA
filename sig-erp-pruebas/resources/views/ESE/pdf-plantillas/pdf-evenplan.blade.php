<?php
/*header('Content-Type:application/msword');
header('Content-Disposition: attachment;filename="Contrato de servicios ESE.doc"');
header('Pragma:no-cache');
header('Expires: 0');*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
    <!-- Latest compiled and minified CSS -->


    {!! Html::style('assets/css/pdf-formato-grid-print-evenplan.css',array('media' => 'print')) !!}
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="3" class="table-border alinear-izquierda letra-componente-evenplan">
                    <div class="divHeader">
                      <table style="width: 720px;">
                          <tr>
                             <td style="width: 40%;padding: 0" class="table-border">
                                 <div style="width: 250px">{!! Html::image('imagenes/evenplan2.png','',["class"=>"imagen-upload","style"=>"width;50px;height;50"]) !!}
                                 </div>
                             </td>
                             <td colspan="2" style="width: 60%;padding: 0" class="alinear-derecha letra-componente-evenplan table-border">Departamento de Recursos Humanos</td>
                          </tr>
                      </table>
                       
                    </div>
                    <div class="printDivContent">
                            &nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
                        </div>
                </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="3">
                    <div class="divFooter">
                    Luis Damian
                    </div>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td class="table-border alinear-derecha" style="width: 75%"></td>    
                <td colspan="2" class="table-border alinear-derecha" style="width: 25%;">                   
                    <table style="width:100%; float: right;">                        
                        <tr>
                            <td class="border-evenplan alinear-derecha letra-componente-evenplan" style="width: 20%;">
                                Fecha
                            </td>
                            <td class="border-evenplan alinear-derecha letra-componente-evenplan" style="width: 30%;">
                                {{ $estudio->dia_visita . ' - ' . $estudio->mes_visita . ' - ' . $estudio->anio_visita}}
                            </td>
                                
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border space">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="title-header-component-evenplan table-border alinear-centro">
                                Resumen Estudio Socioeconómico
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="table-border box-evenplan justificar">
                                <table class="auto-width">
                                    <tbody>
                                        <tr>
                                            <td class="border-evenplan box-evenplan alinear-izquierda letra-componente-evenplan " style="width: 20%">
                                                Nombre
                                            </td>
                                            <td class="border-evenplan box-evenplan alinear-izquierda letra-componente-evenplan  field-table-lg" style="width: 80%">
                                                {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-evenplan box-evenplan alinear-izquierda letra-componente-evenplan " style="width: 20%">
                                                Puesto Solicitado
                                            </td>
                                            <td class="border-evenplan box-evenplan alinear-izquierda letra-componente-evenplan  field-table-lg" style="width: 80%">
                                                {{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->puesto_solicitado : '' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="table-border box-evenplan justificar">
                                <table class="auto-width">
                                    <tbody>
                                        <tr>
                                            <td class="border-evenplan box-evenplan alinear-izquierda letra-componente-evenplan " style="width: 20%">
                                                Cliente:
                                            </td>
                                            <td class="border-evenplan box-evenplan alinear-izquierda letra-componente-evenplan  field-table-lg" style="width: 80%">
                                                {{ isset( $estudio->cliente ) ? $estudio->cliente->nombre_comercial : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-evenplan box-evenplan alinear-izquierda letra-componente-evenplan " style="width: 20%">
                                                En atención a:
                                            </td>
                                            <td class="border-evenplan box-evenplan alinear-izquierda letra-componente-evenplan  field-table-lg" style="width: 80%">
                                                {{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->atencion_a : '' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">                   
                    <table class="auto-width">
                        <tbody>
                            <tr>
                                <td rowspan="3" class="grafica-evenplan table-border">

                                    <div style="width: 350px;position: relative;" >   
                                        @if( $estudio->formatoEvenplan )

                                            @if( $estudio->formatoEvenplan->resumen->path_grafica != '' )
                                                 {{ Html::image($estudio->formatoEvenplan->resumen->path_grafica . '/' . $estudio->formatoEvenplan->resumen->grafica,'',['style' => 'width:100%;']) }}

                                            @else
                                                {!! Html::image('imagenes/evenplan2.png','',["class"=>"imagen-upload-vivienda"]) !!} 

                                            @endif
                                        @else
                                                {!! Html::image('imagenes/evenplan2.png','',["class"=>"imagen-upload-vivienda"]) !!} 

                                        @endif
                                    </div>                                
                                </td>
                                <td class="table-border table-evenplan-grafica">
                                    <table style="margin-left: 30px;margin-right: 10px;width: 80%;">
                                        <tr>

                                            <td colspan="2" class="alinear-centro header-table-grafica">
                                                Escala de calificación
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="letra-table-grafica box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 30%;">
                                                Excelente                       
                                            </td>
                                            <td class="letra-table-grafica box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 30%;">
                                                5
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="letra-table-grafica box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 30%;">
                                                Bueno                       
                                            </td>
                                            <td class="letra-table-grafica box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 30%;">
                                                4
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="letra-table-grafica box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 30%;">
                                                Regular                     
                                            </td>
                                            <td class="letra-table-grafica box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 30%;">
                                                3
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="letra-table-grafica box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 30%;">
                                                Malo                        
                                            </td>
                                            <td class="letra-table-grafica box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 30%;">
                                                2
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="letra-table-grafica box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 30%;">
                                                Muy Malo             
                                            </td>
                                            <td class="letra-table-grafica box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 30%;">
                                                1
                                            </td>
                                        </tr>
                                    </table>
                                </td>                                
                            </tr>
                            
                        </tbody>
                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    <table class="auto-width">
                        <tbody>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro"
                                    @if( $estudio->formatoEvenplan )
                                        @if( $estudio->formatoEvenplan->resumen->resultado == '1' )
                                            style="width: 33.33%;background-color:#2E64FE;color:white;"
                                        @else
                                            style="width: 33.33%;"
                                        @endif
                                    @endif
                                >Recomendable</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro"
                                    @if( $estudio->formatoEvenplan )
                                        @if( $estudio->formatoEvenplan->resumen->resultado == '2' )
                                            style="width: 33.33%;background-color:#2E64FE;color:white;"
                                        @else
                                            style="width: 33.33%;"
                                        @endif
                                    @endif
                                >Recomendable con reservas</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro"
                                    @if( $estudio->formatoEvenplan )
                                        @if( $estudio->formatoEvenplan->resumen->resultado == '3' )
                                            style="width: 33.33%;background-color:#2E64FE;color:white;"
                                        @else
                                            style="width: 33.33%;"
                                        @endif
                                    @endif
                                >No Recomendable</td> 
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="box-evenplan border-evenplan title-component-evenplan  table-border alinear-centro">
                                Observaciones
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="table-border justificar">
                                <table class="auto-width">
                                    <tbody>                                        
                                        <tr>
                                            <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Personal
                                            </td>
                                            <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 85%">
                                            	{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_personal : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Familiar
                                            </td>
                                            <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 85%">
                                            	{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_familiar : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Escolar
                                            </td>
                                            <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 85%">
                                            	{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_escolar : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Económico
                                            </td>
                                            <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 85%">
                                            	{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_economico : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Laboral
                                            </td>
                                            <td class="border-evenplan td-md-evenplan box-jll letra-componente-evenplan  justificar" style="width: 85%">
                                            	{{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_laboral : '' }}
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="box-evenplan border-evenplan title-component-evenplan  table-border alinear-centro">
                                Observaciones Finales
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="table-border justificar">
                                <table class="auto-width">
                                    <tbody>
                                        <tr>
                                            <td class="box-evenplan border-evenplan justificar letra-componente-evenplan ">
                                                {{ isset( $estudio->formatoEvenplan->resumen ) ? $estudio->formatoEvenplan->resumen->observaciones_finales : '' }}
                                            </td>                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="title-header-component-evenplan table-border alinear-centro">
                                Datos Personales
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="table-border box-evenplan justificar">
                                <table class="auto-width">
                                    <tbody>
                                        <tr>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Nombre completo
                                            </td>
                                            <td colspan="5" class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan  field-table-lg negrita" style="width: 85%">
                                                {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Calle
                                            </td>
                                            <td colspan="3" class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan  field-table-lg" style="width: 50%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->calle : '' }}
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                C.P.
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 35%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->cp : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Colonia
                                            </td>
                                            <td colspan="2" class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan  field-table-lg" style="width: 50%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->colonia : '' }}
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Cd. de Residencia
                                            </td>
                                            <td colspan="2" class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 20%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->cd_residencia : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Tel. Celular
                                            </td>
                                            <td colspan="2" class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan  field-table-lg" style="width: 40%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->celular : '' }}
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Tel. Local
                                            </td>
                                            <td colspan="2" class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 30%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->telefono_local : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Correo Electrónico
                                            </td>
                                            <td colspan="5" colspan="3" class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan  field-table-lg" style="width: 85%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->email : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Fecha de Nac.
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 20%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->fecha_nacimiento : '' }}
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Lugar de Nac.
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->lugar_nacimiento : '' }}
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Edad
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 20%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->edad : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Estado Civil
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 20%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->edo_civil : '' }}
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Fecha de Matrimonio
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 20%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->fecha_matrimonio : '' }}
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                Hijos
                                            </td>
                                            <td class="border-evenplan box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->hijos : '' }}
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="title-header-component-evenplan table-border alinear-centro">
                                Escolaridad
                            </td>
                        </tr>                        
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <thead>
                            <tr>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro negrita" style="width: 33%">
                                    Nivel Escolar
                                </td>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro negrita" style="width: 33%">
                                    Institución
                                </td>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro negrita" style="width: 33%">
                                    Certificado
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                        @if( $estudio->formatoEvenplan )
                            @foreach( $estudio->formatoEvenplan->escolaridad as  $column )
                                <tr>                                    
                                    <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33%">
                                        {{ $column->nivel_escolar }}
                                    </td>
                                    <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33%">
                                        {{ $column->institucion }}
                                    </td>
                                    <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33%">
                                        {{ $column->certificado }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>                                
                    </table>
                </td>
            </tr>                            
            <tr>
                 <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 20%">
                                    ¿Estudia Actualmente?
                                </td>
                                <td class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 30%">
                                    {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridadDetalle->estudia_actualmente : '' }}
                                </td>
                                <td class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 10%">
                                    ¿Donde?
                                </td>                                            
                                <td class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 40%">
                                    {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridadDetalle->donde : '' }}
                                </td>                                            
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                    ¿En que horario?
                                </td>
                                <td colspan="3" class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 85%">
                                    {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->escolaridadDetalle->horario : '' }}
                                </td>
                            </tr>
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="table-title-component-evenplan table-border alinear-centro">
                                Idiomas
                            </td>
                        </tr>                        
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <thead>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan negrita alinear-centro" style="width: 33.33%">
                                    Idioma
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan negrita alinear-centro" style="width: 33.33%">
                                    Porcentaje
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan negrita alinear-centro" style="width: 33.33%">
                                    Certificación
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                        	@if($estudio->formatoEvenplan)
                				@foreach( $estudio->formatoEvenplan->idiomas as $index => $idioma )                            
	                                <tr>	                                    
                                        <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                        	{{ $idioma->idioma }}
                                        </td>
                                        <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                        	{{ $idioma->porcentaje }}
                                        </td>
                                        <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
											{{ $idioma->certificacion }}	                                        	
                                        </td>
	                                </tr>
	                            @endforeach
	                        @endif
                            {{--
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar">Ingles</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar">70%</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar">TOEFL</td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>--}}
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="title-header-component-evenplan table-border alinear-centro">
                                Constitución Familiar
                            </td>
                        </tr>                        
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <thead>
                            <tr>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan alinear-centro" style="width: 25%">
                                    Parentesco
                                </td>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan alinear-centro" style="width: 25%">
                                    Nombre
                                </td>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan alinear-centro" style="width: 25%">
                                    Edad
                                </td>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan alinear-centro" style="width: 25%">
                                    Ocupación
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                             @if( $estudio->formatoEvenplan )
				                @foreach( $estudio->formatoEvenplan->parentesco as $index => $familiar )
				                	<tr>
				                		<td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 25%">
                                            {{ $familiar->parentesco }}
                                        </td>
                                        <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 25%">
                                            {{ $familiar->nombre }}
                                        </td>
                                        <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 25%">
                                            {{ $familiar->edad }}
                                        </td>
                                        <td class="td-md-evenplan box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 25%">
                                            {{ $familiar->ocupacion }}
                                        </td>
				                	</tr>
				                @endforeach
				            @endif
                            {{--
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>--}}
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="title-header-component-evenplan table-border alinear-centro">
                                Documentación
                            </td>
                        </tr>                        
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <thead>
                            <tr>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro" style="width: 33.33%">
                                    Concepto
                                </td>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro" style="width: 33.33%">
                                    Número de Folio
                                </td>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro" style="width: 33.33%">
                                    Descripción
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 33.33%">
                                    Acta de Nacimiento                                                  
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->acta_nacimiento_no : '' }}
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->acta_nacimiento_descripcion : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 33.33%">
                                    Acta de Matrimonio
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->acta_matrimonio_no : '' }}
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->acta_matrimonio_descripcion : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 33.33%">
                                    Comprobante de Domicilio
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->comprobante_domicilio_no : '' }}
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->comprobante_domicilio_descripcion : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 33.33%">
                                    Comprobante de Estudios
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->comprobante_estudios_no : '' }}
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->comprobante_estudios_descripcion : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 33.33%">
                                    Identificación
                                </td>
                                <td class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->identificacion_no : '' }}
                                </td>
                                <td class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->identificacion_descripcion : '' }}
                                </td>                                            
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 33.33%">
                                    CURP
                                </td>
                                <td class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->curp_no : '' }}
                                </td>
                                <td class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->curp_descripcion : '' }}
                                </td>                                            
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 33.33%">
                                    NSS
                                </td>
                                <td class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->nss_no : '' }}
                                </td>
                                <td class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->nss_descripcion : '' }}
                                </td>                                
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 33.33%">
                                    RFC
                                </td>
                                <td class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->rfc_no : '' }}
                                </td>
                                <td class="border-evenplan box-jll letra-componente-evenplan  alinear-izquierda" style="width: 33.33%">
                                	{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->documentacion->rfc_descripcion : '' }}
                                </td>                                
                            </tr>
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="title-header-component-evenplan table-border alinear-centro">
                                Referencias Económicas
                            </td>
                        </tr>                        
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <thead>
                            <tr>
                                <td colspan="6" class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro">
                                    Tipo de Zona y Vivienda
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-centro letra-componente-evenplan " style="width: 15%">
                                    La vivienda es:                                                  
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro"
                                    @if( $estudio->formatoEvenplan )
                                        @if( $estudio->formatoEvenplan->referenciasEconomicas->vivienda == '1' )
                                            style="width: 15%;background:#2E64FE;color:white;"
                                        @else
                                            style="width: 15%"
                                        @endif
                                    @endif
                                >Propia
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro"
                                    @if( $estudio->formatoEvenplan )
                                        @if( $estudio->formatoEvenplan->referenciasEconomicas->vivienda == '2' )
                                            style="width: 15%;background:#2E64FE;color:white;"
                                        @else
                                            style="width: 15%;"
                                        @endif
                                    @endif
                                >Rentada
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro"
                                    @if( $estudio->formatoEvenplan )
                                        @if( $estudio->formatoEvenplan->referenciasEconomicas->vivienda == '3' )
                                            style="width: 15%;background:#2E64FE;color:white;"
                                        @else
                                            style="width: 15%;"
                                        @endif
                                    @endif
                                >Prestada
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" 
                                    @if( $estudio->formatoEvenplan )
                                        @if( $estudio->formatoEvenplan->referenciasEconomicas->vivienda == '4' )
                                            style="width: 15%;background:#2E64FE;color:white;"
                                        @else
                                            style="width: 15%;"
                                        @endif
                                    @endif

                                >Otra
                                    
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro">
                                    @if( $estudio->formatoEvenplan )
                                        @if( $estudio->formatoEvenplan->referenciasEconomicas->vivienda == '4' )
                                            {{ $estudio->formatoEvenplan->referenciasEconomicas->otra_vivienda }}
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan ">
                                    ¿Cuenta con todo los servicios?
                                </td>
                                <td colspan="4" class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda">
                                    {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->cuenta_con_servicios : '' }}
                                </td>                                
                            </tr>                            
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <thead>
                            <tr>
                                <td colspan="5" class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro">
                                    Tipo de Casa Habitación
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" 
                                    @if( $estudio->formatoEvenplan )
                                        @if( $estudio->formatoEvenplan->referenciasEconomicas->tipo_casa == '1' )
                                            style="width: 20%;background-color:#2E64FE;color:white;"
                                        @else
                                            style="width: 20%;"
                                        @endif
                                    @endif
                                >Casa
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro"
                                    @if( $estudio->formatoEvenplan )
	                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->tipo_casa == '2' )
	                                        style="width: 20%;background-color:#2E64FE;color:white;"
                                        @else
                                            style="width: 20%;"
	                                    @endif
	                                @endif
                                >Departamento
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro"
                                    @if( $estudio->formatoEvenplan )
                                        @if( $estudio->formatoEvenplan->referenciasEconomicas->tipo_casa == '3' )
                                           style="width: 20%;background-color:#2E64FE;color:white;"
                                        @else
                                            style="width: 20%;"
                                        @endif
                                    @endif
                                >Condominio
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro"
                                    @if( $estudio->formatoEvenplan )
	                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->tipo_casa == '4' )
	                                       style="width: 20%;background-color:#2E64FE;color:white;"
                                        @else
                                            style="width: 20%;"
	                                    @endif
	                                @endif
                                >U. Habitacional
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro"
                                    @if( $estudio->formatoEvenplan )
	                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->tipo_casa == '5' )
	                                        style="width: 20%;background-color:#2E64FE;color:white;"
                                        @else
                                            style="width: 20%;"
	                                    @endif
	                                @endif
                                >Vivienda Popular
                                </td>
                            </tr>                            
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <thead>
                            <tr>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro" style="width: 33.33%">
                                    Mobiliario
                                </td>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro" style="width: 33.33%">
                                    Limpieza
                                </td>
                                <td class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro" style="width: 33.33%">
                                    Orden
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 33.33%">
                                    {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->mobiliario : '' }}
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 33.33%">
                                    {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->limpieza : '' }}
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 33.33%">
                                    {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->orden : '' }}
                                </td>                                
                            </tr>                            
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <thead>
                            <tr>
                                <td colspan="6" class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro">
                                    Referencia Patrimonial
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                	¿Cuenta con automóvil propio?
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 5%">
                                    @if( $estudio->formatoEvenplan )
	                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->automovil_propio == '1' )
	                                        SI
	                                    @else
	                                    	NO
	                                    @endif
	                                @endif 
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 10%">Marca</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda">
                                   {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->marca_auto : '' }}  
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 15%">Año</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 25%">
                                    {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->anio : '' }} 
                                </td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                    Bienes raíces
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 5%">
                                    @if( $estudio->formatoEvenplan )
	                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->bienes_raices == '1' )
	                                        Si
	                                    @else
	                                    	No
	                                    @endif
	                                @endif
                                </td>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                    Ubicación
                                </td>
                                <td colspan="3" class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 65%">
                                    {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->ubicacion_bienes_raices : '' }}
                                </td>                                
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                    Tarjetas de crédito/departamentales
                                </td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 5%">
                                    @if( $estudio->formatoEvenplan )
	                                    @if( $estudio->formatoEvenplan->referenciasEconomicas->tdc == '1' )
	                                        Si
	                                    @else
	                                    	No
	                                    @endif
	                                @endif
                                </td>
                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 15%">
                                    Institución
                                </td>
                                <td colspan="3" class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 65%">
                                    {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->referenciasEconomicas->tdc_institucion : '' }}
                                </td>                                
                            </tr>                            
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <thead>
                            <tr>
                                <td colspan="6" class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro">
                                    Gastos Mensuales
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="box-evenplan table-border alinear-centro " style="width: 50%;">
                                    <table class="auto-width">
                                        <thead>
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro" style="width: 50%">
                                                    Egresos
                                                </td>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro" style="width: 50%">
                                                    Monto
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  justificar" style="width: 50%">Alimentación:</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                	${{ isset( $estudio->formatoEvenplan ) ? number_format(floatval($estudio->formatoEvenplan->gastosMensuales->e_alimentacion),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  justificar" style="width: 50%">Renta:</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                	${{ isset( $estudio->formatoEvenplan ) ? number_format(floatval($estudio->formatoEvenplan->gastosMensuales->e_renta),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  justificar" style="width: 50%">Servicios:</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                	${{ isset( $estudio->formatoEvenplan ) ? number_format(floatval($estudio->formatoEvenplan->gastosMensuales->e_servicios),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  justificar" style="width: 50%">Transportes:</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                	${{ isset( $estudio->formatoEvenplan ) ? number_format(floatval($estudio->formatoEvenplan->gastosMensuales->e_transportes),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  justificar" style="width: 50%">Escolares:</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                	${{ isset( $estudio->formatoEvenplan ) ? number_format(floatval($estudio->formatoEvenplan->gastosMensuales->e_escolares),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  justificar" style="width: 50%">Ropa y calzado:</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                	${{ isset( $estudio->formatoEvenplan ) ? number_format(floatval($estudio->formatoEvenplan->gastosMensuales->e_ropa_calzado),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  justificar" style="width: 50%">Servicio doméstico:</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                	${{ isset( $estudio->formatoEvenplan ) ? number_format(floatval($estudio->formatoEvenplan->gastosMensuales->e_servicio_domestico),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  justificar" style="width: 50%">Créditos:</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                	${{ isset( $estudio->formatoEvenplan ) ? number_format(floatval($estudio->formatoEvenplan->gastosMensuales->e_creditos),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  justificar" style="width: 50%">Diversiones:</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                	${{ isset( $estudio->formatoEvenplan ) ? number_format(floatval($estudio->formatoEvenplan->gastosMensuales->e_diversiones),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  justificar" style="width: 50%">Otros</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                	${{ isset( $estudio->formatoEvenplan ) ? number_format(floatval($estudio->formatoEvenplan->gastosMensuales->e_otros),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  justificar" style="width: 50%">Total egresos:</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                	${{ isset( $estudio->formatoEvenplan ) ? number_format(floatval($estudio->formatoEvenplan->gastosMensuales->e_total),2) : '' }}
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td colspan="2" class="box-evenplan table-border letra-componente-evenplan  justificar" style="height: 30px;">
                                                </td>                                                
                                            </tr>                                    

                                        </tbody>                                
                                    </table>
                                </td>
                                <td colspan="3" class="box-evenplan table-border alinear-centro" style="width: 50%;">
                                    <table class="auto-width">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" rowspan="8" class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro">
                                                    Cuando los egresos son mayores a los ingresos, ¿cómo los solventas?
                                                </td>                                                
                                            </tr>
                                            <tr>
                                                
                                                
                                            </tr>
                                            <tr>
                                                
                                                
                                            </tr>
                                            <tr>
                                                
                                                
                                            </tr>
                                            <tr>
                                                
                                                
                                            </tr>
                                            <tr>
                                                
                                                
                                            </tr>
                                            <tr>
                                                
                                                
                                            </tr>
                                            <tr>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td colspan="2" rowspan="6" class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="height: 128px;">
                                                    {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->observaciones : '' }}
                                                </td>                                                
                                            </tr>
                                            <tr>
                                                
                                            </tr>
                                            <tr>
                                                
                                            </tr>
                                            <tr>
                                                
                                            </tr>
                                            <tr>
                                                
                                            </tr>
                                            <tr>
                                                
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  table-title-component-evenplan alinear-centro" style="width: 50%">Ingresos</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  table-title-component-evenplan alinear-centro" style="width: 50%">Monto</td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 50%">
                                                	Candidato
                                                </td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                ${{ isset( $estudio->formatoEvenplan ) ? number_format( floatval($estudio->formatoEvenplan->gastosMensuales->i_ingreso0),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 50%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->i_ingreso1_concepto : '' }}
                                                </td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                ${{ isset( $estudio->formatoEvenplan ) ? number_format( floatval($estudio->formatoEvenplan->gastosMensuales->i_ingreso1),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 50%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->i_ingreso2_concepto : '' }}
                                                </td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                ${{ isset( $estudio->formatoEvenplan ) ? number_format( floatval($estudio->formatoEvenplan->gastosMensuales->i_ingreso2),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 50%">
                                                {{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->gastosMensuales->i_ingreso3_concepto : '' }}
                                                </td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                ${{ isset( $estudio->formatoEvenplan ) ? number_format( floatval($estudio->formatoEvenplan->gastosMensuales->i_ingreso3),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  table-title-component-evenplan justificar" style="width: 50%">Total de ingresos</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                $ {{ isset( $estudio->formatoEvenplan ) ? number_format( floatval($estudio->formatoEvenplan->gastosMensuales->i_total),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  table-title-component-evenplan justificar" style="width: 50%">Total diferencia</td>
                                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 50%">
                                                ${{ isset( $estudio->formatoEvenplan ) ? number_format( floatval($estudio->formatoEvenplan->gastosMensuales->total_diferencia),2) : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="box-evenplan table-border letra-componente-evenplan  justificar" style="height: 8px;">
                                                </td>                                                
                                            </tr> 
                                        </tbody>                                
                                    </table>
                                </td>                                
                            </tr>                            
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="title-header-component-evenplan table-border alinear-centro">
                                Referencias Laborales
                            </td>
                        </tr>                        
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>           
            @if( $estudio->formatoEvenplan )
                @foreach( $estudio->formatoEvenplan->referenciaLaboral as $index => $referencia )
	            <tr>
	                <td colspan="3" class="space table-border">                   
	                    <table class="auto-width">
	                        <tbody>
	                            <tr>
	                                <td colspan="2" class="box-evenplan border-evenplan alinear-centro letra-componente-evenplan " style="width: 33.33%">Nombre de la empresa</td>
	                                <td colspan="2" class="box-evenplan border-evenplan alinear-centro letra-componente-evenplan " style="width: 33.33%">Jefe inmediato</td>
	                                <td colspan="2" class="box-evenplan border-evenplan alinear-centro letra-componente-evenplan " style="width: 33.33%">Puesto</td>
	                            </tr>
	                            <tr>
	                                <td colspan="2" class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 33.33%">{{ $referencia->nombre_empresa }}</td>
	                                <td colspan="2" class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 33.33%">{{ $referencia->jefe_inmediato }}</td>
	                                <td colspan="2" class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 33.33%">{{ $referencia->puesto }}</td>
	                            </tr>
	                            <tr>
	                                <td colspan="4" class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 50%">Domicilio</td>
	                                <td colspan="2" class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 50%">Teléfono</td>
	                            </tr>
	                            <tr>
	                                <td colspan="4" class="box-evenplan border-evenplan justificar letra-componente-evenplan " style="width: 50%">{{ $referencia->domicilio }}</td>
	                                <td colspan="2" class="box-evenplan border-evenplan justificar letra-componente-evenplan " style="width: 50%">{{ $referencia->telefono }}</td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 16%" >Fecha de ingreso</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 16%" >{{ $referencia->fecha_ingreso }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 16%" >Puesto Inicial</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 16%" >{{ $referencia->puesto_inicial }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 16%" >Salario Inicial</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 16%" >{{ $referencia->salario_inicial }}</td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 16%" >Fecha de egreso</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 16%" >{{ $referencia->fecha_egreso }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 16%" >Puesto Finicial</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 16%" >{{ $referencia->puesto_final }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha" style="width: 16%" >Salario Finicial</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 16%" >{{ $referencia->salario_final }}</td>
	                            </tr>
	                            <tr>
	                                <td colspan="2" class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 25%">
	                                    ¿Tuvo personal a su cargo?
	                                </td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 25%">{{ $referencia->tuvo_personal == '1' ? 'Si' : 'No'  }}</td>
	                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 25%">
	                                    ¿Cotizó al IMSS?
	                                </td>
	                                <td colspan="2" class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 25%">{{ $referencia->cotizo_imss == '1' ? 'Si' : 'No'  }}</td>
	                            </tr>
	                            <tr>
	                                <td colspan="2" class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 25%">
	                                    Motivo de separación
	                                </td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 25%">{{ $referencia->motivo_separacion }}</td>
	                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 25%">
	                                    Causa
	                                </td>
	                                <td colspan="2" class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 25%">{{ $referencia->causa }}</td>
	                            </tr>
	                            <tr>
	                                <td colspan="2" class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 25%">
	                                    ¿Lo considera una persona recomendable?
	                                </td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 25%">{{ $referencia->pesona_recomendable }}</td>
	                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 25%">
	                                    ¿Lo volverían a contratar?
	                                </td>
	                                <td colspan="2" class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 25%">{{ $referencia->volverian_contratar }}</td>
	                            </tr> 
	                            <tr>
	                                <td colspan="2" class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 25%">
	                                    Persona que da la referencia
	                                </td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 25%">{{ $referencia->da_referencia }}</td>
	                                <td class="box-evenplan border-evenplan alinear-izquierda letra-componente-evenplan " style="width: 25%">
	                                    Puesto
	                                </td>
	                                <td colspan="2" class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 25%">{{ $referencia->da_referencia_puesto }}</td>
	                            </tr>                            
	                        </tbody>                                
	                    </table>
	                </td>
	            </tr>
	            <tr>
	                <td colspan="3" class="space table-border">                   
	                    <table class="auto-width">
	                        <thead>
	                            <tr>
	                                <td colspan="6" class="box-evenplan border-evenplan table-title-component-evenplan  table-border alinear-centro">
	                                    Evaluación de Competencias Laborales
	                                </td>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <tr>
	                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  table-title-component-evenplan alinear-centro" style="width: 20%"></td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  table-title-component-evenplan alinear-centro" style="width: 20%">Excelente</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  table-title-component-evenplan alinear-centro" style="width: 20%">Apropiado</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  table-title-component-evenplan alinear-centro" style="width: 20%">Regular</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  table-title-component-evenplan alinear-centro" style="width: 20%">Malo</td>
	                            </tr>
	                            
	                            <tr>
	                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 20%">Honradez</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->honradez == '1' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->honradez == '2' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->honradez == '3' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->honradez == '4' ? 'Si' : ''  }}</td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 20%">Calidad de trabajo</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->calidad_trabajo == '1' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->calidad_trabajo == '2' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->calidad_trabajo == '3' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->calidad_trabajo == '4' ? 'Si' : ''  }}</td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 20%">Relación con superiores</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->relacion_superiores == '1' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->relacion_superiores == '2' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->relacion_superiores == '3' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->relacion_superiores == '4' ? 'Si' : ''  }}</td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 20%">Relación con compañeros</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->relacion_companeros == '1' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->relacion_companeros == '2' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->relacion_companeros == '3' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->relacion_companeros == '4' ? 'Si' : ''  }}</td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 20%">Puntualidad</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->puntualidad == '1' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->puntualidad == '2' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->puntualidad == '3' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->puntualidad == '4' ? 'Si' : ''  }}</td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan table-title-component-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 20%">Responsabilidad</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->responsabilidad == '1' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->responsabilidad == '2' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->responsabilidad == '3' ? 'Si' : ''  }}</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro" style="width: 20%">{{ $referencia->responsabilidad == '4' ? 'Si' : ''  }}</td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 25%">¿Cuenta con algún comprobante?</td>
	                                <td colspan="5" class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 75%">
	                                    {{ $referencia->comprobante }}
	                                </td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 25%">Comentarios</td>
	                                <td colspan="5" class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 75%">
	                                    {{ $referencia->observaciones }}
	                                </td>
	                            </tr>                            
	                        </tbody>                                
	                    </table>
	                    <br><br>
	                </td>
	            </tr>
                

            	@endforeach
           	@endif
            <tr>
                <td colspan="3" class="table-border" style="height: 200px;">
                    
                </td>
            </tr>
            
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="title-header-component-evenplan table-border alinear-centro">
                                Referencias Personales
                            </td>
                        </tr>                        
                    </table>
                </td>
            </tr>
            @if( $estudio->formatoEvenplan )
                @foreach( $estudio->formatoEvenplan->referenciaPersonal as $index => $referencia )            
	            <tr>           
	                <td colspan="3" class="space table-border">                   
	                    <table class="auto-width">
	                        <tbody>
                                <tr>
                                    <td colspan="3" class="table-border">
                                        &nbsp;
                                    </td>
                                </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 20%">Quién da la referencia:</td>
	                                <td colspan="3" class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 80%">
	                                    {{ $referencia->da_referencia }}
	                                </td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 20%">Ocupación</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 30%">
	                                    {{ $referencia->ocupacion }}
	                                </td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 25%">Domicilio</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 25%">
	                                    {{ $referencia->domicilio }}
	                                </td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 20%">Teléfono</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 30%">
	                                    {{ $referencia->telefono }}
	                                </td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 25%">Tiempo de conocerlo</td>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 25%">
	                                    {{ $referencia->tiempo_conocerlo }}
	                                </td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 20%">Relación con el candidato</td>
	                                <td colspan="3" class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 80%">
	                                    {{ $referencia->relacion_candidato }}
	                                </td>
	                            </tr>
	                            <tr>
	                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-izquierda" style="width: 20%">Comentarios</td>
	                                <td colspan="3" class="box-evenplan border-evenplan letra-componente-evenplan  justificar" style="width: 80%">
	                                    {{ $referencia->comentarios }}
	                                </td>
	                            </tr>                          
	                        </tbody>                                
	                    </table>
	                </td>
	            </tr>
	            @endforeach
            @endif

            {{--
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tbody>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Quién da la referencia:</td>
                                <td colspan="3" class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Ocupación</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Domicilio</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Teléfono</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Tiempo de conocerlo</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Relación con el candidato</td>
                                <td colspan="3" class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Comentarios</td>
                                <td colspan="3" class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>                          
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tbody>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Quién da la referencia:</td>
                                <td colspan="3" class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Ocupación</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Domicilio</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Teléfono</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Tiempo de conocerlo</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Relación con el candidato</td>
                                <td colspan="3" class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-derecha">Comentarios</td>
                                <td colspan="3" class="box-evenplan border-evenplan letra-componente-evenplan  justificar"></td>
                            </tr>                          
                        </tbody>                                
                    </table>
                </td>
            </tr>--}}
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="title-header-component-evenplan table-border alinear-centro">
                                Ubicación de Domicilio
                            </td>
                        </tr>                        
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tbody>
                            <tr>
                                <td rowspan="3" class="grafica-evenplan border-evenplan alinear-centro" style="width: 100%;">
                                    <div style="width: 300px;">
                                    @if( $estudio->imagenes->where('tipo','Ubicacion')->first() )
                                         {{ Html::image(                                           
                                                            $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                            $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->archivo

                                        ) }}

                                    @else                                       

                                        {!! Html::image('imagenes/evenplan2.png','',["class"=>"imagen-upload-vivienda"]) !!} 

                                    @endif
                                    </div>
                                    
                                </td>
                            </tr>                          
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tbody>
                            <tr>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro " style="width: 50%;">Foto dentro del Domicilio</td>
                                <td class="box-evenplan border-evenplan letra-componente-evenplan  alinear-centro " style="width: 50%;">Foto fuera del Domicilio</td>
                               
                            </tr>
                            <tr>
                                <td rowspan="3" class="border-evenplan " style="width: 50%;">
                                    <div style="width: 300px;">
                                    @if( $estudio->imagenes->where('tipo','Vivienda Interior')->first() )
                                         {{ Html::image(                                           
                                                            $estudio->imagenes->where('tipo','Vivienda Interior')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                            $estudio->imagenes->where('tipo','Vivienda Interior')->sortByDesc('fecha_alta')->first()->archivo,
                                                            '',
                                                            ['style:max-width:100%;']

                                        ) }}

                                    @else                                       

                                        {!! Html::image('imagenes/evenplan2.png','',["class"=>"imagen-upload-vivienda"]) !!} 

                                    @endif
                                    </div>

                                    
                                </td>
                                <td rowspan="3" class="border-evenplan " style="width: 50%;">
                                    <div style="width: 300px;">
                                        
                                        @if( $estudio->imagenes->where('tipo','Vivienda Exterior')->first() )
                                             {{ Html::image(                                           
                                                                $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                                $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first()->archivo,
                                                                '',
                                                                ['style:max-width:100%;']

                                            ) }}

                                        @else                                        
                                            {!! Html::image('imagenes/evenplan2.png','',["class"=>"imagen-upload-vivienda"]) !!} 
                                        @endif
                                    </div>

                                    
                                </td>
                            </tr>                                                    
                        </tbody>                                
                    </table>
                </td>
            </tr>
            <!-- luis -->










        </tbody>
    </table>



<script>
    window.print();
</script>

</body>
</html>
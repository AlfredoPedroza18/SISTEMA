<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>ESE-{{ $estudio->id}}</title>
    <!-- Latest compiled and minified CSS -->
    {!! Html::style('assets/css/pdf-formato-grid-print-sgmty.css',array('media' => 'print')) !!}
</head>
<body>   
    <table>
        <tfoot>
            <tr>
                <td colspan="3" class="letra-componente negrita alinear-derecha">
                    <div class="divFooter">
                        {{-- isset( $estudio->candidato ) ? 'ESE-' . $estudio->id . '  Candidato: ' . $estudio->candidato->nombre_completo : '' --}}
                    </div>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td class="logo-plantilla table-border">
                    {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo"]) !!}           
                </td>
                <td class="logo-main table-border">
                    <p class="titulo-principal alinear-centro">ESTUDIO SOCIOECONÓMICO</p>
                </td>
                <td class="fecha-plantilla table-border">
                    <table class="table-border">
                        <thead>
                            <tr>
                                <th class="letra-componente alinear-centro" style="width:33%;">MES</th>
                                <th class="letra-componente alinear-centro" style="width:33%;">DÍA</th>
                                <th class="letra-componente alinear-centro" style="width:33%;">AÑO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="letra-componente alinear-centro" style="width:33%;">                                     
                                    {{ $estudio->mes_visita }}                                    
                                </td>
                                <td class="letra-componente alinear-centro" style="width:33%;">                                     
                                    {{ $estudio->dia_visita }}                                    
                                </td>
                                <td class="letra-componente alinear-centro" style="width:33%;">                                     
                                    {{ $estudio->anio_visita }}                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>

            </tr>
            <tr>
                <td colspan="2" class="table-border">
                    <table class="detalle-cliente">                                        
                        <tbody>
                            <tr>                                             
                                <td class="letra-componente alinear-izquierda" style="width: 20%;">Empresa</td>
                                <td class="letra-componente alinear-izquierda" style="width: 80%;">&nbsp;{{ $estudio->cliente->nombre_comercial }} </td>

                            </tr>
                            <tr>                                             
                                <td class="letra-componente alinear-izquierda" style="width: 20%;">Nombre</td>
                                <td class="letra-componente alinear-izquierda" style="width: 80%;">            
                                    &nbsp;{{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
                                </td>

                            </tr>
                            <tr>                                             
                                <td class="letra-componente alinear-izquierda" style="width: 20%;">Puesto</td>
                                <td class="letra-componente alinear-izquierda" style="width: 80%;">
                                    &nbsp;{{ isset( $estudio->formatoSM->resumen ) ? $estudio->formatoSM->resumen->puesto : '' }}
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </td>
                <td class="table-border">
                    <table class="table-border auto-width" style="height: auto;">                                    
                        <tbody>
                            <tr>
                                <td  class="letra-componente alinear-centro" class="table-border">ESTATUS</td>
                            </tr>
                            <tr>
                                <td class="letra-componente alinear-centro"  rowspan="3"
                                @if( $estudio->formatoSM )
                                    @if( $estudio->formatoSM->resumen->estatus == '1' )
                                        style="width: 20%;background-color:#499B61;color:white;"
                                    @elseif( $estudio->formatoSM->resumen->estatus == '2' )
                                        style="width: 20%;background-color:#FF8000;color:white;"
                                    @else
                                        style="width: 20%;background-color:#FF0000;color:white;"
                                    @endif
                                @endif    
                                >
                                
                                    
                                    @if( $estudio->formatoSM )
                                        @if( $estudio->formatoSM->resumen->estatus == '1' )
                                            APTO
                                        @elseif( $estudio->formatoSM->resumen->estatus == '2' )
                                            APTO CON RESERVAS
                                        @else
                                            NO APTO
                                        @endif
                                    @endif
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    <p class="letra-detalle">
                        El presente estudio socioeconómico se basa en la investigación de tres áreas: Socioeconómica, Laboral y Personal. Por lo que a continuación se muestra un breve resumen de la investigación  por área, para más detalles revisar el contenido.                                                      
                    </p>
                </td>
            </tr>

            <tr>
                <td colspan="3" class="alinear-centro">
                    <p class="titulo-componente">RESUMEN</p>
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
                                <td>
                                    <p class="alinear-centro titulo-componente">1. Situación Socioeconómica</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="letra-componente">
                                        {{ isset( $estudio->formatoSM ) ?  $estudio->formatoSM->resumen->situacion_socioeconomica :'' }}
                                    </p>
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
                                <td>
                                    <p class="alinear-centro titulo-componente">
                                        2. Escolaridad
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="letra-componente justificar">
                                        {{ isset( $estudio->formatoSM ) ?  $estudio->formatoSM->resumen->escolaridad :'' }}
                                    </p>
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
                                <td>
                                    <p class="alinear-centro titulo-componente">
                                        3. Trayectoria Laboral
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="letra-componente justificar">
                                        {{ isset( $estudio->formatoSM ) ?  $estudio->formatoSM->resumen->trayectoria_laboral :'' }}
                                    </p>
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
                                <td>
                                    <p class="alinear-centro titulo-componente">
                                        4. Valores calificados del candidato durante la aplicación del Estudio Socioeconómico
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-border">
                                    <table class="auto-width">
                                        <thead>
                                            <tr>
                                                <th class="letra-componente alinear-centro " style="width: 30%;">VALOR</th>  
                                                <th class="letra-componente alinear-centro" style="width: 10%;">BUENA</th>  
                                                <th class="letra-componente alinear-centro" style="width: 10%;">REGULAR</th>  
                                                <th class="letra-componente alinear-centro" style="width: 10%;">MALA</th>  
                                                <th class="letra-componente alinear-centro" style="width: 40%;">COMENTARIOS</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                    DISPONIBILIDAD
                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->disponibilidad == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>


                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->disponibilidad == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->disponibilidad == '3' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>

                                                <td class="label letra-componente" rowspan="7" style="width: 40%;">
                                                    {{ isset( $estudio->formatoSM ) ?  $estudio->formatoSM->resumen->comentarios :  '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                    PUNTUALIDAD
                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->puntualidad == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->puntualidad == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->puntualidad == '3' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                    SERIEDAD
                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->seriedad == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->seriedad == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->seriedad == '3' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                    ACTITUD
                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->actitud == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->actitud == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->actitud == '3' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                    CONFIABILIDAD
                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->confiabilidad == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->confiabilidad == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->confiabilidad == '3' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                    SEGURIDAD EN SI MISMO
                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->seguridad_en_si_mismo == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->seguridad_en_si_mismo == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->seguridad_en_si_mismo == '3' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                    PRESENTACION
                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->presentacion == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->presentacion == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoSM )
                                                    @if( $estudio->formatoSM->resumen->presentacion == '3' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

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
                <td colspan="3" class="table-border alinear-centro">
                    <div class="box">

                        <p class="titulo-componente">
                            REALIZÓ INVESTIGACIÓN:
                        </p>    
                        
                        <p class="alinear-centro ">
                            <p style="width:180px;">                                
                            {{ Html::image( $estudio->ejecutivoPrincipal->first()->imagen_firma ,'',['style' => 'width:100%;height:auto;margin-left:270px;']) }}
                            </p>
                        </p>
                        
                        <p class="alinear-centro border-top box-firma">
                            {{  $estudio->ejecutivoPrincipal->first()->nombre_ejecutivo }}
                        </p>
                        <br>                                  
                    </div>
                    <div class="box justificar letra-footer">
                        {{ $estudio->ejecutivoPrincipal->first()->centro_negocio->direccion_completa }}
                        {{--Gen-T, División del Norte # 2617, Col. Del Carmen C. P. 04100, 56-58-44-07   coyoacan@gen-t.com.mx--}}                      DECLARACIÓN: El entrevistado declara que la información manifestada en este estudio es verdadera, por lo cual tendra vigencia y entrará en vigor el Art. 47 Fracc. I de la L.F.T.  
                        <br>
                        <br>
                    </div>
                </td>
            </tr>
            {{-- ****************************************** INICIO DATOS GENERALES ****************************************** --}}
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>

            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
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
                                <td>
                                    <p class="alinear-centro titulo-componente-principal">
                                        DATOS GENERALES
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-border">
                                    <table  class="auto-width">
                                        <tbody>
                                            <tr>
                                                <td  class="letra-componente alinear-izquierda" style="width:20%;">NOMBRE DE CANDIDATO:</td>
                                                <td colspan="3" class="letra-componente alinear-izquierda" style="width:60%;">
                                                    <p> 
                                                        {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
                                                    </p>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width:10%;">SEXO:</td>
                                                <td  colspan="3" class="letra-componente alinear-izquierda" style="width:10%;">
                                                    <p>
                                                        @if( $estudio->formatoSM )
                                                        @if( $estudio->formatoSM->datos_generales->sexo == '1')
                                                        Masculino
                                                        @else
                                                        Femenino
                                                        @endif
                                                        @endif
                                                    </p>
                                                </td>                                                           
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>

                            <tr>
                                <td class="table-border">
                                    <table class="auto-width">
                                        <tbody>
                                            <tr>
                                                <td class="letra-componente alinear-izquierda" style="width:20%;">DOMICILIO:</td>
                                                <td  colspan="3" class="letra-componente alinear-izquierda" style="width:80%;">
                                                    <p>
                                                        {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->domicilio : ''}}
                                                    </p>
                                                </td>                                                           
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-border">
                                    <table class="auto-width">
                                        <tbody>
                                            <tr>
                                                <td class="letra-componente alinear-izquierda" style="width:13%;">COLONIA:</td>
                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                    <p> 
                                                        {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->colonia : '' }}
                                                    </p>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width:13%;">LUGAR DE NAC. :</td>
                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                    <p>
                                                        {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->lugar_nacimiento : '' }}
                                                    </p>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width:13%;">NACIONALIDAD:</td>
                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                    <p>
                                                        {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->nacionalidad : '' }}
                                                    </p>
                                                </td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>


                                <tr>
                                    <td class="table-border">
                                        <table class="auto-width">
                                            <tbody>
                                                <tr>
                                                    <td class="letra-componente alinear-izquierda" style="width:13%;">EDAD:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->edad : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="letra-componente alinear-izquierda" style="width:13%;">FECHA DE NAC.:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->fecha_nacimiento : '' }}</p>
                                                        </td>
                                                        <td class="letra-componente alinear-izquierda" style="width:13%;">ESTADO CIVIL:</td>
                                                        <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                            <p>
                                                                {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->edo_civil : '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-border">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda" style="width:13%;">PUESTO:</td>
                                                        <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                            <p>
                                                                {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->puesto : '' }}</p>

                                                            </td>
                                                            <td class="letra-componente alinear-izquierda" style="width:20%;">TIEMPO EN EL DOMICILIO:</td>
                                                            <td class="letra-componente alinear-izquierda" style="width:10%;">
                                                                <p>
                                                                    {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->tiempo_domicilio : '' }}  
                                                                </p>
                                                            </td> 
                                                            <td class="letra-componente alinear-izquierda" style="width:10%;">CELULAR:</td>
                                                            <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                <p>
                                                                    {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->celular : '' }}</p>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:10%;">MUNICIPO:</td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->municipio : '' }}</p>

                                                                    </td>
                                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">C.P.:</td>
                                                                    <td class="letra-componente alinear-izquierda" style="width:10%;">
                                                                        <p>
                                                                            {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->cp : '' }}  
                                                                        </p>
                                                                    </td> 
                                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">TELÉFONO:</td>
                                                                    <td class="letra-componente alinear-izquierda" style="width:45%;">
                                                                        <p>
                                                                            {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->telefono : '' }}</p>

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td class="table-border">
                                                            <table class="auto-width">
                                                                <tbody>
                                                                    <tr>
                                                                        <td  class="letra-componente alinear-izquierda" style="width:30%;">ENTRE QUE CALLES SE ENCUENTRA EL DOMICILIO:</td>
                                                                        <td class="letra-componente alinear-izquierda" style="width:70%;">
                                                                            <p>
                                                                                {{ isset( $estudio->formatoSM->datos_generales ) ? $estudio->formatoSM->datos_generales->entre_calles : '' }}  </p>
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

                                        {{-- ****************************************** FIN DATOS GENERALES ****************************************** --}}
                                        {{-- ------------------------------------------  DOCUMENTOS -------------------------------------------------- --}}
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
                                                            <td colspan="3">
                                                                <p class="alinear-centro titulo-componente-principal">
                                                                    DOCUMENTACIÓN
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-centro negrita" style="width: 25%;">DOCUMENTO</td>
                                                            <td class="letra-componente alinear-centro negrita" style="width: 65%;">No. DE CERTIFICADO</td>
                                                            <td class="letra-componente alinear-centro negrita" style="width: 20%;">COPIA/ORIGINAL</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 25%;">IDENTIFICACIÓN OFICIAL</td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 65%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->identificacion_no : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 20%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->identificacion_corroboro: '' }}
                                                            </p></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 25%;">ACTA DE NACIMIENTO</td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 65%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->acta_nacimiento_no : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 20%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->acta_nacimiento_corroboro : '' }}
                                                            </p></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 25%;">COMPROBANTE DE DOMICILIO</td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 65%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->comprobante_dom_no : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 20%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->comprobante_dom_corroboro : '' }}
                                                            </p></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 25%;">R.F.C.</td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 65%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->rfc_no : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 20%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->rfc_corroboro : '' }}
                                                            </p></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 25%;">No. AFILIACIÓN IMSS Ó ISSSTE</td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 65%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->nss_no : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 20%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->nss_corroboro : '' }}
                                                            </p></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 25%;">No. DE CRÉDITO INFONAVIT</td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 65%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->infonavit_no : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 20%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->infonavit_corroboro : '' }}
                                                            </p></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 25%;">No. C.U.R.P.</td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 65%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->curp_no : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 20%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->curp_corroboro : '' }}
                                                            </p></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 25%;">ÚLTIMO COMPROBANTE DE ESTUDIOS</td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 65%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->comprobante_estudios_no : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 20%;"><p>
                                                                &nbsp;{{ isset($estudio->formatoSM->documentacion ) ?$estudio->formatoSM->documentacion->comprobante_estudios_corroboro : '' }}
                                                            </p></td>
                                                        </tr>

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
                                                                        <td>
                                                                            <p class="letra-componente alinear-centro negrita">
                                                                                OBSERVACIONES
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="letra-componente justificar">
                                                                                {{ isset($estudio->formatoSM ) ?$estudio->formatoSM->documentacion->observaciones : '' }}
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    {{--  END DOCUMENTACION--}}
                                                    {{--  ESCOLARIDAD --}}
                                                    <tr>
                                                        <td colspan="3" class="table-border">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="table-border">
                                                            <table class="tabla-componente">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="alinear-centro titulo-componente-principal">
                                                                                ESCOLARIDAD
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-border">
                                                                            <table class="tabla-componente">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width: 10%;">GRADO</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width: 30%;">INSTITUCIÓN</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width: 25%;">DOMICILIO</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width: 12%;">PERIODO</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width: 8%;">AÑOS</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width: 15%;">COMPROBANTE</th>   

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @if( $estudio->formatoSM )
                                                                                    @foreach( $estudio->formatoSM->escolaridad as $row )
                                                                                    <tr>                                                                             
                                                                                        <td style="width: 10%;"><p class="letra-componente alinear-izquierda">{{ $row->grado  }}</p></td>
                                                                                        <td style="width: 30%;"><p class="letra-componente alinear-izquierda">{{ $row->institucion }}</p></td>
                                                                                        <td style="width: 25%;"><p class="letra-componente alinear-izquierda">{{ $row->domicilio }}</p></td>
                                                                                        <td style="width: 12%;"><p class="letra-componente alinear-centro">{{ $row->periodo }}</p></td>
                                                                                        <td style="width: 8%;"><p class="letra-componente alinear-centro">{{ $row->anios }}</p></td>
                                                                                        <td style="width: 15%;"><p class="letra-componente alinear-centro">{{ $row->comprobante }}</p></td>
                                                                                    </tr>  
                                                                                    @endforeach
                                                                                    @endif             
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
                                                                                        <td>
                                                                                            <p class="letra-componente alinear-centro negrita">
                                                                                                OBSERVACIONES
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <p class="letra-componente justificar">
                                                                                                {{ isset($estudio->formatoSM ) ? $estudio->formatoSM->escolaridad_obs->observaciones : '' }}
                                                                                            </p>
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
                                                    {{--  CURSOS --}}
                                                    <tr>
                                                        <td colspan="3" class="table-border">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="table-border">
                                                            <table class="tabla-componente">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="alinear-centro titulo-componente">
                                                                                CURSOS REALIZADOS
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <table class="tabla-componente">

                                                                                <tbody>

                                                                                    @if( $estudio->formatoSM)
                                                                                    @foreach ($estudio->formatoSM->cursos as $curso)
                                                                                    <tr>
                                                                                        <td class="table-border letra-componente  alinear-derecha" style="width:10%;">DE</td>
                                                                                        <td class="letra-componente table-border" style="width:15%;">
                                                                                            <p class="border-footer">
                                                                                                &nbsp;{{ $curso->de}}
                                                                                            </p>
                                                                                        </td>        
                                                                                        <td class="table-border letra-componente  alinear-derecha" style="width:10%;">A</td>
                                                                                        <td class="letra-componente table-border" style="width:15%;">
                                                                                            <p class="border-footer">
                                                                                                &nbsp;{{ $curso->a}}
                                                                                            </p>
                                                                                        </td>                
                                                                                        <td class="table-border letra-componente  alinear-derecha" style="width:10%;">REALIZÓ</td>
                                                                                        <td class="letra-componente table-border" style="width:40%;">
                                                                                            <p class="border-footer">
                                                                                                &nbsp;{{ $curso->curso}}
                                                                                            </p>
                                                                                        </td>                                    
                                                                                    </tr>
                                                                                    @endforeach
                                                                                    @endif
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    {{-- END CURSOS--}}
                                                    {{-- ------------------------------   IDIOMAS -------------------------- --}}
                                                    <tr>
                                                        <td colspan="3" class="table-border">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="table-border">
                                                            <table class="tabla-componente">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="alinear-centro titulo-componente">
                                                                                IDIOMAS
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-border">
                                                                            <table class="tabla-componente">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width:12%;">#</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width:12%;">IDIOMA</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width:12%;">HABLADO</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width:12%;">LEÍDO</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width:12%;">ESCRITO</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width:12%;">COMPRENSIÓN</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width:12%;">%</th>
                                                                                        <th class="letra-componente alinear-centro negrita" style="width:12%;">ESCALA</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @if( $estudio->formatoSM)
                                                                                    @foreach ($estudio->formatoSM->idiomas as $index => $idioma )
                                                                                    <tr>  
                                                                                        <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                            <p>
                                                                                                {{ ($index + 1) }}
                                                                                            </p>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                            <p>
                                                                                                {{ $idioma->idioma }}
                                                                                            </p>
                                                                                        </td>                
                                                                                        <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                            <p>
                                                                                                {{ $idioma->hablado }} %
                                                                                            </p>
                                                                                        </td>              
                                                                                        <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                            <p>
                                                                                                {{ $idioma->leido }} %
                                                                                            </p>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                            <p>
                                                                                                {{ $idioma->escrito }} %
                                                                                            </p>
                                                                                        </td>                
                                                                                        <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                            <p>
                                                                                                {{ $idioma->comprension}} %
                                                                                            </p>
                                                                                        </td>                
                                                                                        <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                            <p>
                                                                                                {{ $idioma->porcentaje }}
                                                                                            </p>
                                                                                        </td>    
                                                                                        <td class="letra-componente alinear-centro" 
                                                                                                @if($idioma->porcentaje_total <= '50')
                                                                                                style="background-color:red; width: 12%"
                                                                                                @elseif($idioma->porcentaje_total <= '75')
                                                                                                style="background-color:#F7E509; width: 12%"
                                                                                                @else
                                                                                                style="background-color:green; width: 12%"
                                                                                                @endif>
                                                                                         </td>                                      
                                                                                        </tr>                                                                
                                                                                        @endforeach
                                                                                        @endif                                                                                                                  
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        {{-- ------------------------------   IDIOMAS -------------------------- --}}
                                                        {{-- ------------------------------ CONOCIMIENTOS -------------------------}}
                                                        <tr>
                                                            <td colspan="3" class="table-border">
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="table-border">
                                                                <table class="tabla-componente">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <p class="alinear-centro titulo-componente">
                                                                                    CONOCIMIENTOS Y HABILIDADES
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="letra-componente alinear-centro negrita" style="width:20%;">#</th>
                                                                                            <th class="letra-componente alinear-centro negrita" style="width:40%;">PAQUETERIA</th>
                                                                                            <th class="letra-componente alinear-centro negrita" style="width:40%;">%</th>                                                                    
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @if( $estudio->formatoSM )
                                                                                        @foreach ($estudio->formatoSM->conocmientos_habilidades as $index => $conocimiento)
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-centro" style="width:20%;">
                                                                                                <p>
                                                                                                    {{ ($index+1) }}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente justificar" style="width:40%;">
                                                                                                <p>
                                                                                                    &nbsp;&nbsp; {{ $conocimiento->paqueteria }} 
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-centro" style="width:40%;">
                                                                                                <p>
                                                                                                    {{ $conocimiento->porcentaje }} 
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                        @endif                                                   
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        {{-- ------------------------------ CONOCIMIENTOS -------------------------}}
                                                        {{-- END ESCOLARIDAD --}}
                                                        {{-- ------------------------------ FAMILIARES ----------------------------}}

                                                        {{-- SITUACION FAMILIAR --}}
                                                        <tr>
                                                            <td colspan="3" class="table-border">
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="table-border">
                                                                <table class="tabla-componente">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <p class="alinear-centro titulo-componente-principal">
                                                                                    DATOS FAMILIARES 
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td class="alinear-centro">
                                                                                            <div style="width: 100%;" class="alinear-centro"> 
                                                                                            @if( $estudio->formatoSM )
                                                                                                @if( $estudio->formatoSM->datos_familiares->file != '' )
                                                                                                

                                                                                                     {{ Html::image($estudio->formatoSM->datos_familiares->path . '/' . $estudio->formatoSM->datos_familiares->file,'',['style' => 'max-width:100%;']) }}

                                                                                                @else
                                                                                                    {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo"]) !!}        

                                                                                                @endif
                                                                                            @else
                                                                                                    {!! Html::image('imagenes/sgmty-image.png','',["class"=>"imagen-upload-vivienda"]) !!} 

                                                                                            @endif
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td colspan="3" class="table-border">
                                                                                            &nbsp;
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <p class="alinear-centro letra-componente negrita">
                                                                                                OBSERVACIONES
                                                                                            </p>
                                                                                        </td>                                                                    
                                                                                    </tr>
                                                                                    <tr>                                                                                        
                                                                                        <td>
                                                                                            <p class="letra-componente justificar">
                                                                                                {{ isset($estudio->formatoSM ) ? $estudio->formatoSM->datos_familiares->observaciones : '' }}
                                                                                            </p>
                                                                                            
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
                                                        {{-- ----------------------------------------------------situacion familiar-------------------------------------- --}}
                                                        {{-- ----------------------------------------------------situacion economica --}}
                                                        <tr>
                                                            <td colspan="3" class="table-border">
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="table-border">
                                                                <table class="tabla-componente">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <p class="alinear-centro titulo-componente-principal">
                                                                                    SITUACIÓN ECONÓMICA
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <thead>
                                                                                        <tr>

                                                                                            <th class="letra-componente alinear-centro negrita " style="width:30%;">CONCEPTO</th>
                                                                                            <th class="letra-componente alinear-centro negrita " style="width:15%;">INGRESOS</th>
                                                                                            <th class="letra-componente alinear-centro negrita " style="width:30%;">CONCEPTO</th>
                                                                                            <th class="letra-componente alinear-centro negrita " style="width:15%;"> EGRESOS </th>    

                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                            {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->i_concepto1 :'' }}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                   @if( $estudio->formatoSM ) 
                                                                                                @if( $estudio->formatoSM->situacion_economica->i_monto1 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->i_monto1,2 ) }}
                                                                                                    @else
                                                                                                        --
                                                                                                    @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->e_concepto1 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                    @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_economica->e_monto1 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->e_monto1,2 ) }}
                                                                                                        @else
                                                                                                        --
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>     
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->i_concepto2 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                   @if( $estudio->formatoSM ) 
                                                                                                @if( $estudio->formatoSM->situacion_economica->i_monto2 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->i_monto2,2 ) }}
                                                                                                    @else
                                                                                                        --
                                                                                                    @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->e_concepto2 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                    @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_economica->e_monto2 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->e_monto2,2 ) }}
                                                                                                        @else
                                                                                                        --
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>     
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->i_concepto3 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                   @if( $estudio->formatoSM ) 
                                                                                                @if( $estudio->formatoSM->situacion_economica->i_monto3 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->i_monto3,2 ) }}
                                                                                                    @else
                                                                                                        --
                                                                                                    @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->e_concepto3 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                    @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_economica->e_monto3 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->e_monto3,2 ) }}
                                                                                                        @else
                                                                                                        --
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>     
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->i_concepto4 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                   @if( $estudio->formatoSM ) 
                                                                                                @if( $estudio->formatoSM->situacion_economica->i_monto4 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->i_monto4,2 ) }}
                                                                                                    @else
                                                                                                        --
                                                                                                    @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->e_concepto4 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                    @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_economica->e_monto4 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->e_monto4,2 ) }}
                                                                                                        @else
                                                                                                        --
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>     
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->i_concepto5 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                   @if( $estudio->formatoSM ) 
                                                                                                @if( $estudio->formatoSM->situacion_economica->i_monto5 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->i_monto5,2 ) }}
                                                                                                    @else
                                                                                                        --
                                                                                                    @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->e_concepto5 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                    @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_economica->e_monto5 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->e_monto5,2 ) }}
                                                                                                        @else
                                                                                                        --
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>     
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->i_concepto6 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                   @if( $estudio->formatoSM ) 
                                                                                                @if( $estudio->formatoSM->situacion_economica->i_monto6 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->i_monto6,2 ) }}
                                                                                                    @else
                                                                                                        --
                                                                                                    @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->e_concepto6 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                    @if( $estudio->formatoSM )
                                                                                                        @if($estudio->formatoSM->situacion_economica->e_monto6 != '0') 
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->e_monto6,2 ) }}
                                                                                                        @else
                                                                                                        --
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>     
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->i_concepto7 :''}}  {{ $estudio->formatoSM->situacion_economica->i_concepto7 }}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                   @if( $estudio->formatoSM ) 
                                                                                                @if( $estudio->formatoSM->situacion_economica->i_monto7 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->i_monto7,2 ) }}
                                                                                                    @else
                                                                                                        --
                                                                                                    @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->e_concepto7 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                    @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_economica->e_monto7 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->e_monto7,2 ) }}
                                                                                                        @else
                                                                                                        --
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>     
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->i_concepto8 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                   @if( $estudio->formatoSM ) 
                                                                                                @if( $estudio->formatoSM->situacion_economica->i_monto8 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->i_monto8,2 ) }}
                                                                                                    @else
                                                                                                        --
                                                                                                    @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->e_concepto8 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                    @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_economica->e_monto8 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->e_monto8,2 ) }}
                                                                                                        @else
                                                                                                        --
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>     
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->i_concepto9 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                   @if( $estudio->formatoSM ) 
                                                                                                @if( $estudio->formatoSM->situacion_economica->i_monto9 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->i_monto9,2 ) }}
                                                                                                    @else
                                                                                                        --
                                                                                                    @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->e_concepto9 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                    @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_economica->e_monto9 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->e_monto9,2 ) }}
                                                                                                        @else
                                                                                                        --
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>     
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                <p>
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->i_concepto10 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                   @if( $estudio->formatoSM ) 
                                                                                                @if( $estudio->formatoSM->situacion_economica->i_monto10 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->i_monto10,2 ) }}
                                                                                                    @else
                                                                                                        --
                                                                                                    @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente " style="width:30%;">
                                                                                                <p class=" alinear-izquierda">
                                                                                                    {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_economica->e_concepto10 :''}}
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                <p>
                                                                                                    @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_economica->e_monto10 != '0' )
                                                                                                        ${{ number_format( $estudio->formatoSM->situacion_economica->e_monto10,2 ) }}
                                                                                                        @else
                                                                                                        --
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </p>
                                                                                            </td>     
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <tr>
                                                                                                <td  class="letra-componente alinear-derecha" style="width:30%;">
                                                                                                    <p>
                                                                                                        TOTAL INGRESOS
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                    <p>
                                                                                                        @if( $estudio->formatoSM )
                                                                                                            @if( $estudio->formatoSM->situacion_economica->i_total != '0' )
                                                                                                                 ${{ number_format( $estudio->formatoSM->situacion_economica->i_total, 2 ) }}
                                                                                                                @else
                                                                                                                    --
                                                                                                                @endif
                                                                                                                @endif
                                                                                                    </p>
                                                                                                </td>                                                                        
                                                                                                <td class="letra-componente alinear-derecha" style="width:30%;">
                                                                                                    <p>
                                                                                                        TOTAL EGRESOS                                                                           
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                    <p>
                                                                                                        ${{ isset( $estudio->formatoSM ) ? 
                                                                                                            number_format( $estudio->formatoSM->situacion_economica->e_total, 2 ) :''}}
                                                                                                    </p>
                                                                                                </td>
                                                                                            </tr>                                                                                         

                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>

                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                {{-- END SITUACION ECONOMICA --}}
                                                                {{--  BIENES --}}

                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="alinear-centro titulo-componente-principal">
                                                                                            BIENES
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="table-border">
                                                                                        <table class="tabla-componente">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th class="letra-componente negrita alinear-centro"  style="width:30%;">ACTIVOS</th>
                                                                                                    <th class="letra-componente negrita alinear-centro"  style="width:3%;">SI</th>
                                                                                                    <th class="letra-componente negrita alinear-centro"  style="width:3%;">NO</th>
                                                                                                    <th class="letra-componente negrita alinear-centro"  style="width:30%;">TIPO</th>
                                                                                                    <th class="letra-componente negrita alinear-centro"  style="width:10%;">VALOR</th>    
                                                                                                    <th class="letra-componente negrita alinear-centro"  style="width:10%;">PAGADO</th>    
                                                                                                    <th class="letra-componente negrita alinear-centro"  style="width:15%;">ADEUDO</th>    

                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @if( $estudio->formatoSM )
                                                                                                @foreach( $estudio->formatoSM->bienes as $bien )
                                                                                                <tr>
                                                                                                    <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                        <p>
                                                                                                            {{ $bien->activo }}
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-izquierda alinear-centro" 
                                                                                                        
                                                                                                            @if($bien->tiene == '1' )
                                                                                                                style="background-color:#FF8000; width: 3%;"
                                                                                                            @else
                                                                                                            	style="width:3%;"
                                                                                                            @endif>                      
                                                                                                        
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-izquierda alinear-centro"
                                                                                                            @if($bien->tiene == '2' )
                                                                                                                style="background-color:#FF8000; width: 3%;"
                                                                                                            @else
                                                                                                            	style="width:3%;"
                                                                                                            @endif>                      
                                                                                                        
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                                                        <p>
                                                                                                            {{ $bien->tipo }}                                                                                
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                                                        <p>
                                                                                                            @if( $bien->valor > '0' )
                                                                                                                ${{  number_format( $bien->valor,2 )}}
                                                                                                            @else
                                                                                                                --
                                                                                                            @endif
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                                                        <p>
                                                                                                            @if( $bien->pagado > '0' )
                                                                                                                ${{  number_format( $bien->pagado,2 )}}
                                                                                                            @else
                                                                                                                --
                                                                                                            @endif
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                                        <p>
                                                                                                            @if( $bien->adeudo > '0' )
                                                                                                                ${{  number_format( $bien->adeudo,2 )}}
                                                                                                            @else
                                                                                                                --
                                                                                                            @endif
                                                                                                        </p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                @endforeach
                                                                                                <tr>
                                                                                                    <td colspan="4" class="letra-componente alinear-derecha" style="width:70%;">
                                                                                                        <p>
                                                                                                            TOTAL INGRESOS
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                                                        <p>
                                                                                                            @if( $estudio->formatoSM )
                                                                                                            @if( $estudio->formatoSM->bienes_totales->valor > '0' )
                                                                                                            ${{ number_format($estudio->formatoSM->bienes_totales->valor,2) }}
                                                                                                            @else
                                                                                                                --
                                                                                                            @endif
                                                                                                            @endif
                                                                                                        </p>
                                                                                                    </td>                                                                        
                                                                                                    <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                                                        <p>
                                                                                                            @if( $estudio->formatoSM )
                                                                                                            @if( $estudio->formatoSM->bienes_totales->pagado > '0' )
                                                                                                            ${{ number_format($estudio->formatoSM->bienes_totales->pagado,2)  }}
                                                                                                            @else
                                                                                                                --
                                                                                                            @endif
                                                                                                            @endif

                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                                                        <p>
                                                                                                            @if( $estudio->formatoSM )
                                                                                                            @if( $estudio->formatoSM->bienes_totales->adeudo > '0' )
                                                                                                            ${{ number_format($estudio->formatoSM->bienes_totales->adeudo,2)  }}
                                                                                                            @else
                                                                                                                --
                                                                                                            @endif
                                                                                                            @endif
                                                                                                        </p>
                                                                                                    </td>
                                                                                                </tr>                                                                                         
                                                                                                @endif

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                {{-- END BIENES --}}
                                                                <!------------------------------------- infromacion de la vivienda ----------------------------------------------------- -->
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="alinear-centro titulo-componente-principal">
                                                                                            INFORMACIÓN DE LA VIVIENDA
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="table-border">
                                                                                        <table class="tabla-componente">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 20%">TIPO VIVIENDA</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 20%">TIPO PROPIEDAD</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 20%">SERVICIOS</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 20%">DISTRIBUCIÓN</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 20%">NIVEL ECONÓMICO</th>                                           
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>                                                                         
                                                                                                <tr>
                                                                                                    <td class="table-border alinear-centro" style="width: 20%">
                                                                                                        <table class="tabla-componente">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                   <td class="alinear-centro"
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_vivienda->propia ) != ''  )
																														style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                >                                                                                       @endif
                                                                                                                        
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            PROPIA      
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                    @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_vivienda->rentada ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                       
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            RENTADA           
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                    @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_vivienda->hipotecada ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                       
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            HIPOTECA           
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_vivienda->congelada ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                                                                                                                                          </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            CONGELADA             
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                     @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_vivienda->prestada ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                                                                                                                                          </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            PRESTADA              
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                      @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_vivienda->de_padres ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                                                                                                                                          </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            DE PADRES       
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                      @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_vivienda->otro ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                       
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            OTRO               
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>                                                                    
                                                                                                    <td class="table-border alinear-centro" style="width: 20%">
                                                                                                        <table class="tabla-componente">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_propiedad->sola ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            SOLA        
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_propiedad->duplex ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>

                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            DUPLEX                  
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_propiedad->huespedes ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>

                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            HUÉSPEDES              
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_propiedad->depto ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>

                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            DEPTO.               
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_propiedad->condominio ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>

                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            CONDOMINIO                      
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_propiedad->vecindad ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>

                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            VECINDAD    
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="alinear-centro"
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->tipo_propiedad->otro ) != ''  )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            OTRO               
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                    <td class="table-border alinear-centro" style="width: 20%">
                                                                                                        <table class="tabla-componente">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td 
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->info_vivienda_servicios->luz) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            LUZ              
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td 
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->info_vivienda_servicios->agua) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            AGUA                       
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->info_vivienda_servicios->pavimento) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            PAVIMENTACIÓN                  
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->info_vivienda_servicios->drenaje) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            DRENAJE           
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->info_vivienda_servicios->telefono) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td class="alinear-centro">
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            TELÉFONO                          
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->info_vivienda_servicios->refrigerador) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            REFRIGERADOR 
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->info_vivienda_servicios->boiler) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            BOILER                
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                    <td class="table-border alinear-centro" style="width: 20%">                                                                                
                                                                                                        <table class="tabla-componente">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                   <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_distribucion->sala ) != '' )
																														style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            SALA             
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_distribucion->comedor ) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            COMEDOR                       
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_distribucion->recamara ) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            RECAMARA                 
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_distribucion->cocina ) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            COCINA           
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_distribucion->banio ) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            BAÑO                         
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_distribucion->garaje ) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            GARAJE  
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_distribucion->biblioteca ) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            BIBLIOTECA           
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                    <td class="table-border alinear-centro" style="width: 20%">
                                                                                                        <table class="tabla-componente">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_nivel_economico->alto ) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            ALTO             
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_nivel_economico->medio_alto ) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            MEDIO ALTO                      
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_nivel_economico->medio ) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            MEDIO                 
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_nivel_economico->medio_bajo ) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            MEDIO BAJO          
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->info_vivienda_nivel_economico->bajo ) != '' )
                                                                                                                        style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="table-border letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                                            BAJO                        
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>

                                                                                                            </tbody>
                                                                                                        </table>                                                                                
                                                                                                    </td>

                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td colspan="5" class="table-border">
                                                                                                        <table class="tabla-componente" >
                                                                                                            <tbody>
                                                                                                                <tr>

                                                                                                                    <td style="width: 40%">
                                                                                                                        <p class="letra-componente alinear-izquierda">
                                                                                                                            ¿Cuántas personas viven en el domicilio?             
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda" style="width: 60%">
                                                                                                                        &nbsp;{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->tipo_vivienda->viven_domicilio : '' }}
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
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <!------------------------------------- infromacion de la vivienda ----------------------------------------------------- -->
                                                                <!------------------------------------- CONDICIONES INTERIORES ----------------------------------------------------- -->
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="alinear-centro titulo-componente-principal">
                                                                                            APRECIACIÓN DE LA VIVIENDA
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="table-border">
                                                                                        <table class="tabla-componente">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width:20%;">CONDICIONES INTERIORES</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width:20%;">ORDEN Y LIMPIEZA</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width:20%;">CALIDAD MOBILIARIO</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width:20%;">CONSERVACIÓN DEL MOBILIARIO</th>
                                                                                                    <th class="letra-componente alinear-centro negrita">ESPACIO DE LA VIVIENDA</th>                                           
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>                                                                         
                                                                                                <tr>
                                                                                                    <td class="table-border" style="width:20%;">
                                                                                                        <table class="tabla-componente">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                   <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_condiciones_interiores->alta ) != '' )
																														style="background-color:#FF8000; width: 30%;"
                                                                                                                        @else
                                                                                                                        style="width: 30%;"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            ALTA      
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_condiciones_interiores->media_alta ) != '' )
                                                                                                                        style="background-color:#FF8000; width:30%"           
                                                                                                                        @else
                                                                                                                        style="width:30%"           
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA ALTA          
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_condiciones_interiores->media ) != '' )
                                                                                                                        style="background-color:#FF8000; width:30%"           
                                                                                                                        @else
                                                                                                                        style="width:30%"           
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA        
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_condiciones_interiores->media_baja ) != '' )
                                                                                                                        style="background-color:#FF8000; width:30%"           
                                                                                                                        @else
                                                                                                                        style="width:30%"           
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA BAJA             
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_condiciones_interiores->baja ) != '' )
                                                                                                                        style="background-color:#FF8000; width:30%"           
                                                                                                                        @else
                                                                                                                        style="width:30%"           
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            BAJA              
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>                                                                                        
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>                                                                    
                                                                                                    <td class="table-border" style="width:20%;">
                                                                                                        <table class="tabla-componente">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->vivienda_orden_limpieza->alta) != '' )
                                                                                                                   		style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            ALTA           
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->vivienda_orden_limpieza->media_alta) != '' )
                                                                                                                        
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA ALTA                 
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->vivienda_orden_limpieza->media) != '' )
                                                                                                                        
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA               
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->vivienda_orden_limpieza->media_baja) != '' )
                                                                                                                        
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA BAJA               
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim($estudio->formatoSM->vivienda_orden_limpieza->baja) != '' )
                                                                                                                        
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            BAJA                     
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>                                                                                        
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                    <td class="table-border" style="width:20%;">
                                                                                                        <table class="tabla-componente">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_calidad_mobiliario->alta ) != '' )
																														style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>

                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            ALTA              
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_calidad_mobiliario->media_alta ) != '' )
                                                                                                                            style="background-color:#FF8000; width:30%"
                                                                                                                            @else
                                                                                                                            style="width:30%"
                                                                                                                        
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA ALTA                     
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_calidad_mobiliario->media ) != '' )
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA                  
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_calidad_mobiliario->media_baja ) != '' )

                                                                                                                           style="background-color:#FF8000; width:30%"
                                                                                                                           @else
                                                                                                                           style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA  BAJA       
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>

                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_calidad_mobiliario->baja ) != '' )
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            BAJA                       
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>                                                                                        
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                    <td class="table-border" style="width:20%;">                                                                                
                                                                                                        <table class="tabla-componente">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_conservacion_mobiliario->alta ) !='' )
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            ALTA           
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_conservacion_mobiliario->media_alta ) !='' )
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA ALTA                      
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_conservacion_mobiliario->media ) !='' )
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA                
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_conservacion_mobiliario->media_baja ) !='' )
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            MEDIA  BAJA              
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_conservacion_mobiliario->baja ) !='' )
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            BAJA              
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>

                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                    <td class="table-border" style="width:20%;">
                                                                                                        <table class="tabla-componente">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_espacio->sobrado ) != '' )
																														style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                       	@endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            SOBRADO              
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_espacio->suficiente ) != '' )
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            SUFICIENTE                      
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_espacio->limitado ) != '' )
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            LIMITADO                  
                                                                                                                        </p>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td
                                                                                                                        @if( $estudio->formatoSM )
                                                                                                                        @if( trim( $estudio->formatoSM->vivienda_espacio->insuficiente ) != '' )
                                                                                                                        style="background-color:#FF8000; width:30%"
                                                                                                                        @else
                                                                                                                        style="width:30%"
                                                                                                                        @endif
                                                                                                                        @endif>
                                                                                                                    </td>
                                                                                                                    <td class="letra-componente alinear-izquierda table-border ">
                                                                                                                        <p>
                                                                                                                            INSUFICIENTE          
                                                                                                                        </p>
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
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr >
                                                                                    <td style="width: 50%">
                                                                                        <p class="letra-componente alinear-centro negrita">
                                                                                            TIENE FAMILIARES Y/O CONOCIDOS EN LA EMPRESA
                                                                                        </p>
                                                                                    </td>
                                                                                    <td style="width: 50%">
                                                                                        <p class="letra-componente alinear-centro negrita">
                                                                                            COMO SE ENTERO DE LA VACANTE
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="width: 50%" class="alinear-centro">
                                                                                        <table class="auto-width">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td colspan="3" class="table-border">
                                                                                                        &nbsp;
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr> 
                                                                                                    <td class="table-border" style="width: 25%;"></td>

                                                                                                    <td
                                                                                                        @if( $estudio->formatoSM )
                                                                                                        @if( $estudio->formatoSM->familiar_empresa->familiar_empresa == '1' )
                                                                                                        style="background-color:#FF8000;width: 10%"
                                                                                                        @else
                                                                                                        style="width: 10%"
                                                                                                        @endif
                                                                                                        @endif>
                                                                                                    </td>
                                                                                                    <td style="width: 25%" class="table-border letra-componente alinear-izquierda">&nbsp;&nbsp;SI</td>
                                                                                                    <td
                                                                                                        @if( $estudio->formatoSM )
                                                                                                        @if( $estudio->formatoSM->familiar_empresa->familiar_empresa == '2' )
                                                                                                        style="background-color:#FF8000;width: 10%"
                                                                                                        @else
                                                                                                        style="width: 10%"
                                                                                                        @endif
                                                                                                        @endif>
                                                                                                    </td>
                                                                                                    <td style="width: 30%" class="table-border letra-componente alinear-izquierda">&nbsp;&nbsp;NO</td>

                                                                                                </tr>       
                                                                                                <tr>
                                                                                                    <td class="table-border letra-componente alinear-izquierda" style="width: 25%">
                                                                                                        <br>
                                                                                                        <p>
                                                                                                            ESPECIFICAR
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td  colspan="4" class="table-border letra-componente alinear-izquierda" style="width: 75%">
                                                                                                        <br>
                                                                                                        <p class="border-footer">
                                                                                                            @if( $estudio->formatoSM )
                                                                                                            @if( $estudio->formatoSM->familiar_empresa->familiar_empresa == '1' )
                                                                                                            {{ $estudio->formatoSM->familiar_empresa->familiar_empresa_si }}
                                                                                                            @else
                                                                                                            N/A
                                                                                                            @endif
                                                                                                            @endif
                                                                                                        </p>
                                                                                                    </td>
                                                                                                </tr>                                                               
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda">
                                                                                        <p>
                                                                                            {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->familiar_empresa->entero_vacante : '' }}
                                                                                        </p>
                                                                                        <p>
                                                                                            Nombre del reclutador: {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->familiar_empresa->reclutador : '' }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                {{-- INICIO REFERENCIAS PERSONALES--}}
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td colspan="3" class="table-border" style="width: 25%">
                                                                        <tr>
                                                                            <td colspan="3" class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <p class="alinear-centro titulo-componente-principal">
                                                                                                    REFERENCIAS PERSONALES
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        @if( $estudio->formatoSM )
                                                                                        @foreach ($estudio->formatoSM->referencias_personales  as $index => $referencia)
                                                                                        <tr>
                                                                                            <td colspan="3" class="table-border">
                                                                                                &nbsp;
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-centro table-border">
                                                                                                <table class="tabla-componente">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="width: 30%">
                                                                                                                <p class="letra-componente alinear-izquierda">
                                                                                                                    NOMBRE DE LA REFERENCIA
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td style="width: 40%">
                                                                                                                <p class="alinear-izquierda letra-componente">
                                                                                                                    {{ $referencia->nombre_referencia }}
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td style="width: 15%">
                                                                                                                <p class="letra-componente alinear-izquierda">
                                                                                                                    CELULAR:
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td style="width: 15%">
                                                                                                                <p class="alinear-izquierda letra-componente">
                                                                                                                    {{ $referencia->celular }}
                                                                                                                </p>
                                                                                                            </td>
                                                                                                        </tr>

                                                                                                        <tr>
                                                                                                            <td style="width: 30%">
                                                                                                                <p class="letra-componente alinear-izquierda">
                                                                                                                    DOMICILIO
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td style="width: 40%">
                                                                                                                <p class="alinear-izquierda letra-componente">
                                                                                                                    {{ $referencia->domicilio }}
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td style="width: 15%">
                                                                                                                <p class="letra-componente alinear-izquierda">
                                                                                                                    TELÉFONO
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td style="width: 15%">
                                                                                                                <p class="alinear-izquierda letra-componente">
                                                                                                                    {{ $referencia->telefono }}
                                                                                                                </p>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 30%">
                                                                                                                <p class="letra-componente alinear-izquierda">
                                                                                                                    OCUPACIÓN
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td style="width: 40%;">
                                                                                                                <p class="alinear-izquierda letra-componente">
                                                                                                                    {{ $referencia->ocupacion }}  
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td style="width: 15%">
                                                                                                                <p class="letra-componente alinear-izquierda">
                                                                                                                    TIEMPO DE CONOCERLO
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td style="width: 15%">
                                                                                                                <p class="alinear-izquierda letra-componente">
                                                                                                                    {{ $referencia->tiempo_conocerlo }} 
                                                                                                                </p>
                                                                                                            </td>

                                                                                                        </tr>

                                                                                                        <tr>
                                                                                                            <td colspan="4">
                                                                                                                <p class="justificar letra-componente">
                                                                                                                    {{ $referencia->comentarios }} 
                                                                                                                </p>
                                                                                                            </td>                                                            
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                        @endif
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </td>
                                                                </tr>                                     

                                                                {{-- FIN REFERENCIAS PERSONALES--}} 
                                                                {{-- INICO SITUACION SOCIAL --}}
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="alinear-centro titulo-componente-principal">
                                                                                            SITUACIÓN SOCIAL
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="alinear-centro letra-componente negrita">
                                                                                        ORGANIZACIONES A LAS QUE HA PERTENECIDO
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="alinear-centro letra-componente">
                                                                                        {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_social->pertenece_organizaciones : '' }}
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
                                                                    <td colspan="3" >
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="table-border">
                                                                                        <p class="alinear-izquierda letra-componente">
                                                                                            ¿ HA SIDO DETENIDO (A), O HA TENIDO ALGUNA DEMANDA LABORAL, CIVIL, MERCANTIL O PENAL ?
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="table-border">
                                                                                        <table class="tabla-componente">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td style="width: 10%">
                                                                                                        <p class="letra-componente alinear-centro">
                                                                                                            SI
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td class="alinear-centro"
                                                                                                        @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_social->demanda_laboral == '1' )
																										style="background-color:#FF8000;width: 10%;"
																										@else
																										style="width: 10%;"
                                                                                                        @endif 
                                                                                                        @endif>
                                                                                                    </td>
                                                                                                    <td style="width: 10%">
                                                                                                        <p class="letra-componente alinear-centro">
                                                                                                            NO
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td class="alinear-centro"
                                                                                                        @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_social->demanda_laboral == '2' )
                                                                                                        style="background-color:#FF8000;width: 10%;"
                                                                                                        @else
                                                                                                        style="width: 10%;"
                                                                                                        @endif 
                                                                                                        @endif>

                                                                                                    </td>
                                                                                                    <td style="width: 10%">
                                                                                                        <p class="letra-componente alinear-derecha">
                                                                                                            MOTIVO:
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td  class="letra-componente alinear-centro" style="width: 50%">
                                                                                                        @if( $estudio->formatoSM ) 
                                                                                                        @if( $estudio->formatoSM->situacion_social->demanda_laboral == '1' )
                                                                                                        {{ $estudio->formatoSM->situacion_social->motivo_demanda }}
                                                                                                        @else
                                                                                                        N/A
                                                                                                        @endif 
                                                                                                        @endif
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
                                                                    <td colspan="3" class="table-border">
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="letra-componente alinear-centro" style="width: 25%">
                                                                                        <p>
                                                                                            INTERESES A CORTO PLAZO
                                                                                        </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-centro" style="width: 25%">
                                                                                        <p>
                                                                                            INTERESES A MEDIANO PLAZO
                                                                                        </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-centro" style="width: 25%">
                                                                                        <p>
                                                                                            INTERESES A LARGO PLAZO
                                                                                        </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-centro" style="width: 25%">
                                                                                        <p>
                                                                                            ¿ CUALES SON SUS PRINCIPALES PASATIEMPOS ?
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 25%">
                                                                                        <p>
                                                                                            {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_social->interes_corto_plazo : '' }}
                                                                                        </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 25%">
                                                                                        <p>
                                                                                            {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_social->interes_mediano_plazo : '' }}
                                                                                        </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 25%">
                                                                                        <p>
                                                                                            {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_social->interes_largo_plazo : '' }}
                                                                                        </p>
                                                                                    </td>

                                                                                    <td class="letra-componente alinear-izquierda" style="width: 25%">
                                                                                        <p>
                                                                                            {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->situacion_social->pasatiempos : '' }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                                {{-- FIN SITUACION SOCIAL --}}

                                                                {{-- INICIO HABITOS Y COSTUMBRES --}}
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="alinear-centro titulo-componente-principal">
                                                                                            HABITOS Y COSTUMBRES
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="table-border">
                                                                                        <table class="tabla-componente">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 10%;">TIPO</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 10%;">SI</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 10%;">NO</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 10%;">CANTIDAD</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 10%;">DIARIO</th>
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 10%;">SEMANAL</th>   
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 10%;">QUINCENAL</th>   
                                                                                                    <th class="letra-componente alinear-centro negrita" style="width: 10%;">OCASIONAL</th>   

                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @if( $estudio->formatoSM )
                                                                                                @foreach( $estudio->formatoSM->habitos_detalle as $row )
                                                                                                <tr>
                                                                                                    <td class="letra-componente alinear-izquierda" style="width: 10%;">{{ $row->tipo }}</td>
                                                                                                    <td class="letra-componente alinear-centro"
                                                                                                        @if( $row->respuesta == '1' )
																										style="background-color:#FF8000; width: 10%;"
																										@else
																										style="width: 10%;"
                                                                                                        @endif>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-centro"
                                                                                                        @if( $row->respuesta == '2' )
                                                                                                            style="background-color:#FF8000; width: 10%;"
                                                                                                            @else
                                                                                                            style="width: 10%;"
                                                                                                        @endif>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-centro" style="width: 10%;">{{ $row->cantidad }}</td>
                                                                                                    <td class="letra-componente alinear-centro" style="width: 10%;">{{ $row->diario }}</td>
                                                                                                    <td class="letra-componente alinear-centro" style="width: 10%;">{{ $row->semanal }}</td>
                                                                                                    <td class="letra-componente alinear-centro" style="width: 10%;">{{ $row->quincenal }}</td>
                                                                                                    <td class="letra-componente alinear-centro" style="width: 10%;">{{ $row->ocasional }}</td>
                                                                                                    
                                                                                                </tr>  
                                                                                                @endforeach
                                                                                                @endif             
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
                                                                    <td colspan="3" class="table-border">
                                                                        <table class="auto-width">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 30%">
                                                                                        <p>
                                                                                            ¿REALIZA ALGUNA ACTIVIDAD?
                                                                                        </p>
                                                                                    </td>

                                                                                    <td class="alinear-centro letra-componente"
                                                                                            @if( $estudio->formatoSM ) 
                                                                                            @if( $estudio->formatoSM->habitos->realiza_actividad == '1' ) 
                                                                                            style="background-color:#FF8000;width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif
                                                                                            @endif>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                                        <p>
                                                                                            SI
                                                                                        </p>
                                                                                    </td>          
                                                                                    <td class="alinear-centro letra-componente"
                                                                                            @if( $estudio->formatoSM ) 
                                                                                            @if( $estudio->formatoSM->habitos->realiza_actividad == '2' ) 
                                                                                            style="background-color:#FF8000;width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif
                                                                                            @endif>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda table-border" colspan="5" style="width: 50%">
                                                                                        <p>
                                                                                            NO  
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3" class="table-border">
                                                                                        &nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                               
                                                                                <tr>
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 30%">
                                                                                        <p>
                                                                                            TIPO DE ACTIVIDAD
                                                                                        </p>
                                                                                    </td>
                                                                                    <td
                                                                                            @if( $estudio->formatoSM ) 
                                                                                            @if( $estudio->formatoSM->habitos->actividad_social == '1' ) 
                                                                                            style="background-color:#FF8000;width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif
                                                                                            @endif>
                                                                                    </td>  
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                                        <p>
                                                                                            SOCIAL
                                                                                        </p>
                                                                                    </td>
                                                                                    <td
                                                                                            @if( $estudio->formatoSM ) 
                                                                                            @if( $estudio->formatoSM->habitos->actividad_deportiva == '1' ) 
                                                                                            style="background-color:#FF8000;width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif
                                                                                            @endif>
                                                                                    </td> 
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                                        <p>
                                                                                            DEPORTIVA
                                                                                        </p>
                                                                                    </td>  
                                                                                    <td
                                                                                            @if( $estudio->formatoSM ) 
                                                                                            @if( $estudio->formatoSM->habitos->actividad_cultural == '1' ) 
                                                                                            style="background-color:#FF8000;width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif
                                                                                            @endif>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                                        <p>
                                                                                            CULTURAL
                                                                                        </p>
                                                                                    </td> 
                                                                                    
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3" class="table-border">
                                                                                        &nbsp;
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    
                                                                                
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 30%">
                                                                                        <p>
                                                                                            TIEMPO DEDICADO:
                                                                                        </p>
                                                                                    </td>
                                                                                    <td class="alinear-centro letra-componente"
                                                                                        
                                                                                            @if( $estudio->formatoSM ) 
                                                                                            @if( $estudio->formatoSM->habitos->tiempo_diario == '1' ) 
                                                                                            style="background-color:#FF8000;width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif
                                                                                            @endif>
                                                                                        
                                                                                    </td>  
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                                        <p>
                                                                                            DIARIO
                                                                                        </p>
                                                                                    </td>
                                                                                    <td class="alinear-centro letra-componente"
                                                                                            @if( $estudio->formatoSM ) 
                                                                                            @if( $estudio->formatoSM->habitos->tiempo_semanal == '1' ) 
                                                                                            style="background-color:#FF8000;width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif
                                                                                            @endif>
                                                                                    </td>  
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                                        <p>
                                                                                            SEMANAL
                                                                                        </p>
                                                                                    </td>  
                                                                                    <td class="alinear-centro letra-componente"
                                                                                            @if( $estudio->formatoSM ) 
                                                                                            @if( $estudio->formatoSM->habitos->tiempo_quincenal == '1' ) 
                                                                                            style="background-color:#FF8000;width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif
                                                                                            @endif>
                                                                                    </td>   
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                                        <p>
                                                                                            QUINCENAL
                                                                                        </p>
                                                                                    </td> 
                                                                                    <td class="alinear-centro letra-componente"
                                                                                            @if( $estudio->formatoSM ) 
                                                                                            @if( $estudio->formatoSM->habitos->tiempo_mensual == '1' ) 
                                                                                            style="background-color:#FF8000;width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif
                                                                                            @endif>
                                                                                    </td>  
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                                        <p>
                                                                                            MENSUAL
                                                                                        </p>
                                                                                    </td> 
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                {{-- FIN HABITOS Y COSTUMBRES --}}

                                                                {{-- INICIO DISPONIBILIDAD --}}
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td  colspan="3" style="width: 50%" class="table-border">
                                                                        <table class="auto-width">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="alinear-centro titulo-componente-principal">
                                                                                            DISPONIBILIDAD
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="alinear-centro table-border">
                                                                                        <table class="tabla-componente">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td style="width: 50%">
                                                                                                        <p class="letra-componente alinear-izquierda">
                                                                                                            SI ESTA EMPLEADO ACTUALMENTE, ¿POR QUÉ DESEA CAMBIAR?
                                                                                                        </p>                                                                            
                                                                                                    </td>
                                                                                                    <td style="width: 50%">
                                                                                                        <p class="alinear-izquierda letra-componente">
                                                                                                            {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->disponibilidad->empleado_actualmente : '' }}
                                                                                                        </p>                                                                            
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="width: 50%">
                                                                                                        <p class="letra-componente alinear-izquierda">
                                                                                                            ¿ESTA DISPUESTO A VIAJAR?
                                                                                                        </p>                                                                            
                                                                                                    </td>
                                                                                                    <td style="width: 50%">
                                                                                                        <p class="alinear-izquierda letra-componente">
                                                                                                            
                                                                                                            @if( $estudio->formatoSM )
                                                                                                                @if( $estudio->formatoSM->disponibilidad->dispuesto_viajar == '1')
                                                                                                                    Si
                                                                                                                @else
                                                                                                                    No
                                                                                                                @endif
                                                                                                            @endif
                                                                                                        </p>                                                                            
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="width: 50%">
                                                                                                        <p class="letra-componente alinear-izquierda">
                                                                                                            ¿A CAMBIAR DE RESIDENCIA?
                                                                                                        </p>                                                                            
                                                                                                    </td>
                                                                                                    <td style="width:50%"> 
                                                                                                        <p class="letra-componente alinear-izquierda">
                                                                                                            @if( $estudio->formatoSM )
                                                                                                                @if( $estudio->formatoSM->disponibilidad->cambiar_residencia == '1')
                                                                                                                    Si
                                                                                                                @else
                                                                                                                    No
                                                                                                                @endif
                                                                                                            @endif
                                                                                                        </p>                                                                            
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="width: 50%">
                                                                                                        <p class="letra-componente alinear-izquierda">
                                                                                                            ¿A PARTIR DE QUÉ FECHA PUEDE COMENZAR A TRABAJAR?
                                                                                                        </p>                                                                            
                                                                                                    </td>
                                                                                                    <td style="width: 50%">
                                                                                                        <p class="letra-componente alinear-izquierda">
                                                                                                            {{ isset( $estudio->formatoSM->disponibilidad) ? $estudio->formatoSM->disponibilidad->comenzar_trabajar: '' }}
                                                                                                        </p>                                                                            
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
                                                                <!-- ------------------------------------------------------------------ END DISPONIBILIDAD ----------------------------------- -->
                                                                {{-- FIN DISPONIBILIDAD --}}

                                                                {{-- INICO RASTREO INFONAVIT --}}
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>



                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="alinear-centro titulo-componente-principal">
                                                                                            RASTREO INFONAVIT
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="letra-componente alinear-centro">
                                                                                            {{ isset( $estudio->formatoSM ) ?
                                                                                                $estudio->formatoSM->rastreo_infonavit->codigo_rastreo : '' }}
                                                                                        </p>  
                                                                                    </td>

                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                {{-- FIN RASTREO INFONAVIT --}}



                                                                {{-- INICIO CROQUIS --}}
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" class="table-border" >
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="alinear-centro titulo-componente-principal">
                                                                                            CROQUIS DEL DOMICILIO
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3" style="width: 100%">
                                                                                        <div style="width: 100%;" class="alinear-centro"> 
                                                                                            @if( $estudio->imagenes->where('tipo','Ubicacion')->first() )
                                                                                             {{ Html::image(                                           
                                                                                                        $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                                                                        $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->archivo,
                                                                                                        '',
                                                                                                        ['style' => 'max-width:100%; height:auto;']
                                                                                            ) }}

                                                                                            @else                                       

                                                                                                {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',['style' => 'max-width:100%;']) !!}        

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
                                                                    <td colspan="3" class="table-border">

                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                        <p>
                                                                                            DISTANCIA DE SU CASA AL TRABAJO
                                                                                        </p>
                                                                                    </td>
                                                                                    <td>
                                                                                        <p class="label ">
                                                                                            {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->ubicacion_domicilio->distancia_domicilio: '' }}
                                                                                        </p>
                                                                                    </td style="width: 50%">
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                        <p>
                                                                                            MEDIO DE TRANSPORTE QUE UTILIZA
                                                                                        </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 50%;">
                                                                                        <p>
                                                                                            {{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->ubicacion_domicilio->transporte_utiliza: '' }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                                {{-- FIN CROQUIS --}}


                                                                {{-- INICIO FOTO EXTERIOR --}}
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" class="table-border" >
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="alinear-centro titulo-componente-principal">
                                                                                            FOTO DEL EXTERIOR DEL DOMICILIO
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="width: 10%">
                                                                                        <div style="width: 100%;" class="alinear-centro"> 

                                                                                            @if( $estudio->imagenes->where('tipo','Vivienda Exterior')->first() )
                                                                                                 {{ Html::image(                                           
                                                                                                    $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                                                                    $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first()->archivo,
                                                                                                    '',
                                                                                                    ['style' => 'max-width:100%;']

                                                                                                ) }}

                                                                                            @else                                        
                                                                                                {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo"]) !!}        
                                                                                            @endif
                                                                                        </div>

                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                                {{-- FIN FOTO EXTERIOR --}}

                                                                {{-- INICIO REFERENCIAS LABORAL --}}

                                                                @if( $estudio->formatoSM )
                                                                @foreach ($estudio->formatoSM->informacion_laboral  as $referencia)
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        <tr>
                                                                            <td colspan="3" class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <p class="alinear-centro titulo-componente-principal">
                                                                                                    INFORMACIÓN LABORAL
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-centro table-border">
                                                                                                <table class="tabla-componente">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td colspan="6" class="table-border" style="width: 100%;">
                                                                                                                <table class="tabla-componente">
                                                                                                                    <tbody>
                                                                                                                        <tr>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                                <p>
                                                                                                                                    EMPRESA
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td colspan="2" class="letra-componente alinear-izquierda" style="width: 55%;">
                                                                                                                                <p>
                                                                                                                                    {{ $referencia->empresa }}
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                                <p>
                                                                                                                                    TELÉFONO
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td colspan="2" class="letra-componente alinear-izquierda" style="width: 20%;">
                                                                                                                                <p>
                                                                                                                                    {{ $referencia->telefono }}
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                                <p>
                                                                                                                                    GIRO
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td colspan="2" class="letra-componente alinear-izquierda" style="width: 55%;">
                                                                                                                                <p>
                                                                                                                                    {{ $referencia->giro }} 
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                                <p>
                                                                                                                                    CELULAR
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td colspan="2" class="letra-componente alinear-izquierda" style="width: 20%;">
                                                                                                                                <p>
                                                                                                                                    {{ $referencia->celular }}  
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                <p>
                                                                                                                    DIRECCIÓN
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-izquierda" colspan="5" style="width: 50%;">
                                                                                                                <p>
                                                                                                                    {{ $referencia->direccion }}  
                                                                                                                </p>                                                                                    
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td colspan="6" class="table-border" style="width: 100%;">
                                                                                                                <table class="tabla-componente">
                                                                                                                    <tbody>
                                                                                                                        <tr>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 14%;">
                                                                                                                                <p>
                                                                                                                                    PUESTO INICIAL
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 21%;">
                                                                                                                                <p>
                                                                                                                                    {{ $referencia->puesto_inicial }}  
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                                <p>
                                                                                                                                    SUELDO INICIAL
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                                <p>$ 
                                                                                                                                    {{ number_format( floatval( $referencia->sueldo_inicial ),2) }}  
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                                <p>
                                                                                                                                    FECHA INGRESO
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                                <p>
                                                                                                                                    {{ $referencia->fecha_ingreso }} 
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 14%;">
                                                                                                                                <p>
                                                                                                                                    ÚLTIMO PUESTO
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 21%;">
                                                                                                                                <p>
                                                                                                                                    {{ $referencia->ultimo_puesto }} 
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 10%;">
                                                                                                                                <p>
                                                                                                                                    SUELDO FINAL
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                                <p>
                                                                                                                                    $
                                                                                                                                    {{ number_format( floatval( $referencia->sueldo_final ),2) }} 
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                                <p>
                                                                                                                                    FECHA EGRESO
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                                                <p>
                                                                                                                                    {{ $referencia->fecha_egreso }} 
                                                                                                                                </p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="letra-componente alinear-centro" colspan="2" style="width:33.33%;">
                                                                                                                <p>
                                                                                                                    NOMBRE DEL JEFE INMEDIATO
                                                                                                                </p>
                                                                                                            </td>                                                                                    
                                                                                                            <td class="letra-componente alinear-centro" colspan="2" style="width:33.33%;">
                                                                                                                <p>
                                                                                                                    PUESTO,  ÁREA Y DEPARTAMENTO
                                                                                                                </p>
                                                                                                            </td>                                                                                    
                                                                                                            <td class="letra-componente alinear-centro" colspan="2" style="width:33.33%;">
                                                                                                                <p>
                                                                                                                    TIEMPO QUE DEPENDIÓ DEL JEFE INMEDIATO
                                                                                                                </p>
                                                                                                            </td>                                                                                    
                                                                                                        </tr> 
                                                                                                        <tr>
                                                                                                            <td class="letra-componente alinear-centro" colspan="2" style="width:33.33%;">
                                                                                                                <p>
                                                                                                                    {{ $referencia->jefe_inmediato }}
                                                                                                                </p>
                                                                                                            </td>                                                                                    
                                                                                                            <td class="letra-componente alinear-centro" colspan="2" style="width:33.33%;">
                                                                                                                <p>
                                                                                                                    {{ $referencia->jefe_puesto }}
                                                                                                                </p>
                                                                                                            </td>                                                                                    
                                                                                                            <td class="letra-componente alinear-centro" colspan="2" style="width:33.33%;">
                                                                                                                <p>
                                                                                                                    {{ $referencia->jefe_tiempo_dependio }}    
                                                                                                                </p>
                                                                                                            </td>                                                                                    
                                                                                                        </tr> 
                                                                                                        <tr>
                                                                                                            <td class="letra-componente alinear-izquierda" colspan="6" style="width: 100%;">
                                                                                                                <p>
                                                                                                                    PRINCIPALES FUNCIONES: {{ $referencia->funciones }}
                                                                                                                </p>
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
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" class="table-border ">
                                                                        <tr>
                                                                            <td colspan="3" class="table-border">
                                                                                <table class="tabla-componente auto-width">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <p class="alinear-centro letra-componente negrita">
                                                                                                    EVALUACIÓN DE DESEMPEÑO
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-centro table-border" >
                                                                                                <table class="auto-width">
                                                                                                    <tbody class="alinear-centro"> 

                                                                                                        <tr>
                                                                                                            <td style="width: 50%">
                                                                                                                <p class="alinear-centro letra-componente">

                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 5%">
                                                                                                                <p>
                                                                                                                    EXCELENTE 

                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 5%">
                                                                                                                <p>
                                                                                                                    BUENO
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 5%">
                                                                                                                <p>
                                                                                                                    REGULAR
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 5%">
                                                                                                                <p>
                                                                                                                    MALO
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 5%">
                                                                                                                <p>
                                                                                                                    PÉSIMO 
                                                                                                                </p>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>                                                                               
                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    ASISTENCIA
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 
                                                                                                                    @if( $referencia->asistencia == '1' )
                                                                                                                    style="background-color:#FF8000;width: 5%;"
                                                                                                                    @else
                                                                                                                    style="width: 5%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->asistencia == '2' )
                                                                                                                    style="background-color:#FF8000;width: 5%;"
                                                                                                                    @else
                                                                                                                    style="width: 5%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                    @if( $referencia->asistencia == '3' )
                                                                                                                    style="background-color:#FF8000;width: 5%;"
                                                                                                                    @else
                                                                                                                    style="width: 5%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                    @if( $referencia->asistencia == '4' )
                                                                                                                    style="background-color:#FF8000;width: 5%;"
                                                                                                                    @else
                                                                                                                    style="width: 5%;"          
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                    @if( $referencia->asistencia == '5' )
                                                                                                                    style="background-color:#FF8000;width: 5%;"
                                                                                                                    @else
                                                                                                                    style="width: 5%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>                                                                               
                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    PUNTUALIDAD
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td
                                                                                                                    @if( $referencia->puntualidad == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td     @if( $referencia->puntualidad == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                    @if( $referencia->puntualidad == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->puntualidad == '4' )
                                                                                                                    style="background-color:#FF8000;width:10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->puntualidad == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>

                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    HONRADEZ
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 	@if( $referencia->honradez == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->honradez == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                    @if( $referencia->honradez == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                    @if( $referencia->honradez == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->honradez == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>

                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    RESPONSABILIDAD
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 

                                                                                                                    @if( $referencia->responsabilidad == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->responsabilidad == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->responsabilidad == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->responsabilidad == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->responsabilidad == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>

                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    DISPONIBILIDAD
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 
                                                                                                                    @if( $referencia->disponibilidad == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->disponibilidad == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->disponibilidad == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->disponibilidad == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                    @if( $referencia->disponibilidad == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>

                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    COMPROMISO CON LA EMPRESA
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 

                                                                                                                    @if( $referencia->compromiso == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->compromiso == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->compromiso == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->compromiso == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->compromiso == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>

                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    INICIATIVA
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td

                                                                                                                    @if( $referencia->iniciativa == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->iniciativa == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            <td 
                                                                                                                    @if( $referencia->iniciativa == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->iniciativa == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->iniciativa == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>

                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    CALIDAD DE TRABAJO
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 	@if( $referencia->calidad_trabajo == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->calidad_trabajo == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            <td 
                                                                                                                    @if( $referencia->calidad_trabajo == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->calidad_trabajo == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->calidad_trabajo == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>


                                                                                                        <tr>

                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    TRABAJO EN EQUIPO
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 

                                                                                                                    @if( $referencia->trabajo_equipo == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trabajo_equipo == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trabajo_equipo == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trabajo_equipo == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trabajo_equipo == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>

                                                                                                        <tr>

                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    TRABAJO BAJO PRESIÓN
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 

                                                                                                                    @if( $referencia->trabajo_presion == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trabajo_presion == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trabajo_presion == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trabajo_presion == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trabajo_presion == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>

                                                                                                        <tr>

                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    TRATO CON EL JEFE
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 

                                                                                                                    @if( $referencia->trato_jefe == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trato_jefe == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trato_jefe == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trato_jefe == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trato_jefe == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>

                                                                                                        <tr>                                                                               
                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    TRATO CON COMPAÑEROS
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 

                                                                                                                    @if( $referencia->trato_companeros == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trato_companeros == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trato_companeros == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trato_companeros == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->trato_companeros == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>                                                                               
                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    PRODUCTIVIDAD/CAPACIDAD
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 

                                                                                                                    @if( $referencia->productividad_capacidad == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->productividad_capacidad == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->productividad_capacidad == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->productividad_capacidad == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->productividad_capacidad == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>                                                                               
                                                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                                                <p>
                                                                                                                    LIDERAZGO
                                                                                                                </p>
                                                                                                            </td>

                                                                                                            <td 

                                                                                                                    @if( $referencia->liderazgo == '1' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->liderazgo == '2' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->liderazgo == '3' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->liderazgo == '4' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td 
                                                                                                                    @if( $referencia->liderazgo == '5' )
                                                                                                                    style="background-color:#FF8000;width: 10%;"
                                                                                                                    @else
                                                                                                                    style="width: 10%;"
                                                                                                                    @endif>
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
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>                                                                
                                                                <tr>
                                                                    <td colspan="3" class="table-border">
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="letra-componente alinear-centro" style="width: 50%">
                                                                                        <p>
                                                                                            TIPO DE CONTRATO
                                                                                        </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-centro" style="width: 50%">
                                                                                        <p>
                                                                                            MOTIVO DE SEPARACIÓN
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="width: 50%">
                                                                                        <p class="alinear-centro letra-componente">
                                                                                            {{ $referencia->tipo_contrato }} 

                                                                                        </p>
                                                                                    </td>
                                                                                    <td style="width: 50%">
                                                                                        <p class="alinear-centro letra-componente">
                                                                                            {{ $referencia->motivo_separacion }}
                                                                                        </p>
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
                                                                        <tr>
                                                                            <td  colspan="3" class="table-border" >
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="letra-componente alinear-izquierda" style="width: 33%">
                                                                                                <p>
                                                                                                    ¿EXISTE ALGÚN ADEUDO?
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda" style="width: 33%">
                                                                                                <p>
                                                                                                    ¿PERTENECIÓ A ALGÚN SINDICATO?
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda" style="width: 33%">
                                                                                                <p>
                                                                                                    ¿LO CONTRATARÍAN NUEVAMENTE?
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="table-border" style="width: 33%">
                                                                                                <table>
                                                                                                    <tbody>
                                                                                                        <tr>

                                                                                                            <td class="alinear-centro letra-componente"
                                                                                                                    @if( $referencia->adeudo == '1' )
                                                                                                                    style="background-color:#FF8000;width:20%"
                                                                                                                    @else
                                                                                                                    style="width:20%"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                                                                <p>
                                                                                                                    SI
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td class="alinear-centro letra-componente"
                                                                                                                    @if( $referencia->adeudo == '2' )
                                                                                                                    style="background-color:#FF8000;width:20%"
                                                                                                                    @else
                                                                                                                    style="width:20%"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                                                                <p>
                                                                                                                    NO
                                                                                                                </p>
                                                                                                            </td>


                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                            <td class="table-border" style="width: 33%">
                                                                                                <table>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td class="alinear-centro letra-componente"
                                                                                                                    @if( $referencia->sindicato == '1' )
                                                                                                                    style="background-color:#FF8000; width: 8%"
                                                                                                                    @else
                                                                                                                    style="width: 8%"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-centro table-border" style="width: 10%">
                                                                                                                <p>
                                                                                                                    SI
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td class="alinear-centro letra-componente"
                                                                                                                    @if( $referencia->sindicato == '2' )
                                                                                                                    style="background-color:#FF8000; width: 8%"
                                                                                                                    @else
                                                                                                                    style="width: 8%"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-centro table-border" style="width: 10%">
                                                                                                                <p>
                                                                                                                    NO
                                                                                                                </p>
                                                                                                            </td>
                                                                                                        </tr>


                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                            <td class="table-border" style="width: 33%">
                                                                                                <table>
                                                                                                    <tbody>
                                                                                                        <tr> 
                                                                                                        	<td class="alinear-centro letra-componente"
                                                                                                                    @if( $referencia->contratar_nuevamente == '1' )
                                                                                                                    style="background-color:#FF8000; width: 20%;"
                                                                                                                    @else
                                                                                                                    style="width: 20%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-centro table-border" style="width: 10%">
                                                                                                                <p>
                                                                                                                    SI
                                                                                                                </p>
                                                                                                            </td>
                                                                                                            <td class="alinear-centro letra-componente"
                                                                                                                    @if( $referencia->contratar_nuevamente == '2' )
                                                                                                                    style="background-color:#FF8000; width: 20%;"
                                                                                                                    @else
                                                                                                                    style="width: 20%;"
                                                                                                                    @endif>
                                                                                                            </td>
                                                                                                            <td class="letra-componente alinear-centro table-border" style="width: 10%">
                                                                                                                <p>
                                                                                                                    NO
                                                                                                                </p>
                                                                                                            </td>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>

                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
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
                                                                                        <td>
                                                                                            <p class="letra-componente alinear-centro negrita">
                                                                                                OBSERVACIONES
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <p class="letra-componente justificar">
                                                                                                {{ $referencia->observaciones }}
                                                                                            </p>
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
                                                                            <tr>
                                                                                <td  colspan="3" class="table-border" style="width: 100%">
                                                                                    <table class="tabla-componente" >
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="letra-componente alinear-centro" style="width: 15%;">
                                                                                                    <p>
                                                                                                        INFORMÓ
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td style="width: 35%;">
                                                                                                    <p class="justificar letra-componente">
                                                                                                        {{ $referencia->informo}}  
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td class="letra-componente alinear-centro" style="width: 15%;">
                                                                                                    <p>
                                                                                                        PUESTO
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td style="width: 35%;">
                                                                                                    <p class="justificar letra-componente">
                                                                                                        {{ $referencia->puesto_informa}}   
                                                                                                    </p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    @endif





                                                                    <!---------------------------------------   END REFERENCIAS LABORALES ----------------------------------------- -->



                                                                </tbody>
                                                            </table>
                                                            <script>
                                                                window.print();
                                                            </script>




                                                        </body>
                                                        </html>
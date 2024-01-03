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
                <td class="letra-componente negrita alinear-izquierda">
                <div class="number-page">
                        
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
                <td class="fecha-plantilla table-border" style="width: 100%">
                    <table class="table-border">
                        <thead>
                            <tr>
                                <th class="letra-componente alinear-centro" style="width: 33%">MES</th>
                                <th class="letra-componente alinear-centro" style="width: 33%">DÍA</th>
                                <th class="letra-componente alinear-centro" style="width: 33%">AÑO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="alinear-centro letra-componente" style="width: 33%">                                    
                                    {{ $estudio->mes_visita }}                                    
                                </td>
                                <td class="alinear-centro letra-componente" style="width: 33%">                                    
                                    {{ $estudio->dia_visita }}                                    
                                </td>
                                <td class="alinear-centro letra-componente" style="width: 33%">                                    
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
                                <td class="letra-componente alinear-izquierda" style="width: 80%;">Gen-t</td>
                                

                            </tr>
                            <tr>                                             
                                <td class="letra-componente alinear-izquierda" style="width: 20%;">Nombre</td>
                                <td class="letra-componente alinear-izquierda" style="width: 80%;">            
                                    {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
                                </td>

                            </tr>
                            <tr>                                             
                                <td class="letra-componente alinear-izquierda" style="width: 20%;">Puesto</td>
                                <td class="letra-componente alinear-izquierda" style="width: 80%;">
                                    {{ isset( $estudio->formatoGent->resumen ) ? $estudio->formatoGent->resumen->puesto : '' }}
                                </td>

                            </tr>
                            <tr>
                                <td colspan="3" class="table-border">
                                    &nbsp;
                                </td>
                            </tr> 
                            <tr>
                                <td colspan="3" class="table-border">
                                    <p class="letra-componente justificar">
                                        El presente estudio socioeconómico se basa en la investigación de tres áreas: Socioeconómica, Laboral y Personal. Por lo que a continuación se muestra un breve resumen de la investigación  por área, para más detalles revisar el contenido.                                                      
                                    </p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
                <td class="table-border">
                    <table class="table-border auto-width">                                        
                        <tbody>
                            <tr>
                                <td  class="alinear-centro" class="table-border">

                                    <div class="alinear-centro">
                                        
                                    @if( $estudio->imagenes->where('tipo','Candidato')->first() )
                                    {{ Html::image(                                           
                                    $estudio->imagenes->where('tipo','Candidato')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                    $estudio->imagenes->where('tipo','Candidato')->sortByDesc('fecha_alta')->first()->archivo,
                                    '',
                                    ['style' => 'width:100%;height: auto;']
                        
                                     ) }}

                                    @else                                       

                                    {!! Html::image('imagenes/candidato-anonimo-default.jpg','',["class"=>"imagen-upload-vivienda"]) !!} 

                                    @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="alinear-centro"  rowspan="3"
                                @if( $estudio->formatoGent )
                                    @if( $estudio->formatoGent->resumen->status == '1' )
                                        style="width: 20%;background-color:#499B61;color:white;"
                                    @elseif( $estudio->formatoGent->resumen->status == '2' )
                                        style="width: 20%;background-color:#FF8000;color:white;"
                                    @else
                                        style="width: 20%;background-color:#FF0000;color:white;"
                                    @endif
                                @endif    
                                >
                                
                                    
                                    @if( $estudio->formatoGent )
                                        @if( $estudio->formatoGent->resumen->status == '1' )
                                            APTO
                                        @elseif( $estudio->formatoGent->resumen->status == '2' )
                                            APTO CON RESERVA
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
                    &nbsp;
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
                                    <p class="letra-componente justificar">
                                        {{ isset( $estudio->formatoGent ) ?  $estudio->formatoGent->resumen->situacion_socioeconomica :'' }}
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
                                        {{ isset( $estudio->formatoGent ) ?  $estudio->formatoGent->resumen->escolaridad :'' }}
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
                                        {{ isset( $estudio->formatoGent ) ?  $estudio->formatoGent->resumen->trayectoria_laboral :'' }}
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
                                <td class="table-border">
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
                                                <th class="titulo-componente alinear-centro" style="width: 20%;">VALOR</th>  
                                                <th class="titulo-componente alinear-centro" style="width: 10%;">BUENA</th>  
                                                <th class="titulo-componente alinear-centro" style="width: 10%;">REGULAR</th>  
                                                <th class="titulo-componente alinear-centro" style="width: 10%;">MALA</th>  
                                                <th class="titulo-componente alinear-centro" style="width: 50%;">COMENTARIOS</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="letra-componente alinear-izquierda" style="width: 20%;">
                                                    DISPONIBILIDAD
                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoGent )
                                                    @if( $estudio->formatoGent->resumen->disponibilidad == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>


                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoGent )
                                                    @if( $estudio->formatoGent->resumen->disponibilidad == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoGent )
                                                    @if( $estudio->formatoGent->resumen->disponibilidad == '3' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>

                                                <td class="letra-componente justificar" rowspan="7" style="width: 50%;">
                                                    {{ isset( $estudio->formatoGent ) ?  $estudio->formatoGent->resumen->comentarios :  '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="letra-componente alinear-izquierda" style="width: 20%;">
                                                    PUNTUALIDAD
                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoGent )
                                                    @if( $estudio->formatoGent->resumen->puntualidad == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoGent )
                                                    @if( $estudio->formatoGent->resumen->puntualidad == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoGent )
                                                    @if( $estudio->formatoGent->resumen->puntualidad == '3' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="letra-componente alinear-izquierda" style="width: 20%;">
                                                    PRESENTACION
                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoGent )
                                                    @if( $estudio->formatoGent->resumen->presentacion == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoGent )
                                                    @if( $estudio->formatoGent->resumen->presentacion == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoGent )
                                                    @if( $estudio->formatoGent->resumen->presentacion == '3' )
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
                <td colspan="3" class="table-border">
                    <div class="box">

                        <p class="letra-componente alinear-izquierda">
                            La entrevista se llevo a cabo en casa, en compañía de, su actitud fue  y sus respuestas fueron:
                        </p>
                        <table class="auto-width">
                            <tbody>
                                <tr>
                                    <td class="letra-componente alinear-derecha table-border" style="width: 10%;">Claras&nbsp;</td>
                                    <td 
                                        @if( $estudio->formatoGent )
                                            @if( $estudio->formatoGent->resumen->respuestas == '1' )
                                                style="background-color:#FF8000; width:10%;"
                                            @else
                                                style="width:10%;"
                                            @endif
                                        @endif>
                                    </td>
                                    <td class="letra-componente alinear-derecha table-border" style="width: 10%;">Concretas&nbsp;</td>
                                    <td 
                                        @if( $estudio->formatoGent )
                                            @if( $estudio->formatoGent->resumen->respuestas == '2' )
                                                style="background-color:#FF8000; width:10%;"
                                            @else
                                                style="width:10%;"
                                            @endif
                                        @endif>
                                    </td>
                                    <td class="letra-componente alinear-derecha table-border" style="width: 10%;">Fluidas&nbsp;</td>
                                    <td 
                                        @if( $estudio->formatoGent )
                                            @if( $estudio->formatoGent->resumen->respuestas == '3' )
                                                style="background-color:#FF8000; width:10%;"
                                            @else
                                                style="width:10%;"
                                            @endif
                                        @endif>
                                    </td>
                                    <td class="letra-componente alinear-derecha table-border" style="width: 10%;">Confusas&nbsp;</td>
                                    <td 
                                        @if( $estudio->formatoGent )
                                            @if( $estudio->formatoGent->resumen->respuestas == '4' )
                                                style="background-color:#FF8000; width:10%;"
                                            @else
                                                style="width:10%;"
                                            @endif
                                        @endif>
                                    </td>
                                    <td class="letra-componente alinear-derecha table-border" style="width: 10%;">Incompletas&nbsp;</td>
                                    <td 
                                        @if( $estudio->formatoGent )
                                            @if( $estudio->formatoGent->resumen->respuestas == '5' )
                                                style="background-color:#FF8000; width:10%;"
                                            @else
                                                style="width:10%;"
                                            @endif
                                        @endif>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <br>
                    </div>                    
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
                                        5. Incidentes de Seguridad en la Información
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="letra-componente justificar">
                                        {{ isset( $estudio->formatoGent ) ?  $estudio->formatoGent->resumen->incidentes_seguridad :'' }}
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
                    <div class="box">

                        <p class="titulo-componente alinear-centro">
                            REALIZÓ INVESTIGACIÓN:
                        </p>             

                        <p class="alinear-centro ">
                            <p style="width:180px;">                                
                            {{ Html::image( $estudio->ejecutivoPrincipal->first()->imagen_firma ,'',['style' => 'width:100%;height:auto;margin-left:270px;']) }}
                            </p>
                        </p>              

                        <p class="letra-componente alinear-centro border-top box-firma">
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
            <tr>
                <td colspan="3" class="table-border">
                    &nbsp;
                </td>
            </tr> 
            {{-- ****************************************** INICIO DATOS GENERALES ****************************************** --}}
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
                                                        @if( $estudio->formatoGent )
                                                        @if( $estudio->formatoGent->datos_generales->sexo == '1')
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
                                                <td class="letra-componente alinear-izquierda" style="width:13%;">EDAD:</td>
                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                    <p>
                                                        {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->edad : '' }}
                                                    </p>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width:13%;">FECHA DE NAC.:</td>
                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                    <p>
                                                        {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->fecha_nacimiento : '' }}</p>
                                                    </td>
                                                    <td class="letra-componente alinear-izquierda" style="width:14%;">LUGAR DE NAC. :</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->lugar_nacimiento : '' }}
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
                                                    <td class="letra-componente alinear-izquierda" style="width:13%;">NACIONALIDAD:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->nacionalidad : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="letra-componente alinear-izquierda" style="width:13%;">ESTADO CIVIL:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->edo_civil : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="letra-componente alinear-izquierda" style="width:14%;">FECHA DE MATRIMONIO:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p> 
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->fecha_matrimonio : '' }}
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
                                                    <td class="letra-componente alinear-izquierda" style="width:13%;">CALLE:</td>
                                                    <td  colspan="3" class="letra-componente alinear-izquierda" style="width:87%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->calle : ''}}
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
                                                    <td class="letra-componente alinear-izquierda" style="width:13%;">NÚMERO EXTERIOR:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->no_exterior : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="letra-componente alinear-izquierda" style="width:13%;">NÚMERO INTERIOR:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->no_interior : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="letra-componente alinear-izquierda" style="width:14%;">DELEGACIÓN Ó MUNICIPIO:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p> 
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->delegacion : '' }}
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
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->colonia : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="letra-componente alinear-izquierda" style="width:13%;">EMAIL:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->email : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="letra-componente alinear-izquierda" style="width:14%;">TELÉFONO:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p> 
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->telefono : '' }}
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
                                                    <td class="letra-componente alinear-izquierda" style="width:13%;">C.P.</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->cp : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="letra-componente alinear-izquierda" style="width:13%;">TIEMPO EN EL DOMICILIO:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->tiempo_domicilio : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="letra-componente alinear-izquierda" style="width:14%;">CELULAR:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p> 
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->celular : '' }}
                                                        </p>
                                                    </td>                                                
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-border">
                                        <table  class="auto-width">
                                            <tbody>
                                                <tr>
                                                    <td  class="letra-componente alinear-izquierda" style="width:13%;">PUESTO:</td>
                                                    <td colspan="4" class="letra-componente alinear-izquierda" style="width:53%;">
                                                        <p> 
                                                            {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->datos_generales->puesto : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="letra-componente alinear-izquierda" style="width:14%;">TELÉFONO RECADOS:</td>
                                                    <td  colspan="3" class="letra-componente alinear-izquierda" style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->datos_generales->telefono_recados : '' }}
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
                                                    <td  class="letra-componente alinear-izquierda" style="width:30%;">ENTRE QUE CALLES SE ENCUENTRA EL DOMICILIO:</td>
                                                    <td class="letra-componente alinear-izquierda" style="width:70%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoGent->datos_generales ) ? $estudio->formatoGent->datos_generales->entre_calles : '' }}  </p>
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
                                        <td class="letra-componente alinear-centro negrita" style="width: 60%;">No. DE CERTIFICADO</td>
                                        <td class="letra-componente alinear-centro negrita" style="width: 15%;">ORIGINAL/COPIA</td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">ACTA DE NACIMIENTO</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>

                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12%;">ACTA:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 13%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->acta_no : '' }}
                                                            </p>
                                                        </td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12%;">AÑO:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 13%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->acta_anio : '' }}
                                                            </p>
                                                        </td> 
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12%;">LIBRO:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 13%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->acta_libro : '' }}
                                                            </p>
                                                        </td> 
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12%;">OFICIALIA:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 13%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->acta_oficialia : '' }}
                                                            </p>
                                                        </td> 

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;"><p> 
                                            {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->acta_corroboro : '' }}
                                        </p></td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">INE ( VIGENTE )</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">CLAVE:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->ine_clave_: '' }}
                                                            </p>
                                                        </td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">NÚMERO:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->ine_no: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="table-border" style="width: 100%">
                                                            <table class="auto-width">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width:50%;">COINCIDE CON DIRECCIÓN ACTUAL:</td>
                                                                        <td class="letra-componente alinear-derecha table-border" style="width:20%;">SI&nbsp;</td>
                                                                        <td 
                                                                            @if( $estudio->formatoGent)
                                                                                @if( $estudio->formatoGent->documentacion->ine_direccion_actual == '1')
                                                                                    style="background-color:#FF8000; width: 5%;"
                                                                                @endif
                                                                                @else
                                                                                style="width: 5%;"

                                                                            @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-derecha table-border" style="width:20%;">NO&nbsp;</td>
                                                                        <td 
                                                                             @if( $estudio->formatoGent)
                                                                                @if( $estudio->formatoGent->documentacion->ine_direccion_actual == '2')
                                                                                    style="background-color:#FF8000; width: 5%;"
                                                                                @endif
                                                                                @else
                                                                                style="width: 5%;"

                                                                            @endif>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 25%;">DIRECCIÓN:</td>
                                                        <td colspan="5" class="letra-componente alinear-izquierda table-border" >
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->ine_direccion: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-detalle-jll-label" style="width:15%;">
                                            <p> 
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->ine__corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">CURP</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">
                                                            {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->curp : '' }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->curp_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">RFC</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda table-border" style="width:60%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->rfc_no : '' }}
                                            </p>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->rfc_corroboro: '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">AFORE</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>

                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 15%;">NÚMERO:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 35%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->afore_no : '' }}
                                                            </p>
                                                        </td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 15%;">INSTITUCIÓN:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 35%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->afore_institucion : '' }}
                                                            </p>
                                                        </td> 

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->afore_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">NO. DE AFILIACIÓN AL IMSS</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda table-border" style="width:60%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->nss_no : '' }}
                                            </p>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->nss_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">COMPROBANTE DE ESTUDIOS</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:20%;">INSTITUCIÓN:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:80%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->ce_institucion: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:20%;">DOCUMENTO:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:80%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->ce_documento: '' }}
                                                            </p>
                                                        </td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:20%;">FOLIO:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:80%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->ce_folio: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:20%;">GRADO:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:80%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->ce_grado: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:20%;">LICENCIATURA:</td>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:80%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->ce_licenciatura: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->ce_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">COMPROBANTE DE DOMICILIO</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">TITULAR:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->cd_titular: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">SERVICIO Y FECHA:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->cd_servicio_fecha: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->cd_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">LICENCIA DE MANEJO</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">TIPO:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->licencia_manejo_tipo: '' }}
                                                            </p>
                                                        </td> 
                                                    </tr>
                                                    <tr>                                                           
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">NÚMERO Y VIGENCIA:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->licencia_manejo_no_vig: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->licencia_manejo_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">CÉDULA PROFESIONAL</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%">NÚMERO:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->cedula_no: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->cedula_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">PASAPORTE</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">NÚMERO:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->pasaporte_no: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->pasaporte_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">CRÉDITO INFONAVIT</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">NÚMERO:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->infonavit_no: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->infonavit_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">CRÉDITO FONACOT</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">NÚMERO:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->fonacot_no: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->fonacot_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">CARTILLA DE SERVICIO MILITAR NACIONAL</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">MATRICULA:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->cartilla_matricula: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">LIBERACIÓN:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->cartilla_liberacion: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->cartilla_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border">ACTA DE MATRIMONIO</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">JUZGADO:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->actam_juzgado: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">NÚMERO:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->actam_no: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->actam_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente alinear-izquierda">ÚLTIMO RECIBO DE PERCEPCIONES</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:60%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">EMPRESA:</td>
                                                        <td colspan="3" class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->recibo_percepciones_empresa: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">PUESTO:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->recibo_percepciones_puesto: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width:25%;">INGRESO:</td>
                                                        <td  class="letra-componente alinear-izquierda table-border" style="width:75%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->recibo_percepciones_ingreso: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->documentacion->recibo_percepciones_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr> 
                                </tbody>
                            </table>
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
                                                <p class="alinear-centro titulo-componente negrita">
                                                    OBSERVACIONES
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="letra-componente justificar">
                                                    {{ isset($estudio->formatoGent ) ?$estudio->formatoGent->documentacion->observaciones : '' }}
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
                                            <td colspan="2">
                                                <p class="alinear-centro titulo-componente-principal">
                                                    ESCOLARIDAD
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="table-border">
                                                <table class="tabla-componente">
                                                    <thead>
                                                        <tr>
                                                            <th class="letra-componente alinear-centro negrita" style="width: 10%;">GRADO</th>
                                                            <th class="letra-componente alinear-centro negrita" style="width: 25%;">INSTITUCIÓN</th>
                                                            <th class="letra-componente alinear-centro negrita" style="width: 25%;">DOMICILIO</th>
                                                            <th class="letra-componente alinear-centro negrita" style="width: 10%;">PERIODO</th>
                                                            <th class="letra-componente alinear-centro negrita" style="width: 10%;">AÑOS</th>
                                                            <th class="letra-componente alinear-centro negrita" style="width: 10%;">COMPROBANTE</th>   
                                                            <th class="letra-componente alinear-centro negrita" style="width: 10%;">FOLIO</th>   

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( $estudio->formatoGent )
                                                        @foreach( $estudio->formatoGent->escolaridad as $row )
                                                        <tr>                                                                             
                                                            <td style="width: 10%;"><p class="letra-componente alinear-izquierda">{{ $row->grado  }}</p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 25%;"><p>{{ $row->institucion }}</p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 25%;"><p>{{ $row->domicilio }}</p></td>
                                                            <td class="letra-componente alinear-izquierda alinear-centro" style="width: 10%;"><p>{{ $row->periodo }}</p></td>
                                                            <td class="letra-componente alinear-izquierda alinear-centro" style="width: 10%;"><p>{{ $row->anios }}</p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 10%;"><p>{{ $row->comprobante }}</p></td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 10%;"><p>{{ $row->folio }}</p></td>
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
                                            <td style="width: 35%;">
                                                <p class="letra-componente alinear-izquierda">
                                                    Si es trunco, ¿Por qué abandonó sus estudios?
                                                </p>
                                            </td>
                                            <td style="width: 65%;">
                                                <p class="letra-componente alinear-izquierda">
                                                    {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->escolaridad_obs->trunco_abandono : '' }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>                                                                        
                                            <td style="width: 35%;">
                                                <p class="letra-componente alinear-izquierda">
                                                    Si está estudiando, ¿Qué días y en qué horario?
                                                </p>
                                            </td>
                                            <td style="width: 65%;">
                                                <p class="letra-componente alinear-izquierda">
                                                    {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->escolaridad_obs->estudia_horario : '' }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                &nbsp;
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td colspan="2" class="table-border">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <p class="alinear-centro titulo-componente negrita">
                                                                    OBSERVACIONES
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-componente justificar">
                                                                    {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->escolaridad_obs->observaciones : '' }}
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

                                                        @if( $estudio->formatoGent)
                                                        @foreach ($estudio->formatoGent->cursos as $curso)
                                                        <tr>
                                                            <td class="letra-componente alinear-derecha table-border" style="width:10%;">DE</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width:15%;">
                                                                <p class="border-footer">
                                                                    &nbsp;&nbsp;&nbsp;{{ $curso->de}}
                                                                </p>
                                                            </td>               
                                                            <td class="letra-componente alinear-derecha table-border" style="width:10%;">REALIZÓ</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width:40%;">
                                                                <p class="border-footer">
                                                                    &nbsp;&nbsp;&nbsp;{{ $curso->curso}}
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
                                                            <th class="letra-componente alinear-centro" style="width:5%;">#</th>
                                                            <th class="letra-componente alinear-centro" style="width:12%;">IDIOMA</th>
                                                            <th class="letra-componente alinear-centro" style="width:12%;">HABLADO</th>
                                                            <th class="letra-componente alinear-centro" style="width:12%;">LEÍDO</th>
                                                            <th class="letra-componente alinear-centro" style="width:12%;">ESCRITO</th>
                                                            <th class="letra-componente alinear-centro" style="width:12%;">COMPRENSIÓN</th>
                                                            <th class="letra-componente alinear-centro" style="width:12%;">%</th>
                                                            <th class="letra-componente alinear-centro" style="width:12%;">ESCALA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( $estudio->formatoGent)
                                                        @foreach ($estudio->formatoGent->idiomas as $index => $idioma )
                                                        <tr>  
                                                            <td class="letra-componente alinear-centro" style="width:5%;">
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
                                                                    {{ (($idioma->hablado+$idioma->leido+$idioma->escrito+$idioma->comprension)/4) }}
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
                                                                <th class="label alinear-centro" style="width:5%;">#</th>
                                                                <th class="label alinear-centro" style="width:81%;">PAQUETERIA</th>
                                                                <th class="label alinear-centro" style="width:12.5%;">%</th>                                                                    
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if( $estudio->formatoGent )
                                                            @foreach ($estudio->formatoGent->conocmientos_habilidades as $index => $conocimiento)
                                                            <tr>
                                                                <td class="letra-componente alinear-centro" style="width:5%;">
                                                                    <p>
                                                                        {{ ($index+1) }}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:81%;">
                                                                    <p>
                                                                        {{ $conocimiento->paqueteria }} 
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-centro" style="width:12.5%;">
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
                                                        <thead>
                                                            <tr>
                                                                <th class="letra-componente alinear-centro" style="width: 15%;">PARENTESCO</th>
                                                                <th class="letra-componente alinear-centro" style="width: 20%;">NOMBRE</th>
                                                                <th class="letra-componente alinear-centro" style="width: 10%;">EDAD</th>
                                                                <th class="letra-componente alinear-centro" style="width: 20%;">EDO. CIVIL</th>
                                                                <th class="letra-componente alinear-centro" style="width: 10%;">OCUPACIÓN (Empresa)</th>
                                                                <th class="letra-componente alinear-centro" style="width: 25%;">DOMICILIO</th>   

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if( $estudio->formatoGent )
                                                            @foreach( $estudio->formatoGent->datos_familiares as $familiar )
                                                            <tr>                                                                             
                                                                <td class="letra-componente alinear-izquierda" style="width: 15%;"><p>{{ $familiar->parentesco  }}</p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width: 20%;"><p>{{ $familiar->nombre }}</p></td>
                                                                <td class="letra-componente alinear-centro" style="width: 10%;"><p>{{ $familiar->edad }}</p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width: 20%;"><p>{{ $familiar->edo_civil }}</p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width: 10%;"><p>{{ $familiar->ocupacion }}</p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width: 25%;"><p>{{ $familiar->domicilio }}</p></td>
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
                                    <table class="tabla-componente">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <p class="alinear-centro titulo-componente-principal">
                                                        INFORMACIÓN FAMILIAR
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>                                                                        
                                                <td style="width: 40%;">
                                                    <p class="letra-componente alinear-izquierda">
                                                        ¿Con quién habita actualmente?
                                                    </p>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 60%;">
                                                    <p>
                                                        {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->informacion_familiar->habita_actualmente : '' }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>                                                                        
                                                <td style="width: 40%;">
                                                    <p class="letra-componente alinear-izquierda">
                                                        ¿Cómo considera que es su relación con ellos?
                                                    </p>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 60%;">
                                                    <p>
                                                        {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->informacion_familiar->relacion : '' }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>                                                                        
                                                <td style="width: 40%;">
                                                    <p class="letra-componente alinear-izquierda">
                                                        ¿Tiene familiares viviendo en el extranjero?, ¿Quiénes y en dónde?
                                                    </p>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 60%;">
                                                    <p>
                                                        {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->informacion_familiar->familiares_extranjero : '' }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>                                                                        
                                                <td style="width: 30%;">
                                                    <p class="letra-componente alinear-izquierda"> 
                                                        Y, ¿al interior de la República?. ¿En dónde?
                                                    </p>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 70%;">
                                                    <p>
                                                        {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->informacion_familiar->interior_republica : '' }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>                                                                        
                                                <td style="width: 30%;">
                                                    <p class="letra-componente alinear-izquierda">
                                                        ¿Con qué frecuencia los visita?
                                                    </p>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 70%;">
                                                    <p>
                                                        {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->informacion_familiar->visita_frecuencia : '' }}
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
                                                    <p class="alinear-centro titulo-componente negrita">
                                                        OBSERVACIONES
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="letra-componente justificar">
                                                        {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->informacion_familiar->observaciones : '' }}
                                                    </p>
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
                                                                <th class="letra-componente alinear-centro" style="width:20%;">APORTACIONES</th>
                                                                <th class="letra-componente alinear-centro" style="width:20%;">TIPO DE INGRESO</th>
                                                                <th class="letra-componente alinear-centro" style="width:15%;">CANTIDAD</th>
                                                                <th class="letra-componente alinear-centro" style="width:30%;">CONCEPTO</th>
                                                                <th class="letra-componente alinear-centro" style="width:15%;">EGRESOS</th>       
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion1 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto1 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha " style="width:15%;">
                                                                    <p>
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->i_monto1 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->i_monto1 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    <td class="letra-componente alinear-izquierda " style="width:30%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_concepto1 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                        
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->e_monto1 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->e_monto1 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion2 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto2 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>

                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->i_monto2 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->i_monto2 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_concepto2 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->e_monto2 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->e_monto2 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion3 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto3 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>

                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->i_monto3 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->i_monto3 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_concepto3 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->e_monto3 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->e_monto3 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion4 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto4 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>

                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->i_monto4 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->i_monto4 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_concepto4 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->e_monto4 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->e_monto4 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion5 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto5 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>

                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->i_monto5 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->i_monto5 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_concepto5 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->e_monto5 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->e_monto5 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion6 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto6 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>

                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->i_monto6 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->i_monto6 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_concepto6 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->e_monto6 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->e_monto6 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion7 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto7 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>

                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->i_monto7 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->i_monto7 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_concepto7 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->e_monto7 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->e_monto7 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion8 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto8 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>

                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->i_monto8 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->i_monto8 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_concepto8 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->e_monto8 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->e_monto8 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif                                                                        
                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion9 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto9 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>

                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->i_monto9 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->i_monto9 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_concepto9 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->e_monto9 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->e_monto9 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion10 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto10 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>

                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->i_monto10 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->i_monto10 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_concepto10 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->e_monto10 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->e_monto10 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->aportacion11 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->i_concepto11 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>

                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->i_monto11 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->i_monto11 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p>
                                                                        {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->e_concepto11 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                        @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->situacion_economica->e_monto11 > '0' )
                                                                                ${{ number_format( $estudio->formatoGent->situacion_economica->e_monto11 ,2 ) }}
                                                                            @else
                                                                                --
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <tr>
                                                                    <td colspan="2" class="letra-componente alinear-derecha" style="width:40%;">
                                                                        <p>
                                                                            TOTAL INGRESOS
                                                                        </p>
                                                                    </td>
                                                                    <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                        <p>
                                                                            ${{ isset( $estudio->formatoGent ) ? number_format($estudio->formatoGent->situacion_economica->i_total,2) :''}}
                                                                        </p>
                                                                    </td>                                                                        
                                                                    <td class="letra-componente alinear-derecha" style="width:30%;">
                                                                        <p>
                                                                            TOTAL EGRESOS                                                                           
                                                                        </p>
                                                                    </td>
                                                                    <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                        <p>
                                                                            ${{ isset( $estudio->formatoGent ) ? number_format($estudio->formatoGent->situacion_economica->e_total,2) :''}}
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
                                                            <p class="letra-componente alinear-izquierda">
                                                                Si hay déficit, ¿Cómo lo solventa?
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p class="letra-componente justificar">
                                                                {{ isset($estudio->formatoGent ) ? $estudio->formatoGent->situacion_economica->deficit : '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
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
                                                                        <th class="letra-componente alinear-centro negrita"  style="width:25%;">ACTIVOS</th>
                                                                        <th class="letra-componente alinear-centro negrita"  style="width:3%;">SI</th>
                                                                        <th class="letra-componente alinear-centro negrita"  style="width:3%;">NO</th>
                                                                        <th class="letra-componente alinear-centro negrita"  style="width:25%;">TIPO</th>
                                                                        <th class="letra-componente alinear-centro negrita"  style="width:15%;">VALOR</th>    
                                                                        <th class="letra-componente alinear-centro negrita"  style="width:15%;">PAGADO</th>    
                                                                        <th class="letra-componente alinear-centro negrita"  style="width:15%;">ADEUDO</th>  

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if( $estudio->formatoGent )
                                                                    @foreach( $estudio->formatoGent->bienes as $bien )
                                                                    <tr>
                                                                        <td class="letra-componente alinear-izquierda" style="width:25%;">
                                                                            <p>
                                                                                {{ $bien->activo }}                                                                                
                                                                            </p>
                                                                        </td>
                                                                        <td class="letra-componente alinear-centro" 
                                                                            @if( $bien->tiene == '1' )
                                                                            style="background-color:#FF8000; width: 3%;"
                                                                            @else
                                                                            style="width: 3%;"
                                                                            @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-centro"
                                                                            @if( $bien->tiene == '2' )
                                                                            style="background-color:#FF8000; width: 3%;"
                                                                            @else
                                                                            style="width: 3%;"
                                                                            @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda" style="width:25%;">
                                                                            <p>
                                                                                {{ $bien->tipo }}                                                                                
                                                                            </p>
                                                                        </td>
                                                                        <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                            <p>
                                                                                @if( $bien->valor > '0' )
                                                                                    ${{ number_format($bien->valor,2) }}
                                                                                @else
                                                                                    --
                                                                                @endif                                                                                
                                                                            </p>
                                                                        </td>
                                                                        <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                            <p>
                                                                                @if( $bien->pagado > '0' )
                                                                                    ${{ number_format($bien->pagado,2) }}
                                                                                @else
                                                                                    --
                                                                                @endif                                                                               
                                                                            </p>
                                                                        </td>
                                                                        <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                            <p>
                                                                                @if( $bien->adeudo > '0' )
                                                                                    ${{ number_format($bien->adeudo,2) }}
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
                                                                                ${{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes_totales->valor : '0.00' }}
                                                                            </p>
                                                                        </td>                                                                        
                                                                        <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                            <p>
                                                                                ${{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes_totales->pagado  : '0.00' }}

                                                                            </p>
                                                                        </td>
                                                                        <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                            <p>
                                                                                ${{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes_totales->adeudo  : '0.00' }}
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
                                                            <p class="letra-componente alinear-izquierda">
                                                                UBICACIÓN DE LAS PROPIEDADES
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p class="letra-componente alinear-izquierda">
                                                                {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->bienes_totales->ubicacion : '' }}
                                                            </p>
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
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 20%">EL INMUEBLE ES</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 20%">SERVICIOS</th>
                                                                        <th colspan="2" class="letra-componente alinear-centro negrita" style="width: 20%">DISTRIBUCIÓN</th>                                           
                                                                    </tr>
                                                                </thead>
                                                                <tbody>                                                                         
                                                                    <tr>
                                                                        <td class="table-border alinear-centro" style="width: 20%">
                                                                            <table class="tabla-componente">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_vivienda->propia ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                PROPIA
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_vivienda->rentada ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                RENTADA           
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_vivienda->hipotecada ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                HIPOTECA           
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_vivienda->congelada ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                CONGELADA             
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_vivienda->prestada ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                PRESTADA              
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_vivienda->de_padres ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                DE PADRES       
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_vivienda->otro ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
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
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_propiedad->casa ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                CASA        
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_propiedad->depto ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                DEPARTAMENTO                  
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_propiedad->duplex ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                DUPLEX             
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_propiedad->condominio ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                CONDOMINIO           
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_propiedad->vecindad ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                VECINDAD
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_propiedad->cuarto ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                CUARTO   
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->tipo_propiedad->otro ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
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
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->info_vivienda_servicios->luz) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                LUZ              
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->info_vivienda_servicios->agua) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                AGUA                       
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->info_vivienda_servicios->pavimento) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                PAVIMENTACIÓN                  
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->info_vivienda_servicios->drenaje) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                DRENAJE           
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->info_vivienda_servicios->telefono) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td class="alinear-centro">
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                TELÉFONO                          
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->info_vivienda_servicios->seg_publica) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                SEG. PÚBLICA 
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->info_vivienda_servicios->alumbrado) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                ALUMBRADO              
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
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->sala ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                SALA             
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->comedor ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                COMEDOR                       
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->recamara ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                RECAMARA                 
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->cocina ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                COCINA           
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->banio ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                BAÑO                         
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->garaje ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                GARAJE  
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->biblioteca ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
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
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->jardin ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                JARDIN            
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->zotehuela ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                ZOTEHUELA              
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->patio ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                PATIO         
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->estudio ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                ESTUDIO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_distribucion->cuarto_servicio ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                CUARTO DE SERVICIO
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
                                                                                            {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->tipo_vivienda->viven_domicilio : '' }}
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
                                                                        <th class="letra-componente alinear-centro negrita" style="width:20%;">NIVEL ECONÓMICO</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width:20%;">CONSTRUCCIÓN</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width:20%;">CONSERVACIÓN</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width:20%;">MOBILIARIO</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width:20%;">DE CORTE</th>                                         
                                                                    </tr>
                                                                </thead>
                                                                <tbody>                                                                         
                                                                    <tr>
                                                                        <td class="table-border" style="width:20%;">
                                                                            <table class="tabla-componente">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_nivel_economico->alta ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                ALTA      
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_nivel_economico->media_alta ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                MEDIA ALTA          
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_nivel_economico->media ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                MEDIA        
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_nivel_economico->media_baja ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                MEDIA BAJA             
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->info_vivienda_nivel_economico->baja ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
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
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->vivienda_construccion->antigua) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                ANTIGUA  
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->vivienda_construccion->sencilla) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                SENCILLA
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->vivienda_construccion->moderna) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                MODERNA
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->vivienda_construccion->semi_moderna) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                SEMI-MODERNA
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim($estudio->formatoGent->vivienda_construccion->convencional) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                CONVENCIONAL
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
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_conservacion->excelente ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                EXCELENTE
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_conservacion->bueno ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                BUENO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_conservacion->regular ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                REGULAR
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_conservacion->malo ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                MALO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>

                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_conservacion->pesimo ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                PÉSIMO
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
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_calidad_mobiliario->completo ) !='' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                COMPLETO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_calidad_mobiliario->incompleto ) !='' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                INCOMPLETO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td                                                                                            
                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_calidad_mobiliario->escueto ) !='' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif
                                                                                            
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                ESCUETO
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

                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_corte->variado ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                VARIADO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td

                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_corte->conservador ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                CONSERVADOR
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td

                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_corte->moderno ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                MODERNO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td

                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_corte->colonial ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                COLONIAL
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td

                                                                                            @if( $estudio->formatoGent )
                                                                                            @if( trim( $estudio->formatoGent->vivienda_corte->sencillo ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                SENCILLO
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
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50%;">
                                                            <p class="alinear-centro titulo-componente">
                                                                CONDICIONES INTERNAS
                                                            </p>
                                                        </td>
                                                        <td style="width: 50%;">
                                                            <p class="alinear-centro titulo-componente">
                                                                CONDICIONES EXTERNAS
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50%;">
                                                            <p class="letra-componente alinear-izquierda">
                                                                {{ isset($estudio->formatoGent ) ?$estudio->formatoGent->vivienda_corte->condiciones_internas : '' }}
                                                            </p>
                                                        </td>
                                                        <td style="width: 50%;">
                                                            <p class="letra-componente alinear-izquierda">
                                                                {{ isset($estudio->formatoGent ) ?$estudio->formatoGent->vivienda_corte->condiciones_externas : '' }}
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
                                            <table class="tabla-componente">
                                                <tbody>
                                                    <tr >
                                                        <td style="width: 50%">
                                                            <p class="alinear-centro titulo-componente">
                                                                TIENE FAMILIARES Y/O CONOCIDOS EN LA EMPRESA
                                                            </p>
                                                        </td>
                                                        <td style="width: 50%">
                                                            <p class="alinear-centro titulo-componente">
                                                                COMO SE ENTERO DE LA VACANTE
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50%">
                                                            <table class="auto-width">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="3" class="table-border">
                                                                            &nbsp;
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="table-border" style="width:25%;"></td>
                                                                        <td
                                                                            @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->familiar_empresa->familiar_empresa == '1' )
                                                                            style="background-color:#FF8000; width: 10%;"
                                                                            @else
                                                                            style="width: 10%;"
                                                                            @endif
                                                                            @endif>
                                                                        </td>
                                                                        <td style="width: 25%" class="letra-componente alinear-izquierda table-border">&nbsp;&nbsp;SI</td>
                                                                        <td 
                                                                            @if( $estudio->formatoGent )
                                                                            @if( $estudio->formatoGent->familiar_empresa->familiar_empresa == '2' )
                                                                            style="background-color:#FF8000; width: 10%;"
                                                                            @else
                                                                            style="width: 10%;"
                                                                            @endif
                                                                            @endif>
                                                                        </td>
                                                                        <td style="width: 30%" class="letra-componente alinear-izquierda table-border">&nbsp;&nbsp;NO</td>

                                                                    </tr>         
                                                                    <tr>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 25%">
                                                                            <p>
                                                                                ESPECIFICAR
                                                                            </p>
                                                                        </td>
                                                                        <td  colspan="4" class="letra-componente alinear-izquierda table-border" style="width: 75%">
                                                                            <p class="border-footer">
                                                                                @if( $estudio->formatoGent )
                                                                                @if( $estudio->formatoGent->familiar_empresa->familiar_empresa == '1' )
                                                                                {{ $estudio->formatoGent->familiar_empresa->familiar_empresa_si }}
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
                                                        <td>
                                                            <p class="border-footer letra-componente alinear-izquierda">
                                                                Medio: {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->familiar_empresa->entero_vacante : '' }}
                                                            </p>
                                                            <p class="border-footer letra-componente alinear-izquierda">
                                                                Nombre del reclutador: {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->familiar_empresa->reclutador : '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

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
                                                                CROQUIS DE LA UBICACIÓN DEL DOMICILIO
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
                                                                ['style'=> 'max-width:100%;']
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
                                                        <td style="width: 50%">
                                                            <p class="letra-componente alinear-izquierda">
                                                                DISTANCIA DE SU CASA AL TRABAJO
                                                            </p>
                                                        </td>
                                                        <td style="width: 50%">
                                                            <p class="letra-componente alinear-izquierda">
                                                                {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->ubicacion_domicilio->distancia_domicilio: '' }}
                                                            </p>
                                                        </td >
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50%">
                                                            <p class="letra-componente alinear-izquierda">
                                                                MEDIO DE TRANSPORTE QUE UTILIZA
                                                            </p>
                                                        </td>
                                                        <td style="width: 50%">
                                                            <p class="letra-componente alinear-izquierda">
                                                                {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->ubicacion_domicilio->transporte_utiliza: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                    {{-- FIN CROQUIS --}}

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
                                                        <td class="letra-componente alinear-centro">
                                                            ORGANIZACIONES A LAS QUE HA PERTENECIDO
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda">
                                                            {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_social->pertenece_organizaciones : '' }}
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
                                                            <p class="letra-componente alinear-izquierda">
                                                                ¿ HA SIDO DETENIDO (A), O HA TENIDO ALGUNA DEMANDA LABORAL, CIVIL, MERCANTIL O PENAL ?
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-border" style="width: 50%">
                                                            <table class="tabla-componente">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="width: 10%" class="table-border">
                                                                            <p class="letra-componente alinear-derecha">
                                                                                SI
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                            @if( $estudio->formatoGent ) 
                                                                            @if( $estudio->formatoGent->situacion_social->demanda_laboral == '1' )
                                                                            style="background-color:#FF8000; width: 10%;"
                                                                            @else
                                                                            style="width: 10%;"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td style="width: 10%" class="table-border">
                                                                            <p class="letra-componente alinear-derecha">
                                                                                NO
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                            @if( $estudio->formatoGent ) 
                                                                            @if( $estudio->formatoGent->situacion_social->demanda_laboral == '2' )
                                                                            style="background-color:#FF8000; width: 10%;"
                                                                            @else
                                                                            style="width: 10%;"
                                                                            @endif 
                                                                            @endif>

                                                                        </td>
                                                                        <td style="width: 20%" class="letra-componente alinear-derecha table-border">
                                                                            <p>
                                                                                MOTIVO:
                                                                            </p>
                                                                        </td>
                                                                        <td  class="letra-componente alinear-izquierda table-border" style="width: 40%">
                                                                            @if( $estudio->formatoGent ) 
                                                                            @if( $estudio->formatoGent->situacion_social->demanda_laboral == '1' )
                                                                            {{ $estudio->formatoGent->situacion_social->motivo_demanda }}
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
                                                        <td class="letra-componente alinear-centro" style="width: 25%">
                                                            <p>
                                                                {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_social->interes_corto_plazo : '' }}
                                                            </p>
                                                        </td>
                                                        <td class="letra-componente alinear-centro" style="width: 25%">
                                                            <p>
                                                                {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_social->interes_mediano_plazo : '' }}
                                                            </p>
                                                        </td>
                                                        <td class="letra-componente alinear-centro" style="width: 25%">
                                                            <p>
                                                                {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_social->interes_largo_plazo : '' }}
                                                            </p>
                                                        </td>

                                                        <td class="letra-componente alinear-centro" style="width: 25%">
                                                            <p>
                                                                {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->situacion_social->pasatiempos : '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                    {{-- FIN SITUACION SOCIAL --}}

                                    {{-- INICO ENFERMEDADES --}}
                                    <tr>
                                        <td colspan="3" class="table-border">
                                            &nbsp;
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="3" style="padding: 0;">
                                            <table class="tabla-componente">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">
                                                            <p class="alinear-centro titulo-componente-principal">
                                                                ESTADO DE SALUD
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-border" style="width: 30%">
                                                            <p class="alinear-centro letra-componente">
                                                                ¿CÓMO CONSIDERA SU ESTADO DE SALUD? :
                                                            </p>
                                                        </td>
                                                        <td class="table-border" style="width: 70%">
                                                            <table class="tabla-componente">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            @if( $estudio->formatoGent ) 
                                                                            @if( $estudio->formatoGent->enfermedad->estado_salud == '1' )
                                                                            style="background-color:#FF8000; width: 10%;"
                                                                            @else
                                                                            style="width: 10%;"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 20%">
                                                                            <p>
                                                                                BUENO
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                            @if( $estudio->formatoGent ) 
                                                                            @if( $estudio->formatoGent->enfermedad->estado_salud == '2' )
                                                                            style="background-color:#FF8000; width: 10%;"
                                                                            @else
                                                                            style="width: 10%;"
                                                                            @endif 
                                                                            @endif>

                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 20%">
                                                                            <p>
                                                                                REGULAR
                                                                            </p>
                                                                        </td>

                                                                        <td 
                                                                            @if( $estudio->formatoGent ) 
                                                                            @if( $estudio->formatoGent->enfermedad->estado_salud == '3' )
                                                                            style="background-color:#FF8000; width: 10%;"
                                                                            @else
                                                                            style="width: 10%;"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 20%">
                                                                            <p>
                                                                                MALO
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
                                    <tr>
                                        <td colspan="3" class="table-border">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="table-border" style="padding: 0;">
                                            <table class="tabla-componente">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3" class="table-border">
                                                            <table class="tabla-componente">
                                                                <tbody>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <p class="alinear-centro letra-componente">
                                                                                    ¿DE LAS SIGUIENTES ENFERMEDADES HA PADECIDO ALGUNA FRECUENTEMENTE?
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="table-border" style="width: 100%">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td 
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->anemia == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    ANEMIA
                                                                                                </p>
                                                                                            </td>
                                                                                            <td 
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->asma == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    ASMA
                                                                                                </p>
                                                                                            </td>
                                                                                            <td 
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->gripe == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    GRIPE
                                                                                                </p>
                                                                                            </td>
                                                                                            <td 
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->presion_alta == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    PRESIÓN ALTA
                                                                                                </p>
                                                                                            </td>
                                                                                            <td 
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->epilepsia == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    EPILEPSIA
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td 
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->gastritis == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    GASTRITIS
                                                                                                </p>
                                                                                            </td>
                                                                                            <td 
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->espalda == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    ESPALDA
                                                                                                </p>
                                                                                            </td>
                                                                                            <td 
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->migrania == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    MIGRAÑA
                                                                                                </p>
                                                                                            </td>
                                                                                            <td 
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->presion_baja == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    PRESIÓN BAJA
                                                                                                </p>
                                                                                            </td>
                                                                                            <td 
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->problemas_cardiacos == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    PROBLEMAS CARDIACOS
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->ulcera == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    ÚLCERA
                                                                                                </p>
                                                                                            </td>
                                                                                            <td
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->artritis == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    ARTRITTIS
                                                                                                </p>
                                                                                            </td>
                                                                                            <td
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->bronquitis == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    BRONQUITIS
                                                                                                </p>
                                                                                            </td>
                                                                                            <td
                                                                                                @if( $estudio->formatoGent ) 
                                                                                                @if( $estudio->formatoGent->enfermedad->rinon == '1' )
                                                                                                style="background-color:#FF8000; width: 5%"
                                                                                                @else
                                                                                                style="width: 5%"
                                                                                                @endif 
                                                                                                @endif>
                                                                                            </td>
                                                                                            <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    RIÑON
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
                                                                    </tbody>                                                                    
                                                            </table>
                                                        </td>
                                                    <tr>
                                                        <td colspan="3" class="table-border">
                                                            &nbsp;
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="3" style="padding: 0;" class="table-border">
                                                            <table class="tabla-componente">
                                                                <tbody>






                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <p class="alinear-centro letra-componente">
                                                                                ¿CUÁL DE LOS SIGUIENTES SÍNTOMAS FÍSICOS HA PADECIDO EN LOS ÚLTIMOS SEIS MESES?
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" class="table-border" style="width: 50%">
                                                                            <table class="tabla-componente">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->acidez == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                ACIDEZ
                                                                                            </p>
                                                                                        </td>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->ansiedad == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                ANSIEDAD
                                                                                            </p>
                                                                                        </td>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->dolor_cabeza == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                DOLOR DE CABEZA
                                                                                            </p>
                                                                                        </td>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->estrenimiento == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                ESTREÑIMIENTO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->insomnio == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                INSOMNIO
                                                                                            </p>
                                                                                        </td>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->escalofrios == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                ESCALOFRÍOS
                                                                                            </p>
                                                                                        </td>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->manos_temblorosas == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                MANOS TEMBLOROSAS
                                                                                            </p>
                                                                                        </td>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->alergia == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                ALERGIA
                                                                                            </p>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                TIPO
                                                                                            </p>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-centro" style="width: 10%">
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->alergia == '1' )
                                                                                                {{ $estudio->formatoGent->padecimiento->tipo }}
                                                                                            @endif 
                                                                                            N/A
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->debilidad == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                DEBILIDAD
                                                                                            </p>
                                                                                        </td>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->mareos == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                MAREOS
                                                                                            </p>
                                                                                        </td>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->taquicardia == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td style="width: 10%" class="letra-componente alinear-izquierda table-border">
                                                                                            <p>
                                                                                                TAQUICARIDA
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
                                                                        <td colspan="2" class="table-border" style="width: 50%">
                                                                            <table class="tabla-componente">
                                                                                <tbody>
                                                                                    <tr>

                                                                                        <td class="letra-componente alinear-izquierda" style="width: 35%">
                                                                                            <p>
                                                                                                ¿SE ENCUENTRA BAJO TRATAMIENTO MEDICO?
                                                                                            </p>
                                                                                        </td>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->tratamiento_medico == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                                            <p>
                                                                                                PADECIMIENTO
                                                                                            </p>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-centro" style="width: 40%">
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->tratamiento_medico == '1' )
                                                                                            
                                                                                                {{ $estudio->formatoGent->padecimiento->tratamiento_medico_desc }}
                                                                                            
                                                                                            @else
                                                                                            N/A
                                                                                            @endif 
                                                                                            @endif
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <tr>

                                                                                        <td class="letra-componente alinear-izquierda" style="width: 35%">
                                                                                            <p>
                                                                                                ¿TOMA ALGÚN MEDICAMENTO CONTROLADO?
                                                                                            </p>
                                                                                        </td>
                                                                                        <td
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->medicamento_controlado == '1' )
                                                                                            style="background-color:#FF8000; width: 5%"
                                                                                            @else
                                                                                            style="width: 5%"
                                                                                            @endif 
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                                            <p>
                                                                                                MEDICAMENTO
                                                                                            </p>
                                                                                        </td>
                                                                                        <td class="letra-componente alinear-centro" style="width: 40%">
                                                                                            @if( $estudio->formatoGent ) 
                                                                                            @if( $estudio->formatoGent->padecimiento->medicamento_controlado == '1' )
                                                                                            
                                                                                                {{ $estudio->formatoGent->padecimiento->medicamento_controlado_desc }}
                                                                                            
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
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    {{-- FIN ENFERMEDADES --}}
                                    {{-- INICO NFERMEDADES FAMILIARES --}}
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
                                                            <p class="alinear-centro letra-componente negrita">
                                                                ¿ALGUNO DE TUS FAMILIARES PADECE Ó HAN PADECIDO ALGUNA ENFERMEDAD CRONICODEGENERATIVA: DIABETES, CANCER, CARDIACAS, RESPIRATORIAS O CEREBRALES
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-border">
                                                            <table class="tabla-componente">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 15%;">NOMBRE</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 20%;">PARENTESCO</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 25%;">PADECIMIENTO</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if( $estudio->formatoGent )
                                                                    @foreach( $estudio->formatoGent->padecimiento_familiar as $familiar )
                                                                    <tr>
                                                                        <td class="letra-componente alinear-centro" style="width: 20%;"><p>{{ $familiar->nombre }}</p></td>
                                                                        <td class="letra-componente alinear-centro" style="width: 25%;"><p>{{ $familiar->parentesco }}</p></td>
                                                                        <td class="letra-componente alinear-centro" style="width: 15%;"><p>{{ $familiar->padecimiento }}</p></td>
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
                                                        <td style="width: 60%;">
                                                            <p class="letra-componente alinear-izquierda">
                                                                ¿USTED Ó ALGUNO DE SUS FAMILIARES CERCANOS REQUIERE DE ATENCIÓN MÉDICA CONSTANTE?
                                                            </p>
                                                        </td>
                                                        <td class="letra-componente alinear-derecha" style="width: 10%">
                                                            <p>
                                                                SI
                                                            </p>
                                                        </td>
                                                        <td 
                                                            @if( $estudio->formatoGent ) 
                                                            @if( $estudio->formatoGent->atencion_medica->atencion_medica == '1' )
                                                            style="background-color:#FF8000; width: 10%"
                                                            @else
                                                            style="width: 10%"
                                                            @endif
                                                            @endif>
                                                        </td> 
                                                        <td class="letra-componente alinear-derecha" style="width: 10%">
                                                            <p>
                                                                NO
                                                            </p>
                                                        </td>
                                                        <td
                                                            @if( $estudio->formatoGent ) 
                                                            @if( $estudio->formatoGent->atencion_medica->atencion_medica == '2' )
                                                            style="background-color:#FF8000; width: 10%"
                                                            @else
                                                            style="width: 10%"
                                                            @endif 
                                                            @endif>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="table-border">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda" style="width: 41%;">
                                                            <p>
                                                                ¿QUIÉN Y CUÁL ES EL PADECIMIENTO?
                                                            </p>
                                                        </td>
                                                        <td colspan="4" class="letra-componente alinear-izquierda" style="width: 59%">
                                                            @if( $estudio->formatoGent ) 
                                                            @if( $estudio->formatoGent->atencion_medica->atencion_medica == '1' )
                                                            
                                                                {{ $estudio->formatoGent->atencion_medica->padecimiento }}
                                                            
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
                                            <table class="tabla-componente">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 35%" class="letra-componente alinear-izquierda">
                                                            <p>
                                                                EN CASO DE ACCIDENTE O EMERGENCIA, LLAMAR A:
                                                            </p>
                                                        </td>
                                                        <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                            <p>
                                                                {{  isset( $estudio->formatoGent ) ? $estudio->formatoGent->atencion_medica->accidente_llamar : ' '}}
                                                            </p>
                                                        </td>
                                                        <td style="width: 10%" class="letra-componente alinear-izquierda">
                                                            <p>
                                                                TELÉFONO
                                                            </p>
                                                        </td>
                                                        <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                            <p>
                                                                {{  isset( $estudio->formatoGent ) ? $estudio->formatoGent->atencion_medica->telefono : ' '}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>                                                    
                                    </tr>

                                    {{-- FIN ENFERMEDADES FAMILIARES --}}


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
                                                        <td colspan="2">
                                                            <p class="alinear-centro titulo-componente-principal">
                                                                HABITOS Y COSTUMBRES
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="table-border">
                                                            <table class="tabla-componente">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 10%;">TIPO</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 5%;">SI</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 5%;">NO</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 10%;">CANTIDAD</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 10%;">DIARIO</th>
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 10%;">SEMANAL</th>   
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 10%;">QUINCENAL</th>   
                                                                        <th class="letra-componente alinear-centro negrita" style="width: 10%;">OCASIONAL</th>   

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if( $estudio->formatoGent )
                                                                    @foreach( $estudio->formatoGent->habitos_detalle as $row )
                                                                    <tr>
                                                                        <td class="letra-componente alinear-izquierda" style="width: 10%;">{{ $row->tipo }}</td>
                                                                        <td 
                                                                            @if( $row->respuesta == '1' )
                                                                                style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                                style="width: 5%"
                                                                            @endif>
                                                                        </td>
                                                                        <td 
                                                                            @if( $row->respuesta == '2' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                                style="width: 5%"
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
                                        <td colspan="3" style="width: 100%">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3" class="table-border">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td  style="width: 30%" class="letra-componente alinear-izquierda table-border">
                                                            <p>
                                                                ¿REALIZA ALGUNA ACTIVIDAD?
                                                            </p>
                                                        </td>
                                                        <td style="width: 70%" class="table-border">
                                                            
                                                            <table class="auto-width">
                                                                <tbody>
                                                                    <tr>

                                                                        <td
                                                                                @if( $estudio->formatoGent ) 
                                                                                @if( $estudio->formatoGent->habitos->realiza_actividad == '1' ) 
                                                                                style="background-color:#FF8000; width: 10%"
                                                                                @else
                                                                                style="width: 10%"
                                                                                @endif
                                                                                @endif>
                                                                        </td>
                                                                        <td style="width:10%" class="letra-componente alinear-izquierda table-border">
                                                                            <p>
                                                                                SI
                                                                            </p>
                                                                        </td>          
                                                                        <td
                                                                                @if( $estudio->formatoGent ) 
                                                                                @if( $estudio->formatoGent->habitos->realiza_actividad == '2' ) 
                                                                                style="background-color:#FF8000; width: 10%"
                                                                                @else
                                                                                style="width: 10%"
                                                                                @endif
                                                                                @endif>

                                                                        </td>
                                                                        <td colspan="5" style="width: 50%" class="letra-componente alinear-izquierda table-border">
                                                                            <p>
                                                                                NO  
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
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 30%;">
                                                            <p>
                                                                TIPO DE ACTIVIDAD
                                                            </p>
                                                        </td>
                                                        <td colspan="3" style="width: 70%;" class="table-border">
                                                            <table class="auto-width">
                                                                <tbody>
                                                                    <tr>   
                                                                        <td 
                                                                            @if( $estudio->formatoGent ) 
                                                                            @if( $estudio->formatoGent->habitos->tipo_actividad_social == '1' ) 
                                                                            style="background-color:#FF8000;width: 12.5%;"
                                                                            @else
                                                                            style="width: 12.5%;"
                                                                            @endif
                                                                            @endif>
                                                                        </td>  
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12.5%;">
                                                                            <p>
                                                                                &nbsp;&nbsp;SOCIAL
                                                                            </p>
                                                                        </td>
                                                                        <td 
                                                                            @if( $estudio->formatoGent ) 
                                                                            @if( $estudio->formatoGent->habitos->tipo_actividad_deportiva == '1' ) 
                                                                            style="background-color:#FF8000;width: 12.5%;"
                                                                            @else
                                                                            style="width: 12.5%;"
                                                                            @endif
                                                                            @endif>
                                                                        </td> 
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12.5%;">
                                                                            <p>
                                                                                &nbsp;&nbsp;DEPORTIVA
                                                                            </p>
                                                                        </td>  
                                                                        <td 
                                                                            @if( $estudio->formatoGent ) 
                                                                            @if( $estudio->formatoGent->habitos->tipo_actividad_religiosa == '1' ) 
                                                                            style="background-color:#FF8000;width: 12.5%;"
                                                                            @else
                                                                            style="width: 12.5%;"
                                                                            @endif
                                                                            @endif>
                                                                        </td> 
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12.5%;">
                                                                            <p>
                                                                                &nbsp;&nbsp;RELIGIOSA
                                                                            </p>
                                                                        </td> 
                                                                        <td 
                                                                            @if( $estudio->formatoGent ) 
                                                                            @if( $estudio->formatoGent->habitos->tipo_actividad_cultural == '1' ) 
                                                                            style="background-color:#FF8000;width: 12.5%;"
                                                                            @else
                                                                            style="width: 12.5%;"
                                                                            @endif
                                                                            @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12.5%;">
                                                                            <p>
                                                                                &nbsp;&nbsp;CULTURAL
                                                                            </p>
                                                                        </td> 
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 30%;">
                                                            <p>
                                                                ¿CUÁL Ó CUALES?
                                                            </p>
                                                        </td>
                                                        <td colspan="8" class="letra-componente alinear-izquierda table-border" style="width: 70%;">
                                                            <p class="border-footer">
                                                                {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->habitos->cuales : '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 30%;">
                                                            <p>
                                                                TIEMPO DEDICADO:
                                                            </p>
                                                        </td>
                                                        <td style="width: 70%;" class="table-border">
                                                            <table class="auto-width">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                                @if( $estudio->formatoGent ) 
                                                                                @if( $estudio->formatoGent->habitos->tiempo_dedicado_diario == '1' ) 
                                                                                style="background-color:#FF8000;width: 12.5%;"
                                                                                @else
                                                                                style="width: 12.5%;"
                                                                                @endif
                                                                                @endif>
                                                                        </td>  
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12.5%;">
                                                                            <p>
                                                                                &nbsp;&nbsp;DIARIO
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                                @if( $estudio->formatoGent ) 
                                                                                @if( $estudio->formatoGent->habitos->tiempo_dedicado_semanal == '1' ) 
                                                                                style="background-color:#FF8000;width: 12.5%;"
                                                                                @else
                                                                                style="width: 12.5%;"
                                                                                @endif
                                                                                @endif>
                                                                        </td>  
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12.5%;">
                                                                            <p>
                                                                                &nbsp;&nbsp;SEMANAL
                                                                            </p>
                                                                        </td>  
                                                                        <td
                                                                                @if( $estudio->formatoGent ) 
                                                                                @if( $estudio->formatoGent->habitos->tiempo_dedicado_quincenal == '1' ) 
                                                                                style="background-color:#FF8000;width: 12.5%;"
                                                                                @else
                                                                                style="width: 12.5%;"
                                                                                @endif
                                                                                @endif>
                                                                        </td>   
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12.5%;">
                                                                            <p>
                                                                                &nbsp;&nbsp;QUINCENAL
                                                                            </p>
                                                                        </td> 
                                                                        <td 
                                                                                @if( $estudio->formatoGent ) 
                                                                                @if( $estudio->formatoGent->habitos->tiempo_dedicado_mensual == '1' ) 
                                                                                style="background-color:#FF8000;width: 12.5%;"
                                                                                @else
                                                                                style="width: 12.5%;"
                                                                                @endif
                                                                                @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 12.5%;">
                                                                            <p>
                                                                                &nbsp;&nbsp;MENSUAL
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
                                    {{-- FIN HABITOS Y COSTUMBRES --}}

                                    {{-- INICIO DISPONIBILIDAD --}}
                                    <tr>
                                        <td colspan="3" class="table-border">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-border" colspan="3" style="width: 50">
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
                                                                        <td style="width: 30%" class="letra-componente alinear-izquierda">
                                                                            <p>
                                                                                SI ESTA EMPLEADO ACTUALMENTE, ¿POR QUÉ DESEA CAMBIAR?
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td colspan="3" class="letra-componente alinear-izquierda" style="width: 70%">
                                                                            <p>
                                                                                {{ isset( $estudio->formatoGent ) ? $estudio->formatoGent->disponibilidad->empleado_actualmente : '' }}
                                                                            </p>                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                            <p>
                                                                                ¿ESTA DISPUESTO A VIAJAR?
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td colspan="3" class="letra-componente alinear-izquierda" style="width: 70%">
                                                                            <p>
                                                                                @if( $estudio->formatoGent )
                                                                                    @if( $estudio->formatoGent->disponibilidad->dispuesto_viajar == '1' )
                                                                                        Si
                                                                                    @else
                                                                                        No
                                                                                    @endif
                                                                                @endif
                                                                            </p>                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                            <p>
                                                                                ¿A CAMBIAR DE RESIDENCIA?
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td colspan="3" class="letra-componente alinear-izquierda" style="width:70%"> 
                                                                            <p>
                                                                                @if( $estudio->formatoGent )
                                                                                    @if( $estudio->formatoGent->disponibilidad->cambiar_residencia == '1' )
                                                                                        Si
                                                                                    @else
                                                                                        No
                                                                                    @endif
                                                                                @endif  
                                                                            </p>                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                            <p>
                                                                                ¿A PARTIR DE QUÉ FECHA PUEDE COMENZAR A TRABAJAR?
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td colspan="3" class="letra-componente alinear-izquierda" style="width: 70%">
                                                                            <p>
                                                                                {{ isset( $estudio->formatoGent->disponibilidad) ? $estudio->formatoGent->disponibilidad->comenzar_trabajar: '' }}
                                                                            </p>                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                            <p>
                                                                                ¿TIENE FAMILIARES TRABAJANDO EN ESTA EMPRESA?
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                            <p>
                                                                                @if( $estudio->formatoGent )
                                                                                @if( $estudio->formatoGent->familiar_empresa == '1' )
                                                                                <div style="background-color:#FF8000; width: 100%; height: 100%; margin: 0; padding: 0; ">&nbsp;</div>
                                                                                @endif
                                                                                NO
                                                                                @endif
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                            <p>
                                                                                NOMBRE
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda" style="width: 40%">
                                                                            <p>
                                                                                @if( $estudio->formatoGent )
                                                                                @if( $estudio->formatoGent->familiar_empresa == '1' )
                                                                                {{ $estudio->formatoGent->familiar_empresa_detalle }}
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
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <!-- ------------------------------------------------------------------ END DISPONIBILIDAD ----------------------------------- -->
                                    {{-- FIN DISPONIBILIDAD --}}

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
                                                            @if( $estudio->formatoGent )
                                                            @foreach ($estudio->formatoGent->referencias_personales  as $index => $referencia)
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
                                                                                <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                                    <p>
                                                                                        NOMBRE DE LA REFERENCIA
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 40%">
                                                                                    <p>
                                                                                        {{ $referencia->nombre_referencia }}
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 15%">
                                                                                    <p>
                                                                                        CELULAR:
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 15%">
                                                                                    <p>
                                                                                        {{ $referencia->celular }}
                                                                                    </p>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                                    <p>
                                                                                        DOMICILIO
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 40%">
                                                                                    <p>
                                                                                        {{ $referencia->domicilio }}
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 15%">
                                                                                    <p>
                                                                                        TELÉFONO
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 15%">
                                                                                    <p>
                                                                                        {{ $referencia->telefono }}
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                                    <p>
                                                                                        OCUPACIÓN
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 40%;">
                                                                                    <p>
                                                                                        {{ $referencia->ocupacion }}  
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 15%">
                                                                                    <p>
                                                                                        EMPRESA 
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 15%">
                                                                                    <p>
                                                                                        {{ $referencia->empresa }} 
                                                                                    </p>
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                                    <p>
                                                                                        PARENTESCO
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 40%;">
                                                                                    <p>
                                                                                        {{ $referencia->parentesco }}  
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 15%">
                                                                                    <p>
                                                                                        TIEMPO DE CONOCERLO 
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" style="width: 15%">
                                                                                    <p>
                                                                                        {{ $referencia->tiempo_conocerlo }} 
                                                                                    </p>
                                                                                </td>

                                                                            </tr>

                                                                            <tr>
                                                                                <td colspan="4">
                                                                                    <p class="letra-componente justificar">
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

                                    

                                    {{-- INICIO REFERENCIAS LABORAL --}}

                                    @if( $estudio->formatoGent )
                                    @foreach ($estudio->formatoGent->informacion_laboral  as $referencia)
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
                                                                                                <td class="letra-componente alinear-izquierda" style="width: 14%;">
                                                                                                    <p>
                                                                                                        EMPRESA
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td colspan="2" class="letra-componente alinear-izquierda" style="width: 62%;">
                                                                                                    <p>
                                                                                                        {{ $referencia->empresa }}
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td class="letra-componente alinear-izquierda" style="width: 12%;">
                                                                                                    <p>
                                                                                                        TELÉFONO
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td colspan="2" class="letra-componente alinear-izquierda" style="width: 12%;">
                                                                                                    <p>
                                                                                                        {{ $referencia->telefono }}
                                                                                                    </p>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td class="letra-componente alinear-izquierda" style="width: 14%;">
                                                                                                    <p>
                                                                                                        GIRO
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td colspan="2" class="letra-componente alinear-izquierda" style="width: 62%;">
                                                                                                    <p>
                                                                                                        {{ $referencia->giro }} 
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td class="letra-componente alinear-izquierda" style="width: 12%;">
                                                                                                    <p>
                                                                                                        CELULAR
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td colspan="2" class="letra-componente alinear-izquierda" style="width: 12%;">
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
                                                                                <td class="letra-componente alinear-izquierda" style="width: 14%;">
                                                                                    <p>
                                                                                        DIRECCIÓN
                                                                                    </p>
                                                                                </td>
                                                                                <td class="letra-componente alinear-izquierda" colspan="5" style="width: 85%;">
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
                                                                                                <td class="letra-componente alinear-izquierda" style="width: 20%;">
                                                                                                    <p>
                                                                                                        {{ $referencia->puesto_inicial }}  
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                    <p>
                                                                                                        SUELDO INICIAL
                                                                                                    </p>
                                                                                                </td>
                                                                                    <td class="letra-componente alinear-derecha" style="width: 15%;">
                                                                                                    <p>
                                                                                                    $
                                                                                                    @if($referencia->sueldo_inicial!="")
                                                                    {{ isset($referencia->sueldo_inicial)?number_format($referencia->sueldo_inicial,2):0 }}
                                                                                                        @else
                                                                                                         0
                                                                                                        @endif
                                                                                                   
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
                                                                                                <td class="letra-componente alinear-izquierda" style="width: 13%;">
                                                                                                    <p>
                                                                                                        ÚLTIMO PUESTO
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td class="letra-componente alinear-izquierda" style="width: 20%;">
                                                                                                    <p>
                                                                                                        {{ $referencia->ultimo_puesto }} 
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                                                    <p>
                                                                                                        SUELDO FINAL
                                                                                                    </p>
                                                                                                </td>
                                                                                                <td class="letra-componente alinear-derecha" style="width: 15%;">
                                                                                                    <p>
                                                                                                        $
                                                                                                        @if($referencia->sueldo_final!=0)
                                                                                                        {{ isset($referencia->sueldo_final)?number_format($referencia->sueldo_final,2):0 }} 
                                                                                                        @else
                                                                                                        0
                                                                                                        @endif
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
                                                                                <td colspan="2" class="letra-componente alinear-centro" colspan="2" style="width:33.33%;">
                                                                                    <p>
                                                                                        NOMBRE DEL JEFE INMEDIATO
                                                                                    </p>
                                                                                </td>                                                                                    
                                                                                <td colspan="2" class="letra-componente alinear-centro" colspan="2" style="width:33.33%;">
                                                                                    <p>
                                                                                        PUESTO,  ÁREA Y DEPARTAMENTO
                                                                                    </p>
                                                                                </td>                                                                                    
                                                                                <td colspan="2" class="letra-componente alinear-centro" colspan="2" style="width:33.33%;">
                                                                                    <p>
                                                                                        TIEMPO QUE DEPENDIÓ DEL JEFE INMEDIATO
                                                                                    </p>
                                                                                </td>                                                                         
                                                                            </tr> 
                                                                            <tr>
                                                                                <td colspan="2" class="letra-componente alinear-izquierda" style="width:33.33%;">
                                                                                    <p>
                                                                                        {{ $referencia->jefe_inmediato }}
                                                                                    </p>
                                                                                </td>                                                                                    
                                                                                <td colspan="2" class="letra-componente alinear-izquierda" style="width:33.33%;">
                                                                                    <p>
                                                                                        {{ $referencia->jefe_puesto }}
                                                                                    </p>
                                                                                </td>                                                                                    
                                                                                <td colspan="2" class="letra-componente alinear-izquierda" colspan="2" style="width:33.33%;">
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
                                        <td colspan="3" class="table-border">
                                            <tr>
                                                <td colspan="3" class="table-border">
                                                    <table class="tabla-componente">
                                                        <tbody>
                                                            <tr>
                                                                <td class="table-border">
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
                                                                                <td style="width: 10%">
                                                                                    <p class="alinear-centro letra-componente">
                                                                                        EXCELENTE 

                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 10%">
                                                                                    <p class="alinear-centro letra-componente">
                                                                                        BUENO
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 10%">
                                                                                    <p class="alinear-centro letra-componente">
                                                                                        REGULAR
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 10%">
                                                                                    <p class="alinear-centro letra-componente">
                                                                                        MALO
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 10%">
                                                                                    <p class="alinear-centro letra-componente">
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
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->asistencia == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->asistencia == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->asistencia == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width:10%;"     
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->asistencia == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
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
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->puntualidad == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->puntualidad == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->puntualidad == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->puntualidad == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
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

                                                                                <td 
                                                                                        @if( $referencia->honradez == '1' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->honradez == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td
                                                                                        @if( $referencia->honradez == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->honradez == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->honradez == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
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
                                                                                    style="background-color:#FF8000; width: 10%;"
                                                                                    @else
                                                                                    style="width: 10%;"
                                                                                    @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->responsabilidad == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->responsabilidad == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->responsabilidad == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->responsabilidad == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
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
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->disponibilidad == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->disponibilidad == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->disponibilidad == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->disponibilidad == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
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
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->compromiso == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->compromiso == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->compromiso == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->compromiso == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
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
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->iniciativa == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->iniciativa == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->iniciativa == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->iniciativa == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                    <p>
                                                                                        CALIDAD DEL TRABAJO
                                                                                    </p>
                                                                                </td>

                                                                                <td 

                                                                                        @if( $referencia->calidad_trabajo == '1' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->calidad_trabajo == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->calidad_trabajo == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->calidad_trabajo == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->calidad_trabajo == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
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
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trabajo_equipo == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trabajo_equipo == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trabajo_equipo == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trabajo_equipo == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
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
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trabajo_presion == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trabajo_presion == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trabajo_presion == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trabajo_presion == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>

                                                                                <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                    <p>
                                                                                        ACTITUD CON EL JEFE
                                                                                    </p>
                                                                                </td>

                                                                                <td 

                                                                                        @if( $referencia->trato_jefe == '1' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trato_jefe == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trato_jefe == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trato_jefe == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trato_jefe == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>                                                                               
                                                                                <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                    <p>
                                                                                        ACTITUD CON SUS COMPAÑEROS
                                                                                    </p>
                                                                                </td>

                                                                                <td 

                                                                                        @if( $referencia->trato_companeros == '1' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trato_companeros == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trato_companeros == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trato_companeros == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->trato_companeros == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
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
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->productividad_capacidad == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->productividad_capacidad == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->productividad_capacidad == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->productividad_capacidad == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
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
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->liderazgo == '2' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->liderazgo == '3' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->liderazgo == '4' )
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif>
                                                                                </td>
                                                                                <td 
                                                                                        @if( $referencia->liderazgo == '5' )
                                                                                        style="background-color:#FF8000; width: 10%;"
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
                                            <tr>
                                                <td colspan="3" class="table-border">
                                                    <table class="tabla-componente">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 50%">
                                                                    <p class="letra-componente alinear-centro negrita">
                                                                        TIPO DE CONTRATO
                                                                    </p>
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <p class="letra-componente alinear-centro negrita">
                                                                        MOTIVO DE SEPARACIÓN
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                    <p>
                                                                        {{ $referencia->tipo_contrato }} 

                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                    <p>
                                                                        {{ $referencia->motivo_separacion }}
                                                                    </p>
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
                                                            <table class="auto-width">
                                                                <tbody>
                                                                    <tr>

                                                                        <td
                                                                           
                                                                                @if( $referencia->adeudo == '1' )
                                                                                style="background-color:#FF8000; width: 8%;"
                                                                                @else
                                                                                style="width: 8%;"
                                                                                @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                            <p>
                                                                                &nbsp;&nbsp;SI
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                                @if( $referencia->adeudo == '2' )
                                                                                style="background-color:#FF8000; width: 8%;"
                                                                                @else
                                                                                style="width: 8%;"
                                                                                @endif  
                                                                            </p>
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                            <p>
                                                                                &nbsp;&nbsp;NO
                                                                            </p>
                                                                        </td>


                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td class="table-border" style="width: 33%">
                                                            <table class="auto-width">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                                @if( $referencia->sindicato == '1' )
                                                                                style="background-color:#FF8000; width: 8%;"
                                                                                @else
                                                                                style="width: 8%;"
                                                                                @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                            <p>
                                                                                &nbsp;&nbsp;SI
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                                @if( $referencia->sindicato == '2' )
                                                                                style="background-color:#FF8000; width: 8%;"
                                                                                @else
                                                                                style="width: 8%;"
                                                                                @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                            <p>
                                                                                &nbsp;&nbsp;NO
                                                                            </p>
                                                                        </td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td class="table-border">
                                                            <table class="auto-width">
                                                                <tbody>
                                                                    <tr>

                                                                        <td
                                                                                @if( $referencia->contratar_nuevamente == '1' )
                                                                                style="background-color:#FF8000; width: 25%;"
                                                                                @else
                                                                                style="width: 25%;"
                                                                                @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 25%">
                                                                            <p>
                                                                                &nbsp;&nbsp;SI
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                                @if( $referencia->contratar_nuevamente == '2' )
                                                                                style="background-color:#FF8000; width: 25%;"
                                                                                @else
                                                                                style="width: 25%;"
                                                                                @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-izquierda table-border" style="width: 25%">
                                                                            <p>
                                                                                &nbsp;&nbsp;NO
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
                                <tr>
                                    <td colspan="3" class="table-border">
                                        &nbsp;
                                    </td>
                                </tr>
                                        
                                <tr>
                                    <td colspan="3" class="table-border">
                                        <tr>
                                            <td colspan="3" style="padding: 0;">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <p class="alinear-centro titulo-componente negrita">
                                                                    OBSERVACIONES
                                                                </p>
                                                            </td>                                                                    
                                                        </tr>
                                                        <tr>
                                                            <td class="table-border">
                                                                <p class="letra-componente justificar">

                                                                    {{ $referencia->observaciones_laboral}}
                                                                </p>
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
                                        <tr>
                                            <td  colspan="3" class="table-border">
                                                <table class="tabla-componente" >
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                <p>
                                                                    INFORMÓ
                                                                </p>
                                                            </td>
                                                            <td style="width: 35%;">
                                                                <p class="justificar letra-componente">
                                                                    {{ $referencia->informo}}  
                                                                </p>
                                                            </td>
                                                            <td class="letra-componente alinear-izquierda" style="width: 15%;">
                                                                <p>
                                                                    PUESTO
                                                                </p>
                                                            </td>
                                                            <td style="width: 35%;">
                                                                <p class="letra-componente justificar">
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
                                                            FOTO DEL INTERIOR DEL DOMICILIO
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 100%;">
                                                        <div style="width: 100%;" class="alinear-centro">     

                                                        @if( $estudio->imagenes->where('tipo','Vivienda Interior')->first() )
                                                        {{ Html::image(                                           
                                                        $estudio->imagenes->where('tipo','Vivienda Interior')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                        $estudio->imagenes->where('tipo','Vivienda Interior')->sortByDesc('fecha_alta')->first()->archivo,
                                                        '',
                                                        ['style' => 'max-width:100%;height: auto;']

                                                        ) }}

                                                        @else                                        
                                                        {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',['style' => 'max-width:100%;height: auto;']) !!}        
                                                        @endif
                                                        </div>

                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                {{-- FIN FOTO EXTERIOR --}}
    
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
                                                    <td style="width: 100%;">
                                                        <div style="width: 100%;" class="alinear-centro">   
    
                                                        @if( $estudio->imagenes->where('tipo','Vivienda Exterior')->first() )
                                                        {{ Html::image(                                           
                                                        $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                        $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first()->archivo,
                                                        '',
                                                        ['style' => 'max-width:100%;height: auto;']

                                                        ) }}

                                                        @else                                        
                                                        {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',['style' => 'max-width:100%;height: auto;']) !!}        
                                                        @endif
                                                        </div>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                {{-- FIN FOTO EXTERIOR --}}





                                <!---------------------------------------   END REFERENCIAS LABORALES ----------------------------------------- -->



                            </tbody>
                        </table>
                        <script>
                            window.print();
                        </script>




    </body>
</html>
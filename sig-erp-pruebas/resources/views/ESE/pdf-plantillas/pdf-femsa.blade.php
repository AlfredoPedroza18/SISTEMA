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
        <tbody>
            <tr>
                <td class="logo-plantilla table-border">
                    {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo"]) !!}           
                </td>
                <td class="logo-main table-border">
                    <p class="titulo-principal alinear-centro">ESTUDIO SOCIOECONÓMICO</p>
                </td>
                <td class="fecha-plantilla table-border">
                    <table class="table-border auto-width">
                        <thead>
                            <tr>
                                <th class="titulo-componente" style="width:33%;">MES</th>
                                <th class="titulo-componente" style="width:33%;">DÍA</th>
                                <th class="titulo-componente" style="width:33%;">AÑO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="alinear-centro letra-componente" style="width:33%;">                                    
                                    {{ $estudio->mes_visita }}                                    
                                </td>
                                <td class="alinear-centro letra-componente" style="width:33%;">                                    
                                    {{ $estudio->dia_visita }}                                    
                                </td>
                                <td class="alinear-centro letra-componente" style="width:33%;">                                    
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
                                <td class="letra-componente alinear-izquierda" style="width:20%">Empresa</td>
                                <td class="letra-componente alinear-izquierda" style="width: 70%">{{ $estudio->cliente->nombre_comercial }}</td>

                            </tr>
                            <tr>                                             
                                <td class="letra-componente alinear-izquierda" style="width:20%">Nombre</td>
                                <td class="letra-componente alinear-izquierda" style="width: 70%">            
                                    {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre : '' }}
                                </td>

                            </tr>
                            <tr>                                             
                                <td class="letra-componente alinear-izquierda" style="width:20%">Puesto</td>
                                <td class="letra-componente alinear-izquierda" style="width: 70%">
                                    {{ isset( $estudio->formatoFemsa->resumen ) ? $estudio->formatoFemsa->resumen->puesto : '' }}
                                </td>

                            </tr>
                             <tr>
                            <td colspan="3" class="table-border">
                                 <span style=" display: inline-block;height: 15px;"></span>
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

                                    <div>
                                        
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
                                <td class="alinear-centro letra-componente"  rowspan="3"
                                @if( $estudio->formatoFemsa )
                                    @if( $estudio->formatoFemsa->resumen->status == '1' )
                                        style="width: 20%;background-color:#499B61;color:white;"
                                    @elseif( $estudio->formatoFemsa->resumen->status == '2' )
                                        style="width: 20%;background-color:#FF8000;color:white;"
                                    @else
                                        style="width: 20%;background-color:#FF0000;color:white;"
                                    @endif
                                @endif


    
                                >
                                
                                    
                                    @if( $estudio->formatoFemsa )
                                        @if( $estudio->formatoFemsa->resumen->status == '1' )
                                            APTO
                                        @elseif( $estudio->formatoFemsa->resumen->status == '2' )
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
                                 <span style=" display: inline-block;height: 15px;"></span>
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
                                        {{ isset( $estudio->formatoFemsa ) ?  $estudio->formatoFemsa->resumen->situacion_socioeconomica :'' }}
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
                                    <p class="letra-componente">
                                        {{ isset( $estudio->formatoFemsa ) ?  $estudio->formatoFemsa->resumen->escolaridad :'' }}
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
                                    <p class="letra-componente">
                                        {{ isset( $estudio->formatoFemsa ) ?  $estudio->formatoFemsa->resumen->trayectoria_laboral :'' }}
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
                                                <th class="alinear-centro letra-componente negrita" style="width: 10%;">VALOR</th>  
                                                <th class="alinear-centro letra-componente negrita" style="width: 10%;">BUENA</th>  
                                                <th class="alinear-centro letra-componente negrita" style="width: 10%;">REGULAR</th>  
                                                <th class="alinear-centro letra-componente negrita" style="width: 10%;">MALA</th>  
                                                <th class="alinear-centro letra-componente negrita" style="width: 50%;">COMENTARIOS</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                    DISPONIBILIDAD
                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoFemsa )
                                                    @if( $estudio->formatoFemsa->resumen->disponibilidad == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>


                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoFemsa )
                                                    @if( $estudio->formatoFemsa->resumen->disponibilidad == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro" 
                                                    @if( $estudio->formatoFemsa )
                                                    @if( $estudio->formatoFemsa->resumen->disponibilidad == '3' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>

                                                <td class="letra-componente letra-componente" rowspan="7" style="width: 20%;">
                                                    {{ isset( $estudio->formatoFemsa ) ?  $estudio->formatoFemsa->resumen->comentarios :  '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                    PUNTUALIDAD
                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoFemsa )
                                                    @if( $estudio->formatoFemsa->resumen->puntualidad == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoFemsa )
                                                    @if( $estudio->formatoFemsa->resumen->puntualidad == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoFemsa )
                                                    @if( $estudio->formatoFemsa->resumen->puntualidad == '3' )
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
                                                    @if( $estudio->formatoFemsa )
                                                    @if( $estudio->formatoFemsa->resumen->presentacion == '1' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoFemsa )
                                                    @if( $estudio->formatoFemsa->resumen->presentacion == '2' )
                                                    style="background-color:#FF8000; width: 10%;"
                                                    @else
                                                    style="width: 10%;"
                                                    @endif
                                                    @endif>

                                                </td>
                                                <td class="alinear-centro"
                                                    @if( $estudio->formatoFemsa )
                                                    @if( $estudio->formatoFemsa->resumen->presentacion == '3' )
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
                                    <td colspan="3" class="table-border">
                                         <span style=" display: inline-block;height: 15px;"></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="letra-componente alinear-derecha table-border" style="width: 10%;">Claras&nbsp;</td>
                                    <td 
                                        @if( $estudio->formatoFemsa )
                                            @if( $estudio->formatoFemsa->resumen->respuestas == '1' )
                                                style="background-color:#FF8000; width:10%;"
                                            @else
                                                style="width:10%;"
                                            @endif
                                        @endif>
                                    </td>
                                    <td class="letra-componente alinear-derecha table-border" style="width: 10%;">Concretas&nbsp;</td>
                                    <td 
                                        @if( $estudio->formatoFemsa )
                                            @if( $estudio->formatoFemsa->resumen->respuestas == '2' )
                                                style="background-color:#FF8000; width:10%;"
                                            @else
                                                style="width:10%;"
                                            @endif
                                        @endif>
                                    </td>
                                    <td class="letra-componente alinear-derecha table-border" style="width: 10%;">Fluidas&nbsp;</td>
                                    <td 
                                        @if( $estudio->formatoFemsa )
                                            @if( $estudio->formatoFemsa->resumen->respuestas == '3' )
                                                style="background-color:#FF8000; width:10%;"
                                            @else
                                                style="width:10%;"
                                            @endif
                                        @endif>
                                    </td>
                                    <td class="letra-componente alinear-derecha table-border" style="width: 10%;">Confusas&nbsp;</td>
                                    <td 
                                        @if( $estudio->formatoFemsa )
                                            @if( $estudio->formatoFemsa->resumen->respuestas == '4' )
                                                style="background-color:#FF8000; width:10%;"
                                            @else
                                                style="width:10%;"
                                            @endif
                                        @endif>
                                    </td>
                                    <td class="letra-componente alinear-derecha table-border" style="width: 10%;">Incompletas&nbsp;</td>
                                    <td 
                                        @if( $estudio->formatoFemsa )
                                            @if( $estudio->formatoFemsa->resumen->respuestas == '5' )
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
                    <div class="box">

                        <p class="titulo-componente">
                            REALIZÓ INVESTIGACIÓN:
                        </p>             

                        <p class="alinear-centro ">
                            <p style="width:180px;">                                
                            {{ Html::image( $estudio->ejecutivoPrincipal->first()->imagen_firma ,'',['style' => 'width:100%;height:auto;margin-left:300px;']) }}
                            </p>
                        </p>
                        <p class="border-footer"></p>


                        <p class="alinear-centro letra-componente">
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
                                                <td  class="box-jll alinear-izquierda letra-componente" style="width:20%;">NOMBRE DE CANDIDATO:</td>
                                                <td colspan="3" class="field-table-jll letra-componente justificar " style="width:60%;">
                                                    <p> 
                                                        {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
                                                    </p>
                                                </td>
                                                <td class="box-jll alinear-izquierda letra-componente " style="width:10%;">SEXO:</td>
                                                <td  colspan="3" class="field-table-jll letra-componente justificar " style="width:10%;">
                                                    <p>
                                                        @if( $estudio->formatoFemsa )
                                                        @if( $estudio->formatoFemsa->datos_generales->sexo == '1')
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
                                                <td class="box-jll alinear-izquierda letra-componente " style="width:13%;">EDAD:</td>
                                                <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                    <p>
                                                        {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->edad : '' }}
                                                    </p>
                                                </td>
                                                <td class="box-jll alinear-izquierda letra-componente " style="width:13%;">FECHA DE NAC.:</td>
                                                <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                    <p>
                                                        {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->fecha_nacimiento : '' }}</p>
                                                    </td>
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:14%;">LUGAR DE NAC. :</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->lugar_nac : '' }}
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
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:13%;">NACIONALIDAD:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->nacionalidad : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:13%;">ESTADO CIVIL:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->edo_civil : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:14%;">FECHA DE MATRIMONIO:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p> 
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->fecha_matrimonio : '' }}
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
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:14%;">CALLE:</td>
                                                    <td  colspan="3" class="field-table-jll letra-componente justificar " style="width:86%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->calle : ''}}
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
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:14%;">NÚMERO EXTERIOR:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->no_exterior : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:13%;">NÚMERO INTERIOR:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->no_interior : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:14%;">DELEGACIÓN Ó MUNICIPIO:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p> 
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->delegacion : '' }}
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
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:14%;">COLONIA:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->colonia : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:13%;">EMAIL:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->email : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:14%;">TELÉFONO:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p> 
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->telefono : '' }}
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
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:14%;">C.P.</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->cp : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:13%;">TIEMPO EN EL DOMICILIO:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->tiempo_domicilio : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:14%;">CELULAR:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:20%;">
                                                        <p> 
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->celular : '' }}
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
                                                    <td  class="box-jll alinear-izquierda letra-componente" style="width:14%;">PUESTO:</td>
                                                    <td colspan="3" class="field-table-jll letra-componente justificar " style="width:53%;">
                                                        <p> 
                                                            {{ isset( $estudio->candidato ) ? $estudio->candidato->puesto : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="box-jll alinear-izquierda letra-componente " style="width:14%;">TELÉFONO RECADOS:</td>
                                                    <td  colspan="3" class="field-table-jll letra-componente justificar " style="width:19%;">
                                                        <p>
                                                            {{ isset( $estudio->candidato ) ? $estudio->candidato->telefono_recados : '' }}
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
                                                    <td  class="box-jll alinear-izquierda letra-componente " style="width:30%;">ENTRE QUE CALLES SE ENCUENTRA EL DOMICILIO:</td>
                                                    <td class="field-table-jll letra-componente justificar " style="width:70%;">
                                                        <p>
                                                            {{ isset( $estudio->formatoFemsa->datos_generales ) ? $estudio->formatoFemsa->datos_generales->entre_calles : '' }}  </p>
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
                                        <td class="letra-componente negrita alinear-centro" style="width: 25%;">DOCUMENTO</td>
                                        <td class="letra-componente negrita  alinear-centro" style="width: 65%;">ESPECIFICACIONES</td>
                                        <td class="letra-componente negrita  alinear-centro" style="width: 10%;">ORIGINAL/COPIA</td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class=" alinear-izquierda table-border letra-componente " style="width: 25%">&nbsp;ACTA DE NACIMIENTO</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>

                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 12%;">&nbsp;ACTA:</td>
                                                        <td class="letra-componente table-border" style="width: 13%;">
                                                            <p  class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->acta_no : '' }}
                                                            </p>
                                                        </td>
                                                        <td class="table-border alinear-centro  letra-componente" style="width: 12%;">AÑO:</td>
                                                        <td class="letra-componente table-border" style="width: 13%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->acta_anio : '' }}
                                                            </p>
                                                        </td> 
                                                        <td class="table-border alinear-centro  letra-componente" style="width: 12%;">LIBRO:</td>
                                                        <td class="letra-componente table-border" style="width: 13%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->acta_libro : '' }}
                                                            </p>
                                                        </td> 
                                                        <td class="table-border alinear-centro  letra-componente" style="width: 12%;">OFICIALIA:</td>
                                                        <td class="letra-componente table-border" style="width: 13%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->acta_oficialia : '' }}
                                                            </p>
                                                        </td> 

                                                    </tr>
                                                 
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;"><p> 
                                            {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->acta_corroboro : '' }}
                                        </p></td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente alinear-izquierda">&nbsp;INE ( VIGENTE )</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>                                                                                                                              
                                                    <tr>
                                                        <td class="table-border">
                                                            <table class="auto-width">
                                                                <tbody>
                                                                 <tr>
                                                                    <td colspan="3" class="table-border">
                                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                                    </td>

                                                                </tr>
                                                                    <tr>
                                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%;">&nbsp;CLAVE:</td>
                                                                        <td class="letra-componente table-border" style="width: 45%;">
                                                                            <p class="border-footer">
                                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->ine_clave_: '' }}
                                                                            </p>
                                                                        </td>
                                                                        <td class="table-border alinear-centro  letra-componente" style="width: 15%;">NÚMERO:</td>
                                                                        <td class="letra-componente table-border" style="width: 25%;">
                                                                            <p class="border-footer">
                                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->ine_no: '' }}
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td colspan="3" class="table-border">
                                                                             <span style=" display: inline-block;height: 0px;"></span>
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
                                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 25%;">
                                                                            &nbsp;COINCIDE CON DIRECCIÓN ACTUAL:
                                                                        </td>
                                                                        <td class="table-border alinear-centro   letra-componente" style="width: 10%;">SI</td>
                                                                        <td 
                                                                            @if( $estudio->formatoFemsa)
                                                                                @if( $estudio->formatoFemsa->documentacion->ine_direccion_actual == '1')
                                                                                    style="background-color:#FF8000;width: 5%;"
                                                                                @else
                                                                                    style="width: 5%;"
                                                                                @endif
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border alinear-centro   letra-componente" style="width: 10%;">NO</td>
                                                                        <td 
                                                                            @if( $estudio->formatoFemsa)
                                                                                @if( $estudio->formatoFemsa->documentacion->ine_direccion_actual == '2')
                                                                                    style="background-color:#FF8000;width: 5%;"
                                                                                @else
                                                                                    style="width: 5%;"
                                                                                @endif
                                                                            @endif>
                                                                        </td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td colspan="3" class="table-border">
                                                                             <span style=" display: inline-block;height: 0px;"></span>
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
                                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%;">&nbsp;DIRECCIÓN:</td>
                                                                        <td class="letra-componente table-border" style="width: 85%;">
                                                                            <p class="border-footer">
                                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->ine_direccion: '' }}
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3" class="table-border">
                                                                             <span style=" display: inline-block;height: 0px;"></span>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p> 
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->ine__corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente alinear-izquierda">&nbsp;CURP</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente">
                                                            &nbsp;{{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->curp : '' }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->curp_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente alinear-izquierda">&nbsp;RFC</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="alinear-izquierda letra-componente" style="width:65%;">
                                            <p>
                                                &nbsp;{{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->rfc_no : '' }}
                                            </p>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->rfc_corroboro: '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente alinear-izquierda">&nbsp;AFORE</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td  style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>

                                                        <td class="table-border alinear-izquierda letra-componente" style="width: 15%;">&nbsp;NÚMERO:</td>
                                                        <td class="letra-componente table-border" style="width: 30%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->afore_no : '' }}
                                                            </p>
                                                        </td>
                                                        <td class="table-border alinear-centro  letra-componente" style="width: 15%;">INSTITUCIÓN:</td>
                                                        <td class="letra-componente table-border" style="width: 25%;">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->afore_institucion : '' }}
                                                            </p>
                                                        </td> 

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->afore_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente alinear-izquierda">&nbsp;NO. DE AFILIACIÓN AL IMSS</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-izquierda " style="width:65%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->nss_no : '' }}
                                            </p>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->nss_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente alinear-izquierda">&nbsp;COMPROBANTE DE ESTUDIOS</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td  style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                 <tr>
                                                    <td colspan="3" class="table-border">
                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                    </td>

                                                </tr>
                                                    <tr>

                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">&nbsp;INSTITUCIÓN:</td>
                                                        <td colspan="3" class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->ce_institucion: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                                                 <tr>
                                                        <td colspan="3" class="table-border">
                                                             <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">&nbsp;DOCUMENTO:</td>
                                                        <td class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->ce_documento: '' }}
                                                            </p>
                                                        </td>
                                                        <td class="table-border alinear-izquierda  letra-componente">FOLIO:</td>
                                                        <td class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->ce_folio: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td colspan="3" class="table-border">
                                                             <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">&nbsp;GRADO:</td>
                                                        <td colspan="3" class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->ce_grado: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td colspan="3" class="table-border">
                                                             <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">&nbsp;LICENCIATURA:</td>
                                                        <td colspan="3" class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->ce_licenciatura: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                    <td colspan="3" class="table-border">
                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->ce_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente">&nbsp;COMPORBANTE DE DOMICILIO</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td  style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                     <tr>
                                                        <td colspan="3" class="table-border">
                                                             <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">&nbsp;TITULAR:</td>
                                                        <td  class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->cd_titular: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td colspan="3" class="table-border">
                                                             <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">&nbsp;SERVICIO Y FECHA:</td>
                                                        <td  class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->cd_servicio_fecha: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td colspan="3" class="table-border">
                                                             <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->cd_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente">LICENCIA DE MANEJO</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td  style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente " style="width: 15%">TIPO:</td>
                                                        <td  class="letra-componente table-border" style="width: 45%">
                                                            <p class="border-footer" >
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->licencia_manejo_tipo: '' }}
                                                            </p>
                                                        </td>                                                            
                                                        <td class="table-border alinear-derecha  letra-componente " style="width: 15%">NÚMERO Y VIGENCIA:</td>
                                                        <td  class="letra-componente table-border" style="width: 20%">
                                                            <p class="border-footer" >
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->licencia_manejo_no_vig: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->licencia_manejo_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente">CÉDULA PROFESIONAL</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td  style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">NÚMERO:</td>
                                                        <td  class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->cedula_no: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->cedula_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente">PASAPORTE</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td  style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">NÚMERO:</td>
                                                        <td  class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->pasaporte_no: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->pasaporte_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente">CRÉDITO INFONAVIT</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td  style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">NÚMERO:</td>
                                                        <td  class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->infonavit_no: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->infonavit_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente">CRÉDITO FONACOT</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td  style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">NÚMERO:</td>
                                                        <td  class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->fonacot_no: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:15%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->fonacot_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente">CARTILLA DE SERVICIO MILITAR NACIONAL</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">MATRICULA:</td>
                                                        <td  class="letra-componente table-border" style="width: 45%">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->cartilla_matricula: '' }}
                                                            </p>
                                                        </td>
                                                        <td class="table-border alinear-derecha letra-componente" style="width: 15%">LIBERACIÓN:</td>
                                                        <td  class="letra-componente table-border" style="width: 20%">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->cartilla_liberacion: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->cartilla_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente">ACTA DE MATRIMONIO</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td  style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">JUZGADO:</td>
                                                        <td  class="letra-componente table-border" style="width:45% ">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->actam_juzgado: '' }}
                                                            </p>
                                                        </td>
                                                        <td class="table-border alinear-derecha letra-componente" style="width: 15%">NÚMERO:</td>
                                                        <td  class="letra-componente table-border" style="width:20% ">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->actam_no: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro" style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->actam_corroboro : '' }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:25%;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-border letra-componente">ÚLTIMO RECIBO DE PERCEPCIONES</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td  style="width:65%;">
                                            <table class="auto-width">
                                                <tbody>
                                                 <tr>
                                                    <td colspan="3" class="table-border">
                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                    </td>

                                                </tr>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente" style="width: 15%">EMPRESA:</td>
                                                        <td colspan="3" class="letra-componente table-border">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->recibo_percepciones_empresa: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                                             <tr>
                                                    <td colspan="3" class="table-border">
                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                    </td>

                                                </tr>
                                                    <tr>
                                                        <td class="table-border alinear-izquierda  letra-componente"  style="width: 15%">PUESTO:</td>
                                                        <td  class="letra-componente table-border" style="width: 45%">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->recibo_percepciones_puesto: '' }}
                                                            </p>
                                                        </td>
                                                        <td class="table-border alinear-derecha  letra-componente" style="width:15%">INGRESO:</td>
                                                        <td  class="letra-componente table-border" style="width:20%">
                                                            <p class="border-footer">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->recibo_percepciones_ingreso: '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                                         <tr>
                                                <td colspan="3" class="table-border">
                                                     <span style=" display: inline-block;height: 15px;"></span>
                                                </td>

                                            </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="letra-componente alinear-centro"  style="width:25%;">
                                            <p>
                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->documentacion->recibo_percepciones_corroboro : '' }}
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
                                                <p class="alinear-centro letra-componente negrita">
                                                    OBSERVACIONES
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="letra-componente">
                                                    {{ isset($estudio->formatoFemsa ) ?$estudio->formatoFemsa->documentacion->observaciones : '' }}
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
                                                            <th class="letra-componente negrita alinear-centro" style="width: 10%;">GRADO</th>
                                                            <th class="letra-componente negrita alinear-centro" style="width: 20%;">INSTITUCIÓN</th>
                                                            <th class="letra-componente negrita alinear-centro" style="width: 25%;">DOMICILIO</th>
                                                            <th class="letra-componente negrita alinear-centro" style="width: 10%;">PERIODO</th>
                                                            <th class="letra-componente negrita alinear-centro" style="width: 5%;">AÑOS</th>
                                                            <th class="letra-componente negrita alinear-centro" style="width: 10%;">COMPROBANTE</th>   
                                                            <th class="letra-componente negrita alinear-centro" style="width: 10%;">FOLIO</th>   
                                                            

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( $estudio->formatoFemsa )
                                                        @foreach( $estudio->formatoFemsa->escolaridad as $row )
                                                        <tr>                                                                             
                                                            <td style="width: 10%;" class="letra-componente alinear-izquierda">{{ $row->grado  }}</td>
                                                            <td class="letra-componente alinear-centro" style="width: 20%;"><p>{{ $row->institucion }}</p></td>
                                                            <td class="letra-componente alinear-centro" style="width: 25%;"><p>{{ $row->domicilio }}</p></td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%;"><p>{{ $row->periodo }}</p></td>
                                                            <td class="letra-componente alinear-centro" style="width: 5%;"><p>{{ $row->anios }}</p></td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%;"><p>{{ $row->comprobante }}</p></td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%;"><p>{{ $row->folio }}</p></td>
                                                            
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
                                                <p class="letra-componente alinear-izquierda letra-componente">
                                                    Si es trunco, ¿Por qué abandonó sus estudios?
                                                </p>
                                            </td>
                                            <td class="letra-componente" style="width: 65%;">
                                                <p>
                                                    {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->escolaridad_obs->trunco_abandono : '' }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>                                                                        
                                            <td style="width: 35%;">
                                                <p class="letra-componente alinear-izquierda letra-componente">
                                                    Si está estudiando, ¿Qué días y en qué horario?
                                                </p>
                                            </td>
                                            <td class="letra-componente" style="width: 65%;">
                                                <p>
                                                    {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->escolaridad_obs->estudia_horario : '' }}
                                                </p>
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
                                                                <p class="alinear-centro letra-componente negrita">
                                                                    OBSERVACIONES
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-componente">
                                                                    {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->escolaridad_obs->observaciones : '' }}
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
                                            <td class="">
                                                <table class="tabla-componente">

                                                    <tbody>

                                                        @if( $estudio->formatoFemsa)
                                                        @foreach ($estudio->formatoFemsa->cursos as $curso)
                                                        <tr>
                                                            <td class="table-border letra-componente  alinear-derecha" style="width:10%;">DE</td>
                                                            <td class="letra-componente table-border alinear-centro" style="width:15%;">
                                                                <p class="border-footer">
                                                                    {{ $curso->de}}
                                                                </p>
                                                            </td>        
                                                            <td class="table-border letra-componente  alinear-derecha" style="width:10%;">A</td>
                                                            <td class="letra-componente table-border alinear-centro" style="width:15%;">
                                                                <p class="border-footer">
                                                                    {{ $curso->a}}
                                                                </p>
                                                            </td>                
                                                            <td class="table-border letra-componente  alinear-derecha" style="width:10%;">REALIZÓ</td>
                                                            <td class="letra-componente table-border alinear-centro" style="width:40%;">
                                                                <p class="border-footer">
                                                                    {{ $curso->curso}}
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
                                                            <th style="width:5%;" class="letra-componente negrita alinear-centro">#</th>
                                                            <th style="width:12%;" class="letra-componente negrita alinear-centro">IDIOMA</th>
                                                            <th style="width:12%;" class="letra-componente negrita alinear-centro">HABLADO</th>
                                                            <th style="width:12%;" class="letra-componente negrita alinear-centro">LEÍDO</th>
                                                            <th style="width:12%;" class="letra-componente negrita alinear-centro">ESCRITO</th>
                                                            <th style="width:12%;" class="letra-componente negrita alinear-centro">COMPRENSIÓN</th>
                                                            <th style="width:12%;" class="letra-componente negrita alinear-centro">%</th>
                                                            <th style="width:12%;" class="letra-componente negrita alinear-centro">ESCALA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( $estudio->formatoFemsa)
                                                        @foreach ($estudio->formatoFemsa->idiomas as $index => $idioma )
                                                        <tr>  
                                                            <td class="letra-componente alinear-centro" style="width:5%;">
                                                                {{ ($index + 1) }}
                                                                
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                {{ $idioma->idioma }}
                                                                
                                                            </td>                
                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                {{ $idioma->hablado }} %
                                                                
                                                            </td>              
                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                {{ $idioma->leido }} %
                                                                
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                {{ $idioma->escrito }} %
                                                                
                                                            </td>                
                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                {{ $idioma->comprension}} %
                                                                
                                                            </td>                
                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                {{ $idioma->porcentaje }}
                                                                
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
                                <td colspan="3" class="table-border" style="padding: 0">
                                    &nbsp; 
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="table-border">
                                    <table class="tabla-componente">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="alinear-centro titulo-componente negrita">
                                                        CONOCIMIENTOS Y HABILIDADES
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table-border"  style="padding: 0">
                                                    <table class="tabla-componente">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:5%;" class="letra-componente negrita">#</th>
                                                                <th style="width:70%;" class="letra-componente negrita">PAQUETERIA</th>
                                                                <th style="width:12%;" class="letra-componente negrita">%</th>                                                                    
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if( $estudio->formatoFemsa )
                                                            @foreach ($estudio->formatoFemsa->conocmientos_habilidades as $index => $conocimiento)
                                                            <tr>
                                                                <td class="letra-componente alinear-centro" style="width:5%;">
                                                                    <p>
                                                                        {{ ($index+1) }}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente justificar" style="width:83%;">
                                                                    <p>
                                                                        {{ $conocimiento->paqueteria }} 
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-centro" style="width:12%;">
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
                                                                <th class="letra-componente negrita alinear-centro" style="width: 10%;">PARENTESCO</th>
                                                                <th class="letra-componente negrita alinear-centro" style="width: 25%;">NOMBRE</th>
                                                                <th class="letra-componente negrita alinear-centro" style="width: 10%;">EDAD</th>
                                                                <th class="letra-componente negrita alinear-centro" style="width: 10%;">EDO. CIVIL</th>
                                                                <th class="letra-componente negrita alinear-centro" style="width: 25%;">OCUPACIÓN (Empresa)</th>
                                                                <th class="letra-componente negrita alinear-centro" style="width: 20%;">DOMICILIO</th>   

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if( $estudio->formatoFemsa )
                                                            @foreach( $estudio->formatoFemsa->datos_familiares as $familiar )
                                                            <tr>                                                                             
                                                                <td class="letra-componente" style="width: 10%;"><p>{{ $familiar->parentesco  }}</p></td>
                                                                <td class="letra-componente" style="width: 25%;"><p>{{ $familiar->nombre }}</p></td>
                                                                <td class="letra-componente" style="width: 10%;"><p>{{ $familiar->edad }}</p></td>
                                                                <td class="letra-componente" style="width: 10%;"><p>{{ $familiar->edo_civil }}</p></td>
                                                                <td class="letra-componente" style="width: 25%;"><p>{{ $familiar->ocupacion }}</p></td>
                                                                <td class="letra-componente" style="width: 20%;"><p>{{ $familiar->domicilio }}</p></td>
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
                                                <td style="width: 35%;">
                                                    <p class="letra-componente alinear-izquierda">
                                                        ¿Con quién habita actualmente?
                                                    </p>
                                                </td>                                                
                                                <td class="letra-componente" style="width: 65%;">
                                                    <p>
                                                        {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->habita_actualmente : '' }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>                                                                        
                                                <td style="width: 35%;">
                                                    <p class="letra-componente alinear-izquierda">
                                                        ¿Cómo considera que es su relación con ellos?
                                                    </p>
                                                </td>
                                                <td class="letra-componente" style="width: 65%;">
                                                    <p>
                                                        {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->relacion : '' }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>                                                                        
                                                <td style="width: 35%;">
                                                    <p class="letra-componente alinear-izquierda">
                                                        ¿Tiene familiares viviendo en el extranjero?, ¿Quiénes y en dónde?
                                                    </p>
                                                </td>
                                                <td class="letra-componente" style="width: 65%;">
                                                    <p>
                                                        {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->familiares_extranjero : '' }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>                                                                        
                                                <td style="width: 35%;">
                                                    <p class="letra-componente alinear-izquierda">
                                                        Y, ¿al interior de la República?. ¿En dónde?
                                                    </p>
                                                </td>
                                                <td class="letra-componente" style="width: 65%;">
                                                    <p>
                                                        {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->interior_republica : '' }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>                                                                        
                                                <td style="width: 35%;">
                                                    <p class="letra-componente alinear-izquierda">
                                                        ¿Con qué frecuencia los visita?
                                                    </p>
                                                </td>
                                                <td class="letra-componente" style="width: 65%;">
                                                    <p>
                                                        {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->visita_frecuencia : '' }}
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
                                                        OBSERVACIONES
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="letra-componente">
                                                        {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->informacion_familiar->observaciones : '' }}
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!-- ----------------------------------------------------situacion familiar-------------------------------------- -->
                            <!-- ----------------------------------------------------situacion economica -->
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

                                                                <th class="letra-componente negrita alinear-centro " style="width:10%;">APORTACIONES</th>
                                                                <th class="letra-componente negrita alinear-centro " style="width:20%;">TIPO DE INGRESO</th>
                                                                <th class="letra-componente negrita alinear-centro " style="width:20%;">CANTIDAD</th>
                                                                <th class="letra-componente negrita alinear-centro " style="width:30%;">CONCEPTO</th>
                                                                <th class="letra-componente negrita alinear-centro " style="width:20%;">EGRESOS</th>    

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente " style="width:10%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->aportacion1 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->i_concepto1 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->i_monto1 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->i_monto1,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p class=" alinear-izquierda">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->e_concepto1 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->e_monto1 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->e_monto1,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif

                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente " style="width:10%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->aportacion2 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->i_concepto2 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->i_monto2 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->i_monto2,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p class=" alinear-izquierda">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->e_concepto2 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->e_monto2 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->e_monto2,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif

                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente " style="width:10%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->aportacion3 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->i_concepto3 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->i_monto3 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->i_monto3,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif
                                                                        
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p class=" alinear-izquierda">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->e_concepto3 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->e_monto3 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->e_monto3,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif

                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente " style="width:10%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->aportacion4 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->i_concepto4 :''}}
                                                                        
                                                                        
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->i_monto4 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->i_monto4,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p class=" alinear-izquierda">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->e_concepto4 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->e_monto4 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->e_monto4,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif

                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente " style="width:10%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->aportacion5 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->i_concepto5 :''}}
                                                                                                                                                
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->i_monto5 > '0' )
                                                                            ${{ number_format( $estudio->formatoFemsa->situacion_economica->i_monto5 ,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p class=" alinear-izquierda">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->e_concepto5 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->e_monto5 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->e_monto5,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif

                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente " style="width:10%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->aportacion6 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->i_concepto6 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->i_monto6 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->i_monto6,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p class=" alinear-izquierda">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->e_concepto6 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->e_monto6 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->e_monto6,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif

                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente " style="width:10%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->aportacion7 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->i_concepto7 :''}}
                                                                        
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->i_monto7 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->i_monto7,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p class=" alinear-izquierda">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->e_concepto7 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->e_monto7 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->e_monto7,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif

                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente " style="width:10%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->aportacion8 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->i_concepto8 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->i_monto8 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->i_monto8,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p class=" alinear-izquierda">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->e_concepto8 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->e_monto8 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->e_monto8,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif

                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente " style="width:10%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->aportacion9 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->i_concepto9 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->i_monto9 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->i_monto9,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p class=" alinear-izquierda">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->e_concepto9 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->e_monto9 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->e_monto9,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif

                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente " style="width:10%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->aportacion10 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->i_concepto10 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa )
                                                                        @if( $estudio->formatoFemsa->situacion_economica->i_monto10 > '0' )
                                                                            ${{ number_format( $estudio->formatoFemsa->situacion_economica->i_monto10,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p class=" alinear-izquierda">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->e_concepto10 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->e_monto10 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->e_monto10,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif


                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente " style="width:10%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->aportacion11 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-centro">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->i_concepto11 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa )
                                                                        @if( $estudio->formatoFemsa->situacion_economica->i_monto11 > '0' )
                                                                            ${{ number_format( $estudio->formatoFemsa->situacion_economica->i_monto11,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                    <p class=" alinear-izquierda">
                                                                        {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->e_concepto11 :''}}
                                                                    </p>
                                                                </td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                    <p class=" alinear-derecha">
                                                                        @if( $estudio->formatoFemsa ) 
                                                                        @if( $estudio->formatoFemsa->situacion_economica->e_monto11 > '0' )
                                                                            ${{ number_format($estudio->formatoFemsa->situacion_economica->e_monto11,2) }}
                                                                        @else
                                                                            --
                                                                        @endif
                                                                        @endif


                                                                    </p>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <tr>
                                                                    <td colspan="2"  class="letra-componente" style="width:20%;">
                                                                        <p class=" alinear-derecha ">
                                                                            TOTAL INGRESOS
                                                                        </p>
                                                                    </td>
                                                                    <td class="letra-componente" style="width:20%;">
                                                                        <p class=" alinear-derecha ">
                                                                            ${{ isset( $estudio->formatoFemsa ) ? number_format($estudio->formatoFemsa->situacion_economica->i_total,2) :''}}
                                                                        </p>
                                                                    </td>                                                                        
                                                                    <td class="letra-componente" style="width:20%;">
                                                                        <p class=" alinear-derecha ">
                                                                            TOTAL EGRESOS                                                                           
                                                                        </p>
                                                                    </td>
                                                                    <td class="letra-componente" style="width:20%;">
                                                                        <p class=" alinear-derecha ">
                                                                            ${{ isset( $estudio->formatoFemsa ) ? number_format($estudio->formatoFemsa->situacion_economica->e_total,2) :''}}
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
                                                            <p class="alinear-izquierda letra-componente negrita">
                                                                Si hay déficit, ¿Cómo lo solventa?
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p class="letra-componente">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_economica->deficit : '' }}
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
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:30%;">ACTIVOS</th>
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:5%;">SI</th>
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:5%;">NO</th>
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:30%;">TIPO</th>
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:10%;">VALOR</th>    
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:10%;">PAGADO</th>    
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:10%;">ADEUDO</th>    

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if( $estudio->formatoFemsa )
                                                                    @foreach( $estudio->formatoFemsa->bienes as $bien )
                                                                    <tr>
                                                                        <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                            <p>
                                                                                {{ $bien->activo }}                                                                                
                                                                            </p>
                                                                        </td>
                                                                        <td class="letra-componente alinear-centro"
                                                                                @if( $bien->tiene == '1' )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                                @else
                                                                                style="width: 5%;"
                                                                                @endif>
                                                                        </td>
                                                                        <td class="letra-componente alinear-centro"
                                                                                @if( $bien->tiene == '2' )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                                @else
                                                                                style="width: 5%;"
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
                                                                                    ${{ number_format($bien->valor,2) }}
                                                                                @else
                                                                                    --
                                                                                @endif
                                                                            </p>
                                                                        </td>
                                                                        <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                            <p>
                                                                                @if( $bien->pagado > '0' )
                                                                                    ${{ number_format($bien->pagado,2) }}
                                                                                @else
                                                                                    --
                                                                                @endif
                                                                            </p>
                                                                        </td>
                                                                        <td class="letra-componente alinear-derecha" style="width:10%;">
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
                                                                        <td colspan="4" class="letra-componente" style="width:70%;">
                                                                            <p class=" alinear-derecha ">
                                                                                TOTAL INGRESOS
                                                                            </p>
                                                                        </td>
                                                                        <td class="letra-componente" style="width:10%;">
                                                                            <p class=" alinear-derecha ">
                                                                                @if( $estudio->formatoFemsa )
                                                                                @if( $estudio->formatoFemsa->bienes_totales->valor > '0' )
                                                                                    ${{ number_format($estudio->formatoFemsa->bienes_totales->valor,2) }}
                                                                                @else
                                                                                    --
                                                                                @endif
                                                                                @endif
                                                                            </p>
                                                                        </td>                                                                        
                                                                        <td class="letra-componente" style="width:10%;">
                                                                            <p class=" alinear-derecha">
                                                                                @if( $estudio->formatoFemsa )
                                                                                @if( $estudio->formatoFemsa->bienes_totales->pagado > '0' )
                                                                                    ${{ number_format($estudio->formatoFemsa->bienes_totales->pagado ,2) }}
                                                                                @else
                                                                                    --
                                                                                @endif
                                                                                @endif

                                                                            </p>
                                                                        </td>
                                                                        <td class="letra-componente" style="width:10%;">
                                                                            <p class="alinear-derecha ">
                                                                                @if( $estudio->formatoFemsa )
                                                                                @if( $estudio->formatoFemsa->bienes_totales->adeudo > '0' )
                                                                                    ${{ number_format($estudio->formatoFemsa->bienes_totales->adeudo ,2) }}
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
                                                            <p class="alinear-izquierda letra-componente">
                                                                Ubicación de las propiedades
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p class="letra-componente">
                                                                {{ isset($estudio->formatoFemsa ) ? $estudio->formatoFemsa->bienes_totales->ubicacion : '' }}
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
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 20%">TIPO VIVIENDA</th>
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 20%">EL INMUEBLE ES</th>
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 20%">SERVICIOS</th>
                                                                        <th colspan="2" class="letra-componente" style="width: 20%">DISTRIBUCIÓN</th>                                           
                                                                    </tr>
                                                                </thead>
                                                                <tbody>                                                                         
                                                                    <tr>
                                                                        <td class="table-border alinear-centro" style="width: 20%">
                                                                            <table class="tabla-componente">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_vivienda->propia ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                PROPIA
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_vivienda->rentada ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                RENTADA           
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_vivienda->hipotecada ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                HIPOTECA           
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_vivienda->congelada ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                CONGELADA             
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_vivienda->prestada ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                PRESTADA              
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_vivienda->de_padres ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                DE PADRES       
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_vivienda->otro ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                OTRO               
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>                                                                    
                                                                        <td class="table-border  alinear-centro" style="width: 20%">
                                                                            <table class="tabla-componente">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_propiedad->casa ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                CASA        
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_propiedad->depto ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                DEPARTAMENTO                  
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_propiedad->duplex ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                DUPLEX             
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_propiedad->condominio ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                CONDOMINIO           
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_propiedad->vecindad ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                VECINDAD
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_propiedad->cuarto ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                CUARTO   
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->tipo_propiedad->otro ) != ''  )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                OTRO               
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td class="table-border alinear-izquierda alinear-centro" style="width: 20%">
                                                                            <table class="tabla-componente">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->info_vivienda_servicios->luz) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                LUZ              
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="alinear-centro"
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->info_vivienda_servicios->agua) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                AGUA                       
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->info_vivienda_servicios->pavimento) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                PAVIMENTACIÓN                  
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td 
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->info_vivienda_servicios->drenaje) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                DRENAJE           
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->info_vivienda_servicios->telefono) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td class="alinear-centro">
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                TELÉFONO                          
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->info_vivienda_servicios->seg_publica) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                SEG. PÚBLICA 
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->info_vivienda_servicios->alumbrado) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                ALUMBRADO              
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td class="table-border alinear-izquierda alinear-centro" style="width: 20%">                                                                                
                                                                            <table class="tabla-componente">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->sala ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                SALA             
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->comedor ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                COMEDOR                       
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->recamara ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                RECAMARA                 
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->cocina ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                COCINA           
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->banio ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                BAÑO                         
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->garaje ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                GARAJE  
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->biblioteca ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                BIBLIOTECA           
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td class="table-border alinear-izquierda alinear-centro" style="width: 20%">
                                                                            <table class="tabla-componente">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->jardin ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                JARDIN            
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->zotehuela ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                ZOTEHUELA              
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->patio ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                PATIO         
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->estudio ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                ESTUDIO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_distribucion->cuarto_servicio ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                        </td>
                                                                                        <td class="table-border alinear-izquierda">
                                                                                            <p class="letra-componente">
                                                                                                CUARTO DE SERVICIO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>

                                                                                </tbody>
                                                                            </table>                                                                                
                                                                        </td>

                                                                    </tr>
                                                                     <tr>
                                                                        <td colspan="3" class="table-border">
                                                                             <span style=" display: inline-block;height: 15px;"></span>
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" class="table-border">
                                                                            <table class="tabla-componente" >
                                                                                <tbody>
                                                                                    <tr>

                                                                                        <td style="width: 30%">
                                                                                            <p class="letra-componente">
                                                                                                ¿Cuántas personas viven en el domicilio?             
                                                                                            </p>
                                                                                        </td>
                                                                                        <td style="width: 70%" class="letra-componente">
                                                                                            {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->tipo_vivienda->viven_domicilio : '' }}
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
                                                                        <th class="letra-componente alinear-centro" style="width:20%;">NIVEL ECONÓMICO</th>
                                                                        <th class="letra-componente alinear-centro" style="width:20%;">CONSTRUCCIÓN</th>
                                                                        <th class="letra-componente alinear-centro" style="width:20%;">CONSERVACIÓN</th>
                                                                        <th class="letra-componente alinear-centro" style="width:20%;">MOBILIARIO</th>
                                                                        <th class="letra-componente alinear-centro" style="width:20%;">DE CORTE</th>                                         
                                                                    </tr>
                                                                </thead>
                                                                <tbody>                                                                         
                                                                    <tr>
                                                                        <td class="table-border" style="width:20%;">
                                                                            <table class="tabla-componente">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_nivel_economico->alta ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                ALTA      
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_nivel_economico->media_alta ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                MEDIA ALTA          
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_nivel_economico->media ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                MEDIA        
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_nivel_economico->media_baja ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                MEDIA BAJA             
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->info_vivienda_nivel_economico->baja ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
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
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->vivienda_construccion->antigua) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                ANTIGUA  
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->vivienda_construccion->sencilla) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                SENCILLA
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->vivienda_construccion->moderna) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                MODERNA
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->vivienda_construccion->semi_moderna) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                SEMI-MODERNA
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim($estudio->formatoFemsa->vivienda_construccion->convencional) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
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
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_conservacion->excelente ) != '' )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            

                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                EXCELENTE
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_conservacion->bueno ) != '' )

                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                BUENO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_conservacion->regular ) != '' )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                REGULAR
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_conservacion->malo ) != '' )

                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                MALO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>

                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_conservacion->pesimo ) != '' )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
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
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_calidad_mobiliario->completo ) !='' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                COMPLETO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_calidad_mobiliario->incompleto ) !='' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                INCOMPLETO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            
                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_calidad_mobiliario->escueto ) !='' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>
                                                                                            
                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
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

                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_corte->variado ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                VARIADO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td

                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_corte->conservador ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                CONSERVADOR
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td

                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_corte->moderno ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                MODERNO
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td

                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_corte->colonial ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
                                                                                                COLONIAL
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td

                                                                                            @if( $estudio->formatoFemsa )
                                                                                            @if( trim( $estudio->formatoFemsa->vivienda_corte->sencillo ) != '' )
                                                                                            style="background-color:#FF8000; width: 30%;"
                                                                                            @else
                                                                                            style="width: 30%;"
                                                                                            @endif
                                                                                            @endif>

                                                                                        </td>
                                                                                        <td class="table-border">
                                                                                            <p class="letra-componente">
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
                                                            <p class="alinear-centro letra-componente negrita">
                                                                CONDICIONES INTERNAS
                                                            </p>
                                                        </td>
                                                        <td style="width: 50%;">
                                                            <p class="alinear-centro letra-componente negrita">
                                                                CONDICIONES EXTERNAS
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50%;">
                                                            <p class="letra-componente">
                                                                {{ isset($estudio->formatoFemsa ) ?$estudio->formatoFemsa->vivienda_corte->condiciones_internas : '' }}
                                                            </p>
                                                        </td>
                                                        <td style="width: 50%;">
                                                            <p class="letra-componente">
                                                                {{ isset($estudio->formatoFemsa ) ?$estudio->formatoFemsa->vivienda_corte->condiciones_externas : '' }}
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
                                                            <p class="alinear-centro letra-componente negrita">
                                                                TIENE FAMILIARES Y/O CONOCIDOS EN LA EMPRESA
                                                            </p>
                                                        </td>
                                                        <td style="width: 50%">
                                                            <p class="alinear-centro letra-componente negrita">
                                                                COMO SE ENTERO DE LA VACANTE
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50%" class="alinear-centro">
                                                            <table class="auto-width">
                                                                <tbody>
                                                                 <tr>
                                                                    <td colspan="4" class="table-border">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                               
                                                                    <tr>
                                                                    <td style="width: 20%" class="table-border"></td>
                                                                        <td  

                                                                            @if( $estudio->formatoFemsa )
                                                                            @if( $estudio->formatoFemsa->familiar_empresa->familiar_empresa == '1' )
                                                                            style="background-color:#FF8000; width: 10%;"
                                                                            @else
                                                                            style="width: 10%;"
                                                                            @endif
                                                                            @endif>
                                                                        </td>
                                                                        <td style="width: 20%" class="table-border letra-componente alinear-izquierda">&nbsp; SI</td>
                                                                        <td 
                                                                            @if( $estudio->formatoFemsa )
                                                                            @if( $estudio->formatoFemsa->familiar_empresa->familiar_empresa == '2' )
                                                                            style="background-color:#FF8000; width: 10%;"
                                                                            @else
                                                                            style="width: 10%;"
                                                                            @endif
                                                                            @endif>
                                                                        </td>
                                                                        <td style="width: 20%" class="table-border letra-componente alinear-izquierda">&nbsp; NO</td>

                                                                    </tr>
                                                                             
                                                                    <tr>
                                                                        <td class="table-border letra-componente" style="width: 25%">
                                                                          
                                                                                ESPECIFICAR
                                                                       
                                                                        </td>
                                                                        <td  colspan="4" class="table-border letra-componente" style="width: 75%">
                                                                            <p class=" border-footer">
                                                                                @if( $estudio->formatoFemsa )
                                                                                @if( $estudio->formatoFemsa->familiar_empresa->familiar_empresa == '1' )
                                                                                {{ $estudio->formatoFemsa->familiar_empresa->familiar_empresa_si }}
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
                                                           
                                                             <p class="alinear-izquierda letra-componente border-footer">
                                                                Medio : {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->familiar_empresa->entero_vacante : '' }}
                                                             </p>
                                                          
                                                            <p class="alinear-izquierda letra-componente border-footer">
                                                                Nombre del reclutador: {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->familiar_empresa->reclutador : '' }}
                                                            </p>
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
                                                                CROQUIS DE LA HUBICACIÓN DEL DOMICILIO
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
                                                                ['style' => 'max-width:100%;']
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
                                                        <td style="width: 50%">
                                                            <p class="alinear-izquierda letra-componente">
                                                                DISTANCIA DE SU CASA AL TRABAJO
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="letra-componente  alinear-izquierda">
                                                                {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->ubicacion_domicilio->distancia_domicilio: '' }}
                                                            </p>
                                                        </td style="width: 50%">
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50%">
                                                            <p class="alinear-izquierda letra-componente">
                                                                MEDIO DE TRANSPORTE QUE UTILIZA
                                                            </p>
                                                        </td style="width: 50%">
                                                        <td>
                                                            <p class="letra-componente alinear-izquierda">
                                                                {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->ubicacion_domicilio->transporte_utiliza: '' }}
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
                                                        <td class="alinear-centro letra-componente">
                                                            ORGANIZACIONES A LAS QUE HA PERTENECIDO
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="alinear-centro letra-componente">
                                                            {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_social->pertenece_organizaciones : '' }}
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
                                                            <p class="alinear-centro letra-componente">
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
                                                                            <p class="alinear-derecha letra-componente table-border">
                                                                                SI &nbsp;&nbsp;
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->situacion_social->demanda_laboral == '1' )
                                                                            style="background-color:#FF8000; width: 10%;"
                                                                            @else
                                                                            style="width: 10%;"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td style="width: 10%"  class="table-border">
                                                                            <p class="alinear-derecha letra-componente table-border">
                                                                              NO  &nbsp;&nbsp;
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->situacion_social->demanda_laboral == '2' )
                                                                            style="background-color:#FF8000; width: 10%;"
                                                                            @else
                                                                            style="width: 10%;"
                                                                            @endif 
                                                                            @endif>

                                                                        </td>
                                                                        <td style="width: 20%" class="table-border">
                                                                            <p class="alinear-derecha letra-componente">
                                                                                MOTIVO:
                                                                            </p>
                                                                        </td>
                                                                        <td  class=" letra-componente alinear-centro table-border" style="width: 40%">
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->situacion_social->demanda_laboral == '1' )
                                                                            {{ $estudio->formatoFemsa->situacion_social->motivo_demanda }}
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
                                                        <td style="width: 25%">
                                                            <p class="alinear-centro letra-componente negrita">
                                                                INTERESES A CORTO PLAZO
                                                            </p>
                                                        </td>
                                                        <td style="width: 25%">
                                                            <p class="alinear-centro letra-componente negrita">
                                                                INTERESES A MEDIANO PLAZO
                                                            </p>
                                                        </td>
                                                        <td style="width: 25%">
                                                            <p class="alinear-centro letra-componente negrita">
                                                                INTERESES A LARGO PLAZO
                                                            </p>
                                                        </td>
                                                        <td style="width: 25%">
                                                            <p class="alinear-centro letra-componente negrita">
                                                                ¿ CUALES SON SUS PRINCIPALES PASATIEMPOS ?
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%">
                                                            <p class="letra-componente">
                                                                {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_social->interes_corto_plazo : '' }}
                                                            </p>
                                                        </td>
                                                        <td style="width: 25%">
                                                            <p class="letra-componente">
                                                                {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_social->interes_mediano_plazo : '' }}
                                                            </p>
                                                        </td>
                                                        <td style="width: 25%">
                                                            <p class="letra-componente">
                                                                {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_social->interes_largo_plazo : '' }}
                                                            </p>
                                                        </td>

                                                        <td style="width: 25%">
                                                            <p class="letra-componente">
                                                                {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->situacion_social->pasatiempos : '' }}
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
                                        <td colspan="3" class="table-border">
                                            <table class="tabla-componente">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <p class="alinear-centro titulo-componente-principal">
                                                                ESTADO DE SALUD
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="" >
                                            <table class="tabla-componente">
                                                <tbody>
                                                    <tr>
                                                    <p></p>
                                                        <td class="table-border" style="width: 25%">
                                                            <p class="alinear-centro letra-componente ">
                                                                ¿CÓMO CONSIDERA SU ESTADO DE SALUD? :
                                                            </p>
                                                        </td>
                                                        <td class="table-border" style="width: 70%">
                                                            <table class="tabla-componente">
                                                                <tbody>
                                                                    <tr>
                                                                        <td 
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->estado_salud == '1' )
                                                                            style="background-color:#FF8000; width: 10%"
                                                                            @else
                                                                            style="width: 10%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 20%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                BUENO
                                                                            </p>
                                                                        </td>
                                                                        <td 
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->estado_salud == '2' )
                                                                            style="background-color:#FF8000; width: 10%"
                                                                            @else
                                                                            style="width: 10%"
                                                                            @endif 
                                                                            @endif>

                                                                        </td>
                                                                        <td class="table-border" style="width: 20%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                REGULAR
                                                                            </p>
                                                                        </td>

                                                                        <td 
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->estado_salud == '3' )
                                                                            style="background-color:#FF8000; width: 10%"
                                                                            @else
                                                                            style="width: 10%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 20%">
                                                                            <p class="alinear-izquierda letra-componente">
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
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>

                                        </tr>
                                                <tr>
                                                    <td colspan="3" class=" table-border" >
                                                        <table class="tabla-componente">
                                                            <tbody>
                                                   
                                                    <tr>
                                                        <td colspan="2" class="">
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
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->anemia == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ANEMIA
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->asma == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ASMA
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->gripe == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                GRIPE
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->presion_alta == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                PRESIÓN ALTA
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->epilepsia == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                EPILEPSIA
                                                                            </p>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->gastritis == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                GASTRITIS
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->espalda == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ESPALDA
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->migrania == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                MIGRAÑA
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->presion_baja == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                PRESIÓN BAJA
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->problemas_cardiacos == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                PROBLEMAS CARDIACOS
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->ulcera == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ÚLCERA
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->artritis == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ARTRITTIS
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->bronquitis == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                BRONQUITIS
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->enfermedad->rinon == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                RIÑON
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
                                                    <td colspan="3" class=" table-border" >
                                                        <table class="tabla-componente">
                                                            <tbody>
                                                    <tr>
                                                        <td colspan="2" class="">
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
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->acidez == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ACIDEZ
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->ansiedad == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ANSIEDAD
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->dolor_cabeza == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                DOLOR DE CABEZA
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->estrenimiento == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ESTREÑIMIENTO
                                                                            </p>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->insomnio == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                INSOMNIO
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->escalofrios == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ESCALOFRÍOS
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->manos_temblorosas == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                MANOS TEMBLOROSAS
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->alergia == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ALERGIA
                                                                            </p>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-derecha letra-componente">
                                                                                TIPO
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro letra-componente" style="width: 10%">
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->alergia == '1' )
                                                                                {{ $estudio->formatoFemsa->padecimiento->tipo }}
                                                                            @endif 
                                                                            N/A
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->debilidad == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                DEBILIDAD
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->mareos == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                MAREOS
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->taquicardia == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-derecha letra-componente">
                                                                                TAQUICARIDA
                                                                            </p>
                                                                        </td> 
                                                                    </tr>
                                                                    <tr>

                                                                        <td class="table-border" colspan="4" style="width: 10%">
                                                                            <p class="alinear-centro letra-componente">
                                                                                ¿SE ENCUENTRA BAJO TRATAMIENTO MEDICO?
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->tratamiento_medico == '1' )
                                                                            style="background-color:#FF8000; width: 5%"
                                                                            @else
                                                                            style="width: 5%"
                                                                            @endif                                                                             
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border"  style="width: 10%">
                                                                            <p class="alinear-derecha letra-componente">
                                                                                PADECIMIENTO
                                                                            </p>
                                                                        </td>
                                                                        <td colspan="4" class="alinear-centro" style="width: 10%">
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->tratamiento_medico == '1' )
                                                                            
                                                                                {{ $estudio->formatoFemsa->padecimiento->tratamiento_medico_desc }}
                                                                            @else
                                                                            N/A
                                                                            @endif                                                                             
                                                                            @endif
                                                                        </td> 
                                                                    </tr>
                                                                    <tr>

                                                                        <td class="table-border" colspan="4" style="width: 10%">
                                                                            <p class="alinear-centro letra-componente">
                                                                                ¿TOMA ALGÚN MEDICAMENTO CONTROLADO?
                                                                            </p>
                                                                        </td>
                                                                        <td class="alinear-centro"
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->medicamento_controlado == '1' )
                                                                            style="background-color:#FF8000; width: 10%"
                                                                            @else
                                                                            style="width: 10%"
                                                                            @endif 
                                                                            @endif>
                                                                        </td>
                                                                        <td class="table-border"  style="width: 10%">
                                                                            <p class="alinear-derecha letra-componente">
                                                                                MEDICAMENTO
                                                                            </p>
                                                                        </td>
                                                                        <td colspan="4" class="alinear-centro" style="width: 10%">
                                                                            @if( $estudio->formatoFemsa ) 
                                                                            @if( $estudio->formatoFemsa->padecimiento->medicamento_controlado == '1' )
                                                                            
                                                                                {{ $estudio->formatoFemsa->padecimiento->medicamento_controlado_desc }}
                                                                            
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
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 15%;">NOMBRE</th>
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 20%;">PARENTESCO</th>
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 25%;">PADECIMIENTO</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if( $estudio->formatoFemsa )
                                                                    @foreach( $estudio->formatoFemsa->padecimiento_familiar as $familiar )
                                                                    <tr>
                                                                        <td class="letra-componente" style="width: 20%;"><p>{{ $familiar->nombre }}</p></td>
                                                                        <td class="letra-componente" style="width: 25%;"><p>{{ $familiar->parentesco }}</p></td>
                                                                        <td class="letra-componente" style="width: 15%;"><p>{{ $familiar->padecimiento }}</p></td>
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
                                        <td colspan="3" class="">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50%">
                                                            <p class="alinear-izquierda letra-componente">
                                                                ¿USTED Ó ALGUNO DE SUS FAMILIARES CERCANOS REQUIERE DE ATENCIÓN MÉDICA CONSTANTE? 
                                                            </p>
                                                        </td>
                                                        <td style="width: 10%">
                                                            <p class="alinear-derecha letra-componente">
                                                                SI
                                                            </p>
                                                        </td>
                                                        <td class="alinear-centro"
                                                            @if( $estudio->formatoFemsa ) 
                                                            @if( $estudio->formatoFemsa->atencion_medica->atencion_medica == '1' )
                                                            style="background-color:#FF8000; width: 10%;"
                                                            @else
                                                            style="width: 10%;"
                                                            @endif
                                                            @endif>
                                                        </td> 
                                                        <td style="width: 10%">
                                                            <p class="alinear-derecha letra-componente">
                                                                NO
                                                            </p>
                                                        </td>
                                                        <td class="alinear-centro"
                                                            @if( $estudio->formatoFemsa ) 
                                                            @if( $estudio->formatoFemsa->atencion_medica->atencion_medica == '2' )
                                                            style="background-color:#FF8000; width: 20%;"
                                                            @else
                                                            style="width: 20%;"
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
                                            <table class="tabla-componente">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 40.5%">
                                                            <p class="alinear-izquierda letra-componente">
                                                                ¿QUIÉN Y CUÁL ES EL PADECIMIENTO?
                                                            </p>
                                                        </td>
                                                        <td colspan="5" class="alinear-centro" style="width: 59.5%">
                                                            @if( $estudio->formatoFemsa ) 
                                                            @if( $estudio->formatoFemsa->atencion_medica->atencion_medica == '1' )
                                                            
                                                                {{ $estudio->formatoFemsa->atencion_medica->padecimiento }}
                                                            
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
                                                        <td style="width: 35%" class="table-border">
                                                            <p class="alinear-izquierda letra-componente">
                                                                EN CASO DE ACCIDENTE O EMERGENCIA, LLAMAR A:
                                                            </p>
                                                        </td>
                                                        <td class="alinear-izquierda letra-componente " style="width: 20%">
                                                            
                                                                {{  isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->atencion_medica->accidente_llamar : ' '}}
                                                      
                                                        </td>
                                                        <td style="width: 10%" class="table-border">
                                                            <p class="alinear-derecha letra-componente">
                                                                TELÉFONO
                                                            </p>
                                                        </td>
                                                        <td class="alinear-izquierda letra-componente " style="width: 20%">
                                                            
                                                                {{  isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->atencion_medica->telefono : ' '}}
                                                          
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
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 10%;">TIPO</th>
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 5%;">SI</th>
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 5%;">NO</th>
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 10%;">CANTIDAD</th>
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 10%;">DIARIO</th>
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 10%;">SEMANAL</th>   
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 10%;">QUINCENAL</th>   
                                                                        <th class="letra-componente negrita alinear-centro" style="width: 10%;">OCASIONAL</th>   

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if( $estudio->formatoFemsa )
                                                                    @foreach( $estudio->formatoFemsa->habitos_detalle as $row )
                                                                    <tr>
                                                                        <td class="letra-componente alinear-izquierda" style="width: 10%;">{{ $row->tipo }}</td>
                                                                        <td 
                                                                            @if( $row->respuesta == '1' )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                            @else
                                                                                style="width: 5%;"
                                                                            @endif>
                                                                        </td>
                                                                        <td 
                                                                            @if( $row->respuesta == '2' )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                            @else
                                                                                style="width: 5%;"
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
                                                        <td  style="width: 30%" class="table-border">
                                                            <p class="justificar letra-componente">
                                                                ¿REALIZA ALGUNA ACTIVIDAD?
                                                            </p>
                                                        </td>
                                                        <td style="width: 5%" class="table-border">
                                                            <p class="alinear-derecha letra-componente">
                                                                SI
                                                            </p>
                                                        </td>          

                                                        <td
                                                            
                                                                @if( $estudio->formatoFemsa ) 
                                                                @if( $estudio->formatoFemsa->habitos->realiza_actividad == '1' ) 
                                                                style="background-color:#FF8000; width: 5%;"
                                                                @else
                                                                style="width: 5%;"
                                                                @endif
                                                                @endif>
                                                            
                                                        </td>
                                                        <td  style="width: 5%" class="table-border">
                                                            <p class="alinear-derecha letra-componente">
                                                                NO  
                                                            </p>
                                                        </td>
                                                        <td
                                                            
                                                                @if( $estudio->formatoFemsa ) 
                                                                @if( $estudio->formatoFemsa->habitos->realiza_actividad == '2' ) 
                                                                style="background-color:#FF8000; width: 5%;"
                                                                @else
                                                                style="width: 5%;"
                                                                @endif
                                                                @endif>
                                                            

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="table-border" style="width: 50%">
                                                            &nbsp;
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="table-border alinear-derecha" style="width: 30%;">
                                                            <p class="justificar letra-componente">
                                                                TIPO DE ACTIVIDAD
                                                            </p>
                                                        </td>
                                                        <td class="alinear-derecha table-border" style="width: 5%;">
                                                            <p class="letra-componente">
                                                                SOCIAL
                                                            </p>
                                                        </td>
                                                        <td 
                                                                @if( $estudio->formatoFemsa ) 
                                                                @if( $estudio->formatoFemsa->habitos->tipo_actividad_social == '1' ) 
                                                                style="background-color:#FF8000;width: 5%;"
                                                                @else
                                                                style="width: 5%;"
                                                                @endif
                                                                @endif>
                                                        </td>  
                                                        <td class="alinear-derecha table-border" style="width: 5%;">
                                                            <p class="letra-componente">
                                                                DEPORTIVA
                                                            </p>
                                                        </td>  
                                                        <td 
                                                                @if( $estudio->formatoFemsa ) 
                                                                @if( $estudio->formatoFemsa->habitos->tipo_actividad_deportiva == '1' ) 
                                                                style="background-color:#FF8000;width: 5%;"
                                                                @else
                                                                style="width: 5%;"
                                                                @endif
                                                                @endif>

                                                        </td> 
                                                        <td class="alinear-derecha table-border" style="width: 5%;">
                                                            <p class="letra-componente">
                                                                RELIGIOSA
                                                            </p>
                                                        </td> 
                                                        <td 
                                                                @if( $estudio->formatoFemsa ) 
                                                                @if( $estudio->formatoFemsa->habitos->tipo_actividad_religiosa == '1' ) 
                                                                style="background-color:#FF8000;width: 5%;"
                                                                @else
                                                                style="width: 5%;"
                                                                @endif
                                                                @endif>
                                                        </td>
                                                        <td class="alinear-derecha table-border" style="width: 5%;">
                                                            <p class="letra-componente">
                                                                CULTURAL
                                                            </p>
                                                        </td> 
                                                        <td 
                                                                @if( $estudio->formatoFemsa ) 
                                                                @if( $estudio->formatoFemsa->habitos->tipo_actividad_cultural == '1' ) 
                                                                style="background-color:#FF8000;width: 5%;"
                                                                @else
                                                                style="width: 5%;"
                                                                @endif
                                                                @endif>
                                                        </td>

                                                    </tr> 
                                                    <tr>
                                                        <td colspan="3" class="table-border">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-border alinear-derecha" style="width: 30%;">
                                                            <p class="justificar letra-componente">
                                                                ¿CUÁL Ó CUALES?
                                                            </p>
                                                        </td>
                                                        <td colspan="8" class="table-box-md table-border" style="width: 70%;">
                                                            <p class="alinear-izquierda letra-componente border-footer">
                                                                {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->habitos->cuales : '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    
                                                        <td class="table-border alinear-derecha" style="width: 30%;">
                                                            <p class="justificar letra-componente">
                                                                TIEMPO DEDICADO:
                                                            </p>
                                                        </td>
                                                        
                                                        <td class="alinear-derecha table-border" style="width: 5%;">
                                                            <p class="letra-componente">
                                                                DIARIO
                                                            </p>
                                                        </td>
                                                        <td 
                                                                @if( $estudio->formatoFemsa ) 
                                                                @if( $estudio->formatoFemsa->habitos->tiempo_dedicado_diario == '1' ) 
                                                                style="background-color:#FF8000;width: 5%;"
                                                                @else
                                                                style="width: 5%;"
                                                                @endif
                                                                @endif>

                                                                
                                                        </td>  
                                                        <td class="alinear-derecha table-border" style="width: 5%;">
                                                            <p class="letra-componente">
                                                                SEMANAL
                                                            </p>
                                                        </td>  
                                                        <td 
                                                                @if( $estudio->formatoFemsa ) 
                                                                @if( $estudio->formatoFemsa->habitos->tiempo_dedicado_semanal == '1' ) 
                                                                style="background-color:#FF8000;width: 5%;"
                                                                @else
                                                                style="width: 5%;"
                                                                @endif
                                                                @endif>
                                                                
                                                        </td>  
                                                        <td class="alinear-derecha  table-border" style="width: 5%;">
                                                            <p class="letra-componente">
                                                                QUINCENAL
                                                            </p>
                                                        </td> 
                                                        <td 
                                                                @if( $estudio->formatoFemsa ) 
                                                                @if( $estudio->formatoFemsa->habitos->tiempo_dedicado_quincenal == '1' ) 
                                                                style="background-color:#FF8000;width: 5%;"
                                                                @else
                                                                style="width: 5%;"
                                                                @endif
                                                                @endif>
                                                                
                                                        </td>   
                                                        <td class="alinear-derecha table-border" style="width: 5%;">
                                                            <p class="letra-componente">
                                                                MENSUAL
                                                            </p>
                                                        </td> 
                                                        <td
                                                                @if( $estudio->formatoFemsa ) 
                                                                @if( $estudio->formatoFemsa->habitos->tiempo_dedicado_mensual == '1' ) 
                                                                style="background-color:#FF8000;width: 5%;"
                                                                @else
                                                                style="width: 5%;"
                                                                @endif
                                                                @endif>
                                                                
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
                                                                        <td style="width: 40%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                SI ESTA EMPLEADO ACTUALMENTE, ¿POR QUÉ DESEA CAMBIAR?
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td colspan="3" style="width: 60%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                {{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->disponibilidad->empleado_actualmente : '' }}
                                                                            </p>                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width: 40%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ¿ESTA DISPUESTO A VIAJAR?
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td colspan="3" style="width: 60%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                @if( $estudio->formatoFemsa )
                                                                                    {{ $estudio->formatoFemsa->disponibilidad->dispuesto_viajar == '1' ? 
                                                                                            'SI' : 'NO' }}
                                                                                @endif
                                                                            </p>                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width: 40%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ¿A CAMBIAR DE RESIDENCIA?
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td colspan="3" style="width:60%"> 
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                @if( $estudio->formatoFemsa )
                                                                                    {{ $estudio->formatoFemsa->disponibilidad->cambiar_residencia == '1' ? 
                                                                                                'SI' : 'NO' }}
                                                                                @endif
                                                                            </p>                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td   style="width: 40%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ¿A PARTIR DE QUÉ FECHA PUEDE COMENZAR A TRABAJAR?
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td  colspan="3" style="width: 60%">
                                                                          <p class="alinear-izquierda letra-componente">
                                                                                {{ isset( $estudio->formatoFemsa->disponibilidad) ? $estudio->formatoFemsa->disponibilidad->comenzar_trabajar: '' }}
                                                                            </p>                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width: 30%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                ¿TIENE FAMILIARES TRABAJANDO EN ESTA EMPRESA?
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td style="width: 20%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                @if( $estudio->formatoFemsa )
                                                                                @if( $estudio->formatoFemsa->familiar_empresa == '1' )
                                                                                <div style="background-color:#FF8000; width: 100%; height: 100%; margin: 0; padding: 0; ">&nbsp;</div>
                                                                                @endif
                                                                                NO
                                                                                @endif
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td style="width: 10%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                NOMBRE
                                                                            </p>                                                                            
                                                                        </td>
                                                                        <td style="width: 40%">
                                                                            <p class="alinear-izquierda letra-componente">
                                                                                @if( $estudio->formatoFemsa )
                                                                                @if( $estudio->formatoFemsa->familiar_empresa == '1' )
                                                                                {{ $estudio->formatoFemsa->familiar_empresa_detalle }}
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
                                        <td colspan="3" class="table-border">
                                            <tr>
                                                <td colspan="3" class="table-border">
                                                    <table class="tabla-componente">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 100%;" >
                                                                    <p class="alinear-centro titulo-componente-principal">
                                                                        REFERENCIAS FAMILIARES
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            @if( $estudio->formatoFemsa )
                                                            @foreach ($estudio->formatoFemsa->referencias_personales  as $index => $referencia)
                                                            <tr>
                                                                <td colspan="3" class="table-border">
                                                                    &nbsp;
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 100%;"  class="alinear-centro table-border">
                                                                    <table class="tabla-componente">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="width: 20%" class="alinear-izquierda">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        NOMBRE DE LA REFERENCIA
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 40%">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->nombre_referencia }}
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 15%">
                                                                                    <p class="alinear-izquierda letra-componente">
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
                                                                                <td style="width: 20%" class="alinear-izquierda">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        DOMICILIO
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 40%">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->domicilio }}
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 15%">
                                                                                    <p class="alinear-izquierda letra-componente">
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
                                                                                <td style="width: 20%" class="alinear-izquierda">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        OCUPACIÓN
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 40%;">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->ocupacion }}  
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 15%">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        EMPRESA 
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 15%">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->empresa }} 
                                                                                    </p>
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 20%" class="alinear-izquierda">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        PARENTESCO
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 40%;">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->parentesco }}  
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 15%">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        CON QUE FRECUENCIA SE VISITAN:
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 15%">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->frecuencia_visita }} 
                                                                                    </p>
                                                                                </td>

                                                                            </tr>

                                                                            <tr>
                                                                                <td colspan="4" class="table-border">

                                                                                    <table class="tabla-componente">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="width: 30%;">
                                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                                        ¿SI SU FAMILIAR LE PIDIERA SER SU AVAL, ACEPTARIA?
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td style="width: 10%;">
                                                                                                    <p class="alinear-derecha letra-componente">
                                                                                                        SI
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td 
                                                                                                        @if( $referencia->aval == '1' )
                                                                                                            style="background-color:#FF8000; width: 10%;"
                                                                                                        @else
                                                                                                            style="width: 10%;"
                                                                                                        @endif>                                  
                                                                                                </td>
                                                                                                <td style="width: 10%;">
                                                                                                    <p class="alinear-derecha letra-componente">
                                                                                                        NO
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td 
                                                                                                        @if( $referencia->aval == '2' )
                                                                                                            style="background-color:#FF8000; width: 10%;"
                                                                                                        @else
                                                                                                            style="width: 10%;"
                                                                                                        @endif>                                  
                                                                                                </td>
                                                                                                <td style="width: 20%;">
                                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                                        ¿POR QUE?: {{ $referencia->aval_detalle }}
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td  style="width: 30%;" >
                                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                                        ¿CUAL ES EL CONCEPTO QUE TIENE DE EL (ELLA)?:
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td colspan="5" style="width: 70%;"  class="">
                                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                                          {{ $referencia->concepto }}
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td style="width: 30%;">
                                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                                        ¿SABE USTED SI TIENE ALGUN PROBLEMA LEGAL?
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td style="width: 10%;">
                                                                                                    <p class="alinear-derecha letra-componente">
                                                                                                        SI
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td 
                                                                                                         @if( $referencia->problema == '1' )
                                                                                                            style="background-color:#FF8000; width: 10%;"
                                                                                                        @else
                                                                                                            style="width: 10%;"
                                                                                                        @endif>                                  
                                                                                                </td>
                                                                                                <td style="width: 10%;">
                                                                                                    <p class="alinear-derecha letra-componente">
                                                                                                        NO
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td 
                                                                                                         @if( $referencia->problema == '2' )
                                                                                                            style="background-color:#FF8000; width: 10%;"
                                                                                                        @else
                                                                                                            style="width: 10%;"
                                                                                                        @endif>                                  
                                                                                                </td>
                                                                                                <td style="width: 30%;">
                                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                                     DESCRIBE:
                                                                                                        @if( $referencia->problema == '1' )
                                                                                                            {{ $referencia->problema_detalle }}
                                                                                                        @endif
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td style="width: 30%;">
                                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                                        ¿LO HA VISTO TOMADO Y/O FUMANDO?
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td style="width: 10%;">
                                                                                                    <p class="alinear-derecha letra-componente">
                                                                                                        SI
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td 
                                                                                                    
                                                                                                        @if( $referencia->tomando == '1' )
                                                                                                            style="background-color:#FF8000; width: 10%;"
                                                                                                        @else
                                                                                                            style="width: 10%;"
                                                                                                        @endif>                                  
                                                                                                </td>
                                                                                                <td style="width: 10%;">
                                                                                                    <p class="alinear-derecha letra-componente">
                                                                                                        NO
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td 
                                                                                                    
                                                                                                        @if( $referencia->tomando == '2' )
                                                                                                            style="background-color:#FF8000; width: 10%;"
                                                                                                        @else
                                                                                                            style="width: 10%;"
                                                                                                        @endif>                                  
                                                                                                </td>
                                                                                                <td rowspan="2" style="width: 30%;">
                                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                                        COMENTARIOS: {{ $referencia->comentarios }}
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td style="width: 30%;">
                                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                                        ¿USTED LO (LA) RECOMENDARIA?:
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td style="width: 10%;">
                                                                                                    <p class="alinear-derecha letra-componente">
                                                                                                        SI
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td
                                                                                                        @if( $referencia->recomendaria == '1' )
                                                                                                            style="background-color:#FF8000; width: 10%;"
                                                                                                        @else
                                                                                                            style="width:10%;"
                                                                                                        @endif>                                  
                                                                                                </td>
                                                                                                <td style="width: 10%;">
                                                                                                    <p class="alinear-derecha letra-componente">
                                                                                                        NO
                                                                                                    </p>                                  
                                                                                                </td>
                                                                                                <td
                                                                                                        @if( $referencia->recomendaria == '2' )
                                                                                                            style="background-color:#FF8000; width: 10%;"
                                                                                                        @else
                                                                                                            style="width:10%;"
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

                                    @if( $estudio->formatoFemsa )
                                    @foreach ($estudio->formatoFemsa->informacion_laboral  as $referencia)
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
                                                                                <td style="width: 20%;">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        EMPRESA
                                                                                    </p>
                                                                                </td>
                                                                                <td colspan="2" >
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->empresa }}
                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        TELÉFONO
                                                                                    </p>
                                                                                </td>
                                                                                <td colspan="2">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->telefono }}
                                                                                    </p>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td style="width: 20%;">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        GIRO
                                                                                    </p>
                                                                                </td>
                                                                                <td colspan="2">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->giro }} 
                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    <p class="alinear-derecha letra-componente">
                                                                                        CELULAR
                                                                                    </p>
                                                                                </td>
                                                                                <td colspan="2" >
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->celular }}  
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 20%;">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        DIRECCIÓN
                                                                                    </p>
                                                                                </td>
                                                                                <td colspan="5">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->direccion }}  
                                                                                    </p>                                                                                    
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 20%;">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        PUESTO INICIAL
                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->puesto_inicial }}  
                                                                                    </p>
                                                                                </td>
                                                                                <td  style="width: 15%">
                                                                                    <p class="alinear-izquierda letra-componente" >
                                                                                        SUELDO INICIAL
                                                                                    </p>
                                                                                </td>
                                                                                <td  style="width: 15%">
                                                                                    <p class="alinear-izquierda letra-componente" >$ 
                                                                                        {{ number_format($referencia->sueldo_inicial,2) }}  
                                                                                    </p>
                                                                                </td>
                                                                                <td  style="width: 15%">
                                                                                    <p class="alinear-izquierda letra-componente" >
                                                                                        FECHA INGRESO
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 15%">
                                                                                    <p class="alinear-izquierda letra-componente" >
                                                                                        {{ $referencia->fecha_ingreso }} 
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 20%;">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        ÚLTIMO PUESTO
                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->ultimo_puesto }} 
                                                                                    </p>
                                                                                </td>
                                                                                <td >
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        SUELDO FINAL
                                                                                    </p>
                                                                                </td>
                                                                                <td >
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        $
                                                                                        {{ number_format($referencia->sueldo_final,2) }} 
                                                                                    </p>
                                                                                </td>
                                                                                <td >
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        FECHA EGRESO
                                                                                    </p>
                                                                                </td>
                                                                                <td style="width: 10%;">
                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencia->fecha_egreso }} 
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 30%;">
                                                                                    <p class="alinear-centro letra-componente">
                                                                                        NOMBRE DEL JEFE INMEDIATO
                                                                                    </p>
                                                                                </td>                                                                                    
                                                                                <td  style="width: 30%;">
                                                                                    <p class="alinear-centro letra-componente">
                                                                                        PUESTO,  ÁREA Y DEPARTAMENTO
                                                                                    </p>
                                                                                </td>                                                                                    
                                                                                <td colspan="4" style="width: 40%;">
                                                                                    <p class="alinear-centro letra-componente">
                                                                                        TIEMPO QUE DEPENDIÓ DEL JEFE INMEDIATO
                                                                                    </p>
                                                                                </td>                                                                         
                                                                            </tr> 
                                                                            <tr>
                                                                                <td  style="width: 30%;">
                                                                                    <p class="alinear-centro letra-componente">
                                                                                        {{ $referencia->jefe_inmediato }}
                                                                                    </p>
                                                                                </td>                                                                                    
                                                                                <td style="width: 30%;">
                                                                                    <p class="alinear-centro letra-componente">
                                                                                        {{ $referencia->jefe_puesto }}
                                                                                    </p>
                                                                                </td>                                                                                    
                                                                                <td  colspan="4" style="width: 40%;">
                                                                                    <p class="alinear-centro letra-componente">
                                                                                        {{ $referencia->jefe_tiempo_dependio }}
                                                                                    </p>
                                                                                </td>                                                                         
                                                                            </tr> 
                                                                            <tr>
                                                                                <td colspan="6" style="width: 100%;">
                                                                                    <p class="justificar letra-componente">
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
                                                                <td>
                                                                    <p class="alinear-centro titulo-componente-principal-bn">
                                                                        EVALUACIÓN DE DESEMPEÑO
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="alinear-centro table-border" >
                                                                    <table class="auto-width">
                                                                        <tbody class="alinear-centro"> 

                                                                            <tr>
                                                                                <td style="width: 35%">
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
                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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
                                                                                        style="width: 10%;"
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
                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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

                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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

                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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

                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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

                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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

                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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

                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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

                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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

                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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

                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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
                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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
                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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
                                                                                <td style="width: 35%">
                                                                                    <p class="alinear-izquierda letra-componente">
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
                                                                    <p class="alinear-centro letra-componente">
                                                                        TIPO DE CONTRATO
                                                                    </p>
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <p class="alinear-centro letra-componente">
                                                                        MOTIVO DE SEPARACIÓN
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 50%">
                                                                    <p class="alinear-centro letra-componente">
                                                                        {{ $referencia->tipo_contrato_laboral }} 

                                                                    </p>
                                                                </td>
                                                                <td style="width: 50%">
                                                                    <p class="alinear-centro letra-componente">
                                                                        {{ $referencia->motivo_separacion_laboral }}
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
                                                        <td style="width: 33%">
                                                            <p class="alinear-izquierda letra-componente">
                                                                ¿EXISTE ALGÚN ADEUDO?
                                                            </p>
                                                        </td>
                                                        <td style="width: 33%">
                                                            <p class="alinear-izquierda letra-componente">
                                                                ¿PERTENECIÓ A ALGÚN SINDICATO?
                                                            </p>
                                                        </td>
                                                        <td style="width: 33%">
                                                            <p class="alinear-izquierda letra-componente">
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
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-centro letra-componente">
                                                                                SI
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                                @if( $referencia->adeudo == '2' )
                                                                                style="background-color:#FF8000; padding: 8; "
                                                                                @else
                                                                                style="width: 8%;"
                                                                                @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-centro letra-componente">
                                                                                NO
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
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-centro letra-componente">
                                                                                SI
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                                @if( $referencia->sindicato == '2' )
                                                                                style="background-color:#FF8000; width: 8%;"
                                                                                @else
                                                                                style="width: 8%;"
                                                                                @endif>
                                                                        </td>
                                                                        <td class="table-border" style="width: 10%">
                                                                            <p class="alinear-centro letra-componente">
                                                                                NO
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
                                                                                style="background-color:#FF8000;width: 25%;"
                                                                                @else
                                                                                style="width: 25%;"
                                                                                @endif>
                                                                        </td>
                                                                        <td class="table-border"  style="width: 25%">
                                                                            <p class="alinear-centro letra-componente">
                                                                                SI
                                                                            </p>
                                                                        </td>
                                                                        <td
                                                                                @if( $referencia->contratar_nuevamente == '2' )
                                                                                style="background-color:#FF8000;width: 25%;"
                                                                                @else
                                                                                style="width: 25%;"
                                                                                @endif>
                                                                        </td>
                                                                        <td class="table-border"  style="width: 25%">
                                                                            <p class="alinear-centro letra-componente">
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
                                                            OBSERVACIONES
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="letra-componente">
                                                            {{ $referencia->observaciones  }}
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
                                            <td  colspan="3" class="table-border">
                                                <table class="tabla-componente" >
                                                    <tbody>
                                                        <tr>
                                                            <td class="" style="width: 10%;">
                                                                <p class="alinear-izquierda letra-componente">
                                                                    INFORMÓ
                                                                </p>
                                                            </td>
                                                            <td style="width: 40%;">
                                                                <p class="justificar letra-componente">
                                                                    {{ $referencia->informo_sobre_puesto_laboral}}  
                                                                </p>
                                                            </td>
                                                            <td class="r" style="width: 10%;">
                                                                <p class="alinear-izquierda letra-componente">
                                                                    PUESTO
                                                                </p>
                                                            </td>
                                                            <td style="width: 40%;">
                                                                <p class="justificar letra-componente">
                                                                    {{ $referencia->puesto_informo_laboral}}   
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
                                                        {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo",'style' => 'max-width:100%;height: auto;']) !!}        
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
                                                        {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo",'style' => 'max-width:100%;height: auto;']) !!}        
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
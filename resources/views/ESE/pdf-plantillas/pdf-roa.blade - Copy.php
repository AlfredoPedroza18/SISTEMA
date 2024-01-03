<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>ESE-{{ $estudio->id }}</title>
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
                    <table class="table-border">
                        <thead>
                            <tr>
                                <th style="width: 25%" class="alinear-centro letra-componente negrita">MES</th>
                                <th style="width: 25%" class="alinear-centro letra-componente negrita">DÍA</th>
                                <th style="width: 25%" class="alinear-centro letra-componente negrita">AÑO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 25%" class="alinear-centro letra-componente">                                    
                                    {{ $estudio->mes_visita }}                                    
                                </td>
                                <td style="width: 25%" class="alinear-centro letra-componente">                                    
                                    {{ $estudio->dia_visita }}                                    
                                </td>
                                <td style="width: 25%" class="alinear-centro letra-componente">                                    
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
                                <td class="letra-componente alinear-izquierda" style="width: 25%">Empresa</td>
                                <td class="letra-componente alinear-izquierda">Grupo Roa</td>

                            </tr>
                            <tr>                                             
                                <td class="letra-componente alinear-izquierda" style="width: 25%">Nombre</td>
                                <td class="letra-componente alinear-izquierda">            
                                    {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
                                </td>

                            </tr>
                            <tr>                                             
                                <td class="letra-componente alinear-izquierda" style="width: 25%">Puesto</td>
                                <td class="letra-componente alinear-izquierda">
                                    {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->encabezado->puesto: '' }}
                                </td>

                            </tr>
                            <tr>
                                <td colspan="3" class="table-border">
                                    <span style=" display: inline-block;height: 15px;"></span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2" class="table-border">
                                    <p class="letra-componente">
                                        El presente estudio socioeconómico se basa en la investigación de tres áreas: Socioeconómica, Laboral y Personal. Por lo que a continuación se muestra un breve resumen de la investigación  por área, para más detalles revisar el contenido.                                                      
                                    </p>
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </td>
                <td colspan="2">
                    <table class="table-border">                                        
                        <tbody>

                            <tr>
                                <td class="alinear-centro table-border"  rowspan="2">


                                    @if( $estudio->imagenes->where('tipo','Candidato')->sortByDesc('fecha_alta')->first() )
                                    {{ Html::image(
                                    $estudio->imagenes->where('tipo','Candidato')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                    $estudio->imagenes->where('tipo','Candidato')->sortByDesc('fecha_alta')->first()->archivo,'',["style"=>"width:60%"]) }}



                                    @else

                                    {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["style"=>"width:60%"]) !!}        

                                    @endif
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </td>

            </tr>
            <tr>

                <td  class="table-border alinear-derecha letra-componente"  colspan="2">
                    ESTATUS
                </td>
                <td class="alinear-centro letra-componente "
                @if( $estudio->formatoRoa )
                @if( $estudio->formatoRoa->encabezado->resultado_ese == '1' )
                style="width: 20%;background-color:#499B61;color:white;"
                @elseif( $estudio->formatoRoa->encabezado->resultado_ese == '2' )
                style="width: 20%;background-color:#FF8000;color:white;"
                @else
                style="width: 20%;background-color:#FF0000;color:white;"
                @endif
                @endif
                >
                @if( $estudio->formatoRoa )
                @if( $estudio->formatoRoa->encabezado->resultado_ese == '1' )
                APTO
                @elseif( $estudio->formatoRoa->encabezado->resultado_ese == '2' )
                APTO CON RESERVA
                @else
                NO APTO
                @endif
                @endif
                {{-- isset( $estudio->resultado_final_ese ) ?  $estudio->resultado_final_ese->nombre : 'Sin resultado' --}}
            </td>

        </tr>
        <tr>
            <td colspan="3" class="table-border">
                <span style=" display: inline-block;height: 15px;"></span>
            </td>

        </tr>
        <tr>
            <td colspan="3" class="table-border">
                <table class="auto-width">
                    <tbody>
                        <tr>
                            <td>
                                <p class="alinear-centro letra-componente">1. Situación Socioeconómica</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="letra-componente">
                                    {{ isset( $estudio->formatoRoa  ) ?  $estudio->formatoRoa->encabezado->situacion_economica :'' }}
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
            <td colspan="3" class="table-border">
                <table class="auto-width">
                    <tbody>
                        <tr>
                            <td>
                                <p class="alinear-centro letra-componente">
                                    2. Escolaridad
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="letra-componente">
                                    {{ isset( $estudio->formatoRoa  ) ?  $estudio->formatoRoa->encabezado->escolaridad :'' }}
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
            <td colspan="3" class="table-border">
                <table class="auto-width">
                    <tbody>
                        <tr>
                            <td>
                                <p class="alinear-centro letra-componente">
                                    3. Trayectoria Laboral
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="letra-componente">
                                    {{ isset( $estudio->formatoRoa  ) ?  $estudio->formatoRoa->encabezado->trayectoria_laboral :'' }}
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
            <td colspan="3" class="table-border">
                <table class="auto-width">
                    <tbody>
                        <tr>
                            <td class="table-border">
                                <p class="alinear-centro letra-componente">
                                    4. Valores calificados del candidato durante la aplicación del Estudio Socioeconómico
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-border">
                                <table class="auto-width table-border">
                                    <thead>
                                        <tr>
                                            <th class="alinear-centro letra-componente negrita" style="width: 10%">VALOR</th>  
                                            <th class="letra-componente negrita alinear-centro" style="width: 10%">BUENA</th>  
                                            <th class="letra-componente negrita alinear-centro" style="width: 10%">REGULAR</th>  
                                            <th class="letra-componente negrita alinear-centro" style="width: 10%">MALA</th>  
                                            <th class="letra-componente negrita alinear-centro" style="width: 50%">COMENTARIOS</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                DISPONIBILIDAD
                                            </td>
                                            <td class="alinear-centro"
                                            @if( $estudio->formatoRoa )
                                            @if( $estudio->formatoRoa->encabezado->valor_calificado_disponibilidad==1 )
                                            style="background-color:#FF8000; width:10%;"
                                            @else
                                            style="width:10%;"
                                            @endif
                                            @endif >

                                        </td>
                                        <td class="alinear-centro" 
                                        @if( $estudio->formatoRoa )
                                        @if( $estudio->formatoRoa->encabezado->valor_calificado_disponibilidad==2 )
                                        style="background-color:#FF8000; width:10%;"
                                        @else
                                        style="width:10%;"
                                        @endif
                                        @endif >
                                    </td>
                                    <td class="alinear-centro"
                                    @if( $estudio->formatoRoa )
                                    @if( $estudio->formatoRoa->encabezado->valor_calificado_disponibilidad==3 )
                                    style="background-color:#FF8000; width:10%;"
                                    @else
                                    style="width:10%;"
                                    @endif
                                    @endif >
                                </td>

                                <td class="letra-componente" rowspan="7" style="width: 50%">
                                    {{ isset( $estudio->formatoRoa  ) ?  $estudio->formatoRoa->encabezado->valor_calificado_comentario:'' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                    PUNTUALIDAD
                                </td>
                                <td class="alinear-centro"
                                @if( $estudio->formatoRoa )
                                @if( $estudio->formatoRoa->encabezado->valor_calificado_puntualidad==1 )
                                style="background-color:#FF8000; width:10%;"
                                @else
                                style="width:10%;"
                                @endif
                                @endif >

                            </td>
                            <td class="alinear-centro" 
                            @if( $estudio->formatoRoa )
                            @if( $estudio->formatoRoa->encabezado->valor_calificado_puntualidad==2 )
                            style="background-color:#FF8000; width:10%;"
                            @else
                            style="width:10%;"
                            @endif
                            @endif >

                        </td>
                        <td class="alinear-centro" 
                        @if( $estudio->formatoRoa )
                        @if( $estudio->formatoRoa->encabezado->valor_calificado_puntualidad==3 )
                        style="background-color:#FF8000; width:10%;"
                        @else
                        style="width:10%;"
                        @endif
                        @endif >
                    </td>
                </tr>
                <tr>
                    <td class="alinear-izquierda letra-componente" style="width: 10%;">
                        PRESENTACION
                    </td>
                    <td class="alinear-centro"
                    @if( $estudio->formatoRoa )
                    @if( $estudio->formatoRoa->encabezado->valor_calificado_presentacion==1 )
                    style="background-color:#FF8000; width:10%;"
                    @else
                    style="width:10%;"
                    @endif
                    @endif >

                </td>
                <td class="alinear-centro"
                @if( $estudio->formatoRoa )
                @if( $estudio->formatoRoa->encabezado->valor_calificado_presentacion==2 )
                style="background-color:#FF8000; width:10%;"
                @else
                style="width:10%;"
                @endif
                @endif >
            </td>
            <td class="alinear-centro"
            @if( $estudio->formatoRoa )
            @if( $estudio->formatoRoa->encabezado->valor_calificado_presentacion==3 )
            style="background-color:#FF8000; width:10%;"
            @else
            style="width:10%;"
            @endif
            @endif >
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

    <td  colspan="3" class="">
        <table class="auto-width">
            <tbody>
                <tr>
                    <td colspan="6"  class="table-border letra-componente">

                        La entrevista se llevo a cabo en su departamento  su actitud fue amable todo el tiempo y sus respuestas fueron:

                    </td>
                </tr>

                <tr>
                    <td  style="width:10%"  class="table-border alinear-derecha">
                        <p class="letra-componente alinear-derecha">
                            Claras
                        </p>
                    </td>
                    <td  
                    @if( $estudio->formatoRoa )
                    @if( $estudio->formatoRoa->encabezado->entrevista_tipo==1 )
                    style="background-color:#FF8000; width:10%;"
                    @else
                    style="width:10%;"
                    @endif
                    @endif >

                </td>
                <td style="width:10%" class="table-border alinear-derecha">
                    <p class="letra-componente">
                        Concretas
                    </p>
                </td>
                <td @if( $estudio->formatoRoa )
                    @if( $estudio->formatoRoa->encabezado->entrevista_tipo==2 )
                    style="background-color:#FF8000; width:10%;"
                    @else
                    style="width:10%;"
                    @endif
                    @endif >
                </td>
                <td style="width:10%" class="table-border alinear-derecha">
                    <p class="letra-componente alinear-derecha">
                        Fluidas
                    </p>
                </td>
                <td 
                @if( $estudio->formatoRoa )
                @if( $estudio->formatoRoa->encabezado->entrevista_tipo==3 )
                style="background-color:#FF8000; width:10%;"
                @else
                style="width:10%;"
                @endif
                @endif >
            </td>
            <td style="width:10%" class="table-border alinear-derecha">
                <p class="letra-componente alinear-derecha">
                    Confusas
                </p>
            </td>
            <td 
            @if( $estudio->formatoRoa )
            @if( $estudio->formatoRoa->encabezado->entrevista_tipo==4 )
            style="background-color:#FF8000; width:10%;"
            @else
            style="width:10%;"
            @endif
            @endif >
        </td>
        <td style="width:10%" class="table-border alinear-derecha">
            <p class="letra-componente alinear-derecha">
                Incompletas
            </p>
        </td>
        <td 
        @if( $estudio->formatoRoa )
        @if( $estudio->formatoRoa->encabezado->entrevista_tipo==5 )
        style="background-color:#FF8000; width:10%;"
        @else
        style="width:10%;"
        @endif
        @endif >
    </td>
</tr>
</tbody>
</table>
</td>

</tr>
<tr>
    <tr>
        <td colspan="3" class="table-border">
            <span style=" display: inline-block;height: 15px;"></span>
        </td>

    </tr>
    <tr>
        <td colspan="3" class="table-border">
            <div class="box">

                <p class="letra-componente">
                    REALIZÓ INVESTIGACIÓN:
                </p> 

                <p class="alinear-centro ">
                    <p style="width:180px;">                                
                        {{ Html::image( $estudio->ejecutivoPrincipal->first()->imagen_firma ,'',['style' => 'width:100%;height:auto;margin-left:310px;']) }}
                    </p>
                </p>                          

                <p class="alinear-centro border-top box-firma">{{ isset($estudio->ejecutivoPrincipal)?$estudio->ejecutivoPrincipal[0]->name." ".$estudio->ejecutivoPrincipal[0]->apellido_paterno." ".$estudio->ejecutivoPrincipal[0]->apellido_materno :'' }}</p><br>                                  
            </div>
            <div class="box justificar letra-footer">
                Gen-T, División del Norte # 2617, Col. Del Carmen C. P. 04100, 56-58-44-07   coyoacan@gen-t.com.mx                      DECLARACIÓN: El entrevistado declara que la información manifestada en este estudio es verdadera, por lo cual tendra vigencia y entrará en vigor el Art. 47 Fracc. I de la L.F.T. 
                <br>
                <br>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="3" class="table-border">
            <span style=" display: inline-block;height: 15px;"></span>
        </td>

    </tr>
    {{-- INICIO DATOS GENERALES --}}
    <tr>

        <td colspan="3" class="table-border">
            <table class="auto-width table-border">
                <tbody>
                    <tr>
                        <td>
                            <p class="alinear-centro titulo-componente-principal">
                                DATOS GENERALES
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td  class="">
                            <table  class="auto-width table-border">
                                <tbody>
                                    <tr>
                                        <td  class=" alinear-izquierda letra-componente table-border" style="width:20%;">NOMBRE DE CANDIDATO:</td>
                                        <td colspan="3" class="field-table-jll letra-componente justificar table-border" style="width:30%;">
                                            <p class="border-footer"> 
                                                {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
                                            </p>
                                        </td>
                                        <td  class=" alinear-derecha letra-componente table-border table-border" style="width:25%;">SEXO:</td>
                                        <td  class="field-table-jll letra-componente justificar table-border" style="width:20%;">
                                            <p class="border-footer"> 
                                                @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->datosGenerales->sexo == '1' )
                                                Femenino 
                                                @else
                                                Masculino
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
                        <td class="">
                            <table class="auto-width table-border">
                                <tbody>
                                    <tr>
                                        <td class=" alinear-izquierda letra-componente table-border" style="width:16%;">EDAD:</td>
                                        <td  colspan="3" class="field-table-jll letra-componente justificar table-border" style="width:16%;"><p class="border-footer">
                                            {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->edad : ''}}
                                        </p></td>
                                        <td class=" alinear-derecha letra-componente table-border" style="width:16%;">FECHA DE NACIMIENTO:</td>
                                        <td  colspan="3" class="field-table-jll letra-componente justificar table-border" style="width:16%;"><p class="border-footer">
                                            {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->fecha_nac : ''}}
                                        </p></td>
                                        <td class=" alinear-derecha letra-componente table-border" style="width:16%;"> LUGAR DE NACIMIENTO:</td>
                                        <td  colspan="3" class="field-table-jll letra-componente justificar table-border" style="width:16%;"><p class="border-footer">
                                            {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->lugar_nac : ''}}
                                        </p></td>

                                    </tr>
                                </tbody>
                            </table>


                        </td>

                    </tr>
                    <tr>
                        <td class="">
                            <table class="auto-width table-border">
                                <tbody>
                                    <tr>
                                        <td class=" alinear-izquierda letra-componente table-border" style="width:16%;">NACIONALIDAD:</td>
                                        <td  colspan="3" class="field-table-jll letra-componente justificar table-border" style="width:16%;"><p class="border-footer">
                                            {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->nacionalidad : ''}}
                                        </p></td>
                                        <td class=" alinear-derecha letra-componente table-border" style="width:16%;">
                                            ESTADO CIVIL: </td>
                                            <td  colspan="3" class="field-table-jll letra-componente justificar table-border" style="width:16%;"><p class="border-footer">

                                                @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->datosGenerales->edo_civil == '1' )
                                                Soltero
                                                @endif
                                                @endif
                                                @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->datosGenerales->edo_civil == '2' )
                                                Casado
                                                @endif
                                                @endif
                                                @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->datosGenerales->edo_civil == '3' )
                                                Viudo
                                                @endif
                                                @endif
                                                @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->datosGenerales->edo_civil == '4' )
                                                Divorciado
                                                @endif
                                                @endif



                                            </p>
                                        </td>

                                        <td class=" alinear-derecha letra-componente table-border" style="width:16%;">FECHA DE MATRIMONIO:</td>
                                        <td  colspan="3" class="field-table-jll letra-componente justificar table-border" style="width:16%;"><p class="border-footer">
                                            {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->fecha_matrimonio : ''}}
                                        </p></td>

                                    </tr>
                                </tbody>
                            </table>


                        </td>

                    </tr>


                    <tr>
                        <td class="">
                            <table class="auto-width table-border">
                                <tbody>
                                    <tr>
                                        <td class=" alinear-izquierda letra-componente table-border" style="width:16%;">CALLE:</td>
                                        <td  class=" letra-componente justificar table-border" style="width:80%;"><p class="border-footer">
                                            {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->calle : ''}}
                                        </p></td>

                                    </tr>
                                </tbody>
                            </table>


                        </td>

                    </tr>


                    <tr>
                        <td class="">
                            <table class="auto-width table-border">
                                <tbody>
                                    <tr>
                                        <td class=" alinear-izquierda letra-componente table-border" style="width:16%;">NÚMERO EXTERIOR </td>
                                        <td class="field-table-jll letra-componente justificar table-border" style="width:16%;">
                                            <p class="border-footer "> 
                                                {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->num_ext: '' }}
                                            </p></td>
                                            <td class=" alinear-derecha letra-componente table-border" style="width:14%;">

                                                NÚMERO INTERIOR :</td>
                                                <td class="field-table-jll letra-componente justificar table-border" style="width:16%;">
                                                    <p class="border-footer">
                                                        {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->num_int : '' }}
                                                    </p>
                                                </td>
                                                <td class=" alinear-derecha letra-componente table-border" style="width:14%;">DELEGACIÓN O MUNICIPIO:</td>
                                                <td class="field-table-jll letra-componente justificar table-border" style="width:20%;">
                                                    <p class="border-footer">
                                                        {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->munincipio : '' }}
                                                    </p>
                                                </td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="">
                                    <table class="auto-width table-border">
                                        <tbody>
                                            <tr>
                                                <td class=" alinear-izquierda letra-componente table-border" style="width:13%;">COLONIA:</td>
                                                <td class="field-table-jll letra-componente justificar table-border" style="width:20%;">
                                                    <p class="border-footer">
                                                        {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->colonia : '' }}</p>
                                                    </td>
                                                    <td class=" alinear-derecha letra-componente table-border" style="width:13%;">EMAIL:</td>
                                                    <td class="field-table-jll letra-componente justificar table-border" style="width:20%;">
                                                        <p class="border-footer">
                                                            {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->email : '' }}</p>
                                                        </td>
                                                        <td class=" alinear-derecha letra-componente table-border" style="width:13%;">TELÉFONO:</td>
                                                        <td class="field-table-jll letra-componente justificar table-border" style="width:20%;">
                                                            <p class="border-footer">
                                                                {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->telefono : '' }}
                                                            </p>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td class="">
                                            <table class="auto-width table-border">
                                                <tbody>
                                                    <tr>
                                                        <td class=" alinear-izquierda letra-componente table-border" style="width:13%;">C.P.:</td>
                                                        <td class="field-table-jll letra-componente justificar table-border" style="width:20%;">
                                                            <p class="border-footer">
                                                                {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->cp : '' }}</p>
                                                            </td>
                                                            <td class=" alinear-derecha letra-componente table-border" style="width:13%;">TIEMPO EN EL DOMICILIO:</td>
                                                            <td class="field-table-jll letra-componente justificar table-border" style="width:20%;">
                                                                <p class="border-footer">
                                                                    {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->tiem_dom : '' }}</p>
                                                                </td>
                                                                <td class=" alinear-derecha letra-componente table-border" style="width:13%;">CELULAR:</td>
                                                                <td class="field-table-jll letra-componente justificar table-border" style="width:20%;">
                                                                    <p class="border-footer">
                                                                        {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->celular : '' }}</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="">
                                                        <table class="auto-width table-border">
                                                            <tbody>
                                                                <tr>
                                                                    <td class=" alinear-izquierda letra-componente table-border" style="width:12%;">PUESTO:</td>
                                                                    <td class="field-table-jll letra-componente justificar table-border" style="width:45%;">
                                                                        <p class="border-footer">
                                                                            {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->puesto : '' }}</p>

                                                                        </td>
                                                                        <td class=" alinear-derecha letra-componente table-border" style="width:15%;">TELÉFONO RECADOS:</td>
                                                                        <td class="field-table-jll letra-componente justificar table-border" style="width:20%;">
                                                                            <p class="border-footer">
                                                                                {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->telefono_recados : '' }}  </p>
                                                                            </td> 
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td class="">
                                                                <table class="auto-width table-border">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td  class=" alinear-izquierda letra-componente table-border" style="width:35%;">ENTRE QUE CALLES SE ENCUENTRA EL DOMICILIO:</td>
                                                                            <td class="field-table-jll letra-componente justificar table-border" style="width:55%;">
                                                                                <p class="border-footer">
                                                                                    {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->datosGenerales->entre_calles : '' }}  </p>
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
                                            {{-- FIN DATOS GENERALES --}}

                                            <tr>
                                                <td colspan="3" class="table-border">
                                                    <span style=" display: inline-block;height: 15px;"></span>
                                                </td>

                                            </tr>

                                            {{-- INICIO DOCUMENTACION --}}
                                            <tr>

                                                <td colspan="3" class="table-border">
                                                    <table class="auto-width table-border">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <p class="alinear-centro titulo-componente-principal">
                                                                        DOCUMENTACIÓN
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="letra-componente negrita alinear-centro" style="width: 25%">DOCUMENTO</td>
                                                                <td class="letra-componente negrita alinear-centro" style="width: 65%">No. DE CERTIFICADO</td>
                                                                <td class="letra-componente negrita alinear-centro" style="width: 10%">ORIGINAL/COPIA</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:25%;">
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="table-border letra-componente alinear-izquierda">ACTA DE NACIMIENTO</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="width:65%;">
                                                                    <table class="auto-width">
                                                                        <tbody>
                                                                            <tr>

                                                                                <td class="table-border alinear-izquierda letra-componente" style="width: 12.5%">ACTA:</td>
                                                                                <td class="letra-componente table-border alinear-izquierda" style="width: 12.5%"><p class="border-footer">
                                                                                    {{ isset($estudio->formatoRoa->documentacionRoa) ? $estudio->formatoRoa->documentacionRoa->acta_acta : '' }}
                                                                                </p></td>
                                                                                <td class="table-border alinear-izquierda letra-componente" style="width: 12.5%">AÑO:</td>
                                                                                <td class="letra-componente table-border alinear-izquierda" style="width: 12.5%"><p class="border-footer">
                                                                                    {{ isset($estudio->formatoRoa->documentacionRoa ) ? $estudio->formatoRoa->documentacionRoa->acta_ano : '' }}
                                                                                </p></td>
                                                                                <td class="table-border alinear-izquierda letra-componente" style="width: 12.5%">LIBRO:</td>
                                                                                <td class="letra-componente table-border alinear-izquierda" style="width: 12.5%"><p class="border-footer">
                                                                                    {{ isset($estudio->formatoRoa->documentacionRoa ) ? $estudio->formatoRoa->documentacionRoa->acta_libro : '' }}
                                                                                </p></td> 
                                                                                <td class="table-border alinear-izquierda letra-componente" style="width: 12.5%">OFICIALIA:</td>
                                                                                <td class="letra-componente table-border alinear-izquierda" style="width: 12.5%"><p class="border-footer">
                                                                                    {{ isset($estudio->formatoRoa->documentacionRoa ) ? $estudio->formatoRoa->documentacionRoa->acta_oficialia : '' }}
                                                                                </p></td> 

                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td class="letra-componente alinear-centro" style="width:10%;">
                                                                    {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->acta_cotejo : '' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:25%;">
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="table-border letra-componente alinear-izquierda">IDENTIFICACIÓN OFICIAL VIGENTE</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="width: 65%">
                                                                    <table class="auto-width">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td colspan="3" class="table-border">
                                                                                    <span style=" display: inline-block;height: 15px;"></span>
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td class="table-border alinear-izquierda letra-componente" style="width: 25%">CLAVE:</td>
                                                                                <td class="letra-componente alinear-izquierda table-border" style="width: 35%"><p class="border-footer">
                                                                                    {{ isset($estudio->formatoRoa->documentacionRoa ) ? $estudio->formatoRoa->documentacionRoa->elector_clave: '' }}
                                                                                </p></td>
                                                                                <td class="table-border alinear-derecha letra-componente" style="width: 10%">NÚMERO:</td>
                                                                                <td class="letra-componente alinear-izquierda table-border" style="width: 40%"><p class="border-footer">
                                                                                    {{ isset($estudio->formatoRoa->documentacionRoa ) ? $estudio->formatoRoa->documentacionRoa->elector_numero: '' }}
                                                                                </p></td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="3" class="table-border">
                                                                                    <span style=" display: inline-block;height: 15px;"></span>
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td class="table-border alinear-izquierda letra-componente" style="width: 25%">COINCIDE CON DIRECCIÓN ACTUAL:</td>
                                                                                <td  colspan="3" class="table-border alinear-izquierda letra-componente" style="width: 75%">
                                                                                    <p class="border-footer">
                                                                                        @if($estudio->formatoRoa)
                                                                                        @if($estudio->formatoRoa->documentacionRoa->elector_coincide_direccion == '1' ) 
                                                                                        SI
                                                                                        @else
                                                                                        NO
                                                                                        @endif
                                                                                        @endif 
                                                                                    </p>
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="3" class="table-border">
                                                                                    <span style=" display: inline-block;height: 15px;"></span>
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td class="table-border alinear-izquierda letra-componente"  style="width:25%">DIRECCIÓN:</td>
                                                                                <td colspan="3" class="table-border alinear-izquierda letra-componente"  style="width:75%"><p class="border-footer" >
                                                                                    {{ isset($estudio->formatoRoa) ? $estudio->formatoRoa->documentacionRoa->elector_direccion: '' }}
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
                                                            <td class="letra-componente alinear-centro" style="width: 10%" >

                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->elector_cotejo : '' }}

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">CURP</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width: 65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->curp : '' }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro " style="width:10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->curp_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">RFC</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width: 65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->rfc : '' }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->rfc_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">AFORE</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width: 65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%">NÚMERO:</td>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%"><p class="border-footer" >
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->afore_numero : '' }}</p>
                                                                            </td>
                                                                            <td class="table-border alinear-derecha letra-componente" style="width: 25%">INSTITUCIÓN:</td>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%"><p class="border-footer" >
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->afore_institucion : '' }}</p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->afore_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%"> 
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">NO. DE AFILIACION AL IMSS</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width: 65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->imss : '' }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->imss_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">COMPROBANTE DE ESTUDIOS</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width: 65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente " style="width: 25%">INSTITUCIÓN:</td>
                                                                            <td class="letra-componente table-border" style="width: 75%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->compr_estudios_institucion : '' }}
                                                                            </p></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente " style="width: 25%">DOCUMENTO:</td>
                                                                            <td class="letra-componente table-border" style="width: 25%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->compr_estudios_documento : '' }}
                                                                            </p></td>
                                                                            <td class="table-border alinear-izquierda letra-componente " style="width: 25%">FOLIO:</td>
                                                                            <td class="letra-componente table-border" style="width: 25%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->compr_estudios_folio : '' }}
                                                                            </p></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente " style="width: 25%">GRADO:</td>
                                                                            <td class="letra-componente table-border" style="width: 75%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->compr_estudios_grado : '' }}
                                                                            </p></td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente " style="width: 25%">LICENCIATURA:</td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->compr_estudios_licenciatura : '' }}
                                                                            </p></td>


                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro " style="width: 10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->compr_estudios_institucion_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">COMPROBANTE DE DOMICILIO</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width: 65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%">TITULAR:</td>
                                                                            <td class="letra-componente table-border alinear-izquierda" style="width: 75%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->compr_domicilio_titular : '' }}
                                                                            </p></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%">SERVICIO Y FECHA:</td>
                                                                            <td class="letra-componente table-border alinear-izquierda" style="width: 75%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->compr_domicilio_servicio : '' }}
                                                                            </p></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->compr_domicilio_servicio_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">LICENCIA DE MANEJO</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width: 65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%">TIPO: </td>
                                                                            <td class="letra-componente table-border" style="width: 25%"><p class="border-footer" >
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->licencia_tipo : '' }}
                                                                            </p></td>
                                                                            <td class="table-border alinear-derecha letra-componente" style="width: 25%">NÚMERO Y VIGENCIA:</td>
                                                                            <td class="letra-componente table-border" style="width: 25%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->licencia_vigencia : '' }}
                                                                            </p></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->licencia_vigencia_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">CÉDULA PROFESIONAL</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width: 65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%">NÚMERO: </td>
                                                                            <td class="letra-componente table-border" style="width: 75%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->cedula_numero : '' }}
                                                                            </p></td>

                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->cedula_numero_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">PASAPORTE</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width: 65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%">NÚMERO </td>
                                                                            <td class="letra-componente table-border alinear-izquierda" style="width: 75%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->pasaporte_numero : '' }}
                                                                            </p></td>

                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->pasaporte_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">CRÉDITO DE INFONAVIT</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width: 65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-derecha letra-componente" style="width: 75%">NÚMERO: </td>
                                                                            <td class="letra-componente table-border" style="width: 75%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->creditoinfo_numero : '' }}
                                                                            </p></td>

                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%"> 
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->creditoinfo_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">CRÉDITO DE FONACOT</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width: 65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%">NÚMERO: </td>
                                                                            <td class="letra-componente table-border" style="width: 75%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->creditofonacot_numero : '' }}
                                                                            </p></td>

                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->creditofonacot_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">CARTILLA SERVICIO MILITAR NACIONAL</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width:65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%">MATRICULA: </td>
                                                                            <td class="letra-componente table-border alinear-izquierda" style="width: 25%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->cartilla_matricula : '' }}
                                                                            </p></td>
                                                                            <td class="table-border alinear-derecha letra-componente" style="width: 25%">LIBERACIÓN:</td>
                                                                            <td class="letra-componente table-border alinear-izquierda" style="width: 25%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->cartilla_liberacion : '' }}
                                                                            </p></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width:10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->cartilla_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:25%"> 
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">ACTA DE MATRIMONIO</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width:65%">
                                                                <table class="auto-width" >
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%">JUZGADO:</td>
                                                                            <td class="letra-componente table-border alinear-izquierda" style="width: 25%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->acta_matrimonio_juzgado : '' }}
                                                                            </p></td>
                                                                            <td class="table-border alinear-derecha letra-componente" style="width: 25%">NÚMERO:</td>
                                                                            <td class="letra-componente table-border alinear-derecha" style="width: 25%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->acta_matrimonio_numero : '' }}
                                                                            </p></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width:10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->acta_matrimonio_cotejo : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:25%">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border letra-componente">ULTIMO RECIBO DE PERCEPCIONES</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width:65%">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%">EMPRESA:</td>
                                                                            <td class="letra-componente table-border alinear-izquierda" style="width: 75%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->ultimo_recibo_empresa : '' }}
                                                                            </p></td>
                                                                        </tr>
                                                                        <tr25>
                                                                            <td class="table-border alinear-izquierda letra-componente" style="width: 25%">PUESTO:</td>
                                                                            <td class="letra-componente table-border alinear-izquierda" style="width: 25%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->ultimo_recibo_puesto : '' }}
                                                                            </p></td>
                                                                            <td class="table-border alinear-derecha letra-componente" style="width: 25%">INGRESO:</td>
                                                                            <td class="letra-componente table-border alinear-derecha" style="width: 25%"><p class="border-footer">
                                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->ultimo_recibo_ingreso : '' }}
                                                                            </p></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width:10%">
                                                                {{ isset($estudio->formatoRoa->documentacionRoa ) ?$estudio->formatoRoa->documentacionRoa->ultimo_recibo_cotejo : '' }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="table-border">
                                                                <span style=" display: inline-block;height: 15px;"></span>
                                                            </td>

                                                        </tr>
                                                        <tr>

                                                            <td colspan="3" class="table-border">
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <p class="alinear-centro letra-componente">
                                                                                   OBSERVACIONES
                                                                               </p>
                                                                           </td>
                                                                       </tr>
                                                                       <tr>
                                                                        <td>
                                                                            <p class="letra-componente">
                                                                              {{ isset($estudio->formatoRoa->documentacionRoa ) ? $estudio->formatoRoa->documentacionRoa->documentacion_observaciones : '' }}
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
                                                {{-- FIN DOCUMENTACION --}}
                                                {{-- INICIO ESCOLARIDAD --}}
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
                                                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">GRADO</th>
                                                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">INSTITUCIÓN</th>
                                                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">DOMICILIO</th>
                                                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">PERIODO</th>
                                                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">AÑOS</th>
                                                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">COMPROBANTE</th>
                                                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">FOLIO</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @if( $estudio->formatoRoa)

                                                                                @foreach ($estudio->formatoRoa->escolariRoa as $index =>$esco)

                                                                                <tr>  
                                                                                    <td class="letra-componente  alinear-izquierda" style="width:12%;">
                                                                                      {{ $esco->grado }}

                                                                                  </td>
                                                                                  <td class="letra-componente  alinear-izquierda" style="width:12%;">
                                                                                     {{ $esco->institucion }}
                                                                                 </td>                
                                                                                 <td class="letra-componente  alinear-izquierda" style="width:12%;">
                                                                                    {{ $esco->domicilio }}
                                                                                </td>              
                                                                                <td class="letra-componente  alinear-centro" style="width:12%;">
                                                                                   {{ $esco->periodos }}
                                                                               </td>
                                                                               <td class="letra-componente  alinear-centro" style="width:12%;">
                                                                                 {{ $esco->años }}
                                                                             </td>                
                                                                             <td class="letra-componente  alinear-izquierda" style="width:12%;">
                                                                               {{ $esco->comprobante }}
                                                                           </td>                
                                                                           <td class="letra-componente  alinear-centro" style="width:12%;">
                                                                            {{ $esco->folio }}
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
                                    <tr>
                                        <td colspan="3" class="table-border">
                                            <span style=" display: inline-block;height: 15px;"></span>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td colspan="3" class="table-border">
                                            <table class="auto-width table-border">
                                                <tbody>

                                                    <tr>
                                                        <td colspan="2" class="alinear-centro letra-componente" style="width: 50%">
                                                            Si es trunco, ¿Por qué abandonó sus estudios?
                                                        </td>
                                                        <td>
                                                            <p class="letra-componente" style="width: 50%">
                                                                {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->abandonoEscolar->si_tunco : '' }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="alinear-centro letra-componente" style="width: 50%">
                                                            Si está estudiando, ¿Qué días y en qué horario?
                                                        </td>
                                                        <td>
                                                            <p class="letra-componente" style="width: 50%">
                                                                {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->abandonoEscolar->si_estudiando : '' }}
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
                                        <td colspan="3" class="table-border">
                                            <table class="auto-width">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <p class="alinear-centro letra-componente">
                                                               OBSERVACIONES
                                                           </p>
                                                       </td>
                                                   </tr>
                                                   <tr>
                                                    <td>
                                                        <p class="letra-componente">
                                                            {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->ObsEscolar->observaciones : '' }}
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
                                {{-- FIN ESCOLARIDAD --}}
                                {{-- INICIO CURSOS --}}
                                <tr>

                                    <td colspan="3" class="table-border">
                                        <table class="tabla-componente">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p class="alinear-centro titulo-componente-principal">
                                                           CURSOS REALIZADOS
                                                       </p>
                                                   </td>
                                               </tr>
                                               <tr>
                                                <td>
                                                    <table class="tabla-componente">

                                                        <tbody>

                                                            @if( $estudio->formatoRoa)
                                                            @foreach ($estudio->formatoRoa->cursoMet as $index => $curso)
                                                            <tr>
                                                                <td class="table-border letra-componente alinear-centro" style="width:10%;">DE</td>
                                                                <td class="letra-componente table-border alinear-centro" style="width:15%;"><p class="border-footer">
                                                                 {{ $curso->de}}
                                                             </p></td>        
                                                             <td class="table-border letra-componente alinear-centro" style="width:10%;">A</td>
                                                             <td class="letra-componente table-border alinear-centro" style="width:15%;"><p class="border-footer">
                                                                {{ $curso->a}}
                                                            </p></td>                
                                                            <td class="table-border letra-componente alinear-centro" style="width:10%;">REALIZÓ</td>
                                                            <td class="letra-componente table-border alinear-centro" style="width:40%;"><p class="border-footer">
                                                              {{ $curso->realizo}}
                                                          </p></td>                                    
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
                            <span style=" display: inline-block;height: 15px;"></span>
                        </td>
                    </tr>
                    {{-- FIN CURSOS --}}

                    {{-- INICIO IDIOMAS --}}
                    <tr>

                        <td colspan="3" class="table-border">
                            <table class="tabla-componente">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="alinear-centro titulo-componente-principal">
                                               IDIOMAS
                                           </p>
                                       </td>
                                   </tr>
                                   <tr>
                                    <td class="table-border">
                                        <table class="tabla-componente">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%;" class="alinear-centro negrita letra-componente">#</th>
                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">IDIOMA</th>
                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">HABLADO</th>
                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">LEÍDO</th>
                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">ESCRITO</th>
                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">COMPRENSIÓN</th>
                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">%</th>
                                                    <th style="width:12%;" class="alinear-centro negrita letra-componente">ESCALA</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $estudio->formatoRoa)
                                                <?php  $contador=1; 

                                                $procentaje=null;

                                                ?>
                                                @foreach ($estudio->formatoRoa->idiomas as $indexidioma => $idio)
                                                <?php 
                                                $hablado=isset($idio->hablado)?$idio->hablado:0;
                                                $leido=isset($idio->leido)?$idio->leido:0;
                                                $escrito=isset($idio->escrito)?$idio->escrito:0;
                                                $comprension=isset($idio->comprension)?$idio->comprension:0;
                                                ?>
                                                <tr>  
                                                    <td class="letra-componente  alinear-centro" style="width:5%;">
                                                      {{ $contador++ }}

                                                  </td>
                                                  <td class="letra-componente  alinear-centro" style="width:12%;">
                                                     {{ $idio->idioma }}
                                                 </td>                
                                                 <td class="letra-componente  alinear-centro" style="width:12%;">
                                                    {{ $idio->hablado!="" ?$idio->hablado:0 }} %
                                                </td>              
                                                <td class="letra-componente  alinear-centro" style="width:12%;">
                                                    {{ $idio->leido!="" ?$idio->leido:0 }} %
                                                </td>
                                                <td class="letra-componente  alinear-centro" style="width:12%;">
                                                 {{ $idio->escrito!="" ?$idio->escrito:0 }} %
                                             </td>                
                                             <td class="letra-componente  alinear-centro" style="width:12%;">
                                               {{ $idio->comprension!="" ?$idio->comprension:0}} %
                                           </td>                
                                           <td class="letra-componente  alinear-centro" style="width:12%;">
                                            <?php echo $porcentaje=(($hablado+$leido+$escrito+$comprension)/4); ?>%
                                        </td>    
                                        <td class="letra-componente  alinear-centro"
                                        @if($porcentaje <= '50')
                                        style="background-color:red; width: 12%"
                                        @elseif($porcentaje <= '75')
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
<tr>
    <td colspan="3" class="table-border">
        <span style=" display: inline-block;height: 15px;"></span>
    </td>
</tr>
{{-- FIN IDIOMAS --}}

{{-- INICIO CONOCIMIENTOS --}}
    <tr>
        
                                            <td colspan="3" class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente-principal">
                                                                     CONOCIMIENTOS Y HABILIDADES
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-border" style="padding: 0;">
                                                                <table class="tabla-componente table-border">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="width:5%;" class="alinear-centro letra-componente negrita">#</th>
                                                                            <th style="width:83%;" class="alinear-centro letra-componente negrita">PAQUETERIA</th>
                                                                            <th style="width:12%;" class="alinear-centro letra-componente negrita">%</th>                                                                    
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                          @if( $estudio->formatoRoa)
                                                              @foreach ($estudio->formatoRoa->conocimientos_ as $index => $conocimiento)
                                                              <?php  $contador_conocimientos=1; ?>
                                                                        <tr>
                                                                            <td class="letra-componente  alinear-centro" style="width:5%;">
                                                                            {{ $contador_conocimientos++ }}</td>
                                                                            <td class="letra-componente  alinear-centro" style="width:40%;">
                                                                            {{$conocimiento->paqueteria}} 
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" style="width:12%;">
                                                                                {{$conocimiento->porcentaje}} 
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
    <tr>
        <td colspan="3" class="table-border">
             <span style=" display: inline-block;height: 15px;"></span>
        </td>
    </tr>
{{-- FIN CONOCIMIENTOS --}}

{{-- INICIO FAMILIARES --}}
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
                                                                <table class="tabla-componente table-border">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:25%;">PARENTESCO</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:25%;">NOMBRE</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:25%;">EDAD</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:25%;">EDO. CIVIL</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:25%;">OCUPACION (Empresa)</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:25%;">DOMICILIO</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                           @if( $estudio->formatoRoa)
                                                              @foreach ($estudio->formatoRoa->familia as $index => $fam)
                                                            <tr>
                                                                            <td class="letra-componente alinear-centro" style="width:25%;">
                                                                            
                                                                                  {{ $fam->parentesco }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:25%;">
                                                                                  {{ $fam->nombre }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:25%;">
                                                                                  {{ $fam->edad }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:25%;">
                                                                                  {{ $fam->edo_civil_familia }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:25%;">
                                                                                  {{ $fam->ocupacion }}
                                                                            </td>
                                                                             <td class="letra-componente alinear-centro" style="width:25%;">
                                                                                  {{ $fam->domicilio }}
                                                                            </td>
                                                                            
                                                                <tr>
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
                         <span style=" display: inline-block;height: 15px;"></span>
                    </td>
                </tr>
                <tr>
                    
                                            <td colspan="3" class="table-border">
                                                <table class="auto-width tabla-componente">
                                                    <tbody>
                                                     <tr>
                                                            <td colspan="3">
                                                                 <p class="alinear-centro titulo-componente-principal">
                                                                     INFORMACIÓN FAMILIAR
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                       
                                                        <tr>
                                                                 <td colspan="2" class="alinear-izquierda letra-componente" style="width: 50%">
                                                                    ¿Con quién habita actualmente?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente" style="width: 50%">
                                                                   {{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->con_quien_vive : '' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                                 <td colspan="2" class="alinear-izquierda letra-componente" style="width: 50%">
                                                                 ¿Cómo considera que es su relación con ellos?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente" style="width: 50%">
                                                                 {{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->relacion_familia : '' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                                 <td colspan="2" class="alinear-izquierda letra-componente" style="width: 50%">
                                                                 ¿Tiene familiares viviendo en el extranjero?, ¿Quiénes y en dónde?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente" style="width: 50%">
                                                               {{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->familiares_extrangero : '' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                                 <td colspan="2" class="alinear-izquierda letra-componente" style="width: 50%">
                                                                Y, ¿al interior de la República?. ¿En dónde?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente" style="width: 50%">
                                                              {{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->familiares_interior_republica : '' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                                 <td colspan="2" class="alinear-izquierda letra-componente" style="width: 50%">
                                                               ¿Con qué frecuencia los visita?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente" style="width: 50%">
                                                             {{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->frecuencia_visita : '' }}
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
                                                                    {{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->infoFamiliar->observaciones : '' }}
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
                                        {{-- FIN FAMILIARES --}}
                                        {{-- INICIO SITUACION ECONOMICA --}}
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
                                                                            
                                                                            <th class="alinear-centro negrita letra-componente " style="width:20%;">APORTACIONES</th>
                                                                            <th class="alinear-centro negrita letra-componente " style="width:20%;">TIPO DE INGRESO</th>
                                                                            <th class="alinear-centro negrita letra-componente " style="width:20%;">CANTIDAD</th>
                                                                            <th class="alinear-centro negrita letra-componente " style="width:20%;">CONCEPTO</th>
                                                                            <th class="alinear-centro negrita letra-componente " style="width:20%;"> EGRESOS </th>    
                                                                      
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>                                                                         
                                                       
                                                        <tr>

                                                            
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                                                
                                              {{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->conceptoinUno :''}}            
                                                                </p></td>
                                                                 <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                                                
                                             {{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinUno : ''}}       
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">

                                                                <?php 
                                                                $i1=null;
                                                                 if(isset( $estudio->formatoRoa )){
                                                                  if($estudio->formatoRoa->situacionEconomica->ingresosUno!=""){
                                                                  $i1=(int) number_format($estudio->formatoRoa->situacionEconomica->ingresosUno, 2, '.', '') ;
                                                                }}else{
                                                                  $i1=0;
                                                                }
                                                                ?>

                                                                $  {{ number_format($i1, 2) }}
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                ALIMENTACIÓN EN CASA
                                                              </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                 $e1=null;
                                                                 if($estudio->formatoRoa ){
                                                                          if($estudio->formatoRoa->situacionEconomica->egresosUno!=""){
                                                                        $e1=(int) number_format($estudio->formatoRoa->situacionEconomica->egresosUno, 2, '.', '');
                                                                      }
                                                                        else{
                                                                          $e1=0;
                                                                        }
                                                                }
                                                                ?>

                                                                $ {{ number_format($e1, 2) }}
                                                                </p></td>
                                                                    
                                                       </tr>
                                                       <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->situacionEconomica->conceptoinDos :''}}            
                                                                </p></td>
                                                                   <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                                                
                                                                {{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->tipoinDos : ''}}       
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i2=null;
                                                                  if($estudio->formatoRoa ){
                                                                          if($estudio->formatoRoa->situacionEconomica->ingresosDos!=""){
                                                                          $i2=(int) number_format($estudio->formatoRoa->situacionEconomica->ingresosDos, 2, '.', '');
                                                                        }
                                                                        else{
                                                                          $i2=0;
                                                                        }
                                                                }
                                                                ?>
                                                                                                                              
                                                                $ {{ number_format($i2, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                ALIMENTACIÓN FUERA DE CASA
                                                                </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e2=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->egresosDos!=""){
                                                                  $e2=(int) number_format($estudio->formatoRoa->situacionEconomica->egresosDos, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e2=0;
                                                                }
                                                            }
                                                                ?>
                                                                $ {{ number_format($e2, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                          <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->conceptoinTres :''}}            
                                                                </p></td>
                                                                 <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->tipoinTres :''}}            
                                                                </p></td>

                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $i3=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->ingresosTres!=""){
                                                                  $i3=(int) number_format($estudio->formatoRoa->situacionEconomica->ingresosTres, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i3=0;
                                                                }
                                                            }
                                                                ?>
                                                                                                                             
                                                                $ {{ number_format($i3, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                RENTA/HIPOTECA
                                                                </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $e3=null;
                                                                  if($estudio->formatoRoa){
                                                                  if($estudio->formatoRoa->situacionEconomica->egresosTres!=""){
                                                                  $e3=(int) number_format($estudio->formatoRoa->situacionEconomica->egresosTres, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e3=0;
                                                                }
                                                            }
                                                                ?>
                                                                $ {{ number_format($e3, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                         <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->conceptoinCuatro :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->tipoinCuatro :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $i4=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->ingresosCuatro!=""){
                                                                  $i4=(int) number_format($estudio->formatoRoa->situacionEconomica->ingresosCuatro, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i4=0;
                                                                }
                                                            }
                                                                ?>
                                                                 $ {{ number_format($i4, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                               TELÉFONO
                                                              </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e4=null;
                                                                  if($estudio->formatoRoa){
                                                                  if($estudio->formatoRoa->situacionEconomica->egresosCuatro!=""){
                                                                  $e4=(int) number_format($estudio->formatoRoa->situacionEconomica->egresosCuatro, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e4=0;
                                                                }
                                                            }
                                                                ?>
                                                                $ {{ number_format($e4, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                        <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->conceptoinCinco :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->tipoinCinco :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i5=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->ingresosCinco!=""){
                                                                  $i5=(int) number_format($estudio->formatoRoa->situacionEconomica->ingresosCinco, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i5=0;
                                                                }
                                                            }
                                                                ?>
                                                                  $ {{ number_format($i5, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                SERVICIOS ($ GAS, $ AGUA, $ LUZ) 
                                                                </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $e5=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->egresosCinco!=""){
                                                                  $e5=(int) number_format($estudio->formatoRoa->situacionEconomica->egresosCinco, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e5=0;
                                                                }
                                                            }
                                                                ?>
                                                                $ {{ number_format($e5, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                       <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->conceptoinSeis :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->tipoinSeis :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i6=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->ingresosSeis!=""){
                                                                  $i6=(int) number_format($estudio->formatoRoa->situacionEconomica->ingresosSeis, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i6=0;
                                                                }
                                                            }
                                                                ?>
                                                                 $ {{ number_format($i6, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                PREDIAL
                                                                </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $e6=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->egresosSeis!=""){
                                                                  $e6=(int) number_format($estudio->formatoRoa->situacionEconomica->egresosSeis, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e6=0;
                                                                }
                                                            }
                                                                ?>
                                                               $ {{ number_format($e6, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                       <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->conceptoinSiete :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->tipoinSiete :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i7=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->ingresosSiete!=""){
                                                                  $i7=(int) number_format($estudio->formatoRoa->situacionEconomica->ingresosSiete, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i7=0;
                                                                } 

                                                            }
                                                                ?>
                                                                $ {{ number_format($i7, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                GASTOS ESCOLARES
                                                                </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e7=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->egresosSiete!=""){
                                                                  $e7=(int) number_format($estudio->formatoRoa->situacionEconomica->egresosSiete, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e7=0;
                                                                }
                                                            }
                                                                ?>
                                                                     $ {{ number_format($e7, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                       <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->conceptoinOcho :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->tipoinOcho :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i8=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->ingresosOcho!=""){
                                                                  $i8=(int) number_format($estudio->formatoRoa->situacionEconomica->ingresosOcho, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i8=0;
                                                                }
                                                            }
                                                                ?>
                                                                  $ {{ number_format($i8, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                GASOLINA Ó TRANSPORTE
                                                                </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $e8=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->egresosOcho!=""){
                                                                  $e8=(int) number_format($estudio->formatoRoa->situacionEconomica->egresosOcho, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e8=0;
                                                                }
                                                            }
                                                                ?>
                                                                 $ {{ number_format($e8, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                       <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->conceptoinNueve :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->tipoinNueve :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i9=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->ingresosNueve!=""){
                                                                  $i9=(int) number_format($estudio->formatoRoa->situacionEconomica->ingresosNueve, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i9=0;
                                                                }
                                                            }
                                                                ?>
                                                                  $ {{ number_format($i9, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                ROPA CALZADO 
                                                                </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e9=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->egresosNueve!=""){
                                                                  $e9=(int) number_format($estudio->formatoRoa->situacionEconomica->egresosNueve, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e9=0;
                                                                }
                                                            }
                                                                ?>
                                                                 $ {{ number_format($e9, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                        <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->conceptoinDiez :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->tipoinDiez :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i10=null;
                                                                  if($estudio->formatoRoa ){
                                                                          if($estudio->formatoRoa->situacionEconomica->ingresosDiez!=""){
                                                                          $i10=(int) number_format($estudio->formatoRoa->situacionEconomica->ingresosDiez, 2, '.', '');
                                                                        }
                                                                        else{
                                                                          $i10=0;
                                                                        }
                                                                    }
                                                                ?>
                                                                  $ {{ number_format($i10, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                DIVERSIONES
                                                              </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e10=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->egresosDiez!=""){
                                                                  $e10=(int) number_format($estudio->formatoRoa->situacionEconomica->egresosDiez, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e10=0;
                                                                }
                                                            }
                                                                ?>
                                                                 $ {{ number_format($e10, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                        <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->conceptoinOnce :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoRoa  ) ?$estudio->formatoRoa->situacionEconomica->tipoinOnce :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i11=null;
                                                                  if($estudio->formatoRoa ){
                                                                  if($estudio->formatoRoa->situacionEconomica->ingresosOnce!=""){
                                                                  $i11=(int) number_format($estudio->formatoRoa->situacionEconomica->ingresosOnce, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i11=0;
                                                                }
                                                            }
                                                                ?>
                                                                  $ {{ number_format($i11, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                OTROS
                                                                </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e11=null;
                                                                  if($estudio->formatoRoa ){
                                                                      if($estudio->formatoRoa->situacionEconomica->egresosOnce!=""){
                                                                      $e11=(int) number_format($estudio->formatoRoa->situacionEconomica->egresosOnce, 2, '.', '');
                                                                    }
                                                                    else{
                                                                      $e11=0;
                                                                    }
                                                                }
                                                                ?>
                                                                 $ {{ number_format($e11, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                      
                                                      


                                                                        <tr>
                                                                            <td colspan="2"  class="letra-componente alinear-derecha" style="width:20%;">
                                                                               
                                                                                    TOTAL INGRESOS
                                                                             
                                                                            </td>
                                                                              <td class="letra-componente alinear-derecha" style="width:20%;">
                                                                              
                                                                                   <?php  $toting=($i1+$i2+$i3+$i4+$i5+$i6+$i7+$i8+$i9+$i10+$i11) ?>
                                                                                    ${{ number_format($toting, 2) }}
                                                                              
                                                                            </td>                                                                        
                                                                            <td class="letra-componente alinear-derecha" style="width:20%;">
                                                                             
                                                                                    TOTAL EGRESOS
                                                                                  
                                                                              
                                                                            </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:20%;">
                                                                            
                                                                                 <?php  $toteg=($e1+$e2+$e3+$e4+$e5+$e6+$e7+$e8+$e9+$e10+$e11) ?>
                                                                                    ${{ number_format($toteg, 2) }}
                                                                              
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
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                            <td colspan="3" class="table-border">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                 <p class="alinear-izquierda letra-componente">
                                                                    Si hay déficit, ¿Cómo lo solventa?
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-componente">
                                                                   {{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->deficit_seconomica : ''}}
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
                                                                  {{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->situacionEconomica->observaciones_seconomica : ''}}
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
                                        {{-- FIN SITUACION ECONOMICA --}}

                                        {{-- INICIO BIENES --}}
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
                                                                <table class="tabla-componente table-border">
                                                                    <thead>
                                                                        <tr>
                                                                            
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:30%;">ACTIVOS</th>
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:5%;">SI</th>
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:5%;">NO</th>
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:40%;">TIPO</th>
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:10%;">VALOR</th>    
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:10%;">PAGADO</th>    
                                                                        <th class="letra-componente negrita alinear-centro"  style="width:10%;">ADEUDO</th>
                                                                      
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                          <tr>
                                                                                                                                               
                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                            PROPIEDADES DEL CANDIDATO
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" 
                                                                             @if( $estudio->formatoRoa )
                                                                                @if( $estudio->formatoRoa->bienes->propiedad_candidato==1 )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                                @else
                                                                                style="width: 5%;"
                                                                                @endif
                                                                                @endif>

                                                                              
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" 
                                                                            @if( $estudio->formatoRoa )
                                                                                @if( $estudio->formatoRoa->bienes->propiedad_candidato==2 )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                                @else
                                                                                style="width: 5%;"
                                                                                @endif
                                                                                @endif>
                                                                                                                                                      
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width:40%;">
                                                                              {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->bienes->propiedad_tipo :''}}  
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                             <?php 
                                                                                $v1=null;
                                                                                if($estudio->formatoRoa ){
                                                                                if($estudio->formatoRoa->bienes->propiedad_valor!=""){
                                                                                $v1=(int) number_format($estudio->formatoRoa->bienes->propiedad_valor, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $v1=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($v1, 2) }}
                                                                           
                                                                            
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                             <?php 
                                                                                $v2=null;
                                                                                if($estudio->formatoRoa ){
                                                                                if($estudio->formatoRoa->bienes->propiedad_pagado!=""){
                                                                                $v2=(int) number_format($estudio->formatoRoa->bienes->propiedad_pagado, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $v2=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($v2, 2) }}
                                                                                                                                                    
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                            <?php $vadeudo=(int)($v1-$v2)?>

                                                                            ${{isset($vadeudo)?number_format($vadeudo, 2):0}}
                                                                           
                                                                           </td>
                                                              </tr>
                                                               <tr>
                                                                                                                                               
                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                            CREDITO O HIPOTECA
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro"
                                                                              @if( $estudio->formatoRoa )
                                                                                @if( $estudio->formatoRoa->bienes->credito==1 )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                                @else
                                                                                style="width: 5%;"
                                                                                @endif
                                                                                @endif>
                                                                             
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro"  
                                                                               @if( $estudio->formatoRoa )
                                                                                @if( $estudio->formatoRoa->bienes->credito==2 )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                                @else
                                                                                style="width: 5%;"
                                                                                @endif
                                                                                @endif>
                                                                           
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width:40%;">
                                                                               {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->bienes->credito_tipo :''}}  
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                               <?php 
                                                                                $c1=null;
                                                                                if($estudio->formatoRoa ){
                                                                                if($estudio->formatoRoa->bienes->credito_valor!=""){
                                                                                $c1=(int) number_format($estudio->formatoRoa->bienes->credito_valor, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $c1=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($c1, 2) }}
                                                                        
                                                                            
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                             <?php 
                                                                                $c2=null;
                                                                                if($estudio->formatoRoa ){
                                                                                if($estudio->formatoRoa->bienes->credito_pagado!=""){
                                                                                $c2=(int) number_format($estudio->formatoRoa->bienes->credito_pagado, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $c2=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($c2, 2) }}
                                                                                                                                                     
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                             <?php $cadeudo=(int)($c1-$c2)?>

                                                                            ${{isset($cadeudo)?number_format($cadeudo, 2):0}}
                                                                           
                                                                           </td>
                                                              </tr>
                                                              <tr>
                                                                                                                                               
                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                            INVERSIONES/ AHORROS
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" 
                                                                             @if( $estudio->formatoRoa )
                                                                                @if( $estudio->formatoRoa->bienes->inversiones==1 )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                                @else
                                                                                style="width: 5%;"
                                                                                @endif
                                                                                @endif>

                                                                             </td>
                                                                            <td class="letra-componente alinear-centro"
                                                                             @if( $estudio->formatoRoa )
                                                                                @if( $estudio->formatoRoa->bienes->inversiones==2 )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                                @else
                                                                                style="width: 5%;"
                                                                                @endif
                                                                                @endif>
                                                                           
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width:40%;">
                                                                               {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->bienes->inversiones_tipo :''}}  
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                            <?php 
                                                                                $in1=null;
                                                                                if($estudio->formatoRoa ){
                                                                                if($estudio->formatoRoa->bienes->inversiones_valor!=""){
                                                                                $in1=(int) number_format($estudio->formatoRoa->bienes->inversiones_valor, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $in1=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($in1, 2) }}
                                                                                                                                                        
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                            <?php 
                                                                                $in2=null;
                                                                                if($estudio->formatoRoa ){
                                                                                if($estudio->formatoRoa->bienes->inversiones_pagado!=""){
                                                                                $in2=(int) number_format($estudio->formatoRoa->bienes->inversiones_pagado, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $in2=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($in2, 2) }}
                                                                           
                                                                            
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                            <?php $inadeudo=(int)($in1-$in2)?>

                                                                            ${{isset($inadeudo)?number_format($inadeudo, 2):0}}
                                                                           
                                                                           </td>
                                                              </tr>
                                                                 <tr>
                                                                                                                                               
                                                                            <td class="letra-componente alinear-izquierda" style="width:40%;">
                                                                            AUTOMOVILES
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro"
                                                                             @if( $estudio->formatoRoa )
                                                                                @if( $estudio->formatoRoa->bienes->automoviles==1 )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                                @else
                                                                                style="width: 5%;"
                                                                                @endif
                                                                                @endif>
                                                                              
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro"  
                                                                            @if( $estudio->formatoRoa )
                                                                                @if( $estudio->formatoRoa->bienes->automoviles==2 )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                                @else
                                                                                style="width: 5%;"
                                                                                @endif
                                                                                @endif>
                                                                           
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width:30%;">
                                                                               {{ isset( $estudio->formatoRoa  ) ? $estudio->formatoRoa->bienes->automoviles_tipo :''}}  
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha " style="width:10%;">
                                                                             <?php 
                                                                                $a1=null;
                                                                                if($estudio->formatoRoa ){
                                                                                if($estudio->formatoRoa->bienes->automoviles_valor!=""){
                                                                                $a1=(int) number_format($estudio->formatoRoa->bienes->automoviles_valor, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $a1=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($a1, 2) }}
                                                                                                                                                     
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                             <?php 
                                                                                $a2=null;
                                                                                if($estudio->formatoRoa ){
                                                                                if($estudio->formatoRoa->bienes->automoviles_pagado!=""){
                                                                                $a2=(int) number_format($estudio->formatoRoa->bienes->automoviles_pagado, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $a2=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($a2, 2) }}
                                                                            
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                           <?php $aadeudo=(int)($a1-$a2)?>

                                                                            ${{isset($aadeudo)?number_format($aadeudo, 2):0}}
                                                                           
                                                                           </td>
                                                              </tr>
                                                                      
                                                                       
                                                                          
                                                                        <tr>
                                                                            <td colspan="4" class="letra-componente alinear-derecha">
                                                                                
                                                                                    TOTAL INGRESOS
                                                                              
                                                                            </td>
                                                                            <td class="letra-componente alinear-derecha">
                                                                               
                                                                                 <?php $total_ingresos=(int)($v1+$c1+$in1+$a1); ?>
                                                                                   ${{ number_format($total_ingresos, 2) }}
                                                                            
                                                                            </td>                                                                        
                                                                            <td class="letra-componente alinear-derecha">
                                                                                
                                                                                  <?php $total_pagado=(int)($v2+$c2+$in2+$a2); ?>
                                                                                   ${{ number_format($total_pagado, 2) }}
                                                                              
                                                                              
                                                                            </td>
                                                                            <td class="letra-componente alinear-derecha">
                                                                          
                                                                                 <?php $total_adeudo=(int)($total_ingresos-$total_pagado); ?>
                                                                                   ${{ number_format($total_adeudo, 2) }}
                                                                           
                                                                            </td>
                                                                        </tr>                                                                                         
                                                                          
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>{{-- Luis --}}
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                 <p class="alinear-izquierda letra-componente">
                                                                   UBICACIÓN DE LAS PROPIEDADES
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-componente">
                                                                 {{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->bienes->ubicacion_propipedad : ''}}
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
                                        {{-- FIN BIENES --}}
                                        {{-- INICIO INFORMACION DE LA VIVIENDA --}}
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
                                                                            <th class="letra-componente alinear-centro negrita" style="width: 20%">VIVIENDA</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width: 20%">EL INMUELE ES</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width: 20%">SERVICIOS</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width: 20%" colspan="2">DISTRIBUCIÓN</th>                                           
                                                                                                                      
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>                                                                         
                                                                        <tr>
                                                                            <td class="table-border alinear-centro" style="width: 20%">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                         
                                                                                            <td class="alinear-izquierda"
                                                                                             @if( $estudio->formatoRoa )
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->vivienda_propia ) != ''  )
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
                                                                                            <td class="alinear-izquierda"
                                                                                            @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->vivienda_rentada) != ''  )
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
                                                                                            <td class="alinear-izquierda"
                                                                                             @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->vivienda_hipotecada) != ''  )
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
                                                                                            <td class="alinear-izquierda" 
                                                                                            @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->vivienda_congelada) != ''  )
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
                                                                                            <td class="alinear-izquierda"
                                                                                             @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->vivienda_prestada) != ''  )
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
                                                                                            <td class="alinear-izquierda"
                                                                                            @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->vivienda_padres) != ''  )
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
                                                                                            <td class="alinear-izquierda"
                                                                                            @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->vivienda_otro) != ''  )
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
                                                                            <td class="table-border alinear-izquierda" style="width: 20%">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="alinear-izquierda"
                                                                                             @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->inmueble_casa) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                  
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                  CASA       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-izquierda"
                                                                                             @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->inmueble_departamento) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    DEPARTAMENTO                
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-izquierda"
                                                                                            @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->inmueble_duplex) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                   
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                   DUPLEX         
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-izquierda"
                                                                                             @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->inmueble_condominio) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    CONDOMINIO            
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-izquierda"
                                                                                            @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->inmueble_vecindad) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                   VECINDAD               
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-izquierda"
                                                                                             @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->inmueble_cuarto) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                
                                            
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                 CUARTO  
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-izquierda"
                                                                                            @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->inmueble_otro) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                                                            

                                               
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    OTRO               
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="table-border alinear-izquierda" style="width: 20%">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="alinear-izquierda"
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->servicios_luz) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                     
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    LUZ              
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-izquierda"
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->servicios_agua) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                  
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    AGUA                       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-izquierda"
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->servicios_pavimentacion) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                   
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    PAVIMENTACIÓN                  
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-izquierda"
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->servicios_drenaje) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>

                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    DRENAJE           
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->servicios_telefono) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                    
                                                                                            </td class="alinear-izquierda">
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    TELÉFONO                          
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->servicios_seg_publica) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                    
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                   SEG. PÚBLICA
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->servicios_alumbrado) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                     
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                  ALUMBRADO           
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="table-border alinear-izquierda" style="width: 20%">                                                                                
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td
                                                                                            @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_sala) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif> 

                                                        
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                  SALA             
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td 
                                                                                             @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_comedor) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>


                                                         
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                  COMEDOR                       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_recamara) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif> 

                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    RECAMARA                 
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_cocina) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif> 


                                                            
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    COCINA           
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td 
                                                                                             @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_bano) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif> 

                                                            
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    BAÑO                         
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                             @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_garaje) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif> 

                                                            
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                   GARAJE  
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td 
                                                                                             @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_garaje) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>

                                                            
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                 BIBLIOTECA           
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="table-border alinear-izquierda" style="width: 20%">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td 
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_jardín) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                            
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                  JARDÍN        
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td 
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_zotehuela) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                          
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                    ZOTEHUELA                     
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td 
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_patio) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                            
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                  PATIO            
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td 
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_estudio) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                            
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-componente">
                                                                                                   ESTUDIO       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td 
                                                                                              @if( $estudio->formatoRoa)
                                                                                             @if( trim( $estudio->formatoRoa->vivienda->distribucion_cuarto_de_servicio) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                          
                                                                                            </td>
                                                                                            <td class="table-border">
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
                                                                            <td  colspan="5" style="width: 20%" class="table-border">
                                                                                <table class="tabla-componente" >
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            
                                                                                            <td style="width: 40%" class="letra-componente alinear-derecha">
                                                                                                
                                                                                                    ¿Cuántas personas viven en el domicilio?             
                                                                                               
                                                                                            </td>
                                                                                            <td style="width: 60%" class="letra-componente alinear-izquierda">
                                                         {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->vivienda->personas_viven: '' }}
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
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>
                                        </tr>
                                        {{-- FIN INFORMACION DE LA VIVIENDA --}}
                                        {{-- INICIO APRECIACION DE LA VIVIENDA --}}
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
                                                                            <th class="letra-componente negrita alinear-centro" style="width:20%;">NIVEL ECONÓMICO</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:20%;">CONSTRUCCIÓN</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:20%;">CONSERVACIÓN</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:20%;">MOBILIARIO</th>                                           
                                                                            <th class="letra-componente negrita alinear-centro">DE CORTE</th>                                           
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>                                                                         
                                                                        <tr>
                                                                            <td class="table-border" style="width:20%;">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td
                                                                              @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->nivel_eco_alta) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->nivel_eco_media_alta) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->nivel_eco_media) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->nivel_eco_media_baja) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->nivel_eco_baja) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->construccion_antigua) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->construccion_sencilla) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->construccion_moderna) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->construccion_semi_moderna) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->construccion_convencional) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->conservacion_excelente) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->conservacion_bueno) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->conservacion_regular) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->conservacion_malo) != ''  )
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
                                                                                       @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->conservacion_pesimo) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->mobiliario_completo) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->mobiliario_incompleto) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->mobiliario_escueto) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->corte_variado) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->corte_moderno) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->corte_colonial) != ''  )
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
                                                                                             @if( $estudio->formatoRoa)
                                                                                @if( trim( $estudio->formatoRoa->apreciacionVivienda->corte_sencillo) != ''  )
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
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>
                                        </tr>
                                        <tr>                                            
                                             <td colspan="3" class="table-border">
                                                 <table class="tabla-componente" >
                                                    <tbody>
                                                         <tr>
                                                            <td style="width: 50%">
                                                               <p class="alinear-centro letra-componente negrita">
                                                                    CONDICIONES INTERNAS           
                                                                </p>
                                                            </td>
                                                            <td style="width: 50%">
                                                                    <p class="alinear-centro letra-componente negrita">
                                                                    CONDICIONES EXTERNAS          
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        
                                        </tr>
                                        <tr>                                                                                            
                                             <td colspan="3" class="table-border">
                                                 <table class="tabla-componente" >
                                                    <tbody>
                                                         <tr>
                                                            <td style="width: 50%">
                                                               <p class="letra-componente">
                                                                  {{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->condiciones_internas: '' }}         
                                                                </p>
                                                            </td>
                                                            <td style="width: 50%" class="letra-componente">
                                                                {{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->apreciacionVivienda->condiciones_externas: '' }}
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
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

                                                                            <td
                                                                             @if( $estudio->formatoRoa)
                                                                                @if( $estudio->formatoRoa->apreciacionVivienda->familiares_enla_empresa == '1' )
                                                                                style="background-color:#FF8000;width: 25%"
                                                                                @else
                                                                                style="width: 25%"
                                                                                @endif
                                                                                @endif>

                                                                                
                                                                            </td>
                                                                            <td style="width: 25%" class="table-border letra-componente">&nbsp;&nbsp;SI</td>
                                                                            <td
                                                                              @if( $estudio->formatoRoa)
                                                                                @if( $estudio->formatoRoa->apreciacionVivienda->familiares_enla_empresa == '2' )
                                                                                style="background-color:#FF8000;width: 25%"
                                                                                @else
                                                                                style="width: 25%"
                                                                                @endif
                                                                                @endif>
                                                                            </td>
                                                                            <td style="width: 25%" class="table-border letra-componente">&nbsp;&nbsp;NO</td>

                                                                        </tr>         
                                                                        <tr>
                                                                            <td class="table-border letra-componente" style="width: 25%">
                                                                                
                                                                                     NOMBRE Y/O PARENTESCO:
                                                                               
                                                                            </td>
                                                                            <td  colspan="3" class="table-border" style="width: 75%">
                                                                                <p class="letra-componente border-footer">
                                                      {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->apreciacionVivienda->familiares_parentesco: '' }}
                                                                                </p>
                                                                            </td>
                                                                        </tr>                                                               
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <p class="letra-componente">
                                                          {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->apreciacionVivienda->entero_vacante: '' }}
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
                                        </tr>
                                        {{-- FIN APRECIACION DE LA VIVIENDA --}}
                                        {{-- INICIO UBICACION DEL DOMICILIO --}}
                                        <tr>
                                            
                                            <td colspan="3" class="table-border" >
                                                <table class="tabla-componente table-border">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente-principal">
                                                                     CROQUIS DE LA UBICACIÓN DEL DOMICILIO
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                              <td style="width: 100%;">
                                                        <div style="width: 100%;" class="alinear-centro">     

                                                        @if( $estudio->imagenes->where('tipo','Ubicacion')->first() )
                                                        {{ Html::image(                                           
                                                        $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                        $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->archivo,
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
                                                                 <p class="letra-componente ">
                               {{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->ubicacionDomicilio->distancia_trabajo: '' }}
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
                                                                 <p class="letra-componente">
                                {{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->ubicacionDomicilio->medio_transporte: '' }}
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
                                        </tr>
                                        {{-- FIN UBICACION DEL DOMICILIO --}}
                                        {{-- INICIO SITUACION SOCIAL --}}
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
                                                                A QUE ORGANIZACIONES O SINDICATOS LABORALES HA PERTENECIDO
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="alinear-centro letra-componente">
               {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->situacionSocial->pertenece_sindicato: '' }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                        </tr>
                                        <tr>
                                            
                                            <td colspan="3"  class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="">
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
                                                                            <td style="width: 10%">
                                                                                 <p class="alinear-derecha letra-componente">
                                                                                SI
                                                                                 </p>
                                                                            </td>
                                                                            <td class="alinear-centro" 
                                                                             @if( $estudio->formatoRoa)
                                                                                        @if( $estudio->formatoRoa->situacionSocial->detencion == '1')
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
                                                                            @if( $estudio->formatoRoa)
                                                                                        @if( $estudio->formatoRoa->situacionSocial->detencion == '2')
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif
                                                                                        @endif>
                                                                              
                                                                             
                                                                            </td>
                                                                            <td style="width: 20%">
                                                                                 <p class="alinear-derecha letra-componente">
                                                                                     MOTIVO:
                                                                                 </p>
                                                                            </td>
                                                                            <td  class=" letra-componente alinear-centro" style="width: 40%">
                                                                            {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->situacionSocial->especificacion_detencion: '' }}
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
                                                            <td  class="letra-componente alinear-centro" style="width: 25%">
                                                                <p>
                                                                    {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->situacionSocial->interes_corto: '' }}
                                                                </p>
                                                            </td>
                                                           <td  class="letra-componente alinear-centro" style="width: 25%">
                                                                <p>
                                                                      {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->situacionSocial->interes_mediano: '' }}
                                                                </p>
                                                            </td>
                                                            <td  class="letra-componente alinear-centro" style="width: 25%">
                                                                <p>
                                                                  {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->situacionSocial->interes_largo: '' }}
                                                                </p>
                                                            </td>
                                                           
                                                            <td  class="letra-componente alinear-centro" style="width: 25%">
                                                                <p>
                                                                {{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->situacionSocial->pasatiempos: '' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        














                                        </tr>
                                        {{-- FIN SITUACION SOCIAL --}}


</tbody>
</table>

<script>
    window.print();
</script>



</body>
</html>
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
                                {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"logo-plantilla"]) !!}           
                            </td>
                            <td class="logo-main table-border">
                                <p class="titulo-principal alinear-centro">ESTUDIO SOCIOECONÓMICO</p>
                            </td>
                            <td class="fecha-plantilla table-border">
                                    <table class="table-border">
                                        <thead>
                                            <tr>
                                                <th  style="width: 20%" class="letra-componente negrita alinear-centro">MES</th>
                                                <th  style="width: 20%" class="letra-componente negrita alinear-centro">DÍA</th>
                                                <th  style="width: 20%" class="letra-componente negrita alinear-centro">AÑO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td  style="width: 20%" class="letra-componente alinear-centro">                                    
                                                    {{ $estudio->mes_visita }}                                    
                                                </td>
                                                <td  style="width: 20%" class="letra-componente alinear-centro">                                    
                                                    {{ $estudio->dia_visita }}                                    
                                                </td>
                                                <td  style="width: 20%" class="letra-componente alinear-centro">                                    
                                                    {{ $estudio->anio_visita }}                                    
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
                                <table class="detalle-cliente">                                        
                                        <tbody>
                                            <tr>                                             
                                                <td class="letra-componente text-center alinear-izquierda" style="width: 15%">Empresa</td>
                                                <td class="letra-componente text-center" style="width: 50%">GRUPO NACIONAL PROVINCIAL</td>
                                                <td  class="alinear-centro letra-componente"  colspan="3" style="width: 30%">ESTATUS</td>
                                                
                                            </tr>
                                            <tr>                                             
                                                <td class="letra-componente text-center alinear-izquierda" style="width: 15%">Nombre</td>
                                                <td class="letra-componente text-center" style="width:50%">            
                                                     {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
                                                </td>
                                                <td class="alinear-centro letra-componente" colspan="3" rowspan="2"
                                                @if( $estudio->formatoGnp )
                                                    @if( $estudio->formatoGnp->encabezado->resultado_ese == '1' )
                                                        style="width: 30%;background-color:#499B61;color:white;"
                                                    @elseif( $estudio->formatoGnp->encabezado->resultado_ese == '2' )
                                                        style="width: 30%;background-color:#FF8000;color:white;"
                                                    @else
                                                        style="width: 30%;background-color:#FF0000;color:white;"
                                                    @endif
                                                @endif    
                                                >
                                                
                                                @if( $estudio->formatoGnp )
                                                    @if( $estudio->formatoGnp->encabezado->resultado_ese == '1' )
                                                        APTO
                                                    @elseif( $estudio->formatoGnp->encabezado->resultado_ese == '2' )
                                                        APTO CON RESERVA
                                                    @else
                                                        NO RECOMENDABLE
                                                    @endif
                                                @endif

                                                {{-- isset( $estudio->resultado_final_ese ) ?  $estudio->resultado_final_ese->nombre : 'Sin resultado' --}}
                                                 </td>
                                            
                                            </tr>
                                            <tr>                                             
                                                <td class="letra-componente text-center alinear-izquierda" style="width: 15%">Puesto</td>
                                                <td class="letra-componente text-center" style="width: 50%">
                                                  {{ isset( $estudio->formatoGnp->encabezado) ? $estudio->formatoGnp->encabezado->puesto: '' }}
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
                                                    El presente estudio socioeconómico se basa en la recabación de la información obtenida por el candidato (a) de cuatro áreas específicas: Económica, laboral, personal y social. A continuación se muestra un resumen de la investigación realizada. Para más detalles revisar el contenido completo.                                                    
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
                                                 <p class="alinear-centro letra-componente negrita ">1. Situación Socioeconómica</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="letra-componente justificar">
                                                   {{ isset( $estudio->formatoGnp->encabezado ) ?  $estudio->formatoGnp->encabezado->situacion_economica :'' }}
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
                                                 <p class="alinear-centro letra-componente negrita ">
                                                     2. Escolaridad
                                                 </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="letra-componente justificar">
                                                      {{ isset( $estudio->formatoGnp->encabezado ) ?  $estudio->formatoGnp->encabezado->escolaridad :'' }}
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
                                                 <p class="alinear-centro letra-componente negrita ">
                                                     3. Trayectoria Laboral
                                                 </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="letra-componente justificar">
                                                     {{ isset( $estudio->formatoGnp->encabezado ) ?  $estudio->formatoGnp->encabezado->trayectoria_laboral :'' }}
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
                            <td colspan="3" style="padding: 0">
                                <table class="auto-width">
                                    <tbody>
                                        <tr>
                                            <td class="table-border">
                                                 <p class="alinear-centro letra-componente negrita">
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
                                                            <th style="width: 10%" class="alinear-centro letra-componente negrita">BUENA</th>  
                                                            <th style="width: 10%" class="alinear-centro letra-componente negrita">REGULAR</th>  
                                                            <th style="width: 10%" class="alinear-centro letra-componente negrita">MALA</th>  
                                                            <th style="width: 50%" class="alinear-centro letra-componente negrita">COMENTARIOS</th>  
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                                 DISPONIBILIDAD
                                                            </td>
                                                            <td class="alinear-centro"
                                                            @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->valor_calificado_disponibilidad==1 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                            
                                                            </td>
                                                            <td class="alinear-centro" 
                                                            @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->valor_calificado_disponibilidad==2 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                            </td>
                                                            <td class="alinear-centro"
                                                            @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->valor_calificado_disponibilidad==3 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                            </td>
                                                            
                                                            <td class="letra-componente letra-componente justificar" rowspan="7" style="width: 50%">
                                                                 {{ isset( $estudio->formatoGnp->encabezado ) ?  $estudio->formatoGnp->encabezado->valor_calificado_comentario:'' }}
                                                            </td>
                                                        </tr>
                                                           <tr>
                                                            <td class="alinear-izquierda letra-componente" style="width: 10%;">
                                                                 PUNTUALIDAD
                                                            </td>
                                                            <td class="alinear-centro"
                                                            @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->valor_calificado_puntualidad==1 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                           
                                                            </td>
                                                            <td class="alinear-centro" 
                                                            @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->valor_calificado_puntualidad==2 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                           
                                                            </td>
                                                            <td class="alinear-centro" 
                                                            @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->valor_calificado_puntualidad==3 )
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
                                                             @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->valor_calificado_presentacion==1 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                           
                                                            </td>
                                                            <td class="alinear-centro"
                                                            @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->valor_calificado_presentacion==2 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                            </td>
                                                            <td class="alinear-centro"
                                                            @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->valor_calificado_presentacion==3 )
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
                            <td  colspan="3" class=" table-border">
                            <div class="box">
                                <table class="auto-width">
                                    <tbody>
                                       
                                        <tr>
                                            <td colspan="9"  class="table-border letra-componente alinear-izquierda">

                                             <p>
                                                    La entrevista se llevo a cabo en su departamento  su actitud fue amable todo el tiempo y sus respuestas fueron:
                                              </p>
                                            </td>
                                        </tr>
                                        <tr>
                                                    <td colspan="3" class="table-border">
                                                        <span style=" display: inline-block;height: 15px;"></span>
                                                    </td>
                                        </tr>

                                        <tr>
                                            <td  style="width:10%"  class="table-border alinear-derecha">
                                                <p class="letra-componente alinear-derecha">
                                                    Claras
                                                </p>
                                            </td>
                                            <td  
                                             @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->entrevista_tipo==1 )
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
                                            <td @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->entrevista_tipo==2 )
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
                                            @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->entrevista_tipo==3 )
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
                                            @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->entrevista_tipo==4 )
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
                                            @if( $estudio->formatoGnp)
                                                                @if( $estudio->formatoGnp->encabezado->entrevista_tipo==5 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                            </td>
                                        </tr>
                                         <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </td>
                        </tr>
                         <tr>
                            <td colspan="3" class="table-border">
                                 <span style=" display: inline-block;height: 15px;"></span>
                            </td>

                        </tr>
                         <tr>
                            <td colspan="3" class="table-border">
                                <div class="box">
                                    
                                    <p class="letra-componente negrita ">
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
                                   {{ $estudio->ejecutivoPrincipal->first()->centro_negocio->direccion_completa }}
                                   {{--Gen-T, División del Norte # 2617, Col. Del Carmen C. P. 04100, 56-58-44-07   coyoacan@gen-t.com.mx--}}                      DECLARACIÓN: El entrevistado declara que la información manifestada en este estudio es verdadera, por lo cual tendra vigencia y entrará en vigor el Art. 47 Fracc. I de la L.F.T. 
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
                         <!--  ****************************************** INICIO DATOS GENERALES ****************************************** - -->
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
                                            <td  class="table-border">
                                                <table  class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td  class="alinear-izquierda letra-componente  " style="width:20%;">NOMBRE DE CANDIDATO:</td>
                                                            <td  class="letra-componente alinear-izquierda " style="width:64%;">
                                                            <p class=""> 
                                                                 {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
                                                           </p>
                                                            </td>
                                                            <td  class="alinear-izquierda letra-componente  " style="width:8%;">SEXO:</td>
                                                            <td  class="letra-componente alinear-izquierda " style="width:8%;">
                                                            <p class=""> 
                                                               @if( $estudio->formatoGnp ) @if( $estudio->formatoGnp->datosGenerales->sexo == '1' )
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
                                            <td class="table-border">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">EDAD:</td>
                                                            <td  colspan="3" class="letra-componente alinear-izquierda " style="width:20%;"><p class="">
                                                            {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->edad : ''}}
                                                            </p></td>
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">FECHA DE NACIMIENTO:</td>
                                                            <td  colspan="3" class="letra-componente alinear-izquierda " style="width:16%;"><p class="">
                                                            {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->fecha_nac : ''}}
                                                            </p></td>
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;"> LUGAR DE NACIMIENTO:</td>
                                                            <td  colspan="3" class="letra-componente alinear-izquierda " style="width:16%;"><p class="">
                                                            {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->lugar_nac : ''}}
                                                            </p></td>
                                                           
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
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">NACIONALIDAD:</td>
                                                            <td  colspan="3" class="letra-componente alinear-izquierda " style="width:20%;"><p class="">
                                                            {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->nacionalidad : ''}}
                                                            </p></td>
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">
                                                            ESTADO CIVIL: </td>
                                                            <td  colspan="3" class="letra-componente alinear-izquierda " style="width:16%;"><p class="">
                                                               
                                                                @if( $estudio->formatoGnp ) @if( $estudio->formatoGnp->datosGenerales->edo_civil == '1' )
                                                                        Soltero
                                                                @endif
                                                                @endif
                                                                @if( $estudio->formatoGnp ) @if( $estudio->formatoGnp->datosGenerales->edo_civil == '2' )
                                                                        Casado
                                                                @endif
                                                                @endif
                                                                @if( $estudio->formatoGnp ) @if( $estudio->formatoGnp->datosGenerales->edo_civil == '3' )
                                                                        Viudo
                                                                @endif
                                                                @endif
                                                                @if( $estudio->formatoGnp ) @if( $estudio->formatoGnp->datosGenerales->edo_civil == '4' )
                                                                        Divorciado
                                                                @endif
                                                                @endif


                                                            
                                                            </p>
                                                            </td>

                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">FECHA DE MATRIMONIO:</td>
                                                            <td  colspan="3" class="letra-componente alinear-izquierda " style="width:16%;"><p class="">
                                                            {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->fecha_matrimonio : ''}}
                                                            </p></td>
                                                           
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
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">CALLE:</td>
                                                            <td  colspan="3" class="letra-componente alinear-izquierda " style="width:84%;"><p class="">
                                                            {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->calle : ''}}
                                                            </p></td>
                                                                                                                       
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
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">NÚMERO EXTERIOR </td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p class=" "> 
                                                                {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->num_ext: '' }}
                                                            </p></td>
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">

                                                            NÚMERO INTERIOR :</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:16%;">
                                                            <p class="">
                                                              {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->num_int : '' }}
                                                              </p>
                                                            </td>
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">DELEGACIÓN O MUNICIPIO:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:16%;">
                                                            <p class="">
                                                         {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->munincipio : '' }}
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
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">COLONIA:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p class="">
                                                               {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->colonia : '' }}</p>
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">EMAIL:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:16%;">
                                                            <p class="">
                                                               {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->email : '' }}</p>
                                                            </td>
                                                             <td class="alinear-izquierda letra-componente " style="width:16%;">TELÉFONO:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:16%;">
                                                            <p class="">
                                                              {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->telefono : '' }}
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
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">C.P.:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p class="">
                                                              {{ isset($estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->cp : '' }}</p>
                                                      </td>
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">TIEMPO EN EL DOMICILIO:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:16%;">
                                                            <p class="">
                                                              {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->tiem_dom : '' }}</p>
                                                           </td>
                                                             <td class="alinear-izquierda letra-componente " style="width:16%;">CELULAR:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:16%;">
                                                            <p class="">
                                                               {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->celular : '' }}</p>
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
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">PUESTO:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:52%;">
                                                            <p class="">
                                                              {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->municipio : '' }}</p>

                                                            </td>
                                                            <td class="alinear-izquierda letra-componente " style="width:16%;">TELÉFONO RECADOS:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:16%;">
                                                            <p class="">
                                                             {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->telefono_recados : '' }}  </p>
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
                                                            <td  class="alinear-izquierda letra-componente " style="width:40%;">ENTRE QUE CALLES SE ENCUENTRA EL DOMICILIO:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:60%;">
                                                            <p class="">
                                                               {{ isset( $estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->entre_calles : '' }}  </p>
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
                                                                <p class="letra-componente alinear-centro justificar">
                                                                      {{ isset($estudio->formatoGnp->datosGenerales ) ? $estudio->formatoGnp->datosGenerales->observaciones_doc_general : '' }}
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

                     <!--- end datos generales -->
                     <!-- ------------------------   end escolaridad ------------------------- -->
                      <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td >
                                                                 <p class="alinear-centro titulo-componente-principal">
                                                                     ESCOLARIDAD
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr >
                                                            <td class="table-border"> 
                                                                <table class="tabla-componente">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="letra-componente negrita alinear-centro" style="width: 20%">GRADO</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width: 20%">INSTITUCIÓN</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width: 20%">DOMICILIO</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width: 20%">PERIODO</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width: 20%">AÑOS</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width: 20%">COMPROBANTE</th>    
                                                                             
                                                                      
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                           <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                             PRIMARIA
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                           
                                                                                   {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->institucion_primaria : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                               {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->domicilio_primaria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                              {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->periodo_primaria : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                 {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->anos_primaria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->comprobante_primaria : '' }}
                                                                            </td>
                                                                           
                                                                      </tr>
                                                                          <tr>
                                                                           <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                             SECUNDARIA
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                           
                                                                                   {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->institucion_secundaria : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                               {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->domicilio_secundaria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                              {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->periodo_secundaria : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                 {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->anos_secundaria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->comprobante_secundaria : '' }}
                                                                            </td>
                                                                           
                                                                      </tr>
                                                                       <tr>
                                                                           <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                             TÉCNICA
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                           
                                                                                   {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->institucion_tecnica : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                               {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->domicilio_tecnica : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                              {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->periodo_tecnica : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                 {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->anos_tecnica : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->comprobante_tecnica : '' }}
                                                                            </td>
                                                                           
                                                                      </tr>
                                                                      <tr>
                                                                           <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                             PREPARATORIA
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                           
                                                                                   {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->institucion_preparatoria : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                               {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->domicilio_preparatoria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                              {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->periodo_preparatoria : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                 {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->anos_preparatoria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->comprobante_preparatoria : '' }}
                                                                            </td>
                                                                      </tr>
                                                                      <tr>
                                                                           <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                            PROFESIONAL
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                           
                                                                                   {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->institucion_profesiona : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                               {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->domicilio_profesional : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                              {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->periodo_profesional : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                 {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->anos_profesional : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->comprobante_profesional : '' }}
                                                                            </td>
                                                                      </tr>
                                                                        <tr>
                                                                           <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                            OTRO
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                           
                                                                                   {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->institucion_profesiona : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                               {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->domicilio_profesional : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                              {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->periodo_profesional : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                 {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->anos_profesional : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                                {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->comprobante_profesional : '' }}
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
              <!-- ------------------------   end escolaridad ------------------------- -->
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
                                                                 <td colspan="2" class="alinear-izquierda letra-componente " style="width: 50%">
                                                                    Si es trunco, ¿Por qué abandonó sus estudios?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente alinear-izquierda" style="width: 50%">
                                                                    {{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->escolaridadmet->si_trunco : '' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                                 <td colspan="2" class="alinear-izquierda letra-componente " style="width: 50%">
                                                                    Si está estudiando, ¿Qué días y en qué horario?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente alinear-izquierda" style="width: 50%">
                                                                   {{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->escolaridadmet->si_estudiando : '' }}
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
                                                                <p class="letra-componente alinear-centro">
                                                                      {{ isset($estudio->formatoGnp->escolaridadmet ) ? $estudio->formatoGnp->escolaridadmet->escolaridad_observaciones : '' }}
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
                                          {{--  CURSOS --}}
                                         <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                 <p class="alinear-centro letra-componente negrita ">
                                                                     CURSOS REALIZADOS
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table class="tabla-componente">

                                                                    <tbody>

                                                         @if( $estudio->formatoGnp)
                                                              @foreach ($estudio->formatoGnp->cursoMet as $index => $curso)
                                                                      <tr>
                                                                            <td class="table-border letra-componente alinear-derecha" style="width:10%;">DE</td>
                                                                            <td class="letra-componente table-border alinear-centro" style="width:15%;"><p class="border-footer">
                                                                               {{ $curso->de}}
                                                                            </p></td>        
                                                                            <td class="table-border letra-componente alinear-derecha" style="width:10%;">A</td>
                                                                            <td class="letra-componente table-border alinear-centro" style="width:15%;"><p class="border-footer">
                                                                                {{ $curso->a}}
                                                                            </p></td>                
                                                                            <td class="table-border letra-componente alinear-derecha" style="width:10%;">REALIZÓ</td>
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
                                        {{-- END CURSO--}}
                                         {{-- ------------------------------   IDIOMAS -------------------------- --}}
                                         <tr>
                                         <td colspan="3" class="table-border">
                                                    <span style=" display: inline-block;height: 15px;"></span>
                                        </td>

                                         </tr>
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                 <p class="alinear-centro letra-componente negrita">
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
                                                            @if( $estudio->formatoGnp)
                                                             <?php  $contador=1; 
                                                                   
                                                                    $procentaje=null;

                                                               ?>
                                                              @foreach ($estudio->formatoGnp->idiomas as $indexidioma => $idio)
                                                               <?php 
                                                                  $hablado=isset($idio->hablado)?$idio->hablado:0;
                                                                  $leido=isset($idio->leido)?$idio->leido:0;
                                                                  $escrito=isset($idio->escrito)?$idio->escrito:0;
                                                                  $comprension=isset($idio->comprension)?$idio->comprension:0;
                                                               ?>
                                                                  <tr>  
                                                                            <td class="letra-componente alinear-centro" style="width:5%;">
                                                                              {{ $contador++ }}

                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                               {{ $idio->idioma }}
                                                                            </td>                
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                {{ $idio->hablado!="" ?$idio->hablado:0 }} %
                                                                            </td>              
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                {{ $idio->leido!="" ?$idio->leido:0 }} %
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                               {{ $idio->escrito!="" ?$idio->escrito:0 }} %
                                                                            </td>                
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                 {{ $idio->comprension!="" ?$idio->comprension:0}} %
                                                                            </td>                
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                <?php echo $porcentaje=(($hablado+$leido+$escrito+$comprension)/4); ?>%
                                                                            </td>    
                                                                             <td class="letra-componente alinear-centro" 
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
                                    {{-- ------------------------------   IDIOMAS -------------------------- --}}
                                      {{-- ------------------------------ CONOCIMIENTOS -------------------------}}
                                       <tr>
                                            <td colspan="3" class="table-border">
                                                     <span style=" display: inline-block;height: 15px;"></span>
                                        </td>

                                     </tr>
                                      <tr>
                                            <td colspan="3" class="table-border" style="padding: 0">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                 <p class="alinear-centro letra-componente negrita ">
                                                                     CONOCIMIENTOS Y HABILIDADES
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-border">
                                                                <table class="tabla-componente">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="width:5%;" class="alinear-centro letra-componente negrita">#</th>
                                                                            <th style="width:83%;" class="alinear-centro letra-componente negrita">PAQUETERIA</th>
                                                                            <th style="width:12%;" class="alinear-centro letra-componente negrita">%</th>                                                                    
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                          @if( $estudio->formatoGnp)
                                                              @foreach ($estudio->formatoGnp->conocimientos_ as $index => $conocimiento)
                                                              <?php  $contador_conocimientos=1; ?>
                                                                        <tr>
                                                                            <td class="letra-componente  alinear-centro" style="width:5%;">
                                                                            {{ $contador_conocimientos++ }}</td>
                                                                            <td class="letra-componente  alinear-centro" style="width:83%;">
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
                                        {{-- ------------------------------ CONOCIMIENTOS -------------------------}}
                                              <!-- ----------------------------------------------------situacion familiar-------------------------------------- -->
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
                                                                            <th class="letra-componente letra-componente negrita" style="width:10%;">PARENTESCO</th>
                                                                            <th class="letra-componente letra-componente negrita" style="width:25%;">NOMBRE</th>
                                                                            <th class="letra-componente letra-componente negrita" style="width:10%;">EDAD</th>
                                                                            <th class="letra-componente letra-componente negrita" style="width:10%;">EDO. CIVIL</th>
                                                                            <th class="letra-componente letra-componente negrita" style="width:25%;">OCUPACION (Empresa)</th>
                                                                            <th class="letra-componente letra-componente negrita" style="width:20%;">DOMICILIO</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                           @if( $estudio->formatoGnp)
                                                              @foreach ($estudio->formatoGnp->familia as $index => $fam)
                                                            <tr>
                                                                            <td class=" alinear-centro letra-componente" style="width:10%;">
                                                                            
                                                                                  {{ $fam->parentesco }}
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" style="width:25%;">
                                                                                  {{ $fam->nombre }}
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" style="width:10%;">
                                                                                  {{ $fam->edad }}
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" style="width:10%;">
                                                                                  {{ $fam->edo_civil_familia }}
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" style="width:25%;">
                                                                                  {{ $fam->ocupacion }}
                                                                            </td>
                                                                             <td class="letra-componente  alinear-centro" style="width:20%;">
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
                                                                 <td colspan="2" class="alinear-izquierda letra-componente " style="width: 50%">
                                                                    ¿Con quién habita actualmente?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente" style="width: 50%">
                                                                   {{ isset( $estudio->formatoGnp ) ?  $estudio->formatoGnp->infoFamiliar->con_quien_vive : '' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                                 <td colspan="2" class="alinear-izquierda letra-componente " style="width: 50%">
                                                                 ¿Cómo considera que es su relación con ellos?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente" style="width: 50%">
                                                                 {{ isset( $estudio->formatoGnp ) ?  $estudio->formatoGnp->infoFamiliar->relacion_familia : '' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                                 <td colspan="2" class="alinear-izquierda letra-componente " style="width: 50%">
                                                                 ¿Tiene familiares viviendo en el extranjero?, ¿Quiénes y en dónde?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente" style="width: 50%">
                                                               {{ isset( $estudio->formatoGnp ) ?  $estudio->formatoGnp->infoFamiliar->familiares_extrangero : '' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                                 <td colspan="2" class="alinear-izquierda letra-componente " style="width: 50%">
                                                                Y, ¿al interior de la República?. ¿En dónde?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente" style="width: 50%">
                                                              {{ isset( $estudio->formatoGnp ) ?  $estudio->formatoGnp->infoFamiliar->familiares_interior_republica : '' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                                 <td colspan="2" class="alinear-izquierda letra-componente " style="width: 50%">
                                                               ¿Con qué frecuencia los visita?
                                                                 </td>
                                                            <td>
                                                                <p class="letra-componente" style="width: 50%">
                                                             {{ isset( $estudio->formatoGnp ) ?  $estudio->formatoGnp->infoFamiliar->frecuencia_visita : '' }}
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
                                                                <p class="letra-componente justificar">
                                                                    {{ isset( $estudio->formatoGnp ) ?  $estudio->formatoGnp->infoFamiliar->observaciones : '' }}
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
                                     <!-- ----------------------------------------------------situacion economica -->

                                        <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="">
                                                                 <p class="alinear-centro titulo-componente-principal">
                                                                     SITUACIÓN ECONÓMICA
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-border">
                                                                <table class="tabla-componente table-border">
                                                                    <thead>
                                                                        <tr>
                                                                            
                                                                            <th class="letra-componente negrita alinear-centro" style="width:20%;">APORTACIONES</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:20%;">TIPO DE INGRESO</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:20%;">CANTIDAD</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:20%;">CONCEPTO</th>
                                                                            <th class="letra-componente negrita alinear-centro" style="width:20%;"> EGRESOS </th>    
                                                                      
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>                                                                         
                                                       
                                                        <tr>

                                                            
                                                            
                                                                <td class="letra-componente alinear-centro " style="width:20%;">
                                                          
                                                                
                                              {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->conceptoinUno :''}}            
                                                               </td>
                                                                 <td class="letra-componente alinear-centro " style="width:20%;">
                                                               
                                                                
                                             {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinUno : ''}}       
                                                            </td>
                                                                <td class="letra-componente alinear-derecha " style="width:20%;"><p class=" alinear-derecha">

                                                                <?php 
                                                                $i1=null;
                                                                 if(isset( $estudio->formatoGnp )){
                                                                  if($estudio->formatoGnp->situacionEconomica->ingresosUno!=""){
                                                                  $i1=(int) number_format($estudio->formatoGnp->situacionEconomica->ingresosUno, 2, '.', '') ;
                                                                }else{
                                                                  $i1=0;
                                                                }
                                                            }
                                                                ?>

                                                                $  {{ number_format($i1, 2) }}
                                                              </td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                ALIMENTACIÓN EN CASA
                                                               </td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                 $e1=null;
    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->egresosUno!=""){
                                                                $e1=(int) number_format($estudio->formatoGnp->situacionEconomica->egresosUno, 2, '.', '');
                                                              }
                                                                else{
                                                                  $e1=0;
                                                                }
                                                            }
                                                                ?>

                                                                $ {{ number_format($e1, 2) }}
                                                                </td>
                                                                    
                                                       </tr>
                                                       <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ? $estudio->formatoGnp->situacionEconomica->conceptoinDos :''}}            
                                                                </p></td>
                                                                   <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                                                
                                                                {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->tipoinDos : ''}}       
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i2=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->ingresosDos!=""){
                                                                  $i2=(int) number_format($estudio->formatoGnp->situacionEconomica->ingresosDos, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i2=0;
                                                                } }
                                                                ?>
                                                                                                                              
                                                                $ {{ number_format($i2, 2) }} 
                                                               </td>
                                                                <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                                ALIMENTACIÓN FUERA DE CASA
                                                                </p></td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e2=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->egresosDos!=""){
                                                                  $e2=(int) number_format($estudio->formatoGnp->situacionEconomica->egresosDos, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e2=0;
                                                                } }
                                                                ?>
                                                                $ {{ number_format($e2, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                          <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->conceptoinTres :''}}            
                                                                </p></td>
                                                                 <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->tipoinTres :''}}            
                                                                </p></td>

                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $i3=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->ingresosTres!=""){
                                                                  $i3=(int) number_format($estudio->formatoGnp->situacionEconomica->ingresosTres, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i3=0;
                                                                } }
                                                                ?>
                                                                                                                             
                                                                $ {{ number_format($i3, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                                RENTA/HIPOTECA
                                                                </p></td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $e3=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->egresosTres!=""){
                                                                  $e3=(int) number_format($estudio->formatoGnp->situacionEconomica->egresosTres, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e3=0;
                                                                } }
                                                                ?>
                                                                $ {{ number_format($e3, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                         <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->conceptoinCuatro :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->tipoinCuatro :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $i4=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->ingresosCuatro!=""){
                                                                  $i4=(int) number_format($estudio->formatoGnp->situacionEconomica->ingresosCuatro, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i4=0;
                                                                } }
                                                                ?>
                                                                 $ {{ number_format($i4, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                               TELÉFONO
                                                                </p></td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e4=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->egresosCuatro!=""){
                                                                  $e4=(int) number_format($estudio->formatoGnp->situacionEconomica->egresosCuatro, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e4=0;
                                                                } }
                                                                ?>
                                                                $ {{ number_format($e4, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                        <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->conceptoinCinco :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->tipoinCinco :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i5=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->ingresosCinco!=""){
                                                                  $i5=(int) number_format($estudio->formatoGnp->situacionEconomica->ingresosCinco, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i5=0;
                                                                } }
                                                                ?>
                                                                  $ {{ number_format($i5, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                SERVICIOS ($ GAS, $ AGUA, $ LUZ) 
                                                                </p></td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $e5=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->egresosCinco!=""){
                                                                  $e5=(int) number_format($estudio->formatoGnp->situacionEconomica->egresosCinco, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e5=0;
                                                                } }
                                                                ?>
                                                                $ {{ number_format($e5, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                       <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->conceptoinSeis :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->tipoinSeis :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i6=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->ingresosSeis!=""){
                                                                  $i6=(int) number_format($estudio->formatoGnp->situacionEconomica->ingresosSeis, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i6=0;
                                                                } }
                                                                ?>
                                                                 $ {{ number_format($i6, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                                PREDIAL
                                                                </p></td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $e6=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->egresosSeis!=""){
                                                                  $e6=(int) number_format($estudio->formatoGnp->situacionEconomica->egresosSeis, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e6=0;
                                                                } }
                                                                ?>
                                                               $ {{ number_format($e6, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                       <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->conceptoinSiete :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->tipoinSiete :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i7=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->ingresosSiete!=""){
                                                                  $i7=(int) number_format($estudio->formatoGnp->situacionEconomica->ingresosSiete, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i7=0;
                                                                } }
                                                                ?>
                                                                $ {{ number_format($i7, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                GASTOS ESCOLARES
                                                                </p></td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e7=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->egresosSiete!=""){
                                                                  $e7=(int) number_format($estudio->formatoGnp->situacionEconomica->egresosSiete, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e7=0;
                                                                } }
                                                                ?>
                                                                     $ {{ number_format($e7, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                       <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->conceptoinOcho :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->tipoinOcho :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i8=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->ingresosOcho!=""){
                                                                  $i8=(int) number_format($estudio->formatoGnp->situacionEconomica->ingresosOcho, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i8=0;
                                                                } }
                                                                ?>
                                                                  $ {{ number_format($i8, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:20%;">
                                                                GASOLINA Ó TRANSPORTE
                                                                </p></td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $e8=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->egresosOcho!=""){
                                                                  $e8=(int) number_format($estudio->formatoGnp->situacionEconomica->egresosOcho, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e8=0;
                                                                } }
                                                                ?>
                                                                 $ {{ number_format($e8, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                       <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->conceptoinNueve :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->tipoinNueve :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i9=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->ingresosNueve!=""){
                                                                  $i9=(int) number_format($estudio->formatoGnp->situacionEconomica->ingresosNueve, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i9=0;
                                                                } }
                                                                ?>
                                                                  $ {{ number_format($i9, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                                ROPA CALZADO 
                                                                </p></td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e9=null;
                                                                    if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->egresosNueve!=""){
                                                                  $e9=(int) number_format($estudio->formatoGnp->situacionEconomica->egresosNueve, 2, '.', '');
                                                                }
                                                                else{
                                                                  $e9=0;
                                                                } }
                                                                ?>
                                                                 $ {{ number_format($e9, 2) }} 
                                                                </p></td>
                                                                    
                                                       </tr>
                                                        <tr>
                                                            
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->conceptoinDiez :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->tipoinDiez :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i10=null;
                                                                   if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->ingresosDiez!=""){
                                                                  $i10=(int) number_format($estudio->formatoGnp->situacionEconomica->ingresosDiez, 2, '.', '');
                                                                }
                                                                else{
                                                                  $i10=0;
                                                                }
                                                            }
                                                                ?>
                                                                  $ {{ number_format($i10, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                                DIVERSIONES
                                                                </p></td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e10=null;
                                                                  if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->egresosDiez!=""){
                                                                  $e10=(int) number_format($estudio->formatoGnp->situacionEconomica->egresosDiez, 2, '.', '');
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
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->conceptoinOnce :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;">
                                                                <p class=" alinear-centro">
                                             
                                                                {{  isset( $estudio->formatoGnp->situacionEconomica ) ?$estudio->formatoGnp->situacionEconomica->tipoinOnce :''}}            
                                                                </p></td>
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                <?php 
                                                                  $i11=null;
                                                                  if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->ingresosOnce!=""){
                                                                  $i11=(int) number_format($estudio->formatoGnp->situacionEconomica->ingresosOnce, 2, '.', '');
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
                                                                </p></td>                                                                    
                                                                <td class="letra-componente " style="width:20%;"><p class=" alinear-derecha">
                                                                 <?php 
                                                                  $e11=null;
                                                                  if($estudio->formatoGnp){
                                                                  if($estudio->formatoGnp->situacionEconomica->egresosOnce!=""){
                                                                  $e11=(int) number_format($estudio->formatoGnp->situacionEconomica->egresosOnce, 2, '.', '');
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
                                                                 <p class="alinear-izquierda letra-componente ">
                                                                    Si hay déficit, ¿Cómo lo solventa?
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-componente justificar">
                                                                   {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->situacionEconomica->deficit_seconomica : ''}}
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
                                    
 <!-- ----------------------------------------------------situacion economica ----------------------------------------- -->
  <!-- ---------------------------------------------------- BIENES----------------------------------------- -->

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
                                                                            <th class="letra-componente negrita alinear-centro"  style="width:10%;">SI</th>
                                                                            <th class="letra-componente negrita alinear-centro"  style="width:10%;">NO</th>
                                                                            <th class="letra-componente negrita alinear-centro"  style="width:20%;">TIPO</th>
                                                                            <th class="letra-componente negrita alinear-centro"  style="width:10%;">VALOR</th>    
                                                                            <th class="letra-componente negrita alinear-centro"  style="width:10%;">PAGADO</th>    
                                                                            <th class="letra-componente negrita alinear-centro"  style="width:10%;">ADEUDO</th>    
                                                                      
                                                                        </tr>
                                                                    </thead>
                                                          <tr>
                                                                                                                                               
                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                            PROPIEDADES DEL CANDIDATO
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" 
                                                                              @if(isset( $estudio->formatoGnp->bienes ))
                                                                                @if($estudio->formatoGnp->bienes->propiedad_candidato==1)
                                                                                     style="background-color:#FF8000; width: 10%;"
                                                                                     @else
                                                                                     style=" width: 10%;"

                                                                                  @endif

                                                                              @endif>
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" @if(isset( $estudio->formatoGnp->bienes ))
                                                                                @if($estudio->formatoGnp->bienes->propiedad_candidato==2)
                                                                                     style="background-color:#FF8000; width: 10%;"
                                                                                     @else
                                                                                     style=" width: 10%;"

                                                                                  @endif

                                                                              @endif>
                                                                           
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" style="width:20%;">
                                                                              {{ isset( $estudio->formatoGnp->bienes ) ? $estudio->formatoGnp->bienes->propiedad_tipo :''}}  
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;">
                                                                             <?php 
                                                                                $v1=null;
                                                                                if($estudio->formatoGnp){
                                                                                if($estudio->formatoGnp->bienes->propiedad_valor!=""){
                                                                                $v1=(int) number_format($estudio->formatoGnp->bienes->propiedad_valor, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $v1=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($v1, 2) }}
                                                                           
                                                                            
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;">
                                                                             <?php 
                                                                                $v2=null;
                                                                                  if($estudio->formatoGnp){
                                                                                if($estudio->formatoGnp->bienes->propiedad_pagado!=""){
                                                                                $v2=(int) number_format($estudio->formatoGnp->bienes->propiedad_pagado, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $v2=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($v2, 2) }}
                                                                                                                                                    
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;">
                                                                            <?php $vadeudo=(int)($v1-$v2)?>

                                                                            ${{isset($vadeudo)?number_format($vadeudo, 2):0}}
                                                                           
                                                                            </td>
                                                              </tr>
                                                               <tr>
                                                                                                                                               
                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                            CREDITO O HIPOTECA
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" 
                                                                            @if(isset( $estudio->formatoGnp->bienes ))
                                                                                @if($estudio->formatoGnp->bienes->credito==1)
                                                                                     style="background-color:#FF8000; width: 10%;"
                                                                                     @else
                                                                                     style=" width: 10%;"
                                                                                        @endif
                                                                                  @endif>

                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro"  @if(isset( $estudio->formatoGnp->bienes ))
                                                                                @if($estudio->formatoGnp->bienes->credito==2)
                                                                                     style="background-color:#FF8000; width: 10%;"
                                                                                     @else
                                                                                     style=" width: 10%;"
                                                                                        @endif
                                                                                  @endif>
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:30%;">
                                                                               {{ isset( $estudio->formatoGnp->bienes ) ? $estudio->formatoGnp->bienes->credito_tipo :''}}  
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;">
                                                                               <?php 
                                                                                $c1=null;
                                                                                  if($estudio->formatoGnp){
                                                                                if($estudio->formatoGnp->bienes->credito_valor!=""){
                                                                                $c1=(int) number_format($estudio->formatoGnp->bienes->credito_valor, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $c1=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($c1, 2) }}
                                                                        
                                                                            
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;">
                                                                             <?php 
                                                                                $c2=null;
                                                                                  if($estudio->formatoGnp){
                                                                                if($estudio->formatoGnp->bienes->credito_pagado!=""){
                                                                                $c2=(int) number_format($estudio->formatoGnp->bienes->credito_pagado, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $c2=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($c2, 2) }}
                                                                                                                                                     
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;">
                                                                             <?php $cadeudo=(int)($c1-$c2)?>

                                                                            ${{isset($cadeudo)?number_format($cadeudo, 2):0}}
                                                                           
                                                                            </td>
                                                              </tr>
                                                              <tr>
                                                                                                                                               
                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                            INVERSIONES/ AHORROS
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" 
                                                                            @if(isset( $estudio->formatoGnp->bienes ))
                                                                                @if($estudio->formatoGnp->bienes->inversiones==1)
                                                                                     style="background-color:#FF8000; width: 10%;"
                                                                                     @else
                                                                                     style=" width: 10%;"

                                                                                  @endif

                                                                              @endif>
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro"
                                                                            @if(isset( $estudio->formatoGnp->bienes ))
                                                                                @if($estudio->formatoGnp->bienes->inversiones==2)
                                                                                     style="background-color:#FF8000; width: 10%;"
                                                                                     @else
                                                                                     style=" width: 10%;"

                                                                                  @endif

                                                                              @endif>
                                                                           
                                                                           
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" style="width:30%">
                                                                               {{ isset( $estudio->formatoGnp->bienes ) ? $estudio->formatoGnp->bienes->inversiones_tipo :''}}  
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;">
                                                                            <?php 
                                                                                $in1=null;
                                                                                  if($estudio->formatoGnp){
                                                                                if($estudio->formatoGnp->bienes->inversiones_valor!=""){
                                                                                $in1=(int) number_format($estudio->formatoGnp->bienes->inversiones_valor, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $in1=0;
                                                                              }}
                                                                              ?>
                                                                             $ {{  number_format($in1, 2) }}
                                                                                                                                                        
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;"
                                                                            <?php 
                                                                                $in2=null;
                                                                                  if($estudio->formatoGnp){
                                                                                if($estudio->formatoGnp->bienes->inversiones_pagado!=""){
                                                                                $in2=(int) number_format($estudio->formatoGnp->bienes->inversiones_pagado, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $in2=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($in2, 2) }}
                                                                           
                                                                            
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;">
                                                                            <?php $inadeudo=(int)($in1-$in2)?>

                                                                            ${{isset($inadeudo)?number_format($inadeudo, 2):0}}
                                                                           
                                                                            </td>
                                                              </tr>
                                                                 <tr>
                                                                                                                                               
                                                                            <td class="letra-componente  alinear-izquierda" style="width:30%;">
                                                                            AUTOMOVILES
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" 
                                                                            @if(isset( $estudio->formatoGnp->bienes ))
                                                                                @if($estudio->formatoGnp->bienes->automoviles==1)
                                                                                     style="background-color:#FF8000; width: 10%;"
                                                                                     @else
                                                                                     style=" width: 10%;"

                                                                                  @endif

                                                                              @endif>
                                                                           
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro"   
                                                                            @if(isset( $estudio->formatoGnp->bienes ))
                                                                                @if($estudio->formatoGnp->bienes->automoviles==2)
                                                                                     style="background-color:#FF8000; width: 10%;"
                                                                                     @else
                                                                                     style=" width: 10%;"

                                                                                  @endif

                                                                              @endif>
                                                                           
                                                                            </td>
                                                                            <td class="letra-componente  alinear-centro" style="width:30%">
                                                                               {{ isset( $estudio->formatoGnp->bienes ) ? $estudio->formatoGnp->bienes->automoviles_tipo :''}}  
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;">
                                                                             <?php 
                                                                                $a1=null;
                                                                                  if($estudio->formatoGnp){
                                                                                if($estudio->formatoGnp->bienes->automoviles_valor!=""){
                                                                                $a1=(int) number_format($estudio->formatoGnp->bienes->automoviles_valor, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $a1=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($a1, 2) }}
                                                                                                                                                     
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;">
                                                                             <?php 
                                                                                $a2=null;
                                                                                  if($estudio->formatoGnp){
                                                                                if($estudio->formatoGnp->bienes->automoviles_pagado!=""){
                                                                                $a2=(int) number_format($estudio->formatoGnp->bienes->automoviles_pagado, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $a2=0;
                                                                              }
                                                                          }
                                                                              ?>
                                                                             $ {{  number_format($a2, 2) }}
                                                                            
                                                                            </td>
                                                                            <td class="letra-componente  alinear-derecha" style="width:10%;">
                                                                           <?php $aadeudo=(int)($a1-$a2)?>

                                                                            ${{isset($aadeudo)?number_format($aadeudo, 2):0}}
                                                                           
                                                                            </td>
                                                              </tr>
                                                                      
                                                                       
                                                                          
                                                                        <tr>
                                                                            <td colspan="4" class="letra-componente alinear-derecha">
                                                                               
                                                                                    TOTALES
                                                                                </p>
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
                                                                 <p class="alinear-izquierda letra-componente ">
                                                                   UBICACIÓN DE LAS PROPIEDADES
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-componente alinear-izquierda">
                                                                 {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->bienes->ubicacion_propipedad : ''}}
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
            <!------------------------------------- END BIENES----------------------------------------------------- -->
             <!------------------------------------- infromacion de la vivienda ----------------------------------------------------- -->
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
                                                                         
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoGnp )
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->vivienda_propia ) != ''  )
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
                                                                                            @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->vivienda_rentada) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->vivienda_hipotecada) != ''  )
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
                                                                                            @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->vivienda_congelada) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->vivienda_prestada) != ''  )
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
                                                                                            @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->vivienda_padres) != ''  )
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
                                                                                            @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->vivienda_otro) != ''  )
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
                                                                            <td class="table-border alinear-centro" style="width: 20%">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->inmueble_casa) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->inmueble_departamento) != ''  )
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
                                                                                            @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->inmueble_duplex) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->inmueble_condominio) != ''  )
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
                                                                                            @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->inmueble_vecindad) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->inmueble_cuarto) != ''  )
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
                                                                                            @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->inmueble_otro) != ''  )
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
                                                                            <td class="table-border alinear-centro" style="width: 20%">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="alinear-centro"
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->servicios_luz) != ''  )
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
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->servicios_agua) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->servicios_pavimentacion) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->servicios_drenaje) != ''  )
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
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->servicios_telefono) != ''  )
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
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->servicios_seg_publica) != ''  )
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
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->servicios_alumbrado) != ''  )
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
                                                                            <td class="table-border alinear-centro" style="width: 20%">                                                                                
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td
                                                                                            @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_sala) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_comedor) != ''  )
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
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_recamara) != ''  )
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
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_cocina) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_bano) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_garaje) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_garaje) != ''  )
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
                                                                            <td class="table-border alinear-centro" style="width: 20%">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td 
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_jardín) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                                                            
                                                            
                                                                                            </td>
                                                                                            <td class="table-border alinear-izquierda">
                                                                                                <p class="letra-componente">
                                                                                                  JARDÍN        
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td 
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_zotehuela) != ''  )
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
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_patio) != ''  )
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
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_estudio) != ''  )
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
                                                                                              @if( $estudio->formatoGnp)
                                                                                             @if( trim( $estudio->formatoGnp->vivienda->distribucion_cuarto_de_servicio) != ''  )
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
                                                                            <td colspan="5" class="table-border">
                                                                                <table class="tabla-componente"  style="width: 100%" >
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            
                                                                                            <td class=" alinear-izquierda"  style="width: 40%" >
                                                                                                <p class="letra-componente">
                                                                                                    ¿Cuántas personas viven en el domicilio?             
                                                                                                </p>
                                                                                            </td>
                                                                                            <td style="width: 60%" class=" letra-componente alinear-izquierda">
                                                         {{ isset( $estudio->formatoGnp->vivienda) ? $estudio->formatoGnp->vivienda->personas_viven: '' }}
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
                                                 <span style=" display: inline-block;height: 15px;"></span>
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
                                                                            <th class="letra-componente alinear-centro negrita">DE CORTE</th>                                           
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>                                                                         
                                                                        <tr>
                                                                            <td class="table-border" style="width:20%;">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td
                                                                              @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->nivel_eco_alta) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->nivel_eco_media_alta) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->nivel_eco_media) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->nivel_eco_media_baja) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->nivel_eco_baja) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->construccion_antigua) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->construccion_sencilla) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->construccion_moderna) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->construccion_semi_moderna) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->construccion_convencional) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->conservacion_excelente) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->conservacion_bueno) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->conservacion_regular) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->conservacion_malo) != ''  )
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
                                                                                       @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->conservacion_pesimo) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->mobiliario_completo) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->mobiliario_incompleto) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->mobiliario_escueto) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->corte_variado) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->corte_moderno) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->corte_colonial) != ''  )
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
                                                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->apreciacionVivienda->corte_sencillo) != ''  )
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
                                                 <table class="tabla-componente table-border" >
                                                    <tbody>
                                                         <tr>
                                                            <td style="width: 50%">
                                                                                               <p class="alinear-centro letra-componente  negrita">
                                                                                                    CONDICIONES INTERNAS           
                                                                                                </p>
                                                                                            </td>
                                                                                            <td style="width: 50%">
                                                                                                    <p class="alinear-centro letra-componente negrita ">
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
                                                                                               <p class="letra-componente justificar">
                                                                                                  {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->apreciacionVivienda->condiciones_internas: '' }}         
                                                                                                </p>
                                                                                            </td>
                                                                                            <td class="letra-componente justificar" style="width: 50%">
                                                                                                {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->apreciacionVivienda->condiciones_externas: '' }}
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
                                                                                          CÓMO FUE QUE INGRESO A LABORA A GNP
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="width: 50%" class="alinear-centro">
                                                                                        <table class="auto-width">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                 <tr>
                                                                                                    <td colspan="5" class="table-border">
                                                                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                   <td style="width: 20%" class="table-border"></td>

                                                                                                    <td
                                                                                                     @if( $estudio->formatoGnp)
                                                                                                        @if( $estudio->formatoGnp->apreciacionVivienda->familiares_enla_empresa == '1' )
                                                                                                        style="background-color:#FF8000;width: 10%"
                                                                                                        @else
                                                                                                        style="width: 10%"
                                                                                                        @endif
                                                                                                        @endif>

                                                                                                        
                                                                                                    </td>
                                                                                                    <td style="width: 20%" class="table-border letra-componente">&nbsp;&nbsp;SI</td>
                                                                                                    <td
                                                                                                      @if( $estudio->formatoGnp)
                                                                                                        @if( $estudio->formatoGnp->apreciacionVivienda->familiares_enla_empresa == '2' )
                                                                                                        style="background-color:#FF8000;width: 10%"
                                                                                                        @else
                                                                                                        style="width: 10%"
                                                                                                        @endif
                                                                                                        @endif>
                                                                                                    </td>
                                                                                                    <td style="width: 20%" class="table-border letra-componente">&nbsp;&nbsp;NO</td>

                                                                                                </tr>         
                                                                                                <tr>
                                                                                                    <td class="table-border" style="width: 25%">
                                                                                                        <p class="letra-componente">
                                                                                                             NOMBRE Y/O PARENTESCO:
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td  colspan="4" class="table-border" style="width: 75%">
                                                                                                        <p class="letra-componente border-footer">
                                                                              {{ isset( $estudio->formatoGnp->apreciacionVivienda) ? $estudio->formatoGnp->apreciacionVivienda->familiares_parentesco: '' }}
                                                                                                        </p>
                                                                                                    </td>
                                                                                                </tr>                                                               
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <p class="letra-componente">
                                                                                  {{ isset( $estudio->formatoGnp->apreciacionVivienda) ? $estudio->formatoGnp->apreciacionVivienda->entero_vacante: '' }}
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
                                          <tr>
                                         <!--------------------------------------------- CROQUIS --------------------------------------------- -->
                                             <!--------------------------------------------- CROQUIS --------------------------------------------- -->
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
                                                         <td style="width: 100%;">
                                                        <div style="width: 100%;" class="alinear-centro"> 
                                                 @if( $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first() )
                                                     {{ Html::image(
                                                        $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                        $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->archivo,'',["style"=>"max-width:100%"]) }}
                                                                                                                  
                                                     
                                                            
                                                        @else
                                                             
                                                        {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["style"=>"max-width:100%"]) !!}        

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
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>
                                        </tr>
                                              <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente-principal">
                                                                    DESCRIPCIÓN DEL DOMICILIO
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-componente alinear-centro">
                                                                    {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->ubicacionDomicilio->descripcion_vivienda: '' }}
                                                                </p>
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
                                                                 <p class="alinear-izquierda letra-componente ">
                                                                     DISTANCIA DE SU CASA AL TRABAJO
                                                                 </p>
                                                            </td>
                                                            <td>
                                                                 <p class="letra-componente ">
                               {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->ubicacionDomicilio->distancia_trabajo: '' }}
                                                                 </p>
                                                            </td style="width: 50%">
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 50%">
                                                                 <p class="alinear-izquierda letra-componente ">
                                                                     MEDIO DE TRANSPORTE QUE UTILIZA
                                                                 </p>
                                                            </td style="width: 50%">
                                                            <td>
                                                                 <p class="letra-componente">
                                {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->ubicacionDomicilio->medio_transporte: '' }}
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

  <!--------------------------------------------- CROQUIS --------------------------------------------- -->
   <!-- ----------------------------------------- SITUACION SOCIAL ------------------------------------  -->

                                        <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
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
                                                                A QUE ORGANIZACIONES O SINDICATOS LABORALES HA PERTENECIDO
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="alinear-centro letra-componente">
               {{ isset( $estudio->formatoGnp->situacionSocial) ? $estudio->formatoGnp->situacionSocial->pertenece_sindicato: '' }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                          <tr>

                                        <tr>
                                            <td colspan="3"  class="">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border">
                                                                 <p class="alinear-centro letra-componente ">
                                                                     ¿ HA SIDO DETENIDO (A), O HA TENIDO ALGUNA DEMANDA LABORAL, CIVIL, MERCANTIL O PENAL ?
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-border" style="width: 50%">
                                                                <table class="tabla-componente">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width: 10%" class="alinear-derecha letra-componente table-border">
                                                                               
                                                                                SI&nbsp;&nbsp;
                                                                            
                                                                            </td>
                                                                            <td class="alinear-centro" 
                                                                             @if( $estudio->formatoGnp)
                                                                                        @if( $estudio->formatoGnp->situacionSocial->detencion == '1')
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif
                                                                                        @endif>
                                                                               
                                                                            </td>
                                                                            <td style="width: 10%" class="alinear-derecha letra-componente table-border">
                                                                               
                                                                            NO&nbsp;&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="alinear-centro" 
                                                                            @if( $estudio->formatoGnp)
                                                                                        @if( $estudio->formatoGnp->situacionSocial->detencion == '2')
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif
                                                                                        @endif>
                                                                              
                                                                             
                                                                            </td>
                                                                            <td style="width: 20%" class="alinear-derecha letra-componente table-border">
                                                                                 
                                                                                     MOTIVO:
                                                                               
                                                                            </td>
                                                                            <td  class=" letra-componente alinear-izquierda table-border "  style="width: 40%">
                                                                            {{ isset( $estudio->formatoGnp->situacionSocial) ? $estudio->formatoGnp->situacionSocial->especificacion_detencion: '' }}
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
                                                            <td style="width: 25%">
                                                                 <p class="alinear-centro letra-componente negrita ">
                                                                     INTERESES A CORTO PLAZO
                                                                 </p>
                                                            </td>
                                                            <td style="width: 25%">
                                                                 <p class="alinear-centro letra-componente negrita ">
                                                                     INTERESES A MEDIANO PLAZO
                                                                 </p>
                                                            </td>
                                                            <td style="width: 25%">
                                                                 <p class="alinear-centro letra-componente negrita ">
                                                                     INTERESES A LARGO PLAZO
                                                                 </p>
                                                            </td>
                                                            <td style="width: 25%">
                                                                 <p class="alinear-centro letra-componente negrita ">
                                                                     ¿ CUALES SON SUS PRINCIPALES PASATIEMPOS ?
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%">
                                                                <p class="letra-componente justificar">
                                                                    {{ isset( $estudio->formatoGnp->situacionSocial) ? $estudio->formatoGnp->situacionSocial->interes_corto: '' }}
                                                                </p>
                                                            </td>
                                                           <td style="width: 25%">
                                                                <p class="letra-componente justificar">
                                                                      {{ isset( $estudio->formatoGnp->situacionSocial) ? $estudio->formatoGnp->situacionSocial->interes_mediano: '' }}
                                                                </p>
                                                            </td>
                                                            <td style="width: 25%">
                                                                <p class="letra-componente justificar">
                                                                  {{ isset( $estudio->formatoGnp->situacionSocial) ? $estudio->formatoGnp->situacionSocial->interes_largo: '' }}
                                                                </p>
                                                            </td>
                                                           
                                                            <td style="width: 25%">
                                                                <p class="letra-componente justificar">
                                                                {{ isset( $estudio->formatoGnp->situacionSocial) ? $estudio->formatoGnp->situacionSocial->pasatiempos: '' }}
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
  <!-- ----------------------------------------- SITUACION SOCIAL ------------------------------------  -->
   <!--  AQUI ESTADO DE SALUD -->

                                         <tr>
                                            <td colspan="3"  style="padding: 0">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="9" style="width: 100%" >
                                                                 <p class="alinear-centro titulo-componente-principal">
                                                                    ESTADO DE SALUD
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                                <td colspan="3" class="table-border">
                                                                    &nbsp;
                                                                </td>
                                                            </tr>
                                                     
                                                        <tr>

                                                            <td class="alinear-derecha letra-componente  table-border" style="width:30%">
                                                              <p>
                                                                  ¿CÓMO CONSIDERA SU ESTADO DE SALUD? :
                                                             
                                                          </p>
                                                            </td>
                                                            <td class="alinear-centro letra-componente table-border" style="width: 3%">
                                                               
                                                                  
                                                          
                                                            </td>
                                                             <td class="alinear-centro " 
                                                            
                                                                  @if( $estudio->formatoGnp ) 
                                                                  @if( $estudio->formatoGnp->enfermedad->estado_salud == '1' )
                                                                     style='background-color:#FF8000;width: 10%'
                                                                     @else
                                                                     style='width:10%'
                                                                  @endif
                                                                  @endif
                                                              
                                                            </td>
                                                            <td class="alinear-centro letra-componente table-border" style="width: 20%">
                                                               BUENO
                                                          
                                                            </td>
                                                              <td class="alinear-centro" 
                                                                  @if( $estudio->formatoGnp ) 
                                                                  @if( $estudio->formatoGnp->enfermedad->estado_salud == '2' )
                                                                     style='background-color:#FF8000;width: 10%'
                                                                     @else
                                                                     style='width:10%'
                                                                  @endif
                                                                  @endif
                                                              
                                                            </td>
                                                            <td class="alinear-centro letra-componente table-border" style="width: 20%">
                                                               REGULAR
                                                          
                                                            </td>
                                                               <td class="alinear-centro" 
                                                                  @if( $estudio->formatoGnp ) 
                                                                  @if( $estudio->formatoGnp->enfermedad->estado_salud == '3' )
                                                                     style='background-color:#FF8000;width: 10%'
                                                                     @else
                                                                     style='width:10%'
                                                                  @endif
                                                                  @endif
                                                              
                                                            </td>
                                                            <td class="alinear-centro letra-componente table-border" style="width: 20%" colspan="2">
                                                              MALA
                                                          
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
                                        </tr>
                                             <tr>
                                                                <td colspan="3" class="table-border">
                                                                    &nbsp;
                                                                </td>
                                                            </tr>
                                         <tr>
                                            <td colspan="3" class="" style="padding: 0">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="12" style="width: 100%">
                                                                 <p class="alinear-centro letra-componente  table-border">
                                                                 ¿DE LAS SIGUIENTES ENFERMEDADES HA PADECIDO ALGUNA FRECUENTEMENTE?
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                      
                                                       
                                             <tr>
                                               <td colspan="2" class="table-border alinear-centro" >
                                                        <div class="box">
                                                            <table class="tabla-componente">
                                                                <tbody>
                                                        <tr>
                                                           <td class="alinear-centro"
                                                                    @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->anemia) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>

                                                            
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 15%">
                                                               &nbsp;ANEMIA
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                              @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->asma) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                         
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 15%">
                                                               &nbsp;ASMA
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                              @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->gripe) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                            
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 15%">
                                                               &nbsp;GRIPE
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                              @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->presion_alta) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                     
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 15%">
                                                              &nbsp;PRESIÓN ALTA
                                                          
                                                            </td>
                                                            <td class="alinear-centro" 
                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->epilepsia) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                   
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 15%">
                                                             &nbsp;EPILEPSIA
                                                          
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                           <td class="alinear-centro" 
                                                            @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->gastritis) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                        
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 15%">
                                                               &nbsp;GASTRITIS
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                              @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->espalda) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                        
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 15%">
                                                              &nbsp;ESPALDA
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                              @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->migrania) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:10%;"
                                                                                                @endif
                                                                                                @endif>
                                                            
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 15%">
                                                              &nbsp;MIGRAÑA
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                              @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->presion_baja) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                        
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 15%">
                                                              &nbsp;PRESIÓN BAJA
                                                          
                                                            </td>
                                                            <td class="alinear-centro" 
                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->problemas_cardiacos) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                      
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width:15%">
                                                             &nbsp;PROBLEMAS CARDIACOS
                                                          
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                           <td class="alinear-centro" 
                                                            @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->ulcera) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                            
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                               &nbsp;ULCERA
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                                @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->artritis) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                                
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                              &nbsp;ARTRITIS
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                                @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->bronquitis) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                            
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                              &nbsp;BRONQUITIS
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                                @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->enfermedad->rinon) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                          
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                              &nbsp;RIÑON
                                                          
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
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
                                            <td colspan="3" class="">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="10" style="width: 100%" class="table-border">
                                                                 <p class="alinear-centro letra-componente  table-border">
                                                                 ¿CUÁL DE LOS SIGUIENTES SÍNTOMAS FÍSICOS HA PADECIDO EN LOS ÚLTIMOS SEIS MESES?
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    <tr>            
                                        <td colspan="3">
                                            <div class="box table-border">
                                        
                                                <table class="auto-width">
                                                    <tbody>


                                                        <tr>
                                                           <td class="alinear-centro" 
                                                            @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->padecimientos->acidez) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                            
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                               &nbsp;ACIDEZ
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                               @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->padecimientos->ansiedad) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>

                                                            </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                               &nbsp;ANSIEDAD
                                                          
                                                            </td>
                                                             <td class="alinear-centro"
                                                                @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->padecimientos->dolor_cabeza) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif> 

                                                                
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                              &nbsp;DOLOR DE CABEZA
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                               @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->padecimientos->estrenimiento) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif> 

                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                              &nbsp;ESTREÑIMIENTO
                                                          
                                                            </td>
                                                           
                                                         </tr>
                                                         <tr>
                                                           <td class="alinear-centro" 
                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->padecimientos->insomnio) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif> 

                                                                
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                             &nbsp;INSOMNIO
                                                          
                                                            </td>
                                                             <td class="alinear-centro"
                                                               @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->padecimientos->escalofrios) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>


                                                      
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                             &nbsp;ESCALOFRIOS
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                              @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->padecimientos->manos_temblorosas) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:10%;"
                                                                                                @endif
                                                                                                @endif>

                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                             &nbsp;MANOS TEMBLO.
                                                          
                                                            </td>
                                                             <td class="alinear-centro" 
                                                               @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->padecimientos->alergia) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>

                                                            
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 10%">
                                                             &nbsp;ALERGIA
                                                          
                                                            </td>
                                                            <td class="alinear-centro table-border letra-componente" style="width: 10%">
                                                                TIPO:
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente" style="width: 25%">
                                                              
                                                               {{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->padecimientos->tipo : '' }}
                                                            
                                                          
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                           <td class="alinear-centro"
                                                            @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->padecimientos->debilidad) != ''  )
                                                                                                style="background-color:#FF8000; width:10%;"
                                                                                                @else
                                                                                                style="width:10%;"
                                                                                                @endif
                                                                                                @endif>
                                                            
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 20%">
                                                              &nbsp;DEBILIDAD
                                                          
                                                            </td>
                                                             <td class="alinear-centro"
                                                               @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->padecimientos->mareos) != ''  )
                                                                                                style="background-color:#FF8000; width:10%;"
                                                                                                @else
                                                                                                style="width:10%;"
                                                                                                @endif
                                                                                                @endif>

                                                            
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 20%">
                                                             &nbsp;MAREOS
                                                          
                                                            </td>
                                                             <td class="alinear-centro"
                                                              @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->padecimientos->taquicardia) != ''  )
                                                                                                style="background-color:#FF8000; width:10%;"
                                                                                                @else
                                                                                                style="width:10%;"
                                                                                                @endif
                                                                                                @endif>
                                                                
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente table-border" style="width: 20%">
                                                             &nbsp;TAQUICARDIA
                                                          
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                 
                                                        <tr> 
                                                            <td  colspan="4" class="table-border" style="width:40%">
                                                                     <p class="alinear-centro letra-componente">
                                                                       ¿SE ENCUENTRA BAJO TRATAMIENTO MEDICO?
                                                                     </p>
                                                            </td>
                                                            <td 
                                                              @if( $estudio->formatoGnp)
                                                                    @if( trim( $estudio->formatoGnp->padecimientos->tratamiento_medico ) != ''  )
                                                                                    style="background-color:#FF8000; width:5%;"
                                                                                    @else
                                                                                    style="width:5%;"
                                                                                    @endif
                                                                                    @endif>
                                                             
                                                                </td>
                                                             <td class="alinear-derecha table-border letra-componente" style="width: 15%">
                                                                    PADECIMIENTO:
                                                               </td>
                                                                <td colspan="6" class="alinear-izquierda letra-componente table-border" style="width: 40%">
                                                               <p class="border-footer-field">
                                                               &nbsp;{{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->padecimientos->tratamiento_medico_desc : '' }}
                                                               </p>
                                                          
                                                            </td>

                                                        </tr>
                                                          <tr> 
                                                            <td  colspan="4" class="table-border" style="width:40%">
                                                                     <p class="alinear-derecha letra-componente">
                                                                      ¿TOMA ALGÚN MEDICAMENTO CONTROLADO?
                                                                     </p>
                                                            </td>
                                                            <td   
                                                            @if( $estudio->formatoGnp)
                                                                    @if( trim( $estudio->formatoGnp->padecimientos->medicamento_controlado ) != ''  )
                                                                                    style="background-color:#FF8000; width:5%;"
                                                                                    @else
                                                                                    style="width:5%;"
                                                                                    @endif
                                                                                    @endif>
                                                             
                                                                </td>
                                                             <td class="alinear-derecha letra-componente table-border" style="width: 15%">
                                                                    MEDICAMENTO:
                                                               </td>
                                                                <td colspan="6" class="alinear-izquierda letra-componente table-border" style="width: 40%">
                                                               <p class="border-footer-field">
                                                               &nbsp;{{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->padecimientos->medicamento_controlado_desc : '' }}
                                                               </p>
                                                          
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                          </tr>
                                       
                                        <tr>
                                            <td colspan="3" class=" table-border">
                                                <table class="auto-width">
                                                    <tbody>
                                                       <tr>
                                                           <td  colspan="3" class="alinear-centro letra-componente negrita">
                                                           ¿ALGUNO DE TUS FAMILIARES PADECE Ó HAN PADECIDO ALGUNA ENFERMEDAD CRONICODEGENERATIVA: DIABETES, CANCER, CARDIACAS, RESPIRATORIAS O CEREBRALES?
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td style="width: 30%" class="alinear-centro letra-componente negrita">NOMBRE</td>
                                                           <td style="width: 30%" class="alinear-centro letra-componente negrita">PARENTESCO</td>
                                                           <td style="width: 30%" class="alinear-centro letra-componente negrita">PADECIMIENTO</td>

                                                       </tr>
                                                            @if( $estudio->formatoGnp)
                                                              @foreach ($estudio->formatoGnp->edoSalud as $indextrata =>$tratamiento)
                                                              
                                                                        <tr>
                                                                            <td class="letra-componente alinear-centro" style="width:30%;">
                                                                            {{ $tratamiento->nombre }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:30%;">
                                                                            {{ $tratamiento->parentesco }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:30%;">
                                                                             {{ $tratamiento->padecimiento }}
                                                                            </td>
                                                                          </tr>
                                                            @endforeach
                                                         @endif 
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
                                                            @if( $estudio->formatoGnp) 
                                                            @if( $estudio->formatoGnp->atencion->atencion == '1' )
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
                                                            @if( $estudio->formatoGnp) 
                                                            @if( $estudio->formatoGnp->atencion->atencion == '2' )
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
                                                             <td colspan="2" class="alinear-izquierda letra-componente " style="width: 41%">
                                                          ¿QUIÉN Y CUÁL ES EL PADECIMIENTO?
                                                          
                                                            </td>
                                                            <td colspan="8" class="alinear-izquierda letra-componente " style="width: 59%">
                                                            {{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->atencion->cual_padecimiento : '' }}
                                                          
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td colspan="3">
                                            <table class="auto-width">
                                                <tbody>

                                                     
                                                        <tr>
                                                            <td  colsapan="4" class="alinear-centro letra-componente  table-border " style="width: 40%">
                                                             EN CASO DE ACCIDENTE O EMERGENCIA, LLAMAR A:
                                                            </td>
                                                             <td colspan="2" class="alinear-centro letra-componente  table-border " style="width: 20%">
                                                             <p class="border-footer"> 
                                                            {{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->atencion->accidente_llamar : '' }}
                                                              </p>
                                                            </td>
                                                            <td  colsapan="2" class="alinear-centro letra-componente  table-border" style="width: 20%">
                                                            TELEFONO:
                                                            </td>
                                                             <td colspan="2" class="alinear-centro letra-componente table-border " style="width: 20%">
                                                             <p class="border-footer">
                                                            {{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->atencion->accidente_telefono : '' }}
                                                          </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                                       
                                                  
                                        <tr>
                                         <td colspan="3" class="table-border" >
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                          </tr>
                                         <tr>
                                            <td colspan="3" class="" style="padding: 0">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="8" class="table-border">
                                                                <p class="alinear-centro titulo-componente-principal table-border">
                                                                   HABITOS Y COSTUMBRES
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                           <td class="alinear-centro letra-componente negrita"  style="width: 60%"><strong>TIPO</strong></td>
                                                           <td class="alinear-centro letra-componente negrita"  style="width: 5%"><strong>SI</strong></td>
                                                           <td class="alinear-centro letra-componente negrita"  style="width: 5%"><strong>NO</strong></td>
                                                           <td class="alinear-centro letra-componente negrita"  style="width: 20%"><strong>CANTIDAD</strong></td>
                                                           <td class="alinear-centro letra-componente negrita"  style="width: 5%"><strong>DIARIO</strong></td>
                                                           <td class="alinear-centro letra-componente negrita"  style="width: 5%"><strong>SEMANAL</strong></td>
                                                           <td class="alinear-centro letra-componente negrita"  style="width: 5%"><strong>QUINCENAL</strong></td>
                                                           <td class="alinear-centro letra-componente negrita"  style="width: 5%"><strong>OCASIONAL</strong></td>
                                                        </tr>
                                                        <tr>
                                                              <td class="alinear-izquierda letra-componente"  style="width: 60%">¿INGIERE BEBIDAS ALCOHOLICAS?</td>
                                                           <td class="alinear-centro"  
                                                           @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_bebida == '1' )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif

                                                          </td>
                                                           <td class="alinear-centro"  @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_bebida == '2' )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif
                                                           </td>
                                                           <td class="alinear-centro letra-componente letra-componente"  style="width: 20%">
                                                           {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->habitoCostumbre->tipo_bebida_cantidad: '' }}</td>
                                                           <td class="alinear-centro"  
                                                           @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_bebida_frecuencia == '1' )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif
                                                          

                                                           </td>
                                                           <td class="alinear-centro"   @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_bebida_frecuencia == '2' )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif
                                                           </td>
                                                           <td class="alinear-centro"   @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_bebida_frecuencia == '3' )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif
                                                           </td>
                                                           <td class="alinear-centro"  @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_bebida_frecuencia == '4' )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif
                                                          </td>
                                                        </tr>

                                                         <tr>
                                                           <td class="alinear-izquierda letra-componente"  style="width: 60%">¿ACOSTUMBRA FUMAR?</td>
                                                           <td class="alinear-centro" 
                                                           @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_fuma == '1'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif
                                                            

                                                           </td>
                                                           <td class="alinear-centro"  @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_fuma == '2'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif
                                                           </td>
                                                           <td class="alinear-centro letra-componente letra-componente"  style="width: 20%">                                                        {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->habitoCostumbre->tipo_fuma_cantidad: '' }}
                                                   </td>
                                                           <td class="alinear-centro" 
                                                           @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_fuma_frecuencia == '1'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif

                                                          </td>
                                                           <td class="alinear-centro"  @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_fuma_frecuencia == '2'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif
                                                          </td>
                                                           <td class="alinear-centro" @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_fuma_frecuencia == '3'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif
                                                           </td>
                                                           <td class="alinear-centro"  @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_fuma_frecuencia == '4'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif
                                                          </td>
                                                        </tr>

                                                         <tr>
                                                           <td class="alinear-izquierda letra-componente"  style="width: 60%">MEDICAMENTO CONTROLADO</td>
                                                           <td class="alinear-centro"  
                                                           @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_antidepresivos == '1'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif                                                     
                                                           </td>
                                                           <td class="alinear-centro"  s  @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_antidepresivos == '2'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif   
                                                           </td>
                                                           <td class="alinear-centro letra-componente"  style="width: 20%">                                                        {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->habitoCostumbre->tipo_antidepresivos_cantidad: '' }}
                                                          </td>
                                                           <td class="alinear-centro"  
                                                             @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_antidepresivos_frecuencia == '1'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif                                                              
                                                          </td>
                                                           <td class="alinear-centro"  @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_antidepresivos_frecuencia == '2'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif           
                                                          </td>
                                                           <td class="alinear-centro"  @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_antidepresivos_frecuencia == '3'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif           
                                                         </td>
                                                           <td class="alinear-centro"  @if( $estudio->formatoGnp) 
                                                           @if( $estudio->formatoGnp->habitoCostumbre->tipo_antidepresivos_frecuencia == '4'  )
                                                            style='background-color:#FF8000; width: 5%'
                                                            @else
                                                                style=' width: 5%'
                                                             
                                                           @endif
                                                           @endif           
                                                          </td>
                                                        </tr>
                                                         <tr>
                                                           <td class="alinear-izquierda letra-componente"  style="width: 60%">¿QUÉ MEDICAMENTO?</td>
                                                           <td class="alinear-izquierda letra-componente" colspan="3"  style="width: 5%">                                                        
                                                              {{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->habitoCostumbre->que_medicamento: '' }}
                                                           </td>
                                                            <td class="alinear-izquierda letra-componente"  style="width: 40%">¿Qué dosis toma?</td>
                                                            <td class="alinear-izquierda letra-componente" style="width: 5%">                                                        
                                                              {{ isset( $estudio->formatoGnp ) ? $estudio->formatoGnp->habitoCostumbre->medicamento_dosis: '' }}
                                                           </td>
                                                           <td class="alinear-izquierda letra-componente"  style="width: 40%">¿QUÉ FRECUENCIA?</td>
                                                           <td class="alinear-izquierda letra-componente"   style="width: 5%">                                                        
                                                                @if($estudio->formatoGnp ) 
                                                                @if($estudio->formatoGnp->habitoCostumbre->medicamento_frecuencia=='1')
                                                                   Diario
                                                                @endif
                                                                @if($estudio->formatoGnp->habitoCostumbre->medicamento_frecuencia=='2')
                                                                   Semanal
                                                                @endif
                                                                @if($estudio->formatoGnp->habitoCostumbre->medicamento_frecuencia=='3')
                                                                  Quincenal
                                                                @endif
                                                                @if($estudio->formatoGnp->habitoCostumbre->medicamento_frecuencia=='4')
                                                                  Ocasional
                                                                @endif
                                                                 @if($estudio->formatoGnp->habitoCostumbre->medicamento_frecuencia=='5')
                                                                  N/A
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
                                            <td colspan="3" class="" style="width: 100%">
                                                <table class="auto-width">
                                                    <tbody>
                                                     <tr colspan="3" class="table-border"></tr>
                                                       <tr>
                                                           <td class=" table-border" style="width: 30%">
                                                            <p class="justificar letra-componente">
                                                           ¿REALIZA ALGUNA ACTIVIDAD? 
                                                           </p>
                                                           </td>
                                                           <td colspan="9" class="table-border" style="width: 70%">
                                                            
                                                                <table class="auto-width">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="alinear-centro" 
                                                                            @if( $estudio->formatoGnp) 
                                                                           @if( $estudio->formatoGnp->habitoCostumbre->realiza_actividad_fisica == '1' )
                                                                            style='background-color:#FF8000; width: 10%'
                                                                            @else
                                                                                style=' width: 10%'
                                                                             
                                                                           @endif
                                                                           @endif>                                                                     
                                                                           </td>
                                                                           <td class="table-border"  style="width: 11%">                 
                                                                           <p class="alinear-izquierda letra-componente">
                                                                                SI
                                                                            </p>
                                                                           </td>
                                                                            <td class="alinear-centro"   @if( $estudio->formatoGnp) 
                                                                           @if( $estudio->formatoGnp->habitoCostumbre->realiza_actividad_fisica == '2' )
                                                                            style='background-color:#FF8000; width: 10%'
                                                                            @else
                                                                                style=' width: 10%'
                                                                             
                                                                           @endif
                                                                           @endif >   
                                                                           </td>
                                                                           <td class=" table-border"  style="width: 70%">      <p class="alinear-izquierda letra-componente">
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
                                                             <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>



                                                    </tr>
                                                        <tr>
                                                           <td   class="table-border " style="width: 30%">
                                                            <p class="justificar letra-componente">
                                                           TIPO DE ACTIVIDAD:
                                                           </p>
                                                           </td>
                                                            <td class="alinear-centro"  
                                                                @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->habitoCostumbre->actividad_social) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif>
                                                           </td>
                                                           <td class="alinear-izquierda table-border letra-componente" style="width: 5%" >                                                           &nbsp;SOCIAL
                                                           </td>
                                                            <td class="alinear-izquierda"  
                                                              @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->habitoCostumbre->actividad_deportiva) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif  
                                                                                                @endif>                                                        
                                                           </td>
                                                           <td class="alinear-izquierda table-border letra-componente"  style="width: 5%">                                                          &nbsp;DEPORTIVA
                                                           </td>
                                                            <td class="alinear-izquierda"  
                                                            @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->habitoCostumbre->actividad_religiosa) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif
                                                                                                @endif> 
                                                                                                                    
                                                           </td>
                                                           <td class="alinear-izquierda table-border letra-componente"  style="width: 5%">                                                         &nbsp;RELIGIOSA
                                                           </td>
                                                            <td class="alinear-izquierda" 
                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->habitoCostumbre->actividad_cultural) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif 
                                                                                                @endif>
                                                                                                                    
                                                           </td>
                                                            <td class="alinear-izquierda table-border letra-componente"  style="width: 5%">                                                        &nbsp;CULTURAL
                                                           </td>
                                                       </tr>
                                                                  
                                                          <tr>
                                                        <td colspan="3" class="table-border">
                                                             <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>
                                                    </tr>
                                                        <tr>
                                                           <td class="alinear-izquierda letra-componente table-border " style="width: 30%">
                                                            ¿CUÁL Ó CUÁLES?
                                                           </td>
                                                          
                                                           <td class="alinear-izquierda table-border letra-componente" colspan="8" style="width: 70%">
                                                                    <p class="border-footer">
                                                                    {{ isset( $estudio->formatoGnp) ? $estudio->formatoGnp->habitoCostumbre->tipo_actividad_cuales: '' }}
                                                                    </p>
                                                          
                                                           </td>
                                                       </tr>
                                                               <tr>
                                                        <td colspan="3" class="table-border">
                                                             <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>
                                                    </tr>
                                                      
                                                            <tr>
                                                              <td   class=" table-border " style="width: 30%">
                                                               <p class="justificar letra-componente">
                                                           ¿CON QUÉ FRECUENCIA?
                                                           </p>
                                                           </td>
                                                            <td class="alinear-centro"  
                                                              @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->habitoCostumbre->actividad_diario) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif 
                                                                                                @endif> 

                                                           </td>
                                                           <td class="alinear-centro table-border letra-componente"  style="width: 5%"> DIARIO
                                                           </td>
                                                            <td class="alinear-centro" 
                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->habitoCostumbre->actividad_semanal) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif 
                                                                                                @endif>

                                                           </td>
                                                           <td class="alinear-centro table-border letra-componente"  style="width: 5%"> SEMANAL
                                                           </td>
                                                            <td class="alinear-centro"  
                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->habitoCostumbre->actividad_quincenal) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif 
                                                                                                @endif>

                                                           
                                                           </td>
                                                           <td class="alinear-centro table-border letra-componente"  style="width: 5%"> QUINCENAL
                                                           </td>
                                                            <td class="alinear-centro"  
                                                             @if( $estudio->formatoGnp)
                                                                                @if( trim( $estudio->formatoGnp->habitoCostumbre->actividad_mensual) != ''  )
                                                                                                style="background-color:#FF8000; width:5%;"
                                                                                                @else
                                                                                                style="width:5%;"
                                                                                                @endif 
                                                                                                @endif>

                                                          
                                                           </td>
                                                            <td class="alinear-centro table-border letra-componente"  style="width: 5%">MENSUAL
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
                                        </tr>

  <!--  AQUI ESTADO DE SALUD -->

<!-- ------------------------------------------------------- DISPONIBILIDAD -------------------------------------------- -->
 <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>
                                        </tr>
<tr>
                                            <td  colspan="3" style="width: 50" class="table-border">
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
                                                            <td class="alinear-centro table-border" style="width: 45%">
                                                                <table class="tabla-componente">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width: 45%" class="letra-componente alinear-izquierda">
                                                                                 
                                                                                     SI ESTA EMPLEADO ACTUALMENTE, ¿POR QUÉ DESEA CAMBIAR?
                                                                                                                                                      
                                                                            </td>
                                                                            <td style="width: 25%">
                                                                                 <p class="alinear-izquierda letra-componente" style="width:85%">
               {{ isset( $estudio->formatoGnp->disponible) ? $estudio->formatoGnp->disponible->empleado_actualmente: '' }}
                                                                                 </p>                                                                            
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 45%" class="letra-componente alinear-izquierda">
                                                                              
                                                                                     ¿ESTA DISPUESTO A VIAJAR?
                                                                                                                                                       
                                                                            </td>
                                                                            <td style="width: 25%">
                                                                                 <p class="alinear-izquierda letra-componente" style="width:85%">
                 {{ isset( $estudio->formatoGnp->disponible) ? $estudio->formatoGnp->disponible->disponible_viajar: '' }}
                                                                                 </p>                                                                            
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 45%" class="letra-componente alinear-izquierda">
                                                                             
                                                                                     ¿A CAMBIAR DE RESIDENCIA?
                                                                                                                                                      
                                                                            </td>
                                                                            <td > 
                                                                                 <p class="alinear-izquierda letra-componente" style="width:85%">
                 {{ isset( $estudio->formatoGnp->disponible) ? $estudio->formatoGnp->disponible->cambiar_residencia: '' }}  
                                                                                 </p>                                                                            
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 45%" class="letra-componente alinear-izquierda">
                                                                                 
                                                                                     ¿A PARTIR DE QUÉ FECHA PUEDE COMENZAR A TRABAJAR?
                                                                                                                                                            
                                                                            </td>
                                                                            <td style="width: 25%">
                                                                                 <p class="alinear-izquierda letra-componente" style="width:85%">
                  {{ isset( $estudio->formatoGnp->disponible) ? $estudio->formatoGnp->disponible->fecha_laboral: '' }}
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
                                                
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                                            <td style="width: 36.5%" class="alinear-izquierda letra-componente" >
                                                                                
                                                                                   ¿TIENE FAMILIARES TRABAJANDO EN ESTA EMPRESA?
                                                                                                                                                           
                                                                            </td>
                                                                            <td style="width: 10%" class="alinear-izquierda letra-componente">
                                                                             
                                                                                    @if( $estudio->formatoGnp)
                                                                                    @if( $estudio->formatoGnp->disponible->tiene_familiares == '1' )
                                                                                    SI
                                                                                    @else
                                                                                    NO
                                                                                    
                                                                                    @endif
                                                                                    @endif
                                                                                                                                                      
                                                                            </td>
                                                                         
                                                                            
                                                                             <td style="width: 10%" class="alinear-centro letra-componente">
                                                                               NOMBRE:                                                                          
                                                                            </td>
                                                                            <td style="width: 25%" class="alinear-izquierda letra-componente"> 
                                                                             @if( $estudio->formatoGnp)
                                                                                    @if( $estudio->formatoGnp->disponible->tiene_familiares == '2' )
                                                                                     N/A
                                                                                     @else
                                                                                   
                                                                                {{ $estudio->formatoGnp->disponible->nombre_familiar }}
                                                                          
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
                                         <!---------------------------------------   REFERENCIAS LABORALES ----------------------------------------- -->
                                   @if( $estudio->formatoGnp)
                                                              @foreach ($estudio->formatoGnp->referenciaLaborales  as $index_referencia_laboral=> $referencias_laborales)
                                                              <tr>
                                                        <td colspan="3" class="table-border">
                                                         <span style=" display: inline-block;height: 15px;"></span>
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
                                                                                                    <td style="width: 17%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                            EMPRESA
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td colspan="2">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                            {{ $referencias_laborales->empresa_laboral }}
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                             TELÉFONO
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td colspan="2">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                          {{ $referencias_laborales->telefono_laboral }}
                                                                                                         </p>
                                                                                                    </td>
                                                                                                </tr>

                                                                                                <tr>
                                                                                                    <td style="width: 17%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                             GIRO
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td colspan="2">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                          {{ $referencias_laborales->giro_laboral }} 
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                             CELULAR
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td colspan="2">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                          {{ $referencias_laborales->celular_laboral }}  
                                                                                                         </p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="width: 15%">
                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                             DIRECCIÓN
                                                                                         </p>
                                                                                    </td>
                                                                                    <td colspan="5" style="width: 85%">
                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                        {{ $referencias_laborales->direccion_laboral }}  
                                                                                         </p>                                                                                    
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="6" class="table-border" style="width: 100%;">
                                                                                        <table class="tabla-componente">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td style="width: 14%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                             PUESTO INICIAL
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td style="width: 20%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                            {{ $referencias_laborales->puesto_inicial_laboral }}  
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td style="width: 15%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                             SUELDO INICIAL
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td style="width: 15%">
                                                                                                         <p class="alinear-derecha letra-componente">$ 
                                                                                                          {{ number_format( $referencias_laborales->sueldo_inicial_laboral,2) }}  
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td style="width: 15%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                             FECHA INGRESO
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td style="width: 15%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                            {{ $referencias_laborales->fecha_ingreso_laboral }} 
                                                                                                         </p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="width: 14%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                             PUESTO FINAL
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td style="width: 20%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                            {{ $referencias_laborales->ultimo_puesto_laboral }} 
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td style="width: 15%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                             SUELDO FINAL
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td style="width: 15%">
                                                                                                         <p class="alinear-derecha letra-componente">
                                                                                                         $
                                                                                                        {{ number_format( $referencias_laborales->sueldo_final_laboral,2) }} 
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td style="width: 15%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                             FECHA EGRESO
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td style="width: 15%">
                                                                                                         <p class="alinear-izquierda letra-componente">
                                                                                                        {{ $referencias_laborales->fecha_egreso_laboral }} 
                                                                                                         </p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="width: 33.33%">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             NOMBRE DEL JEFE INMEDIATO
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td colspan="2" style="width: 33.33%">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             PUESTO,  ÁREA Y DEPARTAMENTO
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td colspan="2" style="width: 33.33%">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             TIEMPO QUE DEPENDIÓ DEL JEFE INMEDIATO
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                </tr> 
                                                                                <tr>
                                                                                    <td colspan="2" style="width: 33.33%">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                          {{ $referencias_laborales->nombre_jinmediato_laboral }} 
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td colspan="2" style="width: 33.33%">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                          {{ $referencias_laborales->jpuesto_laboral }} 
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td colspan="2" style="width: 33.33%">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                          {{ $referencias_laborales->tiempo_dependio_laboral }} 
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                </tr>   
                                                                                <tr>
                                                                                    <td colspan="6">
                                                                                         <p class="justificar letra-componente">
                                                                                            PRINCIPALES FUNCIONES: {{ $referencias_laborales->principales_funciones_laboral }}
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
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>
                                        </tr>
                                 <!--  -------------------aqui -->
                                         <tr>
                                            <td colspan="3" class="table-border">
                                                <tr>
                                                    <td class="table-border"  colspan="3" >
                                                   
                                                        <table class="tabla-componente">
                                                            <tbody>
                                                                <tr>
                                                                   <tr>
                                                                     <td class="table-border alinear-centro letra-componente negrita" >
                                                                      EVALUACIÓN DE DESEMPEÑO
                                                                      </td>
                                                                    </tr>
                                                                    <td   class="alinear-centro table-border" >
                                                                        <table class="auto-width">
                                                                            <tbody class="alinear-centro"> 

                                                                                <tr>
                                                                                    <td  style="width: 75%">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             
                                                                                         </p>
                                                                                    </td>
                                                                                    <td style="width: 5%" class="negrita " >
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             EXCELENTE 

                                                                                         </p>
                                                                                    </td>
                                                                                    <td style="width: 5%" class="negrita " >
                                                                                         <p class="alinear-centro letra-componente">
                                                                                            BUENO
                                                                                         </p>
                                                                                    </td >
                                                                                    <td style="width: 5%" class="negrita ">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                            REGULAR
                                                                                         </p>
                                                                                    </td>
                                                                                    <td style="width: 5%" class="negrita " >
                                                                                         <p class="alinear-centro letra-componente">
                                                                                            MALO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td style="width: 5%" class="negrita " >
                                                                                         <p class="alinear-centro letra-componente">
                                                                                            PÉSIMO 
                                                                                         </p>
                                                                                    </td>
                                                                                  </tr>
                                                                                     <tr>
                                                                               
                                                                           <td  style="width: 75%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                       ASISTENCIA
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td 
                                                                                     @if( $referencias_laborales->asistencia_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                         @endif>
                                                                            
                                                                                    </td>
                                                                                    <td
                                                                                    @if( $referencias_laborales->asistencia_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                         @endif>
                                                                                   
                                                                                    </td>
                                                                                    <td 
                                                                                    @if( $referencias_laborales->asistencia_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                         @endif>
                                                                                    </td>
                                                                                    <td 
                                                                                    @if( $referencias_laborales->asistencia_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                         @endif>
                                                                                    </td>
                                                                                  
                                                                                    <td  @if( $referencias_laborales->asistencia_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                         @endif>
                                                                                  
                                                                                    </td>
                                                                </tr>
                                                       <tr>
                                                                               
                                                                           <td  style="width: 75%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                         PUNTUALIDAD
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td 
                                                                                     @if( $referencias_laborales->puntualidad_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                         @endif>
                                                                            
                                                                                    </td>
                                                                                    <td
                                                                                    @if( $referencias_laborales->puntualidad_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                         @endif>
                                                                                   
                                                                                    </td>
                                                                                    <td 
                                                                                    @if( $referencias_laborales->puntualidad_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                         @endif>
                                                                                    </td>
                                                                                    <td 
                                                                                    @if( $referencias_laborales->puntualidad_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                         @endif>
                                                                                    </td>
                                                                                  
                                                                                    <td  @if( $referencias_laborales->puntualidad_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                         @endif>
                                                                                  
                                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                               
                                                                                    <td  style="width: 75%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                        HONRADEZ
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td 
                                                                                      @if( $referencias_laborales->honradez_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>

                                                                            
                                                                                 
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->honradez_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td
                                                                                     @if( $referencias_laborales->honradez_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td 
                                                                                     @if( $referencias_laborales->honradez_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td
                                                                                     @if( $referencias_laborales->honradez_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                </tr>
                                                                    <tr>
                                                                               
                                                                                    <td style="width: 75%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                        RESPONSABILIDAD
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td 
                                                                                    @if( $referencias_laborales->responsabilidad_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                            
                                                                                  
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->responsabilidad_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->responsabilidad_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->responsabilidad_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->responsabilidad_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                </tr>
                                                                 <tr>
                                                                               
                                                                                    <td style="width: 75%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                        DISPONIBILIDAD
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td  @if( $referencias_laborales->disponibilidad_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                            
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->disponibilidad_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->disponibilidad_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->disponibilidad_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->disponibilidad_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                                                                                                               
                                                                                       
                                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                               
                                                                                    <td  style="width: 20%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                        COMPROMISO CON LA EMPRESA
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td @if( $referencias_laborales->compromiso_empresa_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                            
                                                                                  
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->compromiso_empresa_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->compromiso_empresa_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->compromiso_empresa_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->compromiso_empresa_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                    </td>
                                                                </tr>
                                                                    <tr>
                                                                               
                                                                                    <td style="width: 20%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                        INICIATIVA
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td  @if( $referencias_laborales->iniciativa_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                  
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->iniciativa_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->iniciativa_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->iniciativa_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->iniciativa_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                                    </td>
                                                                </tr>
                                                                         <tr>
                                                                               
                                                                                    <td style="width: 75%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                        CALIDAD DE TRABAJO
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td @if( $referencias_laborales->calidad_trabajo_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif> 
                                                                            
                                                                                 
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->calidad_trabajo_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->calidad_trabajo_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->calidad_trabajo_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->calidad_trabajo_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                </tr>
                                                               
                                                                         <tr>
                                                                               
                                                                                    <td  style="width: 75%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                        TRABAJO EN EQUIPO
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td  @if( $referencias_laborales->trabajo_equipo_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                            
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->trabajo_equipo_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->trabajo_equipo_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->trabajo_equipo_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->trabajo_equipo_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                </tr>
                                                                                <tr>
                                                                               
                                                                                    <td style="width: 75%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                        TRABAJO BAJO PRESIÓN LABORAL
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td 
                                                                                    @if( $referencias_laborales->trabajo_bajo_presión_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                            
                                                                                  
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->trabajo_bajo_presión_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    <td  @if( $referencias_laborales->trabajo_bajo_presión_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->trabajo_bajo_presión_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td  @if( $referencias_laborales->trabajo_bajo_presión_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                </tr>
                                                                                 <tr>
                                                                               
                                                                                    <td style="width: 75%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                        TRATO CON EL JEFE
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td 
                                                                                     @if( $referencias_laborales->trato_jefe_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                            
                                                                                    </td>
                                                                                    <td   @if( $referencias_laborales->trato_jefe_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td   @if( $referencias_laborales->trato_jefe_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td   @if( $referencias_laborales->trato_jefe_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td   @if( $referencias_laborales->trato_jefe_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                </tr>
                                                                 
                                                                                 <tr>
                                                                               
                                                                                    <td style="width: 20%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                        TRATO CON EL COMPAÑERO
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td @if( $referencias_laborales->trato_compañeros_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                            
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->trato_compañeros_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->trato_compañeros_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->trato_compañeros_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->trato_compañeros_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                </tr>
                                                         
                                                                                
                                                                       
                                                                                 <tr>
                                                                               
                                                                                    <td style="width: 20%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                       PRODUCTIVIDAD/CAPACIDAD
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td @if( $referencias_laborales->productividad_capacidad_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                            
                                                                                   
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->productividad_capacidad_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->productividad_capacidad_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->productividad_capacidad_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->productividad_capacidad_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                </tr>
                                                                          
                                                                      <tr>
                                                                               
                                                                                    <td  style="width: 20%">
                                                                                      <p class="alinear-izquierda letra-componente">
                                                                                       LIDERAZGO
                                                                                      </p>
                                                                                    </td>
  
                                                                                    <td @if( $referencias_laborales->liderazgo_laboral == '1' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                            
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->liderazgo_laboral == '2' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->liderazgo_laboral == '3' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->liderazgo_laboral == '4' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
                                                                                        @endif>
                                                                                    </td>
                                                                                    <td @if( $referencias_laborales->liderazgo_laboral == '5' )
                                                                                        style="background-color:#FF8000;width: 5%;"
                                                                                        @else
                                                                                        style="width: 5%;"
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
                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>
                                                     </tr> 


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
                                                                         <p class="alinear-centro letra-componente" ">
                                                                             MOTIVO DE SEPARACIÓN
                                                                         </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%">
                                                                         <p class="alinear-centro letra-componente">
                                                                            {{ $referencias_laborales->tipo_contrato_laboral }} 

                                                                         </p>
                                                                    </td>
                                                                    <td style="width: 50%">
                                                                         <p class="alinear-centro letra-componente" >
                                                                             {{ $referencias_laborales->motivo_separacion_laboral }}
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
                                                <tr>
                                                    <td  colspan="3" class="table-border">
                                                        <table class="tabla-componente">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 33%">
                                                                         <p class="alinear-izquierda letra-componente ">
                                                                             ¿EXISTE ALGÚN ADEUDO?
                                                                         </p>
                                                                    </td>
                                                                    <td style="width: 33%">
                                                                         <p class="alinear-izquierda letra-componente ">
                                                                             ¿PERTENECIÓ A ALGÚN SINDICATO?
                                                                         </p>
                                                                    </td>
                                                                    <td style="width: 33%">
                                                                         <p class="alinear-izquierda letra-componente ">
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
                                                                                    @if($referencias_laborales->adeudo_laboral == '1')
                                                                                                                    style="background-color:#FF8000;width:40%"
                                                                                                                    @else
                                                                                                                    style="width:40%"
                                                                                                                    @endif>
                                                                                  
                                                                                    </td>
                                                                                    <td class="table-border" style="width: 10%">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                          SI
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="alinear-centro letra-componente"
                                                                                    @if($referencias_laborales->adeudo_laboral == '2')
                                                                                                                    style="background-color:#FF8000;width:20%"
                                                                                                                    @else
                                                                                                                    style="width:20%"
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
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="alinear-centro letra-componente"
                                                                                     @if($referencias_laborales->sindicato_laboral == '1')
                                                                                                                    style="background-color:#FF8000;width:20%"
                                                                                                                    @else
                                                                                                                    style="width:20%"
                                                                                                                    @endif>
                                                                                         
                                                                                  
                                                                                    </td>
                                                                                    <td class="table-border">
                                                                                         <p class="alinear-centro letra-componente" style="width: 10%">
                                                                                              SI
                                                                                         </p>
                                                                                    </td>
                                                                                    <td  class="alinear-centro letra-componente"
                                                                                    @if($referencias_laborales->sindicato_laboral == '2')
                                                                                                                    style="background-color:#FF8000;width:20%"
                                                                                                                    @else
                                                                                                                    style="width:20%"
                                                                                                                    @endif>
                                                                                    </td>
                                                                                     <td class="table-border">
                                                                                         <p class="alinear-centro letra-componente" style="width: 10%">
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
                                                                                    @if($referencias_laborales->contrataria_laboral == '1')
                                                                                                                    style="background-color:#FF8000;width:20%"
                                                                                                                    @else
                                                                                                                    style="width:20%"
                                                                                                                    @endif>
                                                                                
                                                                                    </td>
                                                                                    <td class="table-border">
                                                                                         <p class="alinear-centro letra-componente" style="width: 10%">
                                                                                              SI
                                                                                         </p>
                                                                                    </td>
                                                                                     <td class="alinear-centro letra-componente" 
                                                                                      @if($referencias_laborales->contrataria_laboral == '2')
                                                                                                                    style="background-color:#FF8000;width:20%"
                                                                                                                    @else
                                                                                                                    style="width:20%"
                                                                                                                    @endif>
                                                                                  </td>
                                                                                   <td class="table-border">
                                                                                         <p class="alinear-centro letra-componente" style="width: 10%">
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
                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>
                                        </tr>
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
                                                            {{ $referencias_laborales->observaciones  }}
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
                                                <tr>
                                                    <td  colspan="3" class="table-border" style="width: 100%">
                                                        <table class="tabla-componente" >
                                                            <tbody>
                                                                <tr>
                                                                     <td class="" style="width: 10%;">
                                                                                                    <p class="alinear-izquierda letra-componente">
                                                                                                        INFORMÓ
                                                                                                    </p>
                                                                                                </td>
                                                                    <td style="width: 40%">
                                                                         <p class="justificar letra-componente">
 {{ $referencias_laborales->informo_sobre_puesto_laboral}}  
                                                                         </p>
                                                                    </td>
                                                                    <td class="" style="width: 10%">
                                                                         <p class="alinear-centro letra-componente">
                                                                             PUESTO
                                                                         </p>
                                                                    </td>
                                                                    <td style="width: 40%">
                                                                         <p class="justificar letra-componente">
 {{ $referencias_laborales->puesto_informo_laboral}}   
                                                                         </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </td>
                                        </tr>
                                         


                                 
                                      @endforeach<!-- REFERENCIAS LABORALES END FOR -->
                                     @endif<!-- REFERENCIAS LABORALES END IF -->

                                        



     <!---------------------------------------   END REFERENCIAS LABORALES ----------------------------------------- -->
     <!---------------------------------------   END REFERENCIAS LABORALES ----------------------------------------- -->
      <tr>
                                                        <td colspan="3" class="table-border">
                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>
                                                     </tr>
   





        </tbody>

</table>
<script>
        window.print();
    </script>
</body>
</html>
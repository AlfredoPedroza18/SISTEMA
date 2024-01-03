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
                                                <th class="letra-componente alinear-centro">MES</th>
                                                <th class="letra-componente alinear-centro">DÍA</th>
                                                <th class="letra-componente alinear-centro">AÑO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="letra-componente alinear-centro">                                    
                                                    {{ $estudio->mes_visita }}                                    
                                                </td>
                                                <td class="letra-componente alinear-centro">                                    
                                                    {{ $estudio->dia_visita }}                                    
                                                </td>
                                                <td class="letra-componente alinear-centro">                                    
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
                                                <td class="letra-componente alinear-izquierda" style="width: 80%;">Metlife</td>
                                                
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
                                                  {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->encabezado->puesto: '' }}
                                                </td>

                                            </tr>
                                           
                                        </tbody>
                                    </table>
                            </td>
                            <td colspan="2" class="table-border">
                              <table class="table-border alinear-centro">                                        
                                        <tbody>
                                            <tr>
                                             <td  colspan="2" class="letra-componente alinear-centro">ESTATUS</td>
                                            </tr>
                                            <tr>
                                             <td colspan="2" class="letra-componente alinear-centro"  rowspan="3"
                                             @if( $estudio->formatoMetlife )
                                                @if( $estudio->formatoMetlife->encabezado->resultado_ese == '1' )
                                                    style="width: 20%;background-color:#499B61;color:white;"
                                                @elseif( $estudio->formatoMetlife->encabezado->resultado_ese == '2' )
                                                    style="width: 20%;background-color:#FF8000;color:white;"
                                                @else
                                                    style="width: 20%;background-color:#FF0000;color:white;"
                                                @endif
                                            @endif    
                                            >
                                            
                                                
                                                @if( $estudio->formatoMetlife )
                                                    @if( $estudio->formatoMetlife->encabezado->resultado_ese == '1' )
                                                        APTO
                                                    @elseif( $estudio->formatoMetlife->encabezado->resultado_ese == '2' )
                                                        APTO CON RESERVA
                                                    @else
                                                        NO APTO
                                                    @endif
                                                @endif
                                              {{-- isset( $estudio->resultado_final_ese ) ?  $estudio->resultado_final_ese->nombre : 'Sin resultado' --}}
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
                                 <span style=" display: inline-block;height: 15px;"></span>
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
                                                   {{ isset( $estudio->formatoMetlife ) ?  $estudio->formatoMetlife->encabezado->situacion_economica :'' }}
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
                                                 <p class="alinear-centro titulo-componente">
                                                     2. Escolaridad
                                                 </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="letra-componente justificar">
                                                      {{ isset( $estudio->formatoMetlife ) ?  $estudio->formatoMetlife->encabezado->escolaridad :'' }}
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
                                                 <p class="alinear-centro titulo-componente">
                                                     3. Trayectoria Laboral
                                                 </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="letra-componente justificar">
                                                     {{ isset( $estudio->formatoMetlife ) ?  $estudio->formatoMetlife->encabezado->trayectoria_laboral :'' }}
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
                                <table class="auto-width table-border">
                                    <tbody>
                                        <tr>
                                            <td class="">
                                                 <p class="alinear-centro titulo-componente table-border">
                                                     4. Valores calificados del candidato durante la aplicación del Estudio Socioeconómico
                                                 </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border">
                                                <table class="auto-width table-border">
                                                    <thead>
                                                        <tr>
                                                         
                                                            <th class="letra-componente alinear-centro negrita" style="width: 30%;">VALOR</th>  
                                                            <th class="letra-componente alinear-centro negrita" style="width: 10%;">BUENA</th>  
                                                            <th class="letra-componente alinear-centro negrita" style="width: 10%;">REGULAR</th>  
                                                            <th class="letra-componente alinear-centro negrita" style="width: 10%;">MALA</th>  
                                                            <th class="letra-componente alinear-centro negrita" style="width: 50%;">COMENTARIOS</th>  
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 10%;">
                                                                 DISPONIBILIDAD
                                                            </td>
                                                            <td class="alinear-centro"
                                                                @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_disponibilidad == '1' )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif>
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_disponibilidad==2 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif>
                                                            
                                                           
                                                            </td>
                                                            <td class="alinear-centro"
                                                            @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_disponibilidad==3 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif>
                                                            </td>
                                                            
                                                            <td class="letra-componente alinear-izquierda" rowspan="7" style="width: 50%;">
                                                                 {{ isset( $estudio->formatoMetlife ) ?  $estudio->formatoMetlife->encabezado->valor_calificado_comentario:'' }}
                                                            </td>
                                                        </tr>
                                                           <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 10%;">
                                                                 PUNTUALIDAD
                                                            </td>
                                                            <td class="alinear-centro"
                                                              @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_puntualidad==1 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif>
                                                           
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_puntualidad==2 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif>
                                                            
                                                           
                                                            </td>
                                                            <td class="alinear-centro"
                                                               @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_puntualidad==3 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 10%;">
                                                                 SERIEDAD
                                                            </td>
                                                            <td class="alinear-centro"
                                                            @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_seriedad==1 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                           
                                                            </td>
                                                            <td class="alinear-centro"
                                                            @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_seriedad==2 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                          
                                                           
                                                            </td>
                                                            <td class="alinear-centro"
                                                            @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_seriedad==3 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                          
                                                            </td>
                                                        </tr>
                                                              <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 10%;">
                                                                 ACTITUD
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_actitud==1 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_actitud==2 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_actitud==3 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                             </td>
                                                        </tr>
                                                              <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 10%;">
                                                                 CONFIABILIDAD
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_confiabilidad==1 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_confiabilidad==2 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                           </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_confiabilidad==3 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                              </td>
                                                        </tr>
                                                              <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 10%;">
                                                                 SEGURIDAD EN SI MISMO
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_seguridad==1 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                             </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_seguridad==2 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                            
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_seguridad==3 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                             </td>
                                                        </tr>
                                                              <tr>
                                                            <td class="letra-componente alinear-izquierda" style="width: 10%;">
                                                                 PRESENTACION
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_presentacion==1 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                            
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_presentacion==2 )
                                                                style="background-color:#FF8000; width:10%;"
                                                                @else
                                                                style="width:10%;"
                                                                @endif
                                                                @endif >
                                                           
                                                            </td>
                                                            <td class="alinear-centro"
                                                             @if( $estudio->formatoMetlife )
                                                                @if( $estudio->formatoMetlife->encabezado->valor_calificado_presentacion==3 )
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
                            <td colspan="3" class="table-border">
                                <div class="box">
                                    
                                    <p class="titulo-componente">
                                            REALIZÓ INVESTIGACIÓN:
                                    </p> 

                                    <p class="alinear-centro ">
                                        <p style="width:180px;">                                
                                        {{ Html::image( $estudio->ejecutivoPrincipal->first()->imagen_firma ,'',['style' => 'width:100%;height:auto;margin-left:270px;']) }}
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
                        {{-- ****************************************** INICIO DATOS GENERALES ****************************************** --}}
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
                                                    DATOS GENERALES
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border">
                                                <table  class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td  class="letra-componente alinear-izquierda " style="width:30%;">NOMBRE DE CANDIDATO:</td>
                                                            <td colspan="3" class="letra-componente alinear-izquierda " style="width:70%;">
                                                            <p> 
                                                                 {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
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
                                                            <td class="letra-componente alinear-izquierda " style="width:13%;">DOMICILIO:</td>
                                                            <td  colspan="3" class="letra-componente alinear-izquierda " style="width:87%;">
                                                                <p>
                                                            {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->domicilio : ''}}
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
                                                            <td class="letra-componente alinear-izquierda " style="width:13%;">N°. INT/EXT:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p> 
                                                                {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->num_int_ext: '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda " style="width:13%;">LUGAR DE NAC. :</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p>
                                                              {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->lugar_nac : '' }}
                                                              </p>
                                                            </td>
                                                            <td class="letra-componente alinear-izquierda " style="width:13%;">NACIONALIDAD:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p>
                                                             {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->nacionalidad : '' }}
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
                                                            <td class="letra-componente alinear-izquierda " style="width:13%;">COLONIA:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p>
                                                               {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->colonia : '' }}</p>
                                                           </td>
                                                            <td class="letra-componente alinear-izquierda " style="width:13%;">FECHA  DE NAC:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p>
                                                               {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->fecha_nac : '' }}</p>
                                                            </td>
                                                             <td class="letra-componente alinear-izquierda " style="width:13%;">PUESTO:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p>
                                                              {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->puesto : '' }}
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
                                                            <td class="letra-componente alinear-izquierda " style="width:13%;">C.P.:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p>
                                                              {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->cp : '' }}</p>
                                                           </td>
                                                            <td class="letra-componente alinear-izquierda " style="width:13%;">TIEMPO EN EL DOMICILIO:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p>
                                                              {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->tiem_dom : '' }}</p>
                                                           </td>
                                                             <td class="letra-componente alinear-izquierda " style="width:13%;">CELULAR:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p>
                                                               {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->celular : '' }}</p>
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
                                                            <td class="letra-componente alinear-izquierda " style="width:12.6%;">MUNICIPIO:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:52.4%;">
                                                            <p>
                                                              {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->municipio : '' }}</p>

                                                            </td>
                                                            <td class="letra-componente alinear-izquierda " style="width:13%;">TELÉFONO:</td>
                                                            <td class="letra-componente alinear-izquierda " style="width:20%;">
                                                            <p>
                                                             {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->telefono : '' }}  </p>
                                                            </td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="table-border">
                                                <table class="auto-width ">
                                                    <tbody>
                                                        <tr>
                                                            <td  class="letra-componente alinear-izquierda " style="width:38%;">
                                                                ENTRE QUE CALLES SE ENCUENTRA EL DOMICILIO:
                                                            </td>
                                                            <td class="letra-componente alinear-izquierda  " style="width:62%;">
                                                            <p>
                                                               {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->datosGenerales->entre_calles : '' }}  </p>
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
                       <!-- ------------------------------------------  DOCUMENTOS -------------------------------------------------- -->
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
                                            <td colspan="3" style="width: 100%;">
                                                <p class="alinear-centro titulo-componente-principal">
                                                    DOCUMENTACIÓN
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 25%;" class="letra-componente alinear-centro negrita">DOCUMENTO</td>
                                            <td style="width: 65%;" class="letra-componente alinear-centro negrita">No. DE CERTIFICADO</td>
                                            <td style="width: 10%;" class="letra-componente alinear-centro negrita">ORIGINAL/COPIA</td>
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
                                            <td style="width: 50%;">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16.6%;">AÑO:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16.6%;">
                                                                <p class="border-footer">
                                                              {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_ano : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16.6%;">FOJA:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16.6%;"><p class="border-footer">
                                                              {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_foja : '' }}
                                                            </p></td> 
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16.6%;">LIBRO:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16.6%;"><p class="border-footer">
                                                              {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_libro : '' }}
                                                            </p></td> 
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                             <td class="letra-componente alinear-izquierda" style="width: 25%;"> 
                                                {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_cotejo : '' }}
                                             </td>
                                           </tr>




                                           <tr>
                                                <td style="width: 25%;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda table-border">FOTOGRAFÍA EN FORMATO ELECTRÓNICO</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 50%;">
                                                 
                                                  {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->fotografia : '' }}
                                                 
                                                </td>
                                                 <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                    {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->fotografia_cotejo : '' }}
                                                 </td>
                                           </tr>


                                           <tr>
                                                <td style="width: 25%;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda table-border">IDENTIFICACIÓN OFICIAL VIGENTE</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="width: 50%;">
                                                  <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda table-border">Clave de elector:</td>
                                                            <td class="letra-componente alinear-izquierda table-border"><p class="border-footer">
                                                             {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->elector_clave: '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda table-border">OCR:</td>
                                                            <td class="letra-componente alinear-izquierda table-border"><p class="border-footer">
                                                              {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->elector_ocr: '' }}
                                                            </p></td>
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                                 <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->elector_cotejo : '' }}
                                              </td>
                                           </tr>



                                            <tr>
                                                <td style="width: 25%;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda table-border">CURP Ó CARTA DE NATURALIZACIÓN</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="width: 50%;">
                                                  <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda table-border">
                                                     {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->curp : '' }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                                 <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                    {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->curp_cotejo : '' }}
                                               </td>
                                           </tr>




                                               <tr>
                                                <td style="width: 25%;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda table-border">COMPROBANTE DE DOMICILIO</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="width: 50%;">
                                                  <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;">Servicio:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 34%;"><p class="border-footer">
                                                               {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->comprobante_servicio : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;">Fecha:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 34%;"><p class="border-footer">
                                                                {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->comprobante_fecha : '' }}
                                                            </p></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;">Titular:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 84%;"><p class="border-footer">
                                                                {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->comprobante_titular : '' }}
                                                            </p></td>
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                                 <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                 {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->comprobante_cotejo : '' }}
                                                 </td>
                                           </tr>




                                            <tr>
                                                <td style="width: 25%;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda table-border">COMP. DE AFILIACIÓN AL IMSS</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 50%;">
                                                  
                                                  {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->imss : '' }}
                                                 
                                                </td>
                                                 <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->imss_cotejo : '' }}
                                                </td>
                                           </tr>



                                           <tr>
                                                <td style="width: 25%;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda table-border">EDO. DE CTA. DE AFORE</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 50%;">
                                                 
                                                  {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->afore : '' }}
                                                 
                                                </td>
                                                 <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                 {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->afore_cotejo: '' }}
                                                 </td>
                                           </tr>




                                           <tr>
                                                <td style="width: 25%;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda table-border">CARTAS DE RECOMENDACIÓN (2)</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 50%;">
                                                
                                                    {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->carta : '' }}
                                                 
                                                </td>
                                                 <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                   {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->carta_cotejo : '' }}
                                                 </td>
                                           </tr>



                                            <tr>
                                                <td style="width: 25%;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda table-border">RECIBOS DE NÓMINA (3 ÚLTIMOS)</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 50%;">
                                                  
                                                    {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->recibo_nomina : '' }}
                                                 
                                                </td>
                                                 <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->recibo_nomina_cotejo: '' }}
                                                 </td>
                                           </tr>



                                           <tr>
                                                <td style="width: 25%;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda table-border">CONSTANCIA DE INSCRIPCIÓN DE RFC</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 50%;">
                                                  
                                                       {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->inscripcion_rfc : '' }}
                                                
                                                </td>
                                                 <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                    {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->inscripcion_rfc_cotejo: '' }}
                                                 </td>
                                           </tr>




                                            <tr>
                                                <td style="width: 25%;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="letra-componente alinear-izquierda table-border">CONSTANCIA DE ESTUDIOS</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="letra-componente alinear-izquierda" style="width: 50%;">
                                                  
                                                      {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->constancia_estudios : '' }}
                                                 
                                                </td>
                                                 <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                      {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->constancia_estudios_cotejo : '' }}
                                                 </td>
                                           </tr>




                                           <tr>
                                            <td style="width: 25%;">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda table-border">ACTA DE MATRIMONIO</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="width: 50%;">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;">ACTA:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;"><p class="border-footer">
                                                                {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_matrimonio_acta : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;">FOJA:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;"><p class="border-footer">
                                                                {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_matrimonio_foja : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;">LIBRO:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;"><p class="border-footer">
                                                                {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_matrimonio_libro : '' }}
                                                            </p></td> 
                                                                                                                     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                             <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                  {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_matrimonio_cotejo : '' }}
                                             </td>
                                           </tr>





                                             <tr>
                                            <td style="width: 25%;">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda table-border">ACTA DE NACIMIENTO DE CÓNYUGE</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="width: 50%;">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;">AÑO:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;"><p class="border-footer">
                                                                 {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_nac_conyugue_ano : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;">FOJA:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;"><p class="border-footer">
                                                                  {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_nac_conyugue_foja : '' }}
                                                            </p></td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;">LIBRO:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 16%;"><p class="border-footer">
                                                                  {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_nac_conyugue_libro: '' }}
                                                            </p></td> 
                                                                                                                     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                             <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                             {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_nac_conyugue_cotejo : '' }}
                                            </td>
                                           </tr>




                                            <tr>
                                            <td style="width: 25%;">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda table-border">ACTA DE NACIMIENTO DE HIJOS</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="width: 50%;">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                           
                                                            <td class="letra-componente alinear-izquierda table-border">
                                                               {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_nac_hijos : '' }}
                                                           </td>                                                         
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                             <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                            {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->acta_nac_hijos_cotejo: '' }}
                                             </td>
                                           </tr>



                                            <tr>
                                            <td style="width: 25%;">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda table-border">BURO DE CRÉDITO</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="width: 50%;">
                                                <table class="auto-width">
                                                    <tbody>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 30%;">Contrato/Cuenta:</td>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 70%;"><p class="border-footer">
                                                                {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->buro_credito: '' }}
                                                            </p>
                                                            </td>
                                                                                                                     
                                                                                                                     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                             <td class="letra-componente alinear-izquierda" style="width: 25%;">
                                                 {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->buro_credito_cotejo : '' }}
                                           </td>
                                           </tr>






                                                    </tbody>
                                                </table>
                                           </td>
                                    </tr>






                                     <tr>
                                        <td colspan="3" class="table-border" style="width: 100%;">
                                             <span style=" display: inline-block;height: 15px;"></span>
                                        </td>
                                    </tr>
                                     <tr>
                                            <td colspan="3" class="table-border" style="width: 100%;">
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
                                                            <td class="letra-componente alinear-izquierda">
                                                                <p>
                                                                      {{ isset($estudio->formatoMetlife->documentacion ) ?$estudio->formatoMetlife->documentacion->documentacion_observaciones : '' }}
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
                                            </td>
                                        </tr>
                                        {{--  END DOCUMENTACION--}}
                                        <!-- ------------------------   end escolaridad ------------------------- -->
                      <tr class="table-border">
                                            <td colspan="3" class="table-border">
                                                <table class="auto-width table-border">
                                                    <tbody class="table-border">
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
                                                                            <th class="letra-componente alinear-centro negrita" style="width: 10%">GRADO</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width: 30%">INSTITUCIÓN</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width: 20%">DOMICILIO</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width: 10%">PERIODO</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width: 10%">AÑOS</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width: 20%">COMPROBANTE</th>    
                                                                             
                                                                      
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="table-border">
                                                                    <tr class="table-border">
                                                                           <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                             PRIMARIA
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                           
                                                                                   {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->institucion_primaria : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 20%">
                                                                               {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->domicilio_primaria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                              {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->periodo_primaria : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                                 {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->anos_primaria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->comprobante_primaria : '' }}
                                                                            </td>
                                                                           
                                                                      </tr>
                                                                          <tr>
                                                                           <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                             SECUNDARIA
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                           
                                                                                   {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->institucion_secundaria : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                               {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->domicilio_secundaria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:10%">
                                                                              {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->periodo_secundaria : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width:10%">
                                                                                 {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->anos_secundaria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->comprobante_secundaria : '' }}
                                                                            </td>
                                                                           
                                                                      </tr>
                                                                       <tr>
                                                                           <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                             TÉCNICA
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                           
                                                                                   {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->institucion_tecnica : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                               {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->domicilio_tecnica : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                              {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->periodo_tecnica : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                                 {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->anos_tecnica : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->comprobante_tecnica : '' }}
                                                                            </td>
                                                                           
                                                                      </tr>
                                                                      <tr>
                                                                           <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                             PREPARATORIA
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                           
                                                                                   {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->institucion_preparatoria : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                               {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->domicilio_preparatoria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                              {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->periodo_preparatoria : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                                 {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->anos_preparatoria : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->comprobante_preparatoria : '' }}
                                                                            </td>
                                                                      </tr>
                                                                      <tr>
                                                                           <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                            PROFESIONAL
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                           
                                                                                   {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->institucion_profesiona : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                               {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->domicilio_profesional : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                              {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->periodo_profesional : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                                 {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->anos_profesional : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->comprobante_profesional : '' }}
                                                                            </td>
                                                                      </tr>
                                                                        <tr>
                                                                           <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                            OTRO
                                                                           </td>
                                                       
                                                                            <td class="letra-componente alinear-izquierda" style="width: 30%">
                                                                           
                                                                                   {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->institucion_profesiona : '' }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                               {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->domicilio_profesional : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                              {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->periodo_profesional : '' }}
                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width: 10%">
                                                                                 {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->anos_profesional : '' }} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                {{ isset($estudio->formatoMetlife->escolaridadmet ) ? $estudio->formatoMetlife->escolaridadmet->comprobante_profesional : '' }}
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

                                        {{--  CURSOS --}}
                                         <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-centro titulo-componente">
                                                                 <p>
                                                                     CURSOS REALIZADOS
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table class="tabla-componente">

                                                                    <tbody>

                                                         @if( $estudio->formatoMetlife)
                                                              @foreach ($estudio->formatoMetlife->cursoMet as $index => $curso)
                                                                      <tr>
                                                                            <td class="letra-componente alinear-derecha table-border" style="width:10%;">DE </td>
                                                                            <td class="letra-componente alinear-izquierda table-border" style="width:15%;"><p class="border-footer">
                                                                               {{ $curso->de}} 
                                                                            </p></td>        
                                                                            <td class="letra-componente alinear-derecha table-border" style="width:10%;">A </td>
                                                                            <td class="letra-componente alinear-izquierda table-border" style="width:15%;"><p class="border-footer">
                                                                                {{ $curso->a}} 
                                                                            </p></td>                
                                                                            <td class="letra-componente alinear-derecha table-border" style="width:10%;">REALIZÓ </td>
                                                                            <td class="letra-componente alinear-izquierda table-border" style="width:40%;"><p class="border-footer">
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
                                        {{-- END CURSO--}}
                                        {{-- ------------------------------   IDIOMAS -------------------------- --}}
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="auto-width ">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente">
                                                                     IDIOMAS
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td  class="table-border">
                                                                <table class="auto-width">
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
                                                            @if( $estudio->formatoMetlife)
                                                             <?php  $contador=1; 
                                                                   
                                                                    $procentaje=null;

                                                               ?>
                                                              @foreach ($estudio->formatoMetlife->idiomas as $indexidioma => $idio)
                                                               <?php 
                                                                  $hablado=isset($idio->hablado)?$idio->hablado:0;
                                                                  $leido=isset($idio->leido)?$idio->leido:0;
                                                                  $escrito=isset($idio->escrito)?$idio->escrito:0;
                                                                  $comprension=isset($idio->comprension)?$idio->comprension:0;
                                                               ?>
                                                                  <tr>  
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                              {{ $contador++ }}

                                                                           </td>
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                               @if( $idio->idioma != '' )
                                                                                {{ $idio->idioma }}
                                                                                @else
                                                                                 &nbsp;
                                                                                @endif
                                                                            </td>                
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                {{ $idio->hablado }} %
                                                                            </td>              
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                {{ $idio->leido }} %
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                               {{ $idio->escrito }} %
                                                                            </td>                
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                                 {{ $idio->comprension}} %
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
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>
                                        </tr>
                                    {{-- ------------------------------   IDIOMAS -------------------------- --}}
                                    {{-- ------------------------------ CONOCIMIENTOS -------------------------}}
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
                                                            <td class="table-border" style="padding:0;">
                                                                <table class="tabla-componente">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="letra-componente alinear-centro negrita" style="width:12%;">#</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width:76%;">PAQUETERIA</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width:12%;">%</th>                                                                    
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                          @if( $estudio->formatoMetlife)
                                                              @foreach ($estudio->formatoMetlife->conocimientos_ as $index => $conocimiento)
                                                              <?php  $contador_conocimientos=1; ?>
                                                                        <tr>
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
                                                                            {{ $contador_conocimientos++ }}
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width:76%;">
                                                                            {{$conocimiento->paqueteria}} 
                                                                            </td>
                                                                            <td class="letra-componente alinear-centro" style="width:12%;">
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
                                        {{-- ------------------------------ CONOCIMIENTOS -------------------------}}
                                        {{-- ------------------------------ FAMILIARES ----------------------------}}

                     <!-- ----------------------------------------------------situacion familiar-------------------------------------- -->
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
                                                                     DATOS FAMILIARES (De los que viven en el domicilio)
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
                                                                                            @if( $estudio->formatoMetlife )
                                                                                                @if( $estudio->formatoMetlife->familia->file != '' )
                                                                                                

                                                                                                     {{ Html::image($estudio->formatoMetlife->familia->path . '/' . $estudio->formatoMetlife->familia->file,'',['style' => 'max-width:100%;height:auto;']) }}

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
                                                                                                {{ isset($estudio->formatoMetlife ) ? $estudio->formatoMetlife->familia->observaciones : '' }}
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
                                 <!-- ----------------------------------------------------situacion familiar-------------------------------------- -->
               <!-- ----------------------------------------------------situacion economica -->
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="tabla-componente table-border">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente-principal table-border">
                                                                     SITUACIÓN ECONÓMICA
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-border">
                                                                <table class="tabla-componente">
                                                                    <thead>
                                                                        <tr>
                                                                            
                                                                            <th class="letra-componente alinear-centro negrita" style="width:35%;">CONCEPTO</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width:15%;">INGRESOS</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width:35%;">CONCEPTO</th>
                                                                            <th class="letra-componente alinear-centro negrita" style="width:15%;"> EGRESOS </th>    
                                                                      
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>                                                                         
                                                       
                                                        <tr>

                                                            
                                                            
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                <p>
                                                                
                                              {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionEconomica->conceptoinUno :''}}            
                                                                </p></td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>

                                                                <?php 
                                                                $i1=null;
                                                                 if(isset( $estudio->formatoMetlife )){
                                                                  if($estudio->formatoMetlife->situacionEconomica->ingresosUno!=""){
                                                                  $i1=(int) number_format($estudio->formatoMetlife->situacionEconomica->ingresosUno, 2, '.', '') ;
                                                                }}else{
                                                                  $i1=0;
                                                                }
                                                                ?>

                                                                $  {{ number_format($i1, 2) }}
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                    <p>
                                                                ALIMENTACIÓN
                                                                    </p>
                                                                </td>                                                                    
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                <?php 
                                                                 $e1=null;
                                                                 if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->egresosUno!=""){
                                                                    $e1=(int) number_format($estudio->formatoMetlife->situacionEconomica->egresosUno, 2, '.', '');
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
                                                            
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                <p>
                                             
                                                                {{  isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->situacionEconomica->conceptoinDos :''}}            
                                                                </p></td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                <?php 
                                                                  $i2=null;
                                                                  if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->ingresosDos!=""){
                                                                      $i2=(int) number_format($estudio->formatoMetlife->situacionEconomica->ingresosDos, 2, '.', '');
                                                                    }
                                                                    else{
                                                                      $i2=0;
                                                                    }
                                                                }
                                                                ?>
                                                                                                                              
                                                                $ {{ number_format($i2, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                    <p>
                                                                RENTA
                                                                </p></td>                                                                    
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                 <?php 
                                                                  $e2=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->egresosDos!=""){
                                                                      $e2=(int) number_format($estudio->formatoMetlife->situacionEconomica->egresosDos, 2, '.', '');
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
                                                            
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                <p>
                                             
                                                                {{  isset( $estudio->formatoMetlife ) ?$estudio->formatoMetlife->situacionEconomica->conceptoinTres :''}}            
                                                                </p></td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                 <?php 
                                                                  $i3=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->ingresosTres!=""){
                                                                      $i3=(int) number_format($estudio->formatoMetlife->situacionEconomica->ingresosTres, 2, '.', '');
                                                                    }
                                                                    else{
                                                                      $i3=0;
                                                                    }
                                                                }
                                                                ?>
                                                                                                                             
                                                                $ {{ number_format($i3, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                    <p>
                                                                TELÉFONO
                                                                </p></td>                                                                    
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                <?php 
                                                                  $e3=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->egresosTres!=""){
                                                                      $e3=(int) number_format($estudio->formatoMetlife->situacionEconomica->egresosTres, 2, '.', '');
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
                                                            
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                <p>
                                             
                                                                {{  isset( $estudio->formatoMetlife ) ?$estudio->formatoMetlife->situacionEconomica->conceptoinCuatro :''}}            
                                                                </p></td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                 <?php 
                                                                  $i4=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->ingresosCuatro!=""){
                                                                      $i4=(int) number_format($estudio->formatoMetlife->situacionEconomica->ingresosCuatro, 2, '.', '');
                                                                    }
                                                                    else{
                                                                      $i4=0;
                                                                    }
                                                                }
                                                                ?>
                                                                 $ {{ number_format($i4, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                    <p>
                                                               SERVICIOS (GAS , AGUA , LUZ ) 
                                                                </p></td>                                                                    
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                 <?php 
                                                                  $e4=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->egresosCuatro!=""){
                                                                      $e4=(int) number_format($estudio->formatoMetlife->situacionEconomica->egresosCuatro, 2, '.', '');
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
                                                            
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                <p>
                                             
                                                                {{  isset( $estudio->formatoMetlife ) ?$estudio->formatoMetlife->situacionEconomica->conceptoinCinco :''}}            
                                                                </p></td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                <?php 
                                                                  $i5=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->ingresosCinco!=""){
                                                                      $i5=(int) number_format($estudio->formatoMetlife->situacionEconomica->ingresosCinco, 2, '.', '');
                                                                    }
                                                                    else{
                                                                      $i5=0;
                                                                    }
                                                                }
                                                                ?>
                                                                  $ {{ number_format($i5, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                    <p>
                                                                PREDIAL
                                                                </p></td>                                                                    
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                <?php 
                                                                  $e5=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->egresosCinco!=""){
                                                                      $e5=(int) number_format($estudio->formatoMetlife->situacionEconomica->egresosCinco, 2, '.', '');
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
                                                            
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                <p>
                                             
                                                                {{  isset( $estudio->formatoMetlife ) ?$estudio->formatoMetlife->situacionEconomica->conceptoinSeis :''}}            
                                                                </p></td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                <?php 
                                                                  $i6=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->ingresosSeis!=""){
                                                                      $i6=(int) number_format($estudio->formatoMetlife->situacionEconomica->ingresosSeis, 2, '.', '');
                                                                    }
                                                                    else{
                                                                      $i6=0;
                                                                    }
                                                                }
                                                                ?>
                                                                 $ {{ number_format($i6, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                    <p>
                                                               EDUCACIÓN
                                                                </p></td>                                                                    
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                <?php 
                                                                  $e6=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->egresosSeis!=""){
                                                                      $e6=(int) number_format($estudio->formatoMetlife->situacionEconomica->egresosSeis, 2, '.', '');
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
                                                            
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                <p>
                                             
                                                                {{  isset( $estudio->formatoMetlife ) ?$estudio->formatoMetlife->situacionEconomica->conceptoinSiete :''}}            
                                                                </p></td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                <?php 
                                                                  $i7=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->ingresosSiete!=""){
                                                                      $i7=(int) number_format($estudio->formatoMetlife->situacionEconomica->ingresosSiete, 2, '.', '');
                                                                    }
                                                                    else{
                                                                      $i7=0;
                                                                    }
                                                                }
                                                                ?>
                                                                $ {{ number_format($i7, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                    <p>
                                                                TRANSPORTACIÓN
                                                                </p></td>                                                                    
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                 <?php 
                                                                  $e7=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->egresosSiete!=""){
                                                                      $e7=(int) number_format($estudio->formatoMetlife->situacionEconomica->egresosSiete, 2, '.', '');
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
                                                            
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                <p>
                                             
                                                                {{  isset( $estudio->formatoMetlife ) ?$estudio->formatoMetlife->situacionEconomica->conceptoinOcho :''}}            
                                                                </p></td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                <?php 
                                                                  $i8=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->ingresosOcho!=""){
                                                                      $i8=(int) number_format($estudio->formatoMetlife->situacionEconomica->ingresosOcho, 2, '.', '');
                                                                    }
                                                                    else{
                                                                      $i8=0;
                                                                    }
                                                                }
                                                                ?>
                                                                  $ {{ number_format($i8, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                    <p>
                                                                DIVERSIONES
                                                                </p></td>                                                                    
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                <?php 
                                                                  $e8=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->egresosOcho!=""){
                                                                      $e8=(int) number_format($estudio->formatoMetlife->situacionEconomica->egresosOcho, 2, '.', '');
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
                                                            
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                <p>
                                             
                                                                {{  isset( $estudio->formatoMetlife ) ?$estudio->formatoMetlife->situacionEconomica->conceptoinNueve :''}}            
                                                                </p></td>
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                <?php 
                                                                  $i9=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->ingresosNueve!=""){
                                                                      $i9=(int) number_format($estudio->formatoMetlife->situacionEconomica->ingresosNueve, 2, '.', '');
                                                                    }
                                                                    else{
                                                                      $i9=0;
                                                                    }
                                                                }
                                                                ?>
                                                                  $ {{ number_format($i9, 2) }} 
                                                                </p></td>
                                                                <td class="letra-componente alinear-izquierda" style="width:35%;">
                                                                    <p>
                                                                OTROS., 
                                                                </p></td>                                                                    
                                                                <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                    <p>
                                                                 <?php 
                                                                  $e9=null;
                                                                if($estudio->formatoMetlife){
                                                                      if($estudio->formatoMetlife->situacionEconomica->egresosNueve!=""){
                                                                      $e9=(int) number_format($estudio->formatoMetlife->situacionEconomica->egresosNueve, 2, '.', '');
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
                                                                            <td  class="letra-componente alinear-derecha" style="width:35%;">
                                                                                <p>
                                                                                    TOTAL INGRESOS
                                                                                </p>
                                                                            </td>
                                                                              <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                                 <p>
                                                                                   <?php  $toting=($i1+$i2+$i3+$i4+$i5+$i6+$i7+$i8+$i9) ?>
                                                                                    ${{ number_format($toting, 2) }}
                                                                                </p>
                                                                            </td>                                                                        
                                                                            <td class="letra-componente alinear-derecha" style="width:35%;">
                                                                                <p>
                                                                                    TOTAL EGRESOS
                                                                                  
                                                                                </p>
                                                                            </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                               <p>
                                                                                 <?php  $toteg=($e1+$e2+$e3+$e4+$e5+$e6+$e7+$e8+$e9) ?>
                                                                                    ${{ number_format($toteg, 2) }}
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
 <!-- ----------------------------------------------------situacion economica ----------------------------------------- -->
<!-- ---------------------------------------------------- BIENES----------------------------------------- -->
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
                                                                     BIENES
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-border">
                                                                <table class="tabla-componente table-border">
                                                                    <thead>
                                                                        <tr>
                                                                            
                                                                            <th class="letra-componente alinear-centro negrita"  style="width:25%;">ACTIVOS</th>
                                                                            <th class="letra-componente alinear-centro negrita"  style="width:3%;">SI</th>
                                                                            <th class="letra-componente alinear-centro negrita"  style="width:3%;">NO</th>
                                                                            <th class="letra-componente alinear-centro negrita"  style="width:30%;">TIPO</th>
                                                                            <th class="letra-componente alinear-centro negrita"  style="width:10%;">VALOR</th>    
                                                                            <th class="letra-componente alinear-centro negrita"  style="width:10%;">PAGADO</th>    
                                                                            <th class="letra-componente alinear-centro negrita"  style="width:15%;">ADEUDO</th>   
                                                                      
                                                                        </tr>
                                                                    </thead>
                                                          <tr>
                                                                                                                                               
                                                                            <td class="letra-componente alinear-izquierda" style="width:25%;">
                                                                            PROPIEDADES DEL CANDIDATO
                                                                           </td>
                                                                            <td class="letra-componente alinear-izquierda" 
                                                                             @if( $estudio->formatoMetlife )
                                                                                @if( $estudio->formatoMetlife->bienes->propiedad_candidato==1 )
                                                                                style="background-color:#FF8000; width: 3%;"
                                                                                @else
                                                                                style="width: 3%;"
                                                                                @endif
                                                                                @endif>

                                                                              
                                                                           </td>
                                                                            <td class="letra-componente alinear-izquierda" 
                                                                            @if( $estudio->formatoMetlife )
                                                                                @if( $estudio->formatoMetlife->bienes->propiedad_candidato==2 )
                                                                                style="background-color:#FF8000; width: 3%;"
                                                                                @else
                                                                                style="width: 3%;"
                                                                                @endif
                                                                                @endif>
                                                                                                                                                      
                                                                           </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                              {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->bienes->propiedad_tipo :''}}  
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                             <?php 
                                                                                $v1=null;
                                                                                if($estudio->formatoMetlife){
                                                                                    if($estudio->formatoMetlife->bienes->propiedad_valor!=""){
                                                                                    $v1=(int) number_format($estudio->formatoMetlife->bienes->propiedad_valor, 2, '.', '');
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
                                                                                if($estudio->formatoMetlife){
                                                                                    if($estudio->formatoMetlife->bienes->propiedad_pagado!=""){
                                                                                    $v2=(int) number_format($estudio->formatoMetlife->bienes->propiedad_pagado, 2, '.', '');
                                                                                  }
                                                                                  else{
                                                                                    $v2=0;
                                                                                  }
                                                                                }
                                                                              ?>
                                                                             $ {{  number_format($v2, 2) }}
                                                                                                                                                    
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                            <?php $vadeudo=(int)($v1-$v2)?>

                                                                            ${{isset($vadeudo)?number_format($vadeudo, 2):0}}
                                                                           
                                                                           </td>
                                                              </tr>
                                                               <tr>
                                                                                                                                               
                                                                            <td class="letra-componente alinear-izquierda" style="width:25%;">
                                                                            CREDITO O HIPOTECA
                                                                           </td>
                                                                            <td class="letra-componente alinear-izquierda"
                                                                              @if( $estudio->formatoMetlife )
                                                                                @if( $estudio->formatoMetlife->bienes->credito==1 )
                                                                                style="background-color:#FF8000; width: 3%;"
                                                                                @else
                                                                                style="width: 3%;"
                                                                                @endif
                                                                                @endif>
                                                                             
                                                                           </td>
                                                                            <td class="letra-componente alinear-izquierda"  
                                                                               @if( $estudio->formatoMetlife )
                                                                                @if( $estudio->formatoMetlife->bienes->credito==2 )
                                                                                style="background-color:#FF8000; width: 3%;"
                                                                                @else
                                                                                style="width: 3%;"
                                                                                @endif
                                                                                @endif>
                                                                           
                                                                           </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                               {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->bienes->credito_tipo :''}}  
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                               <?php 
                                                                                $c1=null;
                                                                            if($estudio->formatoMetlife){
                                                                                if($estudio->formatoMetlife->bienes->credito_valor!=""){
                                                                                $c1=(int) number_format($estudio->formatoMetlife->bienes->credito_valor, 2, '.', '');
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
                                                                            if($estudio->formatoMetlife){
                                                                                    if($estudio->formatoMetlife->bienes->credito_pagado!=""){
                                                                                    $c2=(int) number_format($estudio->formatoMetlife->bienes->credito_pagado, 2, '.', '');
                                                                                  }
                                                                                  else{
                                                                                    $c2=0;
                                                                                  }
                                                                            }
                                                                              ?>
                                                                             $ {{  number_format($c2, 2) }}
                                                                                                                                                     
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                             <?php $cadeudo=(int)($c1-$c2)?>

                                                                            ${{isset($cadeudo)?number_format($cadeudo, 2):0}}
                                                                           
                                                                           </td>
                                                              </tr>
                                                              <tr>
                                                                                                                                               
                                                                            <td class="letra-componente alinear-izquierda" style="width:25%;">
                                                                            INVERSIONES/ AHORROS
                                                                           </td>
                                                                            <td class="letra-componente alinear-izquierda" 
                                                                             @if( $estudio->formatoMetlife )
                                                                                @if( $estudio->formatoMetlife->bienes->inversiones==1 )
                                                                                style="background-color:#FF8000; width: 3%;"
                                                                                @else
                                                                                style="width: 3%;"
                                                                                @endif
                                                                                @endif>

                                                                             </td>
                                                                            <td class="letra-componente alinear-izquierda"
                                                                             @if( $estudio->formatoMetlife )
                                                                                @if( $estudio->formatoMetlife->bienes->inversiones==2 )
                                                                                style="background-color:#FF8000; width: 3%;"
                                                                                @else
                                                                                style="width: 3%;"
                                                                                @endif
                                                                                @endif>
                                                                           
                                                                           </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                               {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->bienes->inversiones_tipo :''}}  
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                            <?php 
                                                                                $in1=null;
                                                                                if($estudio->formatoMetlife){
                                                                                    if($estudio->formatoMetlife->bienes->inversiones_valor!=""){
                                                                                    $in1=(int) number_format($estudio->formatoMetlife->bienes->inversiones_valor, 2, '.', '');
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
                                                                                if($estudio->formatoMetlife){
                                                                                    if($estudio->formatoMetlife->bienes->inversiones_pagado!=""){
                                                                                    $in2=(int) number_format($estudio->formatoMetlife->bienes->inversiones_pagado, 2, '.', '');
                                                                                  }
                                                                                  else{
                                                                                    $in2=0;
                                                                                  }
                                                                                }
                                                                              ?>
                                                                             $ {{  number_format($in2, 2) }}
                                                                           
                                                                            
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                            <?php $inadeudo=(int)($in1-$in2)?>

                                                                            ${{isset($inadeudo)?number_format($inadeudo, 2):0}}
                                                                           
                                                                           </td>
                                                              </tr>
                                                                 <tr>
                                                                                                                                               
                                                                            <td class="letra-componente alinear-izquierda" style="width:25%;">
                                                                            AUTOMOVILES
                                                                           </td>
                                                                            <td class="letra-componente alinear-izquierda"
                                                                             @if( $estudio->formatoMetlife )
                                                                                @if( $estudio->formatoMetlife->bienes->automoviles==1 )
                                                                                style="background-color:#FF8000; width: 3%;"
                                                                                @else
                                                                                style="width: 3%;"
                                                                                @endif
                                                                                @endif>
                                                                              
                                                                           </td>
                                                                            <td class="letra-componente alinear-izquierda"  
                                                                            @if( $estudio->formatoMetlife )
                                                                                @if( $estudio->formatoMetlife->bienes->automoviles==2 )
                                                                                style="background-color:#FF8000; width: 3%;"
                                                                                @else
                                                                                style="width: 3%;"
                                                                                @endif
                                                                                @endif>
                                                                           
                                                                           </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width:30%;">
                                                                               {{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->bienes->automoviles_tipo :''}}  
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:10%;">
                                                                             <?php 
                                                                                $a1=null;
                                                                                if($estudio->formatoMetlife){
                                                                                    if($estudio->formatoMetlife->bienes->automoviles_valor!=""){
                                                                                    $a1=(int) number_format($estudio->formatoMetlife->bienes->automoviles_valor, 2, '.', '');
                                                                                  }
                                                                                  else{
                                                                                    $a1=0;
                                                                                  }
                                                                                }
                                                                              ?>
                                                                             $ {{  number_format($a1, 2) }}
                                                                                                                                                     
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha " style="width:10%;">
                                                                             <?php 
                                                                                $a2=null;
                                                                            if($estudio->formatoMetlife){
                                                                                if($estudio->formatoMetlife->bienes->automoviles_pagado!=""){
                                                                                $a2=(int) number_format($estudio->formatoMetlife->bienes->automoviles_pagado, 2, '.', '');
                                                                              }
                                                                              else{
                                                                                $a2=0;
                                                                              }
                                                                            }
                                                                              ?>
                                                                             $ {{  number_format($a2, 2) }}
                                                                            
                                                                           </td>
                                                                            <td class="letra-componente alinear-derecha" style="width:15%;">
                                                                           <?php $aadeudo=(int)($a1-$a2)?>

                                                                            ${{isset($aadeudo)?number_format($aadeudo, 2):0}}
                                                                           
                                                                           </td>
                                                              </tr>
                                                                      
                                                                       
                                                                          
                                                                        <tr>
                                                                            <td colspan="4" class="letra-componente alinear-derecha" style="width: 70%">
                                                                                <p>
                                                                                    TOTAL INGRESOS
                                                                                </p>
                                                                            </td>
                                                                            <td class="letra-componente alinear-derecha" style="width: 10%">
                                                                                <p>
                                                                                 <?php $total_ingresos=(int)($v1+$c1+$in1+$a1); ?>
                                                                                   ${{ number_format($total_ingresos, 2) }}
                                                                                </p>
                                                                            </td>                                                                        
                                                                            <td class="letra-componente alinear-derecha" style="width: 10%">
                                                                                <p>
                                                                                  <?php $total_pagado=(int)($v2+$c2+$in2+$a2); ?>
                                                                                   ${{ number_format($total_pagado, 2) }}
                                                                              
                                                                                </p>
                                                                            </td>
                                                                            <td class="letra-componente alinear-derecha" style="width: 10%">
                                                                                <p>
                                                                                 <?php $total_adeudo=(int)($total_ingresos-$total_pagado); ?>
                                                                                   ${{ number_format($total_adeudo, 2) }}
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
            <!------------------------------------- END BIENES----------------------------------------------------- -->
            <!------------------------------------- infromacion de la vivienda ----------------------------------------------------- -->
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
                                                                                             @if( $estudio->formatoMetlife )
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->vivienda_propia ) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->vivienda_rentada) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->vivienda_hipoteca) != ''  )
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
                                                                                            <td class="alinear-centro" 
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->vivienda_congelada) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->vivienda_prestada) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->vivienda_padres) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->vivienda_otro) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                              @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->propiedad_sola) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                   
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                   SOLA        
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->propiedad_duplex) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->propiedad_huespedes) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                    
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                   HUÉSPEDES              
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->propiedad_depto) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                  
                                                                                       
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    DEPTO.               
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->propiedad_condominio) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->propiedad_vecindad) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->propiedad_otro) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->servicio_luz) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->servicio_agua) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->servicio_pavimentacion) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->servicio_drenaje) != ''  )
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
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->ervicio_telefono) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
            
                                                                                            </td >
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    TELÉFONO                          
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-centro"
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->servicio_refrigerador) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                    
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    REFRIGERADOR 
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="alinear-centro"
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->servicio_boiler) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                   
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
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
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->distribucion_sala) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->distribucion_comedor) != ''  )
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
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->distribucion_recamara) != ''  )
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
                                                                                              @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->distribucion_cocina) != ''  )
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
                                                                                              @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->distribucion_bano) != ''  )
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
                                                                                              @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->distribucion_garaje) != ''  )
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
                                                                                              @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->distribucion_biblioteca) != ''  )
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
                                                                                              @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->economico_alto) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                           

                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                  ALTO             
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->economico_malto) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                            
                                                           
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    MEDIO ALTO                      
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->economico_medio) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                          
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                   MEDIO                 
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->economico_mediobajo) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                           
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    MEDIO BAJO          
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->vivienda->economico_bajo) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                                             
                                                           
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
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

                                                                                                                    <td style="width: 40%" class="letra-componente alinear-izquierda">
                                                                                                                        <p>
                                                                                                    ¿Cuántas personas viven en el domicilio?             
                                                                                                </p>
                                                                                            </td>
                                                                                         <td style="width: 60%" class="letra-componente alinear-izquierda">
                                                         {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->vivienda->personas_viven: '' }}
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
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->condiciones_alta) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->condiciones_malta) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->condiciones_media) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->condiciones_media_baja) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->condiciones_baja) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->orden_alta) != ''  )
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
                                                                                              @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->orden_malta) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->orden_media) != ''  )
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
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->orden_media_baja) != ''  )
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
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->orden_baja) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->calidad_alta) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->calidad_malta) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->calidad_media) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->calidad_media_baja) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                        
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    MEDIA  BAJA       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>

                                                                                      <td
                                                                                       @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->calidad_baja) != ''  )
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
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->conservacion_alta) != ''  )
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
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->conservacion_malta) != ''  )
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
                                                                                             @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->conservacion_media) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->conservacion_media_baja) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                       
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    MEDIA  BAJA              
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                         <tr>
                                                                                            <td
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->conservacion_baja) != ''  )
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
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->espacio_sobrado) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                       
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    SOBRADO              
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->espacio_suficiente) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                       
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    SUFICIENTE                      
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->espacio_limitado) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                       
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
                                                                                                <p>
                                                                                                    LIMITADO                  
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                            @if( $estudio->formatoMetlife)
                                                                                             @if( trim( $estudio->formatoMetlife->apreciacionVivienda->espacio_insuficiente) != ''  )
                                                                                                style="background-color:#FF8000; width: 30%;"
                                                                                                @else
                                                                                                style="width: 30%;"
                                                                                                @endif
                                                                                                @endif>
                                    
                                                                                            </td>
                                                                                            <td class="letra-componente alinear-izquierda table-border">
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
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>
                                        </tr>
                                        <tr>

                                                                    <td colspan="3" class="table-border">
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="3" class="table-border">
                                                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr >
                                                                                    <td style="width: 50%">
                                                                                        <p class="letra-componente alinear-centro">
                                                                                            TIENE FAMILIARES Y/O CONOCIDOS EN LA EMPRESA
                                                                                        </p>
                                                                                    </td>
                                                                                    <td style="width: 50%">
                                                                                        <p class="letra-componente alinear-centro">
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
                                                                                                     <span style=" display: inline-block;height: 15px;"></span>
                                                                                                </td>
                                                                                            </tr>
                                                                                                <tr class="table-border">
                                                                                                    <td style="width: 25%;" class="table-border"></td>

                                                                                                    <td
                                                                                                     @if( $estudio->formatoMetlife)
                                                                                                        @if( $estudio->formatoMetlife->apreciacionVivienda->tiene_familiares == '1' )
                                                                                                        style="background-color:#FF8000;width: 10%"
                                                                                                        @else
                                                                                                        style="width: 10%"
                                                                                                        @endif
                                                                                                        @endif>
                                                                                                    </td>
                                                                                                    <td style="width: 25%" class="letra-componente alinear-izquierda table-border">
                                                                                                        &nbsp;&nbsp;SI
                                                                                                    </td>
                                                                                                    <td
                                                                                                       @if( $estudio->formatoMetlife)
                                                                                                        @if( $estudio->formatoMetlife->apreciacionVivienda->tiene_familiares == '2' )
                                                                                                        style="background-color:#FF8000;width: 10%"
                                                                                                        @else
                                                                                                        style="width: 10%"
                                                                                                        @endif
                                                                                                        @endif>
                                                                                                    </td>
                                                                                                    <td style="width: 40%" class="letra-componente alinear-izquierda table-border quitar-borde">
                                                                                                        &nbsp;&nbsp;NO                                             
                                                                                                    </td>

                                                                                                </tr>         
                                                                                                <tr>
                                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 25%">
                                                                                                        <p>
                                                                                                            ESPECIFICAR
                                                                                                        </p>
                                                                                                    </td>
                                                                                                    <td  colspan="4" class="letra-componente alinear-izquierda table-border" style="width: 75%">
                                                                                                        <p class="border-footer">
                                                                                                           {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->especificacion: '' }}
                                                                                                        </p>
                                                                                                    </td>
                                                                                                </tr>                                                               
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda">
                                                                                        <p class="border-footer">
                                                                                            Medio: {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->entero_vacante: '' }}
                                                                                        </p>
                                                                                        <p class="border-footer">
                                                                                            Nombre del reclutador: {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->apreciacionVivienda->nombre_reclutador: '' }}
                                                                                        </p>
                                                                                       
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                
                                       </tr>
                                <!--------------------------------------------- CROQUIS --------------------------------------------- -->
                                 <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
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
                                                            <td style="width: 10%; height:10%">
                                                                <div style="width: 100%;" class="alinear-centro"> 
                       @if( $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first() )
                                    {{ Html::image(
                                                        $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                        $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->archivo,'',['style' => 'max-width:100%;height;auto']) }}
                                                                                                                  
                                                     
                                                            
                                                        @else
                                                             
                                                        {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',['style' => 'max-width:100%;height;auto']) !!}        

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
                                                
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 50%">
                                                                 <p class="letra-componente alinear-izquierda">
                                                                     DISTANCIA DE SU CASA AL TRABAJO
                                                                 </p>
                                                            </td>
                                                            <td>
                                                                 <p class="letra-componente alinear-izquierda">
                     {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->ubicacionDomicilio->distancia_trabajo: '' }}
                                                                 </p>
                                                            </td style="width: 50%">
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 50%">
                                                                 <p class="letra-componente alinear-izquierda">
                                                                     MEDIO DE TRANSPORTE QUE UTILIZA
                                                                 </p>
                                                            </td style="width: 50%">
                                                            <td>
                                                                 <p class="letra-componente alinear-izquierda">
                     {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->ubicacionDomicilio->medio_transporte: '' }}
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

  <!--------------------------------------------- CROQUIS --------------------------------------------- -->
  <!-- ----------------------------------------- SITUACION SOCIAL ------------------------------------  -->
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
                                                                     SITUACIÓN SOCIAL
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-centro">
                                                                A QUE ORGANIZACIONES O SINDICATOS LABORALES HA PERTENECIDO
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="letra-componente alinear-izquierda">
               {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionSocial->pertenece_sindicato: '' }}
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
                                                                            <td class="letra-componente alinear-derecha table-border" style="width: 10%">
                                                                                 <p>
                                                                                SI
                                                                                 </p>
                                                                            </td>
                                                                            <td class="alinear-centro" 
                                                                             @if( $estudio->formatoMetlife)
                                                                                        @if( $estudio->formatoMetlife->situacionSocial->detencion == '1')
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif
                                                                                        @endif>
                                                                               
                                                                            </td>
                                                                            <td class="letra-componente alinear-derecha table-border" style="width: 10%">
                                                                                 <p>
                                                                            NO
                                                                                 </p>
                                                                            </td>
                                                                            <td class="alinear-centro" 
                                                                            @if( $estudio->formatoMetlife)
                                                                                        @if( $estudio->formatoMetlife->situacionSocial->detencion == '2')
                                                                                        style="background-color:#FF8000; width: 10%;"
                                                                                        @else
                                                                                        style="width: 10%;"
                                                                                        @endif
                                                                                        @endif>
                                                                              
                                                                             
                                                                            </td>
                                                                            <td class="letra-componente alinear-derecha table-border" style="width: 20%">
                                                                                 <p>
                                                                                     MOTIVO:
                                                                                 </p>
                                                                            </td>
                                                                            <td  class="letra-componente alinear-izquierda table-border" style="width: 40%">
                                                                            {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionSocial->especificacion_detencion: '' }}
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
                                                                    {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionSocial->interes_corto: '' }}
                                                                </p>
                                                            </td>
                                                           <td class="letra-componente alinear-centro" style="width: 25%">
                                                                <p>
                                                                      {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionSocial->interes_mediano: '' }}
                                                                </p>
                                                            </td>
                                                            <td class="letra-componente alinear-centro" style="width: 25%">
                                                                <p>
                                                                  {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionSocial->interes_largo: '' }}
                                                                </p>
                                                            </td>
                                                           
                                                            <td class="letra-componente alinear-centro" style="width: 25%">
                                                                <p>
                                                                {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->situacionSocial->pasatiempos: '' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
  <!-- ----------------------------------------- SITUACION SOCIAL ------------------------------------  -->
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                            </td>
                                        </tr>
                                          <tr>
                                            <td colspan="3" class="" style="padding: 0">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                        <tr>
                                            <td colspan="3" class="table-border" style="padding: 0">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="5" class="table-border">
                                                                 <p class="alinear-centro titulo-componente-principal">
                                                                    EN CASO DE EMERGENCIA
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                           <td style="width: 50%"  class="letra-componente alinear-izquierda table-border">
                                                                 <p>
                                                                     EN CASO DE ACCIDENTE O EMERGENCIA, LLAMAR A:
                                                                 </p>
                                                            </td>
                                                            <td style="width: 50%" class="letra-componente alinear-izquierda table-border">
                                                                 <p class="border-footer">
                                                       {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->caso_emergencia: '' }}
                                                                 </p>
                                                            </td>
                                                            <td style="width: 50%" class="letra-componente alinear-izquierda table-border">
                                                                 <p>
                                                                    TELÉFONO:
                                                                 </p>
                                                            </td>
                                                            <td style="width: 50%" class="letra-componente alinear-izquierda table-border">
                                                                 <p class=" border-footer">
                                                      {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->casoEmergencia->caso_telefono: '' }}
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
                                                            <td  style="width: 33.5%" class="letra-componente alinear-izquierda table-border">
                                                                 <p>
                                                                     ¿REALIZA ALGUNA ACTIVIDAD?
                                                                 </p>
                                                            </td>
                                                                    
                                                           <td 
                                                                     @if( $estudio->formatoMetlife) 
                                                                        @if(  $estudio->formatoMetlife->casoEmergencia->actividad_fisica == '1'  ) 
                                                                        style="background-color:#FF8000;width: 5%"
                                                                        @else
                                                                        style="width: 5%"
                                                                        @endif
                                                                        @endif>
                                                               
                                                            </td>
                                                            <td style="width: 12%" class="letra-componente alinear-izquierda table-border">
                                                                 <p>
                                                                SI
                                                                 </p>
                                                            </td>          
                                                            <td  
                                                             @if( $estudio->formatoMetlife) 
                                                                        @if(  $estudio->formatoMetlife->casoEmergencia->actividad_fisica == '2'  ) 
                                                                        style="background-color:#FF8000;width: 5%"
                                                                        @else
                                                                        style="width: 5%"
                                                                        @endif
                                                                        @endif>
                                                            </td>
                                                            <td  style="width: 50%" class="letra-componente alinear-izquierda table-border">
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
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                                </td>
                                             </tr>
                                                        
                                                        <tr>
                                                            <td colspan="5"  style="width: 100%" class="table-border">
                                                                        <table class="auto-width" >
                                                                            <tbody>
                                                                            <tr>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 30%">
                                                                                        <p>
                                                                                            TIPO DE ACTIVIDAD
                                                                                        </p>
                                                                                    </td>
                                                               <td 
                                                                @if( $estudio->formatoMetlife )
                                                                                @if( trim($estudio->formatoMetlife->casoEmergencia->actividad_social) !='' )
                                                                                style="background-color:#FF8000; width: 5%;"
                                                                                @else
                                                                                style="width: 5%;"
                                                                                @endif
                                                                                @endif>


                                                                 
                                                            </td>  
                                                            <td class="letra-componente alinear-izquierda table-border"  style="width: 10%">
                                                                 <p>
                                                                  SOCIAL
                                                                 </p>
                                                            </td>
                                                               <td 
                                                               @if($estudio->formatoMetlife)
                                                                    @if( trim( $estudio->formatoMetlife->casoEmergencia->actividad_deportiva ) != ''  )
                                                                    style="background-color:#FF8000; width: 5%;"
                                                                    @else
                                                                    style="width: 5%;"
                                                                    @endif
                                                                    @endif>
                                                            
                                                            </td>  
                                                               <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                 <p>
                                                                DEPORTIVA
                                                                 </p>
                                                            </td>  
                                                             <td class="table-box-md "
                                                             @if($estudio->formatoMetlife)
                                                                    @if( trim( $estudio->formatoMetlife->casoEmergencia->actividad_religiosa ) != ''  )
                                                                    style="background-color:#FF8000; width: 5%;"
                                                                    @else
                                                                    style="width: 5%;"
                                                                    @endif
                                                                    @endif>

                                                               
                                                            </td>   
                                                               <td class="letra-componente alinear-izquierda table-border"  style="width: 10%">
                                                                 <p>
                                                                RELIGIOSA
                                                                 </p>
                                                            </td> 
                                                             <td class="table-box-md"
                                                              @if($estudio->formatoMetlife)
                                                                    @if( trim( $estudio->formatoMetlife->casoEmergencia->actividad_cultural ) != ''  )
                                                                    style="background-color:#FF8000; width: 5%;"
                                                                    @else
                                                                    style="width: 5%;"
                                                                    @endif
                                                                    @endif> 
                                                           
                                                                 </p>
                                                            </td> 
                                                            <td class="letra-componente alinear-izquierda table-border"  style="width: 10%">
                                                                 <p>
                                                                CULTURAL
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
                                                <td colspan="5" style="width: 100%" class="table-border">
                                                    <table class="auto-width">
                                                        <tbody>
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 30%">
                                                                 <p>
                                                                     TIEMPO DEDICADO:
                                                                 </p>
                                                            </td>
                                                               <td class="" 
                                                               @if($estudio->formatoMetlife)
                                                                    @if( trim( $estudio->formatoMetlife->casoEmergencia->tiempo_diario ) != ''  )
                                                                    style="background-color:#FF8000; width: 5%;"
                                                                    @else
                                                                    style="width: 5%;"
                                                                    @endif
                                                                    @endif>
                                                                 
                                                              
                                                            </td>  
                                                           <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                 <p>
                                                                  DIARIO
                                                                 </p>
                                                            </td>
                                                               <td class=""   
                                                               @if($estudio->formatoMetlife)
                                                                    @if( trim( $estudio->formatoMetlife->casoEmergencia->tiempo_semanal ) != ''  )
                                                                    style="background-color:#FF8000; width: 5%;"
                                                                    @else
                                                                    style="width: 5%;"
                                                                    @endif
                                                                    @endif>
                                                               
                                                            </td>  
                                                               <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                 <p>
                                                                SEMANAL
                                                                 </p>
                                                            </td>  
                                                             <td class="table-box-md " 
                                                             @if($estudio->formatoMetlife)
                                                                    @if( trim( $estudio->formatoMetlife->casoEmergencia->tiempo_quincenal ) != ''  )
                                                                    style="background-color:#FF8000; width: 5%;"
                                                                    @else
                                                                    style="width: 5%;"
                                                                    @endif
                                                                    @endif>
                                                              
                                                            </td>   
                                                               <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                 <p>
                                                                QUINCENAL
                                                                 </p>
                                                            </td> 
                                                             <td class="table-box-md "
                                                              @if($estudio->formatoMetlife)
                                                                    @if( trim( $estudio->formatoMetlife->casoEmergencia->tiempo_mensual ) != ''  )
                                                                    style="background-color:#FF8000; width: 5%;"
                                                                    @else
                                                                    style="width: 5%;"
                                                                    @endif
                                                                    @endif> 
                                                             
                                                                 </p>
                                                            </td>      
                                                            <td class="letra-componente alinear-izquierda table-border" style="width: 10%">
                                                                 <p>
                                                                MENSUAL
                                                                 </p>
                                                            </td>                                                                                                 
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr> 
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                </tr>




                                        </tr>
                                             <tr>
                                                <td colspan="3" class="table-border">
                                                 <span style=" display: inline-block;height: 15px;"></span>
                                                </td>
                                             </tr>
<!----------------------------------------------------------- END EN CASO DE EMERGENCIA -------------------------------- -->
<!-- ------------------------------------------------------- DISPONIBILIDAD -------------------------------------------- -->
<tr>
                                            <td  colspan="3" style="width: 50" class="table-border">
                                                <table class="auto-width table-border">
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
                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                 <p>
                                                                                     SI ESTA EMPLEADO ACTUALMENTE, ¿POR QUÉ DESEA CAMBIAR?
                                                                                 </p>                                                                            
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                 <p>
               {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->disponible->empleado_actualmente: '' }}
                                                                                 </p>                                                                            
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                 <p>
                                                                                     ¿ESTA DISPUESTO A VIAJAR?
                                                                                 </p>                                                                            
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                 <p>
                 {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->disponible->disponible_viajar: '' }}
                                                                                 </p>                                                                            
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                 <p>
                                                                                     ¿A CAMBIAR DE RESIDENCIA?
                                                                                 </p>                                                                            
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%"> 
                                                                                 <p>
                 {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->disponible->cambiar_residencia: '' }}  
                                                                                 </p>                                                                            
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                 <p>
                                                                                     ¿A PARTIR DE QUÉ FECHA PUEDE COMENZAR A TRABAJAR?
                                                                                 </p>                                                                            
                                                                            </td>
                                                                            <td class="letra-componente alinear-izquierda" style="width: 50%">
                                                                                 <p>
                  {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->disponible->fecha_laboral: '' }}
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
<!-- ------------------------------------------------------------------ END DISPONIBILIDAD ----------------------------------- -->
<!--------------------------------------------------------------------- RASTREO --------------------------------------------- -->
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
                                                                                        <td class="alinear-centro">
                                                                                            <div style="width: 100%;" class="alinear-centro"> 
                                                                                            @if( $estudio->formatoMetlife )
                                                                                                @if( $estudio->formatoMetlife->rastreoInfonavit->file != '' )
                                                                                                

                                                                                                     {{ Html::image($estudio->formatoMetlife->rastreoInfonavit->path . '/' . $estudio->formatoMetlife->rastreoInfonavit->file,'',['style' => 'max-width:100%;height:auto;']) }}

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
                                                           <td class="letra-componente alinear-izquierda">
                                                            <p>
 {{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->rastreoInfonavit->rastreo_infonavit: '' }}  
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
<!-- ----------------------------------------------------n END RASTREO INFONAVIT ------------------------------------------- -->
<!-- ---------------------------------------------------- REFERENCIAS PERSONALES ------------------------------------------- -->
                                    @if( $estudio->formatoMetlife)
                                                              @foreach ($estudio->formatoMetlife->referenciaPersonal  as $index_referencia => $referencias)
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
                                                                             REFERENCIAS PERSONALES
                                                                         </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="alinear-centro table-border">
                                                                        <table class="tabla-componente">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 25%">
                                                                                         <p>
                                                                                             NOMBRE DE LA REFERENCIA
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 40%">
                                                                                         <p>
                                                                                            {{$referencias->nombre_referencia}}
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                         <p>
                                                                                        CELULAR:
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 15%">
                                                                                         <p>
                                                                                          {{$referencias->celular_referencia}}
                                                                                         </p>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 25%">
                                                                                         <p>
                                                                                             DOMICILIO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 40%">
                                                                                         <p>
                                                                                           {{$referencias->domicilio_referencia}}                                                                                  
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                         <p>
                                                                                             TELÉFONO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 15%">
                                                                                         <p>
                                                                                            {{$referencias->telefono_referencia}}
                                                                                         </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 25%">
                                                                                         <p>
                                                                                             OCUPACIÓN
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 40%;">
                                                                                         <p>
                                                                                             {{$referencias->ocupacion_referencia}}  
                                                                                         </p>
                                                                                    </td>
                                                                                       <td class="letra-componente alinear-izquierda" style="width: 20%;">
                                                                                         <p>
                                                                                             TIEMPO DE CONOCERLO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 15%">
                                                                                         <p>
                                                                                             {{$referencias->tiempo_conocerlo_referencia}} 
                                                                                         </p>
                                                                                    </td>
                                                                                   
                                                                                </tr>
                                                                               
                                                                                <tr>
                                                                                    <td colspan="4">
                                                                                         <p class="letra-componente justificar">
                                                                                           {{$referencias->comentarios_referencia}} 
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
                                          @endforeach
                                  @endif
                                   <tr>
                                                        <td colspan="3" class="table-border">
                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>
                                                     </tr>
    <!---------------------------------------   END REFERENCIAS PERSONALES ----------------------------------------- -->
   <!---------------------------------------   END REFERENCIAS PERSONALES ----------------------------------------- -->
                                   @if( $estudio->formatoMetlife)
                                                              @foreach ($estudio->formatoMetlife->referenciaLaborales  as $index_referencia_laboral=> $referencias_laborales)
                                                                <tr>
                                                        <td colspan="3" class="table-border">
                                                         <span style=" display: inline-block;height: 15px;"></span>
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
                                                                                                    <td class="letra-componente alinear-izquierda" style="width: 14.3%">
                                                                                                         <p>
                                                                                                             EMPRESA
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-izquierda" colspan="2">
                                                                                                         <p>
                                                                                                            {{ $referencias_laborales->empresa_laboral }}
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-izquierda">
                                                                                                         <p>
                                                                                                             TELÉFONO
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-izquierda" colspan="2">
                                                                                                         <p>
                                                                                                          {{ $referencias_laborales->telefono_laboral }}
                                                                                                         </p>
                                                                                                    </td>
                                                                                                </tr>

                                                                                                <tr>
                                                                                                    <td class="letra-componente alinear-izquierda" style="width: 14.3%">
                                                                                                         <p>
                                                                                                             GIRO
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-izquierda" colspan="2">
                                                                                                         <p>
                                                                                                          {{ $referencias_laborales->giro_laboral }} 
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-izquierda">
                                                                                                         <p>
                                                                                                             CELULAR
                                                                                                         </p>
                                                                                                    </td>
                                                                                                    <td class="letra-componente alinear-izquierda" colspan="2">
                                                                                                         <p>
                                                                                                          {{ $referencias_laborales->celular_laboral }}  
                                                                                                         </p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                <tr>
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 9.8%">
                                                                                         <p>
                                                                                             DIRECCIÓN
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda" colspan="5" style="width: 90.2%;">
                                                                                         <p>
                                                                                        {{ $referencias_laborales->direccion_laboral }}  
                                                                                         </p>                                                                                    
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <tr>
                                                                                        <td colspan="6" class="table-border" style="width: 100%;">
                                                                                            <table class="tabla-componente">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 13%">
                                                                                                             <p>
                                                                                                                 PUESTO INICIAL
                                                                                                             </p>
                                                                                                        </td>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 40%">
                                                                                                             <p>
                                                                                                                {{ $referencias_laborales->puesto_inicial_laboral }}  
                                                                                                             </p>
                                                                                                        </td>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 13%">
                                                                                                             <p>
                                                                                                                 SUELDO INICIAL
                                                                                                             </p>
                                                                                                        </td>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                                                             <p>$ 
                                                                                                              {{ number_format( floatval($referencias_laborales->sueldo_inicial_laboral),2) }}  
                                                                                                             </p>
                                                                                                        </td>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 14%">
                                                                                                             <p>
                                                                                                                 FECHA INGRESO
                                                                                                             </p>
                                                                                                        </td>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                                                             <p>

                                                                                                                {{  date("d-m-Y", strtotime($referencias_laborales->fecha_ingreso_laboral)) }} 
                                                                                                             </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 13%">
                                                                                                             <p>
                                                                                                                 PUESTO FINAL
                                                                                                             </p>
                                                                                                        </td>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 40%">
                                                                                                             <p>
                                                                                                                {{ $referencias_laborales->ultimo_puesto_laboral }} 
                                                                                                             </p>
                                                                                                        </td>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 13%">
                                                                                                             <p>
                                                                                                                 SUELDO FINAL
                                                                                                             </p>
                                                                                                        </td>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                                                             <p>
                                                                                                             $
                                                                                                            {{ number_format( floatval( $referencias_laborales->sueldo_final_laboral),2) }} 
                                                                                                             </p>
                                                                                                        </td>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 14%">
                                                                                                             <p>
                                                                                                                 FECHA EGRESO
                                                                                                             </p>
                                                                                                        </td>
                                                                                                        <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                                                             <p>

                                                                                                            {{ date("d-m-Y",strtotime($referencias_laborales->fecha_egreso_laboral)) }} 
                                                                                                             </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>








                                                                                <tr>
                                                                                    <td class="letra-componente alinear-centro" colspan="2" style="width: 25%">
                                                                                         <p>
                                                                                             NOMBRE DEL JEFE INMEDIATO
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td class="letra-componente alinear-centro" colspan="2" style="width: 25%">
                                                                                         <p>
                                                                                             PUESTO,  ÁREA Y DEPARTAMENTO
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td class="letra-componente alinear-centro" colspan="2" style="width: 25%">
                                                                                         <p>
                                                                                             TIEMPO QUE DEPENDIÓ DEL JEFE INMEDIATO
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                </tr> 
                                                                                <tr>
                                                                                    <td class="letra-componente alinear-izquierda" colspan="2" style="width: 25%">
                                                                                         <p>
                                                                                          {{ $referencias_laborales->nombre_jinmediato_laboral }} 
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td class="letra-componente alinear-izquierda" colspan="2" style="width: 25%">
                                                                                         <p>
                                                                                          {{ $referencias_laborales->jpuesto_laboral }} 
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td class="letra-componente alinear-izquierda" colspan="2" style="width: 25%">
                                                                                         <p>
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
                                                                     <td class="letra-componente negrita table-border alinear-centro" >
                                                                      EVALUACIÓN DE DESEMPEÑO
                                                                      </td>
                                                                    </tr>
                                                                    <td   class="alinear-centro table-border" >
                                                                        <table class="auto-width">
                                                                            <tbody class="alinear-centro"> 

                                                                                <tr>
                                                                                    <td class="letra-componente alinear-centro negrita"  style="width: 75%">
                                                                                         <p>
                                                                                             
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-centro negrita" style="width: 5%" >
                                                                                         <p>
                                                                                             EXCELENTE 

                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-centro negrita" style="width: 5%" >
                                                                                         <p>
                                                                                            BUENO
                                                                                         </p>
                                                                                    </td >
                                                                                    <td class="letra-componente alinear-centro negrita" style="width: 5%">
                                                                                         <p>
                                                                                            REGULAR
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-centro negrita" style="width: 5%" >
                                                                                         <p>
                                                                                            MALO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-centro negrita" style="width: 5%" >
                                                                                         <p>
                                                                                            PÉSIMO 
                                                                                         </p>
                                                                                    </td>
                                                                                  </tr>
                                                                                     <tr>
                                                                               
                                                                           <td class="letra-componente alinear-izquierda"  style="width: 75%">
                                                                                      <p>
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
                                                                               
                                                                           <td class="letra-componente alinear-izquierda"  style="width: 75%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda"  style="width: 75%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 75%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 75%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 75%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda"  style="width: 75%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 75%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 75%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                      <p>
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
                                                                               
                                                                                    <td class="letra-componente alinear-izquierda" style="width: 20%">
                                                                                      <p>
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
                                            <td colspan="3" class="table-border" style="padding: 0;">
                                                
                                                        <table class="tabla-componente">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="letra-componente alinear-centro negrita" style="width: 50%">
                                                                         <p>
                                                                             TIPO DE CONTRATO
                                                                         </p>
                                                                    </td>
                                                                    <td class="letra-componente alinear-centro negrita" style="width: 50%">
                                                                         <p>
                                                                             MOTIVO DE SEPARACIÓN
                                                                         </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="letra-componente alinear-centro" style="width: 50%">
                                                                         <p>
                                                                            {{ $referencias_laborales->tipo_contrato_laboral }} 

                                                                         </p>
                                                                    </td>
                                                                    <td class="letra-componente alinear-centro" style="width: 50%">
                                                                         <p>
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
                                                    <td  colspan="3" class="table-border" style="padding: 0;">
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
                                                                                    @if($referencias_laborales->adeudo_laboral == '1')
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
                                                                                    @if($referencias_laborales->adeudo_laboral == '2')
                                                                                                                    style="background-color:#FF8000;width:20%"
                                                                                                                    @else
                                                                                                                    style="width:20%"
                                                                                                                    @endif>
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-izquierda table-border" style="width: 50%">
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
                                                                                     @if($referencias_laborales->sindicato_laboral == '1')
                                                                                                                    style="background-color:#FF8000;width:20%"
                                                                                                                    @else
                                                                                                                    style="width:20%"
                                                                                                                    @endif>
                                                                                         
                                                                                  
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-centro table-border" style="width: 10%">
                                                                                         <p>
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
                                                                                     <td class="letra-componente alinear-izquierda table-border" style="width: 50%">
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
                                                                                    @if($referencias_laborales->contrataria_laboral == '1')
                                                                                                                    style="background-color:#FF8000;width:20%"
                                                                                                                    @else
                                                                                                                    style="width:20%"
                                                                                                                    @endif>
                                                                                
                                                                                    </td>
                                                                                    <td class="letra-componente alinear-centro table-border" style="width: 10%">
                                                                                         <p>
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
                                                                                   <td class="letra-componente alinear-izquierda table-border" style="width: 50%">
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
                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>
                                        </tr>
                                         <tr>
                                            <td colspan="3" class="table-border">
                                                <tr>
                                                    <td colspan="3" style="padding: 0;">
                                                        <table class="tabla-componente">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="letra-componente alinear-centro negrita">
                                                                         <p>
                                                                             OBSERVACIONES
                                                                         </p>
                                                                    </td>                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-border">
                                                                         <p class="justificar letra-componente">

                                                                         {{ $referencias_laborales->observaciones_laboral}}
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
                                                                     <td class="letra-componente alinear-izquierda" style="width: 10%;">
                                                                                                    <p>
                                                                                                        INFORMÓ
                                                                                                    </p>
                                                                                                </td>
                                                                    <td class="letra-componente alinear-izquierda" style="width: 40%;">
                                                                         <p>
 {{ $referencias_laborales->informo_sobre_puesto_laboral}}  
                                                                         </p>
                                                                    </td>
                                                                    <td class="letra-componente alinear-izquierda" style="width: 10%">
                                                                         <p>
                                                                             PUESTO
                                                                         </p>
                                                                    </td>
                                                                    <td class="letra-componente alinear-izquierda" style="width: 40%">
                                                                         <p>
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

                                        

                                                    <tr>
                                                        <td colspan="3" class="table-border">
                                                         <span style=" display: inline-block;height: 15px;"></span>
                                                        </td>
                                                     </tr>


     <!---------------------------------------   END REFERENCIAS LABORALES ----------------------------------------- -->
       <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-centro titulo-componente-principal">
                                                                 <p>
                                                                    FOTO EXTERIOR DEL DOMICILIO
                                                                 </p>
                                                            </td>                                                                    
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%; height:10%">
                                                                <div style="width: 100%;" class="alinear-centro"> 
                                                                 
                         
                          @if( $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first() )
                                    {{ Html::image(
                                                        $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                        $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first()->archivo,'',['style' => 'max-width:100%;']) }}
                                                                                                                  
                                                     
                                                            
                                                        @else
                                                             
                                                        {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',['style' => 'max-width:100%; ']) !!}        

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
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-centro titulo-componente-principal">
                                                                 <p>
                                                                     FOTO INTERIOR DEL DOMICILIO
                                                                 </p>
                                                            </td>                                                                    
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%; height:10%">
                                                                <div style="width: 100%;" class="alinear-centro"> 
                                                                 
                         
                          @if( $estudio->imagenes->where('tipo','Vivienda Interior')->sortByDesc('fecha_alta')->first() )
                                    {{ Html::image(
                                                        $estudio->imagenes->where('tipo','Vivienda Interior')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                        $estudio->imagenes->where('tipo','Vivienda Interior')->sortByDesc('fecha_alta')->first()->archivo,'',['style' => 'max-width:100%;']) }}
                                                                                                                  
                                                     
                                                            
                                                        @else
                                                             
                                                        {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',['style' => 'max-width:100%; ']) !!}        

                                                        @endif

                                                        </div>
                                                                    
                                                              
                                                            </td>                                                                    
                                                        </tr>
                                                   
                                                    </tbody>
                                                </table>
                                            </td>
                                                
                                        </tr>





                    </tbody>
                </table>
    <script>
        window.print();
    </script>



    
</body>
</html>
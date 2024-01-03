<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>ESE Becas</title>
    <!-- Latest compiled and minified CSS -->
    
    
    {!! Html::style('assets/css/pdf-formato-grid.css') !!}
</head>
    <body>

    
<!-- ------------------------------------------------------- ENCABEZADO -------------------------------------->

                <table>
                    <tbody>
                        <tr>
                            <td class="logo-plantilla table-border">
                                {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo"]) !!}           
                            </td>
                            <td class="logo-main table-border">
                                <p class="titulo-principal alinear-centro">ESTUDIO SOCIOECONÓMICO BECAS</p>
                            </td>
                            <td class="fecha-plantilla table-border">
                                    <table class="table-border">
                                        <thead>
                                            <tr>
                                                <th>DIA</th>
                                                <th>MES</th>
                                                <th>AÑO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="letra-detalle">
                                                 

                                                {{isset($data['estudio']->fields->where('key','encabezado_mes_becas')->first()->value)?$data['estudio']->fields->where('key','encabezado_mes_becas')->first()->value:""}}
                                                </td>
                                                <td class="letra-detalle">
                                                {{isset($data['estudio']->fields->where('key','encabezado_dia_becas')->first()->value)?$data['estudio']->fields->where('key','encabezado_dia_becas')->first()->value:""}}
                                                </td>
                                                <td class="letra-detalle">
                                                {{isset($data['estudio']->fields->where('key','encabezado_año_becas')->first()->value)?$data['estudio']->fields->where('key','encabezado_año_becas')->first()->value:""}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-border">
                                <table class="detalle-cliente table-border">                                        
                                        <tbody>
                                            <tr>                                             
                                                <td class="titulo-detalle-cliente alinear-derecha  table-border">Escuela:</td>
                                                <td class="detalle-cliente-campo  table-border border-footer"><p class="border-footer letra-detalle">
                                                <strong>{{isset($data['estudio']->fields->where('key','encabezado_escuela_becas')->first()->value)?$data['estudio']->fields->where('key','encabezado_escuela_becas')->first()->value:""}}</strong></p></td>
                                            </tr>
                                            <tr>                                             
                                                <td class="titulo-detalle-cliente alinear-derecha  table-border">Nombre:</td>
                                                <td class="detalle-cliente-campo  table-border border-footer"><p class="border-footer letra-detalle"><strong>{{isset($data['estudio']->fields->where('key','encabezado_nombre_becas')->first()->value)?$data['estudio']->fields->where('key','encabezado_nombre_becas')->first()->value:""}}</strong></p></td>
                                            </tr>
                                           
                                            <tr>
                                                <td colspan="2" class="table-border alinear-centro">
                                                    <center><p class="letra-detalle alinear-centro">
                                                        El presente estudio socioeconómico se basa en recabar la información obtenida del candidato (a), dentro de tres áreas específicas: económica, social y escolar. 
                                                        A continuación se muestra un resumen de la investigación realizada. Para más detalles revisar el contenido completo.                                                     
                                                    </p></center>   
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                            </td>
                            <td>
                                {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo"]) !!}           
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="alinear-derecha table-border"><strong>STATUS</strong></td>
                            <td class="alinear-centro"><strong>{{isset($data['estudio']->fields->where('key','encabezado_status_becas')->first()->value)?$data['estudio']->fields->where('key','encabezado_status_becas')->first()->value:""}}</strong></td>
                        </tr>

<!-- -------------------------------------------------------  END ENCABEZADO -------------------------------------->

<!-- -------------------------------------------------------  DATOS GENERALES  -------------------------------------->
                    <tr>
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                    DATOS GENERALES DEL SOLICITANTE
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-derecha table-label table-border">NOMBRE DEL SOLICITANTE:</td>
                                                            <td class="letra-componente table-border">
                                                            <p class="border-footer"> 
                                                            {{isset($data['estudio']->fields->where('key','datos_gral_nombre_solicitante_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_nombre_solicitante_becas')->first()->value:""}}
                                                             </p> </td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-derecha table-label table-border">NOMBRE DEL PADRE Ó TUTOR:</td>
                                                            <td class="letra-componente table-border">
                                                            <p class="border-footer"> 
                                                                {{isset($data['estudio']->fields->where('key','datos_gral_nombre_padre_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_nombre_padre_becas')->first()->value:""}}
                                                            </p> </td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">EDAD:</td>
                                                            <td class="letra-componente table-border">
                                                            <p class="border-footer">
                                                             {{isset($data['estudio']->fields->where('key','datos_gral_edad_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_edad_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">FECHA NACIMIENTO:</td>
                                                            <td class="letra-componente table-border">
                                                            <p class="border-footer">
                                                              {{isset($data['estudio']->fields->where('key','datos_gral_fecha_nacimiento_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_fecha_nacimiento_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">LUGAR DE NACIMIENTO:</td>
                                                            <td class="letra-componente table-border">
                                                            <p class="border-footer">
                                                              {{isset($data['estudio']->fields->where('key','datos_gral_lugar_nacimiento_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_lugar_nacimiento_becas')->first()->value:""}}
                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </td>

                                        </tr>


                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">NACIONALIDAD:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_gral_nacionalidad_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_nacionalidad_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">ESTADO CIVIL:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                            {{isset($data['estudio']->fields->where('key','datos_gral_estado_civil_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_estado_civil_becas')->first()->value:""}}</p></td>
                                                            <td class="table-border alinear-derecha table-label">SEXO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                               {{isset($data['estudio']->fields->where('key','datos_gral_sexo_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_sexo_becas')->first()->value:""}}
                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">CURP:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_gral_curp_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_curp_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">RFC:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_gral_rfc_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_rfc_becas')->first()->value:""}}
                                                            </p></td>
                                                             
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                          <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">EMAIL:</td>
                                                            <td class="letra-componente table-border" colspan="2"><p class="border-footer">  {{isset($data['estudio']->fields->where('key','datos_gral_email_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_email_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">LABORA:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer alinear-centro">
                                                                
                                                                {{isset($data['estudio']->fields->where('key','datos_gral_labora_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_labora_becas')->first()->value:""}}
                                                            </p></td>
                                                         
                                                             
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                                                      
                                    </tbody>
                                    
                                </table>
                            </td>
                        </tr>


<!-- -------------------------------------------------------  END DATOS GENERALES  -------------------------------------->

<!-- -------------------------------------------------------  DOMICILIO-------------------------------------->
                    <tr>  
                        <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                     <tr>
                                         <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                    DOMICILIO
                                                </p>
                                            </td>
                                        </tr>

                                           <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label-lg">CALLE:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                            {{isset($data['estudio']->fields->where('key','domicilio_calle_becas')->first()->value)?$data['estudio']->fields->where('key','domicilio_calle_becas')->first()->value:""}}
                                                            </p></td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">NÚMERO EXTERIOR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','domicilio_num_ext_becas')->first()->value)?$data['estudio']->fields->where('key','domicilio_num_ext_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">NÚMERO INTERIOR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','domicilio_num_int_becas')->first()->value)?$data['estudio']->fields->where('key','domicilio_num_int_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">DELEGACIÓN O MUNICIPIO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                            {{isset($data['estudio']->fields->where('key','domicilio_delegacion_becas')->first()->value)?$data['estudio']->fields->where('key','domicilio_delegacion_becas')->first()->value:""}}
                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">COLONIA:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                  {{isset($data['estudio']->fields->where('key','domicilio_colonia_becas')->first()->value)?$data['estudio']->fields->where('key','domicilio_colonia_becas')->first()->value:""}}  

                                                            </p></td>
                                                           
                                                            <td class="table-border alinear-derecha table-label">TELÉFONO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','domicilio_telefono_becas')->first()->value)?$data['estudio']->fields->where('key','domicilio_telefono_becas')->first()->value:""}}  

                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">C.P.</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','domicilio_cp_becas')->first()->value)?$data['estudio']->fields->where('key','domicilio_cp_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">TIEMPO VIVIENDO EN EL DOMICILIO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','domicilio_tiempo_viviendo_becas')->first()->value)?$data['estudio']->fields->where('key','domicilio_tiempo_viviendo_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">CELULAR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','domicilio_celular_becas')->first()->value)?$data['estudio']->fields->where('key','domicilio_celular_becas')->first()->value:""}}
                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">ENTRE QUE CALLES SE ENCUENTRA EL DOMICILIO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                               {{isset($data['estudio']->fields->where('key','domicilio_entre_calles_becas')->first()->value)?$data['estudio']->fields->where('key','domicilio_entre_calles_becas')->first()->value:""}} 

                                                            </p></td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>                                          
                                            
                                    </tbody>
                                </table>
                        </td>
                    </tr>

<!-- -------------------------------------------------------  END DOMICILIO-------------------------------------->

<!-- -------------------------------------------------------  INFORMACION ESCOLAR -------------------------------------->
<tr>  
                        <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                     <tr>
                                         <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                    INFORMACIÓN ESCOLAR
                                                </p>
                                            </td>
                                        </tr>

                                           <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label-lg">GRADO ESCOLAR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer"> {{isset($data['estudio']->fields->where('key','informacion_ecolar_grado_escolar_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_ecolar_grado_escolar_becas')->first()->value:""}} </p></td>
                                                            <td class="table-border alinear-derecha table-label-lg">PLANTEL:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','informacion_ecolar_plantel_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_ecolar_plantel_becas')->first()->value:""}} 

                                                            </p></td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">NOMBRE DE LA ESCUELA:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','informacion_ecolar_nombre_ecuela_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_ecolar_nombre_ecuela_becas')->first()->value:""}} 
                                                            </p></td>
                                                             
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">NO. DE CUENTA:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">{{isset($data['estudio']->fields->where('key','informacion_ecolar_num_cuenta_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_ecolar_num_cuenta_becas')->first()->value:""}} </p></td>
                                                           
                                                            <td class="table-border alinear-derecha table-label">PROMEDIO GENERAL:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','informacion_ecolar_primedio_general_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_ecolar_primedio_general_becas')->first()->value:""}}
                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">MOTIVO POR EL CUÁL SOLICITA LA BECA:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer"> {{isset($data['estudio']->fields->where('key','informacion_ecolar_motivo_beca_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_ecolar_motivo_beca_becas')->first()->value:""}}
                                                            </p></td> </p></td>
                                                           
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                         
                                            
                                    </tbody>
                                </table>
                        </td>
                    </tr>





<!-- -------------------------------------------------------  END INFORMACION ESCOLAR -------------------------------------->
<!-- -------------------------------------------------------  RESUMEN -------------------------------------->
                     <tr>
                        <td colspan="3">
                                <table class="tabla-componente" class="table-border">
                                    <tbody>
                                     <tr>
                                         <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                    RESUMEN
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                         <td>
                                                <p class="letra-componente table-border">
                                                    <p class="letra-detalle">
                                                    <strong>SITUACIÓN SOCIAL:</strong> El  solicitante  {{isset($data['estudio']->fields->where('key','datos_gral_nombre_solicitante_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_nombre_solicitante_becas')->first()->value:""}} de {{isset($data['estudio']->fields->where('key','datos_gral_edad_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_edad_becas')->first()->value:""}} años de edad; su estado civil es {{isset($data['estudio']->fields->where('key','datos_gral_estado_civil_becas')->first()->value)?$data['estudio']->fields->where('key','datos_gral_estado_civil_becas')->first()->value:""}} , actualmente vive en compañía de ____ en una ______ , la cual se ubica en una zona _____. El mobiliario se encuentra____ estado de conservación y es de estilo_____
                                                    </p>
                                                    <p class="letra-detalle">
                                                    <STRONG>SITUACIÓN  ESCOLAR:</STRONG> El candidato refiere que su ultimo grado de estudios es {{isset($data['estudio']->fields->where('key','informacion_ecolar_grado_escolar_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_ecolar_grado_escolar_becas')->first()->value:""}} en la escuela/institución/etc.  {{isset($data['estudio']->fields->where('key','informacion_ecolar_plantel_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_ecolar_plantel_becas')->first()->value:""}} 
                                                    del periodo_________, muestra como documento probatorio________. Se observa que ha tenido una trayectoria escolar destacada obteniendo promedio de   {{isset($data['estudio']->fields->where('key','informacion_ecolar_primedio_general_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_ecolar_primedio_general_becas')->first()->value:""}}                                                    </p>
                                                    <p class="letra-detalle">
                                                    <STRONG>SITUACIÓN ECONOMICA:</STRONG> El candidato obtiene sus ingresos económicos ______________ , los cuales son suficientes / insuficientes para cubrir sus egresos económicos. 
                                                    </p> 
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </td>
                    </tr>
                     <tr>
                            <td colspan="3" class="table-border">
                                <div class="box">
                                    
                                    <p class="titulo-componente">
                                           Persona que atendió al investigador: {{isset($data['estudio']->fields->where('key','firma_persona_atendio_investigador_becas')->first()->value)?$data['estudio']->fields->where('key','firma_persona_atendio_investigador_becas')->first()->value:""}}
                                    </p>                           

                                    <p class="alinear-centro border-top box-firma">Nombre y firma del investigador</p>                                    
                                </div>
                                <div class="box justificar letra-footer">
                                    Gen-T, Ohio N.15, Col.Napoles C. P.03810 , Ciudad de México  DECLARACIÓN: El entrevistado declara que la información manifestada en este estudio es verdadera, por lo cual tendrá vigencia y entrará en vigor el Art. 47 Fracc. I de la L.F.T. 
                                </div>
                            </td>
                        </tr>

<!-- -------------------------------------------------------  END  RESUMEN -------------------------------------->
<!-- -------------------------------------------------------  DATOS DEL PADRE O TUTOR -------------------------------------->

                     <tr>
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                   DATOS DEL PADRE O TUTOR
                                                </p>
                                            </td>
                                        </tr>
                                     
                                        <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-derecha table-label table-border">NOMBRE DEL PADRE Ó TUTOR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer"> 
                                                                  {{isset($data['estudio']->fields->where('key','datos_padre_nombre_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_nombre_becas')->first()->value:""}}
                                            
                                                              </p> </td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">EDAD:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_padre_edad_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_edad_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">ESTADO CIVIL:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_padre_estado_civil_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_estado_civil_becas')->first()->value:""}}

                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">LUGAR DE NACIMIENTO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_padre_lugar_nacimiento_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_lugar_nacimiento_becas')->first()->value:""}}

                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">CURP:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_padre_curp_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_curp_becas')->first()->value:""}}

                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">RFC:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                  {{isset($data['estudio']->fields->where('key','datos_padre_rfc_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_rfc_becas')->first()->value:""}}

                                                            </p></td>
                                                             
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                             <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label-lg">CALLE:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer"> {{isset($data['estudio']->fields->where('key','datos_padre_calle_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_calle_becas')->first()->value:""}}
</p></td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">NÚMERO EXTERIOR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_padre_num_ext_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_num_ext_becas')->first()->value:""}}
                                                            </p></td>

                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">NÚMERO INTERIOR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_padre_num_int_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_num_int_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">DELEGACIÓN O MUNICIPIO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                  {{isset($data['estudio']->fields->where('key','datos_padre_delegacion_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_delegacion_becas')->first()->value:""}}
                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">COLONIA:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer"> {{isset($data['estudio']->fields->where('key','datos_padre_colonia_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_colonia_becas')->first()->value:""}}</p></td>
                                                           
                                                            <td class="table-border alinear-derecha table-label">TELÉFONO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_padre_telefono_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_telefono_becas')->first()->value:""}}
                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                           <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">C.P.</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_padre_cp_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_cp_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">TIEMPO VIVIENDO EN EL DOMICILIO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                               {{isset($data['estudio']->fields->where('key','datos_padre_tiempo_viviendo_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_tiempo_viviendo_becas')->first()->value:""}}

                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">CELULAR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                
                                                                 {{isset($data['estudio']->fields->where('key','datos_padre_celular_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_celular_becas')->first()->value:""}}
                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">ENTRE QUE CALLES SE ENCUENTRA EL DOMICILIO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_padre_entre_calles_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_entre_calles_becas')->first()->value:""}}
                                                            </p></td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                           <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">EMAIL:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_padre_email_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_email_becas')->first()->value:""}}
                                                            </p></td>
                                                           
                                                            <td class="table-border alinear-derecha table-label">SI NO ES LE PADRE INDIQUE EL PARENTESCO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_padre_si_no_es_padre_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_si_no_es_padre_becas')->first()->value:""}}
                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr> 
                                         <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">NOMBRE DE LA EMPRESA EN DONDE TRABAJA:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_padre_empresa_donde_trabaja_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_empresa_donde_trabaja_becas')->first()->value:""}}
                                                            </p></td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">GIRO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_padre_giro_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_giro_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">PUESTO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                    {{isset($data['estudio']->fields->where('key','datos_padre_puesto_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_puesto_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">ANTIGÜEDAD:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_padre_antiguedad_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_antiguedad_becas')->first()->value:""}}

                                                            </p></td> 
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
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente">
                                                                     OBSERVACIONES
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-detalle">
                                                                  {{isset($data['estudio']->fields->where('key','datos_padre_observaciones_becas')->first()->value)?$data['estudio']->fields->where('key','datos_padre_observaciones_becas')->first()->value:""}}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>




<!-- -------------------------------------------------------  END DATOS DEL PADRE O TUTOR -------------------------------------->
<!-- -------------------------------------------------------  DATOS DE LA MADRE O TUTORA -------------------------------------->

                     <tr>
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                   DATOS DE LA MADRE Ó TUTOR
                                                </p>
                                            </td>
                                        </tr>
                                     
                                        <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-derecha table-label table-border">NOMBRE DE LA MADRE Ó TUTOR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_madre_nombre_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_nombre_becas')->first()->value:""}}
                                                             </p> </td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">EDAD:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_madre_edad_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_edad_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">ESTADO CIVIL:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_madre_estado_civil_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_estado_civil_becas')->first()->value:""}}

                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">LUGAR DE NACIMIENTO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_madre_lugar_nacimiento_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_lugar_nacimiento_becas')->first()->value:""}}

                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">CURP:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                   {{isset($data['estudio']->fields->where('key','datos_madre_curp_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_curp_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">RFC:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_madre_rfc_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_rfc_becas')->first()->value:""}}
                                                            </p></td>
                                                             
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                             <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label-lg">CALLE:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_madre_calle_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_calle_becas')->first()->value:""}}
                                                            </p></td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">NÚMERO EXTERIOR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_madre_num_ext_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_num_ext_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">NÚMERO INTERIOR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_madre_num_int_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_num_int_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">DELEGACIÓN O MUNICIPIO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_madre_delegacion_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_delegacion_becas')->first()->value:""}}

                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">COLONIA:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_madre_colonia_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_colonia_becas')->first()->value:""}}

                                                            </p></td>
                                                           
                                                            <td class="table-border alinear-derecha table-label">TELÉFONO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_madre_telefono_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_telefono_becas')->first()->value:""}}

                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                           <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">C.P.</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_madre_cp_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_cp_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">TIEMPO VIVIENDO EN EL DOMICILIO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                    {{isset($data['estudio']->fields->where('key','datos_madre_tiempo_viviendo_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_tiempo_viviendo_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">CELULAR:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_madre_celular_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_celular_becas')->first()->value:""}}
                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">ENTRE QUE CALLES SE ENCUENTRA EL DOMICILIO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_madre_entre_calles_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_entre_calles_becas')->first()->value:""}}
                                                            </p></td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                           <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">EMAIL:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_madre_email_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_email_becas')->first()->value:""}}
                                                            </p></td>
                                                           
                                                            <td class="table-border alinear-derecha table-label">SI NO ES LA MADRE INDIQUE EL PARENTESCO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                 {{isset($data['estudio']->fields->where('key','datos_madre_si_no_es_padre_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_si_no_es_padre_becas')->first()->value:""}}

                                                            </p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr> 
                                         <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">NOMBRE DE LA EMPRESA EN DONDE TRABAJA:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_madre_empresa_donde_trabaja_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_empresa_donde_trabaja_becas')->first()->value:""}}
                                                            </p></td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-border alinear-derecha table-label">GIRO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_madre_giro_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_giro_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">PUESTO:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                   {{isset($data['estudio']->fields->where('key','datos_madre_puesto_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_puesto_becas')->first()->value:""}}
                                                            </p></td>
                                                            <td class="table-border alinear-derecha table-label">ANTIGÜEDAD:</td>
                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                {{isset($data['estudio']->fields->where('key','datos_madre_antiguedad_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_antiguedad_becas')->first()->value:""}}
                                                            </p></td> 
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
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente">
                                                                     OBSERVACIONES
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-detalle">
                                                                    {{isset($data['estudio']->fields->where('key','datos_madre_observaciones_becas')->first()->value)?$data['estudio']->fields->where('key','datos_madre_observaciones_becas')->first()->value:""}}
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
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente-principal">
                                                                     ESTRUCTURA FAMILIAR
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table class="tabla-componente">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="label">PARENTESCO</th>
                                                                            <th class="label">NOMBRE</th>
                                                                            <th class="label">EDAD</th>
                                                                            <th class="label">EDO. CIVIL</th>
                                                                            <th class="label">ESCOLARIDAD</th>
                                                                            <th class="label">OCUPACION </th>
                                                                            <th class="label">DEPENDIENTE ECONÓMICO</th>    
                                                                      
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                     



<!-- -------------------------------------------------------  END DATOS DELA MADRE O TUTORA -------------------------------------->
<!---------------------------------------------------------- ESTRTUCTURA FAMILIAR ------------------------------------------------>

                                  <?php 
                                        $pintar = false;
                                        $indice = 1;
                                        
                                      $numero_col = isset($data['estudio']->fields->where('key','estructura_familiar_estructura_familiar_becas')->first()->head_num_col)?$data['estudio']->fields->where('key','estructura_familiar_estructura_familiar_becas')->first()->head_num_col:null;
                                      if(isset($numero_col)){
                                     
                                    ?>
                                    @foreach( $data['estudio']->fields->where('key','estructura_familiar_estructura_familiar_becas')->first()->fieldsRowsColums() as  $index => $obj_col )
                                    <?php $datos  = [];?>
                                    <tr>
                                    @foreach( $obj_col as $col )
                                            <?php 
                                                $datos[$col->key] = $col->value;

                                                if( $indice == $numero_col )
                                                {
                                                    $pintar = true;
                                                }

                                                $indice++;
                                            ?>


                                        @endforeach
                                            @if( $pintar )
                                                                                                                        
                                                                            <td class="table-border"><p class="label alinear-derecha">
                                                                                {{ isset($datos['estructura_familiar_parentesco_becas_' . $index .'_row'])?$datos['estructura_familiar_parentesco_becas_' . $index .'_row']:"" }}

                                                                            </p></td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                                {{ isset($datos['estructura_familiar_nombre_becas_' . $index .'_row'])?$datos['estructura_familiar_nombre_becas_' . $index .'_row']:"" }}
                                                                            </p></td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                                {{ isset($datos['estructura_familiar_edad_becas_' . $index .'_row'])?$datos['estructura_familiar_edad_becas_' . $index .'_row']:"" }}

                                                                            </p></td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                                 {{ isset($datos['estructura_familiar_edo_civil_becas_' . $index .'_row'])?$datos['estructura_familiar_edo_civil_becas_' . $index .'_row']:"" }}
                                                                            </p></td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                                  {{ isset($datos['estructura_familiar_escolaridad_becas_' . $index .'_row'])?$datos['estructura_familiar_escolaridad_becas_' . $index .'_row']:"" }}
                                                                            </p></td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                                  {{ isset($datos['estructura_familiar_ocupacion_becas_' . $index .'_row'])?$datos['estructura_familiar_ocupacion_becas_' . $index .'_row']:"" }}
                                                                            </p></td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                                {{ isset($datos['estructura_familiar_dependiente_economico_becas_' . $index .'_row'])?$datos['estructura_familiar_dependiente_economico_becas_' . $index .'_row']:"" }}

                                                                            </p></td>
                                                                             <?php  $pintar = false; $indice = 1;?>
                                                                        @endif
                                                                          </tr> 
                                                                         @endforeach 
                                                                <?php } ?> 
                                                                                                                                             
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            
                                            </tr>
                                           



<!-- ------------------------------------------------------ END ESTRUCTURA FAMILIAR ---------------------------------------------- -->
<!--------------------------------------------------------- INFORMACIÓN FAMILIAR ------------------------------------------------- -->

                                        <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente-principal">
                                                                     INFORMACIÓN FAMILIAR                                                                   
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table class="tabla-componente">                                                                    
                                                                    <tbody>
                                                                        <tr>                                                                             
                                                                            <td class="table-border table-label">
                                                                                <p class="alinear-derecha">
                                                                                ¿Con quién habita actualmente?                          
                                                                                </p>
                                                                            </td>
                                                                            <td class="letra-componente table-border">
                                                                                <p class="border-footer">
                                                                                     {{isset($data['estudio']->fields->where('key','informacion_familiar_con_quien_habita_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_familiar_con_quien_habita_becas')->first()->value:""}}
                                                                                </p>
                                                                            </td>
                                                                            
                                                                        </tr>  
                                                                        <tr>                                                                            
                                                                            <td class="table-border table-label">
                                                                                <p class="alinear-derecha">
                                                                                    ¿Cómo considera que es su relación con ellos?                           
                                                                                </p>
                                                                            </td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                                 {{isset($data['estudio']->fields->where('key','informacion_familiar_considera_relacion_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_familiar_considera_relacion_becas')->first()->value:""}}

                                                                            </p></td>
                                                                        </tr>  
                                                                        <tr>                                                                            
                                                                            <td class="table-border table-label">
                                                                                <p class="alinear-derecha">
                                                                                   ¿Tiene familiares viviendo en el extranjero?, ¿Quiénes y en dónde?                           
                                                                                </p>
                                                                            </td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                                {{isset($data['estudio']->fields->where('key','informacion_familiar_familiares_viviendo_ext_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_familiar_familiares_viviendo_ext_becas')->first()->value:""}}
                                                                            </p></td>
                                                                        </tr> 
                                                                        <tr>
                                                                            <td class="table-border table-label">
                                                                                <p class="alinear-derecha">
                                                                                    ¿Con qué frecuencia los visita?                         
                                                                                </p>
                                                                            </td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                                {{isset($data['estudio']->fields->where('key','informacion_familiar_frecuencia_visita_becas')->first()->value)?$data['estudio']->fields->where('key','informacion_familiar_frecuencia_visita_becas')->first()->value:""}}

                                                                            </p></td>
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
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente">
                                                                     OBSERVACIONES DEL CUADRO FAMILIAR
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-detalle">
                                                              
                                                               {{isset($data['estudio']->fields->where('key','estructura_familiar_observaciones_familiares_becas')->first()->value)?$data['estudio']->fields->where('key','estructura_familiar_observaciones_familiares_becas')->first()->value:""}}

                                                                    
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>



<!--------------------------------------------------------- END INFROMACION FAMILIAR --------------------------------------------- -->

<!--------------------------------------------------------- SITUACIÓN ECONÓMICA--------------------------------------------- -->
                                        <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="tabla-componente ">
                                                    <tbody>
                                                        <tr>
                                                           <td colspan="3" class="table-border">
                                                                <table class="tabla-componente">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td >
                                                                                 <p class="alinear-centro titulo-componente-principal">
                                                                                     INFORMACIÓN FAMILIAR                                                                   
                                                                                 </p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        <tr> 
                                                            <td colspan="3" class="table-border">
                                                                <table class="tabla-componente table-border">
                                                                    <tbody>
                                                                        <tr>
                                                                         <td class="table-border table-label">¿De quién depende económicamente? </td> 
                                                                         <td class="alinear-centro letra-detalle">PADRE</td>
                                                                         <td class="alinear-centro letra-detalle">MADRE</td>
                                                                         <td class="alinear-centro letra-detalle">AMBOS</td>
                                                                         <td class="alinear-centro letra-detalle">OTROS</td>
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
                                                                         <td class="label alinear-derecha table-border ">Especifique:</td> 
                                                                         <td class="alinear-centro letra-detalle table-border">
                                                                         <p class="border-footer le">
                                                                           {{isset($data['estudio']->fields->where('key','situacion_economica_especifique_becas')->first()->value)?$data['estudio']->fields->where('key','situacion_economica_especifique_becas')->first()->value:""}}

                                                                         </p></td>
                                                                         
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                         <tr> 
                                                            <td colspan="3" class="table-border">
                                                                <table class="tabla-componente table-border">
                                                                    <tbody>
                                                                        <tr>
                                                                         <td class="table-border table-label">Número de personas que viven en la casa-habitación</td> 
                                                                         <td class="alinear-centro letra-detalle"><p class="border-footer le">
                                                                             {{isset($data['estudio']->fields->where('key','situacion_economica_num_personas_viven_becas')->first()->value)?$data['estudio']->fields->where('key','situacion_economica_num_personas_viven_becas')->first()->value:""}}
                                                                         </p></td>
                                                                         <td class="alinear-centro table-label">Número de personas dependientes de los ingresos familiares</td>
                                                                         <td class="alinear-centro letra-detalle"><p class="border-footer le">
                                                                               {{isset($data['estudio']->fields->where('key','situacion_economica_num_personas_depende_becas')->first()->value)?$data['estudio']->fields->where('key','situacion_economica_num_personas_depende_becas')->first()->value:""}}
                                                                         </p></td>
                                                                         <td class="alinear-centro table-label">Número de personas que aportan al ingreso familiar</td>
                                                                          <td class="alinear-centro letra-detalle"><p class="border-footer le">
                                                                                 {{isset($data['estudio']->fields->where('key','situacion_economica_num_personas_aportan_becas')->first()->value)?$data['estudio']->fields->where('key','situacion_economica_num_personas_aportan_becas')->first()->value:""}}
                                                                          </p></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


<!--------------------------------------------------------- END SITUACIÓN ECONÓMICA--------------------------------------------- -->
<!-------------------------------------------------------- INGRESOS FAMILIARES ------------------------------------------------ -->

       <?php 
        $total_ingresos=null;
        $total_ingresos_familiares=null;
        $pintar = false;
        $indice = 1;
        
        $numero_col =  $numero_col = isset($data['estudio']->fields->where('key','ingresos_familiares_ingresos_familiares_becas')->first()->head_num_col)?$data['estudio']->fields->where('key','ingresos_familiares_ingresos_familiares_becas')->first()->head_num_col:null;
     if(isset($numero_col)){
    ?>
    @foreach( $data['estudio']->fields->where('key','ingresos_familiares_ingresos_familiares_becas')->first()->fieldsRowsColums() as  $index => $obj_col )
    <?php $datos  = [];?>
    <tr>
    @foreach( $obj_col as $col )
            <?php 
                $datos[$col->key] = $col->value;

                if( $indice == $numero_col )
                {
                    $pintar = true;
                }

                $indice++;
            ?>
        @endforeach
            @if( $pintar )
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                    INGRESOS FAMILIARES
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-derecha table-label ">NOMBRE:</td>
                                                            <td class="letra-componente "><p>
                                                                     {{ isset($datos['ingresos_familiares_nombre_becas_' . $index .'_row'])?$datos['ingresos_familiares_nombre_becas_' . $index .'_row']:"" }}
                                                              </p> </td>
                                                            <td class="alinear-derecha table-label">PARENTESCO</td>
                                                            <td class="letra-componente"><p >
                                                                    {{ isset($datos['ingresos_familiares_parentesco_becas_' . $index .'_row'])?$datos['ingresos_familiares_parentesco_becas_' . $index .'_row']:"" }}
                                                             </p> </td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-derecha table-label ">NOMBRE DE LA EMPRESA EN DONDE TRABAJA:</td>
                                                            <td class="letra-componente "><p>
                                                                {{ isset($datos['ingresos_familiares_nombre_empresa_becas_' . $index .'_row'])?$datos['ingresos_familiares_nombre_empresa_becas_' . $index .'_row']:"" }}
                                                            </p> </td>
                                                                                                                      
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-derecha table-label ">GIRO:</td>
                                                            <td class="letra-componente "><p> 
                                                                    {{ isset($datos['ingresos_familiares_giro_becas_' . $index .'_row'])?$datos['ingresos_familiares_giro_becas_' . $index .'_row']:"" }}
                                                              </p> </td>
                                                            <td class="alinear-derecha table-label">PUESTO:</td>
                                                            <td class="letra-componente"><p >
                                                                       {{ isset($datos['ingresos_familiares_puesto_becas_' . $index .'_row'])?$datos['ingresos_familiares_puesto_becas_' . $index .'_row']:"" }}
                                                             </p> </td>
                                                            <td class="alinear-derecha table-label">ANTIGÜEDAD:</td>
                                                            <td class="letra-componente"><p > 
                                                                {{ isset($datos['ingresos_familiares_antiguedad_becas_' . $index .'_row'])?$datos['ingresos_familiares_antiguedad_becas_' . $index .'_row']:"" }}
                                                              </p> </td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-derecha table-label ">SUELDO:</td>
                                                            <td class="letra-componente "><p> 
                                                                {{ isset($datos['ingresos_familiares_sueldo_becas_' . $index .'_row'])?$datos['ingresos_familiares_sueldo_becas_' . $index .'_row']:"" }}    
                                                            </p> </td>
                                                            <td class="alinear-derecha table-label">COMISIONES:</td>
                                                            <td class="letra-componente"><p >  
                                                            {{ isset($datos['ingresos_familiares_comisiones_becas_' . $index .'_row'])?$datos['ingresos_familiares_comisiones_becas_' . $index .'_row']:"" }}    
                                                            </p> </td>
                                                            <td class="alinear-derecha table-label">OTROS INGRESOS: (Especificar)</td>
                                                            <td class="letra-componente"><p >$  
                                                                     {{ isset($datos['ingresos_familiares_otros_ingresos_becas_' . $index .'_row'])?$datos['ingresos_familiares_otros_ingresos_becas_' . $index .'_row']:"" }} 
                                                             </p> </td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                          <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                          <td class="alinear-derecha table-label table-border" ></td><td class="alinear-derecha table-label table-border" ></td><td class="alinear-derecha table-label table-border" ></td>
                                                            <td class="alinear-derecha table-label ">TOTAL:</td>
                                                             <?php
                                                               $sueldo=null;
                                                               $comisiones=null;
                                                               $otros_ing=null;
                                                               $sueldo=isset($datos['ingresos_familiares_sueldo_becas_' . $index .'_row'])?$datos['ingresos_familiares_sueldo_becas_' . $index .'_row']:0;
                                                               $comisiones= isset($datos['ingresos_familiares_comisiones_becas_' . $index .'_row'])?$datos['ingresos_familiares_comisiones_becas_' . $index .'_row']:0; 
                                                               $otros_ing=isset($datos['ingresos_familiares_otros_ingresos_becas_' . $index .'_row'])?$datos['ingresos_familiares_otros_ingresos_becas_' . $index .'_row']:0;   

                                                              $total_ingresos=($sueldo+$comisiones+$otros_ing);
                                                              $total_ingresos_familiares+=($sueldo+$comisiones+$otros_ing);
                                                              isset($total_ingresos_familiares)?$total_ingresos_familiares:0;
                                                            ?>
                                                        
                                                            <td class="letra-componente "><p> ${{ number_format($total_ingresos, 2, ',', ' ') }}</p> </td>
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                          

                                    </tbody>
                                </table>
                            </td>
                                <?php  $pintar = false; $indice = 1;?>

                                     @endif
                         </tr>
                             @endforeach 
                        <?php } ?>
<!--------------------------------------------------------END INGRESOS FAMILIARES --------------------------------------------- -->
<!-------------------------------------------------------- OTRAS FUENTES ECONOMICA -------------------------------------------- -->
                        <tr>
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                    OTRAS FUENTES DE INGRESO ECONÓMICAS 
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-centro table-label ">NOMBRE:</td>
                                                            <td class="alinear-centro table-label ">DESCRIPCIÓN:</td>
                                                            <td class="alinear-centro table-label">MONTO</td>
                                                          
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                      
                                                            <?php 
                                                            $total_otros_ingresos=null;
                                                            $pintar = false;
                                                            $indice = 1;
                                                            
        $numero_col =  $numero_col = isset($data['estudio']->fields->where('key','otras_fuentes_ingresos_becas')->first()->head_num_col)?$data['estudio']->fields->where('key','otras_fuentes_ingresos_becas')->first()->head_num_col:null;
                                                        if(isset($numero_col)){
                                                        ?>
        @foreach( $data['estudio']->fields->where('key','otras_fuentes_ingresos_becas')->first()->fieldsRowsColums() as  $index => $obj_col )
                                                        <?php $datos  = [];?>
                                                        <tr>
                                                        @foreach( $obj_col as $col )
                                                                <?php 
                                                                    $datos[$col->key] = $col->value;
                                                    
                                                                    if( $indice == $numero_col )
                                                                    {
                                                                        $pintar = true;
                                                                    }
                                                    
                                                                    $indice++;
                                                                ?>
                                                            @endforeach
                                                                @if( $pintar )
                                                        
                                                            <td class="letra-componente "><p>
                                                                   {{ isset($datos['otras_fuentes_ingresos_nombre_becas_' . $index .'_row'])?$datos['otras_fuentes_ingresos_nombre_becas_' . $index .'_row']:"" }} 
                                                             </p> </td>
                                                            <td class="letra-componente "><p> {{ isset($datos['otras_fuentes_ingresos_descripcion_becas_' . $index .'_row'])?$datos['otras_fuentes_ingresos_descripcion_becas_' . $index .'_row']:"" }}  </p> </td>
                                                            <td class="letra-componente "><p> {{ isset($datos['otras_fuentes_ingresos_monto_becas_' . $index .'_row'])?'$ '.number_format($datos['otras_fuentes_ingresos_monto_becas_' . $index .'_row'],2,',',' '):"" }}  </p> </td>
                                                            <?php 
                                                            $total_otros_ingresos+=isset($datos['otras_fuentes_ingresos_monto_becas_' . $index .'_row'])?$datos['otras_fuentes_ingresos_monto_becas_' . $index .'_row']:0;

                                                            ?>

                                                           <?php  $pintar = false; $indice = 1;?>
                                                          @endif                                                        
                                                        </tr>
                                                @endforeach 
                                                <?php } ?>
                                    
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                              
                                          <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                          <td class="alinear-derecha table-label table-border" ></td><td class="alinear-derecha table-label table-border" ></td><td class="alinear-derecha table-label table-border" ></td>
                                                            <td class="alinear-derecha table-label ">TOTAL:</td>
                                                            <td class="letra-componente "><p> ${{ number_format($total_otros_ingresos, 2, ',', ' ') }} </p> </td>
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                          <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                          <td class="alinear-derecha table-label table-border" ></td><td class="alinear-derecha table-label table-border" ></td>
                                                            <td class="alinear-derecha table-label "><strong>TOTAL DE INGRESOS MENSULES:</strong></td>
                                                            <?php $total_ingresos_mensuales=($total_ingresos_familiares+$total_otros_ingresos); 
                                                                  isset($total_ingresos_mensuales)?$total_ingresos_mensuales:0;
                                                              ?>
                                                            <td class="letra-componente "><p> $ {{ number_format($total_ingresos_mensuales, 2, ',',' ') }}</p> </td>
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>


<!-------------------------------------------------------- END OTRAS FUENTES ECONOMICAS ----------------------------------------- >
<!-------------------------------------------------------- EGRESOS FAMILIARES           --------------------------------------- -->
                         <tr>
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                    EGRESOS FAMILIARES
                                                </p>
                                            </td>
                                        </tr>
                                          <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label ">CONCEPTO</td>
                                                            <td class="table-label ">EGRESO MENSUAL:</td>
                                                            <td class="table-label-otros alinear-centro" >OTROS EGRESOS</td>
                                                          
                                                          
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro"></td>
                                                            <td class="table-label table-border"></td>
                                                            <td class="table-label alinear-centro" >CONCEPTO</td>
                                                            <td class="table-label alinear-centro" >EGRESO MENSUAL</td>                                                         
                                                    
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                           <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <?php 
                                                            
                                                            $pintar = false;
                                                            $indice = 1;
                                                            $egresos_mensuales=null;
                                                            $otros_egresos_mensuales=null;
                                                            $total_egresos_mensuales=null;
                                                            $numero_col =  $numero_col = isset($data['estudio']->fields->where('key','egresos_familiares_becas')->first()->head_num_col)?$data['estudio']->fields->where('key','egresos_familiares_becas')->first()->head_num_col:null;
                                                                                                            if(isset($numero_col)){
                                                                                                            ?>
                                                            @foreach( $data['estudio']->fields->where('key','egresos_familiares_becas')->first()->fieldsRowsColums() as  $index => $obj_col )
                                                                                                            <?php $datos  = [];?>
                                                        <tr>
                                                        @foreach( $obj_col as $col )
                                                                <?php 
                                                                    $datos[$col->key] = $col->value;
                                                    
                                                                    if( $indice == $numero_col )
                                                                    {
                                                                        $pintar = true;
                                                                    }
                                                    
                                                                    $indice++;
                                                                ?>
                                                            @endforeach
                                                                @if( $pintar )
                                                            <td class="table-label table-border alinear-centro">
                                                            {{ isset($datos['egresos_familiares_concepto_becas_' . $index .'_row'])?$datos['egresos_familiares_concepto_becas_' . $index .'_row']:"" }}
                                                            </td>
                                                            <td class="table-label table-border"><p class="border-footer">
                                                            <?php $egresos_mensuales+=isset($datos['egresos_familiares_egresos_mensuales_becas_' . $index .'_row'])?$datos['egresos_familiares_egresos_mensuales_becas_' . $index .'_row']:0; ?>

                                                                $ {{ isset($datos['egresos_familiares_egresos_mensuales_becas_' . $index .'_row'])?$datos['egresos_familiares_egresos_mensuales_becas_' . $index .'_row']:"" }}

                                                            </p></td>
                                                            <td class="table-label table-border alinear-centro">
                                                                {{ isset($datos['egresos_familiares_otros_egresos_becas_' . $index .'_row'])?$datos['egresos_familiares_otros_egresos_becas_' . $index .'_row']:"" }}
                                                            </td>
                                                            <td class="table-label table-border"><p class="border-footer">
                                                              <?php $otros_egresos_mensuales+=isset($datos['egresos_familiares__otros_egresos_mensuales_becas_' . $index .'_row'])?$datos['egresos_familiares__otros_egresos_mensuales_becas_' . $index .'_row']:0 ?>
                                                                $ {{ isset($datos['egresos_familiares__otros_egresos_mensuales_becas_' . $index .'_row'])?$datos['egresos_familiares__otros_egresos_mensuales_becas_' . $index .'_row']:"" }}
                                                            </p></td>
                                                                                                                    
                                                    
                                                             <?php  
                                                             
                                                             $pintar = false; $indice = 1;?>
                                                          @endif                                                        
                                                        </tr>
                                                @endforeach 
                                                <?php } ?>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        <!--   TABLA DE EGRESOS FAMILIARES 
                                         <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">HIPOTECA</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro">SEGURO DE VIDA</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">RENTA </td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro">SEGURO DE AUTOMOVIL</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">GAS</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro">SEGURO DE CASA</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">AGUA</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro">TARJETAS DE CRÉDITO</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">LUZ</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro">OTRO</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">PREDIAL</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro">OTRO</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">TELEFÓNO</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro">OTRO</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">MANTENIMIENTO DE LA CASA</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro">OTRO</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">GASTOS ESCOLARES / SOLICITANTE</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro">TOTALES</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>     
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">COLEGIATURA DE OTROS FAMILIARES</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro"></td>
                                                            <td class="table-label table-border"></td>  
                                                              
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">GASTOS ESCOLARES / OTROS FAMILIARES</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro"></td>
                                                            <td class="table-label table-border"></td>  
                                                              
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">GASOLINA Ó TRANSPORTE</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro"></td>
                                                            <td class="table-label table-border"></td>  
                                                               
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">CRÉDITO DE AUTOMÓVIL</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro"></td>
                                                            <td class="table-label table-border"></td>  
                                                               
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                          <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">ROPA CALZADO</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro"></td>
                                                            <td class="table-label table-border"></td>  
                                                               
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">DIVERSIONES</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro"></td>
                                                            <td class="table-label table-border"></td>  
                                                               
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro">TOTALES</td>
                                                            <td class="table-label table-border"><p class="border-footer">$ 100.00</p></td>
                                                            <td class="table-label table-border alinear-centro"></td>
                                                            <td class="table-label table-border"></td>  
                                                               
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                        -->
                                         <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro"></td>
                                                            <td class="table-label table-border"></td>
                                                            <td class="table-label table-border alinear-centro" style=" background: orange;"><strong>TOTAL  DE EGRESOS MENSULES </strong></td>
                                                           <?php  $total_egresos_mensuales=($egresos_mensuales+$otros_egresos_mensuales); 
                                                                  isset($total_egresos_mensuales)?$total_egresos_mensuales:0;
                                                            ?>
                                                            <td class="table-label table-border"><p class="border-footer">$ {{ number_format($total_egresos_mensuales,2,',',' ') }}</p></td>  
                                                               
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro"></td>
                                                            <td class="table-label table-border"></td>
                                                            <td class="table-label table-border alinear-centro" style=" background: orange;"><strong>TOTAL DE INGRESOS MENSULES </strong></td>
                                                            <td class="table-label table-border"><p class="border-footer">${{ number_format($total_ingresos_mensuales,2,',',' ') }}</p></td>  
                                                               
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                          <tr>
                                            <td >
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label table-border alinear-centro"></td>
                                                            <td class="table-label table-border"></td>
                                                            <td class="table-label table-border alinear-centro" style=" background: orange;"><strong>DIFERENCIA</strong> </td>
                                                            <?php  $diferencia=($total_ingresos_mensuales-$total_egresos_mensuales);?>
                                                            <td class="table-label table-border"><p class="border-footer">$ {{ number_format($diferencia,2,',',' ')}}</p></td>  
                                                               
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
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                      
                                          <tr>
                                            <td class="table-border">
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-label "><strong>Hay déficit</strong></td>
                                                            <td class="table-label alinear-centro">
                                                            {{isset($data['estudio']->fields->where('key','egresos_familiares_hay_deficit_becas')->first()->value)?$data['estudio']->fields->where('key','egresos_familiares_hay_deficit_becas')->first()->value:""}}
                                                            </td>
                                                          
                                                            <td class="table-label table-border"></td>
                                                            <td class="table-label table-border"></td>
                                                          
                                                          
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td class="" colspan="3"><strong>Si hay déficit, ¿Cómo lo solventa?</strong></td>
                                                           
                                                            <td class="table-label table-border"></td>
                                                            <td class="table-label table-border"></td>
                                                          
                                                          
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                 <p class="letra-detalle">
                                                                  {{isset($data['estudio']->fields->where('key','egresos_familiares_si_hay_deficit_becas')->first()->value)?$data['estudio']->fields->where('key','egresos_familiares_si_hay_deficit_becas')->first()->value:""}}
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


<!-------------------------------------------------------- ECD EGRESOS FAMILIARES       ----------------------------------------- -- >
<!-- ----------------------------------------------------- PARIMONIO FAMILIAR           ----------------------------------------- -->
           <tr>
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                   PATRIMONIO FAMILIAR 
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-centro table-label ">Mueble o Inmueble </td>
                                                            <td class="alinear-centro table-label ">Marca / Modelo / Descripción </td>
                                                            <td class="alinear-centro table-label">VALOR APROXIMADO</td>
                                                          
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <?php 
                                                            
                                                            $pintar = false;
                                                            $indice = 1;
                                                            $totales_patrimonio=null;
                                                            $numero_col =  $numero_col = isset($data['estudio']->fields->where('key','patrimonio_familiar_patrimonio_familiar_becas')->first()->head_num_col)?$data['estudio']->fields->where('key','patrimonio_familiar_patrimonio_familiar_becas')->first()->head_num_col:null;
                                                            if(isset($numero_col)){
                                                                                                            ?>
                                                            @foreach( $data['estudio']->fields->where('key','patrimonio_familiar_patrimonio_familiar_becas')->first()->fieldsRowsColums() as  $index => $obj_col )
                                                        <?php $datos  = [];?>
                                                        <tr>
                                                        @foreach( $obj_col as $col )
                                                                <?php 
                                                                    $datos[$col->key] = $col->value;
                                                    
                                                                    if( $indice == $numero_col )
                                                                    {
                                                                        $pintar = true;
                                                                    }
                                                    
                                                                    $indice++;
                                                                ?>
                                                            @endforeach
                                                                @if( $pintar )
                                                       
                                                            <td class="letra-componente "><p>
                                                            {{ isset($datos['patrimonio_familiar_mueble_inmueble_becas_' . $index .'_row'])?$datos['patrimonio_familiar_mueble_inmueble_becas_' . $index .'_row']:"" }} 
                                                            </p> </td>
                                                            <td class="letra-componente "><p> 
                                                                {{ isset($datos['patrimonio_familiar_marca_modelo_becas_' . $index .'_row'])?$datos['patrimonio_familiar_marca_modelo_becas_' . $index .'_row']:"" }} 
                                                            </p> </td>
                                                            <td class="letra-componente "><p> $ {{ isset($datos['patrimonio_familiar_valor_aproximado_becas_' . $index .'_row'])?$datos['patrimonio_familiar_valor_aproximado_becas_' . $index .'_row']:"" }} </p>
                                                            </td>
                                                                                                                      
                                                        <?php  
                                                              $totales_patrimonio+=isset($datos['patrimonio_familiar_valor_aproximado_becas_' . $index .'_row'])?$datos['patrimonio_familiar_valor_aproximado_becas_' . $index .'_row']:0;
                                                             $pintar = false; $indice = 1;?>
                                                          @endif                                                        
                                                        </tr>
                                                @endforeach 
                                                <?php } ?>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                       
                                          <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                          <td class="alinear-derecha table-label table-border" ></td><td class="alinear-derecha table-label table-border" ></td><td class="alinear-derecha table-label table-border" ></td>
                                                            <td class="alinear-derecha table-label ">TOTALES:</td>
                                                            <td class="letra-componente "><p> $ {{ number_format($totales_patrimonio,2,',',' ') }} </p> </td>
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         
                                </tbody>
                            </table>
                        </td>
                    </tr>
<!-------------------------------------------------------- END PATRIMMONIO FAMILIAR     ----------------------------------------- -->
<!-------------------------------------------------------- AHORROS                      ----------------------------------------- -->

                     <tr>
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                   AHORROS
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-centro table-label ">MONTO  </td>
                                                            <td class="alinear-centro table-label ">INSTITUCIÓN</td>
                                                            <td class="alinear-centro table-label"> A NOMBRE DE</td>
                                                          
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <?php 
                                                            
                                                            $pintar = false;
                                                            $indice = 1;
                                                            $totales_ahorros=null;
                                                            $numero_col =  $numero_col = isset($data['estudio']->fields->where('key','ahorros_ahorros_becas')->first()->head_num_col)?$data['estudio']->fields->where('key','ahorros_ahorros_becas')->first()->head_num_col:null;
                                                            if(isset($numero_col)){
                                                                                                            ?>
                                                            @foreach( $data['estudio']->fields->where('key','ahorros_ahorros_becas')->first()->fieldsRowsColums() as  $index => $obj_col )
                                                        <?php $datos  = [];?>
                                                        <tr>
                                                        @foreach( $obj_col as $col )
                                                                <?php 
                                                                    $datos[$col->key] = $col->value;
                                                    
                                                                    if( $indice == $numero_col )
                                                                    {
                                                                        $pintar = true;
                                                                    }
                                                    
                                                                    $indice++;
                                                                ?>
                                                            @endforeach
                                                                @if( $pintar )
                                                       
                                                            <td class="letra-componente "><p> 
                                                                $
                                                                {{ isset($datos['ahorros_monto_becas_' . $index .'_row'])?$datos['ahorros_monto_becas_' . $index .'_row']:"" }} 
                                                            </p> </td>
                                                            <td class="letra-componente "><p> 
                                                                {{ isset($datos['ahorros_institucion_becas_' . $index .'_row'])?$datos['ahorros_institucion_becas_' . $index .'_row']:"" }} 
                                                            </p> </td>
                                                            <td class="letra-componente "><p>
                                                                       {{ isset($datos['ahorros_a_monbre_de_becas_' . $index .'_row'])?$datos['ahorros_a_monbre_de_becas_' . $index .'_row']:"" }} 
                                                             </p> </td>
                                                                                                                      
                                                         <?php  
                                                              $totales_ahorros+=isset($datos['ahorros_monto_becas_' . $index .'_row'])?$datos['ahorros_monto_becas_' . $index .'_row']:0;
                                                             $pintar = false; $indice = 1;?>
                                                          @endif                                                        
                                                        </tr>
                                                @endforeach 
                                                <?php } ?>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                      
                                          <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>  
                                                              <td class="letra-componente "><p> $ {{ number_format($totales_ahorros,2,',',' ') }} </p> </td>
                                                            <td class="alinear-derecha table-label ">: TOTALES</td>
                                                            <td class="alinear-derecha table-label table-border" ></td><td class="alinear-derecha table-label table-border" ></td><td class="alinear-derecha table-label table-border" ></td>
                                                           
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         
                                </tbody>
                            </table>
                        </td>
                    </tr>

<!-------------------------------------------------------- AHORROS  end                 ----------------------------------------- -->
<!-------------------------------------------------------- APRECACION DEL MOVILIARIO    ----------------------------------------- -->

                    <tr>
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                   APRECIACIÓN DE LA VIVIENDA Y DEL MOBILIARIO
                                                </p>
                                            </td>
                                        </tr>
                                            <tr>
                                                            <td>
                                                                <table class="tabla-componente">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="label">VIVIENDA</th>
                                                                            <th class="label">EL INMUELE ES</th>
                                                                            <th class="label">SERVICIOS</th>
                                                                            <th class="label">DISTRIBUCIÓN</th>                                           
                                                                                                                     
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>                                                                         
                                                                        <tr>
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_PROPIA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_PROPIA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    PROPIA      
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda RENTADA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda RENTADA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    RENTADA           
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_hipotecada_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_hipotecada_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    HIPOTECADA           
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                  {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_CONGELADA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_CONGELADA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    CONGELADA             
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_PRESTADA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_PRESTADA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    PRESTADA              
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_DE_PADRES_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_DE_PADRES_becas')->first()->value:""}}

                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    DE PADRES       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_OTRO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Vivienda_OTRO_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    OTRO               
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>                                                                    
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_CASA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_CASA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    CASA             
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_DEPARTAMENTO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_DEPARTAMENTO_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    DEPARTAMENTO                   
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                 {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_DUPLEX_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_DUPLEX_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    DUPLEX                 
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                 {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_CONDOMINIO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_CONDOMINIO_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    CONDOMINIO                
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                 {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_VECINDAD_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_VECINDAD_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    VECINDAD                      
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                      {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_CUARTO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_CUARTO_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    CUARTO      
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                     {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_OTRO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_inmueble_es_OTRO_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    OTRO               
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_LUZ_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_LUZ_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    LUZ              
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                     {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_AGUA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_AGUA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    AGUA                       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_PAVIMENTACION_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_PAVIMENTACION_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    PAVIMENTACIÓN                  
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                     {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_DRENAJE_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_DRENAJE_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    DRENAJE           
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_TELEFONO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_TELEFONO_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    TELÉFONO                          
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_becas_SEG_becas_PUBLICA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_becas_SEG_becas_PUBLICA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    SEG. PÚBLICA    
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                     {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_ALUMBRADO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Servicios_ALUMBRADO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    ALUMBRADO                 
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="table-border">                                                                                
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_SALA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_SALA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   SALA            
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                     {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_COMEDOR_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_COMEDOR_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    COMEDOR                       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_RECAMARA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_RECAMARA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   RECAMARA                 
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_COCINA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_COCINA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                  COCINA          
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                     {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_BANO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_BANO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    BAÑO                          
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_GARAJE_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_GARAJE_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    GARAJE   
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_BIBLIOTECA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_BIBLIOTECA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    BIBLIOTECA                
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                     {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_JARDIN_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_JARDIN_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    JARDIN             
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_ZOTEHUELA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_ZOTEHUELA_becas')->first()->value:""}} 

                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    ZOTEHUELA                   
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_PATIO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_PATIO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    PATIO                 
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_ESTUDIO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_ESTUDIO_becas')->first()->value:""}}  
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   ESTUDIO           
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_CUARTO_DE_SERVICIO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Distribucion_CUARTO_DE_SERVICIO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    CUARTO DE SERVICIO                         
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
                                          <td colspan="3">
                                                <table class="tabla-componente">
                                                     <tbody>
                                                        <tr>
                                                                            <th class="label">CONSTRUCCION</th>
                                                                            <th class="label">ACABADOS DE CALIDAD:</th>
                                                                            <th class="label">CONSERVACIÓN DEL INMUEBLE</th>
                                                                            <th class="label">MOBILIARIO</th>                                           
                                                                            <th class="label">DE CORTE</th>                                           
                                                        </tr>
                                                           <tr>
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                             {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Construccion_ANTIGUA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Construccion_ANTIGUA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   ANTIGUA     
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                             {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Construccion_SENCILLA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Construccion_SENCILLA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    SENCILLA          
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                             {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Construccion_MODERNA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Construccion_MODERNA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    MODERNA          
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                             {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Construccion_SEMI_CONVENCIONAL_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Construccion_SEMI_CONVENCIONAL_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   SEMI-CONVENCIONAL            
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                            {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Construccion_CONVENCIONAL_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Construccion_CONVENCIONAL_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   CONVENCIONAL             
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                       
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>                                                                    
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                             {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Acabados_de_calidad_ALTA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Acabados_de_calidad_ALTA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    ALTA           
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                            {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Acabados_de_calidad_MEDIA_ALTA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Acabados_de_calidad_MEDIA_ALTA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    MEDIA ALTA                 
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                            {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Acabados_de_calidad_MEDIA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Acabados_de_calidad_MEDIA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    MEDIA              
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                               {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Acabados_de_calidad_MEDIA_BAJA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Acabados_de_calidad_MEDIA_BAJA_becas')->first()->value:""}} 
                                                            
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    MEDIA BAJA               
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Acabados_de_calidad_BAJA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Acabados_de_calidad_BAJA_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    BAJA                    
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_inmueble_EXCELENTE_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_inmueble_EXCELENTE_becas')->first()->value:""}} 
                                                
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    EXCELENTE             
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                 {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_inmueble_BUENO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_inmueble_BUENO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   BUENO                    
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                 {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_inmueble_REGULAR_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_inmueble_REGULAR_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    REGULAR                 
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_inmueble_MALO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_inmueble_MALO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                  MALO         
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_inmueble_PESIMO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_inmueble_PESIMO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    PESIMO                        
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="table-border">                                                                                
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Mobiliario_COMPLETO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Mobiliario_COMPLETO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   COMPLETO           
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                 {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Mobiliario_INCOMPLETO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Mobiliario_INCOMPLETO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   INCOMPLETO                       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                 {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Mobiliario_ESCUETO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Mobiliario_ESCUETO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                  ESCUETO               
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                 {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_De_corte_VARIADO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_De_corte_VARIADO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    VARIADO             
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                 {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_De_corte_CONSERVADOR_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_De_corte_CONSERVADOR_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    CONSERVADOR                  
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_De_corte_MODERNO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_De_corte_MODERNO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    MODERNO                
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_De_corte_COLONIAL_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_De_corte_COLONIAL_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   COLONIAL          
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_De_corte_SENCILLO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_De_corte_SENCILLO_becas')->first()->value:""}} 
                                            
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
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
                                        <tr>
                                          <td colspan="3">
                                                <table class="tabla-componente">
                                                     <tbody>
                                                        <tr>
                                                                            <th class="label">CONSERVACION DEL MOBILIARIO</th>
                                                                            <th class="label">EL ORDEN EN LA VIVIENDA ES</th>
                                                                            <th class="label">LIMPIEZA </th>
                                                                            <th class="label">OTROS SERVICIOS</th>                                     
                                                        </tr>
                                                           <tr>
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                         {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_movilirario_PESIMO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_movilirario_PESIMO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   PESIMO     
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                           {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_movilirario_MALO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_movilirario_MALO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   MALO         
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                            {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_movilirario_REGULAR_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_movilirario_REGULAR_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                  REGULAR     
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                            {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_movilirario_BUENO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_movilirario_BUENO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   BUENO       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                             {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_movilirario_EXCELENTE_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Conservacion_del_movilirario_EXCELENTE_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                  EXCELENTE            
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                       
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>                                                                    
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                       <tr>
                                                                                            <td>
                                            {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_orden_de_la_vivienda_es_PESIMO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_orden_de_la_vivienda_es_PESIMO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   PESIMO     
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                            {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_orden_de_la_vivienda_es_MALO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_orden_de_la_vivienda_es_MALO_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   MALO         
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                            {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_orden_de_la_vivienda_es_REGULAR_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_orden_de_la_vivienda_es_REGULAR_becas')->first()->value:""}} 
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                  REGULAR     
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                             {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_orden_de_la_vivienda_es_BUENO_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_orden_de_la_vivienda_es_BUENO_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   BUENO       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                             {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_El_orden_de_la_vivienda_es_EXCELENTE_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_El_orden_de_la_vivienda_es_EXCELENTE_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                  EXCELENTE            
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                       
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="table-border">
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                             {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Limpieza_PESIMA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Limpieza_PESIMA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   PESIMA             
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                            {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Limpieza_MALA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Limpieza_MALA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   MALA                    
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Limpieza_REGULAR_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Limpieza_REGULAR_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    REGULAR                 
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Limpieza_BUENA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Limpieza_BUENA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                 BUENA     
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                     {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Limpieza_EXCELENTE_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Limpieza_EXCELENTE_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                    EXCELENTE                      
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="table-border">                                                                                
                                                                                <table class="tabla-componente">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_TV_POR_CABLE_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_TV_POR_CABLE_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   TV.  POR CABLE          
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_JARDINERIA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_JARDINERIA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                   JARDINERIA                       
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_INTERNET_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_INTERNET_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                 INTERNET              
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                         <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_VIGILANCIA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_VIGILANCIA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                 VIGILANCIA             
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                     {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_PERSONAL_DE_LIMPIEZA_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_PERSONAL_DE_LIMPIEZA_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                 PERSONAL DE LIMPIEZA             
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>
                                                                                         <tr>
                                                                                            <td>
                                                    {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_MANTENIMIENTO_CONSTANTE_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_Otros_servicios_MANTENIMIENTO_CONSTANTE_becas')->first()->value:""}}
                                                                                            </td>
                                                                                            <td class="table-border">
                                                                                                <p class="letra-detalle">
                                                                                                 MANTENIMIENTO CONSTANTE             
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
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente">
                                                                     OBSERVACIONES
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-detalle">
                                                                 {{isset($data['estudio']->fields->where('key','apreciacion_vivienda_observaciones_becas')->first()->value)?$data['estudio']->fields->where('key','apreciacion_vivienda_observaciones_becas')->first()->value:""}}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>




<!-------------------------------------------------------- APRECACION DEL MOVILIARIO    ----------------------------------------- -->

<!-------------------------------------------------------- INFORMACIÓN ESCOLAR          ---------------------------------------- -->

                        <tr>
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                    INFORMACION ESCOLAR
                                                </p>
                                            </td>
                                        </tr>
                                                            <tr>
                                                            <td>
                                                                <table class="tabla-componente">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="label">GRADO</th>
                                                                            <th class="label">INSTITUCIÓN</th>
                                                                            <th class="label">PERIODO</th>
                                                                            <th class="label">AÑOS</th>
                                                                            <th class="label">COMPROBANTE</th>    
                                                                            <th class="label">BECA (% 0 $)</th>    
                                                                      
                                                                        </tr>
                                                                    </thead>
                                    <?php 
                                        $pintar = false;
                                        $indice = 1;
                                      $numero_col = isset($data['estudio']->fields->where('key','informacion_escolar_informacion_ecolar_becas')->first()->head_num_col)?$data['estudio']->fields->where('key','informacion_escolar_informacion_ecolar_becas')->first()->head_num_col:null;
                                      if(isset($numero_col)){
                                     
                                    ?>
                                    @foreach( $data['estudio']->fields->where('key','informacion_escolar_informacion_ecolar_becas')->first()->fieldsRowsColums() as  $index => $obj_col )
                                    <?php $datos  = [];?>
                                    <tr>
                                    @foreach( $obj_col as $col )
                                            <?php 
                                                $datos[$col->key] = $col->value;

                                                if( $indice == $numero_col )
                                                {
                                                    $pintar = true;
                                                }

                                                $indice++;
                                            ?>


                                        @endforeach



                                            @if( $pintar )                      
                                                                            <td class="table-border"><p class="label alinear-derecha">
                                                                            {{ isset($datos['informacion_ecolar_grado_becas_' . $index .'_row'])?$datos['informacion_ecolar_grado_becas_' . $index .'_row']:"" }} 
                                                                            </p></td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                            {{ isset($datos['informacion_ecolar_institucion_becas_' . $index .'_row'])?$datos['informacion_ecolar_institucion_becas_' . $index .'_row']:"" }} 
                                                                            </p></td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                             {{ isset($datos['informacion_ecolar_periodo_becas_' . $index .'_row'])?$datos['informacion_ecolar_periodo_becas_' . $index .'_row']:"" }}
                                                                            </p></td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                            {{ isset($datos['informacion_ecolar_años_becas_' . $index .'_row'])?$datos['informacion_ecolar_años_becas_' . $index .'_row']:"" }}
                                                                            </p></td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                            {{ isset($datos['informacion_ecolar_comprobante_becas_' . $index .'_row'])?$datos['informacion_ecolar_comprobante_becas_' . $index .'_row']:"" }}
                                                                            </p></td>
                                                                            <td class="letra-componente table-border"><p class="border-footer">
                                                                            {{ isset($datos['informacion_ecolar_beca_becas_' . $index .'_row'])?$datos['informacion_ecolar_beca_becas_' . $index .'_row']:"" }}
                                                                            </p></td>
                                                                           
                                    
                                           <?php  $pintar = false; $indice = 1;?>

                                            @endif
                                                </tr>
                                            @endforeach 
                                         <?php } ?>                                                                                   
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

<!-------------------------------------------------------- END INFORMACIÓN ESCOLAR      ---------------------------------------- -->
<!-------------------------------------------------------- FORMACION COMPLEMENTARIA     ---------------------------------------- -->
<tr>
                            <td colspan="3">
                                <table class="tabla-componente">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="alinear-centro titulo-componente-principal">
                                                   FORMACIÓN COMPLEMENTARIA
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                        <tr>
                                                            <td class="alinear-centro table-label">TIPO</td>
                                                            <td class="alinear-centro table-label">INSTITUCIÓN</td>
                                                            <td class="alinear-centro table-label">PERIODO</td>
                                                            <td class="alinear-centro table-label">COMPROBANTE</td>
                                                          
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                           </td>
                                        </tr>
                                         <tr>
                                            <td class="table-border"s>
                                                <table class="tabla-componente">
                                                    <tbody>
                                                    </thead>
                                    <?php 
                                        $pintar = false;
                                        $indice = 1;
                                      $numero_col = isset($data['estudio']->fields->where('key','formacion_complementaria_formacion_complementaria_becas')->first()->head_num_col)?$data['estudio']->fields->where('key','formacion_complementaria_formacion_complementaria_becas')->first()->head_num_col:null;
                                      if(isset($numero_col)){
                                     
                                    ?>
                                    @foreach( $data['estudio']->fields->where('key','formacion_complementaria_formacion_complementaria_becas')->first()->fieldsRowsColums() as  $index => $obj_col )
                                    <?php $datos  = [];?>
                                    <tr>
                                    @foreach( $obj_col as $col )
                                            <?php 
                                                $datos[$col->key] = $col->value;

                                                if( $indice == $numero_col )
                                                {
                                                    $pintar = true;
                                                }

                                                $indice++;
                                            ?>


                                        @endforeach



                                            @if( $pintar )
                                                       
                                                            <td class="letra-componente "><p> 
                                                                   {{ isset($datos['formacion_complementaria_tipo_becas_' . $index .'_row'])?$datos['formacion_complementaria_tipo_becas_' . $index .'_row']:"" }}
                                                             </p> </td>
                                                            <td class="letra-componente "><p> 
                                                                {{ isset($datos['formacion_complementaria_institucioin_becas_' . $index .'_row'])?$datos['formacion_complementaria_institucioin_becas_' . $index .'_row']:"" }}
                                                            </p> </td>
                                                            <td class="letra-componente "><p> 
                                                                {{ isset($datos['formacion_complementaria_periodo_becas_' . $index .'_row'])?$datos['formacion_complementaria_periodo_becas_' . $index .'_row']:"" }}
                                                            </p> </td>
                                                            <td class="letra-componente "><p> 
                                                                   {{ isset($datos['formacion_complementaria_comprobantes_becas_' . $index .'_row'])?$datos['formacion_complementaria_comprobantes_becas_' . $index .'_row']:"" }}
                                                             </p> </td>
                                                                                                                      
                                          <?php  $pintar = false; $indice = 1;?>

                                            @endif
                                                </tr>
                                            @endforeach 
                                         <?php } ?>                                                                                   
                                                    
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
                                                            <td>
                                                                 <p class="alinear-centro titulo-componente">
                                                                     OBSERVACIONES
                                                                 </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="letra-detalle">
                                                        {{isset($data['estudio']->fields->where('key','formacion_complementaria_observaciones_becas')->first()->value)?$data['estudio']->fields->where('key','formacion_complementaria_observaciones_becas')->first()->value:""}}
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
                                                        <td>
                                                            {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo"]) !!}           
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
                                                        <td>
                                                            {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo"]) !!}           
                                                        </td>
                                                    </tr>
                                                     </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        




<!-------------------------------------------------------- END FORMACION COMPLEMENTARIA ---------------------------------------- -->












<!-------------------------------- END TABLA PRINCIPAL ------------------------>

                    </tbody>
                </table>
<!-------------------------------- END TABLA PRINCIPAL ------------------------>
   </body>
</html>
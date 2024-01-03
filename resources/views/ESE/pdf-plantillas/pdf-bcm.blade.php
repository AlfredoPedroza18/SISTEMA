<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>ESE-{{ $estudio->id}}</title>
    <!-- Latest compiled and minified CSS -->


    
      {!! Html::style('assets/css/pdf-formato-grid-print-sgmty.css',array('media' => 'print')) !!}
</head>
<body>




    <table class="table-border">
        <tbody>
            <tr>
                <td colspan="3" class="" >                   
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="title-header-component table-border alinear-centro">
                                Estudio de Referencias
                            </td>
                        </tr>
                        <tr class="row-label-blue-jll">
                            <td class="table-border label-main-jll">
                                NOMBRE DEL CANDIDATO
                            </td>
                            <td colspan="2" class="table-border label-main-jll">
                                {{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}
                            </td>
                        </tr>
                        <tr class="row-label-blue-jll">
                            <td class="table-border label-main-jll">
                                FECHA: {{ $estudio->mes_visita }}-{{ $estudio->dia_visita }}-{{ $estudio->anio_visita }}
                            </td>
                            <td colspan="2" class="table-border label-main-jll">
                                RESULTADO:
                                @if( $estudio->formatoBcm )
                                    @if( $estudio->formatoBcm->resultado->resultado_candidato == '1' )
                                        APTO
                                    @elseif( $estudio->formatoBcm->resultado->resultado_candidato == '2' )
                                        APTO CON RESERVAS
                                    @else
                                        NO APTO
                                    @endif
                                @endif
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
                <td colspan="3" class="space" >                   
                    <table class="auto-ancho">
                        <tr>
                            <td colspan="3" class="title-header-component table-border alinear-centro">
                                RESULTADOS
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="table-border box-jll justificar letra-detalle-jll" style="width: 100%">
                                <br>
                                <p><strong>Verificación laboral:</strong>{{ isset( $estudio->formatoBcm->resultado ) ? $estudio->formatoBcm->resultado->resultados_verificacion_laboral : '' }}</p>
                                <br>
                                <p><strong>Verificación escolar:</strong>{{ isset( $estudio->formatoBcm->resultado ) ? $estudio->formatoBcm->resultado->resultados_verificacion_escolar : '' }}</p>
                                <br>
                                <p><strong>Gaps Employments:</strong>{{ isset( $estudio->formatoBcm->resultado ) ? $estudio->formatoBcm->resultado->resultados_gaps : '' }}</p>
                                <br>                                    
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
                <td colspan="3" class="space">                   
                    <table class="auto-ancho">
                        <tr>
                            <td colspan="3" class="title-header-component table-border alinear-centro">
                                OBSERVACIONES
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="table-border box-jll alinear-izquierda letra-detalle-jll">
                                {{ isset( $estudio->formatoBcm->resultado ) ? trim($estudio->formatoBcm->resultado->observaciones) : '' }}
                                
                                
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
                <td colspna="3" class="space table-border">
                 <table class="auto-ancho">
                        <tr>
                          <td style="width: 50%" class="box-jll justificar letra-detalle-jll">
                               <p class="alinear-centro">Elaboró: </p><br>
                               <p class="alinear-centro">T.S {{ isset($estudio->ejecutivoPrincipal)?$estudio->ejecutivoPrincipal[0]->name." ".$estudio->ejecutivoPrincipal[0]->apellido_paterno." ".$estudio->ejecutivoPrincipal[0]->apellido_materno :'' }}</p><br>

                                
                                
                            </td>
                             <td style="width: 50%" class="box-jll justificar letra-detalle-jll">
                                <p class="alinear-centro ">
                                    <p style="width:180px;">                                
                                    {{ Html::image( $estudio->ejecutivoPrincipal->first()->imagen_firma ,'',['style' => 'max-width:100%;height:auto;margin-left:50px;']) }}
                                    </p>
                                </p>
                                
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
                            <td colspan="3" class="title-header-component table-border alinear-centro">
                                DATOS PERSONALES
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="table-border justificar">
                                <table class="auto-width">
                                    <tbody>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">
                                                Teléfono Celular:
                                            </td>
                                            <td class="box-jll letra-detalle-jll justificar" style="width:30%;">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->celular : '' }}
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">Edad:</td>
                                            <td class="box-jll letra-detalle-jll justificar" style="width:30%;">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->edad : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">
                                                Teléfono de Casa:
                                            </td>
                                            <td class="box-jll letra-detalle-jll justificar" style="width:30%;">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->telefono_casa : '' }}
                                            </td>
                                            <td class="letra-detalle-jll alinear-izquierda" style="width:20%;">Sexo:</td>
                                            <td class="letra-detalle-jll" style="width:30%;">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->sexo : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">
                                                Fecha y lugar de nacimiento:
                                            </td>
                                            <td class="letra-detalle-jll" style="width:30%;">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->lugar_nacimiento : '' }}
                                            </td>
                                            <td class="letra-detalle-jll alinear-izquierda" style="width:20%;">Estado Civil:</td>
                                            <td class="letra-detalle-jll" style="width:30%;">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->edo_civil : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:30%;">
                                                Domicilio actual:
                                            </td>
                                            <td class="letra-detalle-jll" style="width:30%;">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->domicilio_actual : '' }}
                                            </td>
                                            <td class="letra-detalle-jll" style="width:20%;">CP:</td>
                                            <td class="letra-detalle-jll" style="width:30%;">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->cp : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:30%;">
                                                Entre las calles:
                                            </td>
                                            <td colspan="3" class="field-table-jll letra-detalle-jll justificar" style="width:70%;">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->entre_calles : '' }}
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:30%;">
                                                Tiempo de radicar en el domicilio:
                                            </td>                                            
                                            <td colspan="3" class="field-table-jll letra-detalle-jll justificars">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->tiempo_radicar_domicilio_actual : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:30%;">
                                                Domicilio anterior:
                                            </td>                                            
                                            <td colspan="3" class="field-table-jll letra-detalle-jll justificar">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->domicilio_anterior : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:30%;">
                                                Tiempo que habitó el domicilio anterior:
                                            </td>                                            
                                            <td colspan="3" class="field-table-jll letra-detalle-jll justificar">
                                                {{ isset( $estudio->formatoBcm->datosPersonales ) ? $estudio->formatoBcm->datosPersonales->tiempo_radicar_domicilio_anterior : '' }}
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
                            <td class="title-header-component table-border alinear-centro">
                                DOCUMENTACIÓN
                            </td>
                        </tr>
                        <tr>
                            <td class="table-border justificar">
                                <table class="auto-width">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="head-table-jll alinear-centro">DOCUMENTO</th>
                                            <th class="head-table-jll alinear-centro">No. de Documento</th>
                                            <th class="head-table-jll alinear-centro">OBSERVACIONES</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="row-label-blue-jll">
                                            <td rowspan="3" class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">IDENTIFICACIÓN OFICIAL</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">Credencial de Elector</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                Clave de Elector: OCR: 
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->id : 0 }}
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->ine_no_doc : '' }}
                                            </td>
                                        </tr>
                                        <tr class="row-label-blue-jll">
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">Pasaporte</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->pasaporte_no_doc : '' }}
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->pasaporte_observaciones : '' }}
                                            </td>
                                        </tr>
                                        <tr class="row-label-blue-jll">
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">Cédula</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->cedula_no_doc : '' }}
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->cedula_observaciones : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="box-jll alinear-izquierda letra-detalle-jll" style="width:50%;">No. de Afiliación del IMSS o ISSSTE</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->seguro_afiliado_no : '' }}
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->seguro_afiliado_observaciones : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="box-jll alinear-izquierda letra-detalle-jll" style="width:50%;">R.F.C.</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->rfc_no : '' }}
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->rfc_observaciones : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="box-jll alinear-izquierda letra-detalle-jll" style="width:50%;">CURP</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->curp_no : '' }}
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:25%;">
                                                {{ isset( $estudio->formatoBcm->documentacion ) ? $estudio->formatoBcm->documentacion->curp_observaciones : '' }}
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
                <td colspan="3" class="space table-border" >                   
                    <table class="auto-width">
                        <tr>
                            <td class="title-header-component table-border alinear-centro">
                                El candidato ha permanecido por mas de 6 meses en otro pais durante los ultimos 5 años (Indicar si vivió/trabajó/ vacacionó en el extranjero durante los
                                últimos 5 años)
                            </td>
                        </tr>
                        <tr>
                            <td class="table-border justificar">
                                <table class="auto-width">
                                    <tbody>
                                        <tr>
                                            <td class="box-jll alinear-centro letra-detalle-jll"
                                                @if( $estudio->formatoBcm ) 
                                                    @if( $estudio->formatoBcm->documentacion->vivio_otro_pais == '1' )
                                                       style="background-color:#2E64FE;  width: 33% "
                                                    @else
                                                        style="width: 33% "
                                                    @endif 
                                                @endif>SI                                                
                                            </td>
                                            <td class="box-jll alinear-centro letra-detalle-jll"
                                                 @if( $estudio->formatoBcm ) 
                                                    @if( $estudio->formatoBcm->documentacion->vivio_otro_pais == '2' )
                                                       style="background-color:#2E64FE;  width: 33% "
                                                    @else
                                                        style="width: 33% "
                                                    @endif 
                                                @endif>NO                                                                         
                                            </td>
                                            <td class="box-jll alinear-centro letra-detalle-jll"
                                                @if( $estudio->formatoBcm ) 
                                                    @if( $estudio->formatoBcm->documentacion->vivio_otro_pais == '3' )
                                                       style="background-color:#2E64FE;  width: 33% "
                                                    @else
                                                        style="width: 33% "
                                                    @endif 
                                                @endif>NO APLICA                    

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
                            <td class="title-header-component table-border alinear-centro">
                                ANTECEDENTES LEGALES
                            </td>
                        </tr>
                        <tr>
                            <td class="table-border justificar">
                                <table class="auto-width">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="box-jll alinear-izquierda letra-detalle-jll" style="width: 80%;">
                                                ¿Alguna vez fue detenido o ha tenido alguna demanda laboral, civil, mercantil, penal o falta administrativa?
                                            </td>
                                            <td class="box-jll alinear-centro letra-detalle-jll"
                                               @if( $estudio->formatoBcm ) 
                                                    @if( $estudio->formatoBcm->antecedentesLegales->demanda_laboral == '1' )
                                                      style="background-color:#2E64FE;  width: 10% "
                                                    @else
                                                        style="  width: 10% "
                                                    @endif 
                                                @endif>SI
                                            </td>
                                            <td class="box-jll alinear-centro letra-detalle-jll"
                                                @if( $estudio->formatoBcm ) 
                                                    @if( $estudio->formatoBcm->antecedentesLegales->demanda_laboral == '2' )
                                                      style="background-color:#2E64FE;  width: 10% "
                                                    @else
                                                        style="width: 10% "
                                                    @endif 
                                                @endif>NO
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class=" alinear-izquierda box-jll justificar letra-detalle-jll">
                                                    {{ isset( $estudio->formatoBcm->antecedentesLegales ) ? $estudio->formatoBcm->antecedentesLegales->descripcion : '' }}
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
                <td colspan="3" class="table-border" >
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td class="title-header-component table-border alinear-centro">
                                REFERENCIAS LABORALES <br>(Últimos cinco años)
                            </td>
                        </tr>
                        <tr>
                            <td class="table-border justificar">
                                <table class="auto-width">
                                    <thead>
                                        <tr class="row-label-blue-jll">
                                            <th colspan="2" class="head-table-jll " style="width:30%"></th>
                                            <th class="head-table-jll alinear-centro" style="width:35%">EMPRESA</th>
                                            <th class="head-table-jll alinear-centro" style="width:35%">CANDIDATO</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if( $estudio->formatoBcm )
                                        @foreach ($estudio->formatoBcm->referenciasLaborales as $index => $referencia)                                        
                                        <tr>
                                            <td rowspan="3" class="box-jll alinear-centro letra-detalle-jll" style="width: 20%;">{{ $index + 1 }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 16%;">EMPRESA</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 35%;">{{ $referencia->empresa_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 35%;">{{ $referencia->empresa_candidato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 16%;">PERÍODO</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 35%;">{{ $referencia->periodo_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 35%;">{{ $referencia->periodo_candidato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 16%;">MOTIVO DE SALIDA</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 35%;">{{ $referencia->motivo_salida_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 35%;">{{ $referencia->motivo_salida_candidato }}</td>
                                        </tr>                                                
                                        @endforeach
                                    @endif
                                    
                                        
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
                            <td class="title-header-component table-border alinear-centro">
                                GAPS de tiempo mayor a 3 meses entre empleos
                            </td>
                        </tr>
                        <tr>
                            <td class="table-border justificar">
                                <table class="auto-width">
                                    <tbody>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll field-table-lg" style="width: 10%;">
                                                Periódo
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 90%;">
                                                {{ isset( $estudio->formatoBcm->gaps ) ? $estudio->formatoBcm->gaps->periodo : '' }}                                                
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
                <td colspan="3" class="table-border" style="height: 20px;">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border" style="height: 20px;">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-border" style="height: 20px;">
                    &nbsp;
                </td>
            </tr>
            {{--<tr>
                <td colspan="3" class="space table-border">                   
                    <table class="auto-width">
                        <tr>
                            <td class="title-header-component table-border alinear-centro" style="padding: 0;">
                                REFERENCIAS LABORALES (ÚLTIMOS 5 AÑOS)
                            </td>
                        </tr>                        
                    </table>
                </td>
            </tr>--}}
            
            <tr>
                <td colspan="3" class="space table-border">                   

                    @if( $estudio->formatoBcm )                            
                    @foreach ( $estudio->formatoBcm->referenciasLaboralesCinco as $index => $referencia )            
                    <table class="auto-width">
                        <tr>
                            <td colspan="3" class="table-border">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td class="title-header-component table-border alinear-centro">
                                REFERENCIAS LABORALES  {{$index+1}} (ÚLTIMOS 5 AÑOS)
                            </td>
                        </tr>
                            
                        <tr>
                            <td class="table-border justificar">
                                <table class="auto-width">
                                    <tbody>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Empresa:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">Giro:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->giro }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Dirección</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->direccion }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">Teléfono:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->telefono }}</td>
                                        </tr>
                                        <tr class="row-label-blue-jll">
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;"></td>
                                            <td class="box-jll alinear-centro negrita letra-detalle-jll" style="width: 30%;">DATOS OBTENIDOS POR EL CANDIDATO</td>
                                            <td class="box-jll alinear-centro negrita letra-detalle-jll" style="width: 25%;">DATOS OBTENIDOS POR LA EMPRESA (R.H)</td>
                                            <td class="box-jll alinear-centro negrita letra-detalle-jll" style="width: 25%;">DATOS OBTENIDOS POR EL JEFE INMEDIATO/OTRO</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Puesto desempeñado:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->puesto_candidato }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->puesto_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->puesto_jefe_inmediato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Fecha de ingreso:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->fecha_ingreso_candidato }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->fecha_ingreso_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->fecha_ingreso_jefe_inmediato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Fecha de salida:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->fecha_salida_candidato }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->fecha_salida_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->fecha_salida_jefe_inmediato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Sueldo Final:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->sueldo_final_candidato }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->sueldo_final_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->sueldo_final_jefe_inmediato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Principales Funciones:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->funciones_candidato }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->funciones_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->funciones_jefe_inmediato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Motivo de Salida:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->motivo_salida_candidato }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->motivo_salida_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->motivo_salida_jefe_inmediato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Último Jefe:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->ultimo_jefe_candidato }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->ultimo_jefe_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->ultimo_jefe_jefe_inmediato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Puesto del Jefe:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->puesto_del_jefe_candidato }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->puesto_del_jefe_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->puesto_del_jefe_jefe_inmediato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Persona que provee la Información:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->da_informacion_candidato }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->da_informacion_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->da_informacion_jefe_inmediato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Puesto de la persona que provee la información</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->puesto_da_informacion_candidato }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->puesto_da_informacion_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->puesto_da_informacion_jefe_inmediato }}</td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Lo contratarían nuevamente:</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 30%;">{{ $referencia->contratar_nuevamente_candidato }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->contratar_nuevamente_empresa }}</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 25%;">{{ $referencia->contratar_nuevamente_jefe_inmediato }}</td>
                                        </tr>
                                    </tbody>
                                </table>                                        
                            </td>
                        </tr>

                    </table>
                    @endforeach                            
                    @endif
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
                            <td class="title-header-component table-border alinear-centro">
                                OTRAS FUENTES DE INGRESOS/OTRAS ACTIVIDADES ECONÓMICAS
                            </td>
                        </tr>
                        <tr>    
                            <td class="box-jll alinear-izquierda letra-detalle-jll">
                                {{ isset( $estudio->formatoBcm->otroIngreso ) ? $estudio->formatoBcm->otroIngreso->descripcion : '' }}
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
                            <td class="title-header-component table-border alinear-centro">
                                ESCOLARIDAD
                            </td>
                        </tr>
                        <tr>
                            <td class="table-border justificar">
                                <table class="auto-width">
                                    <thead>
                                        <tr>
                                            <th class="head-table-jll alinear-centro" style="width: 20%">GRADO</th>
                                            <th class="head-table-jll alinear-centro" style="width: 20%">INSTITUCIÓN</th>
                                            <th class="head-table-jll alinear-centro" style="width: 20%">LUGAR</th>                                            
                                            <th class="head-table-jll alinear-centro" style="width: 20%">PERIÓDO</th>                                            
                                            <th class="head-table-jll alinear-centro" style="width: 20%">CERTIFICADO</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>                                            
                                        <tr>                                        
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">
                                                {{ isset( $estudio->formatoBcm->escolaridad ) ? $estudio->formatoBcm->escolaridad->grado : '' }}
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">
                                                {{ isset( $estudio->formatoBcm->escolaridad ) ? $estudio->formatoBcm->escolaridad->institucion : '' }}
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">
                                                {{ isset( $estudio->formatoBcm->escolaridad ) ? $estudio->formatoBcm->escolaridad->lugar : '' }}
                                            </td>                                            
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">
                                                {{ isset( $estudio->formatoBcm->escolaridad ) ? $estudio->formatoBcm->escolaridad->periodo : '' }}
                                            </td>                                            
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">
                                                {{ isset( $estudio->formatoBcm->escolaridad ) ? $estudio->formatoBcm->escolaridad->certificado : '' }}
                                            </td>
                                        </tr>
                                        

                                        
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Persona que corroboro datos</td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">
                                                {{ isset( $estudio->formatoBcm->escolaridad ) ? $estudio->formatoBcm->escolaridad->corroboro_datos : '' }}
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">Verificación con la institución</td>
                                            <td colspan="2"  class="box-jll alinear-izquierda letra-detalle-jll" style="width: 40%;">
                                                {{ isset( $estudio->formatoBcm->escolaridad ) ? $estudio->formatoBcm->escolaridad->verifico_con_institucion : '' }}
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
                    <table class="auto-ancho">
                        <tr>
                            <td class="title-header-component table-border alinear-centro">
                                OBSERVACIONES
                            </td>
                        </tr>
                        <tr>    
                            <td class="box-jll alinear-izquierda letra-detalle-jll">
                                {{ isset( $estudio->formatoBcm->escolaridad ) ? $estudio->formatoBcm->escolaridad->observaciones : '' }}
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
                            <td class="title-header-component table-border alinear-centro">
                                PERSONAS QUE VIVEN EN EL DOMICILIO
                            </td>
                        </tr>
                        <tr>
                            <td class="table-border justificar">
                                <table class="auto-width">
                                    <thead>
                                        <tr>
                                            <th class="head-table-jll alinear-centro" style="width: 20%;">PARENTESCO</th>
                                            <th class="head-table-jll alinear-centro" style="width: 20%;">NOMBRE</th>
                                            <th class="head-table-jll alinear-centro" style="width: 20%;">EDAD Y ESTADO CIVL</th>                                            
                                            <th class="head-table-jll alinear-centro" style="width: 20%;">OCUPACIÓN</th>                                            
                                            <th class="head-table-jll alinear-centro" style="width: 20%;">DEPENDE DEL CANDIDATO</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if( $estudio->formatoBcm)
                                            @foreach ($estudio->formatoBcm->vivenEnDomicilio as $index => $persona)
                                                <tr>
                                                    <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">{{ $persona->parentesco }}</td>
                                                    <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">{{ $persona->nombre }}</td>
                                                    <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">{{ $persona->edo_civil }}</td>
                                                    <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">{{ $persona->ocupacion }}</td>
                                                    <td class="box-jll alinear-izquierda letra-detalle-jll" style="width:20%;">{{ $persona->depende_del_candidato }}</td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        
                                        

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
                    <table class="auto-ancho">
                        <tr>
                            <td class="title-header-component table-border alinear-centro">
                                OBSERVACIONES
                            </td>
                        </tr>
                        <tr>    
                            <td class="box-jll alinear-izquierda letra-detalle-jll">
                                {{ isset( $estudio->formatoBcm->observacionesVivenEnDomicilio ) ? $estudio->formatoBcm->observacionesVivenEnDomicilio->descripcion : '' }}
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
                            <td class="title-header-component table-border alinear-centro">
                                DESCRIPCIÓN DE LA VIVIENDA
                            </td>
                        </tr>
                        <tr>
                            <td class="table-border justificar">
                                <table class="auto-width">
                                    <tbody>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">
                                                Ubicación:
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll field-table-lg" style="width: 80%;">
                                                {{ isset( $estudio->formatoBcm->descripcionVivienda ) ? $estudio->formatoBcm->descripcionVivienda->ubicacion : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll" style="width: 20%;">
                                                Exterior:
                                            </td>
                                            <td class="box-jll alinear-izquierda letra-detalle-jll field-table-lg" style="width: 80%;">
                                                {{ isset( $estudio->formatoBcm->descripcionVivienda ) ? $estudio->formatoBcm->descripcionVivienda->exterior : '' }} 
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
                            <td class="title-header-component table-border alinear-centro">
                                TIPO DE VIVIENDA
                            </td>
                        </tr>
                        <tr>
                            <td class="table-border justificar">
                                <table class="auto-width">
                                    <thead>
                                        <tr>
                                            <th class="head-table-jll alinear-centro"
                                                <div @if( isset( $estudio->formatoBcm->tipoVivienda ) )
                                                        @if( trim( $estudio->formatoBcm->tipoVivienda->propia ) != '' ) 
                                                            style="background-color:#2E64FE;  width: 20% "
                                                                PROPIA
                                                           
                                                        @else
                                                            style=" width: 20% "
                                                        @endif
                                                    @endif>PROPIA
                                                </div>
                                            </th>
                                            <th class="head-table-jll alinear-centro"
                                                <div @if( isset( $estudio->formatoBcm->tipoVivienda ) )
                                                        @if( trim( $estudio->formatoBcm->tipoVivienda->hipotecada ) != '' ) 
                                                          style="background-color:#2E64FE;  width: 20% "
                                                                
                                                      
                                                        @else
                                                            style="width: 20% "
                                                        @endif
                                                    @endif>HIPOTECADA
                                                </div>
                                            </th>
                                            <th class="head-table-jll alinear-centro" 
                                                <div @if( isset( $estudio->formatoBcm->tipoVivienda ) )
                                                        @if( trim( $estudio->formatoBcm->tipoVivienda->rentada ) != '' ) 
                                                             style="background-color:#2E64FE;  width: 20% "
                                                             
                                                           @else
                                                                style="width: 20% "
                                                         @endif
                                                    @endif>RENTADA
                                                </div>
                                            </th>                                            
                                            <th class="head-table-jll alinear-centro"
                                                <div @if( isset( $estudio->formatoBcm->tipoVivienda ) )
                                                        @if( trim( $estudio->formatoBcm->tipoVivienda->prestada ) != '' ) 
                                                            style="background-color:#2E64FE;  width: 20% "
                                                               
                                                         
                                                        @else
                                                         
                                                            style=" width: 20% "
                                                           
                                                        @endif
                                                    @endif> PRESTADA                                                 
                                                </div>
                                            </th>                                            
                                            <th class="head-table-jll alinear-centro" 
                                                <div @if( isset( $estudio->formatoBcm->tipoVivienda ) )
                                                        @if( trim( $estudio->formatoBcm->tipoVivienda->padres ) != '' ) 
                                                            style="background-color:#2E64FE;  width: 20% "
                                                             
                                                           
                                                        @else
                                                           style=" width: 20% "
                                                           
                                                           
                                                        @endif
                                                    @endif>PADRES                                                  
                                                </div>
                                            </th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="box-jll alinear-centro letra-detalle-jll" style="width: 20%;">
                                                {{ isset( $estudio->formatoBcm->tipoVivienda ) ? $estudio->formatoBcm->tipoVivienda->propia : '' }}
                                            </td>
                                            <td class="box-jll alinear-centro letra-detalle-jll" style="width: 20%;">
                                                {{ isset( $estudio->formatoBcm->tipoVivienda ) ? $estudio->formatoBcm->tipoVivienda->hipotecada : '' }}
                                            </td>
                                            <td class="box-jll alinear-centro letra-detalle-jll" style="width: 20%;">
                                                {{ isset( $estudio->formatoBcm->tipoVivienda ) ? $estudio->formatoBcm->tipoVivienda->rentada : '' }}
                                            </td>
                                            <td class="box-jll alinear-centro letra-detalle-jll" style="width: 20%;">
                                                {{ isset( $estudio->formatoBcm->tipoVivienda ) ? $estudio->formatoBcm->tipoVivienda->prestada : '' }}
                                            </td>
                                            <td class="box-jll alinear-centro letra-detalle-jll" style="width: 20%;">
                                                {{ isset( $estudio->formatoBcm->tipoVivienda ) ? $estudio->formatoBcm->tipoVivienda->padres : '' }}
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
                    <table class="auto-ancho">
                        <tr>
                            <td class="title-header-component table-border alinear-centro">
                                OBSERVACIONES
                            </td>
                        </tr>
                        <tr>    
                            <td class="box-jll alinear-izquierda letra-detalle-jll">
                                {{ isset( $estudio->formatoBcm->tipoVivienda ) ? $estudio->formatoBcm->tipoVivienda->observaciones : '' }}
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
                <td colspan="3" class="space table-border" style="padding: 0;">                   
                    <table class="auto-ancho">
                        <tr>
                            <td colspan="2" class="title-header-component negrita alinear-centro">
                                VISTA DEL DOMICILIO
                            </td>
                        </tr>
                        <tr>
                         <td class="box-jll alinear-centro letra-detalle-jll" style="width: 100%;">
                             @if( $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first() )
                                    {{ Html::image(
                                                        $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                        $estudio->imagenes->where('tipo','Ubicacion')->sortByDesc('fecha_alta')->first()->archivo,'',['style' => 'width:100%;height:auto;']

                                    ) }}
                                @endif
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
                    <table class="auto-ancho">
                        <tr>
                            <td colspan="2" class="title-header-component table-border alinear-centro">
                                VISTA DEL DOMICILIO
                            </td>
                        </tr>
                        <tr>    
                            <td class="box-jll alinear-centro letra-detalle-jll" style="width: 50%;">
                                @if( $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first() )
                                    {{ Html::image(
                                                        $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                        $estudio->imagenes->where('tipo','Vivienda Exterior')->sortByDesc('fecha_alta')->first()->archivo,'',['style' => 'width:100%;height:auto;']

                                    ) }}
                                @endif
                            </td>
                             <td class="box-jll alinear-centro letra-detalle-jll" style="width: 50%;">
                                @if( $estudio->imagenes->where('tipo','Vivienda Interior')->sortByDesc('fecha_alta')->first() )
                                    {{ Html::image(
                                                        $estudio->imagenes->where('tipo','Vivienda Interior')->sortByDesc('fecha_alta')->first()->carpeta . '/' .
                                                        $estudio->imagenes->where('tipo','Vivienda Interior')->sortByDesc('fecha_alta')->first()->archivo,'',['style' => 'width:100%;height:auto;']

                                    ) }}
                                @endif
                            </td>
                        </tr>
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
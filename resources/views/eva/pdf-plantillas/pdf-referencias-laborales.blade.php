<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Estudio de referencias laborales</title>
    <!-- Latest compiled and minified CSS -->
    
    
    {!! Html::style('assets/css/pdf-formato-grid.css') !!}
 </head>
	<body>

	         <table >
                    <tbody>
                    <tr>
                      <td colspan="3" class="table-border alinear-centro">
                      <table class="tabla-componente">
                          <tbody>
                           <tr>
		                      <td class="table-border alinear-centro titulo-principal" >
		                         <strong>REFERENCIAS LABORALES</strong>
		                      </td>
		                    </tr>
		                    </tbody>
		                </table>
		                </td>
                    </tr>
                    <tr>
                    <td colspan="3" class="table-border alinear-centro">
                       <table class="tabla-componente">
                          <tbody>
                           <tr>
                         
                            <td class="logo-plantilla table-border">
                                {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo"]) !!}           
                            </td>
                            <td colspan="3" class="table-border alinear-centro" >
                                <p class="letra-detalle alinear-centro"><strong>INSTRUCCIONES:</strong>Por favor complete la información solicitada en cada una de las empresas en las que colaboró en los últimos 5 años. Es importante colocar la información que se le solicita en color azul.</p>
                            </td>

                           </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                   <!--------------------------------------------------------- PRIMER REFERENCIA -------------------------------- -->
<?php 
    $pintar = false;
    $indice = 1;
    
    $numero_col = $data['estudio']->fields->where('key','inf_lab_informacion_laboral_referencias_laborales')->first()->head_num_col;
?>
@foreach( $data['estudio']->fields->where('key','inf_lab_informacion_laboral_referencias_laborales')->first()->fieldsRowsColums() as  $index => $obj_col )
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
                           <td colspan="3" class="table-border alinear-centro">
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
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             NOMBRE DE LA EMPRESA
                                                                                         </p>
                                                                                    </td>
                                                                                    <td colspan="2">
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                            {{isset($datos['inf_lab_nombre_empresal_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             TELÉFONO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td colspan="2">
                                                                                         <p class="alinear-centro letra-detalle"">
                                                                                             {{isset($datos['inf_lab_telefono_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             GIRO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td colspan="2">
                                                                                         <p class="alinear-centro letra-detalle"">
                                                                                             {{isset($datos['inf_lab_giro_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             CELULAR
                                                                                         </p>
                                                                                    </td>
                                                                                    <td colspan="2">
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                             {{isset($datos['inf_lab_celular_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle"">
                                                                                             DIRECCIÓN
                                                                                         </p>
                                                                                    </td>
                                                                                    <td colspan="5">
                                                                                         <p class="alinear-centro letra-detalle"">
                                                                                             {{isset($datos['inf_lab_direccion_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }}
                                                                                         </p>                                                                                    
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             PUESTO INICIAL
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                              {{isset($datos['inf_lab_puesto_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }} 
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             SUELDO INICIAL
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                                {{isset($datos['inf_lab_sueldo_inicial_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }} 
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                             FECHA INGRESO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                            {{isset($datos['inf_lab_fecha_ingreso_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }} 
                                                                                         </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             PUESTO FINAL
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                           {{isset($datos['inf_lab_puesto_final_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }} 
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             SUELDO FINAL
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                           {{isset($datos['inf_lab_sueldo_final_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }} 
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             FECHA EGRESO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                              {{isset($datos['inf_lab_fecha_egreso_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }} 
                                                                                         </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             NOMBRE DEL JEFE INMEDIATO
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td colspan="2">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             PUESTO,  ÁREA Y DEPARTAMENTO
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td colspan="2">
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             TIEMPO QUE DEPENDIÓ DEL JEFE INMEDIATO
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                </tr> 
                                                                                <tr>
                                                                                    <td colspan="2">
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                        {{isset($datos['inf_lab_nombre_del_jefe_inmediato_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }} 
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td colspan="2">
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                        {{isset($datos['inf_lab_puesto_area_departamento_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }} 
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                    <td colspan="2">
                                                                                         <p class="alinear-centro letra-detalle"">
                                                                                         
                                                                                             {{isset($datos['inf_lab_tiempo_depende_jefe_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }} 
                                                                                         </p>
                                                                                    </td>                                                                                    
                                                                                </tr>   
                                                                                <tr>
                                                                                    <td colspan="6">
                                                                                         <p class="justificar letra-componente">
                                                                                            {{isset($datos['inf_lab_principales_funciones_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }} 
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
		                                                <tr>
		                                                    <td colspan="3" class="table-border">
		                                                        <table class="tabla-componente">
		                                                            <tbody>
		                                                                <tr>
		                                                                    <td>
		                                                                         <p class="alinear-centro label">
		                                                                             TIPO DE CONTRATO
		                                                                         </p>
		                                                                    </td>
		                                                                    <td>
		                                                                         <p class="alinear-centro label">
		                                                                             MOTIVO DE SEPARACIÓN
		                                                                         </p>
		                                                                    </td>
		                                                                </tr>
		                                                                <tr>
		                                                                    <td>
		                                                                         <p class="alinear-centro letra-detalle">
		                                                                            {{isset($datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_tipo_contrato_referencias_laborales_' . $index .'_row']:"" }} 
		                                                                         </p>
		                                                                    </td>
		                                                                    <td>
		                                                                         <p class="alinear-centro letra-detalle">
		                                                                         {{isset($datos['inf_lab_principales_referencias_laborales_' . $index .'_row'])?$datos['inf_lab_principales_referencias_laborales_' . $index .'_row']:"" }} 
		                                                                             
		                                                                         </p>
		                                                                    </td>
		                                                                </tr>
		                                                            </tbody>
		                                                        </table>
		                                                    </td>
		                                                </tr>
		                                            </td>
    <?php  $pintar = false; $indice = 1;?>

        @endif
		                                        </tr>
        @endforeach 
		  <!--------------------------------------------------------- END PRIMER REFERENCIA -------------------------------- -->
		        <!--------------------------------------------------------- SEGUNDA REFERENCIA -------------------------------- 
                      
                    <tr>
                      <td colspan="3" class="table-border alinear-centro">
                      <table class="tabla-componente">
                          <tbody>
                           <tr>
		                      <td class="table-border alinear-centro titulo-principal" >
		                         <strong>NOTAS</strong>
		                      </td>
		                    </tr>
		                    <tr>
		                    	<td>
		                    	  <p class="alinear-centro letra-detalle">
		                        
		                           </p>
		                    	</td>
		                    </tr>
		                    </tbody>
		                </table>
		                </td>
                    </tr>



<!-- ----------------------------- END TABBLA PRINCIPALA----------- -->
    				</tbody>
    		</table>
<!---------------------------------END TABLA PRINCIPAL --------------------- -->

	</body>
		
</html>
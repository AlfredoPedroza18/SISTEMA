<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Estudio de referencias personales</title>
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
		                         <strong>REFERENCIAS PERSONALES</strong>
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
                                <p class="letra-detalle alinear-centro"><strong>INSTRUCCIONES:</strong>Por favor complete la información solicitada en cada una de las casillas ,considerando que no puede colocar datos de familiares y/o ex jefes. </p>
                            </td>

                           </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                   <!--------------------------------------------------------- PRIMER REFERENCIA PERSONAL -------------------------------- -->
        <?php 
    $pintar = false;
    $indice = 1;
    
    $numero_col = $data['estudio']->fields->where('key','ref_per_referencias_personales_referencias_personales')->first()->head_num_col;
?>
@foreach( $data['estudio']->fields->where('key','ref_per_referencias_personales_referencias_personales')->first()->fieldsRowsColums() as  $index => $obj_col )
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
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             NOMBRE DE LA REFERENCIA
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                          {{isset($datos['ref_per_nombre_referencia_referencias_personales_' . $index .'_row'])?$datos['ref_per_nombre_referencia_referencias_personales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             CELULAR
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                              {{isset($datos['ref_per_celular_ referencias_personales_' . $index .'_row'])?$datos['ref_per_celular_ referencias_personales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             DOMICILIO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                             {{isset($datos['ref_per_domicilio_referencias_personales_' . $index .'_row'])?$datos['ref_per_domicilio_referencias_personales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             TELÉFONO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                              {{isset($datos['ref_per_telefono_referencias_personales_' . $index .'_row'])?$datos['ref_per_telefono_referencias_personales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             OCUPACIÓN
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                             {{isset($datos['ref_per_ocupacion_referencias_personales_' . $index .'_row'])?$datos['ref_per_ocupacion_referencias_personales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             EMPRESA
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                             {{isset($datos['ref_per_empresa_referencias_personales_' . $index .'_row'])?$datos['ref_per_empresa_referencias_personales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             PARENTESCO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                              {{isset($datos['ref_per_parentesco_referencias_personales_' . $index .'_row'])?$datos['ref_per_parentesco_referencias_personales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-componente">
                                                                                             TIEMPO DE CONOCERLO
                                                                                         </p>
                                                                                    </td>
                                                                                    <td>
                                                                                         <p class="alinear-centro letra-detalle">
                                                                                              {{isset($datos['ref_per_tiempo_conocerlo_referencias_personales_' . $index .'_row'])?$datos['ref_per_tiempo_conocerlo_referencias_personales_' . $index .'_row']:"" }}
                                                                                         </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4">
                                                                                         <p class="justificar letra-detalle">
                                                                                              {{isset($datos['ref_per_comentarios_referencias_personales_' . $index .'_row'])?$datos['ref_per_comentarios_referencias_personales_' . $index .'_row']:"" }}
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
                          <?php  $pintar = false; $indice = 1;?>

        @endif
                                                </tr>
        @endforeach 

                      
		            <!--------------------------------------------------------- END PRIMER REFERENCIA   PERSONAL -------------------------------- 
                   
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
		                            Indefinido, temporal, definido, etc.
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
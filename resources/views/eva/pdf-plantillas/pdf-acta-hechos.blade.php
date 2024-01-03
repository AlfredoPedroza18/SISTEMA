<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>ACTA HECHOS</title>
    <!-- Latest compiled and minified CSS -->
    
    
    {!! Html::style('assets/css/pdf-formato-grid.css') !!}
</head>
    <body>


<!-- ------------------------------------------------------- ENCABEZADO -------------------------------------->

                <table class="tabla-componente table-border">
                    <tbody>
                     
                       <tr>
                            <td colspan="3" class="table-border">
                                <table class="tabla-componente table-border">
                                    <tbody>
                                    <tr>
                                        <td colspan="3" class="table-border alinear-centro">
                                           <table class="tabla-componente table-border">
                                              <tbody>
                                               <tr>
                                             
                                                <td class="logo-plantilla table-border">
                                                    {!! Html::image('recursos_cotizaciones/maquila/logo-gent.jpg','',["class"=>"img-logo"]) !!}           
                                                </td>
                                                

                                               </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                    </tr>
                                    
                                        <tr>


                                            <td colspan="3" class="table-border">
                                                 <p class="alinear-centro titulo-componente">
                                                   Acta de hechos<br><br>
                                                </p>
                                            </td>
                                        </tr>
                                      
                                     <tr>
                                            <td colspan="3" class="table-border">
                                                <table class="tabla-componente table-border">
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <td class="table-border">
                                                                <p class="letra-detalle-visita-domiciliaria">

                                                                 <?php  
                                                                  
                                                                    $formato1=explode(" ",$data['acta'][0]->fecha_eliminacion);
                                                                    $fecha=explode("-",$formato1[0]);

                                                                 ?>
                                                                 

                                                                Siendo las {{ $formato1[1]}} horas, del día {{$fecha[2]}} del mes {{$fecha[1]}} del año {{$fecha[0]}} , en la Empresa Gen-T, ubicada en el domicilio de Calle Ohio no. 15, Colonia Nápoles, Delegación Benito Juárez CP 03810 Ciudad de México.
                                                                <br> <br>

                                                                El presente documento tiene la finalidad de otorgar cumplimiento al proceso de Eliminación Segura de la Información. La destrucción de información digital de los estudios socioeconómicos que estaban en resguardo durante el último año al servicio de Gen-T.<br><br>
                                                               

                                                                </p><br><br>

                                                               
                                                            </td>
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
                                                            <td class="table-border">
                                                                <p class="letra-detalle-visita-domiciliaria">
                                                                  Se declara que se destruye el siguiente estudio socioeconómico:
                                                                </p>                                                              
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-border">
                                                                <p class="letra-detalle-visita-domiciliaria">


                            1.- {{ $data['acta'][0]->candidato.", ".$data['acta'][0]->nombre.', '.$data['acta'][0]->nombre_estado.', '.$data['acta'][0]->fecha_eliminacion   }} 

                                                                </p>                                                           
                                                            </td>
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
                                                            <td class="table-border">
                                                                <p class="letra-detalle-visita-domiciliaria">
                                                                  Habiéndose hecho del conocimiento de los participantes la razón de la reunión y el levantamiento de la presente acta y con las declaraciones anteriores se da por concluida la presenta acta y se firma de conformidad por los participantes en ella. 
                                                                </p><br><br>

                                                               
                                                            </td>
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
                                                            <td class="table-border">
                                                                <p class="border-footer">
                                                                  
                                                                </p><br>

                                                               
                                                            </td>
                                                            <td class="table-border">
                                                                <p class="border-footer">
                                                                  
                                                                </p><br>

                                                               
                                                            </td>
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
                                                            <td class="table-border alinear-centro">
                                                                
                                                                  David González Estrada<br>
                                                                Responsable de información Digital<br>
                                                                Líder de Tecnología de la Información
                                                                .<br><br><br>
                                                              

                                                               
                                                            </td>
                                                            <td class="table-border alinear-centro">
                                                               
                                                                María Eugenia Herrera Cedeño<br>
                                                            Responsable de Información Física<br>
                                                            Líder Calidad y Operaciones
                                                            <br><br><br>
                                                                

                                                               
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
    </body>
</html>
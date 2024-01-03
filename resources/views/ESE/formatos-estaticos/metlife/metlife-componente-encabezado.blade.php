
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">FORMATO METLIFE</h4>
        
    </div>
    <div class="panel-body">
    <div class="form-horizontal">
  
           <div class="form-group">
                <label class="col-md-2 control-label">Empresa: </label>
                <div class="col-md-5">
                    <input  type="text" 
                            class="form-control" 
                            readonly="readonly" 
                            value="Metlife" 
                            name="encabezado[empresa]">
                 
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Nombre del candidato: </label>
                <div class="col-md-5">
                    <input type="hidden" name="encabezado[id]" value="{{ isset( $estudio->formatoMetlife ) ? $estudio->formatoMetlife->id : 0 }}">
                    <input  type="text" 
                            class="form-control" 
                            readonly="readonly" 
                            value="{{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}" 
                            name="encabezado[nombre]">
            </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 text-center">ESTATUS</div>
            </div>
               <div class="form-group">
                <label class="col-md-2 control-label">Puesto: </label>
                <div class="col-md-5">
                  <input  type="text" 
                            class="form-control" 
                            value="{{ isset( $estudio->formatoMetlife) ? $estudio->formatoMetlife->encabezado->puesto: '' }}" 
                            name="encabezado[puesto]">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <select class="form-control" name="encabezado[resultado_ese]">
                          <option value="1" 
                                    @if( $estudio->formatoMetlife ) 
                                            @if( $estudio->formatoMetlife->encabezado->resultado_ese == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Recomendable</option>
                          <option value="2" 
                                    @if( $estudio->formatoMetlife ) 
                                            @if( $estudio->formatoMetlife->encabezado->resultado_ese == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Recomendable con reservas</option>
                          <option value="3" 
                                    @if( $estudio->formatoMetlife ) 
                                            @if( $estudio->formatoMetlife->encabezado->resultado_ese == '3' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >No Recomendable</option>
                      </select>

                    {{--

                    <input  type="text" 
                            class="form-control text-center" 
                            readonly="readonly" 
                            value="{{ isset( $estudio->resultado_final_ese ) ?  $estudio->resultado_final_ese->nombre : 'Sin resultado' }}" 
                            name="encabezado[resultado_ese]">
                    --}}
         
                </div>
            </div>
        

        <div class="form-group">
          <div class="row">
                <div class="col-md-12 text-center"><pre>RESUMEN</pre></div>
           </div>
            <div class="row">
                <div class="col-md-12 text-center"><label class="control-label">1. Situación Socieconómica:</label></div>
                <textarea class="form-control" placeholder="Describir Situación Socioeconómica " rows="5"   name="encabezado[situacion_economica]">{{ isset( $estudio->formatoMetlife ) ?  $estudio->formatoMetlife->encabezado->situacion_economica :'' }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 text-center"><label class="control-label">2. Escolaridad:</label></div>
                <textarea class="form-control" placeholder="Describir Escolaridad " rows="5"   name="encabezado[escolaridad]">{{ isset( $estudio->formatoMetlife ) ?  $estudio->formatoMetlife->encabezado->escolaridad :'' }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 text-center"><label class="control-label">3. Trayectoria Laboral</label></div>
                <textarea class="form-control" placeholder="Describir trayectoria laboral " rows="5"   name="encabezado[trayectoria_laboral]">{{ isset( $estudio->formatoMetlife ) ?  $estudio->formatoMetlife->encabezado->trayectoria_laboral :'' }}</textarea>
            </div>
        </div>
        <div class="row">
                <div class="col-md-12 text-center"><pre>4. Valores calificados del candidato durante la aplicación del Estudio Socioeconomico</pre></div>
           </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <div class="row">
                       <div class="col-md-4 text-right"><label class="control-label"><strong>Valor</strong></label></div>
                       <div class="col-md-4 text-center"><label class="control-label"><strong>Resultado</strong></label></div>
                     
                    </div>
                    
                 <!-- BEGIN  disponibilidad --> 
                    <div class="row">
                    
                       <div class="col-md-4 text-right"><label class="control-label">DISPONIBILIDAD</label></div>
                       <div class="col-md-4 text-center">
                        <select class="form-control" name="encabezado[valor_calificado_disponibilidad]">
                            <option value="1" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_disponibilidad == '1' ) selected="selected" @endif @endif>BUENA</option>
                            <option value="2" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_disponibilidad == '2' ) selected="selected" @endif @endif>REGULAR</option>
                            <option value="3" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_disponibilidad == '3' ) selected="selected" @endif @endif>MALA</option>
              
                    </select>

                       </div>
                     
                    </div>
                    <!-- END disponibilidad -->
                    <!-- BEGIN  PUNTUALIDAD --> 
                    <div class="row">
                     
                       <div class="col-md-4 text-right"><label class="control-label">PUNTUALIDAD</label></div>
                       <div class="col-md-4 text-center">
                        <select class="form-control" name="encabezado[valor_calificado_puntualidad]">
                            <option value="1" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_puntualidad == '1' ) selected="selected" @endif @endif>BUENA</option>
                            <option value="2" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_puntualidad == '2' ) selected="selected" @endif @endif>REGULAR</option>
                            <option value="3" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_puntualidad == '3' ) selected="selected" @endif @endif>MALA</option>
              
                    </select>

                       </div>
                      
                    </div>
                    <!-- END PUNTUALIDAD -->
                    <!-- BEGIN  SERIEDAD --> 
                    <div class="row">
                           
                             <div class="col-md-4 text-right"><label class="control-label">SERIEDAD</label></div>
                               <div class="col-md-4 text-center">
                                        <select class="form-control" name="encabezado[valor_calificado_seriedad]">
                                            <option value="1" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_seriedad == '1' ) selected="selected" @endif @endif>BUENA</option>
                                            <option value="2" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_seriedad == '2' ) selected="selected" @endif @endif>REGULAR</option>
                                            <option value="3" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_seriedad == '3' ) selected="selected" @endif @endif>MALA</option>
                              
                                    </select>

                               </div>
                    </div>
                    <!-- END SERIEDAD -->  
                     <!-- BEGIN  ACTITUD --> 
                    <div class="row">
                            
                             <div class="col-md-4 text-right"><label class="control-label">ACTITUD</label></div>
                               <div class="col-md-4 text-center">
                                        <select class="form-control" name="encabezado[valor_calificado_actitud]">
                                            <option value="1" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_actitud == '1' ) selected="selected" @endif @endif>BUENA</option>
                                            <option value="2" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_actitud == '2' ) selected="selected" @endif @endif>REGULAR</option>
                                            <option value="3" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_actitud == '3' ) selected="selected" @endif @endif>MALA</option>
                              
                                    </select>

                               </div>
                    </div>
                    <!-- END ACTITUD -->
                     <!-- BEGIN  CONFIABILIDAD --> 
                    <div class="row">
                            
                             <div class="col-md-4 text-right"><label class="control-label">CONFIABILIDAD</label></div>
                               <div class="col-md-4 text-center">
                                        <select class="form-control" name="encabezado[valor_calificado_confiabilidad]">
                                            <option value="1" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_confiabilidad == '1' ) selected="selected" @endif @endif>BUENA</option>
                                            <option value="2" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_confiabilidad == '2' ) selected="selected" @endif @endif>REGULAR</option>
                                            <option value="3" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_confiabilidad == '3' ) selected="selected" @endif @endif>MALA</option>
                              
                                    </select>

                               </div>
                    </div>
                    <!-- END CONFIABILIDAD --> 
                    <!-- BEGIN  SEGURIDAD EN SI MISMO --> 
                    <div class="row">
                        
                             <div class="col-md-4 text-right"><label class="control-label">SEGURIDAD EN SI MISMO</label></div>
                               <div class="col-md-4 text-center">
                                        <select class="form-control" name="encabezado[valor_calificado_seguridad]">
                                            <option value="1" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_seguridad == '1' ) selected="selected" @endif @endif>BUENA</option>
                                            <option value="2" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_seguridad == '2' ) selected="selected" @endif @endif>REGULAR</option>
                                            <option value="3" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_seguridad == '3' ) selected="selected" @endif @endif>MALA</option>
                              
                                    </select>

                               </div>
                    </div>
                    <!-- END SEGURIDAD EN SI MISMO -->  
                      <!-- BEGIN PRESENTACIÓN --> 
                    <div class="row">
                           
                             <div class="col-md-4 text-right"><label class="control-label">PRESENTACIÓN</label></div>
                               <div class="col-md-4 text-center">
                                        <select class="form-control" name="encabezado[valor_calificado_presentacion]">
                                            <option value="1" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_presentacion == '1' ) selected="selected" @endif @endif>BUENA</option>
                                            <option value="2" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_presentacion == '2' ) selected="selected" @endif @endif>REGULAR</option>
                                            <option value="3" @if( $estudio->formatoMetlife ) @if( $estudio->formatoMetlife->encabezado->valor_calificado_presentacion == '3' ) selected="selected" @endif @endif>MALA</option>
                              
                                    </select>

                               </div>
                    </div>
                    <!-- ENDPRESENTACIÓN --> 
                    <div class="row">
                      <div class="col-md-12 text-center"><label class="control-label">Comentarios</label></div>
                          <div class="col-md-12 text-center">
                            <textarea class="form-control" placeholder="Comentarios " rows="5"   name="encabezado[valor_calificado_comentario]">{{ isset( $estudio->formatoMetlife ) ?  $estudio->formatoMetlife->encabezado->valor_calificado_comentario :'' }}</textarea>
                       </div>
                    </div> 
            </div>
        </div>
     </div>
  </div><!--edn formulario horizontal -->
  </div>
</div>

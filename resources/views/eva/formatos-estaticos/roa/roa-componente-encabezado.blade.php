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
                            value="GRUPO ROA" 
                            name="encabezado[empresa]">
                 
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Nombre del candidato: </label>
                <div class="col-md-5">
                    <input type="hidden" name="encabezado[id]" value="{{ isset( $estudio->formatoRoa ) ? $estudio->formatoRoa->id : 0 }}">
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
                            value="{{ isset( $estudio->formatoRoa) ? $estudio->formatoRoa->encabezado->puesto: '' }}" 
                            name="encabezado[puesto]">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <select class="form-control" name="encabezado[resultado_ese]">
                          <option value="1" 
                                    @if( $estudio->formatoRoa ) 
                                            @if( $estudio->formatoRoa->encabezado->resultado_ese == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Recomendable</option>
                          <option value="2" 
                                    @if( $estudio->formatoRoa ) 
                                            @if( $estudio->formatoRoa->encabezado->resultado_ese == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Recomendable con reservas</option>
                          <option value="3" 
                                    @if( $estudio->formatoRoa ) 
                                            @if( $estudio->formatoRoa->encabezado->resultado_ese == '3' ) 
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
                <textarea class="form-control" placeholder="Describir Situación Socioeconómica " rows="5"   name="encabezado[situacion_economica]">{{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->encabezado->situacion_economica :'' }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 text-center"><label class="control-label">2. Escolaridad:</label></div>
                <textarea class="form-control" placeholder="Describir Escolaridad " rows="5"   name="encabezado[escolaridad]">{{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->encabezado->escolaridad :'' }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 text-center"><label class="control-label">3. Trayectoria Laboral</label></div>
                <textarea class="form-control" placeholder="Describir trayectoria laboral " rows="5"   name="encabezado[trayectoria_laboral]">{{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->encabezado->trayectoria_laboral :'' }}</textarea>
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
                            <option value="1" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->valor_calificado_disponibilidad == '1' ) selected="selected" @endif @endif>BUENA</option>
                            <option value="2" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->valor_calificado_disponibilidad == '2' ) selected="selected" @endif @endif>REGULAR</option>
                            <option value="3" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->valor_calificado_disponibilidad == '3' ) selected="selected" @endif @endif>MALA</option>
              
                    </select>

                       </div>
                     
                    </div>
                    <!-- END disponibilidad -->
                    <!-- BEGIN  PUNTUALIDAD --> 
                    <div class="row">
                     
                       <div class="col-md-4 text-right"><label class="control-label">PUNTUALIDAD</label></div>
                       <div class="col-md-4 text-center">
                        <select class="form-control" name="encabezado[valor_calificado_puntualidad]">
                            <option value="1" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->valor_calificado_puntualidad == '1' ) selected="selected" @endif @endif>BUENA</option>
                            <option value="2" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->valor_calificado_puntualidad == '2' ) selected="selected" @endif @endif>REGULAR</option>
                            <option value="3" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->valor_calificado_puntualidad == '3' ) selected="selected" @endif @endif>MALA</option>
              
                    </select>

                       </div>
                      
                    </div>
                    <!-- END PUNTUALIDAD -->
                   
                      <!-- BEGIN PRESENTACIÓN --> 
                    <div class="row">
                           
                             <div class="col-md-4 text-right"><label class="control-label">PRESENTACIÓN</label></div>
                               <div class="col-md-4 text-center">
                                        <select class="form-control" name="encabezado[valor_calificado_presentacion]">
                                            <option value="1" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->valor_calificado_presentacion == '1' ) selected="selected" @endif @endif>BUENA</option>
                                            <option value="2" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->valor_calificado_presentacion == '2' ) selected="selected" @endif @endif>REGULAR</option>
                                            <option value="3" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->valor_calificado_presentacion == '3' ) selected="selected" @endif @endif>MALA</option>
                              
                                       </select>

                               </div>
                    </div>
                    <!-- ENDPRESENTACIÓN --> 
                    <div class="row">
                      <div class="col-md-12 text-center"><label class="control-label">Comentarios</label></div>
                          <div class="col-md-12 text-center">
                            <textarea class="form-control" placeholder="Comentarios " rows="5"   name="encabezado[valor_calificado_comentario]">{{ isset( $estudio->formatoRoa ) ?  $estudio->formatoRoa->encabezado->valor_calificado_comentario :'' }}</textarea>
                       </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12 text-center">
                              <label class="control-label"><pre>La entrevista se llevo a cabo en su departamento  su actitud fue amable todo el tiempo y sus respuestas fueron:</pre></label>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12 text-center">
                               <select class="form-control" name="encabezado[entrevista_tipo]">
                                            <option value="1" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->entrevista_tipo == '1' ) selected="selected" @endif @endif>CLARAS</option>
                                            <option value="2" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->entrevista_tipo == '2' ) selected="selected" @endif @endif>CONCRETAS</option>
                                            <option value="3" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->entrevista_tipo == '3' ) selected="selected" @endif @endif>FLUIDAS</option>
                                            <option value="4" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->entrevista_tipo == '4' ) selected="selected" @endif @endif>CONCRETAS</option>
                                            <option value="5" @if( $estudio->formatoRoa ) @if( $estudio->formatoRoa->encabezado->entrevista_tipo == '5' ) selected="selected" @endif @endif>INCOMPLETAS</option>
                              
                                       </select>
                        </div>
                    </div>
            </div>
        </div>
     </div>
  </div><!--edn formulario horizontal -->
  </div>
</div>

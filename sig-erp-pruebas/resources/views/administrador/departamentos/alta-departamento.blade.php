<div class="jumbotron">
  <!-- begin row 1 -->
           					  <div class="row">
           					  	<div class="col-md-12" >
	           					   <div class="note note-success">
										<i class="fa fa-cubes fa-2x pull-left"></i><h4>Departamentos</h4> 
								    </div>	           					
							     </div>
           					   </div>

           					   <div class="row">
                                                <!-- begin col-4 -->
                          <div class="col-md-4">
													           <div class="form-group block1">
                                           <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
														              <label>{{ Form::label('Departamento', '* Código') }}</label>

															{{ Form::text('nomenclatura',null,['class' => 'form-control','placeholder'=>'CN','id'=>'nombre','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                                                      
												          	</div>
                          </div>
                           <div class="col-md-4">
                                     <div class="form-group block1">
                                           <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                          <label>{{ Form::label('Nombre', '* Nombre Departamento') }}</label>

                              {{ Form::text('nombre',null,['class' => 'form-control','placeholder'=>'CN + Nombre','id'=>'nombre','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                                                      
                                    </div>
                          </div>
                           <div class="col-md-4">
                                     <div class="form-group block1">
                                           <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                          <label>{{ Form::label('Telenono', 'Telefono') }}</label>

                              {{ Form::text('telefono',null,['class' => 'form-control','placeholder'=>'(045)525555','id'=>'telefono','data-parsley-group'=>'wizard-step-1','required'=>'required','onblur'=>'sizeTelefonos(this)','maxlength'=>'10'])}}
                                                      
                                    </div>
                          </div>
                        </div>
                                         <div class="row">
                                                <!-- begin col-1 -->
                                          <div class="col-md-4">
                          <div class="form-group">
                            <label>{{ Form::label('CP', 'CP') }}</label><br>
                                                        
                                                        {{ Form::text('cp',null,['class' => 'form-control','placeholder'=>'México','id'=>'cp','data-parsley-group'=>'wizard-step-2','maxlength'=>'5'])}} 
                                                        <div id="result_search"></div>
                                                        
                                                        {{-- Form::select('cp',$cp,null,['class'=>'.js-example-basic-multiple-limit default-select2 form-control input-lg','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','id'=>'cp','style'=>'width: 100%','onkeypress'=>'EnterCp(event)']) --}}
                                                      

                                                        
                          </div>
                                                </div>
                                                <!-- end col-1 -->
                                                
                                                <!-- begin col-3 -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>{{ Form::label('Estado ', 'Estado ') }}</label>
                                                        {{ Form::text('estado',null,['class' => 'form-control','placeholder'=>'Hidalgo','id'=>'estado','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}
                                                    </div>
                                                </div>
                                                <!-- end col-3 -->
                                                <!-- begin col-3 -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>{{ Form::label('Municipio', ' Municipio') }}</label>
                                                        {{ Form::text('municipio',null,['class' => 'form-control','placeholder'=>'Hidalgo','id'=>'municipio','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}  
                                                    </div>
                                                </div>
                                                <!-- end col-3 -->
                                                <!-- begin col-2 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>{{ Form::label('Colonia', 'Colonia') }}</label>
                                                       
                                                         <!--select name="df_colonia" class="form-control input-lg" data-live-search='true' data-parsley-group='wizard-step-1' data-style='btn-white' data-size='10' id='df_colonia'  style='width: 100%' -->
                                                        
                                                        {{ Form::text('colonia',null,['class' => 'form-control','placeholder'=>'México','id'=>'colonia','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}} 
                                                        <div id="resultado_colonias"></div>


                                                       
                                                        
                                                       </select>
                                                    </div>
                                                </div>
                                                <!-- end col-2 -->
                                            </div>
                                            <!-- end row 1-->
                                            <!-- begin row 2 -->
                                            <div class="row">
                                             
                                              <!-- end col-1 -->     
                                              <!-- begin col-2 -->
                                              <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>{{ Form::label('Calle', 'Calle') }}</label>
                                                        {{ Form::text('calle',null,['class' => 'form-control','placeholder'=>'Álvaro Obregón','id'=>'calle','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}              
                                                    </div>
                                                </div>
                                              <!-- end col-2 -->    
                                              <!-- begin col-3 -->
                                              <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>{{ Form::label('N° Exterior', 'N° Exterior') }}</label>
                                                        {{ Form::text('no_exterior',null,['class' => 'form-control','placeholder'=>'E12','id'=>'no_exterior','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}} 
                                                    </div>
                                                </div>
                                              <!-- end col-3 -->  
                                               <!-- begin col-4 -->
                                              <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>{{ Form::label('N° Interior', 'N° Interior') }}</label>
                                                        {{ Form::text('no_interior',null,['class' => 'form-control','placeholder'=>'99','id'=>'no_interior','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}} 
                                                    </div>
                                                </div>
                                          </div>
                                           <div class="row">
                                              <div class="col-md-3 col-md-offset-8 text-right">
                                              {{ Form::button('Guardar Departamento', ['class' => 'btn btn-success btn-block','id' => 'btn-alta-departamento','type'=>'submit'])}}
                                              </div>
                                            </div>
                                          </div>
                                           <input type="hidden" id="num_id" value="{{ isset($depCn)?$depCn->id:'' }}">

 <!-- end row -->
</div>
<div class="jumbotron">
           					   <!-- begin row 1 -->
           					  <div class="row">
           					  	<div class="col-md-12" >
	           					   <div class="note note-success">
										<i class="fa fa-building-o fa-2x pull-left"></i><h4>Datos Fiscales</h4> 
								    </div>	           					
							     </div>
           					   </div>
                                            <div class="row">
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group block1">
                                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
														<label>{{ Form::label('Nombre Comercial', '* Nombre Comercial') }}</label>

															{{ Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Empresa S.A de C.V','id'=>'nombre','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                                                        


														
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
								                        

														<label>{{ Form::label('Forma Juridica', ' Forma Juridica') }}</label>

{{ Form::select('forma_juridica',[''=>'Selecciona una opci&oacute;n','1'=>'Persona Fisica','2'=>'Persona Moral'],null,['class'=>'form-control','data-parsley-group'=>'wizard-step-1','data-size'=>'10','id'=>'forma_juridica']) }}


														     
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group pm" style="display:none" >
														<label>{{ Form::label('Razon Social', ' Razon Social') }}</label>
														{{ Form::text('razon_social',null,['class' => 'form-control','placeholder'=>'Empresa S.A de C.V','id'=>'razon_social','data-parsley-group'=>'wizard-step-1'])}}
													</div>
													<div class="form-group pf" style="display:none" id="curp-nombre" >
														<label>{{ Form::label('Nombre',' Nombre') }}</label>
														{{ Form::text('nombre_curp',null,['class' => 'form-control','placeholder'=>'Arturo','id'=>'nombre_curp','data-parsley-group'=>'wizard-step-1'])}}

                                                        
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                            </div>
                                            <!-- end row 1-->
                                             <!-- begin row 2-->
                                            <div class="row pf" style="display:none" >
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group block1" id="curp-apellido_paterno">
														<label>{{ Form::label('Apellido Paterno', ' Apellido Paterno') }}</label>
															{{ Form::text('apellido_paterno',null,['class' => 'form-control','placeholder'=>'Gonzalez','id'=>'apellido_paterno','data-parsley-group'=>'wizard-step-1'])}}

                                                      										
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group" id="curp-nombre">
													 
														<label>{{ Form::label('Apellido Materno', 'Apellido Materno') }}</label>
														{{ Form::text('apellido_materno',null,['class' => 'form-control','placeholder'=>'Tapia','id'=>'apellido_materno','data-parsley-group'=>'wizard-step-1'])}}

														     
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group" id="curp-genero" >
														<label>{{ Form::label('Genero', 'Genero') }}</label><br>
														{{ Form::select('genero',[''=>'Selecciona una opci&oacute;n','H'=>'Masculino','M'=>'Femenino'],null,['class'=>'form-control ','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'genero']) }}
                                                </div>
                                                <!-- end col-4 -->
                                            </div>
                                        </div>
                                        <div class="row pm" style="display:none" >
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                 <label>Fecha de Constitución</label><br>
                                                    
                                                    
                                                       {{ Form::date('fecha_constitucion',null,['class' => 'form-control','id'=>'fecha_constitucion','data-parsley-group'=>'wizard-step-1','maxlength'=>''])}}
                                                </div>
                                              </div>
                                              <div class="col-md-4">
                                                <div class="form-group">
                                                 <label>Inicio de Operaciones</label><br>
                                                    
                                                    
                                                       {{ Form::date('FechainicioOperaciones',null,['class' => 'form-control','id'=>'FechainicioOperaciones','data-parsley-group'=>'wizard-step-1','maxlength'=>''])}}
                                                </div>
                                              </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                 <label>Registro Mercantil</label><br>
                                                    
                                                    
                                                       {{ Form::date('registroMercantil',null,['class' => 'form-control','id'=>'registroMercantil','data-parsley-group'=>'wizard-step-1','maxlength'=>''])}}
                                                </div>
                                              </div>
                                              
                                              
                                        </div>

                                            <!-- end row 2-->
                                            <div class="row pf" style="display:none" >
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group block1" id="curp-fec_nacimiento">
                                                        <label>{{ Form::label('Fecha Nacimiento', 'Fecha Nacimiento') }}</label>
                                                           {{ Form::date('fecha_nacimiento_pros',null,['class' => 'form-control','id'=>'fecha_nacimiento_pros','data-parsley-group'=>'wizard-step-3','maxlength'=>''])}}

                                                                                            
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group" id="curp-lugar_nacimiento">
                                                     
                                                        <label>{{ Form::label('Lugar de Nacimiento', 'Lugar de Nacimiento') }}</label>
                                                       {{ Form::select('lugar_nacimiento',$lugar_nacimiento,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'lugar_nacimiento']) }}

                                                             
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>{{ Form::label('CURP', 'CURP') }}</label>
                                                        {{ Form::text('curp',null,['class' => 'form-control','placeholder'=>'BADD110313HCMLNS09','id'=>'curp','data-parsley-group'=>'wizard-step-1','maxlength'=>'18'])}}
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->
                                            </div>
                                            <!-- end row 2-->
                                            <!-- Begin row 3-->
                                              <div class="row">
                                                <!-- begin col-1 -->
                                                 <div class="col-md-4">
                                                    <div class="form-group pm" style="display:none" >
                                                     
                                                        <label>{{ Form::label('CLASE DE PM', 'Clase de PM') }}</label>
{{ Form::select('clase_pm',[''=>'Selecciona una opci&oacute;n','1'=>'SA','2'=>'S.A de C.V','3'=>' S. de RL de CV','4'=>'SC','5'=>'AC'],null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'clase_pm']) }}
                                                     </div>
                                                      
                                                    <div class="form-group" >
                                                        <label>{{ Form::label('RFC ', ' RFC') }}</label>
                                                        {{ Form::text('rfc',null,['class' => 'form-control','placeholder'=>'CUPU800825569','id'=>'rfc','data-parsley-group'=>'wizard-step-1','maxlength'=>'13'])}}
                                                    </div>
                                                     

                                                </div>
                                                <!-- end col-1 -->
                                                <!-- begin col-2-->
                                                <div class="col-md-4">
                                               
                                                    <div class="form-group" >
                                                        <label>{{ Form::label('Actividad Economica', 'Actividad Ecónomica') }}</label>

                                                        {{ Form::select('actividad_economica',$actividad_economica,null,['class'=>'form-control','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'10','id'=>'actividad_economica']) }}

                                                        
                                                    </div>
                                                    
                                                </div>
                                                <!-- end col-2 -->
                                                

                                              </div><!-- end row 3-->
                                          <div class="row">
			           					  	<div class="col-md-12" >
				           					   <div class="note note-success">
													<i class="fa fa-shield fa-2x pull-left"></i><h4>Representante Legal</h4>
											    </div>	           					
										     </div>
			           					   </div>
                                              <div class="row">
                                                <!-- begin col-1 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<label>{{ Form::label('Nombre', 'Nombre') }}</label><br>
                                                        
                                                        {{ Form::text('rlegal_nombre',null,['class' => 'form-control','placeholder'=>'Nombre','id'=>'rlegal_nombre','data-parsley-group'=>'wizard-step-2','maxlength'=>'' ,'required'=>'required'])}} 
      
													</div>
                                                </div>
                                                 <div class="col-md-4">
													<div class="form-group">
														<label>{{ Form::label('Apellido Paterno', 'Apellido Paterno') }}</label><br>
                                                        
                                                        {{ Form::text('rlegal_apaterno',null,['class' => 'form-control','placeholder'=>'Apellido Paterno','id'=>'rlegal_apaterno','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}} 
 
													</div>
                                                </div>
                                                  <div class="col-md-4">
													<div class="form-group">
														<label>{{ Form::label('Apellido Materno', 'Apellido materno') }}</label><br>
                                                        
                                                        {{ Form::text('rlegal_amaterno',null,['class' => 'form-control','placeholder'=>'Apellido Materno','id'=>'rlegal_amaterno','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}} 
 
													</div>
                                                </div>
                                              </div>
                                              <div class="row">
                                              	      <div class="col-md-4">
                                              	        <div class="form-group">
														<label>{{ Form::label('Telefono', 'Telefono') }}</label><br>
                                                        
                          {{ Form::text('rlegal_telefono',null,['class' => 'form-control','placeholder'=>'56987533','id'=>'rlegal_telefono','data-parsley-group'=>'wizard-step-3rd-step-2','maxlength'=>'10','onblur'=>'sizeTelefonos(this)'])}} 
													     </div>
                                              	       </div>
                                              	       <div class="col-md-4">
                                              	        <div class="form-group">
														<label>{{ Form::label('Correo', 'Correo') }}</label><br>
                                                        
                                              {{ Form::text('rlegal_correo',null,['class' => 'form-control','placeholder'=>'correo@dominio.com','id'=>'rlegal_correo','data-parsley-group'=>'wizard-step-3rd-step-2','maxlength'=>'','required'=>'required','onblur'=>'validarEmail(this)'])}} 
													     </div>
                                              	       </div>
                                              	         <div class="col-md-4">
                                              	        <div class="form-group">
														<label>{{ Form::label('Página web', 'Pagina Web') }}</label><br>
                                                        
                                                        {{ Form::text('paginaWeb',null,['class' => 'form-control','placeholder'=>'http://www.google.com','id'=>'paginaWeb','data-parsley-group'=>'wizard-step-3rd-step-2','maxlength'=>''])}} 
													     </div>
                                              	       </div>
                                              </div>
 											<div class="row">
			           					  	<div class="col-md-12" >
				           					   <div class="note note-success">
													<i class="fa fa-share-square-o fa-2x pull-left"></i><h4>Dirección Fiscal</h4>
											    </div>	           					
										     </div>
			           					   </div>
                                              <!-- begin row 1-->
                                            <div class="row">
                                                <!-- begin col-1 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<label>{{ Form::label('CP', 'CP') }}</label><br>
                                                        
                                                        {{ Form::text('df_cp',null,['class' => 'form-control','placeholder'=>'México','id'=>'demo_cp','data-parsley-group'=>'wizard-step-2','maxlength'=>'5'])}} 
                                                        <div id="result_search"></div>
                                                        
                                                        {{-- Form::select('df_cp',$cp,null,['class'=>'.js-example-basic-multiple-limit default-select2 form-control input-lg','data-live-search'=>'true','data-parsley-group'=>'wizard-step-1','data-style'=>'btn-white','data-size'=>'','id'=>'df_cp','style'=>'width: 100%','onkeypress'=>'EnterCp(event)']) --}}
                                                      

                                                        
													</div>
                                                </div>
                                                <!-- end col-1 -->
                                                
                                                <!-- begin col-3 -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>{{ Form::label('Estado ', 'Estado ') }}</label>
                                                        {{ Form::text('df_estado',null,['class' => 'form-control','placeholder'=>'Hidalgo','id'=>'df_estado','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}
                                                    </div>
                                                </div>
                                                <!-- end col-3 -->
                                                <!-- begin col-3 -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>{{ Form::label('Municipio', ' Municipio') }}</label>
                                                        {{ Form::text('df_municipio',null,['class' => 'form-control','placeholder'=>'Hidalgo','id'=>'df_municipio','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}  
                                                    </div>
                                                </div>
                                                <!-- end col-3 -->
                                                <!-- begin col-2 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>{{ Form::label('Colonia', 'Colonia') }}</label>
                                                       
                                                         <!--select name="df_colonia" class="form-control input-lg" data-live-search='true' data-parsley-group='wizard-step-1' data-style='btn-white' data-size='10' id='df_colonia'  style='width: 100%' -->
                                                        
                                                        {{ Form::text('df_colonia',null,['class' => 'form-control','placeholder'=>'México','id'=>'demo_colonia','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}} 
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
                                                        {{ Form::text('df_calle',null,['class' => 'form-control','placeholder'=>'Álvaro Obregón','id'=>'df_calle','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}}              
                                                    </div>
                                                </div>
                                              <!-- end col-2 -->    
                                              <!-- begin col-3 -->
                                              <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>{{ Form::label('N° Exterior', 'N° Exterior') }}</label>
                                                        {{ Form::text('df_num_exterior',null,['class' => 'form-control','placeholder'=>'E12','id'=>'df_num_exterior','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}} 
                                                    </div>
                                                </div>
                                              <!-- end col-3 -->  
                                               <!-- begin col-4 -->
                                              <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>{{ Form::label('N° Interior', 'N° Interior') }}</label>
                                                        {{ Form::text('df_num_interior',null,['class' => 'form-control','placeholder'=>'99','id'=>'df_num_interior','data-parsley-group'=>'wizard-step-2','maxlength'=>''])}} 
                                                    </div>
                                                </div>
                                              <!-- end col-4 -->                                            

                                            </div>
                                            <!-- end row 2 -->
                                            <br>
                                            <div class="row">
                                            	<div class="col-md-3 col-md-offset-8 text-right">
                                              {{ Form::button('Guardar Empresa Facturadora', ['class' => 'btn btn-success btn-block','id' => 'btn-alta-empresa','type'=>'submit'])}}
                                            	</div>
                                            </div>

                                            <input type="hidden" id="num_id" value="{{ isset($facturadora)?$facturadora->id:'' }}">
                        </div>
                          
           </div>
		</div>
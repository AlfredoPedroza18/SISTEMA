<div class="jumbotron">
  <!-- begin row 1 -->
           					  <div class="row">
           					  	<div class="col-md-12" >
	           					   <div class="note note-success">
										<i class="fa fa-cubes fa-2x pull-left"></i><h4>Ciudades</h4> 
								    </div>	           					
							     </div>
           					   </div>

           				<div class="row">
                                                <!-- begin col-4 -->
                            <div class="col-md-4">
								<div class="form-group block1">
                                  
									<label>{{ Form::label('Codigo', '* Código') }}</label>

									{{ Form::text('Codigo',$Codigo,['class' => 'form-control','placeholder'=>'Codigo','id'=>'Codigo','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group block1">
                                
                                    <label>{{ Form::label('Estado', '* Estado') }}</label>
                                    {{ Form::select('IdEstado',$estados,null,['class' => 'form-control','id'=>'IdEstado','data-parsley-group'=>'wizard-step-1','required'=>'required']) }}

                                        
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                           
                            <div class="col-md-4">
                                    <div class="form-group block1">
                                        <label>{{ Form::label('Nombre', '* Nombre Ciudad') }}</label>

                                        {{ Form::text('FK_Ciudad',$FK_Ciudad,['class' => 'form-control','placeholder'=>'Ciudad','id'=>'NombreCiudad','data-parsley-group'=>'wizard-step-1'])}}
                                                      
                                    </div>
                            </div>
                            <div class="col-md-4">
                                    
                                    <div class="col-md-4 form-group block1">
                                        <label>{{ Form::label('Activo', '* Activo') }}</label>
                                        <input class="toggle-class" name="Activo" type="checkbox" data-onstyle="success"  value="1"<?php echo ($Activo == 'Si' ? ' checked' : ''); ?> data-offstyle="danger" data-toggle="toggle" data-on="Si" data-off="No" id="Activo">         
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-8 text-right">
                                <input type="submit" name="Guardar" value="Guardar Ciudad" class="btn btn-success btn-block" onclick="hacer_click_Ciudades({{ isset($IdCiudad)?$IdCiudad:'0' }})">
                            </div>
                        </div>
                                      
              </div>
              <input type="hidden" id="num_id" value="{{ isset($IdCiudad)?$IdCiudad:'' }}">

 <!-- end row -->
</div>

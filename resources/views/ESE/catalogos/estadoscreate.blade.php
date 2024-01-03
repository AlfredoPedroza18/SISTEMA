<div class="jumbotron">
  <!-- begin row 1 -->
           					  <div class="row">
           					  	<div class="col-md-12" >
	           					   <div class="note note-success">
										<i class="fa fa-cubes fa-2x pull-left"></i><h4>Estados</h4> 
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
                                
                                    <label>{{ Form::label('Pais', '* País') }}</label>
                                    {{ Form::select('IdPais',$pais,null,['class' => 'form-control','id'=>'IdPais','data-parsley-group'=>'wizard-step-1','required'=>'required']) }}

                                        
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group block1">
                                        <label>{{ Form::label('Nombre', '* Nombre Estado') }}</label>

                                        {{ Form::text('FK_nombre_estado',$FK_nombre_estado,['class' => 'form-control','placeholder'=>'Estado','id'=>'NombreEdo','data-parsley-group'=>'wizard-step-1'])}}
                                                      
                                    </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group block1">
                                        <label>{{ Form::label('Variable', ' Variable') }}</label>

                                        {{ Form::text('variable',$Variable,['class' => 'form-control','placeholder'=>'Variable','id'=>'variable','data-parsley-group'=>'wizard-step-1'])}}
                                                      
                                    </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group block1">
                                        <label>{{ Form::label('Renapo', ' Renapo') }}</label>

                                        {{ Form::text('renapo',$Renapo,['class' => 'form-control','placeholder'=>'Renapo','id'=>'renapo','data-parsley-group'=>'wizard-step-1'])}}
                                                      
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-8 text-right">
                                <input type="submit" name="Guardar" value="Guardar Estado" class="btn btn-success btn-block" onclick="hacer_click_Edo({{ isset($IdEstado)?$IdEstado:'0' }})">
                            </div>
                        </div>
                                      
              </div>
              <input type="hidden" id="num_id" value="{{ isset($IdEstado)?$IdEstado:'' }}">

 <!-- end row -->
</div>

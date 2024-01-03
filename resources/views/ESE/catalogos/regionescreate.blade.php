<div class="jumbotron">
  <!-- begin row 1 -->
           					  <div class="row">
           					  	<div class="col-md-12" >
	           					   <div class="note note-success">
										<i class="fa fa-cubes fa-2x pull-left"></i><h4>Regiones</h4> 
								    </div>	           					
							     </div>
           					   </div>

           				<div class="row">
                                                <!-- begin col-4 -->
                            <div class="col-md-4">
								<div class="form-group block1">
                                  
									<label>{{ Form::label('Nombre', '* Nombre') }}</label>

									{{ Form::text('Nombre',$Nombre,['class' => 'form-control','placeholder'=>'Nombre','id'=>'Nombre','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3 col-md-offset-8 text-right">
                                <input type="submit" name="Guardar" value="Guardar Región" class="btn btn-success btn-block" onclick="hacer_click_Regiones({{ isset($IdRegion)?$IdRegion:'0' }})">
                            </div>
                        </div>
                                      
              </div>
              <input type="hidden" id="num_id" value="{{ isset($IdRegion)?$IdRegion:'' }}">

 <!-- end row -->
</div>

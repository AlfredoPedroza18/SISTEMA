<div class="jumbotron">
  <!-- begin row 1 -->
           					  <div class="row">
           					  	<div class="col-md-12" >
	           					   <div class="note note-success">
										<i class="fa fa-cubes fa-2x pull-left"></i><h4>Modalidades</h4> 
								    </div>	           					
							     </div>
           					   </div>
           				<div class="row">
                                                <!-- begin col-4 -->
                            <div class="col-md-4">
								<div class="form-group block1">
									<label>{{ Form::label('Descripcion', '* Nombre') }}</label>
									{{ Form::text('Descripcion',$Descripcion,['class' => 'form-control','placeholder'=>'Nombre','id'=>'Descripcion','data-parsley-group'=>'wizard-step-1','required'=>'required'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-8 text-right">
                                <input type="submit" name="Guardar" value="Guardar Modalidad" class="btn btn-success btn-block" onclick="hacer_click_Modalidades({{ isset($IdModalidad)?$IdModalidad:'0' }})">
                            </div>
                        </div>
              </div>
              <input type="hidden" id="num_id" value="{{ isset($IdModalidad)?$IdModalidad:'' }}">
 <!-- end row -->
</div>


<div class="row">
		        <!-- begin col-4 -->
 <div class="col-md-12">
<div class="jumbotron">
    	

		        <!-- begin col-4 -->
		        
     <form class="form-form-horizontal">
      <div class="row">
      	<div class="col-md-6">
			  <div class="form-group">
			    <label for="clientes">Clientes:</label>
			    <div class="input-group">
								    <div class="input-group-addon">
								      <i class="fa fa-1x fa-group"></i>
								    </div>
			    <select class="js-example-basic-multiple" multiple="multiple" style="width: 450px;" id="id_cliente" name="cliente">
			        
			        @foreach($clientes as $key) 
			           <option value="{{$key->id}}">{{$key->nombre_comercial}}</option>
			        @endforeach
			
										 
			    </select>
			    </div>
			  </div>
	        </div>
	 	  <div class="form-group">
		      	<div class="col-md-6">
			    <label for="Tipo de ese">Tipo de ese:</label>
			    <div class="input-group">
								    <div class="input-group-addon">
								      <i class="fa fa-1x fa-tasks"></i>
								    </div>
			    <select class="js-example-basic-multiple" multiple="multiple" style="width: 450px;" id="id_tipo" name="tipoese">
			      
				    @foreach($servicios as $key) 
			           <option value="{{$key->id}}">{{$key->nombre}}</option>
			        @endforeach
			
			    </select>
			    </div>
			    </div>
			  </div>
	    </div>
	     <div class="row">
      	    <div class="col-md-6">
			   <div class="form-group">
			    <label for="Localidad">Localidad:</label>
			    <div class="input-group">
								    <div class="input-group-addon">
								      <i class="fa fa-1x fa-globe"></i>
								    </div>
			    <select class="js-example-basic-multiple" multiple="multiple" style="width: 450px;" id="localidad" name="localidad">
			     
				    @foreach($localidad as $key) 
			           <option value="{{$key->id}}">{{$key->nombre_estado}}</option>
			        @endforeach
										  
			    </select>
			    </div>
			  </div>
			</div>
			<div class="col-md-6">
			   <div class="form-group">
			    <label for="nombre candidato">Investigador:</label>
			    <div class="input-group">
								    <div class="input-group-addon">
								      <i class="fa fa-1x fa-user"></i>
								    </div>
			    <select class="js-example-basic-multiple" multiple="multiple" style="width: 450px;" id="id_candidato" name="nomnbre_candidato">
					
				    @foreach($users as $key) 
			           <option value="{{$key->id}}">{{$key->nombre_candidato}}</option>
			        @endforeach
								
			    </select>
			    </div>
			  </div>
			</div>

			</div>
			<div class="row">
				<div class="col-md-6">


					<div class="form-group">
                                   <label control-label">Periodo</label>
                                    <div class="input-group">
								    <div class="input-group-addon">
								      <i class="fa fa-1x fa-calendar"></i>
								    </div>
                                   <input type="text" name="periodo" value="" id="periodo" class="form-control" placeholder="Selecciona una fecha" style="width: 450px;" > 
                                   </div>
                                   
                   </div>
				</div>
				<div class="col-md-6">


					<div class="form-group">
                          <label control-label">CN</label>
                               <div class="input-group">
								    <div class="input-group-addon">
								      <i class="fa fa-1x fa-building"></i>
								    </div>
                                   <select class="js-example-basic-multiple" multiple="multiple" style="width: 450px;" id="cn" name="cn">
										@foreach($cn as $key) 
								           <option value="{{$key->id}}">{{$key->nomenclatura.'-'.$key->nombre}}</option>
								        @endforeach
			    </select>
                              </div>
                                   
                   </div>
				</div>
			</div>
			
				
				  
			  
			  <button type="button" class="btn btn-success">Enviar</button>
		</form>
   
							
 	 </div>
    </div>
</div
	
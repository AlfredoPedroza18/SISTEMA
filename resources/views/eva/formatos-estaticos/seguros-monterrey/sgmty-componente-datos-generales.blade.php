
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
	<div class="panel-heading">
		<div class="panel-heading-btn">
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		</div>
		<h4 class="panel-title">Datos Generales</h4>
	</div>
	<div class="panel-body">

		<div class="form-horizontal">
			<div class="form-group">
				<label class="col-md-2 control-label">Nombre Candidadto: </label>
				<div class="col-md-4">
					<input type="hidden" name="datos_generales[id]" value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->id : 0 }}">
					<input  type="text" 
					class="form-control" 
					readonly="readonly" 
					value="{{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}" 
					name="datos_generales[nombre_candidato]">
				</div>               
				<div class="form-group">
					<label class="col-md-2 control-label">Sexo: </label>
					 <div class="col-md-3">                    
	                    <select class="form-control" name="datos_generales[sexo]">
	                        <option value="1" 
                                    @if( $estudio->formatoSM ) 
                                            @if( $estudio->formatoSM->datos_generales->sexo == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Masculino</option>
	                        <option value="2" 
                                    @if( $estudio->formatoSM ) 
                                            @if( $estudio->formatoSM->datos_generales->sexo == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Femenino</option>
	                    </select>
	                </div> 
	            </div>
	            <div class="form-group">     
					<label class="col-md-2 control-label">Domicilio: </label>
					<div class="col-md-9">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->domicilio : '' }}" 
						name="datos_generales[domicilio]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Colonia: </label>
					<div class="col-md-4">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->colonia : '' }}"
						name="datos_generales[colonia]">
					</div>                
					<label class="col-md-2 control-label">Lugar de Nacimiento: </label>
					<div class="col-md-3">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->lugar_nacimiento : '' }}"
						name="datos_generales[lugar_nacimiento]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Nacionalidad: </label>
					<div class="col-md-4">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->nacionalidad : '' }}" 
						name="datos_generales[nacionalidad]">
					</div>                
					<label class="col-md-2 control-label">Edad: </label>
					<div class="col-md-3">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->edad : '' }}" 
						name="datos_generales[edad]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Fecha de nacimiento: </label>
					<div class="col-md-4">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->fecha_nacimiento : '' }}" 
						name="datos_generales[fecha_nacimiento]">
					</div>                                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Estado Civil: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->edo_civil : '' }}" 
						name="datos_generales[edo_civil]">
					</div>                
					<label class="col-md-2 control-label">Puesto: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->puesto : '' }}" 
						name="datos_generales[puesto]">
					</div>                
					<label class="col-md-1 control-label">Tiempo en el domicilio: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->tiempo_domicilio : '' }}" 
						name="datos_generales[tiempo_domicilio]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Celular: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control telefono"    
						maxlength="13"                        
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->celular : '' }}" 
						name="datos_generales[celular]">
					</div>                
					<label class="col-md-2 control-label">Municipio: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->municipio : '' }}" 
						name="datos_generales[municipio]">
					</div>                
					<label class="col-md-1 control-label">CP: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->cp : '' }}" 
						name="datos_generales[cp]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Teléfono: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control telefono"   
						maxlength="13"                         
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->telefono : '' }}" 
						name="datos_generales[telefono]">
					</div>                
					<label class="col-md-2 control-label">Ente calles: </label>
					<div class="col-md-5">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoSM ) ? $estudio->formatoSM->datos_generales->entre_calles : '' }}" 
						name="datos_generales[entre_calles]">
					</div>                					             
				</div>


			</div>
		</div>
	</div>
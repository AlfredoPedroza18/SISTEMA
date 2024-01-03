
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
					<input type="hidden" name="datos_generales[id]" value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->id : 0 }}">
					<input  type="text" 
					class="form-control" 
					readonly="readonly" 
					value="{{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}" 
					name="datos_generales[nombre]">
				</div>               
				<div class="form-group">
					<label class="col-md-2 control-label">Sexo: </label>
					 <div class="col-md-3">                    
	                    <select class="form-control" name="datos_generales[sexo]">
	                        <option value="1" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->datos_generales->sexo == '1' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Masculino</option>
	                        <option value="2" 
                                    @if( $estudio->formatoFemsa ) 
                                            @if( $estudio->formatoFemsa->datos_generales->sexo == '2' ) 
                                                selected="selected"
                                            @endif
                                    @endif
                                     >Femenino</option>
	                    </select>
	                </div> 
	            </div>
	            <div class="form-group">
					<label class="col-md-2 control-label">Edad: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->edad : '' }}" 
						name="datos_generales[edad]">
					</div>                
					<label class="col-md-2 control-label">Fecha de nacimiento: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->fecha_nacimiento : '' }}" 
						name="datos_generales[fecha_nacimiento]">
					</div>                
					<label class="col-md-1 control-label">Lugar de nacimiento: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->lugar_nacimiento : '' }}" 
						name="datos_generales[lugar_nacimiento]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Nacionalidad: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->nacionalidad : '' }}" 
						name="datos_generales[nacionalidad]">
					</div>                
					<label class="col-md-2 control-label">Estado Civil: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->edo_civil : '' }}" 
						name="datos_generales[edo_civil]">
					</div>                
					<label class="col-md-1 control-label">Fecha de matrimonio: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->fecha_matrimonio : '' }}" 
						name="datos_generales[fecha_matrimonio]">
					</div>                
				</div>
	            <div class="form-group">     
					<label class="col-md-2 control-label">Calle: </label>
					<div class="col-md-9">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->calle : '' }}" 
						name="datos_generales[calle]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Número Exterior: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->no_exterior : '' }}" 
						name="datos_generales[no_exterior]">
					</div>                
					<label class="col-md-2 control-label">Número Interior: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->no_interior : '' }}" 
						name="datos_generales[no_interior]">
					</div>                
					<label class="col-md-1 control-label">Delegación ó Municipio: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->delegacion : '' }}" 
						name="datos_generales[delegacion]">
					</div>                
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">Colonia: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->colonia : '' }}" 
						name="datos_generales[colonia]">
					</div>                
					<label class="col-md-2 control-label">Email: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->email : '' }}" 
						name="datos_generales[email]">
					</div>                
					<label class="col-md-1 control-label">Teléfono: </label>
					<div class="col-md-2">                    
						<input  type="text"
						oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
						maxlength="13"
						min="1" max="99999999999999999999" 
						class="form-control telefono"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->telefono : '' }}" 
						name="datos_generales[telefono]">
					</div>                
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">CP: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->cp : '' }}" 
						name="datos_generales[cp]">
					</div>                
					<label class="col-md-2 control-label">Tiempo en el domicilio: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->tiempo_domicilio : '' }}" 
						name="datos_generales[tiempo_domicilio]">
					</div>                
					<label class="col-md-1 control-label">Celular: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						maxlength="13" 
						oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
						maxlength="13"
						min="1" max="99999999999999999999" 
						class="form-control telefono"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->celular : '' }}" 
						name="datos_generales[celular]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Puesto: </label>
					<div class="col-md-4">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->puesto : '' }}" 
						name="datos_generales[puesto]">
					</div>                
					<label class="col-md-2 control-label">Teléfono recados: </label>
					<div class="col-md-3">                    
						<input  type="text" 
						maxlength="13" 
						class="form-control telefono"                             
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->telefono_recados : '' }}" 
						name="datos_generales[telefono_recados]">
					</div>                
				</div>				
				<div class="form-group">               
					<label class="col-md-2 control-label">Ente calles: </label>
					<div class="col-md-9">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoFemsa ) ? $estudio->formatoFemsa->datos_generales->entre_calles : '' }}" 
						name="datos_generales[entre_calles]">
					</div>                					             
				</div>


			</div>
		</div>
	</div>
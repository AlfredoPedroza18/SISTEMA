
<div class="panel panel-primary" data-sortable-id="ui-widget-15">
	<div class="panel-heading">
		<div class="panel-heading-btn">
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		</div>
		<h4 class="panel-title">Datos Personales</h4>
	</div>
	<div class="panel-body">

		<div class="form-horizontal">
			<div class="form-group">
				<label class="col-md-2 control-label">Nombre completo: </label>
				<div class="col-md-8">
					<input type="hidden" name="datos_personales[id]" value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->id : 0 }}">
					<input  type="text" 
					class="form-control" 
					readonly="readonly" 
					value="{{ isset( $estudio->candidato ) ? $estudio->candidato->nombre_completo : '' }}" 
					name="datos_personales[nombre]">
				</div>                
			</div>
			<div class="form-group">                
				<div class="form-group">
					<label class="col-md-2 control-label">Calle: </label>
					<div class="col-md-4">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->calle : '' }}" 
						name="datos_personales[calle]">
					</div>                
					<label class="col-md-2 control-label">CP: </label>
					<div class="col-md-4">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ ( isset( $estudio->formatoEvenplan ) ) ? $estudio->formatoEvenplan->datosPersonales->cp : '' }}" 
						name="datos_personales[cp]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Colonia: </label>
					<div class="col-md-4">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->colonia : '' }}" 
						name="datos_personales[colonia]">
					</div>                
					<label class="col-md-2 control-label">Cd. de Residencia: </label>
					<div class="col-md-4">                    
						<input  type="text" 
						class="form-control"                            
						value="{{  isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->cd_residencia : '' }}"  
						name="datos_personales[cd_residencia]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Tel. Celular: </label>
					<div class="col-md-4">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->celular : '' }}" 
						name="datos_personales[celular]">
					</div>                
					<label class="col-md-2 control-label">Tel. Local: </label>
					<div class="col-md-4">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->telefono_local : '' }}" 
						name="datos_personales[telefono_local]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Correo electtrónico: </label>
					<div class="col-md-4">                    
						<input  type="email" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->email : '' }}" 
						name="datos_personales[email]">
					</div>                                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Fecha de nacimiento: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->fecha_nacimiento : '' }}" 
						name="datos_personales[fecha_nacimiento]">
					</div>                
					<label class="col-md-2 control-label">Lugar de nacimiento: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->lugar_nacimiento : '' }}" 
						name="datos_personales[lugar_nacimiento]">
					</div>                
					<label class="col-md-1 control-label">Edad: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->edad : '' }}" 
						name="datos_personales[edad]">
					</div>                
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Estado Civil: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->edo_civil : '' }}" 
						name="datos_personales[edo_civil]">
					</div>                
					<label class="col-md-2 control-label">Fecha de matrimonio: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->fecha_matrimonio : '' }}" 
						name="datos_personales[fecha_matrimonio]">
					</div>                
					<label class="col-md-1 control-label">Hijos: </label>
					<div class="col-md-2">                    
						<input  type="text" 
						class="form-control"                            
						value="{{ isset( $estudio->formatoEvenplan ) ? $estudio->formatoEvenplan->datosPersonales->hijos : '' }}" 
						name="datos_personales[hijos]">
					</div>                
				</div>


			</div>
		</div>
	</div>
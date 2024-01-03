	@extends('layouts.master')
	@section('section')

	<div id="content" class="content">

		<ol class="breadcrumb ">
			<li><a href="{{ url( 'dashboardese' ) }}">ESE</a></li>				
			<li><a href="{{ url( 'estudio-ese' ) }}">Estudios Socioeconómicos</a></li>
			<li><a href="javascript:;">Editar estudio-(#OS{{$estudio_ese->id_os}})-(#ESE{{$estudio_ese->id}})</a></li>
		</ol>
		@if (session('success'))
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-{{ session('type') }} fade in m-b-15">
					<strong>{{ session('label') }}</strong>
					{{ session('success') }}
					<span class="close" data-dismiss="alert">×</span>
				</div>
			</div>
		</div>
		@endif

		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif


		<div class="panel panel-success panel-with-tabs" data-sortable-id="ui-unlimited-tabs-2">
			<div class="panel-heading p-0">
				<div class="panel-heading-btn m-r-10 m-t-10">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				</div>
				<!-- begin nav-tabs -->
				<div class="tab-overflow overflow-right">
					<ul class="nav nav-tabs">
						<li class="prev-button"><a href="javascript:;" data-click="prev-tab" class="text-inverse"><i class="fa fa-arrow-left"></i></a></li>
						<li class="active"><a href="#nav-tab2-1" data-toggle="tab" aria-expanded="true">Estudio</a></li>
						<li class=""><a href="#nav-tab2-2" data-toggle="tab">Asignación</a></li>
						<li class=""><a href="#nav-tab2-3" data-toggle="tab">Anexos</a></li>
						<li class=""><a href="#nav-tab2-4" data-toggle="tab">Imágenes</a></li>
						<li class=""><a href="#nav-tab2-5" data-toggle="tab">Kardex</a></li>
						
					</ul>
				</div>
			</div>
			
			<div class="tab-content">
				<div class="tab-pane fade active in" id="nav-tab2-1">
				<div class="row">
					<div class="col-md-12 text-center">
						
					@if($estudio_ese->id_status == App\ESE\EstudioEse::CANCELADA  || $estudio_ese->id_status == App\ESE\EstudioEse::CERRADA )
					<a data-toggle="tooltip" data-placement="left" title="No se puede editar ESE ya que se encuentra en estatus Cerrado ó Cancelado" style="margin-right: 20px;"> <i class="btn btn-primary fa fa-edit fa-2x"></i> </a>
					@else
						@if( isset( $estudio_ese->plantilla ) )

							@if( $estudio_ese->plantilla->isStaticTemplate() )
								<a 	data-toggle="tooltip" 
									data-placement="left"
									title="Editar estudio" 
									style="margin-right: 20px;" 
									href="{{ route('sig-erp-ese::' . $estudio_ese->plantilla->getUrl() ,['id' => $estudio_ese->plantilla->id]) }}?estudio={{ $estudio_ese->id }}"> 
							@else
								<a 	data-toggle="tooltip" 
									data-placement="left"
									title="Editar estudio" 
									style="margin-right: 20px;" 
									href="{{ route('sig-erp-ese::estudio-ese-formatos.edit',['id' => $estudio_ese->plantilla->id]) }}?estudio={{ $estudio_ese->id }}">
								
							@endif
						@else								 
						<a data-toggle="tooltip" data-placement="left" title="Favor de Seleccionar una plantilla para iniciar el ESE" style="margin-right: 20px;" href="javascript:;">	
						@endif							 
							<i class="btn btn-primary fa fa-edit fa-2x"></i>
						</a>
					@endif

						<!--<a title="Cerrar estudio" id="close-ese" style="margin-right: 20px;" href="javascript:;"><i class="btn btn-warning fa fa-check-square-o fa-2x"></i></a>
						<a title="Cancelar estudio" id="cancel-ese" style="margin-right: 20px;" href="javascript:;"><i class="btn btn-default fa fa-ban fa-2x"></i></a>-->

						@if( isset( $estudio_ese->plantilla ) )	
						<a data-toggle="tooltip" data-placement="right" title="Visualizar ESE" style="margin-right: 20px;" href="{{ url('estudio-ese-download-pdf-ese') }}?plantilla={{$estudio_ese->plantilla->id}}&estudio={{ $estudio_ese->id }}" 
							target="_blank">	
						@else								 
						<a data-toggle="tooltip" data-placement="right" title="No tiene plantilla seleccionada" style="margin-right: 20px;" href="javascript:;">
						@endif	
						<i class="btn btn-danger fa fa-file-pdf-o fa-2x"></i></a>
					</div>
				</div> 

					<div class="row" style="margin-top: 5px;">
						<div class="col-md-12">
							<div class="alert alert-warning fade in m-b-15 text-center">
								<strong >Si no puedes visualizar bien el PDF en Google Chrome instala la extensión </strong>		
								<a href="https://chrome.google.com/webstore/detail/print-background-colors/gjecpgdgnlanljjdacjdeadjkocnnamk/related?hl=en" target="_blank" class="btn btn-danger btn-sm">
									<i class="fa fa-cogs"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="row" style="margin-top: 20px;">
						<div class="col-md-12 text-center">
							<div class="note note-info">								
								<h3 class="m-b-20">Registro ESE <i class="fa fa-user"> (#OS{{$estudio_ese->id_os}})-(#ESE{{$estudio_ese->id}})</i></h3>

							</div>							
						</div>
					</div>

					<div class="jumbotron" style="padding: 15px;">
						<div class="row">
							<div class="col-md-12">

								{!! Form::model($estudio_ese,['route' => ['sig-erp-ese::estudio-ese.update',$estudio_ese->id ], 'method' => 'put','class' => 'form-horizontal']) !!}

								
								{{-- <form class="form-horizontal"> --}}
									<div class="row">
										<div class="col-md-12">
											<div class="alert alert-success fade in m-b-15 text-center">
												<strong >Pedido por</strong>					
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">											
											<div class="form-group">
												<label class="col-md-3 control-label">Código Depto. Cliente</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <span class="input-group-addon">
						                                	<i class="fa fa-barcode"></i>
						                                </span>

						                                <input type="text" value="{{ $estudio_ese->codigo_depto_cliente }}" name="codigo_depto_cliente" class="form-control" autofocus
						                                @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @else
						                                @if( $estudio_ese->codigo_depto_cliente != '' )
						                                readonly="readonly"
						                                @endif
						                                @endif>
						                            </div>
												</div>
												
											</div>
										</div>	
										<div class="col-md-6">			
											<div class="form-group">
												<label class="col-md-3 control-label">Solicitante</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <span class="input-group-addon">
						                                	<i class="fa fa-user"></i>
						                                </span>
						                                <input type="text" value="{{ $estudio_ese->solicitado }}" name="solicitado" class="form-control"
						                                @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @else
						                                @if( $estudio_ese->solicitado != '' )
						                                readonly="readonly"
						                                @endif
						                                @endif>
						                            </div>
												</div>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-md-6">											
											<div class="form-group">
												<label class="col-md-3 control-label">Cliente</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <span class="input-group-addon">
						                                	<i class="fa fa-user"></i>
						                                </span>

						                                <select class="form-control input-sm" name="id_cliente" disabled="disabled">
						                                @foreach( $clientes as $cliente )
						                                	<option value="{{ $cliente->id }}" 
						                                		@if( $estudio_ese->id_cliente == $cliente->id )
						                                			selected="selected"
						                                		@endif >
						                                		{{ $cliente->nombre_comercial }}
						                                	</option>
						                                @endforeach														
														</select>
						                            </div>
												</div>
												
											</div>
										</div>	
										<div class="col-md-6">			
											<div class="form-group">
												<label class="col-md-3 control-label">Estudio</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <span class="input-group-addon">
						                                	<i class="fa fa-book"></i>
						                                </span>
						                                <input type="text" value="ESE{{ $estudio_ese->id }}" disabled="disabled" class="form-control"
						                                 @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif
						                                >
						                            </div>
												</div>
											</div>
										</div>
									</div>

									{{-- Inicio Datos del prospecto --}}
									<div class="row">
										<div class="col-md-12">
											<div class="alert alert-success fade in m-b-15 text-center">
												<strong >Personal</strong>					
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">											
											<div class="form-group">
												<label class="col-md-4 control-label">Nombre</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input 	type="text" class="form-control" name="nombre" 
						                                		value="{{ isset($estudio_ese->candidato->nombre) ? $estudio_ese->candidato->nombre:'' }}" 
						                                		required="required"
						                                		minlength=3
						                                		pattern=".*[^ ].*" 
						                                		title="Es campo requerido"
						                                		  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif
						                                		>			                                
						                                <span class="input-group-addon">
						                                	<i class="fa fa-bars"></i>
						                                </span>
						                            </div>														
												</div>												
											</div>											
										</div>	
										<div class="col-md-4">			
											<div class="form-group">
												<label class="col-md-4 control-label">Ap. Paterno*</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input 	type="text" class="form-control" name="apellido_paterno" 
						                                		value="{{ isset($estudio_ese->candidato->apellido_paterno) ? $estudio_ese->candidato->apellido_paterno:''  }}"
						                                		required="required"
						                                		minlength="4"
						                                				  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>	           
						                              	<span class="input-group-addon">
						                                	<i class="fa fa-bars"></i>
						                                </span>
						                            </div>														
												</div>												
											</div>
										</div>
										<div class="col-md-4">			
											<div class="form-group">
												<label class="col-md-4 control-label">Ap. Materno*</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input 	type="text" class="form-control" name="apellido_materno" 
						                                		value="{{ isset($estudio_ese->candidato->apellido_materno) ? $estudio_ese->candidato->apellido_materno : '' }}"
						                                				  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>
						                                <span class="input-group-addon">
						                                	<i class="fa fa-bars"></i>
						                                </span>
						                            </div>														
												</div>												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">											
											<div class="form-group">
												<label class="col-md-4 control-label">Teléfono 1*</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input 	type="tel" class="form-control telefono" name="telefono" 
						                                		value="{{  isset($estudio_ese->candidato->telefono) ? $estudio_ese->candidato->telefono : '' }}"
						                                		required="required"
						                                		minlength="8"
						                                		maxlength="10"
						                                				  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>
						                                <span class="input-group-addon">
						                                	<i class="fa fa-tablet"></i>
						                                </span>
						                            </div>														
												</div>												
											</div>											
										</div>	
										<div class="col-md-4">			
											<div class="form-group">
												<label class="col-md-4 control-label">Teléfono 2*</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input 	type="tel" class="form-control telefono" name="telefono_aux" 
						                                		value="{{  isset($estudio_ese->candidato->telefono_aux) ? $estudio_ese->candidato->telefono_aux : ''}}"
						                                		minlength="8"
						                                		maxlength="10"
						                                				  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>
						                                <span class="input-group-addon">
						                                	<i class="fa fa-phone"></i>
						                                </span>
						                            </div>														
												</div>												
											</div>
										</div>
										<div class="col-md-4">			
											<div class="form-group">
												<label class="col-md-4 control-label">Email</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input 	type="email" class="form-control" name="email" 
						                                		value="{{  isset($estudio_ese->candidato->email) ? $estudio_ese->candidato->email : '' }}"
						                                				  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>
						                                <span class="input-group-addon">
						                                	<i class="fa fa-envelope-o"></i>
						                                </span>
						                            </div>														
												</div>												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">			
											<div class="form-group">
												<label class="col-md-4 control-label">Sexo</label>
												<div class="col-md-8">
													<div class="input-group">
														<select class="form-control input-sm" name="sexo" required="required"
																  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						   disabled="disabled" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>
															<option value="M">Masculino</option>
															<option value="F">Femenino</option>
														</select>
						                                
						                                <span class="input-group-addon">
						                                	<i class="fa fa-venus-mars"></i>
						                                </span>
						                            </div>														
												</div>												
											</div>
										</div>
									</div>
									{{-- Fin Datos del prospecto --}}
									

									{{-- Inicio Datos del prospecto direccion --}}
									<div class="row">
										<div class="col-md-12">
											<div class="alert alert-success fade in m-b-15 text-center">
												<strong >Dirección</strong>					
											</div>
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">											
											<div class="form-group">
												<label class="col-md-4 control-label">CP </label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input 	type="text" class="form-control" name="cp" 
						                                		value="{{ isset($estudio_ese->candidato->cp) ? $estudio_ese->candidato->cp : '' }}" id="demo_cp"
						                                			  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						   disabled="disabled" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>			                                
						                                <span class="input-group-addon">
						                                	<i class="fa fa-sort-numeric-asc"></i>
						                                </span>
						                            </div>	
						                              <div id="result_search"></div>													
												</div>												
											</div>											
										</div>	
										<div class="col-md-3">											
											<div class="form-group">
												<label class="col-md-4 control-label">Ciudad</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input 	type="text" class="form-control" name="ciudad" 
						                                		value="{{  isset($estudio_ese->candidato->ciudad) ? $estudio_ese->candidato->ciudad : '' }}" id="estado"
						                                			  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						   disabled="disabled" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>
						                                <span class="input-group-addon">
						                                	<i class="fa fa-sort-alpha-asc"></i>
						                                </span>
						                            </div>														
												</div>												
											</div>											
										</div>	
										<div class="col-md-3">			
											<div class="form-group">
												<label class="col-md-4 control-label">Municipio</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input 	type="text" class="form-control" name="delegacion" 
						                                		value="{{  isset($estudio_ese->candidato->delegacion) ? $estudio_ese->candidato->delegacion : '' }}" id="municipio"
						                                				  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						   disabled="disabled" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>
						                                <span class="input-group-addon">
						                                	<i class="fa fa-sort-alpha-asc"></i>
						                                </span>
						                            </div>														
												</div>												
											</div>
										</div>
										<div class="col-md-3">			
											<div class="form-group">
												<label class="col-md-4 control-label">Colonia</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input 	type="text" class="form-control" name="colonia" 
						                                		value="{{  isset($estudio_ese->candidato->colonia) ? $estudio_ese->candidato->colonia : '' }}" id="demo_colonia"
						                                				  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						   disabled="disabled" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>
						                                <span class="input-group-addon">
						                                	<i class="fa fa-sort-alpha-asc"></i>
						                                </span>
						                            </div>	
						                              <div id="result_search_colonia"></div>
						                                   <div id="resultado_colonias"></div>													
												</div>												
											</div>
										</div>
									</div>
									<div class="row">
									    	<div class="col-md-3">			
											<div class="form-group">
												<label class="col-md-4 control-label">Calle:</label>
												<div class="col-md-8">
													<div class="input-group">
						                                 <input type="text" class="form-control" name="calle" 
						                                		value="{{  isset($estudio_ese->candidato->calle) ? $estudio_ese->candidato->calle : ''}}"
						                                		maxlength="255"
						                                				  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>
				            						      <span class="input-group-addon">
						                                	<i class="fa fa-sort-alpha-asc"></i>
						                                </span>	
						                            </div>
						                           
						                          												
												</div>												
											</div>
										</div>
										<div class="col-md-3">			
											<div class="form-group">
												<label class="col-md-4 control-label">Numero Exterior:</label>
												<div class="col-md-8">
													<div class="input-group">
						                                 <input type="text" class="form-control " name="numero_exterior" 
						                                		value="{{  isset($estudio_ese->candidato->numero_exterior) ? $estudio_ese->candidato->numero_exterior : ''}}"
						                                		maxlength="20"
						                                				  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>
				            						     <span class="input-group-addon">
						                                	<i class="fa fa-sort-alpha-asc"></i>
						                              </span>
						                            </div>	
						                            
						                          												
												</div>												
											</div>
										</div>
										<div class="col-md-3">			
											<div class="form-group">
												<label class="col-md-4 control-label">Numero Interior:</label>
												<div class="col-md-8">
													<div class="input-group">
						                                 <input type="text" class="form-control" name="numero_interior" 
						                                		value="{{  isset($estudio_ese->candidato->numero_interior) ? $estudio_ese->candidato->numero_interior : ''}}"
						                                		maxlength="20"
						                                				  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						    readonly="readonly" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>
				            						      <span class="input-group-addon">
						                                	<i class="fa fa-sort-alpha-asc"></i>
						                                </span>
						                            </div>
						                           	
						                          												
												</div>												
											</div>
										</div>
									</div>
									{{-- Fin Datos del prospecto direccion --}}

									{{-- Inicio Datos otros --}}
									<div class="row">
										<div class="col-md-12">
											<div class="alert alert-success fade in m-b-15 text-center">
												<strong >Otros</strong>					
											</div>
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">											
											<div class="form-group">
												<label class="col-md-4 control-label">CN </label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input type="text" class="form-control" value="{{ $estudio_ese->ordenServicioEse->orden_servicio->centro_negocio->nomenclatura }}" disabled="disabled">

						                                <span class="input-group-addon">
						                                	<i class="fa fa-cubes"></i>
						                                </span>
						                            </div>														
												</div>												
											</div>											
										</div>	
										<div class="col-md-3">											
											<div class="form-group">
												<label class="col-md-4 control-label">Ejecutivo</label>
												<div class="col-md-8">
													<div class="input-group">
						                                <input type="text" class="form-control" value="{{ Auth::user()->name }}"
						                                		  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						   disabled="disabled" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>			                                
						                                <span class="input-group-addon">
						                                	<i class="fa fa-male"></i>
						                                </span>
						                            </div>														
												</div>												
											</div>											
										</div>	
										<div class="col-md-6">			
											<div class="form-group">
												<label class="col-md-4 control-label">Comentarios</label>
												<div class="col-md-8">
													<textarea class="form-control" name="comentarios" placeholder="Textarea" rows="5" 		  @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA  )
				            						   disabled="disabled" data-toggle="tooltip" data-placement="left" title="No se puedee editar esté campo ya que se encuentra en estatus Cerrado ó Cancelado"
				            						    @endif>{{ $estudio_ese->comentarios }}</textarea>
												</div>
											</div>
										</div>
										
									</div>
									{{-- Fin Datos otros --}}
									 @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA)
								    <div class="row">
								       <div class="col-md-12">
										   <div class="alert alert-info fade in m-b-15 ">
												<center>
													<strong> <i class="fa fa-2x fa-warning"></i> Info</strong>
													No se puede <strong>Guardar</strong> el <strong>ESE</strong> , ya que se envuentra en estatus Cerrado ó Cancelado
													<span class="close" data-dismiss="alert"></span>
												</center>
											</div>
										</div>
									</div>
											
								 @else
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">										
												<div class="col-md-offset-10 col-md-2">
													<button type="submit" class="btn btn-sm btn-success">Guardar Estudio</button>
												</div>
											</div>
										</div>
											
									</div>
								@endif
								{{-- </form> --}}
								{!! Form::close() !!}

							</div>
						</div>
					</div>

					<div class="jumbotron" style="padding: 15px;" id="show-message-asignacion">
						<div class="alert alert-success fade in m-b-15">
							<strong id="message-text-main">Mensaje:</strong>
								
								<label id="message-text">Vivamus vestibulum posuere est eu tincidunt.</label>
							
						</div>
					</div>

					<div class="jumbotron" style="padding: 15px;">
						<div class="row">
							<div class="col-md-6 ui-sortable">
								<div class="panel panel-warning" data-sortable-id="ui-widget-1">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Asignación</h4>
									</div>
									<div class="panel-body" style="margin:15px;">
	                              @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA)
								    <div class="row">
								       <div class="col-md-12">
										   <div class="alert alert-info fade in m-b-15">
												<strong> <i class="fa fa-2x fa-warning"></i> Info</strong>
												No se puede mostrar el apartado de <strong>Asignación</strong>, ya que el ESE esta en estatus Cerrado ó Cancelado
												<span class="close" data-dismiss="alert"></span>
											</div>
										</div>
									</div>
											
								 @else
										<form class="form-horizontal">
											{{--<div class="row">												
												<div class="form-group">
													<label class="col-md-4 control-label">Ejecutivo</label>
													<div class="col-md-8">
														<div class="input-group">
							                                <span class="input-group-addon">
							                                	<i class="fa fa-user"></i>
							                                </span>
							                                <select class="form-control input-sm" disabled="disabled">

							                                	@foreach( $ejecutivos as $ejecutivo )
																	<option value="{{ $ejecutivo->id }}"
																	@if( $ejecutivo->id == Auth::user()->id )
							                                			selected="selected"
							                                		@endif >
							                                			{{ $ejecutivo->name }}
							                                		</option>
																@endforeach																
															</select>
							                            </div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group">
													<label class="col-md-4 control-label">Investigador</label>
													<div class="col-md-8">
														<div class="input-group">
							                                <span class="input-group-addon">
							                                	<i class="fa fa-user"></i>
							                                </span>
							                                <select class="form-control input-sm">
							                                	<option value="-1">Seleccionar un ejecutivo</option>
															@foreach( $ejecutivos as $ejecutivo )
																	<option value="{{ $ejecutivo->id }}">
							                                			{{ $ejecutivo->name }}
							                                		</option>
															@endforeach																
															</select>
							                            </div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group">
													<label class="col-md-4 control-label">Foráneo</label>
													<div class="col-md-8">
														<div class="input-group">
							                                <span class="input-group-addon">
							                                	<i class="fa fa-user"></i>
							                                </span>
							                                <select class="form-control input-sm">
							                                	<option value="-1">Seleccionar un ejecutivo</option>
															@foreach( $ejecutivos as $ejecutivo )
																	<option value="{{ $ejecutivo->id }}">
							                                			{{ $ejecutivo->name }}
							                                		</option>
															@endforeach																
															</select>
							                            </div>
													</div>
												</div>
											</div>--}}
										
											<div class="row">
												<div class="form-group">
													<label class="col-md-4 control-label">Plantilla</label>
													<div class="col-md-8">
														<div class="input-group">
							                                <span class="input-group-addon">
							                                	<i class="fa fa-file-text-o"></i>
							                                </span>
							                                <select 
							                                		class="form-control input-sm" 
							                                		id="asignar-plantilla"
							                                		@if($estudio_ese->id_plantilla != '')
							                                			disabled="disabled"

							                                		@endif>
																<option value="-1">Selecciona una plantilla</option>
																@foreach( $plantillas as $plantilla )
																	<option value="{{ $plantilla->id }}"  
																	@if( $plantilla->id == $estudio_ese->id_plantilla )
																		selected="selected"
																	@endif>
							                                			{{ $plantilla->nombre }}
							                                		</option>
																@endforeach
															</select>
							                            </div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group">
													<label class="col-md-4 control-label">Prioridad</label>
													<div class="col-md-8">
														<div class="input-group">
							                                <span class="input-group-addon">
							                                	<i class="fa fa-list-ol"></i>
							                                </span>
							                                <select class="form-control input-sm" disabled="disabled">
																@foreach( $prioridades as $prioridad)
																	<option value="{{ $prioridad->id }}"
																	@if( $estudio_ese->prioridad == $prioridad->id )
																		selected="selected"
																	@endif >
																		{{ $prioridad->nombre }} 
																	</option>
																@endforeach
															</select>
							                            </div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group">
													<label class="col-md-4 control-label">Tipo Estudio</label>
													<div class="col-md-8">
														<div class="input-group">
							                                <span class="input-group-addon">
							                                	<i class="fa fa-list-alt"></i>
							                                </span>
							                                <select class="form-control input-sm" disabled="disabled">
															@foreach( $tipos as $tipo )	
																<option value="{{ $tipo->id_servicio_ese }}"
																@if( $tipo->id_servicio_ese == $estudio_ese->id_tipo_estudio )
																	selected="selected"
																@endif
																>{{ $tipo->tipo_estudio }}</option>
															@endforeach
															</select>
							                            </div>														
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group">
													<label class="col-md-4 control-label">Offline</label>
													<div class="col-md-8">
														<div class="input-group">
							                                <span class="input-group-addon">
							                                	<i class="fa fa-file-archive-o"></i>
							                                </span>
							                                <input type="file" class="form-control">			                                
							                            </div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group">
													<label class="col-md-4 control-label">Fecha visita</label>
													<div class="col-md-8">
														<div class="input-group">
							                                <span class="input-group-addon">
							                                	<i class="fa fa-calendar"></i>
							                                </span>
							                                <input type="date" id="fecha_visita" class="form-control" value="{{ $estudio_ese->fecha_visita_formato }}" style="width:85%;">	
							                                
							                            </div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group">
													<label class="col-md-4 control-label">Viáticos</label>
													<div class="col-md-8">
														<div class="input-group">
							                                <span class="input-group-addon">
							                                	<i class="fa fa-money"></i>
							                                </span>
							                                <input type="number" class="form-control" id="cantidad_viaticos" value="{{ $estudio_ese->viaticos }}">			                                
							                            </div>														
													</div>
												</div>
											</div>
											
										

										</form>
									@endif
									</div>
								</div>
							</div>
							<div class="col-md-3 ui-sortable">
								<div class="panel panel-primary" data-sortable-id="ui-widget-2">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Anexos</h4>
									</div>
							    @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA)
								    <div class="row">
								       <div class="col-md-12">
										   <div class="alert alert-info fade in m-b-15">
												<strong> <i class="fa fa-2x fa-warning"></i> Info</strong>
												No se puede mostrar el apartado de <strong>Anexos</strong>, ya que el ESE esta en estatus Cerrado ó Cancelado
												<span class="close" data-dismiss="alert"></span>
											</div>
										</div>
									</div>
											
								 @else
									<div class="panel-body" style="margin:15px;">
  									
										<div class="row">
											<button class="col-md-12 btn btn-primary" id="btn-upload-anexo"><i class="fa fa-2x fa-upload btn-block"></i></button>										
											
										</div>
										<div class="row text-center">
										<br>
										
										<a href="{{ url('estudio-ese-download-formatos') }}" class="btn btn-primary  btn-block"><i class="fa fa-2x fa-download"></i></a>FORMATOS ESE (Descargar)
										</div>


									</div>
								@endif
								</div>
							</div>
							<div class="col-md-3 ui-sortable">
								<div class="panel panel-success" data-sortable-id="ui-widget-3">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Imagenes</h4>
									</div>
									 @if($estudio_ese->id_status==App\ESE\EstudioEse::CANCELADA || $estudio_ese->id_status==App\ESE\EstudioEse::CERRADA)
								    <div class="row">
								       <div class="col-md-12">
										   <div class="alert alert-info fade in m-b-15">
												<strong> <i class="fa fa-2x fa-warning"></i> Info</strong>
												No se puede mostrar el apartado de <strong>Asignación</strong>, ya que el ESE esta en estatus Cerrado ó Cancelado
												<span class="close" data-dismiss="alert"></span>
											</div>
										</div>
									</div>
											
								 @else
									<div class="panel-body" style="margin:15px;">
										<div class="row">
											<button class="col-md-12 btn btn-default" id="btn-upload-imagen"><i class="fa fa-2x fa-upload btn-block"></i></button>	
											
											
																
										</div>
										<br><br>
										 <div class="row">
							 					 <a href="#ir-mapa" class="btn btn-danger btn-block btn-sm" id="ese-mapa">Encontrar ubicacion del candidato</a>	
							 				</div>


									</div>
								@endif
								</div>
							</div>
						
	<div class="col-md-6 ui-sortable">
										<div class="panel panel-danger" data-sortable-id="ui-widget-16">
		                        <div class="panel-heading">
		                            <div class="panel-heading-btn">
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		                            </div>
		                            <h4 class="panel-title">URL de consulta de información</h4>
		                        </div>
		                        <div class="panel-body">
		                        <div class="row">
		                            <div class="col-md-6">
		                            <a href="https://www.consisa.com.mx" target="_blank" title="Consisa"><p>www.consisa.com.mx</p></a>
		                            </div>
		                            <div class="col-md-6">
									<a href="https://www.siem.gob.mx" target="_blank"><p>www.siem.gob.mx</p></a>
									</div>
								</div>
								 <div class="row">
		                            <div class="col-md-6">
									<a href="https://www.google.com.mx/maps" target="_blank"><p>www.google.com.mx/maps</p></a>
									 </div>
		                            <div class="col-md-6">
									<a href="https://www.cedulaprofesional.sep.gob.mx" target="_blank"><p>www.cedulaprofesional.sep.gob.mx</p></a>
									</div>
								</div>
								<div class="row">
		                            <div class="col-md-6">
									<a href="https://www.buholegal.com" target="_blank"><p>www.buholegal.com</p></a>
										 </div>
		                            <div class="col-md-6">
									<a href="https://mx.datajuridica.com" target="_blank"><p>mx.datajuridica.com</p></a>
									</div>
								</div>
								<div class="row">
		                            <div class="col-md-6">
									<a href="https://consultas.curp.gob.mx" target="_blank"><p>consultas.curp.gob.mx</p></a>
										 </div>
		                            <div class="col-md-6">
									<a href="https://mi-rfc.com.mx/consulta-rfc-homoclave" target="_blank"><p>mi-rfc.com.mx/consulta-rfc-homoclave</p></a>
										</div>
								</div>
								<div class="row">
		                            <div class="col-md-6">
									<a href="https://portal.infonavit.org.mx" target="_blank"><p>portal.infonavit.org.mx</p></a>
									</div>
		                            <div class="col-md-6">
								    <a href="https://listanominal.ife.org.mx" target="_blank"><p>listanominal.ife.org.mx</p></a>
								    	</div>
								</div>
		                        </div>
		                    </div>
                    </div>

						</div>


					</div>	
						

                    
                    <!----------------------------------  MAPA ------------------------------ -->
                  <div class="row">
									<a name="ir-mapa">	
									<div class="row" id="view-map">					


									<div  class="content-map"  >
									  
									    <center><h3>MAPA</h3>  </center>    
											
											<input id="pac-input" class="controls-mapa" type="text"
									        placeholder="Colocar Locación" >
									      
									      <div id="type-selector" class="controls-mapa">
											      <input type="radio" name="type" id="changetype-all" checked="checked">
											      <label for="changetype-all">Todo</label>

											      <input type="radio" name="type" id="changetype-establishment">
											      <label for="changetype-establishment">Establecimientos</label>

											      <input type="radio" name="type" id="changetype-address">
											      <label for="changetype-address">Avenidas</label>

											      <input type="radio" name="type" id="changetype-geocode">
											      <label for="changetype-geocode">Geocodigos</label>
												  
										</div>
										
										
									    <div id="map"></div>
										
									  </div>   
									 </div>
									 </a>
					</div>
   <!----------------------------------  MAPA ------------------------------ -->


				</div>
				<div class="tab-pane fade" id="nav-tab2-2">
					<div class="invoice">
		                <div class="invoice-company">
		                    <span class="pull-right hidden-print">
		                    <a href="javascript:;" class="btn btn-sm btn-primary m-b-10" data-toggle="tooltip" title="Cambiar Ejecutivos" id="btn-cambiar-ejecutivos"><i class="fa fa-2x fa-exchange m-r-5 pull-right"></i></a>
		                    {{--<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Print</a>--}}
		                    </span>
		                    <strong> #ESE{{ $estudio_ese->id }}, Tipo: ({{ $estudio_ese->tipoEstudio->tipo_estudio }})</strong>
		                </div>
		                <div class="invoice-header">
		                    <div class="invoice-from">
		                        <small>Candidato</small>
		                        <address class="m-t-5 m-b-5">
		                            <strong>{{ isset($estudio_ese->candidato) ? $estudio_ese->candidato->nombre . ' ' . $estudio_ese->candidato->apellido_paterno . ' ' . 
		                            		   $estudio_ese->candidato->apellido_materno : '' }}</strong><br>
		                            Dirección<br>
		                            {{ isset($estudio_ese->candidato) ? $estudio_ese->candidato->ciudad : '' }} 
		                            {{ isset($estudio_ese->candidato) ? $estudio_ese->candidato->delegacion : '' }} 
		                            {{ isset($estudio_ese->candidato) ? $estudio_ese->candidato->cp : '' }}<br>
		                            {{ isset($estudio_ese->candidato) ? $estudio_ese->candidato->colonia : '' }} 
		                            {{ isset($estudio_ese->candidato) ? $estudio_ese->candidato->calle : '' }}<br>
		                            Tel: {{ isset($estudio_ese->candidato) ? $estudio_ese->candidato->telefono : '' }}<br>
		                            
		                        </address>
		                    </div>
		                    <div class="invoice-to">
		                        <small>Ejecutivo Principal</small>
		                        <address class="m-t-5 m-b-5">
		                        	@foreach( $estudio_ese->ejecutivos as $ejecutivo )
		                        		@if( $ejecutivo->pivot->principal == '2' )
		                            	<strong>{{ $ejecutivo->name . ' ' . $ejecutivo->apellido_paterno . ' ' . $ejecutivo->apellido_materno}}</strong><br>
			                            Tel. Oficina: {{ $ejecutivo->telefono_oficina }}<br>
			                            Tel. Móvil: {{ $ejecutivo->telefono_movil }}
		                            	@endif
		                            @endforeach

		                        </address>
		                    </div>
		                    <div class="invoice-date">
		                        <small>Inicio estudio</small>
		                        <div class="date m-t-5">{{ $estudio_ese->fecha_actualizacion }}</div>
		                        <div class="invoice-detail">
		                            Estatus<br>
		                            {{ $estudio_ese->status->nombre }}
		                        </div>
		                        <br>
		                        <small>Fecha Visita</small>
		                        <div class="date m-t-5">{{ $estudio_ese->fecha_visita }}</div>		                        
		                    </div>
		                </div>
		                <div class="invoice-content">
		                    <div class="table-responsive">
		                        <table class="table table-invoice">
		                            <thead>
		                                <tr>
		                                    <th>Ejecutivo</th>
		                                    <th>Tipo</th>		                                    
		                                </tr>
		                            </thead>
		                            <tbody>

		                            	@foreach( $estudio_ese->ejecutivos as $ejecutivo)
		                            		@if( $ejecutivo->pivot->status == 1 )
			                                <tr>
			                                    <td>
			                                        {{ $ejecutivo->nombre_ejecutivo }}<br>
			                                        
			                                    </td>
			                                    <td>
			                                    	@if($ejecutivo->pivot->principal == 1)			                                    		
			                                    		Ejecutivo Auxiliar
			                                    	@elseif($ejecutivo->pivot->principal == 2)
														Ejecutivo Principal
													@else
														Ejecutivo Foraneo
													@endif

			                                    </td>
			                                    
			                                </tr>
			                                @endif
		                                @endforeach
		                                
		                            </tbody>
		                        </table>
		                    </div>
		                    <div class="invoice-price">
		                        <div class="invoice-price-left">
		                       <center><strong> Costo ESE</strong></center><br>
		                            <div class="invoice-price-row">

		                                <div class="sub-price">
		                                    <small>SUBTOTAL</small>
		                                    ${{ number_format($estudio_ese->subtotal,2) }}
		                                </div>
		                                <div class="sub-price">
		                                    <i class="fa fa-plus"></i>
		                                </div><div class="sub-price">
		                                    <small>Viáticos</small>
		                                    ${{ number_format($estudio_ese->viaticos,2) }}
		                                </div>
		                                <div class="sub-price">
		                                    <i class="fa fa-plus"></i>
		                                </div>
		                                <div class="sub-price">
		                                    <small>(16%)</small>
		                                    ${{ number_format( ($estudio_ese->subtotal + $estudio_ese->viaticos) * 0.16 ,2) }}
		                                </div>		                                
		                            </div>
		                        </div>
		                        <div class="invoice-price-right">
		                            <small>TOTAL</small> ${{ number_format(($estudio_ese->subtotal + $estudio_ese->viaticos) * 1.16,2) }}
		                        </div>
		                    </div>
		                </div>
		                {{--<div class="invoice-note">
		                    * Make all cheques payable to [Your Company Name]<br>
		                    * Payment is due within 30 days<br>
		                    * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
		                </div>
		                <div class="invoice-footer text-muted">
		                    <p class="text-center m-b-5">
		                        THANK YOU FOR YOUR BUSINESS
		                    </p>
		                    <p class="text-center">
		                        <span class="m-r-10"><i class="fa fa-globe"></i> matiasgallipoli.com</span>
		                        <span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
		                        <span class="m-r-10"><i class="fa fa-envelope"></i> rtiemps@gmail.com</span>
		                    </p>
		                </div>--}}
		            </div>
				</div>
				<div class="tab-pane fade" id="nav-tab2-3">
					<table id="data-table" class="display table table-striped table-bordered">
	            		<thead>
	            			<tr>
	            				<th class="text-center">Tipo</th>
	            				<th class="text-center">Archivo</th>		            					
	            				<th class="text-center">Descargar</th>		            					
		            			<th class="text-center">Fecha Alta</th>
		            			
		            		</tr>
	            		</thead>
	            		<tfoot>

		            			<tr>
		            				<td class="text-center">Tipo</td>
		            				<td class="text-center">Archivo</td>			            			
		            				<td class="text-center">Descargar</td>			            			
			            			<td class="text-center">Fecha Alta</td>
		            			</tr>
	            		</tfoot>
	            		<tbody>
	            			@foreach( $estudio_ese->anexos as $anexo )
	            				<tr>
	            					<td class="text-center">{{ $anexo->tipo }}</td>
	            					<td class="text-center">{{ $anexo->archivo }}</td>	            					
	            					<td class="text-center">
	            						<a href="{{ url('estudio-ese-download-anexo?anexo=') . $anexo->id }}" class="btn btn-primary btn-xs"><i class="fa fa-download"></i></a>	
	            					</td>	            					
	            					<td class="text-center">{{ $anexo->fecha_alta }}</td>
	            					

	            					
	            				</tr>
	            			@endforeach
	            		</tbody>
            		</table>
				</div>
				<div class="tab-pane fade" id="nav-tab2-4">
					<table id="data-table-imagenes" class="display table table-striped table-bordered">
	            		<thead>
	            			<tr>
	            				<th class="text-center">Tipo</th>
	            				<th class="text-center">Archivo</th>		            					
	            				<th class="text-center">Descargar</th>		            					
		            			<th class="text-center">Fecha Alta</th>
		            			<th class="text-center">Eliminar</th>
		            			
		            		</tr>
	            		</thead>
	            		<tfoot>

		            			<tr>
		            				<td class="text-center">Tipo</td>
		            				<td class="text-center">Archivo</td>			            			
		            				<td class="text-center">Descargar</td>			            			
			            			<td class="text-center">Fecha Alta</td>
			            			<td class="text-center">Eliminar</td>
		            			</tr>
	            		</tfoot>
	            		<tbody>
	            			@foreach( $estudio_ese->imagenes as $imagen )
	            				<tr>
	            					<td class="text-center">{{ $imagen->tipo }}</td>
	            					<td class="text-center">{{ $imagen->archivo }}</td>	            					
	            					<td class="text-center">
	            						<a href="{{ url('estudio-ese-download-imagen?imagen=') . $imagen->id }}" class="btn btn-circle btn-primary btn-sm"><i class="fa fa-download"></i></a>	
	            					</td>	            					
	            					<td class="text-center">{{ $imagen->fecha_alta }}</td>
	            					<td class="text-center">
	            						<form action="{{ url('estudio-ese-delete-imagen') }}" method="POST">
	            							
	            							<input type="hidden" name="_token" value="{{ csrf_token() }}">
	            							<button type="submit" class="btn btn-circle btn-danger btn-sm" name="id_imagen" value="{{ $imagen->id }}">
	            								<i class="fa fa-trash"></i>
	            							</button>
	            						</form>
	            					</td>
	            				</tr>
	            			@endforeach
	            		</tbody>
            		</table>
				</div>
				<div class="tab-pane fade" id="nav-tab2-5">
					<table id="data-table-kardex" class="display table table-striped table-bordered">
	            		<thead>
	            			<tr>
	            				<th class="text-center">Usuario</th>
	            				<th class="text-center">Descripción</th>
		            			<th class="text-center">Fecha Alta</th>
		            		</tr>
	            		</thead>
	            		<tfoot>
	            			<tr>
	            				<td class="text-center">Usuario</td>
	            				<td class="text-center">Descripción</td>		
		            			<td class="text-center">Fecha Alta</td>
	            			</tr>
	            		</tfoot>
	            		<tbody>
	            			@foreach( $lista_kardex as $kardex )
	            				@if( $estudio_ese->id == $kardex->id_objeto )
	            				<tr>
	            					<td class="text-center">{{ $kardex->usuario->name }}</td>
	            					<td class="text-left">{{ $kardex->descripcion }}</td>
	            					<td class="text-center">{{ $kardex->fecha }}</td>
	            				@endif	            					
	            				</tr>
	            			@endforeach
	            		</tbody>
            		</table>


					lista_kardex
				</div>
			</div>
		</div>






	</div>


	{!! Form::open(['url' => 'estudio-ese-iniciar', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'frm-ese-iniciar']) !!}
		
		<input type="hidden" name="id_estudio" value="{{ $estudio_ese->id }}">
		<input type="hidden" name="id_os" value="{{$estudio_ese->id_os}}">
	{!! Form::close() !!}


	{!! Form::open(['url' => 'estudio-ese-no-iniciar', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'frm-ese-no-iniciar']) !!}
		
		<input type="hidden" name="id_estudio" value="{{ $estudio_ese->id }}">
		<input type="hidden" name="id_os" value="{{$estudio_ese->id_os}}">
	{!! Form::close() !!}

	{!! Form::open(['url' => 'estudio-ese-cerrar', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'frm-ese-cerrar']) !!}
		
		<input type="hidden" name="id_estudio" value="{{ $estudio_ese->id }}">
		<input type="hidden" name="id_os" value="{{$estudio_ese->id_os}}">
	{!! Form::close() !!}

	{!! Form::open(['url' => 'estudio-ese-cancelar', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'frm-ese-cancelar']) !!}
		
		<input type="hidden" name="id_estudio" value="{{ $estudio_ese->id }}">
		<input type="hidden" name="id_os" value="{{$estudio_ese->id_os}}">
	{!! Form::close() !!}

	@include('ESE.ese-asignar-ejecutivo')
	@include('ESE.ese-reasignar-ejecutivo')
	@include('ESE.ese-modal-add-anexo')
	@include('ESE.ese-modal-add-imagen')

	@endsection

	@section('js-base')

	@include('librerias.base.base-begin')
	@include('librerias.base.base-begin-page')
	

	{!! Html::script('assets/js/sweetalert.min.js') !!}
	{!! Html::script('assets/js/jquery.numeric.min.js') !!}

   <script>
    // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
      	
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
		

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
		 // console.log(place);
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);
      }	
   
   </script>
   
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADkkGRh4XIE0_fbAc5zUjvKtxIVJD4rGc&libraries=places&callback=initMap" async defer>
       </script>



	<script type="text/javascript">

		$(document).ready(function(){

			$.fn.delayPasteKeyUp = function(fn, ms)
		    {
		        var timer = 0;
		        $(this).on("keyup paste", function()
		        {
		            clearTimeout(timer);
		            timer = setTimeout(fn, ms);
		        });
		    };

			$('.telefono').numeric();			
			verificarEstudio();	
			iniciarTabla();

			/*Habilitar de nuevo para cerrar estudio*/
			$('#close-ese').click(function(){
				cerrarEstudio();
			});

			$('#cancel-ese').click(function(){
				cancelarEstudio();
			});

			$('.col-validation-field-file').hide();
			$('.col-validation-field-file-image').hide();

			$('[data-toggle="tooltip"]').tooltip(); 
			$('#show-message-asignacion').hide();

			$('#fecha_visita').change(function(){
				url = "{{ url('estudio-ese-save-visita') }}";
				id_ese= "{{ $estudio_ese->id }}";

				guardarFechaVisita(this.value, url, id_ese);
			});

			$('#cantidad_viaticos').delayPasteKeyUp(function(){
				url_viaticos = "{{ url('estudio-ese-guardar-viaticos') }}";
				cantidad 	 = $('#cantidad_viaticos').val();
				id_ese= "{{ $estudio_ese->id }}";
				guardarViaticos( url_viaticos,id_ese,cantidad);
			},4000);	

			$('#asignar-plantilla').change(function(){ 
				url 		 = "{{ url('estudio-ese-asignar-plantilla') }}";
				id_ese 		 = "{{ $estudio_ese->id }}";
				id_plantilla = this.value;
				
				asignarPlantilla( url, id_ese, id_plantilla);
			});	

			$('#btn-cancelar-asignacion-ejecutivo').hide();

			$('#btn-asignar-ejecutivo').click(function(){
				asignarEjecutivos();
			});
			$('#btn-reasignar-ejecutivo').click(function(){
				reasignarEjecutivos();
			});	

			$('#btn-upload-anexo').click(function(){
				$('#ese-modal-anexo').modal('show');				
			});

			$('#btn-upload-imagen').click(function(){
				$('#ese-modal-add-imagen').modal('show');				
			});
			

			$('#btn-frm-add-anexo').click(function(){


				var validacion = validar_check_files_anexos(); 
								

				if(validacion)
				{
					$('#frm-add-anexo').submit();

				}else{
					alert('No selecciono el archivo');
				}
			});
			$('#btn-frm-add-imagen').click(function(){
				$('#frm-add-imagen').submit();
			});

			$('.checkbox_archivo_seleccionado').click(function(){
				var index 	  		= $('.checkbox_archivo_seleccionado').index(this);
				var obj_input 		= $('.input_seleccionado').get(index);
				var obj_input_file 	= $('.files_anexos').get(index);
				var obj_valid 	 	= $('.col-validation-field-file').get(index);
				

				if(this.checked)
				{
					$(obj_input).val(1)	
				}else{
					$(obj_input).val(0);	
					$(obj_input_file).val('');
					$(obj_valid).hide();
					$('#btn-frm-add-anexo').removeAttr('disabled');
				}

				/*
				this.checked ? $(obj_input).val(1) : $(obj_input).val(0); 
				this.checked ? $(obj_input_file).val(1) : $(obj_input_file).val(''); 
				*/				
			});

			$('.checkbox_imagen_seleccionado').click(function(){
				var index 	  = $('.checkbox_imagen_seleccionado').index(this);
				var obj_input = $('.input_imagen_seleccionada').get(index);
				
				this.checked ? $(obj_input).val(1) : $(obj_input).val(0); 				
			});


			$('.checkbox_imagen_seleccionado').click(function(){
				var index 	  		= $('.checkbox_imagen_seleccionado').index(this);
				var obj_input 		= $('.input_imagen_seleccionada').get(index);
				var obj_input_file 	= $('.files_images').get(index);
				var obj_valid 	 	= $('.col-validation-field-file-image').get(index);

				if(this.checked)
				{
					$(obj_input).val(1)	
				}else{
					$(obj_input).val(0);	
					$(obj_input_file).val('');
					$(obj_valid).hide();
					$('#btn-frm-add-imagen').removeAttr('disabled');
				}

				/*
				this.checked ? $(obj_input).val(1) : $(obj_input).val(0); 
				this.checked ? $(obj_input_file).val(1) : $(obj_input_file).val(''); 
				*/

				
			});

			$('#btn-cambiar-ejecutivos').click(function(){
				showModalResignacion();
			})

			$('.files_anexos').change(function(){
				var index 		 = $('.files_anexos').index(this);
				var obj_checkbox = $('.checkbox_archivo_seleccionado').get(index);
				var obj_input 	 = $('.input_seleccionado').get(index);
				var obj_valid 	 = $('.col-validation-field-file').get(index);
				var filesize 	 = this.files[0].size/1024;
				var sizeUpload	 = 10240;
				obj_checkbox.checked = true;
				
				if(filesize > sizeUpload )
				{    				
    				$(obj_valid).show();
    				obj_input.value = 1;
    				$('#btn-frm-add-anexo').attr('disabled','disabled');					
				}else{
					$('#btn-frm-add-anexo').removeAttr('disabled');
					obj_input.value = 1;
					$(obj_valid).hide();
				}
			});

			$('.files_images').change(function(){
				var index 		 = $('.files_images').index(this);
				var obj_checkbox = $('.checkbox_imagen_seleccionado').get(index);
				var obj_input 	 = $('.input_imagen_seleccionada').get(index);
				var obj_valid 	 = $('.col-validation-field-file-image').get(index);
				var filesize 	 = this.files[0].size/1024;
				var sizeUpload	 = 10240;
				obj_checkbox.checked = true;
				
				if(filesize > sizeUpload )
				{    				
    				$(obj_valid).show();
    				obj_input.value = 1;
    				$('#btn-frm-add-imagen').attr('disabled','disabled');					
				}else{
					$('#btn-frm-add-imagen').removeAttr('disabled');
					obj_input.value = 1;
					$(obj_valid).hide();
				}
			});


			

		});


		var validar_files_anexos = function()
		{
			var bandera = true;
			var lista_check_anexos = $('.checkbox_archivo_seleccionado');
				tamanio = lista_check_anexos.length;
				var bandera = true;
				bandera = ( tamanio == 0 ) ? false:true;
				for( i = 0; i < tamanio; i++)
				{
					if(lista_check_anexos[i].checked)
					{
						file_selected = $('.files_anexos').get(i);

						if( !file_selected.files[0] )
						{
							columna = $('.col-validation-field-file').get(i);
							$(columna).show();	
							bandera = false;						
						}											
					}
				}
				return bandera;
		} 


		var validar_check_files_anexos = function()
		{
			var bandera = true;
			var lista_check_anexos = $('.checkbox_archivo_seleccionado');
				tamanio = lista_check_anexos.length;
				var bandera = true;
				bandera = ( tamanio == 0 ) ? false:true;
				for( i = 0; i < tamanio; i++)
				{
					console.log( lista_check_anexos[i].checked );
					if(!lista_check_anexos[i].checked)
					{
						bandera = false;

					}else{
						bandera = true;
						break;
					}
				}

				return bandera;
		} 

		var guardarFechaVisita = function(  fecha, url, id ){
			$.ajax({				
				url: url,									
				type: 'GET',
				dataType: 'json',
				data:{ fecha_visita: fecha,id_ese:id },
				success: function(response){ 
							$('#message-text').html( response.data.message);
							$('#message-text-main').html( response.data.accion + ':');

							$('#show-message-asignacion').fadeIn('slow');
						},
				error : function(jqXHR, status, error) {

				            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
				        }
			});
		}

		var asignarPlantilla = function(  url, id_ese, id_plantilla ){
			$.ajax({				
				url: url,									
				type: 'GET',
				dataType: 'json',
				data:{ id_ese:id_ese, id_plantilla:id_plantilla },
				success: function(response){


							if( response.data.status )
							{
								$('#message-text').html( response.data.message);
								$('#message-text-main').html( response.data.accion + ':');
								
							}


							$('#show-message-asignacion').fadeIn('slow');
							location.reload();
						},
				error : function(jqXHR, status, error) {

				            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
				        }
			});
		}

		var guardarViaticos = function(  url, id_ese, cantidad ){
			$.ajax({				
				url: url,									
				type: 'GET',
				dataType: 'json',
				data:{ id_ese:id_ese, cantidad:cantidad },
				success: function(response){


							if( response.data.status )
							{
								$('#message-text').html( response.data.message);
								$('#message-text-main').html( response.data.accion + ':');
								
							}


							$('#show-message-asignacion').fadeIn('slow');
							//location.reload();
						},
				error : function(jqXHR, status, error) {

				            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
				        }
			});
		}


		var asignarEjecutivos = function()
		{        
			var id_ejecutivo_principal = $('#id_ejecutivo_principal').val();
			var id_ejecutivo_aux 	   = $('#id_ejecutivo_aux').val();
			var id_ejecutivo_foraneo   = $('#id_ejecutivo_foraneo').val();

			if( id_ejecutivo_principal != -1 ){
	        	$('#btn-asignar-ejecutivo').attr("disabled", "disabled");
		        $.ajax({		            
			            url:'{{ url('estudio-ese-asignar-ejecutivo') }}',
			            type:'GET',
			            dataType: 'json',
			            data: { ejecutivos:[ id_ejecutivo_principal, id_ejecutivo_aux, id_ejecutivo_foraneo],
			            		tipo_ejecutivo:[2,1,3],
			            		id_ese_detalle:'{{ $estudio_ese->id }}',
			            		id_ejecutivo_principal:id_ejecutivo_principal,
			            		id_ejecutivo_aux:id_ejecutivo_aux,
			            		id_ejecutivo_foraneo:id_ejecutivo_foraneo },
			            success: function(response){ 

			            	if( response.data.status == 'success' )
			            	{
			            		location.reload();
			            	}

			            },
			            error : function(jqXHR, status, error) {

						            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
						}
				});
			}
		}

		var reasignarEjecutivos = function()
		{        
			var id_ejecutivo_principal = $('#id_reasignar_ejecutivo_principal').val();
			var id_ejecutivo_aux 	   = $('#id_reasignar_ejecutivo_aux').val();
			var id_ejecutivo_foraneo   = $('#id_reasignar_ejecutivo_foraneo').val();

			var id_old_ejecutivo_principal = $('#id_old_ejecutivo_principal').val();
			var id_old_ejecutivo_aux 	   = $('#id_old_ejecutivo_aux').val();
			var id_old_ejecutivo_foraneo   = $('#id_old_ejecutivo_foraneo').val();



			if( id_ejecutivo_principal != -1 ){
	        	$('#btn-asignar-ejecutivo').attr("disabled", "disabled");
		        $.ajax({		            
			            url:'{{ url('estudio-ese-reasignar-ejecutivo') }}',
			            type:'GET',
			            dataType: 'json',
			            data: { ejecutivos: [ id_ejecutivo_principal, id_ejecutivo_aux, id_ejecutivo_foraneo],
			            		ejecutivos_old: [ id_old_ejecutivo_principal, id_old_ejecutivo_aux, id_old_ejecutivo_foraneo],
			            		tipo_ejecutivo:[2,1,3],
			            		id_ese_detalle:'{{ $estudio_ese->id }}',
			            		id_ejecutivo_principal:id_ejecutivo_principal,
			            		id_ejecutivo_aux:id_ejecutivo_aux,
			            		id_ejecutivo_foraneo:id_ejecutivo_foraneo },
			            success: function(response){ 

			            	if( response.data.status == 'success' )
			            	{
			            		location.reload();
			            	}

			            },
			            error : function(jqXHR, status, error) {

						            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
						}
				});
			}
		}

		var verificarEstudio = function(){

			@if( $estudio_ese->isAsignado() )
				iniciarEstudio();
			@elseif( $estudio_ese->iniciado() )
				showModalAsignacion();
			@endif
		}

		var iniciarEstudio = function()
		{
			swal({
					  title: "¡ SIN INICIAR !",
					  text: "<h4 class=\"text-warning\"><strong>¿ Deseas iniciar el estudio ? </strong></h4>",
					  type: "info",
					  html: true,
					  showCancelButton: true,
					  closeOnConfirm: false,
					  closeOnCancel:false,
					  showLoaderOnConfirm: true,
					},
					function( confirmar ){

						if ( confirmar ) {
						    marcarInicioEstudio();
						} else {
						    cancelarInicioEstudio();


						}

					  	/*setTimeout(function(){
					    swal("El estudio se ha asignado a ti!","Apurale campeón y acabalo","success");

					    
					  }, 2000);*/
				});

		}

		var cerrarEstudio = function()
		{
			swal({
					  title: "<h3>¿ Cerrar el estudio ?</h3>",
					  text: "<h6 class=\"text-warning\"><strong>¡Una vez cerrado solo el Ejecutivo Sr. podrá abrirlo!</strong></h6>",
					  type: "warning",
					  html: true,
					  showCancelButton: true,
					  closeOnConfirm: false,
					  closeOnCancel:false,
					  showLoaderOnConfirm: true,
					},
					function( confirmar ){

						if ( confirmar ) {
						    aceptarCerrarEstudio();
						} else {
						    swal.close();

						}
				});
		}

		var cancelarEstudio = function()
		{
			swal({
					  title: "<h3>¿ Cancelar el estudio ?</h3>",
					  text: "<h6 class=\"text-warning\"><strong>¡Una vez cancelado no se podrá abrir!</strong></h6>",
					  type: "warning",
					  html: true,
					  showCancelButton: true,
					  closeOnConfirm: false,
					  closeOnCancel:false,
					  showLoaderOnConfirm: true,
					},
					function( confirmar ){

						if ( confirmar ) {
						    aceptarcancelarEstudio();
						} else {
						    swal.close();

						}
				});
		}

		var showModalAsignacion = function()
		{			
			$('#asignar-ejecutivo').modal({show: true,keyboard:false});
		}
		var showModalResignacion = function()
		{			
			$('#reasignar-ejecutivo').modal('show');
		}

		var marcarInicioEstudio = function()
		{
			$('#frm-ese-iniciar').submit();
		}

		var cancelarInicioEstudio = function()
		{
			//swal("Cancelado!", "Salte de este estudio por que ya vieron que no quieres iniciarlo.", "error");	
			$('#frm-ese-no-iniciar').submit();
		}

		var aceptarCerrarEstudio = function()
		{
			//swal("Cancelado!", "Salte de este estudio por que ya vieron que no quieres iniciarlo.", "error");	
			$('#frm-ese-cerrar').submit();
		}

		var aceptarcancelarEstudio = function()
		{
			//swal("Cancelado!", "Salte de este estudio por que ya vieron que no quieres iniciarlo.", "error");	
			$('#frm-ese-cancelar').submit();
		}

		var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                   {
                extend: 'excelHtml5',
                title: 'Listado de anexos ESE',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de anexos ESE',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de anexos ESE',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
             }

                                ],
                                responsive: true,
                                autoFill: true,
//                                "scrollY": "350px",
                                "paging": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                 dom:'Blfrtip' ,
                                "drawCallback": function( settings ) {
							        $('[data-toggle="popover"]').popover({
							    		delay: { "show": 500, "hide": 100 },
							    		trigger:'focus'

							    	});
							    },
                               /* "footerCallback": function ( row, data, start, end, display ) {
                                        var api = this.api(), data;
                             
                                        // Remove the formatting to get integer data for summation
                                        var intVal = function ( i ) {
                                            return typeof i === 'string' ?
                                                i.replace(/[\$,]/g, '')*1 :
                                                typeof i === 'number' ?
                                                    i : 0;
                                        };
                             
                                        // Total over all pages
                                        total = api
                                            .column( 2 )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Total over this page
                                        pageTotal = api
                                            .column( 2, { page: 'current'} )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Update footer
                                       $( api.column( 2 ).footer() ).html('TOTAL VISTA $ '+number_format(pageTotal,2));
                                        $('#total-cotizaciones-reportes').html('$ '+number_format(total,2));
                                    
                                }*/
                           
                            } );





            				$('#data-table tfoot td').each( function () {
						        var title = $(this).text();
						        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
						    } );


						    data_table.columns().every( function () {
						        var that = this;
						 
						        $( 'input', this.footer() ).on( 'keyup change', function () {
						            if ( that.search() !== this.value ) {
						                that
						                    .search( this.value )
						                    .draw();
						            }
						        } );
						    } );





			/*******************************************************************************************************/

			var data_table_imagenes =$("#data-table-imagenes").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                   {
                extend: 'excelHtml5',
                title: 'Listado de anexos ESE',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de anexos ESE',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de anexos ESE',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
             }

                                ],
                                responsive: true,
                                autoFill: true,
//                                "scrollY": "350px",
                                "paging": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                 dom:'Blfrtip' ,
                                "drawCallback": function( settings ) {
							        $('[data-toggle="popover"]').popover({
							    		delay: { "show": 500, "hide": 100 },
							    		trigger:'focus'

							    	});
							    },
                               /* "footerCallback": function ( row, data, start, end, display ) {
                                        var api = this.api(), data;
                             
                                        // Remove the formatting to get integer data for summation
                                        var intVal = function ( i ) {
                                            return typeof i === 'string' ?
                                                i.replace(/[\$,]/g, '')*1 :
                                                typeof i === 'number' ?
                                                    i : 0;
                                        };
                             
                                        // Total over all pages
                                        total = api
                                            .column( 2 )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Total over this page
                                        pageTotal = api
                                            .column( 2, { page: 'current'} )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Update footer
                                       $( api.column( 2 ).footer() ).html('TOTAL VISTA $ '+number_format(pageTotal,2));
                                        $('#total-cotizaciones-reportes').html('$ '+number_format(total,2));
                                    
                                }*/
                           
                            } );





            				$('#data-table-imagenes tfoot td').each( function () {
						        var title = $(this).text();
						        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
						    } );


						    data_table_imagenes.columns().every( function () {
						        var that = this;
						 
						        $( 'input', this.footer() ).on( 'keyup change', function () {
						            if ( that.search() !== this.value ) {
						                that
						                    .search( this.value )
						                    .draw();
						            }
						        } );
						    } );


			/********************************************************************************************************************************/


			var data_table_kardex =$("#data-table-kardex").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                   {
                extend: 'excelHtml5',
                title: 'Listado de anexos ESE',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de anexos ESE',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de anexos ESE',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
             }

                                ],
                                responsive: true,
                                autoFill: true,
//                                "scrollY": "350px",
                                "paging": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                 dom:'Blfrtip' ,
                                "drawCallback": function( settings ) {
							        $('[data-toggle="popover"]').popover({
							    		delay: { "show": 500, "hide": 100 },
							    		trigger:'focus'

							    	});
							    },
                               /* "footerCallback": function ( row, data, start, end, display ) {
                                        var api = this.api(), data;
                             
                                        // Remove the formatting to get integer data for summation
                                        var intVal = function ( i ) {
                                            return typeof i === 'string' ?
                                                i.replace(/[\$,]/g, '')*1 :
                                                typeof i === 'number' ?
                                                    i : 0;
                                        };
                             
                                        // Total over all pages
                                        total = api
                                            .column( 2 )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Total over this page
                                        pageTotal = api
                                            .column( 2, { page: 'current'} )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Update footer
                                       $( api.column( 2 ).footer() ).html('TOTAL VISTA $ '+number_format(pageTotal,2));
                                        $('#total-cotizaciones-reportes').html('$ '+number_format(total,2));
                                    
                                }*/
                           
                            } );





            				$('#data-table-kardex tfoot td').each( function () {
						        var title = $(this).text();
						        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
						    } );


						    data_table_kardex.columns().every( function () {
						        var that = this;
						 
						        $( 'input', this.footer() ).on( 'keyup change', function () {
						            if ( that.search() !== this.value ) {
						                that
						                    .search( this.value )
						                    .draw();
						            }
						        } );
						    } );


                
        }


	</script>

	<script type="text/javascript">

$(document).ready(function()
{
        $.fn.delayPasteKeyUp = function(fn, ms)
  {
      var timer = 0;
      $(this).on("keyup paste", function()
      {
          clearTimeout(timer);
          timer = setTimeout(fn, ms);
      });
  };

   $('#demo_colonia').focus(function(){
      $('#resultado_colonias').show();
   });

 

        $('#demo_cp').delayPasteKeyUp(function(){

          longitud_cp   = ($('#demo_cp').val()).length;
          aux_cp        = $('#demo_cp').val();
          inicio_cp     = aux_cp.substr(0,1);
          parametro_cp  = (inicio_cp == '0') ? aux_cp.substr(1) : $('#demo_cp').val(); 
          
          if($.trim($('#demo_cp').val()) != '' && longitud_cp > 2){

                $.ajax({
                    url:'{{ url('list_cpss') }}',
                    type:'GET',
                    dataType:'json',
                    data:{cp:parametro_cp},
                    success:function(lista_cp){      
                      
                      str_html_search = '<div class="list-group" style="height:200px; overflow: auto;">';                      
                      if(lista_cp.length > 0){    
                          $.each(lista_cp,function(index){
                            arr_campos_cp     = lista_cp[index].split('||');
                            campo_cp          = arr_campos_cp[0]; 
                            campo_colonias    = arr_campos_cp[1];
                            campo_delegacion  = arr_campos_cp[2];
                            campo_estado      = arr_campos_cp[3];                        
                            
                            str_html_search +='<a href="javascript:;" onclick="selectedCP(\''+campo_cp+'\',\''+campo_colonias+'\''+',\''+campo_delegacion+'\''+',\''+campo_estado+'\')" class="list-group-item">'+campo_cp+'</a>'; 
                          });
                      }else{
                        str_html_search += '<a href="javascript:;" class="list-group-item"><p>No se encontraron registros ...</p></a>';
                      }
                      str_html_search+= '</div>';
                      $('#result_search').html('').append(str_html_search);
                        
                    },
                    error : function(jqXHR, status, error){
                        swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                    }
                });
            }else{
                $('#result_search').html('');              
            }
        },500);
});
    var selectedCP = function(cp,colonias,delegacion,estado){
    cp = cp.toString();    
    value_cp = (cp.length < 5) ? '0'+cp:cp;    
    $('#demo_cp').val(value_cp);
    $("#estado").val(estado);//muestra el valor del estado de acuerdo al cp
    $("#municipio").val(delegacion);//muestra el valor del estado de acuerdo al cp
    $('#result_search').html('');
    $('#demo_colonia').val('');


    lista_colonias = colonias.split(';');
    str_html_colonias = '<div class="list-group" style="height:100px; overflow: auto;">';
    $.each(lista_colonias,function(index){
      str_html_colonias+= '<a href="#" class="list-group-item" onclick="selectedColonia(\''+lista_colonias[index]+'\')">'+lista_colonias[index]+'</a>'
    });
    str_html_colonias+= '</div>';
    $('#resultado_colonias').hide();
    $('#resultado_colonias').html('').append(str_html_colonias);
  }
    var selectedColonia = function(colonia){
    $('#demo_colonia').val(colonia);
    $('#resultado_colonias').hide();
  }

	</script>

	@endsection



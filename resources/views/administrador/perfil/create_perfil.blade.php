@extends('layouts.masterMenuView')
@section('section')
<div id="content" class="content">
	<!-- <ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>	
		<li><a href="{{ url('modulo/administrador/cuentas') }}">Cuentas</a></li>
		<li><a href="{{ route('sig-erp-crm::modulo.administrador.usuarios.index') }}">Usuarios</a></li>
		<li><a href="javascript:;">Alta usuario</a></li>
	</ol> -->
	<!-- begin page-header -->
	<h1 class="page-header text-center">Perfil <small>Configuración del Usuario</small></h1>
	<!-- end page-header -->
	<div class="row">
		<div class="col-md-12 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="ui-widget-1">
		        <div class="panel-heading">
		            <div class="panel-heading-btn">
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		            </div>
		            <h4 class="panel-title text-center">Perfil de Usuario</h4>
		        </div>
		        <div class="panel-body">
		            <div class="row">
						<div class="profile-container">
			                <!-- begin profile-section -->
			                <div class="profile-section">
			                    <!-- begin profile-left -->
			                    <div class="profile-left animated bounceInLeft">
			                        <!-- begin profile-image -->
			                        <div class="profile-image">        
										<i class="fa fa-user fa-2x"></i>
			                        </div>
			                        <!-- end profile-image -->
			                        <div class="m-b-10">
			                        	<div class="alert alert-info text-center fade in m-b-15">
											<strong>Perfil</strong>
										</div>			                            
			                        </div>
			                        <!-- begin profile-highlight -->
			                        <!-- <div class="profile-highlight">
			                            <h4><i class="fa fa-cog"></i> Configuración de cuenta</h4>
			                            {{--<div class="checkbox m-b-5 m-t-0">
			                                <label><input type="checkbox" /> Show my timezone</label>
			                            </div>
			                            <div class="checkbox m-b-0">
			                                <label><input type="checkbox" /> Show i have 14 contacts</label>
			                            </div> --}}
			                        </div> -->
			                        <!-- end profile-highlight -->
			                    </div>
			                    <!-- end profile-left -->
			                    <!-- begin profile-right -->
			                    <div class="profile-right">
			                        <!-- begin profile-info -->
			                        <div class="profile-info">
                                    {!! Form::open([
			                           				'route' => 'sig-erp-crm::modulo.administrador.perfil.store', 
			                           				'method' => 'post'])
                                    !!}
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nombre Perfil</label>
                                        </div>
                                        <div class="col-sm-10">
                                        {{ Form::text('slug', null,['class' => 'form-control form-control-sm','placeholder' => 'Perfil','required' =>'required','id' => 'alias_puesto']) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success ','id' => 'create-perfil']) }}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
			                        </div>
			                        <!-- end profile-info -->
			                    </div>
			                    <!-- end profile-right -->
			                </div>
			                <!-- end profile-section -->			                
			            </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
@endsection
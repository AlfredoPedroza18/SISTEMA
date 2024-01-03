@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>	
		<li><a href="{{ url('modulo/administrador/cuentas') }}">Cuentas</a></li>
		<li><a href="{{ route('sig-erp-crm::modulo.administrador.usuarios.index') }}">Usuarios</a></li>
		<li><a href="javascript:;">Editar</a></li>
		<li><a href="javascript:;">{{ $usuario->is('admin') }}</a></li>
	</ol>

	<div class="row">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>


	<!-- begin page-header -->
	<h1 class="page-header text-center">Perfil <small>Configuración del Usuario </small></h1>
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
											<strong>Perfil de usario</strong>																		
										</div>	
			                        </div>
			                        <!-- begin profile-highlight -->
			                        <div class="profile-highlight">
			                            <h4><i class="fa fa-cog"></i> Configuración de cuenta</h4>
			                            {{--
			                            <div class="checkbox m-b-5 m-t-0">
			                                <label><input type="checkbox" /> Show my timezone</label>
			                            </div>
			                            <div class="checkbox m-b-0">
			                                <label><input type="checkbox" /> Show i have 14 contacts</label>
			                            </div>--}}
			                        </div>
			                        <!-- end profile-highlight -->
			                    </div>
			                    <!-- end profile-left -->
			                    <!-- begin profile-right -->
			                    <div class="profile-right">
			                        <!-- begin profile-info -->
			                        <div class="profile-info">
					                  {!! Form::model($usuario,[
					                  		'route'  => ['sig-erp-crm::modulo.administrador.usuarios.update', $usuario],
					                  		'method' => 'PUT','enctype'=>'multipart/form-data' 
					                  		])               
					                  !!}
		                         				@include('administrador.usuarios.user_formulario')
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

{!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
	{!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/colvis.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
	{!! Html::script('assets/js/jquery.numeric.min.js') !!}


<script type="text/javascript">

	$(document).ready(function(){
    	iniciarTabla();
    	$('.telefono').numeric();

    	

    });
	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'excel', 'pdf','print'

                                ],
                                responsive: true,
                                autoFill: true,
                                "scrollY": "350px",
                                "paging": false,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
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
                
        }
</script>

@endsection
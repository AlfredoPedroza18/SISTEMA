@extends('layouts.masterMenuView')

@section('section')

<!doctype html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style type="text/css">

        

        ul.social-network {

            list-style: none;

            display: inline;

            margin-left:0 !important;

            padding: 0;

        }

        ul.social-network li {

            display: inline;

            margin: 0 5px;

        }

        .social-network a.icoRss:hover {

            background-color: #348fe2;

        }

        .social-network a.icoRssDiana:hover {

			{{--background-color: #33bdbd;--}}

			 background-color: #348fe2;

        }

        .social-network a.icoRss:hover i,a.icoRssDiana:hover i, a.icoGoogle:hover i{

		  color:#fff;

        }

        .social-network a.icoGoogle:hover {

		{{-- background-color: #BD3518;--}}

		 background-color: #348fe2;

        }

        a.socialIcon:hover, .socialHoverClass {

            color:#44BCDD;

        }

        .social-circle li a {

            display:inline-block;

            position:relative;

            margin:0 auto 0 auto;

            -moz-border-radius:50%;

            -webkit-border-radius:50%;

            border-radius:50%;

            text-align:center;

            width: 6.5em;

            height: 6.5em;

            font-size:10px;

            background-color: #D8D8D8;

        }

        .social-circle li i {

            margin:0;

            line-height:3em;

            text-align: center;

        }

        .social-circle li a:hover i, .triggeredHover {

            -moz-transform: rotate(360deg);

            -webkit-transform: rotate(360deg);

            -ms--transform: rotate(360deg);

            transform: rotate(360deg);

            -webkit-transition: all 0.2s;

            -moz-transition: all 0.2s;

            -o-transition: all 0.2s;

            -ms-transition: all 0.2s;

            transition: all 0.2s;

        }

        .social-circle i {

            color: #3a3a3a;

            -webkit-transition: all 0.8s;

            -moz-transition: all 0.8s;

            -o-transition: all 0.8s;

            -ms-transition: all 0.8s;

            transition: all 0.8s;

        }

        .jumbotron{

            padding-top: 12px;

            padding-bottom:0px;

            height:100%;

            display: flex;

            align-items: center;

            justify-content: center;



        }

        #em{

            padding-left: 30px;

        }

        .col-md-2{

            width: auto;

            padding-left: 30px;

        }



        .requerido{

		    color:red;

		    font-weight: bold;

	    }

        .link-pdf{

            color:white;

        }

    </style>

</head>

<div class="content">

	<ol class="breadcrumb ">

    <li><a href="{{ route('sig-erp-ese::catalogosese.index') }}">Catálogos ESE</a></li>

       

        {{-- <li><a href="{{route('sig-erp-ese::CatalogoEmpleados.index')}}">Personal</a></li> --}}

	    <li>Catálogo Personal - Investigadores</li>

	   

	</ol>

	

		<h1 class="page-header text-center">Investigadores</h1>

	



			    <div class="row">

					<div class="col-md-12 text-right">

                            @permission('crear.investigadores')

								<a href="{{ route('sig-erp-ese::CatalogoEmpleados.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Personal">

									<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>

								</a>

                            @endpermission



						<label>Nuevo Investigador</label>

					</div>

				</div>

				<br>


				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">

						<div class="panel-heading">

							<div class="panel-heading-btn">

							</div>

							

								<h4 class="panel-title">Catálogo Personal - Investigadores</h4>

							

						</div>

		        <div class="panel-body">

		            <hr>

		            @if (session('success'))

			            <div class="row">

			            	<div class="col-md-12">

			            		<div class="alert alert-{{ session('type') }} fade in m-b-15">

								

									 {{ session('success') }}

									<span class="close" data-dismiss="alert">×</span>

								</div>

			            	</div>

			            </div>

			        @endif


                    <!--se le agrego el campo de descripcion a la tabla -->
					<table id="data-table" class="display table table-striped table-bordered table-responsive">

						<thead>

						<tr>

							<th>Nombre</th>

							<th>Estado</th>

							<th>Puesto</th>

                            <th>Teléfono Móvil</th>

                            <th>Estatus</th>

                            <th>Cuenta</th>

							<th>Acción</th>

						</tr>

						</thead>

						<tbody>

                        

						@foreach($empleados as $empleado)

							<tr>

                                <td>{{ $empleado->NombreCompleto }}</td>

								<td class="text-center">{{ $empleado->nombre_estado }}</td>

								<td class="text-center">Investigador</td>

                                <td class="text-center">{{ $empleado->TelefonoMovil }}</td>

                                <td class="text-center">{{ $empleado->DescripcionInvestigador }}</td>

                                <td class="text-center">{{ $empleado->Descripcion }}</td>


								<td class="text-center">

                                    @permission('editar.investigadores')

									<a href="{{route('sig-erp-ese::CatalogoEmpleados.edit',$empleado->IdEmpleado)}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i>

                                    </a>

                                    @endpermission

                                &nbsp&nbsp

										<input type="hidden"  value="{{ $empleado->IdEmpleado }}" data-id="{{ $empleado->IdEmpleado }}">

                                    @permission('eliminar.investigadores')  

                                    {{ Form::open([ 'route' => ['sig-erp-ese::CatalogoEmpleados.destroy',

                                        $empleado->IdEmpleado],

                                        'method' => 'DELETE',

                                        'class'  => 'pull-right'

                                        ]) }}



                                        <button type="submit" class="btn @if($empleado->Descripcion == 'Inactivo') btn-danger @else btn-info @endif btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Inactivo/Activo">

                                        @if($empleado->Descripcion == 'Inactivo')  
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-dash" viewBox="0 0 16 16">
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4"/>
                                            </svg>
                                        @else  
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4"/>
                                            </svg>
                                        @endif
                                        
                                        

                                        </button>

                                    {{ Form::close()}}   

                                    @endpermission

								</td>

								

							</tr>

						@endforeach

						</tbody>

					</table>





		        </div>

		    </div>







</div>



@endsection



@section('js-base')

@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')









<script type="text/javascript">



var mostrarValor = function(x){

        var p=document.getElementById('valcnt').value=x;

    };



	$(document).ready(function(){

    	iniciarTabla();



    	$('[data-toggle="popover"]').popover({

    		delay: { "show": 500, "hide": 100 },

    		trigger:'focus'



    	});



        $('#cntC').change(function() {

            $('#changePC').submit();

        });



    });

	var iniciarTabla = function(){

            var data_table =$("#data-table").DataTable({

                                dom: 'Bfrtip',

                                buttons: [

                                    {

                extend: 'excelHtml5',

                title: 'Listado de Personal',

                exportOptions: {

                    columns: [ 0, 1, 2,3,4 ]

                }

            },

            {

                extend: 'pdfHtml5',

                title: 'Listado de Personal',

                pageSize: 'LEGAL',

                exportOptions: {

                    columns: [ 0, 1, 2,3,4 ]

                }



            },

             {

                extend: 'copyHtml5',

             },

             {

                extend: 'print',

                title: 'Listado de Personal',

                exportOptions: {

                    columns: [ 0, 1, 2,3,4 ]

                }

             }



                                ],

                                responsive: true,

                                autoFill: true,



                                "paging": true,

                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

                                dom:'Blfrtip' ,

                                "drawCallback": function( settings ) {

							        $('[data-toggle="popover"]').popover({

							    		delay: { "show": 500, "hide": 100 },

							    		trigger:'focus'



							    	});

							    },

                             



                            } );



        }

</script>



@endsection
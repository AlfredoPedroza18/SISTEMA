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


    </style>
</head>
<div class="content">
	<ol class="breadcrumb ">
        <li><a href="javascript:;">Nuevo / Solicitar OS</a></li>
        <li><a href="{{  route('sig-erp-ese::NuevaOS.index') }}">Crear Orden de Servicio</a></li>
	        <li>Crear Orden de Servicio - Cliente</li>

	</ol>


		<h1 class="page-header text-center">Crear Orden de Servicio</h1>
        <div class="row">
					<div class="col-md-12 text-right" id="asp" name="asp">

								<!-- <a href="{{ route('sig-erp-ese::PlantillaCliente.create') }}/" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Plantilla">
									<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
								</a> -->



					</div>
                </div>
                <br>
				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
						<div class="panel-heading">
							<div class="panel-heading-btn">
							</div>

								<h4 class="panel-title">Orden de Servicio/Cliente</h4>

						</div>
		        <div class="panel-body">

                <div class="col-md-15">
                    <form id="changePC" action="{{url('PlantillaxCliente')}}" method="POST">
                        {{ csrf_field() }}
                        <label for="cntA" class="col-form-label">Cliente:</label>
                            <select class="form-control" id="cntC" name="cntC" onchange="mostrarValor(this.value);" required >
                                <!-- <option value="">Seleccione un Cliente</option>  -->
                                    @foreach($clientes as $c)
                                        <option value="{{ $c->IdCliente }}" >{{ $c->Nombre }}</option>
                                    @endforeach
                            </select>
                            <input type="hidden" id="valcnt" name="valcnt" value="">
                    </form>
                </div>


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

                    <table class="display table table-striped table-bordered table-responsive">
						<thead>
						<th>
                            @foreach($plantillas as $p)

                            <div class="col-md-4 col-sm-6 animacion-modulos">
                                <div class="widget widget-stats bg-purple">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>
                                        <div class="stats-title" id="plantillac" name="plantillac">{{ $p->Plantilla }} @if  ($p->TipoServicio) - {{ $p->TipoServicio }} @endif </div>
                                          <p style="color: rgba(255,255,255,0.5);">Servicio: {{ $p->Servicio }} </p>

                                            <div class="row">
                                            <div class="stats-link col-md-12">
                                                <a class="stats-link col-md-6" href="{{route('sig-erp-ese::PlantillaCliente.edit',$p->IdPlantillaCliente)}}">Ver Plantilla <i class="fa fa-arrow-circle-o-left"></i></a>
                                                <a class="stats-link col-md-15"href="{{url('ConfiguracionOS/'.$p->IdPlantillaCliente.'/'.$p->IdCliente)}}">Seleccionar <i class="fa fa-arrow-circle-o-right"></i></a>

                                            </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </th>
						<!-- <tbody>


							<tr>
                                <td>

                                </td>

							</tr>

						</tbody> -->
					</table>


                    <br>

		        </div>
		    </div>
        </div>
</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')




<script type="text/javascript">
document.getElementById("menu-ese").style.display="block";
var mostrarValor = function(x){
        var p=document.getElementById('valcnt').value=x;


    };
    

	$(document).ready(function(){

        var dt=$('#cntC').val();
        // console.log(dt);
        $("#asp").append("<a href='{{ url('PlantillaClienteC') }}/"+dt+"' class='btn btn-inverse btn-icon btn-circle btn-lg' data-toggle='tooltip' data-placement='top' title='' data-original-title='Asignar Plantilla'><i class='fa fa-user-plus fa-1x' aria-hidden='true'></i></a><label>Asignar Plantilla</label>");

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
                title: 'Listado de Subgrupos',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Subgrupos',
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
                title: 'Listado de Subgrupos',
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

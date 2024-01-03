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
    
        <li><a href="javascript:;">Plantilla Cliente</a></li>

	        <li>Plantilla Cliente</li>

	</ol>

		<h1 class="page-header text-center">Plantilla Cliente</h1>


			<div class="row">
					<div class="col-md-12 text-right">

						<a href="{{ route('sig-erp-ese::PlantillaCliente.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Asignar Plantilla">
							<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
						</a>
						<label>Asignar Plantilla</label>
                        <a class="btn btn-inverse btn-icon btn-circle btn-lg"  data-placement="top" title="" data-original-title="Editar Plantilla"  id="btnEditarPlantilla">
                            <i class="fas fa-user-edit fa-1x" aria-hidden="true"></i>
                        </a>
                         <label>Editar Datos Generales Plantilla</label>
					</div>

                    <!-- <div class="col-md-2">

								<a href="{{url('Grupos')}}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nuevo Contenedor">
									<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
								</a>


						<label>Nuevo Contenedor</label>
					</div>

                    <div class="col-md-2">

								<a href="{{url('Subgrupos')}}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nuevo Agrupador">
									<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
								</a>


						<label>Nuevo Agrupador</label>
					</div>

                    <div class="col-md-2">

								<a href="{{url('Campos')}}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nuevo Campo">
									<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
								</a>


						<label>Nuevo Campo</label>
					</div>-->
				</div>
				<br>



				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
						<div class="panel-heading">
							<div class="panel-heading-btn">
							</div>

								<h4 class="panel-title">Plantilla Cliente</h4>

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

					<table id="data-table" class="display table table-striped table-bordered table-responsive">
						<thead>
						<tr>
                            <th>Cliente</th>
                            <th>Servicio</th>
							<th>Plantilla</th>
                            <th>Plantilla Cliente</th>
                            <th>Acción</th>
                            <th></th>
						</tr>
						</thead>
						<tbody>
                        @php
                            $i=0;
                        @endphp
						@foreach($plantillas as $p)
							<tr>
                                <td>{{ $p->Cliente }}</td>
                                <td>{{ $p->Servicio }}</td>
                                <td>{{ $p->Plantilla }}</td>
                                <td>{{ $p->NombrePlantillaCliente }}</td>
                                <td class="text-center">
									<a href="{{route('sig-erp-ese::PlantillaCliente.edit',$p->IdPlantillaCliente)}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp
										<input type="hidden"  value="{{ $p->IdPlantillaCliente }}" data-id="{{ $p->IdPlantillaCliente }}">

                                    {{ Form::open([ 'route' => ['sig-erp-ese::PlantillaCliente.destroy',
                                        $p->IdPlantillaCliente],
                                        'method' => 'DELETE',
                                        'class'  => 'pull-right'
                                        ]) }}

                                        <button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Registro">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    {{ Form::close()}}   

								</td>
                                <td><input type="checkbox" id="checkEditar_{{ $i=$i+1 }}" onclick="_checked(this.id)" data-IdPlantillaCliente="{{$p->IdPlantillaCliente}}"></td>
							</tr>
						@endforeach
						</tbody>
					</table>


		        </div>
		    </div>

            {{-- modal para editar los datos de la plantilla cliente--}}
            <div class="modal fade " id="EditarPlantilla" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>×</span>
                            </button>
                            <h4>Editar Plantilla Cliente</h4>
                        </div>
                        <form method="GET" action="{{ url('SaveDataPlantillaCliente')}}" id="form">
                            <div class="modal-body" >
                              <input name="IdPlantillaCliente" id="IdPlantillaCliente" type="hidden" value=""/>
                              <div class="row">
                                <div class="col-md-12">
                                  <label for="serv" class="col-form-label">Cliente:</label>
                                  <div class="input-group" >
                                    <input type="text" id="Nombrecliente" name="Nombrecliente" class="form-control"  disabled/>

                                        <span class="input-group-addon">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="serv" class="col-form-label">Servicio:</label>
                                    <div class="input-group" >
                                      <input type="text" id="Servicio" name="Servicio" class="form-control"  disabled/>
  
                                          <span class="input-group-addon">
                                              <i class="fa fa-bars"></i>
                                          </span>
                                      </div>
                                  </div>
                                <div class="col-md-12" id="container_tipos" >
                                  <label for="serv" class="col-form-label">Plantilla:</label>
                                    <div class="input-group" >
                                    <input type="text" id="NombrePlantilla" name="NombrePlantilla" class="form-control" disabled />
                                        <span class="input-group-addon">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                  <label for="DescP" class="col-form-label">Plantilla Cliente:</label>
                                    <div class="input-group" >
                                    <input type="text" id="NombrePlantillaCliente" name="NombrePlantillaCliente" class="form-control" required />
                                        <span class="input-group-addon">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                                <button id="Guardar" type="submit" class="btn btn-success" >Guardar</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>

</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
{!! Html::script('assets/js/sweetalert.min.js') !!}



<script type="text/javascript">
var nrows = 0; //variable para almacenar la cantidad de check marcados
var NameIdCheck;
var DataRow;
document.getElementById("menu-ese").style.display="block";
	$(document).ready(function(){
    	iniciarTabla();

    	$('[data-toggle="popover"]').popover({
    		delay: { "show": 500, "hide": 100 },
    		trigger:'focus'

    	});

    });
	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                extend: 'excelHtml5',
                title: 'Listado de Tipos de Plantillas',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Tipos de Plantillas',
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
                title: 'Listado de Tipos de Plantillas',
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


        function _checked(check){
            var table = $('#data-table').DataTable();
            var info = table.page.info();
            // se recorre la tabla para saber el numero de check chequeados
            for(var i=0; i <= (info.recordsTotal);i++){
                if( $(`#checkEditar_${i+1}`).prop('checked')){
                    nrows=nrows+1;
                }
            }   
            // cuando sea mas de 1 check chequeado se desmarcan 
            if(nrows > 1){
                _unchecked();  
                nrows=0;        
            }   
            // se chequea el ultimo seleccionado  
            $(`#${check}`).prop("checked", true);
            NameIdCheck = check;
        }
        // se desmarcan los check
        function _unchecked(){
            var table = $('#data-table').DataTable();
            var info = table.page.info();
            for(var i=0; i <= (info.recordsTotal);i++){
                if( $(`#checkEditar_${i+1}`).prop('checked')){
                    $(`#checkEditar_${i+1}`).prop("checked", false);
                }
            }
            NameIdCheck='';
        }
        // Se obtiene la info de la plantilla a editar
        $("#btnEditarPlantilla").on("click",function(){
            var checked=0;
            var table = $('#data-table').DataTable();
            var info = table.page.info();
            for(var i=0; i <= (info.recordsTotal);i++){
                if( $(`#checkEditar_${i+1}`).prop('checked')){
                    checked=checked+1;
                }
            }  
            if(checked == 0){
                swal('Seleccione la plantilla a editar');      
            }else{
                $("#IdPlantillaCliente").val("");
                $("#Nombrecliente").val("");
                $("#Servicio").val("");
                $("#NombrePlantilla").val("");
                $("#NombrePlantillaCliente").val("");
                $.ajax({
					url: '{{ url('GetDataPlantillaCliente') }}'+'/'+DataRow,
					type:'GET',
					success: function(response){
                       
                        $("#IdPlantillaCliente").val(response[0].IdPlantillaCliente);
                        $("#Nombrecliente").val(response[0].Cliente);
                        $("#Servicio").val(response[0].Servicio);
                        $("#NombrePlantilla").val(response[0].Plantilla);
                        $("#NombrePlantillaCliente").val(response[0].NombrePlantillaCliente);
                        
                        $('#EditarPlantilla').modal("show");
                        _unchecked();
                        nrows=0;
					}
                });
            }
        });
        // Se obtiene la info de la fila seleccionada
        $("#data-table tbody").click(function(e) {
            data = [];
            var table = $('#data-table').DataTable();
            var info = table.page.info();
            if(NameIdCheck != undefined && NameIdCheck != ''){
                DataRow=document.getElementById(`${NameIdCheck}`).dataset.idplantillacliente;
            }
         });
         $("#Guardar").on("click",function(){
            $("#Guardar").attr("disabled", "disabled");
            $("#form").submit();
         });
</script>

@endsection

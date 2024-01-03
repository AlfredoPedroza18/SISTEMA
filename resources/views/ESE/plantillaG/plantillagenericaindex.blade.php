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

        <li><a href="{{ route('sig-erp-ese::configuracion.index') }}">Configuraciones</a></li>

        <li><a href="javascript:;">Formato</a></li>



	        <li>Formato</li>



	</ol>



		<h1 class="page-header text-center">Formato</h1>

                <div class="row">

                    <div class="col-md-2">
                        <a href="{{url('Grupos')}}" class="btn btn-inverse btn-success btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Acceso a contenedor">
                            <i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
                        </a>
                        <label>Acceso a contenedor</label>
                    </div>



                    <div class="col-md-2">
                                <a href="{{url('Subgrupos')}}"  class="btn btn-inverse btn-success btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Acceso a Subgrupos">
                                    <i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>

                                </a>
                        <label>Acceso a Clasificaión</label>
                    </div>

                    <div class="col-md-5">
                                <a href="{{url('Campos')}}" class="btn btn-inverse btn-success btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Acceso a Campos">
                                    <i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
                                </a>
                        <label>Acceso a Campos</label>
                    </div>
                 
                    <div class="col-md-2">                                            </div>
                    <div class="col-md-2">                                            </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">                                            </div>
                    
                    
                    <div class="col-md-2">
                        <a class="btn btn-inverse btn-icon btn-circle btn-lg"  data-placement="top" title="" data-original-title="Editar Plantilla"  href="{{ url('PlantillaCliente') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index" viewBox="0 0 16 16">
                            <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 1 0 1 0V6.435a4.9 4.9 0 0 1 .106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 0 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.035a.5.5 0 0 1-.416-.223l-1.433-2.15a1.5 1.5 0 0 1-.243-.666l-.345-3.105a.5.5 0 0 1 .399-.546L5 8.11V9a.5.5 0 0 0 1 0V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z"/>
                        </svg>
                        </a>
                         <label>Plantillas-asinagción</label>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('sig-erp-ese::PlantillaGenericaP.create') }}" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Alta de Plantilla">
						    <i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
						</a>
						<label>Nueva Plantilla</label>
                    </div>
                </div>
				<br>







				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">

						<div class="panel-heading">

							<div class="panel-heading-btn">

							</div>



								<h4 class="panel-title">Plantilla Genérica </h4>



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

                            <th>Tipo de Servicio</th>

							<th>Plantilla</th>

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

                                <td>{{ $p->TipoServicio }}</td>

                                <td>{{ $p->DescripcionPlantilla }}</td>

                                <td class="text-center">

									<a href="{{route('sig-erp-ese::PlantillaGenericaP.edit',$p->IdPlantilla)}}" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro" data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil"></i></a>&nbsp&nbsp

										<input type="hidden"  value="{{ $p->IdPlantilla }}" data-id="{{ $p->IdPlantilla }}">



                                    {{ Form::open([ 'route' => ['sig-erp-ese::PlantillaGenericaP.destroy',

                                        $p->IdPlantilla],

                                        'method' => 'DELETE',

                                        'class'  => 'pull-right'

                                        ]) }}



                                        <button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Registro">

                                            <i class="fa fa-trash"></i>

                                        </button>

                                    {{ Form::close()}}

                                    
								</td>

                                <td><input type="checkbox" id="checkEditar_{{ $i=$i+1 }}" onclick="_checked(this.id)"  hidden>
                          
                                    <a  class="btn btn-icon btn-circle btn-configation"  data-placement="top" title="" data-original-title="Editar Plantilla"   onmouseover="io('{{ $i }}',1);" onclick="oi('{{ $i }}');">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                                        </svg>
                                    </a>
                                
                                </td>

							</tr>

                            

						@endforeach

						</tbody>

					</table>
		        </div>

		    </div>



            {{-- modal para editar los datos de la plantilla --}}

            <div class="modal fade " id="EditarPlantilla" data-backdrop="static" data-keyboard="false">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal">

                                <span>×</span>

                            </button>

                            <h4>Editar Plantilla</h4>

                        </div>

                        <form method="GET" action="{{ url('SaveDataPlantilla')}}" id="form">

                            <div class="modal-body" >

                              <input name="IdPlantilla" id="IdPlantilla" type="hidden" value=""/>

                              <div class="row">

                                <div class="col-md-12">

                                  <label for="serv" class="col-form-label">Servicio:</label>

                                  <div class="input-group" >

                                    <input type="text" id="TipoServicio" name="TipoServicio" class="form-control" required />



                                        <span class="input-group-addon">

                                            <i class="fa fa-bars"></i>

                                        </span>

                                    </div>

                                </div>

                                <div class="col-md-12" id="container_tipos" style="display:none;">

                                  <label for="serv" class="col-form-label">Tipo Servicio:</label>

                                    <div class="input-group" >

                                    <input type="text" id="Tipos" name="Tipos" class="form-control" required />

                                        <span class="input-group-addon">

                                            <i class="fa fa-bars"></i>

                                        </span>

                                    </div>

                                </div>

                                <div class="col-md-12">

                                  <label for="DescP" class="col-form-label">Descripcion Plantilla:</label>

                                    <div class="input-group" >

                                    <input type="text" id="DescripcionPlantilla" name="DescripcionPlantilla" class="form-control" required />

                                        <span class="input-group-addon">

                                            <i class="fa fa-bars"></i>

                                        </span>

                                    </div>

                                </div>

                                <input name="NombreArchivoH" id="NombreArchivoH" type="hidden" />

                                <div class="col-md-12">

                                    <label for="DescP" class="col-form-label">Nombre del archivo de la Plantilla:</label>

                                      <div class="input-group" >

                                      <input type="text" id="NombreArchivo" name="NombreArchivo" class="form-control" required />

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

	$(document).ready(function(){
      document.getElementById("menu-ese").style.display="block";
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

            for(var i=0; i < (info.recordsTotal);i++){

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

        // Se hace el request para obtener la info de la plantilla a editar


        $('#data-table').find('tr').mousedown ( function(){

        //($(this).index()+1 //obtiene el indice

        var row = $(this).closest("tr")[0];

        data = [];

        data.push(row.cells[0].innerHTML);

        data.push(row.cells[1].innerHTML);

        DataRow = data;

        console.log(DataRow);
        });
        
        
    
        function io(f,h){
            if(h==1){
                _checked("checkEditar_"+f);
            }
        }
        

        async function oi(f,h){
            
             
            var checked=0;
                
            var table = $('#data-table').DataTable();

            var info = table.page.info();

            for(var i=0; i < (info.recordsTotal);i++){

                if( $(`#checkEditar_${i+1}`).prop('checked')){

                    checked=checked+1;

                }

            }  

            if(checked == 0){

                swal('Seleccione la plantilla a editar');      

            }else{

             

    
                 $.ajax({

					url: '{{ url('GetDataPlantilla') }}'+'/'+DataRow[0]+'/'+DataRow[1],

					type:'GET',

					success: function(response){

                        $("#IdPlantilla").val(response[0].IdPlantilla);

                        $("#TipoServicio").val(response[0].TipoServicio);

                        if(response[0].Tipos != null){

                            $("#Tipos").val(response[0].Tipos);

                            $("#container_tipos").show();

                        }else{

                            $("#Tipos").val('');

                            $("#container_tipos").hide();  

                        }

                        $("#DescripcionPlantilla").val(response[0].DescripcionPlantilla);

                        if(response[0].NombreArchivo != null && response[0].NombreArchivo != ''){

                            $("#NombreArchivo").val(response[0].NombreArchivo);

                            $("#NombreArchivoH").val(response[0].NombreArchivo);

                            $("#NombreArchivo").attr("disabled", "disabled");

                        }else{

                            $("#NombreArchivo").val(response[0].NombreArchivo);

                            $("#NombreArchivoH").val(response[0].NombreArchivo);

                            $("#NombreArchivo").removeAttr("disabled");

                        }

                        

                        $('#EditarPlantilla').modal("show");

                        _unchecked();

                        nrows=0;

					}
                });
            
            }
        }

        // Se obtiene la info de la fila seleccionada

        $('#data-table').find('tr').click( function(){

            // $(this).index()+1 //obtiene el indice

            var row = $(this).closest("tr")[0];

            data = [];

            data.push(row.cells[0].innerHTML);

            data.push(row.cells[1].innerHTML);

            DataRow = data;

        });



         $("#Guardar").on("click",function(){

            $("#Guardar").attr("disabled", "disabled");

            $("#form").submit();

         });

</script>



@endsection


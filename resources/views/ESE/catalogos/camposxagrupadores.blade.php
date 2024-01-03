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
        table {
            table-layout:fixed;
        }
        table td {
            word-wrap: break-word;
            max-width: 500px;
        }
        #grid td {
            white-space:inherit;
        }
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
        <li><a href="javascript:;">Catálogos</a></li>

	        <li>Campos</li>

	</ol>


		<h1 class="page-header text-center">Campos</h1>


			    <div class="row">
					<div class="col-md-12 text-right">

								<a href="#" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="modal" data-target="#create" data-placement="top" title="" data-original-title="Alta de Campo">
									<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
								</a>

						<label>Nuevo Campo</label>
					</div>
				</div>

                <div class="modal fade" id="create">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>×</span>
                                </button>
                                <h4>Nuevo Campo</h4>
                            </div>
                            <form method="GET" action="{{url('GCampo')}}" >
                                <div class="modal-body">
                                        <label for="nombreA" class="col-form-label">Nombre:</label>
                                        <input type="text" id="nombrecampoC" name="nombrecampoC" class="form-control" required/>
                                        <input type="hidden"  id="cntC" name="cntC" value="{{ $cntC or '' }}">
                                        <label for="nombreA" class="col-form-label">Clasificación:</label>
                                        <input type="text" id="clasificacioncampoC" name="clasificacioncampoC" class="form-control" onblur="GCLasificacion();" required/>
                                        <div id="alertaClasificacion"></div>
                                        <label for="ordenA" class="col-form-label">Orden:</label>
                                        <input type="text" id="ordencampoC" name="ordencampoC" value="{{$ordencampoCC}}" class="form-control" required disabled="disabled"/>
                                        <input type="hidden" id="ordencampoCC" name="ordencampoCC" value="{{$ordencampoCC}}">


                                        <label for="nombreA" class="col-form-label">Formato:</label>
                                        <!-- <input type="text" id="formatocampo" name="formatocampo" class="form-control" required/> -->
                                        <select class="form-control" id="formC" name="formC" required >
                                            <option value="">Seleccione un Formato</option>
                                            @foreach($formatos as $f)
                                            <option value="{{ $f->Formato }}" >{{ $f->Formato}}</option>
                                            @endforeach
                                        </select>
                                        <label for="nombreA" class="col-form-label">Longitud:</label>
                                        <input type="text" id="longitudcampoC" name="longitudcampoC" class="form-control" required/>
                                        <label for="nombreA" class="col-form-label">Campo Nombre:</label>
                                        <input type="text" id="camponombreC" name="camponombreC" class="form-control" onKeyPress="if (event.keyCode == 32) event.returnValue = false;"  onblur="camponombreUQ();" required/>
                                        <div id="alerta"></div>
                                        <label for="nombreA" class="col-form-label">Cantidad Apariciones:</label>
                                        <input type="text" id="cantidadaparicionesC" name="cantidadaparicionesC" class="form-control" required/>
                                        <label for="nombreA" class="col-form-label">Dimensiones:</label>
                                        <input type="text" id="dimensionescampoC" name="dimensionescampoC" class="form-control" />
                                        <label for="nombreA" class="col-form-label">Items:</label>
                                        <input type="text" id="itemscampoC" name="itemscampoC" class="form-control" />
                                </div>
                                <div class="modal-footer">
                                    <!-- <input type="submit" class="btn btn-primary" value="Guardar"> -->
                                    <input type="submit" class="btn btn-success" id="GuardarCreateC" name="GuardarCreateC" value="Guardar" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="edit-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>×</span>
                                </button>
                                <h4>Editar Campo</h4>
                            </div>
                            <form id="form-impuesto-edit" method="GET" action="{{url('GuardarCampxA')}}" >

                                <div class="modal-body">
                                        <label for="nombreA" class="col-form-label">Nombre:</label>
                                        <input type="text" id="nombrecampo" name="nombrecampo" class="form-control" required/>
                                        <label for="nombreA" class="col-form-label">Clasificación:</label>
                                        <input type="text" id="clasificacioncampo" name="clasificacioncampo" class="form-control" readonly/>
                                        <div id="alertaClasificacion"></div>
                                        <!-- <label for="cntA" class="col-form-label">Agrupador:</label>
                                        <select class="form-control" id="cntE" name="cntE" required disabled="disabled">
                                        </select> -->
                                        <label for="ordenA" class="col-form-label">Orden:</label>
                                        <input type="text" id="ordencampo" name="ordencampo" class="form-control" required disabled="disabled"/>

                                        <label for="nombreA" class="col-form-label">Formato:</label>
                                        <select class="form-control" id="formE" name="formE" required >
                                        </select>
                                        <!-- <input type="text" id="formatocampo" name="formatocampo" class="form-control" required/> -->
                                        <label for="nombreA" class="col-form-label">Longitud:</label>
                                        <input type="text" id="longitudcampo" name="longitudcampo" class="form-control" required/>
                                        <label for="nombreA" class="col-form-label">Campo Nombre:</label>
                                        <input type="text" id="camponombre" name="camponombre" class="form-control" onKeyPress="if (event.keyCode == 32) event.returnValue = false;" onblur="camponombreUQEdit();" required/>
                                        <div id="alertaE"></div>
                                        <label for="nombreA" class="col-form-label">Cantidad Apariciones:</label>
                                        <input type="text" id="cantidadapariciones" name="cantidadapariciones" class="form-control" required/>
                                        <label for="nombreA" class="col-form-label">Dimensiones:</label>
                                        <input type="text" id="dimensionescampo" name="dimensionescampo" class="form-control" />
                                        <label for="nombreA" class="col-form-label">Items:</label>
                                        <input type="text" id="itemscampo" name="itemscampo" class="form-control" />
                                        <input type="hidden" id="IdEntrada" name="IdEntrada" value="">
                                        <input type="hidden" id="NombreCampoOrig" name="NombreCampoOrig" value="">
                                        <input type="hidden"  id="cnt" name="cnt" value="{{ $cnt or '' }}">
                                </div>
                                <div class="modal-footer">
                                    <!-- <input type="submit" class="btn btn-primary" value="Guardar"> -->
                                    <input type="submit" class="btn btn-success" id="GuardarEditarC" name="GuardarEditarC" value="Guardar" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
				<br>



				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>

								<h4 class="panel-title">Catálogo Campos</h4>

						</div>
		        <div class="panel-body">

                <div class="col-md-12">

                    <a href="{{  url('Campos') }}" class="btn btn-danger btn-xs">Regresar</a>
                    <form action="{{url('CamposxAgrupador')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group" >

                            <label>{{ Form::label('Agrupador', 'Agrupador:') }}</label>
                            <div class="input-group">

                                <select class="form-control" name="cnt" onchange="mostrarValor(this.value);" >
                                    <option value="">Seleccione un Agrupador</option>
                                    @foreach($agrupador as $c)
                                    <option value="{{ $c->IdAgrupador }}" @if ($cntC == $c->IdAgrupador) selected @endif >{{ $c->Etiqueta }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="valcnt" name="valcnt" value="">

                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
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





					<table  class="display table table-striped table-bordered table-responsive">
						<thead>
						<tr>
                            <th>Campo</th>
                            <th>Agrupador</th>
                            <th>Clasificación</th>
                            <th>Orden</th>
                            <th>Formato</th>
                            <th>Longitud</th>
                            <th>Campo Nombre</th>
                            <th>Dimensiones</th>
                            <th>Items</th>
							              <th>Acción</th>
                            <th></th>
						</tr>
						</thead>
						<tbody>

						@foreach($campos as $campo)
							<tr>
                                <td> <input type="hidden" id="idCamp" value="{{ $campo->IdEntrada }}">
                                  <input type="hidden" id="cmpoval" value="{{ $campo->Agrupador }}|{{ $campo->Clasificacion }}">
                                  {{ $campo->Etiqueta }}</td>
                                <td>{{ $campo->Agrupador }}</td>
                                <td>{{ $campo->Clasificacion }}</td>
                                <td id="ord">{{ $campo->Orden }}</td>
                                <td>{{ $campo->Formato }}</td>
                                <td>{{ $campo->Longitud }}</td>
                                <td>{{ $campo->CampoNombre }}</td>
                                <td>{{ $campo->Dimensiones }}</td>
                                <td>{{ $campo->Items }}</td>
                                <td class="text-center">
                                <a href="javascript:;" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro btn-edit-agrupador">
                                        <i class="fa fa-edit"></i>
                                        <input type="hidden" value="{{ $campo->IdEntrada }}" class="id-agrupador">
                                </a>
                                    {{ Form::open([ 'route' => ['sig-erp-ese::Campos.destroy',
                                        $campo->IdEntrada],
                                        'method' => 'DELETE',
                                        'class'  => 'pull-right'
                                        ]) }}

                                        <button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Registro">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    {{ Form::close()}}

								</td>
                <td> <span class='glyphicon glyphicon-chevron-up arriba'></span>  <span class='glyphicon glyphicon-chevron-down down abajo'> </span> <input class="form-control" type="number" id="num" value="{{ $campo->Orden }}"> </td>

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

    var getCampo = function( id_agrupador )
	{
        // alert(id_agrupador);
		$.ajax({
			url: "{{ url('CamposExA') }}" +"/"+ id_agrupador,
			type: "GET",
			dataType: "json",
			success: function( response )
			{
                // alert(response[7]);
                $('#edit-modal').modal('show');
                $("#cnt").val(response[0]);
                $("#formE").html(response[1]);
                $('#nombrecampo').val(response[2]);
                $('#ordencampo').val(response[3]);
                $('#IdEntrada').val(response[4]);
                $('#clasificacioncampo').val(response[5]);
                $('#longitudcampo').val(response[6]);
                $('#camponombre').val(response[7]);
                $('#cantidadapariciones').val(response[8]);
                $('#dimensionescampo').val(response[9]);
                $('#itemscampo').val(response[10]);
                $('#NombreCampoOrig').val(response[7]);

			},
			error : function(xhr, status)
			{
		    	console.error('Upss, algo salio mal!!');
		    }
		});
    }

    $('.btn-edit-agrupador').click(function(){
    		let index 		= $('.btn-edit-agrupador').index(this);
            let id_agrupador	= $( $('.id-agrupador').get( index ) ).val();
            // alert(id_agrupador);
    		getCampo( id_agrupador );
        });







	$(document).ready(function(){

      document.getElementById("menu-ese").style.display="block";
    	iniciarTabla();

    	$('[data-toggle="popover"]').popover({
    		delay: { "show": 500, "hide": 100 },
    		trigger:'focus'

        });

        $('#cnt').on('change',function(){
            var NomEmp = $(this).val();
        });

        $(document).on("click", ".arriba,.abajo", function(){
          var row = $(this).parents("tr:first");


         if ($(this).is(".arriba")) {

           let antes = row.find("#cmpoval").val();
           let des = row.prev().find("#cmpoval").val();

           if(antes==des){
             let antesOrd = row.find("#ord").text();
             let desOrd = row.prev().find("#ord").text();

             row.find("#ord").text(desOrd);
             row.prev().find("#ord").text(antesOrd);

             row.find("#num").val(desOrd);
             row.prev().find("#num").val(antesOrd);


             $.ajax({
                 // headers: {'X-CSRF-TOKEN':token},
                 url: '{{ url('reacomodar') }}',
                 type:'GET',
                 data: {Id:row.find("#idCamp").val(), IdDes:row.prev().find("#idCamp").val(),Valor:desOrd,ValorDes:antesOrd},
                 success: function(response){
                       // alert(response);
                   }
             });

             row.insertBefore(row.prev());
           }


         } else {

           let antes =row.find("#cmpoval").val();
           let des = row.next().find("#cmpoval").val();

           if(antes==des){
             let antesOrd = row.find("#ord").text();
             let desOrd = row.next().find("#ord").text();

             row.find("#ord").text(desOrd);
             row.next().find("#ord").text(antesOrd);

             row.find("#num").val(desOrd);
             row.next().find("#num").val(antesOrd);

             row.find("#idCamp").val();
             row.next().find("#idCamp").val();

             $.ajax({
                 // headers: {'X-CSRF-TOKEN':token},
                 url: '{{ url('reacomodar') }}',
                 type:'GET',
                 data: {Id:row.find("#idCamp").val(), IdDes:row.next().find("#idCamp").val(),Valor:desOrd,ValorDes:antesOrd},
                 success: function(response){
                     // alert(response);
                   }
             });
             row.insertAfter(row.next());
           }


         }


     });
});



	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                "order": [[ 2, "asc" ], [ 3, "asc" ]],
                                buttons: [
                                    {
                extend: 'excelHtml5',
                title: 'Listado de Campos',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Campos',
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
                title: 'Listado de Campos',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
             }

                                ],
                                responsive: true,
                                autoFill: true,

                                "paging": false,
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
<script>
  $( '#create' ).on( 'keypress', function( e ) {
        if( e.keyCode === 13 ) {
            e.preventDefault();
            $( this ).trigger( 'submit' );
        }
    } );

    $( '#edit-modal' ).on( 'keypress', function( e ) {
        if( e.keyCode === 13 ) {
            e.preventDefault();
            $( this ).trigger( 'submit' );
        }
    } );


function GCLasificacion(){
    var Ord = $("#cntC").val();
            var Clas = $("#clasificacioncampoC").val();
            if(Clas!=''){
                $("#GuardarCreateC").attr('disabled', true);
                $("#alertaClasificacion").html("");
                $.ajax({
                    url: "{{ url('CamposOrden') }}" +"/"+ Ord+"/"+ Clas,
                    type: "GET",
                    dataType: "json",
                    success: function( response )
                    {

                        $('#ordencampoC').val(response[0]);
                        $('#ordencampoCC').val(response[0]);
                         $("#GuardarCreateC").attr('disabled', false);
                    },
                    error : function(xhr, status)
                    {
                        console.error('Upss, algo salio mal!!');
                    }
		        });
            }else{
                $("#alertaClasificacion").html("<label style='color:#ffa100;'> <strong> Llenar el Campo Clasificación. </strong> </label>");
            }
}

// var camponombreUQ =function(){
    function camponombreUQ(){
            // var inputs = $("input[id=camponombreC]");
            // for(var i = 0; i < inputs.length; i++){
            // var aux = $(inputs[i]).val().trim();
            // $(inputs[i]).val(aux);
            // }

            datos = $("#camponombreC").val();
				// alert(datos);
                $.ajax({
                    // headers: {'X-CSRF-TOKEN':token},
                    url: '{{ url('ValidacionCampN') }}',
                    type:'GET',
                    data: {datos:datos},
                    success: function(response){

                        if(response>0){
                            $("#alerta").html("<label style='color:#ffa100;'> <strong> El Campo Nombre ya existe </strong> </label>");
                            document.getElementById("camponombreC").focus();
                            $("#GuardarCreateC").attr('disabled', true);
                        }else{
                            $("#alerta").html("");
                            $("#GuardarCreateC").attr('disabled', false);

                            }
                        }
                });
        }

        // var camponombreUQEdit =function(){
        function camponombreUQEdit(){
            // var inputs = $("input[id=camponombre]");
            // for(var i = 0; i < inputs.length; i++){
            // var aux = $(inputs[i]).val().trim();
            // $(inputs[i]).val(aux);
            // }

            datos = $("#camponombre").val();
            datoOrig = $("#NombreCampoOrig").val();
				// alert(datos);
                $.ajax({
                    // headers: {'X-CSRF-TOKEN':token},
                    url: '{{ url('ValidacionCampNEdit') }}',
                    type:'GET',
                    data: {datos:datos,datoOrig:datoOrig},
                    success: function(response){
                    //    alert(response[0]);
                        if(response>0){
                            $("#alertaE").html("<label style='color:#ffa100;'> <strong> El Campo Nombre ya existe </strong> </label>");
                            document.getElementById("camponombre").focus();
                            $("#GuardarEditarC").attr('disabled', true);
                        }else{
                            $("#alertaE").html("");
                            $("#GuardarEditarC").attr('disabled', false);

                            }
                        }
                });
        }



</script>

@endsection

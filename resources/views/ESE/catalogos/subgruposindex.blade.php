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
        <li><a href="javascript:;">Catálogos</a></li>

	        <li>Subgrupos</li>

	</ol>


		<h1 class="page-header text-center">Subgrupos</h1>


			    <div class="row">
					<div class="col-md-12 text-right">

                                <a href="#" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="modal" data-target="#create" data-placement="top" title="" data-original-title="Alta de Subgrupo">
									<i class="fa fa-user-plus fa-1x" aria-hidden="true"></i>
								</a>


						<label>Nuevo Subgrupo</label>
					</div>
				</div>

                <div class="modal fade" id="create">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>×</span>
                                </button>
                                <h4>Nuevo Agrupador</h4>
                            </div>
                            <form method="GET" action="{{url('GuardarAgrupador')}}">
                                <div class="modal-body">
                                        <label for="nombreA" class="col-form-label">Nombre:</label>
                                        <input type="text" id="nombreagrupadorC" name="nombreagrupador" class="form-control" required/>

                                        <label for="cntA" class="col-form-label">Contenedor:</label>
                                        <select class="form-control" id="cntC" name="cntC"  required >
                                            <option value="">Seleccione un Contenedor</option>
                                            @foreach($contenedor as $c)
                                            <option value="{{ $c->IdContenedor }}" >{{ $c->Etiqueta }}</option>
                                            @endforeach
                                        </select>
                                        <label for="ordenA" class="col-form-label">Orden:</label>
                                        <input type="text" id="ordenagrupadorC" name="ordenagrupador" value="{{$ordenAgrupadorA}}" class="form-control" required disabled="disabled"/>
                                        <input type="hidden" id="ordenAgrupadorA" name="ordenAgrupadorA" value="{{$ordenAgrupadorA}}">

                                </div>
                                <div class="modal-footer">
                                    <!-- <input type="submit" class="btn btn-primary" value="Guardar"> -->
                                    <input type="submit" class="btn btn-success" value="Guardar" />
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
                                <h4>Editar Agrupador</h4>
                            </div>
                            <form id="form-impuesto-edit" method="GET" action="{{url('GuardarAA')}}">

                                <div class="modal-body">
                                    <label for="nombreA" class="col-form-label">Nombre:</label>
                                    <input type="text" id="nombreagrupador" name="nombreagrupador" class="form-control" required/>

                                    <label for="cntA" class="col-form-label">Contenedor:</label>
                                    <select class="form-control" id="cntE" name="cntE"  required disabled="disabled">
                                    </select>
                                    <label for="ordenA" class="col-form-label">Orden:</label>
                                    <input type="text" id="ordenagrupador" name="ordenagrupador" class="form-control" required disabled="disabled"/>
                                    <input type="hidden" id="IdAgrupador" name="IdAgrupador" value="">
                                </div>
                                <div class="modal-footer">
                                    <!-- <input type="submit" class="btn btn-primary" value="Guardar"> -->
                                    <input type="submit" class="btn btn-success" value="Guardar" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

				<br>



				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
						<div class="panel-heading">
							<div class="panel-heading-btn">
							</div>

								<h4 class="panel-title">Catálogo Subgrupos</h4>

						</div>
		        <div class="panel-body">

                <div class="col-md-12">
                <a href="{{  url('PlantillaGenericaP') }}" id="regresar" class="btn btn-danger btn-xs">Regresar</a>
                    <form action="{{url('AgrupadoresxContenedor')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group" >
                            <label>{{ Form::label('Contenedor', 'Contenedor:') }}</label>
                            <div class="input-group">
                                <select class="form-control" name="cnt" onchange="mostrarValor(this.value);">
                                    <option>Seleccione un Contenedor</option>
                                    @foreach($contenedor as $c)
                                    <option value="{{ $c->IdContenedor }}" >{{ $c->Etiqueta }}</option>
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





					<table id="thisTable"  class="display table table-striped table-bordered table-responsive">
						<thead>
						<tr>

							<th>Agrupador</th>
                            <th>Contenedor</th>
                            <th>Orden</th>
							<th>Acción</th>
              <th></th>
						</tr>
						</thead>
						<tbody>

						@foreach($subgrupos as $subgrupo)
							<tr>

                                <td><input type="hidden" id="idCamp" value="{{ $subgrupo->IdAgrupador }}">
                                  <input type="hidden" id="cmpoval" value="{{ $subgrupo->Grupo }}">
                                  {{ $subgrupo->Etiqueta }}</td>
                                <td>{{ $subgrupo->Grupo }}</td>
                                <td id="ord">{{ $subgrupo->Orden }}</td>
								<td class="text-center">
                                    <a href="javascript:;" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro btn-edit-agrupador">
                                        <i class="fa fa-edit"></i>
                                        <input type="hidden" value="{{ $subgrupo->IdAgrupador }}" class="id-agrupador">
                                    </a>
                                    {{ Form::open([ 'route' => ['sig-erp-ese::Subgrupos.destroy',
                                        $subgrupo->IdAgrupador],
                                        'method' => 'DELETE',
                                        'class'  => 'pull-right'
                                        ]) }}
                                        <button type="submit" class="btn btn-danger btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Eliminar Registro">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    {{ Form::close()}}

								</td>
                <td> <span class='glyphicon glyphicon-chevron-up arriba'></span>  <span class='glyphicon glyphicon-chevron-down down abajo'> </span> <input class="form-control" type="number" id="num" value="{{ $subgrupo->Orden }}"> </td>

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
document.getElementById("menu-ese").style.display="block";
    var mostrarValor = function(x){
        var p=document.getElementById('valcnt').value=x;
    };

    var getAgrupador = function( id_agrupador )
	{

		$.ajax({
			url: "{{ url('AgrupadoresE') }}" +"/"+ id_agrupador,
			type: "GET",
			dataType: "json",
			success: function( response )
			{
                // alert(response[0]);
                $('#edit-modal').modal('show');
                $("#cntE").html(response[0]);
                $('#nombreagrupador').val(response[1]);
                $('#ordenagrupador').val(response[2]);
                $('#IdAgrupador').val(response[3]);

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

    		getAgrupador( id_agrupador );
    	});

  function valida(){
    var uant = document.referrer;
    var origin   = window.location.origin;
    var urlA   = uant.replace(origin,"");
  
        if (urlA.indexOf("/configuracion") > -1) {
            $("#regresar").css('display', 'none');
        }
  }


	$(document).ready(function(){
    	iniciarTabla();
      valida();
    	$('[data-toggle="popover"]').popover({
    		delay: { "show": 500, "hide": 100 },
    		trigger:'focus'

        });

        $('#cnt').on('change',function(){
            var NomEmp = $(this).val();

        });

        $('#cntC').on('change',function(){
            var Ord = $("#cntC").val();
            $.ajax({
                url: "{{ url('AgrupadoresOrden') }}" +"/"+ Ord,
                type: "GET",
                dataType: "json",
                success: function( response )
                {
                    $('#ordenagrupadorC').val(response[0]);
                    $('#ordenAgrupadorA').val(response[0]);
                },
                error : function(xhr, status)
                {
                    console.error('Upss, algo salio mal!!');
                }
		    });
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
                 url: '{{ url('reacomodarAgrupa') }}',
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
                 url: '{{ url('reacomodarAgrupa') }}',
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
            var data_table =$("#thisTable").DataTable({
                dom: 'lfrt',
                                responsive: true,
                                autoFill: true,
                                "ordering": false,
                                "language": {
                                "sSearch":         "Buscar:",
                                },
                                "paging": false,
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

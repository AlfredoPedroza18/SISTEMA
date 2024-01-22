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

    .popover{

        max-width:600px;

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

        <li><a href="javascript:;">Solicitar Servicio</a></li>



	        <li>Solicitar Servicio</li>



	</ol>





		<h1 class="page-header text-center">Solicitar Servicio</h1>



                <br>

				<div class="panel panel-inverse" data-sortable-id="ui-widget-14">

						<div class="panel-heading">

							<div class="panel-heading-btn">

								{{-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> --}}

							</div>



								<h4 class="panel-title">Solicitar Servicio</h4>



						</div>

		        <div class="panel-body onunload=''">



                    <div class="col-md-12">

                    <form id="changePC" action="{{url('ServiciosxCliente')}}" method="POST">

                        <!-- <form id="changePC"> -->

                            {{ csrf_field() }}

                            <div class="row">

                              <input type="hidden" id="valcnt" name="valcnt" value="">

                              <div class="col-sm-12">

                                  <h5 for="cntA" class="col-form-label">Cliente:</h5>

                              </div>

                              <div class="col-sm-12" id="select">

                                @if(Auth::user()->tipo=="c")
                                <select style="width:100%;" data-placeholder="Seleccione" class="chosen-select" tabindex="1" id="cntC" name="cntC" onchange="mostrarValor(this.value);" required disabled>

                                {{-- <select class="form-control" id="cntC" name="cntC"  onchange="mostrarValor(this.value);" required disabled> --}}

                                <!-- <option value="">Seleccione un Cliente</option> -->

                                    @foreach($clientes as $c)

                                        <option @if ($cntC == $c->IdCliente ) selected @endif value="{{ $c->IdCliente }}" >{{ $c->Nombre }} </option>

                                    @endforeach

                                </select>

                                @else

                                <select style="width:100%;" data-placeholder="Seleccione" class="chosen-select" tabindex="1" id="cntC" name="cntC" onchange="mostrarValor(this.value);" required>

                                    {{-- <select class="form-control" id="cntC" name="cntC"  onchange="mostrarValor(this.value);" required > --}}

                                        <!-- <option value="">Seleccione un Cliente</option> -->

                                            @foreach($clientes as $c)

                                                <option @if ($cntC == $c->IdCliente ) selected @endif value="{{ $c->IdCliente }}" >{{ $c->Nombre }} </option>

                                            @endforeach

                                    </select>
                                @endif
                              </div>

                            </div>

                            <br><br>



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

                        <div id="mensC"></div>



                        <table class="display table table-striped table-bordered table-responsive">

                            <thead>

                            <th>





                                @foreach($servicios as $p)



                                <div class="col-md-4 col-sm-6 animacion-modulos" >

                                    <div class="widget widget-stats" style="background: {{$p->Color}};">



                                        <div class="stats-icon stats-icon-lg"><i class="fa fa-1x fa-book"></i></div>



                                            <div class="stats-title" id="servicio" name="servicio">{{ $p->Descripcion }}



                                            @if($p->TotServ > 0)

                                              <input type="hidden" name="pendientes" id="pendientes{{$p->IdTipoServicio}}" value="{{$p->TotServ}}">

                                            <a href='ServClientes/{{$cntC}}/{{$p->IdTipoServicio}}'  data-toggle='tooltip' style="color:#FFFFFF;" data-placement='top' >Se tienen {{$p->TotServ}} servicio(s) pendiente(s).</a>

                                            @else

                                              <br>

                                              <br>

                                            @endif



                                            </div>

                                                    <br><br>

                                                    <div class="row">



                                                        <div class="stats-link col-md-12" >

                                                            <a href="javascript:;" class="stats-link col-md-6 icoRss text-center popovers" data-trigger="focus"

                                                            data-html="true"

                                                            data-container="body"

                                                            data-placement="bottom"

                                                            data-content="{{ $p->DescripcionServicioInfo }}"

                                                            data-original-title="<strong>{{$p->Descripcion }}</strong>">Información Serv <i class="fa fa-info-circle fa-sm"></i></a>

                                                            <a  class='stats-link col-md-15 seleccionar'  onclick="serv({{$p->IdTipoServicio }});">Seleccionar <i class='fa fa-arrow-circle-o-right'></i></a>



                                                        </div>



                                                    </div>

                                        </div>

                                    </div>

                                @endforeach

                            </th>

                        </table>



                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                          <div class="modal-dialog">

                            <div class="modal-content">

                              <div class="modal-header">

                                <h3 class="modal-title" id="staticBackdropLabel">Ordenes de Servicio Pendientes</h3>

                              </div>

                              <div class="modal-body" style="justify-content:center;">



                              </div>

                              <input type="hidden" name="IdTipo" id="IdTipo" value="">

                              <div class="modal-footer">

                                <button type="button" class="btn btn-primary continuar" id="btnContinuar" onclick="serv2(this.id);" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Espere...">Continuar y crear uno nuevo</button>

                                <button type="button" class="btn btn-danger" id="btnEliminar" onclick="elimina(this.id);" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Eliminando...">Eliminar y crear nuevo servicio</button>

                              </div>

                            </div>

                          </div>

                        </div>



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

    if(document.getElementById("menu-ese")){

        document.getElementById("menu-ese").style.display="block";

    }

    

    var mostrarValor = function(x){

        var p=document.getElementById('valcnt').value=x;

    };





    var clie='';

    $('#cntC').change(function() {

        clie=$('#cntC').val();

        $('#changePC').submit();

    });



    var serv= function(id){

        clie=$('#cntC').val();

        pendientes=$('#pendientes'+id).val();

        $("#IdTipo").val(id);

        if(pendientes){

           $(".modal-body").html("<h4> Se tienen "+pendientes+" servicio(s) pendiente(s).  ¿Que desea realizar? </h4>");

           $("#staticBackdrop").modal("show");

        }else{

          if(clie!=''){

              $(".seleccionar").attr('href', '{{ url("PlantillaClienteOS") }}/'+id+'/'+clie);

          }else{

              $('#mensC').html("<div class='alert alert-danger fade in m-b-15'></strong>  Favor de seleccionar un <strong>Cliente</strong> ya que es campo obligatorio.<span class='close' data-dismiss='alert'>×</span></div>");

          }

        }



        }


        var serv2= function(id){

        clie=$('#cntC').val();



        var ids=$("#IdTipo").val();



        if(clie!=''){

            //$(".seleccionar").attr('href', '{{ url("PlantillaClienteOS") }}/'+ids+'/'+clie);
            location.href ='{{ url("PlantillaClienteOS") }}/'+ids+'/'+clie;


        }else{

            $('#mensC').html("<div class='alert alert-danger fade in m-b-15'></strong>  Favor de seleccionar un <strong>Cliente</strong> ya que es campo obligatorio.<span class='close' data-dismiss='alert'>×</span></div>");

        }

        }




  function continuar(attrId){

    loaderButton(attrId,true);

    let id = $("#IdTipo").val();

    clie=$('#cntC').val();

    setTimeout(function(){

        location.href ="ServClientes/"+clie+"/"+id;

    },500);



  }



  function elimina(attrId){

    loaderButton(attrId,true);

    let idC=$('#cntC').val();

    let id = $("#IdTipo").val();

    // alert("elimina");

    $.ajax({

        url: "{{url('EliminaOSCliente')}}"+"/"+idC+"/"+id,

        type: "GET",

        success: function( response )

        {

          // alert(response);

          loaderButton(attrId,false);

          if(response == 'listo'){

            setTimeout(function(){

                location.href ="PlantillaClienteOS/"+id+"/"+idC;

            },500);

          }

        }

      });

  }



	$(document).ready(function(){

        var clie=$('#cntC').val();

        var pendientes=$('#pendientes').val();

    	iniciarTabla();



    	$('[data-toggle="popover"]').popover({

    		delay: { "show": 500, "hide": 100 },

    		trigger:'focus'



        });



        $("#select b").html("<i class='fa fa-chevron-down' aria-hidden='true'></i>");



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

   // funcion para que en el boton aparezca un loading.

   const loaderButton = (id,loading) => {

      if(loading){

        $(`#${id}`).button('loading');

      }else{

        $(`#${id}`).button('reset');

      }

    }

</script>



@endsection


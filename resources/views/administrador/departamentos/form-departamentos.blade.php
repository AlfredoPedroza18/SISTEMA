@extends('layouts.masterMenuView')

@section('section')



<div class="content">

<ol class="breadcrumb ">

        <li><a href="javascript:;">Administrador</a></li> 

		<li><a href="{{route('sig-erp-crm::departamentos.index')}}">Departamentos</a></li>

		<li>Alta Departamentos</li>

   </ol>

<h1 class="page-header text-center">Departamentos <small>Alta</small></h1>



	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">

                        <div class="panel-heading">

                            <div class="panel-heading-btn">

                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>

                            </div>

                            <h4 class="panel-title">Departamentos <small>Alta</small></h4>

                        </div>

                        <div class="panel-body">

                        <form id="form-alta-departamento">

                       

                          @include('administrador.departamentos.alta-departamento')

                        </form>

   </div>

 </div>

@endsection

@section('js-base')

@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<!-- ================== BEGIN PAGE LEVEL JS ================== --> 

	{!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}

	{!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}

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

	{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}

    {!! Html::script('assets/js/sweetalert.min.js') !!}

     {!! Html::script('assets/js/jquery.numeric.min.js') !!}
     {!! Html::script('assets/js/Format_telephone/format_telephone.js') !!}
     <script type="text/javascript">

     	

     	$(document).ready(function(){





$("#form-alta-departamento").on("submit",function(event){

	event.preventDefault();

	guardarCliente();



});







var guardarCliente = function(){

    	

        var datos = $("#form-alsta-departamento").serialize();

        var token = $('meta[name="csrf-token"]').attr('content');

        console.log(datos);

        $.ajax({

            headers: {'X-CSRF-TOKEN':token},

            url:'{{ url('departamentos') }}',

            type:'POST',

            dataType: 'json',

            data: datos,

            success: function(response){ 



                   swal(''+response.status_alta);

                    if(response.status_alta == 'success'){

                        swal({                                  

                                title: "<h3>¡ El registro se guardo con éxito !</h3> ",

                                html: true,

                                data: datos,

                                type: "success" 

                                                                               

                            });

                      setTimeout(function(){

                                    location.href = '{{ route("sig-erp-crm::departamentos.index") }}';

                                });

                    }else if(response.status_alta == 'wrong'){

                        swal({   

                                title: "<h3>¡ El registro NO se guardo con éxito !</h3> ",

                                html: true,

                                type: "warning",   

                                confirmButtonText: "OK"                                                 

                            });

                    }



                    //setTimeout(function(){     location.reload();   }, 1000);

                },

            error : function(jqXHR, status, error) {



                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

            }

        });

        

    }
});

  

//------------------------END Esté jquery  llena el select de colonias,estado municipio al darle clic SELECT DE CP   

//------------------------- END DIRECCION FISCAL -------------------------------------------------------------------



     </script>



    <script>

    function hacer_click_depto(valor){





    var datos = $("#form-alta-departamento").serialize();

    var token = $('meta[name="csrf-token"]').attr('content');

    console.log(datos);





    if(valor==0){

        $.ajax({

            headers: {'X-CSRF-TOKEN':token},

            url:'{{ url('departamentos') }}',

            type:'POST',

            dataType: 'json',

            data: datos,

            success: function(response){



                swal(''+response.status_alta);

                if(response.status_alta == 'success'){

                    swal({

                        title: "<h3>¡ El registro se guardo con éxito !</h3> ",

                        html: true,

                        data: datos,

                        type: "success"



                    });

                    setTimeout(function(){

                        location.href = '{{ route("sig-erp-crm::departamentos.index") }}';

                    });

                }else if(response.status_alta == 'wrong'){

                    swal({

                        title: "<h3>¡ El registro NO se guardo con éxito !</h3> ",

                        html: true,

                        type: "warning",

                        confirmButtonText: "OK"

                    });

                }



                //setTimeout(function(){     location.reload();   }, 1000);

            },

            error : function(jqXHR, status, error) {



                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

            }

        });



    }else{



        $.ajax({

            headers: {'X-CSRF-TOKEN':token},

            url:'{{ url('departamentos') }}',

            type:'PUT',

            dataType: 'json',

            data: datos,

            success: function(response){



                swal(''+response.status_alta);

                if(response.status_alta == 'success'){

                    swal({

                        title: "<h3>¡ El registro se guardo con éxito !</h3> ",

                        html: true,

                        data: datos,

                        type: "success"



                    });

                    setTimeout(function(){

                        location.href = '{{ route("sig-erp-crm::departamentos.index") }}';

                    });

                }else if(response.status_alta == 'wrong'){

                    swal({

                        title: "<h3>¡ El registro NO se guardo con éxito !</h3> ",

                        html: true,

                        type: "warning",

                        confirmButtonText: "OK"

                    });

                }



                //setTimeout(function(){     location.reload();   }, 1000);

            },

            error : function(jqXHR, status, error) {



                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

            }

        });

    }

    }

    function searchCP(){
		//$("#alerta-cp").html('<label style="color:#ff9100; font-size:18px;">	buscando Codigo Postal..</label>');
		var token = $('meta[name="csrf-token"]').attr('content');
		let cp = $("#searchcp").val();
		var datos;
		var colonias;
		var items;
		$.ajax({
			headers: {'X-CSRF-TOKEN':token},
			url:'{{ url('Empleados_search_cp') }}',
			type:'POST',
			dataType: 'json',
			data: {cp:cp},
			success: function(response){
				datos = response.result.split("|");
				
                
                $("#estado").val(datos[3]);
				$("#IdEstado").val(datos[2]);
				$("#IdPais").val(datos[1]);
				$("#Localidad").val(datos[7]);
				$("#municipio").val(datos[5]);

				$("#colonia option").remove();
				colonias = datos[8].split(";");
				for (var i = 0; i < colonias.length; i++) {
				items+='<option value="'+colonias[i]+'">'+colonias[i]+'</option>'
				}
				$("#colonia").prepend(items);
				//$("#alerta-cp").html('');
				// $.each(response.regiones, function(index, value){
				//     llenar(response.regiones, index, value);
				// });
			},
			error : function(jqXHR, status, error) {
				//$("#alerta-cp").html('');
			}
		});
	}
    </script>

@endsection
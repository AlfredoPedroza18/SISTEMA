@extends('layouts.masterMenuView')

@section('section')



<div id="content" class="content">



	<ol class="breadcrumb ">

		<li><a href="javascript:;">Administrador</a></li>

		<!-- <li><a href="{{ url('modulo/administrador/cuentas') }}">Cuentas</a></li> -->

		<li><a href="{{ url('modulo/administrador/usuarios/empleados') }}">Empleados</a></li>

		<li><a href="javascript:;">Alta Empleado</a></li>



	</ol>



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



				@if (Session::has('mensaje'))

					<div class="row">

			            	<div class="col-md-12">

			            		<div class="alert alert-{{ session('type') }} fade in m-b-15">

									 {{ session('mensaje') }}

									<span class="close" data-dismiss="alert">×</span>

								</div>

			            	</div>

			            </div>

				@endif

				@if (session('warning'))

                        <div class="row">

			            	<div class="col-md-12">

			            		<div class="alert alert-{{ session('type') }} fade in m-b-15">

									 {{ session('warning') }}

									<span class="close" data-dismiss="alert">×</span>

								</div>

			            	</div>

			            </div>

			        @endif



					{!! Form::open([

						'url' => 'modulo/administrador/usuarios/empleados','enctype'=>'multipart/form-data',

						'method' => 'post'])

					!!}

						<div class="profile-container">

			                <!-- begin profile-section -->

			                <div class="profile-section">

			                    <!-- begin profile-left -->

			                    <div class="profile-left animated bounceInLeft">

			                        <!-- begin profile-image -->

			                        <div class="profile-image"> 

										<!-- <i class="fa fa-user fa-2x"></i> -->

										<img src="assets/img/user-1.jpg" id="profile-Imagen" name="profile-Imagen" height="200">

										<input id="Imagen" name="Imagen" class="hidden" accept=".jpg, .jpeg" type="file" onchange="previewFile()" >

									</div>

			                        <!-- end profile-image -->

			                        <div class="m-b-10">

			                        	<div class="alert alert-info text-center fade in m-b-15">

											<strong>Perfil de usuario</strong>

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

			                            </div> --}}

			                        </div>

			                        <!-- end profile-highlight -->

			                    </div>







			                    <!-- end profile-left -->

			                    <!-- begin profile-right -->

			                    <div class="profile-right">

			                        <!-- begin profile-info -->

			                        <div class="profile-info">

			                          

		                         				@include('administrador.usuarios.user_empleado_formulario')

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
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
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
	{!! Html::script('assets/js/Format_telephone/format_telephone.js') !!}

<script type="text/javascript">



$(function() {

	$("#empresatr").show();

	$("#personaltr").hide();

	$("#valida").val(0);

	$("#CodigoPersonaltr").show();

	$("#Nombretr").show();

	$("#APaternotr").show();

	$("#AMaternotr").show();

	$("#Exttr").show();

	$('#Exttr').attr('required', true);

	$("#Moviltr").show();

	$("#Oficinatr").show();

	$("#Emailtr").show();

	$("#Sexotr").show();

	$("#FechaNactr").show();

	$("#CodPostaltr").show();

	$("#Estadotr").show();

	$("#Municipiotr").show();

	$("#Coloniatr").show();

	$("#Calletr").show();

	$("#RFCtr").show();

	$("#CURPtr").show();

	$("#NSStr").show();



	$('#Nombretr').attr('required', true);



    $('#Activo').change(function() {

		if ($(this).is(":checked")) {

    // $("#empresatr").show();

		$("#personaltr").show();

		$("#valida").val(1);

		$("#CodigoPersonaltr").hide();

		$("#Nombretr").hide();

		$('#Nombretr').attr('required', false);

		$("#APaternotr").hide();

		$("#AMaternotr").hide();

		$("#Exttr").hide();

		$('#Exttr').attr('required', false);

		$("#Moviltr").hide();

		$("#Oficinatr").hide();

		$("#Emailtr").hide();

		$("#Sexotr").hide();

		$("#FechaNactr").hide();

		$("#CodPostaltr").hide();

		$("#Estadotr").hide();

		$("#Municipiotr").hide();

		$("#Coloniatr").hide();

		$("#Calletr").hide();

		$("#RFCtr").hide();

		$("#CURPtr").hide();

		$("#NSStr").hide();

		// $("#Guardar").attr('disabled', false);

    } else {

    // $("#empresatr").show();

		$("#personaltr").hide();

		$("#valida").val(0);

		$("#CodigoPersonaltr").show();

		$("#Nombretr").show();

		$('#Nombretr').attr('required', true);

		$("#APaternotr").show();

		$("#AMaternotr").show();

		$("#Exttr").show();

		$('#Exttr').attr('required', true);

		$("#Moviltr").show();

		$("#Oficinatr").show();

		$("#Emailtr").show();

		$("#Sexotr").show();

		$("#FechaNactr").show();

		$("#CodPostaltr").show();

		$("#Estadotr").show();

		$("#Municipiotr").show();

		$("#Coloniatr").hide();

		$("#Calletr").show();

		$("#RFCtr").show();

		$("#CURPtr").show();

		$("#NSStr").show();

		// $("#Guardar").attr('disabled', true);

    }

    });



  });



  function exisus(e) {



var username = $("#username").val();



$.ajax({

	type: "get",

	data: {username:username,'_token':'{{csrf_token()}}'},

	 dataType:'json',

	url: "{{ url('existeUs/{datos}') }}",

		success:function(data){

			$("#msg").show();

			$("#msg2").hide();

			$('#msg').html(data).fadeIn('slow');

			 $('#msg').delay(2000).fadeOut('slow');

			 if(data == '<b>El usuario ya existe. Ingrese uno distinto.</b>'){



				// $("#Departamentotr").hide();

				// $("#Permisostr").hide();

				// $("#Puestotr").hide();

				// $("#DatosPtr").hide();

				// $("#empresatr").hide();

				// $("#Activo").attr('checked', false);

				// $("#valida").val(0);



				// // $("#personaltr").hide();

				// $("#Sexotr").hide();

				// $("#FechaNactr").hide();

				// $('#Exttr').attr('required', false);

				// // $("#Firmatr").hide();

				// $("#Usuariotr").show();

				// $("#Passwordtr").hide();

				// $("#Nombretr").hide();

				// $("#APaternotr").hide();

				// $("#AMaternotr").hide();

				// $("#Moviltr").hide();

				// $("#Oficinatr").hide();

				// $("#Exttr").hide();

				// $("#Emailtr").hide();

				// $("#CURPtr").hide();

				// $("#Guardar").attr('disabled', true);



			}



		 },

		error: function (xhr, error) {

				// $("#Departamentotr").show();

				// $("#Permisostr").show();

				// $("#Puestotr").show();

				$("#msg").hide();

				$("#msg2").show();

				$('#msg2').html('<b>Disponible</b>').fadeIn('slow');

			    $('#msg2').delay(2000).fadeOut('slow');

				$("#DatosPtr").show();

				$("#empresatr").show();

				// $("#personaltr").show();



				// $("#personaltr").hide();

				// $("#Sexotr").show();

				// $("#FechaNactr").show();

				// $('#Exttr').attr('required', true);

				// // $('#FechaNactr').attr('required', false);

				// $("#Firmatr").show();

				// $("#Usuariotr").show();

				// $("#Passwordtr").show();

				// $("#Nombretr").show();

				// $("#APaternotr").show();

				// $("#AMaternotr").show();

				// $("#Moviltr").show();

				// $("#Oficinatr").show();

				// $("#Exttr").show();

				// $("#Emailtr").show();

				// $("#CURPtr").show();

				// $("#Guardar").attr('disabled', true);

},



});

}



function previewFile() {

  var preview = document.querySelector('img[name="profile-Imagen"]');

  var file    = document.querySelector('input[name=Imagen]').files[0];

  var reader  = new FileReader();



  reader.addEventListener("load", function () {

    preview.src = reader.result;

  }, false);



  if (file) {

    reader.readAsDataURL(file);

  }

}



$(function() {

	$('#profile-Imagen').on('click', function() {

		$('#Imagen').click();

	});

});

        





function exisem(e) {



var email = $("#email").val();

$.ajax({

type: "get",

data: {email:email,'_token':'{{csrf_token()}}'},

 dataType:'json',

url: "{{ url('existeEm/{datos}') }}",

success:function(data){

	$("#msge").show();

	$("#msge2").hide();

	$('#msge').html(data).fadeIn('slow');

	$('#msge').delay(2000).fadeOut('slow');

	// $("#Guardar").attr('disabled', true);



	},

		error: function (xhr, error) {

		$("#msge").hide();

		$("#msge2").show();

		$('#msge2').html('<b>Disponible</b>').fadeIn('slow');

		$('#msge2').delay(2000).fadeOut('slow');

	// $("#btnGdiv").attr('disabled', false);

	// $confirmButton.prop('disabled', false);

},

});

}



function exiscurp(e) {



var Curp = $("#Curp").val();

$.ajax({

type: "get",

data: {Curp:Curp,'_token':'{{csrf_token()}}'},

 dataType:'json',

url: "{{ url('existeCurp/{datos}') }}",

success:function(data){

	$("#msgc").show();

	$("#msgc2").hide();

	$('#msgc').html(data).fadeIn('slow');

	 $('#msgc').delay(2000).fadeOut('slow');

	//  $("#Guardar").attr('disabled', true);



	},

		error: function (xhr, error) {

		$("#msgc").hide();

		$("#msgc2").show();

		$('#msgc2').html('<b>Disponible</b>').fadeIn('slow');

		$('#msgc2').delay(2000).fadeOut('slow');

	// $("#Guardar").attr('disabled', false);

},

});

}



 $('#empresa').on('change', function(){

	 var dat = $('#empresa').val();

	 $.ajax({

	 type: "get",

	 data: {'_token': '{{csrf_token()}}',id:dat},

	 url: "{{ url('empleados/select') }}",

	 success:function(data){

		   $('#personals').html(data);

		   //alert(data);

	 	}

		});

});



	$(document).ready(function(){

    	// $('.telefono').numeric();



		// // $("#Departamentotr").hide();

		// // $("#Permisostr").hide();

		// $("#DatosPtr").hide();

		// $("#empresatr").hide();

		// $("#personaltr").hide();

		// $("#Activo").attr('checked', false);

		// $("#valida").val(0);

		// // $("#personaltr").hide();

		// $("#Sexotr").hide();

		// $("#FechaNactr").hide();

		// $('#Exttr').attr('required', true);

		// 			// $('#FechaNactr').attr('required', false);

		// // $("#Firmatr").hide();

		// $("#Usuariotr").show();

		// $("#Passwordtr").hide();

	    // $("#Nombretr").hide();

		// $("#APaternotr").hide();

		// $("#AMaternotr").hide();

		// $("#Moviltr").hide();

		// $("#Oficinatr").hide();

		// $("#Exttr").hide();

		// $("#Emailtr").hide();

		// $("#CURPtr").hide();

		// $("#Guardar").attr('disabled', true);



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


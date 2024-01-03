@extends('layouts.masterMenuView')

@section('section')



<div id="content" class="content">



	<ol class="breadcrumb ">

		<li><a href="javascript:;">Administrador</a></li>	

		<!-- <li><a href="{{ url('modulo/administrador/cuentas') }}">Cuentas</a></li> -->

		<li><a href="{{ url('modulo/administrador/usuarios/clientes') }}">Clientes</a></li>

		<li><a href="javascript:;">Alta Cliente</a></li>

		

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

			                          {!! Form::open([

			                           				'url' => 'modulo/administrador/usuarios/clientes',

			                           				'method' => 'post'])				                  

					                  !!}

		                         				@include('administrador.usuarios.user_cliente_formulario')

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



$(function() {

	// $("#codigotr").show();

	// $('#codigotr').attr('required', true);

	// $("#clientetr").hide();

	// $("#valida").val(0);

	// $("#Puestotr").show();

	// $("#Sexotr").show();

	// $("#FechaNactr").show();

	// $("#Nombretr").show();

	// $("#APaternotr").show();

	// $("#AMaternotr").show();

	// $("#activotr").show();

	// // $("#empresatr").show();

	// // $('#empresatr').attr('required', true);

	// $("#rfctr").show();

	// $('#rfctr').attr('required', true);

	// $("#razonsocialtr").show();

	// $("#calletr").show();

	// $("#exteriortr").show();

	// $("#interiortr").show();

	// $("#codigopostaltr").show();

	// $("#estadotr").show();

	// $("#municipiotr").show();

	// $("#coloniatr").show();

	// $("#Oficinatr").show();

	// $("#Oficina2tr").show();

	// $("#Moviltr").show();

	// $("#Movil2tr").show();

	// $("#Exttr").show();

	// $("#Ext2tr").show();

	// $("#paginawebtr").show();

	// $("#NombreComercialtr").show();

	// $('#nombre_comercial').attr('required', true);

	// $("#Emailtr").show();

	// $('#email').attr('required', true);

	// $('#telefono_oficina').attr('required', true);

	// $("#Email2tr").show();

	// $("#Contactotr").show();

	



	// $('#Nombretr').attr('required', true);

	$("#DatosPtr").hide(); 

			$("#codigotr").hide();

			$('#codigotr').attr('required', false);

			$("#clientetr").show();

			$("#valida").val(1);

			$("#activotr").hide();

			$("#Puestotr").hide();

			$("#Sexotr").hide();

			$("#FechaNactr").show();

			$("#Nombretr").hide();

			$("#APaternotr").hide();

			$("#AMaternotr").hide();

			// $("#empresatr").hide();

			// $('#empresatr').attr('required', false);

			$("#rfctr").hide();

			$('#rfctr').attr('required', false);

			$("#razonsocialtr").hide();

			$("#calletr").hide();

			$("#exteriortr").hide();

			$("#interiortr").hide();

			$("#codigopostaltr").hide();

			$("#estadotr").hide();

			$("#municipiotr").hide();

			$("#coloniatr").hide();

			$("#Oficinatr").show();

			// $("#Oficinatr").hide();

			$("#Oficina2tr").hide();

			$("#Moviltr").hide();

	        $("#Movil2tr").hide();

			$("#Exttr").hide();

			$("#Ext2tr").hide();

			$("#paginawebtr").hide();

			$("#NombreComercialtr").hide();

			$('#nombre_comercial').attr('required', false);

			$('#cliente').attr('required', true);

			// $("#Emailtr").hide();

			// $('#email').attr('required', false);

			// $('#telefono_oficina').attr('required', false);

			$("#Emailtr").show();

			$('#email').attr('required', true);

			$('#telefono_oficina').attr('required', true);

			$("#Email2tr").hide();

			$("#Contactotr").show();

			// $("#Guardar").attr('disabled', false);

    $('#ActC').change(function() {

		$("#DatosPtr").hide(); 

		if ($(this).is(":checked")) {

			$("#codigotr").hide();

			$('#codigotr').attr('required', false);

			$("#clientetr").show();

			$("#valida").val(1);

			$("#activotr").hide();

			$("#Puestotr").hide();

			$("#Sexotr").hide();

			$("#FechaNactr").show();

			$("#Nombretr").hide();

			$("#APaternotr").hide();

			$("#AMaternotr").hide();

			// $("#empresatr").hide();

			// $('#empresatr').attr('required', false);

			$("#rfctr").hide();

			$('#rfctr').attr('required', false);

			$("#razonsocialtr").hide();

			$("#calletr").hide();

			$("#exteriortr").hide();

			$("#interiortr").hide();

			$("#codigopostaltr").hide();

			$("#estadotr").hide();

			$("#municipiotr").hide();

			$("#coloniatr").hide();

			$("#Oficinatr").hide();

			$("#Oficina2tr").hide();

			$("#Moviltr").hide();

	        $("#Movil2tr").hide();

			$("#Exttr").hide();

			$("#Ext2tr").hide();

			$("#paginawebtr").hide();

			$("#NombreComercialtr").hide();

			$('#nombre_comercial').attr('required', false);

			$('#cliente').attr('required', false);

			$("#Emailtr").hide();

			$('#email').attr('required', false);

			$('#telefono_oficina').attr('required', false);

			$("#Email2tr").hide();

			$("#Contactotr").show();

			// $("#Guardar").attr('disabled', false);

    } else {

		$("#DatosPtr").hide(); 

			$("#codigotr").hide();

			$('#codigotr').attr('required', false);

			$("#clientetr").show();

			$("#valida").val(1);

			$("#activotr").hide();

			$("#Puestotr").hide();

			$("#Sexotr").hide();

			$("#FechaNactr").show();

			$("#Nombretr").hide();

			$("#APaternotr").hide();

			$("#AMaternotr").hide();

			// $("#empresatr").hide();

			// $('#empresatr').attr('required', false);

			$("#rfctr").hide();

			$('#rfctr').attr('required', false);

			$("#razonsocialtr").hide();

			$("#calletr").hide();

			$("#exteriortr").hide();

			$("#interiortr").hide();

			$("#codigopostaltr").hide();

			$("#estadotr").hide();

			$("#municipiotr").hide();

			$("#coloniatr").hide();

			$("#Oficinatr").hide();

			$("#Oficina2tr").hide();

			$("#Moviltr").hide();

	        $("#Movil2tr").hide();

			$("#Exttr").hide();

			$("#Ext2tr").hide();

			$("#paginawebtr").hide();

			$("#NombreComercialtr").hide();

			$('#nombre_comercial').attr('required', false);

			$('#cliente').attr('required', false);

			$("#Emailtr").hide();

			$('#email').attr('required', false);

			$('#telefono_oficina').attr('required', false);

			$("#Email2tr").hide();

			$("#Contactotr").show();

			// $("#Guardar").attr('disabled', false);

    }

    });



  })



function exiscl(e) {



var cliente = e.options[e.selectedIndex].value;



$.ajax({

	type: "get",

	data: {cliente:cliente,'_token':'{{csrf_token()}}'}, 

	 dataType:'json',

	url: "{{ url('existeCl/{datos}') }}",

		success:function(data){

			// alert(data);

			$("#msgcl").show();

			$("#msgcl2").hide();

			$("#msgcl").html("<label style='color:#ffa100;'> <strong> Este cliente ya esta dado de alta. Seleccione uno distinto. </strong> </label>");

	        document.getElementById("cliente").focus();

			// $('#msgcl').html(data).fadeIn('slow');

			//  $('#msgcl').delay(500).fadeOut('slow');

			 if(data == '<b>Este cliente ya esta dado de alta. Seleccione uno distinto.</b>'){

				$("#Guardar").attr('disabled', true);	

			} 

		

		 },

		error: function (xhr, error) {

			$("#msgcl").hide();

				$("#msgcl2").show();

				$("#msgcl2").html("<label style='color:#ffa100;'> <strong> Disponible </strong> </label>");

	            

				// $('#msgcl2').html('<b>Disponible</b>').fadeIn('slow');

				// $('#msgcl2').delay(500).fadeOut('slow');

				$("#Guardar").attr('disabled', false);

			},



	});

}



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

			$("#msg").html("<label style='color:#ffa100;'> <strong> El usuario ya existe. Ingrese uno distinto. </strong> </label>");

	        document.getElementById("username").focus();

			// $('#msg').html(data).fadeIn('slow');

			//  $('#msg').delay(500).fadeOut('slow');

			 if(data == '<b>El usuario ya existe. Ingrese uno distinto.</b>'){



				// $("#Departamentotr").hide();

				// $("#Permisostr").hide();

				// $("#Puestotr").hide();

				$("#DatosPtr").hide(); 

				$("#empresatr").hide();

				$("#Activo").attr('checked', false);

				// $("#valida").val(0);

				

				// $("#personaltr").hide();

				$("#Sexotr").hide();

				$("#FechaNactr").hide();

				$('#Exttr').attr('required', false);

				// $("#Firmatr").hide();

				$("#Usuariotr").show();

				$("#Passwordtr").hide();

				$("#Nombretr").hide();

				$("#APaternotr").hide();

				$("#AMaternotr").hide();

				$("#Moviltr").hide();

				// $("#Oficinatr").hide();

				$("#Exttr").hide();

				// $("#Emailtr").hide();

				$("#CURPtr").hide();

				// $("#Guardar").attr('disabled', true);

				

			} 

		

		 },

		error: function (xhr, error) {

			var valid = $("#valida").val();

				// $("#Departamentotr").show();

				// $("#Permisostr").show();

				// $("#Puestotr").show();

				$("#msg").hide();

				$("#msg2").show();

				$("#msg2").html("<label style='color:#ffa100;'> <strong> Disponible </strong> </label>");

				// $("#Guardar").attr('disabled', false);

				// $('#msg2').html('<b>Disponible</b>').fadeIn('slow');

			    // $('#msg2').delay(500).fadeOut('slow');

				$("#DatosPtr").show();

				$("#empresatr").show();

				// $("#personaltr").show();

				

				// $("#personaltr").hide();

				$("#codigotr").show();

				$('#codigotr').attr('required', true);

				if(valid==0){

					$("#clientetr").hide();

				}

				

				// $("#valida").val(0);

				$("#Puestotr").show();

				$("#Sexotr").show();

				$("#FechaNactr").show();

				$("#Nombretr").show();

				$("#APaternotr").show();

				$("#AMaternotr").show();

				$("#activotr").show();

			

				// $("#Oficinatr").show();

				$("#Oficina2tr").show();

				$("#Moviltr").show();

				$("#Movil2tr").show();

				$("#Exttr").show();

				$("#Ext2tr").show();

				// $("#Emailtr").show();

				$("#Email2tr").show();

				$("#Contactotr").show();

				// $("#Guardar").attr('disabled', true);

				$("#DatosPtr").hide(); 

				$("#Passwordtr").show();

},



});

}



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

	$("#msge").html("<label style='color:#ffa100;'> <strong> El correo ya existe </strong> </label>");

	document.getElementById("email").focus();

	// $('#msge').html(data).fadeIn('slow');

	// $('#msge').delay(200).fadeOut('slow');

	// $("#Guardar").attr('disabled', true);



	},

		error: function (xhr, error) {

		$("#msge").hide();

		$("#msge2").show();

		$("#msge2").html("<label style='color:#ffa100;'> <strong> Disponible </strong> </label>");

	   

		// $('#msge2').html('<b>Disponible</b>').fadeIn('slow');

		// $('#msge2').delay(200).fadeOut('slow');

		// $("#Guardar").attr('disabled', false);

	// $("#btnGdiv").attr('disabled', false);

	// $confirmButton.prop('disabled', false);

},

});

}



	$(document).ready(function(){

    	$('.telefono').numeric();



    // $("#codigotr").hide();

	// $('#codigotr').attr('required', true);

	// $("#clientetr").hide();

	// $("#valida").val(0);

	// $("#Puestotr").hide();

	// $("#Sexotr").hide();

	// $("#FechaNactr").hide();

	// $("#Nombretr").hide();

	// $("#APaternotr").hide();

	// $("#AMaternotr").hide();

	// $("#activotr").hide();

	// $("#empresatr").hide();

	// $('#empresatr').attr('required', true);

	// $("#rfctr").hide();

	// $('#rfctr').attr('required', true);

	// $("#razonsocialtr").hide();

	// $("#calletr").hide();

	// $("#exteriortr").hide();

	// $("#interiortr").hide();

	// $("#codigopostaltr").hide();

	// $("#estadotr").hide();

	// $("#municipiotr").hide();

	// $("#coloniatr").hide();

	// $("#Oficinatr").hide();

	// $("#Oficina2tr").hide();

	// $("#Moviltr").hide();

	// $("#Movil2tr").hide();

	// $("#Exttr").hide();

	// $("#Ext2tr").hide();

	// $("#paginawebtr").hide();

	// $("#Emailtr").hide();

	// $("#Email2tr").hide();

	// $("#Contactotr").hide();

	// $("#Guardar").attr('disabled', true);

	// $("#DatosPtr").hide(); 

	// $("#Passwordtr").hide();

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
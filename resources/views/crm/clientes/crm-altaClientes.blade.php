@extends('layouts.masterMenuView')

@section('section')



<div id="content" class="content">

	<ol class="breadcrumb ">



		<li><a href="{{route('sig-erp-crm::clientes.index')}}">Clientes/Prospectos</a></li>

		<li>Alta</li>



	</ol>



	<h1 class="page-header text-center">CLIENTES/PROSPECTOS <small>Alta</small></h1>









     <!-- begin row -->

			<div class="row">

                <!-- begin col-12 -->

			    <div class="col-md-12">

			        <!-- begin panel -->

                    <div class="panel panel-inverse">

                        <div class="panel-heading">



                            <h4 class="panel-title">Formulario de Alta de Clientes</h4>

                        </div>

                        <div class="panel-body">



                            <form method="POST" action="{{url('clientes/crear')}}">

                          @include('crm.clientes.form_clientes_new')

                            </form>



                </div>

              </div>

            <!-- end panel -->

        </div>

        <!-- end col-12 -->

    </div>

    <!-- end row -->





</div><!-- End content-->
@include('crm.clientes.plantillas.plantilla-form')
@endsection
@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <!--{!! Html::script('assets/plugins/parsley/dist/parsley.js')!!}-->
	{!! Html::script('assets/plugins/bootstrap-wizard/js/bwizard.js')!!}
	{!! Html::script('assets/js/form-wizards.demo.min.js')!!}
    {!! Html::script('assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js')!!}
    {!! Html::script('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')!!}
    {!! Html::script('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')!!}
    {!! Html::script('assets/plugins/password-indicator/js/password-indicator.js')!!}
    {!! Html::script('assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js')!!}
    {!! Html::script('assets/plugins/bootstrap-select/bootstrap-select.min.js')!!}
    {!! Html::script('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')!!}
    {!! Html::script('assets/plugins/jquery-tag-it/js/tag-it.min.js')!!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/moment.js')!!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
    {!! Html::script('assets/plugins/masked-input/masked-input.min.js')!!}
    {!! Html::script('assets/plugins/select2/dist/js/select2.min.js')!!}
    {!! Html::script('assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js')!!}
    {!! Html::script('assets/js/form-plugins.demo.min.js')!!}
	  {!! Html::script('assets/js/apps.min.js')!!}
    {!! Html::script('assets/js/sweetalert.min.js') !!}
    {!! Html::script('assets/js/jquery.numeric.min.js') !!}
    
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<!-- ================== END PAGE LEVEL JS ================== -->
<script type="text/javascript">

FormWizard.init();// WIZARD DEL FORMULARIO

FormPlugins.init();

function validarDatosCliente(){



}



$(function() {

  $("#DatosPtr").hide();

	$("#empresatr").hide();

	$("#personaltr").hide();

	$("#valida").val(0);

  $("#NombreComercialtr").show();

  // $('#NombreComercialtr').attr('required', true);

  $('#nombre_comercial').attr('required', true);

  $('#nombre_con').attr('required', true);

  $('#apellido_paterno_con').attr('required', true);

  $('#apellido_materno_con').attr('required', true);

  $('#telefono1').attr('required', true);

	$("#FormaJuridicatr").show();

	// $("#RazonSocialtr").hide();

	// $("#curp-nombre").show();

	// $("#curp-apellido_paterno").show();

	// $('#Exttr').attr('required', true);

	$("#RFCtr").show();

	$("#ActividadEtr").show();

	$("#Statustr").show();

	$("#ClaseRTtr").show();

  $("#RegistroPatronaltr").show();

  $("#TDirFisctr").show();

	$("#CPFtr").show();

	$("#EstadoFtr").show();

	$("#MunicipioFtr").show();

	$("#ColoniaFtr").show();

	$("#CalleFtr").show();

	$("#NumEFtr").show();

  $("#NumIFtr").show();

  $("#TDirComctr").show();

	$("#CPCtr").show();

	// $('#Nombretr').attr('required', true);

  $("#EstadoCtr").show();

	$("#MunicipioCtr").show();

	$("#ColoniaCtr").show();

	$("#CalleCtr").show();

	$("#NumECtr").show();

  $("#NumICtr").show();

  $("#TContactotr").show();

  $("#NombreContr").show();

  $('#NombreContr').attr('required', true);

  $("#ApellidoPContr").show();

  $('#ApellidoPContr').attr('required', true);

  $("#ApellidoMContr").show();

  $('#ApellidoMContr').attr('required', true);

	$("#CargoContr").show();

	$("#GenContr").show();

  $("#FecNContr").show();

  $("#Tel1Contr").show();

  $('#Tel1Contr').attr('required', true);

  $("#Ext1tr").show();

	$("#Tel2Contr").show();

	$("#Ext2tr").show();

	$("#Celular1tr").show();

  $("#Celular2tr").show();

  $("#Correo1tr").show();

  $('#Correo1tr').attr('required', true);

  $('#telefono_oficina').attr('required', true);

  $('#email').attr('required', true);

  $('#correo1').attr('required', true);

  $("#Correo2tr").show();

  $("#TUsuariotr").show();

  $("#TSegVentr").show();

	$("#MedioConttr").show();

	$("#TipClietr").show();

	$("#Comentariotr").show();

  $("#Contratoatr").show();

  $("#TDatosBanctr").show();

  $("#formapagtr").show();

    $("#formapagtr").attr('required', true);

  $("#bancotr").show();

    $("#bancotr").attr('required', true);

  $("#Clabetr").show();

  $("#diascreditotr").show();

	$("#Limitecreditotr").show();

	$("#CuentasClientetr").show();

	$("#IVAtr").show();



    $('#DatosE').change(function() {

		if ($(this).is(":checked")) {

    $("#empresatr").show();

		$("#personaltr").show();

		$("#valida").val(1);

		$("#NombreComercialtr").hide();

		$("#FormaJuridicatr").hide();

		// $('#Nombretr').attr('required', false);

		// $("#RazonSocialtr").hide();

		// $("#curp-nombre").hide();

		// $("#curp-apellido_paterno").hide();

		// $('#Exttr').attr('required', false);

		$("#RFCtr").hide();

		$("#ActividadEtr").hide();

		$("#Statustr").hide();

		$("#ClaseRTtr").hide();

    $("#RegistroPatronaltr").hide();

    $("#TDirFisctr").hide();

		$("#CPFtr").hide();

		$("#EstadoFtr").hide();

		$("#MunicipioFtr").hide();

		$("#ColoniaFtr").hide();

		$("#CalleFtr").hide();

		$("#NumEFtr").hide();

    $("#NumIFtr").hide();

    $("#TDirComctr").hide();

    $("#CPCtr").hide();

    $("#EstadoCtr").hide();

    $("#MunicipioCtr").hide();

    $("#ColoniaCtr").hide();

    $("#CalleCtr").hide();

    $("#NumECtr").hide();

    $("#NumICtr").hide();

    $("#NombreContr").hide();

    $("#CPCtr").hide();

    $("#TContactotr").hide();

    // $("#NombreContr").hide();

    $("#ApellidoPContr").hide();

    $("#ApellidoMContr").hide();

    $("#CargoContr").hide();

    $("#GenContr").hide();

    $("#FecNContr").hide();

    $("#Tel1Contr").hide();

    $("#Ext1tr").hide();

    $("#Tel2Contr").hide();

    $("#Ext2tr").hide();

    $("#Celular1tr").hide();

    $("#Celular2tr").hide();

    $("#Correo1tr").hide();

    $("#Correo2tr").hide();

    $("#TUsuariotr").hide();

    $("#TSegVentr").hide();

    $("#MedioConttr").hide();

    $("#TipClietr").hide();

    $("#Comentariotr").hide();

    $("#Contratoatr").hide();

    $("#TDatosBanctr").hide();

    $("#formapagtr").hide();

    $("#bancotr").hide();

    $("#Clabetr").hide();

    $("#diascreditotr").hide();

    $("#Limitecreditotr").hide();

    $("#CuentasClientetr").hide();

    $("#IVAtr").hide();

    $('#NombreComercialtr').attr('required', false);

    $('#NombreContr').attr('required', false);

    $('#ApellidoPContr').attr('required', false);

    $('#ApellidoMContr').attr('required', false);

    $('#Tel1Contr').attr('required', false);

    $('#Correo1tr').attr('required', false);



		$("#Guardar").attr('disabled', false);

    } else {

    $("#empresatr").hide();

		$("#personaltr").hide();

		$("#valida").val(0);

		$("#NombreComercialtr").show();

		$("#FormaJuridicatr").show();

		// $('#Nombretr').attr('required', true);

		// $("#RazonSocialtr").show();

		// $("#curp-nombre").show();

		// $("#curp-apellido_paterno").show();

		// $('#Exttr').attr('required', true);

    $("#RFCtr").show();

    $("#ActividadEtr").show();

    $("#Statustr").show();

    $("#ClaseRTtr").show();

    $("#RegistroPatronaltr").show();

    $("#TDirFisctr").show();

    $("#CPFtr").show();

    $("#EstadoFtr").show();

    $("#MunicipioFtr").show();

    $("#ColoniaFtr").show();

    $("#CalleFtr").show();

    $("#NumEFtr").show();

    $("#NumIFtr").show();

    $("#TDirComctr").show();

    $("#CPCtr").show();

    $("#EstadoCtr").show();

    $("#MunicipioCtr").show();

    $("#ColoniaCtr").show();

    $("#CalleCtr").show();

    $("#NumECtr").show();

    $("#NumICtr").show();

    $("#TContactotr").show();

    $("#NombreContr").show();

    $("#ApellidoPContr").show();

    $("#ApellidoMContr").show();

    $("#CargoContr").show();

    $("#GenContr").show();

    $("#FecNContr").show();

    $("#Tel1Contr").show();

    $("#Ext1tr").show();

    $("#Tel2Contr").show();

    $("#Ext2tr").show();

    $("#Celular1tr").show();

    $("#Celular2tr").show();

    $("#Correo1tr").show();

    $("#Correo2tr").show();

    $("#TUsuariotr").show();

    $("#TSegVentr").show();

    $("#MedioConttr").show();

    $("#TipClietr").show();

    $("#Comentariotr").show();

    $("#Contratoatr").show();

    $("#TDatosBanctr").show();

    $("#formapagtr").show();

    $("#bancotr").show();

    $("#Clabetr").show();

    $("#diascreditotr").show();

    $("#Limitecreditotr").show();

    $("#CuentasClientetr").show();

    $("#IVAtr").show();

    $('#NombreComercialtr').attr('required', true);

    $('#NombreContr').attr('required', true);

    $('#ApellidoPContr').attr('required', true);

    $('#ApellidoMContr').attr('required', true);

    $('#Tel1Contr').attr('required', true);

    $('#Correo1tr').attr('required', true);

		$("#Guardar").attr('disabled', true);

    }

    });



  });





			function CamposLlenos(val){

        console.log("value: "+val.value+" id: "+val.id);

				if(val.value == null || val.value == ''){

						$("#"+val.id).addClass("ivalid");

				}else {

					$("#"+val.id).removeClass("ivalid");

				}



			}



			function mensaje(){

			 let comer =  $("#nombre_comercial").val();

			 let username = 	$("#username").val();

			 let pass = $("#Password").val();

			 let email =	$("#email").val();

			 let telefono_oficina = $("#telefono_oficina").val();

       

			 let msg='';

				if(comer==''){

					msg = msg+'Nombre Comercial, ';

				}

				if(username==''){

					msg = msg+'Usuario, ';

				}

				if(pass==''){

					msg = msg+'Contraseña, ';

				} 

				if(telefono_oficina==''){

					msg = msg+'Telefono, ';

				}

				if(email==''){

					msg = msg+'Email ';

				}

				if(comer=='' || username=='' || pass=='' || email=='' || telefono_oficina ==''){

          $('#frm-alta-cliente').find('input').each(function(){

              if(($(this).prop('required'))&&($(this).val()=='')){

                  cr=cr+1;

              } 

            

          });

          console.log("cr: "+cr)

 

          if (cr>0) { 

            swal({

									title: "<h3>¡ Llenar los campos requeridos !</h3> <br> <h4>"+msg+" o de contactos.</h4>",

									html: true,

									data: "",

									type: "error"



							});

            return false;

          }

					

				}else{

          var datos = $("#frm-alta-cliente").serialize();

          var token = $('meta[name="csrf-token"]').attr('content');

          // console.log(datos);

          $.ajax({

            headers: {'X-CSRF-TOKEN':token},

            url: '{{ url('clientes') }}',

            type:'POST',

            dataType: 'json',

            data: datos,

            success: function(response){

            //  alert(response);

            

                swal(''+response.status_alta);

		

                if(response.status_alta == 'success'){

                    swal({

                        title: "<h3>¡ El registro se guardo con éxito !</h3> ",

                        html: true,

                        data: datos,

                        type: "success"

		

                    });

		

                    setTimeout(function(){

                        location.href = '{{ route("sig-erp-crm::clientes.index") }}';

                    });

                  }

		

                //setTimeout(function(){     location.reload();   }, 1000);

            },

            // error: function(xhr, status, error) {

            //   var err = eval("(" + xhr.responseText + ")");

            //   alert(err.Message);

            // }

            error : function(response) {

		

              // swal('Existen datos requeridos sin llenar.')

                // swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

            }

          });

        }

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

			$('#msg').html(data).fadeIn('slow');

			 $('#msg').delay(2000).fadeOut('slow');

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

				// $('#msg2').html('<b>Disponible</b>').fadeIn('slow');

			  //   $('#msg2').delay(2000).fadeOut('slow');

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





if(email == null ||email == ''){

		$("#email").addClass("ivalid");

}else {

	$("#email").removeClass("ivalid");

}



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

    $("#msge2").html("<label style='color:#ffa100;'> <strong> Disponible </strong> </label>");

		// $('#msge2').html('<b>Disponible</b>').fadeIn('slow');

		// $('#msge2').delay(2000).fadeOut('slow');

		// $("#Guardar").attr('disabled', false);

	// $("#btnGdiv").attr('disabled', false);

	// $confirmButton.prop('disabled', false);

},

});

}



function exisCl(e) {



var cliente = $("#nombre_comercial").val();

$.ajax({

type: "get",

data: {cliente:cliente,'_token':'{{csrf_token()}}'},

 dataType:'json',

url: "{{ url('existeClient/{datos}') }}",

success:function(data){

	$("#msgcl").show();

	$("#msgcl2").hide();

	$('#msgcl').html(data).fadeIn('slow');

	$('#msgcl').delay(2000).fadeOut('slow');

	$("#Guardar").attr('disabled', true);



	},

		error: function (xhr, error) {

		$("#msgcl").hide();

		$("#msgcl2").show();

		$('#msgcl2').html('<b>Disponible</b>').fadeIn('slow');

		$('#msgcl2').delay(2000).fadeOut('slow');

		$("#Guardar").attr('disabled', false);

	// $("#btnGdiv").attr('disabled', false);

	// $confirmButton.prop('disabled', false);

},

});

}



$(document).ready(function(){



 

    var datofj = $("#forma_juridica").val();

    if(datofj==2){



    $('.pm').show();

    $('.pf').hide();

    $('#nombre').val('');

    $('#apellido_materno').val('');

    $('#apellido_paterno').val('');

    $('#genero').val('');

    $('#fecha_nacimiento_pros').val('');

    $('#lugar_nacimiento').val('');

    $('#curp').val('');

    }

    else if(datofj==1){



    $('.pm').hide();

    $('.pf').show();

    $('#razon_social').val('');

    $('#clase_pm').val('');





    }

    else if(datofj=="Selected"){

    $('.pm').hide();

    $('.pf').hide();

    $('#nombre').val('');

    $('#apellido_materno').val('');

    $('#apellido_paterno').val('');

    $('#genero').val('');

    $('#fecha_nacimiento_pros').val('');

    $('#lugar_nacimiento').val('');

    $('#curp').val('');

    $('#razon_social').val('');

    $('#clase_pm').val('');





    }

  // $("#frm-alta-cliente").on("submit",function(event){

	// event.preventDefault();

	// guardarCliente();

  // });

  

 

  $('#plantilla-contacto').hide();

  $('#df_colonia').select2();

  $('.telefono1').numeric();

  $('.telefono2').numeric();

  $('.celular1').numeric();

  $('.celular2').numeric();

  $('.ext1').numeric();

  $('.ext2').numeric();

  $('.seleccion_contacto').click(function(){

        var indice_contacto       = $('.seleccion_contacto').index(this);

        var longitud_contactos    = $('.set-contacto-principal').length;



        contactosReset(indice_contacto,longitud_contactos);

  });

 



  $.fn.delayPasteKeyUp = function(fn, ms)

  {

      var timer = 0;

      $(this).on("keyup paste", function()

      {

          clearTimeout(timer);

          timer = setTimeout(fn, ms);

      });

  };



  $('#rfc').delayPasteKeyUp(function(){

      str_rfc = $('#rfc').val();

      str_rfc = omitirAcentos(str_rfc);

      str_rfc = str_rfc.toUpperCase();



      $('#rfc').val(str_rfc);



  },1000);



   $('#demo_colonia').focus(function(){

      $('#resultado_colonias').show();

   });



   $('#demo_dc_colonia').focus(function(){

      $('#result_search_dc_colonia').show();

   });



  $('#medio_contacto_tabla').hide();



   $('#medio_contacto').change(function(){



      $(this).removeAttr('name');



      if(this.value == -1){

        $('#medio_contacto_tabla').show();

         $('#medio_contacto_tabla').attr('name','medio_contacto');

        $('#medio_contacto_tabla').focus();

        $('#medio_contacto_tabla').val('');

      }else{

        $('#medio_contacto_tabla').hide();

        $('#medio_contacto_tabla').val(this.value);

        $('#medio_contacto_tabla').attr('name','medio_contacto');

      }

   });



  //  addContacto();



  $('#add-contact').click(function(event){

      event.preventDefault();



      addContacto();



  });







  $('#empresa').on('change', function(){

      var datos = $('#empresa').val();

      $.ajax({

      	url: '{{ url('cselect') }}',

						type:'GET',

						data: {datos:datos,'_token': '{{csrf_token()}}'},

						success: function(response){

              //var res = response.split('|');

              	$("#personal").html(response);



        }

    });

  });



//------------------------Esté jquery  OCULTA CAMPOS DE ACUERDO ALO SELECCIONADO EN EL SELECT DE FORMA JURIDICA (Personas fisicas y personas morales)

  $('#forma_juridica').on('change',function(){









  	   var valor=this.value;//valor del option value



       //alert(valor);

  	   if(valor==2){



         $('.pm').show();

         $('.pf').hide();

         $('#nombre').val('');

         $('#apellido_materno').val('');

         $('#apellido_paterno').val('');

         $('#genero').val('');

         $('#fecha_nacimiento_pros').val('');

         $('#lugar_nacimiento').val('');

         $('#curp').val('');

        }

  	    else if(valor==1){



  	     $('.pm').hide();

  	     $('.pf').show();

  	     $('#razon_social').val('');

         $('#clase_pm').val('');





  	    }

          else{

         $('.pm').hide();

         $('.pf').hide();

         $('#nombre').val('');

         $('#apellido_materno').val('');

         $('#apellido_paterno').val('');

         $('#genero').val('');

         $('#fecha_nacimiento_pros').val('');

         $('#lugar_nacimiento').val('');

         $('#curp').val('');

         $('#razon_social').val('');

         $('#clase_pm').val('');





          }

  	   //alert(valor);



  });// end ohange







  //------------------------END Esté jquery  OCULTA CAMPOS DE ACUERDO ALO SELECCIONADO EN EL SELECT DE FORMA JURIDICA (Personas fisicas y personas morales)

//------------------------ BEGIN Esté jquery  llena el select de nombre ejecutivo al darle clic al cliente asignado

    $('#id_cn').on('change',function(){

        var valor_idcn=this.value;

        //alert(valor_idcn);

         var ruta="{{ url('getEjecutive')}}";

         //alert(valor_idcn);

        $.get(ruta,{'id_cn':valor_idcn}, function(data){

            $('#id_ejecutivo').empty();

            $('#id_ejecutivo').append($('<option>', {value:'', text:'Selecciona una ejecutivo...'}));

        // alert("Data: " + data);

          $.each(data, function(value) {

                   //$("#n_ejecu").html(" ");

                  // alert(value);



                   $('#id_ejecutivo').append($('<option>', {value:data[value].id, text:data[value].nombre+" "+data[value].ap_paterno+" "+data[value].ap_materno}));



                });



         });

    });







//------------------------END Esté jquery  llena el select de nombre ejecutivo al darle clic al cliente asignado

//------------------------- DIRECCION FISCAL -----------------------------------------------------------------------

//------------------------ BEGIN Esté jquery  llena el select de colonias,estado municipio al darle clic SELECT DE CP

    // $('#df_cp').on('change',function(){

    //     var valor_idcp=$('#df_cp').val();

    //     //alert(valor_idcn);

    //      var ruta="{{ url('lista_cp')}}";

    //      //alert(valor_idcn);

    //     $.get(ruta,{'id_cp':valor_idcp}, function(data){

    //         $('#df_colonia').empty();

    //         $('#df_colonia').append($('<option>', {value:'',text:'Selecciona una Colonia...'}));

    //     // alert("Data: " + data);

    //       $.each(data, function(value ) {

    //                //$("#n_ejecu").html(" ");

    //               // alert(value);

    //               var colonias=data[value].Colonia.split(';');



    //               //alert(colonias.length);

    //               var estado= data[value].Estado;

    //               var Municipio= data[value].Municipio;

    //               $("#df_estado").val(estado);//muestra el valor del estado de acuerdo al cp

    //               $("#df_municipio").val(Municipio);//muestra el valor del estado de acuerdo al cp



    //               $.each(colonias, function(resul,col) {

    //               // alert(resul);

    //                $('#df_colonia').append($('<option>', {value:col, text:col}));



    //                });



    //             });



    //      });

    // });

//------------------------END Esté jquery  llena el select de colonias,estado municipio al darle clic SELECT DE CP

//------------------------- END DIRECCION FISCAL -------------------------------------------------------------------







//------------------------- BEGIN DIRECCION COMERCIAL ---------------------------------------------------------------

//------------------------ BEGIN Esté jquery  llena el select de colonias,estado municipio al darle clic SELECT DE CP



// $('#dc_cp').on('change',function(){

//         var valor_idcp=this.value;

//         //alert(valor_idcn);

//          var ruta="{{ url('lista_cp')}}";

//          //alert(valor_idcn);

//         $.get(ruta,{'id_cp':valor_idcp}, function(data){

//             $('#dc_colonia').empty();

//             $('#dc_colonia').append($('<option>', {value:'',text:'Selecciona una Colonia...'}));

//         // alert("Data: " + data);

//           $.each(data, function(value ) {

//                    //$("#n_ejecu").html(" ");

//                   // alert(value);

//                   var colonias=data[value].Colonia.split(';');



//                   //alert(colonias.length);

//                   var estado= data[value].Estado;

//                   var Municipio= data[value].Municipio;

//                   $("#dc_estado").val(estado);//muestra el valor del estado de acuerdo al cp

//                   $("#dc_municipio").val(Municipio);//muestra el valor del estado de acuerdo al cp



//                   $.each(colonias, function(resul,col) {

//                   // alert(resul);

//                    $('#dc_colonia').append($('<option>', {value:col, text:col}));



//                    });



//                 });



//          });

//     });



    $('#df_cp').delayPasteKeyUp(function(){

    var valor_idcp=$("#df_cp").val();

        // alert('vi: '+valor_idcp);

         var ruta="{{ url('lista_cp')}}";

         //alert(valor_idcn);

        $.get(ruta,{'id_cp':valor_idcp}, function(data){

            $('#df_colonia').empty();

            $('#df_colonia').append($('<option>', {value:'',text:'Selecciona una Colonia...'}));

        // console.log("Data: " + JSON.stringify(data[0]));

          $.each(data, function(value ) {

                   //$("#n_ejecu").html(" ");

                  // alert(value);

                  var colonias=data[value].Colonia.split(';');



                  //alert(colonias.length);

                  var estado= data[value].Estado;

                  var Municipio= data[value].Municipio;

                  $("#df_estado").val(estado);//muestra el valor del estado de acuerdo al cp

                  $("#df_municipio").val(Municipio);//muestra el valor del estado de acuerdo al cp

                  $("#df_ciudad").val(Municipio);

                  

                  $.each(colonias, function(resul,col) {

                  // alert(resul);

                   $('#df_colonia').append($('<option>', {value:col, text:col}));



                   });



                });



         });

  },500);





  $('#dc_cp').delayPasteKeyUp(function(){

    var valor_idcp=$("#dc_cp").val();

    var ruta="{{ url('lista_cp')}}";

         //alert(valor_idcn);

        $.get(ruta,{'id_cp':valor_idcp}, function(data){

            $('#dc_colonia').empty();

            $('#dc_colonia').append($('<option>', {value:'',text:'Selecciona una Colonia...'}));

        // alert("Data: " + data);

          $.each(data, function(value ) {

                   //$("#n_ejecu").html(" ");

                  // alert(value);

                  var colonias=data[value].Colonia.split(';');



                  //alert(colonias.length);

                  var estado= data[value].Estado;

                  var Municipio= data[value].Municipio;

                  $("#dc_estado").val(estado);//muestra el valor del estado de acuerdo al cp

                  $("#dc_municipio").val(Municipio);//muestra el valor del estado de acuerdo al cp

                  $("#dc_ciudad").val(Municipio);

                  $.each(colonias, function(resul,col) {

                  // alert(resul);

                   $('#dc_colonia').append($('<option>', {value:col, text:col}));



                   });



                });



         });

  },500);





  $('#curp').focus(function(){

        var nombre       = omitirAcentos($('#nombre').val());

        var apellido_paterno = omitirAcentos($('#apellido_paterno').val());

        var apellido_materno = omitirAcentos($('#apellido_materno').val());

        var genero       = omitirAcentos($('#genero').val());

        var fec_nacimiento   = omitirAcentos($('#fecha_nacimiento_pros').val());

        var lugar_nacimiento = omitirAcentos($('#lugar_nacimiento').val());



        var objCurp = {

          nombre      :nombre,

          apellido_paterno:apellido_paterno,

          apellido_materno:apellido_materno,

          genero      :genero,

          fec_nacimiento  :fec_nacimiento  ,

          lugar_nacimiento:lugar_nacimiento,

        }



        generarCurp = validarDatosFiscales(objCurp);



        if(generarCurp.status){



            $.ajax({

              url:'{{ url('getCurp') }}',

              type:'GET',

              dataType: 'json',

              data:{

                nombre:nombre,

                apellido_paterno:apellido_paterno,

                apellido_materno:apellido_materno,

                genero:genero,

                fec_nacimiento:fec_nacimiento,

                lugar_nacimiento:lugar_nacimiento

              },

              success:function(curp){



                $('#curp').val(curp);

              },

              error:function(jqXHR, status, error) {

                swal('Disculpe, existio un error al generar el CURP');

              }



            });

        }else{



          $.each(generarCurp,function(campo,valor){

            if(valor=='has-error'){

              $('#curp-'+campo).addClass(valor);

            }else{

              $('#curp-'+campo).removeClass('has-error');

            }



            $('#curp').val('');

          });

        }

      });



      $('#rfc').focus(function(){

        var nombre       = omitirAcentos($('#nombre').val());

        var apellido_paterno = omitirAcentos($('#apellido_paterno').val());

        var apellido_materno = omitirAcentos($('#apellido_materno').val());

        var fec_nacimiento   = omitirAcentos($('#fecha_nacimiento_pros').val());





        var objCurp = {

          nombre      :nombre,

          apellido_paterno:apellido_paterno,

          apellido_materno:apellido_materno,

          fec_nacimiento  :fec_nacimiento  ,



        }



        generarCurp = validarDatosFiscales(objCurp);



        if(generarCurp.status){



            $.ajax({

              url:'{{ url('getRfc') }}',

              type:'GET',

              dataType: 'json',

              data:{

                nombre:nombre,

                apellido_paterno:apellido_paterno,

                apellido_materno:apellido_materno,

                fec_nacimiento:fec_nacimiento



              },

              success:function(curp){



                $('#rfc').val(curp);

              },

              error:function(jqXHR, status, error) {

                swal('Disculpe, existio un error al generar el RFC');

              }



            });

        }else{



          $.each(generarCurp,function(campo,valor){

            if(valor=='has-error'){

              $('#curp-'+campo).addClass(valor);

            }else{

              $('#curp-'+campo).removeClass('has-error');

            }



            $('#curp').val('');

          });

        }

      });



      /******************************************************************************************

                                AUTCOMPLETAR CP

        ******************************************************************************************/

        $('#demo_cp').delayPasteKeyUp(function(){



          longitud_cp   = ($('#demo_cp').val()).length;

          aux_cp        = $('#demo_cp').val();

          inicio_cp     = aux_cp.substr(0,1);

          parametro_cp  = (inicio_cp == '0') ? aux_cp.substr(1) : $('#demo_cp').val();



          if($.trim($('#demo_cp').val()) != '' && longitud_cp > 2){



                $.ajax({

                    url:'{{ url('list_cps') }}',

                    type:'GET',

                    dataType:'json',

                    data:{cp:parametro_cp},

                    success:function(lista_cp){



                      str_html_search = '<div class="list-group" style="height:200px; overflow: auto;">';

                      if(lista_cp.length > 0){

                          $.each(lista_cp,function(index){

                            arr_campos_cp     = lista_cp[index].split('||');

                            campo_cp          = arr_campos_cp[0];

                            campo_colonias    = arr_campos_cp[1];

                            campo_delegacion  = arr_campos_cp[2];

                            campo_estado      = arr_campos_cp[3];



                            str_html_search +='<a href="javascript:;" onclick="selectedCP(\''+campo_cp+'\',\''+campo_colonias+'\''+',\''+campo_delegacion+'\''+',\''+campo_estado+'\')" class="list-group-item">'+campo_cp+'</a>';

                          });

                      }else{

                        str_html_search += '<a href="javascript:;" class="list-group-item"><p>No se encontraron registros ...</p></a>';

                      }

                      str_html_search+= '</div>';

                      $('#result_search').html('').append(str_html_search);



                    },

                    error : function(jqXHR, status, error){

                        swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');

                    }

                });

            }else{

                $('#result_search').html('');

            }

        },500);





        $('#demo_dc_cp').delayPasteKeyUp(function(){

          longitud_cp   = ($('#demo_dc_cp').val()).length;

          aux_cp        = $('#demo_dc_cp').val();

          inicio_cp     = aux_cp.substr(0,1);

          parametro_cp  = (inicio_cp == '0') ? aux_cp.substr(1) : $('#demo_dc_cp').val();



          if($.trim($('#demo_dc_cp').val()) != '' && longitud_cp > 2){



                $.ajax({

                    url:'{{ url('list_cps') }}',

                    type:'GET',

                    dataType:'json',

                    data:{cp:parametro_cp},

                    success:function(lista_cp){



                      str_html_search = '<div class="list-group style="height:100px; overflow: auto;"">';

                      if(lista_cp.length > 0){

                          $.each(lista_cp,function(index){

                            arr_campos_cp     = lista_cp[index].split('||');

                            campo_cp          = arr_campos_cp[0];

                            campo_colonias    = arr_campos_cp[1];

                            campo_delegacion  = arr_campos_cp[2];

                            campo_estado      = arr_campos_cp[3];



                            str_html_search +='<a href="#" onclick="selectedDcCP(\''+campo_cp+'\',\''+campo_colonias+'\''+',\''+campo_delegacion+'\''+',\''+campo_estado+'\')" class="list-group-item">'+campo_cp+'</a>';

                          });

                      }else{

                        str_html_search += '<a href="javascript:;" class="list-group-item"><p>No se encontraron registros ...</p></a>';

                      }

                      str_html_search+= '</div>';

                      $('#result_search_dc_cp').html('').append(str_html_search);



                    },

                    error : function(jqXHR, status, error){

                        swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');

                    }

                });

            }else{

                $('#result_search').html('');

            }

        },500);







});//END DOCUMENT READY PRINCIPAL

//------------------------- DIRECCION FISCAL -----------------------------------------------------------------------

//---------------------------------------------- funcion para  llena olonias,estado,municipio al darle entetr CP

function EnterCp(e) {

  tecla = (document.all) ? e.keyCode : e.which;

  if (tecla==13) {

    var valor_idcp=this.value;

        //alert(valor_idcn);

         var ruta="{{ url('lista_cp')}}";

         //alert(valor_idcn);

        $.get(ruta,{'id_cp':valor_idcp}, function(data){

            $('#df_colonia').empty();

            $('#df_colonia').append($('<option >', {value:'', text:'Selecciona una Colonia'}));

        // alert("Data: " + data);

          $.each(data, function(value ) {

                   //$("#n_ejecu").html(" ");

                  // alert(value);

                  var colonias=data[value].Colonia.split(';');



                  //alert(colonias.length);

                  var estado= data[value].Estado;

                  var Municipio= data[value].Municipio;

                  $("#df_estado").val(estado);//muestra el valor del estado de acuerdo al cp

                  $("#df_municipio").val(Municipio);//muestra el valor del estado de acuerdo al cp



                  $.each(colonias, function(resul,col) {

                  // alert(resul);

                   $('#df_colonia').append($('<option>', {value:resul, text:col}));



                   });



                });



         });



      }//end if

  }//end function



  //---------------------------------------------- END funcion parap  llena olonias,estado,municipio al darle entetr CP

  //------------------------- END DIRECCION FISCAL ------------------------------------------------------------------

//------------------------- DIRECCION COMERCIAL -------------------------------------------------------------------



function EnterCpDC(e) {

  tecla = (document.all) ? e.keyCode : e.which;

  if (tecla==13) {

    var valor_idcp=this.value;

        //alert(valor_idcn);

         var ruta="{{ url('lista_cp')}}";

         //alert(valor_idcn);

        $.get(ruta,{'id_cp':valor_idcp}, function(data){

            $('#df_colonia').empty();

            $('#df_colonia').append($('<option>', {value:'', text:'Selecciona una Colonia'}));

        // alert("Data: " + data);

          $.each(data, function(value ) {

                   //$("#n_ejecu").html(" ");

                  // alert(value);

                  var colonias=data[value].Colonia.split(';');



                  //alert(colonias.length);

                  var estado= data[value].Estado;

                  var Municipio= data[value].Municipio;

                  $("#df_estado").val(estado);//muestra el valor del estado de acuerdo al cp

                  $("#df_municipio").val(Municipio);//muestra el valor del estado de acuerdo al cp



                  $.each(colonias, function(resul,col) {

                  // alert(resul);

                   $('#df_colonia').append($('<option>', {value:resul, text:col}));



                   });



                });



         });



      }//end if

  }//end function



//---------------------------------------------- funcion para  llena olonias,estado,municipio al darle entetr CP





var guardarCliente = function(){

  var datos = $("#frm-alsta-cliente").serialize();

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            headers: {'X-CSRF-TOKEN':token},

            url:'{{ url('clientes') }}',

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

                                    location.href = '{{ route("sig-erp-crm::clientes.index") }}';

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



                    // swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

            }

        });



    }



      var validarDatosFiscales = function(obj){



        bandera     = true; // Truen indica que si generara el Curp

        objValidacion   = {};



        $.each(obj,function(campo,valor){



          if($.trim(valor) == ''){

            bandera = false;

            objValidacion[campo] = 'has-error';

          }else{

            objValidacion[campo] = 'remove';

          }



        });



        objValidacion.status=bandera;

        return objValidacion;

    }



    function omitirAcentos(str_limpia) {



      str_limpia = $.trim(str_limpia);

      var acentos = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç";

      var limpia  = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuuXXcc";



      for (var i=0; i<acentos.length; i++) {

          str_limpia = str_limpia.replace(acentos.charAt(i), limpia.charAt(i));

      }



      return str_limpia.toUpperCase();

  }





  var addContacto = function(){

      contacto_str  = $('#plantilla-contacto').html();

      contacto      = contacto_str.replace('cambiar-clase','remove-contact');

      $('#container-contacto').append(contacto);

      $('.telefono1').numeric();

      $('.telefono2').numeric();

      $('.celular1').numeric();

      $('.celular2').numeric();

      $('.ext1').numeric();

      $('.ext2').numeric();

      $('.seleccion_contacto').click(function(){

            var indice_contacto       = $('.seleccion_contacto').index(this);

            var longitud_contactos    = $('.set-contacto-principal').length;



            contactosReset(indice_contacto,longitud_contactos);



      });





  }



  var validarEmail = function(mail){

    correo = mail.value;

    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;



    if(correo.length > 0){

      if(!expr.test(correo)){

          $(mail).focus();

      }

    }

  }

  var sizeTelefonos = function(telefono){

        tamanio = telefono.value;

        if(tamanio.length > 0 && tamanio.length < 10){

           $(telefono).focus();

        }

  }



  var sizeRrgistroPatronal = function(resgistro){

        reg_patronal = resgistro.value;

        if(reg_patronal.length > 0 && reg_patronal.length < 10){

           $(registro).focus();

        }

  }



  var contactosReset = function(indice_contacto,longitud){



      for(i=0; i < longitud; i++){

        contacto_principal    = $('.set-contacto-principal').get(i);

        if(i == indice_contacto){

            contacto_principal.value  = 1;

        }else{

            contacto_principal.value  = 0;

        }

      }

  }





  var removeContacto = function(obj){



		swal({

			title: "¿Estás seguro?",

			text: "Estás por borrar un contacto, este no se podrá recuperar más adelante.",

			type: "warning",

			showCancelButton: true,

			cancelButtonText: "Cancelar",

					confirmButtonColor: "#DD6B55",

					confirmButtonText: "Continuar",

					closeOnConfirm: true

			},

			function (isConfirm) {

					if(isConfirm){

						posicion  = $('.remove-contact').index(obj);

					 contac    = $('.contenedor-contacto').get(posicion);

					 elemento  = $(contac.parentNode);

					 //alert(posicion+' '+$(contac.parentNode).html());

					 $(contac).remove();

					}

			});

  }



  var selectedCP = function(cp,colonias,delegacion,estado){

    cp = cp.toString();

    value_cp = (cp.length < 5) ? '0'+cp:cp;

    $('#demo_cp').val(value_cp);

    $("#df_estado").val(estado);//muestra el valor del estado de acuerdo al cp

    $("#df_municipio").val(delegacion);//muestra el valor del estado de acuerdo al cp

    $('#result_search').html('');

    $('#demo_colonia').val('');





    lista_colonias = colonias.split(';');

    str_html_colonias = '<div class="list-group" style="height:100px; overflow: auto;">';

    $.each(lista_colonias,function(index){

      str_html_colonias+= '<a href="#" class="list-group-item" onclick="selectedColonia(\''+lista_colonias[index]+'\')">'+lista_colonias[index]+'</a>'

    });

    str_html_colonias+= '</div>';

    $('#resultado_colonias').hide();

    $('#resultado_colonias').html('').append(str_html_colonias);

  }



  var selectedDcCP = function(cp,colonias,delegacion,estado){

    cp = cp.toString();

    value_cp = (cp.length < 5) ? '0'+cp:cp;

    $('#demo_dc_cp').val(value_cp)

    $('#dc_estado').val(estado);

    $('#dc_municipio').val(delegacion);

    $('#result_search_dc_cp').html('');

    $('#demo_dc_colonia').val('');



    lista_colonias = colonias.split(';');

    str_html_colonias = '<div class="list-group" style="height:100px; overflow: auto;">';

    $.each(lista_colonias,function(index){

      str_html_colonias+= '<a href="#" class="list-group-item" onclick="selectedColoniaDC(\''+lista_colonias[index]+'\')">'+lista_colonias[index]+'</a>'

    });

    str_html_colonias+= '</div>';

    $('#result_search_dc_colonia').hide();

    $('#result_search_dc_colonia').html('').append(str_html_colonias);

  }



  var selectedColonia = function(colonia){

    $('#demo_colonia').val(colonia);

    $('#resultado_colonias').hide();

  }



  var selectedColoniaDC = function(colonia){

    $('#demo_dc_colonia').val(colonia);

    $('#result_search_dc_colonia').hide();

  }









</script>



<script>



    function hacer_click_clientes(valor){

		//

		//

    // var datos = $("#frm-alta-cliente").serialize();

    // var token = $('meta[name="csrf-token"]').attr('content');

    // console.log(datos);

		//

		//

		//

    // if(valor==0){

		//

		//

    //     $.ajax({

    //         headers: {'X-CSRF-TOKEN':token},

    //         url: '{{ url('clientes') }}',

    //         type:'POST',

    //         dataType: 'json',

    //         data: datos,

    //         success: function(response){

    //         //  alert(response);

    //             swal(''+response.status_alta);

		//

    //             if(response.status_alta == 'success'){

    //                 swal({

    //                     title: "<h3>¡ El registro se guardo con éxito !</h3> ",

    //                     html: true,

    //                     data: datos,

    //                     type: "success"

		//

    //                 });

		//

    //                 setTimeout(function(){

    //                     location.href = '{{ route("sig-erp-crm::clientes.index") }}';

    //                 });

    //               }else if(response.status_alta == 'existe'){

    //                 swal({

    //                     title: "<h3>¡ Este usuario ya esta dado de alta. !</h3> ",

    //                     html: true,

    //                     type: "warning",

    //                     confirmButtonText: "OK"

    //                 });

    //               }else if(response.status_alta == 'wrong'){

    //                 swal({

    //                     title: "<h3>¡ El registro NO se guardo con éxito !</h3> ",

    //                     html: true,

    //                     type: "warning",

    //                     confirmButtonText: "OK"

    //                 });

    //               }

		//

    //             //setTimeout(function(){     location.reload();   }, 1000);

    //         },

    //         // error: function(xhr, status, error) {

    //         //   var err = eval("(" + xhr.responseText + ")");

    //         //   alert(err.Message);

    //         // }

    //         error : function(response) {

		//

    //           // swal('Existen datos requeridos sin llenar.')

    //             // swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

    //         }

    //     });

		//

    // }else{

		//

    //     $.ajax({

    //         headers: {'X-CSRF-TOKEN':token},

    //         url:'{{ url('clientes') }}',

    //         type:'PUT',

    //         dataType: 'json',

    //         data: datos,

    //         success: function(response){

		//

    //             swal(''+response.status_alta);

    //             if(response.status_alta == 'success'){

    //                 swal({

    //                     title: "<h3>¡ El registro se guardo con éxito !</h3> ",

    //                     html: true,

    //                     data: datos,

    //                     type: "success"

		//

    //                 });

    //                 setTimeout(function(){

    //                     location.href = '{{ route("sig-erp-crm::clientes.index") }}';

    //                 });

    //             }else if(response.status_alta == 'wrong'){

    //                 swal({

    //                     title: "<h3>¡ El registro NO se guardo con éxito !</h3> ",

    //                     html: true,

    //                     type: "warning",

    //                     confirmButtonText: "OK"

    //                 });

		//

    //           }else if(response.status_uso == 'success'){

    //                 swal({

    //                     title: "<h3>¡ Este usuario ya esta dado de alta. !</h3> ",

    //                     html: true,

    //                     type: "warning",

    //                     confirmButtonText: "OK"

    //                 });

    //             }

		//

    //             //setTimeout(function(){     location.reload();   }, 1000);

    //         },

    //         error : function(jqXHR, status, error) {

		//

    //             swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

    //         }

    //     });

    // }





    }



		function buscarCP(val){

				var datos;

				if(val==1){

					datos = $("#searchcp").val();

				}else{

					datos = $("#cp_dc").val();

				}





				$.ajax({

						// headers: {'X-CSRF-TOKEN':token},

						url: '{{ url('validacion') }}',

						type:'GET',

						data: {datos:datos},

						success: function(response){

								// alert(response);

								var res = response[0].split('|');

								if(val==1){

                  $("#IdCodigoPostal").val(res[5]);

                  $("#IdPaisF").val(res[4]);

                  $("#IdEstadoF").val(res[3]);

									$("#estadoF").val(res[2]);

                  $("#municipioF").val(res[1]);

                  var strArray = response[1].split(";");

                  $('#colonia').empty();

                    $.each(strArray, function(i, p) {

                        $('#colonia').append($('<option></option>').val(p).html(p));

                    });



									// $("#colonia").html(response[1]);

									// $("#colonia").html("<option value='"+res[0]+"' >"+res[0]+"</option>");

								}else{

                  $("#IdPais_dc").val(res[4]);

                  $("#IdEstado_dc").val(res[3]);

									$("#estado_dc").val(res[2]);

                  $("#municipioC").val(res[1]);

                  var strArray = response[1].split(";");

                  $('#colonia_dc').empty();

                    $.each(strArray, function(i, p) {

                        $('#colonia_dc').append($('<option></option>').val(p).html(p));

                    });

									// $("#colonia_dc").html("<option value='"+res[0]+"' >"+res[0]+"</option>");

								}

						}

      });





		}



		function users(){

			var dato = $("#nombre_de_usuario").val();

			$.ajax({

					// headers: {'X-CSRF-TOKEN':token},

					url: '{{ url('ValUsers') }}',

					type:'GET',

					data: {datos:dato},

					success: function(response){

						if(response>0){

								$("#alerta").html("<label style='color:#ffa100;'> <strong> Nombre de usuario ya existe </strong> </label>");

								document.getElementById("nombre_de_usuario").focus();

						}else{

							$("#alerta").html("");

						}

					}

		});

    }



    function emails(){

			var dato = $("#correo1").val();



			$.ajax({

					// headers: {'X-CSRF-TOKEN':token},

					url: '{{ url('ValEmails') }}',

					type:'GET',

					data: {datos:dato},

					success: function(response){

						if(response>0){

								$("#alertaE").html("<label style='color:#ffa100;'> <strong> El correo ya existe </strong> </label>");

								document.getElementById("correo1").focus();

						}else{

							$("#alertaE").html("");

						}

					}

		});

    }



    </script>







@endsection


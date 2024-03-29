@extends('layouts.masterMenuView')

@section('section')



<div id="content" class="content">

	<ol class="breadcrumb ">



		<li><a href="{{route('sig-erp-crm::clientes.index')}}">Clientes/Prospectos</a></li>

		<li>Alta</li>



	</ol>

	

	<h1 class="page-header text-center">CLIENTES/PROSPECTOS<small>Edición</small></h1>

 



   



     <!-- begin row -->

			<div class="row">

                <!-- begin col-12 -->

			    <div class="col-md-12">

			        <!-- begin panel -->

                    <div class="panel panel-inverse">

                        <div class="panel-heading">

                            <div class="panel-heading-btn">

                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>

                            </div>

                            <h4 class="panel-title">Formulario para editar el registro de {{ $cliente->nombre_comercial }}</h4>

                        </div>

                        <div class="panel-body">

                    <?php //{!! Form::open(['action' => ['ClientesController@store'],'metod'=>'POST']) !!} ?>

                    <input type="hidden" id="cliente_update" value="{{ $cliente->id }}">



                        <form id="formulario_up" method="POST" action="{{url('clientes/editar/edit'. $cliente->id)}}" enctype="multipart/form-data">

                         @include('crm.clientes.form_clientes')

                         

                         

                        </form> 



                </div>

              </div>

            <!-- end panel -->

        </div>

        <!-- end col-12 -->

    </div>

    <!-- end row -->





@include('crm.clientes.plantillas.plantilla-form-edit-clientes')



</div><!-- End content-->
@endsection
@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
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
    {!! Html::script('assets/js/Format_telephone/format_telephone.js') !!}

  

		<!-- ================== END PAGE LEVEL JS ================== -->









<script charset="UTF-8">



    


//FormWizardValidation.init();

FormWizard.init();// WIZARD DEL FORMULARIO

FormPlugins.init();

function corre(){

    var token 		= $('meta[name="csrf-token"]').attr('content');

    // Capturamnos el boton de envío

    //  var btnEnviar = $("#btnEnviar");



    // Nos permite cancelar el envio del formulario

    $.ajax({     headers: {'X-CSRF-TOKEN':token},



        url:'{{ url('clientes/editar/edit') }}',



        type:'POST',

        dataType: 'json',

        data: {

            name: 'gustavo',

            app : 'mednez',





        },

        success:function(response){





        },

        error:function(jqXHR, status, error) {

            swal('Disculpe, existio un error');

            console.log(error);

            console.log(status);

            console.log(jqXHR);

        }



    });

    console.log('tata');

}



var showPDF = function(id){



  let token = '{{csrf_token()}}';

  $.ajax({

      url:'{{route('mostrar_img_src')}}',

      type: "POST",

      data: {

          id:id,

          _token:token

      },

      success:function (response){

          console.log(response);

          var img = response.img;

          let imgWindow = window.open("")

          imgWindow.document.write(

              `<iframe id="vista2" width='100%' height='100%' src="data:image/jpg;base64,${img}"></iframe>`

          );

      }

  });

}

$(document).ready(function(){



   var id_cp 		= $('#df_cp').val();

   var ruta_colonias="{{ url('lista_cp')}}";

   var obj_cp	= $('#df_cp');

   

   var obj_estado	= $('#df_estado');

   var obj_municipio= $('#df_municipio');

   var obj_colonia	= $('#df_colonia');

   $('#medio_contacto_tabla').hide();



   $('#btn-alta-cliente').click(function(){

      var usuario = $('#nombre_de_usuario').val();
      var correo = $('#correo_de_usuario').val();
      var idCliente =  {{$cliente->id}};
      $.ajax({

      // headers: {'X-CSRF-TOKEN':token},

        url: '{{ url('correoUsuarios') }}',

        type:'GET',

        data: {usuario:usuario,correo:correo,idCliente:idCliente},

        success: function(response){

          if(response.status == "error")
            swal({

              title: "<h4>¡"+ response.mensaje +"lll!</h4> ",
              html: true,
              type: "error"

            });
            
          else if(response.status == "sucess"){

              subir();
          }


          

        }

      });

      });

      function subir(){
      var tipo = $('#TipoDeCliente').val();

      if (tipo == 1 )
      guardarCliente();
      else if (tipo==2){

      if(($('#nombre_de_usuario').val()&&$('#contrasena').val()&&$('#telefono_de_usuario').val()&&$('#correo_de_usuario').val())!="")
      guardarCliente();
      else { 
        swal({

            title: "<h4>¡ Llenar campos requeridos de usuario !</h4> ",
            html: true,
            type: "warning"

            });
      }
      }
      }

      $('#TipoDeCliente').change(function(){

      var tipo = $('#TipoDeCliente').val();

      if (tipo == 1 )
        $('#usuarios_clientes_pros').hide();
      else if (tipo==2)
        $('#usuarios_clientes_pros').show();

      });


      function getBase64Image(img) {
        var canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);
        var dataURL = canvas.toDataURL();
        return dataURL;
      }

      var guardarCliente = function(){

      var datos = $("#formulario_up").serialize();

      var token = $('meta[name="csrf-token"]').attr('content');
      
      
      $.ajax({

          headers: {'X-CSRF-TOKEN':token},

          url:'{{url('clientes/editar/edit'.$cliente->id)}}',

          type:'POST',

          dataType: 'json',

          

          data: datos,

          success: function(){
                  //setTimeout(function(){     location.reload();   }, 1000);
                  swal({

                      title: "<h3>¡ El registro se Actualizo con éxito !</h3> ",

                      html: true,

                      data: "",

                      type: "success"



                      });

                      setTimeout(function(){

                          location.href = '{{ route("sig-erp-crm::clientes.index") }}';

                      });
              },

          error : function(jqXHR, status, error) {

                  // swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
                  swal({

                  title: "<h3>¡  error " +error+ " "+status+" "+jqXHR+ "!</h3> ",

                  html: true, 

                  data: "",

                  type: "error"



                  });

          }

      });



  }
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

   

   $('#df_colonia').select2();

   getDireccion(id_cp,ruta_colonias,obj_cp,obj_estado,obj_municipio,obj_colonia);





   $('.telefono1').numeric();

   $('.telefono2').numeric();

   $('.celular1').numeric();

   $('.celular2').numeric();

   $('.ext1').numeric();

   $('.ext2').numeric();

   $('#plantilla-edit-contacto').hide();



   $('#principal-contacto').remove();



   $('#add-contact').click(function(event){

      event.preventDefault();

      var token 		= $('meta[name="csrf-token"]').attr('content');

      var id_cliente 	= $('#cliente_update').val();

      swal({   

          title: "<h3>¿ Estas seguro de agregar el contácto ?</h3> ",

          html: true,

          type: "warning",   

          showCancelButton: true,   

          closeOnConfirm: false,   

          showLoaderOnConfirm: true, 

          cancelButtonText: 'Cancelar',

          confirmButtonColor: 'ef9d1e',

          cancelButtonColor: 'ef9d1e',

          confirmButtonText: 'Confirmar'

      }, function(){ 



      $.ajax({

            headers: {'X-CSRF-TOKEN':token},
            url: '{{ url('addContacto') }}',
            type:'POST',
            ataType: 'json',
            data: {id_cliente:id_cliente},
            success: function(response){

                addContacto(response);
                swal({
                  title: "<h3>Contacto agregado, favor de llenar los campos</h3> ",
                  html: true,
                  type: "success"
                });
            },
            error: function(error){

                console.log(error)
                swal("No se pudo crear nuevo contacto, cominiquese con el desarrollador");
            }

            });
            
   
      });    
      

  });





   var id_cp_dc	= $('#dc_cp').val()

        //alert(valor_idcn);

         

    

	var dc_obj_cp	= $('#dc_cp');

	   

	var dc_obj_estado	= $('#dc_estado');

	var dc_obj_municipio= $('#dc_municipio');

	var dc_obj_colonia	= $('#dc_colonia');

         //alert(valor_idcn);

    getDireccion(id_cp_dc,ruta_colonias,dc_obj_cp,dc_obj_estado,dc_obj_municipio,dc_obj_colonia);



   getTipoPersona(); 



   getContactos();



  $('#btn-alta-cliente').click(function(event){



   // event.preventDefault();

   // guardarCliente();

  });

//------------------------Esté jquery  OCULTA CAMPOS DE ACUERDO ALO SELECCIONADO EN EL SELECT DE FORMA JURIDICA (Personas fisicas y personas morales)

  


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

          $.each(data, function(value ) {

                   //$("#n_ejecu").html(" "); 

                  // alert(value);

                   indice = value+1;

                   $('#id_ejecutivo').append($('<option>', {value:data[value].id, text:data[value].nombre+" "+data[value].ap_paterno+" "+data[value].ap_materno}));



                });



         });

    }); 


 // Variables
 const inputFile = document.querySelector('#archivo');
                            const image = document.querySelector('#archivopdf');

                            /**
                             * Returns a file in Base64URL format.
                             * @param {File} file
                             * @return {Promise<string>}
                             */
                            async function encodeFileAsBase64URL(file) {
                                return new Promise((resolve) => {
                                    const reader = new FileReader();
                                    reader.addEventListener('loadend', () => {
                                        resolve(reader.result);
                                    });
                                    reader.readAsDataURL(file);
                                });
                            };

                            // Eventos
                            inputFile.addEventListener('input', async (event) => {
                                // Convierto la primera imagen del input en una ruta Base64
                                const base64URL = await encodeFileAsBase64URL(inputFile.files[0]);
                                // Anyado la ruta Base64 a la imagen
                                let base = base64URL.replace("data:image/png;base64,","");
                                base= base.replace("data:image/png;base64,","");
                                $("#archivopdf").val(base.replace("data:image/png;base64,",""));
                                $("#verImg").attr('src',"data:image/png;base64,"+$("#archivopdf").val());
                                console.log(base)
                            });


   

//------------------------END Esté jquery  llena el select de nombre ejecutivo al darle clic al cliente asignado   

//------------------------- DIRECCION FISCAL -----------------------------------------------------------------------

//------------------------ BEGIN Esté jquery  llena el select de colonias,estado municipio al darle clic SELECT DE CP

    $('#df_cp').on('change',function(){

        var valor_idcp=this.value;

        //alert(valor_idcn);

        var ruta="{{ url('lista_cp')}}";



       

	   var ruta_colonias="{{ url('lista_cp')}}";

	   var df_obj_cp	= $('#df_cp');

	   

	   var df_obj_estado	= $('#df_estado');

	   var df_obj_municipio= $('#df_municipio');

	   var df_obj_colonia	= $('#df_colonia');

     var df_obj_ciudad= $('#df_ciudad');

         //alert(valor_idcn);

        getDireccion(valor_idcp,ruta,df_obj_cp,df_obj_estado,df_obj_municipio,df_obj_colonia,df_obj_ciudad);

    }); 

//------------------------END Esté jquery  llena el select de colonias,estado municipio al darle clic SELECT DE CP   

//------------------------- END DIRECCION FISCAL -------------------------------------------------------------------

 





//------------------------- BEGIN DIRECCION COMERCIAL ---------------------------------------------------------------

//------------------------ BEGIN Esté jquery  llena el select de colonias,estado municipio al darle clic SELECT DE CP



$('#dc_cp').on('change',function(){

        var valor_idcp=this.value;

        //alert(valor_idcn);

         

        var ruta="{{ url('lista_cp')}}";       

	   	var dc_obj_cp	= $('#dc_cp');

	   

	   	var dc_obj_estado	= $('#dc_estado');

	   	var dc_obj_municipio= $('#dc_municipio');

	   	var dc_obj_colonia	= $('#dc_colonia');

      var dc_obj_ciudad= $('#dc_ciudad');

         //alert(valor_idcn);

        getDireccion(valor_idcp,ruta,dc_obj_cp,dc_obj_estado,dc_obj_municipio,dc_obj_colonia,dc_obj_ciudad);

    }); 











//------------------------END Esté jquery  llena el select de nombre ejecutivo al darle clic al cliente asignado 

//------------------------- END DIRECCION COMERCIAL ---------------------------------------------------------------



 /*$("[style*='z-index: 1']").click(function(){

//$("input .select2-search .select2-search--dropdown [type*='search']").click(function(){



   /* $("#con-form").html(

       var forma_juridica=$("#forma_juridica").val();

        

        "<h5>Nombre Comercial:</h5>"+ $("#nombre_comercial").val());

 });*/







//--------------------------end validacion -----------------------------------------//
/*
	$('#curp').focus(function(){

		var nombre 			 = omitirAcentos($('#nombre').val());

		var apellido_paterno = omitirAcentos($('#apellido_paterno').val());

		var apellido_materno = omitirAcentos($('#apellido_materno').val());

		var genero			 = omitirAcentos($('#genero').val());

		var fec_nacimiento   = omitirAcentos($('#fecha_nacimiento_pros').val());

		var lugar_nacimiento = omitirAcentos($('#lugar_nacimiento').val());

		

		var objCurp = {

			nombre 			:nombre,

			apellido_paterno:apellido_paterno,

			apellido_materno:apellido_materno,

			genero			:genero,

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

*/

/*
	$('#rfc').focus(function(){

		var nombre 			 = omitirAcentos($('#nombre').val());

		var apellido_paterno = omitirAcentos($('#apellido_paterno').val());

		var apellido_materno = omitirAcentos($('#apellido_materno').val());

		var fec_nacimiento   = omitirAcentos($('#fecha_nacimiento_pros').val());

		



		var objCurp = {

			nombre 			:nombre,

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

*/

}); //END DOCUMENT READY PRINCIPAL

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

        var datos 		= $("#frm-edit-cliente").serialize();

        var token 		= $('meta[name="csrf-token"]').attr('content');

        var id_cliente 	= $('#cliente_update').val();



        if (id_cliente === undefined || id_cliente==='' || id_cliente===null)

        {

            console.log(id_cliente);



        }else{

        $.ajax({

            headers: {'X-CSRF-TOKEN':token},

            url:'{{ url('clientes') }}/'+id_cliente,

            type:'PUT',

            dataType: 'json',

            data: datos,

            success: function(response){





                    if(response.status_alta == 'success'){

                        swal({

                                title: "<h3>¡ El registro se actualizó con éxito !</h3> ",

                                html: true,

                                data: datos,

                                type: "success",

                                confirmButtonText: "OK"

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



                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');

            }

        });

       }

    }



    var getTipoPersona = function(){



    	

    		$('.pm').hide();

  	    	$('.pf').show();

    

    	

  	    

    }



    var getDireccion = function(id_cp,ruta,obj_cp,obj_estado,obj_municipio,obj_colonia,obj_ciudad){



    	$.get(ruta,{'id_cp':id_cp}, function(data){

            //$('#df_colonia').empty();

            $(obj_colonia).empty();

            //$('#df_colonia').append($('<option>', {value:'',text:'Selecciona una Colonia...'}));

            $(obj_colonia).append($('<option selected="selected">', {value:'',text:'Selecciona una Colonia...'}));

        	// alert("Data: " + data);

        	var colonia_df = '{{ $cliente->df_colonia }}';

        	var colonia_dc = '{{ $cliente->dc_colonia }}';







        	



          	$.each(data, function(value ) {

                  var colonias=data[value].Colonia.split(';');                 

                  var estado= data[value].Estado;

                  var Municipio= data[value].Municipio;

                  var Ciudad= data[value].Municipio;

                  var attr_selec = '';

                 

                  $(obj_estado).val(estado);//muestra el valor del estado de acuerdo al cp

                  

                  $(obj_municipio).val(Municipio);//muestra el valor del estado de acuerdo al cp

                  $(obj_ciudad).val(Ciudad);

                  $.each(colonias, function(resul,col) {

                  

                   //$('#df_colonia').append($('<option>', {value:col, text:col}));

                   

                   $(obj_colonia).append($('<option>', {value:col, text:col}));



                   });



            });



            $('#df_colonia').select2().select2('val',colonia_df);

            $('#dc_colonia').select2().select2('val',colonia_dc);







         });

    }



    var validarDatosFiscales = function(obj){

    		

    		bandera 		= true; // Truen indica que si generara el dato

    		objValidacion 	= {};



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

    	var acentos = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç";

    	var limpia	= "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuuXXcc";



	    for (var i=0; i<acentos.length; i++) {

	        str_limpia = str_limpia.replace(acentos.charAt(i), limpia.charAt(i));

	    }



	    return str_limpia.toUpperCase();

	}



  var getContactos = function(){



    var contacto_update_id = $('#cliente_update').val();



    $('#container-contacto').empty();

    $.ajax({



        url:'{{ url('lista_contactos') }}',

        type:'GET',

        dataType:'json',

        data:{id_cliente:contacto_update_id},

        success:function(contactos){

          var template_contacto_inicio = $('#plantilla-edit-contacto').html();

          var template_real = '';

          var template_aux = '';

          var inicio = true;
          
          $.each(contactos,function(key,value){
    
              inicio = true;

              $.each(value,function(k,v){

                if(inicio){


                  
                  template_aux = template_contacto_inicio.replace('{'+k+'}',v);                  

                  template_real =  template_aux;

                  inicio = false;

                }else{

                 
                  template_aux = template_real.replace('{'+k+'}',v);

                  

                  template_real = template_aux;            
                  
                  
                }                

              });  


              

              $('#container-contacto').append(template_real);

                $('.telefono1').numeric();

                $('.telefono2').numeric();

                $('.celular1').numeric();

                $('.celular2').numeric();

                $('.ext1').numeric();

                $('.ext2').numeric();

             
               

          });

        },

        error:function(jqXHR, status, error) {

            swal('Upss, ocurrio un error al obtener los contáctos, comuniquese con el equipo de desarrollo');

        }



    });

  }


  var contactosReset = function(indice_contacto,longitud){

    console.log (longitud);

    for(i=0; i < longitud; i++){

      contacto_principal    = $('.set-contacto-principal').get(i);

      
      if(i == indice_contacto){

          contacto_principal.value  = 1;

      }else{

          contacto_principal.value  = 0;

      }

      
    }

  }

  function setContactoPrincipal(id){

      

    var indice_contacto       = $('.seleccion_contacto').index(id);

    
    var longitud_contactos    = $('.set-contacto-principal').length;

   

    contactosReset(indice_contacto,longitud_contactos);

      
  }



  var removeContacto = function(objHtml){


    

    var posicion     = $('.remover-contacto').index(objHtml);

    var nameContact  = $('.contact-name').get(posicion);

    var resultDelete  = $('.contact-id').get(posicion);

    var cantidadObj   = $('.remover-contacto');



    



    if(resultDelete.value == '{id}'){

      getContactos();

    }else{  



        if(cantidadObj.length>2){

              swal({   

                title: "<h3>¿ Estas seguro de eliminar el contácto ?</h3> ",

                text: "<h1><span style=\"color:#FF9933\">"+nameContact.value+"<span></h1>",   

                html: true,

                type: "warning",   

                showCancelButton: true,   

                closeOnConfirm: false,   

                showLoaderOnConfirm: true, 

                cancelButtonText: 'Cancelar',

                confirmButtonColor: 'ef9d1e'

              }, function(){ 



                  

                  deleteContacto(resultDelete.value);

                     

              });    

        }else{

            swal('¡Debe existir al menos un contácto!','No se pude eliminar el registro','warning');

        }  

    }  

  }



  var addContacto = function(id){

      contacto_str  = $('#plantilla-edit-contacto').html();

      contacto      = contacto_str.replace('{nombre_con}','');

      contacto      = contacto.replace('{cargo}','');

      contacto      = contacto.replace('{departamento}','');

      contacto      = contacto.replace('{telefono1}','');

      contacto      = contacto.replace('{ext1}','');

      contacto      = contacto.replace('{telefono2}','');

      contacto      = contacto.replace('{ext2}','');

      contacto      = contacto.replace('{celular1}','');

      contacto      = contacto.replace('{celular2}','');

      contacto      = contacto.replace('{correo1}','');

      contacto      = contacto.replace('{correo2}','');

      contacto      = contacto.replace('{pagina_web}','');

      contacto      = contacto.replace('{id}',id);

      contacto      = contacto.replace('{apellido_paterno_con}',"");

      contacto      = contacto.replace('{apellido_materno_con}',"");

      contacto      = contacto.replace('{check1}',"");

      contacto      = contacto.replace('{check2}',"");


      $('#container-contacto').append(contacto);

      $('.telefono1').numeric();

      $('.telefono2').numeric();

      $('.celular1').numeric();

      $('.celular2').numeric();

      $('.ext1').numeric();

      $('.ext2').numeric();

  }

//x


  var deleteContacto = function(id_contacto){

    var token        = $('meta[name="csrf-token"]').attr('content');    



      $.ajax({

          headers: {'X-CSRF-TOKEN':token},

          url:'{{ url('contactos') }}/'+id_contacto+'',

          dataType:'json',

          type:'DELETE',          

          success:function(contacto){

            if(contacto.status){

             swal("¡ El contácto se elimino con éxito!", "", "success");  

             getContactos(); 

            }else{

              swal("¡ El contácto NO se elimino con éxito!", "", "warning");   

              getContactos();

            }

          },

          error:function(){

            swal("¡ Ocurrio un error al eliminar el contácto !", "", "warning");   

          }

      });

     
  }



</script>



@endsection


@extends('layouts.masterMenuView')
@section('section')

<div id="content" class="content">
	<ol class="breadcrumb ">
	   @if( $peticion == 'catalogo/clientes/' . $id_cliente. '/edit' )
      <!-- <li><a href="javascript:;">Catálogo</a></li> -->
      @else
      <li><a href="{{url('dashboard')}}">CRM</a></li>
      @endif
		  <li><a href="{{route('sig-erp-crm::clientes.index')}}">Clientes/Prospectos</a></li>
		  <li>Actualización</li>

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
                            <h4 class="panel-title">Formulario para editar el registro</h4>
                        </div>
                        <div class="panel-body">
                        <!-- <form id="frm-alta-cliente" action="{{ route('sig-erp-crm::clientes.update', $cliente) }}" method="PUT"> -->
                        <!-- <form id="frm-alta-cliente"> -->
                        {{ Form::open([ 'route' => ['sig-erp-crm::clientes.update',$cliente->IdCliente],'id' => 'frm-alta-cliente',
   							        'method' => 'PUT'				                           				
				                ]) }}
                          @include('crm.clientes.form_cliente')
                        <!-- </form> -->
                        {{ Form::close() }}
                        </div>
                    </div>
            <!-- end panel -->
          </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->


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

//FORMA_JURIDICA
     document.getElementById('forma_juridica').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('forma_juridica').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('forma_juridica').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
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

      }

      //CLASE RT

      document.getElementById('registro_patronal').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('registro_patronal').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('registro_patronal').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
       

      }

      //GENERO

      document.getElementById('genero').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('genero').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('genero').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
       

      }

  //GENERO_CON

  document.getElementById('genero_con').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('genero_con').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('genero_con').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
       

      }

      //MEDIO CONTACTO
      document.getElementById('medio_contactoc').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('medio_contactoc').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('medio_contactoc').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
       

      }

      //TIPO CLIENTE
      document.getElementById('tipo_cliente').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('tipo_cliente').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('tipo_cliente').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
       

      }

      //CONTRATO A
      document.getElementById('contrato_a').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('contrato_a').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('contrato_a').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
       

      }

      //ID_CN
      document.getElementById('id_cn').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('id_cn').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('id_cn').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
       

      }

      //FORMA PAGO
      document.getElementById('db_forma_pagoc').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('db_forma_pagoc').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('db_forma_pagoc').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
       

      }

      //BANCOS
      document.getElementById('db_banco').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('db_banco').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('db_banco').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
       

      }

      //DIAS CREDITO

      document.getElementById('db_dias_credito').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('db_dias_credito').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('db_dias_credito').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
       

      }

      //IVA

      document.getElementById('db_iva').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('db_iva').value);
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('db_iva').options[localStorage.getItem('selectedtem')].selected = true;
        var valor = localStorage.getItem('selectedtem');
        // alert(valor);
       

      }


$(document).ready(function(){

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



  $('#add-contact').click(function(event){
      event.preventDefault();

      addContacto();

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
         var ruta="{{ url('lista_ejecutivos')}}";
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
    $('#df_cp').on('change',function(){
        var valor_idcp=this.value;
        //alert(valor_idcn);
         var ruta="{{ url('lista_cp')}}";
         //alert(valor_idcn);
        $.get(ruta,{'id_cp':valor_idcp}, function(data){
            $('#df_colonia').empty();
            $('#df_colonia').append($('<option>', {value:'',text:'Selecciona una Colonia...'}));
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
                   $('#df_colonia').append($('<option>', {value:col, text:col}));

                   });

                });

         });
    });
//------------------------END Esté jquery  llena el select de colonias,estado municipio al darle clic SELECT DE CP
//------------------------- END DIRECCION FISCAL -------------------------------------------------------------------



//------------------------- BEGIN DIRECCION COMERCIAL ---------------------------------------------------------------
//------------------------ BEGIN Esté jquery  llena el select de colonias,estado municipio al darle clic SELECT DE CP

$('#dc_cp').on('change',function(){
        var valor_idcp=this.value;
        //alert(valor_idcn);
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

                  $.each(colonias, function(resul,col) {
                  // alert(resul);
                   $('#dc_colonia').append($('<option>', {value:col, text:col}));

                   });

                });

         });
    });




//-------------------------- VALIDACION DE FORMULARIO ------------------------------//
// $("#frm-alta-cliente").on("submit",function(e){
//
//     // e.preventDefault();
//
//     location.reload();
//     $('#Buscar').click(function() {
//       $('#cp_dc').attr('required', false);
//       $('#searchcp').attr('required', true);
//
//     });
//
//     $('#Buscar_dc').click(function() {
//       $('#cp_dc').attr('required', true);
//       $('#searchcp').attr('required', false);
//
//     });
//
//
//     var ruta="{{ url('validacion')}}";
//     var form=$("#frm-alta-cliente").serializeArray();
//     var campos=[];
//     $.each(form, function (i, field) {
//         //alert('input' + i + ': ' + field.name + " = " + field.value);
//         campos[field.name]=field.value;
//         //alert('input' + i );
//     });
//
//     $.each(campos,function(campo,valor){
//       alert(campo);
//       if($.trim(valor) == ''){
//         $('#'+campo).attr('style','border-color: #ff5b57');
//       }
//     });
//
//
//
// //------------------ guardar clienres validacion nombre comercial----------------------------------//
//        var nombre_comercial=$.trim($("#nombre_comercial").val());
//
//        var token = $('meta[name="csrf-token"]').attr('content');
//            $.ajax({
//             headers: {'X-CSRF-TOKEN':token},
//             url:'{{ url('validarNombreComercial') }}',
//             type:'GET',
//             dataType: 'json',
//             data: {"nombre_comercial":nombre_comercial},
//             success: function(response){
//
//                     if(response.status_alta=='success' ){
//
//                             swal({
//                                     title: "<h3>El nombre comercial "+response.nombre +"</h3> ",
//                                     html: true,
//                                     text: "Ya se encuentra dado de Alta en el sistema.",
//                                     type: "warning",
//                                     confirmButtonText: "OK"
//                                 });
//
//                            } else {
//                              guardarCliente();
//                         }
//                 },
//             error : function(jqXHR, status, error) {
//
//                     swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
//             }
//         });
//
//
//
// //------------------ guardar clienres validacion nombre comercial----------------------------------//
//     $("input[style*='border-color: #ff5b57']").keypress(function(){
//       var name=this.name;
//      $("#"+name).removeAttr('style','border-color: #ff5b57');;
//         //$('#nombre_comercial').removeAttr('style','border-color: #ff5b57');
//
//     });
//
//     $("select[style*='border-color: #ff5b57']").click(function(){
//       var name=this.name;
//      // alert(name);
//      $("#"+name).removeAttr('style','border-color: #ff5b57');;
//
//         //$('#nombre_comercial').removeAttr('style','border-color: #ff5b57');
//
//     });
//
// //----------  END VALIDACION FORMULARIO ALTA CLIENTES APARTADO  CONTÁCTO------------------------------------------
//
// });

//--------------------------end validacion -----------------------------------------//

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
        console.log(datos);
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
          posicion  = $('.remove-contact').index(obj);
          contac    = $('.contenedor-contacto').get(posicion);
          elemento  = $(contac.parentNode);
          //alert(posicion+' '+$(contac.parentNode).html());
          $(contac).remove();

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
								//alert(response);
								var res = response.split('|');
								if(val==1){
                  $("#IdCodigoPostal").val(res[5]);
                  $("#IdPaisF").val(res[4]);
                  $("#IdEstadoF").val(res[3]);
									$("#estadoF").val(res[2]);
									$("#municipioF").val(res[1]);
									// $("#colonia").html();
									$("#colonia").html("<option value='"+res[0]+"' >"+res[0]+"</option>");
								}else{
                  $("#IdPais_dc").val(res[4]);
                  $("#IdEstado_dc").val(res[3]);
									$("#estado_dc").val(res[2]);
									$("#municipioC").val(res[1]);
									$("#colonia_dc").html("<option value='"+res[0]+"' >"+res[0]+"</option>");
								}
						}
      });
      
      
		}

		function users(){
			var dato = $("#username").val();

			$.ajax({
					// headers: {'X-CSRF-TOKEN':token},
					url: '{{ url('ValUsers') }}',
					type:'GET',
					data: {datos:dato},
					success: function(response){
						if(response>0){
								$("#alerta").html("<label style='color:#ffa100;'> <strong> Nombre de usuario ya existe </strong> </label>");
								document.getElementById("username").focus();
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
								$("#alertaE").html("<label style='color:#ffa100;'> <strong> Correo de usuario ya existe </strong> </label>");
								document.getElementById("correo1").focus();
						}else{
							$("#alertaE").html("");
						}
					}
		});
		}
    </script>



@endsection

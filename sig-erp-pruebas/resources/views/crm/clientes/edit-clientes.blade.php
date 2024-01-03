@extends('layouts.master')
@section('section')

<div id="content" class="content">
	<ol class="breadcrumb ">
	   @if( $peticion == 'catalogo/clientes/' . $id_cliente. '/edit' )
      <li><a href="javascript:;">Catálogo</a></li>
      @else
      <li><a href="{{url('dashboard')}}">CRM</a></li>
      @endif
		  <li><a href="{{route('sig-erp-crm::clientes.index')}}">Clientes/Prospectos</a></li>
		  <li>Actualización</li>

	</ol>
	
	<h1 class="page-header text-center">CLIENTES/PROSPECTOS <small>Edición</small></h1>
 

   

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
                            <h4 class="panel-title">Formulario para editar el registro de {{ $cliente->df_colonia }}</h4>
                        </div>
                        <div class="panel-body">
                    <?php //{!! Form::open(['action' => ['ClientesController@store'],'metod'=>'POST']) !!} ?>
                    <input type="hidden" id="cliente_update" value="{{ $cliente->id }}">
                    {!! Form::model($cliente,['route' => ['sig-erp-crm::clientes.update',$cliente],'id' => 'frm-edit-cliente']) !!}

                          <input type="hidden" name="peticion" value="catalogo/clientes/update">
                         @include('crm.clientes.form_clientes')
					          {!! Form::close() !!}
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
  
		<!-- ================== END PAGE LEVEL JS ================== -->




<script charset="UTF-8">

//FormWizardValidation.init();
FormWizard.init();// WIZARD DEL FORMULARIO
FormPlugins.init();

$(document).ready(function(){
   $("#id_ejecutivo").select2('data', { id:"elementID", text: "Hello!"});

   var id_cp 		= $('#df_cp').val();
   var ruta_colonias="{{ url('lista_cp')}}";
   var obj_cp	= $('#df_cp');
   
   var obj_estado	= $('#df_estado');
   var obj_municipio= $('#df_municipio');
   var obj_colonia	= $('#df_colonia');
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
   /************************************************************
              DIRECCION
   ************************************************************/

    $.fn.delayPasteKeyUp = function(fn, ms)
    {
        var timer = 0;
        $(this).on("keyup paste", function()
        {
            clearTimeout(timer);
            timer = setTimeout(fn, ms);
        });
    };

   $('#demo_colonia').focus(function(){
      $('#resultado_colonias').show();
   });
   $('#demo_dc_colonia').focus(function(){
      $('#result_search_dc_colonia').show();
   });

    if($("#id_cn").val()){
        var valor_idcn=$("#id_cn").val();
        //alert(valor_idcn);
         var ruta="{{ url('lista_ejecutivos')}}";
         //alert(valor_idcn);
        $.get(ruta,{'id_cn':valor_idcn}, function(data){
            $('#id_ejecutivo').empty();
            $('#id_ejecutivo').append($('<option>', {value:'', text:'Selecciona una ejecutivo...'}));
        // alert("Data: " + data);
          $.each(data, function(value ) {
                   //$("#n_ejecu").html(" "); 
                  // alert(value);
                   indice = value+1;
                   $('#id_ejecutivo').append($('<option>', {value:indice, text:data[value].nombre}));

                });

         });

    }
     
   
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

      addContacto();
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

    event.preventDefault();
    guardarCliente();
  });
//------------------------Esté jquery  OCULTA CAMPOS DE ACUERDO ALO SELECCIONADO EN EL SELECT DE FORMA JURIDICA (Personas fisicas y personas morales)
  $('#forma_juridica').on('change',function(){

  	   var valor=this.value;//valor del option value

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
          $.each(data, function(value ) {
                   //$("#n_ejecu").html(" "); 
                  // alert(value);
                   indice = value+1;
                   $('#id_ejecutivo').append($('<option>', {value:indice, text:data[value].nombre}));

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

       
	   var ruta_colonias="{{ url('lista_cp')}}";
	   var df_obj_cp	= $('#df_cp');
	   
	   var df_obj_estado	= $('#df_estado');
	   var df_obj_municipio= $('#df_municipio');
	   var df_obj_colonia	= $('#df_colonia');
         //alert(valor_idcn);
        getDireccion(valor_idcp,ruta,df_obj_cp,df_obj_estado,df_obj_municipio,df_obj_colonia);
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
         //alert(valor_idcn);
        getDireccion(valor_idcp,ruta,dc_obj_cp,dc_obj_estado,dc_obj_municipio,dc_obj_colonia);
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
                      
                      str_html_search = '<div class="list-group" style="height:100px; overflow: auto;">';                      
                      if(lista_cp.length > 0){    
                          $.each(lista_cp,function(index){
                            arr_campos_cp     = lista_cp[index].split('||');
                            campo_cp          = arr_campos_cp[0]; 
                            campo_colonias    = arr_campos_cp[1];
                            campo_delegacion  = arr_campos_cp[2];
                            campo_estado      = arr_campos_cp[3];                        
                            
                            str_html_search +='<a href="#" onclick="selectedCP(\''+campo_cp+'\',\''+campo_colonias+'\''+',\''+campo_delegacion+'\''+',\''+campo_estado+'\')" class="list-group-item">'+campo_cp+'</a>'; 
                          });
                      }else{
                        str_html_search += '<a href="#" class="list-group-item"><p>No se encontraron registros ...</p></a>';
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
                      
                      str_html_search = '<div class="list-group" style="height:100px; overflow: auto;">';                      
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
                        str_html_search += '<a href="#" class="list-group-item"><p>No se encontraron registros ...</p></a>';
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

                            setTimeout(function(){
                                @if( $peticion == 'catalogo/clientes/' . $id_cliente .'/edit' )
                                    location.href = '{{ url('catalogo/clientes') }}';
                                @else 
                                    location.href = '{{ url('clientes') }}';
                                @endif
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

    var getTipoPersona = function(){

    	if($('#forma_juridica').val()==1){
    		$('.pm').hide();
  	    	$('.pf').show();
    	}else{
    		$('.pm').show();
  	    	$('.pf').hide();
    	}
    	
  	    
    }

    var getDireccion = function(id_cp,ruta,obj_cp,obj_estado,obj_municipio,obj_colonia){

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
                  var attr_selec = '';
                 
                  $(obj_estado).val(estado);//muestra el valor del estado de acuerdo al cp
                  
                  $(obj_municipio).val(Municipio);//muestra el valor del estado de acuerdo al cp

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
              
              inicio              = true;              
              obj_genero_contacto = null;


              $.each(value,function(k,v){
                if(inicio){ 
                  v = (v==null)?'':v; 
                  template_aux  = template_contacto_inicio.replace('{'+k+'}',v);                  
                  template_real =  template_aux;

                  if(k == 'genero_con'){                     
                      str_aux_genero = getGeneroContacto(v);                      
                     template_aux = template_real.replace('{genero_con_add}',str_aux_genero); 
                  }

                  template_real = template_aux; 

                  inicio = false;
                }else{ 
                  v = (v==null)?'':v; 
                  template_aux = template_real.replace('{'+k+'}',v);
                  template_real = template_aux;                  
                  if(k == 'genero_con'){                     
                      str_aux_genero = getGeneroContacto(v);                      
                     template_aux = template_real.replace('{genero_con_add}',str_aux_genero); 
                  }

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

  var setContactoPrincipal = function(obj){
      posicion_contacto        = $('.seleccion_contacto').index(obj);
      contacto_principal       = $('.set-contacto-principal').get(posicion_contacto); 
      longitud_contactos       = $('.seleccion_contacto').length;
      for(i=0; i < longitud_contactos; i++ ){

          if(posicion_contacto != i){
              obj_contact = $('.set-contacto-principal').get(i);
              obj_contact.value=0;
          }else{
              contacto_principal.value = 1;            
          }
      }
      

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

  var getGeneroContacto = function(valor){ 
    var str_select = '';
    if(valor == 1){
      str_select = '{{ Form::select("genero_con[]",["1"=>"Masculino","2"=>"Femenino","0"=>"Selecciona una opci&oacute;n"],null,["class"=>"form-control class-generon-contacto","data-live-search"=>"true","data-parsley-group"=>"wizard-step-1","data-style"=>"btn-white","data-size"=>"10","id"=>"genero_con"]) }}';
      
    }
    if(valor == 2){
      str_select = '{{ Form::select("genero_con[]",["2"=>"Femenino","1"=>"Masculino","0"=>"Selecciona una opci&oacute;n"],null,["class"=>"form-control class-generon-contacto","data-live-search"=>"true","data-parsley-group"=>"wizard-step-1","data-style"=>"btn-white","data-size"=>"10","id"=>"genero_con"]) }}';
    }
    if(valor == 0){
      str_select = '{{ Form::select("genero_con[]",["0"=>"Selecciona una opci&oacute;n","1"=>"Masculino","2"=>"Femenino"],null,["class"=>"form-control class-generon-contacto","data-live-search"=>"true","data-parsley-group"=>"wizard-step-1","data-style"=>"btn-white","data-size"=>"10","id"=>"genero_con"]) }}';
    }

    return str_select;

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

  var addContacto = function(){
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
      contacto      = contacto.replace('{apellido_paterno_con}','');
      contacto      = contacto.replace('{apellido_materno_con}','');
      contacto      = contacto.replace('{genero_con_add}',getGeneroContacto(0));

      
      $('#container-contacto').append(contacto);
      $('.telefono1').numeric();
      $('.telefono2').numeric();
      $('.celular1').numeric();
      $('.celular2').numeric();
      $('.ext1').numeric();
      $('.ext2').numeric();
  }

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

@endsection

@extends('layouts.masterMenuView')
@section('section')

<div class="content">
<ol class="breadcrumb ">
    <li><a href="javascript:;">Administrador</a></li> 
	    <!-- <li><a href="{{url('modulo/administrador/cuentas')}}">Cuentas</a></li> -->
		<li><a href="{{($url_referer == "EmpresasFacturadoras")?route('sig-erp-crm::EmpresasFacturadoras.index'):url('EmpresasMaquiladoras') }}">Empresas {{($url_referer == "EmpresasFacturadoras")?'Facturadoras':'Maquiladoras'}}</a></li>
		<li>Alta Empresa {{($url_referer == "EmpresasFacturadoras")?'Facturadoras':'Maquiladoras'}}</li>
   </ol>
<h1 class="page-header text-center">Empresas {{($url_referer == "EmpresasFacturadoras")?'Facturadoras':'Maquiladoras'}} <small>Alta</small></h1>
	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Empresas {{($url_referer == "EmpresasFacturadoras")?'Facturadoras':'Maquiladoras'}} <small>Alta</small></h4>
                        </div>
                        <div class="panel-body">
                        {!! Form::model($facturadora,
                        ['route'=>['sig-erp-crm::EmpresasFacturadoras.update',$facturadora],
                        'id'=>'empresa-fields', 'method'=>'PUT'])
                        !!}
                        <div><input type="hidden" name="TipoEmpresa" value="{{($url_referer == "EmpresasFacturadoras")?'FACTURADORA':'MAQUILADORA'}}"></div>
                         @include('administrador.empresas.empresa-fields')

                        {!! Form::close()!!}
                      
                       
                        
                        
   </div>
 </div>
@endsection
@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
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

    <script type="text/javascript">
        $('#searchcp').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'post',
                url  : '{{URL::to('CpEmpresaFac')}}',
                data :{'searchcp' :$value},
                success : function(data){
                    $('form-alta-empresa').html(data);
                }
            });
        });
    </script>
    <script type="text/javascript">
    	$(document).ready(function(){

            $("#mielemento2").css("display", "block");
            $("#mielemento").css("display", "none");
    //DESPLIEGA LOS VALORES DEL SELECTOR DE FORMA JURIDICA ---------

        @if($facturadora->FormaJuridica==2)
         $('.pm').show();
         $('.pf').hide();
         $('#apellido_materno').val('');
         $('#apellido_paterno').val('');
         $('#genero').val('');
         $('#fecha_nacimiento_pros').val('');
         $('#lugar_nacimiento').val('');
         $('#curp').val('');

         @elseif($facturadora->FormaJuridica==1)

         $('.pm').hide();
         $('.pf').show();
         $('#razon_social').val('');
         $('#fecha_constitucion').val('');
         $('#FechainicioOperaciones').val('');
         $('#registroMercantil').val('');
         $('#clase_pm').val('');

         @else
         $('.pm').hide();
         $('.pf').hide();
         $('#apellido_materno').val('');
         $('#apellido_paterno').val('');
         $('#genero').val('');
         $('#fecha_nacimiento_pros').val('');
         $('#lugar_nacimiento').val('');
         $('#curp').val('');
         $('#razon_social').val('');
         $('#fecha_constitucion').val('');
         $('#FechainicioOperaciones').val('');
         $('#registroMercantil').val('');
         $('#clase_pm').val('');

         @endif



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
 
 /*  
  $('#btn-alta-cliente').click(function(event){

    event.preventDefault();
    guardarCliente();
  });*/
//------------------------Esté jquery  OCULTA CAMPOS DE ACUERDO ALO SELECCIONADO EN EL SELECT DE FORMA JURIDICA (Personas fisicas y personas morales)
            $('#FormaJuridica').on('change',function(){




                var valor=this.value;//valor del option value

                //alert(valor);
                if(valor==2){

                    $('.pm').show();
                    $('.pf').hide();
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
                    $('#fecha_constitucion').val('');
                    $('#FechainicioOperaciones').val('');
                    $('#registroMercantil').val('');
                    $('#clase_pm').val('');


                }
                else{
                    $('.pm').hide();
                    $('.pf').hide();
                    $('#apellido_materno').val('');
                    $('#apellido_paterno').val('');
                    $('#genero').val('');
                    $('#fecha_nacimiento_pros').val('');
                    $('#lugar_nacimiento').val('');
                    $('#curp').val('');
                    $('#razon_social').val('');
                    $('#fecha_constitucion').val('');
                    $('#FechainicioOperaciones').val('');
                    $('#registroMercantil').val('');
                    $('#clase_pm').val('');


                }
                //alert(valor);

            });// end ohange

  //------------------------END Esté jquery  OCULTA CAMPOS DE ACUERDO ALO SELECCIONADO EN EL SELECT DE FORMA JURIDICA (Personas fisicas y personas morales)


   
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



//------------------------END Esté jquery  llena el select de nombre ejecutivo al darle clic al cliente asignado 
//------------------------- END DIRECCION COMERCIAL ---------------------------------------------------------------



//-------------------------- VALIDACION DE FORMULARIO ------------------------------//
$("#btn-alta-empresa").on("click",function(e){
//alert("tt");
    e.preventDefault();
      //guardarCliente();
   

    $("input[style*='border-color: #ff5b57']").keypress(function(){
      var name=this.name;
     $("#"+name).removeAttr('style','border-color: #ff5b57');;
        //$('#nombre_comercial').removeAttr('style','border-color: #ff5b57');

    });

    $("select[style*='border-color: #ff5b57']").click(function(){
      var name=this.name;
     // alert(name);
     $("#"+name).removeAttr('style','border-color: #ff5b57');;

        //$('#nombre_comercial').removeAttr('style','border-color: #ff5b57');

    });

//----------  END VALIDACION FORMULARIO ALTA CLIENTES APARTADO  CONTÁCTO------------------------------------------
    
});

//--------------------------end validacion -----------------------------------------//
  
  $('#curp').focus(function(){
        var nombre       = omitirAcentos($('#nombre_curp').val());
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
        var nombre       = omitirAcentos($('#nombre_curp').val());
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
    	
        var datos = $("#form-alta-empresa").serialize();
        var token = $('meta[name="csrf-token"]').attr('content');
        var num_id= $("#num_id").val();
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('EmpresasFacturadoras') }}/'+num,
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
                                    location.href = '{{ route("sig-erp-crm::EmpresasFacturadoras.index") }}';
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

  function searchCP(){
    $("#alerta-cp").html('<label style="color:#ff9100; font-size:18px;">	Buscando Código Postal..</label>');

    var token = $('meta[name="csrf-token"]').attr('content');
    let cp = $("#searchcp").val();
    console.log("searchcp: "+cp);
    var datos;
    var colonias;
    var items;
    $.ajax({
        headers: {'X-CSRF-TOKEN':token},
        url:'{{ url('Empleados_search_cp') }}',
        type:'GET',
        dataType: 'json',
        data: {cp:cp},
        success: function(response){
          datos = response.result.split("|");
          $("#State").val(datos[3]);
          $("#IdEstado").val(datos[2]);
          $("#IdPais").val(datos[1]);
          $("#Localidad").val(datos[7]);
          $("#IdCodigoPostal").val(datos[0]);
          $("#municipio").val(datos[5]);
          $("#Colonia option").remove();
          colonias = datos[8].split(";");
          for (var i = 0; i < colonias.length; i++) {
            items+='<option value="'+colonias[i]+'">'+colonias[i]+'</option>'
          }
          $("#Colonia").prepend(items);
          $("#alerta-cp").html('');
          
          // $.each(response.regiones, function(index, value){
          //     llenar(response.regiones, index, value);
          // });

        },
        error : function(jqXHR, status, error) {
          $("#alerta-cp").html('');
        }

    });

}


    </script>



@endsection
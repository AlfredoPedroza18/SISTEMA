@extends('layouts.masterMenuView')

@section('section')



<div class="content">

<ol class="breadcrumb ">

      <li><a href="javascript:;">Administrador</a></li> 

	    <!-- <li><a href="{{url('modulo/administrador/cuentas')}}">Cuentas</a></li> -->

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

                               

                            </div>

                            <h4 class="panel-title">Departamentos <small>Alta</small></h4>

                        </div>

                        <div class="panel-body">

                       {!! Form::model($depCn,

                        ['route'=>['sig-erp-crm::departamentos.update',$depCn],

                        'id'=>'form-alta-departamento','method'=>'PUT'])

                        !!}

                       

                          @include('administrador.departamentos.alta-departamento')

                       {!! Form::close() !!}

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







  $.fn.delayPasteKeyUp = function(fn, ms)

  {

      var timer = 0;

      $(this).on("keyup paste", function()

      {

          clearTimeout(timer);

          timer = setTimeout(fn, ms);

      });

  };



    $('#colonia').focus(function(){

      $('#resultado_colonias').show();

   });



   $('#demo_dc_colonia').focus(function(){

      $('#result_search_dc_colonia').show();

   });

 



$("#btn-alta-departamento").on("click",function(event){

	event.preventDefault();

	guardarCliente();



});







      /******************************************************************************************

                                AUTCOMPLETAR CP

        ******************************************************************************************/

        $('#cp').delayPasteKeyUp(function(){



          longitud_cp   = ($('#cp').val()).length;

          aux_cp        = $('#cp').val();

          inicio_cp     = aux_cp.substr(0,1);

          parametro_cp  = (inicio_cp == '0') ? aux_cp.substr(1) : $('#cp').val(); 

          

          if($.trim($('#cp').val()) != '' && longitud_cp > 2){



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

                  $("#estado").val(estado);//muestra el valor del estado de acuerdo al cp

                  $("#municipio").val(Municipio);//muestra el valor del estado de acuerdo al cp



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

                  $("#estado").val(estado);//muestra el valor del estado de acuerdo al cp

                  $("#municipio").val(Municipio);//muestra el valor del estado de acuerdo al cp



                  $.each(colonias, function(resul,col) {

                  // alert(resul);

                   $('#df_colonia').append($('<option>', {value:resul, text:col}));



                   });



                });



         });



      }//end if

  }//end function



//---------------------------------------------- funcion para  llena olonias,estado,municipio al darle entetr CP 

  



  var selectedCP = function(cp,colonias,delegacion,estado){

    cp = cp.toString();    

    value_cp = (cp.length < 5) ? '0'+cp:cp;    

    $('#cp').val(value_cp);

    $("#estado").val(estado);//muestra el valor del estado de acuerdo al cp

    $("#municipio").val(delegacion);//muestra el valor del estado de acuerdo al cp

    $('#result_search').html('');

    $('#colonia').val('');





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

    $('#colonia').val(colonia);

    $('#resultado_colonias').hide();

  }



  var selectedColoniaDC = function(colonia){

    $('#demo_dc_colonia').val(colonia);

    $('#result_search_dc_colonia').hide();

  }

  



  var sizeTelefonos = function(telefono){

        tamanio = telefono.value;

        if(tamanio.length > 0 && tamanio.length < 10){          

           $(telefono).focus();

        }

  }



var guardarCliente = function(){

    	

        var datos = $("#form-edit-departamento").serialize();

        var token = $('meta[name="csrf-token"]').attr('content');

        var num_id= $("#num_id").val();

       // console.log(datos);

        $.ajax({

            headers: {'X-CSRF-TOKEN':token},

            url:'{{ url('departamentos') }}/'+num_id,

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

  

//------------------------END Esté jquery  llena el select de colonias,estado municipio al darle clic SELECT DE CP   

//------------------------- END DIRECCION FISCAL -------------------------------------------------------------------

     </script>


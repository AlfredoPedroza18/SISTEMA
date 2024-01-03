@extends('layouts.master')
@section('section')

<div id="content" class="content">
    <div class="panel panel-inverse " data-sortable-id="ui-widget-14" data-init="true">
        <div class="panel-heading hidden-print">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <?php
                /*<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>*/
                ?>
            </div>
            <h4 class="panel-title text-center table-responsive ">Cotizador<strong> 
            </strong></h4>
        </div>
        <div class="panel-body"> 

            <form  id="cotizador-general" data-validate="parsley">  
                <div class="row">

                    <div class="col-md-5 col-xs-12 col-sm-12">
                        <div class="form-group" id="cotizador-id-cliente">
                            <label>Cliente</label><br>
                            <div class="input-group">
                                <select class="form-control" name="idcliente" id="idcliente" data-parsley-inputs="select" data-parsley-required="true">
                                    <option value='-1'>Selecciona un cliente...</option>
                                    @foreach($listaCN as $cliente)
                                    <option  value='{{$cliente->id}}' id='{{$cliente->id}}' data-tipo-cliente="{{ $cliente->tipo }}" data-tipo-cliente-nombre="{{ $cliente->nombre_comercial }}">{{ $cliente->nombre_comercial}}</option>                    
                                    @endforeach
                                </select>
                                <span class="input-group-addon"><i class="fa fa-1x fa-building"></i></span>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-12">
                        <div class="form-group">
                            <label>Servicio</label><br>
                            <div class="input-group">
                                <select class="js-example-basic-multiple-limit default-select2 form-control input-lg','data-live-search " data-style="btn-white" name="idservicio" id="idservicio">
                                    <option value='-1'>Selecciona un servicio...</option>
                                    @foreach($listadoServicios as $key=>$valor)
                                    <option  value='{{$key}}' id='{{$key}}'>{{ $valor->servicio}}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-addon"><i class="fa fa-1x fa-list"></i></span>
                            </div>
                            <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="{{ Auth::user()->id }}">                  

                        </div>
                    </div>
                    
                    <div class="col-md-1 col-md-offset-2 ">
                        <br>
                        <span class="hidden-print">
                            <a href="javascript:;" onclick="window.print()" class="btn  btn-success m-b-10" data-toggle="tooltip" title="Print"><i class="fa fa-print m-r-5" ></i> Print</a>
                        </span>
                    </div>
                </div><!--end row -->

                <div class="row" id="alerta-tipo-cliente">
                    <div class="col-md-12">
                        <div class="alert alert-warning fade in m-b-15 text-center">
                            <strong  id="nombre-tipo-prospecto">¡ Alerta NO se podran generar Ordenes de Servicio ! 
                                El cliente seleccionado es un prospecto. </strong>
                                <span class="close" data-dismiss="alert">×</span>
                            </div>
                        </div>
                    </div>
                    <div class="jumbotron" id="plantillas">
                        <div  id="contenedor-plan">
                        </div>


                    </div><!--end row-->

                </form>
                <input type="hidden" id="tipo_cliente_input">
            </div><!-- end panel body-->
        </div><!-- end panel-->
    </div><!-- end content-->

     @include('crm.cotizador.plantilla-cotizador-ese')
     @include('crm.cotizador.plantilla-cotizador-rys')
     @include('crm.cotizador.plantilla-cotizador-maquila')
     @include('crm.cotizador.plantilla-cotizador-psicometricas')

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

{!! Html::script('assets/plugins/select2/dist/js/select2.min.js')!!}
{!! Html::script('assets/js/sweetalert.min.js') !!}
{!! Html::script('assets/js/jquery.numeric.min.js') !!}
{!! Html::script('assets/js/sweetalert.min.js') !!}


 {!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
  {!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
  {!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
  {!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}


{!! Html::script('assets/plugins/parsley/dist/parsley.js') !!}

<script type="text/javascript">

  
       // $('#idservicio').select2(); //MUESTRA BUSCADORES EN LOS SELECTS
  var iniciarElementos=function(){
      //$('#idcliente').select2(); //MUESTRA BUSCADORES EN LOS SELECTS
     $("#num_estudios").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });//ingresa solo puros enteros
        $("#costo").numeric();//ingresa enteros y decimales
        $(".integer").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });
        $(".float").numeric({decimalPlaces: 2});//ingresa enteros y decimales

  }
      

$(document).ready(function(){

    $('#alerta-tipo-cliente').hide();

  $('#idcliente').change(function(){
      var tipo_cliente         = $(this).find(':selected').attr('data-tipo-cliente');       
      $("#tipo_cliente_input").val(tipo_cliente);      

      if( tipo_cliente != 1 ){
        $('#alerta-tipo-cliente').hide();
      }else{
        $('#alerta-tipo-cliente').show();
      }
  });
  
 
/* ****************  segun el tipo de servicio muestra el cotizador ********************* */
  $("#idservicio").on('change',function(){
    var id_cliente   = $('#idcliente').val();
    

    if(id_cliente != -1){

            var id=this.value;

            if(id==0){//servicio ese
              var bandera=null;
              var ese="<div  id='contenedor-plan'>"+$("#ese").html()+"</div>";
              $("#contenedor-plan").remove();
              $("#plantillas").append(ese);
              iniciarElementos();
              CostoEse();
              CotizadorEse();
              getSelectsEse();
              
              
            }
            if(id==1){//servicio rys
              var rys="<div  id='contenedor-plan'>"+$("#rys").html()+"</div>";
              $("#contenedor-plan").remove();
              $("#plantillas").append(rys);
              iniciarElementos();   
              servicio_rys();
            }
            if(id==2){//servicio maquila
              var maquila="<div  id='contenedor-plan'>"+$("#maquila").html()+"</div>";
              $("#contenedor-plan").remove();
              $("#plantillas").append(maquila);
              iniciarElementos();  
              
             listarPlanMaquila();

              servicio_maquila();
            }
            if(id==3){//servicio psicometrico
              var psico="<div  id='contenedor-plan'>"+$("#psicometrico").html()+"</div>";
              $("#contenedor-plan").remove();
              $("#plantillas").append(psico);
              iniciarElementos();  
              cotizaPsico();
              costoPsico();
              GuardarCotiPsico();  
              GuardarOsPsicometricos();            
            }
    }else{
      swal('¡ Seleccione un cliente por favor !','Es necesario seleccionar un cliente para realizar una cotización','warning');
      $('#idcliente').focus();
      $('#idservicio option[value="-1"]').attr('selected','selected');       
    }

  });
/* ****************  END TIPO DE COTIZADOR ********************* */


    

});

var listarPlanMaquila=function(){
  $("#paquete_maquila").on('change',function(){
        var idpa=this.value;
        var token=$('meta[name="csrf-token"]').attr('content');
           $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('listaPaqueteMaqDescripcion') }}',
            type:'GET',
            dataType: 'json',
            data: {"id_paquete":idpa},
            success: function(response){ 
     
                  if(response.status == 'ok'){
                    
                      $('#maq').show();
                      $('#titulo').html(response.descripcion[0].nombre);
                      $("#contenido").html("<pre>"+response.descripcion[0].descripcion+"</pre>");
                       
                  
                    }else if(response.status == 'false'){
                        swal({   
                                title: "<h3>¡ No se encontraron valores en la Base de datos !</h3> ",
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
    });//end if de validacion de costo
}



/* ---------------------------- COTIZADOR ESE -----------------------------------  */
var CostoEse=function(){ /* 
  $("#tipo_estudio_ese").on('change',function(){
    //alert(this.value);
        var tipo_estudio_ese=this.value;
        var idcliente=$("#idcliente").val();
    var idservicio=$("#idservicio").val();
        //var tipo_estudio_ese=$("#tipo_estudio_ese").val();
        var num_estudios_ese=$("#num_estudios_ese").val();
        var costo_ese=$("#costo_ese").val();
        var iduser=$("#iduser").val();
        var ruta=null;
         
         if(tipo_estudio_ese==9)
         {
          $('#costo_ese').removeAttr("readonly");
         }
         else{
          $('#costo_ese').attr("readonly","readonly");
         }
         
         if(tipo_estudio_ese==8){
              ruta='{{ url('listaReferenciaLaborales') }}';
            } 
              else{
            ruta='{{ url('ESE') }}';
            }
       if(tipo_estudio_ese==8 && num_estudios_ese!=''){
          $.ajax({ //pelonete
              url:ruta,
              type:'GET',
              dataType: 'json',
              data:{
                  idcliente:idcliente,
                  idservicio:idservicio,
                  tipo_estudio_ese:tipo_estudio_ese,
                  num_estudio_ese:num_estudios_ese
                    },
                     success:function(response){
                             if(response.status_alta=="success")
                             if(tipo_estudio_ese==8){
                              $("#costo_ese").val(response.porcentaje_servicio);
                             }
                             else{
                              $("#costo_ese").val(response.costo);
                          }
                    },
                    error:function(jqXHR, status, error) {
                      swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                     }
                                  });
       }
         if(tipo_estudio_ese!=8 && tipo_estudio_ese!='-1'){
           $.ajax({
              url:ruta,
              type:'GET',
              dataType: 'json',
              data:{
                  idcliente:idcliente,
                  idservicio:idservicio,
                  tipo_estudio_ese:tipo_estudio_ese,
                  num_estudio_ese:num_estudios_ese
                    },
                     success:function(response){
                             if(response.status_alta=="success")
                             if(tipo_estudio_ese==8){
                              $("#costo_ese").val(response.porcentaje_servicio);
                             }
                             else{
                              $("#costo_ese").val(response.costo);
                          }
                    },
                    error:function(jqXHR, status, error) {
                      swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo 1+2');
                     }

             });

         }
        $("#num_estudios_ese").focus();
          
       });

  $("#num_estudios_ese").keyup(function(){
    if(this.value==''){
     $("#num_estudios_ese").focus();
    
    }

    selectCotizar();

  })
    
*/}




/***************************************************************************************************
****************************************************************************************************
****************************************************************************************************
                                      INICIO SERVICIO RYS            
****************************************************************************************************
****************************************************************************************************
***************************************************************************************************/


var servicio_rys = function(){

/******************************************************************************************/
/******************************** PUESTO REQUERIDO ****************************************/
/******************************************************************************************/

    $('#puesto_requerido_rys').blur(function(){
        var tipo_puesto = $.trim((this.value).toLowerCase());

        if(tipo_puesto=='especial'){
            $('#porcentaje_rys').removeAttr('disabled');
        }else{
            $('#porcentaje_rys').attr('disabled','disabled');
        }
    });


/******************************************************************************************/
/******************************************************************************************/
/******************************************************************************************/

    $('#sueldo_mensual_rys').blur(function(){

        
        var numero_vacantes_rys     = $('#num_vacates_rys').val();
        var puesto_requerido_rys    = $.trim($('#puesto_requerido_rys').val()).toLowerCase(); 
        var sueldo_mensual_rys      = this.value; 
        var porcentaje              = 0.00;
        var subtotal                = 0.00;
        var iva                     = 0.00;
        var total                   = 0.00;

        
        
        if(numero_vacantes_rys<=0){            
            $('#num_vacates_rys').focus();
            //$('#vacantes_rys_message').addClass('has-error')
            swal('¡ Debe de asignar un número válido de vacantes !','','warning');
        }else if(puesto_requerido_rys != 'especial'){            
            $.ajax({
                url: '{{ url('genera_costo_rys') }}',
                type:'GET',
                dataType: 'json',
                data:{numero_vacantes_rys:numero_vacantes_rys},
                success:function(response){
                    porcentaje = (response.porcentaje/100);
                    subtotal   = (sueldo_mensual_rys*porcentaje)*numero_vacantes_rys;
                    iva        = (subtotal*0.16);
                    total      = subtotal + iva;
                    $('#porcentaje_rys').val(response.porcentaje);
                    
                    /*$('#propuesta_economica_precio_rys').html('$ '+subtotal.toFixed(2));
                    $('#iva_precio_rys').html(iva.toFixed(2));                    
                    $('#servicio_total_rys').html('$ '+total.toFixed(2));

                    $('#total_rys').val(total.toFixed(2));
                    $('#iva_rys').val(iva.toFixed(2));
                    $('#propuesta_econonimca_rys').val(subtotal.toFixed(2));                   
                    */

                },
                error : function(jqXHR, status, error) {
                            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                }
            });
        }

        if(puesto_requerido_rys == 'especial'){
            $('#porcentaje_rys').removeAttr('disabled');
        }
        
    });

    $('#puesto_requerido_rys').blur(function(){
        $('#sueldo_mensual_rys').focus();
    });

    $('#porcentaje_rys').blur(function(){

        if(this.value == 0){
            $(this).focus();
            swal('¡ Debe colocar un porcentaje !','','warning');
        }else{
            var numero_vacantes_rys     = $('#num_vacates_rys').val();
            var puesto_requerido_rys    = $.trim($('#puesto_requerido_rys').val()).toLowerCase(); 
            var sueldo_mensual_rys      = $('#sueldo_mensual_rys').val();
            var porcentaje              = (this.value/100);
            var subtotal                = (sueldo_mensual_rys*porcentaje)*numero_vacantes_rys;;
            var iva                     = (subtotal*0.16);
            var total                   = subtotal + iva;


            //$('#porcentaje_rys').val(response.porcentaje);
/*
            $('#propuesta_economica_precio_rys').html('$ '+subtotal.toFixed(2));
            $('#iva_precio_rys').html('$ '+iva.toFixed(2));                    
            $('#servicio_total_rys').html('$ '+total.toFixed(2));
            $('#total_rys').val(total.toFixed(2));
            $('#iva_rys').val(iva.toFixed(2));
            $('#propuesta_econonimca_rys').val(subtotal.toFixed(2));*/
        }
    });

    $('#id_plantilla_rys').hide();
    $('#btn-partida-rys').click(function(event){
        event.preventDefault();
        var valida_rys_vacantes   = $('#num_vacates_rys').val();
        var valida_rys_puesto     = $('#puesto_requerido_rys').val();
        var valida_rys_sueldo     = $('#sueldo_mensual_rys').val();
        var valida_rys_porcentaje = $('#porcentaje_rys').val();

        valida_rys_vacantes       = isNaN(valida_rys_vacantes)    ? 0 : valida_rys_vacantes;
        valida_rys_puesto         = $.trim(valida_rys_puesto);
        valida_rys_sueldo         = isNaN(valida_rys_sueldo)      ? 0 : valida_rys_sueldo;
        valida_rys_porcentaje     = isNaN(valida_rys_porcentaje)  ? 0 : valida_rys_porcentaje;


        if(valida_rys_vacantes > 0 && valida_rys_puesto != '' && valida_rys_sueldo > 0 && valida_rys_porcentaje > 0 ){
            agregar_partida_rys();
            calcularServicioRys();          
        }else{
          swal('¡Llene los campos correctamente!','No se puede realizar la cotización','warning');
        }
    });


    $('#num_vacates_rys').blur(function(){
        
        var numero_vacantes_rys     = this.value;
        var puesto_requerido_rys    = $.trim($('#puesto_requerido_rys').val()).toLowerCase(); 
        var sueldo_mensual_rys      = $('#sueldo_mensual_rys').val();
        var porcentaje              = 0.00;
        var subtotal                = 0.00;
        var iva                     = 0.00;
        var total                   = 0.00;


        if( (sueldo_mensual_rys != 0 ) && (numero_vacantes_rys != 0 ) ){
             $.ajax({
                url: '{{ url('genera_costo_rys') }}',
                type:'GET',
                dataType: 'json',
                data:{numero_vacantes_rys:numero_vacantes_rys},
                success:function(response){
                    porcentaje = (response.porcentaje/100);
                    subtotal   = (sueldo_mensual_rys*porcentaje)*numero_vacantes_rys;
                    iva        = (subtotal*0.16);
                    total      = subtotal + iva;
                    /*
                    $('#porcentaje_rys').val(response.porcentaje);
                    $('#propuesta_economica_precio_rys').html('$ '+subtotal.toFixed(2));
                    $('#iva_precio_rys').html('$ '+iva.toFixed(2));                    
                    $('#servicio_total_rys').html('$ '+total.toFixed(2));
                    $('#total_rys').val(total.toFixed(2));
                    $('#iva_rys').val(iva.toFixed(2));
                    $('#propuesta_econonimca_rys').val(subtotal.toFixed(2));
                    */

                    


                },
                error : function(jqXHR, status, error) {
                            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                }
            });
        }

    });

    /******************************************************************************************/
    /******************************************************************************************/
    /******************************************************************************************/
    $('#puesto_requerido_rys').blur(function(){

        var numero_vacantes_rys     = $('#num_vacates_rys').val();
        var puesto_requerido_rys    = $.trim(this.value).toLowerCase(); 
        var sueldo_mensual_rys      = $('#sueldo_mensual_rys').val();
        var porcentaje              = 0.00;
        var subtotal                = 0.00;
        var iva                     = 0.00;
        var total                   = 0.00;

    });


    $('#btn_cotizar_rys').click(function(event){
        event.preventDefault();
        var cliente         = $('#idcliente').val();
        var numero_vacantes = $('#num_vacates_rys').val();
        var sueldo_mensual  = $('#sueldo_mensual_rys').val();
        var porcentaje      = $('#porcentaje_rys').val();
        var puesto          = $.trim($('#puesto_requerido_rys').val());
        

        if( (cliente != -1 ) && ( numero_vacantes > 0) && ( sueldo_mensual > 0) && (porcentaje > 0) && (puesto != '') ){
            calcularServicioRys();
            guardarCotizacionRYS();
        }else{
            //$('#idcliente').focus();
            (cliente == -1)         ? $('#cotizador-id-cliente').addClass('has-error')  :$('#cotizador-id-cliente').removeClass('has-error');
            (numero_vacantes <= 0)  ? $('#vacantes_rys_message').addClass('has-error')  :$('#vacantes_rys_message').removeClass('has-error');
            (sueldo_mensual  <= 0)  ? $('#sueldo_rys_message').addClass('has-error')    :$('#sueldo_rys_message').removeClass('has-error');
            (porcentaje      <= 0)  ? $('#porcentaje_rys_message').addClass('has-error'):$('#porcentaje_rys_message').removeClass('has-error'); 
            (puesto         == '')  ? $('#puesto_rys_message').addClass('has-error')    :$('#puesto_rys_message').removeClass('has-error');

            swal({
                  title: '¡ Por favor llene los campos correctamente !',
                  text: "",
                  timer: 2000,
                  showConfirmButton: false,
                  type: "warning"
            });

        }


    });


    $('#btn-guardar-os-rys').click(function(event){ 
        event.preventDefault();
        var cliente         = $('#idcliente').val();
        var numero_vacantes = $('#num_vacates_rys').val();
        var sueldo_mensual  = $('#sueldo_mensual_rys').val();
        var porcentaje      = $('#porcentaje_rys').val();
        var puesto          = $.trim($('#puesto_requerido_rys').val());
        

        if( (cliente != -1 ) && ( numero_vacantes > 0) && ( sueldo_mensual > 0) && (porcentaje > 0) && (puesto != '') ){
            calcularServicioRys();
            guardarOrdenServicioRYS();
        }else{
            //$('#idcliente').focus();
            (cliente == -1)         ? $('#cotizador-id-cliente').addClass('has-error')  :$('#cotizador-id-cliente').removeClass('has-error');
            (numero_vacantes <= 0)  ? $('#vacantes_rys_message').addClass('has-error')  :$('#vacantes_rys_message').removeClass('has-error');
            (sueldo_mensual  <= 0)  ? $('#sueldo_rys_message').addClass('has-error')    :$('#sueldo_rys_message').removeClass('has-error');
            (porcentaje      <= 0)  ? $('#porcentaje_rys_message').addClass('has-error'):$('#porcentaje_rys_message').removeClass('has-error'); 
            (puesto         == '')  ? $('#puesto_rys_message').addClass('has-error')    :$('#puesto_rys_message').removeClass('has-error');

            swal({
                  title: '¡ Por favor llene los campos correctamente !',
                  text: "",
                  timer: 2000,
                  showConfirmButton: false,
                  type: "warning"
            });

        }


    });


}


var guardarCotizacionRYS = function(){ 
    var token                   = $('meta[name="csrf-token"]').attr('content');
    var numero_vacantes_rys     = $('#num_vacates_rys').val();
    var puesto_requerido_rys    = $('#puesto_requerido_rys').val();
    var sueldo_mensual_rys      = $('#sueldo_mensual_rys').val();
    var porcentaje              = $('#porcentaje_rys').val();
    var subtotal                = $('#propuesta_econonimca_rys').val();
    var iva                     = $('#iva_rys').val();
    var total                   = $('#total_rys').val();
    var id_cn                   = '{{ Auth::user()->idcn }}';
    var id_usuario              = '{{ Auth::user()->id }}';
    var cliente                 = $('#idcliente').val();
    var id_servicio             = $('#idservicio').val();
    var lista_rys_num_vacantes  = $('#lista_rys_num_vacantes').val(); 
    var lista_rys_puesto        = $('#lista_rys_puesto').val(); 
    var lista_rys_sueldo_mensual= $('#lista_rys_sueldo_mensual').val(); 
    var lista_rys_porcentaje    = $('#lista_rys_porcentaje').val(); 
    var lista_rys_total_partida = $('#lista_rys_total_partida').val(); 
    var garantia_rys = $('#garantia_rys').val(); 

    

    $.ajax({
        headers: {'X-CSRF-TOKEN':token},
        url:'{{ route('sig-erp-crm::servicio_rys.store') }}',
        type:'POST',
        dataType:'json',
        data:{
            id_cn:id_cn,
            id_usuario:id_usuario,
            id_cliente:cliente,
            id_servicio:id_servicio,
            subtotal:subtotal,
            iva:iva,
            total:total,
            garantia_rys:garantia_rys,

            cantidad_vacantes:numero_vacantes_rys,
            puesto_requerido:puesto_requerido_rys,
            sueldo_mensual:sueldo_mensual_rys,
            porcentaje:porcentaje,
            propuesta_economica:subtotal,

            lista_num_vacantes:lista_rys_num_vacantes,
            lista_puesto:lista_rys_puesto,
            lista_sueldo_mensual:lista_rys_sueldo_mensual,
            lista_porcentaje:lista_rys_porcentaje,
            lista_total_partida:lista_rys_total_partida

        },
        success:function(response){
            swal({
                  title: "! El registro se guardo con éxito !",
                  text: "",
                  timer: 2000,
                  showConfirmButton: false,
                  type: "success"
            });

            setTimeout(function(){     location.reload();   }, 1000);
        },
        error : function(jqXHR, status, error) {
                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
        }
    });
}


var guardarOrdenServicioRYS = function(){

        tipo_cliente = $("#tipo_cliente_input").val();

        if( tipo_cliente != 1 ){

            var token                   = $('meta[name="csrf-token"]').attr('content');
            var numero_vacantes_rys     = $('#num_vacates_rys').val();
            var puesto_requerido_rys    = $('#puesto_requerido_rys').val();
            var sueldo_mensual_rys      = $('#sueldo_mensual_rys').val();
            var porcentaje              = $('#porcentaje_rys').val();
            var subtotal                = $('#propuesta_econonimca_rys').val();
            var iva                     = $('#iva_rys').val();
            var total                   = $('#total_rys').val();
            var id_cn                   = '{{ Auth::user()->idcn }}';
            var id_usuario              = '{{ Auth::user()->id }}';
            var cliente                 = $('#idcliente').val();
            var id_servicio             = $('#idservicio').val();
            var lista_rys_num_vacantes  = $('#lista_rys_num_vacantes').val(); 
            var lista_rys_puesto        = $('#lista_rys_puesto').val(); 
            var lista_rys_sueldo_mensual= $('#lista_rys_sueldo_mensual').val(); 
            var lista_rys_porcentaje    = $('#lista_rys_porcentaje').val(); 
            var lista_rys_total_partida = $('#lista_rys_total_partida').val(); 
            var garantia_rys = $('#garantia_rys').val(); 

            

            $.ajax({
                headers: {'X-CSRF-TOKEN':token},
                url:"{{ route('sig-erp-crm::orden-servicio-rys.store') }}",
                type:'POST',
                dataType:'json',
                data:{
                    id_cn:id_cn,
                    id_usuario:id_usuario,
                    id_cliente:cliente,
                    id_servicio:id_servicio,
                    subtotal:subtotal,
                    iva:iva,
                    total:total,
                    garantia_rys:garantia_rys,

                    cantidad_vacantes:numero_vacantes_rys,
                    puesto_requerido:puesto_requerido_rys,
                    sueldo_mensual:sueldo_mensual_rys,
                    porcentaje:porcentaje,
                    propuesta_economica:subtotal,

                    lista_num_vacantes:lista_rys_num_vacantes,
                    lista_puesto:lista_rys_puesto,
                    lista_sueldo_mensual:lista_rys_sueldo_mensual,
                    lista_porcentaje:lista_rys_porcentaje,
                    lista_total_partida:lista_rys_total_partida

                },
                success:function(response){
                    swal({
                          title: "! El registro se guardo con éxito !",
                          text: "",
                          timer: 2000,
                          showConfirmButton: false,
                          type: "success"
                    });

                    setTimeout(function(){     location.reload();   }, 1000);
                },
                error : function(jqXHR, status, error) {
                        swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                }
            });

        }

}


var agregar_partida_rys = function(){
  
  str_plantilla_maquila               = $('#id_plantilla_rys').html();
  var num_vacantes_rys_partida         = $('#num_vacates_rys').val();  
  var puesto_requerido_rys_partida    = $('#puesto_requerido_rys').val();  
  var sueldo_mensual_rys_partida      = $('#sueldo_mensual_rys').val();
  var porcentaje_rys_partida          = $('#porcentaje_rys').val();
  
  
  
   
  if(false){
    swal('¡Debes seleccionar un paquete!','No se puede realizar una cotización','warning');
  }else{

      

      precio_partida_rys      = (porcentaje_rys_partida/100) * (sueldo_mensual_rys_partida * num_vacantes_rys_partida);
      str_aux_partida         = str_plantilla_maquila.replace('{vacantes_rys_partida}'    , num_vacantes_rys_partida);
      str_plantilla_maquila   = str_aux_partida.replace('{puesto_rys_partida}'            , puesto_requerido_rys_partida);
      str_aux_partida         = str_plantilla_maquila.replace('{sueldo_rys_partida}'      , sueldo_mensual_rys_partida);      
      str_plantilla_maquila   = str_aux_partida.replace('{add-class-partida-rys}'             , 'numero-de-partida-rys');
      str_aux_partida         = str_plantilla_maquila.replace('{porcentaje_rys_partida}'  , porcentaje_rys_partida);
      str_plantilla_maquila   = str_aux_partida.replace('{subtotal_rys_partida}'          , precio_partida_rys);

      $('#partidas_rys').append(str_plantilla_maquila);    

  }
}

var eliminarPartidaRys = function(obj){  
    var indice_partida        = $('.eliminar-partida-rys').index(obj);
    var html_partida_maquila  = $('.numero-de-partida-rys').get(indice_partida);
    $(html_partida_maquila).remove();
    calcularServicioRys();
    
}

var calcularServicioRys = function(){
      longitud_partidas_rys   = $('.num_vacantes_rys_partida').length;
      
      var total_vacantes_rys        = 0.00;
      var total_cotizacion_rys      = 0.00;
      var subt_total_cotizacion_rys = 0.00;
      var iva_cotizacion_rys        = 0.00;
      var arr_rys_num_vacantes      = new Array();
      var arr_rys_puesto            = new Array();
      var arr_rys_sueldo_mensual    = new Array();
      var arr_rys_porcentaje        = new Array();
      var arr_rys_total_partida     = new Array();

      
      for(i=0; i< longitud_partidas_rys; i++){
                  vacantes_rys_aux = $('.num_vacantes_rys_partida').get(i);


                if(vacantes_rys_aux.value != '{vacantes_rys_partida}'){ 
                      puesto_partida_rys           = $('.puesto_requerido_rys_partida').get(i);
                      sueldo_partida_rys           = $('.sueldo_mensual_rys_partida').get(i);
                      porcentaje_partida_rys       = $('.porcentaje_rys_partida').get(i);
                      subtotal_partida_rys         = $('.subtotal_rys_partida').get(i);
                       

                      num_vacantes_rys_aux = parseInt(vacantes_rys_aux.value);
                      sueldo_rys_aux       = parseFloat(sueldo_partida_rys.value);        
                      porcentaje_rys_aux   = parseFloat(porcentaje_partida_rys.value);        
                      subtotal_rys_aux     = parseFloat(subtotal_partida_rys.value);
                      puesto_rys_aux       = puesto_partida_rys.value;        

                      total_vacantes_rys        += num_vacantes_rys_aux;                    
                      aux_subtotal_partida      = (num_vacantes_rys_aux * sueldo_rys_aux) * (porcentaje_rys_aux/100);
                      subt_total_cotizacion_rys += aux_subtotal_partida;

                      aux_iva_rys         = aux_subtotal_partida * 0.16;
                      iva_cotizacion_rys  += aux_iva_rys;

                      total_cotizacion_rys += aux_iva_rys + aux_subtotal_partida;


                      arr_rys_num_vacantes.push(num_vacantes_rys_aux);
                      arr_rys_puesto.push(puesto_rys_aux);
                      arr_rys_sueldo_mensual.push(sueldo_rys_aux);
                      arr_rys_porcentaje.push(porcentaje_rys_aux);
                      arr_rys_total_partida.push(aux_subtotal_partida);

                  }
      }
      
      $('#propuesta_economica_precio_rys').html('$ '+number_format(subt_total_cotizacion_rys,2));
      $('#iva_precio_rys').html('$ '+number_format(iva_cotizacion_rys,2));                    
      $('#servicio_total_rys').html('$ '+number_format(total_cotizacion_rys,2));



      $('#propuesta_econonimca_rys').val(subt_total_cotizacion_rys);
      $('#iva_rys').val(iva_cotizacion_rys);
      $('#total_rys').val(total_cotizacion_rys);


      $('#lista_rys_num_vacantes').val(arr_rys_num_vacantes.join(','));
      $('#lista_rys_puesto').val(arr_rys_puesto.join(','));
      $('#lista_rys_sueldo_mensual').val(arr_rys_sueldo_mensual.join(','));
      $('#lista_rys_porcentaje').val(arr_rys_porcentaje.join(','));
      $('#lista_rys_total_partida').val(arr_rys_total_partida.join(','));
      
}


/***************************************************************************************************
****************************************************************************************************
****************************************************************************************************
                                      FIN SERVICIO RYS            
****************************************************************************************************
****************************************************************************************************
***************************************************************************************************/


var servicio_maquila = function(){

    $('#habilitar-costo-unitario').click(function(){
        $('#costo_unitario_maquila').removeAttr('readonly');
    });

    $('#paquete_maquila').change(function(){
        var numero_empleados = $('#num_empleados_maquila').val();
        numero_empleados     = isNaN(numero_empleados) ? 0 : numero_empleados;
        var paquete          = this.value;

        if(paquete != 5){ 
            $('#costo_unitario_maquila').attr('disabled','disabled');
            if(numero_empleados <= 0){
                $('#num_empleados_maquila').focus();
                //swal('Hijole hermano no puedo decirte cuanto es hasta que pongas la cantidad de empleados');            
            }else if(paquete != -1){
                cotizar_maquila();
            }
        }else{            
            $('#costo_unitario_maquila').removeAttr('disabled');
            if(numero_empleados > 0){
                cotizar_maquila_2();
            }else{
                $('#num_empleados_maquila').focus();
            }
            //alert(paquete);
        }


    });

    $('#num_empleados_maquila').blur(function(){
        var paquete             = $('#paquete_maquila').val();
        var cantidad_empleados  = parseInt(this.value);

        cantidad_empleados      = isNaN(cantidad_empleados) ? 0:cantidad_empleados;     
        
        if(paquete != 5 ){

            if(paquete != -1 && cantidad_empleados > 0 ){            
                cotizar_maquila();
            }else if(cantidad_empleados <= 0){
                //swal('Chanfle... pon un una cantidad');
            }else{
                //swal('ÑOOOO te falta seleccionar un paquete');
            }
        }else{
            if(cantidad_empleados > 0){
                cotizar_maquila_2();
            }
        }
    });

    /***************************************************
                AGREGAR PARTIDA MAQUILA
    ***************************************************/

    $('#id_plantilla_maquila').hide();

    $('#btn-partida-maquila').click(function(event){
        //pelonete
        event.preventDefault();
        agregar_partida_maquila();
        calcularServicioMaquila();
    });


    $('#btn-cotizacion-maquila').click(function(event){
        event.preventDefault();
        calcularServicioMaquila();        
        guardarCotizacionMaquila();
        
    });

    $('#btn-orden-servicio-maquila').click(function(event){
        event.preventDefault();
        calcularServicioMaquila();        
        guardarOrdenServicioMaquila();
        
    });
}


var calcularServicioMaquila = function(){
      longitud_partidas_maquila   = $('.tipo_paquete_maquila').length;
      total_cotizacion_maquila    = 0.00;
      subtotal_cotizacion_maquila = 0.00;
      iva_cotizacion_maquila      = 0.00;
      numero_empleados_partidas   = parseInt('0');
      var arr_maquila_paquete     = new Array();
      var arr_maquila_paemlpeados = new Array();
      var arr_maquila_costo_unit  = new Array();
      var arr_maquila_costo_tot   = new Array();
      /*var arr_maquila_paquete
      var arr_maquila_paquete
      */
      for(i=0; i< longitud_partidas_maquila; i++){
                var costo_maquila_partida = $('.costo_unitario_maquila').get(i);
                
                if(costo_maquila_partida.value != '{costo_unitario}'){
                    empleados_partida_maq        = $('.cantidad_empleados_maquila').get(i);
                    tipos_paq_maquila            = $('.tipo_paquete_maquila').get(i);
                    subtotal_partida_maq         = $('.costo_total_maquila').get(i);

                    costo_unitario_partida_maq = costo_maquila_partida.value;
                    add_empleados_maquila      = empleados_partida_maq.value;  
                    add_tipos_paquete_maq      = tipos_paq_maquila.value;
                    add_subtotal_maquila       = subtotal_partida_maq.value;

                    subtotal_cotizacion_aux      = empleados_partida_maq.value * costo_maquila_partida.value;
                    subtotal_cotizacion_maquila += empleados_partida_maq.value * costo_maquila_partida.value;                   
                    iva_cotizacion_maquila      += subtotal_cotizacion_aux * 0.16;  
                    numero_empleados_partidas   += empleados_partida_maq.value; 
                    total_partida_maquila       = (iva_cotizacion_maquila + subtotal_cotizacion_maquila);


                    arr_maquila_costo_unit.push(  costo_unitario_partida_maq  );
                    arr_maquila_paquete.push(     add_tipos_paquete_maq       );     
                    arr_maquila_paemlpeados.push( add_empleados_maquila       );                       
                    arr_maquila_costo_tot.push(   subtotal_cotizacion_aux     );
                      
                    //total_cotizacion_maquila    += subtotal_cotizacion_aux + iva_cotizacion_maquila;       
                                 
                  }
      }
      total_cotizacion_maquila = iva_cotizacion_maquila + subtotal_cotizacion_maquila;
      $('#html-subtotal-maquila').html('$ '+number_format(subtotal_cotizacion_maquila,2)); 
      $('#html-iva-maquila').html('$ '+number_format(iva_cotizacion_maquila,2)); 
      $('#html-total-maquila').html('$ '+number_format(total_cotizacion_maquila,2)); 

      $('#subtotal_maquila').val(subtotal_cotizacion_maquila.toFixed(2)); 
      $('#iva_maquila').val(iva_cotizacion_maquila.toFixed(2)); 
      $('#total_maquila').val(total_cotizacion_maquila.toFixed(2)); 

      $('#lista_sub_total_maquila').val(arr_maquila_costo_tot.join(','));
      $('#lista_empleados_maquila').val(arr_maquila_paemlpeados.join(','));
      $('#lista_paquetes_maquila').val(arr_maquila_paquete.join(','));
      $('#lista_costounitario_maquila').val(arr_maquila_costo_unit.join(','));


      
}

var cotizar_maquila  = function(){
    var cliente      = $('#idcliente').val();

    if(cliente != -1){
        var paquete      = $('#paquete_maquila').val();
        var no_empleados = parseInt($('#num_empleados_maquila').val());
        var url          = '{{ url('maquila_cotizador') }}';  
        no_empleados     = isNaN(no_empleados) ? 0  : no_empleados;
        

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            data: {num_empleados:no_empleados,paquete:paquete},
            success:  function(response){
                
                var sub_total = response.sub_total;
                var iva       = sub_total*0.16;
                var total     = iva + sub_total;
                $('#costo_unitario_maquila').val(response.costo);
                //$('#subtotal_maquila').val(sub_total);
               // $('#html-subtotal-maquila').html('$ '+sub_total);
                //$('#iva_maquila').val(iva);
               // $('#html-iva-maquila').html('$ '+number_format(iva,2));
                //$('#total_maquila').val(total);
               // $('#html-total-maquila').html('$ '+total);
                
            },
            error : function(jqXHR, status, error) {
                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
            }
        });
    }else{
        $('#idcliente').focus();
        swal('¡ Seleccione un cliente para realizar la cotización !','','warning');
    }
};

var cotizar_maquila_2 = function(){
    var id_cliente    = $('#idcliente').val(); 
    var paquete       = $('#paquete_maquila').val();
    var costo_maquila = parseInt($('#costo_unitario_maquila').val());
    var no_empleados  = parseInt($('#num_empleados_maquila').val());
    no_empleados      = isNaN(no_empleados) ? 0  : no_empleados;
    costo_maquila     = isNaN(costo_maquila) ? 0 : costo_maquila;
    var subtotal      = 0.00;
    var iva           = 0.00;
    var total         = 0.00;


    if(id_cliente != -1 ){
        subtotal = no_empleados * costo_maquila;
        
    }else{
        $('#idcliente').focus();
        swal('¡ Seleccione un cliente para realizar la cotización !','','warning');
    }
}

/*******************************************************************************************************
                        AGREGA LAS PARTIDAS PARA EL SERVICIO DE MAQUILA
********************************************************************************************************/
var agregar_partida_maquila = function(){
  
  str_plantilla_maquila               = $('#id_plantilla_maquila').html();
  var num_empleados_maquila_partida   = $('#num_empleados_maquila').val();  
  var costo_maquila_partida           = $('#costo_unitario_maquila').val();  
  var paq_maquila                     = $('#paquete_maquila').val();
  var precio_partida_maquila          = 0.00;
  var nombre_paquete_maquila          = ''; 
  
  
   
  if(paq_maquila == -1){
    swal('¡Debes seleccionar un paquete!','No se puede realizar una cotización','warning');
  }else{
    <?php 
    
     $i=0;
     $max=count($catalogoPaquetes);
    // dd($max);
    for($i;$i<$max;$i++){ ?>
        if(paq_maquila=='<?php echo  $catalogoPaquetes[$i]->id_maquila ?>'){ nombre_paquete_maquila ='<?php echo $catalogoPaquetes[$i]->nombre ?>' }
    <?php } ?>

      precio_partida_maquila  = num_empleados_maquila_partida * costo_maquila_partida;
      str_aux_partida         = str_plantilla_maquila.replace('{tipo_paquete}'    , paq_maquila);
      str_plantilla_maquila   = str_aux_partida.replace('{cantidad_empleados}'    , num_empleados_maquila_partida);
      str_aux_partida         = str_plantilla_maquila.replace('{costo_unitario}'  , costo_maquila_partida);      
      str_plantilla_maquila   = str_aux_partida.replace('{add-class-partida}'     , 'numero-de-partida');
      str_aux_partida         = str_plantilla_maquila.replace('{costo_total}'     , precio_partida_maquila);
      str_plantilla_maquila   = str_aux_partida.replace('{tipo_paquete_nombre}'   , nombre_paquete_maquila);
      

      $('#partidas_maquila').append(str_plantilla_maquila);    

  }
}

var eliminarPartidaMaquila = function(obj){

    var indice_partida        = $('.eliminar-partida-maquila').index(obj);
    var html_partida_maquila  = $('.numero-de-partida').get(indice_partida);
    $(html_partida_maquila).remove();
    calcularServicioMaquila();
    
}

var guardarCotizacionMaquila = function(){
    var id_cliente    = $('#idcliente').val(); 
    var paquete       = $('#paquete_maquila').val();
    var costo_maquila = parseInt($('#costo_unitario_maquila').val());
    var no_empleados  = parseInt($('#num_empleados_maquila').val());
    no_empleados      = isNaN(no_empleados) ? 0  : no_empleados;
    costo_maquila     = isNaN(costo_maquila) ? 0 : costo_maquila;
    var subtotal      = parseFloat($('#subtotal_maquila').val()).toFixed(2);
    var iva           = parseFloat($('#iva_maquila').val()).toFixed(2);
    var total         = parseFloat($('#total_maquila').val()).toFixed(2);
    var ruta_maquila  = '{{ route('sig-erp-crm::servicio_maquila.store') }}';
    var token         = $('meta[name="csrf-token"]').attr('content');
    var id_cn         = '{{ Auth::user()->idcn }}';
    var id_usuario    = '{{ Auth::user()->id }}';
    var idservicio    = $('#idservicio').val();
    var lista_sub_total_maquila     = $('#lista_sub_total_maquila').val();
    var lista_empleados_maquila     = $('#lista_empleados_maquila').val();
    var lista_paquetes_maquila      = $('#lista_paquetes_maquila').val();
    var lista_costounitario_maquila = $('#lista_costounitario_maquila').val();
      

    /*alert('id_usuario:'+id_usuario+' id_cn:'+id_cn+' id_servicio:'+idservicio+' id_cliente:'+id_cliente+ 'subtotal:'+subtotal+' iva:'+iva+' total:'+total+' id_paquete :'+paquete+' costo_unitario:'+costo_maquila+' num_empleados:'+no_empleados);
    */

    if( (id_cliente != -1) && (paquete != -1) && (costo_maquila > 0) && (no_empleados > 0) && (subtotal > 0) && (iva > 0) && (total > 0) ){
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
            url: ruta_maquila,
            type:'POST',
            dataType:'json',
            data:{  id_usuario:id_usuario,
                    id_cn:id_cn,
                    id_servicio:idservicio,
                    id_cliente:id_cliente,
                    subtotal:subtotal,
                    iva:iva,
                    total:total,
                    id_paquete :paquete,
                    costo_unitario:costo_maquila,
                    num_empleados:no_empleados,
                    lista_sub_total:lista_sub_total_maquila,
                    lista_empleados:lista_empleados_maquila,
                    lista_paquetes:lista_paquetes_maquila,
                    lista_costo_unitario:lista_costounitario_maquila
                  },
            success:function(response){
              if(response.resultado == 'ok'){

              swal('¡La cotización se guardo con éxito!','','success');
              setTimeout(function(){     location.reload();   }, 1000);
              }
            },
            error:function(jqXHR, status, error) {
              swal('Ocurrio un error comuniquese con los bodoques');
            }



        });


    }else{
      swal('Verifique bien los datos de la cotización','','warning');
    }

};


var guardarOrdenServicioMaquila = function(){
  //pepe rico

        tipo_cliente = $("#tipo_cliente_input").val();

        if( tipo_cliente != 1 ){
                var id_cliente    = $('#idcliente').val(); 
                var paquete       = $('#paquete_maquila').val();
                var costo_maquila = parseInt($('#costo_unitario_maquila').val());
                var no_empleados  = parseInt($('#num_empleados_maquila').val());
                no_empleados      = isNaN(no_empleados) ? 0  : no_empleados;
                costo_maquila     = isNaN(costo_maquila) ? 0 : costo_maquila;
                var subtotal      = parseFloat($('#subtotal_maquila').val()).toFixed(2);
                var iva           = parseFloat($('#iva_maquila').val()).toFixed(2);
                var total         = parseFloat($('#total_maquila').val()).toFixed(2);
                var ruta_maquila  = '{{ route('sig-erp-crm::orden-servicio-maquila.store') }}';
                var token         = $('meta[name="csrf-token"]').attr('content');
                var id_cn         = '{{ Auth::user()->idcn }}';
                var id_usuario    = '{{ Auth::user()->id }}';
                var idservicio    = $('#idservicio').val();
                var lista_sub_total_maquila     = $('#lista_sub_total_maquila').val();
                var lista_empleados_maquila     = $('#lista_empleados_maquila').val();
                var lista_paquetes_maquila      = $('#lista_paquetes_maquila').val();
                var lista_costounitario_maquila = $('#lista_costounitario_maquila').val();
                  

                /*alert('id_usuario:'+id_usuario+' id_cn:'+id_cn+' id_servicio:'+idservicio+' id_cliente:'+id_cliente+ 'subtotal:'+subtotal+' iva:'+iva+' total:'+total+' id_paquete :'+paquete+' costo_unitario:'+costo_maquila+' num_empleados:'+no_empleados);
                */

                if( (id_cliente != -1) && (paquete != -1) && (costo_maquila > 0) && (no_empleados > 0) && (subtotal > 0) && (iva > 0) && (total > 0) ){
                    $.ajax({
                      headers:{'X-CSRF-TOKEN':token},
                        url: ruta_maquila,
                        type:'POST',
                        dataType:'json',
                        data:{  id_usuario:id_usuario,
                                id_cn:id_cn,
                                id_servicio:idservicio,
                                id_cliente:id_cliente,
                                subtotal:subtotal,
                                iva:iva,
                                total:total,
                                id_paquete :paquete,
                                costo_unitario:costo_maquila,
                                num_empleados:no_empleados,
                                lista_sub_total:lista_sub_total_maquila,
                                lista_empleados:lista_empleados_maquila,
                                lista_paquetes:lista_paquetes_maquila,
                                lista_costo_unitario:lista_costounitario_maquila
                              },
                        success:function(response){
                          if(response.resultado == 'ok'){

                          swal('¡La cotización se guardo con éxito!','','success');
                          setTimeout(function(){     location.reload();   }, 1000);
                          }
                        },
                        error:function(jqXHR, status, error) {
                          swal('Ocurrio un error comuniquese con los bodoques');
                        }



                    });


                }else{
                  swal('Verifique bien los datos de la cotización','','warning');
                }
        }


}

/************************************************************************************************************************************
*************************************************************************************************************************************
                                                      INICIO COTIZADOR ESE
*************************************************************************************************************************************
************************************************************************************************************************************/


var CotizadorEse=function(){

    $('#estado_estudio_ese').attr('disabled','disabled');
    $('#tipo_estudio_ese').attr('disabled','disabled');

    var tipo_cliente_ese = $('#tipo_cliente_input').val();


    


    $("#btn-cotizador-ese").on('click',function(){
          agregar_partida_ese();
    });

   
    initSelectEse();

    

    $('#tipo_estudio_ese').change(function(){
      var tipo_estudio_ese    = this.value;
      
      if(tipo_estudio_ese != -1 && tipo_estudio_ese != 9){
          prioridad_servicio_ese  = $('#prioridad_estudio_ese').val();
          $('#costo_ese').attr('readonly','readonly');

          if( tipo_estudio_ese != 4){
            servicioNormal()
          }
          if(prioridad_servicio_ese == 2 && tipo_estudio_ese != 4){
            servicioUrgente()
          }
      }else{
        $('#costo_ese').removeAttr('readonly');
        $('#costo_ese').val('');
      }  
    });

    $('#id_plantilla_ese').hide();
    $('#btn-guardar-ese').click(function(){
        GenerarCotizacion();
    });
    $('#btn-guardar-os-ese').click(function(){
        GenerarOrdenServicioEse();
    });



    $('#num_estudios_ese').keyup(function(){
        var tipo_estudio_ese    = $('#tipo_estudio_ese').val();
        var numero_estudios_ese = this.value;
        numero_estudios_ese     = isNaN(numero_estudios_ese) ? 0 : numero_estudios_ese;
        if(tipo_estudio_ese == 4 && numero_estudios_ese > 0) {
          referenciasLaborales(numero_estudios_ese);  
        }

    });   

    listaEstadosEse();
    listaTipoServicioEse();
    

};


var getSelectsEse = function()
{ 
          
          $.ajax({
                url: "{{ url('modulo/administrador/servicios/listado-estudios-ese') }}",
                type:'GET',
                dataType: 'json',
                success:function(response){
                    
                    if(response.data){
                      strSelect = '<select class="form-control" id="tipo_estudio_ese" >';
                      strSelect += '<option value="-1">Seleccione una opción</option>'

                      $.each(response.data.tipos_estudio,function(indice){
                        strSelect += '<option value="'+ response.data.tipos_estudio[indice].id_servicio_ese +'">'+ response.data.tipos_estudio[indice].tipo_estudio +'</option>';
                        
                      });

                      strSelect += '</select>';

                      $('#select-tipo-estudio').empty().append(strSelect);





                      strSelectPrioridades = '<select class="form-control" id="prioridad_estudio_ese">';
                      strSelectPrioridades += '<option value="-1">Seleccione una opción</option>' 
                      $.each(response.data.prioridades,function(indice){
                          strSelectPrioridades += '<option value="'+ response.data.prioridades[indice].id +'">'+ response.data.prioridades[indice].nombre +'</option>';
                      });

                      strSelectPrioridades += '</select>';

                      $('#select-prioridad-ese').empty().html(strSelectPrioridades);

                      
                      initSelectEse();




                      
                      $("#modalServicioRysTitleEdit").html("Edición registro ESE");
                      $("#altaServicioEseModal").modal({show:true});

                      //initSelectServicios();
                    }
                    


                },
                error : function(jqXHR, status, error) {
                            alert('Disculpe, existió un problema comuniquese con el equipo de desarrollo ' + status);
                }
            });
        }


var initSelectEse = function(){

    $('#prioridad_estudio_ese').change(function(){
        var prioridad_ese = this.value;


      
        if(prioridad_ese == -1){
            limpiarCotizadorEse();
        }else{
            $('#estado_estudio_ese').removeAttr('disabled','disabled');        
            $('#estado_estudio_ese').focus();

            tipo_estudio_var = $('#tipo_estudio_ese').val();


            //Aqui esta la magia checar este punto Luis
    /****************************************************************************************************************/
            
            if( tipo_estudio_var != -1 ){
              servicioNormal()
            }
    /****************************************************************************************************************/
        }
    });


    $('#estado_estudio_ese').change(function(){
        var estado_ese = this.value;
        if(estado_ese != -1){
            $('#tipo_estudio_ese').removeAttr('disabled','disabled');          
            $('#tipo_estudio_ese').focus();
        }else{
            $('#tipo_estudio_ese').attr('disabled','disabled');  
            $('#tipo_estudio_ese option[value="-1"]').attr('selected','selected');       
        }
      
    });




    $('#tipo_estudio_ese').change(function(){
      var tipo_estudio_ese    = this.value;
      
      if(tipo_estudio_ese != -1 && tipo_estudio_ese != 9){
          prioridad_servicio_ese  = $('#prioridad_estudio_ese').val();
          $('#costo_ese').attr('readonly','readonly');

          if( tipo_estudio_ese != 4){
            servicioNormal()
          }
          if(prioridad_servicio_ese == 2 && tipo_estudio_ese != 4){
            servicioUrgente()
          }
      }else{
        $('#costo_ese').removeAttr('readonly');
        $('#costo_ese').val('');
      }  
    });


}


var mascaraTipoServicioEse = function(id_tipo_servicio){

      var resultado = null;
      $.ajax({
          url:'{{ url('listado_tipo_servicio_ese') }}',
          type:'GET',
          async:false,
          data:{tipo_servicio:id_tipo_servicio}, 
          processData: true,
          success:function(response){    
            resultado = response[0].tipo_estudio;           
          },
          error : function(jqXHR, status, error) {
                  alert('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
          }

      });
      return resultado;     
}

var listaTipoServicioEse = function(){
      $.ajax({ 
            url:'{{ url('listado_tipo_servicio_ese') }}',
            type:'GET',
            dataType: 'json',  
            data:{tipo_servicio:'0'},         
            success:function(response){
                    
                    str_option_ese = '<option value="-1">Selecciona un estado...</option>';
                    $.each(response,function(index){
                        str_option_ese += '<option value="'+response[index].id_servicio_ese+'">'+response[index].tipo_estudio+'</option>';

                    });

                    //str_option_ese += '<option value="0">Otros</option>';

                    

                    $('#tipo_estudio_ese').html('').append(str_option_ese);
                    
            },
            error:function(jqXHR, status, error) {
              swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
            }
    });
}


var listaEstadosEse = function(){
      $.ajax({ 
            url:'{{ url('listado_estados') }}',
            type:'GET',
            dataType: 'json',            
            success:function(response){
                    
                    str_option = '<option value="-1">Selecciona un estado...</option>';
                    $.each(response,function(index){
                        str_option += '<option value="'+response[index].id+'">'+response[index].nombre_estado+'</option>';

                    });

                    //str_option += '<option value="0">Otros</option>';

                    

                    $('#estado_estudio_ese').html('').append(str_option);
                    
            },
            error:function(jqXHR, status, error) {
              swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
            }
    });
}

var limpiarCotizadorEse = function(){ 
    $('#estado_estudio_ese option[value="-1"]').attr('selected','selected');
    $('#estado_estudio_ese').attr('disabled','disabled');
    $('#tipo_estudio_ese option[value="-1"]').attr('selected','selected');
    $('#tipo_estudio_ese').attr('disabled','disabled');
    $('#num_estudios_ese').val(0);
    $('#costo_ese').val(0.00);
}

var servicioNormal = function(){
    url_servicio_ese  = '{{ url('ese_costo_normal') }}';
    var idservicio    = $('#tipo_estudio_ese').val();
    var idprioridad   = $('#prioridad_estudio_ese').val();

    

    $.ajax({ 
            url:url_servicio_ese,
            type:'GET',
            dataType: 'json',
            data:{ idservicio:idservicio,idprioridad:idprioridad },
            success:function(response){
                    costo_ese = parseFloat(response.costo).toFixed(2);
                    $("#costo_ese").val(costo_ese);                    
            },
            error:function(jqXHR, status, error) {
              swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
            }
    });
}

var servicioUrgente = function(){
    url_servicio_ese      = '{{ url('ese_costo_urgente') }}';
    var idservicio  = $('#tipo_estudio_ese').val();

    $.ajax({ 
            url:url_servicio_ese,
            type:'GET',
            dataType: 'json',
            data:{ idservicio:idservicio },
            success:function(response){
                    costo_ese = parseFloat(response.costo).toFixed(2);
                    $("#costo_ese").val(costo_ese);                    
            },
            error:function(jqXHR, status, error) {
              swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
            }
          });
}
var validarGuardarEse = function(){
      var guardar   = $('#subtotal_ese').val();
      guardar       = isNaN(guardar) ? 0 : guardar;
      var resultado = true;

      if(guardar <= 0){
        resultado = false;
      }

      return resultado;
}
var GenerarCotizacion=function(){
  
        var guardar = validarGuardarEse();

        

        if(guardar){

            var idcliente         = $("#idcliente").val();
            var idservicio        = $("#idservicio").val();
            var tipo_estudio_ese  = $("#tipo_estudio_ese").val();
            var num_estudios_ese  = $("#num_estudios_ese").val();
            var costo_ese         = $("#costo_ese").val();            
            var subtotal_ese      = $("#subtotal_ese").val();
            var iva_ese           = $("#iva_ese").val();
            var total_ese         = $("#total_ese").val();
            var lista_prioridad_ese       = $('#lista_prioridad_ese').val();
            var lista_estado_ese          = $('#lista_estado_ese').val();
            var lista_tipo_estudio_ese    = $('#lista_tipo_estudio_ese').val();
            var lista_cantidad_ese        = $('#lista_cantidad_ese').val();
            var lista_costo_unitario_ese  = $('#lista_costo_unitario_ese').val();
            var lista_sub_total_ese       = $('#lista_sub_total_ese').val();
            var lista_iva_ese             = $('#lista_iva_ese').val();
            var lista_total_ese           = $('#lista_total_ese').val();
            var token                     = $('meta[name="csrf-token"]').attr('content');
        
            $.ajax({
                  headers:{'X-CSRF-TOKEN':token},
                  url:'{{route("sig-erp-crm::listaEseCosto.store")}}',
                  type:'POST',
                  dataType:'json',
                  data:{
                          id_cliente:idcliente,
                          id_servicio:idservicio,
                          id_tipo_estudio:tipo_estudio_ese,
                          cantidad:num_estudios_ese,
                          costo:costo_ese,                          
                          subtotal:subtotal_ese,
                          iva:iva_ese,
                          total:total_ese,
                          prioridad:lista_prioridad_ese,
                          estado:lista_estado_ese,
                          tipo_estudio:lista_tipo_estudio_ese,
                          cantidad:lista_cantidad_ese,
                          costo_unitario:lista_costo_unitario_ese,
                          sub_total_partida:lista_sub_total_ese,
                          iva_partida:lista_iva_ese,
                          total_partida:lista_total_ese
                       },
                  success:function(response){
                      if(response.status_alta == "success"){
                            swal({                                  
                                    title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                    html: true,
                                    type: "success",   
                                    confirmButtonText: "OK"                                                 
                                });
                        }
                            setTimeout(function(){     location.reload();   }, 1000);
                  },
                 error:function(jqXHR, status, error){
                          swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                  }


            });
        }else{
          swal('¡ No se puede guardar la cotización !','No hay servicios cotizados','warning');
        }

     

}



var GenerarOrdenServicioEse=function(){
  
        var guardar = validarGuardarEse();
        tipo_cliente = $("#tipo_cliente_input").val();

        
        

        if(guardar){
                if( tipo_cliente != 1 ){
                    var idcliente         = $("#idcliente").val();
                    var idservicio        = $("#idservicio").val();
                    var tipo_estudio_ese  = $("#tipo_estudio_ese").val();
                    var num_estudios_ese  = $("#num_estudios_ese").val();
                    var costo_ese         = $("#costo_ese").val();            
                    var subtotal_ese      = $("#subtotal_ese").val();
                    var iva_ese           = $("#iva_ese").val();
                    var total_ese         = $("#total_ese").val();
                    var lista_prioridad_ese       = $('#lista_prioridad_ese').val();
                    var lista_estado_ese          = $('#lista_estado_ese').val();
                    var lista_tipo_estudio_ese    = $('#lista_tipo_estudio_ese').val();
                    var lista_cantidad_ese        = $('#lista_cantidad_ese').val();
                    var lista_costo_unitario_ese  = $('#lista_costo_unitario_ese').val();
                    var lista_sub_total_ese       = $('#lista_sub_total_ese').val();
                    var lista_iva_ese             = $('#lista_iva_ese').val();
                    var lista_total_ese           = $('#lista_total_ese').val();
                    var token                     = $('meta[name="csrf-token"]').attr('content');
                
                    $.ajax({
                          headers:{'X-CSRF-TOKEN':token},
                          url:'{{route("sig-erp-crm::orden-servicio-ese.store")}}',
                          type:'POST',
                          dataType:'json',
                          data:{
                                  id_cliente:idcliente,
                                  id_servicio:idservicio,
                                  id_tipo_estudio:tipo_estudio_ese,
                                  cantidad:num_estudios_ese,
                                  costo:costo_ese,                          
                                  subtotal:subtotal_ese,
                                  iva:iva_ese,
                                  total:total_ese,
                                  prioridad:lista_prioridad_ese,
                                  estado:lista_estado_ese,
                                  tipo_estudio:lista_tipo_estudio_ese,
                                  cantidad:lista_cantidad_ese,
                                  costo_unitario:lista_costo_unitario_ese,
                                  sub_total_partida:lista_sub_total_ese,
                                  iva_partida:lista_iva_ese,
                                  total_partida:lista_total_ese
                               },
                          success:function(response){
                              if(response.status_alta == "success"){
                                    swal({                                  
                                            title: "<h3>¡ Se genero la <strong> #OS ESE"+response.ultima_orden+ "</strong> con éxito !</h3> ",
                                            html: true,
                                            type: "success",   
                                            confirmButtonText: "OK"                                                 
                                        });
                                }
                                    setTimeout(function(){     location.reload();   }, 5000);
                          },
                         error:function(jqXHR, status, error){
                                  swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                          }


                    });
                }
        }else{
          swal('¡ No se puede generar la Orden de Servicio !','No hay servicios agregados','warning');
        }

     

}



var referenciasLaborales = function(numero_estudios_ese){
      ruta='{{ url('listaReferenciaLaborales') }}';      
       
      $.ajax({
          url:ruta,
          type:'GET',
          dataType: 'json',
          data:{ num_estudio_ese:numero_estudios_ese },
          success:function(response){
                 if(response.status_alta=="success"){
                    $("#costo_ese").val(response.costo);                          
                 }                        
         },
         error:function(jqXHR, status, error) {
          swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
         }

         });
}





var selectCotizar=function(){
        var tipo_estudio_ese=$("#tipo_estudio_ese").val();
    var idcliente=$("#idcliente").val();
    var idservicio=$("#idservicio").val();
        //var tipo_estudio_ese=$("#tipo_estudio_ese").val();
        var num_estudios_ese=$("#num_estudios_ese").val();
        var costo_ese=$("#costo_ese").val();
        var iduser=$("#iduser").val();
        var ruta=null;

         
         if(tipo_estudio_ese==8){
              ruta='{{ url('listaReferenciaLaborales') }}';
            } 
              else{
            ruta='{{ url('ESE') }}';
            }
       if(tipo_estudio_ese==8 && num_estudios_ese!=''){
          $.ajax({
              url:ruta,
              type:'GET',
              dataType: 'json',
              data:{
                  idcliente:idcliente,
                  idservicio:idservicio,
                  tipo_estudio_ese:tipo_estudio_ese,
                  num_estudio_ese:num_estudios_ese
                    },
                     success:function(response){
                             if(response.status_alta=="success")
                             if(tipo_estudio_ese==8){
                              $("#costo_ese").val(response.porcentaje_servicio);
                             }
                             else{
                              $("#costo_ese").val(response.costo);
                             }
                    },
                    error:function(jqXHR, status, error) {
                      swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                     }

             });
       }
         if(tipo_estudio_ese!=8 && tipo_estudio_ese!='-1'){
           $.ajax({
              url:ruta,
              type:'GET',
              dataType: 'json',
              data:{
                  idcliente:idcliente,
                  idservicio:idservicio,
                  tipo_estudio_ese:tipo_estudio_ese,
                  num_estudio_ese:num_estudios_ese
                    },
                     success:function(response){
                             if(response.status_alta=="success")
                             if(tipo_estudio_ese==8){
                              $("#costo_ese").val(response.porcentaje_servicio);
                             }
                             else{
                              $("#costo_ese").val(response.costo);
                          }
                    },
                    error:function(jqXHR, status, error) {
                      swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                     }

             });

         }

}

var agregar_partida_ese = function(){
  
  str_plantilla_ese   = $('#id_plantilla_ese').html();
  tipo_estudio_ese    = $('#tipo_estudio_ese').val();
  num_estudios_ese    = $('#num_estudios_ese').val();
  costo_estudio       = $('#costo_ese').val();
  num_estudios_ese    = isNaN(num_estudios_ese)    ? 0 : num_estudios_ese;
  costo_estudio       = isNaN(costo_estudio)       ? 0 : costo_estudio;
  
  
   
  if(tipo_estudio_ese != -1 && num_estudios_ese > 0 && costo_estudio > 0){

      costo_ese             = $('#costo_ese').val();
      costo_ese             = isNaN(costo_ese)  ? 0 : costo_ese;
      str_aux_partida       = '';
      prioridad_ese         = $('#prioridad_estudio_ese').val();
      nombre_prioridad_ese  = (prioridad_ese == 1) ? 'Normal' : 'Urgente';

      precio_partida_ese  = num_estudios_ese * costo_ese;
      estado_ese          = $('#estado_estudio_ese').val();
      tipo_estudio_ese    = $('#tipo_estudio_ese').val();
      num_estudios_ese    = $('#num_estudios_ese').val();
      estado_estudio      = buscaEstado(estado_ese); 
      mascara_servicio    = mascaraTipoServicioEse(tipo_estudio_ese);

      
      str_aux_partida     = str_plantilla_ese.replace(  '{prioridad_ese}'             , prioridad_ese);
      str_plantilla_ese   = str_aux_partida.replace(    '{estado_ese}'                , estado_ese);
      str_aux_partida     = str_plantilla_ese.replace(  '{tipo_estudio_ese}'          , tipo_estudio_ese);
      str_plantilla_ese   = str_aux_partida.replace(    '{estado_ese}'                , estado_ese);
      str_aux_partida     = str_plantilla_ese.replace(  '{num_estudios_ese}'          , num_estudios_ese);
      str_plantilla_ese   = str_aux_partida.replace(    '{costo_ese}'                 , costo_ese);
      str_aux_partida     = str_plantilla_ese.replace(  '{subtotal_ese}'              , precio_partida_ese);
      str_plantilla_ese   = str_aux_partida.replace(    '{prioridad_ese_nombre}'      , nombre_prioridad_ese); 
      str_aux_partida     = str_plantilla_ese.replace(  '{add-class-ese}'             , 'numero-de-partida-ese');
      str_plantilla_ese   = str_aux_partida.replace(    '{estado_ese_mascara}'        , estado_estudio); 
      str_aux_partida     = str_plantilla_ese.replace(  '{mascara_tipo_estudio_ese}'  , mascara_servicio);
      


      $('#partidas_ese').append(str_aux_partida);  
      calcularServicioEse();  
    
  }else{      
      swal('¡ Verifica los datos !','No se puede realizar una cotización','warning');

  }
}

var eliminarPartidaEse = function(obj){ 
    var indice_partida        = $('.eliminar-partida-ese').index(obj); 
    var html_partida_ese      = $('.numero-de-partida-ese').get(indice_partida);
    $(html_partida_ese).remove();
    calcularServicioEse();
    
}

var calcularServicioEse = function(){
      longitud_partidas_ese   = $('.class-costo-ese').length;
      
      var total_cantidad_estudios_ese   = 0.00;
      var total_cotizacion_ese          = 0.00;
      var subt_total_cotizacion_ese     = 0.00;
      var iva_cotizacion_ese            = 0.00;
      
      var arr_ese_prioridad             = new Array();
      var arr_ese_estado                = new Array();
      var arr_ese_tipo_estudio          = new Array();
      var arr_ese_num_estudios          = new Array();
      var arr_ese_costo                 = new Array();
      var arr_ese_subtotal              = new Array();
      var arr_ese_iva                   = new Array();
      var arr_ese_total                 = new Array();

      
      for(i=0; i< longitud_partidas_ese; i++){
                  costo_ese_aux = $('.class-costo-ese').get(i);
                  

                if(costo_ese_aux.value != '{costo_ese}'){ 

                    partida_ese_prioridad       = $('.class-prioridad-ese').get(i); 
                    partida_ese_estado          = $('.class-estado-ese').get(i); 
                    partida_ese_estudio         = $('.class-tipo-estudio-ese').get(i); 
                    partida_ese_cantidad        = $('.class-num-estudios-ese').get(i);
                    partida_ese_costo_unitario  = $('.class-costo-ese').get(i); 
                    partida_ese_subtotal        = $('.class-subtotal-ese').get(i);

                    costo_ese_subtotal_aux  = parseFloat(costo_ese_aux.value) * parseInt(partida_ese_cantidad.value); 
                    iva_ese_aux             = costo_ese_subtotal_aux * 0.16;
                    total_ese_aux           = costo_ese_subtotal_aux + iva_ese_aux;

                    subt_total_cotizacion_ese += costo_ese_subtotal_aux;
                    iva_cotizacion_ese        += iva_ese_aux;
                    total_cotizacion_ese      += total_ese_aux;


                    arr_ese_prioridad.push(     partida_ese_prioridad.value       );  
                    arr_ese_estado.push(        partida_ese_estado.value          );  
                    arr_ese_tipo_estudio.push(  partida_ese_estudio.value         );  
                    arr_ese_num_estudios.push(  partida_ese_cantidad.value        );  
                    arr_ese_costo.push(         partida_ese_costo_unitario.value  );  
                    arr_ese_subtotal.push(      partida_ese_subtotal.value        );  
                    arr_ese_iva.push(           iva_ese_aux                       );
                    arr_ese_total.push(         total_ese_aux                     );                    

                  }
      }

      $('#lista_prioridad_ese').val(arr_ese_prioridad.join(','));
      $('#lista_estado_ese').val(arr_ese_estado.join(','));
      $('#lista_tipo_estudio_ese').val(arr_ese_tipo_estudio.join(','));
      $('#lista_cantidad_ese').val(arr_ese_num_estudios.join(','));
      $('#lista_costo_unitario_ese').val(arr_ese_costo.join(','));
      $('#lista_sub_total_ese').val(arr_ese_subtotal.join(','));
      $('#lista_iva_ese').val(arr_ese_iva.join(','));
      $('#lista_total_ese').val(arr_ese_total.join(','));


      $("#subtotal_ese").val(parseFloat(subt_total_cotizacion_ese).toFixed(2));
      $("#iva_ese").val(parseFloat(iva_cotizacion_ese).toFixed(2));
      $("#total_ese").val(parseFloat(total_cotizacion_ese).toFixed(2)); 

      $('#sub').html('$ '+number_format(subt_total_cotizacion_ese,2));
      $('#iv').html('$ '+number_format(iva_cotizacion_ese,2));
      $('#tot').html('$ '+number_format(total_cotizacion_ese,2));      
      
}


var estadosRepublica = function(){
  var arr_estados = new Array();
      arr_estados[0]  = 'Otros';
      arr_estados[1]  = 'Aguascalientes';
      arr_estados[2]  = 'Baja California';
      arr_estados[3]  = 'Baja California Sur';
      arr_estados[4]  = 'Campeche';
      arr_estados[5]  = 'Chiapas';
      arr_estados[6]  = 'Chihuahua';
      arr_estados[7]  = 'Coahuila';
      arr_estados[8]  = 'Colima';
      arr_estados[9]  = 'Distrito Federal';
      arr_estados[10] = 'Ciudad de México';
      arr_estados[11] = 'Durango';
      arr_estados[12] = 'Guanajuato';
      arr_estados[13] = 'Guerrero';
      arr_estados[14] = 'Hidalgo';
      arr_estados[15] = 'Jalisco';
      arr_estados[16] = 'Estado de México';
      arr_estados[17] = 'Michoac';
      arr_estados[18] = 'Morelos';
      arr_estados[19] = 'Nayarit';
      arr_estados[20] = 'Nuevo Leon';
      arr_estados[21] = 'Oaxaca';
      arr_estados[22] = 'Puebla';
      arr_estados[23] = 'Quer';
      arr_estados[24] = 'Quintana Roo';
      arr_estados[25] = 'San Luis Potos';
      arr_estados[26] = 'Sinaloa';
      arr_estados[27] = 'Sonora';
      arr_estados[28] = 'Tabasco';
      arr_estados[29] = 'Tamaulipas';
      arr_estados[30] = 'Tlaxcala';
      arr_estados[31] = 'Veracruz';
      arr_estados[32] = 'Yucat';
      arr_estados[33] = 'Zacatecas';


      return arr_estados;
}

var buscaEstado = function(key){
  var lista_estados = estadosRepublica();
  var estado = lista_estados[key];

  return estado;
}


/************************************************************************************************************************************
*************************************************************************************************************************************
                                                        FIN COTIZADOR ESE
*************************************************************************************************************************************
************************************************************************************************************************************/

/************************************************************************************************************************************
*************************************************************************************************************************************
                                                  INICIO COTIZADOR PSICOMETRICOS
*************************************************************************************************************************************
************************************************************************************************************************************/
var cotizaPsico=function(){
   
  $("#prueba_psicometrico").on('change',function(){
    var id=this.value;
    $("#cantidad_seleccion").val(id);
    var table='<table id="data-table" class="table table-striped table-bordered">'+
                                                 '<thead>'+
                                                    '<tr>'+
                                                        '<th class="text-center">Seleccionar prueba</th>'+
                                                        '<th class="text-center">Prueba</th>'+
                                                        '<th class="text-center">Tiempo</th>'+
                                                        '<th class="text-center">Evaluación</th>'+
                                                        '<th class="text-center">Descripción</th>'+
                                                      
                                                    '</tr>'+
                                                   ' </thead>'+
                                                   ' <tbody>';
    
      $.ajax({
               url:'{{url('listaCatalogoPsicometricos')}}',
               type:'GET',
               dataType:'JSON',

               success:function(listaCatalogo){
                //console.log(listaCatalogo);

                $.each(listaCatalogo,function(index){
                    //  console.log(listaCatalogo[index].prueba);
             table+='<tr><td><center><div class="form-group"> <input type="checkbox" class="select-psico" name="prueba[]" value="'+listaCatalogo[index].id+'"></div><input type="hidden" value="'+listaCatalogo[index].id+'" class="id-prueba" ></center></td>';
                                   table+='<td>'+ listaCatalogo[index].prueba +'</td>';
                                   table+='<td>'+ listaCatalogo[index].niveles +'</td>';
                                   table+='<td>'+ listaCatalogo[index].evaluacion +'</td>';
                                   table+='<td>'+ listaCatalogo[index].descripcion +'</td> </tr>';
                                 
                              });
                table+='</tbody>'+' </table>';
//aqui pepeleonero
                    $("#prueba1").html( table );

           
           if(id==1){
                    $("#prueba1").show();
                    $(".note").show();
                    seleccionServicio();
            }
            if(id==2){
                 $("#prueba1").show();
                    $(".note").show();
              seleccionServicioMultiple();
             }
            if(id==3){
                    $("#prueba1").hide();
                    $(".note").hide();
             }
             else{
            
                   $("#prueba1").show();
                    $(".note").show();
                     seleccionServicioMultiple();

             }
             if(id==1){
                       $("#prueba1").show();
                    $(".note").show();
                    
            }
            
            $("#data-table").DataTable({
              'iDisplayLength': 25,
               "lengthMenu": [ [25, 50, -1], [25, 50, "All"] ]
            });        
               },
                    error:function(jqXHR, status, error) {

                     alert("Comuniquese con el equipo de desarrollo");
              }

      }); 

  });

  $('#id_plantilla_psicometricos').hide();

  $('#btn-partida-psico').click(function(event){
        event.preventDefault();
        
        var agregarPartida = validarSeleccionPruebasPsicometricas();

        if(agregarPartida){
            agregar_partida_psicometricos();
            calcularServicioPsicometricos();          
        }
    });
}

var seleccionServicio=function(){
  //esta funcion es cuando seleccione prueba 1
  cantidad_clicks = $('#cantidad_seleccion').val();
  $('.select-psico').click(function(){
      longitud  = $('.select-psico').length;
      clicklado = $('.select-psico').index(this);
      id_prueba= $('.id-prueba').get(clicklado);
        $("#prueba").val(id_prueba.value);
      //alert(id_prueba.value);

      for(i=0; i < longitud; i++){

        obj = $('.select-psico').get(i);
        if(clicklado != i){
          $(obj).removeAttr('checked');
        }else{
          $(obj).attr('checked');
        }
      }
  });

}
var seleccionServicioMultiple=function(){
  //esta funcion es cuando seleccione prueba de bateria

  $('.select-psico').click(function(){
      longitud  = $('.select-psico').length;
      clicklado = $('.select-psico').index(this);
      id_prueba= $('.id-prueba').get(clicklado);
      di_click = $('.select-psico').get(clicklado);
        checado = $(di_click).is(':checked');
        var long=$(".select-psico:checked").length;

        var checkboxValues = new Array();
       //recorremos todos los checkbox seleccionados con .each
      $('input[name="cancel[]"]:checked').each(function() {
       //$(this).val() es el valor del checkbox correspondiente
      checkboxValues.push($(this).val());
    });

    //  console.log(longitud+'   '+checado);
              //alert(id_prueba.value);
       // alert(id_prueba.value);
        if(long==4){
          for(i=0; i < longitud; i++){
             
        obj = $('.select-psico').get(i);
            
        if(!$(obj).is(':checked')){
          $(obj).attr('disabled',"disabled");
        }
        
         }
        }
        else{
          $('.select-psico').removeAttr('disabled');
          

              if(!checado){

            arreglo = idseleccionados.split(',');
            posicionnnn = arreglo.indexOf(id_prueba.value);
            
            arreglo.splice(posicionnnn,1);
            

            otra_cosa = arreglo.join(',');
            $('#prueba').val(otra_cosa);
              }


        }
      
  });

}


var costoPsico=function(){
  $("#prueba_psicometrico").on('change',function(){
    var prueba_psicometrico=this.value;

         $.ajax({
              url:'{{url('listaCostoPsicometricos')}}',
              type:'GET',
              dataType: 'json',
              data:{
                  prueba_psicometrico:prueba_psicometrico,
                    },
                     success:function(response){
                             if(response.status_alta=="success"){
                             if(prueba_psicometrico==4)
                             {
                               $("#costo_psicometrico").val(parseFloat(response.costo).toFixed(2));
                               $("#costo_psicometrico").removeAttr("readonly");
                               $("#costo_psicometrico").keyup(function(){
                                
                                 var costo=$("#costo_psicometrico").val();
                                   var iva=(parseFloat(costo*.16).toFixed(2));
                                // $("#iva_psicometrico").val(parseFloat(iva).toFixed(2));
                                 var total=(parseFloat(costo)+parseFloat(iva));
                                 //alert("costo"+costo+ " " + "iva:"+iva+"total:"+total+"tipo"+ typeof(parseInt(iva)));
                                 //$("#total_psicometrico").val(parseFloat(total).toFixed(2));

                                 /*
                                  $("#iva_psico").html('$'+number_format(iva,2));
                                  $("#tot_psico").html('$'+number_format(total,2));
                                  */
                                })

                             }else{
                             $("#costo_psicometrico").attr("readonly","readonly");
                             $("#costo_psicometrico").val(parseFloat(response.costo).toFixed(2));
                             var costo=$("#costo_psicometrico").val();
                             var iva=(parseFloat(costo*.16).toFixed(2));
                             $("#iva_psicometrico").val(parseFloat(iva).toFixed(2));
                             var total=(parseFloat(costo)+parseFloat(iva));
                             //alert("costo"+costo+ " " + "iva:"+iva+"total:"+total+"tipo"+ typeof(parseInt(iva)));
                             $("#total_psicometrico").val(parseFloat(total).toFixed(2));

                              //$("#iva_psico").html('$'+number_format(iva,2));
                              //$("#tot_psico").html('$'+number_format(total,2));
                            } 

                          }
                           
                    },
                    error:function(jqXHR, status, error) {
                      swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                     }

             });


  })
}

var validarSeleccionPruebasPsicometricas = function(){
    var checkboxValues = new Array();
    var bandera             = 1;
    var tipo_prueba         = $("#prueba_psicometrico").val();
    var idservicio          = $("#idservicio").val();
    var costo_psico_partida = $('#costo_psicometrico').val();  
    var cantidad_psicometrico= $('#cantidad_psicometrico').val();
    
    $('input[name="prueba[]"]:checked').each(function() {             
        checkboxValues.push($(this).val());            
    });

   if(tipo_prueba=='-1'){
        $("#form-tipo_prueba").addClass("has-error");
        title='¡ ¡ Por favor llene los campos correctamente ! !';
        bandera=0;
        sweetAlertCampos(title);
   }
   if(tipo_prueba==1){ 
      if(checkboxValues.length==0){ console.log('Longitud: '+checkboxValues.length);
          bandera=0;
          $(".check").addClass("has-error");
          title='¡Favor de seleccionar 1 prueba Psicometrica!';
          sweetAlertCampos(title);      
      }
      if(cantidad_psicometrico <= 0 || cantidad_psicometrico ==''){
            bandera=0;
            $(".check").addClass("has-error");
            title='¡Favor de ingresar la cantidad de estudios a realizar!';
            sweetAlertCampos(title);
        }

   }
   if(tipo_prueba==2){
      if(checkboxValues.length==0 && checkboxValues.length<=4){
        bandera=0;
        $(".check").addClass("has-error");
        title='¡Favor de seleccionar de 1 a 4 Pruebas Psicometrica!';
           sweetAlertCampos(title);
      }
      if(cantidad_psicometrico <= 0 || cantidad_psicometrico ==''){
            bandera=0;
            $(".check").addClass("has-error");
            title='¡Favor de ingresar la cantidad de estudios a realizar!';
            sweetAlertCampos(title);
        }
   }
   if(tipo_prueba==4){
        if(checkboxValues.length==0 && checkboxValues.length<=4){
          bandera=0;
          $(".check").addClass("has-error");
          title='¡Favor de seleccionar al menos 1 Prueba Psicometrica!';
             sweetAlertCampos(title);
        }

        if(costo_psico_partida <= 0){
            bandera=0;
            $(".check").addClass("has-error");
            title='¡El costo del del estudio, como minimo debe ser de $1!';
            sweetAlertCampos(title);
        }
        if(cantidad_psicometrico <= 0 || cantidad_psicometrico ==''){
            bandera=0;
            $(".check").addClass("has-error");
            title='¡Favor de ingresar la cantidad de estudios a realizar!';
            sweetAlertCampos(title);
        }
   }
   else{
    if(checkboxValues.length==0 && tipo_prueba!=3 ){ 
          bandera=0;
          $(".check").addClass("has-error");
          title='¡Favor de seleccionar 1 prueba Psicometrica!';
          sweetAlertCampos(title);      
      }
      if(cantidad_psicometrico <= 0 || cantidad_psicometrico ==''){
            bandera=0;
            $(".check").addClass("has-error");
            title='¡Favor de ingresar la cantidad de estudios a realizar!';
            sweetAlertCampos(title);
        }

   }



   return bandera;
}

var GuardarCotiPsico=function(){
  $("#btn-guardar-psico").on('click',function(){
    var idcliente                     = $("#idcliente").val();  
    var idservicio                    = $('#idservicio').val();
    var lista_psico_subtotal          = '';
    var lista_psico_iva               = '';
    var lista_psico_total_partida     = '';
    var lista_psico_cantidad_partida  = '';
    var lista_psico_pruebas_select    = '';
    var lista_psico_pruebas       = '';
    var bandera                   = 1 ;
    var title                     = null;
    var token                     = $('meta[name="csrf-token"]').attr('content');
    var subtotal_psicometrico     = $("#subtotal_psicometrico").val();
    var iva                       = $("#iva_psicometrico").val();
    var id_user                   = $("#id_user").val();
    var total_psicometrico        = $("#total_psicometrico").val();


    if($('#lista_psico_subtotal').val() != ''){
      lista_psico_subtotal          = $('#lista_psico_subtotal').val();
      lista_psico_iva               = $('#lista_psico_iva').val();
      lista_psico_total_partida     = $('#lista_psico_total_partida').val();
      lista_psico_pruebas           = $('#lista_psico_pruebas').val();
      lista_psico_cantidad_partida  = $('#lista_psico_cantidad').val();
      lista_psico_pruebas_select    = $('#lista_psico_pruebas_seleccionadas').val();
      
    }else{
      bandera = 0;
      
      title='¡No se ha realizado ninguna cotización!';
        sweetAlertCampos(title);
    }

    if(idcliente=='-1'){
      bandera=0;
      $("#cotizador-id-cliente").addClass("has-error");
      title='¡ ¡ Por favor llene los campos correctamente ! !';
      sweetAlertCampos(title);
    }
     
        if(bandera){ 
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:'{{route("sig-erp-crm::listaPsicometricos.store")}}',
          type:'POST',
          dataType:'json',
          data:{
               id_cliente:idcliente,
               id_servicio:idservicio,
               subtotal:subtotal_psicometrico,              
               iva:iva,
               id_usuario:id_user,
               iva:iva,
               total:total_psicometrico,
               lista_subtotal:lista_psico_subtotal,                
               lista_iva:lista_psico_iva,
               lista_total_partida:lista_psico_total_partida,
               lista_pruebas:lista_psico_pruebas,
               lista_cantidad_partida:lista_psico_cantidad_partida,
               lista_pruebas_select:lista_psico_pruebas_select    


               },
             success:function(response){
              if(response.status_alta == "success"){
              swal({                                  
                                    title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                    html: true,
                                    type: "success",   
                                    confirmButtonText: "OK"                                                 
                                });
               }
               setTimeout(function(){     location.reload();   }, 5000);
               },
             error:function(jqXHR, status, error) {
                      swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                     }


        });
       }
  });
}



var GuardarOsPsicometricos = function(){ 

    $("#btn-guardar-os-psicometricos").click(function(){

        tipo_cliente = $("#tipo_cliente_input").val();

        if( tipo_cliente != 1 ){

              var idcliente                     = $("#idcliente").val();  
              var idservicio                    = $('#idservicio').val();
              var lista_psico_subtotal          = '';
              var lista_psico_iva               = '';
              var lista_psico_total_partida     = '';
              var lista_psico_cantidad_partida  = '';
              var lista_psico_pruebas_select    = '';
              var lista_psico_pruebas       = '';
              var bandera                   = 1 ;
              var title                     = null;
              var token                     = $('meta[name="csrf-token"]').attr('content');
              var subtotal_psicometrico     = $("#subtotal_psicometrico").val();
              var iva                       = $("#iva_psicometrico").val();
              var id_user                   = $("#id_user").val();
              var total_psicometrico        = $("#total_psicometrico").val();


              if($('#lista_psico_subtotal').val() != ''){
                lista_psico_subtotal          = $('#lista_psico_subtotal').val();
                lista_psico_iva               = $('#lista_psico_iva').val();
                lista_psico_total_partida     = $('#lista_psico_total_partida').val();
                lista_psico_pruebas           = $('#lista_psico_pruebas').val();
                lista_psico_cantidad_partida  = $('#lista_psico_cantidad').val();
                lista_psico_pruebas_select    = $('#lista_psico_pruebas_seleccionadas').val();
                
              }else{
                bandera = 0;
                
                title='¡No se ha realizado ninguna cotización!';
                  sweetAlertCampos(title);
              }

              if(idcliente=='-1'){
                bandera=0;
                $("#cotizador-id-cliente").addClass("has-error");
                title='¡ ¡ Por favor llene los campos correctamente ! !';
                sweetAlertCampos(title);
              }
               
                if(bandera){ 
                    $.ajax({
                          headers:{'X-CSRF-TOKEN':token},
                          url:'{{route("sig-erp-crm::orden-servicio-psicometricos.store")}}',
                          type:'POST',
                          dataType:'json',
                          data:{
                               id_cliente:idcliente,
                               id_servicio:idservicio,
                               subtotal:subtotal_psicometrico,              
                               iva:iva,
                               id_usuario:id_user,
                               iva:iva,
                               total:total_psicometrico,
                               lista_subtotal:lista_psico_subtotal,                
                               lista_iva:lista_psico_iva,
                               lista_total_partida:lista_psico_total_partida,
                               lista_pruebas:lista_psico_pruebas,
                               lista_cantidad_partida:lista_psico_cantidad_partida,
                               lista_pruebas_select:lista_psico_pruebas_select    


                            },
                            success:function(response){
                                if(response.status_alta == "success"){
                                swal({                                  
                                                      title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                                      html: true,
                                                      type: "success",   
                                                      confirmButtonText: "OK"                                                 
                                                  });
                                 }
                                 setTimeout(function(){     location.reload();   }, 5000);
                               },
                            error:function(jqXHR, status, error) {
                                      swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo ');
                            }


                    });
                }
        }
  });
}






var agregar_partida_psicometricos = function(){

  str_plantilla_psicometricos         = $('#id_plantilla_psicometricos').html();
  var tipo_pruebca_psicometricos      = $('#prueba_psicometrico').val();  
  var costo_psicometrico_partida      = $('#costo_psicometrico').val(); 
  var cantidad_psicometrico_partida   = $('#cantidad_psicometrico').val(); 
  var total_partida_psicometrico      = parseFloat(cantidad_psicometrico_partida) * parseFloat(costo_psicometrico_partida);

  var paq_maquila                     = $('#paquete_maquila').val();
  var precio_partida_maquila          = 0.00;
  var nombre_paquete_pscio          = ''; 
  
  //lista_psico_pruebas
   
  if( tipo_pruebca_psicometricos == -1 ){
    swal('¡Debes seleccionar un paquete!','No se puede realizar una cotización','warning');
  }else{
      lista_seleccion = getPruebasPsicometricasSeleccionadas();
      //pepeleonero
       <?php 
       
        //dd($pruebasPsicometricas);
         $i=0;
         $max=count($pruebasPsicometricas);
        // dd($max);
        for($i;$i<$max;$i++){ ?>
          if(tipo_pruebca_psicometricos=='<?php echo  $pruebasPsicometricas[$i]->idtipo ?>'){ nombre_paquete_pscio ='<?php echo $pruebasPsicometricas[$i]->prueba ?>' }
            
    <?php } ?>
   

      
      str_aux_partida_psico         = str_plantilla_psicometricos.replace('{tipo_prueba_psicometricos}'        , tipo_pruebca_psicometricos);
      str_plantilla_psicometricos   = str_aux_partida_psico.replace('{costo_psicometrico}'                     , costo_psicometrico_partida);
      str_aux_partida_psico         = str_plantilla_psicometricos.replace('{add-class-partida-psicometricos}'  , 'numero-de-partida-psicometrico');
      str_plantilla_psicometricos   = str_aux_partida_psico.replace('{costo_psicometrico_nombre}'              , nombre_paquete_pscio);   
      str_aux_partida_psico         = str_plantilla_psicometricos.replace('{id_pruebas_psicometricas}'  , lista_seleccion);

      str_plantilla_psicometricos   = str_aux_partida_psico.replace('{cantidad_psicometrico_partida}'   , cantidad_psicometrico_partida);   

      str_aux_partida_psico         = str_plantilla_psicometricos.replace('{total_psicometrico_partida}'  , total_partida_psicometrico);      
      
      
      
      $('#partidas_psicometricos').append(str_aux_partida_psico);    

  }
}

var getPruebasPsicometricasSeleccionadas = function(){

    var prueba              = $('#prueba_psicometrico').val();
    var pruebasSelecciondas = '';
    var checkboxValues      = new Array();

    if(prueba != 3){

      $('input[name="prueba[]"]:checked').each(function() {             
          checkboxValues.push($(this).val());            
      });
    }else{
      checkboxValues.push('21');
    }      

      pruebasSelecciondas = checkboxValues.join('-');

    return pruebasSelecciondas;


}
var eliminarPartidaPsicometricos = function(obj){

    var indice_partida             = $('.eliminar-partida-psicometrico').index(obj);
    var html_partida_psicometrico  = $('.numero-de-partida-psicometrico').get(indice_partida);
    $(html_partida_psicometrico).remove();
    calcularServicioPsicometricos();
    
}

var calcularServicioPsicometricos = function(){
      longitud_partidas_psicometricos   = $('.numero-de-partida-psicometrico').length;
      
      
      var subt_total_cotizacion_psico   = 0.00;
      var iva_cotizacion_psico          = 0.00;
      var total_cotizacion_psico        = 0.00;
      var arr_psico_subtotal            = new Array();
      var arr_psico_iva                 = new Array();
      var arr_psico_total               = new Array();
      var arr_psico_id                  = new Array();
      var arr_pruebas_psico_selected    = new Array();
      var arr_psico_cantidad            = new Array();  
      

      
      for(i=0; i< longitud_partidas_psicometricos; i++){
                  costo_psico_aux = $('.class_costo_psicometrico').get(i);

                  psico_partida_costo     = 0.00; 
                  psico_partida_iva       = 0.00; 
                  psico_partida_total     = 0.00;

                if(costo_psico_aux.value != '{costo_psicometrico}'){ 
                    id_psico = $('.class_id_psicometrico').get(i);

                    psico_partida_pruebas   = $('.lista-pruebas-psico-seleccionadas').get(i);
                    psico_partida_cantidad  = $('.cantidad_psicometrico_partida').get(i); 
                    psico_partida_costo     = parseFloat(costo_psico_aux.value) * psico_partida_cantidad.value;
                    psico_partida_iva       = parseFloat(psico_partida_costo) * 0.16;
                    psico_partida_total     = psico_partida_costo + psico_partida_iva;

                    subt_total_cotizacion_psico += psico_partida_costo;
                    iva_cotizacion_psico        += psico_partida_iva;
                    total_cotizacion_psico      += psico_partida_total;


                    arr_psico_subtotal.push(psico_partida_costo);
                    arr_psico_iva.push(psico_partida_iva);
                    arr_psico_total.push(psico_partida_total);  
                    arr_psico_id.push(id_psico.value);  
                    arr_pruebas_psico_selected.push(psico_partida_pruebas.value); 
                    arr_psico_cantidad.push(psico_partida_cantidad.value);            

                  }
      }
      
      $('#lista_psico_subtotal').val(arr_psico_subtotal.join(','));
      $('#lista_psico_iva').val(arr_psico_iva.join(','));
      $('#lista_psico_total_partida').val(arr_psico_total.join(','));
      $('#lista_psico_pruebas').val(arr_psico_id.join(','));
      $('#lista_psico_pruebas_seleccionadas').val(arr_pruebas_psico_selected.join(','));
      $('#lista_psico_cantidad').val(arr_psico_cantidad.join(','));
      

      $('#iva_psico').html('$ '+number_format(iva_cotizacion_psico,2));                    
      $('#tot_psico').html('$ '+number_format(total_cotizacion_psico,2));

      $('#subtotal_psicometrico').val(parseFloat(subt_total_cotizacion_psico).toFixed(2));
      $("#iva_psicometrico").val(parseFloat(iva_cotizacion_psico).toFixed(2));
      $('#total_psicometrico').val(parseFloat(total_cotizacion_psico).toFixed(2)); 

      
}


/************************************************************************************************************************************
*************************************************************************************************************************************
                                                  FIN COTIZADOR PSICOMETRICOS
*************************************************************************************************************************************
************************************************************************************************************************************/


/* ------------------convertir valores a  formato de moneda con dos decimales------------------*/
function number_format(amount, decimals) {
    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto
    decimals = decimals || 0; // por si la variable no fue fue pasada
    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);
    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);
    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;
    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}
/* ------------------convertir valores a  formato de moneda ------------------*/

var sweetAlertCampos = function(title){
  swal({
                 title:title ,
                 text: "",
                 timer: 2000,
                 showConfirmButton: false,
                 type: "warning"
           });
}
</script>
@endsection

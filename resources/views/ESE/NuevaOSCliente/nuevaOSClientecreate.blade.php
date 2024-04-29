@extends('layouts.masterMenuView')
@section('section')
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
       .requerido:after {
        content:" *";
        color: red;
    }
    .button {
    display: inline-block;
    word-wrap: break-word;
    }
    #requerido:after {
    content:" *";
    color: red;
    }
    #div-des{
    height:100px;
    width:100%;
    word-wrap: break-word;
    }
    :required:invalid {
    border: 1px solid red;
    }
    .error{
        color: red;
    }
    </style>
</head>
<div class="content">
<ol class="breadcrumb ">
<!-- <li><a href="{{ route('sig-erp-ese::catalogosese.index') }}">Catálogos ESE</a></li> -->
		<li><a href="{{route('sig-erp-ese::NuevaOSCliente.index')}}">Solicitar Servicio</a></li>
		<li>Solicitar Servicio</li>
   </ol>
<h1 class="page-header text-center">Solicitar Servicio</h1>
    <input type="hidden" id="tipouser" value="{{Auth::user()->tipo}}">
	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h5 class="panel-title">Solicitar Servicio: {{$nservicio}}</h5>
        </div>
        <div class="panel-body">
            <form id="form-alta-plcliente">
                @include('ESE.NuevaOSCliente.nuevaOSClienteform')
            </form>
        </div>
    </div>
 @include('ESE.NuevaOSCliente.nuevaOSClienteformE')

 <!-- Modal para mostrar los resultados de la busqueda por RFC -->

<div class="modal fade" id="RfcModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped">
                <thead>

                    <th>Nombre</th>

                    <th>Cliente</th>

                    <th>Estudio</th>

                    <th>Fecha</th>

                    <th></th>

                </thead>

                <tbody id="tablebody"></tbody>
            </table>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"></button> --}}
        </div>
      </div>
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
    {!! Html::script('assets/js/Bootstrap_notify/bootstrap-notify.js') !!}
    {!! Html::script('assets/js/Bootstrap_notify/notify.js') !!}
    {!! Html::script('assets/js/error_message_ajax/error_message.js') !!}
    {!! Html::script('assets/js/Format_telephone/format_telephone.js') !!}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script type="text/javascript">

function reset() {
    history.pushState({}, "", "");
}
var time = 0;

function doStuff(){
      location.href ="{{url('NuevaOSCliente')}}";
}
reset();

setTimeout(function() {
    window.onpopstate = function(event) {
        doStuff();
        reset();
    };
},1);
if(document.getElementById("menu-ese")){
    document.getElementById("menu-ese").style.display="block";
}

$('#Guardar').click(function(){
    if( $("#VaIn").val()==1){
            $("#create").modal('hide');
        }
});
var _InputsForEse = [] // array para almacenar los inputs por servicio, esto cuando se escriba en en RFC y se realice la busqueda
var _dataInputs = [] // array para almacenar los inputs que se les copio la info.
var _tipoModalidad; // variable para ser utilizado en el change de modalidad
var _flatIncrement = true; // variable para saber cuando incrementar el contador del numero de estudio a solicitar
var _isShowMessageRfc = []; 
var _flatSearchCp = true; // para saber si el codigo p. fue copiado de otro estudio o no.

function GModalidadC(nombre){ 
    var IdModalidad = $("#IdModalidad"+nombre).val();
    _tipoModalidad = $(`#${nombre} option:selected`).html();
    modalidad = _tipoModalidad;
    _tipoModalidad = _tipoModalidad.replace('Telefónica','Telefonico');
    var v=nombre;
    var arr=v.split("_");
    IdEse=parseInt(arr[1]);
    _flatIncrement = false;
    $.ajax({
            url: "{{ url('UpdateModalidad') }}/"+IdModalidad+"/"+IdEse,
            type: "GET",
            dataType: "json",
            success: function( response )
            {
                $('.changMd'+nombre).text(modalidad);
                $('#'+nombre+"-formC").empty();
                EntradasEstudio(nombre,_tipoModalidad);
                collapse();
            },
            error : function(xhr, status)
            {
                console.error('Upss, algo salio mal!!');
            }
	});
}

function GPrioridadC(nombre){
    var IdPrioridad = $("#IdPrioridad"+nombre).val();
    var v=nombre;
        var arr=v.split("_");
        IdEse=parseInt(arr[1]);
    $.ajax({
            url: "{{ url('UpdatePrioridad') }}/"+IdPrioridad+"/"+IdEse,
            type: "GET",
            dataType: "json",
            success: function( response )
            {
                $('.changPr'+nombre).text(response[0]);
            },
            error : function(xhr, status)
            {
                console.error('Upss, algo salio mal!!');
            }
	});
}

function SolicitarChE(){
    var IdCliente=$('#IdCliente').val();
    var sv=$('#IdServicio').val();
    let cr=0;
    //VALIDACION COMENTADA TEMPORALMENTE POR VALIDACION DE REQUERIDOS
    $('#form-alta-plcliente').find('input').each(function(){
        if($('label[for="'+$(this).attr('name')+'"]').html()=='Celular' && $(this).val().length<10){
            cr=cr+1;   
        }
        else if(($(this).prop('required'))&&($(this).val()=='')){
            cr=cr+1; 
        } 
    }); 
    if (cr>0) { 
        swal({
			title: "<h3>¡ Por favor complete los campos !</h3>",
			html: true,
			data: "",
			type: "error"
        });
        return false;
    } else {
        $.ajax({
            url: "{{ url('SolicitarOSC') }}/"+IdCliente+"/"+sv,
            type: "GET",
            dataType: "json",
            success: function( response )
            {
                sendNotification(IdCliente);
                swal({
			    title: "<h3>¡ Se Creo la Orden de Servicio !</h3>",
			        html: true,
			        data: "",
			        type: "success"
                });
            },
            error : function(xhr, status)
            {
                swal({
			    title: "<h3>¡ Error !</h3>",
			        html: true,
			        data: "",
			        type: "error"
                });
                console.error('Upss, algo salio mal!!');
            }
	    });
    }
}

function collapse(){
  $(".btn btn-link").addClass("collapsed");
  $(".collapse").removeClass("in");
  if(_flatIncrement){
    var NumESE = $("#contadorEse").val();
    var parse = contfe=parseInt(NumESE);
    $("#contadorEse").val((parse+1));
  }else{
      _flatIncrement = true;
  }
  $("html, body").animate({ scrollTop: $(document).height() }, "slow");
}
var IdSE='';
cntpl=1;
var AddEstudio = function(){

    
    if($('#plG').is(":visible")){
                var formatoPlantilla = $('#plG').val();
                formatoPlantilla = formatoPlantilla.split('-');
                var formp = formatoPlantilla[0];
                var idPlantillaCliente = formatoPlantilla[1];
                var IdCliente=$('#IdCliente').val();
                var NServicio=$('#NServicio').val();
                var IdServicio=($('#serv').val() != undefined)?$('#serv').val():0;
                var cntM=0;
                var AcntM=0;
                var link="#idCopEstudioE";
                var hrefO=$(link).attr('href');
                if(hrefO!='#EstudioO'){
                    hrefO='SN';
                }else{
                    hrefO='EstudioO';
                    $('[href="#'+hrefO+'"]').closest('li').hide();
                }             
                
                var solicitante = $("#solicitantev").val();
                
                $.ajax({
                    url: "{{ url('ConfiguracionOSPC') }}/"+formp+"/"+IdCliente+"/"+IdServicio+"/"+hrefO+"/"+idPlantillaCliente+"/"+solicitante,
                    type: "GET",
                    dataType: "json",

                    success: function( response )
                    {
                        estudio_strCE  = $('#plantilla-estudios').html();
                        estudiosfCE      = estudio_strCE.split("EstudioP").join(response[1]);
                        estudiosfr = estudiosfCE.replace('candidatoT'+response[1],' N/A').replace('servicioT'+response[1],NServicio+'&nbsp;').replace('modalidadT'+response[1],response[7]).replace('prioridadT'+response[1],response[8]);
                        $('#container-estudios').append(estudiosfr);
                        $('.changserv'+response[1]).text(NServicio);
                        $('.changMd'+response[1]).text(response[7]);
                        $('.changPr'+response[1]).text(response[8]);
                        $("#IdModalidad"+response[1]).html("");
                        response[5].forEach(element => { 
                            $("#IdModalidad"+response[1]).append(`<option value='${element.IdModalidad}'>${element.Descripcion}`);
                        });
                        $("#IdModalidad"+response[1]).attr("selected",true);
                        document.getElementById(`IdPrioridad${response[1]}`).value = response[4];
                        if(response[3]!=1){
                            if(response[9]==1){
                                $("#IdModalidad"+response[1]).attr("disabled",true);
                            }else if(response[9]==13){
                                $("#IdModalidad"+response[1]).attr("disabled",true);
                                $("#IdPrioridad"+response[1]).attr("disabled",true);
                            }
                            else{
                                $("#IdModalidad"+response[1]).attr("disabled",false);
                                $("#IdPrioridad"+response[1]).attr("disabled",false);
                            }
                        }else{
                            $("#IdModalidad"+response[1]).attr("disabled",true);
                        }
                        if(NServicio == "Trayectoria Laboral"){
                            $(`#IdModalidad${response[1]} option[value="1"]`).attr("selected",true);
                        }
                        $('[href="#'+response[1]+'"]').closest('li').show();
                        $('#IdServicioEse').val(response[0]);
                        _tipoModalidad = response[7];
                        EntradasEstudio(response[1],response[7]);
                        cntM=$('#ContadorS').val();
                        AcntM=parseInt(cntM)+1;
                        $('#ContadorS').val(AcntM);
                        $('#contadorEse').val(AcntM);
                        $('#SolicitarChE').show();
                        $(".btn btn-link").addClass("collapsed");
                        $(".collapse").removeClass("in");
                        $("html,body").animate({
				            scrollTop: $('html,body').get(0).scrollHeight
				        },2000);
                    },
                    error : function(xhr, status)
                    {
                        console.error('Upss, algo salio mal!!'+xhr.status);
                    }
		        });
        }else{
            var cntM=0;
            var AcntM=0;
            var sv=$('#serv').val();
            var pl=$('#pl').val();
                IdSE=$('#IdServicioEse').val();
                idplc=$('#IdPlantillaCliente').val();
                var NServicio=$('#NServicio').val();
                $('#AplicarEstudios').hide();
                $('#pl').attr('disabled',true);
                $('#serv').attr('disabled',true);
                var IdCliente=$('#IdCliente').val();
                var IdTipServicio=$('#serv').val();
                var link="#idCopEstudioE";
                var hrefO=$(link).attr('href');
                if(hrefO!='#EstudioO'){
                    hrefO='SN';
                }else{
                    hrefO='EstudioO';
                    $('[href="#'+hrefO+'"]').closest('li').hide();
                }
                $.ajax({
                    url: "{{ url('ConfiguracionOSPC') }}/"+pl+"/"+IdCliente+"/"+IdTipServicio+"/"+hrefO,
                    type: "GET",
                    dataType: "json",
                    success: function( response )
                    {
                        estudio_strCE  = $('#plantilla-estudios').html();
                        estudiosfCE      = estudio_strCE.split("EstudioP").join(response[1]);
                        estudiosfr = estudiosfCE.replace('candidatoT'+response[1],' &nbsp;').replace('servicioT'+response[1],NServicio+'&nbsp;').replace('modalidadT'+response[1],response[7]).replace('prioridadT'+response[1],response[8]);
                        $('#container-estudios').append(estudiosfr);
                        $('.changserv'+response[1]).text(NServicio);
                        $('.changMd'+response[1]).text(response[7]);
                        $('.changPr'+response[1]).text(response[8]);
                        $("#IdModalidad"+response[1]).html("");
                        response[5].forEach(element => { 
                            $("#IdModalidad"+response[1]).append(`<option value='${element.IdModalidad}'>${element.Descripcion}`);
                        });
                        $("#IdModalidad"+response[1]).attr("selected",true);
                        if(response[3]!=1){
                            $("#IdModalidad"+response[1]).attr("disabled",false);
                        }else{
                            $("#IdModalidad"+response[1]).attr("disabled",true);
                        }
                        $('[href="#'+response[1]+'"]').closest('li').show();
                        $('#IdServicioEse').val(response[0]);
                        _tipoModalidad = response[7];
                        EntradasEstudio(response[1],response[7]);
                        cntM=$('#ContadorS').val();
                        AcntM=parseInt(cntM)+1;
                        $('#ContadorS').val(AcntM);
                        $('#contadorEse').val(AcntM);
                        $('#SolicitarChE').show();
                        $(".btn btn-link").addClass("collapsed");
                        $(".collapse").removeClass("in");
                        $("html,body").animate({
				            scrollTop: $('html,body').get(0).scrollHeight
				        },2000);
                    },
                    error : function(xhr, status)
                    {
                        console.error('Upss, algo salio mal!!');
                    }
		        });
           } 
           cntpl++;
}

var removeEstudio = function(obj,nombre){
        var cntM=0;
        var AcntM=0;
        var v=nombre;
        var arr=v.split("_");
        contfer=parseInt(arr[1]);
        $.ajax({
                    url: "{{ url('DeletePlantilla') }}/"+contfer,
                    type: "GET",
                    dataType: "json",
                    success: function( response )
                    {
                        if(response[0] == "success"){
                            $("#contenedor-estudios"+nombre+"").remove();
                            cntM=$('#ContadorS').val();
                            AcntM=parseInt(cntM)-1;
                            $('#ContadorS').val(AcntM);
                            $('#contadorEse').val(AcntM);
                        }
                    },
                    error : function(xhr, status)
                    {
                        console.error('Upss, algo salio mal!!');
                    }
		        });
  }

  var EntradasEstudio = function(nombre,TipoModalidad){
        var Pln = $("#IdServicioEse").val();
        $.ajax({
            url: "{{ url('DatosPlantillaN') }}" +"/"+nombre+"/"+TipoModalidad,
            type: "GET",
            dataType: "json",
            success: function( response )
            {
                $("#"+nombre+" #grpos").empty();
                $.each(response[0],function(index,value){
                    $("#"+nombre+" #grpos").append("<li id='"+nombre+"'>"+value+"</li>");
                        $("#"+nombre+" #grps").empty();
                        $.each(response[1],function(index,value){
                            $("#"+nombre+" #grps").append(value);
                        });
                });
                var cantL=response[3].length;
                var cantE=response[5].length;
                    $.each(response[3],function(index,value){
                        var aHREF=value;
                                        for (var i = 0; i < cantL; i++) {
                                            if( aHREF == response[3][i]){
                                                $("#"+nombre+"-formC").append("<span class='col-sm-12'>"+response[2][i]+"</span>");
                                                    for (var j=0; j < cantE; j++) {
                                                        var name_value="";
                                                        var AgrpGrup=response[6][i];
                                                        var AgrpE=response[5][j];
                                                        if(""+AgrpGrup+"" == ""+AgrpE+"" ){
                                                        ;
                                                            $("#"+nombre+"-formC").append("<span class='col-sm-6'>"+response[4][j]+"</span>");
                                                            $("input:checkbox").each(function(){
                                                            name_value=name_value + this.name+", ";
                                                            });
                                                                value=name_value;
                                                        }
                                                    }
                                                    var ciContact = value.split(",");
                                                    cantv=ciContact.length;
                                                    for (var j = 0; j < cantv; j++) {
                                                        if(ciContact[j]!=''){
                                                        malerta(ciContact[j]);
                                                        }
                                                    }
                                            }
                                        }
                    });
            },
            error : function(xhr, status)
            {
                console.error('Upss, algo salio mal!!');
            }
        });
    }

  var formp='';
    $('#plG').change(function() {
        var formatoPlantilla = $('#plG').val();
        formatoPlantilla = formatoPlantilla.split('-');
        formp = formatoPlantilla[0];
    });

    var serv= function(){
        if($('#plG').is(":visible")){
            if(formp!=''){
                $('#AplicarEstudios').hide();
                $('#plG').attr('disabled',true);
                var IdCliente=$('#IdCliente').val();
                var IdServicio=0;
                var hrefO=$("#idOrg").attr('href');
                if(hrefO!='#EstudioO'){
                    hrefO='SN';
                }else{
                    hrefO='EstudioO';
                }
                AddEstudio();
            }else{
                $('#AplicarEstudios').show();
                $('#plG').attr('disabled',false);
                $('#mensC').html("<div class='alert alert-danger fade in m-b-15'></strong>  Favor de seleccionar dato requerido.<span class='close' data-dismiss='alert'>×</span></div>");
            } 
        }else{
            var sv=$('#serv').val();
            var pl=$('#pl').val();
            if((sv!='') && (pl!='')){
                $('#AplicarEstudios').hide();
                $('#pl').attr('disabled',true);
                $('#serv').attr('disabled',true);
                var IdCliente=$('#IdCliente').val();
                var IdTipServicio=$('#serv').val();
                IdSE=0;
                idplc=0;
                var hrefO=$("#idOrg").attr('href');
                if(hrefO!='#EstudioO'){
                    hrefO='SN';
                }else{
                    hrefO='EstudioO';
                }
                AddEstudio();
            }else{
                $('#AplicarEstudios').show();
                $('#pl').attr('disabled',false);
                $('#serv').attr('disabled',false);
                $('#mensC').html("<div class='alert alert-danger fade in m-b-15'></strong>  Favor de seleccionar dato(s) requerido(s).<span class='close' data-dismiss='alert'>×</span></div>");
            } 
        }
    }

function cancelar(){
  var e=$("#ct").val();
  setTimeout(function(){
      location.href = '{{ url("PlantillaClienteCI") }}/'+e;
  },500);
}

function FPlantillas(){
    var Idserv = $("#serv").val();
            if(Idserv!=''){
                $.ajax({
                    url: "{{ url('FPlantillasCOS') }}/"+Idserv+"/"+{{$IdCliente}}+"/"+{{$servi}},
                    type: "GET",
                    dataType: "json",
                    success: function( response )
                    {
                        $('#plG').attr('disabled', false);
                        $("#plG").html('');
                        $("#plG").html(response[0]);
                    },
                    error : function(xhr, status)
                    {
                        console.error('Upss, algo salio mal!!');
                    }
		        });
            }else{
                $('#pl').attr('disabled', true);
                $("#pl").html('');
            }
}
$(document).ready(function(){
    $('#plantilla-estudios').hide();
    $('#contEstudios').hide();
    $('#contEstudiosR').hide();
    $('#SolicitarChE').hide();
    $('[href="#EstudioO"]').closest('li').hide();
});
    $('#GuardarM').on('click',function(e){
    var ct= $("#ct").val();
    var pl= $("#pl").val();
    if((pl!=null) && (pl!='')){
        var uant = document.referrer;
        var origin   = window.location.origin;
        var urlA   = uant.replace(origin,"");
            if (urlA.indexOf("/PlantillaxCliente") > -1) {
                $("#ct").attr('disabled', true);
            }else{
                $("#ct").attr('disabled', false);
            }
    var Nurl='/PlantillaxCliente/'+ct;
    var Aurl=urlA+'/'+ct;
    $.ajax({
					url: '{{ url('GuardarPlantillaCliente') }}',
					type:'GET',
					data: {ct:ct,pl:pl},
					success: function(response){
                        $("#IdPlantilla").val(response);
                        setTimeout(function(){
                            if (urlA.indexOf("/PlantillaxCliente") > -1) {
                                location.href = "{{ url('PlantillaClienteRPC') }}/"+response+"/"+ct;
                            }else{
                                location.href = "{{ url('PlantillaClienteR') }}/"+response+"";
                            }
                    },500);
					}
                });
    return false;
    }else{
    }
    });

    var mostrarValor = function(x){
        var p=document.getElementById('valcnt').value=x;
    };
    var uant = document.referrer;
        var origin   = window.location.origin;
        var urlA   = uant.replace(origin,"");
            if (urlA.indexOf("/PlantillaxCliente") > -1) {
                $("#ct").attr('disabled', true);
            }else{
                $("#ct").attr('disabled', false);
            }
	$(document).ready(function(){
        $("#pl").attr('disabled', true);
        $('tr').click(function() {
            var checkbox = $(this).find('td:first').find('input');
            if (checkbox.is(':checked')) {
            } else {
                checkbox.attr('checked', true);
            }
            checkbox.change(function(){
                    if (checkbox.is(':checked')) {
                        checkbox.attr('checked', false);
                    }
                    else{
                        checkbox.attr('checked', true);
                    }
                });
        });
        var val = $("#VaIn").val();
        if($("#VaIn").val()!=1){
            $("#create").modal('show');
            $("#VaIn").val(1);
        }

    	iniciarTabla();
    	$('[data-toggle="popover"]').popover({
    		delay: { "show": 500, "hide": 100 },
    		trigger:'focus'
        });
        $('#cnt').on('change',function(){
            var NomEmp = $(this).val();
        });
        $('#grupos').change(function() {
			var datos;
            datos = $("#IdContenedor").val();
				$.ajax({
					url: '{{ url('ValidacionPG') }}',
					type:'GET',
					data: {datos:datos},
					success: function(response){
                        $("#subgrupo").html(response[0]);
                        $("#campo").html(response[1]);
					}
                });
		});
        $('#sg').change(function() {
			var datos;
            datos = $("#subgrupo").val();
				$.ajax({
					url: '{{ url('ValidacionPC') }}',
					type:'GET',
					data: {datos:datos},
					success: function(response){
                        $("#campo").html(response[0]);
					}
                });
        });
    });

	var iniciarTabla = function(){
        var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                 "aoColumnDefs": [
                                    { "bVisible": false, "aTargets": [12] },
                                    { "bVisible": false, "aTargets": [13] },
                                    { "bVisible": false, "aTargets": [14] },
                                    { "bVisible": false, "aTargets": [15] },
                                ],
                                "order": [[ 13, "asc" ],[ 14, "asc" ],[ 12, "asc" ],[ 11, "asc" ],[ 15, "asc" ]],
                                buttons: [
                                    {
                extend: 'excelHtml5',
                title: 'Listado de Plantilla Genérica',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Plantilla Genérica',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de Plantilla Genérica',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
             }
                                ],
                                responsive: true,
                                autoFill: true,
                                "paging": false,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                dom:'Blfrtip' ,
                                "drawCallback": function( settings ) {
							        $('[data-toggle="popover"]').popover({
							    		delay: { "show": 500, "hide": 100 },
							    		trigger:'focus'
							    	});
							    },
                            } );
        }
</script>

<script>
var Capturar = function(){
let lstNumero = document.getElementsByClassName("entradas-g-a"),
arrayGuardar = [];
arrayGName = [];
for (var i = 0; i < lstNumero.length; i++) {
    arrayGuardar[i] = lstNumero[i].value;
    arrayGName[i] = lstNumero[i].getAttribute('name');
    var array = [];
    $("input:checkbox[name="+arrayGName[i] +"]:checked").each(function(){
        array.push($(this).val());
    });
    array = array.join("|");
    if(array!=''){
        arrayGuardar[i] = array;
    }
    var mtarray = [];
    $("[name="+arrayGName[i] +"].matriztexto").each(function(){
        mtarray.push($(this).val());
    });
    mtarray = mtarray.join("|");
    if(mtarray!=''){
        arrayGuardar[i] = mtarray;
    }
    var ntarray = [];
    $("[name="+arrayGName[i] +"].matriznumero").each(function(){
        ntarray.push($(this).val());
    });
    ntarray = ntarray.join("|");
    if(ntarray!=''){
        arrayGuardar[i] = ntarray;
    }
    var dtarray = [];
    $("[name="+arrayGName[i] +"].matrizfecha").each(function(){
        dtarray.push($(this).val());
    });
    dtarray = dtarray.join("|");
    if(dtarray!=''){
        arrayGuardar[i] = dtarray;
    }
    // si no es de tipo cliente el user
    if(document.getElementById("tipouser").value != "c"){
        if(document.querySelector(`[name="${arrayGName[i]}"]`).getAttribute('id') == 'RFCno' ||
        document.querySelector(`[name="${arrayGName[i]}"]`).getAttribute('id') == 'RfcEmpresa'){
            var value = document.getElementsByName(arrayGName[i])[0].value;
            var length = document.querySelector(`[name="${arrayGName[i]}"]`).getAttribute('maxlength');
            // almacenamos info en array _isShowMessageRfc para solo mostrar una ves el msg
            if(_isShowMessageRfc.length == 0){
                _isShowMessageRfc.push({"data":{
                                                "nameese":document.querySelector(`[name="${arrayGName[i]}"]`).getAttribute('data-nameese'),
                                                "showMessage":false
                                                }
                                      });
            }else{
                var findForPush = _isShowMessageRfc.find(campo => campo.data.nameese == document.querySelector(`[name="${arrayGName[i]}"]`).getAttribute('data-nameese'));
                // si no se encontro se inserta en el array
                if(findForPush == undefined){
                    _isShowMessageRfc.push({"data":{
                                                "nameese":document.querySelector(`[name="${arrayGName[i]}"]`).getAttribute('data-nameese'),
                                                "showMessage":false
                                                }
                                      });
                } 
            }
            if(value.length == length){
                // buscamos que en array de objetos
                var find = _isShowMessageRfc.find(campo => campo.data.nameese == document.querySelector(`[name="${arrayGName[i]}"]`).getAttribute('data-nameese'));
                if(find != undefined){
                    if(!find.data.showMessage){
                        showMessageRfc(); 
                    }
                }
                // recorremos el array y cambiamos el valor del atributo showmessage
                _isShowMessageRfc.forEach(element => {
                    if(element.data.nameese == document.querySelector(`[name="${arrayGName[i]}"]`).getAttribute('data-nameese')){
                       element.data.showMessage = true;
                    }
                });
            }
        }
    }
    if(document.querySelector(`[name="${arrayGName[i]}"]`).getAttribute('id') == 'CodigoPostal')
        _flatSearchCp = true;  
}
    keysEntr=arrayGName;
    valuesEntr=arrayGuardar;
}

function EtiquetaFIV(v){
// DISABLED FECHAS INGRESO//
var input = $('input[name="'+v+'"]');
var today = new Date();
var day = today.getDate();
var mon = new String(today.getMonth()+1); 
var yr = today.getFullYear();
day = day + "";
if(day.length == 1){
  day = "0" + day;    
}
if (mon.length < 2) {
  mon = "0" + mon;
}
var date = new String(yr + '-' + mon + '-' + day);
input.disabled = false;
input.attr('max', date);
// FIN DISABLED FECHAS INGRESO//
}

function EtiquetaCP(value, NumEst){
       var token = $('meta[name="csrf-token"]').attr('content');
       let cp = value;
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
             idEstado=$('label[name="N/A Ciudad / Municipio / Alcaldía_EstudioE'+NumEst+'_'+NumEst+'"]').attr("idInp");
             idColonia=$('label[name="N/A Colonia_EstudioE'+NumEst+'_'+NumEst+'"]').attr("idInp");
			 campoEstado=$('label[name="N/A Estado_EstudioE'+NumEst+'_'+NumEst+'"]').attr("idInp");
             $('input[name="'+idEstado+'"]').attr('value', datos[5]);
             GuardadoInput(idEstado,datos[5]);
			 $('input[name="'+campoEstado+'"]').attr('value', datos[3]);
             GuardadoInput(campoEstado,datos[3]); 
             $('select[name="'+idColonia+'"] option').remove();
             colonias = datos[8].split(";");
             for (var i = 0; i < colonias.length; i++) {
               items+='<option value="'+colonias[i]+'">'+colonias[i]+'</option>'
             }
             $('select[name="'+idColonia+'"]').prepend(items);
             GuardadoInput(idColonia,colonias[0]);
           },
           error : function(jqXHR, status, error) {
           }
       });
}

function getNumbers(inputString){
            var regex=/\d+\.\d+|\.\d+|\d+/g, 
                results = [],
                n;
            while(n = regex.exec(inputString)) {
                results.push(parseFloat(n[0]));
            }
            return results;
        }

function malerta(name_value) {
  var name=name_value;
  var re = /\[.+?]/g;
   name = name_value.replace(re,'');
   $.ajax({
    url: '{{ url('valuescampos') }}',
    type:'GET',
    data: {name:name},
    success: function(response){
        if(response[1] != null){
              if(response[2]=='Selección Multiple'){
              var ciContact = response[1].split(",");
              for (var j = 0; j < ciContact.length; j++) {
                  $('input[name='+response[0]+'][value=' + ciContact[j] + ']').attr('checked','checked');
              }
            }
      }
    }
  });
}

function validate(id) {
var input = document.getElementById(id);
var maxfilesize = 307200,
    filesize    = input.files[0].size,
    filename    = input.files[0].name,
    tipo        = input.files[0].type,
    warningel   = document.getElementById( 'lbError' );
if ( filesize > maxfilesize )
{
    warningel.innerHTML = "Archivo Demasiado Grande. Tamaño Máximo: 300K ";
    return false;
}
else{
    var fileInput = filename;
    var filePath = fileInput.value;
    var file_ext = filename.substring(filename.lastIndexOf('.')+1);
    if(tipo == 'application/pdf'){
        var allowedExtensionsPDF = /(\.PDF|\.pdf)$/i;
        if(!allowedExtensionsPDF.exec("."+file_ext)){
            warningel.innerHTML = "Seleccione un archivo .pdf";
            fileInput.value = '';
            return false;
        }
        else{
          warningel.innerHTML = "";
            var fd = new FormData(document.getElementById("my_form"+id));
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {'X-CSRF-TOKEN':token},
                url: "{{ url('GuardarFile') }}/"+id,
                method: "post",
                processData: false,
                contentType: false,
                data: fd,
                success: function (data) {
                },
                error: function (e) {
                }
            });
        }
    }
    if(tipo == 'image/jpeg'){
        var allowedExtensionsJPEG = /(\.JPEG|\.jpeg)$/i;
        if(!allowedExtensionsJPEG.exec("."+file_ext)){
            warningel.innerHTML = "Seleccione un archivo .jpeg";
            fileInput.value = '';
            return false;
        }
        else{
          warningel.innerHTML = "";
            var fd = new FormData(document.getElementById("my_form"+id));
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {'X-CSRF-TOKEN':token},
                url: "{{ url('GuardarFile') }}/"+id,
                method: "post",
                processData: false,
                contentType: false,
                data: fd,
                success: function (data) {
                },
                error: function (e) {
                }
            });
        }
    }
}
}

var GuardadoInput = function(id,value){
    var etiqueta= $('label[for="'+id+'"]').html();
    if(document.querySelector(`[name="${id}"]`).getAttribute('id') == 'CodigoPostal'){
        var value = document.querySelector(`[name="${id}"]`).value;
        var nameese = document.querySelector(`[name="${id}"]`).getAttribute('data-nameese');
        var inputs = document.querySelectorAll(`[data-nameese="${nameese}"]`);
        removeMessageValidate(id);
        if(value.length == document.querySelector(`[name="${id}"]`).getAttribute('maxlength')){
            if(_flatSearchCp)
            searchCodigoPostal(document.querySelector(`[name="${id}"]`).value,inputs);
        }else{
            showMessageValidate(id,"El campo Código Postal incompleto");
        }
    }
    if(etiqueta=='Correo electrónico'){
        var etiquetaCEName= $('label[for="'+id+'"]').attr("name");
        var NumEstArr=getNumbers(etiquetaCEName);
        var ArrNameEst =  $.unique(NumEstArr.join(",").split(","));
        var NumEst=ArrNameEst.toString();
        idCElect=$('label[name="N/A Correo electrónico_EstudioE'+NumEst+'_'+NumEst+'"]').attr("idInp");
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var emailaddressVal = $('input[name="'+id+'"]').val();
        if(emailaddressVal == '') {
            if ($('input[name="'+id+'"]').next('span').length < 1) {
                $('input[name="'+id+'"]').after('<span class="error" style="color: red;">Introduzca una dirección de correo electrónico válida.</span>');
            }
            hasError = true;
        }
        else if(!emailReg.test(emailaddressVal)) {
            if ($('input[name="'+id+'"]').next('span').length < 1) {
                $('input[name="'+id+'"]').after('<span class="error" style="color: red;">Introduzca una dirección de correo electrónico válida.</span>');
            }
            hasError = true;
        }
        if(hasError == true) { 
            value="";
            return false; 
        }else{
            $('input[name="'+id+'"]').next('span').remove();
        }
    }
    if(etiqueta=='Fecha de nacimiento'){
        var etiquetaCEName= $('label[for="'+id+'"]').attr("name");
        var NumEstArr=getNumbers(etiquetaCEName);
        var ArrNameEst =  $.unique(NumEstArr.join(",").split(","));
        var NumEst=ArrNameEst.toString();
        idCElect=$('label[name="N/A FechaNacimiento fechaNacimiento_EstudioE'+NumEst+'_'+NumEst+'"]').attr("idInp");
        var hasError = false;
        var emailReg = /^([a-zA-Z ]{2,254})$/;
        var emailaddressVal = $('input[name="'+id+'"]').val();
        if(emailaddressVal == '') {
            if ($('input[name="'+id+'"]').next('span').length < 1) {
                $('input[name="'+id+'"]').after('<span class="error">Introduzca una fecha de nacimiento válida.</span>');
            }
            hasError = true;
        }
        else if(emailReg.test(emailaddressVal)) {
            if ($('input[name="'+id+'"]').next('span').length < 1) {
                $('input[name="'+id+'"]').after('<span class="error">Introduzca una fecha de nacimiento válida.</span>');
            }
            hasError = true;
        }
        if(hasError == true) { 
            value="";
            return false; 
        }else{
            $('input[name="'+id+'"]').next('span').remove();
        }
    }
    if(etiqueta=='Teléfono'){
        var etiquetaTelName= $('label[for="'+id+'"]').attr("name");
        var NumEstArr=getNumbers(etiquetaCEName);
        var ArrNameEst =  $.unique(NumEstArr.join(",").split(","));
        var NumEst=ArrNameEst.toString();
        var valTel = $('input[name="'+id+'"]').addClass('phone_with_ddd').val();
            if (valTel.length < 10) {
                if ($('input[name="'+id+'"]').next('span').length < 1) {
                    $('input[name="'+id+'"]').after('<span class="error">El campo Teléfono esta incompleto.</span>');
                }  
            }else{
                $('input[name="'+id+'"]').next('span').remove();
            }
    }
    if(etiqueta=='Celular'){
        var etiquetaTelName= $('label[for="'+id+'"]').attr("name");
        var NumEstArr=getNumbers(etiquetaCEName);
        var ArrNameEst =  $.unique(NumEstArr.join(",").split(","));
        var NumEst=ArrNameEst.toString();
        var valTel = $('input[name="'+id+'"]').addClass('phone_with_ddd').val();
            if (valTel.length < 10) {
                if ($('input[name="'+id+'"]').next('span').length < 1) {
                    $('input[name="'+id+'"]').after('<span class="error">El campo Celular esta incompleto .</span>');
                }  
            }else{
                $('input[name="'+id+'"]').next('span').remove();
            }
    }
    // se valida que el user sea distinto de tipo cliente
    if(document.getElementById("tipouser").value != "c"){
        if(document.querySelector(`[name="${id}"]`).getAttribute('id') == 'RFCno' ||
            document.querySelector(`[name="${id}"]`).getAttribute('id') == 'RfcEmpresa'){
                var value = document.querySelector(`[name="${id}"]`).value;
                var nameese = document.querySelector(`[name="${id}"]`).getAttribute('data-nameese');
                var inputs = document.querySelectorAll(`[data-nameese="${nameese}"]`);
                var contValueComplete = 0;
                var NumInputs = inputs.length;
                _InputsForEse = [];
                for(var i=0; i<inputs.length; i++){
                    //almacenamos en el array como objeto la info de los inputs
                    _InputsForEse.push({"id":inputs[i].id,
                                        "name":inputs[i].name,
                                        "nameese":nameese,
                                        "type": document.querySelector(`[id="${inputs[i].id}"]`).getAttribute('type'),
                                        "localName": inputs[i].localName,
                                        "value":""
                                    });
                    if(inputs[i].value != ''){
                        contValueComplete++;
                    }
                }
                removeMessageValidate(id);
                /*validamos si esta completo el rfc 
                y que los campos esten vacios para proceder a realizar la busqueda */
                if((value.length == document.querySelector(`[name="${id}"]`).getAttribute('maxlength'))){
                    searchRfc(value);
                }else{
                    showMessageValidate(id,"El campo RFC incompleto");
                }
        }
    }
    var tipo="";
    var re = /\[.+?]/g;
    id = id.replace(re,'');
    var array = [];
    $("input:checkbox[name="+id +"]:checked").each(function(){
        array.push($(this).val()); 
    });
    array = array.join(",");
    if(array!=''){
        value = array;
    }
    var mtarray = [];
    $("[name^="+id +"].matriztexto").each(function(){
        mtarray.push($(this).val());
    });
    mtarray = mtarray.join(",");
    if(mtarray!=''){
        value = mtarray;
        tipo="matriztexto";
    }
    var ntarray = [];
    $("[name^="+id +"].matriznumero").each(function(){
        ntarray.push($(this).val());
    });
    ntarray = ntarray.join(",");
    if(ntarray!=''){
        value = ntarray;
        tipo="matriznumero";
    }
    var dtarray = [];
    $("[name^="+id +"].matrizfecha").each(function(){
        dtarray.push($(this).val());
    });
    dtarray = dtarray.join(",");
    if(dtarray!=''){
        value = dtarray;
        tipo="matrizfecha";
    }
    if(tipo==''){
    tipo="field";
    }
    var ids = $("#IdServicioEse").val();
    if(value != ''){
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url: "{{ url('GuardarEstudioInput') }}",
            type: "POST",
            data:{
                id: id,
                value: value,
                ids: ids,
                type: tipo
            },
            dataType: "json",
            success: function( response )
            {
                    $("#"+response[0]).removeClass(); //se elimino todas las clases 
                    $("#"+response[0]).addClass(response[1]); //se agrega la validación segun los datos
            },
            error : function(xhr, status)
            {
                show_error_message(xhr.status);
                console.error('Upss, algo salio mal!!');
            }
        });
    }
        return false;
}
var UpdateCandidato = function(id,value,nombre){
    if(id==1){
        $('.changCandidato'+nombre.item(0).id).text(value);
    }
}

    function hacer_click_GuardarPE(){
        var arr=[];
        var arr = $("#data-table input[id=IdPE]:checked").map(function() {
                var row = $(this).closest("tr")[0];
                arr = [row.cells[0].innerHTML,
                       row.cells[1].innerHTML,
                       row.cells[2].innerHTML,
                       row.cells[3].innerHTML,
                       row.cells[4].innerHTML,
                       row.cells[5].childNodes[0].checked,
                       row.cells[6].childNodes[0].checked,
                       row.cells[7].childNodes[0].checked,
                       row.cells[8].childNodes[0].checked,
                       row.cells[9].childNodes[0].checked,
                    ];
            return arr;
          }).get();
          var e=$("#ct").val();
          var Nurl='/PlantillaClienteC/'+e;
        $.ajax({
            url:'{{ url('UpdatePlantillaCliente') }}',
            type:'GET',
            dataType: 'json',
            data: {arr:arr},
            success: function(response){
                    setTimeout(function(){
                        if (urlA.indexOf("/PlantillaClienteC") > -1) {
                            location.href = '{{ url("PlantillaClienteCI") }}/'+e;
                        }else{
                            location.href = '{{ route("sig-erp-ese::PlantillaCliente.index") }}';
                        }
                    },500);
            },
            error : function(jqXHR, status, error) {
                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
        });
    }

    function hacer_click_EliminarPE(){
        var datos;
            datos = $("#IdPlantilla").val();
            // alert(datos);
        var arr=[];
        var arr = $("#data-table input[id=IdPE]:checked").map(function() {
                var row = $(this).closest("tr")[0];
                arr = [row.cells[0].innerHTML,
                       row.cells[1].innerHTML,
                       row.cells[2].innerHTML,
                       row.cells[3].innerHTML,
                       row.cells[4].innerHTML,
                       row.cells[5].childNodes[0].checked,
                       row.cells[6].childNodes[0].checked,
                       row.cells[7].childNodes[0].checked,
                       row.cells[8].childNodes[0].checked,
                       row.cells[9].childNodes[0].checked,
                    ];
            return arr;
          }).get();
        $.ajax({
            url:'{{ url('DeletePlantillaCliente') }}',
            type:'GET',
            dataType: 'json',
            data: {arr:arr,datos:datos},
            success: function(response){
                // alert(response);
                setTimeout(function(){
                        location.href = "{{ url('PlantillaClienteR') }}/"+response+"";
                    },500);
            },
            error : function(jqXHR, status, error) {
                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
        });
    }

    function hacer_click_ReasignarPE(){
        var datos;
            datos = $("#IdPlantilla").val();
        $.ajax({
            url:'{{ url('ReasignarPlantillaCliente') }}',
            type:'GET',
            dataType: 'json',
            data: {datos:datos},
            success: function(response){
            // alert(response);
                setTimeout(function(){
                        location.href = "{{ url('PlantillaClienteR') }}/"+response+"";
                    },500);
            },
            error : function(jqXHR, status, error) {
                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
        });
    }
    const searchCodigoPostal = (value,inputs) => {
        var _inputs = [];
        for(var i=0; i<inputs.length; i++){
            //almacenamos en el array como objeto la info de los inputs
            _inputs.push({"id":inputs[i].id,
                          "name":inputs[i].name
                         });
        }
        //se realiza el request
        var token = $('meta[name="csrf-token"]').attr('content');
        let cp = value;
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
                var Municipio = _inputs.find(campo => campo.id == "MunicipioEstado");
                var Colonia = _inputs.find(campo => campo.id == "Colonia");
                var EstadoRepublica = _inputs.find(campo => campo.id == "EstadoRepublica");
                if(Municipio != undefined){
                    if(document.getElementById("MunicipioEstado")){
                        $('input[name="'+Municipio.name+'"]').attr('value', datos[5]);
                        GuardadoInput(Municipio.name,datos[5]);
                    }
                }
                if(Colonia != undefined){
                    if(document.getElementById("Colonia")){
                        $('select[name="'+Colonia.name+'"] option').remove();
                        colonias = datos[8].split(";");
                        for (var i = 0; i < colonias.length; i++) {
                            items+='<option value="'+colonias[i]+'">'+colonias[i]+'</option>'
                        }
                        $('select[name="'+Colonia.name+'"]').prepend(items);
                        GuardadoInput(Colonia.name,colonias[0]);
                    }
                }
                if(EstadoRepublica != undefined){
                    if(document.getElementById("EstadoRepublica")){
                        $(`input[name="${EstadoRepublica.name}"]`).attr('value',datos[3]);
                        GuardadoInput(EstadoRepublica.name,datos[3]);                    
                    }
                }            
            },
            error : function(jqXHR, status, error) {
                showNotify("Información: ","Ocurrio un error","danger");
            }
        });
    }
    //funcion para buscar el rfc ingresado
    const searchRfc = (value) => {
        showNotify("Información: ","Buscando RFC, espere por favor...","info");
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url: '{{ url('searchRfc') }}'+"/"+value,
            type: "GET",
            success: function(response){
                if(response[0] > 0){
                    $("#tablebody").html("");
                    $("#tablebody").append(response[1]);
                    $("#RfcModal").modal('show');
                }else{
                    showNotify("Información: ","No se encontro el RFC en algún Estudio","info");
                }
            },
            error: function(){
                showNotify("Información: ","Ocurrio un error al obtener los resultados de la busqueda del RFC...","danger");
            }
        });
    }
    //funcion para obtener la info del estudio seleccionado
    const copyinfo = (IdServicioEse,IdCliente) => {
        showNotify("Información: ","Obteniendo información, espere por favor...","info");
        $("#RfcModal").modal('hide');
        $.ajax({
            url: '{{ url('getdataForNewEse') }}'+"/"+IdServicioEse,
            type: "GET",
            success: function(response){
                _dataInputs = [];
                response.forEach(element => {
                    //buscamos en el array de objetos los id de los campos y asignamos el valor
                    var _find = _InputsForEse.find( campo => campo.id == element.CampoNombre);
                    if(_find != undefined){
                        if(_find.localName == "input"){
                            $('input[name="'+_find.name+'"]').attr('value', element.ValorCargado);
                        }
                        if(_find.localName == "select"){
                            var select = document.getElementsByName(_find.name)[0];
                            select.innerHTML = "";
                            var option = document.createElement("option");
                            option.text = element.ValorCargado;
                            option.value = element.ValorCargado;
                            select.add(option);
                        }
                        //se almacena en un nuevo array la info de los campos para guardar en la bd
                        _find.value = element.ValorCargado;
                        _dataInputs.push(_find);
                    }
                });
                saveInfoCopied(_dataInputs);
            },
            error: function(){
                showNotify("Información: ","Ocurrio un error al obtener los datos...","danger");
            }
        });
    }
    //funcion para guardar la info de los campos
    const saveInfoCopied = (dataInputs) => {
        showNotify("Información: ","Espere por favor, se esta guardando la información...","info");
        dataInputs.forEach(element => {
            //cambia de estado _flatSearchCp para que no se realice la busqueda del cp nuevamente
            if(element.id == 'CodigoPostal')
                _flatSearchCp = false;
            GuardadoInput(element.name,element.value);
        });
    }
    //funcion para mostrar mensaje de validacion
    const showMessageValidate = (name, message) => {
        $(`input[name="${name}"]`).after(`<span class="error" style="color: red;">${message}</span>`);
    }
    //funcion para eliminar mensaje de validacion
    const removeMessageValidate = (name) => {
        $(`input[name="${name}"]`).next('span').remove();
    }
    //funcion para mostrar mensaje de busqueda de rfc
    const showMessageRfc = () => {
        showNotify("Información","Para realizar la búsqueda del RFC de clic fuera de la caja de texto del RFC o teclee la tecla tabuladora estando en el RFC..","info");
    }
    //funcion para enviar los correos al dar clic en el btn solicitar
    const sendNotification = (idCliente) => {
        var candidatos = dataCandidato();
        var _idCliente = idCliente;
        var sv=$('#IdServicioEse').val();
        $.ajax({
            url:"{{ url('NotificacionSolicitarOSC') }}",
            type: "GET",
            data:{
                idCliente:idCliente,
                candidatos:candidatos,
                sv:sv 
            },
            success: function(response){
                setTimeout(function(){
                location.href = '{{ url("ServiciosxClienteR") }}/'+_idCliente;
                });
                console.log(sv);
            },
            error: function(){
                setTimeout(function(){
                location.href = '{{ url("ServiciosxClienteR") }}/'+_idCliente;
                });               
            }
        });
    }
    //funcion para obtener el nombre y correo del candidato
    const dataCandidato = () => {
        var inputsEmail = document.querySelectorAll('input[id="CorreoElectronico"]');
        var inputsNombreCandidato = document.querySelectorAll('input[id="NombreCandidato"]'); 
        var inputsApellidoPaterno = document.querySelectorAll('input[id="ApellidoPaternoCandidato"]');
        var inputsApellidoMaterno = document.querySelectorAll('input[id="ApellidoMaternoCandidato"]');
        var data = [];
        for(var i=0; i < inputsEmail.length; i++){
            var NombreCandidato = document.getElementsByName(inputsNombreCandidato[i].name)[0].value;
            var ApellidoPaternoCandidato = document.getElementsByName(inputsApellidoPaterno[i].name)[0].value;
            var ApellidoMaternoCandidato = document.getElementsByName(inputsApellidoMaterno[i].name)[0].value;
            var email = 
            data.push({nombre:`${NombreCandidato} ${ApellidoPaternoCandidato} ${ApellidoMaternoCandidato}`,
                       email:document.getElementsByName(inputsEmail[i].name)[0].value  
                    });
        }
        return data;
    }
    //limita la entrada de datos de acuerdo al attr maxLength
    const maxLengthCheck = (object) => {
        if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
    }
    // verificar si la entrada de dato es numerico
    const isNumeric = (evt) => {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode (key);
        var regex = /[0-9]|\./;
        if ( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
    </script>
@endsection
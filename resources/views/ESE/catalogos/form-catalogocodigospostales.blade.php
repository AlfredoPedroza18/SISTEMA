@extends('layouts.masterMenuView')
@section('section')

<div class="content">
<ol class="breadcrumb ">
<li><a href="{{ route('sig-erp-ese::catalogosese.index') }}">Catálogos ESE</a></li>
		<li><a href="{{route('sig-erp-ese::CatalogoCodigosPostales.index')}}">Códigos Postales</a></li>
		<li>Alta Código Postal</li>
   </ol>
<h1 class="page-header text-center">Códigos Postales <small>Alta</small></h1>

	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Códigos Postales <small>Alta</small></h4>
                        </div>
                        <div class="panel-body">
                        <form id="form-alta-codigospostales">
                       
                          @include('ESE.catalogos.codigospostalescreate')
                        </form>
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
     	
     	$(document).ready(function(){
            $("#CodigoPostal").attr('disabled', false);
     </script>

     <script>
     function hacer_click_CodigoPostal(valor){


var datos = $("#form-alta-codigospostales").serialize();
var token = $('meta[name="csrf-token"]').attr('content');
console.log(datos);


if(valor==0){
    $.ajax({
        headers: {'X-CSRF-TOKEN':token},
        url:'{{ url('CatalogoCodigosPostales') }}',
        type:'POST',
        dataType: 'json',
        data: datos,
        success: function(response){
            //alert(response);
            swal(''+response.status_alta);
            if(response.status_alta == 'success'){
                swal({
                    title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                    html: true,
                    data: datos,
                    type: "success"

                });
                setTimeout(function(){
                    location.href = '{{ route("sig-erp-ese::CatalogoCodigosPostales.index") }}';
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

}else{

    $.ajax({
        headers: {'X-CSRF-TOKEN':token},
        url:'{{ url('CatalogoCodigosPostales') }}',
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
                    location.href = '{{ route("sig-erp-ese::CatalogoCodigosPostales.index") }}';
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


}

    $('#CodigoEst').change(function() {
				var datos;
                
					datos = $("#IdEstado").val();
				
				$.ajax({
						// headers: {'X-CSRF-TOKEN':token},
						url: '{{ url('Validacion') }}',
						type:'GET',
						data: {datos:datos},
						success: function(response){
                            // alert(response[0]);
                            // $("#CodigoEstado").html(response[0]);
                            $("#CodigoMunicipio").html(response[0]);
                            $("#CodigoLocalidad").html(response[1]);  
                           
						}
      });
      
      
		});

        $('#CodigoP').change(function() {
				var datos;
                
					datos = $("#CodigoPostal").val();
				
				    $.ajax({
						// headers: {'X-CSRF-TOKEN':token},
						url: '{{ url('ValidacionCP') }}',
						type:'GET',
						data: {datos:datos},
						success: function(response){
                            
                            if(response>0){
								$("#alerta").html("<label style='color:#ffa100;'> <strong> El Código Postal ya existe </strong> </label>");
								document.getElementById("CodigoPostal").focus();
                                $("#Guardar").attr('disabled', true);
                            }else{
                                $("#alerta").html("");
                                $("#Guardar").attr('disabled', false);
                            }
						}
                    });
		});

    </script>
@endsection
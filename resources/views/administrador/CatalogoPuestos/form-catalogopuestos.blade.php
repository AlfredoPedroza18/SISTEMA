@extends('layouts.masterMenuView')
@section('section')

<div class="content">
<ol class="breadcrumb ">
	    <li><a href="{{url('modulo/administrador/cuentas')}}">Cuentas</a></li>
		<li><a href="{{route('sig-erp-crm::CatalogoPuestos.index')}}">Puestos</a></li>
		<li>Alta Puestos</li>
   </ol>
<h1 class="page-header text-center">Puestos <small>Alta</small></h1>

<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Puestos <small>Alta</small></h4>
                        </div>
                        <div class="panel-body">
                            {!! Form::open([
                                                'route'  => 'sig-erp-crm::CatalogoPuestos.store', 
                                                'method' => 'post',
                                                'class'  => 'form-horizontal',
                                                'id' 	 => 'create-catalogo-puestos'])
                                
                                
                                !!}
                                            @include('administrador.CatalogoPuestos.alta-catalogopuesto')
                                {!! Form::close() !!}	

                        </div>
   </div>
 </div>


@endsection
@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- ================== BEGIN PAGE LEVEL JS ================== --> 
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
            
            $('#create-cpuesto').click(function(event){    		
            event.preventDefault();
            guardarpuesto();
            });
        
            var guardarpuesto = function (){
                $('#create-catalogo-puestos').submit();
                $.ajax({
                headers: {'X-CSRF-TOKEN':token},
                url:'{{ url('CatalogoPuestos') }}',
                type:'POST',
                dataType: 'json',
                data: datos,
                success: function(response){ 

                    if(response.status_alta == 'success'){

                        
                            swal({                                  
                                    title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                    html: true,
                                    data: datos,
                                    type: "success" 
                                                                                
                                });
                        setTimeout(function(){
                                        location.href = '{{ route("sig-erp-crm::CatalogoPuestos.index") }}';
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
            


       });
});

</script>   

@endsection
@extends('layouts.masterMenuView')
@section('section')

<div class="content">
<ol class="breadcrumb ">
<li><a href="{{ route('sig-erp-ese::catalogosese.index') }}">Catálogos ESE</a></li>
		<li><a href="{{route('sig-erp-ese::CatalogoRegionesxEdo.index')}}">Regiones por Estado</a></li>
		<li>Edición Regiones por Estado</li>
   </ol>
<h1 class="page-header text-center">Regiones por Estado<small>Edición</small></h1>

	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            </div>
                            <h4 class="panel-title">Regiones por Estado<small>Edición</small></h4>
                        </div>
                        <div class="panel-body">
                       {!! Form::model($IdRegionEdo,
                        ['route'=>['sig-erp-ese::CatalogoRegionesxEdo.update',$IdRegionEdo],
                        'id'=>'form-edit-regiones','method'=>'PUT'])
                        !!}
                       
                          @include('ESE.catalogos.regionesxedocreate')
                       {!! Form::close() !!}
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

            $('#CodigoEst').change(function() {
            var datos = $("#IdEstado").val();
				
                $.ajax({
                        url: '{{ url('ValidacionMunicipio') }}',
                        type:'GET',
                        data: {datos:datos},
                        success: function(response){
                            $("#CodigoMunicipio").html(response[0]);
                            
                        }
                });
            });
         });
 
    </script>
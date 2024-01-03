@extends('layouts.masterMenuView')
@section('section')

<div class="content">
<ol class="breadcrumb ">
<li><a href="{{ route('sig-erp-ese::configuracion.index') }}">Configuraciones</a></li>
		<li><a href="{{route('sig-erp-ese::ConfiguracionEmail.index')}}">Configuracion Email</a></li>
		<li>Edición Configuracion Email</li>
   </ol>
<h1 class="page-header text-center">Configuracion Email <small>Edición</small></h1>

	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            </div>
                            <h4 class="panel-title">Configuracion Email <small>Edición</small></h4>
                        </div>
                        <div class="panel-body">

                        {!! Form::open(["action"=>"ESE\ConfiguracionEmailController@save_update", 'id'=>'form-edit-empleados']) !!}

                          @include('ESE.catalogos.configuracionemailcreate')
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

     function newitem(){
       var option = '<label>Modo</label><select class="form-control" name="Modo[]"><option value="Normal">Normal</option><option value="CC">CC</option><option value="CCO">CCO</option></select>'

         var item = ' <tr> <td> <input type="hidden" name="ids[]" value="0">  <div class="form-group col-md-4"> <label>Email</label>{{ Form::text("Email","",["class" => "form-control","name"=>"Email[]","id"=>"Email","data-parsley-group"=>"wizard-step-1","minlength"=>"3","pattern"=>".*[^ ].*","title"=>"Es campo requerido"])}}</div>'+
         '<div class="form-group col-md-4"><label>Destinatario</label>{{ Form::text("Destinatario","",["class" => "form-control","name"=>"Destinatario[]","id"=>"Destinatario","data-parsley-group"=>"wizard-step-1","minlength"=>"3","pattern"=>".*[^ ].*","title"=>"Es campo requerido"])}}</div> '+
         '<div class="form-group col-md-3">'+option+'</div> '+
         '<div class="form-group col-md-1"><br><button class="borrar btn btn-small btn-danger" type="button" name="button"> <i class="fa fa-trash"></i> </button></div> </td></tr>';


       $("#table-emails").append(item);
     }

     $(document).on('click', '.borrar', function (event) {
        $(this).closest('tr').remove();
    });

     </script>
     @endsection

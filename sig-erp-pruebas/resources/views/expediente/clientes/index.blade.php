	@extends('layouts.master-expediente')
	@section('section')

	<!-- begin #content -->

	<div id="content" class="content">

		<ol class="breadcrumb ">
			<li><a href="#">Expediente/</a></li>


		</ol>

		<h1 class="page-header text-center">EXPEDIENTE <small></small></h1>



		<div class="row">


		</div>


		<div class="row">
			<p></p>

			<div class="panel panel-inverse" data-sortable-id="ui-widget-14" data-init="true">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

					</div>
					<h4 class="panel-title text-center table-responsive">Visualización de Archivos y Facturas</h4>
				</div>
				<div class="panel-body">
					<div class="col-md-12">					
						<ul class="nav nav-pills">
						<li class=""><a href="#nav-pills-tab-1" data-toggle="tab" aria-expanded="false">Archivos</a></li>
							<li class="active"><a href="#nav-pills-tab-2" data-toggle="tab" aria-expanded="true">Facturas</a></li>
							<li><a href="#nav-pills-tab-3" data-toggle="tab">Demo 1</a></li>
							<li><a href="#nav-pills-tab-4" data-toggle="tab">Demo 2</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade" id="nav-pills-tab-1">
								<h3 class="m-t-10">Archivos</h3>
								<p>
									<table id="data-table" class="table table-striped table-bordered">
                             	<thead>
                             	    <tr>
                             	      <th>Documento</th>
                             	      <th>download</th>
                             	    </tr>
                             	    </thead>
                            <tbody>
                            	<tr>
                            	<td>Anexo.docx</td>
                            	 <td><i class="fa fa-2x fa-download "></i></td>
                            	</tr>
                            </tbody>
            			</table>
								</p>
							</div>
							<div class="tab-pane fade active in" id="nav-pills-tab-2">
								<h3 class="m-t-10">Facturas generadas</h3>
								<p>
									
								</p>
							</div>
							<div class="tab-pane fade" id="nav-pills-tab-3">
								<h3 class="m-t-10">Nav Pills Tab 3</h3>
								<p>
									
								</p>
							</div>
							<div class="tab-pane fade" id="nav-pills-tab-4">
								<h3 class="m-t-10">Nav Pills Tab 4</h3>
								<p>
									
								</p>
							</div>
						</div>
					</div>


				</div>
			</div>

		</div>


	</div> <!--End  content-->



	@endsection

	@section('js-base')
	@include('librerias.base.base-begin')
	@include('librerias.base.base-begin-page')
	{!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
	{!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
	{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}


	<!-- ================== BEGIN PAGE LEVEL JS ==================  -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== 
	=======
	<!-- ================== BEGIN PAGE LEVEL JS ================== 

	{!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js') !!}
	{!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/js/table-manage-buttons.demo.min.js') !!}
	{!! Html::script('assets/js/apps.min.js') !!}
	<!-- ================== END PAGE LEVEL JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== --> 
	{!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
	{!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
	{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}

	<!-- ================== END PAGE LEVEL JS ================== -->
	{!! Html::script('assets/js/sweetalert.min.js') !!}

	{!! Html::script('assets/plugins/switchery/switchery.min.js') !!}
	{!! Html::script('assets/plugins/powerange/powerange.min.js') !!}
	{!! Html::script('assets/js/form-slider-switcher.demo.min.js') !!}
	{!! Html::script('assets/js/apps.min.js') !!}

	<script>
		$(document).ready(function() {

		});	






	</script>
	@endsection
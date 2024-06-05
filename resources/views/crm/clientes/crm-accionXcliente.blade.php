@extends('layouts.masterMenuView')
@section('section')
<style>
	.neg{
		font-weight: bold;
		font-size: 13px;
	}
</style>
<div id="content" class="content">
<ol class="breadcrumb ">
		<li><a href="{{url('dashboard')}}">CRM</a></li>
		<li><a href="{{route('sig-erp-crm::clientes.index')}}">Clientes/Prospectos</a></li>
		<li>Acción x Cliente</li>

	</ol>
	<div class="row">
	<div class="col-md-12">
	<h1 class="page-header text-center">ACCIÓN POR CLIENTE<small></small></h1>
	</div>
	</div>
	<div class="row">
    <p></p>

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
                            <h4 class="panel-title text-left table-responsive">Acci&oacute;n por cliente:<strong> 
                            {{ $cliente[0]->nombre_cliente }}</strong></h4>
                        </div>
                        <div class="panel-body">                                       	
                           <div class="invoice">
                           			<div class="invoice-company">
					                    <span class="pull-right hidden-print">
					                      <!--  <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success m-b-10" data-toggle="tooltip" title="Print"><i class="fa fa-print m-r-5" ></i> Print</a>
--></span>
					                    <form method="GET" action="{{url('expediente_ids')}}">
					                    <input type="hidden"  name="_token" value="{{ csrf_token() }}">
					                    <span class="pull-right hidden-print">
					                       <input type="hidden" name="id_user" value="{{$cliente[0]->cli_idUser}}">
					                       <input type="hidden" name="id_cliente" value="{{$cliente[0]->id}}">
					                       <input type="hidden" name="nombre_comercial" value="{{ $cliente[0]->nombre_comercial }}">
					                       
					                     <!--   <a href="{{url('expediente_ids',[$cliente[0]->cli_idUser,$cliente[0]->id,$cliente[0]->nombre_comercial])}}" class="btn btn-sm btn-success m-b-10" data-toggle="tooltip" title="Expediente"><i class="fa fa-1x fa-folder-open"></i>Expediente</a>
-->
					                    </span>
					                    </form>
					                    <span class="pull-right hidden-print">
					                        <!--<a href="{{url('correos')}}"  class="btn btn-sm btn-success m-b-10" data-toggle="tooltip" title="Correo"><i class="fa fa-1x fa-envelope"></i> Correo</a>
-->
										</span>
					                {{ $cliente[0]->nombre_comercial }}
									<a href="{{ route('sig-erp-crm::clientes.index') }}/{{$cliente[0]->id}}/edit" class="btn btn-success " style="margin-left:55vw; margin-top:-10px">Editar Cliente</a>
					              
					                <div class="invoice-header">
					                     <div class="row"><!-- degin row 1 -->
											 	<div class="col-md-4"><!-- begin col2 -->
							                          <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Contacto:</strong><br />
									                          
									                           {{ $cliente[0]->nombre_contacto }}<br />
									                           </address>
									                    </div>
							                     </div><!-- end col2 -->
							                
												 
							                     <div class="col-md-4"><!-- begin col2 -->
							                              <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Celular:</strong><br />
									                          
								            {{ $cliente[0]->celular1==' '?' S/N':$cliente[0]->celular1 }}<br />
									                           </address>
									                    </div>
							                     </div><!-- end col2 -->

												 <div class="col-md-4"><!-- begin col1 -->
							                              <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Telefono:</strong><br />
																{{ $cliente[0]->telefono1==' '?' S/N':$cliente[0]->telefono1 }}
									                           </address>
									                    </div>
							                     </div><!-- end col1 
							                     
							                     <div class="col-md-4">begin col3 
							                              <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Centro de Negocio.</strong><br />
									                          
									                           {{ $cliente[0]->nomenclatura }}<br />
									                           {{ $cliente[0]->nombre_cn }}
									                           </address>
									                    </div>
							                     </div>end col3 -->
					                     </div><!-- end row 1 row -->
					                         <div class="row"><!-- degin row 2 -->
							                     <div class="col-md-4"><!-- begin col1 -->
							                              <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Dirección Fiscal:</strong><br />
									                          
	{{ "Calle: ".($cliente[0]->df_calle==''?' S/C':$cliente[0]->df_calle)."  #Ext. ".($cliente[0]->df_num_exterior==''?' S/N':$cliente[0]->df_num_exterior)."  #Int. ".($cliente[0]->df_num_interior==''?' S/N':$cliente[0]->df_num_interior) ."  Colonia: ".($cliente[0]->df_colonia!=''?$cliente[0]->df_colonia:' S/C')}}<br />
									                           </address>
									                    </div>
							                     </div><!-- end col1 -->

												 
							                     <div class="col-md-4"><!-- begin col1 -->
							                              <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Ciudad:</strong><br />
									                          
					{{($cliente[0]->df_ciudad!=''?$cliente[0]->df_ciudad:'Sin Ciudad ') }}<br />
									                           </address>
									                    </div>
							                     </div><!-- end col1 -->

												 <div class="col-md-4"><!-- begin col1 -->
							                              <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Código Postal:</strong><br />
									                          
{{($cliente[0]->df_cp!=''?$cliente[0]->df_cp:' S/N')
									                                                      }}<br />
									                           </address>
									                    </div>
							                    
							                    </div>
					                     </div><!-- end row 2 row -->
					                      <div class="row"><!-- beegin row 3 -->
												 <div class="col-md-4"><!-- begin col2 -->
							                              <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Sitio web:</strong><br />
									                          
					{{ $cliente[0]->pagina_web==' '?'Sin pag.web':$cliente[0]->pagina_web}}<br />
									                           </address>
									                    </div>
							                     </div><!-- end col2 -->
							                     <div class="col-md-4"><!-- begin col2 -->
							                              <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Medio de Contácto:</strong><br />
									                          
									                           {{ $cliente[0]->medio_contacto }}<br />
									                           </address>
									                    </div>
							                     </div><!-- end col2 -->
							                   </div><!-- end row 3 row -->
							                    <div class="row"><!-- beegin row 4 -->
							                     
							                   </div><!-- end row 4 row -->
							                    <div class="row"><!-- beegin row 4 -->
												<div class="col-md-4"><!-- begin col2 -->
							                              <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Asesor comercial:</strong><br />
									                          
									                           {{ (empty($eje[0]->nombre))?"":$eje[0]->nombre }}<br />
									                           </address>
									                    </div>
							                     </div><!-- end col2 -->

												 <div class="col-md-4"><!-- begin col1 -->
							                              <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Departamento:</strong><br />
									                          
																{{ $cliente[0]->nombre_cn }} ({{ $cliente[0]->nomenclatura }})
									                           </address>
									                    </div>
							                     </div><!-- end col1 -->
							                     

							                     <div class="col-md-4"><!-- begin col3 -->
							                              <div class="invoice-from">
									                           <address class="m-t-5 m-b-5">
									                            <strong>Nombre empresa:</strong><br />
									                          
									                           {{ $cliente[0]->empresa_facturadora }}<br />
									                          
									                           </address>
															   
									                    </div>
							                     </div><!-- end col3 -->
							                   </div><!-- end row 4 row -->
					                </div><!-- end invoice-header-->

 									

                           </div> <!--end invoice -->

                             {!! Form::open(['action' => ['AccionXclienteController@store'],'metod'=>'POST','id' => 'frm-alta-accionXcliente','enctype'=>'multipart/form-data' ]) !!}
                                {{ csrf_field() }}
                                <div class="size-max"></div>
                                <div class="row"><!-- degin row 1 -->
							                     <div class="col-md-4"><!-- begin col1 -->

							                            <div class="form-group">
								                        

														<label>{{ Form::label('Actividad', '* Actividad') }}</label><br>


														<button type="button" class="btn btn-warning m-r-5 m-b-5" id="llamar"  value='1'><i class="fa fa-2x fa-fax" data-toggle="tooltip" title="Llamar"  ></i></button>&nbsp;&nbsp;
														<button type="button" class="btn btn-warning m-r-5 m-b-5" id="correo" value='2'><i class="fa fa-2x fa-envelope" data-toggle="tooltip" title="Correo" ></i></button>&nbsp;&nbsp;
														<button type="button" class="btn btn-warning m-r-5 m-b-5" id="cita" value="3"><i class="fa fa-2x fa-calendar" data-toggle="tooltip" title="Cita" ></i></button>&nbsp;&nbsp;
														<button type="button" class="btn btn-warning m-r-5 m-b-5" id="anexo" value="4"><i class="fa fa-2x fa-cloud-upload"  data-toggle="tooltip" title="Subir Anexo" ></i></button>&nbsp;&nbsp;
														
                                                         <div class="act"></div>
		<input type="hidden" class="form-control" id="actividad" readonly="readonly"  name="actividad">
		<input type="hidden" class="form-control" id="hr_inicio" readonly="readonly"  name="hr_inicio" >
		<input type="hidden" class="form-control" id="hr_fin" readonly="readonly"  name="hr_fin" >
		<input type="hidden" class="form-control" id="tiempo_accion" readonly="readonly" value="" name="tiempo_accion">
		<input type="hidden" class="form-control" id="id_user" readonly="readonly" value="{{$cliente[0]->cli_idUser}}" name="id_user" >
		<input type="hidden" class="form-control" id="id_cliente" readonly="readonly" value="{{$cliente[0]->id}}" name="id_cliente" >
		<input type="hidden" class="form-control " id="ruta" readonly="readonly" value="" name="ruta" >
		<input type="hidden" class="form-control" id="fecha_accion" readonly="readonly" value="{{date('Y-m-d H:i:s')}}" name="fecha_accion" >
		<input type="hidden" class="form-control" id="anexo_archivo" readonly="readonly" value="0" name="anexo_archivo" >
		<input type="hidden" class="form-control" id="nombre_comer" readonly="readonly" value=" {{ $cliente[0]->nombre_comercial }}" name="nombre_comercial" >


													</div>
							                     </div><!-- end col1 -->
							                     <div class="col-md-2"><!-- begin col2 -->
												 
												 	{{Form::checkbox('agenda_valor', 'yes', false,['id'=>'agenda_valor'])}} 
													<strong><label>{{ Form::label('Guardar en Agenda', 'Guardar en Agenda',['class'=>'neg'])}}</label></strong>  <br> 
													
													<br>
							                        <label>{{ Form::label('Fecha de seguimiento', '* Fecha de seguimiento') }}</label>
							                         {{ Form::date('fecha_seguimiento',null,['class' => 'form-control','id'=>'fecha_seguimietno'])}}
														
													 <label>{{ Form::label('Hora Agenda', '* Hora Agenda') }}</label>
							                         {{ Form::time('hora_agenda',null,['class' => 'form-control','id'=>'hora_agenda'])}}
							                           
							                     </div><!-- end col2 -->
							                     <div class="col-md-6"><!-- begin col2 -->
							                              <label>{{ Form::label('Descripcion', '* Descripción') }}</label>

							                              <textarea class="form-control" rows="5" name="descripcion" id="descripcion"></textarea>
							                              <div id="counter5">(50 Caracteres restantes)</div>
							                     </div><!-- end col2 -->
							                    
					                     </div><!-- end row 1 row -->
					                      <div class="row"><!-- degin row 1 -->
							                     <div class="col-md-4 "><!-- begin col1 -->
							                      <div style="position:relative; display:none;" id="anexo_fade">
                                          	 <a class='btn btn-success btn-lg' href='javascript:;'>
                  								 Anexar documento &nbsp;<i class="fa fa-1x fa-cloud-upload"></i>
<input type="file" accept="application/pdf" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40" id="file_source"  onchange='
         var  ruta=$(".upload-file-info").html($(this).val() );
         $("#ruta").val($(this).val());
         '>
                                          </a>

                                          &nbsp;
        								<span class="label label-success upload-file-info"></span><br>
        								
													</div>
												</div>

							           </div><!-- end row 1 -->

							           <div class="row"><!-- begin row _-->
							                 <div class="col-md-6 ">
							                 		<div id="act"></div>
							                 		<div id="f_seg"></div>
							                 		<div id="desc"></div>
							                 		<div id="a_arch"></div>
							                 		<div id="rut"></div>
							                 		<div id="fe_act_seg"></div>


							                      
							                </div>

											
							                
							          </div><!-- end row-->

									  <br>

									  <div class="row" id="ModalCorreo" hidden>
												
														
														<div class="col-md-3 " >
															
															<label for="">Correo electronico</label>
															<input type="mail" class="form-control" id="correo" name="correo">						  	
															<br>
															<label for="">Asunto del correo</label>
															<input type="text" class="form-control" id="asunto" name="asunto">
															<br>
															<label for="">Selecciona un archivo</label>
															<input type="file" class="form-control" name="carchivo" id="carchivo">
														</div>

														<div class="col-md-5 ">
															<label for="">Cuerpo del correo</label>
															<textarea name="cuerpo" id="cuerpo" class="form-control" style="height: 200px;"></textarea>
														</div>

														<div class="col-md-4">
															<label for="">Pie de pagina del correo</label>
															<textarea name="pie" id="pie" class="form-control" style="height: 200px;">{{isset($firma[0]->aviso)?$firma[0]->aviso:""}}</textarea>
														</div>

												
											</div>

											<br>

										<div class="row">
											<div class="col-md-12 text-right">
							                      {{ Form::button('Crear acción', ['class' => 'btn btn-success btn-lg','id' => 'btn-alta-accion','type'=>'submit']) }}</p>
							                </div>
										</div>

					          {!! Form::close() !!}
					          <hr>
                                <div class="row">
							                <div class="col-md-12 text-center">
							                     <h3> <strong>KARDEX  </strong> </h3	>
							                </div>
							    </div>
					          <hr>
                             <table id="data-table" class="table table-striped table-bordered">
                             	<thead>
                             	    <tr>
									 <th>Fecha de acción</th>
                             	    	<th>Acción</th>
                             	    	<th>Descripción</th>
                             	    	<th>Fecha de seguimiento</th>
										<th>Hora de seguimiento</th>
                             	    	<th>Contácto</th>
                             	    	<th>Usuario</th>
                             	    	<th>Tiempo de acción</th>

                             	    </tr>
                             	</thead>
	                             	 <tbody>
	                             	 @foreach($kardex as $clave)
									  	
	                             	     <tr>
											<td class="text-center">{{$clave->fecha_accion}}</td>
	                             	 	 <td class="text-center">
			                             	 	  @if($clave->actividad=='1')
			                             	 	    <i class="fa fa-2x fa-fax" data-toggle="tooltip" title="Llamada"  ></i> <p class="text-warning">Llamada</p>
			                             	 	  @endif
			                             	 	  @if($clave->actividad=='2')
			                             	 	    <i class="fa fa-2x fa-envelope" data-toggle="tooltip" title="Correo" ></i><p class="text-warning">Correo</p>
			                             	 	  @endif
			                             	 	  @if($clave->actividad=='3')
			                             	 	    <i class="fa fa-2x fa-calendar" data-toggle="tooltip" title="Cita" ></i><p class="text-warning">Cita</p>
			                             	 	  @endif
			                             	 	  @if($clave->actividad=='4')
			                             	 	    <i class="fa fa-2x fa-cloud-upload"  data-toggle="tooltip" title="Anexo" ></i><p class="text-warning">Anexo</p>
			                             	 	  @endif
	                             	 	 </td>
	                             	 	 <td class="text-center">{{$clave->descripcion}}<br>
	                             	 	 	@if($clave->actividad=='4')
	                             	 	 	
	                                         <a  href="{{url('downloadFile',[$clave->carpeta_cliente,$clave->nombre_archivo])}}"><i class="fa fa-2x fa-download "></i></a>
	                             	 	 	@endif
	                             	 	 </td>	 
	                             	 	  
	                             	 	 <td class="text-center">{{$clave->fecha_seguimiento}}</td>	 
										 <td class="text-center">{{$clave->hora_agenda}}</td>
	                             	 	 <td>{{$clave->nombre_contacto}}</td>	 
	                             	 	 <td>{{$clave->nombre_user}}</td>	 
	                             	 	 <td>{{$clave->tiempo_accion}}</td>
	                             	 	 </tr>
	                             	 @endforeach
	                             	 	
	                             	 	

	                             	 </tbody>
                             </table>
                        </div><!--end panel body -->
          
       
	</div>


</div><!-- End content-->

@endsection

@section('js-base')
@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
 {!! Html::style('assets/plugins/bootstrap-select/bootstrap-select.min.js') !!}
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

	{!! Html::script('assets/js/jquery.charcounter.js') !!}

	


 <script type="text/javascript">
 	$(document).ready(function(){

 		$("#descripcion").charCounter(1000, {
			container: "#counter5",
			format: "%1 Caracteres restantes"
		});

    TableManageCombine.init();
    @if (session('alta'))
    	                        swal({                                  
                                title: "<h3>¡ Se agrego correctamente la actividad. !</h3> ",
                                html: true,
                                type: "success",   
                                confirmButtonText: "OK"                                                 
                            });
    @endif

  


    $('[data-toggle="tooltip"]').tooltip(); 
       
       var fecha= new Date()
       var año= fecha.getFullYear();
       var mes= fecha.getMonth()+1;
       var dia= fecha.getDate();
       var horas= fecha.getHours();
	   var minutos = fecha.getMinutes();
	   var segundos = fecha.getSeconds();
	   var hrInicio=año+"-"+mes+"-"+dia+" "+horas + ":" + minutos + ":" + segundos;

    $("#llamar").click(function(){
      
       var llam=$("#llamar").val();

       $(".act").html("<p class='text-danger'>Actividad de <span class='label label-danger'>Llamar</span>, HORA INICIO <span class='badge badge-primary'>" +horas + ":" + minutos + ":" + segundos+"</span> </p>");
        $("#actividad").val("1");
        $("#hr_inicio").val(hrInicio);
        $("#anexo_archivo").val(0);
        $('#anexo_fade').fadeOut(1000);
        $("#ruta").val('');
		$("#ModalCorreo").hide();
      

      
    });
     $("#correo").click(function(){
         var corr=$("#correo").val();
         $(".act").html("<p class='text-danger'>Actividad de <span class='label label-danger'>Correo</span>, HORA INICIO <span class='badge badge-primary'>" +horas + ":" + minutos + ":" + segundos+"</span> </p>");
        $("#actividad").val("2");
        $("#hr_inicio").val(hrInicio);
        $("#anexo_archivo").val(0);
        $('#anexo_fade').fadeOut(1000);
        $("#ruta").val('');
		$("#ModalCorreo").show();
		

    });
     $("#cita").click(function(){
       var cita=$("#cita").val();
       $(".act").html("<p class='text-danger'>Actividad de <span class='label label-danger'>Cita</span>, HORA INICIO <span class='badge badge-primary'>" +horas + ":" + minutos + ":" + segundos+"</span> </p>");
        $("#actividad").val("3");
        $("#hr_inicio").val(hrInicio);
        $("#anexo_archivo").val(0);
        $('#anexo_fade').fadeOut(1000);
         $("#ruta").val('');
		 $("#ModalCorreo").hide();
    });
     $("#anexo").click(function(){
     var anexo=$("#anexo").val();
     $(".act").html("<p class='text-danger'>Actividad de <span class='label label-danger'>Anexo</span>, HORA INICIO <span class='badge badge-primary'>" +horas + ":" + minutos + ":" + segundos+"</span> </p>");
        $("#actividad").val("4");
        $("#hr_inicio").val(hrInicio);
        $('#anexo_fade').fadeIn("slow");
        $("#anexo_archivo").val(1);
		$("#ModalCorreo").hide();

    });

     $("#btn-alta-accion").on("click",function(){
     
       var fecha= new Date()
       var año= fecha.getFullYear();
       var mes= fecha.getMonth()+1;
       var dia= fecha.getDate();
       var horas= fecha.getHours();
	   var minutos = fecha.getMinutes();
	   var segundos = fecha.getSeconds();
	    
	   var actividad=$.trim($("#actividad").val());
	   var fecha_seguimiento=$.trim($("#fecha_seguimietno").val());
	   var descripcion=$.trim($("#descripcion").val());
	   var anexo_archivo=$.trim($("#anexo_archivo").val());
	   var ruta=$.trim($("#ruta").val());
	   var asunto =$.trim($("#asunto").val());
	   var cuerpo =$.trim($("#cuerpo").val());
	   var pie =$.trim($("#pie").val());
	   var carchivo=$.trim($("#carchivo").val());
	   //validacion de campos del formulario

	   var hora_agenda = $.trim($("#hora_agenda").val());
       
		var fecha_atual=año+"/"+mes+"/"+dia;

	   var fecha_seg=fecha_seguimiento.replace("-","/");
	   var ms = Date.parse(fecha_seg);
       var fecha_segui = new Date(ms);
   
       var f_act=Date.parse(fecha_atual);
       var fecha_hoy=new Date(f_act);
    
//alert("fecha_seguimiento:"+fecha_segui+" fecha hoy"+hoy );
	 if(hora_agenda == "")
	  {
	  	 $('#fe_act_seg').html("<div class='alert alert-danger fade in m-b-15'><span class='label label-danger'>Error!</span></strong> Seleccionar una <strong>hora de agenda</strong> anterior a la actual .<span class='close' data-dismiss='alert'>×</span></div>");
        $('#fe_act_seg').fadeIn("slow");
        $('#fe_act_seg').fadeOut(9000);
	  	return false;
	  }
	  if(fecha_segui < fecha_hoy)
	  {
	  	 $('#fe_act_seg').html("<div class='alert alert-danger fade in m-b-15'><span class='label label-danger'>Error!</span></strong> No puede seleccionar una <strong>fecha de seguimiento</strong> anterior a la actual .<span class='close' data-dismiss='alert'>×</span></div>");
        $('#fe_act_seg').fadeIn("slow");
        $('#fe_act_seg').fadeOut(9000);
	  	return false;
	  }
      if(actividad==''){

       $('#act').html("<div class='alert alert-danger fade in m-b-15'><span class='label label-danger'>Error!</span></strong>  Favor de seleccionar una <strong>Actividad</strong> ya que es campo obligatorio.<span class='close' data-dismiss='alert'>×</span></div>");
        $('#act').fadeIn("slow");
        $('#act').fadeOut(9000);

       return false;
      }
      if(fecha_seguimiento=='')
      {
      	$('#f_seg').html("<div class='alert alert-danger fade in m-b-15'><span class='label label-danger'>Error!</span></strong>  Favor de seleccionar una <strong>Fecha de seguimiento</strong> ya que es campo obligatorio.<span class='close' data-dismiss='alert'>×</span></div>");
        $('#f_seg').fadeIn("slow");
        $('#f_seg').fadeOut(9000);
        $('#fecha_seguimietno').attr('style','border-color: #ff5b57');
      	return false;
      }
      if(descripcion=='')
      {
      	$('#desc').html("<div class='alert alert-danger fade in m-b-15'><span class='label label-danger'>Error!</span></strong>  Favor de seleccionar una <strong>Fecha de seguimiento</strong> ya que es campo obligatorio.<span class='close' data-dismiss='alert'>×</span></div>");
        $('#desc').fadeIn("slow");
        $('#desc').fadeOut(9000);
        $('#descripcion').attr('style','border-color: #ff5b57');
      	return false;
      }

      if(anexo_archivo=='1' &&  ruta=='')
      {
      	$('#a_arch').html("<div class='alert alert-danger fade in m-b-15'><span class='label label-danger'>Error!</span></strong>  Favor de subir un archivo al <strong>Anexo</strong> ya que es campo obligatorio.<span class='close' data-dismiss='alert'>×</span></div>");
        $('#a_arch').fadeIn("slow");
        $('#a_arch').fadeOut(9000);
        
        
      	return false;

      }

//.-------validacion del tamaño del archivo a subir-----------//
        var input = document.getElementById('file_source');
        var file = input.files[0];
        var sizeMax=file.size;
        
        var size=(sizeMax/1024)/1024;//converison de tamaño  de 5 bytes a mbytes 
        var tamano=parseFloat(size);
  
        if(size>10){
        	alert(size);
        	$(".size-max").html('<div class="alert alert-warning fade in m-b-15"><strong>Warning!</strong>  EL tamaño del archivo excedio el máximo a 10 Mbytes, su archivo tiene un tamaño de'+ tamano + ' Mbytes<span class="close" data-dismiss="alert">×</span></div>');
        	$('.size-max').fadeIn("slow");
            $('.size-max').fadeOut(9000);
        	return false;
        }
// -----end validacion del tamaño del archivo a subir------------//
	      $("#descripcion").keypress(function(){
	      	      
	       $("#descripcion").removeAttr('style','border-color: #ff5b57');;
	        //$('#nombre_comercial').removeAttr('style','border-color: #ff5b57');

	    });

	    $("select[style*='border-color: #ff5b57']").click(function(){
	      var name=this.name;
	     // alert(name);
	     $("#"+name).removeAttr('style','border-color: #ff5b57');;

	        //$('#nombre_comercial').removeAttr('style','border-color: #ff5b57');

	    });
    
       var hrFin=año+"-"+mes+"-"+dia+" "+horas + ":" + minutos + ":" + segundos; 
       $("#hr_fin").val(hrFin);//llena el valor de la hora fin de la actividad

      
	//guardarCliente();
});

});



 	
 </script>
@endsection
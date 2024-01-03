@extends('layouts.master')
@section('section')
<div id="content" class="content">
	<ol class="breadcrumb ">
			<li><a href="{{url('dashboard')}}">CRM</a></li>
			<li><a href="Javascript:;')}}">Expediente</a></li>
	</ol>
 <h1 class="page-header text-center">EXPEDIENTE <small>Cliente</small></h1>
<div class="panel panel-inverse" data-sortable-id="ui-widget-14" data-init="true">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <?php
                                /*<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>*/
                                ?>
                            </div>
                            <h4 class="panel-title text-center table-responsive">Expediente</h4>
                        </div>
                         <div class="panel-body">                                       	
                           <div class="invoice">
 							<div class="row"><!-- degin row 1 -->
 							<form action="{{route('sig-erp-crm::expediente.store')}}" method="POST" enctype="multipart/form-data">
 						
                                {{ csrf_field() }}
 							       <input type="hidden" name="id_user" value="{{ $id_user }}">
 							       <input type="hidden" name="id_cliente" value="{{ $id_cliente }}">
 							       <input type="hidden" name="nombre_comercial" value="{{ $nombre_comercial }}">
							       <div class="col-md-4 "><!-- begin col1 -->
							                      <div style="position:relative;" id="anexo_fade">
                                          	 <a class='btn btn-success btn-lg' href='javascript:;'>
                  								 Anexar documento &nbsp;<i class="fa fa-1x fa-cloud-upload"></i>
												<input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40" id="file_source"  onchange='
												         var  ruta=$(".upload-file-info").html($(this).val() );
												         $("#ruta").val($(this).val());
												         '>
                                          </a>

                                          &nbsp;
        								<span class="label label-success upload-file-info"></span><br><br>
        								<input type="submit" class="btn btn-success btn-sm" id="subir_Archivo" value="Subir Archivo" >
        								
													</div>
												</div>
											
										
										 </form>
										 <p><br>
										 <hr>
                        <table id="data-table" class="table table-striped table-bordered table-responsive">
                             	<thead>
                             	    <tr>
                             	      <th>Documento</th>
                             	      <th>Download</th>
                             	      <th>Eliminar</th>
                             	    </tr>
                             	    </thead>
                            <tbody>
                            @foreach($datos as $key)
                               
                              	<tr>
                            	 <td><a  href="{{url('download_anexo_cliente',[$key->carpeta_cliente,$key->nombre])}}">{{ $key->nombre }}</a></td>
                            	 <td style="text-align: center;">
                            	 	 <a  href="{{url('download_anexo_cliente',[$key->carpeta_cliente,$key->nombre])}}"><i class="fa fa-2x fa-download "></i></a>
                            	 </td>
    <td><button class="btn btn-danger dropdown-toggle" id="{{$key->id}}" onclick="eliminar('{{$key->id}}')">
                                
                            	 Eliminar </button>
                            	  <input type="hidden" class="id_eliminar" value="{{$key->id}}">
                            	 </td>
                            	</tr>
                                @endforeach
                            </tbody>
            			</table>

							           </div><!-- end row 1 -->
                        </div>
                    </div>

	</div>

            

 </div><!-- end content-->
@endsection

@section('js-base')
@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')
{!! Html::script('assets/js/sweetalert.min.js') !!}
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
<script type="text/javascript">
$(document).ready(function(){
	TableManageCombine.init();

 //alert('{{isset($estado)?$estado:"ñooooooo"}}');
    	     

 	

	  @if (session("alta"))
    	                        swal({                                  
                                title: "<h3>¡ El accion del cliente ,se guardo con éxito !</h3> ",
                                html: true,
                                type: "{{ session('alta') }}",   
                                confirmButtonText: "OK" 
                                                      
                            });
    	                         setTimeout(function(){     location.reload();   }, 1000);
    	 @endif
 
    	 @if (session("error"))
    		swal({                                  
                                title: "<h3>¡ Ya contienes los 9 archivos del expediente, Favor de contactar al Administrador del sistema.</h3> ",
                                html: true,
                                type: "{{ session('error') }}",   
                                confirmButtonText: "OK"                                                 
                            });

    	
   
  @endif
   @if (session("file"))
    		swal({                                  
                                title: "<h3>¡ Favor de subir el archivo.</h3> ",
                                html: true,
                                type: "{{ session('file') }}",   
                                confirmButtonText: "OK"                                                 
                            });

    	
   
  @endif
  


   //$(".btn-danger").click(function(){
    // var posicion=$(".btn-danger").index(this);
     //var elemento_id=$(".id_eliminar").get(posicion);
     //var id=elemento_id.value;
    
});

 var eliminar= function(id){
    
     var token = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
                    headers: {'X-CSRF-TOKEN':token},
                    url: '{{url("expediente")}}'+"/"+id,        
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response){ 
                        if(response.success=="alta"){
                          swal({   
                              title: "<h3>¡ El registro se elimino con éxito !</h3> ",
                              html: true,
                              type: "success",   
                              confirmButtonText: "OK"                         
                            }); 
                          setTimeout(function(){     location.reload();   }, 1000);
                        }
                        else{
                          swal({   
                              title: "<h3>¡  Ocurrio un problema, comuniquesecon el administrador!</h3> ",
                              html: true,
                              type: "warning",   
                              confirmButtonText: "OK"                         
                            });
                            setTimeout(function(){     location.reload();   }, 1000); 
                        }


                          //setTimeout(function(){     location.reload();   }, 1000);
                        },
                    error : function(jqXHR, status, error) {

                                swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                            }
                  });

        
    };
  
</script>
@extends('layouts.master')
@section('section')

<div class="content">
<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>	
	    <li><a href="{{url('modulo/administrador/cuentas')}}">Cuentas</a></li>
		<li>Configuración Cotizador Maquila</li>
   </ol>
<h1 class="page-header text-center">Configuración Cotizador Maquila</h1>

<div class="row">
		<div class="col-md-12 text-right">
          <a href="#modal-alta-rangos" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip Modal" data-placement="top" title="Añadir Rangos de empleados" id="alta-rangos">
          <i class="fa fa-th-large fa-1x" aria-hidden="true"></i>
        </a>
         <label>Añadir Rangos de empleados</label> 
     
			    <a href="#modal-alta" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip Modal" data-placement="top" title="Añadir Paquete de Maquila" id="alta">
					<i class="fa fa-th-large fa-1x" aria-hidden="true"></i>

				</a>
				<label>Añadir Paquete de Maquila</label>        
		</div>
</div>
<br>

	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                
                            </div>
                            <h4 class="panel-title">Configuración Cotizador Maquila</h4>
                        </div>

                        <div class="panel-body">
                          <div class="form-group">
                              <label>Paquetes</label><br>
                              <select class="form-control input-lg','data-live-search " data-st btn-white" name="paquetes" id="paquetes" style="width:100%">
                              @foreach($paquetes as $key =>$value)
                                <option value="{{$key}}">{{ $key=='-1'?'Selecciona un Paquete':$key." - ".$value}}</option>
                                 @endforeach       
                            </select>
                        </div>
           <br><br>
                            <div id="tabla"></div>
													
                        </div>
           </div>

<!-- Modal Para alta de paquetes cotizador de maquila-------------------- -->

<div class="modal fade" id="modal-alta">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title"><center><i class='fa fa-clipboard fa-2x'></i> Alta de Paquete </center></h4>
                    </div>
                    <div class="modal-body">
                     
                     <div class="row">
                     <div class="form-group">
                      <form id="form-configuracion-maquila-alta">
                      <div id="msg" class="msg"></div>
                     
                      <div class="col-md-5">
                    
                        <label>* Paquetes</label><br>
                            <input type="hidden" class="form-control integer" id="id_usuario" name="id_usuario" value="{{ Auth()->user()->id}}">
                            <input type="hidden" class="form-control integer" id="id_paquete" name="id_paquete" placeholder="1">
                            <input type="text" class="form-control integer" id="nombre_paquete" name="nombre" placeholder="Nombre paquete" >
                      </div>
                       <div class="col-md-4">
                         <label>* Rango de empleados</label><br>
                         <div class="input-group">
                            <input type="text" class="form-control integer integer" id="rango_inicio" name="inicio" placeholder="1">
                            <span class="input-group-addon"> a </span>
                            <input type="text" class="form-control integer integer" id="rango_fin" name="fin" placeholder="100" >
                          </div>
                       </div>
                        <div class="col-md-3">
                         <label>* Costo</label><br>
                         <div class="input-group">
                            <span class="input-group-addon"> $ </span>
                            <input type="text" class="form-control integer" id="precio" name="precio" placeholder="150">
                            
                            
                          </div>
                       </div>
                      </div> 
                    </div><!--- end row 1 -->
                    <div class="row">
                        <div class="col-md-12"><!-- begin col2 -->
                            <label>{{ Form::label('Descripcion', '* Descripción') }}</label>
                                    <textarea class="form-control descripcion" rows="5" name="descripcion" id="descripcion"></textarea>
                                <div id="counter5">(50 Caracteres restantes)</div>
                        </div><!-- end col2 --> 
                    </div><!-- emnd row -->                                          
                                        </div>
                    <div class="modal-footer">
                      <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
                      <a href="javascript:;" class="btn btn-sm btn-success" id="guardar-cambios-alta">Guardar</a>
                    </div>
                  </div>
                </div>
  </div>
               </form>
<!-- end Modal de alta de aquetes de cotizador maquila -------------------- -->


<!-- Modal de Cambio de precios cotizador de maquila-------------------- -->

<div class="modal fade" id="modal-dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title"><center><div id="titulo"> </div></center></h4>
                    </div>
                    <div class="modal-body">
                     
                     <div class="row">
                     <div class="form-group">
                      <form id="form-configuracion-maquila">
                      <div id="msg" class="msg"></div>
                     
                      <div class="col-md-5">
                    
                        <label>Paquetes</label><br>
                            <input type="hidden" class="form-control integer" id="id_usuario" name="id_usuario" value="{{ Auth()->user()->id}}">
                            
                           
                            <input type="hidden" class="form-control integer" id="id_paqueteedit" name="id_paquete" placeholder="1">
                            <input type="text" class="form-control integer" id="nombre_paqueteedit" name="nombre_paquete" placeholder="1" readonly="readonly">
                                                                        
                                                          
                         
                      
                      </div>
                       <div class="col-md-4">
                         <label>Rango de empleados</label><br>
                         <div class="input-group">
                            <input type="text" class="form-control integer" id="rango_inicioedit" name="inicio" placeholder="1" readonly="readonly">
                            <span class="input-group-addon"> a </span>
                            <input type="text" class="form-control integer" id="rango_finedit" name="fin" placeholder="100" readonly="">
                          </div>
                       </div>
                        <div class="col-md-3">
                         <label>Costo</label><br>
                         <div class="input-group">
                            <span class="input-group-addon"> $ </span>
                            <input type="text" class="form-control integer" id="precioedit" name="precio" placeholder="150" >
                            
                            
                          </div>
                       </div>
                        <div class="row">
                        <div class="col-md-12"><!-- begin col2 -->
                            <label>{{ Form::label('Descripcion', '* Descripción') }}</label>
                                    <textarea class="form-control descripcion" rows="5" name="descripcion" id="descripcionedit"></textarea>
                                <div id="counter6">(50 Caracteres restantes)</div>
                        </div><!-- end col2 --> 
                    </div><!-- emnd row -->  


                      </div> 
                                            </div>                                           
                                        </div>
                    <div class="modal-footer">
                      <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
                      <a href="javascript:;" class="btn btn-sm btn-success" id="guardar-cambios">Guardar</a>
                    </div>
                  </div>
                </div>
  </div>
               </form>
<!-- end Modal de de precios cotizador maquila -------------------- -->

<!-- Modal Para alta de paquetes con rango cotizador de maquila-------------------- -->

<div class="modal fade" id="modal-alta-rangos">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title"><center><i class='fa fa-clipboard fa-2x'></i> Alta de rango de empleados </center></h4>
                    </div>
                    <div class="modal-body">
                     
                     <div class="row">
                     <div class="form-group">
                      <form id="form-configuracion-maquila-alta-rangos">
                      <div id="msg" class="msg"></div>
                     
                      <div class="col-md-5">
                    
                        <label>* Paquetes</label><br>
                            <input type="hidden" class="form-control integer" id="id_usuario-rangp" name="id_usuario" value="{{ Auth()->user()->id}}">
                            <input type="hidden" class="form-control integer" id="id_paquete-rango" name="id_paquete" placeholder="1">
                            <select class="form-control input-lg','data-live-search " data-st btn-white" name="nombre" id="nombre_paquete-rango" style="width:100%">
                            @foreach($paquetes as $key =>$value)
                                <option value="{{$value}}">{{ $key=='-1'?'Selecciona un Paquete':$key." - ".$value}}</option>
                                 @endforeach 
                            </select>
                            <!--<input type="text" class="form-control integer" id="nombre_paquete-rango" name="nombre" placeholder="Nombre paquete" >-->
                      </div>
                       <div class="col-md-4">
                         <label>* Rango de empleados</label><br>
                         <div class="input-group">
                            <input type="text" class="form-control integer integer" id="rango_inicio-rango" name="inicio" placeholder="1">
                            <span class="input-group-addon"> a </span>
                            <input type="text" class="form-control integer integer" id="rango_fin-rango" name="fin" placeholder="100" >
                          </div>
                       </div>
                        <div class="col-md-3">
                         <label>* Costo</label><br>
                         <div class="input-group">
                            <span class="input-group-addon"> $ </span>
                            <input type="text" class="form-control integer" id="precio-rango" name="precio" placeholder="150">
                            
                            
                          </div>
                       </div>
                      </div> 
                    </div><!--- end row 1 -->
                    
                    <div class="modal-footer">
                      <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
                      <a href="javascript:;" class="btn btn-sm btn-success" id="guardar-cambios-alta-rangos">Guardar</a>
                    </div>
                  </div>
                </div>
  </div>
               </form>
<!-- end Modal de alta de aquetes de cotizador maquila -------------------- -->



@endsection
@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- ================== BEGIN PAGE LEVEL JS ================== --> 
	{!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
	{!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
	{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
  {!! Html::script('assets/js/sweetalert.min.js') !!}
  {!! Html::script('assets/js/jquery.numeric.min.js') !!}
  {!! Html::script('assets/js/jquery.charcounter.js') !!}

    <script type="text/javascript">


     var guardarCambiosMaquila = function(){
      
        var datos = $("#form-configuracion-maquila").serialize();
        var token = $('meta[name="csrf-token"]').attr('content');
         var costo=$("#precioedit").val();
        var paquete=$("#nombre_paqueteedit").val();
        var inicio=$("#rango_inicioedit").val();
        var fin=$("#rango_finedit").val();
        var descripcion=$("#descripcionedit").val();
        if(costo=='' || paquete=='' || inicio=='' || fin=='' || descripcion==''){
           $(".msg").html('<div class="alert alert-warning" role="alert"><center><strong>Alerta!</strong> Favor de llenar los campos maracados con *</center> </div>');
          }//end if de validacion de costo
    else{
  

        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('ConfiguracionCostoMaquila') }}',
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
                                    location.href = '{{ url("servicio_maquila") }}';
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
    var guardarCambiosMaquilaAlta = function(){
      
        var datos = $("#form-configuracion-maquila-alta").serialize();

        var token = $('meta[name="csrf-token"]').attr('content');
        var costo=$("#precio").val();
        var paquete=$("#nombre_paquete").val();
        var inicio=$("#rango_inicio").val();
        var fin=$("#rango_fin").val();
        var descripcion=$("#descripcion").val();
        if(costo=='' || paquete=='' || inicio=='' || fin=='' || descripcion==''){
        $(".msg").html('<div class="alert alert-warning" role="alert"><center><strong>Alerta!</strong> Favor de llenar los campos maracados con *</center> </div>');
        }
      else{
        
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('ConfiguracionCostoMaquilaAlta') }}',
            type:'POST',
            dataType: 'json',
            data: datos,
            success: function(response){ 

                   if(response.status_alta == 'existe'){
                        $(".msg").html('<div class="alert alert-warning" role="alert"><strong>Alerta!</strong>El rango de emplados ingresado ya se encuentra entre los rangos de '+ response.inicio +' a '+ response.fin+' del paquete '+response.nombre+' </div>');
                   }
                   else if(response.status_alta == 'success'){

                      
                        swal({                                  
                                title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                html: true,
                                data: datos,
                                type: "success" 
                                                                               
                            });
                     setTimeout(function(){
                                    location.href = '{{ url("servicio_maquila") }}';
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
    var guardarCambiosMaquilaAltaRnagos = function(){
      
        var datos = $("#form-configuracion-maquila-alta-rangos").serialize();

        var token = $('meta[name="csrf-token"]').attr('content');
        var costo=$("#precio-rango").val();
        var paquete=$("#nombre_paquete-rango").val();
        var inicio=$("#rango_inicio-rango").val();
        var fin=$("#rango_fin-rango").val();
        var descripcion=$("#descripcion-rango").val();
        if(costo=='' || paquete=='' || inicio=='' || fin=='' || descripcion==''){
        $(".msg").html('<div class="alert alert-warning" role="alert"><center><strong>Alerta!</strong> Favor de llenar los campos maracados con *</center> </div>');
        }
      else{
        
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('ConfiguracionCostoMaquilaAlta') }}',
            type:'POST',
            dataType: 'json',
            data: datos,
            success: function(response){ 

                   if(response.status_alta == 'existe'){
                        $(".msg").html('<div class="alert alert-warning" role="alert"><strong>Alerta!</strong>El rango de emplados ingresado ya se encuentra entre los rangos de '+ response.inicio +' a '+ response.fin+' del paquete '+response.nombre+' </div>');
                   }
                   else if(response.status_alta == 'success'){

                      
                        swal({                                  
                                title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                html: true,
                                data: datos,
                                type: "success" 
                                                                               
                            });
                     setTimeout(function(){
                                    location.href = '{{ url("servicio_maquila") }}';
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
    	 var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                    
                                buttons: [
                                    {
                extend: 'excelHtml5',
                title: 'Costos de Maquila',
                 exportOptions: {
                    columns: [ 0, 1, 2 ]
                }          
            },
            {
                extend: 'pdfHtml5',
                title: 'Costos de Maquila',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Costos de Maquila',
                exportOptions: {
                    columns: [ 0, 1, 2]
                }
             }
             

                                ],
                                responsive: true,
                                autoFill: true,
                                
                                 "paging": true,
                                 "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                 dom:'Blfrtip',
                                 "drawCallback": function( settings ) {
                                    botones();

                                  }
                                                 
                            } );
                
        }

        var botones=function(){
              $(".btn-editar-registro-responsivo").on("click",function(){ 

          
            var id=$(".btn-editar-registro-responsivo").index(this);
            var id_dato   = $('.datosr').get(id).value;
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              headers:{'X-CSRF-TOKEN':token},
              url:'{{url('editConfMaquila')}}',
              type:'GET',
              data:{"id":id_dato},
              dataType:'json',
              success:function(response){
          
                $('#modal-dialog').modal();
                $("#rango_inicioedit").val(response.datos[0].inicio);
                $("#rango_finedit").val(response.datos[0].fin);
                $("#precioedit").val(response.datos[0].precio);
                $("#id_paqueteedit").val(response.datos[0].id_paquete);
                $("#nombre_paqueteedit").val(response.datos[0].nombre);
                $("#descripcionedit").val(response.datos[0].descripcion);
                $("#titulo").html("<i class='fa fa-clipboard fa-2x'></i> Alta de Paquete "+ response.datos[0].nombre + " de Rango de empleados ( "+response.datos[0].inicio +" a "+response.datos[0].fin +" ) ");


              },error : function(jqXHR, status, error) {

                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
      

            });
          });

        }
        var MostrarPaquetes=function(){
        $("#paquetes").change(function(){
               var id=$(this).val();

           var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              headers:{'X-CSRF-TOKEN':token},
              url:'{{url('MostrarPaquetes')}}',
              type:'GET',
              data:{"id":id},
              dataType:'json',
              success:function(response){
             
             
              var tabla;
              tabla='<table  id="data-table" class="table table-striped table-bordered table-responsive" >';
                            tabla+="<thead>";
                             tabla+="<tr>";
                                    
                                    tabla+="<th>Paquete</th>";
                                    tabla+="<th>Rango de Empleados</th>";
                                    tabla+="<th>Fecha  Alta</th>";
                                    tabla+="<th><strong>$</strong> Costo</th>";
                                    tabla+="<th>Descripción</th>";
                                    tabla+="<th></th>";
                                    
                               tabla+="</tr>";
                            tabla+="</thead>";
                            tabla+="<tbody>";
                                $.each(response.datos,function(indice){
                              
                               tabla+="<tr>";
                               tabla+="<td>"+response.datos[indice].nombre+"</td>";
                               tabla+="<td>"+response.datos[indice].inicio+" a "+response.datos[indice].fin+"</td>";
                               tabla+="<td>"+response.datos[indice].fecha_alta+"</td>";
                               tabla+="<td> $"+ response.datos[indice].precio+"</td>";
                               tabla+="<td> "+ response.datos[indice].descripcion+"</td>";
tabla+='<td><a href="#modal-dialog" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip Modal" data-placement="top" title="Editar Registro" ><i class="fa fa-pencil"></i></a>';
                tabla+='<input type="hidden" class="datosr" value="'+response.datos[indice].idp+'">';
                               tabla+="</td>";
                              tabla+="</tr>";
                             });
                            tabla+="</tbody>";
                     tabla+="</table>";
                     
                     
                   

                  $("#tabla").empty().append(tabla);
                  iniciarTabla();
                  botones();

                 

              },error : function(jqXHR, status, error) {

                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
      

            });
           });

        }
        var limpiarDataTable = function(){
      $('#tabla').empty();
    }

$(document).ready(function(){
        $("#precio").numeric({ decimalPlaces: 2 });
        $("#rango_inicio").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });
        $("#rango_fin").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });
        MostrarPaquetes();
        iniciarTabla();
        botones();
        $("#guardar-cambios").on("click",function(){
          guardarCambiosMaquila();
        })
        $("#guardar-cambios-alta").on("click",function(){
          guardarCambiosMaquilaAlta();
        })
        $("#guardar-cambios-alta-rangos").on("click",function(){
          guardarCambiosMaquilaAltaRnagos();
        })
        $("#alta-rangos").on('click',function(){
            $("#modal-alta-rangos").modal();
        });
         $("#alta").on('click',function(){
            $("#modal-alta").modal();
        });
        $("#descripcion").charCounter(4000, {
          container: "#counter5",
          format: "%1 Caracteres restantes"
        });
        $("#descripcionedit").charCounter(4000, {
          container: "#counter6",
          format: "%1 Caracteres restantes"
        });
        $(".integer").charCounter(4000, {
          container: "#counter5",
          format: "%1 Caracteres restantes"
        });
       
       

      });

    </script>

@endsection
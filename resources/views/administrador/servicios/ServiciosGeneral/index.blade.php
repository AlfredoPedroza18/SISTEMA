@extends('layouts.masterMenuView')
@section('section')

<div class="content">
<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>	
	    <li><a href="{{url('modulo/administrador/cuentas')}}">Cuentas</a></li>
		<li>Productos</li>
   </ol>
<h1 class="page-header text-center">Productos</h1>

<div class="row">
		<div class="col-md-12 text-right">
         <!-- <a href="#" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip Modal" data-placement="top" data-toggle="tooltip" title="Visualizar Paquetes de Pruebas Psicometrica" id="PaquetPruebas">
          <i class="fa fa-th-large fa-1x" aria-hidden="true"></i>
				</a>
				<label>Visualizar Paquetes de Pruebas Psicometrica</label> -->
        &nbsp; &nbsp; &nbsp;
              

       <button type="button" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="modal" data-target="#modal-alta"><i class="fa fa-th-large fa-1x" aria-hidden="true"></i></button>
       <label>Añadir Producto</label> 
		</div>
</div>
<br>
<!------------------------------ AÑADE PAQUETES DE PRUEBAS PSICOMETRICAS---------------------------------->
  <div class="row">
    <div class="col-md-12 ui-sortable">
      <div class="panel panel-inverse" data-sortable-id="ui-widget-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                
                            </div>
                            <h4 class="panel-title">Producto</h4>
                           
                        </div>

                        <div class="panel-body">
                         <div class="row">
                            <div class="col-md-12">
                                    <table id="data-table" class="table-responsive display table table-striped table-bordered ">
                                    <thead>
                                      <tr>
                                        <th class="text-center">ID producto</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Descripción</th>         
                                        <th class="text-center">Costo Unitarios</th>
                                        <th class="text-center">Servicio</th>
                                        <th class="text-center" ># Acción</th>
                                        
                                      </tr>
                                    </thead>
                                    
                                    <tbody>
                                      @foreach( $servicios as $serv )
                                        <tr>
                                          <td class="text-center">{{ $serv->id}}</td>
                                          <td class="text-justify">{{ $serv->nombre }}</td>
                                          <td class="text-justify">{{ $serv->descripcion }}</td>
                                          <td class="text-right">$ {{ number_format($serv->costo_unitario,2) }}</td>
                                          <td class="text-center">{{$serv->tipo }}</td>
                                         
                                          
                                          <td class="text-left" style="width: 50px;">

                                              <a  href="javascript:;" 
                                                class="btn btn-primary btn-icon btn-circle btn-sm  btn-editar-registro-servicios" 
                                                data-toggle="modal tooltip" data-target="#modal-editar"
                                                data-placement="bottom top" 
                                                data-id-servicio = "{{ $serv->id }}"
                                                title="Editar registro" onclick="RegistosEdicion({{ $serv->id }})">
                                                  <i class="fa fa-pencil"></i>

                                              </a>
                                              <a  href="javascript:;" 
                                                class="btn btn-danger btn-icon btn-circle btn-sm btn-eliminar-servicios" 
                                                data-toggle="modal" data-target="#modal-eliminar"
                                                data-placement="bottom" 
                                                
                                                title="Eliminar servicio" onclick="se({{ $serv->id }},'{{ $serv->nombre }}')">
                                                <i class="fa fa-trash-o"></i>

                                              </a>
                                            
                                          </td>


                                          
                                        </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                            </div>


                           
                         </div>
													
                        </div>
           </div>
           </div>

<!-- Modal Para alta de paquetes cotizador de general-------------------- -->

<div class="modal fade" id="modal-alta">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title"><center><i class='fa fa-clipboard fa-2x'></i> Alta de producto </center></h4>
                    </div>
                    <div class="modal-body">
                     
                     <div class="row">
                     <div class="form-group">
                      <form id="form-configuracion-servicios-alta">
                      <div class="msg"></div>
                      <div class="msg_existe"></div>
                      
                      
                      <div class=" col-sm-6" style="margin-left: px;">

                        <label for="">*Tipo de servicio</label>
                        <select class="form-control" id="servicio_tipo" name="servicio_tipo">
                          <option value="NA">Seleccione un tipo de servicio</option>
                          @foreach ($tipo_servicio as $tipo)
                          <option value="{{$tipo->id}}"> {{$tipo->servicio}}</option>
                          @endforeach
                        </select>

                      </div>

                     <div class="col-sm-6">
                        <label>*Nombre</label><br>
                            <input type="hidden" class="form-control " id="id_usuario" name="id_usuario" value="{{ Auth()->user()->id}}">
                            <input type="text" class="form-control " id="nombre" name="nombre" placeholder="Servicio/Producto" >
                      </div>

                      <div class="col-md-12"></div>
                      
                      <div class="col-md-6">
                        <label>*Descripción del producto</label><br>
                           
                            <textarea  class="form-control num_caracteres" rows="5" id="descripcion" name="descripcion" ></textarea>                             
                      </div>
                        <div class="row">
                        <div class="col-md-3">
                         <label>*Costo</label><br>
                         <div class="input-group">
                            <span class="input-group-addon"> $ </span>
                            <input type="text" class="form-control  costo" id="costo_unitario" name="costo_unitario" placeholder="$ 150.00" >
                          </div>
                       </div>
                     
                       </div>
                      </div> 
                                            </div>                                           
                                        </div>
                    <div class="modal-footer">
                      <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Cancelar</a>
                      <a href="javascript:;" class="btn btn-success" id="guardar-cambios-alta">Guardar</a>
                    </div>
                  </div>
                </div>
  </div>
               </form>
<!-- end Modal de alta de aquetes de cotizador general -------------------- -->


<!-- Modal de Cambio de precios cotizador de general-------------------- -->

<div class="modal fade" id="modal-editar">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title"><center><div id="titulo">Edición de producto</div></center></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                     <div class="form-group">
                      <form id="form-configuracion-servicios-edicion">
                      <div class="msg"></div>
                      <div class="msg_existe"></div>

                    <div class=" col-sm-6" style="margin-left: px;">

                        <label for="">Tipo de servicio</label>
                        <select class="form-control" id="servicio_tipo2" name="servicio_tipo2">
                          
                        </select>

                    </div>

                     <div class="col-md-6">
                        <label>*Nombre</label><br>
                        <input type="hidden" id="id_edicion" name="id_edicion">
                            <input type="hidden" class="form-control " id="id_usuario_editar" name="id_usuario" value="{{ Auth()->user()->id}}">
                            <input type="text" class="form-control " id="nombre_editar" name="nombre_editar" placeholder="Servicio/Producto" >
                      </div>
                      <div class="col-md-6">
                        <label>*Descripción del producto</label><br>
                           
                            <textarea  class="form-control num_caracteres" rows="5" id="descripcion_editar" name="descripcion_editar" ></textarea>                             
                      </div>
                        <div class="row">
                        <div class="col-md-3">
                         <label>*Costo</label><br>
                         <div class="input-group">
                            <span class="input-group-addon"> $ </span>
                            <input type="text" class="form-control  costo" id="costo_unitario_editar" name="costo_unitario_editar" placeholder="$ 150.00" >
                          </div>
                       </div>
                       
                       </div>
                      </div> 
                                            </div>    
                                                      
                                        </div>
                    <div class="modal-footer">
                      <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Cancelar</a>
                      <a href="javascript:;" class="btn btn-success" id="guardar-cambios-editar">Guardar</a>
                    </div>
                  </div>
                </div>
  </div>
               </form>
<!-- end Modal de de precios cotizador general -------------------- -->
<!-- Modal eliminar servicio cotizador de general-------------------- -->

<div class="modal fade" id="modal-eliminar">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title"><center><div id="titulo"> <i class="fa  fa-2x fa-trash"> </i> &nbsp;&nbsp;&nbsp;Eliminar Servicio </div></center></h4>
                    </div>
                    <div class="modal-body">
                     <form id="form-configuracion-servicios-eliminar">
                      <div class="row">
                     <div class="form-group">

                      <center><i class="fa fa-3x fa-info-circle"></i> <h3 class="text-warning">Confirmación de eliminación del producto</h3>
                      <br>
                     <strong><h4><div id="name_Ser"></div></center></h4></strong></center>
                      <input type="hidden" name="id_servicio_eliminar" id="id_servicio_eliminar">
                      <input type="hidden" name="nombre_eliminar" id="nombre_eliminar">
                      </div> 
                    </div>    
                    </div>
                    <div class="modal-footer">
                      <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Cancelar</a>
                      <a href="javascript:;" class="btn btn-success" id="guardar-cambios-eliminar">Guardar</a>
                    </div>
                  </div>
                </div>
                </form>
  </div>
         
<!-- end Modal eliminar-------------------- -->


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

      function  se(id, nombre){

        $("#nombre_eliminar").val(nombre);
        $("#id_servicio_eliminar").val(id);
      }
$(document).ready(function(){
   $(".costo").numeric({ decimalPlaces: 2 });
   $(".num_caracteres").charCounter(4000, {
          container: "#counter5",
          format: "%1 Caracteres restantes"
        });
      iniciarTabla();


       $("#guardar-cambios-alta").on("click",function(){

          guardarCambiosServiciosAlta();
        });
 
       $(".btn-editar-registro-serviciosss").click(function(){
   
            
           id_servicio =$(this).attr("data-id-servicio");
           //console.log(id_servicio);
           RegistosEdicion(id_servicio);
  
       });
       $("#guardar-cambios-editar").on("click",function(){
          guardarCambiosServiciosEdicion();
       });


       $(".btn-eliminar-servicios").click(function(){
   
            
           id_servicio_el = $("#id_servicio_eliminar").val();
           console.log(id_servicio_el);
           RegistosEliminar(id_servicio_el);
         
       });

        $("#guardar-cambios-eliminar").on("click",function(){
          guardarCambiosServiciosEliminar();
       });

    });
var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                   {
                extend: 'excelHtml5',
                title: 'Listado de servicios de cotizador',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }         
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de servicios de cotizador',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Listado de servicios de cotizador',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
             }

                                ],
                                responsive: true,
                                autoFill: true,
                                //"scrollY": "350px",
                                "paging": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                 dom:'Blfrtip' ,
                                "drawCallback": function( settings ) {
                      $('[data-toggle="tooltip"]').tooltip({
                      delay: { "show": 500, "hide": 100 },
                      trigger:'focus'

                    });
                  },
                                                     
          } );



               /*$('#data-table tfoot td').each( function () {
                    var title = $(this).text();
                    $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
                } );*/


                data_table.columns().every( function () {
                    var that = this;
             
                    $( 'input', this.footer() ).on( 'keyup change', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
                
        }
        var guardarCambiosServiciosAlta = function(){
      
        var datos = $("#form-configuracion-servicios-alta").serialize();

        var token = $('meta[name="csrf-token"]').attr('content');
        var nombre=$("#nombre").val();
        var descripcion=$("#descripcior").val();
        var costo_unitario=$("#costo_unitario").val();
        var iva=$("#iva").val();
        var servicio_tipo =$("#servicio_tipo").val();
        
        if(nombre=='' || descripcion=='' || costo_unitario=='' || iva=='' || servicio_tipo == 'NA'){
        
             $(".msg").html('<div class="alert alert-warning" role="alert"><center><strong>Alerta!</strong> Favor de llenar los campos maracados con *</center> </div>');

      }else{
  
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('AltaServicios') }}',
            type:'POST',
            dataType: 'json',
            data: datos,
            success: function(response){ 


                    if(response.status_alta=="existe_nombre"){
                      $(".msg_existe").html('<div class="alert alert-warning" role="alert"><center><strong>Alerta!</strong> El nombre del servicio ingresado ya existe *</center> </div>');

                    }else if(response.status_alta == 'success'){

                      
                        swal({                                  
                                title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                html: true,
                                data: datos,
                                type: "success" 
                                                                               
                            });
                     setTimeout(function(){
                                    location.href = '{{ url("servicios_generales") }}';
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

                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1'+error);
            }
        });
      }
        
    }

    var RegistosEdicion = function(id_serv){
      //alert(id_serv);
            $.ajax({
            url:'{{ url('EdicionServicios') }}',
            type:'GET',
            dataType: 'json',
            data: {"id":id_serv},
            success: function(response){ 

                    if(response.servicio){
                      console.log(response.servicio[0].nombre);
                        var id=$("#id_edicion").val(response.servicio[0].id);
                        var nombre=$("#nombre_editar").val(response.servicio[0].nombre);
                        var descripcion=$("#descripcion_editar").val(response.servicio[0].descripcion);
                        var costo_unitario=$("#costo_unitario_editar").val(response.servicio[0].costo_unitario);
                        var iva=$("#iva_editar").val(response.servicio[0].iva);
                        $("#modal-editar").modal({show:true});
                      }

                     select_serv = "";
                     $("#servicio_tipo2").html("");
                     $("#servicio_tipo2").append( "<option value = 'NA'> Seleccione un tipo de servicio</option>");
                     
                     servicios =response.servicios;
                   
                     for(let i = 0; i<servicios.length; i++){
                              select_serv = "<option value = '"+servicios[i].id +"'"
                              
                              if(servicios[i].id == response.servicio[0].id_servicio)
                                  select_serv += " selected"

                              select_serv += ">"+ servicios[i].servicio+"</option>";

                               $("#servicio_tipo2").append(select_serv);
                     }
                
            },error : function(jqXHR, status, error) {

                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1'+error);
            }
        });
    } 
    var guardarCambiosServiciosEdicion = function(){
      
        var datos = $("#form-configuracion-servicios-edicion").serialize();
        var token = $('meta[name="csrf-token"]').attr('content');
        var nombre=$("#nombre_editar").val();
        var descripcion=$("#descripcion_editar").val();
        var costo_unitario=$("#costo_unitario_editar").val();
        var iva=$("#iva_editar").val();
        
        if(nombre=='' || descripcion=='' || costo_unitario=='' || iva=='' ){
        
             $(".msg").html('<div class="alert alert-warning" role="alert"><center><strong>Alerta!</strong> Favor de llenar los campos maracados con *</center> </div>');

      }else{
  
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('UpdateServicios') }}',
            type:'POST',
            dataType: 'json',
            data: datos,
            success: function(response){ 


                  if(response.status_alta == 'success'){

                      
                        swal({                                  
                                title: "<h3>¡ El registro se actualizo con éxito !</h3> ",
                                html: true,
                                data: datos,
                                type: "success" 
                                                                               
                            });
                     setTimeout(function(){
                                    location.href = '{{ url("servicios_generales") }}';
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

                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1'+error);
            }
        });
      }
        
    }
    var RegistosEliminar = function(id_serv_el){
      //alert(id_serv);

            $.ajax({
            url:'{{ url('EliminarServicios') }}',
            type:'GET',
            dataType: 'json',
            data: {"id":id_serv_el},
            success: function(response){ 


                    if(response.servicio_eliminar){
                     
                 
                        //$("#name_Ser").html(response.servicio_eliminar[0].nombre+" con ID:"+response.servicio_eliminar[0].id);
                        $("#id_servicio_eliminar").val(response.servicio_eliminar[0].id);
                        $("#nombre_eliminar").val(response.servicio_eliminar[0].nombre);
                        $("#modal-eliminar").modal({show:true});
                      }
                    },
                
            error : function(jqXHR, status, error) {

                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1'+error);
            }
        });
    } 
    var guardarCambiosServiciosEliminar = function(){
      
        var datos = $("#form-configuracion-servicios-eliminar").serialize();
        var token = $('meta[name="csrf-token"]').attr('content');
        var id=$("#id_servicio_eliminar").val();
        var nombre_eliminar=$("#nombre_eliminar").val();
    
  
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('DeleteServicio') }}',
            type:'POST',
            dataType: 'json',
            data:{"id_eliminar":id,"nombre_eliminar":nombre_eliminar},
            success: function(response){ 


                  if(response.status_alta == 'success'){

                      
                        swal({                                  
                                title: "<h3>¡ El realizo la baja del servicio correctamente !</h3> ",
                                html: true,
                                data: datos,
                                type: "success" 
                                                                               
                            });
                     setTimeout(function(){
                                    location.href = '{{ url("servicios_generales") }}';
                                });
                    }else if(response.status_alta == 'wrong'){
                        swal({   
                                title: "<h3>¡ El registro NO se dio de baja correctamente !</h3> ",
                                html: true,
                                type: "warning",   
                                confirmButtonText: "OK"                                                 
                            });
                    }

                    //setTimeout(function(){     location.reload();   }, 1000);
                },
            error : function(jqXHR, status, error) {

                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1'+error);
            }
        });
     
        
    }

    </script>

@endsection
@extends('layouts.master')
@section('section')

<div class="content">
<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>	
	    <li><a href="{{url('modulo/administrador/cuentas')}}">Cuentas</a></li>
		<li>Configuración Cotizador Psicometricos</li>
   </ol>
<h1 class="page-header text-center">Configuración Cotizador Psicometricos</h1>

<div class="row">
		<div class="col-md-12 text-right">
         <!-- <a href="#" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip Modal" data-placement="top" data-toggle="tooltip" title="Visualizar Paquetes de Pruebas Psicometrica" id="PaquetPruebas">
          <i class="fa fa-th-large fa-1x" aria-hidden="true"></i>
				</a>
				<label>Visualizar Paquetes de Pruebas Psicometrica</label> -->
        &nbsp; &nbsp; &nbsp;
         <a href="#modal-alta" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip Modal" data-placement="top" title="Añadir Paquete de prueba Psicometrica" id="alta"><i class="fa fa-th-large fa-1x" aria-hidden="true"></i></a>
         <label>Añadir Paquete de prueba Psicometrica</label> 
       
		</div>
</div>
<br>
<!------------------------------ AÑADE PAQUETES DE PRUEBAS PSICOMETRICAS---------------------------------->
	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                
                            </div>
                            <h4 class="panel-title">Configuración Paquetes Pruebas Psicometrica</h4>
                           
                        </div>

                        <div class="panel-body">
                         
                         <div id="tabla">

                           
                         </div>
													
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
                      <form id="form-configuracion-psicometrico-alta">
                      <div class="msg"></div>
                      <div class="msg_existe"></div>
                     <div class="col-md-5">
                        <label>*Paquetes</label><br>
                            <input type="hidden" class="form-control integer" id="id_usuario" name="id_usuario" value="{{ Auth()->user()->id}}">
                            <input type="text" class="form-control integer" id="nombre_paquete" name="prueba" placeholder="Paquete prueba psicometrica" >
                      </div>
                        <div class="col-md-3">
                         <label>*Costo</label><br>
                         <div class="input-group">
                            <span class="input-group-addon"> $ </span>
                            <input type="text" class="form-control integer precio" id="precio" name="precio" placeholder="150" >
                          </div>
                       </div>
                      </div> 
                                            </div>                                           
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
                      <form id="form-configuracion-psico">
                      <div class="msg"></div>
                     
                      <div class="col-md-5">
                        <label>*Paquetes</label><br>
                            <input type="hidden" class="form-control integer" id="id_usuario" name="id_usuario" value="{{ Auth()->user()->id}}">
                            <input type="hidden" class="form-control integer" id="id_pruebaedit" name="id_paquete" placeholder="1">
                            <input type="hidden" class="form-control integer" id="idedit" name="id" placeholder="1">
                            <input type="text" class="form-control integer" id="nombre_paqueteedit" name="prueba" placeholder="1" readonly="readonly">
                      </div>
                        <div class="col-md-3">
                         <label>*Costo</label><br>
                         <div class="input-group">
                            <span class="input-group-addon"> $ </span>
                            <input type="text" class="form-control integer" id="precioedit" name="precio" placeholder="150" >
                          </div>
                       </div>
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
      
        var datos = $("#form-configuracion-psico").serialize();
        var token = $('meta[name="csrf-token"]').attr('content');
        var costo=$("#precioedit").val();
        var paquete=$("#nombre_paqueteedit").val();

        //alert(paquete);
        if(costo=='' || paquete==''){
         
          $(".msg").html('<div class="alert alert-warning" role="alert"><center><strong>Alerta!</strong> Favor de llenar los campos maracados con *</center> </div>');
        }else{
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('ConfiguracionCostoPsicometrico') }}',
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
                                    location.href = '{{ url("listaPsicometricos") }}';
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
    }//end if de validacion de costo
   
  }
    var guardarCambiosMaquilaAlta = function(){
      
        var datos = $("#form-configuracion-psicometrico-alta").serialize();

        var token = $('meta[name="csrf-token"]').attr('content');
        var costo=$(".precio").val();
        var paquete=$("#nombre_paquete").val();
        
        if(costo=='' || paquete=='' ){
        
             $(".msg").html('<div class="alert alert-warning" role="alert"><center><strong>Alerta!</strong> Favor de llenar los campos maracados con *</center> </div>');

      }else{
  
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('AltaPaquetePsicometrico') }}',
            type:'POST',
            dataType: 'json',
            data: datos,
            success: function(response){ 

                    if(response.status_alta=="existe_nombre"){
                      $(".msg_existe").html('<div class="alert alert-warning" role="alert"><center><strong>Alerta!</strong> El nombre del paquete ingresado ya existe *</center> </div>');

                    }else if(response.status_alta == 'success'){

                      
                        swal({                                  
                                title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                html: true,
                                data: datos,
                                type: "success" 
                                                                               
                            });
                     setTimeout(function(){
                                    location.href = '{{ url("listaPsicometricos") }}';
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
                title: 'Tipos de Prueba',
                 exportOptions: {
                    columns: [ 0, 1, 2,3 ]
                }          
            },
            {
                extend: 'pdfHtml5',
                title: 'Tipos de Prueba',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2,3 ]
                }
                 
            },
             {
                extend: 'copyHtml5',
             },
             {
                extend: 'print',
                title: 'Tipos de prueba',
                exportOptions: {
                    columns: [ 0, 1, 2,3]
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
              url:'{{url('editPrueba')}}',
              type:'GET',
              data:{"id":id_dato},
              dataType:'json',
              success:function(response){
          
                $('#modal-dialog').modal();
                $("#idedit").val(response.datos[0].id);
                $("#precioedit").val(response.datos[0].costo);
                $("#id_pruebaedit").val(response.datos[0].idtipo);
                $("#nombre_paqueteedit").val(response.datos[0].prueba);
                $("#titulo").html("<i class='fa fa-clipboard fa-2x'></i> Editar "+ response.datos[0].prueba );


              },error : function(jqXHR, status, error) {

                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
      

            });
          });

        }
        var MostrarPaquetes=function(){
     
               //var id=$(this).val();

           var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              headers:{'X-CSRF-TOKEN':token},
              url:'{{url('listaConfigPsicometrico')}}',
              type:'GET',
              //data:{"id":id},
              dataType:'json',
              success:function(response){
             
             
              var tabla;
              
              tabla='<table  id="data-table" class="table table-striped table-bordered table-responsive" >';
                            tabla+="<thead>";
                             tabla+="<tr>";
                                    
                                    tabla+="<th>ID Paquete</th>";
                                    tabla+="<th>Prueba</th>";
                                    tabla+="<th>Fecha  Alta</th>";
                                    tabla+="<th><strong>$</strong> Costo</th>";
                                    tabla+="<th></th>";
                                    
                               tabla+="</tr>";
                            tabla+="</thead>";
                            tabla+="<tbody>";
                                $.each(response.datos,function(indice){
                              
                               tabla+="<tr>";
                               tabla+="<td>"+response.datos[indice].idtipo+"</td>";
                               tabla+="<td>"+response.datos[indice].prueba+"</td>";
                               tabla+="<td>"+response.datos[indice].fecha+"</td>";
                               tabla+="<td> $"+ response.datos[indice].costo+"</td>";
tabla+='<td><a href="#modal-dialog" class="btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip Modal" data-placement="top" title="Editar Registro" ><i class="fa fa-pencil"></i></a>';
                tabla+='<input type="hidden" class="datosr" value="'+response.datos[indice].idtipo+'">';
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
       

        }
        var limpiarDataTable = function(){
      $('#tabla').empty();
    }

    

$(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
        $("#precioedit").numeric({ decimalPlaces: 2 });

       
        MostrarPaquetes();
        iniciarTabla();
        botones();
        $("#guardar-cambios").on("click",function(){
          guardarCambiosMaquila();
        })
        $("#guardar-cambios-alta").on("click",function(){
          guardarCambiosMaquilaAlta();
        })
        $("#alta").on('click',function(){
       
            $("#modal-alta").modal();
        });
        $("#descripcion").charCounter(4000, {
          container: "#counter5",
          format: "%1 Caracteres restantes"
        });
        $(".integer").charCounter(4000, {
          container: "#counter5",
          format: "%1 Caracteres restantes"
        });
        $("#precio").numeric({ decimalPlaces: 2 });

        /* ----------------CATALOGO DE PRUEBAS PSICOMETRICAS----------------------------*/

        
        
        /* ----------------END CATALOGO DE PRUEBAS PSICOMETRICAS----------------------------*/
       
         

      });

    </script>

@endsection
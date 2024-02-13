
@extends('layouts.masterMenuView')
@section('section')

<div class="content">
        <ol class="breadcrumb ">
            <li><a href="javascript:;">Administrador</a></li>
            <li>Configuración Cotizadores</li>
        </ol>
        <h1 class="page-header text-center">Configuración Cotizadores</h1>
        <br>
        <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Servicios</h4>
            </div>
            <div class="panel-body">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="list-group">
                            
                            <button style="height: 40px;" type="button" class="list-group-item list-group-item-action" data-toggle="modal"        data-target="#modal-alta" onclick="listaModal()"><label> Servicios <i class="fa fa-2x fa-gears pull-left"></i></label></button>
                            
                            
                                <a href="{{ url('servicios_generales') }}"  class="list-group-item list-group-item-action list-group-item-info">Productos <i class="fa fa-2x fa-gears pull-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-crear">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title"><center><i class='fa fa-clipboard fa-2x'></i>Servicios </center></h4>
                    </div>
                    <div class="modal-body">
                     
                        <input type="text" id="input_accion" hidden>
                        <input type="text" id="input_id" hidden>

                     <div class="row">
                     <div class="form-group">
                     
                      <div class="msg"></div>
                      <div class="msg_existe"></div>
                     <div class="col-md-6">
                        <label>Nombre</label><br>
                            <input type="text" class="form-control " id="nombre" name="nombre" placeholder="Servicio" >
                      </div>
                      
                     
                       </div>
                      </div> 
                      <br><br>
                      <div align = "right">
                      <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Cancelar</a>
                      <a href="javascript:;" class="btn btn-success" id="guardar_serv" onclick="guardar_serv()">Guardar</a>
                          </div>                  </div>                                           
                                        </div>
                    <div class="modal-footer">
                      
                    </div>
                  </div>
                </div>
    </div>


    <div class="modal fade" id="modal-alta">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        

                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title"><center><i class='fa fa-clipboard fa-2x'></i>Servicios </center></h4>
                    </div>
                    <div class="modal-body">
                     
                    <div align = "right">
                        <a align = "right" href="javascript:;"  data-dismiss="modal"><button onclick="registrar(0,' ', 1)" type="button" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="modal" data-target="#modal-crear"><i class="fa fa-th-large fa-1x" aria-hidden="true"></i></button>
                            <label>Añadir Servicio</label></a>
                        <br>
                    </div>
                    
                    <table class="table table-stripped" id="table_servicios">
                          <thead>
                            <tr>
                              <th>Servicio</th>
                              <th>Accion</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                     </table>

                     <div class="row">
                     <div class="form-group">
                      <form id="form-configuracion-servicios-alta">
                      <div class="msg"></div>
                      <div class="msg_existe"></div>
                     <div class="col-md-12">
                        
                     <br>
                     <br>

                     <div align = "right"><a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Cancelar</a>
                    </div>

                      </div>
                      
                     
                       </div>
                      </div> 
                                            </div>                                           
                                        </div>
                    <div class="modal-footer">
                     
                      
                      
                    </div>
                  </div>
                </div>
    </div>
@endsection

@section('js-base')
    @include('librerias.base.base-begin')
    @include('librerias.base.base-begin-page')
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    {!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
    {!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
    {!! Html::script('assets/js/sweetalert.min.js') !!}
@endsection

<script>

        function listaModal(){

            $.ajax({
            
            url:'{{url("serviciosCotizador")}}',
            type:'GET',
                success:function(response){
              

                    var dataTable = " ";

                    for (var i = 0; i<response.length; i++){
                        dataTable +=" <tr>" + 
                                        "<td>"+ response[i].servicio+"</td>" +
                                        "<td>  <a href='javascript:;'  data-dismiss='modal'> <button onclick = 'registrar("+ response[i].id+",\""+ response[i].servicio+"\",2)' class='btn btn-primary btn-icon btn-circle btn-sm btn-editar-registro' data-toggle='modal' data-target='#modal-crear' data-placement='top' title='Editar Registro' ><i class='fa fa-pencil'></i></button></a></td>"
                                     "</tr>"
                    }

                    $('#table_servicios > tbody').html("");

                    $('#table_servicios > tbody').append(
                        dataTable
                    );

                    dataTable ="";

                    
                },
                error:function(jqXHR, status, error) {
                        swal('Disculpe, existió un problema al cargarlos servicios');
                }


            });
        }

        function registrar (id = 0 ,servicio = " ",accion = 0){

            if (accion == 2){
                $("#nombre").val(servicio);
                $("#input_id").val(id);
                $("#input_accion").val(accion);
            }else{
                $("#nombre").val("");
                $("#input_id").val(-1);
                $("#input_accion").val(1);
            }

            
            
        }

        function guardar_serv () {

            id_serv = $("#input_id").val();
            accion = $("#input_accion").val();

            if($("#nombre").val() == ""){
                swal('Llenar los campos requeridos');
            }else{
                $.ajax({
                    
                    url:'{{url("registro_edicion")}}'+"/"+accion+"/"+id_serv,
                    type:'GET',
                    data :"nombre="+$("#nombre").val(),
                    
                    success:function(response){
                    
                        swal('Registro guardado con exito');
                    },
                    error:function() {
                                swal('Ocurrio un error, cominiquese con el administrador');
                    }


                    });
            }
        };

</script>
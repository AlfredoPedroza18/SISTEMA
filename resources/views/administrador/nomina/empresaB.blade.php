@extends('layouts.masterMenuView')
@section('section')

    <div class="content">
        <ol class="breadcrumb ">
            <li><a href="javascript:;">Administrador</a></li>
            <li>Recibo de empleados</li>
        </ol>
        <h1 class="page-header text-center">Recibos de Empleados</h1>

        <div class="row">
            <div class="col-md-12 text-right">

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
                <h4 class="panel-title">Empleados</h4>
            </div>
            
            <div class="panel-body">
                
                    <div class="col-md-12">
                            {{-- Form********************--}}
                            @if (Request::path() == 'ReciboEmpleadoBCliente')
                            <a href="{{ url('ReciboEmpleado-Cliente') }}" class="btn btn-danger btn-xs">Regresar</a>
                            @else
                            <a href="{{ route('ReciboEmpleado.index') }}" class="btn btn-danger btn-xs">Regresar</a>
                            @endif
                            
                            <br>
                            <br>
                           <form action="{{url('ReciboEmpleadoB')}}" method="POST">
                                {{ csrf_field() }}
                            <div class="form-group" >
                                
        <div class="input-group">

               <!-- <select class="form-control" id="empr" name="empr"  > -->
                <select class="form-control" name="empr" onchange="mostrarValor(this.value);">
                                        
                        <option>Buscar Por Empresa</option> 
                        @foreach($empresa as $emselect)
<option value="{{ $emselect->IdEmpresa }}" >{{ $emselect->FK_Titulo }}</option>
                        @endforeach
                
                  </select>
                  <input type="hidden" id="valemp" name="valEmp" value="">
                    

        <div class="input-group-btn">
        <button class="btn btn-primary" type="submit">
        <span class="glyphicon glyphicon-search"></span>
        </button>
        </div>
        </div>
        
        
                            </div>
        </form>
                        </div>


                <table id="data-table" class="display table table-striped table-bordered table-responsive">
                    <thead>
                    <tr>

                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>CURP</th>
                        <th>RFC</th>
                        <th>Empresa</th>
                        <th>Detalles</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($empresaB as $clave)
                        <tr>

                            <td>{{ $clave->Nombre }}</td>
                            <td class="text-center">{{ $clave->APaterno}} {{ $clave->AMaterno}}</td>
                            <td class="text-center">{{ $clave->Curp }}</td>
                            <td class="text-center">{{ $clave->Rfc }}</td>
                            <td class="text-center">{{ $clave->IdEmpresa }}</td>
                            <td class="text-center">
                            @if (Request::path() == 'ReciboEmpleadoBCliente')
                                    <input type="hidden"  value="{{ $clave->IdPersonal }}" data-id="{{ $clave->IdPersonal }}">
                                    <a href="{{ url('ReciboEmpleado-CDetalles',$clave->IdPersonal)}}" class="btn btn-info btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="top" title="Cargar Detalles">
                                    <i class="fa fa-eye"></i></a>
                               
                                @else
                                    <input type="hidden"  value="{{ $clave->IdPersonal }}" data-id="{{ $clave->IdPersonal }}">
                                    <a href="{{ route('ReciboEmpleado.show',$clave->IdPersonal)}}" class="btn btn-info btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="top" title="Cargar Detalles">
                                    <i class="fa fa-eye"></i></a>
                                @endif
                               

                            </td>






                        </tr>
                    @endforeach
                    </tbody>
                </table>

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
            <script>
    
                    var mostrarValor = function(x){
                         
                         var p=document.getElementById('valemp').value=x;
                         
                    };
                    </script>
            <script>
                $(document).ready(function(){
                    //$('#empr').change(function(){
                $('#empr').on('change',function(){
                 var NomEmp = $(this).val()
 
                 //alert('Has seleccionado ' + NomEmp);
                 //window.location.href = "www.google.com";
                 
               // $.get('ReciboEmpleadoB',{NomEmp:NomEmp});
                  
                 });
                });
               
            </script>



            <script type="text/javascript">

                $(document).ready(function(){
                    iniciarTabla();

                });



                var iniciarTabla = function(){
                    var data_table =$("#data-table").DataTable({

                        buttons: [
                            {
                                extend: 'excelHtml5',
                                title: 'Reporte de Empresas Facturadoras',
                                exportOptions: {
                                    columns: [ 0, 1, 2,3 ]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                title: 'Reporte de Empresas Facturadoras',
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
                                title: 'Reporte de Empresas Facturadoras',
                                exportOptions: {
                                    columns: [ 0, 1, 2,3 ]
                                }
                            }


                        ],
                        responsive: true,
                        autoFill: true,

                        "paging": true,
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                        dom:'Blfrtip'
                    } );

                }

            </script>

@endsection
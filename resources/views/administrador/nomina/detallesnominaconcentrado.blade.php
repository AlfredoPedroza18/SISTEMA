@extends('layouts.masterMenuView')
@section('section')

    <div class="content">
        <ol class="breadcrumb ">
            <li><a href="javascript:;">Administrador</a></li>
            <li>Detalles de Nómina</li>
        </ol>
        <h1 class="page-header text-center">Detalles de Nómina</h1>

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
                <h4 class="panel-title">Nómina</h4>
            </div>
            
            <div class="panel-body">
                
                    <div class="col-md-12">
                            {{-- Form********************--}}
                            @if (Request::path() == 'Concentrado-Cliente')
                            <form action="{{url('ConcentradoxEmpresaC')}}" method="POST">
                            @else
                            <form action="{{url('ConcentradoxEmpresa')}}" method="POST">
                            @endif
                           
                                {{ csrf_field() }}
                            <div class="form-group" >
                                <label>{{ Form::label('Buscar', 'Buscar Por Empresa:') }}</label>
        <div class="input-group">

               <!-- <select class="form-control" id="empr" name="empr"  > -->
                <select class="form-control" name="empr" onchange="mostrarValor(this.value);">
                                        
                        <option>Selecciona...</option> 
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
                        @if (session('success'))
			            <div class="row">
			            	<div class="col-md-12">
			            		<div class="alert alert-{{ session('type') }} fade in m-b-15">
									<strong> {{ session('success') }}</strong>
									<span class="close" data-dismiss="alert">×</span>
								</div>
			            	</div>
			            </div>
			        @endif

                <table id="data-table" class="display table table-striped table-bordered table-responsive">
                    <thead>
                    <tr>

                    <th>Periodo</th>
                        <th>Tipo Nómina</th>
                        <th>Fecha Nómina</th>
                        <th>Fecha Termino</th>
                        <th>Fecha Pago</th>
                        <th>Estado</th>
                        <th>Empresa</th>
                        <th>Ver Concentrado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($concentrado as $clave)
                        <tr>

                        <td>{{ $clave->Titulo }}</td>
                            <td class="text-center">{{ $clave->TipoNomina }}</td>
                            <td class="text-center">{{ $clave->FechaNomina}}</td>
                            <td class="text-center">{{ $clave->FechaTerminoNomina }}</td>
                            <td class="text-center">{{ $clave->FechaPagoNomina }}</td>
                            <td class="text-center">{{ $clave->Estado }}</td>
                            <td class="text-center">{{ $clave->Empresa }}</td>
                            <td class="text-center">
                                <form action="{{url('Detalles-Nomina')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden"  name="nom" value="{{ $clave->IdNomina }}" >
                                    <input type="hidden"  name="emp" value="{{ $clave->IdEmpresa }}" >
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">
                                        <span class="glyphicon glyphicon-file"></span>
                                        </button>
                                    </div>
                                </form>
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
@extends('layouts.masterMenuView')
@section('section')
    <div class="content">
    <ol class="breadcrumb ">
            <li><a href="javascript:;">Nómina</a></li>
            <li><a href="{{ url('/App') }}">Recibo de Nómina</a></li>

        </ol>
        <h1 class="page-header text-center"></h1>

        <div class="row">

        </div>
        <br>
        <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                                class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                                class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                       data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                       data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                @foreach($nombre as $clave)
                    @if( Auth::user()->tipo=='e')
                    <input type="hidden" name="nombreEmpresa" id="nombreEmpresa" value="{{ $empresa }}">
                        <h4 class="panel-title">Recibo de Nómina - {{ $clave->Nombre}} {{ $clave->APaterno}} {{ $clave->AMaterno}}</h4>
                    @else
                        <h4 class="panel-title">Detalles Nomina - {{ $clave->Nombre}} {{ $clave->APaterno}} {{ $clave->AMaterno}}</h4>
                    @endif
                @endforeach
            </div>
            <div class="panel-body">
            @if( Auth::user()->tipo=='s')
                <a href="{{ route('ReciboEmpleado.index') }}" class="btn btn-danger btn-xs">Regresar</a>
            @endif
                <br>
                <br>
                <table id="data-table" class="display table table-striped table-bordered table-responsive">
                    <thead>
                    <tr>

                        <th>Periodo Nómina</th>
                        <!-- <th>Fecha Nómina</th>
                        <th>Fecha Término Nómina</th> -->
                        <th>Fecha Pago Nómina</th>
                        <!-- <th>Estado</th>
                        <th>Uso de Nómina</th> -->

                        {{--                            <th>Ver recibo</th>--}}
                        <th>Ver recibo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detallesnomina as $clave)
                        <tr>

                            <td>{{ $clave->Titulo }}</td>
                            <!-- <td class="text-center">{{ $clave->FechaNomina }}</td>
                            <td class="text-center">{{ $clave->FechaTerminoNomina }}</td> -->
                            <td class="text-center">{{ $clave->FechaPagoNomina }}</td>
                            <!-- <td class="text-center">{{ $clave->Estado }}</td>
                            <td class="text-center">{{ $clave->UsoNomina }}</td> -->
                            {{--                                <td class="text-center">
                                                                <a target="_blank" href="{{ route('ReciboPDF.show',$clave->IdPersonal) }}" class="btn btn-info btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="top" title="Ver Recibo">
                                                                    <span class="glyphicon glyphicon-file"></span>  </a>
                                                            </td>--}}
                            <td>
                                <form action="{{url('ReciboPdfpost')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden"  name="per" value="{{$clave->IdPersonal}}">
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
    </div>
@endsection

@section('js-base')
    @include('librerias.base.base-begin')
    @include('librerias.base.base-begin-page')
    {!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
    {!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
    {!! Html::script('assets/js/sweetalert.min.js') !!}
    <script type="text/javascript">
        var empN=$("#nombreEmpresa").val();
        $("#empnombre").html(empN); 
    </script>
@endsection
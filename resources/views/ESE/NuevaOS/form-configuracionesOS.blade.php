@extends('layouts.masterMenuView')
@section('section')
<div class="content">
    <ol class="breadcrumb ">
        <li><a href="{{route('sig-erp-ese::ListadoOS.index')}}">Listado de estudios</a></li>
        <li>Estudio Socioeconómico</li>
    </ol>
    <h1 class="page-header text-center">Estudio Socioeconómico</h1>
    <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Configuración de la OS</h4>
        </div>
        <div class="panel-body" onclick="cerrar('{{Auth::user()->tipo}}')">
            <div class="panel-body">
                <form id="form-alta-ConfiguracionOS">
                    @include('ESE.NuevaOS.configuracionOS')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
{!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
{!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
{!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
{!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/colvis.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
{!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
{!! Html::script('assets/js/sweetalert.min.js') !!}
{!! Html::script('assets/js/jquery.numeric.min.js') !!}
{!! Html::script('assets/js/Format_telephone/format_telephone.js') !!}
<script type="text/javascript">
    $(document).ready(function() {
        var validarEmail = function(mail) {
            correo = mail.value;
            expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (correo.length > 0) {
                if (!expr.test(correo)) {
                    $(mail).focus();
                }
            }
        }
    });
</script>



<script>
    function Asignacion() {}

    function ProgramacionEjecucion() {
        alert("HOLIPE");
    }

    function Estudio() {
        alert("holiEstudio");
    }

    function Kardex() {
        alert("holiKardex");
    }

    function hacer_click_Asignacion() {
        // var datos = $("#form-alta-configuracionesOS").serialize();
        var datos = $("#FAsignacion").serialize();
        var token = $('meta[name="csrf-token"]').attr('content');
        console.log(datos);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '{{ url('
            NuevaOS ') }}',
            type: 'POST',
            dataType: 'json',
            data: datos,
            success: function(response) {},
        });
    }

    function users() {
        var dato = $("#Usuario").val();
        $.ajax({
            // headers: {'X-CSRF-TOKEN':token},
            url: '{{ url('
            ValUsers ') }}',
            type: 'GET',
            data: {
                datos: dato
            },
            success: function(response) {
                if (response > 0) {
                    $("#alerta").html("<label style='color:#ffa100;'> <strong> Nombre de usuario ya existe </strong> </label>");
                    document.getElementById("Usuario").focus();
                } else {
                    $("#alerta").html("");
                }
            }
        });
    }

    function emails() {
        var dato = $("#Email").val();
        $.ajax({
            // headers: {'X-CSRF-TOKEN':token},
            url: '{{ url('
            ValEmails ') }}',
            type: 'GET',
            data: {
                datos: dato
            },
            success: function(response) {
                if (response > 0) {
                    $("#alertaE").html("<label style='color:#ffa100;'> <strong> El correo ya existe </strong> </label>");
                    document.getElementById("Email").focus();
                } else {
                    $("#alertaE").html("");
                }
            }
        });

    }
</script>

@endsection
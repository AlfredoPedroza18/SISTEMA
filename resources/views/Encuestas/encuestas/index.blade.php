@extends('layouts.masterMenuView')

@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

    <ol class="breadcrumb">
        <li><a href="">Módulos</a></li>
            <li class="active">
                Encuestas
            </li>
        </li>
    </ol>

    <h1 class="page-header text-center">Encuestas</h1>
    <br>

    <div class="row">
        <div class="col-md-12 text-right">
            <a id="btnSugerencias" class="btn btn-inverse btn-icon btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quejas y sugerencias">
                <i class="fa fa-envelope fa-1x" aria-hidden="true"></i>
            </a>
            <label>Quejas y Sugerencias</label>
        </div>
    </div>
    <br>

    <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Encuestas</h4>
        </div>
        <div class="panel-body">
            <hr>
            @if (session('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-{{ session('type') }} fade in m-b-15">
                        {{session('success')}}
                        <span class="close" data-dismiss="alert">×</span>
                    </div>
                </div>
            </div>
            @endif

            <table id="data-table" class="display table table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Periodo</th>
                        <th>Centros de Trabajo</th>
                        <th>Total Personal</th>
                        <th>Estatus</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listaEncuestas as $row)
                        <tr>
                            <td>{{$row->Cliente}}</td>
                            <td>{{$row->Servicio}}</td>
                            <td>{{$row->Periodo}}</td>
                            <td>{{$row->TotalCentrosTrabajo}}</td>
                            <td>{{$row->TotalPersonas}}</td>
                            <td>{{$row->Estatus}}</td>
                            <td>
                                <input id="{{$row->IdServicio}}" class="form-check-input checkk" name="comentario" type="radio" value="{{$row->IdServicio}}" aria-label="...">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        {{-- <input id="" class="form-check-input checkk" name="comentario" type="checkbox" value="" aria-label="...">
        <input id="" class="form-check-input checkk" name="comentario" type="checkbox" value="" aria-label="..."> --}}
    </div>
</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        iniciarTabla();

        $('[data-toggle="popover"]').popover({
            delay: { "show": 500, "hide": 100 },
            trigger:'focus'

        });

        verSugerencias();
        // chech();
    });

    function verSugerencias(){
        document.getElementById('btnSugerencias').addEventListener("click", function(e){
            console.log('pase el prevent');
            try {
                ids = $('input[type=radio]:checked').map(function() {
                return $(this).attr('id');
                }).get();
                // console.log('El id seleccionado es: '+ids);

                // var inp = document.getElementById('2').value;
                // console.log('trae '+inp);

                if(ids.length ===0){
                    swal("Aviso!", "Debe seleccionar una encuesta", "info");
                }else{
                    if(document.getElementById(`${ids}`).checked){
                    var ruta = "{{ route('sugerencias',['id'=> 'temp']) }}";
                    ruta = ruta.replace('temp',ids);
                    document.getElementById('btnSugerencias').href= ruta;
                    }else{
 
                    }  
                }
            } catch (error) {
               console.log(error); 
            }
            

        });

    }

    // function chech(){
    //     let bandera = false;
    //     let idCheckbox;

    //     input = $('input[type=checkbox]');
    //     var inputs = document.querySelectorAll('input[type=checkbox]');
    //     console.log(inputs);

    //     for(let i=0; i<inputs.length; i++){
    //         inputs[i].addEventListener("change", function(){
    //             console.log(inputs[i]);
    //             var seleccionado = inputs[i].checked;
    //             console.log('seleccionado: '+seleccionado);
    //             if(seleccionado){
    //                 console.log('Esta seleccionado'+inputs[i]);
    //                 inputs[i].checked= true;
    
    //                 for(let j=0; j<inputs.length; j++){
    //                     if(inputs[j]===inputs[i]){

    //                     }else{
    //                         inputs[j].checked= false;
    //                     }
    //                 }
    //             }
    //         });
    //     }

    //     document.getElementById('btnSugerencias').addEventListener("click", function(e){
    //         for(let i=0; i<inputs.length; i++){
    //             var tocado = inputs[i].checked;
    //             if(tocado){
    //                 bandera = true;
    //                 idCheckbox = inputs[i].getAttribute("id");
    //             }
    //         }
    //         console.log("bandera: "+bandera)
    //         if(bandera === true){
    //             console.log("Entre al iff del segundo for");
    //             var ruta = "{{ route('sugerencias',['id'=> 'temp']) }}";
    //             ruta = ruta.replace('temp',idCheckbox);
    //             document.getElementById('btnSugerencias').href= ruta;
    //         }else{
    //             console.log("No Entre al iff del segundo for");
    //             swal("Aviso!", "Debe seleccionar una encuesta", "info");
    //         }
    //     });
    // }

	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                extend: 'excelHtml5',
                title: 'Listado de Servicios',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de Servicios',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }

            },
                {
                extend: 'copyHtml5',
            },
            {
                extend: 'print',
                title: 'Listado de Servicios',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            }

                                ],
                                responsive: true,
                                autoFill: true,

                                "paging": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                dom:'Blfrtip' ,
                                order: [[0, 'desc']],
                                "drawCallback": function( settings ) {
							        $('[data-toggle="popover"]').popover({
							    		delay: { "show": 500, "hide": 100 },
							    		trigger:'focus'

							    	});
							    },

                            } );

    }
</script>

@endsection
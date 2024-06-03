@extends('layouts.masterMenuView')
@section('section')

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->
<style>
    /* Center the loader */
    #loader {
        position: absolute;
        left: 57%;
        top: 58%;
        z-index: 1;
        width: 70px;
        height: 70px;
        margin: -76px 0 0 -76px;
        border: 7px solid #f3f3f3;
        border-radius: 50%;
        border-top: 7px solid #3498db;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @media(max-width: 1450px){
        #loader {
            position: absolute;
            left: 60%;
            top: 58%;
            z-index: 1;
            width: 70px;
            height: 70px;
            margin: -76px 0 0 -76px;
            border: 7px solid #f3f3f3;
            border-radius: 50%;
            border-top: 7px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
    }

    @media(max-width: 1150px){
        #loader {
            position: absolute;
            left: 65%;
            top: 60%;
            z-index: 1;
            width: 60px;
            height: 60px;
            margin: -76px 0 0 -76px;
            border: 7px solid #f3f3f3;
            border-radius: 50%;
            border-top: 7px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
    }

    @media(max-width: 1000px){
        #loader {
            position: absolute;
            left: 55%;
            top: 60%;
            z-index: 1;
            width: 60px;
            height: 60px;
            margin: -76px 0 0 -76px;
            border: 7px solid #f3f3f3;
            border-radius: 50%;
            border-top: 7px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
    }

    @media(max-width: 650px){
        #loader {
            position: absolute;
            left: 60%;
            top: 65%;
            z-index: 1;
            width: 50px;
            height: 50px;
            margin: -76px 0 0 -76px;
            border: 7px solid #f3f3f3;
            border-radius: 50%;
            border-top: 7px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
    }

    @media(max-width: 450px){
        #loader {
            position: absolute;
            left: 68%;
            top: 65%;
            z-index: 1;
            width: 50px;
            height: 50px;
            margin: -76px 0 0 -76px;
            border: 7px solid #f3f3f3;
            border-radius: 50%;
            border-top: 7px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
    }

      @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
      }

      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }

      /* Add animation to "page content" */
      .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
      }
</style>

<div id="content" class="content">
    <!--arremangalarepujala-->
    <ol class="breadcrumb">
        <li><a href="{{route('nom035')}}">Módulos</a></li>
            <li class="active">
                Encuestas-Nom 035-Acciones
            </li>
        </li>
    </ol>

    <h1 class="page-header text-center">Identificación de Riesgo</h1>
    <br>

    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-7 col-md-6 col-sm-12"></div>
            <div class="col-lg-7 col-md-6 col-sm-12"></div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12"></div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <button style="font-size: 16px" type="button" class="btn btn-primary btn-block" id="btn-show-general-pdf" data-toggle="button" aria-pressed="false">
                            Reporte General PDF
                          </button>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        {{ csrf_field() }}

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                    <div class="widget widget-stats bg-black" style="height: 315px; border-radius: 5px; display:flex; flex-direction:column; justify-content:center; align-items:center;; border:2px solid gray">
                        <div id="loader" class="loader"></div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="stats-title text-center" style="font-size:15px">Personal Total</div>
                            </div>
                        </div>
                        <div id="graficar2" class="panel-body table-responsive" style="height: 26rem; padding: 5px; display:flex; align-items:center; justify-contents:center">
                            {{-- <div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="clientesChart" width="400px" height="250px"></canvas></div> --}}
                            {{-- <div id="container-totalServiciosChart" class="container-data"><canvas id="myChart3" style="width:40%; height: 100%"></canvas></div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                        <div class="widget widget-stats bg-black">
                            <div id="loader" class="loader"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="stats-title text-center" style="font-size:15px">Centros trabajo</div>
                                </div>
                            </div>
                            <div id="graficar" class="panel-body table-responsive" style="height: 26rem; padding: 5px;">
                                {{-- <div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="totalServiciosChart" ></canvas></div> --}}
                                {{-- <div id="container-totalServiciosChart" class="container-data"><canvas id="myChart3" style="width:40%; height: 100%"></canvas></div> --}}
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                    <div class="widget widget-stats bg-black">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="stats-title text-center" style="font-size:15px">Centro de trabajo</div>
                            </div>
                        </div>
                        <div class="panel-body table-responsive" style="height: 94px; padding: 5px;">
                            <select class="form-control" name="periodo" id="periodo">
                                <option value="{{-1}}" selected>-TODOS-</option>
                                @foreach ($centros as $row)
                                    <option value="{{$row->IdCentro}}">{{$row->Descripcion}}</option>
                                @endforeach     
                            </select>
                            <!-- <br>
                            <div class="col-md-12">
                                <button class="btn btn-sm btn-success float-left" style="float: right;" id="btnPeriod">Aplicar filtro</button>
                            </div> -->
                        </div>
                    </div>
    
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                    <div class="widget widget-stats bg-black">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="stats-title text-center" style="font-size:15px">Cliente y Periodo</div>
                            </div>
                        </div>
                        <div class="panel-body table-responsive" style="height: 94px; padding: 5px;">
						    <table style="height: 50px; width: 100%;">
								<tbody id="TiposEncuesta">

									<tr>
										<th style="font-size: 16px" class="text-center">{{$datos[0]->nombre_comercial}}</th>
									</tr>
                                    <tr>
                                        <th style="font-size: 16px" class="text-center">{{ date('d-m-Y', strtotime($datos[0]->Fecha))}}</th>
									</tr>

								</tbody>
							</table>	
                        </div>
                    </div>
    
                </div>
            </div>
            
        </div>
    </div>
    
   
    <div class="row" >
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-7 col-md-6 col-sm-12"></div>
            <div class="col-lg-7 col-md-6 col-sm-12"></div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12"></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                        <button style="font-size: 16px" type="button" class="btn btn-primary btn-block" id="btn-show-pdf" data-toggle="button" aria-pressed="false">
                            Reporte Seleccionados
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <br>
    <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Acciones</h4>
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
                        <th>Encuestado</th>
                        <th>Centro Trabajo</th>
                        <th>Fecha Encuesta</th>
                        <th>Riesgo</th>
                        <th>Evidencia individual</th>
                        <th>Archivo</th>
                        <th>
                            <p style="margin: 0; text-align:center">Todos <input type="checkbox" id="check_todos"></p>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    
                </tbody>
            </table>
        </div>
    </div> 

    <div id="contenidoIfrma">

    </div>
    <!-- Modal --> 
    <div class="modal text-center" id="modalPoliticas" tabindex="-1" role="dialog" aria-labelledby="modalPoliticasTitle" aria-hidden="true">
        <div class="modal-fullscreen d-flex justify-content-center" role="document" style="height: 90%; width: 100%">
            <div class="modal-content" style="height: 100%; width:90%">
                <div class="modal-body" style="height: 100%">
                    <iframe id="viewer" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" value="{{$IdPeriodo}}" id="periodo2">
    <input type="hidden" value="{{$IdCliente}}" id="cliente">
</div>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

    $("#btn-show-pdf").on('click', function(){
            var checked = document.querySelectorAll('input[type=checkbox]'); 
            var noempty = [].filter.call(checked, function(el) {
                if(el.id == "check_todos"){
                }else{
                    return el.checked
                }
            });     
            idpersonal = [];
            idcliente = 0;
            noempty.forEach(element =>{
                idpersonal.push(element.dataset.idpersonal);
                idcliente = element.dataset.idcliente;
            });
            idpersonal = idpersonal.join('|');
            console.log("idpersonal",idpersonal);
            if(idpersonal != "" && idcliente > 0){
                if( idpersonal[0] === '|' ) {
                    idpersonal = idpersonal.slice(1, -1);
                }
                window.open("{{url('reporte_de_riesgo/idPersonal/idCliente')}}".replace("idPersonal", idpersonal).replace("idCliente", idcliente), "_blank");
            }   
        });

        $("#check_todos").click(function(event){
            if($(this).is(":checked")) {
                $("input[type=checkbox]").attr("checked", "checked");
            }else{
                $("input[type=checkbox]").removeAttr("checked");
            }
	    });

        //TODO: Cambiar la su función de este botón
        $("#btn-show-general-pdf").on('click', function(){
            //Modificar el valor estatico del id
            let idCliente = document.getElementById('cliente').value;
            let idPeriodo = document.getElementById('periodo2').value;
            let idCentro = document.getElementById('periodo').value;

            let ruta = "{{ route('pdfGeneral',['id'=>'temp','id2'=>'periodo','id3'=>'centro'])}}"
            ruta = ruta.replace("temp",idCliente);
            ruta = ruta.replace("periodo",idPeriodo);
            ruta = ruta.replace("centro",idCentro);
            // window.location = ruta;
            window.open(ruta, '_blank');
        });

     $(document).ready(function(){
        // graficarPastel();
        iniciar();
        $('[data-toggle="popover"]').popover({
            delay: { "show": 500, "hide": 100 },
            trigger:'focus'

        });

            /*LLENA LAS GRÁFICAS*/
        function iniciar() {
            let token = '{{csrf_token()}}';
            let IdCliente = document.getElementById('cliente').value;
            let IdPeriodo = document.getElementById('periodo2').value;
            let IdCentro = document.getElementById('periodo').value;
            
            $.ajax({
                url: '{{ route('getEncuestados') }}',
                type: "POST",
                data: {
                    IdCliente:IdCliente,
                    IdCentro:IdCentro,
                    IdPeriodo:IdPeriodo,
                    _token: token
                },
                success: function(response){
                    if(response.data.length != 0 || (response.data.length == 0 && response.data2.length > 0)){
                        document.getElementsByClassName("loader")[0].style.display = "none";
                        document.getElementsByClassName("loader")[1].style.display = "none";
                        // document.getElementById("loader2").style.display = "none";
                    }
                    $("#data-table").dataTable().fnDestroy();
                    removeAllRowTable("data-table");
                    llenarTablaEncuestados(response.data);
                    graficarBarra(response.data2,response.data3);
                    graficarPastel(response.data4,response.data5);
                    iniciarTabla();
                },
                error: function( e ) {
                    console.log(e);
                }
            }); 
        }

            /*EVENTO PARA ESCUCHAR EL SELECT DE CENTROS---FILTRAR POR CENTROS-----*/
        document.getElementById('periodo').addEventListener("change", function(event){
            
            event.preventDefault();
            let mychart = document.getElementById('totalServiciosChart');
            let token = '{{csrf_token()}}';
            let IdCliente = document.getElementById('cliente').value;
            let IdPeriodo = document.getElementById('periodo2').value;
            let IdCentro = document.getElementById('periodo').value;

            $('body').waitMe({
                effect : 'roundBounce',
                waitTime: 100000,
                text : 'Espere un momento por favor...',
                onClose: function() {}
            });
            $.ajax({
                url: '{{ route('getEncuestados') }}',
                type: "POST",
                data: {
                    IdCliente:IdCliente,
                    IdCentro:IdCentro,
                    IdPeriodo:IdPeriodo,
                    _token: token
                },
                success: function(response){
                    if(response.data.length == 0){
                    }else{
                        $('body').waitMe({
                            effect : 'roundBounce',
                            waitTime: 400,
                            text : 'Espere un momento por favor...',
                            onClose: function() {}
                        });
                        $("#data-table").dataTable().fnDestroy();
                        removeAllRowTable("data-table");
                        llenarTablaEncuestados(response.data);
                        graficarBarra(response.data2,response.data3);
                        graficarPastel(response.data4,response.data5);
                        iniciarTabla();
                    }
                },
                error: function( e ) {
                    console.log(e);
                }
            });
        });
    });

        /*SE LLENAN LOS DATOS DE LA TABLA*/
    function llenarTablaEncuestados(response){

          
            response.forEach(function(response,index) {

                
                var table=document.getElementById("data-table");
                var tbody=document.getElementById("tbody");
                
                var row1 = document.createElement("TR");
                var col1=document.createElement("TD");
                var col2=document.createElement("TD");
                var col3=document.createElement("TD");
                var col4=document.createElement("TD");
                var col5=document.createElement("TD");
                var col6=document.createElement("TD");
                var col7=document.createElement("TD");

                let IdCliente = document.getElementById('cliente').value;
                let IdPeriodo = document.getElementById('periodo2').value;
                
                // let porcentajeRiesgo = parseFloat(response.PorcientoRiesgo).toFixed(2);
                col1.innerHTML = `${response.Nombre}`;
                col2.innerHTML = `${response.CentroTrabajo}`;
                col3.innerHTML = `${response.FechaEnvío}`;
                col4.innerHTML = `${response.Valoracion}`;
                col5.innerHTML = `<form id="${response.IdPersonal}" action="{{route('subir_archivoo_evidencias')}}" method="POST" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                 <div class="row">
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="text-align: center; padding:0">
                                            <input id="file-input" type="file" name="archivo" style="width:100%" multiple/>
                                            <div id="add_labels" style="margin-top:5px"></div>
                                            <input name="IdPersonal" type="hidden" value="${response.IdPersonal}"/>
                                            <input name="IdPeriodo" type="hidden" value="${IdPeriodo}"/>
                                            <input name="IdCliente" type="hidden" value="${IdCliente}"/>
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-sm-12" style="padding:0">
                                            <button style="width:100%; background-color:inherit; padding:0" type="submit" name="Guardar${response.IdPersonal}" value="Subir" class="btn btn-block"><i style="font-size:20px; color:rgb(6, 140, 202);" class="fa fa-cloud-upload" aria-hidden="true"></i></button>
                                        </div>
                                </div>
                                </form>`;

                
                if(response.Archivo != 0){
                    col6.innerHTML = `<td class="text-center"><input type="hidden" name="idarchivo" id="idarchivo" value=""><button id="logopdf" onclick="showPDF(${response.IdPersonal});"><i style="font-size:20px" class="fa fa-2x fa-file-pdf-o bg-danger" aria-hidden="true"></i></button></td>`;
                }else{
                    col6.innerHTML = `No hay archivo`;
                }
                col7.innerHTML = `<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="${response.IdPersonal}" id="${response.IdPersonal}" data-idpersonal="${response.IdPersonal}" data-idcliente="${IdCliente}">
                                    </div>`;

                col1.style = "font-size:12px;";
                col2.style = "font-size:12px;";
                col3.style = "font-size:12px;";
                col4.style = "font-size:12px;";
                col5.style = "font-size:12px;";
                col6.style = "font-size:12px;";
                col7.style = "font-size:12px;";
                col7.style = "text-align:center;";
            

                row1.appendChild(col1);
                row1.appendChild(col2);
                row1.appendChild(col3);
                row1.appendChild(col4);
                row1.appendChild(col5);
                row1.appendChild(col6);
                row1.appendChild(col7);
                tbody.appendChild(row1);
                table.appendChild(tbody);
            });

            // inputFile();
    }

    /*IMPORTANTE*/
    // function inputFile(){
    //     $('.attachment').click(function(){
    //         $('#file-input').click();
    //         document.getElementById("file-input").addEventListener('change', function() {
    //             let pos = this.files.length - 1;
    //             document.getElementById("add_labels").innerHTML += `<div style="color:rgb(6, 140, 202);" class="labels">${this.files[pos].name}</div>`;
    //         });
    //     });
        // document.getElementById("attachment").addEventListener('click', function() {
        //     document.getElementById("file-input").click();
        // });

    // }


    const removeAllRowTable = (nameId) => {
        document.querySelectorAll(`#${nameId} tbody tr`).forEach(function(e){e.remove()})
    }
    
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
                                "ordering": true,
                                order: [[0, 'desc']],
                                "drawCallback": function( settings ) {
							        $('[data-toggle="popover"]').popover({
							    		delay: { "show": 500, "hide": 100 },
							    		trigger:'focus'

							    	});
							    },

                            } );

    }

    const paddinglayout={
									left: 0,
									right: 0,
									top: 0,
									bottom: 10
								};
                                let colors = ['#FF8000','#36a2eb','red','blue','FFA500','Purple','Turquiose ','Brown','Gray','Fuchsia'];

			const optionpluginpercentage = {
											backgroundColor: function(context) {
												return context.dataset.backgroundColor;
											},
											borderColor: '',
											borderRadius: 25,
											borderWidth: 2,
											color: 'white',
											font: {
												weight: 'bold'
											},
											formatter: function(value, context) {
															return value+ '';
														}								
										};	

        /*FUNCIÓN PARA LA GRAFICA DE PASTEL*/
    function graficarPastel(requiere,norequiere){
                if( requiere === 0 && norequiere === 0 ) return;
                
                let lugarGrafica = document.getElementById('graficar2');
                let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="clientesChart" width="400px" height="245px"></canvas></div>`;
                lugarGrafica.innerHTML = grafica;
                var canvas = document.getElementById('clientesChart');
				// canvas.style.cssText = 'width: 400px; height: 400px;';
                document.getElementById('clientesChart').style="width:100%; height:100%";
				var ctxClientes = document.getElementById('clientesChart').getContext('2d');
				var clientesChart = new Chart(ctxClientes, {
					type: 'pie',
					data: {
						labels: ['Requiere','No requiere'],
						datasets: [{
							label: '',
							data: [requiere,norequiere],
							backgroundColor: colors,
							borderColor: colors,
							borderWidth: 1,
							datalabels: {
								anchor: 'center'
							}
						}]
					},
					options: {
						plugins: {
							datalabels: optionpluginpercentage,
						},
						layout: {
							padding: paddinglayout
						},
                        legend: {
                            labels: {
                                fontColor: '#fff'
                            }
                        }									
					}
				});

    }
        
        // let colors = ['#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000'];
            const optionplugnormal = {		
										color: 'white',
										font: {
											weight: 'bold'
										}								
									};

    
            /*FUNCIÓN PARA LA GRÁFICA DE BARRA*/
        function graficarBarra(Chartlabels,ChartData){
            if( Chartlabels.length === 0 && ChartData.length === 0 ) {
                swal("Aviso!", "No hay datos para esta vista, debe llenar una encuesta primero.");
                return;
            }
            let lugarGrafica = document.getElementById('graficar');
            let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas id="totalServiciosChart" ></canvas></div>`;
            lugarGrafica.innerHTML = grafica;
            if(Chartlabels.length == 1){
                document.getElementById('totalServiciosChart').style="width:90%; height:100%";
            }
            if(Chartlabels.length > 15){
                document.getElementById('totalServiciosChart').style="width:15%; height:100%";
            }else{
                document.getElementById('totalServiciosChart').style="width:60%; height:100%";
            }

            
            var calculate=0;
				var canvas = document.getElementById('totalServiciosChart');
				// canvas.style.cssText = 'width: 400px; height: 150px;background-color: #242a30;';
				var ctxtotServMes = document.getElementById('totalServiciosChart').getContext('2d');
				var totServMChart = new Chart(ctxtotServMes, {
					type: 'horizontalBar',
					data: {
						labels: Chartlabels,
						datasets: [{
							label: 'Total Personal',
							data: ChartData,
							backgroundColor: '#36a2eb',
							borderColor: '#36a2eb',
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
                                    fontColor: "white",
									beginAtZero: true,
                                    color: '#fff',
								}
							}],
							xAxes: [{
								ticks: {
									fontColor: "white",
                                    color: '#fff',
									beginAtZero: true
								},
                                display: false
							}]
						},
						legend: {
							color: "white",
							display: false
						},
						plugins: {
							datalabels: optionplugnormal,
						}
					}
				});
        }


        var showPDF = function(id){
            /*let id = document.getElementById('idarchivo').value;*/
            let token = '{{csrf_token()}}';
            $.ajax({
                url:'{{route('mostrar_archivoo_evidencias')}}',
                type: "POST",
                data: {
                    id:id,
                    _token:token
                },
                success:function (response){
                var pdf = response.pdf;
                let pdfWindow = window.open("")
                pdfWindow.document.write(
                "<iframe width='100%' height='100%' src='data:application/pdf;base64, " +
                encodeURI(pdf) + "'></iframe>"
                )
                }
            });
        }


</script>

@endsection
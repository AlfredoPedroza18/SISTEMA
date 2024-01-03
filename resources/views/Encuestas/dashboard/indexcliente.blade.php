@extends('layouts.masterMenuView')

@section('section')

<style>
    .text-color-amarillo{
    color: yellow; 
    }
</style>

<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

<ol class="breadcrumb">
    
        <li class="active">
           Encuestas / Dashboard
        </li>
    </li>
</ol>
<div class="row">
    <h1 class="page-header col-md-4">{{ $clientes[0]->Nombre }}</h1>
    <h1 class="page-header col-md-4 .offset-md-4">DASHBOARD</h1>
</div>


    <div class="row">
        <!-- <div class="col-lg-6 col-md-6 col-sm-12"> -->
        {{ csrf_field() }}

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="widget widget-stats bg-black">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="stats-title text-center">Año</div>
                        </div>
                    </div>
					<div class="row">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<button class="btn btn-xs btn-icon btn-circle btn-clear-filter btn-success" id="clearfilterPeriodo"><i class="fa fa-filter"></i></button>
							</div>
							<h4 class="panel-title"></h4>
						</div>
					</div>
                    <div class="panel-body table-responsive" style="height: 80px; padding: 5px;">
                        <select class="form-control" name="periodo" id="periodo">
                            @foreach($periodos as $periodo)
                                <option value="{{ $periodo->Periodo }}" >{{ $periodo->Periodo }}</option>
                            @endforeach
                        </select>
					
                    </div>
                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
				<div class="widget widget-stats bg-black">
					<div class="row">
						<div class="panel-heading">
									<div class="panel-heading-btn">
										<button class="btn btn-xs btn-icon btn-circle btn-clear-filter btn-success" id="clearfiltertiposencuesta"><i class="fa fa-filter"></i></button>
									</div>
									<h4></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="stats-title text-center">Tipo de Encuestas</div>
						</div>
					</div>
					<div class="panel-body table-responsive" style="height: 80px; padding: 5px;">
						<table style=" height: 50px; " id="TableTiposEncuesta" class="container-data">
							<tbody id="bodyTableTiposEncuesta">
								@foreach ($tiposencuesta as $tencuesta)
									<tr>
										<td style="display:none">{{ $tencuesta->IdTipoServicio }}</td>
										<td><span class="hoveroption">{{ $tencuesta->TipoEncuesta }}</span></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div>
                    <div class="">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="stats-title text-center">Tipo de Encuesta de Servicio</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel-heading">
                                <div class="panel-heading-btn">
                                </div>
                                <h4 class="panel-title"> </h4>
								<table id="TiposEncuestaServicio" style="height: 50px; width: 100%;" class="display table table-striped table-bordered table-responsive">
									<thead>
										<tr>
											<!-- <th class="text-center">PERIODO</th> -->
											<!-- <th class="text-center" id="periodo" name="periodo"></th> -->
											<th class="text-center">C.T.</th>
											<th class="text-center">Registrados</th>
											<th class="text-center">Incompletos</th>
											<th class="text-center">G1 Realizadas</th>
											<th class="text-center">G3 Realizadas</th>
											<!-- <th class="text-center">Tipo Servicio</th> -->
										</tr>
									</thead>
									<tbody id="bodyTableTES">
									@foreach ($tableClient as $tc)
									<tr>
										<!-- <td></td> -->
										<td>{{ $tc->Descripcion }}</td>
										<td>{{ $tc->Registrados }}</td>
										<td>{{ $tc->Incompletos }}</td>
										<td>{{ $tc->g1 }}</td>
										<td>{{ $tc->g3 }}</td>
										<!-- <td>{{ $tc->IdTipoServicio }}</td> -->
									</tr>
								@endforeach
									</tbody>
								</table>	
                            </div>
					    </div>
                        
                    </div>
                </div>
            </div>

	
      
        <!-- Cierra el div-row principal-->     
        <!-- </div> -->
        <!-- Cierra el container -->
    </div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
{!! Html::script('assets/js/Bootstrap_notify/bootstrap-notify.js') !!}
		{!! Html::script('assets/js/Bootstrap_notify/notify.js') !!}

		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		{!! Html::script('assets/js/map/code.js') !!}
		<script type="text/javascript">
		var hideloaderchart='display:none;';
        $(document).ready(function(){
		    	
				initChart();
		    });
			$.ajaxSetup({
                beforeSend: function () {
                    $('.chartloader').show();
					$('.container-data').hide();
					$("#btnPeriod").attr("disabled", "disabled");
					$(".btn-clear-filter").attr("disabled", "disabled");
                },
                complete: function () {
                    $('.chartloader').hide();
					$('.container-data').show();
					$("#btnPeriod").removeAttr("disabled");
					$(".btn-clear-filter").removeAttr("disabled");
                },
                success: function () {
                    $('.chartloader').hide();
					$('.container-data').show();
					$("#btnPeriod").removeAttr("disabled");
					$(".btn-clear-filter").removeAttr("disabled");
                }
            });


            let colors = ['#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000','#FF8000'];
            const optionplugnormal = {		
										color: 'white',
										font: {
											weight: 'bold'
										}								
									};

            function initChart(){
                var yfecha = $('select[name="periodo"]').val();
				// var table = $('#TiposEncuestaServicio').DataTable();
				// $(table.column(1).header()).text(yfecha);
				var IdCliente = '{{ Auth::user()->IdCliente }}';
				$.ajax({
					type: "GET",
					url: "{{ url('getDataChartClient') }}" +"/"+IdCliente+"/"+yfecha,
					success: function(response){
						$(".chartloader").hide();
						DrawTiposEncuestaServicio(response.tableClient);
						DrawGraph(response);
							
							
					},
					error: function(){
						messageErrorChart();
					}
				});
			}
 
            //Funciones para hacer el reload de las graficas	
			function DrawGraph(response){
                
				var totalserviciosmes=[];
                var totalsm=[];
				response.totalserviciosmes.forEach(function(element){
					totalserviciosmes.push(element.Mes);
					totalsm.push(element.Total);
				});		
                
                
				// ChartDictamen(totalserviciosmes,totalsm);
				
                
			}

            function ChartDictamen(Chartlabels,ChartData){
				var calculate=0;
				var canvas = document.getElementById('totalServiciosChart');
				canvas.style.cssText = 'width: 400px; height: 150px;background-color: #242a30;';
				var ctxtotServMes = document.getElementById('totalServiciosChart').getContext('2d');
				var totServMChart = new Chart(ctxtotServMes, {
					type: 'bar',
					data: {
						labels: Chartlabels,
						datasets: [{
							label: 'Total Servicios',
							data: ChartData,
							backgroundColor: colors,
							borderColor: colors,
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero: true
								}
							}],
							xAxes: [{
								ticks: {
									fontColor: "white",
									beginAtZero: true
								}
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

            function letterAndProcentage(labels,data){
				var letterProcentage=[];
				var rpercentage=percentage(data);
				for(i=0; i < labels.length; i++){
					letterProcentage.push(labels[i]+'\n'+rpercentage[i]+'%');
				}
				return letterProcentage;
			}

            		//Funcion para calcular el porcentaje
			function percentage(numbers){
				var percentage = [];
				var sumTotal = 0;
				var calculate = 0;
				for(i=0; i < numbers.length; i++){
					sumTotal = sumTotal+parseInt(numbers[i]);
				}
				for(j=0; j < numbers.length; j++){
					if(sumTotal > 0){
						calculate = (parseInt(numbers[j])/parseInt(sumTotal))*100;
						percentage.push(calculate.toFixed(2));
					}else{
						percentage.push(0);
					}
				}
				
				return percentage;
			}

            //Funcion para destruir las graficas
			function clearcharts(){
								
				$("#container-totalServiciosChart").html('');
				$('#container-totalServiciosChart').append('<canvas id="totalServiciosChart"></canvas>');
				
			}
			//Funcion para change color de boton limpiar filtro
			function ChangeColorBtnClearfilter(type,nameId){
				if(type == "filter"){
					if($("#"+`${nameId}`).hasClass('btn-success')){
						$("#"+`${nameId}`).removeClass('btn-success');
						$("#"+`${nameId}`).addClass('btn-danger');
					}
				}
				if(type == "clear"){
					if($("#"+`${nameId}`).hasClass('btn-danger')){
						$("#"+`${nameId}`).removeClass('btn-danger');
						$("#"+`${nameId}`).addClass('btn-success');
					}
				}
			}

			//Eventos para realizar los filtros
			$("#TableClientes tr").on("click", function(){
				$(this).addClass('selected').siblings().removeClass('selected');
				var value=$(this).find('td:first').html();
				var yfecha = $('select[name="periodo"]').val();
				GetFilterDataByClient(value,yfecha);
			});

			// $("#btnPeriod").on("click", function(){
			// 	var yfecha = $('select[name="periodo"]').val();
			// 	GetFilterDataByPeriod(yfecha);
			// });

			$('#periodo').change(function() {
				var yfecha = $(this).val();
				GetFilterDataByPeriod(yfecha);
				// var table = $('#TiposEncuestaServicio').DataTable();
				// $(table.column(1).header()).text(yfecha);
			});

			// Events for clears filters 
			$("#clearfilterclient").on("click",function(){
				GetClearFilterClient();
				GetClearPictureHigher();
				initChart();
			});

			$("#clearfiltertiposencuesta").on("click",function(){
				GetClearFilterTipoEncuesta();
				GetClearPictureHigher();
				initChart();
			});

			$("#clearfilterPeriodo").on("click",function(){
				
				initDate();
			});

			//Funcion para hacer el cambio en los recuadros
			function DrawPictureHigher(Totalservicio,TiposEncuesta){
				var tipoencuesta;

				$("#total_clientes_cuadro").html(Totalservicio);

				$('#bodyTableTiposEncuesta').html('');
				if(TiposEncuesta.length == 0){
					$('#bodyTableTiposEncuesta').html('');
				}else{
					TiposEncuesta.forEach(function(element){
						tipoencuesta = tipoencuesta+'<tr><td style="display:none">'+element.IdTipoServicio+'</td><td><span class="hoveroption">'+element.TipoEncuesta+'</span></td></tr>';
					});
							
					$('#bodyTableTiposEncuesta').append(tipoencuesta);
					$("#TableTiposEncuesta tr").on("click", function(){
					$(this).addClass('selected').siblings().removeClass('selected');
						var value=$(this).find('td:first').html();
						var yfecha = $('select[name="periodo"]').val();
						GetFilterDataByTipoEncuesta(value,yfecha);
					});
				}
				
			}

			function DrawPeriodo(Periodos){
				var periodo;
				Periodos.forEach(function(element){
					periodo=periodo+'<option>'+element.Periodo+'</option>';
				});

				$("#periodo").html(periodo);
				
			}

			function DrawClients(ResponseClients){
				var clients;
				
				$('#bodyTableClientes').html('');
				if(ResponseClients.length == 0){
					$('#bodyTableClientes').html('');
				}else{
					ResponseClients.forEach(function(element){
						clients = clients+'<tr><td style="display:none">'+element.IdCliente+'</td><td><span class="hoveroption">'+element.Nombre+'</span></td></tr>';
					});
							
					$('#bodyTableClientes').append(clients);
					$("#TableClientes tr").on("click", function(){
					$(this).addClass('selected').siblings().removeClass('selected');
						var value=$(this).find('td:first').html();
						var yfecha = $('select[name="periodo"]').val();
						GetFilterDataByClient(value,yfecha);
					});
				}
			}

			function DrawTiposEncuestaServicio(ResponseTES){
				var tes;
				
				$('#bodyTableTES').html('');
				if(ResponseTES.length == 0){
					$('#bodyTableTES').html('');
				}else{
					ResponseTES.forEach(function(element){
						tes = tes+'<tr><td>'+element.Descripcion+'</td><td>'+element.Registrados+'</td><td>'+element.Incompletos+'</td><td>'+element.g1+'</td><td>'+element.g3+'</td></tr>';
					});
							
					$('#bodyTableTES').append(tes);
					// $("#TiposEncuestaServicio tr").on("click", function(){
					// $(this).addClass('selected').siblings().removeClass('selected');
					// 	var value=$(this).find('td:first').html();
					// 	var yfecha = $('select[name="periodo"]').val();
					// 	GetFilterDataByClient(value,yfecha);
					// });
				}
			}

			

			//Request clear filtros
			function GetClearFilterClient(){
				var yfecha = $('select[name="periodo"]').val();
				showNotify("Filtro: ","Limpiando filtro clientes, espere por favor","");
				$.ajax({
					url:"{{ url('GetClients') }}/"+yfecha,
					type:"GET",
					success: function(response){
						DrawClients(response.clientes);
						ChangeColorBtnClearfilter("clear","clearfilterclient");
					},
					error: function(){
						showNotify("Filtro error: ","Ocurrió un error al obtener los datos.","danger");
					}
				});			
			}

			function GetClearFilterTipoEncuesta(){
				var yfecha = $('select[name="periodo"]').val();
				showNotify("Filtro: ","Limpiando filtro clientes, espere por favor","");
				$.ajax({
					url:"{{ url('GetTipoEncuestaClient') }}/"+yfecha,
					type:"GET",
					success: function(response){
						DrawClients(response.tiposencuesta);
						ChangeColorBtnClearfilter("clear","clearfiltertiposencuesta");
					},
					error: function(){
						showNotify("Filtro error: ","Ocurrió un error al obtener los datos.","danger");
					}
				});			
			}


			function GetClearPictureHigher(){
				$.ajax({
					url:"{{ url('GetBoxHeader') }}",
					type: "GET",
					success: function(response){
						DrawPictureHigher(response.totalservicios,response.tiposencuesta);
						DrawClients(response.clientes);
					},
					error: function(){
						showNotify("Filtro error: ","Ocurrió un error al obtener los datos.","danger");
					}
				});
			}

			function initDate(){
				
				$.ajax({
					url:"{{ url('GetBoxHeaderClient') }}",
					type: "GET",
					success: function(response){
						DrawPictureHigher(response.totalservicios,response.tiposencuesta);
						DrawPeriodo(response.periodos);
						DrawTiposEncuestaServicio(response.tableClient);
						// clearcharts();
						// DrawGraph(response);
						ChangeColorBtnClearfilter("clear","clearfilterPeriodo");
						var yfecha = $('select[name="periodo"]').val();
						// var table = $('#TiposEncuestaServicio').DataTable();
						// $(table.column(1).header()).text(yfecha);
					},
					error: function(){
						showNotify("Filtro error: ","Ocurrió un error al obtener los datos.","danger");
					}
				});
			}

			//Request de los filtros
			function GetFilterDataByClient(value,yfecha){
				showNotify("Filtro: ","Realizando filtro, espere por favor","");
				$.ajax({
					url:"{{ url('GetDataByClient') }}" +"/"+value+"/"+yfecha,
					type:"GET",
					success: function(response){
						
						DrawPictureHigher(response.totalservicios,response.tiposencuesta);
						//charts
						clearcharts();
						DrawGraph(response);
						ChangeColorBtnClearfilter("filter","clearfilterclient");
					},
					error: function(){
						showNotify("Filtro error: ","Ocurrió un error al obtener los datos.","danger");
					}
				});
			}

			function GetFilterDataByTipoEncuesta(value,yfecha){
				showNotify("Filtro: ","Realizando filtro, espere por favor","");
				$.ajax({
					url:"{{ url('GetDataByTipoEncuestaClient') }}" +"/"+value+"/"+yfecha,
					type:"GET",
					success: function(response){
						DrawTiposEncuestaServicio(response.tableClient);
						// DrawPictureTotalServ(response.totalservicios);
						//charts
						clearcharts();
						// DrawGraph(response);
						ChangeColorBtnClearfilter("filter","clearfiltertiposencuesta");
					},
					error: function(){
						showNotify("Filtro error: ","Ocurrió un error al obtener los datos.","danger");
					}
				});
			}

			function GetFilterDataByPeriod(yfecha){
				showNotify("Filtro: ","Realizando filtro, espere por favor","");
				$.ajax({
					url:"{{ url('GetDataByPeriodClient') }}" +"/"+yfecha,
					type:"GET",
					success: function(response){
						  DrawPictureHigher(response.totalservicios,response.tiposencuesta);
						DrawTiposEncuestaServicio(response.tableClient);
						//charts
						//   clearcharts();
						//   DrawGraph(response);
						  ChangeColorBtnClearfilter("filter","clearfilterPeriodo");
					},
					error: function(){
						showNotify("Filtro error: ","Ocurrió un error al obtener los datos.","danger");
					}
				});
			}

</script>

@endsection
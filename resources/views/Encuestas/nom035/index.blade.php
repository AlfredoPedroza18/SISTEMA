@extends('layouts.masterMenuView')
@section('section')


<style>
    .label1, .label2{
        margin: 0;
        font-size: 14px;
    }

    @media(min-width: 480px){
        .selectt1, .selectt2{
            display: flex;
            align-items: center;
        }
    }
   
   @media(max-width: 1400px){
        .Cajitas{
            
        }

        .p_botones{
            font-size: 14px!important;
        }

        .Cajitas p{
           font-size: 14px!important;
        }

        .etiquetas{
            font-size: 15px!important;
        }

        .btn3 a{
            font-size: 15px!important;
        }
    }

    @media(max-width: 1200px){
        .Cajitas{
            
        }

        .p_botones{
            font-size: 14px!important;
        }

        .Cajitas p{
           font-size: 14px!important;
        }

        .etiquetas{
            font-size: 13px!important;
        }

        .btn3 a{
            font-size: 13px!important;
        }

        .iconss{
            font-size: 30px;
        }
    }

    .riesgo_color{
        background-color: #58AADF;
        padding: 2px 12px;
    }

    h1{
        background-color: rgb(105, 230, 114);
    }
</style>
<!-- AQUI IRA TODO EL CONTENIDO DE ESTA VISTA - QUE REQUIERE GEN T -->

<div id="content" class="content">

    <ol class="breadcrumb">
        <li><a href="{{route('nom035')}}">Módulos</a></li>
            <li class="active">
                Encuestas-Nom-035
            </li>
        </li>
    </ol>

    {{-- Header --}}
    <div class="row" style="margin-bottom: 15px">
        <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="row selectt1" style="display: flex; gap: 5px;">
                <div class="col-sm-12 col-md-2" style="width: 20%">
                    <label for="" class="label1">Cliente</label>
                </div>
                <div class="col-sm-12 col-md-10" style="width: 90%">
                @if(Auth::user()->tipo == 'c')
                    <select id="cliente" class="form-control form-control-sm" aria-label="Default select example" disabled>
                        @if($Id=="N/A")
                            @foreach ($clientes as $row )
                                <option value="{{$row->id}}">{{$row->nombre_comercial}}</option>
                            @endforeach
                        @else
                            <option selected value="{{$Id}}" disabled>{{$nombre_comercial}}</option>
                            @foreach ($clientesTodos as $row )
                                <option value="{{$row->id}}">{{$row->nombre_comercial}}</option>
                            @endforeach
                        @endif
                    </select>
                @else
                <select id="cliente" class="form-control form-control-sm" aria-label="Default select example">
                        <option value="" disabled selected> --Seleccione un cliente-- </option>
                        @if($Id=="N/A")
                            @foreach ($clientes as $row )
                                <option value="{{$row->id}}">{{$row->nombre_comercial}}</option>
                            @endforeach
                        @else
                            <option selected value="{{$Id}}" disabled>{{$nombre_comercial}}</option>
                            @foreach ($clientesTodos as $row )
                                <option value="{{$row->id}}">{{$row->nombre_comercial}}</option>
                            @endforeach
                        @endif
                    </select>

                @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <h1 class="page-header text-center bg-white p-3" style="font-size: 20px; margin:0">Panel general de los centros de trabajo</h1>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="row selectt2" style="display: flex; gap: 5px;">
                <div class="col-md-2 col-sm-12" style="width: 20%">
                    <label for="" class="label2">Periodo</label>
                </div>
                <div class="col-md-10 col-sm-12" style="width: 80%">
                    <select id="periodo" class="form-control form-control-sm" aria-label="Default select example">
                        <option value="" >--Seleccione el periodo--</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom: 15px">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                            <div class="widget widget-stats bg-black">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="stats-title text-center" style="font-size:17px; color:white">Distribución</div>
                                    </div>
                                </div>
                                <div id="graficar2" class="panel-body table-responsive" style="height: 18rem;padding:0; display:flex; align-items:center; justify-content:center;width:100%">
                                
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                            <div class="widget widget-stats bg-black">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="stats-title text-center" style="font-size:17px; color:white">Encuestas Riesgo Guia 1</div>
                                    </div>
                                </div>
                                <div id="graficar" class="panel-body table-responsive" style="height: 18rem;padding:0;display:flex;align-items:center; width:100%; justify-content:center">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0">
                            <div class="widget widget-stats bg-black">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="stats-title text-center" style="font-size:17px; color:white">Encuestas Entorno Guia 3</div>
                                    </div>
                                </div>
                                <div id="graficarEntorno" class="panel-body table-responsive" style="height: 18rem;padding:0;display:flex;align-items:center; width:100%; justify-content:center">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                    <div class="col-md-3 col-md-12 col-sm-12 btn3" style="margin-bottom: 3px">
                        <a id="iddistribucion" type="button" class="btn btn-lg btn-block" style="background-color:rgb(6, 140, 202); color:white; padding: 20px 0">Distribución</a>
                    </div>
                    <div hidden class="col-md-3 col-md-12 col-sm-12 btn3" style="margin-bottom: 3px">
                        <a hidden type="hidden" id="btnReporteFinal" >Reporte Final PDF</a>
                    </div>
                    <div class="col-md-3 col-md-12 col-sm-12 btn3">
                        <a hidden type="button" href="{{route('ayudaNom035')}}"  style="background-color:rgb(6, 140, 202); color:white; padding: 20px 0">Información y ayuda</a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12" style="margin-top: 7px">
                        <a type="button" class="btn btn-primary btn-lg" id="btn-quejas">
                            Quejas <span class="badge badge-danger" style="color: white" id="c-quejas">0</span>
                        </a>
                    </div>
            </div>

        </div>
    </div>

    <div class="row">
        {{-- Parte de enmedio del dashboard --}}
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-12 row">

                {{-- Identificación de riesgo psicosocial Guia 1 --}}
                <div id="centros" class="col-md-6" style="">
                    <div class="row" style="text-align:end;">
                        <div class="col-md-10">
                            <label for="" class="p-4 etiquetas bg-black" style="text-align:center; color:rgb(255, 255, 255); font-size: 17px; width: 100%; border-radius: 2px; border:2px solid rgb(35, 35, 35);">Identificación de riesgo psicosocial Guia 1</label>
                        </div> 
                        <div class="Btns col-md-2" style="text-align:end">
                            <a id="btnVer" type="button" class="btn" style="background-color:rgb(6, 140, 202); color:white; border-radius: 5px; width: 100%; font-size: 17px; display:flex; justify-content:center; align-items:center;"><p class="p_botones" style="width:90%; margin:0">Ver</p></a>
                        </div>
                    </div>
                    <div id="centroTrabajo">    

                    </div>

                </div>
                  {{--Fin Identificación de riesgo psicosocial Guia 1 --}}

                  {{-- Entorno laboral Guia 3 --}}
                <div class="col-md-5" style="text-align:center;">
                    <div class="row">
                        <div class="col-md-10">
                            <label for="" class="p-4 etiquetas bg-black" style="color:rgb(255, 255, 255); font-size: 17px; width: 100%; border-radius: 2px; border:2px solid rgb(35, 35, 35);">Entorno laboral Guia 3</label>
                        </div>
                        <div class="Btns col-md-2" style="text-align:end">
                            <a id="btnVer2" type="button" class="btn" style="background-color:rgb(6, 140, 202); color:white; border-radius: 5px; width: 100%; font-size: 17px; display:flex; justify-content:center; align-items:center;"><p class="p_botones" style="width:90%; margin:0">Ver</p></a>
                        </div>
                    </div>
                    <div class="entornoLaboral">

                    </div>
                </div>
                  {{--Fin Entorno laboral Guia 3 --}}

                  {{-- ReportesReportes --}}
                <div class="col-md-1" style="text-align:center;">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="" class="p-4 etiquetas bg-black" style="color:rgb(255, 255, 255); font-size: 17px; width: 100%; border-radius: 2px; border:2px solid rgb(35, 35, 35);;">Reportes</label>
                        </div>
                    </div>
                    {{-- Primera linea --}}
                        <div class="reportes">

                        </div>
                    {{-- Fin Primera linea --}}
                    
                </div>
                {{--Fin ReportesReportes --}}
            </div>
        </div>
         {{-- Parte final de enmedio del dashboard --}}
    </div>


</div>
<style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }
    #chartdiv2 {
      width: 100%;
      height: 500px;
    }

</style>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
<!-- AQUI IRA TODO EL CONTENIDO/VALIDACIONES/APIS/ETC DE ESTA VISTA - QUE REQUIERE GEN T -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">



    $(document).ready(function(){
        // App.init();
        llamar();
        llamar2();
        devolver();
        btnHabilitar();
        btnVerHabilitar();
        // cargarDatos();

        function llamar(){
            var tipo = '{{ Auth::user()->tipo }}';
            if(tipo  == 'c'){
                    
                    $IdCliente = $('select[id="cliente"]').val();
                    let lugarGrafica = document.getElementById('graficar');
                    lugarGrafica.innerHTML = "";
                    if ($IdCliente=="") {
                        
                    } else {
                        
                        eliminar();
                       
                        llenarSelect($IdCliente);
                        limpiarStorage();
                    }
                    btnHabilitar();
            
            }else{
                document.getElementById("cliente").addEventListener("change", function(event){
                    event.preventDefault();
                    $IdCliente = document.getElementById("cliente").value;
                    let lugarGrafica = document.getElementById('graficar');
                    let lugarGrafica2 = document.getElementById('graficar2');
                    let lugarGrafica3 = document.getElementById('graficarEntorno');
                    lugarGrafica.innerHTML = "";
                    lugarGrafica2.innerHTML = "";
                    lugarGrafica3.innerHTML = "";
                    if ($IdCliente=="") {
                        
                    } else {
                        
                        eliminar();
                        limpiar();
                        llenarSelect($IdCliente);
                        limpiarStorage();
                        localStorage.setItem('idcliente', $IdCliente);
                    }
                    btnHabilitar();
                });
            }

            

            
        }
        
          //Agregar periodos al segundo select dependiendo el cliente
        function llenarSelect(IdCliente){
            let token = '{{csrf_token()}}';
            $.ajax({
                url: '{{ route('getPeriodo') }}',
                type: "POST",
                data: {
                    IdCliente:IdCliente,
                    _token: token
                },
                success: function(response){
                    limpiar();
                    addSelect(response.data, IdCliente);
                },
                error: function( e ) {
                    console.log(e);
                }
            });
        }

         //crear los select y agregarlos al html
        const addSelect = (response, IdCliente) => {

            var selectt = document.getElementById("periodo");
            var opcion2 = document.createElement("option");
            opcion2.innerHTML = "--Seleccione un periodo--";
            opcion2.setAttribute("disabled", "");
            opcion2.setAttribute("selected", "");
            selectt.appendChild(opcion2);
            response.forEach(response => {
                var opcion = document.createElement("option");
                if(response.Fecha === null){
                    
                }else{
                    let mes = 0;
                    let dia = 0;

                    let fecha2 = response.Fecha;
                    let formatoFecha = fecha2.split('-');
                    let anio = formatoFecha[0];
                    mes = formatoFecha[1];
                    dia = formatoFecha[2];
                    let fechaFormateada = dia+"-"+mes+"-"+anio;
                    opcion.value = `${response.IdPeriodo}`;
                    opcion.innerHTML = `${fechaFormateada}`;

                    if( localStorage.getItem('periodo') ) {
                        if( opcion.value === localStorage.getItem('periodo') ){
                            opcion.setAttribute("selected", "selected");
                        }
                    }

                    selectt.appendChild(opcion);
                } 
            });
        }

         //Limpiar los select cada que seleccionan un cliente
        const limpiar = () => {
            var selectt = document.getElementById("periodo");
            for(let i = selectt.options.length; i >= 0; i--) {
                selectt.remove(i);
            }
        }

        function llamar2() {
            document.getElementById("periodo").addEventListener("change", function(event){
                event.preventDefault();
                $IdCliente = document.getElementById("cliente").value;
                $IdPeriodo = document.getElementById("periodo").value;
                $textCliente = document.getElementById("cliente");
                $cliente = $textCliente.options[$textCliente.selectedIndex].text;
                $textFecha = document.getElementById("periodo");
                $texto = $textFecha.options[$textFecha.selectedIndex].text;
                let lugarGrafica = document.getElementById('graficar');
                lugarGrafica.innerHTML = "";
                let lugarGrafica2 = document.getElementById('graficar2');
                lugarGrafica2.innerHTML = "";
                
                obtenerCentrosTrabajo($IdPeriodo, $IdCliente);
                btnHabilitar();
                btnVerHabilitar();
                //  localstorage.setItem('idperiodo', $Idperiodo);
                localstorage($IdCliente,$IdPeriodo,$texto,$cliente);
            });
        }

        
        function btnHabilitar(){
            $IdPeriodo2 = document.getElementById("periodo").value;
            if( localStorage.getItem('periodo') ){
                $IdPeriodo2 = localStorage.getItem('periodo');
            }

            if($IdPeriodo2 === ""){
                document.getElementById("iddistribucion").onclick= function(e){
                    e.preventDefault();
                    swal("Aviso!", "No ha seleccionado ningun periodo", "info");
                    document.getElementById("iddistribucion").href = "";
                }

                document.getElementById('btnReporteFinal').onclick = function(e){
                    e.preventDefault();
                    swal("Aviso!", "No ha seleccionado ningun periodo", "info");
                    document.getElementById('btnReporteFinal').href = "";
                }
            }else{
                document.getElementById("iddistribucion").onclick= "";
                document.getElementById("btnReporteFinal").onclick= "";
            }
        }

        function btnVerHabilitar(){
            $IdPeriodo2 = document.getElementById('periodo').value;
            if( localStorage.getItem('periodo') ){
                $IdPeriodo2 = localStorage.getItem('periodo');
            }
            
            if($IdPeriodo2 === ""){
                document.getElementById('btnVer').onclick = function(e){
                    e.preventDefault();
                    swal("Aviso!", "No ha seleccionado ningun periodo", "info");
                    document.querySelectorAll('.btnVer').href = "";
                }

                document.getElementById('btnVer2').onclick = function(e){
                    e.preventDefault();
                    swal("Aviso!", "No ha seleccionado ningun periodo", "info");
                    document.querySelectorAll('.btnVer2').href = "";
                }

            }else{
                document.getElementById("btnVer").onclick= "";
                document.getElementById("btnVer2").onclick= "";
            }
        }

            // obtener centros de trabajo
        function obtenerCentrosTrabajo(IdPeriodo, IdCliente){
            $('body').waitMe({
                effect : 'roundBounce',
                waitTime: 300000,
                text : 'Espere un momento por favor...',
                onClose: function() {}
            });
            let cliente = IdCliente;
            let periodo = IdPeriodo;
            let token = '{{csrf_token()}}';
            $.ajax({
                url: '{{ route('getCentros') }}',
                type: "POST",
                data: {
                    IdPeriodo:IdPeriodo,
                    IdCliente:IdCliente,
                    _token: token
                },
                success: function(response){
                    eliminar();
                    if(response.data.length == 0){
                        $('body').waitMe({
                            effect : 'roundBounce',
                            waitTime: 800,
                            text : 'Espere un momento por favor...',
                            onClose: function() {}
                        });
                        habilitarDistribucion(response.data);
                    }else{
                        crearCentros(response.data,response.data2,response.data3,response.quejas,response.sinInformacion,response.asignados,response.servicioo);
                        habilitarDistribucion(response.data);
                    }
                },
                error: function( e ) {
                    console.log(e);
                }
            });

        }

        function devolver(){

            let idCliente = localStorage.getItem('idcliente');
            let cliente = localStorage.getItem('cliente');
            let periodo = localStorage.getItem('periodo');
            let fecha = localStorage.getItem('fecha');

            if( !periodo ) return;

            if(idCliente === null){
            }else{
                llenarSelect(idCliente);
                var select = document.getElementById('cliente');
                for(let i=0; i<select.children.length; i++){
                    var opcion = select.children[i];
                    if(opcion.value === idCliente){
                        opcion.setAttribute("selected", "");
                    }
                }

                // var option = document.createElement("option");
                // option.value = periodo;
                // option.innerHTML = fecha;
                // option.setAttribute("selected", "");
                // select2.appendChild(option);

                obtenerCentrosTrabajo(periodo,idCliente);
            }

        }


        const crearCentros = function(response,response2,response3,quejas,sinInformacion,asignados,servicioo){
            let contador = 0;
            let cant = 0;
            let countt = 0;
            let deta = response.length;
            let porcentaje = 0;
            let porcentaje2 = 0;
            let indec = 0;
            let namecentro = 0;
            let sumariesgoentorno = [];
            let countriesgoentorno = 0;
            let textriesgo = [];
            let colorriesgo = [];
            let htmlEntornoLaboral = "";
            let responsetama = response;


            response3.forEach(function(resp){
                if(resp < 50){
                    colorriesgo.push("#58AADF");
                    textriesgo.push("Nulo");
                }
                if(resp >= 50 && resp< 75){
                    colorriesgo.push("#9ABE13");
                    textriesgo.push("Bajo");
                }
                if(resp >= 75 && resp < 99){
                    colorriesgo.push("#FAEB29");
                    textriesgo.push("Medio");
                }
                if(resp>= 99 && resp< 140){
                    colorriesgo.push("#F19602");
                    textriesgo.push("Alto");
                }
                if(resp> 140){
                    colorriesgo.push("#F60000");
                    textriesgo.push("Muy alto");
                }
                sumariesgoentorno.push(resp);
            });

            response.forEach( function(response,index) {

                if(index <= (deta-1)){
                    $('body').waitMe({
                    effect : 'roundBounce',
                    waitTime: 800,
                    text : 'Espere un momento por favor...',
                    onClose: function() {}
                    });
                }

                contador = index;
                var contenidoCentros = document.getElementById('centroTrabajo');
                var entornoLaboral = document.querySelector('.entornoLaboral');
                var reportes = document.querySelector('.reportes');


                if((index%2) == 0){
                let porcentajeRiesgo = response.PorcientoRiesgo; 
                porcentajeRiesgo = parseFloat(porcentajeRiesgo).toFixed(2);
                porcentaje = response.Porciento;
                porcentaje = parseFloat(porcentaje).toFixed(2);
                    let htmlCentro = `<div class="riesgo" style="display: flex; justify-content:space-between; margin-bottom: 15px; gap: 5px;">
                                <div class="Centros Cajitas" style="width:33%; height: 80px; border-radius: 2px; text-align:center;">
                                    <p class="p-4" style="color: white; font-size: 17px; height: 32%; background-color:gray; margin:0; border-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Centro de trabajo</p>
                                    <p class="p-4" style="color: black; font-size: 17px; height: 75%; background-color: white; margin:0; border-radius: 5px; border-top-left-radius: 0; border-top-right-radius: 0; display:flex; justify-content:center; align-items:center;">${response.CentroTrabajo}</p>
                                </div>
                                <div class="Poblacion Cajitas" style="width:33%; height: 80px; border-radius: 2px; text-align:center; line-height:1;">
                                    <p class="p-4" style="color: white; font-size: 17px; height: 32%; background-color:gray; margin:0; border-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Población</p>
                                    <p class="p-4" style="padding: 10px; color: black; font-size: 17px; height: 75%; background-color: white; margin:0; border-radius: 5px; border-top-left-radius: 0; border-top-right-radius: 0; display:flex; justify-content:center; align-items:center;"><b>${response.TotalFinalizado}/${response.CantidadCentro}</b>&nbsp[${porcentaje}%]</p>
                                </div>
                                <div class="Riesgo Cajitas" style="width: 33%; height: 80px; border-radius: 2px; text-align:center; line-height:1;">
                                    <p class="p-4 " style="color: white; font-size: 17px; height: 32%; background-color:gray; margin:0; border-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Riesgo</p>
                                    <p class="p-4" style="padding: 10px; color: black; font-size: 17px; height: 75%; background-color: white; margin:0; border-radius: 5px; border-top-left-radius: 0; border-top-right-radius: 0;display:flex; justify-content:center; align-items:center;"><b>${porcentajeRiesgo}%</b></p>
                                </div>
                            </div>`;

                    contenidoCentros.insertAdjacentHTML("beforeend", htmlCentro);
                    cant = cant + parseInt(response.TotalFinalizado);
                }else{
                    porcentaje2 = response.Porciento;
                    porcentaje2 = parseFloat(porcentaje2).toFixed(2);
                    if(response2.length > 0){
                            if(countriesgoentorno == response2.length){
                                htmlEntornoLaboral =`<div class="entornoL" style="display: flex; justify-content:space-between; margin-bottom: 15px; gap: 5px;">
                                                    <div class="Centros Cajitas" style="width: 33%; height: 80px; border-radius: 2px; text-align:center;">
                                                        <p class="p-4" style="color: white; font-size: 17px; height: 32%; background-color:gray; margin:0; border-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Centro de trabajo</p>
                                                        <p class="p-4" style="color: black; font-size: 17px; height: 75%; background-color: white; margin:0; border-radius: 5px; border-top-left-radius: 0; border-top-right-radius: 0; display:flex; justify-content:center; align-items:center;">${response.CentroTrabajo}</p>
                                                    </div>
                                                    <div class="Cajitas" style="width: 33%; height: 80px; border-radius: 2px; text-align:center;">
                                                        <p class="p-4" style="color: white; font-size: 17px; height: 32%; background-color:gray; margin:0; border-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Personal</p>
                                                        <p class="p-4" style="color: black; font-size: 17px; height: 75%; background-color: white; margin:0; border-radius: 5px; border-top-left-radius: 0; border-top-right-radius: 0; display:flex; justify-content:center; align-items:center;"><b>${response.TotalFinalizado}/${response.CantidadCentro}</b>&nbsp[${porcentaje2}%]</p>
                                                    </div>
                                                    <div class="Cajitas" style="background-color: white; color:white; width: 33%; height: 80px; border-radius: 2px; text-align:center">
                                                        <p class="" style="margin: 0; padding:2px; background-color: gray; border-top-left-radius: 5px; border-top-right-radius: 5px;font-size: 17px; height: 32%;">Riesgo</p>
                                                        <div class="p-4" style="background-color: white; color:white; width: 100%; height: 75%; border-radius: 5px; text-align:center; display:flex; flex-direction:column; align-items:center; justify-content:center">
                                                            <p style="color:black; font-size: 17px; margin:0; line-height:1;"><span style="background-color:#58AADF;padding: 2px 12px;">Nulo</span></p> 
                                                        </div>
                                                    </div>
                                            </div>`;
                            }else{
                                if(response.IdCentro == response2[countriesgoentorno].IdCentro){
                                htmlEntornoLaboral =`<div class="entornoL" style="display: flex; justify-content:space-between; margin-bottom: 15px; gap: 5px;">
                                                        <div class="Centros Cajitas" style="width: 33%; height: 80px; border-radius: 2px; text-align:center;">
                                                            <p class="p-4" style="color: white; font-size: 17px; height: 32%; background-color:gray; margin:0; border-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Centro de trabajo</p>
                                                            <p class="p-4" style="color: black; font-size: 17px; height: 75%; background-color: white; margin:0; border-radius: 5px; border-top-left-radius: 0; border-top-right-radius: 0; display:flex; justify-content:center; align-items:center;">${response.CentroTrabajo}</p>
                                                        </div>
                                                        <div class="Cajitas" style="width: 33%; height: 80px; border-radius: 2px; text-align:center;">
                                                            <p class="p-4" style="color: white; font-size: 17px; height: 32%; background-color:gray; margin:0; border-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Personal</p>
                                                            <p class="p-4" style="color: black; font-size: 17px; height: 75%; background-color: white; margin:0; border-radius: 5px; border-top-left-radius: 0; border-top-right-radius: 0; display:flex; justify-content:center; align-items:center;"><b>${response.TotalFinalizado}/${response.CantidadCentro}</b>&nbsp[${porcentaje2}%]</p>
                                                        </div>
                                                        <div class="Cajitas" style="background-color: white; color:white; width: 33%; height: 80px; border-radius: 2px; text-align:center">
                                                            <p class="" style="margin: 0; padding:2px; background-color: gray; border-top-left-radius: 5px; border-top-right-radius: 5px;font-size: 17px; height: 32%;">Riesgo</p>
                                                            <div class="p-4" style="background-color: white; color:white; width: 100%; height: 75%; border-radius: 5px; text-align:center; display:flex; flex-direction:column; align-items:center; justify-content:center">
                                                                <p style="color:black; font-size: 17px; margin:0; line-height:1;"><span style="background-color:${colorriesgo[countriesgoentorno]};padding: 2px 12px;">${textriesgo[countriesgoentorno]}</span></p> 
                                                            </div>
                                                        </div>
                                                </div>`;
                                    countriesgoentorno++;
                                }else{
                                    htmlEntornoLaboral =`<div class="entornoL" style="display: flex; justify-content:space-between; margin-bottom: 15px; gap: 5px;">
                                                            <div class="Centros Cajitas" style="width: 33%; height: 80px; border-radius: 2px; text-align:center;">
                                                                <p class="p-4" style="color: white; font-size: 17px; height: 32%; background-color:gray; margin:0; border-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Centro de trabajo</p>
                                                                <p class="p-4" style="color: black; font-size: 17px; height: 75%; background-color: white; margin:0; border-radius: 5px; border-top-left-radius: 0; border-top-right-radius: 0; display:flex; justify-content:center; align-items:center;">${response.CentroTrabajo}</p>
                                                            </div>
                                                            <div class="Cajitas" style="width: 33%; height: 80px; border-radius: 2px; text-align:center;">
                                                                <p class="p-4" style="color: white; font-size: 17px; height: 32%; background-color:gray; margin:0; border-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Personal</p>
                                                                <p class="p-4" style="color: black; font-size: 17px; height: 75%; background-color: white; margin:0; border-radius: 5px; border-top-left-radius: 0; border-top-right-radius: 0; display:flex; justify-content:center; align-items:center;"><b>${response.TotalFinalizado}/${response.CantidadCentro}</b>&nbsp[${porcentaje2}%]</p>
                                                            </div>
                                                            <div class="Cajitas" style="background-color: white; color:white; width: 33%; height: 80px; border-radius: 2px; text-align:center">
                                                                <p class="" style="margin: 0; padding:2px; background-color: gray; border-top-left-radius: 5px; border-top-right-radius: 5px;font-size: 17px; height: 32%;">Riesgo</p>
                                                                <div class="p-4" style="background-color: white; color:white; width: 100%; height: 75%; border-radius: 5px; text-align:center; display:flex; flex-direction:column; align-items:center; justify-content:center">
                                                                    <p style="color:black; font-size: 17px; margin:0; line-height:1;"><span class="riesgo_color">Nulo</span></p> 
                                                                </div>
                                                            </div>
                                                    </div>`;
                                }
                            }
                        
                    }else{
                        htmlEntornoLaboral =`<div class="entornoL" style="display: flex; justify-content:space-between; margin-bottom: 15px; gap: 5px;">
                                                    <div class="Centros Cajitas" style="width: 33%; height: 80px; border-radius: 2px; text-align:center;">
                                                        <p class="p-4" style="color: white; font-size: 17px; height: 32%; background-color:gray; margin:0; border-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Centro de trabajo</p>
                                                        <p class="p-4" style="color: black; font-size: 17px; height: 75%; background-color: white; margin:0; border-radius: 5px; border-top-left-radius: 0; border-top-right-radius: 0; display:flex; justify-content:center; align-items:center;">${response.CentroTrabajo}</p>
                                                    </div>
                                                    <div class="Cajitas" style="width: 33%; height: 80px; border-radius: 2px; text-align:center;">
                                                        <p class="p-4" style="color: white; font-size: 17px; height: 32%; background-color:gray; margin:0; border-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Personal</p>
                                                        <p class="p-4" style="color: black; font-size: 17px; height: 75%; background-color: white; margin:0; border-radius: 5px; border-top-left-radius: 0; border-top-right-radius: 0; display:flex; justify-content:center; align-items:center;"><b>${response.TotalFinalizado}/${response.CantidadCentro}</b>&nbsp[${porcentaje2}%]</p>
                                                    </div>
                                                    <div class="Cajitas" style="background-color: white; color:white; width: 33%; height: 80px; border-radius: 2px; text-align:center">
                                                        <p class="" style="margin: 0; padding:2px; background-color: gray; border-top-left-radius: 5px; border-top-right-radius: 5px;font-size: 17px; height: 32%;">Riesgo</p>
                                                        <div class="p-4" style="background-color: white; color:white; width: 100%; height: 75%; border-radius: 5px; text-align:center; display:flex; flex-direction:column; align-items:center; justify-content:center">
                                                            <p style="color:black; font-size: 17px; margin:0; line-height:1;"><span style="background-color:#58AADF;padding: 2px 12px;">Nulo</span></p> 
                                                        </div>
                                                    </div>
                                            </div>`;
                    }

                    let IdCliente = document.getElementById("cliente").value;
                    let IdPeriodo = document.getElementById("periodo").value;

                    let htmlReportes = ` <div class="reportess" style="display: flex; justify-content:center; align-items:center; margin-bottom:15px; height:80px">
                                        <div class="Btns" style="text-align:end; width: 50%;">
                                            <a id="${response.IdCentro}" onClick="abrirPdf(${response.IdCentro},${IdCliente},${IdPeriodo})" class="btn" style="color:white; border-radius: 5px; width: 100%; height: 50px; font-size: 17px; display:flex; justify-content:center; align-items:center;"><p class="p_botones" style="width:90%; margin:0"><i class="fa fa-file-pdf-o fa-2x iconss" style=" color:rgb(255, 123, 0);" aria-hidden="true"></i></p></a>
                                        </div>
                                        <div class="Btns" style="text-align:end; width: 50%">
                                            <a id="btnDocumentos${index}" type="button" class="btn" style="color:white; border-radius: 5px; width: 100%; height: 50px; font-size: 17px; display:flex; justify-content:center; align-items:center;"><p class="p_botones" style="width:90%; margin:0"><i class="fa fa-file-text fa-2x iconss" style=" color:rgb(255, 123, 0);" aria-hidden="true"></i></p></a>
                                        </div>
                                    </div>`;


                        entornoLaboral.insertAdjacentHTML("beforeend", htmlEntornoLaboral);
                        reportes.insertAdjacentHTML("beforeend", htmlReportes);
                        cant = cant + parseInt(response.TotalFinalizado);

                        // let IdCliente = document.getElementById("cliente").value;
                        // let IdPeriodo = document.getElementById("periodo").value;
                        let IdServicio = servicioo[0].IdServicio;


                        if(quejas > 0){
                            document.getElementById('c-quejas').textContent = quejas;
                            var rutaQuejas = "{{ route('sugerencias',['idCliente'=>'cliente']) }}";
                            rutaQuejas = rutaQuejas.replace('cliente',IdServicio);
                            document.getElementById('btn-quejas').href = rutaQuejas;
                        }else{
                            document.getElementById('c-quejas').textContent = 0;
                            document.getElementById('btn-quejas').href = '#';
                        }
                        
                        var ruta = "{{ route('documentosNom035', ['id' => 'temp', 'id2' => 'periodo', 'id3' => 'cliente']) }}";
                        ruta = ruta.replace('temp',response.IdCentro);
                        ruta = ruta.replace('periodo',IdPeriodo);
                        ruta = ruta.replace('cliente',IdCliente);
                        document.getElementById(`btnDocumentos${index}`).href= ruta;
                }

                if( contador == (responsetama.length - 2)){
                    graficar(cant);
                }
            
            });

            let finalizadass = response[0].TotalPendiente;
            finalizadass = parseInt(finalizadass);
            graficarDistribucion(finalizadass,response[0].TotalSolicitado,sinInformacion,asignados);
        }
    });

    // function cargarDatos(){
    //     if( !localstorage.getItem('idcliente') && !localstorage.getItem('idcliente')) return;

    //     document.getElementById("cliente").value = localstorage.getItem('idcliente');
    //     document.getElementById("periodo").value = localstorage.getItem('idcliente');
    // }

    function abrirPdf(idcentro, idcliente, idperiodo ) {
        let ruta = "{{ route('pdfRiesgoEntorno',['id'=>'temp','id2'=>'periodo','id3'=>'centro'])}}"
        ruta = ruta.replace("temp",idcliente);
        ruta = ruta.replace("periodo",idperiodo);
        ruta = ruta.replace("centro",idcentro);
        window.location = ruta;
    }

    function limpiarStorage(){
        localStorage.removeItem('idCliente');
        localStorage.removeItem('periodo');
        localStorage.removeItem('fecha');
        localStorage.removeItem('cliente');
    }

    function localstorage(IdCliente,IdPeriodo,fecha,cliente){
        localStorage.setItem('idcliente', IdCliente);
        localStorage.setItem('periodo', IdPeriodo);
        localStorage.setItem('fecha', fecha);
        localStorage.setItem('cliente', cliente);
    }


    function habilitarDistribucion(response){
   
            var ids = document.getElementById("cliente").value;
            var idPeriodo = document.getElementById("periodo").value;

            var ruta = "{{ route('distribucion', ['id' => 'temp', 'id2' => 'periodo']) }}";
            ruta = ruta.replace('temp',ids);
            ruta = ruta.replace('periodo',idPeriodo);
            document.getElementById("iddistribucion").href = ruta;
            var rutaRiesgo ="{{ route('accionesNom035',['id' => 'temp', 'id2' => 'periodo']) }}";
            rutaRiesgo = rutaRiesgo.replace('periodo',idPeriodo);
            rutaRiesgo = rutaRiesgo.replace('temp',ids);
            document.getElementById("btnVer").href = rutaRiesgo;

            var rutaEntorno ="{{ route('accionesentornoNom035',['id'=>'cliente','id2'=>'periodo2'])}}";
            rutaEntorno = rutaEntorno.replace('cliente',ids);
            rutaEntorno = rutaEntorno.replace('periodo2',idPeriodo);
            document.getElementById("btnVer2").href = rutaEntorno;

            var rutaPdfFinal ="{{ route('pdfRiesgoGeneral',['idCliente'=>'cliente2','idperiodo'=>'periodo3'])}}";
            rutaPdfFinal = rutaPdfFinal.replace('cliente2',ids);
            rutaPdfFinal = rutaPdfFinal.replace('periodo3',idPeriodo);
            document.getElementById("btnReporteFinal").href = rutaPdfFinal;
      
    }

    const eliminar = () => {
        $('.riesgo').remove();
        $('.entornoL').remove();
        $('.reportess').remove();
    }

    function graficar(cant){
        
        let IdCliente = document.getElementById("cliente").value;
        let IdPeriodo = document.getElementById("periodo").value;
        let token = '{{csrf_token()}}';
        $.ajax({
            url: '{{ route('getGraficas') }}',
            type: "POST",
            data: {
                IdCliente:IdCliente,
                IdPeriodo:IdPeriodo,
                _token: token
            },
            success: function(response){
                totalEncuesta = response.data;
                graficarPastelEncuestaEntorno(response.data2[0].TotalFinalizados,totalEncuesta,response.data4,response.data5);
                graficarPastelEncuesta(response.data3[0].TotalFinalizados,totalEncuesta,response.data4,response.data6);
            },
            error: function( e ) {
                console.log(e);
            }
        });
    }

    const optionplugnormal = {		
        color: 'white',
        font: {
            weight: 'bold',
            size:15
        }								
    };

    function graficarPastelEncuesta(cant,totalEncuesta,sinInformacion,abiertas){

        let lugarGrafica = document.getElementById('graficar');
        let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas style="width:100%" id="tipopuestoChart" ></canvas></div>`;
        lugarGrafica.innerHTML = grafica;

        var ctxtotServMes = document.getElementById('tipopuestoChart').getContext('2d');
        var totServMChart = new Chart(ctxtotServMes, {
            type: 'bar',
            data: {
                labels: [
                    'Cerradas',
                    'Abiertas'
                ],
                datasets: [{
                    label: 'Total Encuestas',
                    data:[cant,abiertas],
                    backgroundColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
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
                        },
                        display: false
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "white",
                            color: '#fff',
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


    function graficarDistribucion(pendiente,solicitadas,sinInformacion,asignados){

        let lugarGrafica = document.getElementById('graficar2');
        let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas style="width:100%" id="distribucion-soli" ></canvas></div>`;
        lugarGrafica.innerHTML = grafica;


        var ctxSolicitadas = document.getElementById('distribucion-soli').getContext('2d');
        var totServSolicitadas = new Chart(ctxSolicitadas, {
            type: 'bar',
            data: {
                labels: [
                    'Solicitados',
                    'Asignados',
                    'Sin información'
                ],
                datasets: [{
                    label: 'Total Encuestas',
                    data:[solicitadas,asignados,sinInformacion],
                    backgroundColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
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
                        },
                        display: false
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "white",
                            color: '#fff',
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

    function graficarPastelEncuestaEntorno(cant,totalEncuesta,sinInformacion,abiertas){

        let lugarGrafica = document.getElementById('graficarEntorno');
        let grafica = `<div id="container-totalServiciosChart" class="container-data" style="display:block;"><canvas style="width:100%" id="totalEncuestas" ></canvas></div>`;
        lugarGrafica.innerHTML = grafica;

        var ctxtotEncuestas = document.getElementById('totalEncuestas').getContext('2d');
        var totServEncuestas = new Chart(ctxtotEncuestas, {
            type: 'bar',
            data: {
                labels: [
                    'Cerradas',
                    'Abiertas'
                ],
                datasets: [{
                    label: 'Total Encuestas',
                    data:[cant,abiertas],
                    backgroundColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
                    borderColor: [
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                        '#05AB9E',
                        '#09A4DE',
                        '#07F5E1',
                        '#F56520',
                        '#EDF514',
                    ],
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
                        },
                        display: false
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "white",
                            color: '#fff',
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

     
</script>

@endsection
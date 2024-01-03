@extends('layouts.masterMenuView')

@section('section')

<div class="content">

    <ol class="breadcrumb ">

    <li><a href="{{ route('sig-erp-ese::catalogosese.index') }}">Catálogos ESE</a></li>

		<li><a href="{{ url('CatalogoInvestigadores') }}">Catálogo de Investigadores</a></li>

		<li>Alta Investigador</li>

    </ol>

    <h1 class="page-header text-center">Investigador <small>Alta</small></h1>



	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">

        <div class="panel-heading">

            <div class="panel-heading-btn">

                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>

                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>

            </div>

            <h4 class="panel-title">Investigador <small>Alta</small></h4>

        </div>

        <div class="panel-body">

            {!! Form::open(

            ['url'=>['GCreate'],

            'id'=>'form-alta-empleados','method'=>'POST', 'files'=>'true','enctype'=>'multipart/form-data'])

            !!}

                @include('ESE.catalogos.empleadoscreate')

            {!! Form::close() !!}



   </div>

 </div>

@endsection

@section('js-base')

@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')

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

  {!! Html::script('assets/js/loadingButton/loadingbutton.js') !!}

  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script language="javascript" src="jquery.js"></script>

    <script language="javascript" src="jquery-ui-personalized-1.6rc6.min.js"></script>



	 <script type="text/javascript">









   function visualizar(){

     let option = $("#id_mostrar").val();

     if(option==0){

       var password1 = document.getElementById("Password");

       password1.type = "text";

       $("#id_mostrar").val('1');

       $("#icon-pass").removeClass("glyphicon-eye-open");

       $("#icon-pass").addClass("glyphicon-eye-close");

     }else{

       var password1 = document.getElementById("Password");

       password1.type = "password";

       $("#id_mostrar").val('0');

       $("#icon-pass").removeClass("glyphicon-eye-close");

       $("#icon-pass").addClass("glyphicon-eye-open");



     }





   }





    function hacer_click_Empleados(event){

      // event.preventDefault();

      // var validate = validateInputs();

      //   var IdRol = $("#IdRol").val();

      //   var catalogoSeleccionado = $("#catalogoSeleccionado").val();

      //   var usuario="";

      //   if(catalogoSeleccionado == "CatalogoAnalistas"){

      //     usuario = $("#usuarios").val();

      //   }

        var arr = $("#TableMunicipiosSelect tbody tr").map(function() {

          var row = $(this)[0];

          arr = [`${row.cells[0].textContent}-${row.cells[1].textContent}`];

          return arr;

        }).get();

        $('#TableMunicipiosSelectV').val(arr);

        // console.log('arr: '+ $('#TableMunicipiosSelectV').val());

        // var datos = $("#form-alta-empleados").serialize();

        // var token = $('meta[name="csrf-token"]').attr('content');

        // if(validate && arr.length > 0){

        //   loaderButton("saveInformation",true);

        //   $.ajax({

        //       headers: {'X-CSRF-TOKEN':token},

        //       url:'{{ url('GCreate') }}',

        //       type:'POST',

        //       data: {

        //               datos:datos,

        //               arr:arr,

        //               catalogoSeleccionado:catalogoSeleccionado,

        //               usuario:usuario

        //             },

        //       success: function(response){

        //         loaderButton("saveInformation",false);

        //           if(IdRol==4){

        //             if(response.status_alta == "success"){

        //               swal({

        //                   title: "<h3>¡ El investigador se guardo con éxito !</h3> ",

        //                   html: true,

        //                   type: "success"



        //               });

        //             }else if(response.status_alta == "error"){

        //               swal(`Disculpe, existió un problema ${response.message}`);

        //             }



        //               location.href = '{{ url("CatalogoInvestigadores") }}';

        //           }else{

        //                   swal({

        //                       title: "<h3>¡ El analista se guardo con éxito !</h3> ",

        //                       html: true,

        //                       type: "success"



        //                   });

        //               location.href = '{{ url("CatalogoAnalistas") }}';

        //           }

        //       },

        //       error : function(jqXHR, status, error) {

        //         loaderButton("saveInformation",false);

        //           swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');

        //       }

        //   });

        // }else{

        //   swal({

        //       title: "Verifique lo siguiente:<br>1.- Campos requeridos,<br>2.- Que tenga por lo menos un municipio asignado el investigador",

        //       html: true,

        //       type: "warning"

        //   });

        // }

    }



    </script>



<script type="text/javascript">



    var mostrarValor = function(x){

        if(x==98){

            $('[href="#DatosBancarios"]').closest('li').hide();

            $('[href="#RegionesxInvestigador"]').closest('li').hide();

            $('#SiguienteDoctos').show();

            $('#SigDocto').hide();

        }

        if(x==4){

            $('[href="#DatosBancarios"]').closest('li').show();

            $('[href="#RegionesxInvestigador"]').closest('li').show();

            $('#SiguienteDoctos').hide();

            $('#SigDocto').show();

        }

        // console.log("x: "+x);

    };



    //PARA TABLAS//

    $(".sortable").sortable({

            connectWith: ".sortable",

            placeholder: "ui-state-highlight",

            helper: function(e, tr)

            {

                var $originals = tr.children();

                var $helper = tr.clone();

                $helper.children().each(function(index)

                {

                    // Set helper cell sizes to match the original sizes

                    $(this).width($originals.eq(index).width());

                });

                $helper.css("background-color", "rgb(223, 240, 249)");

                return $helper;

            }

    });

    $("#sortable").disableSelection();



    //FIN TABLAS///



    $(document).ready(function(){

      $('.tab').click(function(){

          var tab=$(this).attr('href');

          var tabA=tab.replace('#', '');

          $('.nav-tabs a[href="' + tab + '"]').tab('show');

          $('#active_tab').val(tabA);

      });



        $('#SiguienteDoctos').hide();

        $('#SigDocto').show();



        $('.continue').click(function(){

        $('.nav-tabs > .active').next('li').find('a').trigger('click');

        });

        $('.back').click(function(){

        $('.nav-tabs > .active').prev('li').find('a').trigger('click');

        });



        var IdRol = $("#IdRol").val();



       $('#TRegSelect').DataTable({

          "bProcessing": true,

          "destroy": true,

          "bPaginate":   false,

          "bFilter": false,

          "bLengthChange": false, 

          "bInfo": false, 

          "ordering": false,

          // "columnDefs": [{"targets": [ 0 ],"visible": false}],

          "sEmptyTable":     "",

          "language": {

            "sEmptyTable": ' ',

            "zeroRecords": ' ',

            "sInfoEmpty":'',

          }

        });

    

        $("#fotografiaPDF").on("change", function () {

          $("#fotock").attr('checked','checked');

        });

        $("#referenciasPDF").on("change", function () {

          $("#Referencias_pdfck").attr('checked','checked');

        });

        $("#convenioPDF").on("change", function () {

          $("#Convenio_pdfck").attr('checked','checked');

        });

        $("#actaPDF").on("change", function () {

          $("#Acta_pdfck").attr('checked','checked');

        });

        $("#inePDF").on("change", function () {

          $("#Ine_pdfck").attr('checked','checked');

        });

        $("#pasaportePDF").on("change", function () {

          $("#Pasaporte_pdfck").attr('checked','checked');

        });

        $("#curpPDF").on("change", function () {

          $("#Curp_pdfck").attr('checked','checked');

        });

        $("#rfcPDF").on("change", function () {

          $("#Rfc_pdfck").attr('checked','checked');

        });

        $("#cvPDF").on("change", function () {

          $("#Cv_pdfck").attr('checked','checked');

        });

        $("#comprobantePDF").on("change", function () {

          $("#Comprobante_pdfck").attr('checked','checked');

        });

        $("#nssPDF").on("change", function () {

          $("#Nss_pdfck").attr('checked','checked');

        });

        $("#cuentabancariaPDF").on("change", function () {

          $("#CuentaBancaria_pdfck").attr('checked','checked');

        });

        $("#documentosextrasPDF").on("change", function () {

          $("#DocumentoExtra_pdfck").attr('checked','checked');

        });

       



    });



  $(document).on('change','input[type="file"]',function(){

  // this.files[0].size recupera el tamaño del archivo

  // alert(this.files[0].size);



    var fileName = this.files[0].name;

    var fileSize = this.files[0].size;



    if(fileSize > 3000000){

      alert('El archivo no debe superar los 3MB');

      this.value = '';

      this.files[0].name = '';

    }else{

      // recuperamos la extensión del archivo

      var ext = fileName.split('.').pop();



      // Convertimos en minúscula porque

      // la extensión del archivo puede estar en mayúscula

      ext = ext.toLowerCase();



      // console.log(ext);

      switch (ext) {

        case 'jpg':

        case 'jpeg':

        case 'png':

        case 'pdf': break;

        default:

          alert('El archivo no tiene la extensión Adecuada');

          this.value = ''; // reset del valor

          this.files[0].name = '';

      }

    }

  });



function PreviewImage() {

  $('#viewer').attr('src','');

	pdffile=document.getElementById("fotografiaPDF").files[0];

	pdffile_url=URL.createObjectURL(pdffile);

  $('#viewer').replaceWith( "<img id='viewer' style='width:100%;height:400px;object-fit: contain;' />" );

	$('#viewer').attr('src',pdffile_url);

}



function visualizar_PDF(id,campo) {

  $('#viewer').attr('src','');

	pdffile=document.getElementById(id).files[0];

	pdffile_url=URL.createObjectURL(pdffile);

  $('#viewer').replaceWith( "<iframe id='viewer' frameborder='0' scrolling='no' width='565' height='500'></iframe>");

	$('#viewer').attr('src',pdffile_url);

}





function searchCP(){

  $("#alerta-cp").html('<label style="color:#ff9100; font-size:18px;">	buscando Codigo Postal..</label>');



  var token = $('meta[name="csrf-token"]').attr('content');

  let cp = $("#searchcp").val();

  var datos;

  var colonias;

  var items;

  $.ajax({

      headers: {'X-CSRF-TOKEN':token},

      url:'{{ url('Empleados_search_cp') }}',

      type:'POST',

      dataType: 'json',

      data: {cp:cp},

      success: function(response){

        datos = response.result.split("|");

        $("#State").val(datos[3]);

        $("#IdEstado").val(datos[2]);

        $("#IdPais").val(datos[1]);

        $("#Localidad").val(datos[7]);

        $("#IdCodigoPostal").val(datos[0]);

        $("#municipio").val(datos[5]);

        $("#Colonia option").remove();

        colonias = datos[8].split(";");

        for (var i = 0; i < colonias.length; i++) {

           items+='<option value="'+colonias[i]+'">'+colonias[i]+'</option>'

        }

        $("#Colonia").prepend(items);

        $("#alerta-cp").html('');

        

        // $.each(response.regiones, function(index, value){

        //     llenar(response.regiones, index, value);

        // });



      },

      error : function(jqXHR, status, error) {

        $("#alerta-cp").html('');

      }



  });



}



function llenar(response, index, value){     

  var oTable = $('#TablaRegiones').DataTable({

  "bProcessing": true,

  "destroy": true,

  "paging":   false,

  "bFilter": false,

  "bInfo": false,

  "ordering": false, 

  "data": response,

  "columns":[

      // {"data": "IdRegion"},

      {"data": "Descripcion"},

  ],

  // "aoColumnDefs": [{ "bVisible": false, "aTargets": [0] }],

  retrieve: true,

  // dom: 'Blfrtip',

      "language": {

        "sProcessing":     "",

        "sLengthMenu":     "Mostrar _MENU_ registros",

        "sZeroRecords":    "No se encontraron resultados",

        "sEmptyTable":     "Ningún dato disponible en esta tabla",

        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",

        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",

        "sInfoPostFix":    "",

        "sSearch":         "Buscar:",

        "searchPlaceholder": "Escribe aquí para buscar..",

        "sUrl":            "",

        "sInfoThousands":  ",",

        "sLoadingRecords": "<img style='display: block;width:100px;margin:0 auto;' src='assets/img/loading.gif' />",

        "oPaginate": {

          "sFirst":    "Primero",

          "sLast":     "Último",

          "sNext":     "Siguiente",

          "sPrevious": "Anterior"

        },

        "oAria": {

          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",

          "sSortDescending": ": Activar para ordenar la columna de manera descendente"

        }

      }

  });



}

  $("#estados").on("change",function(){

    getMunicipios($("#estados").val());

  });

  const getMunicipios = (IdEstado) => {

      $.ajax({

        url: `{{ url('getMunicipios') }}/${IdEstado}`,

        type: "GET",

        success: function(response){

          // llenar(response.data,0,0);

          removeAllRowTable("TablaMunicipios");

          addRowTable(response.data);

          if(response.data.length > 0){

            $("#btnAddMunicipio").show();

          }else{

            $("#btnAddMunicipio").hide();

          } 

        }

      });

  }

  const addRowTable = (response) => {

    response.forEach(element => {

      var table=document.getElementById("TablaMunicipios");

      var tbody=document.getElementById("tbBody");

      

      var row1 = document.createElement("TR");

      var col1=document.createElement("TD");

      var col2=document.createElement("TD");

      var col3=document.createElement("TD");

      var col4=document.createElement("TD");

      

      col1.innerHTML = `<input type="checkbox" class="checkboxMunicipio">`;

      col2.innerHTML = `${element.IdEstado}`;

      col3.innerHTML = `${element.IdMunicipio}`;

      col4.innerHTML = `${element.Descripcion}`;

      col1.className += "text-center";

      col2.style.display = "none";

      col3.style.display = "none";



      row1.appendChild(col1);

      row1.appendChild(col2);

      row1.appendChild(col3);

      row1.appendChild(col4);

      tbody.appendChild(row1);

      table.appendChild(tbody);

    });

  }

  const removeAllRowTable = (nameId) => {

    document.querySelectorAll(`#${nameId} tbody tr`).forEach(function(e){e.remove()})

  }

  const checkAll = (o) => {

    var boxes = document.getElementsByTagName("input");

    for (var x = 0; x < boxes.length; x++) {

      var obj = boxes[x];

      var className = obj.classList[0];

      if (obj.type == "checkbox" && className == "checkboxMunicipio") {

        if (obj.name != "check")

          obj.checked = o.checked;

      }

    }

  }



  const movedataTable = (e) => {

    e.preventDefault();

    var table=document.getElementById("TableMunicipiosSelect");

    var tbody=document.getElementById("tbBodyMunicipiosSelect");

    

    // para cada checkbox "chequeado"

    $("input[type=checkbox]:checked").each(function(){

      var data = [];

      // buscamos el td más cercano en el DOM hacia "arriba"

      // luego encontramos los td adyacentes a este

      $(this).closest('td').siblings().each(function(){

        // obtenemos el texto del td 

        data.push($(this).text());

      });

      // eliminamos la fila

      if($(this).closest('td').length > 0){

        $(this).closest('td')[0].parentNode.remove();

      }

      if(data.length > 0){

        var row1 = document.createElement("TR");

        var col1=document.createElement("TD");

        var col2=document.createElement("TD");

        var col3=document.createElement("TD");

        var col4=document.createElement("TD");



        col1.innerHTML = `${data[0]}`;

        col2.innerHTML = `${data[1]}`;

        col3.innerHTML = `${data[2]}`;

        col4.innerHTML = `<button class="btn btn-sm btn-danger removeRow" onclick="removeRowTable(this)">Eliminar</button>`;



        col1.style.display = "none";

        col2.style.display = "none";

        col4.className += "text-center";



        row1.appendChild(col1);

        row1.appendChild(col2);

        row1.appendChild(col3);

        row1.appendChild(col4);

        tbody.appendChild(row1);

        table.appendChild(tbody);

      }

    });

    var check = document.getElementById("all-selected");

    if(check.checked){

      check.checked = false;

    }

    

  }



  const removeRowTable = (t) => {

    var td = t.parentNode;

    var tr = td.parentNode;

    var table = tr.parentNode;

    table.removeChild(tr);

  }

  const removeAllRowTableMunicipiosSelect = (event) => {

    event.preventDefault();

    removeAllRowTable("TableMunicipiosSelect");

  }



  const validateInputs = () => {

    var correct = 0;

    const inputs = {

      Nombre: false,

      ApellidoPaterno: false,

      // ApellidoMaterno: false,

      TelefonoMovil: false,

      Usuario: false,

      Password: false,

      Email: false

    }

    const nameInputs = ["Nombre",

                        "ApellidoPaterno",

                        // "ApellidoMaterno",

                        "TelefonoMovil",

                        "Usuario",

                        "Password",

                        "Email"

                        ];

    nameInputs.forEach(element => {

      if(document.getElementsByName(`${element}`)[0].value != ""){

        inputs[element] = true;

        document.getElementsByName(`${element}`)[0].style.borderColor = "#ccd0d4";

      }else{

        inputs[element] = false;

        document.getElementsByName(`${element}`)[0].style.borderColor = "red";

      }

    });

    nameInputs.forEach(element => {

      if(!inputs[element]){

        correct++;

      }

    });

    return (correct > 0) ? false : true;

  }



  const createElementValidateError = (id,message) => {

    if(document.getElementById(`error_${id}`))

        document.getElementById(`error_${id}`).remove();

    const input = document.querySelector(`#${id}`);

    const div = document.createElement("div");

    div.textContent = `${message}`; 

    div.style.color = "red"; 

    div.id = `error_${id}`;

    input.insertAdjacentElement("afterend", div);

  }



  const validarEmail = (valor) => {

    emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    if (emailRegex.test(valor.value)){

      if(document.getElementById(`error_${valor.id}`))

        document.getElementById(`error_${valor.id}`).remove();

        existEmail(valor);

    }else{

      createElementValidateError(valor.id,"La dirección de email es incorrecta");

    }

  }



  const existEmail = (input) => {

    if(input.value != ""){

        $.ajax({

          url: `{{ url('existEmailInvestigator') }}/${input.value}`,

          type: "GET",

          success: function(response){

            if(response.status == "success"){

              if(response.existEmail){

                createElementValidateError(input.id,"El email ya existe");

              }else{

                if(document.getElementById(`error_${input.id}`))

                    document.getElementById(`error_${input.id}`).remove();    

              }   

            }

          },

          error: function(){ }

      });      

    }

  }



  const existUsername = (input) => {

    if(input.value != ""){

        $.ajax({

          url: `{{ url('existUsernameInvestigator') }}/${input.value}`,

          type: "GET",

          success: function(response){

            if(response.status == "success"){

              if(response.existUsername){

                createElementValidateError(input.id,"El usuario ya existe");

              }else{

                if(document.getElementById(`error_${input.id}`))

                    document.getElementById(`error_${input.id}`).remove();    

              }   

            }

          },

          error: function(){

            createElementValidateError(input.id,"Ocurrió un error al buscar el usuario");

           }

      });      

    }

  }  

</script>

@endsection


@extends('layouts.masterMenuView')
@section('section')

<div class="content">
<ol class="breadcrumb ">
  <li><a href="{{ route('sig-erp-ese::catalogosese.index') }}">Catálogos ESE</a></li>
  <li><a href="{{ url('CatalogoInvestigadores') }}">Catálogo de Investigadores</a></li>
		<li>Edición Investigador</li>
   </ol>
<h1 class="page-header text-center">Investigador <small>Edición</small></h1>

	<div class="panel panel-inverse" data-sortable-id="ui-widget-14">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            </div>
                            <h4 class="panel-title">Investigador <small>Edición</small></h4>
                        </div>
                        <div class="panel-body">
                       {!! Form::model($IdEmpleado,
                        ['route'=>['sig-erp-ese::CatalogoEmpleados.update',$IdEmpleado],
                        'id'=>'form-edit-empleados','method'=>'PUT', 'files'=>'true','enctype'=>'multipart/form-data'])
                        !!}
                          <input type="hidden" value="{{$IdEmpleado}}" name="IdEmpleado" id="IdEmpleado">
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



     <script type="text/javascript">

     var path= "../../uploads/";

     var mostrarValor = function(x){
        if(x==98){
            $('[href="#DatosBancarios"]').closest('li').hide();
            $('#SiguienteDoctos').show();
            $('#SigDocto').hide();
        }
        if(x==4){
            $('[href="#DatosBancarios"]').closest('li').show();
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
        if(IdRol==98){
            $('[href="#DatosBancarios"]').closest('li').hide();
            $('#SiguienteDoctos').show();
            $('#SigDocto').hide();
        }
        if(IdRol==4){
            $('[href="#DatosBancarios"]').closest('li').show();
            $('#SiguienteDoctos').hide();
            $('#SigDocto').show();
        }

        let codcp = $("#searchcp").val();
        let inv = $("#num_iddb").val();
       
        Regiones(codcp,inv);
        RegionesSelect(inv);

        $('#form-edit-empleados').submit(function() {
            var arr = $("#TRegSelect tbody tr").map(function() {
            var row = $(this)[0];
            arr = [row.cells[0].textContent,];
              return arr;
            }).get();

            $.ajax({
              url: '{{ url('UpdateRegiones') }}',
              type:'GET',
              data: {arr:arr,inv:inv},
              success: function(response){
                console.log("ig: "+response[0]+" Nig: "+response[1]+" id region inv: "+JSON.stringify(response[2]));
              }
            });

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
       // $('#viewer').attr('src','');
     	pdffile=document.getElementById("fotografiaPDF").files[0];
      if(pdffile == undefined){
        pdffile= $("#foto").val();
        pdffile = (pdffile == '')? 'default.pdf': pdffile;
        $('#viewer').replaceWith( "<img id='viewer' style='width:100%;height:400px;object-fit: contain;' />" );
        $('#viewer').attr('src',path+pdffile); 
       
      }else{
        pdffile_url=URL.createObjectURL(pdffile);
        $('#viewer').replaceWith( "<img id='viewer' style='width:100%;height:400px;object-fit: contain;' />" );
        $('#viewer').attr('src',pdffile_url);
        
      }

     }
     function visualizar_PDF(id,campo) {
       $('#viewer').attr('src','');
     	pdffile=document.getElementById(id).files[0];
      if(pdffile == undefined){
        pdffile= $("#"+campo).val();
        pdffile = (pdffile == '')? 'default.pdf': pdffile;
        $('#viewer').replaceWith( "<iframe id='viewer' frameborder='0' scrolling='no' width='565' height='500'></iframe>");
        $('#viewer').attr('src',path+pdffile);
        
      }else{
        pdffile_url=URL.createObjectURL(pdffile);
        $('#viewer').replaceWith( "<iframe id='viewer' frameborder='0' scrolling='no' width='565' height='500'></iframe>");
        $('#viewer').attr('src',pdffile_url);
      }
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
           },
           error : function(jqXHR, status, error) {
             $("#alerta-cp").html('');
           }

       });

     }

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

    function Regiones(cp,Investigador){
      var token = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
          headers: {'X-CSRF-TOKEN':token},
          url:'{{ url('Empleados_search_regE') }}',
          type:'POST',
          dataType: 'json',
          data: {cp:cp,Investigador:Investigador},
          success: function(response){
            $.each(response.regiones, function(index, value){
                llenar(response.regiones, index, value);
            });

          },
          error : function(jqXHR, status, error) {
            
          }

      });

    }

    function RegionesSelect(Investigador){
      var token = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
          headers: {'X-CSRF-TOKEN':token},
          url:'{{ url('Empleados_search_regS') }}',
          type:'POST',
          dataType: 'json',
          data: {Investigador:Investigador},
          success: function(response){
            let cr=response.regiones.length;
            if(cr==0){
                $('#TRegSelect').DataTable({
                  "bProcessing": true,
                  "destroy": true,
                  "bPaginate":   false,
                  "bFilter": false,
                  "bLengthChange": false, 
                  "bInfo": false, 
                  "ordering": false,
                  "sEmptyTable":     "",
                  "language": {
                    "sEmptyTable": ' ',
                    "zeroRecords": ' ',
                    "sInfoEmpty":'',
                  }
                });
            }else{
              $.each(response.regiones, function(index, value){
                llenarRS(response.regiones, index, value);
              });
            }
            

          },
          error : function(jqXHR, status, error) {
            
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
           {"data": "IdRegion"},
           {"data": "Region"},
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

function llenarRS(response, index, value){
       
       var oTable = $('#TRegSelect').DataTable({
        "bProcessing": true,
       "destroy": true,
       "paging":   false,
       "bFilter": false,
       "bInfo": false,
       "ordering": false, 
       "data": response,
       "columns":[
           {"data": "IdRegion"},
           {"data": "Region"},
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


// $('#form-edit-empleados').submit(function() {
//   var arr = $("#TableMunicipiosSelect tbody tr").map(function() {
//       var row = $(this)[0];
//       arr = [`${row.cells[0].textContent}-${row.cells[1].textContent}`];
//       return arr;
//     }).get();
//     console.log('arr: '+arr);
//     $('#TableMunicipiosSelectV').val(arr);
//     console.log($('#TableMunicipiosSelectV').val());
// });

  function hacer_click_Empleados(event){
    // event.preventDefault();
    // var validate = validateInputs();
    // var Id = $("#IdEmpleado").val();
    // var IdRol = $("#IdRol").val();
    // var catalogoSeleccionado = $("#catalogoSeleccionado").val();
    // var usuario="";
    // if(catalogoSeleccionado == "CatalogoAnalistas"){
    //   usuario = $("#usuarios").val();
    // }
    var arr = $("#TableMunicipiosSelect tbody tr").map(function() {
          var row = $(this)[0];
          arr = [`${row.cells[0].textContent}-${row.cells[1].textContent}`];
          return arr;
        }).get();
        $('#TableMunicipiosSelectV').val(arr);
        // console.log('arr: '+ $('#TableMunicipiosSelectV').val());
    // var datos = $("#form-edit-empleados").serializeArray();

    // var token = $('meta[name="csrf-token"]').attr('content');
    // if(validate){
    //   loaderButton("saveInformation",true);
    //   $.ajax({
    //       headers: {'X-CSRF-TOKEN':token},
    //       url: `{{ url('updateEmpleado') }}`,
    //       type:'POST',
    //       async: true,
    //       data: {
    //               datos:formData,
    //               arr:arr,
    //               catalogoSeleccionado:catalogoSeleccionado,
    //               usuario:usuario,
    //               id: Id
    //             },
    //       success: function(response){
    //         console.log(response[0]);
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

    //               // location.href = '{{ url("CatalogoInvestigadores") }}';
    //           }else{
    //                   swal({
    //                       title: "<h3>¡ El analista se guardo con éxito !</h3> ",
    //                       html: true,
    //                       type: "success"

    //                   });
    //               location.href = '{{ url("CatalogoAnalistas") }}';
    //           }
    //       },
    //       cache: false,
    //       contentType: false,
    //       processData: false,
    //       error : function(jqXHR, status, error) {
    //         loaderButton("saveInformation",false);
    //         swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
    //       }
    //   });
    // }else{
    //       swal({
    //           title: "Campos vacíos, por favor verifique los campos requeridos",
    //           html: true,
    //           type: "warning"
    //       });
    // }
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
  const deleteMucipioAsignado = (id,IdEmpleado) => {
    $.ajax({
      url: `{{ url('deleteMunicipioAsignado') }}/${id}/${IdEmpleado}`,
      type: 'GET',
      success: function(response){
        if(response.status == "success"){
          var tbody = document.getElementById("tbodyMunicipiosAsignados");
          tbody.innerHTML = "";
          tbody.innerHTML = response.tbody;
          swal({
                    title: "<h3>¡ Se elimino el Municipio !</h3> ",
                    html: true,
                    type: "success"

                });
        }else{
          swal(`Disculpe, existió un problema, ${response.message}`);
        }
      },
      error: function(jqXHR, status, error) {
            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo '+error);
      }
    });
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

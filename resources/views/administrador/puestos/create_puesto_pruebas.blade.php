@extends('layouts.masterMenuView')

@section('estilos')



{!! Html::style('assets/css/bootstrap-duallistbox.css') !!}
{!! Html::style('assets/permisos/ui.fancytree.min.css') !!}





@endsection
@section('section')
<!doctype html>
<html lang="es">
<head>
    <style type="text/css">

/* table { border-collapse: collapse; }
table td, table th { border: 1px solid black; padding: 5px; } */
    </style>  
</head>
<div id="content" class="content">

	<ol class="breadcrumb ">
        <li><a href="javascript:;">Administrador</a></li>
		<!-- <li><a href="{{ url('modulo/administrador/cuentas') }}">Cuentas</a></li> -->
		<li><a href="{{ route('sig-erp-crm::modulo.administrador.puestos.index') }}">Permisos</a></li>
		<li><a href="javascript:;">Alta permiso</a></li>

	</ol>


	<!-- begin page-header -->
	<h1 class="page-header text-center">Permiso <small>Configuración de permisos </small></h1>
	<!-- end page-header -->
	<div class="row">
		<div class="col-md-12 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="ui-widget-1">
		        <div class="panel-heading">
		            <div class="panel-heading-btn">
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		            </div>
		            <h4 class="panel-title text-center">Permisos</h4>
		        </div>
		        <div class="panel-body">
		        	<div class="alert alert-info">
                        <h4><i class="fa fa-info-circle fa-lg"></i> Asignación de permisos</h4>



                    </div>
                    @if (Session::has('mensaje'))
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-{{ session('type') }} fade in m-b-15">
                                        {{ session('mensaje') }}
                                        <span class="close" data-dismiss="alert">×</span>
                                    </div>
                                </div>
                            </div>
                    @endif
		            <div class="row">
                        
						<div class="jumbotron">
                        
                            <div class="form-group">
                                <label class="col-xs-1">Asignar</label>
                                <div class="col-xs-3">
                                    <select class="form-control" name="permisosVista" id="permisosVista" >
                                        <option value="permisosESE">Permisos ESE</option>
                                        <option value="permisosNomina">Permisos Nómina</option>
                                    </select>
                                </div>
                            </div>
                            <hr></hr>
                        
                                {!! Form::open([
                                                'route'  => 'sig-erp-crm::modulo.administrador.puestos.store',
                                                'method' => 'post',
                                                'class'  => 'form-horizontal',
                                                'id' 	 => 'create-puesto-frm'])


                                !!}
                                            @include('administrador.puestos.puesto_formulario')
                                {!! Form::close() !!}
                          
                                
                                {!!Form::open([
                                    'route' => 'sig-erp-crm::modulo.administrador.perfil.store',
	                                'method' => 'post',
                                    'id' 	 => 'create-permisosNom-frm'])
                                !!}
                                    @include('administrador.puestos.permisosnomina')
                                {!! Form::close() !!}
                               
						</div>

		            </div>

		        </div>
		    </div>
		</div>
	</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

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
    
	{!! Html::script('assets/js/jquery.bootstrap-duallistbox.js') !!}
	{!! Html::script('assets/permisos/jquery.fancytree.js') !!}

     <script type="text/javascript">
    

	$(document).ready(function(){
        $("#create-permisosNom-frm").hide();

        setTimeout(function() {
                    $("#alertDanger").fadeOut();
        },5000);
        t();
        menus();
    	iniciarTabla();

    	permisos.init();

    	aliasPuesto();
    	arbolPermisos();
        //arbolPermisoNomina();
    	$('#create-puesto').click(function(event){
    		event.preventDefault();
    		var tree 		 = $('#tree').fancytree('getTree');
    		var str_permisos = '';
    		var contador 	 = 0;


            nodosPadres      = getAllNodesParents( tree.getSelectedNodes() );
            listaNodosHijos  = getAllNodes( tree.getSelectedNodes() );
            listaNodosPadres = [];

            $.each(nodosPadres,function( k,v ){
                listaNodosPadres.push( getNodeParent(v) );
            });

            listaNodos = listaNodosHijos.concat( listaNodosPadres.unique() );


            str_permisos = listaNodos.join("||");

    		$('#lista_permisos').val(str_permisos);
            console.log(str_permisos);

    		$('#create-puesto-frm').submit();

    	});

        $('#GuardarPerfilM').click(function(event){
    		event.preventDefault();
            $('#create-permisosNom-frm').submit();
    	});

        //INICIO CAMBIAR VISTA PERMISOS//
        $(function() { //
            $('#permisosVista').change(function() { 
                    var value = $(this).val();
                    if (value == 'permisosESE') { 
                        $("#create-puesto-frm").show();
                        $("#create-permisosNom-frm").hide();
                    }
                    else {
                        $("#create-puesto-frm").hide();
                        $("#create-permisosNom-frm").show();
                    }
            }).change(); // And invoke first time
        }); 

       
        //FIN CAMBIAR VISTA PEMRISOS//

    //INICIO PERFILES//
        $(function(){
            // $("#perfiles").change(function(){
                // var Idperfil = $("#perfiles option:selected").val();
                var Idperfil = $("#perfiles").val();
                // console.log("Idperfil: "+Idperfil);
                $.ajax({
                    type: "GET",
                    url: "{{ url('modulos/perfiles') }}",
                    data: {id:Idperfil},
                    success: function(response){
                        $.each(response, function(index, value){
                            llenar(response, index, value);
                        });

                    },
                });
            // });
        });
        $("#perfiles").on("change", perfilesM);

        var perfilesM = function(Idperfil){    

            var Idperfil = $("#perfiles").val();
            //  var Idperfil = $("#perfiles").val();
            $.ajax({
                    url:'{{ url("modulos/perfiles") }}',
                    type:'get',
                    dataType:"json",
                    data: {id:Idperfil},
                    success:function(response){
                        $.each(response, function(index, value){
                                llenar(response, index, value);
                        });

                    }
            });
        }
    //FIN PERFILES//

    //INICIO GUARDAR PERFIL
    

    //FIN GUARDAR PERFIL


});

    function llenar(response, index, value){
       
        var oTable = $('#TablaEntradas').DataTable({
            "bProcessing": true,
            "destroy": true,
            "paging":   false,
            "bFilter": false,
            "bInfo": false,
            "ordering": false, 
            "data": response.agrupador,
            "columns":[
                {    
                   "data": "IdModulo",
                   "className": " text-center hidden",
                    "orderable": false,
                    "defaultContent": "",
                    "render": function (data) {
                        // return '<tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-1" aria-expanded="false" aria-controls="group-of-rows-1"><td class="text-center"><i class="fa fa-plus" aria-hidden="true"></i><input type="hidden" name="IdModulo" value="'+data+'"></td>';
                        return '<tr><td class="text-center"><input type="checkbox" class="form-check-input" name="IdModulo[]" value="'+data+'"></td></tr>';    
                    }
                },
                {
                    "className": "text-center hidden",
                    "data":"NombreForm",
                    "render": function (data) {
                        return '<td class="text-center hidden"><input type="hidden" name="NombreForm[]" value="'+data+'">'+data+'</td>';
                        
                    }
                },
                {
                    "className": "replyClass text-center hidden",
                    "data":"NombreGrupo",
                    "render": function (data) {
                        return '<td class="text-center hidden"><input type="hidden" name="NombreGrupo[]" value="'+data+'">'+data+'</td>';
                        
                    }
                },
               {    
                   "data": "IdModulo",
                   "className": "details-control text-center",
                    "orderable": false,
                    "defaultContent": "",
                    "render": function (data) {
                        // return '<tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-1" aria-expanded="false" aria-controls="group-of-rows-1"><td class="text-center"><i class="fa fa-plus" aria-hidden="true"></i><input type="hidden" name="IdModulo" value="'+data+'"></td>';
                        return '<td class="text-center hidden clickable" data-toggle="collapse" data-target="#group-of-rows-1" aria-expanded="false" aria-controls="group-of-rows-1"><i class="fa fa-plus" aria-hidden="true"></i></td>';    
                    }
                },
                
                {
                    "data": "Caption",
                    "className": "text-center",
                    "render": function (data) {
                        return '<td class="text-center"><input type="hidden" name="Caption[]" value="'+data+'">'+data+'</td>';
                        
                    }
                },
                {    
                   "data": "Acceder",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                       
                    return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Acceder'+row.NombreGrupo+'"  name="Acceder['+meta.row+']" onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Insertar"  name="Insertar[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Insertar",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                    return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Insertar'+row.NombreGrupo+'"  name="Insertar['+meta.row+']" onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Insertar"  name="Insertar[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Editar",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                    return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Editar'+row.NombreGrupo+'"  name="Editar['+meta.row+']" onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Editar"  name="Editar[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Eliminar",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                    return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Eliminar'+row.NombreGrupo+'"  name="Eliminar['+meta.row+']" onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Eliminar"  name="Eliminar[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Exportar",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                    return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Exportar'+row.NombreGrupo+'"  name="Exportar['+meta.row+']" onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Exportar"  name="Exportar[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Plantilla",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                    return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Plantilla'+row.NombreGrupo+'"  name="Plantilla['+meta.row+']" onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Plantilla"  name="Plantilla[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Importar",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                    return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Importar'+row.NombreGrupo+'"  name="Importar['+meta.row+']" onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Importar"  name="Importar[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Imprimir",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                    return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Imprimir'+row.NombreGrupo+'"  name="Imprimir['+meta.row+']" onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Imprimir"  name="Imprimir[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                
            ],
           
            responsive: true,
            autoFill: true,
            retrieve: true,
        });

        
        // $('#TablaEntradas').dataTable() .rowReordering();
    //   var lastRowIndex = $('#TablaEntradas tr').length -1;
    //     console.log("Column data",lastRowIndex);
        $("#TablaEntradas").DataTable().rows().every( function (rowIdx, tableLoop, rowLoop ) {
            var tr = $(this.node());
            var data = $('#TablaEntradas').DataTable().row(tr).data();
            var NombreForm = data['NombreForm'];
            var grupo = data['NombreGrupo'];
            var index= tr.index();
            // var row_index=$(this).parent().index();
            // console.log("row_index: "+JSON.stringify(data));
            // console.log("rowIdx: "+rowIdx);
            
            this.child(format(tr.data('details-control'),response.modulos,grupo,rowIdx)).show();
            tr.addClass('shown');
        });

        

        $('#TablaEntradas tbody').on('click', 'td.details-control', function() {
            // var grupo = $(this).closest("tr").find('.replyClass').text();
    
            // console.log("grupo: "+grupo);
                    var tr = $(this).closest('tr');
                    var row = $('#TablaEntradas').DataTable().row(tr);
                    var data = $('#TablaEntradas').DataTable().row(tr).data();
                    var grupo = data['NombreGrupo'];
                    var index=row.index();
                    // console.log("rowIdx: "+index+" tr.index: "+tr.index());
                    // console.log("index child: "+row.index());
                    if (row.child.isShown()) {
                        row.child.hide();
                        formatCH().hide();
                        tr.removeClass('shown');
                    } else {
                        
                        formatCH(row.child, response.modulos,grupo,index).show();
                        tr.addClass('shown');
                    }

        });
         
        function format (value,data,grupo,index) {
        
            var trHTML = '';
            var nod=index;
            // var j=0;
            $.each(data, function (i, item) {
                if(grupo==item.NombreGrupo){
                   
                    // index++;
                    // console.log("index-formt: "+index);
                    trHTML += '<tr>' +
                    '<td class="text-center hidden"><input type="checkbox" class="form-check-input name="IdModulo[]" value="'+item.IdModulo+'"></td>' +
                    '<td class="text-center hidden"><input type="hidden" name="NombreForm[]" value="'+item.NombreForm+'">'+item.NombreForm+'</td>' +
                    '<td class="text-center hidden"><input type="hidden" name="NombreGrupo[]" value="'+item.NombreGrupo+'">'+item.NombreGrupo+'</td>' +
                    '<td></td>' +
                    '<td class="text-center"><input type="hidden" name="Caption[]" value="'+item.Caption+'">'+item.Caption +'</td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Acceder'+item.NombreGrupo+'" id="Acceder"  name="Acceder['+nod+''+i+']"      {{  ('+item.Acceder+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Insertar'+item.NombreGrupo+'" id="Insertar"  name="Insertar['+nod+''+i+']"   {{  ('+item.Insertar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Editar'+item.NombreGrupo+'" id="Editar"    name="Editar['+nod+''+i+']"       {{  ('+item.Editar+' == "Si" ?    "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Eliminar'+item.NombreGrupo+'" id="Eliminar"  name="Eliminar['+nod+''+i+']"   {{  ('+item.Eliminar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Exportar'+item.NombreGrupo+'" id="Exportar"  name="Exportar['+nod+''+i+']"   {{  ('+item.Exportar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Plantilla'+item.NombreGrupo+'" id="Plantilla" name="Plantilla['+nod+''+i+']" {{  ('+item.Plantilla+' == "Si" ? "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Importar'+item.NombreGrupo+'" id="Importar"  name="Importar['+nod+''+i+']"   {{  ('+item.Importar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Imprimir'+item.NombreGrupo+'" id="Imprimir"  name="Imprimir['+nod+''+i+']"   {{  ('+item.Imprimir+' == "Si" ?  "checked" : "") }}></td>' +
                    '</tr>';
                    
                }
               
            });
            // j++;
            //    return trHTML;
           return $(trHTML).toArray();   
            // callback($(trHTML)).show();
        }

        function formatCH (callback,data,grupo,index) {
          
            var trHTML = '';
            var nod=index;
            $.each(data, function (i, item) {
                if(grupo==item.NombreGrupo){
                    // index++;
                    // console.log("index-formtCH: "+index);
                    trHTML += '<tr>' +
                    '<td class="text-center hidden"><input type="checkbox" class="form-check-input name="IdModulo[]" value="'+item.IdModulo+'"></td>' +
                    '<td class="text-center hidden"><input type="hidden" name="NombreForm[]" value="'+item.NombreForm+'">'+item.NombreForm+'</td>' +
                    '<td class="text-center hidden"><input type="hidden" name="NombreGrupo[]" value="'+item.NombreGrupo+'">'+item.NombreGrupo+'</td>' +
                    '<td></td>' +
                    '<td class="text-center"><input type="hidden" name="Caption[]" value="'+item.Caption+'">'+item.Caption +'</td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Acceder'+item.NombreGrupo+'" id="Acceder"  name="Acceder['+nod+''+i+']"      {{  ('+item.Acceder+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Insertar'+item.NombreGrupo+'" id="Insertar"  name="Insertar['+nod+''+i+']"   {{  ('+item.Insertar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Editar'+item.NombreGrupo+'" id="Editar"    name="Editar['+nod+''+i+']"       {{  ('+item.Editar+' == "Si" ?    "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Eliminar'+item.NombreGrupo+'" id="Eliminar"  name="Eliminar['+nod+''+i+']"   {{  ('+item.Eliminar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Exportar'+item.NombreGrupo+'" id="Exportar"  name="Exportar['+nod+''+i+']"   {{  ('+item.Exportar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Plantilla'+item.NombreGrupo+'" id="Plantilla" name="Plantilla['+nod+''+i+']" {{  ('+item.Plantilla+' == "Si" ? "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Importar'+item.NombreGrupo+'" id="Importar"  name="Importar['+nod+''+i+']"   {{  ('+item.Importar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Imprimir'+item.NombreGrupo+'" id="Imprimir"  name="Imprimir['+nod+''+i+']"   {{  ('+item.Imprimir+' == "Si" ?  "checked" : "") }}></td>' +
                    '</tr>';

                   
                }
                
            });
           
            callback($(trHTML)).show();
        }
       
    }

       function toggleCheckBox(id) {
        // console.log("id: "+id);
        $('#'+id+'').on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('checked', true).val('Si');
                $('td input.'+id+'').attr('checked', true).val('Si');
                // $('td input.'+id+'').attr('checked', '');
                // this.value = this.checked ? 'Si' : 'No';
            } else {
                $(this).removeAttr('checked').val('No');
                $('td input.'+id+'').removeAttr('checked').val('No');
            }
        })
    }
    

    Array.prototype.unique=function(a){
        return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
    });

    var getAllNodes = function( nodes ){

        listaNodos = [];

        $.each(nodes,function(k,v){
                listaNodos.push( v.key );
        });

        return listaNodos;
    }

    var getAllNodesParents = function( nodes ){

            parents_aux = [];
            $.each(nodes,function(k,v){

                if(v.getParent() ){

                    parents_aux.push( v.getParent() );
                }
            });

            parents = parents_aux;

            return parents;

    }

    getNodeParent = function( node ){

        if( node.getParent() ){
            getNodeParent(  node.getParent());
            return node.getParent().key;
        }

        return -1;
    }

	var arbolPermisos = function(){
        $("#tree").fancytree({
            source:[
                { id: -1, key: '-1', title: 'Módulos',folder:true, children: [
                    { id: -2, key: '-2', title: 'CRM', folder:true, selected: true, children: [
                        { id: -2, key: '-2', title: 'Clientes', folder:true, children: [
                            {   id: '1',
                                key: '1',
                                title: 'Crear clientes'
                                                            },
                            {   id: '2',
                                key: '2',
                                title: 'Eliminar clientes'
                                                            },
                            {   id: '3',
                                key: '3',
                                title: 'Editar clientes'
                                                            },
                             {   id: '21',
                                key: '21',
                                title: 'Cambiar cliente de CN'
                                                            }
                        ]},
                        { id: -2, key: '-2', title: 'Agenda', folder:true, children: [
                            {   id: '4',
                                key: '4',
                                title: 'Cancelar cita'
                                                            }
                        ]},
                        { id: -2, key: '-2', title: 'Cotizaciones', folder:true, children: [
                            {   id: '5',
                                key: '5',
                                title: 'Cotizaciones contrato'
                            }
                        ]},
                        {   id: '40',
                            key: '40',
                            title: 'Contratos CRM'
                                                    },
                        {   id: '41',
                            key: '41',
                            title: 'Correos CRM'
                                                    },
                        { id: 6, key: '6', title: 'Reportes', folder:true,

                        children: [
                            { id: 7, key: '7', title: 'Ver reportes clientes con contrato', folder:true,

                            children: [
                                {   id: '8',
                                    key: '8',
                                    title: 'Reportes clientes con contrato con filtro CN'
                                                                    },
                                {   id: '9',
                                    key: '9',
                                    title: 'Reportes clientes con contrato con filtro sector'
                                                                    },
                                {   id: '10',
                                    key: '10',
                                    title: 'Reportes clientes con contrato con filtro servicio'
                                                                    }



                            ]},
                            { id: 11, key: '11', title: 'Ver reportes citas', folder:true,

                            children: [
                                {   id: '12',
                                    key: '12',
                                    title: 'Reportes citas con filtro de CN'
                                                                    },
                                {   id: '13',
                                    key: '13',
                                    title: 'Reportes citas con filtro de status'
                                                                    },
                                {   id: '14',
                                    key: '14',
                                    title: 'Reportes citas con filtro de usuario'
                                                                    }
                            ]},
                            { id: 15, key: '15', title: 'Ver reportes llamadas', folder:true,

                             children: [
                                {   id: '16',
                                    key: '16',
                                    title: 'Reportes llamadas con filtro de CN'
                                                                    }
                            ]},
                            { id: 17, key: '17', title: 'Ver reportes cotizaciones', folder:true,

                             children: [
                                {   id: '18',
                                    key: '18',
                                    title: 'Reportes cotizaciones con filtro de CN'
                                                                    },
                                {   id: '19',
                                    key: '19',
                                    title: 'Reportes cotizaciones con filtro de sector'
                                                                    },
                                {   id: '20',
                                    key: '20',
                                    title: 'Reportes cotizaciones con filtro de servicio'
                                                                    }

                            ]},
                            { id: 22, key: '22', title: 'Ver reportes prospectos', folder:true,

                             children: [
                                {   id: '23',
                                    key: '23',
                                    title: 'Reportes prospecto con filtro de CN'
                                                                    },
                                {   id: '24',
                                    key: '24',
                                    title: 'Reportes prospecto con filtro de sector'
                                                                    },

                            ]}
                        ]}

                    ]},
                    { id: '39', key: '39', title: 'ESE', folder:true,  children: [
                        { id: '37', key: '37', title: 'Ordenes de Servicio', folder:true,  children: [
                            {   id: '25',
                                key:'25',
                                title: 'Ver ordenes de servicio'

                            },
                            {   id: '26',
                                key:'26',
                                title: 'Cancelar orden de servicio'

                            },
                            {   id: '27',
                                key:'27',
                                title: 'Cerrar orden de servicio'

                            },
                            {   id: '28',
                                key: '28',
                                title: 'Ver detalle de orden de servicio'

                            }
                        ]},
                        { id: '38', key: '38', title: 'Estudios Socioeconómicos', folder:true,  children: [
                            {   id: '29',
                                key: '29',
                                title: 'Ver detalle del estudio'

                            },
                            {   id: '30',
                                key: '30',
                                title: 'Ver ejecutivos asignados'

                            }
                        ]},
                        { id: '31', key: '31', title: 'Investigadores', folder:true,  children: [
                            {   id: '32',
                                key: '32',
                                title: 'Nuevos investigadores'

                            }
                        ]},
                        {   id: '33',
                            key: '33',
                            title: 'Reporte',
                            folder:true

                        },
                        { id: '34', key: '34', title: 'Plantillas', folder:true,  children: [
                            {   id: '35',
                                key: '35',
                                title: 'Nueva plantilla'

                            }
                        ]}

                    ]},
                    { id: '-2', key: '-2', title: 'Catálogos', folder:true,  children: [
                        {   id: '44',
                            key:'44',
                            title: 'Catálogos clientes'

                        },
                        {   id: '45',
                            key:'45',
                            title: 'Catálogos cotizaciones'

                        },
                        {   id: '46',
                            key:'46',
                            title: 'Catálogos contratos'

                        },
                        {   id: '47',
                            key: '47',
                            title: 'Catálogos ordenes de servicio'

                        }
                    ]} ,
                    { id: '48', key: '48', title: 'Nómina', folder:true,  children: [
                        { id: '49', key: '49', title: 'Empleados', folder:true,  children: [
                            {   id: '50',
                                key:'50',
                                title: 'Ver Recibos de Empleado'

                            }



                ]}
                ]}



                ]}








            ],
            selectMode:3,
            checkbox:true,
            select:function(event, data){
                //console.log(data.node.key);

                    console.log(data.tree.getSelectedNodes());

                    /*var selKeys = $.map(data.tree.getSelectedNodes(), function (node) {
                        console.log(node.key);
                        console.log( (node.parent).parent );
                    });*/
            },
            click:function(event, data){
                console.log(data.targetType);
            }

        });
    }

    var aliasPuesto = function(){
    	$.fn.delayPasteKeyUp = function(fn, ms)
		{
		    var timer = 0;
		    $(this).on("keyup paste", function()
		    {
		        clearTimeout(timer);
		        timer = setTimeout(fn, ms);
		    });
		};
		$('#alias_puesto').delayPasteKeyUp(function(){
		      str_alias_puesto 		= $.trim( $('#alias_puesto').val() );
		      str_alias_puesto 		= str_alias_puesto.toLowerCase();
		      arr_str_alias_puesto  = str_alias_puesto.split(" ");
		      str_alias_puesto 		= arr_str_alias_puesto.join('.');

		      $('#alias_puesto').val(str_alias_puesto);

		},1000);

    };



    var permisos = {
    	elemento:'permisos',
    	init: function(){
    		$('#'+this.elemento).bootstrapDualListbox({

	    		infoText:'Permisos',
	    		infoTextFiltered:'<span class="label label-primary">Permisos filtrados</span> {0} de {1}',
	    		moveAllLabel:'Asignar todos los permisos',
	    		removeAllLabel:'Quitar todos los permisos',
	    		filterPlaceHolder:'Buscar permisos',
	    		filterTextClear:'Mostrar todos los permisos',
	    		moveOnSelect:false,
	    		moveSelectedLabel:'Asignar permiso seleccionado',
	    		infoTextEmpty:'No hay permisos asignados'

	    	});
    	}
    }

    var outputUpdate = function(vol) {
		document.querySelector('#volume').value = vol;
	}
	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'excel', 'pdf','print'

                                ],
                                responsive: true,
                                autoFill: true,
                                "scrollY": "350px",
                                "paging": false,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                               /* "footerCallback": function ( row, data, start, end, display ) {
                                        var api = this.api(), data;

                                        // Remove the formatting to get integer data for summation
                                        var intVal = function ( i ) {
                                            return typeof i === 'string' ?
                                                i.replace(/[\$,]/g, '')*1 :
                                                typeof i === 'number' ?
                                                    i : 0;
                                        };

                                        // Total over all pages
                                        total = api
                                            .column( 2 )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );

                                        // Total over this page
                                        pageTotal = api
                                            .column( 2, { page: 'current'} )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );

                                        // Update footer
                                       $( api.column( 2 ).footer() ).html('TOTAL VISTA $ '+number_format(pageTotal,2));
                                        $('#total-cotizaciones-reportes').html('$ '+number_format(total,2));

                                }*/

                            } );

        }



 var arbolPermisoNomina= function(){
    $("#treeperfil").fancytree({
            source:[
                { id: -1, key: '-1', title: 'Módulo',folder:true, children: [
                    { id: -2, key: '-2', title: 'Nomina', folder:true, selected: true, children: [

                        {   id: '40',
                            key: '40',
                            title: 'permiso 1'
                                                    },
                        {   id: '41',
                            key: '41',
                            title: 'permiso 2'
                                                    }


                    ]}

                ]}

            ],
            selectMode:3,
            checkbox:true,
            select:function(event, data){
                //console.log(data.node.key);

                    console.log(data.tree.getSelectedNodes());

                    /*var selKeys = $.map(data.tree.getSelectedNodes(), function (node) {
                        console.log(node.key);
                        console.log( (node.parent).parent );
                    });*/
            },
            click:function(event, data){
                console.log(data.targetType);
            }

        });
}
 var t = function getPerfiles(){
    $.ajax({
        url:'{{ url("modulo/administrador/perfil/list") }}',
        type:'get',
        dataType:"json",
        success:function(data){
            var sampleSource = [];
            var i=0,j=0;
            sampleSource[i]={ id: -1, key: '-1', title: 'Perfil',folder:true, children: []}
            $.each(data, function(k,v){
                sampleSource[i].children[j]= {
                    id: v.IdPerfil,
                    key: v.IdPerfil,
                    title: v.Perfil
                };
                j++;
            });
            $("#treeperfil").fancytree({
            source:sampleSource,
            selectMode:3,
            checkbox:true,
            select:function(event, data){
                //console.log(data.node.key);

                    console.log(data.tree.getSelectedNodes());

                    /*var selKeys = $.map(data.tree.getSelectedNodes(), function (node) {
                        console.log(node.key);
                        console.log( (node.parent).parent );
                    });*/
            },
            click:function(event, data){
                console.log(data.targetType);
            }

        });
        }
    });
}
var menus=function getmenus(){
    $.ajax({
        url:'{{ url("modulo/administrador/menu/list") }}',
        type:'get',
        dataType:"json",
        success:function(data){
            var sampleSource = [];
            var root=0,subnode=0;
            sampleSource[root]={ id: -1, key: '-1', title: 'Menu',folder:true, children: []};

            var menuss=data.menus;
            var index1=0,index2=0;
            var contenido=[];
            var auxmenu=[]; var indexmenu=0;
            var search;
            $.each(data.group,function(key,value){
                var indexaux=0;
                var aux=[];
                aux[indexaux]=menuss.filter(element =>element.Nombregrupo==value.Nombregrupo);

                 indexaux++;
                contenido.push(aux);
            });
            for(var i=0; i<contenido.length;i++){
                var a=0,b=0,c=0;
                for(var j=0; j<contenido[i].length;j++){
                    var temp=[];
                    for(var k=0; k<contenido[i][j].length;k++){
                        temp.push(
                            {
                                id: contenido[i][j][k].Idmenu,
                                key: contenido[i][j][k].Idmenu,
                                title: contenido[i][j][k].caption
                            }
                        );
                        sampleSource[root].children[subnode]= {
                            id: -2,
                            key: '-2',
                            title: contenido[i][j][k].captiongrupo,
                            folder:true, selected: true, children:
                            temp
                        }


                    }
                }
                subnode++;
            }
            $("#treemenu").fancytree({
            source:sampleSource,
            selectMode:3,
            checkbox:true,
            select:function(event, data){
            },
            click:function(event, data){
                //console.log(data.targetType);
            }

        });
        }
    });
}


</script>

@endsection

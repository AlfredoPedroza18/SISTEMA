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
    </style>  
</head>

<div id="content" class="content">
	<ol class="breadcrumb ">
        <li><a href="javascript:;">Administrador</a></li>
		<li><a href="{{ route('sig-erp-crm::modulo.administrador.puestos.index') }}">Permisos</a></li>
		<li><a href="javascript:;">Alta permiso</a></li>
	</ol>
	<!-- begin page-header -->
	<h1 class="page-header text-center">Permiso<small>Configuración de permisos </small></h1>
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
                            <hr/>
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
                var Idperfil = $("#perfiles").val();
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
                        return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Acceder'+row.NombreGrupo+'"  name="Acceder[]" onclick="toggleCheckBox(this.id)"></td>';
                    }
                },
                {    
                   "data": "Insertar",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                        return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Insertar'+row.NombreGrupo+'"  name="Insertar[]" onclick="toggleCheckBox(this.id)"></td>';
                    }
                },
                {    
                   "data": "Editar",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                        return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Editar'+row.NombreGrupo+'"  name="Editar[]" onclick="toggleCheckBox(this.id)"></td>';
                    }
                },
                {    
                   "data": "Eliminar",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                    return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Eliminar'+row.NombreGrupo+'"  name="Eliminar[]" onclick="toggleCheckBox(this.id)"></td>';
                    }
                },
                {    
                   "data": "Exportar",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                        return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Exportar'+row.NombreGrupo+'"  name="Exportar[]" onclick="toggleCheckBox(this.id)"></td>';
                    }
                },
                {    
                   "data": "Plantilla",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                        return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Plantilla'+row.NombreGrupo+'"  name="Plantilla[]" onclick="toggleCheckBox(this.id)"></td>';
                    }
                },
                {    
                   "data": "Importar",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                        return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Importar'+row.NombreGrupo+'"  name="Importar[]" onclick="toggleCheckBox(this.id)"></td>';
                    }
                },
                {    
                   "data": "Imprimir",
                   "className": "text-center",
                    render: function ( data, type, row, meta ) {
                        return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Imprimir'+row.NombreGrupo+'"  name="Imprimir[]" onclick="toggleCheckBox(this.id)"></td>';
                    }
                },
            ],
            responsive: true,
            autoFill: true,
            retrieve: true,
        });

        var IdModulo=[];
        var NombreForm=[];
        var NombreGrupo=[];
        var Caption=[];
        var ItemIndex=[];

        $("#TablaEntradas").DataTable().rows().every( function () {
            var tr = $(this.node());
            var index= tr.index();
            var data = $('#TablaEntradas').DataTable().row(tr).data();
            IdModulo.push(data['IdModulo']);
            NombreForm.push(data['NombreForm']);
            NombreGrupo.push(data['NombreGrupo']);
            Caption.push( data['Caption']);
            ItemIndex.push(index);
            var grupo = data['NombreGrupo'];
            this.child(format(tr.data('details-control'),response.modulos,grupo,index)).show();
            tr.addClass('shown');
        });
        ReTabla (IdModulo,NombreForm,NombreGrupo,Caption,ItemIndex);

        $('#TablaEntradasC tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = $('#TablaEntradasC').DataTable().row(tr);
            var data = $('#TablaEntradasC').DataTable().row(tr).data();
            var index= $(data[0]).attr("value");
            var grupo = $(data[2]).attr("value");
            if (row.child.isShown()) {
                row.child.hide();
            } else {
                formatCH(row.child, response.modulos,grupo,index).show();
                tr.addClass('shown');
            }
        });

        function format (value,data,grupo,index) {
            var trHTML = '';
            $.each(data, function (i, item) {
                if(grupo==item.NombreGrupo){
                    index++;
                    trHTML += '<tr>' +
                    '<td class="text-center hidden"><input type="checkbox" class="form-check-input name="IdModulo[]" value="'+item.IdModulo+'"></td>' +
                    '<td class="text-center hidden"><input type="hidden" name="NombreForm[]" value="'+item.NombreForm+'">'+item.NombreForm+'</td>' +
                    '<td class="text-center hidden"><input type="hidden" name="NombreGrupo[]" value="'+item.NombreGrupo+'">'+item.NombreGrupo+'</td>' +
                    '<td></td>' +
                    '<td class="text-center"><input type="hidden" name="Caption[]" value="'+item.Caption+'">'+item.Caption +'</td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Acceder'+item.NombreGrupo+'" id="Acceder"  name="Acceder['+index+']"      {{  ('+item.Acceder+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Insertar'+item.NombreGrupo+'" id="Insertar"  name="Insertar['+index+']"   {{  ('+item.Insertar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Editar'+item.NombreGrupo+'" id="Editar"    name="Editar['+index+']"       {{  ('+item.Editar+' == "Si" ?    "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Eliminar'+item.NombreGrupo+'" id="Eliminar"  name="Eliminar['+index+']"   {{  ('+item.Eliminar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Exportar'+item.NombreGrupo+'" id="Exportar"  name="Exportar['+index+']"   {{  ('+item.Exportar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Plantilla'+item.NombreGrupo+'" id="Plantilla" name="Plantilla['+index+']" {{  ('+item.Plantilla+' == "Si" ? "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Importar'+item.NombreGrupo+'" id="Importar"  name="Importar['+index+']"   {{  ('+item.Importar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Imprimir'+item.NombreGrupo+'" id="Imprimir"  name="Imprimir['+index+']"   {{  ('+item.Imprimir+' == "Si" ?  "checked" : "") }}></td>' +
                    '</tr>';
                }

            });

           return $(trHTML).toArray();   
        }



        function formatCH (callback,data,grupo,index) {
            var trHTML = '';
            $.each(data, function (i, item) {
                if(grupo==item.NombreGrupo){
                    index++;
                    trHTML += '<tr>' +
                    '<td class="text-center hidden"><input type="checkbox" class="form-check-input name="IdModulo[]" value="'+item.IdModulo+'"></td>' +
                    '<td class="text-center hidden"><input type="hidden" name="NombreForm[]" value="'+item.NombreForm+'">'+item.NombreForm+'</td>' +
                    '<td class="text-center hidden"><input type="hidden" name="NombreGrupo[]" value="'+item.NombreGrupo+'">'+item.NombreGrupo+'</td>' +
                    '<td></td>' +
                    '<td class="text-center"><input type="hidden" name="Caption[]" value="'+item.Caption+'">'+item.Caption +'</td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Acceder'+item.NombreGrupo+'" id="Acceder"  name="Acceder['+index+']"      {{  ('+item.Acceder+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Insertar'+item.NombreGrupo+'" id="Insertar"  name="Insertar['+index+']"   {{  ('+item.Insertar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Editar'+item.NombreGrupo+'" id="Editar"    name="Editar['+index+']"       {{  ('+item.Editar+' == "Si" ?    "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Eliminar'+item.NombreGrupo+'" id="Eliminar"  name="Eliminar['+index+']"   {{  ('+item.Eliminar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Exportar'+item.NombreGrupo+'" id="Exportar"  name="Exportar['+index+']"   {{  ('+item.Exportar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Plantilla'+item.NombreGrupo+'" id="Plantilla" name="Plantilla['+index+']" {{  ('+item.Plantilla+' == "Si" ? "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Importar'+item.NombreGrupo+'" id="Importar"  name="Importar['+index+']"   {{  ('+item.Importar+' == "Si" ?  "checked" : "") }}></td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Imprimir'+item.NombreGrupo+'" id="Imprimir"  name="Imprimir['+index+']"   {{  ('+item.Imprimir+' == "Si" ?  "checked" : "") }}></td>' +
                    '</tr>';
                }
            });

            callback($(trHTML)).show();
        }

        function ReTabla (IdModulo,NombreForm,NombreGrupo,Caption,ItemIndex) {
            $('#TablaEntradas').DataTable().destroy();
            $('#TablaEntradas').empty();
            var cantMod=IdModulo.length;
            var cantForm=NombreForm.length;
            var cantGrupo=NombreGrupo.length;
            var cantCaption=Caption.length;
            var cantIndex=ItemIndex.length;
            var tableContent ='<table id="TablaEntradasC" class="table table-bordered table-responsive" style="width:100%" data-searching="false" data-paging="false" data-info="false"><thead><tr><th class="text-center hidden"></th>' +
            "<th class='text-center hidden'></th>" +
            "<th class='replyClass text-center hidden'></th>" +
            "<th class='details-control text-center clickable'>Check</th>" +
            "<th class='text-center'>Aplicación</th>" +
            "<th class='text-center'>Acceder</th>" +
            "<th class='text-center'>Insertar</th>" +
            "<th class='text-center'>Editar</th>" +
            "<th class='text-center'>Eliminar</th>" +
            "<th class='text-center'>Exportar</th>" +
            "<th class='text-center'>Generar Plantilla</th>" +
            "<th class='text-center'>Importar Plantilla</th>" +
            "<th class='text-center'>Imprimir</th>" +
            "</tr></thead><tbody>";

            for(i=0;i<IdModulo.length;i++){
                tableContent += "<tr>";
                tableContent += '<td class="text-center hidden"><input type="checkbox" class="form-check-input" name="IdModulo[]" value="'+ItemIndex[i]+'"></td>';
                tableContent += '<td class="text-center hidden"><input type="hidden" name="NombreForm[]" value="'+NombreForm[i]+'">'+NombreForm[i]+'</td>';
                tableContent += '<td class="replyClass text-center hidden"><input type="hidden" name="NombreGrupo[]" value="'+NombreGrupo[i]+'">'+NombreGrupo[i]+'</td>';
                tableContent += '<td class="details-control text-center clickable" data-toggle="collapse" data-target="#group-of-rows-1" aria-expanded="false" aria-controls="group-of-rows-1"><i class="details-control fa fa-plus" aria-hidden="true"></i></td>';
                tableContent += '<td class="text-center"><input type="hidden" name="Caption[]" value="'+Caption[i]+'">'+Caption[i]+'</td>';
                tableContent += '<td class="text-center"><input type="checkbox" class="form-check-input" id="Acceder'+NombreGrupo[i]+'"  name="Acceder['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                tableContent += '<td class="text-center"><input type="checkbox" class="form-check-input" id="Insertar'+NombreGrupo[i]+'"  name="Insertar['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                tableContent += '<td class="text-center"><input type="checkbox" class="form-check-input" id="Editar'+NombreGrupo[i]+'"  name="Editar['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                tableContent += '<td class="text-center"><input type="checkbox" class="form-check-input" id="Eliminar'+NombreGrupo[i]+'"  name="Eliminar['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                tableContent += '<td class="text-center"><input type="checkbox" class="form-check-input" id="Exportar'+NombreGrupo[i]+'"  name="Exportar['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                tableContent += '<td class="text-center"><input type="checkbox" class="form-check-input" id="Plantilla'+NombreGrupo[i]+'"  name="Plantilla['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                tableContent += '<td class="text-center"><input type="checkbox" class="form-check-input" id="Importar'+NombreGrupo[i]+'"  name="Importar['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                tableContent += '<td class="text-center"><input type="checkbox" class="form-check-input" id="Imprimir'+NombreGrupo[i]+'"  name="Imprimir['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                tableContent += "</tr>";
            }

            $("#TablaEntradas").append(tableContent);
            $('#TablaEntradasC').DataTable();
            $("#TablaEntradasC").DataTable().rows().every( function () {
                var data = this.data();
                var tr = this.node();
                var index= $(data[0]).attr("value");
                var grupo = $(data[2]).attr("value");
                this.child(format($(data[3]).attr("class"),response.modulos,grupo,index)).show();
                $(this.node()).addClass('shown');
            });
        } 
        $("#TablaEntradasC").DataTable({
                "bProcessing": true,
                "destroy": true,
                "searching": false,
                "paging": false,
                "info": false, 
                responsive: true,
                autoFill: true,
                retrieve: true,
            });
    }

       function toggleCheckBox(id) {
        $('#'+id+'').on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('checked', true).val('Si');
                $('td input.'+id+'').attr('checked', true).val('Si');
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
        //arbol de permisos se elimino ver detalle del estudio,eliminaar ESE, Se paso Ordenes de servicio a catalogos y Reportes (solo lo trae vacio)
	var arbolPermisos = function(){
        $("#tree").fancytree({
            source:[
                { 
                    id: -1, 
                    key: '-1', 
                    title: 'Módulos',
                    folder:true, 
                    children: [
                        { 
                            id: '51', 
                            key: '51', 
                            title: 'Administrador', 
                            folder:true, 
                  
					        children: [
                                { 
                                    id: '52', 
                                    key: '52', 
                                    title: 'Empresa', 
                                    folder:true,
                          
						            children: [
                                        {   
                                            id: '53',
                                            key:'53',
                                            title: 'Crear Empresa',
			
                                        },
                                        {   
                                            id: '54',
                                            key:'54',
                                            title: 'Eliminar Empresa',
						
                                        },
                                        {   
                                            id: '55',
                                            key:'55',
                                            title: 'Editar Empresa',
						         
                                        },
                                    ]
                                },
                                { 
                                    id: '56', 
                                    key: '56', 
                                    title: 'Gestión de Nómina', 
                                    folder:true, 
                           
						            children: [
                                        {   
                                            id: '57',
                                            key:'57',
                                            title: 'Crear Gestión de Nómina',
							        
                                        },
                                        {   
                                            id: '58',
                                            key:'58',
                                            title: 'Eliminar Gestión de Nómina',
						
                                        },
                                        {   
                                            id: '59',
                                            key:'59',
                                            title: 'Editar Gestión de Nómina',

                                        },
                                    ]
                                },
                                { 
                                    id: '60', 
                                    key: '60', 
                                    title: 'Departamentos', 
                                    folder:true,
                                 
						            children: [
                                        {   id: '61',
                                            key:'61',
                                            title: 'Crear Departamentos',
                                       
                                        },
                                        {   
                                            id: '62',
                                            key:'62',
                                            title: 'Eliminar Departamentos',
                                          
                                        },
                                        {   
                                            id: '63',
                                            key:'63',
                                            title: 'Editar Departamentos',
                                     
                                        },
                                    ]
                                },
                                { 
                                    id: '64', 
                                    key: '64', 
                                    title: 'Puestos', 
                                 
                                    children: [
                                        {   
                                            id: '65',
                                            key:'65',
                                            title: 'Crear Puestos',
                                           
                                        },
                                        {   
                                            id: '66',
                                            key:'66',
                                            title: 'Eliminar Puestos',
                                    
                                        },
                                        {   
                                            id: '67',
                                            key:'67',
                                            title: 'Editar Puestos',
                                            
                                        },
                                    ]
                                },
                                { 
                                    id: '68', 
                                    key: '68', 
                                    title: 'Permisos', 
                                    folder:true, 
                                 					
                                    children: [
                                        {   
                                            id: '69',
                                            key:'69',
                                            title: 'Crear Permisos',
                                           
                                        },
                                        {   
                                            id: '70',
                                            key:'70',
                                            title: 'Eliminar Permisos',
                                            
                                        },
                                        {   
                                            id: '71',
                                            key:'71',
                                            title: 'Editar Permisos',
                                           
                                        },
                                    ]
                                },
                                { 
                                    id: '72', 
                                    key: '72', 
                                    title: 'Usuarios', 
                                    folder:true,
                              
                                    children: [
                                        { 
                                            id: '73', 
                                            key: '73', 
                                            title: 'Usuarios Staff', 
                                            folder:true,
                                        
                                            children: [
                                                {   
                                                    id: '74',
                                                    key:'74',
                                                    title: 'Crear Usuarios Staff',
                          
                                                },
                                                {   
                                                    id: '75',
                                                    key:'75',
                                                    title: 'Eliminar Usuarios Staff',
                                     
                                                },
                                                {   
                                                    id: '76',
                                                    key:'76',
                                                    title: 'Editar Usuarios Staff',
                                                 
                                                },
                                        ]
                                        },
                                        { 
                                            id: '77', 
                                            key: '77', 
                                            title: 'Usuarios Candidato o Empleado', 
                                            folder:true,
                            
                                            children: [
                                                {   
                                                    id: '78',
                                                    key:'78',
                                                    title: 'Crear Usuarios Candidato o Empleado',
                                    
                                                },
                                                {   
                                                    id: '79',
                                                    key:'79',
                                                    title: 'Eliminar Usuarios Candidato o Empleado',
                                            
                                                },
                                                {   
                                                    id: '80',
                                                    key:'80',
                                                    title: 'Editar Usuarios Candidato o Empleado',
                                                   
                                                },
                                            ]
                                        },
                                    
                                        { 
                                            id: '85', 
                                            key: '85', 
                                            title: 'Usuarios Investigadores', 
                                            folder:true,
                                        
                                            children: [
                                                {   
                                                    id: '86',
                                                    key:'86',
                                                    title: 'Crear Usuarios Investigadores',
                                             
                                                },

                                                {   
                                                    id: '87',
                                                    key:'87',
                                                    title: 'Eliminar Usuarios Investigadores',
                                                
                                                },

                                                {   
                                                    id: '88',
                                                    key:'88',
                                                    title: 'Editar Usuarios Investigadores',
                                              
                                                },
                                            ]
                                        },
                                    ]
                                },
                                {   
                                    id: '126',
                                    key: '126',
                                    title: 'Utilerias',
                                    folder:true,
                                    children: [
                                                {   
                                                    id: '127',
                                                    key:'86',
                                                    title: 'Cotizador Cat. de Serv',
                                             
                                                },

                                                {   
                                                    id: '128',
                                                    key:'128',
                                                    title: 'Plantillas Cotizador',
                                                
                                                },

                                                {   
                                                    id: '129',
                                                    key:'129',
                                                    title: 'Plantillas Contratos',
                                              
                                                },

                                                {   
                                                    id: '134',
                                                    key:'134',
                                                    title: 'Plantillas Firma Correo',
                                              
                                                },

                                                {   
                                                    id: '130',
                                                    key:'130',
                                                    title: 'Impuestos',
                                              
                                                },

                                                {   
                                                    id: '131',
                                                    key:'131',
                                                    title: 'Codigos postales',
                                              
                                                },
                                    ]
                                  
                                },
                                {   
                                    id: '113',
                                    key: '113',
                                    title: 'Kardex',
                                    folder:true,
                                   
                                },
                            ]
                        },
                        { 
                            id: '116', 
                            key: '116', 
                            title: 'CRM', 
                            folder:true, 
                             
                            children: [
                                { 
                                    id: -2, 
                                    key: '-2', 
                                    title: 'Clientes', 
                                    folder:true, 
                                    selected:true, 
                                    children: [
                                        {   
                                            id: '1',
                                            key: '1',
                                            title: 'Crear clientes',
                                           
                                        },
                                        {   
                                            id: '2',
                                            key: '2',
                                            title: 'Eliminar clientes',
                                            
                                        },
                                        {   
                                            id: '3',
                                            key: '3',
                                            title: 'Editar clientes',
                                        
                                        },
                                        {   
                                            id: '21',
                                            key: '21',
                                            title: 'Cambiar cliente de CN',
                                           
                                        }
                                    ]
                                },
                                { 
                                    id: -2, 
                                    key: '-2', 
                                    title: 'Agenda', 
                                    folder:true, 
                                    selected:true, 
                                    children: [
                                        {   
                                            id: '4',
                                            key: '4',
                                            title: 'Cancelar cita',
                                       
                                        }

                                    ]
                                },
                                { 
                                    id: -2, 
                                    key: '-2', 
                                    title: 'Cotizaciones', 
                                    folder:true, 
                                    selected:true, 
                                    children: [
                                        {   
                                            id: '5',
                                            key: '5',
                                            title: 'Cotizaciones contrato',
                                          
                                        }
                                    ]
                                },
                                {   
                                    id: '40',
                                    key: '40',
                                    title: 'Contratos CRM',

                                },
                                {   
                                    id: '41',
                                    key: '41',
                                    title: 'Correos CRM',
                          
                                },
                                { 
                                    id: 6, 
                                    key: '6', 
                                    title: 'Reportes', 
                                   
                                    children: [
                                        { 
                                            id: 7, 
                                            key: '7', 
                                            title: 'Ver reportes clientes con contrato', 
                                            folder:true,
                                         
                                            children: [
                                                {   
                                                    id: '8',
                                                    key: '8',
                                                    title: 'Reportes clientes con contrato con filtro CN',
                                                   
                                                },
                                                {   
                                                    id: '9',
                                                    key: '9',
                                                    title: 'Reportes clientes con contrato con filtro sector',
                                                   
                                                },
                                                {   
                                                    id: '10',
                                                    key: '10',
                                                    title: 'Reportes clientes con contrato con filtro servicio',
                                                   
                                                }
                                            ]
                                        },
                                        { 
                                            id: 11, 
                                            key: '11', 
                                            title: 'Ver reportes citas', 
                                            folder:true,
                                            children: [
                                                {   
                                                    id: '12',
                                                    key: '12',
                                                    title: 'Reportes citas con filtro de CN',
                                                  
                                                },
                                                {   
                                                    id: '13',
                                                    key: '13',
                                                    title: 'Reportes citas con filtro de status',
                                                   
                                                },
                                                {   
                                                    id: '14',
                                                    key: '14',
                                                    title: 'Reportes citas con filtro de usuario',
                                                    
                                                }
                                            ]
                                        },
                                        { 
                                            id: 15, 
                                            key: '15', 
                                            title: 'Ver reportes llamadas', 
                                            folder:true,
                                            children: [
                                                {   
                                                    id: '16',
                                                    key: '16',
                                                    title: 'Reportes llamadas con filtro de CN',
                                                   
                                                }
                                            ]
                                        },
                                        { 
                                            id: 17, 
                                            key: '17', 
                                            title: 'Ver reportes cotizaciones', 
                                            folder:true,
                                          
                                            children: [
                                                {   
                                                    id: '18',
                                                    key: '18',
                                                    title: 'Reportes cotizaciones con filtro de CN',
                                                   
                                                },
                                                {   
                                                    id: '19',
                                                    key: '19',
                                                    title: 'Reportes cotizaciones con filtro de sector',
                                                   
                                                },
                                                {   
                                                    id: '20',
                                                    key: '20',
                                                    title: 'Reportes cotizaciones con filtro de servicio',
                                                 
                                                }
                                            ]
                                        },
                                        { 
                                            id: 22, 
                                            key: '22', 
                                            title: 'Ver reportes prospectos', 
                                            folder:true,
                                          
                                            children: [
                                                {   
                                                    id: '23',
                                                    key: '23',
                                                    title: 'Reportes prospecto con filtro de CN',
                                                   
                                                },
                                                {   
                                                    id: '24',
                                                    key: '24',
                                                    title: 'Reportes prospecto con filtro de sector',
                                                   
                                                },
                                            ]
                                        }
                                    ]
                                }
                            ]
                        },
                        { 
                            id: '39', 
                            key: '39', 
                            title: 'ESE', 
                            folder:true, 
                           
                            children: [
                                {   
                                    id: '89',
                                    key: '89',
                                    title: 'Nuevo / Solicitar Servicio',
                                    
                                  

                                },
                                { 
                                    id: '38', 
                                    key: '38', 
                                    title: 'Estudios Socioeconómicos', 
                                    folder:true,
                                     
                                    children: [
                                        {   
                                            id: '92',
                                            key:'92',
                                            title: 'Editar Estudios Socioeconómicos',
                                            
                                        },
                                        
                                    ]
                                },

                                {   
                                    id: '133',
                                    key:'133',
                                    title: 'Pruebas Laborales',
                                
                                },

                                { 
                                    id: '100', 
                                    key: '100', 
                                    title: 'Configuraciones', 
                                    folder:true,
                                   
                                    children: [
                                        {   
                                            id: '102',
                                            key: '102',
                                            title: 'Aviso de privacidad',
                                            
                                            
                                        },
                                        {   
                                            id: '105',
                                            key: '105',
                                            title: 'Servicios',
                                          
                                        },
                                        {   
                                            id: '106',
                                            key: '106',
                                            title: 'Formatos Editor',
                                            
                                       
                                        },
                                        {   
                                            id: '108',
                                            key: '108',
                                            title: 'Notificaciones',
                                            
                                     
                                        },
                                    ]
                                },
                            ]
                        },
                        { 
                            id: '43', 
                            key: '43', 
                            title: 'Catálogos', 
                            folder:true, 
                            selected: true,
                            children: [
                                {   
                                    id: '44',
                                    key:'44',
                                    title: 'Catálogos clientes',
                                   
                                },
                                {   
                                    id: '45',
                                    key:'45',
                                    title: 'Catálogos cotizaciones',
                                   
                                },
                                {   
                                    id: '46',
                                    key:'46',
                                    title: 'Catálogos contratos',
                                
                                },
                                {   
                                    id: '132',
                                    key:'132',
                                    title: 'Catálogos creditos',
                                
                                },

                                { 
                                    id: '37', 
                                    key: '37', 
                                    title: 'Ordenes de Servicio', 
                                    folder:true,
                                    
                                    children: [
                                        {   
                                            id: '25',
                                            key:'25',
                                            title: 'Editar ordenes de servicio',
                                         
                                        }
                                    ]
                                },
                            ]
                        },
                        { 
                            id: '48',
                            key: '48',
                            title: 'Nómina',
                            folder:true,
                     
                            children: [
                                { 
                                    id: '114', 
                                    key: '114', 
                                    title: 'Nóminas', 
                                    folder:true,
                                    
                                    children: [
                                        {   
                                            id: '115',
                                            key:'115',
                                            title: 'Ver detalle de Nómina',
                                            
                                        }
                                    ]
                                },
                                { 
                                    id: '49', 
                                    key: '49', 
                                    title: 'Empleados', 
                                    folder:true,
                                    
                                    children: [
                                        {   
                                            id: '50',
                                            key:'50',
                                            title: 'Ver Recibos de Empleado',
                                            
                                        }
                                    ]
                                },
                            ]
                        },

                        
                    
                        { id: '120', key: '120', title: 'Facturación', folder:true,  children: [
                                {   id: '121',
                                    key:'121',
                                    title: 'Facturación'

                                }
                        ]},

                        { id: '120', key: '120', title: 'Facturación', folder:true,  children: [
                                {   id: '121',
                                    key:'121',
                                    title: 'Facturación'

                                }
                        ]},

                        { id: '122', key: '122', title: 'Encuestas', folder:true,  children: [
                                {   id: '123',
                                    key:'123',
                                    title: 'Nuevo servicio'

                                },
                                {   id: '124',
                                    key:'124',
                                    title: 'Nom 035'

                                },
                                {   id: '125',
                                    key:'125',
                                    title: 'Catalogos'

                                }
                        ]}
                    ]
                }
            ],
            selectMode:3,
            checkbox:true,
            select:function(event, data){
                    console.log(data.tree.getSelectedNodes());
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
                    console.log(data.tree.getSelectedNodes());
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
                    console.log(data.tree.getSelectedNodes());
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
            }
        });
        }
    });
}
</script>
@endsection
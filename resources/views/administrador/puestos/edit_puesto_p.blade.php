@extends('layouts.masterMenuView')

@section('estilos')



{!! Html::style('assets/css//bootstrap-duallistbox.css') !!}
{!! Html::style('assets/permisos/ui.fancytree.min.css') !!}


@endsection
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
        <li><a href="javascript:;">Administrador</a></li>
		<!-- <li><a href="{{ url('modulo/administrador/cuentas') }}">Cuentas</a></li> -->
		<li><a href="{{ route('sig-erp-crm::modulo.administrador.puestos.index') }}">Permiso</a></li>
		<li><a href="javascript:;">Editar permiso</a></li>

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
		            <div class="row">
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
						<div class="jumbotron">
                            <div class="form-group">
                                    <label class="col-xs-1">Asignar</label>
                                    <div class="col-xs-3">
                                        <select class="form-control" name="permisosVista" id="permisosVista" disabled >
                                            <!-- <option value="permisosESE">Permisos ESE</option> -->
                                            <option value="permisosNomina">Permisos Nómina</option>
                                        </select>
                                    </div>
                                </div>

                                <hr></hr>

                                {!! Form::model($perfil,[
	                           				'route'  => ['sig-erp-crm::modulo.administrador.perfil.update', $perfil],
	                           				'method' => 'put',
                                            'id'     => 'create-permisosNom-frm'])

			                  !!}
								
                                            @include('administrador.puestos.permisosnomina')
                                {!! Form::close() !!}

                                

						</div>


		            </div>




		        </div>
		    </div>
		</div>
	</div>

<!-- <br>

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
		            <h4 class="panel-title text-center">Permisos para Nómina</h4>
		        </div>
		        <div class="panel-body">
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                   <h4><i class="fas fa-check"></i> {{ session('status') }} </h4>
                    </div>
                @endif
		        	<div class="alert alert-info">
                        <h4><i class="fa fa-info-circle fa-lg"></i> Asignación de permisos</h4>
                    </div>

                    <div class="alert alert-danger" role="alert" style="display:none;" id="alertDanger">
                    <h4><i class="fas fa-exclamation-triangle"></i> Seleccione perfil y menú de nomina a asignar ! </h4>

                    </div>

                    <div class="jumbotron">
                        {!!
                        Form::open([
                                    'route' => 'sig-erp-crm::modulo.administrador.perfil.store',
	                                'method' => 'post',
                                    'id' 	 => 'addpermiso-perfil-frm'])
                        !!}
                        <div>
                            {{ Form::hidden('lista_perfiles', null,['id' => 'lista_perfiles']) }}
                            {{ Form::hidden('lista_menu_nomina', null,['id' => 'lista_menu_nomina']) }}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="text-center">Perfiles</label>
                                        <div class="col-8">
                                            <div id="treeperfil"></div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nómina</label>
                                    <div class="col-8">
                                        <div id="treemenu"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" >
                            <div style=" float:none; text-align:center;">
                                {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success','id' => 'create-permiso-nomina']) }}
                                </div>

                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>




		        </div>
		    </div>
		</div>
	</div>
</div> -->

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
          
            // this.value = this.checked ? 'Si' : 'No';
            $('input:checkbox').on('change', function(){
                console.log("change in submit");
                this.value = this.checked ? 'Si' : 'No';
            }).change();
                // $('[type=checkbox]').prop("checked", false);
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
        var Idperfil = $("#perfiles").val();
        // var Idperfil = $("#perfiles option:selected").val();
        // console.log("IdperfilMMMM: "+Idperfil);
        $.ajax({
            type: "GET",
            url: "{{ url('modulos/perfiles') }}",
            data: {id:Idperfil},
            success: function(response){
                // console.log("response agrupador: "+JSON.stringify(response.agrupador));
                // console.log("response modulos: "+JSON.stringify(response.modulos));
                    $.each(response, function(index, value){
                        llenar(response, index, value);
                    });
            },
        });
    // });
});

$("#perfiles").change(function(){
        // var Idperfil = $("#perfiles option:selected").val();
        var Idperfil = $("#perfiles").val();
        // console.log("IdperfilMMMM: "+Idperfil);
        $.ajax({
            type: "GET",
            url: "{{ url('modulos/perfiles') }}",
            data: {id:Idperfil},
            success: function(response){
                // console.log("response agrupador: "+JSON.stringify(response.agrupador));
                // console.log("response modulos: "+JSON.stringify(response.modulos));
                    $.each(response, function(index, value){
                        llenar(response, index, value);
                    });
              
            },
        });
});

// var Idperfil = $("#perfiles").val();
$("#perfiles").on("change",perfilesM);
// $("#perfiles").val(Idperfil).trigger('change');

var perfilesM = function(Idperfil){    
    var Idperfil = $("#perfiles").val();
    // var Idperfil=$("#perfiles").val()=Idperfil;
    //  var Idperfil = $("#perfiles").val();
    $.ajax({
            url:'{{ url("modulos/perfiles") }}',
            type:'get',
            dataType:"json",
            data: {"id":Idperfil},
            success:function(response){
                // console.log("response agrupador: "+JSON.stringify(response.agrupador));
                // console.log("response modulos: "+JSON.stringify(response.modulos));
                    $.each(response, function(index, value){
                        llenar(response, index, value);
                    });
            }
    });
}


//FIN PERFILES//

        //------- boton guardar permisos (Perfiles - Nomina) ------------
    	$('#create-permiso-nomina').click(function(event){
    		event.preventDefault();
    		var tree 		 = $('#treeperfil').fancytree('getTree');
            var treemenunomina = $('#treemenu').fancytree('getTree');
    		var str_permisos = '';
            var str_menunomina = '';
    		var contador 	 = 0;

            // arbol de perfiles
            nodosPadres      = getAllNodesParents( tree.getSelectedNodes() );
            listaNodosHijos  = getAllNodes( tree.getSelectedNodes() );
            listaNodosPadres = [];

            // arbol de menu nomina
            nodosPadresmenu      = getAllNodesParents( treemenunomina.getSelectedNodes() );
            listaNodosHijosmenu  = getAllNodes( treemenunomina.getSelectedNodes() );
            listaNodosPadresmenu = [];

            // arbol de perfiles
            $.each(nodosPadres,function( k,v ){
                listaNodosPadres.push( getNodeParent(v) );
            });

            // arbol de menu nomina
            $.each(nodosPadresmenu,function( k,v ){
                listaNodosPadresmenu.push( getNodeParent(v) );
            });

             // arbol de perfiles
            listaNodos = listaNodosHijos;

            // arbol de menu nomina
            listaNodosmenu =listaNodosHijosmenu

            // arbol de perfiles
            str_permisos = listaNodos.join("||");

            // arbol de perfiles
            str_menunomina = listaNodosmenu.join("||");


    		$('#lista_perfiles').val(str_permisos);
            $('#lista_menu_nomina').val(str_menunomina);
            console.log(' arbol perfil '+str_permisos+' arbol menu nomina '+str_menunomina);
            if(str_permisos == '' || str_menunomina == ''){
                $("#alertDanger").show();
                //$("#alertDanger").fadeOut(1000);

                setTimeout(function() {
                    $("#alertDanger").fadeOut();
                },5000);
            }else{
                console.log(' submit ');
                $("#create-permiso-nomina").val('Enviando...').attr('disabled','disabled');
                //$("").prop("disabled", false);
               $('#addpermiso-perfil-frm').submit();

            }


    	});
        //------- End boton guardar permisos (Perfiles - Nomina) ------------


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
                        return '<tr><td class="text-center hidden"><input type="hidden" name="NombreForm[]" value="'+data+'">'+data+'</td>';
                        
                    }
                },
                {
                    "className": "replyClass text-center hidden",
                    "data":"NombreGrupo",
                    "render": function (data) {
                        return '<tr><td class="text-center hidden"><input type="hidden" name="NombreGrupo[]" value="'+data+'">'+data+'</td>';
                        
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
                        return '<tr><td class="text-center"><input type="hidden" name="Caption[]" value="'+data+'">'+data+'</td>';
                        
                    }
                },
                {    
                   "data": "Acceder",
                   "className": "text-center",
                    render: function ( data, type, row ) {
                        if(row.Acceder=='Si'){
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Acceder'+row.NombreGrupo+'"  name="Acceder[]" checked onclick="toggleCheckBox(this.id)"></td>';
                       }else{
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Acceder'+row.NombreGrupo+'"  name="Acceder[]" onclick="toggleCheckBox(this.id)"></td>';
                       }
                    // return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Acceder'+row.NombreGrupo+'"  name="Acceder[]" {{  ('+row.Acceder  +' == "Si" ? "checked" : "") }} onclick="toggleCheckBox(this.id)"></td>';
                    }
                },
                {    
                   "data": "Insertar",
                   "className": "text-center",
                    render: function ( data, type, row ) {
                        if(row.Insertar=='Si'){
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Insertar'+row.NombreGrupo+'"  name="Insertar[]" checked onclick="toggleCheckBox(this.id)"></td>';
                       }else{
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Insertar'+row.NombreGrupo+'"  name="Insertar[]" onclick="toggleCheckBox(this.id)"></td>';
                       }
                    // return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Insertar'+row.NombreGrupo+'"  name="Insertar[]" {{  ('+row.Insertar  +' == "Si" ? "checked" : "") }} onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Insertar"  name="Insertar[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Editar",
                   "className": "text-center",
                    render: function ( data, type, row ) {
                        if(row.Editar=='Si'){
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Editar'+row.NombreGrupo+'"  name="Editar[]" checked onclick="toggleCheckBox(this.id)"></td>';
                       }else{
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Editar'+row.NombreGrupo+'"  name="Editar[]" onclick="toggleCheckBox(this.id)"></td>';
                       }
                    // return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Editar'+row.NombreGrupo+'"  name="Editar[]" {{  ('+row.Editar  +' == "Si" ? "checked" : "") }} onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Editar"  name="Editar[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Eliminar",
                   "className": "text-center",
                    render: function ( data, type, row ) {
                        if(row.Eliminar=='Si'){
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Eliminar'+row.NombreGrupo+'"  name="Eliminar[]" checked onclick="toggleCheckBox(this.id)"></td>';
                       }else{
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Eliminar'+row.NombreGrupo+'"  name="Eliminar[]" onclick="toggleCheckBox(this.id)"></td>';
                       }
                    // return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Eliminar'+row.NombreGrupo+'"  name="Eliminar[]" {{  ('+row.Eliminar  +' == "Si" ? "checked" : "") }} onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Eliminar"  name="Eliminar[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Exportar",
                   "className": "text-center",
                    render: function ( data, type, row ) {
                        if(row.Exportar=='Si'){
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Exportar'+row.NombreGrupo+'"  name="Exportar[]" checked onclick="toggleCheckBox(this.id)"></td>';
                       }else{
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Exportar'+row.NombreGrupo+'"  name="Exportar[]" onclick="toggleCheckBox(this.id)"></td>';
                       }
                    // return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Exportar'+row.NombreGrupo+'"  name="Exportar[]" {{  ('+row.Exportar  +' == "Si" ? "checked" : "") }} onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Exportar"  name="Exportar[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Plantilla",
                   "className": "text-center",
                    render: function ( data, type, row ) {
                        if(row.Plantilla=='Si'){
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Plantilla'+row.NombreGrupo+'"  name="Plantilla[]" checked onclick="toggleCheckBox(this.id)"></td>';
                       }else{
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Plantilla'+row.NombreGrupo+'"  name="Plantilla[]" onclick="toggleCheckBox(this.id)"></td>';
                       }
                    // return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Plantilla'+row.NombreGrupo+'"  name="Plantilla[]" {{  ('+row.Plantilla  +' == "Si" ? "checked" : "") }} onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Plantilla"  name="Plantilla[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Importar",
                   "className": "text-center",
                    render: function ( data, type, row ) {
                        if(row.Importar=='Si'){
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Importar'+row.NombreGrupo+'"  name="Importar[]" checked onclick="toggleCheckBox(this.id)"></td>';
                       }else{
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Importar'+row.NombreGrupo+'"  name="Importar[]" onclick="toggleCheckBox(this.id)"></td>';
                       }
                    // return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Importar'+row.NombreGrupo+'"  name="Importar[]" {{  ('+row.Importar  +' == "Si" ? "checked" : "") }} onclick="toggleCheckBox(this.id)"></td>';
                    }
                //    "render": function (data) {
                //     return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Importar"  name="Importar[]" {{  ('+data  +' == "Si" ? "checked" : "") }}></td>';
                //    }
                },
                {    
                   "data": "Imprimir",
                   "className": "text-center",
                    render: function ( data, type, row ) {
                        if(row.Imprimir=='Si'){
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Imprimir'+row.NombreGrupo+'"  name="Imprimir[]" checked onclick="toggleCheckBox(this.id)"></td>';
                       }else{
                            return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Imprimir'+row.NombreGrupo+'"  name="Imprimir[]" onclick="toggleCheckBox(this.id)"></td>';
                       }
                    // return '<td class="text-center"><input type="checkbox" class="form-check-input" id="Imprimir'+row.NombreGrupo+'"  name="Imprimir[]" {{  ('+row.Imprimir  +' == "Si" ? "checked" : "") }} onclick="toggleCheckBox(this.id)"></td>';
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

    
        var IdModulo=[];
        var NombreForm=[];
        var NombreGrupo=[];
        var Caption=[];
        var Acceder=[];
        var Insertar=[];
        var Editar=[];
        var Eliminar=[];
        var Exportar=[];
        var Plantilla=[];
        var Importar=[];
        var Imprimir=[];
        var ItemIndex=[];

        // var accederI=[];
        // var insertarI=[];
        // var editarI=[];
        // var eliminarI=[];
        // var exportarI=[];
        // var plantillaI=[];
        // var importarI=[];
        // var imprimirI=[];
        // var itemIndexI=[];

        $("#TablaEntradas").DataTable().rows().every( function () {
            var tr = $(this.node());
            var index= tr.index();
             var data = $('#TablaEntradas').DataTable().row(tr).data();
            //  console.log("data: "+JSON.stringify(data));
            //  console.log("Acceder: "+JSON.stringify(data['Acceder']));
             IdModulo.push(data['IdModulo']);
             NombreForm.push(data['NombreForm']);
             NombreGrupo.push(data['NombreGrupo']);
             Caption.push( data['Caption']);
             Acceder.push(data['Acceder']);
               
             Insertar.push(data['Insertar']);
             Editar.push(data['Editar']);
             Eliminar.push(data['Eliminar']);
             Exportar.push(data['Exportar']);
             Plantilla.push(data['Plantilla']);
             Importar.push(data['Importar']);
             Imprimir.push(data['Imprimir']);
             ItemIndex.push(index);
             var grupo = data['NombreGrupo'];
            this.child(format(tr.data('details-control'),response.modulos,grupo,index)).show();
            tr.addClass('shown');
            
        });
    
        // console.log("Accder: "+JSON.stringify(Acceder));
        ReTabla(IdModulo,NombreForm,NombreGrupo,Caption,Acceder,Insertar,Editar,Eliminar,Exportar,Plantilla,Importar,Imprimir,ItemIndex);

        $('#TablaEntradasC tbody').on('click', 'td.details-control', function() {
            
            var tr = $(this).closest('tr');
            
            var row = $('#TablaEntradasC').DataTable().row(tr);
            var data = $('#TablaEntradasC').DataTable().row(tr).data();
            
            var index= $(data[0]).attr("value");
            var grupo = $(data[2]).attr("value");
            
            if (row.child.isShown()) {
                row.child.hide();
                // formatCH().hide();
                // tr.removeClass('shown');
            } else {
                formatCH(row.child, response.modulos,grupo,index).show();
                tr.addClass('shown');
            }

        });
         
        function format (value,data,grupo,index) {
        
            var trHTML = '';
            // console.log("data: "+JSON.stringify(data));
            $.each(data, function (i, item) {
                if(grupo==item.NombreGrupo){
                   
                    index++;
                   
                    trHTML += '<tr>' +
                    '<td class="text-center hidden"><input type="checkbox" class="form-check-input name="IdModulo[]" value="'+item.IdModulo+'"></td>' +
                    '<td class="text-center hidden"><input type="hidden" name="NombreForm[]" value="'+item.NombreForm+'">'+item.NombreForm+'</td>' +
                    '<td class="text-center hidden"><input type="hidden" name="NombreGrupo[]" value="'+item.NombreGrupo+'">'+item.NombreGrupo+'</td>' +
                    '<td></td>' +
                    '<td class="text-center"><input type="hidden" name="Caption[]" value="'+item.Caption+'">'+item.Caption +'</td>' +
                    '<td class="text-center"><input type="checkbox" class="form-check-input Acceder'+item.NombreGrupo+'" id="Acceder"  name="Acceder['+index+']"      {{  ('+item.Acceder+' == "Si" ?   "checked" : "") }}>'+item.Acceder+'</td>' +
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
            
            //    return trHTML;
           return $(trHTML).toArray();   
            // callback($(trHTML)).show();
        }

        function format2 (value,data,grupo,index) {
        
        var trHTML = '';
        // console.log("data: "+JSON.stringify(data));
        $.each(data, function (i, item) {
            if(grupo==item.NombreGrupo){
               
                index++;
               
                trHTML += '<tr>';
                trHTML +='<td class="text-center hidden"><input type="checkbox" class="form-check-input name="IdModulo[]" value="'+item.IdModulo+'"></td>' ;
                trHTML +='<td class="text-center hidden"><input type="hidden" name="NombreForm[]" value="'+item.NombreForm+'">'+item.NombreForm+'</td>' ;
                trHTML +='<td class="text-center hidden"><input type="hidden" name="NombreGrupo[]" value="'+item.NombreGrupo+'">'+item.NombreGrupo+'</td>' ;
                trHTML +='<td></td>' ;
                trHTML +='<td class="text-center"><input type="hidden" name="Caption[]" value="'+item.Caption+'">'+item.Caption +'</td>' ;
                if(item.Acceder=='Si'){
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Acceder'+item.NombreGrupo+'" id="Acceder"  name="Acceder['+index+']" checked></td>' ;
                }else{
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Acceder'+item.NombreGrupo+'" id="Acceder"  name="Acceder['+index+']"></td>' ;
                }

                if(item.Insertar=='Si'){
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Insertar'+item.NombreGrupo+'" id="Insertar"  name="Insertar['+index+']" checked></td>' ;
                }else{
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Insertar'+item.NombreGrupo+'" id="Insertar"  name="Insertar['+index+']"></td>' ;
                }

                if(item.Editar=='Si'){
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Editar'+item.NombreGrupo+'" id="Editar"  name="Editar['+index+']" checked></td>' ;
                }else{
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Editar'+item.NombreGrupo+'" id="Editar"  name="Editar['+index+']"></td>' ;
                }

                if(item.Eliminar=='Si'){
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Eliminar'+item.NombreGrupo+'" id="Eliminar"  name="Eliminar['+index+']" checked></td>' ;
                }else{
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Eliminar'+item.NombreGrupo+'" id="Eliminar"  name="Eliminar['+index+']"></td>' ;
                }

                if(item.Exportar=='Si'){
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Exportar'+item.NombreGrupo+'" id="Exportar"  name="Exportar['+index+']" checked></td>' ;
                }else{
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Exportar'+item.NombreGrupo+'" id="Exportar"  name="Exportar['+index+']"></td>' ;
                }

                if(item.Plantilla=='Si'){
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Plantilla'+item.NombreGrupo+'" id="Plantilla"  name="Plantilla['+index+']" checked></td>' ;
                }else{
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Plantilla'+item.NombreGrupo+'" id="Plantilla"  name="Plantilla['+index+']"></td>' ;
                }

                if(item.Importar=='Si'){
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Importar'+item.NombreGrupo+'" id="Importar"  name="Importar['+index+']" checked></td>' ;
                }else{
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Importar'+item.NombreGrupo+'" id="Importar"  name="Importar['+index+']"></td>' ;
                }

                if(item.Imprimir=='Si'){
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Imprimir'+item.NombreGrupo+'" id="Imprimir"  name="Imprimir['+index+']" checked></td>' ;
                }else{
                    trHTML +='<td class="text-center"><input type="checkbox" class="form-check-input Imprimir'+item.NombreGrupo+'" id="Imprimir"  name="Imprimir['+index+']"></td>' ;
                }
                trHTML +='</tr>';
                
            }
           
        });
        
        //    return trHTML;
       return $(trHTML).toArray();   
        // callback($(trHTML)).show();
    }

        function formatCH (callback,data,grupo,index) {
          
            var trHTML = '';
            // var nod=index;
            $.each(data, function (i, item) {
                if(grupo==item.NombreGrupo){
                    index++;
                    // console.log("index-formtCH: "+index);
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
        
       
        function ReTabla (IdModulo,NombreForm,NombreGrupo,Caption,Acceder,Insertar,Editar,Eliminar,Exportar,Plantilla,Importar,Imprimir,ItemIndex) {
      
            $('#TablaEntradas').DataTable().destroy();
            $('#TablaEntradas').empty();
            // var cantMod=IdModulo.length;
            // var cantForm=NombreForm.length;
            // var cantGrupo=NombreGrupo.length;
            // var cantCaption=Caption.length;
            // var cantIndex=ItemIndex.length;
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
                // console.log("Acceder[i]: "+Acceder[i]);
                tableContent += "<tr>";
                tableContent += '<td class="text-center hidden"><input type="checkbox" class="form-check-input" name="IdModulo[]" value="'+ItemIndex[i]+'"></td>';
                tableContent += '<td class="text-center hidden"><input type="hidden" name="NombreForm[]" value="'+NombreForm[i]+'">'+NombreForm[i]+'</td>';
                tableContent += '<td class="replyClass text-center hidden"><input type="hidden" name="NombreGrupo[]" value="'+NombreGrupo[i]+'">'+NombreGrupo[i]+'</td>';
                tableContent += '<td class="details-control text-center clickable" data-toggle="collapse" data-target="#group-of-rows-1" aria-expanded="false" aria-controls="group-of-rows-1"><i class="details-control fa fa-plus" aria-hidden="true"></i></td>';
                tableContent += '<td class="text-center"><input type="hidden" name="Caption[]" value="'+Caption[i]+'">'+Caption[i]+'</td>';
                if(Acceder[i]=='Si'){
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Acceder'+NombreGrupo[i]+'"  name="Acceder['+ItemIndex[i]+']" checked onclick="toggleCheckBox(this.id)"></td>';
                }else{
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Acceder'+NombreGrupo[i]+'"  name="Acceder['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                }
                
                if(Insertar[i]=='Si'){
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Insertar'+NombreGrupo[i]+'"  name="Insertar['+ItemIndex[i]+']" checked onclick="toggleCheckBox(this.id)"></td>';
                }else{
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Insertar'+NombreGrupo[i]+'"  name="Insertar['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                }

                if(Editar[i]=='Si'){
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Editar'+NombreGrupo[i]+'"  name="Editar['+ItemIndex[i]+']" checked onclick="toggleCheckBox(this.id)"></td>';
                }else{
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Editar'+NombreGrupo[i]+'"  name="Editar['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                }

                if(Eliminar[i]=='Si'){
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Eliminar'+NombreGrupo[i]+'"  name="Eliminar['+ItemIndex[i]+']" checked onclick="toggleCheckBox(this.id)"></td>';
                }else{
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Eliminar'+NombreGrupo[i]+'"  name="Eliminar['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                }

                if(Exportar[i]=='Si'){
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Exportar'+NombreGrupo[i]+'"  name="Exportar['+ItemIndex[i]+']" checked onclick="toggleCheckBox(this.id)"></td>';
                }else{
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Exportar'+NombreGrupo[i]+'"  name="Exportar['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                }

                if(Plantilla[i]=='Si'){
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Plantilla'+NombreGrupo[i]+'"  name="Plantilla['+ItemIndex[i]+']" checked onclick="toggleCheckBox(this.id)"></td>';
                }else{
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Plantilla'+NombreGrupo[i]+'"  name="Plantilla['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                }

                if(Importar[i]=='Si'){
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Importar'+NombreGrupo[i]+'"  name="Importar['+ItemIndex[i]+']" checked onclick="toggleCheckBox(this.id)"></td>';
                }else{
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Importar'+NombreGrupo[i]+'"  name="Importar['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                }

                if(Imprimir[i]=='Si'){
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Imprimir'+NombreGrupo[i]+'"  name="Imprimir['+ItemIndex[i]+']" checked onclick="toggleCheckBox(this.id)"></td>';
                }else{
                    tableContent +='<td class="text-center"><input type="checkbox" class="form-check-input" id="Imprimir'+NombreGrupo[i]+'"  name="Imprimir['+ItemIndex[i]+']" onclick="toggleCheckBox(this.id)"></td>';
                }
                tableContent += "</tr>";
                
            }
           
            $("#TablaEntradas").append(tableContent);
            
            $('#TablaEntradasC').DataTable();

            $("#TablaEntradasC").DataTable().rows().every( function () {
                var data = this.data();
                var tr = this.node();
               
                var index= $(data[0]).attr("value");
                var grupo = $(data[2]).attr("value");
                
                this.child(format2($(data[3]).attr("class"),response.modulos,grupo,index)).show();
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
                                title: 'Crear clientes',
                                @if( in_array(1, $permisos_asignados) ) selected:true @endif
                            },
                            {   id: '2',
                                key: '2',
                                title: 'Eliminar clientes',
                                @if( in_array(2, $permisos_asignados) ) selected:true @endif
                            },
                            {   id: '3',
                                key: '3',
                                title: 'Editar clientes',
                                @if( in_array(3, $permisos_asignados) ) selected:true @endif
                            },
                             {   id: '21',
                                key: '21',
                                title: 'Cambiar cliente de CN',
                                @if( in_array(21, $permisos_asignados) ) selected:true @endif
                            }
                        ]},
                        { id: -2, key: '-2', title: 'Agenda', folder:true, children: [
                            {   id: '4',
                                key: '4',
                                title: 'Cancelar cita',
                                @if( in_array(4, $permisos_asignados) ) selected:true @endif
                            }
                        ]},
                        { id: -2, key: '-2', title: 'Cotizaciones', folder:true, children: [
                            {   id: '5',
                                key: '5',
                                title: 'Cotizaciones contrato',
                                @if( in_array(5, $permisos_asignados) ) selected:true @endif
                            }
                        ]},
                        {   id: '40',
                            key: '40',
                            title: 'Contratos CRM',
                            @if( in_array(40, $permisos_asignados) ) selected:true @endif
                        },
                        {   id: '41',
                            key: '41',
                            title: 'Correos CRM',
                            @if( in_array(41, $permisos_asignados) ) selected:true @endif
                        },
                        { id: 6, key: '6', title: 'Reportes', folder:true,
                        @if( in_array(6, $permisos_asignados) ) selected:true, @endif
                        children: [
                            { id: 7, key: '7', title: 'Ver reportes clientes con contrato', folder:true,
                            @if( in_array(7, $permisos_asignados) ) selected:true, @endif
                            children: [
                                {   id: '8',
                                    key: '8',
                                    title: 'Reportes clientes con contrato con filtro CN',
                                    @if( in_array(8, $permisos_asignados) ) selected:true @endif
                                },
                                {   id: '9',
                                    key: '9',
                                    title: 'Reportes clientes con contrato con filtro sector',
                                    @if( in_array(9, $permisos_asignados) ) selected:true @endif
                                },
                                {   id: '10',
                                    key: '10',
                                    title: 'Reportes clientes con contrato con filtro servicio',
                                    @if( in_array(10, $permisos_asignados) ) selected:true @endif
                                }



                            ]},
                            { id: 11, key: '11', title: 'Ver reportes citas', folder:true,
                            @if( in_array(11, $permisos_asignados) ) selected:true, @endif
                            children: [
                                {   id: '12',
                                    key: '12',
                                    title: 'Reportes citas con filtro de CN',
                                    @if( in_array(12, $permisos_asignados) ) selected:true @endif
                                },
                                {   id: '13',
                                    key: '13',
                                    title: 'Reportes citas con filtro de status',
                                    @if( in_array(13, $permisos_asignados) ) selected:true @endif
                                },
                                {   id: '14',
                                    key: '14',
                                    title: 'Reportes citas con filtro de usuario',
                                    @if( in_array(14, $permisos_asignados) ) selected:true @endif
                                }
                            ]},
                            { id: 15, key: '15', title: 'Ver reportes llamadas', folder:true,
                                @if( in_array(15, $permisos_asignados) ) selected:true, @endif
                             children: [
                                {   id: '16',
                                    key: '16',
                                    title: 'Reportes llamadas con filtro de CN',
                                    @if( in_array(16, $permisos_asignados) ) selected:true @endif
                                }
                            ]},
                            { id: 17, key: '17', title: 'Ver reportes cotizaciones', folder:true,
                            @if( in_array(17, $permisos_asignados) ) selected:true, @endif
                             children: [
                                {   id: '18',
                                    key: '18',
                                    title: 'Reportes cotizaciones con filtro de CN',
                                    @if( in_array(18, $permisos_asignados) ) selected:true @endif
                                },
                                {   id: '19',
                                    key: '19',
                                    title: 'Reportes cotizaciones con filtro de sector',
                                    @if( in_array(19, $permisos_asignados) ) selected:true @endif
                                },
                                {   id: '20',
                                    key: '20',
                                    title: 'Reportes cotizaciones con filtro de servicio',
                                    @if( in_array(20, $permisos_asignados) ) selected:true @endif
                                }

                            ]},
                            { id: 22, key: '22', title: 'Ver reportes prospectos', folder:true,
                            @if( in_array(22, $permisos_asignados) ) selected:true, @endif
                             children: [
                                {   id: '23',
                                    key: '23',
                                    title: 'Reportes prospecto con filtro de CN',
                                    @if( in_array(23, $permisos_asignados) ) selected:true @endif
                                },
                                {   id: '24',
                                    key: '24',
                                    title: 'Reportes prospecto con filtro de sector',
                                    @if( in_array(24, $permisos_asignados) ) selected:true @endif
                                },

                            ]}
                        ]}

                    ]},
                    { id: '39', key: '39', title: 'ESE', folder:true, @if( in_array(39, $permisos_asignados) ) selected:true, @endif children: [
                        { id: '37', key: '37', title: 'Ordenes de Servicio', folder:true, @if( in_array(37, $permisos_asignados) ) selected:true, @endif children: [
                            {   id: '25',
                                key:'25',
                                title: 'Ver ordenes de servicio',
                                @if( in_array(25, $permisos_asignados) ) selected:true, @endif
                            },
                            {   id: '26',
                                key:'26',
                                title: 'Cancelar orden de servicio',
                                @if( in_array(26, $permisos_asignados) ) selected:true, @endif
                            },
                            {   id: '27',
                                key:'27',
                                title: 'Cerrar orden de servicio',
                                @if( in_array(27, $permisos_asignados) ) selected:true, @endif
                            },
                            {   id: '28',
                                key: '28',
                                title: 'Ver detalle de orden de servicio',
                                @if( in_array(28, $permisos_asignados) ) selected:true, @endif
                            }
                        ]},
                        { id: '38', key: '38', title: 'Estudios Socioeconómicos', folder:true, @if( in_array(38, $permisos_asignados) ) selected:true, @endif children: [
                            {   id: '29',
                                key: '29',
                                title: 'Ver detalle del estudio',
                                @if( in_array(29, $permisos_asignados) ) selected:true, @endif
                            },
                            {   id: '30',
                                key: '30',
                                title: 'Ver ejecutivos asignados',
                                @if( in_array(30, $permisos_asignados) ) selected:true, @endif
                            }
                        ]},
                        { id: '31', key: '31', title: 'Investigadores', folder:true, @if( in_array(31, $permisos_asignados) ) selected:true, @endif children: [
                            {   id: '32',
                                key: '32',
                                title: 'Nuevos investigadores',
                                @if( in_array(31, $permisos_asignados) ) selected:true, @endif
                            }
                        ]},
                        {   id: '33',
                            key: '33',
                            title: 'Reporte',
                            folder:true,
                            @if( in_array(33, $permisos_asignados) ) selected:true, @endif
                        },
                        { id: '34', key: '34', title: 'Plantillas', folder:true, @if( in_array(34, $permisos_asignados) ) selected:true, @endif children: [
                            {   id: '35',
                                key: '35',
                                title: 'Nueva plantilla',
                                @if( in_array(35, $permisos_asignados) ) selected:true, @endif
                            }
                        ]}

                    ]},
                    { id: '-2', key: '-2', title: 'Catálogos', folder:true,  children: [
                        {   id: '44',
                            key:'44',
                            title: 'Catálogos clientes',
                            @if( in_array(44, $permisos_asignados) ) selected:true, @endif

                        },
                        {   id: '45',
                            key:'45',
                            title: 'Catálogos cotizaciones',
                            @if( in_array(45, $permisos_asignados) ) selected:true, @endif

                        },
                        {   id: '46',
                            key:'46',
                            title: 'Catálogos contratos',
                            @if( in_array(46, $permisos_asignados) ) selected:true, @endif

                        },
                        {   id: '47',
                            key: '47',
                            title: 'Catálogos ordenes de servicio',
                            @if( in_array(47, $permisos_asignados) ) selected:true, @endif

                        }
                    ]},
                    { id: '48', key: '48', title: 'Nómina', folder:true,  children: [
                        { id: '49', key: '49', title: 'Empleados', folder:true,  children: [
                            {   id: '50',
                                key:'50',
                                title: 'Ver Recibos de Empleado',
                                @if( in_array(50, $permisos_asignados) ) selected:true, @endif
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

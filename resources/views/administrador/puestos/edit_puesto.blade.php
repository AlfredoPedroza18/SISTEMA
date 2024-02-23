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
		            <h4 class="panel-title text-center">Permisos Web</h4>
		        </div>
		        <div class="panel-body">
		        	<div class="alert alert-info">
                        <h4><i class="fa fa-info-circle fa-lg"></i> Asignación de permisos</h4>
                    </div>

		            <div class="row">
						<div class="jumbotron">
                            {!! Form::model($puesto,[
                                'route'  => ['sig-erp-crm::modulo.administrador.puestos.update', $puesto],
	                			'method' => 'PUT',
	                			'class'  => 'form-horizontal',
                                'id'     => 'create-puesto-frm'])
			                !!}
	                     	@include('administrador.puestos.puesto_formulario')
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
                setTimeout(function() {
                    $("#alertDanger").fadeOut();
                },5000);
            }else{
                console.log(' submit ');
                $("#create-permiso-nomina").val('Enviando...').attr('disabled','disabled');
                $('#addpermiso-perfil-frm').submit();
            }
    	});
        //------- End boton guardar permisos (Perfiles - Nomina) ------------
    });

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
   //arbol de permisos se elimino ver detalle del estudio,eliminaar ESE, Se paso Ordenes de servicio a catalogos y Reportes (aqui hace la validación)
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
                            @if( in_array(51, $permisos_asignados) ) selected:true,  @endif
					        children: [
                                { 
                                    id: '52', 
                                    key: '52', 
                                    title: 'Empresas Facturadoras', 
                                    folder:true,
                                    @if( in_array(52, $permisos_asignados) ) selected:true,  @endif 
						            children: [
                                        {   
                                            id: '53',
                                            key:'53',
                                            title: 'Crear Empresas Facturadoras',
						            		@if( in_array(53, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '54',
                                            key:'54',
                                            title: 'Eliminar Empresas Facturadoras',
						            		@if( in_array(54, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '55',
                                            key:'55',
                                            title: 'Editar Empresas Facturadoras',
						            		@if( in_array(55, $permisos_asignados) ) selected:true @endif
                                        },
                                    ]
                                },
                                { 
                                    id: '56', 
                                    key: '56', 
                                    title: 'Empresas Maquiladoras', 
                                    folder:true, 
                                    @if( in_array(56, $permisos_asignados) ) selected:true,  @endif
						            children: [
                                        {   
                                            id: '57',
                                            key:'57',
                                            title: 'Crear Empresas Maquiladoras',
							            	@if( in_array(57, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '58',
                                            key:'58',
                                            title: 'Eliminar Empresas Maquiladoras',
							            	@if( in_array(58, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '59',
                                            key:'59',
                                            title: 'Editar Empresas Maquiladoras',
							            	@if( in_array(59, $permisos_asignados) ) selected:true @endif
                                        },
                                    ]
                                },
                                { 
                                    id: '60', 
                                    key: '60', 
                                    title: 'Departamentos', 
                                    folder:true,
                                    @if( in_array(60, $permisos_asignados) ) selected:true,  @endif 
						            children: [
                                        {   id: '61',
                                            key:'61',
                                            title: 'Crear Departamentos',
                                            @if( in_array(61, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '62',
                                            key:'62',
                                            title: 'Eliminar Departamentos',
                                            @if( in_array(62, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '63',
                                            key:'63',
                                            title: 'Editar Departamentos',
                                            @if( in_array(63, $permisos_asignados) ) selected:true @endif
                                        },
                                    ]
                                },
                                { 
                                    id: '64', 
                                    key: '64', 
                                    title: 'Puestos', 
                                    folder:true,@if( in_array(64, $permisos_asignados) ) selected:true,  @endif 
                                    children: [
                                        {   
                                            id: '65',
                                            key:'65',
                                            title: 'Crear Puestos',
                                            @if( in_array(65, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '66',
                                            key:'66',
                                            title: 'Eliminar Puestos',
                                            @if( in_array(66, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '67',
                                            key:'67',
                                            title: 'Editar Puestos',
                                            @if( in_array(67, $permisos_asignados) ) selected:true @endif
                                        },
                                    ]
                                },
                                { 
                                    id: '68', 
                                    key: '68', 
                                    title: 'Permisos', 
                                    folder:true, 
                                    @if( in_array(68, $permisos_asignados) ) selected:true, @endif						
                                    children: [
                                        {   
                                            id: '69',
                                            key:'69',
                                            title: 'Crear Permisos',
                                            @if( in_array(69, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '70',
                                            key:'70',
                                            title: 'Eliminar Permisos',
                                            @if( in_array(70, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '71',
                                            key:'71',
                                            title: 'Editar Permisos',
                                            @if( in_array(71, $permisos_asignados) ) selected:true @endif
                                        },
                                    ]
                                },
                                { 
                                    id: '72', 
                                    key: '72', 
                                    title: 'Usuarios', 
                                    folder:true,
                                    @if( in_array(72, $permisos_asignados) ) selected:true, @endif  
                                    children: [
                                        { 
                                            id: '73', 
                                            key: '73', 
                                            title: 'Usuarios Staff', 
                                            folder:true,
                                            @if( in_array(73, $permisos_asignados) ) selected:true, @endif
                                            children: [
                                                {   
                                                    id: '74',
                                                    key:'74',
                                                    title: 'Crear Usuarios Staff',
                                                    @if( in_array(74, $permisos_asignados) ) selected:true @endif
                                                },
                                                {   
                                                    id: '75',
                                                    key:'75',
                                                    title: 'Eliminar Usuarios Staff',
                                                    @if( in_array(75, $permisos_asignados) ) selected:true @endif
                                                },
                                                {   
                                                    id: '76',
                                                    key:'76',
                                                    title: 'Editar Usuarios Staff',
                                                    @if( in_array(76, $permisos_asignados) ) selected:true @endif
                                                },
                                        ]
                                        },
                                        { 
                                            id: '77', 
                                            key: '77', 
                                            title: 'Usuarios Candidato o Empleado', 
                                            folder:true,
                                            @if( in_array(77, $permisos_asignados) ) selected:true, @endif
                                            children: [
                                                {   
                                                    id: '78',
                                                    key:'78',
                                                    title: 'Crear Usuarios Candidato o Empleado',
                                                    @if( in_array(78, $permisos_asignados) ) selected:true @endif
                                                },
                                                {   
                                                    id: '79',
                                                    key:'79',
                                                    title: 'Eliminar Usuarios Candidato o Empleado',
                                                    @if( in_array(79, $permisos_asignados) ) selected:true @endif
                                                },
                                                {   
                                                    id: '80',
                                                    key:'80',
                                                    title: 'Editar Usuarios Candidato o Empleado',
                                                    @if( in_array(80, $permisos_asignados) ) selected:true @endif
                                                },
                                            ]
                                        },
                                        
                                        { 
                                            id: '85', 
                                            key: '85', 
                                            title: 'Usuarios Investigadores', 
                                            folder:true,
                                            @if( in_array(85, $permisos_asignados) ) selected:true, @endif
                                            children: [
                                                {   
                                                    id: '86',
                                                    key:'86',
                                                    title: 'Crear Usuarios Investigadores',
                                                    @if( in_array(86, $permisos_asignados) ) selected:true @endif
                                                },

                                                {   
                                                    id: '87',
                                                    key:'87',
                                                    title: 'Eliminar Usuarios Investigadores',
                                                    @if( in_array(87, $permisos_asignados) ) selected:true @endif
                                                },

                                                {   
                                                    id: '88',
                                                    key:'88',
                                                    title: 'Editar Usuarios Investigadores',
                                                    @if( in_array(88, $permisos_asignados) ) selected:true @endif
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
                                    @if( in_array(126, $permisos_asignados) ) selected:true ,@endif
                                    children: [
                                                {   
                                                    id: '127',
                                                    key:'127',
                                                    title: 'Cotizador Cat. de Serv',
                                                    @if( in_array(127, $permisos_asignados) ) selected:true,@endif
                                             
                                                },

                                                {   
                                                    id: '128',
                                                    key:'128',
                                                    title: 'Plantillas Cotizador',
                                                    @if( in_array(128, $permisos_asignados) ) selected:true ,@endif
                                                
                                                },

                                                {   
                                                    id: '129',
                                                    key:'129',
                                                    title: 'Plantillas Contratos',
                                                    @if( in_array(129, $permisos_asignados) ) selected:true ,@endif
                                              
                                                },

                                                {   
                                                    id: '130',
                                                    key:'130',
                                                    title: 'Impuestos',
                                                    @if( in_array(130, $permisos_asignados) ) selected:true ,@endif
                                              
                                                },

                                                {   
                                                    id: '131',
                                                    key:'131',
                                                    title: 'Codigos postales',
                                                    @if( in_array(131, $permisos_asignados) ) selected:true ,@endif
                                              
                                                },
                                    ]
                                  
                                },
                                {   
                                    id: '113',
                                    key: '113',
                                    title: 'Kardex',
                                    folder:true,
                                    @if( in_array(113, $permisos_asignados) ) selected:true @endif
                                },
                            ]
                        },
                        { 
                            id: '116', 
                            key: '116', 
                            title: 'CRM', 
                            folder:true, 
                            @if( in_array(116, $permisos_asignados) ) selected:true,  @endif  
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
                                            @if( in_array(1, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '2',
                                            key: '2',
                                            title: 'Eliminar clientes',
                                            @if( in_array(2, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '3',
                                            key: '3',
                                            title: 'Editar clientes',
                                            @if( in_array(3, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '21',
                                            key: '21',
                                            title: 'Cambiar cliente de CN',
                                            @if( in_array(21, $permisos_asignados) ) selected:true @endif
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
                                            @if( in_array(4, $permisos_asignados) ) selected:true @endif
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
                                            @if( in_array(5, $permisos_asignados) ) selected:true @endif
                                        }
                                    ]
                                },
                                {   
                                    id: '40',
                                    key: '40',
                                    title: 'Contratos CRM',
                                    @if( in_array(40, $permisos_asignados) ) selected:true @endif
                                },
                                {   
                                    id: '41',
                                    key: '41',
                                    title: 'Correos CRM',
                                    @if( in_array(41, $permisos_asignados) ) selected:true @endif
                                },
                                { 
                                    id: 6, 
                                    key: '6', 
                                    title: 'Reportes', 
                                    folder:true, @if( in_array(6, $permisos_asignados) ) selected:true, @endif
                                    children: [
                                        { 
                                            id: 7, 
                                            key: '7', 
                                            title: 'Ver reportes clientes con contrato', 
                                            folder:true,
                                            @if( in_array(7, $permisos_asignados) ) selected:true, @endif
                                            children: [
                                                {   
                                                    id: '8',
                                                    key: '8',
                                                    title: 'Reportes clientes con contrato con filtro CN',
                                                    @if( in_array(8, $permisos_asignados) ) selected:true @endif
                                                },
                                                {   
                                                    id: '9',
                                                    key: '9',
                                                    title: 'Reportes clientes con contrato con filtro sector',
                                                    @if( in_array(9, $permisos_asignados) ) selected:true @endif
                                                },
                                                {   
                                                    id: '10',
                                                    key: '10',
                                                    title: 'Reportes clientes con contrato con filtro servicio',
                                                    @if( in_array(10, $permisos_asignados) ) selected:true @endif
                                                }
                                            ]
                                        },
                                        { 
                                            id: 11, 
                                            key: '11', 
                                            title: 'Ver reportes citas', 
                                            folder:true,@if( in_array(11, $permisos_asignados) ) selected:true, @endif
                                            children: [
                                                {   
                                                    id: '12',
                                                    key: '12',
                                                    title: 'Reportes citas con filtro de CN',
                                                    @if( in_array(12, $permisos_asignados) ) selected:true @endif
                                                },
                                                {   
                                                    id: '13',
                                                    key: '13',
                                                    title: 'Reportes citas con filtro de status',
                                                    @if( in_array(13, $permisos_asignados) ) selected:true @endif
                                                },
                                                {   
                                                    id: '14',
                                                    key: '14',
                                                    title: 'Reportes citas con filtro de usuario',
                                                    @if( in_array(14, $permisos_asignados) ) selected:true @endif
                                                }
                                            ]
                                        },
                                        { 
                                            id: 15, 
                                            key: '15', 
                                            title: 'Ver reportes llamadas', 
                                            folder:true,
                                            @if( in_array(15, $permisos_asignados) ) selected:true, @endif
                                            children: [
                                                {   
                                                    id: '16',
                                                    key: '16',
                                                    title: 'Reportes llamadas con filtro de CN',
                                                    @if( in_array(16, $permisos_asignados) ) selected:true @endif
                                                }
                                            ]
                                        },
                                        { 
                                            id: 17, 
                                            key: '17', 
                                            title: 'Ver reportes cotizaciones', 
                                            folder:true,
                                            @if( in_array(17, $permisos_asignados) ) selected:true, @endif
                                            children: [
                                                {   
                                                    id: '18',
                                                    key: '18',
                                                    title: 'Reportes cotizaciones con filtro de CN',
                                                    @if( in_array(18, $permisos_asignados) ) selected:true @endif
                                                },
                                                {   
                                                    id: '19',
                                                    key: '19',
                                                    title: 'Reportes cotizaciones con filtro de sector',
                                                    @if( in_array(19, $permisos_asignados) ) selected:true @endif
                                                },
                                                {   
                                                    id: '20',
                                                    key: '20',
                                                    title: 'Reportes cotizaciones con filtro de servicio',
                                                    @if( in_array(20, $permisos_asignados) ) selected:true @endif
                                                }
                                            ]
                                        },
                                        { 
                                            id: 22, 
                                            key: '22', 
                                            title: 'Ver reportes prospectos', 
                                            folder:true,
                                            @if( in_array(22, $permisos_asignados) ) selected:true, @endif
                                            children: [
                                                {   
                                                    id: '23',
                                                    key: '23',
                                                    title: 'Reportes prospecto con filtro de CN',
                                                    @if( in_array(23, $permisos_asignados) ) selected:true @endif
                                                },
                                                {   
                                                    id: '24',
                                                    key: '24',
                                                    title: 'Reportes prospecto con filtro de sector',
                                                    @if( in_array(24, $permisos_asignados) ) selected:true @endif
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
                            @if( in_array(39, $permisos_asignados) ) selected:true, @endif
                            children: [
                                {   
                                    id: '89',
                                    key: '89',
                                    title: 'Nuevo / Solicitar Servicio',
                                    
                                    @if( in_array(89, $permisos_asignados) ) selected:true @endif

                                },
                                { 
                                    id: '38', 
                                    key: '38', 
                                    title: 'Estudios Socioeconómicos', 
                                    folder:true,
                                    @if( in_array(38, $permisos_asignados) ) selected:true, @endif  
                                    children: [
                                        {   
                                            id: '92',
                                            key:'92',
                                            title: 'Editar Estudios Socioeconómicos',
                                            @if( in_array(92, $permisos_asignados) ) selected:true @endif
                                        },
                                        
                                    ]
                                },
                                { 
                                    id: '100', 
                                    key: '100', 
                                    title: 'Configuraciones', 
                                    folder:true,
                                    @if( in_array(100, $permisos_asignados) ) selected:true, @endif
                                    children: [
                                        {   
                                            id: '102',
                                            key: '102',
                                            title: 'Aviso de privacidad',
                                            
                                            @if( in_array(102, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '105',
                                            key: '105',
                                            title: 'Servicios',
                                            
                                            @if( in_array(105, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '106',
                                            key: '106',
                                            title: 'Formatos Editor',
                                            
                                            @if( in_array(106, $permisos_asignados) ) selected:true @endif
                                        },
                                        {   
                                            id: '108',
                                            key: '108',
                                            title: 'Notificaciones',
                                            
                                            @if( in_array(108, $permisos_asignados) ) selected:true @endif
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
                                    @if( in_array(44, $permisos_asignados) ) selected:true @endif
                                },
                                {   
                                    id: '45',
                                    key:'45',
                                    title: 'Catálogos cotizaciones',
                                    @if( in_array(45, $permisos_asignados) ) selected:true @endif
                                },
                                {   
                                    id: '46',
                                    key:'46',
                                    title: 'Catálogos contratos',
                                    @if( in_array(46, $permisos_asignados) ) selected:true @endif
                                },
                                { 
                                    id: '37', 
                                    key: '37', 
                                    title: 'Ordenes de Servicio', 
                                    folder:true,
                                    @if( in_array(37, $permisos_asignados) ) selected:true, @endif
                                    children: [
                                        {   
                                            id: '25',
                                            key:'25',
                                            title: 'Editar ordenes de servicio',
                                            @if( in_array(25, $permisos_asignados) ) selected:true @endif
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
                            @if( in_array(48, $permisos_asignados) ) selected:true, @endif
                            children: [
                                { 
                                    id: '114', 
                                    key: '114', 
                                    title: 'Nóminas', 
                                    folder:true,
                                    @if( in_array(114, $permisos_asignados) ) selected:true, @endif  
                                    children: [
                                        {   
                                            id: '115',
                                            key:'115',
                                            title: 'Ver detalle de Nómina',
                                            @if( in_array(115, $permisos_asignados) ) selected:true @endif
                                        }
                                    ]
                                },
                                { 
                                    id: '49', 
                                    key: '49', 
                                    title: 'Empleados', 
                                    folder:true,
                                    @if( in_array(49, $permisos_asignados) ) selected:true,  @endif 
                                    children: [
                                        {   
                                            id: '50',
                                            key:'50',
                                            title: 'Ver Recibos de Empleado',
                                            @if( in_array(50, $permisos_asignados) ) selected:true @endif
                                        }
                                    ]
                                },
                            ]
                        },

                        { id: '120', key: '120', title: 'Facturación', folder:true, @if( in_array(120, $permisos_asignados) ) selected:true,  @endif  children: [
                                {   id: '121',
                                    key:'121',
                                    title: 'Facturación',
                                    @if( in_array(121, $permisos_asignados) ) selected:true  @endif 

                                }
                        ]},

                        { id: '122', key: '122', title: 'Encuestas', folder:true, 
                                    @if( in_array(122, $permisos_asignados) ) selected:true ,@endif  children: [
                                {   id: '123',
                                    key:'123',
                                    @if( in_array(123, $permisos_asignados) ) selected:true,  @endif 
                                    title: 'Nuevo servicio'

                                },
                                {   id: '124',
                                    key:'124',
                                    @if( in_array(124, $permisos_asignados) ) selected:true,  @endif
                                    title: 'Nom 035'

                                },
                                {   id: '125',
                                    key:'125',
                                    @if( in_array(125, $permisos_asignados) ) selected:true,  @endif
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
            buttons: ['copy', 'excel', 'pdf','print'],
            responsive: true,
            autoFill: true,
            "scrollY": "350px",
            "paging": false,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }
 
    var arbolPermisoNomina= function(){
        $("#treeperfil").fancytree({
            source:[
                { 
                    id: -1, 
                    key: '-1', 
                    title: 'Módulo',
                    folder:true, 
                    children: [
                        { 
                            id: -2, 
                            key: '-2', 
                            title: 'Nomina', 
                            folder:true, 
                            selected: true, 
                            children: [
                                {   
                                    id: '40',
                                    key: '40',
                                    title: 'permiso 1'
                                },
                                {   
                                    id: '41',
                                    key: '41',
                                    title: 'permiso 2'
                                }
                            ]
                        }
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
@extends('layouts.masterMenuView')

@section('estilos')



{!! Html::style('assets/css/bootstrap-duallistbox.css') !!}
{!! Html::style('assets/permisos/ui.fancytree.min.css') !!}





@endsection
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
        <li><a href="javascript:;">Administrador</a></li>

		<li><a href="{{ route('sig-erp-ese::roles.index') }}">Permisos</a></li>
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
		            <h4 class="panel-title text-center">Permisos Web</h4>
		        </div>
		        <div class="panel-body">
		        	<div class="alert alert-info">
                        <h4><i class="fa fa-info-circle fa-lg"></i> Asignación de permisos</h4>



                    </div>
		            <div class="row">

						<div class="jumbotron">

	                          {!! Form::open([
	                           				'route'  => 'sig-erp-ese::roles.store',
	                           				'method' => 'post',
	                           				'class'  => 'form-horizontal',
	                           				'id' 	 => 'create-puesto-frm'])


			                  !!}
	                     				@include('ESE.roles.puesto_formulario')
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

	var arbolPermisos = function(){
        $("#tree").fancytree({
            source:[
                { id: -1, key: '-1', title: 'Módulos',folder:true, children: [
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

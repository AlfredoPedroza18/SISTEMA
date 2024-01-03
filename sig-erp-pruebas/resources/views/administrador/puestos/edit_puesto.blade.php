@extends('layouts.master')

@section('estilos')



{!! Html::style('assets/css//bootstrap-duallistbox.css') !!}
{!! Html::style('assets/permisos/ui.fancytree.min.css') !!}


@endsection
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">	
        <li><a href="javascript:;">Administrador</a></li>	
		<li><a href="{{ url('modulo/administrador/cuentas') }}">Cuentas</a></li>
		<li><a href="{{ route('sig-erp-crm::modulo.administrador.puestos.index') }}">Puestos</a></li>
		<li><a href="javascript:;">Editar puesto</a></li>
		
	</ol>


	<!-- begin page-header -->
	<h1 class="page-header text-center">Puesto <small>Configuración de permisos </small></h1>
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
		            <h4 class="panel-title text-center">Permisos para el puesto</h4>
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
                                            'id'     => 'edit-puesto-frm'])          
			                  
			                  !!}
	                     				@include('administrador.puestos.puesto_formulario')
					          {!! Form::close() !!}
						</div>
			            
						
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
    	iniciarTabla();

        permisos.init();
        aliasPuesto();

        arbolPermisos();	

        $('#create-puesto').click(function(event){          
            event.preventDefault();
            var tree         = $('#tree').fancytree('getTree');
            var str_permisos = '';
            var contador     = 0; 

            nodosPadres      = getAllNodesParents( tree.getSelectedNodes() );
            listaNodosHijos  = getAllNodes( tree.getSelectedNodes() );
            listaNodosPadres = [];

            $.each(nodosPadres,function( k,v ){
                listaNodosPadres.push( getNodeParent(v) );
            });

            listaNodos = listaNodosHijos.concat( listaNodosPadres.unique() );

            
            str_permisos = listaNodos.join("||");
           
            $('#lista_permisos').val(str_permisos);

            $('#edit-puesto-frm').submit();
            
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

    };

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
              str_alias_puesto      = $.trim( $('#alias_puesto').val() );      
              str_alias_puesto      = str_alias_puesto.toLowerCase();
              arr_str_alias_puesto  = str_alias_puesto.split(" ");
              str_alias_puesto      = arr_str_alias_puesto.join('.'); 

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
</script>

@endsection
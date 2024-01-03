<!---------------------------------------------- SUBMENU ENCUESTAS ----------------------------------------->

@permission('ese.main')
<li class="has-sub {{ 	activarLink('dashboardencuestas').' '.
						activarLink('nuevoservicio').' '.
						activarLink('encuestas').' '.
						activarLink('nom035').' '.
						activarLink('catalogos_encuestas').' '.
						activarLink('evaluacion360').' '.
						activarLink('encuestaOS').' '.
						activarLink('configuracion_encuestas')}}">
	<a href="javascript:;">
		<b class="caret pull-right"></b>
		<i class="fa fa-clipboard"></i>
		<span @if( !Auth::user()->isForeing() )
				id="modulo-ese"
				@endif >Encuestas</span>
	</a>
	
	<ul class="sub-menu" id="menu-ese"> 
	<li class="{{ activarLink('dashboardencuestas') }}"><a href="{{ route('dashboardencuestas') }}">Dashboard</a></li>

	@permission('ese.solicitar.servicios')
	<li class="{{ activarLink('nuevoservicio') }}"><a href="{{ route('nuevoservicio') }}">Nuevo Servicio</a></li>
	@endpermission

	@permission('ese.lista.estudios')
	<li class="{{ activarLink('encuestas') }}"><a href="{{ route('encuestas') }}">Encuestas</a></li>
	@endpermission

	@permission('ese.ordenes.servicio.main')
	<li class="{{ activarLink('nom035') }}"> <a href="{{route('nom035')}}">Nom 035</a></li>
	@endpermission

	@permission('ese.ordenes.servicio.main')
	<li class="{{ activarLink('encuestaOS') }}"> <a href="{{route('encuestaOS')}}">Órdenes de servicio</a></li>
	@endpermission
	
	@permission('ese.ordenes.servicio.main')
	<li class="{{ activarLink('catalogos_encuestas') }}"> <a href="{{route('catalogos_encuestas')}}">Catálogos</a></li>
	@endpermission

	@permission('catalogos.ese.main')
	<li class="{{ activarLink('evaluacion360') }}"><a href="{{ route('evaluacion360') }}">Evaluación 360</a></li>
	@endpermission
	
	@permission('ese.configuraciones')
	<li class="{{ activarLink('configuracion_encuestas') }}"><a href="{{ route('configuracion_encuestas') }}">Configuración</a></li>
	@endpermission

	</ul>
</li>
@endif


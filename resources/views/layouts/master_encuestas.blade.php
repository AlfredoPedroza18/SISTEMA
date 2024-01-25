<!---------------------------------------------- SUBMENU ENCUESTAS ----------------------------------------->

@permission('encuestas.main|encuestas.nom035|encuestas.nuevo.servicio|encuestas.catalogos')
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
		<span  >Encuestas</span>
	</a>
	
	<ul class="sub-menu" > 
	<li class="{{ activarLink('dashboardencuestas') }}"><a href="{{ route('dashboardencuestas') }}">Dashboard</a></li>

	@permission('encuestas.nuevo.servicio')
	<li class="{{ activarLink('nuevoservicio') }}"><a href="{{ route('nuevoservicio') }}">Nuevo Servicio</a></li>
	@endpermission

	<!--@permission('ese.lista.estudios')
	<li class="{{ activarLink('encuestas') }}"><a href="{{ route('encuestas') }}">Encuestas</a></li>
	@endpermission-->

	@permission('encuestas.nom035')
	<li class="{{ activarLink('nom035') }}"> <a href="{{route('nom035')}}">Nom 035</a></li>
	@endpermission
	<!--
	@permission('ese.ordenes.servicio.main')
	<li class="{{ activarLink('encuestaOS') }}"> <a href="{{route('encuestaOS')}}">Órdenes de servicio</a></li>
	@endpermission
	-->
	@permission('encuestas.catalogos')
	<li class="{{ activarLink('catalogos_encuestas') }}"> <a href="{{route('catalogos_encuestas')}}">Catálogos</a></li>
	@endpermission
	<!--
	@permission('catalogos.ese.main')
	<li class="{{ activarLink('evaluacion360') }}"><a href="{{ route('evaluacion360') }}">Evaluación 360</a></li>
	@endpermission
	
	@permission('ese.configuraciones')
	<li class="{{ activarLink('configuracion_encuestas') }}"><a href="{{ route('configuracion_encuestas') }}">Configuración</a></li>
	@endpermission
-->
	</ul>
</li>
@endpermission


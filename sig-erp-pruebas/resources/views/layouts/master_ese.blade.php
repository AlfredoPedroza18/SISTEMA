
@permission('ese.ordenes.servicio|ese.ordenes.servicio.cancelar|ese.ordenes.servicio.cerrar|ese.ordenes.servicio.detalle|ese.acta.hechos')
<li class="has-sub {{ 	activarLink('os').' '.
						activarLink('detalleOsEstudio/*').' '.
						activarLink('estudio-ese').' '.
						activarLink('estudio-ese/*').' '.
						activarLink('formato-evenplan/*').' '.
						activarLink('estudio-ese-investigadores').' '.
						activarLink('reporte').' '.
						activarLink('estudio-ese-plantillas').' '.
						activarLink('estudio-ese-plantillas/*').' '.
						activarLink('estudio-ese-acta-hechos').' '.
						activarLink('dashboardese') }}">
	<a href="javascript:;">
		<b class="caret pull-right"></b>
		<i class="fa fa-2x fa-group"></i>
		<span 
				@if( !Auth::user()->isForeing() )
				id="modulo-ese"
				@endif >ESE</span>
	</a>
	<ul class="sub-menu" >   

		@if( !Auth::user()->isForeing() )
		@permission('ese.ordenes.servicio')
		<li class="{{ 	activarLink('os').' '.
						activarLink('detalleOsEstudio/*') }}"><a href="{{url('os')}}">Ordenes de Servicio</a></li>
		@endpermission
		@endif

		@permission('ese.lista.estudios.detalle|ese.lista.estudios.ejecutivos')
		<li class="{{ activarLink('estudio-ese').' '.activarLink('estudio-ese/*').' '.activarLink('formato-evenplan/*') }}"><a href="{{url('estudio-ese')}}">Estudios Socioeconómicos</a></li>
		@endpermission
		@if( !Auth::user()->isForeing() )
		@permission('ese.investigadores.nuevo')
		<li class="{{ activarLink('estudio-ese-investigadores') }}"><a href="{{url('estudio-ese-investigadores')}}">Investigadores</a></li>
		@endpermission
		@permission('ese.reporte')
		<li class="{{ activarLink('reporte') }}"><a href="{{url('reporte')}}">Reporte</a></li>
		@endpermission
		@permission('ese.plantillas.nueva')
		<li class="{{ activarLink('estudio-ese-plantillas').' '.activarLink('estudio-ese-plantillas/*') }}"><a href="{{url('estudio-ese-plantillas')}}">Plantillas</a></li>
		@endpermission

		@permission('ese.acta.hechos')
		 <li class="{{ activarLink('estudio-ese-acta-hechos') }}"><a href="{{url('estudio-ese-acta-hechos')}}">Acta de hechos</a></li>
		@endpermission
		@endif


	</ul>

</li>
@endif

<!-- begin sidebar minify button -->
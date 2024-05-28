
@permission('ese.main|ese.solicitar.servicios| ese.incidencias')

<li class="has-sub {{ 	activarLink('OrdenServicio').' '.

						activarLink('detalleOsEstudio/*').' '.

						activarLink('dashboard-ese').' '.

						activarLink('dashboard-ese/*').' '.

						activarLink('formato-evenplan/*').' '.

						activarLink('estudio-ese-investigadores').' '.

						activarLink('nuevasolicitud-ese').' '.

						activarLink('reporte').' '.

						activarLink('configuracion').' '.

						activarLink('estudio-ese-plantillas').' '.

						activarLink('estudio-ese-plantillas/*').' '.

						activarLink('estudio-ese-acta-hechos').' '.

						activarLink('dashboardese') }}">

	<a href="javascript:;">

		<b class="caret pull-right"></b>

		<i class="fa fa-2x fa-group"></i>

		<span @if( !Auth::user()->isForeing() )

				id="modulo-ese"

				@endif >ESE</span>

	</a>

	

	<!-- en el span: @if( !Auth::user()->isForeing() )

				id="modulo-ese"

				@endif -->

	<ul class="sub-menu" id="menu-ese"> 

	<li class="{{ activarLink('dashboardese') }}"><a href="{{ route('sig-erp-ese::dashboardese.index') }}">Dashboard</a></li>

	@permission('ese.solicitar.servicios')

	<li class="{{ activarLink('nuevasolicitudcliente-ese') }} {{ activarLink('NuevaOSCliente') }} {{ activarLink('ServxCliente') }}"><a href="{{ route('sig-erp-ese::NuevaOSCliente.index') }}">Nuevo / Solicitar Servicio</a></li>

	@endpermission

	<!--<li class="{{ activarLink('nuevasolicitud-ese') }} {{ activarLink('NuevaOS') }} {{ activarLink('PlantillaxCliente') }} {{ activarLink('ConfiguracionOS/*') }}"><a href="{{ route('sig-erp-ese::NuevaOS.index') }}">Crear Servicio</a></li>-->

	@permission('ese.lista.estudios')

	<li class="{{ activarLink('estudio-ese') }} {{ activarLink('ListadoOS') }} {{ activarLink('ListadoOS') }}"><a href="{{ route('sig-erp-ese::ListadoOS.index') }}">Estudios Socioeconómicos</a></li>

	@endpermission

	
	@permission('ese.incidencias')
	<li class="{{ activarLink('estudio-ese') }} {{ activarLink('ListadoOS') }} {{ activarLink('ListadoOS') }}"><a href="{{ route('sig-erp-ese::ListadoIncidencias.index') }}">Incidencias Legales</a></li>
	@endpermission


	<!-- <li class="{{ activarLink('estudio-ese-investigadores') }}"><a href="#">Investigadores</a></li> -->

	@permission('catalogos.ese.main')


	

	@endpermission



	@permission('ese.configuraciones|ese.editor.plantillas|ese.catalogo.servicios|ese.editor.notificaciones|ese.catalogo.avisoprivacidad')

	<li class="{{ activarLink('configuracion') }} {{ activarLink('PlantillaGenericaP')}}  {{ activarLink('PlantillaGenerica')}} {{ activarLink('Grupos')}} {{ activarLink('CatalogoTiposServicio')}}

	{{ activarLink('Campos')}} {{ activarLink('CamposxAgrupador')}} {{ activarLink('Subgrupos')}} {{ activarLink('AgrupadoresxContenedor')}} {{ activarLink('ConfiguracionEmail')}} {{ activarLink('PlantillaCliente')}}">

	<a href="{{ route('sig-erp-ese::configuracion.index') }}">Configuraciones</a></li>

	
	@endpermission

	@permission('ese.reporte')

	<li class="{{ activarLink('reporte') }}"><a href="#">Reportes</a></li>

	@endpermission

	{{-- <li class="{{ activarLink('reporte') }}"><a href="#">Reportes</a></li> --}}

		<!--@if( !Auth::user()->isForeing() )

		@permission('ese.ordenes.servicio')

		<li class="{{ 	activarLink('os').' '.

						activarLink('detalleOsEstudio/*') }}"><a href="{{url('os')}}">Ordenes de Servicio</a></li>

		@endpermission

		@endif-->



		<!-- @permission('ese.lista.estudios.detalle|ese.lista.estudios.ejecutivos') -->

		<!-- <li class="{{ activarLink('estudio-ese').' '.activarLink('estudio-ese/*').' '.activarLink('formato-evenplan/*') }}"><a href="{{url('estudio-ese')}}">Estudios Socioeconómicos</a></li> -->

		<!-- @endpermission -->

		<!-- @if( !Auth::user()->isForeing() )

		@permission('ese.investigadores.nuevo') -->

		<!-- <li class="{{ activarLink('estudio-ese-investigadores') }}"><a href="{{url('estudio-ese-investigadores')}}">Investigadores</a></li> -->

		<!-- @endpermission

		@permission('ese.reporte') -->

		<!-- <li class="{{ activarLink('reporte') }}"><a href="{{url('reporte')}}">Reportes</a></li> -->

		<!-- @endpermission -->

       <!--

		@permission('ese.plantillas.nueva')

		<li class="{{ activarLink('estudio-ese-plantillas').' '.activarLink('estudio-ese-plantillas/*') }}"><a href="{{url('estudio-ese-plantillas')}}">Plantillas</a></li>

		@endpermission



		@permission('ese.acta.hechos')

		 <li class="{{ activarLink('estudio-ese-acta-hechos') }}"><a href="{{url('estudio-ese-acta-hechos')}}">Acta de hechos</a></li>

		@endpermission

        -->



		@endif





	</ul>



</li>

@endif



<!-- begin sidebar minify button -->


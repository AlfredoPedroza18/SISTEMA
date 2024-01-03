<div class="jumbotron"> <!-- container -->
    
      <div class="row">

        <div class="col-md-12 col-sm-6">  
          <!-- begin page-header -->
          <h2 class="page-header text-center">Cuentas </h2>
          <!-- end page-header -->
        </div>
      </div>
  
      <div class="row">
          <div class="col-md-3 text-center">
            <ul class="social-network social-circle">
                <li><a href="{{route('sig-erp-crm::EmpresasFacturadoras.index')}}" class="icoRss text-center" title="Empresas"><i class="fa fa-building-o fa-2x"></i></a><h4>Empresas</h4></li>
            </ul>
          </div>

          <div class="col-md-2 text-center">
            <ul class="social-network social-circle">
                <li><a href="{{route('sig-erp-crm::departamentos.index')}}" class="icoFacebook" title="Departamentos"><i class="fa fa-cubes fa-2x"></i></a><h4>Departamentos</h4></li>
            </ul>
          </div>

          <div class="col-md-2 text-center">
            <ul class="social-network social-circle">
                <li><a href="{{ route('sig-erp-crm::modulo.administrador.puestos.index') }}" class="icoTwitter" title="Puestos"><i class="fa fa-tasks fa-2x"></i></a><h4>Puestos</h4></li>
            </ul>
          </div>


          <div class="col-md-2 text-center">
            <ul class="social-network social-circle">
                <li><a href="{{ route('sig-erp-crm::modulo.administrador.usuarios.index') }}" class="icoGoogle" title="Usuarios"><i class="fa fa-users fa-2x"></i></a><h4>Usuarios</h4></li>
            </ul>
          </div>

          <!-- Boton para agregar EMPLEADOS -->
          <div class="col-md-2 text-center">
              <ul class="social-network social-circle">
                  <li><a href="{{ route('sig-erp-crm::empleados.index') }}" class="icoRss" title="Empleados"><i class="fa fa-user fa-2x"></i></a><h4>Empleados</h4></li>
              </ul>
          </div><!-- Fin del boton agregar EMPLEADOS -->
          </div>
<hr>
        <div class="col-md-12 col-sm-6">  
          <!-- begin page-header -->
          <h2 class="page-header text-center">Configuración Cotizadores </h2>
          <!-- end page-header -->
        </div>
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                <center>Servicios</center>
            </button>
                <a href="{{ url('modulo/administrador/servicios/ese') }}" class="list-group-item list-group-item-action">  Estudios Socioeconomicos (ESE) <i class="fa fa-2x fa-gears pull-left"></i></a>
                <a href="{{ url('modulo/administrador/servicios/rys') }}" class="list-group-item list-group-item-action list-group-item-info">  Reclutamiento y seleccion (RyS) <i class="fa fa-2x fa-gears pull-left"></i></a>
                <a href="{{ url('servicio_maquila') }}" class="list-group-item list-group-item-action">  Maquila <i class="fa fa-2x fa-gears pull-left"></i></a>
                <a href="{{ url('listaPsicometricos') }}" class="list-group-item list-group-item-action list-group-item-info">  Pruebas Psicometricas <i class="fa fa-2x fa-gears pull-left"></i></a>
               <a href="{{ url('servicios_generales') }}" " class="list-group-item list-group-item-action list-group-item-info">General <i class="fa fa-2x fa-gears pull-left"></i></a>
          </div>
            </div>
          </div>
      </div>
     
      

      
      
      
</div><!-- end jumbobutron-->
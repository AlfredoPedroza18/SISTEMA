<?php



/*

|--------------------------------------------------------------------------

| Application Routes

|--------------------------------------------------------------------------

|

| Here is where you can register all of the routes for an application.

| It's a breeze. Simply tell Laravel the URIs it should respond to

| and give it the controller to call when that URI is requested.

|

*/



//	Route::get('/','HomeController@index');



/*Route::get('/', 'LoginUsersController@index');

Route::resource('modulos', 'LoginUsersController');

Route::resource('home', 'HomeController');

Route::resource('das','DashboardController');

*/

Route::post('clientes/crear', 'ClientesController@crearCliente');

Route::post('clientes/editar/edit{id}', 'ClientesController@update');

Route::post('clientes/editar/mostrarimagen', 'ClientesController@showPDF')->name('mostrar_img_src');

Route::delete('clientesEliminar/{id}','ClientesController@eliminar');

Route::post("setPermisoESE",'ClientesController@setRol')->name('setPermisoESE');

Route::get("permisosESE{id}",'Administrador\PermisosNomController@editESE')->name('permisosESE');

Route::post('catalogo/clientes','ClientesController@index')->name('catalogo/clientes');

Route::post('ConfiguracionCatalogoEncuesta','EncuestaClientesController@index')->name('ConfiguracionCatalogoEncuesta');



Route::group(['middleware' => ['web']], function () {

    Route::get('/home', 'HomeController@index');

    Route::auth();

    /*=========VISTAS LOGIN=========*/

    Route::get('staff', function () {

        return view('auth.staff');

    });

    Route::get('empleado', function () {

        return view('auth.empleado');

    });

    Route::get('cliente', function () {

        return view('auth.cliente');

    });

    Route::get('investigador', function () {

        return view('auth.investigador');

    });

    /*=========VISTAS LOGIN=========*/



    Route::post('vwempleado', 'UserViewsController@index');

    Route::get('/', 'Auth\AuthController@showLoginForm');

    Route::get('/permission_denied', function () {

        return view('errors.validacion-app');

    });

});

/*************************************************************************************

 * AREA PARA LOS CLIENTES

 *************************************************************************************/

Route::get('login/clientes', 'AuthClientesController@showLoginForm');

Route::post('login/clientes', 'AuthClientesController@login');

Route::get('logout/clientes', 'AuthClientesController@getLogout');

Route::get('expediente/files', 'FilesExpedientesController@showFiles');

/*************************************************************************************

 * FIN    AREA PARA LOS CLIENTESa

 *************************************************************************************/



/*************************************************************************************

 * AREA PARA LOS PROSPECTOS

 *************************************************************************************/

Route::get('prospecto/contacto/alta', 'ProspectosController@altaProspecto');

Route::post('prospecto/contacto/guardar', 'ProspectosController@guardar');

/*************************************************************************************

 * FIN AREA PARA LOS PROSPECTOS

 *************************************************************************************/



Route::group(['prefix' => 'utilerias',

    'as' => 'erp-utilerias::',

    'middleware' => ['auth', 'auth.module:crm']],

    function () {


        Route::resource('codigospostales','Utilerias\codigospostalesController');


        Route::resource('plantillas', 'Utilerias\PlantillasController');

        Route::resource('impuestos', 'Utilerias\ImpuestosController');

        /*----- PLANTILLAS CONTRATOS ---------*/

        Route::resource('plantilla_contratos', 'Utilerias\PlantillasContratosController');

        Route::POST('guardarContrato', 'Utilerias\PlantillasContratosController@GuardarContrato');

        Route::get('lista_plantillas_contratos', 'Utilerias\PlantillasContratosController@listaPlantillasContratos');

        Route::POST('update_contratos', 'Utilerias\PlantillasContratosController@UpdateContratos');

        Route::get('baja_contratos', 'Utilerias\PlantillasContratosController@BajaPlantillasContratos');

        Route::get('get_plantillas_contrato', 'Utilerias\PlantillasContratosController@getPlantllasContratos');

        /*----- PLANTILLAS CONTRATOS end ---------*/

    });



Route::group(['as' => 'sig-erp-crm::', 'middleware' => ['auth', 'auth.module:crm']], function () {

// Route::group(['as' => 'sig-erp-crm::'], function () {

    Route::resource('dashboard', 'DashboardController');

    Route::get('dashadministrador', 'DashboardController@Administrador');

    Route::resource('clientes', 'ClientesController');



    Route::resource('facturacion', 'Facturacion\FacturacionController');

    Route::resource('dashboardEmpleado', 'DasboardEmpleadoController');



    Route::resource('catalogo/clientes','ClientesController');



    Route::get('getCurp', 'ClientesController@getCURP');

    Route::get('getRfc', 'ClientesController@getRFC');

    Route::get('save', 'ClientesController@saveContactos');

    Route::get('validador_campos_cliente', 'ClientesController@validarCamposCliente');

    Route::get('validarNombreComercial', 'ClientesController@validarNombreComercial');



    Route::resource('cn', 'CNController');

    Route::get('lista_cn', 'CNController@listaCN');



    Route::resource('ejecutivos', 'EjecutivosController');

    Route::get('lista_ejecutivos', 'EjecutivosController@listadoEjecutivos');



    Route::resource('cp', 'CpController');

    Route::get('lista_cp', 'CpController@listaCp');

    Route::get('lista_clientes', 'ClientesController@listaClientes');

    Route::get('list_cps', 'CpController@listaCodigoPostal');



    Route::resource('validacion', 'ClientesController');

    Route::get('validacion', 'ClientesController@ValidacionClientes');

    Route::get('ValUsers', 'ClientesController@ValidacionUsuarios');

    Route::resource('catalogo/usuariosclientes', 'ClientesController');

    Route::get('cselect', 'ClientesController@selectClientes');

    Route::get('ValEmails', 'ClientesController@ValidacionEmails');



    Route::resource('accionXcliente', 'AccionXclienteController');



    Route::resource('accionClientes', 'AccionXclienteController');

    Route::get('accionXclientes', 'AccionXclienteController@ValidacionClientes');



    Route::get('downloadFile/{carpetacliente}/{pathToFile}', 'AccionXclienteController@downloadAnexo');

    Route::resource('contactos', 'ContactosController');

    Route::get('lista_contactos', 'ContactosController@listaContactos');

    Route::get('lista_contactos_correos', 'ContactosController@listaContactosCorreos');



    Route::resource('correos', 'CorreosController');

    Route::get('lista_correos', 'CorreosController@correosContactos');

    Route::get('listado_borradores', 'CorreosController@listadoBorradores');

    Route::get('all_borradores', 'CorreosController@getAllBorradores');

    Route::post('upload_file', 'CorreosController@uploadFile');

    Route::post('upload_file_email', 'CorreosController@uploadFileEMail');

    Route::get('cantidad_borradores', 'CorreosController@cantidadBorradores');



    Route::resource('agenda', 'agendaController');

    Route::get('agendaListado', 'agendaController@listadoEventos');



    Route::resource('cotizador', "CotizadorController");

    Route::get('serviciosCotizador', 'CotizadorController@listaServicios');

    Route::get('listCN', 'CotizadorController@listaCN');

    Route::get('listado_cotizaciones', 'CotizadorController@listadoCotizaciones');

    Route::get('catalogo/listado_cotizaciones', 'CotizadorController@listadoCotizaciones');

    Route::get('all_cotizaciones', 'CotizadorController@getListaCotizaciones');

    route::get('ListadoPlantillasContratos', 'CotizadorController@ListadoPlantillasContratos');



    Route::get('files_user', 'CorreosController@filesUser');

    Route::get('enviar_mail', 'CorreosController@enviarMail');



    Route::get('cotizador_general', 'CotizadorGenericoController@index');

    Route::post('cotizador_general', 'CotizadorGenericoController@store');



    Route::resource('cartas_tipo', 'CartasTipoController');

    Route::get('lista_cartas_tipo', 'CartasTipoController@listaCartasTipo');

    Route::get('get_carta_tipo', 'CartasTipoController@getCartaTipo');



    Route::resource('listaEseCosto', 'CotizadorEseController');

    Route::get('ese_costo_normal', 'CotizadorEseController@visualizaCostoNormal');

    Route::get('ese_costo_urgente', 'CotizadorEseController@visualizaCostoUrgente');

    Route::get('listaReferenciaLaborales', 'CotizadorEseController@visualizaCostoReferenciaLaborales');

    Route::get('listado_estados', 'CotizadorEseController@ListaEstado');

    Route::get('listado_tipo_servicio_ese', 'CotizadorEseController@listaTipoServicio');



    Route::resource('listaPsicometricos', 'CotizadorPsicometricoController');



    Route::get('listaCatalogoPsicometricos', 'CotizadorPsicometricoController@listaCatalogoServicios');

    Route::get('listaCostoPsicometricos', 'CotizadorPsicometricoController@visualizaCostoPsico');

    Route::get('listaConfigPsicometrico', 'CotizadorPsicometricoController@listaConfigPsicometrico');

    Route::post("ConfiguracionCostoPsicometrico", "CotizadorPsicometricoController@ConfiguracionCostoPsicometrico");

    Route::get("editPrueba", "CotizadorPsicometricoController@editPrueba");

    Route::post("AltaPaquetePsicometrico", "CotizadorPsicometricoController@AltaPaquetePsicometrico");



    Route::resource('servicio_rys', 'CotizadorRYSController');

    Route::get('genera_costo_rys', 'RYSController@generaCosto');

    Route::get('descarga_rys/{id}', 'CotizadorRYSController@downloadCotizacionRYS');



    Route::resource('servicio_maquila', 'CotizadorMaquilaController');

    Route::get('maquila_cotizador', 'CotizadorMaquilaController@cotizacionMaquila');

    Route::get('descarga_maquila/{id}', 'CotizadorMaquilaController@downloadCotizacionMaquila');

    Route::get('descarga_ese/{id}', 'CotizadorEseController@downloadCotizacionEse');

    Route::get('descarga_psicometrico/{id}', 'CotizadorPsicometricoController@downloadCotizacionPsico');

    Route::get('listaPaquete', 'CotizadorMaquilaController@listaPaquete');

    Route::post('ConfiguracionCostoMaquila', 'CotizadorMaquilaController@ConfiguracionCostoMaquila');

    Route::get("listaPaqueteMaqDescripcion", "CotizadorController@listaPaqueteMaqDescripcion");

    Route::post('ConfiguracionCostoMaquilaAlta', 'CotizadorMaquilaController@ConfiguracionCostoMaquilaAlta');

    Route::get('editConfMaquila', 'CotizadorMaquilaController@editarConfiguracion');

    Route::get('MostrarPaquetes', 'CotizadorMaquilaController@MostrarPaquetes');



    /*********************** ALTA DE SERVICIOS COTIZADOR GENERAL +++++++++++++++++++++++**/



    Route::resource('servicios_generales', 'Administrador\CotizadorGeneralServiciosController');

    Route::post('AltaServicios', 'Administrador\CotizadorGeneralServiciosController@AltaServicios');

    Route::get('EdicionServicios', 'Administrador\CotizadorGeneralServiciosController@EdicionServicios');

    Route::post('UpdateServicios', 'Administrador\CotizadorGeneralServiciosController@UpdateServicios');

    Route::get('EliminarServicios', 'Administrador\CotizadorGeneralServiciosController@EliminarServicios');

    Route::post('DeleteServicio', 'Administrador\CotizadorGeneralServiciosController@DeleteServicio');

    /**********************   DESCARGA DESDE EL MODULO DE CATALOGOS *******************/



    Route::get('catalogo/maquila_cotizador', 'CotizadorMaquilaController@cotizacionMaquila');

    Route::get('catalogo/descarga_maquila/{id}', 'CotizadorMaquilaController@downloadCotizacionMaquila');

    Route::get('catalogo/descarga_ese/{id}', 'CotizadorEseController@downloadCotizacionEse');

    Route::get('catalogo/descarga_psicometrico/{id}', 'CotizadorPsicometricoController@downloadCotizacionPsico');

    Route::post('catalogo/descarga_generico}', 'CotizadorGenericoController@downloadCotizacionGenerica')->name('download.cotizacion.generica');

    Route::post('plantilla_generica/duplicate', 'Utilerias\PlantillasController@duplicateTemplate')->name('duplicate.cotizacion.generica');



    /**********************   DESCARGA DESDE EL MODULO DE CATALOGOS *******************/



    Route::resource('expediente', 'ExpedienteController');

    Route::get('expediente_ids/{id_user}/{idcli}/{nombre_comercial}', 'ExpedienteController@RecibirID');



    Route::resource('ver_documentos', 'ExpedienteController@verArchivos');

    Route::get('download_anexo_cliente/{carpetacliente}/{pathToFile}', 'ExpedienteController@download_anexo_cliente');



    Route::resource('contrato_rys', 'ContratoRYSController');

    Route::resource('contrato_maquila', 'ContratoMaquilaController');

    Route::resource('contrato_ese', 'ContratoESEController');

    Route::resource('contrato_psicometricos', 'ContratoPsicometricoController');

    Route::resource('contrato_eva', 'ContratoEVAController'); /* DGE */

    Route::resource('contrato_generico', 'ContratoGenericoController');





    /******************************************************************************

     * CONTRATOS

     ******************************************************************************/

    Route::resource('listado_contratos', "ListadoContratoController");

    Route::resource('catalogo/listado_contratos', "ListadoContratoController");

    Route::get('contrato_rys_preview/{id}', 'ContratoRYSController@preview');

    Route::get('contrato_maquila_preview/{id}', 'ContratoMaquilaController@preview');

    Route::get('contrato_ese_preview/{id}', 'ContratoESEController@preview');

    Route::get('contrato_psiometricos_preview/{id}', 'ContratoPsicometricoController@preview');

    Route::get('contrato_evas_preview/{id}', 'ContratoEVAController@preview'); /* DGE */

    Route::get('contrato_generico_preview/{id}', 'ContratoGenericoController@preview');



    /******************************************************************************

     * FIN CONTRATOS

     ******************************************************************************/



    /******************************************* REPORTES CRM **********************************/

    Route::resource("ClientesContratos", "ClientesContratosController");

    Route::resource("ClientesExpedientes", "ClientesExpedientesController");

    Route::resource("ReportesCitas", "ReportesCitasController");

    Route::resource("ReportesLLamadas", "ReportesllamadasController");

    Route::resource("ReportesCotizaciones", "ReportesCotizacionesController");

    Route::get('reporteContratos', 'ClientesContratosController@listarContratos');

    Route::get('reporteCitas', 'ReportesCitasController@listarCitas');

    Route::resource("ReporteProspectos", "ReporteProspectosController");

    Route::get("listaProspectos", "ReporteProspectosController@ListadoProspectos");



    /******************************************* END REPORTES CRM **********************************/



    /*********************************************************************************************************************

     * GENERACIÓN DE CONTRATOS WORD

     *********************************************************************************************************************/

    /*Route::get('descarga_contrato_ese',function(){

        return view('crm.contratos.pdf-contrato_ese');

     });*/

    Route::get('descarga_anexo_contrato_ese', function () {

        return view('crm.contratos.pdf-anexo-contrato_ese');

    });



    Route::get('descarga_anexo_contrato_rys', function () {

        return view('crm.contratos.pdf-anexo_contrato_rys');

    });

    /* Route::get('descarga_contrato_psicometricos',function(){

        return view('crm.contratos.pdf-contrato_psico');

     });*/

    Route::get('descarga_contrato_maquila/{id_cotizacion}', 'ContratoMaquilaController@downloadWord');

    Route::get('descarga_contrato_rys/{id_cotizacion}', 'ContratoRYSController@downloadWord');

    Route::get('descarga_contrato_psicometricos/{id_cotizacion}', 'ContratoPsicometricoController@downloadWord');

    Route::get('descarga_contrato_ese/{id_cotizacion}', 'ContratoESEController@downloadWord');

    Route::get('descarga_contrato_generico/{id_cotizacion}', 'ContratoGenericoController@downloadWord');

    /*********************************************************************************************************************

     * FIN GENERACIÓN DE CONTRATOS WORD

     *********************************************************************************************************************/





    /*********************************************************************************************************************

     * URL PARA REPORTES

     *********************************************************************************************************************/

    Route::get('reportes_get_cn', 'ReportesCotizacionesController@listaReportesCn');

    Route::get('reportes_get_servicio', 'ReportesCotizacionesController@listaReportesServicio');

    Route::get('reportes_get_sector', 'ReportesCotizacionesController@listaReportesSector');

    Route::get('reporte_cotizaciones', 'ReportesCotizacionesController@reporteCotizaciones');

    Route::get('reporte_llamadas', 'ReportesllamadasController@reporteLlamadas');

    /*********************************************************************************************************************

     * FIN URL PARA REPORTES

     *********************************************************************************************************************/





    /*********************************************************************************************************************

     * ESTADISTICAS DASHBOARD

     *********************************************************************************************************************/

    Route::get('estadisticas_cuadros', 'DashboardController@cuadrosEstadisticos');

    Route::get('clientes_mes_dashboard', 'DashboardController@portletClientesMes');

    /*********************************************************************************************************************

     * FIN ESTADISTICAS DASHBOARD

     *********************************************************************************************************************/





    /*********************************************************************************************************************

     * ORDEN DE SERVICIO

     *********************************************************************************************************************/





    Route::resource('ordenes_servicio', 'OS\OrdenServicioController');

    Route::resource('orden-servicio-ese', 'OS\OrdenServicioEseController');

    Route::resource('orden-servicio-rys', 'OS\OrdenServicioRYSController');

    Route::resource('orden-servicio-maquila', 'OS\OrdenServicioMaquilaController');

    Route::resource('orden-servicio-psicometricos', 'OS\OrdenServicioPsicometricosController');

    Route::resource('orden-servicio-eva', 'OS\OrdenServicioEVAController'); /* DGE */



    /*****************************************************************************************************************/

    Route::get('download_orden_servicio_ese/{id}', 'OS\OrdenServicioEseController@download');

    Route::get('download_orden_servicio_rys/{id}', 'OS\OrdenServicioRYSController@download');

    Route::get('download_orden_servicio_maquila/{id}', 'OS\OrdenServicioMaquilaController@download');

    Route::get('download_orden_servicio_psicometricos/{id}', 'OS\OrdenServicioPsicometricosController@download');

    Route::get('download_orden_servicio_eva/{id}', 'OS\OrdenServicioEVAController@download'); /* DGE */

    /*****************************************************************************************************************/



    /*********************************************************************************************************************

     * FIN ORDEN DE SERVICIO

     *********************************************************************************************************************/



    /************************** CAMBIAR CLIENTE DE CN ********************************/

    Route::get('cambiarClienteCN', 'ClientesController@cambiarCn');

    /************************** CAMBIAR CLIENTE DE CN ********************************/

    Route::get('getCentroNegocio/{IdCliente}','ClientesController@getCentroNegocio');

});





/*********************************************************************************************************************

 * INICIO ADMINISTRADOR

 *********************************************************************************************************************/

// Route::group(['as' => 'sig-erp-crm::', 'middleware' => ['role:admin']], function () {

Route::group(['as' => 'sig-erp-crm::'], function () {



    // Route::post('modulo/administrador/usuarios/existe/{id}', 'Administrador\UsuarioController@existe');



    Route::get('existeCl/{datos}', 'Administrador\UsuarioController@existecl');

    Route::get('existeClient/{datos}', 'Administrador\UsuarioController@existeclient');

    Route::get('existeUs/{datos}', 'Administrador\UsuarioController@existeus');

    Route::get('existeEm/{datos}', 'Administrador\UsuarioController@existeem');

    Route::get('existeCurp/{datos}', 'Administrador\UsuarioController@existecurp');

    Route::get('modulo/administrador/usuarios/empleados', 'Administrador\UsuarioController@empleado');

    Route::get('modulo/administrador/usuarios/empleados/nuevo-empleado', 'Administrador\UsuarioController@createEmpleado');

    Route::post('modulo/administrador/usuarios/empleados', 'Administrador\UsuarioController@postAuth');

    Route::get('modulo/administrador/usuarios/empleados/editar/{id}', 'Administrador\UsuarioController@editarEmpleado');

    Route::post('modulo/administrador/usuarios/empleados/editar/{id}', 'Administrador\UsuarioController@postEdit');

    Route::get('modulo/administrador/usuarios/empleados/eliminar/{id}', 'Administrador\UsuarioController@eliminarEmpleado');

    Route::get('empleados/select', 'Administrador\UsuarioController@selectEmpleado');



    Route::get('modulo/administrador/usuarios/clientes', 'Administrador\UsuarioController@cliente');

    Route::get('modulo/administrador/usuarios/clientes/nuevo-cliente', 'Administrador\UsuarioController@createCliente');

    Route::post('modulo/administrador/usuarios/clientes', 'Administrador\UsuarioController@postAuthCliente');

    Route::get('modulo/administrador/usuarios/clientes/editar/{id}', 'Administrador\UsuarioController@editarCliente');

    Route::post('modulo/administrador/usuarios/clientes/editar/{id}', 'Administrador\UsuarioController@postEditCliente');

    Route::get('modulo/administrador/usuarios/clientes/eliminar/{id}', 'Administrador\UsuarioController@eliminarCliente');





    Route::get('modulo/administrador/perfil/nuevo', 'Administrador\PerfilController@create');

    Route::post('modulo/administrador/perfil/add', 'Administrador\PerfilController@store');

    Route::get('modulo/administrador/perfil/list', 'Administrador\PerfilController@getPerfil');



    Route::get('modulo/administrador/menu/list', 'Administrador\MasterMenuController@getMenu');



    // Route::post('modulo/administrador/usuarios/empleados','Administrador\UsuarioController@saveempleado');



    Route::resource('modulo/administrador/usuarios', 'Administrador\UsuarioController');

    Route::post('new-foreign-user', 'Administrador\UsuarioController@usuarioForaneo');

    Route::resource('modulo/administrador/puestos', 'Administrador\PuestoController');

    Route::get('modulos/perfiles', 'Administrador\PuestoController@ModulosxPerfil');

    Route::get('modulos/save', 'Administrador\PuestoController@SavePerfilNomina');

    // Route::get('UpdateNomina/editar/{id}', 'Administrador\PuestoController@editarCliente');

    Route::post('UpdateNomina/{id}', 'Administrador\PuestoController@UpdateNomina');



    Route::get('permisos', 'Administrador\PermisosNomController@index');

    Route::get('permisos/editar/{id}', 'Administrador\PermisosNomController@edit');

    Route::post('permisos/save', 'Administrador\PermisosNomController@save');



    Route::get('modulo/administrador/permisos', 'Administrador\PermisosNomController@index');

    Route::get('modulo/administrador/permisos/editar/{id}', 'Administrador\PermisosNomController@edit');

    Route::post('CatalogoAnalistas/save', 'Administrador\PermisosNomController@save');





    Route::resource('modulo/administrador/kardex', 'Administrador\KardexController');

    Route::get('modulo/administrador/cuentas', 'Administrador\CuentaController@index');

    Route::resource('modulo/administrador/cotizador', 'Administrador\CotizadoresController');

    Route::resource('modulo/administrador/cotizador', 'Administrador\CotizadoresController');

    Route::resource('modulo/administrador/perfil', 'Administrador\PerfilController');



    Route::post('modulo/administrador/puestos/add', 'Administrador\PuestoController@addPermisoNomina');

    /*********************************************************************************************************

     * SERVICIOS

     *********************************************************************************************************/



    Route::get('modulo/administrador/servicios/rys', 'Administrador\RysController@index');

    Route::resource('modulo/administrador/servicios/rys', 'RysController');

    Route::get('get_rys_servicio', 'RysController@getServicioRys');



    Route::resource('modulo/administrador/servicios/ese', 'EseController');

    Route::get('modulo/administrador/servicios/listado-estudios-ese', 'EseController@getListadoTiposEstudio');



    Route::post('prioridad_ese_store', 'EseController@savePrioridad');

    Route::post('tipo_servicio_ese_store', 'EseController@saveTipoServicio');



    Route::get('get_prioridad_ese', 'EseController@getPrioridad');

    Route::post('prioridad_ese_edit', 'EseController@editPrioridad');



    Route::get('tipo_estudio_ese_edit', 'EseController@getTipoEstudio');

    Route::post('tipo_estudio_ese_edit', 'EseController@editTipoEstudio');



    Route::resource('modulo/administrador/servicios/ave', 'AVEController'); /* DGE */





    /*********************************************************************************************************

     * FIN SERVICIOS

     *********************************************************************************************************/





    /* <==================================== INICIO EMPRESAS FACTURADORAS ====================================>*/





    Route::resource('EmpresasFacturadoras', 'Administrador\EmpresasFacturadorasController');

    Route::post('Empleados_search_cp','Administrador\EmpresasFacturadorasController@searchCP');

    Route::get('EmpresasMaquiladoras','Administrador\EmpresasFacturadorasController@indexEmpresaMaquiladora');

    Route::resource('Menu-user', 'Administrador\UserMenuController');







    Route::get('info-comercial', function () {



        return view('administrador.empresas.infocomer');

    });



    Route::get('anexo-documentos', function () {



        return view('administrador.empresas.anexo');

    });





    /* <==================================== FIN EMPRESAS FACTURADORAS ====================================>*/



    /**************************** DEPARTAMENTOS **********************************************************************/

    Route::resource('departamentos', 'Administrador\departamentosController');

    Route::get('modulo/administrador/cuentas/lista_modulos_permisos', 'Administrador\PermisosController@listaModulosPrincipales');

    Route::get('modulo/administrador/cuentas/lista_sub_modulos_permisos', 'Administrador\PermisosController@listaSubModulos');





    /**************************** END DEPARTAMENTOS **********************************************************************/



    /****************************CATALOGO DE PUESTOS *********************************************************************/



    Route::resource('CatalogoPuestos', 'Administrador\MasterPuestoController');



    /****************************FIN CATALOGO DE PUESTOS *****************************************************************/





    /**************************** EMPLEADOS **********************************************************************/

    Route::resource('empleados', 'Administrador\EmpleadoController');

    Route::get('empleados/{IdEmpleado}/destroy', [

        'uses' => 'Administrador\EmpleadoController@destroy',

        'as' => 'admin.emp.destroy'

    ]);





    /**************************** END EMPLEADOS **********************************************************************/



    /*********************************************************************************************************************

     * FIN ADMINISTRADOR

     *********************************************************************************************************************/





});

/* <==================================== INICIO NOMINA ====================================>*/



Route::get('descargas-op', function () {

    return view('administrador.nomina.soft-operativo');

});





Route::get('descargas-em', function () {

    return view('administrador.nomina.app-empleados');

});



Route::resource('ReciboEmpleado', 'Nomina\ReciboEmpleadoController');

Route::resource('Concentrado', 'Nomina\ReciboEmpleadoController@Concentrado');



Route::resource('ReciboEmpleado-Cliente', 'Nomina\ReciboEmpleadoController@indexCliente');

Route::resource('ReciboEmpleado-CDetalles', 'Nomina\ReciboEmpleadoController@showCliente');

Route::post('ReciboEmpleadoBCliente', 'Nomina\ReciboEmpleadoController@BempresaCliente');



Route::resource('Concentrado-Cliente', 'Nomina\ReciboEmpleadoController@ConcentradoCliente');

Route::post('ConcentradoxEmpresaC', 'Nomina\ReciboEmpleadoController@NominaEmpresaCliente');



Route::resource('ReciboPDF', 'Nomina\ReciboPDFController');



Route::post('ReciboEmpleadoB', 'Nomina\ReciboEmpleadoController@Bempresa');

Route::post('ConcentradoxEmpresa', 'Nomina\ReciboEmpleadoController@NominaEmpresa');



Route::post('ReciboPdfpost', 'Nomina\ReciboPDFController@Bnom');



Route::get('BNomina-Empleado', 'Nomina\ReciboEmpleadoController@BNomEmp');

Route::post('Detalles-Nomina', 'Nomina\ReciboPDFController@DetalleNom');



/**************************** EMPLEADOS **********************************************************************/

Route::resource('informacion-personal', 'Empleado\EmpleadoViewController');

Route::get('/cambiar-contrasena', 'Empleado\EmpleadoViewController@showChangePasswordForm');

Route::get('/cuenta-de-usuario', [

    'uses' => 'Empleado\EmpleadoViewController@cuentaPerfil',

    'as' => 'cuenta-de-usuario'

]);

Route::post('/cambiar-contrasena', [

    'uses' => 'Empleado\EmpleadoViewController@changePassword',

    'as' => 'cambiar-contrasena'

]);



Route::get('/App', 'Empleado\EmpleadoViewController@showdownload');

Route::post('/App', 'Empleado\EmpleadoViewController@showUploadFile');



Route::get('/descarga-App', 'Empleado\EmpleadoViewController@downloadApp');



/**************************** END EMPLEADOS **********************************************************************/



/*********************************************************************************************************************

 *

 *

 */

Route::get('prueba', function () {



    return view('administrador.usuarios.prueba');

});

/* <==================================== FIN NOMINA ====================================>*/



//Route::get('modulo/administrador/usuarios/empleados/search','Administrador\UsuarioController@Ecodigopostal');





Route::group(['prefix' => 'reportes'],

    function () {

        Route::get('hello_world', 'Reports\GenReports@helloWorld');

        Route::get('customers_pdf', 'Reports\GenReports@customersListPdf');

        Route::get('customers_xls', 'Reports\GenReports@customersListXlsx');



        Route::resource('gen', 'Reports\GenReports');





    });



require_once('routes_ese.php');



    //_____________________RUTAS DE MODULO DE ENCUESTAS ____________________________________________//

Route::get('dashboardencuestas','Encuestas\DashboardController@index')->name('dashboardencuestas');

Route::get('getDataChart/{Id}/{YFecha}','Encuestas\DashboardController@getDataChart');

Route::get('getDataChartClient/{Id}/{YFecha}','Encuestas\DashboardController@getDataChartClient');

Route::get('dashboardencuestas_cliente','Encuestas\DashboardController@indexcliente')->name('dashboardencuestas_cliente');

Route::get('GetDataByClient/{IdCliente}/{YFecha}','Encuestas\DashboardController@GetDataByClient');

Route::get('GetDataByTipoEncuesta/{IdTEncuesta}/{YFecha}/{idclientselect}','Encuestas\DashboardController@GetDataByTipoEncuesta');

Route::get('GetDataByTipoEncuestaClient/{IdTEncuesta}/{YFecha}','Encuestas\DashboardController@GetDataByTipoEncuestaClient');

Route::get('GetDataByPeriod/{YFecha}','Encuestas\DashboardController@GetDataByPeriod');

//clear filter dashboard

Route::get('GetClients/{YFecha}','Encuestas\DashboardController@GetClients');

Route::get('GetTipoEncuesta/{YFecha}/{idclientselect}','Encuestas\DashboardController@GetTipoEncuesta');

Route::get('GetTipoEncuestaClient/{YFecha}','Encuestas\DashboardController@GetTipoEncuestaClient');

Route::get('GetBoxHeader','Encuestas\DashboardController@GetBoxHeader');

Route::get('GetBoxHeaderClient','Encuestas\DashboardController@GetBoxHeaderClient');

Route::get('GetDataByPeriodClient/{YFecha}','Encuestas\DashboardController@GetDataByPeriodClient');

    //_____________________RUTAS DE MODULO DE NUEVO SERVICIO ____________________________________________//

Route::get('nuevoservicio','Encuestas\NuevoServicioController@index')->name('nuevoservicio'); //INDEX



Route::get('nuevoservicio/create/{IdTipoServicio}/{IdCliente}','Encuestas\NuevoServicioController@createNS')->name('nuevoservicio_createNS'); //CREATE



Route::post('nuevoservicio/createSolicitud', 'Encuestas\NuevoServicioController@obtenerFecha')->name('store_nuevoservicio'); //  Ruta para la funcion STORE de NUEVO SERVICIO

Route::post("addmore","Encuestas\NuevoServicioController@store")->name('addmorePost');



Route::post('store_centroserviciocliente', 'Encuestas\NuevoServicioController@storecentroserviciocliente')->name('store_centroserviciocliente'); //  Ruta para la funcion STORECENTRODESERVICIOCLIENTE de nuevo servicio



Route::post('store_departcliente', 'Encuestas\NuevoServicioController@storedepartcliente')->name('store_storedepartcliente'); //  Ruta para la funcion STOREDEPARTCLIENTE de nuevo servicio



///PRUEBA EXCEL

Route::post('import', 'ImportarExcelController@import')->name('import');

//EXCEL



/* Route::get('nuevoservicio/createservicio/{IdTipoServicio}/{IdCliente}','Encuestas\NuevoServicioController@createSRV')->name('servicio_create'); //CREATE SERVICIO */



Route::get('encuestas','Encuestas\EncuestasController@index')->name('encuestas');

Route::post('getPreguntas','Encuestas\StartEncuestaController@getPreguntas')->name('getPreguntas');

Route::post('getRespuestas','Encuestas\StartEncuestaController@getRespuestas')->name('getRespuestas');

Route::post('setRespuestas','Encuestas\StartEncuestaController@setRespuestas')->name('setRespuestas');

Route::post('setRespuestasNormales','Encuestas\StartEncuestaController@setRespuestasNormales')->name('setRespuestasNormales');

Route::post('getResponses','Encuestas\StartEncuestaController@getResponses')->name('getResponses');

Route::post('setPreguntas','Encuestas\StartEncuestaController@setPreguntas')->name('setPreguntas');

Route::get('nom035','Encuestas\Nom035Controller@index')->name('nom035');

Route::get('ayudaNom035','Encuestas\AyudaNom035Controller@index')->name('ayudaNom035');

Route::get('documentosNom035/{id}/{id2}/{id3}','Encuestas\DocumentosController@index')->name('documentosNom035');

Route::get('create/documentosNom035/{id}/{id2}/{id3}','Encuestas\DocumentosController@createDoc')->name('create_documentosNom035');

Route::get('editar/documentosNom035/{id}/{id2}','Encuestas\DocumentosController@edit')->name('documentos_centro_edit'); 

Route::post('pdfdocumentoscliente', 'Encuestas\DocumentosController@showPDF')->name('mostrar_pdf_documento_centro');

Route::post('store/documentosNom035','Encuestas\DocumentosController@store')->name('store_documentosNom035');

Route::get('deletedocumentoedit/{id}/{id2}', 'Encuestas\DocumentosController@deletePDFedit')->name('delete_documentoedit');

Route::post('documentos/editar/update/{id}','Encuestas\DocumentosController@update')->name('documentos_centro_update'); 

Route::delete('detele_documento_centros/{id}/{id2}','Encuestas\DocumentosController@destroy')->name('documentos_centro_destroy');

Route::get('distribucionNom035','Encuestas\DistribucionNom035Controller@index')->name('distribucionNom035');

Route::get('distribucionNom035/{id}/{id2}','Encuestas\DistribucionNom035Controller@obtener')->name('distribucion');

Route::post('distribucionNom035','Encuestas\DistribucionNom035Controller@store')->name('setComentario');

Route::post('distribucionNom035_validar','Encuestas\DistribucionNom035Controller@validar')->name('setvalidar');

Route::post('distribucionNom035_mail','Encuestas\DistribucionNom035Controller@sendMail')->name('distSendMail');

Route::post('distribucionNom035_mailGlobal','Encuestas\DistribucionNom035Controller@sendMailGlobal')->name('distSendMailGlobal');

Route::post('distribucionNom035_whats','Encuestas\DistribucionNom035Controller@sendWhats')->name('distSendWhats');

Route::post('filtrarDist','Encuestas\DistribucionNom035Controller@filtrar')->name('filtrarDist');

Route::post('distribucionNom035_update','Encuestas\DistribucionNom035Controller@updatePersonalCT')->name('distUpdatePers');

Route::get('accionesNom035/{id}/{id2}','Encuestas\AccionesController@index')->name('accionesNom035');

Route::post('graficaracciones','Encuestas\AccionesController@getPersonal')->name('getGraficarAcciones');

Route::post('subir_archivo_evidencias','Encuestas\AccionesController@subirArchivo')->name('subir_archivoo_evidencias'); 

Route::post('mostrar_archivo_evidencias','Encuestas\AccionesController@showPDF')->name('mostrar_archivoo_evidencias'); 

Route::post('gridEncuestados','Encuestas\AccionesController@getEncuestados')->name('getEncuestados');

Route::get('accionesEntornoNom035/{id}/{id2}','Encuestas\AccionesEntornoController@index')->name('accionesentornoNom035');

Route::post('graficaraccionesentorno','Encuestas\AccionesEntornoController@getGraficar')->name('graficarAccionesEntorno');

Route::post('filtraraccionesentorno','Encuestas\AccionesEntornoController@getFiltrar')->name('filtrarAccionesEntorno');

Route::post('obtenerDimensiones','Encuestas\AccionesEntornoController@getDimensiones')->name('getDimensiones');

Route::post('nuevaAccion','Encuestas\AccionesEntornoController@store')->name('setAccion');

Route::post('addAccion','Encuestas\AccionesEntornoController@setAccion')->name('addAccion');

Route::post('imgbienvenidaencuesta','Encuestas\controladoresconfiguracion\EncuestasController@showIMG')->name('mostrar_presentacion_encuesta'); 

Route::get('deleteimgencuestaedit/{id}', 'Encuestas\controladoresconfiguracion\EncuestasController@deleteIMGedit')->name('delete_encuestaimgedit'); 



// Descontinuado

Route::post('getpdfriesgo','Encuestas\AccionesController@getReportRiesgo')->name('getpdfriesgo');



// 

Route::get('reporte_de_riesgo/{idPersonal}/{idCliente}', 'Reports\PdfRiesgoReport@show')->name('pdfRiesgo'); 

Route::get('reporte_general/{idCliente}/{idPeriodo}/{idCentro}', 'Reports\PdfReporteGeneralController@show')->name('pdfGeneral'); 

Route::get('reporte_de_riesgo_entorno/{idCliente}/{idperiodo}/{idcentro}','Reports\ReportEntornoController@index')->name('pdfRiesgoEntorno'); 

Route::get('reporte_de_riesgo_general/{idCliente}/{idperiodo}','Reports\ReporteGeneralController@index')->name('pdfRiesgoGeneral'); 

Route::get('reporte_de_riesgo_dimension/{idCliente}/{idperiodo}','Reports\ReporteAccionesController@index')->name('pdfRiesgoAcciones'); 



Route::get('encuestasURL/{id}/{id2}','Encuestas\EncuestasURLController@index')->name('encuestasURL');

Route::post('getAyuda','Encuestas\AyudaNom035Controller@getAyuda')->name('getAyuda');

Route::post('getPeriodo','Encuestas\Nom035Controller@getPeriodo')->name('getPeriodo');

Route::post('getCentros','Encuestas\Nom035Controller@getCentros')->name('getCentros');

Route::post('getRiesgosss','Encuestas\Nom035Controller@getRiesgos')->name('getRiesgoss');

Route::post('getGraficas','Encuestas\Nom035Controller@getGraficas')->name('getGraficas');

Route::get('encuestaOS','Encuestas\EncuestaOSController@index')->name('encuestaOS');

Route::get('editarOrdenServicio','Encuestas\EditarOrdenServicioController@index')->name('editarOrdenServicio');

Route::get('catalogos_encuestas','Encuestas\Catalogos_EncuestasController@index')->name('catalogos_encuestas');

Route::get('evaluacion360','Encuestas\Evaluacion360Controller@index')->name('evaluacion360');

Route::get('sugerencias/{id}','Encuestas\SugerenciasController@index')->name('sugerencias');

Route::get('sugerencias','Encuestas\SugerenciasController@regresar')->name('sugerencias_vista');

Route::post('getDatosCentro','Encuestas\SugerenciasController@getDatos')->name('getDatosCentro');

Route::post('getComentario','Encuestas\SugerenciasController@getComentario')->name('getComentario');

// Route::post('getPreguntas','Encuestas\EncuestasURLController@getPreguntas')->name('getPreguntas');

// Route::post('getRespuestas','Encuestas\EncuestasURLController@getRespuestas')->name('getRespuestas');

// Route::post('setRespuestas','Encuestas\EncuestasURLController@setRespuestas')->name('setRespuestas');

// Route::post('setRespuestasNormales','Encuestas\EncuestasURLController@setRespuestasNormales')->name('setRespuestasNormales');

// Route::post('getResponses','Encuestas\EncuestasURLController@getResponses')->name('getResponses');

// Route::post('setPreguntas','Encuestas\EncuestasURLController@setPreguntas')->name('setPreguntas');



Route::get('configuracion_encuestas','Encuestas\ConfiguracionController@index')->name('configuracion_encuestas');



Route::get('configuracionEncuestaClientes','Encuestas\controladoresconfiguracion\EncuestaClientesController@index')->name('configuracionEncuestaClientes');





Route::resource('CatalogoTiposServicioEncuesta','Encuestas\controladorescatalogos\ServiciosController');

Route::resource('CatalogoEncuestasDepartamentos','Encuestas\controladorescatalogos\DepartamentosController');



    //_____________________RUTAS DE CATALOGOS DE ENCUESTAS ____________________________________________//



Route::get('home', 'HomeController@index')->name('homevista');



Route::get('catalogo_encuestas/servicios','Encuestas\controladorescatalogos\ServiciosController@index')->name('catalogo_servicios');



Route::get('catalogo_encuestas/centros_de_trabajo','Encuestas\controladorescatalogos\Centros_de_TrabajoController@index')->name('catalogo_centros_de_trabajo');



Route::get('catalogo_encuestas/departamentos','Encuestas\controladorescatalogos\DepartamentosController@index')->name('catalogo_departamentos');



Route::get('catalogo_encuestas/puestos','Encuestas\controladorescatalogos\PuestosController@index')->name('catalogo_puestos');



Route::get('catalogo_encuestas/personal_evaluacion','Encuestas\controladorescatalogos\Personal_EvaluacionController@index')->name('catalogo_personal_evaluacion');



Route::get('catalogo_encuestas/estados_civiles','Encuestas\controladorescatalogos\Estados_CivilesController@index')->name('catalogo_estados_civiles');



Route::get('catalogo_encuestas/nivel_estudios','Encuestas\controladorescatalogos\Nivel_de_EstudiosController@index')->name('catalogo_nivel_estudios');



Route::get('catalogo_encuestas/tipo_puesto','Encuestas\controladorescatalogos\Tipo_de_PuestoController@index')->name('catalogo_tipo_puesto');



Route::get('catalogo_encuestas/antiguedad_puesto','Encuestas\controladorescatalogos\Antiguedad_de_PuestoController@index')->name('catalogo_antiguedad_puesto');



Route::get('catalogo_encuestas/experiencia_laboral','Encuestas\controladorescatalogos\Experiencia_LaboralController@index')->name('catalogo_experiencia_laboral');



Route::get('catalogo_encuestas/rango_edades','Encuestas\controladorescatalogos\Rango_de_EdadesController@index')->name('catalogo_rango_edades');



Route::get('catalogo_encuestas/tipo_contrato','Encuestas\controladorescatalogos\Tipo_de_ContratoController@index')->name('catalogo_tipo_contrato');



Route::get('catalogo_encuestas/tipo_personal','Encuestas\controladorescatalogos\Tipo_de_PersonalController@index')->name('catalogo_tipo_personal');



Route::get('catalogo_encuestas/tipo_jornada','Encuestas\controladorescatalogos\Tipo_de_JornadaController@index')->name('catalogo_tipo_jornada');



Route::get('catalogo_encuestas/politicas_clientes','Encuestas\controladorescatalogos\Politicas_ClientesController@index')->name('catalogo_politicas_clientes');



Route::get('catalogo_encuestas/quejas','Encuestas\controladorescatalogos\QuejasController@index')->name('catalogo_quejas');



Route::get('catalogo_encuestas/fondo','Encuestas\controladorescatalogos\FondoController@index')->name('catalogo_fondo');



Route::get('catalogo_encuestas/documentos','Encuestas\controladorescatalogos\DocumentosController@index')->name('catalogo_documentos');



    //_____________________RUTAS DE CATALOGO DE SERVICIOS ____________________________________________//



// SERVICIOS

Route::get('Create/NuevoServicio','Encuestas\controladorescatalogos\ServiciosController@createServicio')->name('nuevoservicio_create'); //vista

Route::post('store_nuevoservicio_encuesta','Encuestas\controladorescatalogos\ServiciosController@store')->name('store_nuevoservicio_encuesta'); // create

Route::get('servicios_encuesta/editar/edit/{id}', 'Encuestas\controladorescatalogos\ServiciosController@edit')->name('editar_servicio'); // vista

Route::delete('servicios_encuesta/eliminar/{id}','Encuestas\controladorescatalogos\ServiciosController@destroy')->name('eliminar_servicio_encuesta'); //delete



// CENTROS DE TRABAJO

Route::get('Create/Centro_de_trabajo','Encuestas\controladorescatalogos\Centros_de_TrabajoController@createCT')->name('centros_de_trabajo_create'); // Ruta para la vista CREATE de Centros de Trabajo



Route::post('store_centros_de_trabajo', 'Encuestas\controladorescatalogos\Centros_de_TrabajoController@store')->name('store_centros_de_trabajo'); //  Ruta para la funcion STORE de Centros de Trabajo



Route::get('editar/Centro_de_Trabajo/{id}','Encuestas\controladorescatalogos\Centros_de_TrabajoController@edit')->name('centros_de_trabajo_edit');



Route::post('servicios_centros_de_trabajo/editar/update/{id}','Encuestas\controladorescatalogos\Centros_de_TrabajoController@update')->name('centros_de_trabajo_update');



Route::delete('detele_centros_de_trabajo/{id}','Encuestas\controladorescatalogos\Centros_de_TrabajoController@destroy')->name('centros_de_trabajo_destroy'); // Ruta para la funcion DELETE de Centros de Trabajo



//DEPARTAMENTOS

Route::get('Create/EncuestasDepartamentos','Encuestas\controladorescatalogos\DepartamentosController@createDepartamentos')->name('nuevodepartamento_create'); //vista

Route::post('store_departamentos_encuesta','Encuestas\controladorescatalogos\DepartamentosController@store')->name('store_nuevodepartamento_encuesta'); // create

Route::get('EncuestaDepartamentos/editar/edit/{id}', 'Encuestas\controladorescatalogos\DepartamentosController@edit')->name('editar_departamentos'); // vista

Route::post('EncuestaDepartamentos/editar/update/{id}','Encuestas\controladorescatalogos\DepartamentosController@update')->name('departamento_update');

Route::delete('EncuestaDepartamentos/eliminar/{id}','Encuestas\controladorescatalogos\DepartamentosController@destroy')->name('eliminar_departamento_encuesta'); //delete



//PUESTO

Route::get('Create/EncuestasPuesto','Encuestas\controladorescatalogos\PuestosController@createPuesto')->name('nuevo_puesto_encuesta_create'); //vista

Route::post('store_puesto_encuesta','Encuestas\controladorescatalogos\PuestosController@store')->name('store_nuevo_puesto_encuesta'); // create

Route::get('EncuestaPuesto/editar/edit/{id}', 'Encuestas\controladorescatalogos\PuestosController@edit')->name('editar_puesto_encuesta'); // vista

Route::post('EncuestaPuesto/editar/update/{id}','Encuestas\controladorescatalogos\PuestosController@update')->name('puesto_encuesta_update');

Route::delete('EncuestaPuesto/eliminar/{id}','Encuestas\controladorescatalogos\PuestosController@destroy')->name('eliminar_puesto_encuesta'); //delete



//QUEJAS



Route::get('Create/tipo_de_encuesta','Encuestas\controladorescatalogos\QuejasController@createTQ')->name('tipo_de_encuesta_create'); // Ruta para la vista CREATE de TIPO DE ENCUESTA

Route::post('store_tipo_de_queja', 'Encuestas\controladorescatalogos\QuejasController@store')->name('store_tipo_de_queja'); //  Ruta para la funcion STORE de TIPO DE QUEJA

Route::get('editar/tipo_de_queja/{id}','Encuestas\controladorescatalogos\QuejasController@edit')->name('tipo_de_queja_edit'); //  Ruta para la vista de TIPO DE QUEJA

Route::post('tipo_de_queja/editar/update/{id}','Encuestas\controladorescatalogos\QuejasController@update')->name('tipo_de_queja_update'); // Ruta para la funcion UPDATE de TIPO DE JORNADA

Route::delete('detele_tipo_de_queja/{id}','Encuestas\controladorescatalogos\QuejasController@destroy')->name('tipo_de_queja_destroy'); // Ruta para la funcion DELETE de TIPO DE JORNADA

//PERSONAL EVALUACION (PENDIENTE---)



//SUGERENCIAS

Route::get('editar/estatus/{id}/{id2}','Encuestas\SugerenciasController@edit')->name('sugerencia_estatus_edit');

Route::post('tipo_estatus/editar/update/{id}','Encuestas\SugerenciasController@update')->name('tipo_de_estatus_update'); // Ruta para la funcion UPDATE de TIPO DE JORNADA



// ESTADOS CIVILES



Route::get('Create/estado_civil','Encuestas\controladorescatalogos\Estados_CivilesController@createEC')->name('estados_civiles_create'); // Ruta para la vista CREATE de ESTADOS CIVILES



Route::post('store_estados_civiles', 'Encuestas\controladorescatalogos\Estados_CivilesController@store')->name('store_estados_civiles'); //  Ruta para la funcion STORE de ESTADOS CIVILES



Route::get('editar/estados_civiles/{id}','Encuestas\controladorescatalogos\Estados_CivilesController@edit')->name('estados_civiles_edit'); //  Ruta para la vista de ESTADOS CIVILES



Route::post('estados_civiles/editar/update/{id}','Encuestas\controladorescatalogos\Estados_CivilesController@update')->name('estados_civiles_update'); // Ruta para la funcion UPDATE de ESTADOS CIVILES



Route::delete('detele_estados_civiles/{id}','Encuestas\controladorescatalogos\Estados_CivilesController@destroy')->name('estados_civiles_destroy'); // Ruta para la funcion DELETE de ESTADOS CIVILES



//NIVEL DE ESTUDIOS

Route::get('Create/EncuestasNivelDeEstudios','Encuestas\controladorescatalogos\Nivel_de_EstudiosController@createNivelEstudio')->name('nuevonivel_estudios_create'); //vista

Route::post('store_nivel_de_estudios_encuesta','Encuestas\controladorescatalogos\Nivel_de_EstudiosController@store')->name('store_nuevo_nivel_estudios_encuesta'); // create

Route::get('EncuestaNivelDeEstudios/editar/edit/{id}', 'Encuestas\controladorescatalogos\Nivel_de_EstudiosController@edit')->name('editar_nivel_estudios'); // vista

Route::post('EncuestaNivelDeEstudios/editar/update/{id}','Encuestas\controladorescatalogos\Nivel_de_EstudiosController@update')->name('nivel_estudios_update');

Route::delete('EncuestaNivelDeEstudios/eliminar/{id}','Encuestas\controladorescatalogos\Nivel_de_EstudiosController@destroy')->name('eliminar_nivel_estudios_encuesta'); //delete



//TIPO PUESTOS

Route::get('Create/EncuestasTipoPuesto','Encuestas\controladorescatalogos\Tipo_de_PuestoController@createTipoPuesto')->name('nuevotipo_puesto_create'); //vista

Route::post('store_tipo_puesto_encuesta','Encuestas\controladorescatalogos\Tipo_de_PuestoController@store')->name('store_nuevotipo_puesto_encuesta'); // create

Route::get('EncuestaTipoPuesto/editar/edit/{id}', 'Encuestas\controladorescatalogos\Tipo_de_PuestoController@edit')->name('editar_tipo_puesto'); // vista

Route::post('EncuestaTipoPuesto/editar/update/{id}','Encuestas\controladorescatalogos\Tipo_de_PuestoController@update')->name('tipo_puesto_update');

Route::delete('EncuestaTipoPuesto/eliminar/{id}','Encuestas\controladorescatalogos\Tipo_de_PuestoController@destroy')->name('eliminar_tipo_puesto_encuesta'); //delete



//ANTIGUEDAD DE PUESTO

Route::get('Create/AntiguedadDePuesto','Encuestas\controladorescatalogos\Antiguedad_de_PuestoController@createAntiguedadDePuesto')->name('nueva_antiguedad_de_puesto_create'); //vista

Route::post('store_antiguedad_de_puesto','Encuestas\controladorescatalogos\Antiguedad_de_PuestoController@store')->name('store_nueva_antiguedad_de_puesto'); // create

Route::get('EncuestaAntiguedadDePuesto/editar/edit/{id}', 'Encuestas\controladorescatalogos\Antiguedad_de_PuestoController@edit')->name('editar_antiguedad_de_puesto'); // vista

Route::post('EncuestaAntiguedadDePuesto/editar/update/{id}','Encuestas\controladorescatalogos\Antiguedad_de_PuestoController@update')->name('antiguedad_de_puesto_update');

Route::delete('EncuestaAntiguedadDePuesto/eliminar/{id}','Encuestas\controladorescatalogos\Antiguedad_de_PuestoController@destroy')->name('eliminar_antiguedad_de_puesto'); //delete



//PERSONAL EVALUACIÓN -- CREATED BY ABINADAD MORALES

Route::get('Create/PersonalEvaluacion','Encuestas\controladorescatalogos\Personal_EvaluacionController@create')->name('create_evaluacionPersonal'); //vista

Route::post('store_personal_evaluacion','Encuestas\controladorescatalogos\Personal_EvaluacionController@store')->name('store_evalucionPersoanl'); // create

Route::post('PersonalEvalucion/editar/update/{id}','Encuestas\controladorescatalogos\Personal_EvaluacionController@update')->name('update_evaluacionPersonal');

Route::get('PersonalEvalucion/editar/edit/{id}', 'Encuestas\controladorescatalogos\Personal_EvaluacionController@edit')->name('editar_evaluacionPersonal'); // vista

Route::delete('PersonalEvalucion/eliminar/{id}','Encuestas\controladorescatalogos\Personal_EvaluacionController@destroy')->name('eliminar_evaluacionPersonal'); //delete



// EVALUACIONES FUNCION IMPORTAR

Route::get('ImportarDatosPersonal','Encuestas\controladorescatalogos\Personal_EvaluacionController@importExcel')->name('importar_evaluacionPersonal');



//EDICIÓN DEL SEGUNDO FORM

Route::get('PersonalEvalucionDos/editar/edit/{id}', 'Encuestas\controladorescatalogos\Personal_EvaluacionController@editarDos')->name('editar_evaluacionPersonal_dos'); // vista

Route::post('PersonalEvalucionDos/editar/update/{id}','Encuestas\controladorescatalogos\Personal_EvaluacionController@updateDos')->name('update_evaluacionPersonal_dos');



Route::resource('ValidacionesDepartamentos', 'Encuestas\controladorescatalogos\Personal_EvaluacionController@ValidacionesDepartamentos');

Route::resource('ValidacionesCentroTrabajo', 'Encuestas\controladorescatalogos\Personal_EvaluacionController@ValidacionesCentroTrabajo');

Route::resource('ValidacionesPuestos', 'Encuestas\controladorescatalogos\Personal_EvaluacionController@ValidacionesPuestos');

Route::resource('ValidacionAnonima', 'Encuestas\controladorescatalogos\Personal_EvaluacionController@ValidacionAnonima');



// EXPERIENCIA LABORAL



Route::get('Create/experiencia_laboral','Encuestas\controladorescatalogos\Experiencia_LaboralController@createEl')->name('experiencia_laboral_create'); // Ruta para la vista CREATE de EXPERIENCIA LABORAL



Route::post('store_experiencia_laboral', 'Encuestas\controladorescatalogos\Experiencia_LaboralController@store')->name('store_experiencia_laboral'); //  Ruta para la funcion STORE de EXPERIENCIA LABORAL



Route::get('editar/experiencia_laboral/{id}','Encuestas\controladorescatalogos\Experiencia_LaboralController@edit')->name('experiencia_laboral_edit'); //  Ruta para la vista de EXPERIENCIA LABORAL



Route::post('experiencia_laboral/editar/update/{id}','Encuestas\controladorescatalogos\Experiencia_LaboralController@update')->name('experiencia_laboral_update'); // Ruta para la funcion UPDATE de EXPERIENCIA LABORAL



Route::delete('detele_experiencia_laboral/{id}','Encuestas\controladorescatalogos\Experiencia_LaboralController@destroy')->name('experiencia_laboral_destroy'); // Ruta para la funcion DELETE de EXPERIENCIA LABORAL



//RANGO EDAD

Route::get('Create/EncuestaRangoEdad','Encuestas\controladorescatalogos\Rango_de_EdadesController@createRangoEdad')->name('create_rango_de_edad_encuesta'); //vista

Route::post('store_encuesta_rango_edad','Encuestas\controladorescatalogos\Rango_de_EdadesController@store')->name('store_nuevo_rango_de_edad'); // create

Route::get('EncuestaRangoEdad/editar/edit/{id}', 'Encuestas\controladorescatalogos\Rango_de_EdadesController@edit')->name('editar_rango_de_edad'); // vista

Route::post('EncuestaRangoEdad/editar/update/{id}','Encuestas\controladorescatalogos\Rango_de_EdadesController@update')->name('rango_de_edad_update');

Route::delete('EncuestaRangoEdad/eliminar/{id}','Encuestas\controladorescatalogos\Rango_de_EdadesController@destroy')->name('eliminar_rango_de_edad'); //delete



// TIPO DE CONTRATO



Route::get('Create/tipo_de_contrato','Encuestas\controladorescatalogos\Tipo_de_ContratoController@createTC')->name('tipo_de_contrato_create'); // Ruta para la vista CREATE de TIPO DE CONTRATO



Route::post('store_tipo_de_contrato', 'Encuestas\controladorescatalogos\Tipo_de_ContratoController@store')->name('store_tipo_de_contrato'); //  Ruta para la funcion STORE de TIPO DE CONTRATO



Route::get('editar/tipo_de_contrato/{id}','Encuestas\controladorescatalogos\Tipo_de_ContratoController@edit')->name('tipo_de_contrato_edit'); //  Ruta para la vista de TIPO DE CONTRATO



Route::post('tipo_de_contrato/editar/update/{id}','Encuestas\controladorescatalogos\Tipo_de_ContratoController@update')->name('tipo_de_contrato_update'); // Ruta para la funcion UPDATE de TIPO DE CONTRATO



Route::delete('detele_tipo_de_contrato/{id}','Encuestas\controladorescatalogos\Tipo_de_ContratoController@destroy')->name('tipo_de_contrato_destroy'); // Ruta para la funcion DELETE de TIPO DE CONTRATO



// TIPO DE PERSONAL



Route::get('Create/tipo_de_personal','Encuestas\controladorescatalogos\Tipo_de_PersonalController@createTP')->name('tipo_de_personal_create'); // Ruta para la vista CREATE de TIPO DE PERSONAL



Route::post('store_tipo_de_personal', 'Encuestas\controladorescatalogos\Tipo_de_PersonalController@store')->name('store_tipo_de_personal'); //  Ruta para la funcion STORE de TIPO DE PERSONAL



Route::get('editar/tipo_de_personal/{id}','Encuestas\controladorescatalogos\Tipo_de_PersonalController@edit')->name('tipo_de_personal_edit'); //  Ruta para la vista de TIPO DE PERSONAL



Route::post('tipo_de_personal/editar/update/{id}','Encuestas\controladorescatalogos\Tipo_de_PersonalController@update')->name('tipo_de_personal_update'); // Ruta para la funcion UPDATE de TIPO DE PERSONAL



Route::delete('detele_tipo_de_personal/{id}','Encuestas\controladorescatalogos\Tipo_de_PersonalController@destroy')->name('tipo_de_personal_destroy'); // Ruta para la funcion DELETE de TIPO DE PERSONAL



// TIPO DE JORNADA



Route::get('Create/tipo_de_jornada','Encuestas\controladorescatalogos\Tipo_de_JornadaController@createTJ')->name('tipo_de_jornada_create'); // Ruta para la vista CREATE de TIPO DE JORNADA



Route::post('store_tipo_de_jornada', 'Encuestas\controladorescatalogos\Tipo_de_JornadaController@store')->name('store_tipo_de_jornada'); //  Ruta para la funcion STORE de TIPO DE JORNADA



Route::get('editar/tipo_de_jornada/{id}','Encuestas\controladorescatalogos\Tipo_de_JornadaController@edit')->name('tipo_de_jornada_edit'); //  Ruta para la vista de TIPO DE JORNADA



Route::post('tipo_de_jornada/editar/update/{id}','Encuestas\controladorescatalogos\Tipo_de_JornadaController@update')->name('tipo_de_jornada_update'); // Ruta para la funcion UPDATE de TIPO DE JORNADA



Route::delete('detele_tipo_de_jornada/{id}','Encuestas\controladorescatalogos\Tipo_de_JornadaController@destroy')->name('tipo_de_jornada_destroy'); // Ruta para la funcion DELETE de TIPO DE JORNADA



//POLITICAS CLIENTES



Route::get('Create/politicas_clientes','Encuestas\controladorescatalogos\Politicas_ClientesController@createPC')->name('politicas_clientes_create'); // Ruta para la vista CREATE de POLITICAS CLIENTES



Route::post('store_politicas_clientes', 'Encuestas\controladorescatalogos\Politicas_ClientesController@store')->name('store_politicas_clientes'); //  Ruta para la funcion STORE de POLITICAS CLIENTES



Route::get('editar/politicas_clientes/{id}','Encuestas\controladorescatalogos\Politicas_ClientesController@edit')->name('politicas_clientes_edit'); //  Ruta para la vista de POLITICAS CLIENTES



Route::post('politicas_clientes/editar/update/{id}','Encuestas\controladorescatalogos\Politicas_ClientesController@update')->name('politicas_clientes_update'); // Ruta para la funcion UPDATE de POLITICAS CLIENTES



Route::delete('detele_politicas_clientes/{id}','Encuestas\controladorescatalogos\Politicas_ClientesController@destroy')->name('politicas_clientes_destroy'); // Ruta para la funcion DELETE de POLITICAS CLIENTES



Route::post('pdfpoliticacliente', 'Encuestas\controladorescatalogos\Politicas_ClientesController@showPDF')->name('mostrar_pdf_politica_cliente'); // Ruta para la funcion ShowPDF de POLITICAS CLIENTES



Route::get('deletepdfedit/{id}', 'Encuestas\controladorescatalogos\Politicas_ClientesController@deletePDFedit')->name('delete_pdfedit'); // Ruta para la funcion deletePDF de POLITICAS CLIENTES



//DOCUMENTOS

Route::get('Create/EncuestasDocumentos','Encuestas\controladorescatalogos\DocumentosController@createDocumento')->name('nuevodocumentoencuesta_create'); //vista

Route::post('store_documentos_encuestaaaaaaaaaaaaaaaa','Encuestas\controladorescatalogos\DocumentosController@store')->name('store_nuevodocumento_encuestaaaaaaaaa'); // create

Route::get('EncuestaDocumentos/editar/edit/{id}', 'Encuestas\controladorescatalogos\DocumentosController@edit')->name('editar_encuesta_documento'); // vista

Route::post('EncuestaDocumentos/editar/update/{id}','Encuestas\controladorescatalogos\DocumentosController@update')->name('encuesta_documento_update');

Route::delete('EncuestaDocumentos/eliminar/{id}','Encuestas\controladorescatalogos\DocumentosController@destroy')->name('eliminar_documento_encuesta'); //delete



//IMAGEN DE FONDO ENCUESTA

Route::get('Create/imagen_fondo','Encuestas\controladorescatalogos\FondoController@createIF')->name('fondo_clientes_create'); // Ruta para la vista CREATE de IMAGEN FONDO ENCUESTA

Route::post('store_imagen_fondo','Encuestas\controladorescatalogos\FondoController@store')->name('store_imagen_fondo'); //  Ruta para la funcion STORE de IMAGEN FONDO ENCUESTA

Route::post('imgfondoencuesta','Encuestas\controladorescatalogos\FondoController@showIMG')->name('mostrar_img_fondo_encuesta'); // Ruta para la funcion ShowPDF de IMAGEN FONDO ENCUESTA

Route::get('editar/imagen_clientes/{id}','Encuestas\controladorescatalogos\FondoController@edit')->name('imagen_fondo_edit');

Route::post('imagenes_fondos/editar/update/{id}','Encuestas\controladorescatalogos\FondoController@update')->name('imagenes_fondos_update'); // Ruta para la funcion UPDATE de POLITICAS CLIENTES

Route::delete('detele_imagen_fondo/{id}','Encuestas\controladorescatalogos\FondoController@destroy')->name('imagen_fondo_destroy'); // Ruta para la funcion DELETE de POLITICAS CLIENTES

Route::get('deleteimgedit/{id}', 'Encuestas\controladorescatalogos\FondoController@deleteIMGedit')->name('delete_imgedit'); // Ruta para la funcion deletePDF de POLITICAS CLIENTES







//_______________________RUTAS DE CONFIGURACIONES DE MODULO ENCUESTAS _______________________________________



Route::get('encuestas/configuracion/grupo_de_encuestas','Encuestas\controladoresconfiguracion\GrupoDeEncuestasController@index')->name('configuracion_grupo_de_encuestas');



Route::get('encuestas/configuracion/encuestas','Encuestas\controladoresconfiguracion\EncuestasController@index')->name('configuracion_encuestass');



Route::get('encuestas/configuracion/grupo_de_respuestas','Encuestas\controladoresconfiguracion\GrupoDeRespuestasController@index')->name('configuracion_grupo_de_respuestas');



Route::get('encuestas/configuracion/respuestas','Encuestas\controladoresconfiguracion\RespuestasController@index')->name('configuracion_respuestas');



Route::get('encuestas/configuracion/valores_de_respuestas','Encuestas\controladoresconfiguracion\ValoresDeRespuestasController@index')->name('configuracion_valores_de_respuestas');



Route::get('encuestas/configuracion/preguntas','Encuestas\controladoresconfiguracion\PreguntasController@index')->name('configuracion_preguntas');



Route::get('encuestas/configuracion/categoria_encuesta','Encuestas\controladoresconfiguracion\CategoriaEncuestaController@index')->name('configuracion_categoria_encuesta');



Route::get('encuestas/configuracion/dominios','Encuestas\controladoresconfiguracion\DominiosController@index')->name('configuracion_dominios');



Route::get('encuestas/configuracion/dimension','Encuestas\controladoresconfiguracion\DimensionController@index')->name('configuracion_dimension');



Route::get('encuestas/configuracion/dimension_pregunta','Encuestas\controladoresconfiguracion\DimensionPreguntaController@index')->name('configuracion_dimension_pregunta');



Route::get('encuestas/configuracion/acciones','Encuestas\controladoresconfiguracion\AccionesController@index')->name('configuracion_acciones');



Route::get('encuestas/configuracion/correos','Encuestas\controladoresconfiguracion\CorreosController@index')->name('configuracion_correos');



Route::get('encuestas/configuracion/fecha_encuesta','Encuestas\controladoresconfiguracion\FechaEncuestaController@index')->name('configuracion_fecha_encuesta');



Route::get('encuestas/configuracion/informacion_de_ayuda','Encuestas\controladoresconfiguracion\InformacionDeAyudaController@index')->name('configuracion_informacion_de_ayuda');



// ENCUESTAS

Route::get('Create/Configuracion/Encuestas','Encuestas\controladoresconfiguracion\EncuestasController@create')->name('configuracion_nueva_encuesta_create'); //vista

Route::post('store_documentos_encuesta','Encuestas\controladoresconfiguracion\EncuestasController@store')->name('store_configuracion_encuesta'); // create

Route::get('Configuracion/Encuestas/editar/edit/{id}', 'Encuestas\controladoresconfiguracion\EncuestasController@edit')->name('editar_configuracion_encuesta'); // vista

Route::post('Configuracion/Encuestas/editar/update/{id}','Encuestas\controladoresconfiguracion\EncuestasController@update')->name('encuesta_configuracion_update');

Route::delete('ConfiguracionEncuestas/eliminar/{id}','Encuestas\controladoresconfiguracion\EncuestasController@destroy')->name('eliminar_configuracion_encuesta'); //delete



// GRUPO DE ENCUESTAS

Route::get('Create/Configuracion/GrupoEncuestas','Encuestas\controladoresconfiguracion\GrupoDeEncuestasController@create')->name('configuracion_nueva_grupo_encuesta_create'); //vista

Route::post('store_configuracion_grupo_encuesta','Encuestas\controladoresconfiguracion\GrupoDeEncuestasController@store')->name('store_configuracion__nuevo_grupo_encuesta'); // create

Route::get('Configuracion/GrupoEncuestas/editar/edit/{id}', 'Encuestas\controladoresconfiguracion\GrupoDeEncuestasController@edit')->name('editar_configuracion__grupo_encuesta'); // vista

Route::post('Configuracion/GrupoEncuestas/editar/update/{id}','Encuestas\controladoresconfiguracion\GrupoDeEncuestasController@update')->name('grupo_encuesta_configuracion_update');

Route::delete('ConfiguracionGrupoEncuestas/eliminar/{id}','Encuestas\controladoresconfiguracion\GrupoDeEncuestasController@destroy')->name('eliminar_configuracion_grupo_encuesta'); //delete



// RESPUESTAS



Route::get('Create/respuestas','Encuestas\controladoresconfiguracion\RespuestasController@createRE')->name('respuestas_create'); // Ruta para la vista CREATE de RESPUESTAS



Route::post('store_respuestas', 'Encuestas\controladoresconfiguracion\RespuestasController@store')->name('store_respuestas'); //  Ruta para la funcion STORE de RESPUESTAS



Route::get('editar/respuestas/{id}','Encuestas\controladoresconfiguracion\RespuestasController@edit')->name('respuestas_edit'); //  Ruta para la vista de RESPUESTAS



Route::post('respuestas/editar/update/{id}','Encuestas\controladoresconfiguracion\RespuestasController@update')->name('respuestas_update'); // Ruta para la funcion UPDATE de RESPUESTAS



Route::delete('detele_respuestas/{id}','Encuestas\controladoresconfiguracion\RespuestasController@destroy')->name('respuestas_destroy'); // Ruta para la funcion DELETE de RESPUESTAS



// VALORES DE RESPUESTAS



Route::get('Create/valores_de_respuestas','Encuestas\controladoresconfiguracion\ValoresDeRespuestasController@createVR')->name('valores_de_respuestas_create'); // Ruta para la vista CREATE de VALORES DE RESPUESTAS



Route::post('store_valores_de_respuestas', 'Encuestas\controladoresconfiguracion\ValoresDeRespuestasController@store')->name('store_valores_de_respuestas'); //  Ruta para la funcion STORE de VALORES DE RESPUESTAS



Route::get('editar/valores_de_respuestas/{id}','Encuestas\controladoresconfiguracion\ValoresDeRespuestasController@edit')->name('valores_de_respuestas_edit'); //  Ruta para la vista de VALORES DE RESPUESTAS



Route::post('valores_de_respuestas/editar/update/{id}','Encuestas\controladoresconfiguracion\ValoresDeRespuestasController@update')->name('valores_de_respuestas_update'); // Ruta para la funcion UPDATE de VALORES DE RESPUESTAS



Route::delete('detele_valores_de_respuestas/{id}','Encuestas\controladoresconfiguracion\ValoresDeRespuestasController@destroy')->name('valores_de_respuestas_destroy'); // Ruta para la funcion DELETE de VALORES DE RESPUESTAS



// GRUPO DE RESPUESTAS



Route::get('Create/grupo_de_respuestas','Encuestas\controladoresconfiguracion\GrupoDeRespuestasController@createGR')->name('grupo_de_respuestas_create'); // Ruta para la vista CREATE de GRUPO DE RESPUESTAS



Route::post('store_grupo_de_respuestas', 'Encuestas\controladoresconfiguracion\GrupoDeRespuestasController@store')->name('store_grupo_de_respuestas'); //  Ruta para la funcion STORE de GRUPO DE RESPUESTAS



Route::get('editar/grupo_de_respuestas/{id}','Encuestas\controladoresconfiguracion\GrupoDeRespuestasController@edit')->name('grupo_de_respuestas_edit'); //  Ruta para la vista de GRUPO DE RESPUESTAS



Route::post('grupo_de_respuestas/editar/update/{id}','Encuestas\controladoresconfiguracion\GrupoDeRespuestasController@update')->name('grupo_de_respuestas_update'); // Ruta para la funcion UPDATE de GRUPO DE RESPUESTAS



Route::delete('detele_grupo_de_respuestas/{id}','Encuestas\controladoresconfiguracion\GrupoDeRespuestasController@destroy')->name('grupo_de_respuestas_destroy'); // Ruta para la funcion DELETE de GRUPO DE RESPUESTAS



// PREGUNTAS

Route::get('Create/Configuracion/Preguntas','Encuestas\controladoresconfiguracion\PreguntasController@create')->name('configuracion_nueva_pregunta_create'); //vista

Route::post('store_configuracion_preguntas','Encuestas\controladoresconfiguracion\PreguntasController@store')->name('store_configuracion_nueva_pregunta_encuesta'); // create

Route::get('Configuracion/Preguntas/editar/edit/{id}', 'Encuestas\controladoresconfiguracion\PreguntasController@edit')->name('editar_configuracion_nueva_pregunta'); // vista

Route::post('Configuracion/Preguntas/editar/update/{id}','Encuestas\controladoresconfiguracion\PreguntasController@update')->name('pregunta_configuracion_update');

Route::delete('ConfiguracionPreguntasEliminar/{id}','Encuestas\controladoresconfiguracion\PreguntasController@destroy')->name('eliminar_configuracion_pregunta'); //delete



// CATEGORIA ENCUESTA



Route::get('Create/categoria_encuesta','Encuestas\controladoresconfiguracion\CategoriaEncuestaController@createCE')->name('categoria_encuesta_create'); // Ruta para la vista CREATE de CATEGORIA ENCUESTA



Route::post('store_categoria_encuesta', 'Encuestas\controladoresconfiguracion\CategoriaEncuestaController@store')->name('store_categoria_encuesta'); //  Ruta para la funcion STORE de CATEGORIA ENCUESTA



Route::get('categoria_encuesta_edit/{id}','Encuestas\controladoresconfiguracion\CategoriaEncuestaController@edit')->name('categoria_encuesta_edit'); //  Ruta para la vista de CATEGORIA ENCUESTA



Route::post('categoria_encuesta/editar/update/{id}','Encuestas\controladoresconfiguracion\CategoriaEncuestaController@update')->name('categoria_encuesta_update'); // Ruta para la funcion UPDATE de CATEGORIA ENCUESTA



Route::delete('detele_categoria_encuesta/{id}','Encuestas\controladoresconfiguracion\CategoriaEncuestaController@destroy')->name('categoria_encuesta_destroy'); // Ruta para la funcion DELETE de CATEGORIA ENCUESTA



// DOMINIOS

Route::get('Create/Configuracion/Dominios','Encuestas\controladoresconfiguracion\DominiosController@create')->name('configuracion_nuevo_dominio_create'); //vista

Route::post('store_configuracion_dominios','Encuestas\controladoresconfiguracion\DominiosController@store')->name('store_configuracion_nuevo_dominio'); // create

Route::get('Configuracion/Dominios/editar/edit/{id}', 'Encuestas\controladoresconfiguracion\DominiosController@edit')->name('editar_configuracion_nuevo_dominio'); // vista

Route::post('Configuracion/Dominios/editar/update/{id}','Encuestas\controladoresconfiguracion\DominiosController@update')->name('dominio_configuracion_update');

Route::delete('ConfiguracionDominiosEliminar/{id}','Encuestas\controladoresconfiguracion\DominiosController@destroy')->name('eliminar_configuracion_dominio'); //delete



// DIMENSION

Route::get('Create/dimension','Encuestas\controladoresconfiguracion\DimensionController@create')->name('configuracion_dimension_create'); //vista

Route::post('store_dimension','Encuestas\controladoresconfiguracion\DimensionController@store')->name('store_dimension'); // create

Route::get('editar/dimension/{id}', 'Encuestas\controladoresconfiguracion\DimensionController@edit')->name('dimension_edit'); // vista

Route::post('dimension/editar/update/{id}','Encuestas\controladoresconfiguracion\DimensionController@update')->name('dimension_update');

Route::delete('delete_dimension_pregunta/{id}','Encuestas\controladoresconfiguracion\DimensionController@destroy')->name('dimension_destroy'); //delete



// DIMENSION PREGUNTA

Route::get('Create/dimension_pregunta','Encuestas\controladoresconfiguracion\DimensionPreguntaController@createDP')->name('dimension_pregunta_create'); // Ruta para la vista CREATE de DIMENSION PREGUNTA

Route::post('store_dimension_pregunta', 'Encuestas\controladoresconfiguracion\DimensionPreguntaController@store')->name('store_dimension_pregunta'); //  Ruta para la funcion STORE de DIMENSION PREGUNTA

Route::get('editar/dimension_pregunta/{id}','Encuestas\controladoresconfiguracion\DimensionPreguntaController@edit')->name('dimension_pregunta_edit'); //  Ruta para la vista de DIMENSION PREGUNTA

Route::post('dimension_pregunta/editar/update/{id}','Encuestas\controladoresconfiguracion\DimensionPreguntaController@update')->name('dimension_pregunta_update'); // Ruta para la funcion UPDATE de DIMENSION PREGUNTA

Route::delete('detele_dimension_pregunta/{id}','Encuestas\controladoresconfiguracion\DimensionPreguntaController@destroy')->name('dimension_pregunta_destroy'); // Ruta para la funcion DELETE de DIMENSION PREGUNTA



// ACCIONES



Route::get('Create/acciones','Encuestas\controladoresconfiguracion\AccionesController@createAC')->name('acciones_create'); // Ruta para la vista CREATE de ACCIONES



Route::post('store_acciones', 'Encuestas\controladoresconfiguracion\AccionesController@store')->name('store_acciones'); //  Ruta para la funcion STORE de ACCIONES



Route::get('editar/acciones/{id}','Encuestas\controladoresconfiguracion\AccionesController@edit')->name('acciones_edit'); //  Ruta para la vista de ACCIONES



Route::post('acciones/editar/update/{id}','Encuestas\controladoresconfiguracion\AccionesController@update')->name('encuestas_acciones_update'); // Ruta para la funcion UPDATE de ACCIONES



Route::delete('detele_acciones/{id}','Encuestas\controladoresconfiguracion\AccionesController@destroy')->name('acciones_destroy'); // Ruta para la funcion DELETE de ACCIONES



// CORREOS



Route::get('Create/correos','Encuestas\controladoresconfiguracion\CorreosController@createCO')->name('correos_create'); // Ruta para la vista CREATE de CORREOS



Route::post('store_correos', 'Encuestas\controladoresconfiguracion\CorreosController@store')->name('store_correos'); //  Ruta para la funcion STORE de CORREOS



Route::get('editar/correos/{id}','Encuestas\controladoresconfiguracion\CorreosController@edit')->name('correos_edit'); //  Ruta para la vista de CORREOS



Route::post('correos/editar/update/{id}','Encuestas\controladoresconfiguracion\CorreosController@update')->name('correos_update'); // Ruta para la funcion UPDATE de CORREOS



Route::delete('detele_correos/{id}','Encuestas\controladoresconfiguracion\CorreosController@destroy')->name('correos_destroy'); // Ruta para la funcion DELETE de CORREOS



// FECHA ENCUESTA



Route::get('Create/fecha_encuesta','Encuestas\controladoresconfiguracion\FechaEncuestaController@createFE')->name('fecha_encuesta_create'); // Ruta para la vista CREATE de FECHA ENCUESTA



Route::post('store_fecha_encuesta', 'Encuestas\controladoresconfiguracion\FechaEncuestaController@store')->name('store_fecha_encuesta'); //  Ruta para la funcion STORE de FECHA ENCUESTA



Route::get('editar/fecha_encuesta/{id}','Encuestas\controladoresconfiguracion\FechaEncuestaController@edit')->name('fecha_encuesta_edit'); //  Ruta para la vista de FECHA ENCUESTA



Route::post('fecha_encuesta/editar/update/{id}','Encuestas\controladoresconfiguracion\FechaEncuestaController@update')->name('fecha_encuesta_update'); // Ruta para la funcion UPDATE de FECHA ENCUESTA



Route::delete('detele_fecha_encuesta/{id}','Encuestas\controladoresconfiguracion\FechaEncuestaController@destroy')->name('fecha_encuesta_destroy'); // Ruta para la funcion DELETE de FECHA ENCUESTA



// INFORMACION DE AYUDA

Route::get('Create/informacion_de_ayuda','Encuestas\controladoresconfiguracion\InformacionDeAyudaController@create')->name('informacion_de_ayuda_create'); // Ruta para la vista CREATE de INFORMACION DE AYUDA

Route::post('store_informacion_de_ayuda', 'Encuestas\controladoresconfiguracion\InformacionDeAyudaController@store')->name('store_informacion_de_ayuda'); //  Ruta para la funcion STORE de INFORMACION DE AYUDA

Route::get('editar/informacion_de_ayuda/{id}','Encuestas\controladoresconfiguracion\InformacionDeAyudaController@edit')->name('informacion_de_ayuda_edit'); //  Ruta para la vista de INFORMACION DE AYUDA

Route::post('informacion_de_ayuda/editar/update/{id}','Encuestas\controladoresconfiguracion\InformacionDeAyudaController@update')->name('informacion_de_ayuda_update'); // Ruta para la funcion UPDATE de INFORMACION DE AYUDA

Route::post('pdf', 'Encuestas\controladoresconfiguracion\InformacionDeAyudaController@showPDF')->name('mostrar_pdf'); // Ruta para la funcion ShowPDF de POLITICAS CLIENTES

Route::post('pdfDocumento', 'Encuestas\controladoresconfiguracion\InformacionDeAyudaController@showPDFDocumento')->name('mostrar_pdf_documento'); // Ruta para la funcion ShowPDF de POLITICAS CLIENTES

Route::post('pdfGlosario', 'Encuestas\controladoresconfiguracion\InformacionDeAyudaController@showPDFGlosario')->name('mostrar_pdf_glosario'); // Ruta para la funcion ShowPDF de POLITICAS CLIENTES

Route::delete('detele_informacion_de_ayuda/{id}','Encuestas\controladoresconfiguracion\InformacionDeAyudaController@destroy')->name('informacion_de_ayuda_destroy'); // Ruta para la funcion DELETE de INFORMACION DE AYUDA





//Encuesta Órdenes de Servicio

Route::get('encuestaOS/editar/edit/{id}', 'Encuestas\EncuestaOSController@edit')->name('editar_ordenservicioencuesta'); // vista

Route::post('encuestaOS/editar/update/{id}','Encuestas\EncuestaOSController@update')->name('update_ordenservicioencuesta');

Route::post('encuestaOS/editar/notificar','Encuestas\EncuestaOSController@sendAnalista')->name('notificar_analista');

Route::post('encuestaOS/editar/notificar/cerrar_notificar','Encuestas\EncuestaOSController@sendFinServicio')->name('cerrar_servicio_notificar');





/******************************************************************************* */

//                  RUTAS DE EDITAR SOLICITUD

/*********************************************************************************/

Route::get('Encuestas/editar/{id}', 'Encuestas\EditarSolicitudController@edit')->name('editar_encuestasController'); // Recuperación de valores



//Eliminación de valores

Route::delete('Encuestas/EliminarCentrosTrabajo/{id}','Encuestas\EditarSolicitudController@eliminarCentroTrabajo')->name('distribucion_ct_destroy'); //delete

Route::delete('EncuestasEditarSolicitud/EliminarDepartamentos/{id}','Encuestas\EditarSolicitudController@eliminarDepartamentos')->name('distribucion_de_depto_destroy'); //delete

Route::delete('EncuestasEditarSolicitud/EliminarPuestos/{id}','Encuestas\EditarSolicitudController@eliminarPuestos')->name('distribucion_de_puestos_destroy'); //delete





//creaciones

Route::post("addmoreCentroTrabajo/Create","Encuestas\EditarSolicitudController@storeCT")->name('addmoreCentroTrabajo');

Route::post("storeDepartamentos/Create","Encuestas\EditarSolicitudController@storeDepartamentos")->name('addmoreDepartamentosEditar');

Route::post("storePuestos/Create","Encuestas\EditarSolicitudController@storePuestos")->name('addmorePuestosEditar');





//ACTUALIZACIONES

Route::post('Encuestas/EditarSolicitudCT/update/{id}','Encuestas\EditarSolicitudController@updateCentroTrabajo')->name('update_solicitud_CT');

Route::post('Encuestas/EditarSolicitudDepartamentos/update/{id}','Encuestas\EditarSolicitudController@updateDepartamento')->name('update_solicitud_Departamento');

Route::post('Encuestas/EditarSolicitudPuestos/update/{id}','Encuestas\EditarSolicitudController@updatePuesto')->name('update_solicitud_Puesto');



//ACTIVACIÓN DE INPUT ValidacionesDepartamentos

Route::resource('EditarValidacionCT', 'Encuestas\EditarSolicitudController@obtenerValidacionCT');



//LINK ENCUETA

Route::get('startEncuesta/{IdEncuesta}/{IdServicioCliente}/{codigoUnico}', 'Encuestas\StartEncuestaController@startEncuesta')->name('startEncuesta');

// Route::get('startEncuesta/{cryptedData}', 'Encuestas\StartEncuestaController@startEncuesta')->name('startEncuesta');



Route::get('quejaSugerencia/{IdCliente}/{IdPeriodo}', 'Encuestas\controladorSugerencias\SugerenciasController@index')->name('quejaSugerencia');

Route::post('quejaSugerencia_store', 'Encuestas\controladorSugerencias\SugerenciasController@storeSug')->name('quejaSugStore');
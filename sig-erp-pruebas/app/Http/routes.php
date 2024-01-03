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



	Route::get('/','Auth\AuthController@showLoginForm');
	Route::get('/permission_denied',function(){
		return view('errors.validacion-app');
	});

	Route::auth();

	Route::get('/home', 'HomeController@index');

/*************************************************************************************
								AREA PARA LOS CLIENTES
*************************************************************************************/
Route::get('login/clientes','AuthClientesController@showLoginForm');
Route::post('login/clientes','AuthClientesController@login');
Route::get('logout/clientes','AuthClientesController@getLogout');


Route::get('expediente/files','FilesExpedientesController@showFiles');



/*************************************************************************************
								AREA PARA LOS CLIENTES
*************************************************************************************/



/*************************************************************************************
								AREA PARA LOS PROSPECTOS
*************************************************************************************/
Route::get('prospecto/contacto/alta','ProspectosController@altaProspecto');
Route::post('prospecto/contacto/guardar','ProspectosController@guardar');

/*************************************************************************************
							FIN AREA PARA LOS PROSPECTOS
*************************************************************************************/




Route::group([	'prefix' => 'utilerias',
				'as' => 'sig-erp-utilerias::',
				'middleware' => ['auth','auth.module:crm']], 
				function () {
	Route::resource('plantillas','Utilerias\PlantillasController');
	Route::resource('impuestos','Utilerias\ImpuestosController');
	/*----- PLANTILLAS CONTRATOS ---------*/
    Route::resource('plantilla_contratos','Utilerias\PlantillasContratosController');
    Route::POST('guardarContrato','Utilerias\PlantillasContratosController@GuardarContrato');
 	Route::get('lista_plantillas_contratos','Utilerias\PlantillasContratosController@listaPlantillasContratos');
 	Route::POST('update_contratos','Utilerias\PlantillasContratosController@UpdateContratos');
 	Route::get('baja_contratos','Utilerias\PlantillasContratosController@BajaPlantillasContratos');
 	Route::get('get_plantillas_contrato','Utilerias\PlantillasContratosController@getPlantllasContratos');
 	/*----- PLANTILLAS CONTRATOS end ---------*/
});


Route::group(['as' => 'sig-erp-crm::','middleware' => ['auth','auth.module:crm']], function () {
   
   
    Route::resource('dashboard','DashboardController');
 	Route::resource('clientes','ClientesController');
 	Route::resource('catalogo/clientes','ClientesController');


 	Route::get('getCurp','ClientesController@getCURP');
 	Route::get('getRfc','ClientesController@getRFC');
 	Route::get('save','ClientesController@saveContactos');
 	Route::get('validador_campos_cliente','ClientesController@validarCamposCliente');
 	Route::get('validarNombreComercial','ClientesController@validarNombreComercial');

 	Route::resource('cn','CNController');
 	Route::get('lista_cn','CNController@listaCN');

 	Route::resource('ejecutivos','EjecutivosController');
 	Route::get('lista_ejecutivos','EjecutivosController@listadoEjecutivos');	

 	Route::resource('cp','CpController');
 	Route::get('lista_cp','CpController@listaCp');
 	Route::get('lista_clientes','ClientesController@listaClientes');
 	Route::get('list_cps','CpController@listaCodigoPostal');
	 	 	

 	Route::resource('validacion','ClientesController');
 	Route::get('validacion','ClientesController@ValidacionClientes');


 	Route::resource('accionXcliente','AccionXclienteController');

 	Route::resource('accionClientes','AccionXclienteController');
 	Route::get('accionXclientes','AccionXclienteController@ValidacionClientes');

 	
 	Route::get('downloadFile/{carpetacliente}/{pathToFile}','AccionXclienteController@downloadAnexo');
 	Route::resource('contactos','ContactosController');
 	Route::get('lista_contactos','ContactosController@listaContactos');
 	Route::get('lista_contactos_correos','ContactosController@listaContactosCorreos');
 	
 	Route::resource('correos','CorreosController');
 	Route::get('lista_correos','CorreosController@correosContactos');
 	Route::get('listado_borradores','CorreosController@listadoBorradores');
 	Route::get('all_borradores','CorreosController@getAllBorradores');
 	Route::post('upload_file','CorreosController@uploadFile');
 	Route::post('upload_file_email','CorreosController@uploadFileEMail');
 	Route::get('cantidad_borradores','CorreosController@cantidadBorradores');

	Route::resource('agenda','agendaController');
 	Route::get('agendaListado','agendaController@listadoEventos');


 	Route::resource('cotizador',"CotizadorController");
 	Route::get('serviciosCotizador','CotizadorController@listaServicios');
 	Route::get('listCN','CotizadorController@listaCN');
 	Route::get('listado_cotizaciones','CotizadorController@listadoCotizaciones');
 	Route::get('catalogo/listado_cotizaciones','CotizadorController@listadoCotizaciones');
 	Route::get('all_cotizaciones','CotizadorController@getListaCotizaciones');
 	route::get('ListadoPlantillasContratos','CotizadorController@ListadoPlantillasContratos');

 	Route::get('files_user','CorreosController@filesUser');
 	Route::get('enviar_mail','CorreosController@enviarMail');

 	Route::get('cotizador_general','CotizadorGenericoController@index');
 	Route::post('cotizador_general','CotizadorGenericoController@store');





 	Route::resource('cartas_tipo','CartasTipoController');
 	Route::get('lista_cartas_tipo','CartasTipoController@listaCartasTipo');
 	Route::get('get_carta_tipo','CartasTipoController@getCartaTipo');

	
	Route::resource('listaEseCosto','CotizadorEseController');
 	Route::get('ese_costo_normal','CotizadorEseController@visualizaCostoNormal');
 	Route::get('ese_costo_urgente','CotizadorEseController@visualizaCostoUrgente');
 	Route::get('listaReferenciaLaborales','CotizadorEseController@visualizaCostoReferenciaLaborales');
 	Route::get('listado_estados','CotizadorEseController@ListaEstado');
 	Route::get('listado_tipo_servicio_ese','CotizadorEseController@listaTipoServicio');
 	





    Route::resource('listaPsicometricos','CotizadorPsicometricoController');

 	Route::get('listaCatalogoPsicometricos','CotizadorPsicometricoController@listaCatalogoServicios');
 	Route::get('listaCostoPsicometricos','CotizadorPsicometricoController@visualizaCostoPsico');
 	Route::get('listaConfigPsicometrico','CotizadorPsicometricoController@listaConfigPsicometrico');
 	Route::post("ConfiguracionCostoPsicometrico","CotizadorPsicometricoController@ConfiguracionCostoPsicometrico");
 	Route::get("editPrueba","CotizadorPsicometricoController@editPrueba");
 	Route::post("AltaPaquetePsicometrico","CotizadorPsicometricoController@AltaPaquetePsicometrico");
 	



 	Route::resource('servicio_rys','CotizadorRYSController');
 	Route::get('genera_costo_rys','RYSController@generaCosto');
 	Route::get('descarga_rys/{id}','CotizadorRYSController@downloadCotizacionRYS');

 	Route::resource('servicio_maquila','CotizadorMaquilaController');
 	Route::get('maquila_cotizador','CotizadorMaquilaController@cotizacionMaquila');
 	Route::get('descarga_maquila/{id}','CotizadorMaquilaController@downloadCotizacionMaquila');
 	Route::get('descarga_ese/{id}','CotizadorEseController@downloadCotizacionEse');
  	Route::get('descarga_psicometrico/{id}','CotizadorPsicometricoController@downloadCotizacionPsico');
  	Route::get('listaPaquete','CotizadorMaquilaController@listaPaquete');
  	Route::post('ConfiguracionCostoMaquila','CotizadorMaquilaController@ConfiguracionCostoMaquila');
  	Route::get("listaPaqueteMaqDescripcion","CotizadorController@listaPaqueteMaqDescripcion");
  	Route::post('ConfiguracionCostoMaquilaAlta','CotizadorMaquilaController@ConfiguracionCostoMaquilaAlta');
  	Route::get('editConfMaquila','CotizadorMaquilaController@editarConfiguracion');
  	Route::get('MostrarPaquetes','CotizadorMaquilaController@MostrarPaquetes');

   /*********************** ALTA DE SERVICIOS COTIZADOR GENERAL +++++++++++++++++++++++**/

   Route::resource('servicios_generales','Administrador\CotizadorGeneralServiciosController');
   Route::post('AltaServicios','Administrador\CotizadorGeneralServiciosController@AltaServicios');
   Route::get('EdicionServicios','Administrador\CotizadorGeneralServiciosController@EdicionServicios');
   Route::post('UpdateServicios','Administrador\CotizadorGeneralServiciosController@UpdateServicios');
   Route::get('EliminarServicios','Administrador\CotizadorGeneralServiciosController@EliminarServicios');
   Route::post('DeleteServicio','Administrador\CotizadorGeneralServiciosController@DeleteServicio');
   /*********************** eEND DE SERVICIOS COTIZADOR GENERAL +++++++++++++++++++++++/

  	/**********************   DESCARGA DESDE EL MODULO DE CATALOGOS *******************/

  	Route::get('catalogo/maquila_cotizador','CotizadorMaquilaController@cotizacionMaquila');
 	Route::get('catalogo/descarga_maquila/{id}','CotizadorMaquilaController@downloadCotizacionMaquila');
 	Route::get('catalogo/descarga_ese/{id}','CotizadorEseController@downloadCotizacionEse');
  	Route::get('catalogo/descarga_psicometrico/{id}','CotizadorPsicometricoController@downloadCotizacionPsico');
  	Route::post('catalogo/descarga_generico}','CotizadorGenericoController@downloadCotizacionGenerica')->name('download.cotizacion.generica');
  	Route::post('plantilla_generica/duplicate','Utilerias\PlantillasController@duplicateTemplate')->name('duplicate.cotizacion.generica');

  	/**********************   DESCARGA DESDE EL MODULO DE CATALOGOS *******************/
  

	 
	  
	Route::resource('expediente','ExpedienteController');
	Route::get('expediente_ids/{id_user}/{idcli}/{nombre_comercial}','ExpedienteController@RecibirID');


  Route::resource('ver_documentos','ExpedienteController@verArchivos');
  Route::get('download_anexo_cliente/{carpetacliente}/{pathToFile}','ExpedienteController@download_anexo_cliente');



 	Route::resource('contrato_rys','ContratoRYSController');
 	Route::resource('contrato_maquila','ContratoMaquilaController');
 	Route::resource('contrato_ese','ContratoESEController');
 	Route::resource('contrato_psicometricos','ContratoPsicometricoController');
 	Route::resource('contrato_generico','ContratoGenericoController');

 	/******************************************************************************
 										 CONTRATOS 
 	******************************************************************************/
    Route::resource('listado_contratos',"ListadoContratoController");
    Route::resource('catalogo/listado_contratos',"ListadoContratoController");
	Route::get('contrato_rys_preview/{id}','ContratoRYSController@preview');
	Route::get('contrato_maquila_preview/{id}','ContratoMaquilaController@preview');
	Route::get('contrato_ese_preview/{id}','ContratoESEController@preview');
	Route::get('contrato_psiometricos_preview/{id}','ContratoPsicometricoController@preview');
	Route::get('contrato_generico_preview/{id}','ContratoGenericoController@preview');
	
	/******************************************************************************
 									  FIN CONTRATOS 
 	******************************************************************************/

 	 /******************************************* REPORTES CRM **********************************/
    Route::resource("ClientesContratos","ClientesContratosController");
    Route::resource("ClientesExpedientes","ClientesExpedientesController");
    Route::resource("ReportesCitas","ReportesCitasController");
    Route::resource("ReportesLLamadas","ReportesllamadasController");
    Route::resource("ReportesCotizaciones","ReportesCotizacionesController");
    Route::get('reporteContratos','ClientesContratosController@listarContratos');
    Route::get('reporteCitas','ReportesCitasController@listarCitas');
    Route::resource("ReporteProspectos","ReporteProspectosController");
    Route::get("listaProspectos","ReporteProspectosController@ListadoProspectos");

   /******************************************* END REPORTES CRM **********************************/

  /*********************************************************************************************************************
													GENERACIÓN DE CONTRATOS WORD
  *********************************************************************************************************************/
	/*Route::get('descarga_contrato_ese',function(){
	    return view('crm.contratos.pdf-contrato_ese');
	 });*/
	 Route::get('descarga_anexo_contrato_ese',function(){
	    return view('crm.contratos.pdf-anexo-contrato_ese');
	 });
	 
	 Route::get('descarga_anexo_contrato_rys',function(){
	    return view('crm.contratos.pdf-anexo_contrato_rys');
	 });
	/* Route::get('descarga_contrato_psicometricos',function(){
	    return view('crm.contratos.pdf-contrato_psico');
	 });*/
	 Route::get('descarga_contrato_maquila/{id_cotizacion}','ContratoMaquilaController@downloadWord');
	 Route::get('descarga_contrato_rys/{id_cotizacion}','ContratoRYSController@downloadWord');
	 Route::get('descarga_contrato_psicometricos/{id_cotizacion}','ContratoPsicometricoController@downloadWord');
	 Route::get('descarga_contrato_ese/{id_cotizacion}','ContratoESEController@downloadWord');
	 Route::get('descarga_contrato_generico/{id_cotizacion}','ContratoGenericoController@downloadWord');
  /*********************************************************************************************************************
												FIN GENERACIÓN DE CONTRATOS WORD
  *********************************************************************************************************************/


  /*********************************************************************************************************************
												URL PARA REPORTES
  *********************************************************************************************************************/
    Route::get('reportes_get_cn','ReportesCotizacionesController@listaReportesCn');
    Route::get('reportes_get_servicio','ReportesCotizacionesController@listaReportesServicio');
    Route::get('reportes_get_sector','ReportesCotizacionesController@listaReportesSector');	
    Route::get('reporte_cotizaciones','ReportesCotizacionesController@reporteCotizaciones');

	Route::get('reporte_llamadas','ReportesllamadasController@reporteLlamadas');
  /*********************************************************************************************************************
											  FIN URL PARA REPORTES
  *********************************************************************************************************************/							


/*********************************************************************************************************************
											ESTADISTICAS DASHBOARD
  *********************************************************************************************************************/
    Route::get('estadisticas_cuadros','DashboardController@cuadrosEstadisticos');		
    Route::get('clientes_mes_dashboard','DashboardController@portletClientesMes');		


/*********************************************************************************************************************
										 FIN ESTADISTICAS DASHBOARD
  *********************************************************************************************************************/




	/*********************************************************************************************************************
											 ORDEN DE SERVICIO
	  *********************************************************************************************************************/




	Route::resource('ordenes_servicio','OS\OrdenServicioController');
	Route::resource('orden-servicio-ese','OS\OrdenServicioEseController');
	Route::resource('orden-servicio-rys','OS\OrdenServicioRYSController');
	Route::resource('orden-servicio-maquila','OS\OrdenServicioMaquilaController');
	Route::resource('orden-servicio-psicometricos','OS\OrdenServicioPsicometricosController');

	/*****************************************************************************************************************/
	Route::get('download_orden_servicio_ese/{id}','OS\OrdenServicioEseController@download');
	Route::get('download_orden_servicio_rys/{id}','OS\OrdenServicioRYSController@download');
	Route::get('download_orden_servicio_maquila/{id}','OS\OrdenServicioMaquilaController@download');
	Route::get('download_orden_servicio_psicometricos/{id}','OS\OrdenServicioPsicometricosController@download');
	/*****************************************************************************************************************/



	/*********************************************************************************************************************
											 FIN ORDEN DE SERVICIO
    *********************************************************************************************************************/

/************************** CAMBIAR CLIENTE DE CN ********************************/
	 	Route::get('cambiarClienteCN','ClientesController@cambiarCn');
	/************************** CAMBIAR CLIENTE DE CN ********************************/

});






/*********************************************************************************************************************
										 INICIO ADMINISTRADOR
  *********************************************************************************************************************/
Route::group(['as' => 'sig-erp-crm::','middleware' => ['role:admin'] ], function () {

	Route::resource('modulo/administrador/usuarios','Administrador\UsuarioController');
	Route::post('new-foreign-user','Administrador\UsuarioController@usuarioForaneo'); 
	Route::resource('modulo/administrador/puestos','Administrador\PuestoController');
	Route::resource('modulo/administrador/kardex','Administrador\KardexController');
	Route::get('modulo/administrador/cuentas','Administrador\CuentaController@index');
	

/*********************************************************************************************************
												SERVICIOS
*********************************************************************************************************/

	Route::get('modulo/administrador/servicios/rys','Administrador\RysController@index');

	Route::resource('modulo/administrador/servicios/rys','RysController');
	Route::get('get_rys_servicio','RysController@getServicioRys');
	Route::resource('modulo/administrador/servicios/ese','EseController');
	Route::get('modulo/administrador/servicios/listado-estudios-ese','EseController@getListadoTiposEstudio');


	Route::post('prioridad_ese_store','EseController@savePrioridad');
	Route::post('tipo_servicio_ese_store','EseController@saveTipoServicio');
	Route::get('get_prioridad_ese','EseController@getPrioridad');
	Route::post('prioridad_ese_edit','EseController@editPrioridad');
	
	Route::get('tipo_estudio_ese_edit','EseController@getTipoEstudio');
	Route::post('tipo_estudio_ese_edit','EseController@editTipoEstudio');


/*********************************************************************************************************
											 FIN SERVICIOS
*********************************************************************************************************/



	/**************************** EMPRESAS FACTURADORAS ***********************************************************/
	Route::resource('EmpresasFacturadoras','Administrador\EmpresasFacturadorasController');
	/**************************** END EMPRESAS FACTURADORAS ***********************************************************/

	/**************************** DEPARTAMENTOS **********************************************************************/
	Route::resource('departamentos','Administrador\departamentosController');
	Route::get('modulo/administrador/cuentas/lista_modulos_permisos','Administrador\PermisosController@listaModulosPrincipales');
	Route::get('modulo/administrador/cuentas/lista_sub_modulos_permisos','Administrador\PermisosController@listaSubModulos');


	/**************************** END DEPARTAMENTOS **********************************************************************/


	/*********************************************************************************************************************
											 FIN ADMINISTRADOR
	  *********************************************************************************************************************/



	});

require_once('routes_ese.php');
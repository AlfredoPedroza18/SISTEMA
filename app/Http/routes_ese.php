<?php



/*DB::listen(function( $query ){

    echo "<pre>{ $query->sql }</pre>";

});*/



Route::get('metodos',function(){

    $estudio = App\ESE\EstudioEse::find(33);

    $modelo  = $estudio->formatoMetlife;

    $arr_content = [ getHeaderXls( $modelo->relacionesModelo() ), getContetntXls( $modelo->relacionesModelo(), $modelo ) ];



    //dd( $arr_content );







    Excel::create('Formato-ESE-'.$estudio->id, function($excel) use( $arr_content )

    {

        $excel->sheet('Sheetname', function($sheet) use( $arr_content )

        {



            $rows    = 1;

            foreach ($arr_content as $index => $value)

            {

                $columns = 0;

                foreach ( $value as $field )

                {

                    $sheet->setCellValueByColumnAndRow( $columns, $rows , $field );

                    $columns++;

                }

                $rows++;

            }



        });



    })->download('csv');

});





function getHeaderXls( $relationship )

{

    $headers = [];

    foreach ($relationship as $relation )

    {



        $headers[] = '||COMPONENTE||';

        $headers[] = $relation['model'];



        foreach ($relation['fields'] as $index => $field)

        {

            $headers[] = $field;

        }





    }

    return $headers;

}





function getContetntXls( $relationship, $model )

{

    //dd( $relationship );



    $content = [];

    foreach ($relationship as $relation )

    {



        $content[] = '||RESPUESTA||';

        $content[] = $relation['model'];

        $method    = $relation['method'];



        foreach ($relation['fields'] as $field)

        {

            if( $relation['type'] != 'HasMany' )

            {

                $content[] =  $field . ' ' . $model->$method->$field;

            }else

            {

                $content[] =  $field . ' ' . $model->$method->first()->$field;

            }



        }





    }

    return $content;

}

Route::get("permisosESE{id}",'Administrador\PermisosNomController@editESE')->name('permisosESE');



Route::group(['as' => 'sig-erp-ese::','middleware' => ['auth','auth.module:ese']], function () {

    Route::post("setPermisoESE",'ClientesController@setRol')->name('setPermisoESE');

    Route::resource('CatalogoEstados','ESE\EstadosController');

    Route::resource('CatalogoCiudades','ESE\CiudadesController');

    Route::resource('CatalogoModalidades','ESE\ModalidadesController');

    Route::resource('CatalogoEmpleados','ESE\EmpleadosController');

    Route::resource('CatalogoRegiones','ESE\RegionesController');

    Route::resource('CatalogoRegionesxEdo','ESE\RegionesxEdoController');

    Route::resource('ValidacionMunicipio', 'ESE\RegionesxEdoController@ValidacionMunicipio');



    Route::post('CatalogoEmpleadosT','ESE\EmpleadosController@indexPPersonal');

    Route::post('GCreate','ESE\EmpleadosController@GCreate');

    Route::post('updateEmpleado','ESE\EmpleadosController@update');

    Route::get('UpdateRegiones', 'ESE\EmpleadosController@UpdateRegiones');

    Route::get('deleteMunicipioAsignado/{Id}/{IdEmpleado}', 'ESE\EmpleadosController@deleteMunicipioAsignado');



    Route::get('CatalogoAnalistas','ESE\EmpleadosController@indexAnalistas');

    Route::get('PermisosESE','ESE\EmpleadosController@indexPermisos');

    Route::get('CatalogoInvestigadores','ESE\EmpleadosController@indexInvestigadores');

    Route::get('existEmailInvestigator/{email}', 'ESE\EmpleadosController@existEmailInvestigator');

    Route::get('existUsernameInvestigator/{username}', 'ESE\EmpleadosController@existUsernameInvestigator');



    Route::get('getEjecutive','ClientesController@getEjecutive');



    Route::post('/EmpleadosSubirDocumentos','ESE\EmpleadosController@subirDocumentos');

    Route::post('Empleados_search_cp','ESE\EmpleadosController@searchCP');

    Route::post('Empleados_search_regE','ESE\EmpleadosController@RegionesEdit');

    Route::post('Empleados_search_regS','ESE\EmpleadosController@RegSelect');

    Route::get('getMunicipios/{IdEstado}','ESE\EmpleadosController@getMunicipios');

    //Route::get('/EmpleadosActualizarDocumentos/{id}','ESE\EmpleadosController@actualizarDoc');

    Route::resource('CatalogoTiposServicio','ESE\TiposServicioController');



    //Route::resource('CatalogoTiposServicioEncuesta','Encuestas\controladorescatalogos\TiposServicioEncuestaController');

    //Route::resourse('CatalogoTiposServicioEncuesta','Encuestas\controladorescatalogos\TiposServicioEncuestaController');



    //Route::get('catalogo_encuestas/documentos','Encuestas\controladorescatalogos\DocumentosController@index')->name('catalogo_documentos');



    Route::resource('CTiposServicios','ESE\CTiposServiciosController');

    Route::resource('AvisoPrivacidad','ESE\AvisoPrivaciadController');

    Route::resource('CatalogoPrioridades','ESE\PrioridadesController');

    Route::resource('CatalogoCodigosPostales','ESE\CodigosPostalesController');

    Route::resource('Validacion', 'ESE\CodigosPostalesController@Validacion');

    Route::resource('ValidacionCP', 'ESE\CodigosPostalesController@ValidacionCP');





    Route::resource('Subgrupos', 'ESE\SubgruposController');

    Route::post('AgrupadoresxContenedor', 'ESE\SubgruposController@Filtro');

    Route::get('AgrupadoresOrden/{id}', 'ESE\SubgruposController@FiltroOrden');

    Route::get('GAgrupador', 'ESE\SubgruposController@GAgrupador');

    Route::get('GuardarAgrupador', 'ESE\SubgruposController@GuardarAgrupador');

    Route::get('AgrupadoresE/{id}','ESE\SubgruposController@editarA');

    Route::get('GuardarAA', 'ESE\SubgruposController@ActualizarA');

    Route::get('AgrupadoresExC/{id}','ESE\SubgruposController@editarAxC');

    Route::get('GuardarAxC', 'ESE\SubgruposController@ActualizarAxC');

    Route::get('reacomodarAgrupa', 'ESE\SubgruposController@reacomodar');



    Route::resource('PlantillaGenerica', 'ESE\PlantillaGenericaController');

    Route::resource('ValidacionPG', 'ESE\PlantillaGenericaController@ValidacionPG');

    Route::resource('ValidacionPOrd', 'ESE\PlantillaGenericaController@ValidacionPOrd');

    Route::get('GuardarEntradaPlantilla', 'ESE\PlantillaGenericaController@GuardarEntradaPlantilla');

    Route::get('GuardarPlantilla', 'ESE\PlantillaGenericaController@GuardarPlantilla');

    Route::resource('ValidacionPC', 'ESE\PlantillaGenericaController@ValidacionPC');

    Route::get('UpdatePlantilla', 'ESE\PlantillaGenericaController@UpdatePlantilla');

    Route::get('DeletePlantilla', 'ESE\PlantillaGenericaController@DeletePlantilla');

    // Route::get('PlantillaR', 'ESE\PlantillaGenericaController@PlantillaR');

    Route::get('PlantillaR/{id}','ESE\PlantillaGenericaController@PlantillaR');

    //Route::post('/CatalogoEmpleados','ESE\EmpleadosController@subirDocumentos');



    Route::resource('Grupos', 'ESE\GruposController');

    Route::get('GuardarGrupo', 'ESE\GruposController@GuardarGrupo');

    Route::get('GuardarGG', 'ESE\GruposController@ActualizarG');

    Route::get('GruposE/{id}','ESE\GruposController@editarG');

    Route::get('Gruposreacomodar','ESE\GruposController@reacomodar');



    Route::resource('Campos', 'ESE\CamposController');

    Route::post('CamposxAgrupador', 'ESE\CamposController@Filtro');

    Route::get('GCampo', 'ESE\CamposController@GCampo');

    Route::get('GuardarCampo', 'ESE\CamposController@GuardarCampo');

    Route::get('CamposOrden/{id}/{clas}', 'ESE\CamposController@FiltroOrden');

    Route::get('CamposEE/{id}','ESE\CamposController@editarC');

    Route::get('GuardarCC', 'ESE\CamposController@ActualizarC');

    Route::get('CamposExA/{id}','ESE\CamposController@editarAxCamp');

    Route::get('GuardarCampxA', 'ESE\CamposController@ActualizarCampxA');

    Route::get('NotificaWeb', 'ESE\NotificaWeb@notificacion');

    Route::get('NotificaLeidos/{id}/{IdEse}', 'ESE\NotificaWeb@Leidos');





    Route::resource('PlantillaCliente', 'ESE\AsignacionPlantillaClienteController');

    Route::get('PlantillaClienteC/{idc}', 'ESE\AsignacionPlantillaClienteController@createpc');

    Route::get('PlantillaClienteCI/{idc}', 'ESE\AsignacionPlantillaClienteController@indexPC');

    Route::get('FPlantillas/{ids}/{idTipo}', 'ESE\AsignacionPlantillaClienteController@FPlantillas');

    Route::resource('ValidacionPG', 'ESE\AsignacionPlantillaClienteController@ValidacionPG');

    Route::get('GuardarEntradaPlantillaCliente', 'ESE\AsignacionPlantillaClienteController@GuardarEntradaPlantilla');

    Route::get('GuardarEntradaPlantillaClienteEdit', 'ESE\AsignacionPlantillaClienteController@GuardarEntradaPlantillaEdit');

    Route::get('GuardarPlantillaCliente', 'ESE\AsignacionPlantillaClienteController@GuardarPlantilla');

    Route::resource('ValidacionPC', 'ESE\AsignacionPlantillaClienteController@ValidacionPC');

    Route::get('UpdatePlantillaCliente', 'ESE\AsignacionPlantillaClienteController@UpdatePlantilla');

    Route::get('DeletePlantillaCliente', 'ESE\AsignacionPlantillaClienteController@DeletePlantilla');

    Route::get('ReasignarPlantillaCliente', 'ESE\AsignacionPlantillaClienteController@ReasignarPlantilla');

    Route::get('PlantillaClienteR/{id}/{idcs}/{idspcs}','ESE\AsignacionPlantillaClienteController@PlantillaR');

    Route::get('PlantillaClienteRPC/{id}/{idc}','ESE\AsignacionPlantillaClienteController@PlantillaRPC');

    Route::get('PlantillaClienteREdit/{id}','ESE\AsignacionPlantillaClienteController@PlantillaREdit');

    Route::get('GetDataPlantillaCliente/{IdPlantillaCliente}', 'ESE\AsignacionPlantillaClienteController@GetDataPlantillaCliente'); //obtener datos de la plantilla cliente

    Route::get('SaveDataPlantillaCliente', 'ESE\AsignacionPlantillaClienteController@SaveDataPlantillaCliente');




    Route::resource('listadoAnalistasec', 'ESE\ListadoOSController@listadoAnalistasec');

    Route::get('listadoNo/{id}', 'ESE\ListadoOSController@listadoNo');
    //filtrado de anallista secundario 
    Route::get('filterOsAnalistaSec/{paramFilter1}/{paramFilter2}', 'ESE\ListadoOSController@filterOsAnalistaSec');
    

    Route::resource('ListadoOS', 'ESE\ListadoOSController');

    Route::get('updateC', 'ESE\ListadoOSController@updateC');

    Route::get('cancelService/{IdServicioEse}/{IdPlantillaCliente}/{IdCliente}/{usuarioCancel}','ESE\ListadoOSController@cancelService');

    Route::get('filterOs/{typeFilter}/{paramFilter}/{isClient}', 'ESE\ListadoOSController@filterOs');

    /* Inicia Route Catalogo Paises */

    Route::resource('CatalogoPaises','ESE\PaisesController');

    /* Finaliza Route Catalogo Paises */



    Route::resource('configuracion','ESE\ConfiguracionesController');
    Route::resource('configuracionServicios','ESE\ConfiguracionesServiciosController');
    Route::resource('configuracionFormatos','ESE\ConfiguracionesFormatosController');



    Route::resource('catalogosese','ESE\CatalogosEseController');



    Route::resource('NuevaOS', 'ESE\NuevaOSController');

    Route::get('ConfiguracionOS/{id}/{idc}', 'ESE\NuevaOSController@ConfiguracionOS');

    Route::get('ConfiguracionOSEdit/{id}/{idc}', 'ESE\NuevaOSController@ConfiguracionOSEdit');

    Route::get('OrdenServicio', 'ESE\NuevaOSController@indexOS');

    Route::get('editarOS/{id}', 'ESE\NuevaOSController@editarOS');

    Route::get('saveOS', 'ESE\NuevaOSController@saveOS');

    Route::get('searchEdo/{idRegion}', 'ESE\NuevaOSController@searchEdo'); // para filtrar estado x region

    Route::get('searchCity/{idState}', 'ESE\NuevaOSController@searchCity'); // para filtrar ciudad x estado

    Route::get('searchRegion/{idRegion}', 'ESE\NuevaOSController@searchRegion'); // para filtrar region x estado//Gustavito el pana

    Route::get('searchColiniaCologne/{ciudad}', 'ESE\NuevaOSController@searchColiniaCologne'); // para filtrar colonia x ciudad

    Route::post('ESEvencimiento','ESE\NuevaOSController@ESEvencimiento');

    Route::post('ConfirmacionAnalista','ESE\NuevaOSController@ConfirmacionAnalista');

    Route::post('ConfirmacionInvestigador','ESE\NuevaOSController@ConfirmacionInvestigador');

    Route::resource('NuevaOSCliente', 'ESE\NuevoOSClienteController');

    Route::get('EliminaOSCliente/{idc}/{idS}', 'ESE\NuevoOSClienteController@deleteOS');



    Route::get('PlantillaClienteOS/{ids}/{idc}', 'ESE\NuevoOSClienteController@PlantOS');

    Route::get('FPlantillasCOS/{ids}/{IdCliente}/{IdTipoServicio}', 'ESE\NuevoOSClienteController@FPlantillasCOS');

    Route::get('ConfiguracionOSPC/{id}/{idc}/{ids}/{hrefO}/{idPlantillaCliente}', 'ESE\NuevoOSClienteController@ConfiguracionOSPC');

    Route::post('ServiciosxCliente', 'ESE\NuevoOSClienteController@FiltroPC');

    Route::get('ServClientes/{idc}/{ids}', 'ESE\NuevoOSClienteController@ServClientes');

    Route::get('ConfiguracionOSCEdit/{id}/{idc}', 'ESE\NuevoOSClienteController@ConfiguracionOSEdit');

    Route::get('FormatosTab/{id}', 'ESE\NuevoOSClienteController@FormatosTab');

    Route::get('Title/{id}', 'ESE\NuevoOSClienteController@title');

    Route::get('DatosPlantillaC/{id}/{nombre}/{TipoModalidad}', 'ESE\NuevoOSClienteController@DatosPlantilla');

    Route::get('DatosPlantillaN/{nombre}/{TipoModalidad}', 'ESE\NuevoOSClienteController@DatosPlantillaN');

    Route::get('DeletePlantilla/{idse}', 'ESE\NuevoOSClienteController@DeletePlantilla');

    Route::get('DeletePlantillaI/{idse}', 'ESE\NuevoOSClienteController@DeletePlantillaI');

    Route::get('SolicitarOSC/{idc}/{ids}', 'ESE\NuevoOSClienteController@SolicitarOSC');

    Route::get('ServiciosxClienteR/{idc}', 'ESE\NuevoOSClienteController@FiltroPCR');

    Route::get('UpdatePrioridad/{idp}/{idse}', 'ESE\NuevoOSClienteController@UpdatePrioridad');

    Route::get('UpdateModalidad/{idm}/{idse}', 'ESE\NuevoOSClienteController@UpdateModalidad');

    Route::get('searchRfc/{rfc}','ESE\NuevoOSClienteController@searchRfc');

    Route::get('getdataForNewEse/{IdServicioEse}','ESE\NuevoOSClienteController@getdataForNewEse');

    Route::get('NotificacionSolicitarOSC', 'ESE\NuevoOSClienteController@notificacionSolicitarOSC');



    Route::post('PlantillaxCliente', 'ESE\NuevaOSController@FiltroPC');

    Route::post('GuardarAsignacion','ESE\NuevaOSController@GuardarAsignacion');

    Route::post('GuardarProgramacionE','ESE\NuevaOSController@GuardarProgramacionE');

    Route::post('NotificarStatus','ESE\NuevaOSController@Notificar');

    Route::post('NotificarAlCorreo','ESE\NuevaOSController@NotificarAlCorreo');

    Route::get ('pdf-gent/{id}/{idc}','ESE\NuevaOSController@pdf')->name("pdf");

    Route::get ('pdf-documentos/{idEse}','ESE\NuevaOSController@pdfdocumentos')->name("pdfd");

    Route::post('SaveAnalista','ESE\NuevaOSController@saveAnalista');

    Route::post('SaveDictamenA','ESE\NuevaOSController@saveDictamenA');

    Route::post('DictamenInvestigador','ESE\NuevaOSController@DictamenInvestigador');

    Route::get('valuescampos', 'ESE\NuevaOSController@valuescampos');

    Route::get('DatosPlantilla/{id}', 'ESE\NuevaOSController@DatosPlantilla');

    Route::get('ValidacionCampN', 'ESE\|@ValidacionCampN');

    Route::get('ValidacionCampNEdit', 'ESE\CamposController@ValidacionCampNEdit');

    Route::get('reacomodar', 'ESE\CamposController@reacomodar');

    Route::get('SaveFormulario/{IdServicioEse}/{Estatus}','ESE\NuevaOSController@saveFormulario');

    Route::get('GetFilePreview/{IdServicioEse}', 'ESE\NuevaOSController@GetFilePreview');



    Route::post('GuardarEstudio','ESE\NuevaOSController@GuardarEstudio');

    Route::post('GuardarFile/{id}','ESE\NuevaOSController@GuardarFile');



    Route::post('GuardarEstudioInput', 'ESE\NuevaOSController@GuardarEstudioInput');
    Route::post('GuardarEstudioInput2', 'ESE\NuevaOSController@GuardarEstudioInput2');

    Route::post('saveResetValueInput', 'ESE\NuevaOSController@saveResetValueInput');

    Route::resource('ConfiguracionEmail', 'ESE\ConfiguracionEmailController');

    Route::post('ConfiguracionEmailUpdate', 'ESE\ConfiguracionEmailController@save_update');

    Route::post('ConfiguracionEmailSave', 'ESE\ConfiguracionEmailController@save');

    Route::post('DataInvestigador', 'ESE\NuevaOSController@search');

    Route::post('searchIRegion', 'ESE\NuevaOSController@searchIRegion');//filtrar investigadores de una region

    Route::resource('roles', 'ESE\roles');

    Route::get('analistaSendEmail/{IdServicioEse}','ESE\NuevaOSController@sendNotificationEseClose');

    Route::get('getJsonSummary/{IdServicioEse}','ESE\NuevaOSController@getJsonSummary');

    Route::get('getFiles/{IdServicioEseEntrada}/{IdServicioEse}','ESE\NuevaOSController@getFiles');

    Route::get('deleteFiles/{IdServicioEseEntrada}/{IdServicioEse}','ESE\NuevaOSController@deleteFiles');

    ////////////---------------PLANTILLA GENERICA PRUEBA-----------////////////////////////////////////


    

    Route::resource('PlantillaGenericaP', 'ESE\PlantillaGenericaPController');

    Route::resource('ValidacionPGP', 'ESE\PlantillaGenericaPController@ValidacionPG');

    Route::resource('ValidacionPOrdP', 'ESE\PlantillaGenericaPController@ValidacionPOrd');

    // Route::get('GuardarEntradaPlantillaP', 'ESE\PlantillaGenericaPController@GuardarEntradaPlantilla');
    Route::get ('plantilla/{IdPlantilla}','ESE\PlantillaGenericaPController@preP')->name("pdfs");

    Route::get('GuardarEntradaPlantillaP/{id}/{idP}', 'ESE\PlantillaGenericaPController@GuardarEntradaPlantilla');

    Route::get('GuardarEntradaPlantillaPEdit/{id}/{idP}', 'ESE\PlantillaGenericaPController@GuardarEntradaPlantillaEdit');

    Route::get('GuardarPlantillaP', 'ESE\PlantillaGenericaPController@GuardarPlantilla');

    Route::resource('ValidacionPCP', 'ESE\PlantillaGenericaPController@ValidacionPC');

    Route::get('UpdatePlantillaP', 'ESE\PlantillaGenericaPController@UpdatePlantilla');



    Route::get('UpdateCamposME/{idP}', 'ESE\PlantillaGenericaPController@UpdateCamposME');



    Route::get('DeletePlantillaP', 'ESE\PlantillaGenericaPController@DeletePlantilla');

    // Route::get('PlantillaR', 'ESE\PlantillaGenericaController@PlantillaR');

    Route::get('PlantillaRP/{id}','ESE\PlantillaGenericaPController@PlantillaR');

    Route::get('PlantillaRPEdit/{id}','ESE\PlantillaGenericaPController@PlantillaREdit');

    Route::get('llenartabla','ESE\PlantillaGenericaPController@llenartabla');

    Route::get('llenardetalles/{clasificacion}/{agrupador}','ESE\PlantillaGenericaPController@llenardetalles');





    Route::post('UbicacionMaps','ESE\EmpleadosController@ubicacion');

    //Route::post('/CatalogoEmpleados','ESE\EmpleadosController@subirDocumentos');

    Route::get('GetDataPlantilla/{DescripcionPlantilla}/{TipoServicio}', 'ESE\PlantillaGenericaPController@GetDataPlantilla');

    Route::get('SaveDataPlantilla', 'ESE\PlantillaGenericaPController@SaveDataPlantilla');



    //////////////////----------FIN PLANTILLA GENERICA PRUEBA----------/////////////////////////////



});





Route::group(['as' => 'sig-erp-ese::','middleware' => ['auth','auth.module:ese']], function () {







//_____________________ORDENES DE SERVICIO____________________________________________//

            Route::resource('dashboardese','ESE\DashboardController');

            //filter dashboard
            Route::get('Filtros/{IdCliente}/{IdAnalista}/{IdInvestigador}/{IdModalidad}/{Dateini}/{Dateend}','ESE\DashboardController@Filtros');

            Route::get('getDataChart/{Id}/{Dateini}/{Dateend}','ESE\DashboardController@getDataChart');

            Route::get('GetDataByClient/{IdCliente}/{Dateini}/{Dateend}','ESE\DashboardController@GetDataByClient');

            Route::get('GetDataByInvestigator/{IdInvestigador}/{Dateini}/{Dateend}','ESE\DashboardController@GetDataByInvestigator');

            Route::get('GetDataByAnalist/{IdAnalista}/{Dateini}/{Dateend}','ESE\DashboardController@GetDataByAnalist');

            Route::get('GetDataByPeriod/{Dateini}/{Dateend}','ESE\DashboardController@GetDataByPeriod');

            Route::get('GetDataByTypeClient/{TipoCliente}/{Dateini}/{Dateend}','ESE\DashboardController@GetDataByTypeClient');

            Route::get('GetDataByStatusProcess/{Estatus}/{Dateini}/{Dateend}','ESE\DashboardController@GetDataByStatusProcess');

            //clear filter dashboard

            Route::get('GetClients','ESE\DashboardController@GetClients');

            Route::get('GetInvestigators','ESE\DashboardController@GetInvestigators');

            Route::get('GetAnalists','ESE\DashboardController@GetAnalists');

            Route::get('GetTypeClients','ESE\DashboardController@GetTypeClients');

            Route::get('GetStatusProcess','ESE\DashboardController@GetStatusProcess');

            Route::get('GetBoxHeader','ESE\DashboardController@GetBoxHeader'); 

            Route::get('GetDataByAll/{IdCliente}/{IdInv}/{IdAnalist}/{TipoClient}/{EstatusProceso}/{Dateini}/{Dateend}',

                        'ESE\DashboardController@GetDataByAll');

            // Route::resource('configuracion','ESE\ConfiguracionesController');



			Route::resource('os','ESE\OrdenServicioController');

			Route::get('detalleOs','ESE\OrdenServicioController@detalleOs');

			Route::get('cerrar_os','ESE\OrdenServicioController@cerrar_os');

			Route::get('cancelar_os','ESE\OrdenServicioController@cancelar_os');

			Route::resource('detalleEstudio','ESE\OrdenServicioDetalleController');

			Route::get('detalleOsEstudio/{id}','ESE\OrdenServicioDetalleController@detalleID');

			//Route::get('mapa','ESE\GmapsController@index');



		 	Route::resource('estudio-ese','ESE\EstudioSocioeconomicoController');

		 	Route::get('estudio-ese-save-visita','ESE\EstudioSocioeconomicoController@guardarFechaVisita');

		 	Route::get('estudio-ese-asignar-ejecutivo','ESE\EstudioSocioeconomicoController@setEjecutivos');

		 	Route::get('estudio-ese-reasignar-ejecutivo','ESE\EstudioSocioeconomicoController@updateEjecutivos');

		 	Route::get('estudio-ese-asignar-plantilla','ESE\EstudioSocioeconomicoController@asignarPlantilla');



            Route::post('estudio-ese-iniciar','ESE\EstudioSocioeconomicoController@iniciarEstudio');

            Route::post('estudio-ese-cerrar','ESE\EstudioSocioeconomicoController@cerrarEstudio');

		 	Route::post('estudio-ese-cancelar','ESE\EstudioSocioeconomicoController@cancelarEstudio');

		 	Route::post('estudio-ese-no-iniciar','ESE\EstudioSocioeconomicoController@noIniciarEstudio');

		 	Route::post('estudio-ese-add-anexo','ESE\EstudioSocioeconomicoController@addAnexo');

		 	Route::post('estudio-ese-add-imagen','ESE\EstudioSocioeconomicoController@addImagen');

		 	Route::get('estudio-ese-download-anexo','ESE\EstudioSocioeconomicoController@downloadFileAnexo');

            Route::get('estudio-ese-download-imagen','ESE\EstudioSocioeconomicoController@downloadFileImagen');

            Route::post('estudio-ese-delete-imagen','ESE\EstudioSocioeconomicoController@deleteFileImagen');

            Route::get('estudio-ese-download-pdf-ese','ESE\EstudioSocioeconomicoController@downloadPdfEse');

		 	Route::get('estudio-ese-guardar-viaticos','ESE\EstudioSocioeconomicoController@guardarViaticos');

            Route::get('estudio-ese-download-formatos','ESE\EstudioSocioeconomicoController@downloadFileFormatosEse');



		 	//reporte---------------------------------

		 	Route::resource("reporte","ESE\ReporteController");

		 	Route::get("reporteGeneral","ESE\ReporteController@getReporte");

		 	Route::get("cerrarEse","ESE\OrdenServicioDetalleController@cerrarEse");

		 	//END reporte---------------------------------





		 	Route::get('estudio-ese-investigadores','ESE\EstudioSocioeconomicoController@listaInvestigadores');



		 	Route::resource('estudio-ese-plantillas','ESE\PlantillasController');

		 	Route::resource('estudio-ese-formatos','ESE\FormatoController');

            Route::resource('estudio-ese-acta-hechos','ESE\ActaHechosController');

            Route::get('pdfActaHechos','ESE\ActaHechosController@pdfActaHechos');



            Route::get('list_cpss','CpController@listaCodigoPostal');





            /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de HSBC

            *******************************************************************************************************************/

            Route::resource('formato-hsbc','ESE\FormatosEstaticos\FormatoHsbcController');

            Route::post('delete-referencia-lab-simple','ESE\FormatosEstaticos\FormatoHsbcController@deleteReferenciaSimple');

            Route::post('delete-referencia-lab-cinco','ESE\FormatosEstaticos\FormatoHsbcController@deleteReferenciaCinco');

            Route::post('delete-viven-domicilio','ESE\FormatosEstaticos\FormatoHsbcController@deleteVivenDomicilio');



            /*******************************************************************************************************************

                                                Fin Ruta para el formato estatico de HSBC

            *******************************************************************************************************************/





                 /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de METLIFE

            *******************************************************************************************************************/

            Route::resource('formato-metlife','ESE\FormatosEstaticos\FormtatoMetlifeController');

            Route::post('delete-curso','ESE\FormatosEstaticos\FormtatoMetlifeController@deleteCurso');

            Route::post('delete-idioma','ESE\FormatosEstaticos\FormtatoMetlifeController@deleteIdioma');

            Route::post('delete-conocimiento','ESE\FormatosEstaticos\FormtatoMetlifeController@deleteConocimiento');

            Route::post('delete-familia','ESE\FormatosEstaticos\FormtatoMetlifeController@deleteFamilia');

            Route::post('delete-personal','ESE\FormatosEstaticos\FormtatoMetlifeController@deletePersonal');

            Route::post('delete-laboral','ESE\FormatosEstaticos\FormtatoMetlifeController@deleteLaboral');

            /*******************************************************************************************************************

                                                Fin Ruta para el formato estatico de METLIFE

            *******************************************************************************************************************/



            /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de JLL

            *******************************************************************************************************************/

            Route::resource('formato-jll','ESE\FormatosEstaticos\FormatoJllController');

            Route::post('delete-referencia-lab-simple-jll','ESE\FormatosEstaticos\FormatoJllController@deleteReferenciaSimple');

            Route::post('delete-referencia-lab-cinco-jll','ESE\FormatosEstaticos\FormatoJllController@deleteReferenciaCinco');

            Route::post('delete-viven-domicilio-jll','ESE\FormatosEstaticos\FormatoJllController@deleteVivenDomicilio');





            /*******************************************************************************************************************

                                                Fin Ruta para el formato estatico de JLL

            *******************************************************************************************************************/



             /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de EVENPLAN

            *******************************************************************************************************************/

            Route::resource('formato-evenplan','ESE\FormatosEstaticos\FormatoEvenplanController');

            Route::post('evenplan-delete-referencia-personal','ESE\FormatosEstaticos\FormatoEvenplanController@deleteReferenciaPersonal');

            Route::post('evenplan-delete-idioma','ESE\FormatosEstaticos\FormatoEvenplanController@deleteIdioma');

            Route::post('evenplan-delete-parentesco','ESE\FormatosEstaticos\FormatoEvenplanController@deleteParentesco');

            Route::post('evenplan-delete-referencia-laboral','ESE\FormatosEstaticos\FormatoEvenplanController@deleteReferenciaLaboral');



            /*******************************************************************************************************************

                                                Fin Ruta para el formato estatico de EVENPLAN

            *******************************************************************************************************************/

              /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de GRUPO ROA

            *******************************************************************************************************************/

             Route::resource('formato-roa','ESE\FormatosEstaticos\FormatoRoaController');

             Route::post('delete-escolaridad','ESE\FormatosEstaticos\FormatoRoaController@deleteEscolaridad');

             Route::post('delete-curso','ESE\FormatosEstaticos\FormatoRoaController@deleteCurso');

             Route::post('delete-idioma','ESE\FormatosEstaticos\FormatoRoaController@deleteIdioma');

             Route::post('delete-conocimiento','ESE\FormatosEstaticos\FormatoRoaController@deleteConocimiento');

             Route::post('delete-familia','ESE\FormatosEstaticos\FormatoRoaController@deleteFamilia');

             Route::post('delete-tratamiento','ESE\FormatosEstaticos\FormatoRoaController@deleteTratamiento');

             Route::post('delete-personal','ESE\FormatosEstaticos\FormatoRoaController@deletePersonal');

             Route::post('delete-laboral','ESE\FormatosEstaticos\FormatoRoaController@deleteLaboral');







            /*******************************************************************************************************************

                                                Fin Ruta para el formato estatico de GRUPO ROA

            *******************************************************************************************************************/







            /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de SEGUROS MONTERREY

            *******************************************************************************************************************/

            Route::resource('formato-sgmty','ESE\FormatosEstaticos\FormatoSgMtyController');

            Route::post('sgmty-delete-cursos-realizados','ESE\FormatosEstaticos\FormatoSgMtyController@deleteCursoRealizado');

            Route::post('sgmty-delete-idioma','ESE\FormatosEstaticos\FormatoSgMtyController@deleteIdioma');

            Route::post('sgmty-delete-conocimiento','ESE\FormatosEstaticos\FormatoSgMtyController@deleteConocimiento');

            Route::post('sgmty-delete-referencia-personal','ESE\FormatosEstaticos\FormatoSgMtyController@deleteReferenciaPersonal');

            Route::post('sgmty-delete-referencia-laboral','ESE\FormatosEstaticos\FormatoSgMtyController@deleteReferenciaLaboral');







            /*******************************************************************************************************************

                                                Fin Ruta para el formato estatico de SEGUROS MONTERREY

            *******************************************************************************************************************/



            /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de HDDISC

            *******************************************************************************************************************/

            Route::resource('formato-hddisc','ESE\FormatosEstaticos\FormatoHddiscController');



            Route::post('hddisc-delete-cursos-realizados','ESE\FormatosEstaticos\FormatoHddiscController@deleteCursoRealizado');

            Route::post('hddisc-delete-idioma','ESE\FormatosEstaticos\FormatoHddiscController@deleteIdioma');

            Route::post('hddisc-delete-conocimiento','ESE\FormatosEstaticos\FormatoHddiscController@deleteConocimiento');

            Route::post('hddisc-delete-referencia-personal','ESE\FormatosEstaticos\FormatoHddiscController@deleteReferenciaPersonal');

            Route::post('hddisc-delete-referencia-laboral','ESE\FormatosEstaticos\FormatoHddiscController@deleteReferenciaLaboral');

            Route::post('hddisc-delete-dato-familiar','ESE\FormatosEstaticos\FormatoHddiscController@deleteDatoFamiliar');

            Route::post('hddisc-delete-familiar-padece','ESE\FormatosEstaticos\FormatoHddiscController@deleteFamiliarPadece');







            /*******************************************************************************************************************

                                                Fin Ruta para el formato estatico de HDDISC

            *******************************************************************************************************************/



             /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de GNP

            *******************************************************************************************************************/

            Route::resource('formato-gnp','ESE\FormatosEstaticos\FormatoGnpController');

            Route::post('delete-curso','ESE\FormatosEstaticos\FormatoGnpController@deleteCurso');

            Route::post('delete-idioma','ESE\FormatosEstaticos\FormatoGnpController@deleteIdioma');

            Route::post('delete-conocimiento','ESE\FormatosEstaticos\FormatoGnpController@deleteConocimiento');

            Route::post('delete-familia','ESE\FormatosEstaticos\FormatoGnpController@deleteFamilia');

            Route::post('delete-tratamiento','ESE\FormatosEstaticos\FormatoGnpController@deleteTratamiento');

            Route::post('delete-laboral','ESE\FormatosEstaticos\FormatoGnpController@deleteLaboral');



                        /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de GNP

            *******************************************************************************************************************/







            /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de FEMSA

            *******************************************************************************************************************/

            Route::resource('formato-femsa','ESE\FormatosEstaticos\FormatoFemsaController');



            Route::post('femsa-delete-cursos-realizados','ESE\FormatosEstaticos\FormatoFemsaController@deleteCursoRealizado');

            Route::post('femsa-delete-idioma','ESE\FormatosEstaticos\FormatoFemsaController@deleteIdioma');

            Route::post('femsa-delete-conocimiento','ESE\FormatosEstaticos\FormatoFemsaController@deleteConocimiento');

            Route::post('femsa-delete-referencia-personal','ESE\FormatosEstaticos\FormatoFemsaController@deleteReferenciaPersonal');

            Route::post('femsa-delete-referencia-laboral','ESE\FormatosEstaticos\FormatoFemsaController@deleteReferenciaLaboral');

            Route::post('femsa-delete-dato-familiar','ESE\FormatosEstaticos\FormatoFemsaController@deleteDatoFamiliar');

            Route::post('femsa-delete-familiar-padece','ESE\FormatosEstaticos\FormatoFemsaController@deleteFamiliarPadece');







            /*******************************************************************************************************************

                                                Fin Ruta para el formato estatico de FEMSA

            *******************************************************************************************************************/



            /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de BCM

            *******************************************************************************************************************/

            Route::resource('formato-bcm','ESE\FormatosEstaticos\FormatoBcmController');

            Route::post('delete-referencia-lab-simple-bcm','ESE\FormatosEstaticos\FormatoBcmController@deleteReferenciaSimple');

            Route::post('delete-referencia-lab-cinco-bcm','ESE\FormatosEstaticos\FormatoBcmController@deleteReferenciaCinco');

            Route::post('delete-viven-domicilio-bcm','ESE\FormatosEstaticos\FormatoBcmController@deleteVivenDomicilio');





            /*******************************************************************************************************************

                                                Fin Ruta para el formato estatico de BCM

            *******************************************************************************************************************/



            /*******************************************************************************************************************

                                                Inicio Ruta para el formato estatico de GENT

            *******************************************************************************************************************/

            Route::resource('formato-gent','ESE\FormatosEstaticos\FormatoGentController');



            Route::post('gent-delete-cursos-realizados','ESE\FormatosEstaticos\FormatoGentController@deleteCursoRealizado');

            Route::post('gent-delete-idioma','ESE\FormatosEstaticos\FormatoGentController@deleteIdioma');

            Route::post('gent-delete-conocimiento','ESE\FormatosEstaticos\FormatoGentController@deleteConocimiento');

            Route::post('gent-delete-referencia-personal','ESE\FormatosEstaticos\FormatoGentController@deleteReferenciaPersonal');

            Route::post('gent-delete-referencia-laboral','ESE\FormatosEstaticos\FormatoGentController@deleteReferenciaLaboral');

            Route::post('gent-delete-dato-familiar','ESE\FormatosEstaticos\FormatoGentController@deleteDatoFamiliar');

            Route::post('gent-delete-familiar-padece','ESE\FormatosEstaticos\FormatoGentController@deleteFamiliarPadece');

            Route::get('gent-download-format-xls','ESE\FormatosEstaticos\FormatoGentController@downloadXls');







            /*******************************************************************************************************************

                                                Fin Ruta para el formato estatico de GENT

            *******************************************************************************************************************/











//_____________________END ORDENES DE SERVICIO____________________________________________//

});



Route::get('pdf-doc',function(){



	/*$data =  [

        'quantity'      => '1' ,

        'description'   => 'some ramdom text',

        'price'   => '500',

        'total'     => '500'

    ];

    $date = date('Y-m-d');

    $invoice = "2222";

    $view =  \View::make('ESE.pdf-plantillas.pdf-gent', compact('data', 'date', 'invoice'))->render();

    $pdf = \App::make('dompdf.wrapper');

    $pdf->loadHTML($view);

    return $pdf->stream('invoice');*/



    //return view('ESE.pdf-plantillas.pdf-gent');



    $estudio = App\ESE\EstudioEse::with('cliente','ejecutivoPrincipal')->find(94);





    // dd($estudio);

    $data = [ 'estudio' => $estudio,

              'pintar'  => false,

              'datos'   => []

     ];



     //return view('ESE.pdf-plantillas.demo-doc', compact('data') );

     //return view('ESE.pdf-plantillas.pdf-gent', compact('data') );

    $pdf = PDF::loadView('ESE.pdf-plantillas.pdf-hsbc', compact('data') );

    $pdf->setPaper('letter', 'portrait');

    //return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));

    return $pdf->stream('pdf-gent.pdf');

    return $pdf->download('pdf-gent.pdf');



    //return view('ESE.pdf-plantillas.pdf-gent');

});



Route::get('pdf-doc-metlife',function(){

	/*$data =  [

        'quantity'      => '1' ,

        'description'   => 'some ramdom text',

        'price'   => '500',

        'total'     => '500'

    ];

    $date = date('Y-m-d');

    $invoice = "2222";

    $view =  \View::make('ESE.pdf-plantillas.pdf-gent', compact('data', 'date', 'invoice'))->render();

    $pdf = \App::make('dompdf.wrapper');

    $pdf->loadHTML($view);

    return $pdf->stream('invoice');*/





    //return view('ESE.pdf-plantillas.pdf-gent');



    $estudio = App\ESE\EstudioEse::find(99);

    $data = ['estudio' => $estudio];

    $pdf = PDF::loadView('ESE.pdf-plantillas.pdf-metlife',compact('data'));

    $pdf->setPaper('letter', 'portrait');

    return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));

    return $pdf->download('pdf-metlife.pdf');



    //return view('ESE.pdf-plantillas.pdf--hsbc');

});

Route::get('pdf-referencias-laborales',function(){



	/*$data =  [

        'quantity'      => '1' ,

        'description'   => 'some ramdom text',

        'price'   => '500',

        'total'     => '500'

    ];

    $date = date('Y-m-d');

    $invoice = "2222";

    $view =  \View::make('ESE.pdf-plantillas.pdf-gent', compact('data', 'date', 'invoice'))->render();

    $pdf = \App::make('dompdf.wrapper');

    $pdf->loadHTML($view);

    return $pdf->stream('invoice');*/



    //return view('ESE.pdf-plantillas.pdf-gent');



    $estudio = App\ESE\EstudioEse::find(11);

    $data = ['estudio' => $estudio];



    $pdf = PDF::loadView('ESE.pdf-plantillas.pdf-referencias-laborales',compact('data'));

    $pdf->setPaper('letter', 'portrait');

    return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));

    return $pdf->download('pdf-referencias-laborales.pdf');



    //return view('ESE.pdf-plantillas.pdf--hsbc');

});

Route::get('pdf-referencias-personales',function(){

	/*$data =  [

        'quantity'      => '1' ,

        'description'   => 'some ramdom text',

        'price'   => '500',

        'total'     => '500'

    ];

    $date = date('Y-m-d');

    $invoice = "2222";

    $view =  \View::make('ESE.pdf-plantillas.pdf-gent', compact('data', 'date', 'invoice'))->render();

    $pdf = \App::make('dompdf.wrapper');

    $pdf->loadHTML($view);

    return $pdf->stream('invoice');*/



    //return view('ESE.pdf-plantillas.pdf-gent');

    $estudio = App\ESE\EstudioEse::find(90);

    $data = ['estudio' => $estudio];

    $pdf = PDF::loadView('ESE.pdf-plantillas.pdf-referencias-personales',compact('data'));

    $pdf->setPaper('letter', 'portrait');

    return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));

    return $pdf->download('pdf-referencias-personales.pdf');



    //return view('ESE.pdf-plantillas.pdf--hsbc');

});

Route::get('pdf-estudio-becas',function(){

	/*$data =  [

        'quantity'      => '1' ,

        'description'   => 'some ramdom text',

        'price'   => '500',

        'total'     => '500'

    ];

    $date = date('Y-m-d');

    $invoice = "2222";

    $view =  \View::make('ESE.pdf-plantillas.pdf-gent', compact('data', 'date', 'invoice'))->render();

    $pdf = \App::make('dompdf.wrapper');

    $pdf->loadHTML($view);

    return $pdf->stream('invoice');*/



    //return view('ESE.pdf-plantillas.pdf-gent');

     $estudio = App\ESE\EstudioEse::find(87);

    $data = ['estudio' => $estudio];

    $pdf = PDF::loadView('ESE.pdf-plantillas.pdf-estudio-becas',compact('data'));

    $pdf->setPaper('letter', 'portrait');

    return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));

    return $pdf->download('pdf-estudio-becas.pdf');



    //return view('ESE.pdf-plantillas.pdf--hsbc');

});



Route::get('pdf-visita-domiciliaria',function(){

	/*$data =  [

        'quantity'      => '1' ,

        'description'   => 'some ramdom text',

        'price'   => '500',

        'total'     => '500'

    ];

    $date = date('Y-m-d');

    $invoice = "2222";

    $view =  \View::make('ESE.pdf-plantillas.pdf-gent', compact('data', 'date', 'invoice'))->render();

    $pdf = \App::make('dompdf.wrapper');

    $pdf->loadHTML($view);

    return $pdf->stream('invoice');*/



    //return view('ESE.pdf-plantillas.pdf-gent');

    $pdf = PDF::loadView('ESE.pdf-plantillas.pdf-visita-domiciliaria');

    $pdf->setPaper('letter', 'portrait');

    return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));

    return $pdf->download('pdf-visita-domiciliaria.pdf');



    //return view('ESE.pdf-plantillas.pdf--hsbc');

});



Route::get('pdf-acta-hechos',function(){

	/*$data =  [

        'quantity'      => '1' ,

        'description'   => 'some ramdom text',

        'price'   => '500',

        'total'     => '500'

    ];

    $date = date('Y-m-d');

    $invoice = "2222";

    $view =  \View::make('ESE.pdf-plantillas.pdf-gent', compact('data', 'date', 'invoice'))->render();

    $pdf = \App::make('dompdf.wrapper');

    $pdf->loadHTML($view);

    return $pdf->stream('invoice');*/



    //return view('ESE.pdf-plantillas.pdf-gent');

    $pdf = PDF::loadView('ESE.pdf-plantillas.pdf-acta-hechos');

    $pdf->setPaper('letter', 'portrait');

    return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));

    return $pdf->download('pdf-acta-hechos.pdf');



    //return view('ESE.pdf-plantillas.pdf--hsbc');

});













Route::get('fields',function(){

	/*$escolaridad = App\ESE\Plantillas\Componente::find(3);

	$campo_main	 = new App\ESE\Plantillas\Campo(['label' 		=> 'escolaridad',

												 'key' 	 		=> 'esc_escolaridad_main',

												 'descripcion'	=> 'Campo principal de escolaridad'

												 ]);

	$main_field = $escolaridad->campos()->save($campo_main);*/



	$main_escolaridad = App\ESE\Plantillas\Campo::find(52);





/*	$campo_main	 = new App\ESE\Plantillas\Campo(['label' 		=> 'Comprobante',

												 'key' 	 		=> 'esc_comprobante',

												 'descripcion'	=> 'Campo que describe el comprobante de estudios',

												 'main' 		=> 0

												 ]);

	$field = $main_escolaridad->campos()->save($campo_main);*/







	$num_rows = $main_escolaridad->rows;

	$campos   = $main_escolaridad->campos;



	for ($i=0; $i < $num_rows; $i++) {



		echo 'Row: ' . $i . '<br>';

		foreach ($campos as $campo) {

			echo ' || ' . $campo->label . ' ||    ';

		}



		echo ' <br> ';

	}

	dd( $main_escolaridad->hasChilds() );

});





Route::get('view-fields',function(){



    $campos = App\ESE\Plantillas\Componente::find(101)->campos;



    nodos( $campos );





    return 'éxito';

});





function nodos( $fields )

{





    echo '<ul>';





    $collection = $fields->each(function($item){

        echo '<li>';

        if( $item->multiple && $item->main )

        {

            echo $item->label . ' +++MAIN+++ ' . ' Iterar: ' . $item->rows;

            pintarTable( $item );

            #nodos( $item->campos );

        }elseif ( $item->parent_id == 0 ) {



            echo $item->label;

            pintarInput( $item->label );

        }



        echo '</li>';



    });

    echo '</ul>';



    /*echo '<ul> ';



    foreach ( $fields as $field )

    {



        echo '<li>' . $field->label . '  ooooo  ';

        if( $field->multiple && $field->main)

        {

            $campos = $field->campos;



            echo  $field->label.'++';

            nodos( $campos );

        }else{

            echo $field->label . '  *****  ';

        }



        echo '</li>';









    }



    echo '</ul>';*/



}





function pintarInput( $value = '' )

{

    echo '<input type="text" value="' . $value . '">';

}







function pintarTable( $item )

{

    $rows = $item->rows;

    $str_main= '<hr><table>';

    for($i=0; $i < $rows; $i++)

    {

        $str = '<tr>';

        foreach ($item->campos as $campo) {



            if( !$campo->multiple )

            {

                $str .= '<td><input type="text" value="' . $campo->key .'_' . $i . '_row">'. $campo->label ;

            }else{

                pintarSubTable( $campo, $i );

            }

        }

        $str_main .= $str.'</tr>';

    }



    echo $str_main .= '</table>' ;

}



function pintarSubTable( $item, $x )

{

    $rows = $item->rows;

    $str_main= '<hr><table>';

    for($i=0; $i < $rows; $i++)

    {

        $str = '<tr>';

        foreach ($item->campos as $campo) {

            $str .= '<td><input type="text" value="' . $campo->key .'_' . $i . '_' . $x . '_row">'. $campo->label ;

            if( $campo->multiple )

            {

                pintarTable( $campo );

            }

        }

        $str_main .= $str.'</tr>';

    }



    echo $str_main .= '</table>' ;

}


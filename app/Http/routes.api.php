<?php

Route::group(['middleware' => ['api.basic.auth', 'api.auth']], function () {
    Route::post('applogin', 'api\AppLoginController@login');
    Route::post('changepwd', 'api\UserController@changePassword');
    Route::post('changephoto', 'api\UserController@changePhoto');


    Route::get('empleado/{idPersonal}', 'api\EmpleadoQryController@datos');
    Route::get('empleado/{idPersonal}/ahorros/page/{page}/results/{results}', 'api\EmpleadoQryController@historicoAhorro');
    Route::get('empleado/{idPersonal}/ausencias/page/{page}/results/{results}', 'api\EmpleadoQryController@historicoPermisosAusencia');
    Route::get('empleado/{idPersonal}/incapacidades/page/{page}/results/{results}', 'api\EmpleadoQryController@historicoAusenciaIncapacidades');
    Route::get('empleado/{idPersonal}/vacaciones/page/{page}/results/{results}', 'api\EmpleadoQryController@historicoVacaciones');
    Route::get('empleado/{idPersonal}/prestamos/page/{page}/results/{results}', 'api\EmpleadoQryController@historicoPrestamos');

    Route::get('empleado/{idPersonal}/nominas/page/{page}/results/{results}', 'api\NominaQryController@nominaInfo');
    Route::get('empleado/{idPersonal}/nominas/{idNomina}/detalle/page/{page}/results/{results}', 'api\NominaQryController@nominaInfo');


});


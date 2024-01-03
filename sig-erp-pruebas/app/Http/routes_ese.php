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

Route::group(['as' => 'sig-erp-ese::','middleware' => ['auth','auth.module:ese']], function () {

//_____________________ORDENES DE SERVICIO____________________________________________//
		    Route::resource('dashboardese','ESE\DashboardController');
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



















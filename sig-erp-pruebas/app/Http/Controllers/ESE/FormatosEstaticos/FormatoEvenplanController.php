<?php

namespace App\Http\Controllers\ESE\FormatosEstaticos;

use App\ESE\EstudioEse;
use App\ESE\Plantillas\Formato;
use File;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ESE\Formatos\Evenplan\FormatoEvenplan;
use App\ESE\Formatos\Evenplan\ResumenEvenplan;
use App\ESE\Formatos\Evenplan\DatosPersonalesEvenplan;
use App\ESE\Formatos\Evenplan\EscolaridadEvenplan;
use App\ESE\Formatos\Evenplan\EscolaridadDetalleEvenplan;
use App\ESE\Formatos\Evenplan\IdiomaEvenplan;
use App\ESE\Formatos\Evenplan\ParentescoEvenplan;
use App\ESE\Formatos\Evenplan\DocumentacionEvenplan;
use App\ESE\Formatos\Evenplan\ReferenciaEconomicaEvenplan;
use App\ESE\Formatos\Evenplan\GastoMensualEvenplan;
use App\ESE\Formatos\Evenplan\ReferenciaLaboralEvenplan;
use App\ESE\Formatos\Evenplan\ReferenciaPersonalEvenplan;

class FormatoEvenplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $formato       = Formato::find( $id );
        $estudio       = EstudioEse::find( $request->estudio );
        $os            = $estudio->ordenServicioEse->orden_servicio->id;
        $os_ese        = $estudio->ordenServicioEse->id;
        $id_ese        = $estudio->id;
        $backToEstudio = "estudio-ese/create?os=$os&os_ese=$os_ese&ese=$id_ese";
        
        if( $estudio && $formato )
        {
            return view('ESE.formatos-estaticos.evenplan.formato-evenplan', compact( 'estudio','backToEstudio' ) );
        }      

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 

        $this->validate($request, 
            [    'resumen_grafica.grafica' => 'image',       

            ],[  'resumen_grafica.grafica.image' => 'La gráfica DEBERÍA SER UN ARCHIVO DE TIPO IMAGEN, los datos del formulario no fueron gurdados, intenta de nuevo.',
            
            ]);


        
        $estudio = EstudioEse::with('formatoEvenplan')->get()->find( $id );

        if( $estudio )
        {    
            $formato_estudio     = null;
            
            if( !$estudio->formatoEvenplan )
            {              

                $formato_hsbc             = new FormatoEvenplan;
                $formato_hsbc->fecha_alta = Carbon::now();
                $formato_estudio          = $estudio->formatoEvenplan()->save( $formato_hsbc );  
            }else{
                $formato_estudio = $estudio->formatoEvenplan;                
            }

            $this->insertOrUpdateResumen( $formato_estudio, $request->resumen );
            $this->insertOrUpdateResumenGrafica( $formato_estudio, $request->resumen_grafica );
            $this->insertOrUpdateDatos_personales( $formato_estudio, $request->datos_personales );
            $this->insertOrUpdateEscolaridad( $formato_estudio, $request->escolaridad );
            $this->insertOrUpdateEscolaridad_detalle( $formato_estudio, $request->escolaridad_detalle );
            $this->insertOrUpdateIdiomas( $formato_estudio, $request->idiomas );
            $this->insertOrUpdateParentesco( $formato_estudio, $request->parentesco );
            $this->insertOrUpdateDocumentacion( $formato_estudio, $request->documentacion );
            $this->insertOrUpdateReferencias_economicas( $formato_estudio, $request->referencias_economicas );
            $this->insertOrUpdateGastos_mensuales( $formato_estudio, $request->gastos_mensuales );
            $this->insertOrUpdateReferencia_laboral( $formato_estudio, $request->referencia_laboral );
            $this->insertOrUpdateReferencias_personales( $formato_estudio, $request->referencias_personales );        
            
        }

        return back();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    private function insertOrUpdateResumen( $formato, $data )
    {
        if( !$formato->resumen )
        {
            $formato->resumen()->create($data);
        }else{
            ResumenEvenplan::where('id',$data['id'])->update($data);
        }      
    }

    private function insertOrUpdateResumenGrafica( $formato, $data )
    {
        
        if($data['grafica'])
        {
            $path_ese_grafica = 'ESE\\ese' . $formato->ese->id. '\\grafica';            
            $path_file        = $this->createPath($path_ese_grafica);
            $this->addGrafica($data['grafica'], $path_file, $formato);     
        }
    }

    private function insertOrUpdateDatos_personales( $formato, $data )
    {
        if( !$formato->datosPersonales )
        {
            $formato->datosPersonales()->create($data);
        }else{
            DatosPersonalesEvenplan::where( 'id', $data['id'] )->update($data);

        }        
    }

    private function insertOrUpdateEscolaridad( $formato, $data )
    {
        foreach ( $data as $escolaridad ) 
        {
            $escolaridad_result = $formato->escolaridad()->find( $escolaridad['id'] );          
            if( !$escolaridad_result )
            {
                $formato->escolaridad()->create( $escolaridad );
            }else{
                EscolaridadEvenplan::where( 'id', $escolaridad['id'] )->update($escolaridad);
            }
        }
        

        
    }

    private function insertOrUpdateEscolaridad_detalle( $formato, $data )
    {
        if( !$formato->escolaridadDetalle )
        {
            $formato->escolaridadDetalle()->create( $data );
        }else{
            EscolaridadDetalleEvenplan::where( 'id', $data['id'] )->update($data);

        }   
    }

    private function insertOrUpdateIdiomas( $formato, $data )
    {
        foreach ($data as $idioma ) 
        {        
            $idioma_result = $formato->idiomas()->find( $idioma['id'] );             
            if( !$idioma_result )
            {
                $formato->idiomas()->create( $idioma );
            }else{
                IdiomaEvenplan::where( 'id', $idioma['id'] )->update($idioma);

            }
        }
    }

    private function insertOrUpdateParentesco( $formato, $data )
    {
        foreach ($data as $parentesco ) 
        {
            $parentesco_result = $formato->parentesco()->find( $parentesco['id'] );
            if( !$parentesco_result )
            {
                $formato->parentesco()->create( $parentesco );
            }else{
                ParentescoEvenplan::where( 'id', $parentesco['id'] )->update($parentesco);
            }        
        }
    }

    private function insertOrUpdateDocumentacion( $formato, $data )
    {
        if( !$formato->documentacion )
        {
            $formato->documentacion()->create( $data );
        }else{
            DocumentacionEvenplan::where( 'id', $data['id'] )->update($data);
        }
    }

    private function insertOrUpdateReferencias_economicas( $formato, $data )
    {   
        if( !$formato->referenciasEconomicas )
        {
            $formato->referenciasEconomicas()->create( $data );
        }else{
            ReferenciaEconomicaEvenplan::where( 'id', $data['id'] )->update($data);
        }
    }

    private function insertOrUpdateGastos_mensuales( $formato, $data )
    {
        if( !$formato->gastosMensuales )
        {
            $formato->gastosMensuales()->create( $data );
        }else{
            GastoMensualEvenplan::where( 'id', $data['id'] )->update($data);
        }
    }

    private function insertOrUpdateReferencia_laboral( $formato, $data )
    {
        foreach ($data as $referenciaLaboral ) 
        {
            $referencia_laboral_result = $formato->referenciaLaboral()->find( $referenciaLaboral['id'] );
            if( !$referencia_laboral_result )
            {
                $formato->referenciaLaboral()->create( $referenciaLaboral );
            }else{
                ReferenciaLaboralEvenplan::where( 'id', $referenciaLaboral['id'] )->update($referenciaLaboral);
            }
        }
    }

    private function insertOrUpdateReferencias_personales( $formato, $data )
    {
        foreach ($data as $data_referencia ) 
        {            
            $referencia = $formato->referenciaPersonal()->find( $data_referencia['id'] );
            if( !$referencia )
            {
                $formato->referenciaPersonal()->create( $data_referencia );
            }else{
                ReferenciaPersonalEvenplan::where( 'id', $data_referencia['id'] )->update($data_referencia);
            }
        }
    }

    private function createPath($ruta)
    {        
        $path = $ruta; 
        if( !file_exists($path) )
        {
            File::makeDirectory(public_path().'/'.$path,0777,true);
        }

        return $path;
    }

    private function addGrafica($file, $path_file, $formato)
    {
        $strAddFile = '';
        $name_file  = $file->getClientOriginalName();
        $file->move($path_file,$name_file);         
        $formato->resumen->path_grafica = $path_file;
        $formato->resumen->grafica = $name_file;
        $formato->resumen->save();
        

    }

    public function deleteReferenciaPersonal( Request $request )
    {
        if( $request->id_remove_ref_personal != 0 )
        {
            ReferenciaPersonalEvenplan::destroy($request->id_remove_ref_personal);
        }

        return back();
         
    }

    public function deleteIdioma( Request $request )
    {
        if( $request->id_remove_idioma != 0 )
        {
            IdiomaEvenplan::destroy($request->id_remove_idioma);
        }

        return back();         
    }

    public function deleteParentesco( Request $request )
    {
        if( $request->id_remove_ref_parentesco != 0 )
        {
            ParentescoEvenplan::destroy($request->id_remove_ref_parentesco);
        }

        return back();         
    }

    public function deleteReferenciaLaboral( Request $request )
    {
        if( $request->id_remove_ref_laboral != 0 )
        {
            ReferenciaLaboralEvenplan::destroy($request->id_remove_ref_laboral);
        }

        return back();         
    }



}

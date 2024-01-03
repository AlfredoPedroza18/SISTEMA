<?php

namespace App\Http\Controllers\ESE\FormatosEstaticos;
use File;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\Plantillas\Formato;
use App\ESE\EstudioEse;
use App\ESE\Formatos\METLIFE\FormatoMetlife;

use App\ESE\Formatos\METLIFE\EncabezadoMetlife;
use App\ESE\Formatos\METLIFE\DatosGeneralesMetlife;
use App\ESE\Formatos\METLIFE\DocumentacionMetlife;
use App\ESE\Formatos\METLIFE\EscolaridadMetlife;
use App\ESE\Formatos\METLIFE\CursosMetlife;
use App\ESE\Formatos\METLIFE\IdiomasMetlife;
use App\ESE\Formatos\METLIFE\ConocimientosMetlife;
use App\ESE\Formatos\METLIFE\FamiliaMetlife;
use App\ESE\Formatos\METLIFE\SituacionEconomicaMetlife;
use App\ESE\Formatos\METLIFE\BienesMetlife;
use App\ESE\Formatos\METLIFE\ViviendaMetlife;
use App\ESE\Formatos\METLIFE\ApreciacionViviendaMetlife;
use App\ESE\Formatos\METLIFE\UbicacionMetlife;
use App\ESE\Formatos\METLIFE\SituacionSocialMetlife;
use App\ESE\Formatos\METLIFE\AvtividadFisicaMetlife;
use App\ESE\Formatos\METLIFE\DisponibilidadMetlife;
use App\ESE\Formatos\METLIFE\RastreoInfonavitMetlife;
use App\ESE\Formatos\METLIFE\ReferenciasPersonalesMetlife;
use App\ESE\Formatos\METLIFE\ReferenciasLaboralesMetlife;



class FormtatoMetlifeController extends Controller
{
     public function __construct(){


         $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        return 'Formato METLIFE';
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
    public function edit(Request $request,$id)
    {
        $formato       = Formato::find( $id );
        $estudio       = EstudioEse::find( $request->estudio );
        $os            = $estudio->ordenServicioEse->orden_servicio->id;
        $os_ese        = $estudio->ordenServicioEse->id;
        $id_ese        = $estudio->id;
        $backToEstudio = "estudio-ese/create?os=$os&os_ese=$os_ese&ese=$id_ese";
        
        if( $estudio && $formato )
        {
            return view('ESE.formatos-estaticos.metlife.formato-metlife', compact( 'estudio', 'backToEstudio' ) );
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
            [    'datos_familiares.file' => 'image',       

            ],[  'datos_familiares.file.image' => 'El diagrama DEBERÍA SER UN ARCHIVO DE TIPO IMAGEN, los datos del formulario no fueron gurdados, intenta de nuevo.',
            
            ]);

        $estudio=EstudioEse::with('formatoMetlife')->get()->find($id);
    if( $estudio )
        {    
            $formato_estudio     = null;
                        
            if( !$estudio->formatoMetlife )
            {              

                $formato_metlife             = new FormatoMetlife;
                $formato_metlife->fecha_alta = Carbon::now();
                $formato_estudio          = $estudio->formatoMetlife()->save( $formato_metlife );  
            }else{
                $formato_estudio = $estudio->formatoMetlife;
                
            }
            #dd($request->all());
            $this->insertUpdateEncabezados( $formato_estudio, $request->encabezado );
            $this->insertUpdateDatosGenerales( $formato_estudio, $request->datos_generales );
            $this->insertUpdateDocumentacion( $formato_estudio, $request->documentacion );
            $this->insertUpdateEscolaridad( $formato_estudio, $request->escolaridad );
            $this->insertOrUpdateCursos( $formato_estudio, $request->cursos );
            $this->insertOrUpdateIdiomas($formato_estudio, $request->idiomas_realizados);
            $this->insertOrUpdateConocimiento($formato_estudio, $request->conocimientomet);
            $this->insertOrUpdateFamilia($formato_estudio, $request->datos_familiares);
            $this->insertUpdateSituacionEconomica($formato_estudio, $request->seconomica);
            $this->insertUpdateBienes($formato_estudio, $request->bien);
            $this->insertUpdateVivienda($formato_estudio, $request->infvivienda);
            $this->insertUpdateApreciacionVivienda($formato_estudio, $request->apreciacion);
            $this->insertUpdateUbicacionVivienda($formato_estudio, $request->ubicacion);
            $this->insertUpdateSituacionSoc($formato_estudio,$request->situacion);
            $this->insertUpdateActividadFisi($formato_estudio,$request->emergencia);
            $this->insertUpdateDispo($formato_estudio,$request->dispo);
            $this->insertUpdateRastreoInfo($formato_estudio,$request->rastreo);
            $this->insertOrUpdateRefPersonales($formato_estudio,$request->referencias_personales);
            $this->insertOrUpdateRefLaborales($formato_estudio,$request->referencias_laborales);
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

    public function insertUpdateEncabezados($formato, $data ){

    if( !$formato->encabezado )
        {
            $formato->encabezado()->create($data);
            
        }else{

           EncabezadoMetlife::where('id',$data['id'])->update($data);
        }


    }
    public function insertUpdateDatosGenerales($formato, $data){

        if( !$formato->datosGenerales){
             $formato->datosGenerales()->create($data);
        }else{
              DatosGeneralesMetlife::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateDocumentacion($formato, $data){

        if( !$formato->documentacion){
             $formato->documentacion()->create($data);
        }else{
              DocumentacionMetlife::where('id',$data['id'])->update($data);
        }
    }
        public function insertUpdateEscolaridad($formato, $data){

        if( !$formato->escolaridadmet){
             $formato->escolaridadmet()->create($data);
        }else{
              EscolaridadMetlife::where('id',$data['id'])->update($data);
        }
    }
    private function insertOrUpdateCursos( $formato, $data )
      {
        foreach ($data as $data_cursos ) 
        {
            $cur = $formato->cursoMet()->find( $data_cursos['id'] );
            if( !$cur )
            {
                $formato->cursoMet()->create($data_cursos);
            }else{
                CursosMetlife::where('id',$data_cursos['id'])->update($data_cursos);
            }
        }
    }
    private function insertOrUpdateIdiomas( $formato, $data )
        {

        foreach ($data as $data_idiomas ) 
        {
            $idio = $formato->idiomas()->find( $data_idiomas['id'] );
            if( !$idio )
            {
                $formato->idiomas()->create($data_idiomas);
            }else{
                IdiomasMetlife::where('id',$data_idiomas['id'])->update($data_idiomas);
            }
        }
    }
    private function insertOrUpdateConocimiento( $formato, $data )
        {

        foreach ($data as $data_conocimiento ) 
        {
            $con = $formato->conocimientos_()->find( $data_conocimiento['id'] );
            if( !$con )
            {
                $formato->conocimientos_()->create($data_conocimiento);
            }else{
               ConocimientosMetlife::where('id',$data_conocimiento['id'])->update($data_conocimiento);
            }
        }
    }
    private function insertOrUpdateFamilia( $formato, $data )
    {
        $form_df = null;
        if( !$formato->familia )
        {
            $form_df = $formato->familia()->create($data);
        }else{
            $formato->familia()->where('id',$data['id'])->update([ 'observaciones' => $data['observaciones'] ]);
            $form_df = $formato->familia()->find($data['id']);

        } 
            

        if($data['file'])
        {
            $path_ese_grafica = 'ESE\\ese' . $formato->ese->id. '\\diagrama';            
            $path_file        = $this->createPath($path_ese_grafica);

            $this->addDiagramaFamiliar($data['file'], $path_file, $form_df); 
        }




        /*foreach ($data as $data_familia ) 
        {
            $fam = $formato->familia()->find( $data_familia['id'] );
            if( !$fam )
            {
                $formato->familia()->create($data_familia);
            }else{
               FamiliaMetlife::where('id',$data_familia['id'])->update($data_familia);
            }
        }*/
    }
   public function insertUpdateSituacionEconomica($formato, $data ){
        if( !$formato->situacionEconomica )
        {
            $formato->situacionEconomica()->create($data);
        }else{

          SituacionEconomicaMetlife::where('id',$data['id'])->update($data);
        }
    }
   public function insertUpdateBienes($formato, $data ){
    if( !$formato->bienes )
        {
            $formato->bienes()->create($data);
        }else{

          BienesMetlife::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateVivienda($formato, $data ){
    if( !$formato->vivienda )
        {
            $formato->vivienda()->create($data);
        }else{

          ViviendaMetlife::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateApreciacionVivienda($formato, $data ){
    if( !$formato->apreciacionVivienda )
        {
            $formato->apreciacionVivienda()->create($data);
        }else{

          ApreciacionViviendaMetlife::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateUbicacionVivienda($formato, $data ){
    if( !$formato->ubicacionDomicilio )
        {
            $formato->ubicacionDomicilio()->create($data);
        }else{

          UbicacionMetlife::where('id',$data['id'])->update($data);
        }
    }
     public function insertUpdateSituacionSoc($formato, $data ){
    if( !$formato->situacionSocial )
        {
            $formato->situacionSocial()->create($data);
        }else{

          SituacionSocialMetlife::where('id',$data['id'])->update($data);
        }
    }
      public function insertUpdateActividadFisi($formato, $data ){
    if( !$formato->casoEmergencia )
        {
            $formato->casoEmergencia()->create($data);
        }else{

          AvtividadFisicaMetlife::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateDispo($formato, $data ){
    if( !$formato->disponible )
        {
            $formato->disponible()->create($data);
        }else{

          DisponibilidadMetlife::where('id',$data['id'])->update($data);
        }
    }
      public function insertUpdateRastreoInfo($formato, $data ){
      
        $formato_df = null;
    if( !$formato->rastreoInfonavit )
        {
        $form_df=$formato->rastreoInfonavit()->create($data);
        }else{

        #$form_df=RastreoInfonavitMetlife::where('id',$data['id'])->update($data);

            $formato->rastreoInfonavit()->where('id',$data['id'])->update([ 'rastreo_infonavit' => $data['rastreo_infonavit'] ]);
            $form_df = $formato->rastreoInfonavit()->find($data['id']);
        }
         if($data['file'])
        {
            $path_ese_infonavit = 'ESE\\ese' . $formato->ese->id. '\\infonavit';            
            $path_file        = $this->createPath($path_ese_infonavit);

            $this->addDiagramaRastreo($data['file'], $path_file, $form_df); 
        }
    }

  private function insertOrUpdateRefPersonales( $formato, $data )
        {
            #d($data);

        foreach ($data as $data_referencias ) 
        {
            $pers = $formato->referenciaPersonal()->find( $data_referencias['id'] );
            if( !$pers )
            {
                $formato->referenciaPersonal()->create($data_referencias);
            }else{
                ReferenciasPersonalesMetlife::where('id',$data_referencias['id'])->update($data_referencias);
            }
        }
    }

  private function insertOrUpdateRefLaborales( $formato, $data )
        {
            #d($data);

        foreach ($data as $data_referencias_lab ) 
        {
            $pers_lab = $formato->referenciaLaborales()->find( $data_referencias_lab['id'] );
            if( !$pers_lab )
            {
                $formato->referenciaLaborales()->create($data_referencias_lab);
            }else{
                ReferenciasLaboralesMetlife::where('id',$data_referencias_lab['id'])->update($data_referencias_lab);
            }
        }
    }






    public function deleteCurso( Request $request )
    {
        if( $request->id_remove_curso != 0 )
        {
            CursosMetlife::destroy($request->id_remove_curso);
        }

        return back();
        
    }
    public function deleteIdioma( Request $request )
    {
        if( $request->id_remove_idioma != 0 )
        {
            IdiomasMetlife::destroy($request->id_remove_idioma);
        }
        return back();  
    }
    public function deleteConocimiento( Request $request )
    {
        if( $request->id_remove_conocimiento != 0 )
        {
            ConocimientosMetlife::destroy($request->id_remove_conocimiento);
        }
        return back();  
    }
     public function deleteFamilia( Request $request )
    {
        if( $request->id_remove_familia != 0 )
        {
            FamiliaMetlife::destroy($request->id_remove_familia);
        }
        return back();  
    }
      public function deletePersonal( Request $request )
    {
        if( $request->id_remove_personal != 0 )
        {
            ReferenciasPersonalesMetlife::destroy($request->id_remove_personal);
        }
        return back();  
    }
       public function deleteLaboral( Request $request )
    {
        if( $request->id_remove_laboral != 0 )
        {
            ReferenciasLaboralesMetlife::destroy($request->id_remove_laboral);
        }
        return back();  
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

    private function addDiagramaFamiliar($file, $path_file, $formato_df)
    {
        $strAddFile = '';
        $name_file  = $file->getClientOriginalName();
        $file->move($path_file,$name_file);         
        $formato_df->path = $path_file;
        $formato_df->file = $name_file;
        $formato_df->save();
        

    }
        private function addDiagramaRastreo($file, $path_file, $formato_df)
    {
  
        $strAddFile = '';
        $name_file  = $file->getClientOriginalName();
        $file->move($path_file,$name_file);         
        $formato_df->path = $path_file;
        $formato_df->file = $name_file;
        $formato_df->save();
        

    }
}

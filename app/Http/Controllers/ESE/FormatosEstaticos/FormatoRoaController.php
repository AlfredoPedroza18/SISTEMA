<?php

namespace App\Http\Controllers\ESE\FormatosEstaticos;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\Plantillas\Formato;
use App\ESE\EstudioEse;
use App\ESE\Formatos\ROA\FormatoRoa;

use App\ESE\Formatos\ROA\EncabezadoRoa;
use App\ESE\Formatos\ROA\DatosGeneralesRoa;
use App\ESE\Formatos\ROA\DocumenRoa;
use App\ESE\Formatos\ROA\EscolaridadRoa;
use App\ESE\Formatos\ROA\AbandonoEscolarRoa;
use App\ESE\Formatos\ROA\EscolaridadObservacionesRoa;
use App\ESE\Formatos\ROA\CursosRoa;
use App\ESE\Formatos\ROA\IdiomasRoa;
use App\ESE\Formatos\ROA\ConocimientosRoa;
use App\ESE\Formatos\ROA\FamiliaRoa;
use App\ESE\Formatos\ROA\InfoFamiliarRoa;
use App\ESE\Formatos\ROA\SituacionEconomicaRoa;
use App\ESE\Formatos\ROA\BienesRoa;
use App\ESE\Formatos\ROA\ViviendaRoa;
use App\ESE\Formatos\ROA\ApreciacionViviendaRoa;
use App\ESE\Formatos\ROA\UbicacionRoa;
use App\ESE\Formatos\ROA\SituacionSocialRoa;
use App\ESE\Formatos\ROA\EnfermedadesRoa;
use App\ESE\Formatos\ROA\PadecimientosRoa;
use App\ESE\Formatos\ROA\TratamientoSaludRoa;
use App\ESE\Formatos\ROA\AtencionMedicaRoa;
use App\ESE\Formatos\ROA\HabitosRoa;
use App\ESE\Formatos\ROA\DisponibilidadRoa;
use App\ESE\Formatos\ROA\ReferenciasPersonalesRoa;
use App\ESE\Formatos\ROA\ReferenciasLaboralesRoa;


class FormatoRoaController extends Controller
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
        return 'Formato ROA';
    }

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
            return view('ESE.formatos-estaticos.roa.formato-roa', compact( 'estudio','backToEstudio' ) );
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

        $estudio=EstudioEse::with('formatoRoa')->get()->find($id);
    if( $estudio )
        {    
            $formato_estudio     = null;
                        
            if( !$estudio->formatoRoa )
            {              

                $formato_roa             = new FormatoRoa;
                $formato_roa->fecha_alta = Carbon::now();
                $formato_estudio          = $estudio->formatoRoa()->save( $formato_roa );  
            }else{
                $formato_estudio = $estudio->formatoRoa;
                
            }
         #   dd($request->all());
            $this->insertUpdateEncabezados( $formato_estudio, $request->encabezado );
            $this->insertUpdateDatosGenerales( $formato_estudio, $request->datos_generales );
            $this->insertUpdateDocumentacionRoa( $formato_estudio, $request->RoaDocumentacion );
            $this->insertOrUpdateEscolaridadRoa( $formato_estudio, $request->escolaridad );
          	$this->insertUpdateAbandonoEscRoa( $formato_estudio, $request->abandono );
          	$this->insertUpdateObsEscRoa( $formato_estudio, $request->obsesc );
            $this->insertOrUpdateCursos( $formato_estudio, $request->cursos );
            $this->insertOrUpdateIdiomas($formato_estudio, $request->idiomas_realizados);
            $this->insertOrUpdateConocimiento($formato_estudio, $request->conocimientomet);
            $this->insertOrUpdateFamilia($formato_estudio, $request->family);
            $this->insertUpdateInfoFamiliar($formato_estudio, $request->ifamiliar);
            $this->insertUpdateSituacionEconomica($formato_estudio, $request->seconomica);
            $this->insertUpdateBienes($formato_estudio, $request->bien);
            $this->insertUpdateVivienda($formato_estudio, $request->infvivienda);
            $this->insertUpdateApreciacionVivienda($formato_estudio, $request->apreciacion);
            $this->insertUpdateUbicacionVivienda($formato_estudio, $request->ubicacion);
            $this->insertUpdateSituacionSoc($formato_estudio,$request->situacion);
            $this->insertUpdateEnfer($formato_estudio,$request->enfer);
            $this->insertUpdatePadecimientos($formato_estudio,$request->pade);
            $this->insertUpdateTratamiento($formato_estudio,$request->trata);
            $this->insertUpdateAtencion($formato_estudio,$request->atencionmedica);
            $this->insertUpdateHabitos($formato_estudio,$request->habito);
            $this->insertUpdateDispo($formato_estudio,$request->dispo);
            $this->insertOrUpdateRefPersonales($formato_estudio,$request->referencias_personales);
            $this->insertOrUpdateRefLaborales($formato_estudio,$request->referencias_laborales);

            }

        return back();


        }

  public function insertUpdateEncabezados($formato, $data ){
	if( !$formato->encabezado )
        {
            $formato->encabezado()->create($data);
            
        }else{

           EncabezadoRoa::where('id',$data['id'])->update($data);
        }
    }
   public function insertUpdateDatosGenerales($formato, $data){
        if( !$formato->datosGenerales ){
             $formato->datosGenerales()->create($data);
        }else{
              DatosGeneralesRoa::where('id',$data['id'])->update($data);
        }
    }
      public function insertUpdateDocumentacionRoa($formato, $data){
    
        if( !$formato->documentacionRoa ){
             $formato->documentacionRoa()->create($data);
        }else{
             DocumenRoa::where('id',$data['id'])->update($data);
        }
    }
     private function insertOrUpdateEscolaridadRoa( $formato, $data )
      {
        foreach ($data as $data_escolaridad ) 
        {
            $esco = $formato->escolariRoa()->find( $data_escolaridad['id'] );
            if( !$esco )
            {
                $formato->escolariRoa()->create($data_escolaridad);
            }else{
                EscolaridadRoa::where('id',$data_escolaridad['id'])->update($data_escolaridad);
            }
        }
    }
     public function insertUpdateAbandonoEscRoa($formato, $data){
    
        if( !$formato->abandonoEscolar ){
             $formato->abandonoEscolar()->create($data);
        }else{
             AbandonoEscolarRoa::where('id',$data['id'])->update($data);
        }
    }
      public function insertUpdateObsEscRoa($formato, $data){
    
        if( !$formato->ObsEscolar ){
             $formato->ObsEscolar()->create($data);
        }else{
             EscolaridadObservacionesRoa::where('id',$data['id'])->update($data);
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
                CursosRoa::where('id',$data_cursos['id'])->update($data_cursos);
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
                IdiomasRoa::where('id',$data_idiomas['id'])->update($data_idiomas);
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
               ConocimientosRoa::where('id',$data_conocimiento['id'])->update($data_conocimiento);
            }
        }
    }
      private function insertOrUpdateFamilia( $formato, $data )
        {
         
        foreach ($data as $data_familia ) 
        {
            $fam = $formato->familia()->find( $data_familia['id'] );
            if( !$fam )
            {
                $formato->familia()->create($data_familia);
            }else{
               FamiliaRoa::where('id',$data_familia['id'])->update($data_familia);
            }
        }
    }
      public function insertUpdateInfoFamiliar($formato, $data ){
        if( !$formato->infoFamiliar )
        {
            $formato->infoFamiliar()->create($data);
            
        }else{

           InfoFamiliarRoa::where('id',$data['id'])->update($data);
        }
    }
     public function insertUpdateSituacionEconomica($formato, $data ){
        if( !$formato->situacionEconomica )
        {
            $formato->situacionEconomica()->create($data);
        }else{

          SituacionEconomicaRoa::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateBienes($formato, $data ){
    if( !$formato->bienes )
        {
            $formato->bienes()->create($data);
        }else{

          BienesRoa::where('id',$data['id'])->update($data);
        }
    }
     public function insertUpdateVivienda($formato, $data ){
    if( !$formato->vivienda )
        {
            $formato->vivienda()->create($data);
        }else{

          ViviendaRoa::where('id',$data['id'])->update($data);
        }
    }
      public function insertUpdateApreciacionVivienda($formato, $data ){
    if( !$formato->apreciacionVivienda )
        {
            $formato->apreciacionVivienda()->create($data);
        }else{

          ApreciacionViviendaRoa::where('id',$data['id'])->update($data);
        }
    }
        public function insertUpdateUbicacionVivienda($formato, $data ){
    if( !$formato->ubicacionDomicilio )
        {
            $formato->ubicacionDomicilio()->create($data);
        }else{

          UbicacionRoa::where('id',$data['id'])->update($data);
        }
    }
      public function insertUpdateSituacionSoc($formato, $data ){
    if( !$formato->situacionSocial )
        {
            $formato->situacionSocial()->create($data);
        }else{

          SituacionSocialRoa::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateEnfer($formato, $data ){
    if( !$formato->enfermedad )
        {
            $formato->enfermedad()->create($data);
        }else{

          EnfermedadesRoa::where('id',$data['id'])->update($data);
        }
    }
     public function insertUpdatePadecimientos($formato, $data ){
    if( !$formato->padecimientos )
        {
            $formato->padecimientos()->create($data);
        }else{

          PadecimientosRoa::where('id',$data['id'])->update($data);
        }
    }
       private function insertUpdateTratamiento( $formato, $data )
        {

        foreach ($data as $data_tratamiento ) 
        {
            $tr = $formato->edoSalud()->find( $data_tratamiento['id'] );
            if( !$tr )
            {
                $formato->edoSalud()->create($data_tratamiento);
            }else{
                TratamientoSaludRoa::where('id',$data_tratamiento['id'])->update($data_tratamiento);
            }
        }
    }
        public function insertUpdateAtencion($formato, $data){
    
        if( !$formato->atencion ){
             $formato->atencion()->create($data);
        }else{
             AtencionMedicaRoa::where('id',$data['id'])->update($data);
        }
    }
         public function insertUpdateHabitos($formato, $data){
    
        if( !$formato->habitoCostumbre ){
             $formato->habitoCostumbre()->create($data);
        }else{
             HabitosRoa::where('id',$data['id'])->update($data);
        }
    }
     public function insertUpdateDispo($formato, $data ){
    if( !$formato->disponible )
        {
            $formato->disponible()->create($data);
        }else{

          DisponibilidadRoa::where('id',$data['id'])->update($data);
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
                ReferenciasPersonalesRoa::where('id',$data_referencias['id'])->update($data_referencias);
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
                ReferenciasLaboralesRoa::where('id',$data_referencias_lab['id'])->update($data_referencias_lab);
            }
        }
    }








      public function deleteEscolaridad( Request $request )
    {
        if( $request->id_remove_escolaridad != 0 )
        {
            EscolaridadRoa::destroy($request->id_remove_escolaridad);
        }

        return back();
        
    }
       public function deleteCurso( Request $request )
    {
        if( $request->id_remove_curso != 0 )
        {
            CursosRoa::destroy($request->id_remove_curso);
        }

        return back();
        
    }
       public function deleteIdioma( Request $request )
    {
        if( $request->id_remove_idioma != 0 )
        {
            IdiomasRoa::destroy($request->id_remove_idioma);
        }
        return back();  
    }
       public function deleteConocimiento( Request $request )
    {
        if( $request->id_remove_conocimiento != 0 )
        {
            ConocimientosRoa::destroy($request->id_remove_conocimiento);
        }
        return back();  
    }
     public function deleteFamilia( Request $request )
    {
        if( $request->id_remove_familia != 0 )
        {
            FamiliaRoa::destroy($request->id_remove_familia);
        }
        return back();  
    }
     public function deleteTratamiento( Request $request )
    {
        if( $request->id_remove_tratamiento != 0 )
        {
            TratamientoSaludRoa::destroy($request->id_remove_tratamiento);
        }
        return back();  
    }
        public function deletePersonal( Request $request )
    {
        if( $request->id_remove_personal != 0 )
        {
            ReferenciasPersonalesRoa::destroy($request->id_remove_personal);
        }
        return back();  
    }
      public function deleteLaboral( Request $request )
    {
        if( $request->id_remove_laboral != 0 )
        {
            ReferenciasLaboralesRoa::destroy($request->id_remove_laboral);
        }
        return back();  
    }
      

}

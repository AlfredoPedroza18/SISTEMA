<?php

namespace App\Http\Controllers\ESE\FormatosEstaticos;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\Plantillas\Formato;
use App\ESE\EstudioEse;
use App\ESE\Formatos\GNP\FormatoGnp;

use App\ESE\Formatos\GNP\EncabezadoGnp;
use App\ESE\Formatos\GNP\DatosGeneralesGnp;
use App\ESE\Formatos\GNP\EscolaridadGnp;
use App\ESE\Formatos\GNP\CursosGnp;
use App\ESE\Formatos\GNP\IdiomasGnp;
use App\ESE\Formatos\GNP\ConocimientosGnp;
use App\ESE\Formatos\GNP\FamiliaGnp;
use App\ESE\Formatos\GNP\InfoFamiliarGnp;
use App\ESE\Formatos\GNP\SituacionEconomicaGnp;
use App\ESE\Formatos\GNP\BienesGnp;
use App\ESE\Formatos\GNP\ViviendaGnp;
use App\ESE\Formatos\GNP\ApreciacionViviendaGnp;
use App\ESE\Formatos\GNP\UbicacionGnp;
use App\ESE\Formatos\GNP\SituacionSocialGnp;
use App\ESE\Formatos\GNP\EnfermedadesGnp;
use App\ESE\Formatos\GNP\PadecimientosGnp;
use App\ESE\Formatos\GNP\TratamientoSaludGnp;
use App\ESE\Formatos\GNP\AtencionMedicaGnp;
use App\ESE\Formatos\GNP\HabitosGnp;
use App\ESE\Formatos\GNP\DisponibilidadGnp;
use App\ESE\Formatos\GNP\ReferenciasLaboralesGnp;

class FormatoGnpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Formato GNP';
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
            return view('ESE.formatos-estaticos.gnp.formato-gnp', compact( 'estudio','backToEstudio' ) );
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
        
        $estudio=EstudioEse::with('formatoGnp')->get()->find($id);
    if( $estudio )
        {    
            $formato_estudio     = null;
                        
            if( !$estudio->formatoGnp )
            {              

                $formato_gnp             = new FormatoGnp;
                $formato_gnp->fecha_alta = Carbon::now();
                $formato_estudio          = $estudio->formatoGnp()->save( $formato_gnp );  
            }else{
                $formato_estudio = $estudio->formatoGnp;
                
            }
         #   dd($request->all());
            $this->insertUpdateEncabezados( $formato_estudio, $request->encabezado );
            $this->insertUpdateDatosGenerales( $formato_estudio, $request->datos_generales );
            $this->insertUpdateEscolaridad( $formato_estudio, $request->escolaridad );
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

           EncabezadoGnp::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateDatosGenerales($formato, $data){
        if( !$formato->datosGenerales ){
             $formato->datosGenerales()->create($data);
        }else{
              DatosGeneralesGnp::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateEscolaridad($formato, $data){

        if( !$formato->escolaridadmet){
             $formato->escolaridadmet()->create($data);
        }else{
              EscolaridadGnp::where('id',$data['id'])->update($data);
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
                CursosGnp::where('id',$data_cursos['id'])->update($data_cursos);
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
                IdiomasGnp::where('id',$data_idiomas['id'])->update($data_idiomas);
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
               ConocimientosGnp::where('id',$data_conocimiento['id'])->update($data_conocimiento);
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
               FamiliaGnp::where('id',$data_familia['id'])->update($data_familia);
            }
        }
    }
    public function insertUpdateInfoFamiliar($formato, $data ){
        if( !$formato->infoFamiliar )
        {
            $formato->infoFamiliar()->create($data);
            
        }else{

           InfoFamiliarGnp::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateSituacionEconomica($formato, $data ){
        if( !$formato->situacionEconomica )
        {
            $formato->situacionEconomica()->create($data);
        }else{

          SituacionEconomicaGnp::where('id',$data['id'])->update($data);
        }
    }
     public function insertUpdateBienes($formato, $data ){
    if( !$formato->bienes )
        {
            $formato->bienes()->create($data);
        }else{

          BienesGnp::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateVivienda($formato, $data ){
    if( !$formato->vivienda )
        {
            $formato->vivienda()->create($data);
        }else{

          ViviendaGnp::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateApreciacionVivienda($formato, $data ){
    if( !$formato->apreciacionVivienda )
        {
            $formato->apreciacionVivienda()->create($data);
        }else{

          ApreciacionViviendaGnp::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateUbicacionVivienda($formato, $data ){
    if( !$formato->ubicacionDomicilio )
        {
            $formato->ubicacionDomicilio()->create($data);
        }else{

          UbicacionGnp::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateSituacionSoc($formato, $data ){
    if( !$formato->situacionSocial )
        {
            $formato->situacionSocial()->create($data);
        }else{

          SituacionSocialGnp::where('id',$data['id'])->update($data);
        }
    }

    public function insertUpdateEnfer($formato, $data ){
    if( !$formato->enfermedad )
        {
            $formato->enfermedad()->create($data);
        }else{

          EnfermedadesGnp::where('id',$data['id'])->update($data);
        }
    }
     public function insertUpdatePadecimientos($formato, $data ){
    if( !$formato->padecimientos )
        {
            $formato->padecimientos()->create($data);
        }else{

          PadecimientosGnp::where('id',$data['id'])->update($data);
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
                TratamientoSaludGnp::where('id',$data_tratamiento['id'])->update($data_tratamiento);
            }
        }
    }
    public function insertUpdateAtencion($formato, $data){
    
        if( !$formato->atencion ){
             $formato->atencion()->create($data);
        }else{
             AtencionMedicaGnp::where('id',$data['id'])->update($data);
        }
    }
    public function insertUpdateHabitos($formato, $data){
    
        if( !$formato->habitoCostumbre ){
             $formato->habitoCostumbre()->create($data);
        }else{
             HabitosGnp::where('id',$data['id'])->update($data);
        }
    }
     public function insertUpdateDispo($formato, $data ){
    if( !$formato->disponible )
        {
            $formato->disponible()->create($data);
        }else{

          DisponibilidadGnp::where('id',$data['id'])->update($data);
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
                ReferenciasLaboralesGnp::where('id',$data_referencias_lab['id'])->update($data_referencias_lab);
            }
        }
    }




    public function deleteCurso( Request $request )
    {
        if( $request->id_remove_curso != 0 )
        {
            CursosGnp::destroy($request->id_remove_curso);
        }

        return back();   
    }
    public function deleteIdioma( Request $request )
    {
        if( $request->id_remove_idioma != 0 )
        {
            IdiomasGnp::destroy($request->id_remove_idioma);
        }
        return back();  
    }
    public function deleteConocimiento( Request $request )
    {
        if( $request->id_remove_conocimiento != 0 )
        {
            ConocimientosGnp::destroy($request->id_remove_conocimiento);
        }
        return back();  
    }
    public function deleteFamilia( Request $request )
    {
        if( $request->id_remove_familia != 0 )
        {
            FamiliaGnp::destroy($request->id_remove_familia);
        }
        return back();  
    }
        public function deleteTratamiento( Request $request )
    {
        if( $request->id_remove_tratamiento != 0 )
        {
            TratamientoSaludGnp::destroy($request->id_remove_tratamiento);
        }
        return back();  
    }
     public function deleteLaboral( Request $request )
    {
        if( $request->id_remove_laboral != 0 )
        {
            ReferenciasLaboralesGnp::destroy($request->id_remove_laboral);
        }
        return back();  
    }
}

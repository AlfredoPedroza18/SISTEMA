<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\ESE\Plantillas\PlantillaBase;
use App\ESE\Plantillas\Formato;
use App\ESE\Plantillas\Campo;



class PlantillasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $plantillas      = Formato::with('plantilla')->get();
        $plantillas_base = PlantillaBase::orderBy('nombre', 'asc')->get();

        return view('ESE.plantillas.index',['plantillas' => $plantillas, 'templates' => $plantillas_base]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

/*
        $plantilla = PlantillaBase::find(7);  

        $plantilla = PlantillaBase::find(6);  
*/
        $id        = $request->input('template'); 
        $plantilla = PlantillaBase::find($id);


        if( !$plantilla )
        {
            return back();
        }

        return view('ESE.plantillas.create-plantilla',['plantilla' => $plantilla]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $data = $request->all();

        $plantilla = Formato::create($data);

        if($plantilla)
        {
            foreach ($data as $key => $value) {
                if( !$this->validarCamposRequest($key) )
                {                    
                    $plantilla->campos()->attach($value);           
                }
            }
        }
        
        return redirect()->route('sig-erp-ese::estudio-ese-plantillas.index');


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
        $data    = $request->all();
        $formato = Formato::find( $data['formato'] );


        if( $request->has('formato') && $formato )
        {
            $plantilla    = PlantillaBase::find($id);
            $lista_campos = $this->getCamposFormato( $formato->campos );            
            
            return view('ESE.plantillas.edit-plantilla',['plantilla' => $plantilla,'formato' => $formato,'campos_asignados' => $lista_campos]);    
        }

        return redirect()->route('sig-erp-ese::estudio-ese-plantillas.index');;

        

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
        $formato = Formato::find($id);
        $value   = 0;

        if($formato)
        {
            
            $data            = $request->all();
            $campos_new      = $this->getNewCamposFormato( $data );
            $campos_old      = $this->getCamposFormato( $formato->campos );   
            $campos_eliminar = $this->deleteCampos( $campos_old, $campos_new );
            $campos_nuevos   = $this->newCampos( $campos_old, $campos_new );
            
            //$campos_rows = ['esc_escolaridad_main-rows' => 7, 'esc_idiomas-rows' => 4 ];
            //$campos_rows = ['esc_escolaridad_main-rows' => 6, 'esc_idiomas-rows' => 2 ];

            $campos_rows = [];

            $fileds_multiple = $this->configureKeys( $campos_rows );
            $this->updateRowCampo( $fileds_multiple );

            
            if( count( $campos_eliminar ) > 0 )  $formato->campos()->detach($campos_eliminar);
            if( count( $campos_nuevos ) > 0 )  $formato->campos()->attach($campos_nuevos);


            $formato->update($data);
            $value = 1;
        }

        return back()->with('status-ese-edit',$value);       
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

    private function validarCamposRequest( $key )
    {
        $campos = ["id_plantilla","nombre","descripcion",'_token','_method'];

        if( in_array($key, $campos) )
        {
            return true;
        }

        return false;
    }

    private function getCamposFormato(Collection $fields)
    {   
        $list = [];
        foreach ($fields as $field) {            
            array_push($list,$field->id);
        }
        return $list;

    }

    private function getNewCamposFormato( $datos )
    {
        $lista = [];

        foreach ($datos as $key => $value) 
        {
            if( !$this->validarCamposRequest( $key ) )
            {                
                array_push($lista, $value);
            }
        }
        return $lista;
    }

    private function deleteCampos( $old_campos, $new_campos )
    {
        $campos_delete = [];
        foreach( $old_campos as $key => $valor)
        {
            if( !in_array($valor, $new_campos))
            {
                array_push($campos_delete,$valor);
            }
        }

        return $campos_delete;
    }

    private function newCampos( $old_campos, $new_campos )
    {
        $campos_new = [];
        foreach ($new_campos as $key => $valor) {
            if(!in_array($valor, $old_campos))
            {
                array_push($campos_new,$valor);
            }
        }

        return $campos_new;
    }

    protected function updateRowCampo(array $campos )
    {
        foreach ($campos as $campo => $rows) {
            $campo_obj = Campo::where('key',$campo)->first();

            if( $campo_obj->rows != $rows )
            {   
                $campo_obj->rows = $rows;
                $campo->save();
            }
        }
    }

    protected function configureKeys( array $keys)
    {
        $list_keys = [];
        foreach ($keys as $key => $value ) {
            if( strpos($key, '-rows') )
            {
                $new_key = substr($key, 0, strpos($key, '-rows') );   
                $list_keys[$new_key] = $value;
            }
 
        }
        return $list_keys;
    }
}









/*



(`id_componente`, `label`, `key`,`multiple`,`rows`)
(62,  'nombre'  ,'estudio_ref_nombre_hsbc',0,0),
(62,  'fecha'   ,'estudio_ref_fecha_hsbc',0,0),
(62,  'resultado'   ,'estudio_ref_resultado_hsbc',0,0),
(62,  'observaciones'   ,'estudio_ref_obs_hsbc',0,0),
(63,  'Teléfono Celular', 'dat_personales_celular_hsbc',0,0),
(63,  'Edad', 'dat_personales_edad_hsbc',0,0),
(63,  'Sexo', 'dat_personales_sexo_hsbc',0,0),
(63,  'Estado civil', 'dat_personales_edo_civil_hsbc',0,0),
(63,  'Teléfono de Casa', 'dat_personales_telefono_hsbc',0,0),
(63,  'Fecha y lugar de nacimiento', 'dat_personales_lugar_nac_hsbc',0,0),
(63,  'Domicilio actual', 'dat_personales_domicilio_hsbc',0,0),
(63,  'C.P.', 'dat_personales_cp_hsbc',0,0),
(63,  'Entre las calles', 'dat_personales_calles_hsbc',0,0),
(63,  'Tiempo de radicar en el domicilio', 'dat_personales_radica_hsbc',0,0),
(63,  'Domicilio anterior', 'dat_personales_dom_anterior_hsbc',0,0),
(63,  'Tiempo que habitó el domicilio anterior', 'dat_personales_habito_dom_hsbc',0,0),

(64,  'credencial de elector no. de documento','documentacion_cred_elect_doc_hsbc',0,0),
(64,  'credencial de elector obsesrvaciones','documentacion_cred_elect_obs_hsbc',0,0),
(64,  'pasaporte no. de documento','documentacion_pasaporte_doc_hsbc',0,0),
(64,  'pasaporte obsesrvaciones','documentacion_pasaporte_obs_hsbc',0,0),
(64,  'cédula profesional no. de documento','documentacion_cedula_doc_hsbc',0,0),
(64,  'cédula profesional obsesrvaciones','documentacion_cedula_obs_hsbc',0,0),
(64,  'no. de afiliación del imss o issste no. de documento','documentacion_imss_doc_hsbc',0,0),
(64,  'no. de afiliación del imss o issste obsesrvaciones','documentacion_imss_obs_hsbc',0,0),
(64,  'r.f.c. no. de documento','documentacion_rfc_doc_hsbc',0,0),
(64,  'r.f.c. obsesrvaciones','documentacion_rfc_obs_hsbc',0,0),
(64,  'curp no. de documento','documentacion_curp_doc_hsbc',0,0),
(64,  'curp obsesrvaciones','documentacion_curp_obs_hsbc',0,0),
(64,  'El candidato ha permanecido por mas de 6 meses en otro pais si','documentacion_curp_obs_hsbc',0,0),
(64,  'El candidato ha permanecido por mas de 6 meses en otro pais no','documentacion_curp_obs_hsbc',0,0),
(64,  'El candidato ha permanecido por mas de 6 meses en otro pais no aplica','documentacion_curp_obs_hsbc',0,0),




(65,  '¿Alguna vez fue detenido o ha tenido alguna demanda laboral, civil, mercantil, penal o falta administrativa? si','ant_leg_demanda_si_hsbc',0,0),
(65,  '¿Alguna vez fue detenido o ha tenido alguna demanda laboral, civil, mercantil, penal o falta administrativa? no','ant_leg_demanda_no_hsbc',0,0),
(65,  'descripción','ant_leg_descripcion_hsbc',0,0)
(67,  'periodo','gaps_periodo_hsbc',0,0),
50  persona que corroboró datos escolaridad_corroboro_jll   0   0
50  verificación con la institución escolaridad_verificacion_inst_jll   0   0
50  escolaridad escolaridad_main_jll    1   1
50  observaciones   escolaridad_obs_jll 0   0
51  personas que viven en el domicilio  viven_dom_main_jll  1   4
51  observaciones   viven_obs_jll   0   0
52  ubicación   desc_vivienda_ubicacion_jll 0   0
52  exterior    desc_vivienda_exterior_jll  0   0
53  tipo de vivienda    tipo_vivienda_main_jll  1   1
53  observaciones   tipo_vivienda_obs_jll   0   0


(60,'referencias personales','ref_laborales_main_evenplan',1,3),
(60,'referencias personales','ref_laborales_main_evenplan',1,3),
(60,'referencias personales','ref_laborales_main_evenplan',1,3),






























*/


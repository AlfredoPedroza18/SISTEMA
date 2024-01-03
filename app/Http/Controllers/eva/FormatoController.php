<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ESE\Plantillas\Formato;
use App\ESE\Plantillas\Field;
use App\ESE\Plantillas\Campo;
use App\ESE\EstudioEse;
use Illuminate\Database\Eloquent\Collection;

class FormatoController extends Controller
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
        #dd($estudio->fields);


        $estudio = EstudioEse::with('plantilla.campos','fields')->find( $request->estudio );

        if( $estudio )
        {   
            
            $formato           = $estudio->plantilla;
            $campos_plantilla  = $formato->campos;
            $campos_estudio    = $estudio->fields;


            $array_plantilla   = $this->getFieldsFormato( $campos_plantilla ); 
            $array_labels      = $this->getLabels( $campos_plantilla )['campos_label'];   
            $array_componentes = $this->getLabels( $campos_plantilla )['campos_componente'];               
            $array_estudio     = $this->getFieldsEstudio( $campos_estudio ); 
            $news_fields       = $this->getFieldsInsertar( $array_plantilla,$array_estudio ); 
            $delete_fields     = $this->getFieldsDelete( $array_plantilla,$array_estudio );
            

            if( count( $news_fields ) > 0 )
            {                

                /*******************************************************************************/ 
                
                
                foreach ($news_fields as $key ) {
                    $base_field = Campo::where('key',$key)->first();

                    if( $base_field->multiple )
                    {
                        $list_childs_fields   = [];
                        $fields_childs        = $base_field->campos;
                        $field                = new Field();
                        $field->key           = $key;
                        $field->id_formato    = $formato->id;                     
                        $field->label         = $array_labels[$key];
                        $field->id_componente = $array_componentes[$key]; 
                        $field->multiple      = $base_field->multiple;
                        $field->rows          = $base_field->rows;
                        $field->id_ese_asignado = $estudio->id;
                        $main_field           = $estudio->fields()->save( $field );
                        $main_field->head_num_col = $base_field->campos->count();
                        $main_field->save();


                        for ($i=0; $i < $main_field->rows; $i++) {
                            foreach ( $fields_childs as $field_child ) {
                                $new_field_child = new Field(['label'             => $field_child->label,
                                                              'key'               => $field_child->key .'_'.$i.'_row',
                                                              'main'              => 0,
                                                              'id_ese_asignado'   => $estudio->id
                                                             ]);

                                array_push( $list_childs_fields, $new_field_child );
                            }                        
                        }
                        $main_field->campos()->saveMany($list_childs_fields);
                    }else{
                        $field             = new Field();
                        $field->key        = $key;
                        $field->id_formato = $formato->id;                     
                        $field->label      = $array_labels[$key];
                        $field->id_componente = $array_componentes[$key]; 
                        $field->id_ese_asignado = $estudio->id;
                        $estudio->fields()->save( $field );                    
                    }                                        
                }                
                
                /*******************************************************************************

                foreach ($news_fields as $key ) {
                    $field             = new Field();
                    $field->key        = $key;
                    $field->id_formato = $formato->id;                     
                    $field->label      = $array_labels[$key];
                    $field->id_componente = $array_componentes[$key]; 
                    $estudio->fields()->save( $field );                    
                } 
                *******************************************************************************/                
            }

            
            
            foreach ($array_estudio as $field ) {
                    $base_campo = Campo::where('key',$field)->first();
                    $base_field = Field::where('key',$field)->first();

                    if( $base_field->multiple )
                    {       
                        if( $base_field->rows != $base_campo->rows )
                        {
                            $campo_maestro  = (integer) $base_campo->rows;
                            $campo_template = (integer) $base_field->rows;
                            
                            if( $campo_maestro > $campo_template )
                            {
                                $num_rows_dif = $base_campo->rows - $base_field->rows ;
                                $this->addRowsField($num_rows_dif,$base_field,$base_campo);
                                $base_field->rows = $base_campo->rows;
                                $base_field->save();

                            }else{
                                $num_rows_dif = $base_field->rows - $base_campo->rows ;
                                $this->removeRowsField( $num_rows_dif,$base_field,$base_campo);
                                $base_field->rows = $base_campo->rows;
                                $base_field->save();
                                
                            }
                        }

                        if( $base_campo->campos->count() !=  $base_field->head_num_col )
                        {
                            $list_column_old = $this->getOldColumns($base_campo, $base_field);

                           # dd( $list_column_old);

                            $base_field->head_num_col = $base_campo->campos->count();
                            $base_field->save();
                        }
                    }
            }

            


            if( count( $delete_fields) > 0 )
            {            
                foreach ($delete_fields as $key => $value) 
                {
                    Field::where('key',$value)->delete();
                }               
            }
            
        }

        return view('ESE.estudio.edit-estudio-ese',['estudio' => $estudio]);
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

        $data = $request->all();
        $values = [];
                
        $estudio = EstudioEse::find($id); 

        

        if( $estudio )
        {       
            foreach ($data['field'] as $key => $value) 
            {                

                if( trim( $value ) != '' )
                {
                    DB::table('ese_campos_estudios_formatos')
                    ->where('key'       , $data['key'][$key])
                    ->where('id_ese_asignado', $estudio->id )                        
                    ->update([ 'value'  => $value ]);
                }

                    /*******************************************************************************
                    $field = $estudio->fields()->where('key','=',$key)->get();        
                    
                    $field[0]->value = $value;
                    $field[0]->save();
                    *******************************************************************************/
                 
            }
            
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

    private function getFieldsFormato( Collection $campos_plantilla )
    {
        $campos_formato = [];
        
        foreach ($campos_plantilla as $campo) 
        {            
            array_push($campos_formato, $campo->key);            
        }

        return $campos_formato;
    }

    private function getLabels(Collection $campos_plantilla )
    {
        $campos_label      = [];
        $campos_componente = []; 

        foreach ($campos_plantilla as $campo) 
        {            
            $campos_label[$campo->key] = $campo->label;            
            $campos_componente[$campo->key] = $campo->componente->id;
        }

        return ['campos_label' => $campos_label,'campos_componente' => $campos_componente];
    }

    private function getFieldsEstudio(Collection $fields_estudio )
    {
        $campos_estudio = [];

        foreach ($fields_estudio as $campo) 
        {
            //$campos_estudio[$campo->key] = $campo->id;
            array_push($campos_estudio, $campo->key);
        }
        return $campos_estudio;
    }

    private function getFieldsInsertar( $array_plantilla,$array_estudio )
    {
        $campos_nuevos = [];
        foreach ($array_plantilla as $key => $value) 
        {
            if( !in_array($value, $array_estudio) )
            {
                $campos_nuevos[$key] = $value;
            }   
        }

        return $campos_nuevos;

    }

    private function getFieldsDelete( $array_plantilla,$array_estudio )
    {
        $campos_delete = [];
        foreach ($array_estudio as $key => $value) 
        {
            if( !in_array($value, $array_plantilla) )
            {
                $campos_delete[$key] = $value;
            }   
        }

        return $campos_delete;

    }

    private function validarCamposRequest( $key )
    {
        $campos = ['_token','_method'];

        if( in_array($key, $campos) )
        {
            return true;
        }

        return false;
    }

    protected function addRowsField($num_rows_add,$field, $campo)
    {
        $list_childs_add   = [];
        $list_childs_label = [];
        $tamplate_child    = $campo->campos;
        $num_rows          = $field->campos->count() / $field->head_num_col;
        $num_col           = $campo->campos->count();
        $row_next          = ($num_rows + $num_rows_add);
        $row_new           = $num_rows;

        for ($i=$row_new; $i < $row_next; $i++) {
            foreach ( $tamplate_child as $field_child ) {
                $new_field_child = new Field(['label'        => $field_child->label,
                                              'key'          => $field_child->key .'_'.$i.'_row',
                                              'main'         => 0
                                             ]);

                array_push( $list_childs_add, $new_field_child );
            }                        
        }

        $field->campos()->saveMany($list_childs_add);

    }

    protected function removeRowsField($num_rows_delete, $field, $campo )
    {   
        $iterator      = $num_rows_delete * $field->head_num_col;
        $delete_fields = []; 
        $collection    = $field->campos;
                
        for($i = 1; $i <= $iterator; $i++ )
        {
            $field_delete = $collection->pop();
            $delete_fields[] = $field_delete->id;
        }

        Field::destroy($delete_fields);
    }

    protected function getOldColumns( $base_campo, $base_field )
    {
        $colums     = $base_campo->campos->count(); 
        $rows       = $base_field->head_num_col;
        $rows_old   = $base_field->campos->count();
        $fields_old = $base_field->campos;
        $matriz     = [];
        $col_fields = [];
        

        for($i = 0; $i < $rows_old; $i++ )
        {
            $col_fields[] = $fields_old[$i]->key;
               
            if( ( ($i+1) % $base_field->head_num_col )  == 0 )
            {
                $matriz[$i]=$col_fields;
                $this->clearArray( $col_fields );
            }
        }

        return $matriz;
        
    }

    protected function clearArray(array &$list)
    {
        $size_array = count($list);       

        for( $i = ( $size_array-1 ) ; $i >= 0 ; $i-- )
        {
            unset($list[$i]);
            
        }

        $list = [];        
    }

}

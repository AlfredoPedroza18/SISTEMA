<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use App\ESE\EstudioEse;

trait TraitDownloadXls 
{
    public function downloadXls( Request $request )
    {

    	$estudio = EstudioEse::find( $request->input('estudio') );
    	if( $estudio && $request->has('formato'))
    	{	    		
    		$formatoDownloadXls = $request->input('formato'); 

		    $modelo  			= $estudio->$formatoDownloadXls;
		    $arr_content 		= [	$this->getHeaderXls( $modelo->relacionesModelo() ), 
		    						$this->getContetntXls( $modelo->relacionesModelo(), 
		    						$modelo ) ];

		    
		    
		    

		    \Excel::create('Formato-ESE-'.$estudio->id, function($excel) use( $arr_content )
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
    	}
    } 

    public function getHeaderXls( $relationship )
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


	public function getContetntXls( $relationship, $model )
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

}




<?php

namespace App\Helpers;
use Illuminate\Database\Eloquent\Relations\Relation;
use DB;



trait TraitMethodsModel 
{
    
    public function relacionesModelo() 
    {

        $model = new static;

        $modelosRelacionados = [];

        foreach((new \ReflectionClass($model))->getMethods(\ReflectionMethod::IS_PUBLIC) as $method)
        {

            if ($method->class != get_class($model) ||
                !empty($method->getParameters()) ||
                $method->getName() == __FUNCTION__) {
                continue;
            }

            try {
            	
                $return = $method->invoke($model);

                if ($return instanceof Relation) {

                    $modelosRelacionados[$method->getName()] = [
                        'type' 	 => (new \ReflectionClass($return))->getShortName(),
                        'model'  => (new \ReflectionClass($return->getRelated()))->getName(),
                        'fields' => $this->getFieldsFormatDb( (new \ReflectionClass($return->getRelated()))->getName() ),
                        'method' => $method->getName()
                        
                    ];
                }
            } catch(ErrorException $e) {

            }
        }

        return $modelosRelacionados;
    }


    public function getFieldsFormatDb( $model )
    {
    	$objModel = new $model;
    	$table = $objModel->getTable();

    	$arrFields = $this->allFieldsFormat( DB::select('DESCRIBE ' . $table ) );


    	return $arrFields;
    }

    public function allFieldsFormat( $fields )
    {
    	$arrayFields = [];

    	foreach ($fields as $field ) 
    	{
			$arrayFields[] = $field->Field;
    	}

    	return $arrayFields;
    }  


    public function generateXls()
    {
    	/*Excel::create('Formato-ESE-'.$estudio->id, function($excel) use( $modelo )
	    {
	        $excel->sheet('Sheetname', function($sheet) use( $modelo ) 
	        {

	            $relationship = $modelo->relacionesModelo();
	            $columns = 0;
	            $rows    = 2;

	            foreach ($relationship as $relation ) 
	            {
	                
	                $sheet->setCellValueByColumnAndRow( $columns, 1,'||COMPONENTE||' );                
	                $columns++;
	                $sheet->setCellValueByColumnAndRow( $columns, 1,$relation['model'] );                
	                $columns++;
	                foreach ($relation['fields'] as $index => $field) 
	                {                    
	                    $sheet->setCellValueByColumnAndRow( $columns, 1,$field );                
	                    $columns++;

	                }

	                $rows++;
	            }

	        });

	    })->download('xls');*/
    } 

}

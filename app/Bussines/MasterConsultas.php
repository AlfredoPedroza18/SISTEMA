<?php

namespace App\Bussines;

use App\Exceptions\APIException;
use App\MasterConsultasSQL;
use Exception;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Driver\PDOConnection;

class MasterConsultas
{

    private static function extractParamNames($data)
    {
        $operatorsar = array(",","=","!=","<>",	">","<",">=","<=","!<","!>","+","-","*","/","%","(",")","[","]",",");

        $sqlNoOperators = str_replace($operatorsar, " ", $data);
        $params = explode(":", $sqlNoOperators );

        $stack = array();
        foreach($params as $param)
        {
            if(strpos($param, ' ') !== false)
            {
                $param_spaces = explode(" ", $param);
                array_push($stack, $param_spaces[0]);
            }else{
                array_push($stack, $param);

            }
        }
        $unikes =  array_unique($stack);

        $finalParams = array();
        foreach($unikes as $ukparam)
        {
            if(strpos($data ,':'.$ukparam) !==false )
            {
                array_push( $finalParams , $ukparam);
            }
        }

        return $finalParams;
    }

    private static function getDefaultParams($data)
    {
        $paramNames =  MasterConsultas::extractParamNames($data);
        $parameters = array();
        if(isset($paramNames) && count($paramNames) > 0)
        {
            foreach($paramNames as $name){
                $parameters[$name] = -1;
            }
        }
        return $parameters;
    }

    private static function replaceParamValues($sql, $defaultParams, $userParams){
        $replacedParams = $defaultParams;

        foreach ($userParams as $key => $value)
        {
            if(array_search($key, array_keys($replacedParams)) >= 0)
            {
                $replacedParams[$key] = $value;
            }else{
                throw new APIException( 'No se encontró el parametro '.$key);
            }
        }


        foreach ($replacedParams  as $key => $value)
        {
            $sql = str_replace(':'.$key, '\''.$value.'\'', $sql);
        }

        return  $sql ;
    }

    private static function getSQL($sqlName, $sqlType, $userParams){
        $msql = MasterConsultasSQL::where('NombreConsulta','=',$sqlName)->where('Tipo',$sqlType)->first();

        if (isset($msql))
        {
            $result = MasterConsultas::replaceParamValues( $msql->SQL, MasterConsultas::getDefaultParams($msql->SQL), $userParams);

            return $result;
        }else{
            throw new APIException( 'No se encontró la consulta deseada de nombre ' . $sqlName);
        }
    }

    public static function exeSQL($sqlName, $sqlType, $params)
    {
        $sql_data = MasterConsultas::getSQL($sqlName, $sqlType, $params);

        return DB::select( DB::raw( $sql_data));

    }

    public static function exeSQLStatement($sqlName, $sqlType, $params)
    {
        $sql_data = MasterConsultas::getSQL($sqlName, $sqlType, $params);

        DB::statement( DB::raw( $sql_data));

    }

    public static function exePagedSQL($sqlName, $sqlType, $page, $maxResults, $params)
    {
        $sql_data = MasterConsultas::getSQL($sqlName, $sqlType, $params);
        $totalRows = 0;
        $params =  array(
            $sql_data,
            $page,
            $maxResults
        );
        $rows = DB::select( DB::raw("call sql__paged_result(?,?,?,@totalRows, @totalPages)"), $params);
        $totalRows = DB::select( DB::raw("select @totalRows as totalRows"));
        $totalPages = DB::select( DB::raw("select @totalPages as totalPages"));

        $resultset["data"]["pageRows"] = 0;
        $resultset["data"]["totalRows"] = 0;
        $resultset["data"]["totalPages"] = 0;
        $resultset["data"]["rows"] = [];

        if(isset($rows) && count($rows) > 0)
            $resultset["data"]["rows"]  = $rows;
        else
            $resultset["data"]["rows"]  = [];

        if(isset($totalRows) && count($totalRows) > 0)
            $resultset["data"]["totalRows"]  = $totalRows[0]->totalRows;
        else
            $resultset["data"]["totalRows"]  = 0;

        if(isset($totalPages) && count($totalPages) > 0)
            $resultset["data"]["totalPages"]  = $totalPages[0]->totalPages;
        else
            $resultset["data"]["totalPages"]  = 0;

        $resultset["data"]["pageRows"] = count($resultset["data"]["rows"]);

        return $resultset;

   }

}

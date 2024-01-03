<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JasperPHP; // put here

class GenReports extends Controller
{
    //
    private function outputDir()
    {
        $outputDirGen = $this::fixPathname(public_path(). '/jasper/data/' . date("Ymdhis"));

        mkdir($outputDirGen);

      return $outputDirGen;
    }

    private function inputDir()
    {
        return  $this::fixPathname(base_path('/resources/jasper'));
    }

    private function fixPathname($path)
    {
        return str_replace("\\", "/",$path);

    }

    public function helloWorld()
    {
        //jasper ready to call
        //JasperPHP::compile(base_path('/vendor/cossou/jasperphp/examples/hello_world.jrxml'))->execute();

        $outputDirGen = $this::outputDir();

        JasperPHP::process(
            $this::inputDir() . '/hello_world.jasper',
            $outputDirGen ,
            array('pdf', 'rtf', 'xlsx'),
            array('php_version' => phpversion())
        )->execute();

        $file= $outputDirGen . '/hello_world.pdf' ;

        return response()->download($file);
    }

    public function customersListPdf()
    {
        //jasper ready to call
        //JasperPHP::compile(base_path('/vendor/cossou/jasperphp/examples/hello_world.jrxml'))->execute();

        $outputDirGen = $this::outputDir();

        JasperPHP::process(
            $this::inputDir() . '/CostumerList.jasper',
            $outputDirGen ,
            array('pdf'),
            array('reportPath' => $this::inputDir() ),
            array(
                'driver' => env("DB_CONNECTION", null), //Aqui é por causa do Java
                'host' => env("DB_HOST", null),
                'port' => env("DB_PORT", null),
                'database' => env("DB_DATABASE", null),
                'username' => env("DB_USERNAME", null),
                'password' => env("DB_PASSWORD", null)
            ),
            false
        )->execute();

        $file= $outputDirGen . '/CostumerList.pdf' ;

        return response()->download($file);
    }
    public function customersListXlsx()
    {
        //jasper ready to call
        //JasperPHP::compile(base_path($this::inputDir() . '/CostumerList.jrxml'))->execute();

        $outputDirGen = $this::outputDir();

        JasperPHP::process(
            $this::inputDir() . '/CostumerList.jasper',
            $outputDirGen ,
            array('xlsx'),
            array('reportPath' => $this::inputDir()),
            array(
                'driver' => env("DB_CONNECTION", null), //Aqui é por causa do Java
                'host' => env("DB_HOST", null),
                'port' => env("DB_PORT", null),
                'database' => env("DB_DATABASE", null),
                'username' => env("DB_USERNAME", null),
                'password' => env("DB_PASSWORD", null)
            ),
            false
        )->execute();

        $file= $outputDirGen . '/CostumerList.xlsx' ;

        return response()->download($file);
    }

}

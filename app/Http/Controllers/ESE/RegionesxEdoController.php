<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class RegionesxEdoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Regiones = MasterConsultas::exeSQL("master_regiones_edo", "READONLY",
            array(
                "IdRegionEdo" => '-1'
            )
        );


        return view("ESE.catalogos.regionesxedoindex",["regiones"=>$Regiones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Regiones = DB::table('master_regiones')->get();

        $regiones = ['Seleccione una Región'];
        foreach ($Regiones as $reg) {
            $regiones[$reg->IdRegion] = $reg->Nombre;
            // $codE=$reg->Codigo;
        }

        $Estados = DB::table('estados')->get();

        $estados = ['Seleccione un Estado'];
        foreach ($Estados as $edo) {
            $estados[$edo->IdEstado] = $edo->FK_nombre_estado;
            $codE=$edo->Codigo;
        }

        return view("ESE.catalogos.form-catalogoregionesxedo")
        ->with('IdRegion', $regiones)
        ->with('IdEstado', $estados)
        ;
    }

    public function ValidacionMunicipio(Request $request)
    {
        $datos=$request->input('datos');
        $res='';
        $rl='';
        $query = DB::select("Select master_municipios.IdMunicipio,master_municipios.Codigo, master_municipios.CodigoEstado, master_municipios.IdMunicipio, master_municipios.Descripcion From master_municipios inner join estados ON master_municipios.CodigoEstado = estados.Codigo
        where estados.IdEstado = $datos");

        foreach ($query as $opt) {
            $res=$res."<option value='".$opt->Descripcion."' >".$opt->Descripcion."</option>";
            // $im=$opt->IdMunicipio;
        }

        $queryL = DB::select("Select master_localidad.IdLocalidad,master_localidad.Codigo, master_localidad.IdLocalidad, master_localidad.Descripcion From master_localidad inner join estados ON master_localidad.CodigoEstado = estados.Codigo
        where estados.IdEstado = $datos");

        foreach ($queryL as $optL) {
            $rl=$rl."<option value='".$optL->IdLocalidad."' >".$optL->Descripcion."</option>";
            // $il=$optL->IdLocalidad;
        }


        // var_dump($ce, $res, $rl);
        return array($res, $rl);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
            $AltaRegiones=MasterConsultas::exeSQLStatement("create_catalogo_regiones_edo", "UPDATE",
                    array(
                        "Municipio" => $request->input('CodigoMunicipio'),
                        "IdEstado" => $request->input('IdEstado'),
                        "IdRegion" => $request->input('IdRegion')
                    )
                );
            return response()->json(['status_alta' => 'success']);
      
        
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
    public function edit($id)
    {
        $Region = MasterConsultas::exeSQL("master_regiones_edo", "READONLY",
            array(
                "IdRegionEdo" => $id

            )
        );

        foreach ($Region as  $reg) {
            $Municipio=$reg->Municipio;
            $IdEstado=$reg->IdEstado;
            $IdRegion=$reg->IdRegion;

        }

        $Regiones = DB::table('master_regiones')->orderByRaw("FIELD(IdRegion, $IdRegion) DESC")->get();

        $regiones = [];
        foreach ($Regiones as $reg) {
            $regiones[$reg->IdRegion] = $reg->Nombre;
            // $codE=$reg->Codigo;
        }

        $Estados = DB::table('estados')->orderByRaw("FIELD(IdEstado, $IdEstado) DESC")->get();

        $estados = [];
        foreach ($Estados as $edo) {
            $estados[$edo->IdEstado] = $edo->FK_nombre_estado;
            $codE=$edo->Codigo;
        }

        // $queryMunicipio = DB::select("select *
        // FROM master_municipios
        // WHERE CodigoEstado=$codE
        // Order by Descripcion=$Municipio DESC");

        // $municipios = [];
        // foreach ($queryMunicipio as $mun) {
        //     $estados[$mun->IdEstado] = $mun->FK_nombre_estado;
        //     $codE=$mun->Codigo;
        // }

        return view("ESE.catalogos.regionesxedoedit")
        ->with('IdRegion', $regiones)
        ->with('IdEstado', $estados)
        ->with('IdRegionEdo', $id)
        ->with('CodigoMunicipio', null)
        ;

      
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
        $Municipio = $request->input('CodigoMunicipio');
        $IdEstado  = $request->input('IdEstado');
        $IdRegion  = $request->input('IdRegion');

        DB::update("update master_region_edo set Municipio='{$Municipio}', 
        IdEstado='{$IdEstado}',IdRegion='{$IdRegion}'
         where  IdRegionEdo='{$id}'");
        
        // $UpdateRegion=MasterConsultas::exeSQLStatement("update_catalogo_regiones_edo", "UPDATE",
        //     array(
        //         "Municipio" => $request->input('CodigoMunicipio'),
        //         "IdEstado" => $request->input('IdEstado'),
        //         "IdRegion" => $request->input('IdRegion'),
        //         "IdRegionEdo" => $id
        //     )
        // );


        return redirect('/CatalogoRegionesxEdo')
        ->with(['success' =>  $Municipio . ' se actualizó con éxito',
            'type'    => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $DeleteModalidad=MasterConsultas::exeSQLStatement("delete_catalogo_regiones_edo", "UPDATE",
            array(
                "IdRegionEdo" => $id
            )
            );
          } catch (Exception $e) {
            echo "Se ha producion una excepción. Los detalles son los siguientes:";
  
          }finally{
  
            return redirect('/CatalogoRegionesxEdo')
                    ->with(['success' => ' El registro se eliminó con éxito',
                        'type'    => 'success']);
          }
    }
}

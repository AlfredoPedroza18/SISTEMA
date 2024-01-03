<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class CodigosPostalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cod="-1";
        $datos=DB::select('Select cp.IdCodigoPostal, cp.CodigoPostal, cp.CodigoEstado,
        cp.CodigoMunicipio,
        e.FK_nombre_estado as estado,
        e.IdEstado,
        m.Descripcion as Municipio,
        m.IdMunicipio, l.Descripcion as localidad,
        l.IdLocalidad,
        col.Colonia,
        p.IdPais
        From cfdi_codigopostal as cp
        INNER JOIN estados e on e.Codigo = cp.CodigoEstado
        INNER join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio
        INNER  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad
        LEFT join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)
        INNER join master_pais as p on (p.IdPais = e.IdPais)
        where ('.$cod.'=-1 or ('.$cod.'<>-1 and '.$cod.' = cp.CodigoPostal))
        ORDER BY CodigoPostal Asc');


        return view("ESE.catalogos.codigospostalesindex",["CodigosPostales"=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Estados = DB::table('estados')->get();

            $estados = ['Seleccione un Estado'];
            foreach ($Estados as $edo) {
                $estados[$edo->IdEstado] = $edo->FK_nombre_estado;
                $codE=$edo->Codigo;
            }


        return view("ESE.catalogos.form-catalogocodigospostales")
        ->with('CodigoPostal', null)
        ->with('IdEstado', $estados)
        ->with('CodigoEstado', $codE)
        ->with('CodigoMunicipio', null)
        ->with('CodigoLocalidad', null)
        ;
    }

    public function Validacion(Request $request)
    {
        $datos=$request->input('datos');
        $res='';
        $rl='';
        $query = DB::select("Select master_municipios.IdMunicipio,master_municipios.Codigo, master_municipios.CodigoEstado, master_municipios.IdMunicipio, master_municipios.Descripcion From master_municipios inner join estados ON master_municipios.CodigoEstado = estados.Codigo
        where estados.IdEstado = $datos");

        foreach ($query as $opt) {
            $res=$res."<option value='".$opt->IdMunicipio."' >".$opt->Descripcion."</option>";
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

    public function ValidacionCP(Request $request)
    {
        $datos=$request->input('datos');
        $res='';

        $query = DB::select("select count(*) as cont from cfdi_codigopostal where CodigoPostal = '{$datos}'");

        foreach ($query as $g) {
            $res = $g->cont;
          }

           return $res;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $IdMunicipio=$request->input('CodigoMunicipio');
        $IdLocalidad=$request->input('CodigoLocalidad');
        $IdEstado=$request->input('IdEstado');

        $query = DB::select("Select master_municipios.Codigo as CodigoMunicipio, master_municipios.CodigoEstado,
        master_municipios.IdMunicipio, master_municipios.Descripcion,
        master_localidad.IdLocalidad,master_localidad.Codigo as CodigoLocalidad,
        master_localidad.Descripcion as Localidad
        From master_municipios
        inner join estados ON master_municipios.CodigoEstado = estados.Codigo
        inner join master_localidad ON master_localidad.CodigoEstado = estados.Codigo
        where master_municipios.IdMunicipio = $IdMunicipio and master_localidad.IdLocalidad = $IdLocalidad");

            foreach ($query as $opt) {
                $CodigoEstado=$opt->CodigoEstado;
                $CodigoMunicipio=$opt->CodigoMunicipio;
                $CodigoLocalidad=$opt->CodigoLocalidad;

            }

        $AltaCodigosPostales=MasterConsultas::exeSQLStatement("create_catalogo_codigospostales", "UPDATE",
            array(
                "CodigoPostal" => $request->input('CodigoPostal'),
                "CodigoEstado" => $CodigoEstado,
                "CodigoMunicipio" => $CodigoMunicipio,
                "CodigoLocalidad" => $CodigoLocalidad
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

    // public function ValidacionEd(Request $request)
    // {
    //     $datos=$request->input('datos');
    //     $res='';
    //     $rl='';
    //     $query = DB::select("Select master_municipios.Codigo, master_municipios.CodigoEstado, master_municipios.IdMunicipio, master_municipios.Descripcion From master_municipios inner join estados ON master_municipios.CodigoEstado = estados.Codigo
    //     where estados.IdEstado = $datos");

    //     foreach ($query as $opt) {
    //         $res=$res."<option value='".$opt->Codigo."' >".$opt->Descripcion."</option>";
    //         // $ce=$opt->CodigoEstado;
    //     }

    //     $queryL = DB::select("Select master_localidad.Codigo, master_localidad.IdLocalidad, master_localidad.Descripcion From master_localidad inner join estados ON master_localidad.CodigoEstado = estados.Codigo
    //     where estados.IdEstado = $datos");

    //     foreach ($queryL as $optL) {
    //         $rl=$rl."<option value='".$optL->Codigo."' >".$optL->Descripcion."</option>";
    //     }


    //     // var_dump($ce, $res, $rl);
    //     return array($res, $rl);
    //     // return $arr=array("value"=>$res,"value1"=>$rl);

    // }
    public function edit($id)
    {

        $datos=DB::select('Select cp.IdCodigoPostal, cp.CodigoPostal, cp.CodigoEstado, cp.CodigoLocalidad,
        cp.CodigoMunicipio,
        e.FK_nombre_estado as estado,
        e.IdEstado,
        m.Descripcion as Municipio,
        m.IdMunicipio, l.Descripcion as localidad,
        l.IdLocalidad,
        col.Colonia,
        p.IdPais
        From cfdi_codigopostal as cp
        INNER JOIN estados e on e.Codigo = cp.CodigoEstado
        INNER join master_municipios m on m.CodigoEstado = cp.CodigoEstado and m.Codigo=cp.CodigoMunicipio
        INNER  join master_localidad l on l.CodigoEstado= cp.CodigoEstado and l.Codigo = cp.CodigoLocalidad
        LEFT join master_colonias as col on(cp.CodigoPostal= col.FK_CodigoPostal)
        INNER join master_pais as p on (p.IdPais = e.IdPais)
        where (cp.IdCodigoPostal = '.$id.')
        ORDER BY CodigoPostal Asc');

        foreach ($datos as  $cp) {
            $IdCodigoPostal=$cp->IdCodigoPostal;
            $CodigoPostal=$cp->CodigoPostal;
            $IdEstado=$cp->IdEstado;
            $CodigoEstado=$cp->CodigoEstado;
            $CodigoMunicipio=$cp->CodigoMunicipio;
            $CodigoLocalidad=$cp->CodigoLocalidad;

        }


        $Estados=DB::table('estados')
            ->select('Codigo','IdEstado','FK_nombre_estado')
           ->orderByRaw("FIELD(IdEstado, $IdEstado) DESC")
            ->get();

        foreach ($Estados as $edo) {
            $estados[$edo->IdEstado] = $edo->FK_nombre_estado;
            $codE=$edo->Codigo;
        }


        // return view("ESE.catalogos.codigospostalesedit",["IdCodigoPostal"=>$IdCodigoPostal,"CodigoPostal"=>$CodigoPostal,"IdEstado"=>$estados,"CodigoEstado"=>$codE,"CodigoMunicipio"=>null,"CodigoLocalidad"=>null]);
        return view("ESE.catalogos.codigospostalesedit")
        ->with('IdCodigoPostal', $IdCodigoPostal)
        ->with('CodigoPostal', $CodigoPostal)
        ->with('IdEstado', $estados)
        ->with('CodigoEstado', $codE)
        ->with('CodigoMunicipio', null)
        ->with('CodigoLocalidad', null);
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
        $IdMunicipio=$request->input('CodigoMunicipio');
        $IdLocalidad=$request->input('CodigoLocalidad');
        $IdEstado=$request->input('IdEstado');

        $query = DB::select("Select master_municipios.Codigo as CodigoMunicipio, master_municipios.CodigoEstado,
        master_municipios.IdMunicipio, master_municipios.Descripcion,
        master_localidad.IdLocalidad,master_localidad.Codigo as CodigoLocalidad,
        master_localidad.Descripcion as Localidad
        From master_municipios
        inner join estados ON master_municipios.CodigoEstado = estados.Codigo
        inner join master_localidad ON master_localidad.CodigoEstado = estados.Codigo
        where master_municipios.IdMunicipio = $IdMunicipio and master_localidad.IdLocalidad = $IdLocalidad");

            foreach ($query as $opt) {
                $CodigoEstado=$opt->CodigoEstado;
                $CodigoMunicipio=$opt->CodigoMunicipio;
                $CodigoLocalidad=$opt->CodigoLocalidad;

            }
        // dd($CodigoLocalidad);

        $UpdateCodigoPostal=MasterConsultas::exeSQLStatement("update_catalogo_codigospostales", "UPDATE",
        array(
            "CodigoEstado" => $CodigoEstado,
            "CodigoMunicipio" => $CodigoMunicipio,
            "CodigoLocalidad" => $CodigoLocalidad,
            "IdCodigoPostal" => $id
        )
    );


    return redirect('/CatalogoCodigosPostales')
    ->with(['success' =>  'El registro se actualizó con éxito',
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
          $DeleteCodigoPostal=MasterConsultas::exeSQLStatement("delete_catalogo_codigospostales", "UPDATE",
          array(
              "IdCodigoPostal" => $id
          )
          );
        } catch (Exception $e) {
          echo "Se ha producion una excepción. Los detalles son los siguientes:";

        }finally{
          return redirect('/CatalogoCodigosPostales')
                  ->with(['success' => ' El registro se eliminó con éxito',
                      'type'    => 'success']);
        }


    }
}

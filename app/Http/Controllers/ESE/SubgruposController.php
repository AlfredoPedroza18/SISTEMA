<?php

namespace App\Http\Controllers\ESE;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bussines\MasterConsultas;
use DB;

class SubgruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Subgrupos = MasterConsultas::exeSQL("master_ese_agrupador", "READONLY",
            array(
                "IdAgrupador" => '-1'
            )
        );

        $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');
        // $query_max=DB::select("Select max(Orden) as MOrden from master_ese_contenedor");

        // foreach ($query_max as $c) {

        //     $MaxO = $c->MOrden;
        // }
        //     $Orden= $MaxO+1;

        // return view("ESE.catalogos.subgruposindex",["subgrupos"=>$Subgrupos, "contenedor"=>$c,"ordengrupoG"=>$Orden]);
        return view("ESE.catalogos.subgruposindex",["subgrupos"=>$Subgrupos, "contenedor"=>$c ,"ordenAgrupadorA"=>null]);

    }

    public function reacomodar(Request $request){


      DB::table('master_ese_agrupador')
      ->where('IdAgrupador', $request->input('Id'))
      ->update( array('Orden'=>$request->input('Valor')));

      DB::table('master_ese_agrupador')
      ->where('IdAgrupador', $request->input('IdDes'))
      ->update( array('Orden'=>$request->input('ValorDes')));

    //   return array($request->input('Id'),$request->input('Valor'),$request->input('IdDes'),$request->input('ValorDes'));
        // echo $request->input('Id').' '.$request->input('Valor').' '.$request->input('IdDes').' '.$request->input('ValorDes');
    }

    public function Filtro(Request $request)
    {
        $bem;
        $cod = $request->input('valcnt');
        $queryS=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');

        if($cod != ''){
          $queryB=DB::select("SELECT IdAgrupador,Etiqueta,Orden,
          (select mc.Etiqueta from master_ese_contenedor as mc where mc.IdContenedor= master_ese_agrupador.IdContenedor) as Grupo
           FROM master_ese_agrupador WHERE master_ese_agrupador.IdContenedor = $cod");

        //   $bem=DB::select($queryB,[$cod]);
          $query_max=DB::select("Select max(Orden) as MOrden from master_ese_agrupador where IdContenedor = $cod");
          foreach ($query_max as $c) {
              $MaxO = $c->MOrden;
          }
              $Orden= $MaxO+1;
              return view("ESE.catalogos.subgruposxcontenedores",['subgrupos'=>$queryB,'contenedor'=>$queryS,'cntC'=>$cod, 'ordenAgrupadorA'=>$Orden]);
        }else{
          $bem = MasterConsultas::exeSQL("master_ese_agrupador", "READONLY",
              array(
                  "IdAgrupador" => '-1'
              )
          );


          return view("ESE.catalogos.subgruposindex",["subgrupos"=>$queryB, "contenedor"=>$queryS ,"ordenAgrupadorA"=>null]);
        }





    }

    public function FiltroOrden($id)
    {
        $query_max=DB::select("Select max(Orden) as MOrden from master_ese_agrupador where IdContenedor = $id");
        foreach ($query_max as $c) {
            $MaxO = $c->MOrden;
        }
            $Orden= $MaxO+1;

        return array($Orden);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    public function GAgrupador(Request $request)
    {

        $etq = $request->nombreagrupador;
        $oa = $request->ordenAgrupadorA;
        $cnt = $request->cntC;
        $a=$request->all();

        if ($cnt == ''){
            return redirect('/Subgrupos')
            ->with(['success' => ' Se debe seleccionar un Contenedor',
                'type'    => 'success']);

        }else{

            $AltaSubgrupos=MasterConsultas::exeSQLStatement("create_catalogo_agrupador", "UPDATE",
            array(
                "Etiqueta" => $etq,
                "Orden" => $oa,
                "IdContenedor" => $cnt
                )
            );
            $queryS=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');

            $queryB='SELECT IdAgrupador,Etiqueta,Orden,
            (select mc.Etiqueta from master_ese_contenedor as mc where mc.IdContenedor= master_ese_agrupador.IdContenedor) as Grupo
             FROM master_ese_agrupador WHERE master_ese_agrupador.IdContenedor = :contenedor';

            $bem=DB::select($queryB,[$cnt]);
            $Orden='';
            $query_max=DB::select("Select max(Orden) as MOrden from master_ese_agrupador where IdContenedor = $cnt");
            foreach ($query_max as $c) {
                $MaxO = $c->MOrden;
            }
            $Orden= $MaxO+1;
           
            
            return view("ESE.catalogos.subgruposxcontenedores",['subgrupos'=>$bem,'contenedor'=>$queryS,'cntC'=>$cnt, 'ordenAgrupadorA'=>$Orden]);
            // return view("ESE.catalogos.subgruposxcontenedores",['subgrupos'=>$bem,'contenedor'=>$queryS,'cntC'=>$cnt,'ordenAgrupadorA'=>null]);
            // return redirect('/AgrupadoresxContenedor')
            // ->with(['success' =>  ' El registro se agregó con éxito',
            //     'type'    => 'success']);

        }



    }

    public function GuardarAgrupador(Request $request)
    {
        $etq = $request->nombreagrupador;
        $oa = $request->ordenAgrupadorA;
        $cnt = $request->cntC;
        // $a=$request->all();
        // dd($a);
        $AltaSubgrupos=MasterConsultas::exeSQLStatement("create_catalogo_agrupador", "UPDATE",
            array(
                "Etiqueta" => $etq,
                "Orden" => $oa,
                "IdContenedor" => $cnt
                )
        );

        // $Subgrupos = MasterConsultas::exeSQL("master_ese_agrupador", "READONLY",
        //     array(
        //         "IdAgrupador" => '-1'
        //         )
        // );

        // $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');

        // return view("ESE.catalogos.subgruposindex",["subgrupos"=>$Subgrupos, "contenedor"=>$c]);
        return redirect('/Subgrupos')
                ->with(['success' =>  ' El registro se agregó con éxito',
                    'type'    => 'success']);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    public function editarA($id)
    {
          $Agrupador = MasterConsultas::exeSQL("master_ese_agrupador", "READONLY",
        array(
            "IdAgrupador" => $id

        )
        );

        foreach ($Agrupador as  $agr) {
            $IdAgrupador=$agr->IdAgrupador;
            $Etiqueta=$agr->Etiqueta;
            $Orden=$agr->Orden;
            $IdContenedor=$agr->IdContenedor;
        }
        $res='';
        $c=DB::select("SELECT IdContenedor,Etiqueta FROM master_ese_contenedor ORDER BY IdContenedor = $IdContenedor DESC");

        foreach ($c as $opt) {
            $res=$res."<option value='".$opt->IdContenedor."' >".$opt->Etiqueta."</option>";
          }

        return array($res,$Etiqueta,$Orden,$IdAgrupador);

    }

    public function editarAxC($id)
    {
          $Agrupador = MasterConsultas::exeSQL("master_ese_agrupador", "READONLY",
        array(
            "IdAgrupador" => $id

        )
        );

        foreach ($Agrupador as  $agr) {
            $IdAgrupador=$agr->IdAgrupador;
            $Etiqueta=$agr->Etiqueta;
            $Orden=$agr->Orden;
            $IdContenedor=$agr->IdContenedor;
        }
        $res='';
        $c=DB::select("SELECT IdContenedor,Etiqueta FROM master_ese_contenedor ORDER BY IdContenedor = $IdContenedor DESC");

        foreach ($c as $opt) {
            $res=$res."<option value='".$opt->IdContenedor."' >".$opt->Etiqueta."</option>";
          }

        return array($IdContenedor,$Etiqueta,$Orden,$IdAgrupador);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function ActualizarA(Request $request)
    {
        $id = $request->IdAgrupador;
        $etq = $request->nombreagrupador;

        $UpdateModalidad=MasterConsultas::exeSQLStatement("update_catalogo_agrupador", "UPDATE",
                    array(
                        "Etiqueta" => $etq,
                        "IdAgrupador" => $id
                    )
                );


                return redirect('/Subgrupos')
                ->with(['success' =>  ' El registro se actualizó con éxito',
                    'type'    => 'success']);
    }

    public function ActualizarAxC(Request $request)
    {
        $id = $request->IdAgrupador;
        $etq = $request->nombreagrupador;
        $cnt = $request->cnt;
    //    $a=$request->all();
    //    dd($a);
        $UpdateModalidad=MasterConsultas::exeSQLStatement("update_catalogo_agrupador", "UPDATE",
                    array(
                        "Etiqueta" => $etq,
                        "IdAgrupador" => $id
                    )
                );

        $queryS=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');

        $queryB='SELECT IdAgrupador,Etiqueta,
        (select mc.Etiqueta from master_ese_contenedor as mc where mc.IdContenedor= master_ese_agrupador.IdContenedor) as Grupo
         FROM master_ese_agrupador WHERE master_ese_agrupador.IdContenedor = :contenedor';

        $bem=DB::select($queryB,[$cnt]);

        $query_max=DB::select("Select max(Orden) as MOrden from master_ese_agrupador where IdContenedor = $cnt");
        foreach ($query_max as $c) {
            $MaxO = $c->MOrden;
        }
        $Orden= $MaxO+1;

        return view("ESE.catalogos.subgruposxcontenedores",['subgrupos'=>$bem,'contenedor'=>$queryS,'cnt'=>$cnt,'cntC'=>$cnt, 'ordenAgrupadorA'=>$Orden]);

                // return redirect('/Subgrupos')
                // ->with(['success' =>  ' El registro se actualizó con éxito',
                //     'type'    => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DeleteSubgrupo=MasterConsultas::exeSQLStatement("delete_catalogo_agrupador", "UPDATE",
        array(
            "IdAgrupador" => $id
        )
        );
        return redirect('/Subgrupos')
                ->with(['success' => ' El registro se eliminó con éxito',
                    'type'    => 'success']);
    }
}

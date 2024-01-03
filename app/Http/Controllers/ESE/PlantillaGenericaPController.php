<?php



namespace App\Http\Controllers\ESE;



use Illuminate\Http\Request;


use PDF;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Bussines\MasterConsultas;

use App\MasterEsePlantilla;

use DB;



class PlantillaGenericaPController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla", "READONLY",

        array(

            "IdPlantilla" => '-1'

            )

        );



        return view("ESE.plantillaG.plantillagenericaindex",["plantillas"=>$Plantilla]);



    }



    public function ValidacionPG(Request $request)

    {

        $datos=$request->input('datos');

        $res='';

        $rl='';

        $entr='';

        $query = DB::select("Select master_ese_agrupador.IdAgrupador,master_ese_agrupador.Etiqueta, master_ese_agrupador.IdContenedor From master_ese_agrupador inner join master_ese_contenedor ON master_ese_agrupador.IdContenedor = master_ese_contenedor.IdContenedor

        where master_ese_agrupador.IdContenedor = $datos");



        foreach ($query as $opt) {

            $res=$res."<option value='".$opt->IdAgrupador."' >".$opt->Etiqueta."</option>";

        }



        $queryL = DB::select("Select master_ese_entrada.IdEntrada,master_ese_entrada.Etiqueta, master_ese_entrada.IdAgrupador

        From master_ese_entrada

        inner join master_ese_agrupador ON master_ese_agrupador.IdAgrupador = master_ese_entrada.IdAgrupador

        inner join master_ese_contenedor ON master_ese_contenedor.IdContenedor = master_ese_agrupador.IdContenedor

        where master_ese_agrupador.IdContenedor = $datos");



        foreach ($queryL as $optL) {

            $rl=$rl."<option value='".$optL->IdEntrada."' >".$optL->Etiqueta."</option>";

        }



        $queryOrd = DB::select("Select master_ese_entrada.IdEntrada,master_ese_entrada.Etiqueta, master_ese_entrada.IdAgrupador

        From master_ese_entrada

        inner join master_ese_agrupador ON master_ese_agrupador.IdAgrupador = master_ese_entrada.IdAgrupador

        inner join master_ese_contenedor ON master_ese_contenedor.IdContenedor = master_ese_agrupador.IdContenedor

        where master_ese_agrupador.IdContenedor = $datos limit 1");



        foreach ($queryOrd as $optL) {

            $entr=$optL->IdEntrada;

        }



        $query_max=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $entr");

        foreach ($query_max as $c) {

            $MaxO = $c->MOrden;

        }

            $Orden= $MaxO+1;



        // var_dump($res);

        return array($res, $rl,$entr);



    }



    public function ValidacionPC(Request $request)

    {

        $datos=$request->input('datos');

        $agr=$request->input('agr');

        $rl='';

        $queryL = DB::select("Select master_ese_entrada.IdEntrada,master_ese_entrada.Etiqueta, master_ese_entrada.IdAgrupador

        From master_ese_entrada

        inner join master_ese_agrupador ON master_ese_agrupador.IdAgrupador = master_ese_entrada.IdAgrupador

        inner join master_ese_contenedor ON master_ese_contenedor.IdContenedor = master_ese_agrupador.IdContenedor

        where master_ese_agrupador.IdAgrupador = $datos");



        foreach ($queryL as $optL) {

            $rl=$rl."<option value='".$optL->IdEntrada."' >".$optL->Etiqueta."</option>";

        }



        $queryOrd = DB::select("Select master_ese_entrada.IdEntrada,master_ese_entrada.Etiqueta, master_ese_entrada.IdAgrupador

        From master_ese_entrada

        inner join master_ese_agrupador ON master_ese_agrupador.IdAgrupador = master_ese_entrada.IdAgrupador

        inner join master_ese_contenedor ON master_ese_contenedor.IdContenedor = master_ese_agrupador.IdContenedor

        where master_ese_agrupador.IdAgrupador = $datos limit 1");



        foreach ($queryOrd as $optL) {

            $entr=$optL->IdEntrada;

        }



        $query_max=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $entr");

        foreach ($query_max as $c) {

            $MaxO = $c->MOrden;

        }

            $Orden= $MaxO+1;





        return array($rl,$Orden);

    }



    public function ValidacionPOrd(Request $request)

    {

        $datos=$request->input('datos');



        $query_max=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $datos");

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

    public function create()

    {

        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",

        array(

            "IdPlantillaEntrada" => '0',

            "IdPlantilla" => '0'

        )

    );

    $v="0";



    $campos=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mee.Clasificacion,

    IF(

     mee.Clasificacion<>'N/A',

     CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Clasificacion, ' - ', mee.Etiqueta),

     CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Etiqueta)

    )Campo



    FROM master_ese_entrada mee

    inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

    inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

    ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");



    // $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');

    $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');



    $tipos=DB::select('SELECT * FROM master_ese_tipos');



    return view("ESE.plantillaG.plantillagenericap",["pentrada"=>$Plantilla, "campos"=>$campos, "servicios"=>$ts, "tipos"=>$tipos, "VaIn"=>$v, "OrdenC"=>null, "label"=>'Creación']);

    }



    public function GuardarPlantilla(Request $request)

    {

        $ts = $request->ts;

        $dp = $request->DescripcionPlantilla;

        $Tiposervicios = $request->Tiposervicios;

        // dd($dp);

        $plantilla       = new MasterEsePlantilla();





        $plantilla->IdTipoServicio              = $ts;

        $plantilla->DescripcionPlantilla          = $dp;

        $plantilla->IdTipos                 = $Tiposervicios;

        $plantilla->save();



        $idp= $plantilla->IdPlantilla;

        $v= "1";



        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",

            array(

                "IdPlantillaEntrada" => '-1',

                "IdPlantilla" => $idp

            )

        );



        $campos=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mee.Clasificacion,

        IF(

         mee.Clasificacion<>'N/A',

         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Clasificacion, ' - ', mee.Etiqueta),

         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Etiqueta)

        )Campo



       FROM master_ese_entrada mee

      inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

      inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

      ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");



    //     $campos 	  = DB::select( $cam );







        // $campos=DB::select('SELECT Etiqueta FROM master_ese_entrada');

        $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');



        $tipos=DB::select('SELECT * FROM master_ese_tipos');



        // return view("ESE.plantillaG.plantillagenerica",["pentrada"=>$Plantilla, "contenedor"=>$c, "servicios"=>$ts , "IdPlantilla"=>$idp, "VaIn"=>$v, "OrdenC"=>null]);

        return view("ESE.plantillaG.plantillagenericap",["pentrada"=>$Plantilla,"campos"=>$campos, "servicios"=>$ts, "tipos"=>$tipos, "IdPlantilla"=>$idp, "VaIn"=>$v, "OrdenC"=>null]);



    }



    public function GuardarEntradaPlantilla($id,$idP)

    {

        $clasificacion=DB::select("SELECT mee.IdEntrada, mee.Clasificacion, mee.CantidadApariciones

        FROM master_ese_entrada mee WHERE mee.IdEntrada = $id ");

        $MaxI=0;

        foreach ($clasificacion as $c) {

            $Clas = $c->Clasificacion;

            $ca=$c->CantidadApariciones;

        }





        if($Clas == 'N/A'){



            $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_entrada WHERE IdEntrada =$id and IdPlantilla=$idP) as Exst");



                foreach ($queryEXST as $p) {

                    $Exst=$p->Exst;



                }



                if(($Exst==0) ){



                    for($j=0;$j<$ca;$j++){

                        $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $id");

                            foreach ($query_maxO as $c) {

                                $MaxO = $c->MOrden;

                            }

                        $Orden= $MaxO+1;





                        $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                            array(

                                "IdEntrada" => $id,

                                "IdPlantilla" => $idP,

                                "Requerido" => 1,

                                "Orden" => $Orden,

                                "Indice" => $MaxI

                                )

                            );

                            $MaxI++;



                    }

                    $j++;

                }else{



                    $query_maxI=DB::select("Select max(Indice) as MIndice from master_ese_plantilla_entrada where IdEntrada = $id and IdPlantilla=$idP");

                    foreach ($query_maxI as $c) {

                        $MI = $c->MIndice;

                    }

                    $MaxI= $MI+1;



                    for($j=0;$j<$ca;$j++){

                        $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $id ");

                            foreach ($query_maxO as $c) {

                                $MaxO = $c->MOrden;

                            }

                        $Orden= $MaxO+1;





                        $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                            array(

                                "IdEntrada" => $id,

                                "IdPlantilla" => $idP,

                                "Requerido" => 1,

                                "Orden" => $Orden,

                                "Indice" => $MaxI

                                )

                            );

                            $MaxI++;



                    }

                    $j++;



                }



        }else{



            $REntradas=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mec.Etiqueta as Contenedor ,mea.Etiqueta as Agrupador,

            mee.Clasificacion,mee.CantidadApariciones,mee.Etiqueta as Campo

                    FROM master_ese_entrada mee

                    inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

                    inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

                    WHERE mee.Clasificacion = '{$Clas}'

                    ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");



            $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_entrada WHERE IdEntrada =$id and IdPlantilla=$idP) as Exst");



            foreach ($queryEXST as $p) {

                $Exst=$p->Exst;



            }



            if(($Exst==0) ){



                for($j=0;$j<$ca;$j++){

                    for($i=0;$i<count($REntradas);$i++){



                        foreach($REntradas as $name){



                            $IdEntrada          = $REntradas[$i]->IdEntrada;



                            $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $IdEntrada");

                            foreach ($query_maxO as $c) {

                                        $MaxO = $c->MOrden;

                                    }

                            $Orden= $MaxO+1;





                            $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                                array(

                                    "IdEntrada" => $IdEntrada,

                                    "IdPlantilla" => $idP,

                                    "Requerido" => 1,

                                    "Orden" => $Orden,

                                    "Indice" => $MaxI

                                    )

                            );

                            $i ++;

                        }



                    }



                    $MaxI++;



                }

                $j++;



            }else{



                $query_maxI=DB::select("Select max(Indice) as MIndice

                from master_ese_plantilla_entrada

                Inner Join master_ese_entrada on master_ese_entrada.IdEntrada = master_ese_plantilla_entrada.IdEntrada

                where master_ese_entrada.Clasificacion = '{$Clas}'");



                    foreach ($query_maxI as $c) {

                        $MI = $c->MIndice;

                    }

                    $MaxI= $MI+1;



                for($j=0;$j<$ca;$j++){

                    for($i=0;$i<count($REntradas);$i++){



                        foreach($REntradas as $name){



                            $IdEntrada          = $REntradas[$i]->IdEntrada;



                            $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $IdEntrada");

                            foreach ($query_maxO as $c) {

                                        $MaxO = $c->MOrden;

                                    }

                            $Orden= $MaxO+1;





                            $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                                array(

                                    "IdEntrada" => $IdEntrada,

                                    "IdPlantilla" => $idP,

                                    "Requerido" => 1,

                                    "Orden" => $Orden,

                                    "Indice" => $MaxI

                                    )

                            );

                            $i ++;

                        }



                    }



                    $MaxI++;



                }

                $j++;



            }

        }



        $v= "1";



    $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",

        array(

            "IdPlantillaEntrada" => '-1',

            "IdPlantilla" => $idP

        )

    );





    $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');



    $tipos=DB::select('SELECT * FROM master_ese_tipos');



       return view("ESE.plantillaG.plantillagenericap",["pentrada"=>$Plantilla, "servicios"=>$ts, "tipos"=>$tipos, "IdPlantilla"=>$idP, "VaIn"=>$v]);

    // return view("ESE.plantillaG.plantillagedit",["pentrada"=>$Plantilla, "servicios"=>$ts , "IdPlantilla"=>$idP, "VaIn"=>$v]);



    }



    public function GuardarEntradaPlantillaEdit($id,$idP)

    {

        $clasificacion=DB::select("SELECT mee.IdEntrada, mee.Clasificacion, mee.CantidadApariciones, mee.IdAgrupador

        FROM master_ese_entrada mee WHERE mee.IdEntrada = $id ");

        $MaxI=0;

        foreach ($clasificacion as $c) {

            $Clas = $c->Clasificacion;

            $ca=$c->CantidadApariciones;

            $agr=$c->IdAgrupador;

        }



        if($Clas == 'N/A'){



            $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_entrada WHERE IdEntrada =$id and IdPlantilla=$idP) as Exst");



                foreach ($queryEXST as $p) {

                    $Exst=$p->Exst;



                }



                if(($Exst==0) ){



                    for($j=0;$j<$ca;$j++){

                        $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $id ");

                            foreach ($query_maxO as $c) {

                                $MaxO = $c->MOrden;

                            }

                        $Orden= $MaxO+1;





                        $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                            array(

                                "IdEntrada" => $id,

                                "IdPlantilla" => $idP,

                                "Requerido" => 1,

                                "Orden" => $Orden,

                                "Indice" => $MaxI

                                )

                            );

                            $MaxI++;



                    }

                    $j++;

                }else{



                    $query_maxI=DB::select("Select max(Indice) as MIndice from master_ese_plantilla_entrada where IdEntrada = $id and IdPlantilla=$idP ");

                    foreach ($query_maxI as $c) {

                        $MI = $c->MIndice;

                    }

                    $MaxI= $MI+1;



                    for($j=0;$j<$ca;$j++){

                        $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $id");

                            foreach ($query_maxO as $c) {

                                $MaxO = $c->MOrden;

                            }

                        $Orden= $MaxO+1;





                        $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                            array(

                                "IdEntrada" => $id,

                                "IdPlantilla" => $idP,

                                "Requerido" => 1,

                                "Orden" => $Orden,

                                "Indice" => $MaxI

                                )

                            );

                            $MaxI++;



                    }

                    $j++;



                }



        }else{



            $REntradas=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mec.Etiqueta as Contenedor ,mea.Etiqueta as Agrupador,

            mee.Clasificacion,mee.CantidadApariciones,mee.Etiqueta as Campo

                    FROM master_ese_entrada mee

                    inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

                    inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

                    WHERE mee.Clasificacion = '{$Clas}' and mee.IdAgrupador= $agr

                    ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");



            $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_entrada WHERE IdEntrada =$id and IdPlantilla=$idP) as Exst");



            foreach ($queryEXST as $p) {

                $Exst=$p->Exst;



            }



            if(($Exst==0) ){



                for($j=0;$j<$ca;$j++){

                    for($i=0;$i<count($REntradas);$i++){



                        foreach($REntradas as $name){



                            $IdEntrada          = $REntradas[$i]->IdEntrada;



                            $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $IdEntrada");

                            foreach ($query_maxO as $c) {

                                        $MaxO = $c->MOrden;

                                    }

                            $Orden= $MaxO+1;





                            $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                                array(

                                    "IdEntrada" => $IdEntrada,

                                    "IdPlantilla" => $idP,

                                    "Requerido" => 1,

                                    "Orden" => $Orden,

                                    "Indice" => $MaxI

                                    )

                            );

                            $i ++;

                        }



                    }



                    $MaxI++;



                }

                $j++;



            }else{



                $query_maxI=DB::select("Select max(Indice) as MIndice

                from master_ese_plantilla_entrada

                Inner Join master_ese_entrada on master_ese_entrada.IdEntrada = master_ese_plantilla_entrada.IdEntrada

                where master_ese_entrada.Clasificacion = '{$Clas}' and IdPlantilla=$idP");



                    foreach ($query_maxI as $c) {

                        $MI = $c->MIndice;

                    }

                    $MaxI= $MI+1;



                for($j=0;$j<$ca;$j++){

                    for($i=0;$i<count($REntradas);$i++){



                        foreach($REntradas as $name){



                            $IdEntrada          = $REntradas[$i]->IdEntrada;



                            $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $IdEntrada");

                            foreach ($query_maxO as $c) {

                                        $MaxO = $c->MOrden;

                                    }

                            $Orden= $MaxO+1;





                            $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                                array(

                                    "IdEntrada" => $IdEntrada,

                                    "IdPlantilla" => $idP,

                                    "Requerido" => 1,

                                    "Orden" => $Orden,

                                    "Indice" => $MaxI

                                    )

                            );

                            $i ++;

                        }



                    }



                    $MaxI++;



                }

                $j++;



            }

        }



        $v= "1";



    $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",

        array(

            "IdPlantillaEntrada" => '-1',

            "IdPlantilla" => $idP

        )

    );



    foreach ($Plantilla as $opt) {

        $Descripcion=$opt->DescripcionPlantilla;

       }



    $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');



    $tipos=DB::select('SELECT * FROM master_ese_tipos');





    //    return view("ESE.plantillaG.plantillagenericap",["pentrada"=>$Plantilla, "servicios"=>$ts , "IdPlantilla"=>$idP, "VaIn"=>$v]);

    return view("ESE.plantillaG.plantillagedit",["pentrada"=>$Plantilla, "servicios"=>$ts, "tipos"=>$tipos, "IdPlantilla"=>$idP, "VaIn"=>$v, "Descripcion"=>$Descripcion]);



    }





    public function UpdatePlantilla(Request $request)

    {

        $ts = $request->input('arr');

        $a=count($ts);

        for($i = 0; $i < $a; $i++){

            $ck = $ts[$i];

            $i++;

            $IdPlantillaEntrada = $ts[$i];

            $i++;

            $Grupo = $ts[$i];

            $i++;

            $Subgrupo = $ts[$i];

            $i++;

            $Clasificacion = $ts[$i];

            $i++;

            $Campo = $ts[$i];

            $i++;

            $Requerido = $ts[$i];



            if ($Requerido=='true') {

                $Requerido=1;

            }else{

                $Requerido=0;

            }

            $i++;

            $VFr = $ts[$i];



            if ($VFr=='true') {

                $VFr=1;

            }else{

                $VFr=0;

            }

            $i++;

            $VRep = $ts[$i];

            if ($VRep=='true') {

                $VRep=1;

            }else{

                $VRep=0;

            }

            $i++;

            $VGrd = $ts[$i];

            if ($VGrd=='true') {

                $VGrd=1;

            }else{

                $VGrd=0;

            }

            $i++;

            $vs = $ts[$i];

            if ($vs=='true') {

                $vs=1;

            }else{

                $vs=0;

            }



            $i++;

            $presencial = $ts[$i];

            if ($presencial=='true') {

                $presencial=1;

            }else{

                $presencial=0;

            }



            $i++;

            $telefonico = $ts[$i];

            if ($telefonico=='true') {

                $telefonico=1;

            }else{

                $telefonico=0;

            }



            $i++;

            $TemE = $ts[$i];

            if ($TemE=='true') {

                $TemE=1;

            }else{

                $TemE=0;

            }







            $guardarCambios=DB::table('master_ese_plantilla_entrada')

            ->where("IdPlantillaEntrada",$IdPlantillaEntrada)

            ->update([

                "Requerido" => $Requerido,

                "VisibleReportes" => $VFr,

                "VisibleForms" => $VRep,

                "VisibleGrids" => $VGrd,

                "VisibleOSClientes" => $vs,

                "TempUsrEdita" => $TemE,

                "Presencial" => $presencial,

                "Telefonico" => $telefonico

            ]);



        }



        // return redirect('/PlantillaGenerica')

        //         ->with(['success' => ' El registro se guardo con éxito',

        //             'type'    => 'success']);

        return response()->json(['status_alta' => 'success']);

        // return response()->json($Requerido);

    }


    public function  preP ($IdPlantilla) {

        $resultActual1 = DB::select("
        SELECT mee.Etiqueta, mee.CampoNombre, p.VisibleForms, e.CantidadApariciones FROM `master_ese_plantilla_entrada` as p
        inner join master_ese_entrada mee on mee.IdEntrada=p.IdEntrada
        INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
        INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
        INNER JOIN master_ese_entrada e on e.identrada = p.identrada
        WHERE IdPlantilla=? AND p.VisibleOSClientes=1;
        ",[$IdPlantilla]);


        $resultActual11 = DB::select("
                SELECT mee.Etiqueta,mee.CampoNombre, p.VisibleForms, e.CantidadApariciones FROM `master_ese_plantilla_entrada` as p
                inner join master_ese_entrada mee on mee.IdEntrada=p.IdEntrada
                INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
                INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
                INNER JOIN master_ese_entrada e on e.identrada = p.identrada
                WHERE IdPlantilla=? AND p.VisibleForms = '1' and c.Etiqueta = 'datos generales'
        ",[$IdPlantilla]);

        $resultActual12 = DB::select("
                SELECT mee.Etiqueta,mee.CampoNombre, p.VisibleForms, e.CantidadApariciones FROM `master_ese_plantilla_entrada` as p
                inner join master_ese_entrada mee on mee.IdEntrada=p.IdEntrada
                INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
                INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
                INNER JOIN master_ese_entrada e on e.identrada = p.identrada
                WHERE IdPlantilla=? AND p.VisibleForms = '1' and c.Etiqueta = 'Documentacion'
        ",[$IdPlantilla]);

        $resultActual = DB::select("
                SELECT mee.CampoNombre, p.VisibleForms, e.CantidadApariciones FROM `master_ese_plantilla_entrada` as p
                inner join master_ese_entrada mee on mee.IdEntrada=p.IdEntrada
                INNER JOIN master_ese_agrupador a ON a.IdAgrupador = mee.IdAgrupador
                INNER JOIN master_ese_contenedor c ON a.IdContenedor = c.IdContenedor
                INNER JOIN master_ese_entrada e on e.identrada = p.identrada
                WHERE IdPlantilla=? AND p.VisibleForms = '1';
        ",[$IdPlantilla]);
        
        
        $NombreCandidato=array(false);
        $Domicilio=array(false);
        $NumeroInteriorExterior=array(false);
        $Colonia=array(false);
        $MunicipioEstado=array(false);
        $CodigoPostal=array(false);
        $Celular=array(false);
        $Telefono=array(false);
        $TiempoVivirDomicilio=array(false);
        $DomicilioAnterior=array(false);
        $TiempoVivirDomicilioAnterior=array(false);
        $EntreCalles=array(false);
        $CorreoElectronico=array(false);
        $FechaNacimiento=array(false);
        $LugarNacimiento=array(false);
        $EdoCivil=array(false);
        $Nacionalidad=array(false);
        $GradoParticipa=array(false);
        $MotivoSolicitudBeca=array(false);
        $ViveCon=array(false);
        $CandidatoFueraPaisSeisMeses=array(false);
        $Edad=array(false);
        $Sexo=array(false);
        $PuestoCandidato=array(false);
        $NombreEscuela=array(false);
        $Nombredelabeca=array(false);
        $DatosGeneralesExtension=array(false);
        $EstadoRepublica=array(false);
        $ApellidoPaternoCandidato=array(false);
        $ApellidoMaternoCandidato=array(false);
        $Calle=array(false);
        $NombreEmpresa=array(false);
        $AplicaCelular=array(false);
        $AplicaTelefono=array(false);
        $NoActaNacimiento=array(false);
        $AnioActaNacimineto=array(false);
        $FojaActaNacimiento=array(false);
        $LibroActaNacimiento=array(false);
        $ValidacionActaNacimiento=array(false);
        $ArchivoActaNacimiento=array(false);
        $AplicaActaNacimineto=array(false);
        $ClaveIne=array(false);
        $OCRIne=array(false);
        $ValidacionIne=array(false);
        $ArchivoIne=array(false);
        $AplicaIne=array(false);
        $TipoIdentificacion=array(false);
        $CurpONaturlizacion=array(false);
        $ValidaionCurp=array(false);
        $ArchivoCurp=array(false);
        $AplicaCurp=array(false);
        $ServicioComDomicilio=array(false);
        $FechaComDomicilio=array(false);
        $TitularComDomicilio=array(false);
        $RelacionComDomicilio=array(false);
        $ValidacionComDomicilio=array(false);
        $ArchivoComprobanteDom=array(false);
        $AplicaComDomicilio=array(false);
        $CartaRecomendacionEmpresa=array(false);
        $CartaRecomendacionArchivo=array(false);
        $CartaRecomendacionValidacion=array(false);
        $CartaRecomendacionAplica=array(false);
        $ReciboNominaEmpresa=array(false);
        $ReciboNominaArchivo=array(false);
        $ReciboNominaValidacion=array(false);
        $ReciboNominaFecha=array(false);
        $ReciboNominaAplica=array(false);
        $UltimoGradoEscuela=array(false);
        $UltimoGradoGrado=array(false);
        $UltimoGradoArchivo=array(false);
        $UltimoGradoValidacion=array(false);
        $UltimoGradoProfesion=array(false);
        $UltimoGradoAplica=array(false);
        $CreditoInfonavitMonto=array(false);
        $CreditoInfonavitNum=array(false);
        $ArchivoCreditoInfonavit=array(false);
        $CreditoInfonavitValidacion=array(false);
        $CreditoInfonavitAplica=array(false);
        $CreditoFonacotNum=array(false);
        $CreditoFonacotMonto=array(false);
        $CreditoFonacotArchivo=array(false);
        $CreditofonacotValidacion=array(false);
        $CreditoFonacotAplica=array(false);
        $NoActaMatrimonio=array(false);
        $AnioActaMatrimonio=array(false);
        $FojaActaMatrimonio=array(false);
        $LibroActaMatrimonio=array(false);
        $ValidacionActaMatrimonio=array(false);
        $ArchivoActaMatrimonio=array(false);
        $AplicaActaMatrimonio=array(false);
        $NoActaNacimientoConyugue=array(false);
        $AnioActaNacimientoConyugue=array(false);
        $FojaActaNacimientoConyugue=array(false);
        $LibroActaNacimientoConyugue=array(false);
        $ValidacionActaNacimientoConyug=array(false);
        $ArchivoActaNacimientoConyugue=array(false);
        $AplicaActaNacimientoConyugue=array(false);
        $NoActaNacimientoHijo=array(false);
        $AnioNacimientoHijo=array(false);
        $FojaActaNacimientoHijo=array(false);
        $LibroNoActaNacimientoHijo=array(false);
        $ValidacionActaNacimientoHijo=array(false);
        $ArchivoActaNacimientoHijo=array(false);
        $AplicaActaNacimientoHijo=array(false);
        $CedulaProfesionalNo=array(false);
        $CedulaProfesionalValidacion=array(false);
        $CedulaProfesionalArchivo=array(false);
        $CedulaProfesional=array(false);
        $ImssArchivo=array(false);
        $ImssValidacion=array(false);
        $ImssNumAfiliacion=array(false);
        $ImssAplica=array(false);
        $CompAguaTitula=array(false);
        $CompAguaRelacion=array(false);
        $CompAguaFecha=array(false);
        $CompAguaPago=array(false);
        $CompAguaArchivo=array(false);
        $CompAguaValidacion=array(false);
        $CompGasTitula=array(false);
        $CompGasRelacion=array(false);
        $CompGasFecha=array(false);
        $CompGasPago=array(false);
        $CompGasArchivo=array(false);
        $CompGasValidacion=array(false);
        $CompLuzTitula=array(false);
        $CompLuzRelacion=array(false);
        $CompLuzFecha=array(false);
        $CompLuzPago=array(false);
        $CompLuzArchivo=array(false);
        $CompLuzValidacion=array(false);
        $CompTelefonoTitula=array(false);
        $CompTelefonoRelacion=array(false);
        $CompTelefonoFecha=array(false);
        $CompTelefonoPago=array(false);
        $CompTelefonoArchivo=array(false);
        $CompTelefonoValidacion=array(false);
        $RfcEmpresa=array(false);
        $RfcArchivo=array(false);
        $RfcValidacion=array(false);
        $RfcAplica=array(false);
        $EdoCtaBanco=array(false);
        $EdoCtaArchivo=array(false);
        $EdoCtaValidacion=array(false);
        $EdoCtaFecha=array(false);
        $EdoCtaBanco2=array(false);
        $EdoCtaFecha2=array(false);
        $EdoCtaValidacion2=array(false);
        $EdoCtaArchivo2=array(false);
        $PasaporteNo=array(false);
        $PasaporteArchivo=array(false);
        $PasaporteValidacion=array(false);
        $PasaporteAplica=array(false);
        $CreditoHipotecarioNum=array(false);
        $CreditoHipotecarioMonto=array(false);
        $CreditoHipotecarioArchivo=array(false);
        $CreditoHipotecarioValidacion=array(false);
        $CreditoHipotecarioAplica=array(false);
        $DocumentacionObservaciones=array(false);
        $IncidenciaLegalesArchivo=array(false);
        $EscolaridadIdiomaNombre=array(false);
        $EscolaridadIdiomaNivel=array(false);
        $EscolaridadIdiomaAplica=array(false);
        $EscolaridadIdiomaComprobante=array(false);
        $EscolaridadIdioma=array(false);
        $EscolaridadObservaciones=array(false);
        $EscolaridadUltimoGrado=array(false);
        $EscolaridadInstitucion=array(false);
        $EscolaridadDomicilio=array(false);
        $EscolaridadPeriodo=array(false);
        $EscolaridadAnios=array(false);
        $EscolaridadComprobante=array(false);
        $EscolaridadBeca=array(false);
        $EscolaridadPorcentaje=array(false);
        $EscolaridadPersonaCoroborro=array(false);
        $EscolaridadVerificacionInstitu=array(false);
        $EscolaridadProfesion=array(false);
        $EscolaridadAplica=array(false);
        $SitEcoDatoFamiliarNombre=array(false);
        $SitEcoDatoFamiliarParentesco=array(false);
        $SitEcoDatoFamiliarEdad=array(false);
        $SitEcoDaboFamiliarEstadoCivil=array(false);
        $SitEcoDatoFamiliarOcupacion=array(false);
        $SitEcoDatoFamiliarEmpresa=array(false);
        $SitEcoDatoFamiliarDireccion=array(false);
        $SitEcoDatoFamiliarAporta=array(false);
        $SitEcoDatoFamiliarIngresoMensu=array(false);
        $SitEcoDatoFamiliarDependeCandi=array(false);
        $SitEcoDatoFamiliarAplica=array(false);
        $SitEcoDatoMedEnfermedadCro=array(false);
        $SitEcoDatoMedEnfermedadCroNomb=array(false);
        $SitEcoDatoMedTratamientoMed=array(false);
        $SitEcoDatoMedTratamientoMedNom=array(false);
        $SitEcoDatoMedAlergico=array(false);
        $SitEcoDatoMedAlergiaNombre=array(false);
        $SitEcoDatoMedControlado=array(false);
        $SitEcoDatoMedControladoNombre=array(false);
        $SitEcoEmerNombre=array(false);
        $SitEcoEmerCelular=array(false);
        $SitEcoEmerRelacion=array(false);
        $SitEcoEmerNombreTelefonoFijo=array(false);
        $SitEcoEmerTipoSangre=array(false);
        $SitEcoEmerAplicaTelefono=array(false);
        $SitEcoEmerAplicaCelular=array(false);
        $SitEcoCortoPlazo=array(false);
        $SitEcoMedianoPlazo=array(false);
        $SitEcoLargoPlazo=array(false);
        $SitEcoPrincipalesPrincipales=array(false);
        $SitEcoIngMenDescripcion=array(false);
        $SitEcoIngMenTipo=array(false);
        $SitEcoIngMenMonto=array(false);
        $SitEcoIngMenAplica=array(false);
        $SitEcoAutoMarca=array(false);
        $SitEcoBienesraices=array(false);
        $SitEcoUbicacion=array(false);
        $SitEcoCreditos=array(false);
        $SitEcoCreditosMontoTotal=array(false);
        $SitEcoInversionAhorro=array(false);
        $SitEcoInversionAhorroMonto=array(false);
        $SitEcoAdeudo=array(false);
        $SitEcoAduedoMonto=array(false);
        $SitEcoAvalNombres=array(false);
        $SitEcoCreditoAutomotriz=array(false);
        $SitEcocreditosAdeudos=array(false);
        $SitEcoComentarios=array(false);
        $SitEcoDepPadres=array(false);
        $SitEcoDepPadresPorcentaje=array(false);
        $SitEcoDepTrabajaActualmente=array(false);
        $SitEcoDepTieneDependientes=array(false);
        $SitEcoDepDependientes=array(false);
        $SitEcoCuentaConBeca=array(false);
        $SitEcoDescripcionBecas=array(false);
        $SitEcoProgramaSocial=array(false);
        $SitEcoProgramaSocialNombres=array(false);
        $SitEcoDepTrabajaActualmenteHor=array(false);
        $SitEcoDatoFamiliarObserGen=array(false);
        $SitEcoLaViviendaEs=array(false);
        $SitEcoObservaciones=array(false);
        $ViviendaTipoLuz=array(false);
        $ViviendaTipoAgua=array(false);
        $ViviendaTipoGas=array(false);
        $ViviendaTipoDrenaje=array(false);
        $ViviendaTipoHabitantes=array(false);
        $ViviendaTipoTipoCasa=array(false);
        $ViviendaTipoDescripcionExterio=array(false);
        $ViviendaTipoCalidadMobiliario=array(false);
        $ViviendaTipoCalidadLimpieza=array(false);
        $ViviendaTipoCalidadOrden=array(false);
        $ViviendaTipoCalidadGeneral=array(false);
        $ViviendaTipoMaterialCasa=array(false);
        $ViviendaTipoNivelSocioeconomic=array(false);
        $SitEcoEgreMenAlimentacion=array(false);
        $SitEcoEgreMenServicios=array(false);
        $SitEcoEgreMenCreditos=array(false);
        $SitEcoEgreMenGastos=array(false);
        $SitEcoEgreMenDiversiones=array(false);
        $SitEcoEgreMenOtros=array(false);
        $SitEcoEgreMenDeficitSolventa=array(false);
        $SitEcoEgreMenTipo=array(false);
        $SitEcoEgreMenTipoMonto=array(false);
        $SitEcoEgreMenEconomia=array(false);








        foreach($resultActual as $ou){
            if($ou->CampoNombre=='NombreCandidato' && $ou->VisibleForms=='1') array_push($NombreCandidato,true);
            if($ou->CampoNombre=='Domicilio' && $ou->VisibleForms=='1') array_push($Domicilio,true);
            if($ou->CampoNombre=='NumeroInteriorExterior' && $ou->VisibleForms=='1') array_push($NumeroInteriorExterior,true);
            if($ou->CampoNombre=='Colonia' && $ou->VisibleForms=='1') array_push($Colonia,true);
            if($ou->CampoNombre=='MunicipioEstado' && $ou->VisibleForms=='1') array_push($MunicipioEstado,true);
            if($ou->CampoNombre=='CodigoPostal' && $ou->VisibleForms=='1') array_push($CodigoPostal,true);
            if($ou->CampoNombre=='Celular' && $ou->VisibleForms=='1') array_push($Celular,true);
            if($ou->CampoNombre=='Telefono' && $ou->VisibleForms=='1') array_push($Telefono,true);
            if($ou->CampoNombre=='TiempoVivirDomicilio' && $ou->VisibleForms=='1') array_push($TiempoVivirDomicilio,true);
            if($ou->CampoNombre=='DomicilioAnterior' && $ou->VisibleForms=='1') array_push($DomicilioAnterior,true);
            if($ou->CampoNombre=='TiempoVivirDomicilioAnterior' && $ou->VisibleForms=='1') array_push($TiempoVivirDomicilioAnterior,true);
            if($ou->CampoNombre=='EntreCalles' && $ou->VisibleForms=='1') array_push($EntreCalles,true);
            if($ou->CampoNombre=='CorreoElectronico' && $ou->VisibleForms=='1') array_push($CorreoElectronico,true);
            if($ou->CampoNombre=='FechaNacimiento' && $ou->VisibleForms=='1') array_push($FechaNacimiento,true);
            if($ou->CampoNombre=='LugarNacimiento' && $ou->VisibleForms=='1') array_push($LugarNacimiento,true);
            if($ou->CampoNombre=='EdoCivil' && $ou->VisibleForms=='1') array_push($EdoCivil,true);
            if($ou->CampoNombre=='Nacionalidad' && $ou->VisibleForms=='1') array_push($Nacionalidad,true);
            if($ou->CampoNombre=='GradoParticipa' && $ou->VisibleForms=='1') array_push($GradoParticipa,true);
            if($ou->CampoNombre=='MotivoSolicitudBeca' && $ou->VisibleForms=='1') array_push($MotivoSolicitudBeca,true);
            if($ou->CampoNombre=='ViveCon' && $ou->VisibleForms=='1') array_push($ViveCon,true);
            if($ou->CampoNombre=='CandidatoFueraPaisSeisMeses' && $ou->VisibleForms=='1') array_push($CandidatoFueraPaisSeisMeses,true);
            if($ou->CampoNombre=='Edad' && $ou->VisibleForms=='1') array_push($Edad,true);
            if($ou->CampoNombre=='Sexo' && $ou->VisibleForms=='1') array_push($Sexo,true);
            if($ou->CampoNombre=='PuestoCandidato' && $ou->VisibleForms=='1') array_push($PuestoCandidato,true);
            if($ou->CampoNombre=='NombreEscuela' && $ou->VisibleForms=='1') array_push($NombreEscuela,true);
            if($ou->CampoNombre=='Nombredelabeca' && $ou->VisibleForms=='1') array_push($Nombredelabeca,true);
            if($ou->CampoNombre=='DatosGeneralesExtension' && $ou->VisibleForms=='1') array_push($DatosGeneralesExtension,true);
            if($ou->CampoNombre=='EstadoRepublica' && $ou->VisibleForms=='1') array_push($EstadoRepublica,true);
            if($ou->CampoNombre=='ApellidoPaternoCandidato' && $ou->VisibleForms=='1') array_push($ApellidoPaternoCandidato,true);
            if($ou->CampoNombre=='ApellidoMaternoCandidato' && $ou->VisibleForms=='1') array_push($ApellidoMaternoCandidato,true);
            if($ou->CampoNombre=='Calle' && $ou->VisibleForms=='1') array_push($Calle,true);
            if($ou->CampoNombre=='NombreEmpresa' && $ou->VisibleForms=='1') array_push($NombreEmpresa,true);
            if($ou->CampoNombre=='AplicaCelular' && $ou->VisibleForms=='1') array_push($AplicaCelular,true);
            if($ou->CampoNombre=='AplicaTelefono' && $ou->VisibleForms=='1') array_push($AplicaTelefono,true);    
            if($ou->CampoNombre=='NoActaNacimiento' && $ou->VisibleForms=='1') array_push($NoActaNacimiento,true);
            if($ou->CampoNombre=='AnioActaNacimineto' && $ou->VisibleForms=='1') array_push($AnioActaNacimineto,true);
            if($ou->CampoNombre=='FojaActaNacimiento' && $ou->VisibleForms=='1') array_push($FojaActaNacimiento,true);
            if($ou->CampoNombre=='LibroActaNacimiento' && $ou->VisibleForms=='1') array_push($LibroActaNacimiento,true);
            if($ou->CampoNombre=='ValidacionActaNacimiento' && $ou->VisibleForms=='1') array_push($ValidacionActaNacimiento,true);
            if($ou->CampoNombre=='ArchivoActaNacimiento' && $ou->VisibleForms=='1') array_push($ArchivoActaNacimiento,true);
            if($ou->CampoNombre=='AplicaActaNacimineto' && $ou->VisibleForms=='1') array_push($AplicaActaNacimineto,true);
            if($ou->CampoNombre=='ClaveIne' && $ou->VisibleForms=='1') array_push($ClaveIne,true);
            if($ou->CampoNombre=='OCRIne' && $ou->VisibleForms=='1') array_push($OCRIne,true);
            if($ou->CampoNombre=='ValidacionIne' && $ou->VisibleForms=='1') array_push($ValidacionIne,true);
            if($ou->CampoNombre=='ArchivoIne' && $ou->VisibleForms=='1') array_push($ArchivoIne,true);
            if($ou->CampoNombre=='AplicaIne' && $ou->VisibleForms=='1') array_push($AplicaIne,true);
            if($ou->CampoNombre=='TipoIdentificacion' && $ou->VisibleForms=='1') array_push($TipoIdentificacion,true);
            if($ou->CampoNombre=='CurpONaturlizacion' && $ou->VisibleForms=='1') array_push($CurpONaturlizacion,true);
            if($ou->CampoNombre=='ValidaionCurp' && $ou->VisibleForms=='1') array_push($ValidaionCurp,true);
            if($ou->CampoNombre=='ArchivoCurp' && $ou->VisibleForms=='1') array_push($ArchivoCurp,true);
            if($ou->CampoNombre=='AplicaCurp' && $ou->VisibleForms=='1') array_push($AplicaCurp,true);
            if($ou->CampoNombre=='ServicioComDomicilio' && $ou->VisibleForms=='1') array_push($ServicioComDomicilio,true);
            if($ou->CampoNombre=='FechaComDomicilio' && $ou->VisibleForms=='1') array_push($FechaComDomicilio,true);
            if($ou->CampoNombre=='TitularComDomicilio' && $ou->VisibleForms=='1') array_push($TitularComDomicilio,true);
            if($ou->CampoNombre=='RelacionComDomicilio' && $ou->VisibleForms=='1') array_push($RelacionComDomicilio,true);
            if($ou->CampoNombre=='ValidacionComDomicilio' && $ou->VisibleForms=='1') array_push($ValidacionComDomicilio,true);
            if($ou->CampoNombre=='ArchivoComprobanteDom' && $ou->VisibleForms=='1') array_push($ArchivoComprobanteDom,true);
            if($ou->CampoNombre=='AplicaComDomicilio' && $ou->VisibleForms=='1') array_push($AplicaComDomicilio,true);
            if($ou->CampoNombre=='CartaRecomendacionEmpresa' && $ou->VisibleForms=='1') array_push($CartaRecomendacionEmpresa,true);
            if($ou->CampoNombre=='CartaRecomendacionArchivo' && $ou->VisibleForms=='1') array_push($CartaRecomendacionArchivo,true);
            if($ou->CampoNombre=='CartaRecomendacionValidacion' && $ou->VisibleForms=='1') array_push($CartaRecomendacionValidacion,true);
            if($ou->CampoNombre=='CartaRecomendacionAplica' && $ou->VisibleForms=='1') array_push($CartaRecomendacionAplica,true);
            if($ou->CampoNombre=='ReciboNominaEmpresa' && $ou->VisibleForms=='1') array_push($ReciboNominaEmpresa,true);
            if($ou->CampoNombre=='ReciboNominaArchivo' && $ou->VisibleForms=='1') array_push($ReciboNominaArchivo,true);
            if($ou->CampoNombre=='ReciboNominaValidacion' && $ou->VisibleForms=='1') array_push($ReciboNominaValidacion,true);
            if($ou->CampoNombre=='ReciboNominaFecha' && $ou->VisibleForms=='1') array_push($ReciboNominaFecha,true);
            if($ou->CampoNombre=='ReciboNominaAplica' && $ou->VisibleForms=='1') array_push($ReciboNominaAplica,true);
            if($ou->CampoNombre=='UltimoGradoEscuela' && $ou->VisibleForms=='1') array_push($UltimoGradoEscuela,true); 
            if($ou->CampoNombre=='UltimoGradoGrado' && $ou->VisibleForms=='1') array_push($UltimoGradoGrado,true);
            if($ou->CampoNombre=='UltimoGradoArchivo' && $ou->VisibleForms=='1') array_push($UltimoGradoArchivo,true);
            if($ou->CampoNombre=='UltimoGradoValidacion' && $ou->VisibleForms=='1') array_push($UltimoGradoValidacion,true);
            if($ou->CampoNombre=='UltimoGradoProfesion' && $ou->VisibleForms=='1') array_push($UltimoGradoProfesion,true);
            if($ou->CampoNombre=='UltimoGradoAplica' && $ou->VisibleForms=='1') array_push($UltimoGradoAplica,true);
            if($ou->CampoNombre=='CreditoInfonavitMonto' && $ou->VisibleForms=='1') array_push($CreditoInfonavitMonto,true);
            if($ou->CampoNombre=='CreditoInfonavitNum' && $ou->VisibleForms=='1') array_push($CreditoInfonavitNum,true);
            if($ou->CampoNombre=='ArchivoCreditoInfonavit' && $ou->VisibleForms=='1') array_push($ArchivoCreditoInfonavit,true);
            if($ou->CampoNombre=='CreditoInfonavitValidacion' && $ou->VisibleForms=='1') array_push($CreditoInfonavitValidacion,true);
            if($ou->CampoNombre=='CreditoInfonavitAplica' && $ou->VisibleForms=='1') array_push($CreditoInfonavitAplica,true);
            if($ou->CampoNombre=='CreditoFonacotNum' && $ou->VisibleForms=='1') array_push($CreditoFonacotNum,true);
            if($ou->CampoNombre=='CreditoFonacotMonto' && $ou->VisibleForms=='1') array_push($CreditoFonacotMonto,true);
            if($ou->CampoNombre=='CreditoFonacotArchivo' && $ou->VisibleForms=='1') array_push($CreditoFonacotArchivo,true);
            if($ou->CampoNombre=='CreditofonacotValidacion' && $ou->VisibleForms=='1') array_push($CreditofonacotValidacion,true);
            if($ou->CampoNombre=='CreditoFonacotAplica' && $ou->VisibleForms=='1') array_push($CreditoFonacotAplica,true);
            if($ou->CampoNombre=='NoActaMatrimonio' && $ou->VisibleForms=='1') array_push($NoActaMatrimonio,true);
            if($ou->CampoNombre=='AnioActaMatrimonio' && $ou->VisibleForms=='1') array_push($AnioActaMatrimonio,true);
            if($ou->CampoNombre=='FojaActaMatrimonio' && $ou->VisibleForms=='1') array_push($FojaActaMatrimonio,true);
            if($ou->CampoNombre=='LibroActaMatrimonio' && $ou->VisibleForms=='1') array_push($LibroActaMatrimonio,true);
            if($ou->CampoNombre=='ValidacionActaMatrimonio' && $ou->VisibleForms=='1') array_push($ValidacionActaMatrimonio,true);
            if($ou->CampoNombre=='ArchivoActaMatrimonio' && $ou->VisibleForms=='1') array_push($ArchivoActaMatrimonio,true);
            if($ou->CampoNombre=='AplicaActaMatrimonio' && $ou->VisibleForms=='1') array_push($AplicaActaMatrimonio,true);
            if($ou->CampoNombre=='NoActaNacimientoConyugue' && $ou->VisibleForms=='1') array_push($NoActaNacimientoConyugue,true);
            if($ou->CampoNombre=='AnioActaNacimientoConyugue' && $ou->VisibleForms=='1') array_push($AnioActaNacimientoConyugue,true);
            if($ou->CampoNombre=='FojaActaNacimientoConyugue' && $ou->VisibleForms=='1') array_push($FojaActaNacimientoConyugue,true);
            if($ou->CampoNombre=='LibroActaNacimientoConyugue' && $ou->VisibleForms=='1') array_push($LibroActaNacimientoConyugue,true);
            if($ou->CampoNombre=='ValidacionActaNacimientoConyug' && $ou->VisibleForms=='1') array_push($ValidacionActaNacimientoConyug,true);
            if($ou->CampoNombre=='ArchivoActaNacimientoConyugue' && $ou->VisibleForms=='1') array_push($ArchivoActaNacimientoConyugue,true);
            if($ou->CampoNombre=='AplicaActaNacimientoConyugue' && $ou->VisibleForms=='1') array_push($AplicaActaNacimientoConyugue,true);
            if($ou->CampoNombre=='NoActaNacimientoHijo' && $ou->VisibleForms=='1') array_push($NoActaNacimientoHijo,true);
            if($ou->CampoNombre=='AnioNacimientoHijo' && $ou->VisibleForms=='1') array_push($AnioNacimientoHijo,true);
            if($ou->CampoNombre=='FojaActaNacimientoHijo' && $ou->VisibleForms=='1') array_push($FojaActaNacimientoHijo,true);
            if($ou->CampoNombre=='LibroNoActaNacimientoHijo' && $ou->VisibleForms=='1') array_push($LibroNoActaNacimientoHijo,true);
            if($ou->CampoNombre=='ValidacionActaNacimientoHijo' && $ou->VisibleForms=='1') array_push($ValidacionActaNacimientoHijo,true);
            if($ou->CampoNombre=='ArchivoActaNacimientoHijo' && $ou->VisibleForms=='1') array_push($ArchivoActaNacimientoHijo,true);
            if($ou->CampoNombre=='AplicaActaNacimientoHijo' && $ou->VisibleForms=='1') array_push($AplicaActaNacimientoHijo,true);
            if($ou->CampoNombre=='CedulaProfesionalNo' && $ou->VisibleForms=='1') array_push($CedulaProfesionalNo,true);
            if($ou->CampoNombre=='CedulaProfesionalValidacion' && $ou->VisibleForms=='1') array_push($CedulaProfesionalValidacion,true);
            if($ou->CampoNombre=='CedulaProfesionalArchivo' && $ou->VisibleForms=='1') array_push($CedulaProfesionalArchivo,true);
            if($ou->CampoNombre=='CedulaProfesional' && $ou->VisibleForms=='1') array_push($CedulaProfesional,true);
            if($ou->CampoNombre=='ImssArchivo' && $ou->VisibleForms=='1') array_push($ImssArchivo,true);
            if($ou->CampoNombre=='ImssValidacion' && $ou->VisibleForms=='1') array_push($ImssValidacion,true);
            if($ou->CampoNombre=='ImssNumAfiliacion' && $ou->VisibleForms=='1') array_push($ImssNumAfiliacion,true);
            if($ou->CampoNombre=='ImssAplica' && $ou->VisibleForms=='1') array_push($ImssAplica,true);
            if($ou->CampoNombre=='CompAguaTitula' && $ou->VisibleForms=='1') array_push($CompAguaTitula,true);
            if($ou->CampoNombre=='CompAguaRelacion' && $ou->VisibleForms=='1') array_push($CompAguaRelacion,true);
            if($ou->CampoNombre=='CompAguaFecha' && $ou->VisibleForms=='1') array_push($CompAguaFecha,true);
            if($ou->CampoNombre=='CompAguaPago' && $ou->VisibleForms=='1') array_push($CompAguaPago,true);
            if($ou->CampoNombre=='CompAguaArchivo' && $ou->VisibleForms=='1') array_push($CompAguaArchivo,true);
            if($ou->CampoNombre=='CompAguaValidacion' && $ou->VisibleForms=='1') array_push($CompAguaValidacion,true);
            if($ou->CampoNombre=='CompGasTitula' && $ou->VisibleForms=='1') array_push($CompGasTitula,true);
            if($ou->CampoNombre=='CompGasRelacion' && $ou->VisibleForms=='1') array_push($CompGasRelacion,true);
            if($ou->CampoNombre=='CompGasFecha' && $ou->VisibleForms=='1') array_push($CompGasFecha,true);
            if($ou->CampoNombre=='CompGasPago' && $ou->VisibleForms=='1') array_push($CompGasPago,true);
            if($ou->CampoNombre=='CompGasArchivo' && $ou->VisibleForms=='1') array_push($CompGasArchivo,true);
            if($ou->CampoNombre=='CompGasValidacion' && $ou->VisibleForms=='1') array_push($CompGasValidacion,true);
            if($ou->CampoNombre=='CompLuzTitula' && $ou->VisibleForms=='1') array_push($CompLuzTitula,true);
            if($ou->CampoNombre=='CompLuzRelacion' && $ou->VisibleForms=='1') array_push($CompLuzRelacion,true);
            if($ou->CampoNombre=='CompLuzFecha' && $ou->VisibleForms=='1') array_push($CompLuzFecha,true);
            if($ou->CampoNombre=='CompLuzPago' && $ou->VisibleForms=='1') array_push($CompLuzPago,true);
            if($ou->CampoNombre=='CompLuzArchivo' && $ou->VisibleForms=='1') array_push($CompLuzArchivo,true);
            if($ou->CampoNombre=='CompLuzValidacion' && $ou->VisibleForms=='1') array_push($CompLuzValidacion,true);
            if($ou->CampoNombre=='CompTelefonoTitula' && $ou->VisibleForms=='1') array_push($CompTelefonoTitula,true);
            if($ou->CampoNombre=='CompTelefonoRelacion' && $ou->VisibleForms=='1') array_push($CompTelefonoRelacion,true);
            if($ou->CampoNombre=='CompTelefonoFecha' && $ou->VisibleForms=='1') array_push($CompTelefonoFecha,true);
            if($ou->CampoNombre=='CompTelefonoPago' && $ou->VisibleForms=='1') array_push($CompTelefonoPago,true);
            if($ou->CampoNombre=='CompTelefonoArchivo' && $ou->VisibleForms=='1') array_push($CompTelefonoArchivo,true);
            if($ou->CampoNombre=='CompTelefonoValidacion' && $ou->VisibleForms=='1') array_push($CompTelefonoValidacion,true);
            if($ou->CampoNombre=='RfcEmpresa' && $ou->VisibleForms=='1') array_push($RfcEmpresa,true);
            if($ou->CampoNombre=='RfcArchivo' && $ou->VisibleForms=='1') array_push($RfcArchivo,true);
            if($ou->CampoNombre=='RfcValidacion' && $ou->VisibleForms=='1') array_push($RfcValidacion,true);
            if($ou->CampoNombre=='RfcAplica' && $ou->VisibleForms=='1') array_push($RfcAplica,true);
            if($ou->CampoNombre=='EdoCtaBanco' && $ou->VisibleForms=='1') array_push($EdoCtaBanco,true);
            if($ou->CampoNombre=='EdoCtaArchivo' && $ou->VisibleForms=='1') array_push($EdoCtaArchivo,true);
            if($ou->CampoNombre=='EdoCtaValidacion' && $ou->VisibleForms=='1') array_push($EdoCtaValidacion,true);
            if($ou->CampoNombre=='EdoCtaFecha' && $ou->VisibleForms=='1') array_push($EdoCtaFecha,true);
            if($ou->CampoNombre=='EdoCtaBanco2' && $ou->VisibleForms=='1') array_push($EdoCtaBanco2,true);
            if($ou->CampoNombre=='EdoCtaFecha2' && $ou->VisibleForms=='1') array_push($EdoCtaFecha2,true);
            if($ou->CampoNombre=='EdoCtaValidacion2' && $ou->VisibleForms=='1') array_push($EdoCtaValidacion2,true);
            if($ou->CampoNombre=='EdoCtaArchivo2' && $ou->VisibleForms=='1') array_push($EdoCtaArchivo2,true);
            if($ou->CampoNombre=='PasaporteNo' && $ou->VisibleForms=='1') array_push($PasaporteNo,true);
            if($ou->CampoNombre=='PasaporteArchivo' && $ou->VisibleForms=='1') array_push($PasaporteArchivo,true);
            if($ou->CampoNombre=='PasaporteValidacion' && $ou->VisibleForms=='1') array_push($PasaporteValidacion,true);
            if($ou->CampoNombre=='PasaporteAplica' && $ou->VisibleForms=='1') array_push($PasaporteAplica,true);
            if($ou->CampoNombre=='CreditoHipotecarioNum' && $ou->VisibleForms=='1') array_push($CreditoHipotecarioNum,true);
            if($ou->CampoNombre=='CreditoHipotecarioMonto' && $ou->VisibleForms=='1') array_push($CreditoHipotecarioMonto,true);
            if($ou->CampoNombre=='CreditoHipotecarioArchivo' && $ou->VisibleForms=='1') array_push($CreditoHipotecarioArchivo,true);
            if($ou->CampoNombre=='CreditoHipotecarioValidacion' && $ou->VisibleForms=='1') array_push($CreditoHipotecarioValidacion,true);
            if($ou->CampoNombre=='CreditoHipotecarioAplica' && $ou->VisibleForms=='1') array_push($CreditoHipotecarioAplica,true);
            if($ou->CampoNombre=='DocumentacionObservaciones' && $ou->VisibleForms=='1') array_push($DocumentacionObservaciones,true);
            if($ou->CampoNombre=='IncidenciaLegalesArchivo' && $ou->VisibleForms=='1') array_push($IncidenciaLegalesArchivo,true);
            if($ou->CampoNombre=='EscolaridadIdiomaNombre' && $ou->VisibleForms=='1') array_push($EscolaridadIdiomaNombre,true);
            if($ou->CampoNombre=='EscolaridadIdiomaNivel' && $ou->VisibleForms=='1') array_push($EscolaridadIdiomaNivel,true);
            if($ou->CampoNombre=='EscolaridadIdiomaComprobante' && $ou->VisibleForms=='1') array_push($EscolaridadIdiomaComprobante,true);
            if($ou->CampoNombre=='EscolaridadIdioma' && $ou->VisibleForms=='1') array_push($EscolaridadIdioma,true);
            if($ou->CampoNombre=='EscolaridadObservaciones' && $ou->VisibleForms=='1') array_push($EscolaridadObservaciones,true);
            if($ou->CampoNombre=='EscolaridadUltimoGrado' && $ou->VisibleForms=='1') array_push($EscolaridadUltimoGrado,true);
            if($ou->CampoNombre=='EscolaridadInstitucion' && $ou->VisibleForms=='1') array_push($EscolaridadInstitucion,true);
            if($ou->CampoNombre=='EscolaridadDomicilio' && $ou->VisibleForms=='1') array_push($EscolaridadDomicilio,true);
            if($ou->CampoNombre=='EscolaridadPeriodo' && $ou->VisibleForms=='1') array_push($EscolaridadPeriodo,true);
            if($ou->CampoNombre=='EscolaridadAnios' && $ou->VisibleForms=='1') array_push($EscolaridadAnios,true);
            if($ou->CampoNombre=='EscolaridadComprobante' && $ou->VisibleForms=='1') array_push($EscolaridadComprobante,true);
            if($ou->CampoNombre=='EscolaridadBeca' && $ou->VisibleForms=='1') array_push($EscolaridadBeca,true);
            if($ou->CampoNombre=='EscolaridadPorcentaje' && $ou->VisibleForms=='1') array_push($EscolaridadPorcentaje,true);
            if($ou->CampoNombre=='EscolaridadPersonaCoroborro' && $ou->VisibleForms=='1') array_push($EscolaridadPersonaCoroborro,true);
            if($ou->CampoNombre=='EscolaridadVerificacionInstitu' && $ou->VisibleForms=='1') array_push($EscolaridadVerificacionInstitu,true);
            if($ou->CampoNombre=='EscolaridadProfesion' && $ou->VisibleForms=='1') array_push($EscolaridadProfesion,true);
            if($ou->CampoNombre=='EscolaridadAplica' && $ou->VisibleForms=='1') array_push($EscolaridadAplica,true);
            if($ou->CampoNombre=='SitEcoDatoFamiliarNombre' && $ou->VisibleForms=='1') array_push($SitEcoDatoFamiliarNombre,true);
            if($ou->CampoNombre=='SitEcoDatoFamiliarParentesco' && $ou->VisibleForms=='1') array_push($SitEcoDatoFamiliarParentesco,true);
            if($ou->CampoNombre=='SitEcoDatoFamiliarEdad' && $ou->VisibleForms=='1') array_push($SitEcoDatoFamiliarEdad,true);
            if($ou->CampoNombre=='SitEcoDaboFamiliarEstadoCivil' && $ou->VisibleForms=='1') array_push($SitEcoDaboFamiliarEstadoCivil,true);
            if($ou->CampoNombre=='SitEcoDatoFamiliarOcupacion' && $ou->VisibleForms=='1') array_push($SitEcoDatoFamiliarOcupacion,true);
            if($ou->CampoNombre=='SitEcoDatoFamiliarEmpresa' && $ou->VisibleForms=='1') array_push($SitEcoDatoFamiliarEmpresa,true);
            if($ou->CampoNombre=='SitEcoDatoFamiliarDireccion' && $ou->VisibleForms=='1') array_push($SitEcoDatoFamiliarDireccion,true);
            if($ou->CampoNombre=='SitEcoDatoFamiliarAporta' && $ou->VisibleForms=='1') array_push($SitEcoDatoFamiliarAporta,true);
            if($ou->CampoNombre=='SitEcoDatoFamiliarIngresoMensu' && $ou->VisibleForms=='1') array_push($SitEcoDatoFamiliarIngresoMensu,true);
            if($ou->CampoNombre=='SitEcoDatoFamiliarDependeCandi' && $ou->VisibleForms=='1') array_push($SitEcoDatoFamiliarDependeCandi,true);
            if($ou->CampoNombre=='SitEcoDatoFamiliarAplica' && $ou->VisibleForms=='1') array_push($SitEcoDatoFamiliarAplica,true);
            if($ou->CampoNombre=='SitEcoDatoMedEnfermedadCro' && $ou->VisibleForms=='1') array_push($SitEcoDatoMedEnfermedadCro,true);
            if($ou->CampoNombre=='SitEcoDatoMedEnfermedadCroNomb' && $ou->VisibleForms=='1') array_push($SitEcoDatoMedEnfermedadCroNomb,true);
            if($ou->CampoNombre=='SitEcoDatoMedTratamientoMed' && $ou->VisibleForms=='1') array_push($SitEcoDatoMedTratamientoMed,true);
            if($ou->CampoNombre=='SitEcoDatoMedTratamientoMedNom' && $ou->VisibleForms=='1') array_push($SitEcoDatoMedTratamientoMedNom,true);
            if($ou->CampoNombre=='SitEcoDatoMedAlergico' && $ou->VisibleForms=='1') array_push($SitEcoDatoMedAlergico,true);
            if($ou->CampoNombre=='SitEcoDatoMedAlergiaNombre' && $ou->VisibleForms=='1') array_push($SitEcoDatoMedAlergiaNombre,true);
            if($ou->CampoNombre=='SitEcoDatoMedControlado' && $ou->VisibleForms=='1') array_push($SitEcoDatoMedControlado,true);
            if($ou->CampoNombre=='SitEcoDatoMedControladoNombre' && $ou->VisibleForms=='1') array_push($SitEcoDatoMedControladoNombre,true);
            if($ou->CampoNombre=='SitEcoEmerNombre' && $ou->VisibleForms=='1') array_push($SitEcoEmerNombre,true);
            if($ou->CampoNombre=='SitEcoEmerCelular' && $ou->VisibleForms=='1') array_push($SitEcoEmerCelular,true);
            if($ou->CampoNombre=='SitEcoEmerRelacion' && $ou->VisibleForms=='1') array_push($SitEcoEmerRelacion,true);
            if($ou->CampoNombre=='SitEcoEmerNombreTelefonoFijo' && $ou->VisibleForms=='1') array_push($SitEcoEmerNombreTelefonoFijo,true);
            if($ou->CampoNombre=='SitEcoEmerTipoSangre' && $ou->VisibleForms=='1') array_push($SitEcoEmerTipoSangre,true);
            if($ou->CampoNombre=='SitEcoEmerAplicaTelefono' && $ou->VisibleForms=='1') array_push($SitEcoEmerAplicaTelefono,true);
            if($ou->CampoNombre=='SitEcoEmerAplicaCelular' && $ou->VisibleForms=='1') array_push($SitEcoEmerAplicaCelular,true);
            if($ou->CampoNombre=='SitEcoCortoPlazo' && $ou->VisibleForms=='1') array_push($SitEcoCortoPlazo,true);
            if($ou->CampoNombre=='SitEcoMedianoPlazo' && $ou->VisibleForms=='1') array_push($SitEcoMedianoPlazo,true);
            if($ou->CampoNombre=='SitEcoLargoPlazo' && $ou->VisibleForms=='1') array_push($SitEcoLargoPlazo,true);
            if($ou->CampoNombre=='SitEcoPrincipalesPrincipales' && $ou->VisibleForms=='1') array_push($SitEcoPrincipalesPrincipales,true);
            if($ou->CampoNombre=='SitEcoIngMenDescripcion' && $ou->VisibleForms=='1') array_push($SitEcoIngMenDescripcion,true);
            if($ou->CampoNombre=='SitEcoIngMenTipo' && $ou->VisibleForms=='1') array_push($SitEcoIngMenTipo,true);
            if($ou->CampoNombre=='SitEcoIngMenMonto' && $ou->VisibleForms=='1') array_push($SitEcoIngMenMonto,true);
            if($ou->CampoNombre=='SitEcoIngMenAplica' && $ou->VisibleForms=='1') array_push($SitEcoIngMenAplica,true);
            if($ou->CampoNombre=='SitEcoAutoMarca' && $ou->VisibleForms=='1') array_push($SitEcoAutoMarca,true);
            if($ou->CampoNombre=='SitEcoBienesraices' && $ou->VisibleForms=='1') array_push($SitEcoBienesraices,true);
            if($ou->CampoNombre=='SitEcoUbicacion' && $ou->VisibleForms=='1') array_push($SitEcoUbicacion,true);
            if($ou->CampoNombre=='SitEcoCreditos' && $ou->VisibleForms=='1') array_push($SitEcoCreditos,true);
            if($ou->CampoNombre=='SitEcoCreditosMontoTotal' && $ou->VisibleForms=='1') array_push($SitEcoCreditosMontoTotal,true);
            if($ou->CampoNombre=='SitEcoInversionAhorro' && $ou->VisibleForms=='1') array_push($SitEcoInversionAhorro,true);
            if($ou->CampoNombre=='SitEcoInversionAhorroMonto' && $ou->VisibleForms=='1') array_push($SitEcoInversionAhorroMonto,true);
            if($ou->CampoNombre=='SitEcoAdeudo' && $ou->VisibleForms=='1') array_push($SitEcoAdeudo,true);
            if($ou->CampoNombre=='SitEcoAduedoMonto' && $ou->VisibleForms=='1') array_push($SitEcoAduedoMonto,true);
            if($ou->CampoNombre=='SitEcoAvalNombres' && $ou->VisibleForms=='1') array_push($SitEcoAvalNombres,true);
            if($ou->CampoNombre=='SitEcoCreditoAutomotriz' && $ou->VisibleForms=='1') array_push($SitEcoCreditoAutomotriz,true);
            if($ou->CampoNombre=='SitEcocreditosAdeudos' && $ou->VisibleForms=='1') array_push($SitEcocreditosAdeudos,true);
            if($ou->CampoNombre=='SitEcoComentarios' && $ou->VisibleForms=='1') array_push($SitEcoComentarios,true);
            if($ou->CampoNombre=='SitEcoDepPadres' && $ou->VisibleForms=='1') array_push($SitEcoDepPadres,true);
            if($ou->CampoNombre=='SitEcoDepPadresPorcentaje' && $ou->VisibleForms=='1') array_push($SitEcoDepPadresPorcentaje,true);
            if($ou->CampoNombre=='SitEcoDepTrabajaActualmente' && $ou->VisibleForms=='1') array_push($SitEcoDepTrabajaActualmente,true);
            if($ou->CampoNombre=='SitEcoDepTieneDependientes' && $ou->VisibleForms=='1') array_push($SitEcoDepTieneDependientes,true);
            if($ou->CampoNombre=='SitEcoDepDependientes' && $ou->VisibleForms=='1') array_push($SitEcoDepDependientes,true);
            if($ou->CampoNombre=='SitEcoCuentaConBeca' && $ou->VisibleForms=='1') array_push($SitEcoCuentaConBeca,true);
            if($ou->CampoNombre=='SitEcoDescripcionBecas' && $ou->VisibleForms=='1') array_push($SitEcoDescripcionBecas,true);
            if($ou->CampoNombre=='SitEcoProgramaSocial' && $ou->VisibleForms=='1') array_push($SitEcoProgramaSocial,true);
            if($ou->CampoNombre=='SitEcoProgramaSocialNombres' && $ou->VisibleForms=='1') array_push($SitEcoProgramaSocialNombres,true);
            if($ou->CampoNombre=='SitEcoDepTrabajaActualmenteHor' && $ou->VisibleForms=='1') array_push($SitEcoDepTrabajaActualmenteHor,true);
            if($ou->CampoNombre=='SitEcoDatoFamiliarObserGen' && $ou->VisibleForms=='1') array_push($SitEcoDatoFamiliarObserGen,true);
            if($ou->CampoNombre=='SitEcoLaViviendaEs' && $ou->VisibleForms=='1') array_push($SitEcoLaViviendaEs,true);
            if($ou->CampoNombre=='SitEcoObservaciones' && $ou->VisibleForms=='1') array_push($SitEcoObservaciones,true);
            if($ou->CampoNombre=='ViviendaTipoLuz' && $ou->VisibleForms=='1') array_push($ViviendaTipoLuz,true);
            if($ou->CampoNombre=='ViviendaTipoAgua' && $ou->VisibleForms=='1') array_push($ViviendaTipoAgua,true);
            if($ou->CampoNombre=='ViviendaTipoGas' && $ou->VisibleForms=='1') array_push($ViviendaTipoGas,true);
            if($ou->CampoNombre=='ViviendaTipoDrenaje' && $ou->VisibleForms=='1') array_push($ViviendaTipoDrenaje,true);
            if($ou->CampoNombre=='ViviendaTipoHabitantes' && $ou->VisibleForms=='1') array_push($ViviendaTipoHabitantes,true);
            if($ou->CampoNombre=='ViviendaTipoTipoCasa' && $ou->VisibleForms=='1') array_push($ViviendaTipoTipoCasa,true);
            if($ou->CampoNombre=='ViviendaTipoDescripcionExterio' && $ou->VisibleForms=='1') array_push($ViviendaTipoDescripcionExterio,true);
            if($ou->CampoNombre=='ViviendaTipoCalidadMobiliario' && $ou->VisibleForms=='1') array_push($ViviendaTipoCalidadMobiliario,true);
            if($ou->CampoNombre=='ViviendaTipoCalidadLimpieza' && $ou->VisibleForms=='1') array_push($ViviendaTipoCalidadLimpieza,true);
            if($ou->CampoNombre=='ViviendaTipoCalidadOrden' && $ou->VisibleForms=='1') array_push($ViviendaTipoCalidadOrden,true);
            if($ou->CampoNombre=='ViviendaTipoCalidadGeneral' && $ou->VisibleForms=='1') array_push($ViviendaTipoCalidadGeneral,true);
            if($ou->CampoNombre=='ViviendaTipoMaterialCasa' && $ou->VisibleForms=='1') array_push($ViviendaTipoMaterialCasa,true);
            if($ou->CampoNombre=='ViviendaTipoNivelSocioeconomic' && $ou->VisibleForms=='1') array_push($ViviendaTipoNivelSocioeconomic,true);
            if($ou->CampoNombre=='SitEcoEgreMenAlimentacion' && $ou->VisibleForms=='1') array_push($SitEcoEgreMenAlimentacion,true);
            if($ou->CampoNombre=='SitEcoEgreMenServicios' && $ou->VisibleForms=='1') array_push($SitEcoEgreMenServicios,true);
            if($ou->CampoNombre=='SitEcoEgreMenCreditos' && $ou->VisibleForms=='1') array_push($SitEcoEgreMenCreditos,true);
            if($ou->CampoNombre=='SitEcoEgreMenGastos' && $ou->VisibleForms=='1') array_push($SitEcoEgreMenGastos,true);
            if($ou->CampoNombre=='SitEcoEgreMenDiversiones' && $ou->VisibleForms=='1') array_push($SitEcoEgreMenDiversiones,true);
            if($ou->CampoNombre=='SitEcoEgreMenOtros' && $ou->VisibleForms=='1') array_push($SitEcoEgreMenOtros,true);
            if($ou->CampoNombre=='SitEcoEgreMenDeficitSolventa' && $ou->VisibleForms=='1') array_push($SitEcoEgreMenDeficitSolventa,true);
            if($ou->CampoNombre=='SitEcoEgreMenTipo' && $ou->VisibleForms=='1') array_push($SitEcoEgreMenTipo,true);
            if($ou->CampoNombre=='SitEcoEgreMenTipoMonto' && $ou->VisibleForms=='1') array_push($SitEcoEgreMenTipoMonto,true);
            if($ou->CampoNombre=='SitEcoEgreMenEconomia' && $ou->VisibleForms=='1') array_push($SitEcoEgreMenEconomia,true);

        }
    
        $RefPerAplica = array(false);
        $RefPerNombre = array(false);
        $RefPerTiempoConocer = array(false);
        $RefPerTelefono = array(false);
        $RefPerRelacion = array(false);
        $RefPerComentarios = array(false);
        $RefPerResumen = array(false);
        $AntLeg=array(false);
        $AntLegDescripcion=array(false);
        $AntLegAlgunaVezFueDetenido=array(false);
        $LaboFamiliar=array(false);
        $LaboFamiliarNombre=array(false);
        $LaboFamiliarPuesto=array(false);
        $LaboEnteroVacante=array(false);
        $LaboDesicionCambioLaboral=array(false);
        $LaboDisponibilidadViajar=array(false);
        $LaboDisponibilidadViajarMotivo=array(false);
        $LaboDisponibiliddadCambiarRes=array(false);
        $LaboDisponibiliddadCambiarResM=array(false);
        $LaboFechaIntegracion=array(false);
        $Aviso_de_privacidad =array(false);
        $CroquisImagen=array(false);
        $CroquisTiempo=array(false);
        $CroquisMedioTransporte=array(false);
        $FotoDomicilioExterior=array(false);
        $FotoDomicilioInterior=array(false);
        $FotoCandidato=array(false);
        $TrayecLaboralRazonSocial=array(false);
        $TrayecLaboralTelOficina=array(false);
        $TrayecLaboralEmail=array(false);
        $TrayecLaboralGiro=array(false);
        $TrayecLaboralCelularJefe=array(false);
        $TrayecLaboralDireccion=array(false);
        $TrayecLaboralTuestoInicial=array(false);
        $TrayecLaboralTalarioInicial=array(false);
        $TrayecLaboralIngreso=array(false);
        $TrayecLaboralTltimoPuesto=array(false);
        $TrayecLaboralTalarioFinal=array(false);
        $TrayecLaboralEgreso=array(false);
        $TrayecLaboralTefeInmediato=array(false);
        $TrayecLaboralPuestoJefeInmed=array(false);
        $TrayecLaboralPrincipalesFunci=array(false);
        $TrayecLaboralTipo_de_contrato=array(false);
        $TrayecLaboralCuentaConPrestamo=array(false);
        $TrayecLaboralPertenecioSindica=array(false);
        $TrayecLaboralCualSindicato=array(false);
        $TrayecLaboralMotivoSeparacion=array(false);
        $TrayecLaboralCausa=array(false);
        $TrayecLaboralSeriaRecontratabl=array(false);
        $TrayecLaboralCriHonradez=array(false);
        $TrayecLaboralCriCalidadTrabajo=array(false);
        $TrayecLaboralCriRelacionSuperi=array(false);
        $TrayecLaboralCriRelacionCompan=array(false);
        $TrayecLaboralCriProductividad=array(false);
        $TrayecLaboralCriIniciativa=array(false);
        $TrayecLaboralCriPuntualidad=array(false);
        $TrayecLaboralCriResponsabilida=array(false);
        $TrayecLaboralObservaciones=array(false);
        $TrayecLaboralnformo=array(false);
        $TrayecLaboralPuestoEvaluaDes=array(false);
        $TrayecLaboralNombreEmpresa=array(false);
        $TrayecLaboralEmpleoActual=array(false);
        $TrayecLaboralAplica=array(false);
        $AplicaEmpresaTelefono=array(false);
        $AplicaEmpresaCelular=array(false);
        $TrayecLaboralEXT=array(false);


        foreach($resultActual as $ou){
            if($ou->CampoNombre=='RRefPerResumen' && $ou->VisibleForms=='1') array_push($RefPerResumen,true);
            if($ou->CampoNombre=='TrayecLaboralRazonSocial' && $ou->VisibleForms=='1') array_push($TrayecLaboralRazonSocial,true);
            if($ou->CampoNombre=='TrayecLaboralTelOficina' && $ou->VisibleForms=='1') array_push($TrayecLaboralTelOficina,true);
            if($ou->CampoNombre=='TrayecLaboralEmail' && $ou->VisibleForms=='1') array_push($TrayecLaboralEmail,true);
            if($ou->CampoNombre=='TrayecLaboralGiro' && $ou->VisibleForms=='1') array_push($TrayecLaboralGiro,true);
            if($ou->CampoNombre=='TrayecLaboralCelularJefe' && $ou->VisibleForms=='1') array_push($TrayecLaboralCelularJefe,true);
            if($ou->CampoNombre=='TrayecLaboralDireccion' && $ou->VisibleForms=='1') array_push($TrayecLaboralDireccion,true);
            if($ou->CampoNombre=='TrayecLaboralTuestoInicial' && $ou->VisibleForms=='1') array_push($TrayecLaboralTuestoInicial,true);
            if($ou->CampoNombre=='TrayecLaboralTalarioInicial' && $ou->VisibleForms=='1') array_push($TrayecLaboralTalarioInicial,true);
            if($ou->CampoNombre=='TrayecLaboralIngreso' && $ou->VisibleForms=='1') array_push($TrayecLaboralIngreso,true);
            if($ou->CampoNombre=='TrayecLaboralTltimoPuesto' && $ou->VisibleForms=='1') array_push($TrayecLaboralTltimoPuesto,true);
            if($ou->CampoNombre=='TrayecLaboralTalarioFinal' && $ou->VisibleForms=='1') array_push($TrayecLaboralTalarioFinal,true);
            if($ou->CampoNombre=='TrayecLaboralEgreso' && $ou->VisibleForms=='1') array_push($TrayecLaboralEgreso,true);
            if($ou->CampoNombre=='TrayecLaboralTefeInmediato' && $ou->VisibleForms=='1') array_push($TrayecLaboralTefeInmediato,true);
            if($ou->CampoNombre=='TrayecLaboralPuestoJefeInmed' && $ou->VisibleForms=='1') array_push($TrayecLaboralPuestoJefeInmed,true);
            if($ou->CampoNombre=='TrayecLaboralPrincipalesFunci' && $ou->VisibleForms=='1') array_push($TrayecLaboralPrincipalesFunci,true);
            if($ou->CampoNombre=='TrayecLaboralTipo de contrato' && $ou->VisibleForms=='1') array_push($TrayecLaboralTipo_de_contrato,true);
            if($ou->CampoNombre=='TrayecLaboralCuentaConPrestamo' && $ou->VisibleForms=='1') array_push($TrayecLaboralCuentaConPrestamo,true);
            if($ou->CampoNombre=='TrayecLaboralPertenecioSindica' && $ou->VisibleForms=='1') array_push($TrayecLaboralPertenecioSindica,true);
            if($ou->CampoNombre=='TrayecLaboralCualSindicato' && $ou->VisibleForms=='1') array_push($TrayecLaboralCualSindicato,true);
            if($ou->CampoNombre=='TrayecLaboralMotivoSeparacion' && $ou->VisibleForms=='1') array_push($TrayecLaboralMotivoSeparacion,true);
            if($ou->CampoNombre=='TrayecLaboralCausa' && $ou->VisibleForms=='1') array_push($TrayecLaboralCausa,true);
            if($ou->CampoNombre=='TrayecLaboralSeriaRecontratabl' && $ou->VisibleForms=='1') array_push($TrayecLaboralSeriaRecontratabl,true);
            if($ou->CampoNombre=='TrayecLaboralCriHonradez' && $ou->VisibleForms=='1') array_push($TrayecLaboralCriHonradez,true);
            if($ou->CampoNombre=='TrayecLaboralCriCalidadTrabajo' && $ou->VisibleForms=='1') array_push($TrayecLaboralCriCalidadTrabajo,true);
            if($ou->CampoNombre=='TrayecLaboralCriRelacionSuperi' && $ou->VisibleForms=='1') array_push($TrayecLaboralCriRelacionSuperi,true);
            if($ou->CampoNombre=='FotoDomicilioExterior' && $ou->VisibleForms=='1') array_push($FotoDomicilioExterior,true);
            if($ou->CampoNombre=='FotoDomicilioInterior' && $ou->VisibleForms=='1') array_push($FotoDomicilioInterior,true);
            if($ou->CampoNombre=='FotoCandidato' && $ou->VisibleForms=='1') array_push($FotoCandidato,true);
            if($ou->CampoNombre=='RefPerNombre' && $ou->VisibleForms=='1') array_push($RefPerNombre,true);
            if($ou->CampoNombre=='RefPerTiempoConocer' && $ou->VisibleForms=='1') array_push($RefPerTiempoConocer,true);
            if($ou->CampoNombre=='RefPerTelefono' && $ou->VisibleForms=='1') array_push($RefPerTelefono,true);
            if($ou->CampoNombre=='RefPerRelacion' && $ou->VisibleForms=='1') array_push($RefPerRelacion,true);
            if($ou->CampoNombre=='RefPerComentarios' && $ou->VisibleForms=='1') array_push($RefPerComentarios,true);
            if($ou->CampoNombre=='RefPerAplica' && $ou->VisibleForms=='1') array_push($RefPerAplica,true);
            if($ou->CampoNombre=='AntLeg' && $ou->VisibleForms=='1') array_push($AntLeg,true);
            if($ou->CampoNombre=='AntLegDescripcion' && $ou->VisibleForms=='1') array_push($AntLegDescripcion,true);
            if($ou->CampoNombre=='AntLegAlgunaVezFueDetenido' && $ou->VisibleForms=='1') array_push($AntLegAlgunaVezFueDetenido,true);
            if($ou->CampoNombre=='LaboFamiliar' && $ou->VisibleForms=='1') array_push($LaboFamiliar,true);
            if($ou->CampoNombre=='LaboFamiliarNombre' && $ou->VisibleForms=='1') array_push($LaboFamiliarNombre,true);
            if($ou->CampoNombre=='LaboFamiliarPuesto' && $ou->VisibleForms=='1') array_push($LaboFamiliarPuesto,true);
            if($ou->CampoNombre=='LaboEnteroVacante' && $ou->VisibleForms=='1') array_push($LaboEnteroVacante,true);
            if($ou->CampoNombre=='LaboDesicionCambioLaboral' && $ou->VisibleForms=='1') array_push($LaboDesicionCambioLaboral,true);
            if($ou->CampoNombre=='LaboDisponibilidadViajar' && $ou->VisibleForms=='1') array_push($LaboDisponibilidadViajar,true);
            if($ou->CampoNombre=='LaboDisponibilidadViajarMotivo' && $ou->VisibleForms=='1') array_push($LaboDisponibilidadViajarMotivo,true);
            if($ou->CampoNombre=='LaboDisponibiliddadCambiarRes' && $ou->VisibleForms=='1') array_push($LaboDisponibiliddadCambiarRes,true);
            if($ou->CampoNombre=='LaboDisponibiliddadCambiarResM' && $ou->VisibleForms=='1') array_push($LaboDisponibiliddadCambiarResM,true);
            if($ou->CampoNombre=='LaboFechaIntegracion' && $ou->VisibleForms=='1') array_push($LaboFechaIntegracion,true);
            if($ou->CampoNombre=='Avisodeprivacidad' && $ou->VisibleForms=='1') array_push($Aviso_de_privacidad,true);
            if($ou->CampoNombre=='CroquisImagen' && $ou->VisibleForms=='1') array_push($CroquisImagen,true);
            if($ou->CampoNombre=='CroquisTiempo' && $ou->VisibleForms=='1') array_push($CroquisTiempo,true);
            if($ou->CampoNombre=='CroquisMedioTransporte' && $ou->VisibleForms=='1') array_push($CroquisMedioTransporte,true);
            if($ou->CampoNombre=='TrayecLaboralCriRelacionCompan' && $ou->VisibleForms=='1') array_push($TrayecLaboralCriRelacionCompan,true);
            if($ou->CampoNombre=='TrayecLaboralCriProductividad' && $ou->VisibleForms=='1') array_push($TrayecLaboralCriProductividad,true);
            if($ou->CampoNombre=='TrayecLaboralCriIniciativa' && $ou->VisibleForms=='1') array_push($TrayecLaboralCriIniciativa,true);
            if($ou->CampoNombre=='TrayecLaboralCriPuntualidad' && $ou->VisibleForms=='1') array_push($TrayecLaboralCriPuntualidad,true);
            if($ou->CampoNombre=='TrayecLaboralCriResponsabilida' && $ou->VisibleForms=='1') array_push($TrayecLaboralCriResponsabilida,true);
            if($ou->CampoNombre=='TrayecLaboralObservaciones' && $ou->VisibleForms=='1') array_push($TrayecLaboralObservaciones,true);
            if($ou->CampoNombre=='TrayecLaboralnformo' && $ou->VisibleForms=='1') array_push($TrayecLaboralnformo,true);
            if($ou->CampoNombre=='TrayecLaboralPuestoEvaluaDes' && $ou->VisibleForms=='1') array_push($TrayecLaboralPuestoEvaluaDes,true);
            if($ou->CampoNombre=='TrayecLaboralNombreEmpresa' && $ou->VisibleForms=='1') array_push($TrayecLaboralNombreEmpresa,true);
            if($ou->CampoNombre=='TrayecLaboralEmpleoActual' && $ou->VisibleForms=='1') array_push($TrayecLaboralEmpleoActual,true);
            if($ou->CampoNombre=='TrayecLaboralAplica' && $ou->VisibleForms=='1') array_push($TrayecLaboralAplica,true);
            if($ou->CampoNombre=='AplicaEmpresaTelefono' && $ou->VisibleForms=='1') array_push($AplicaEmpresaTelefono,true);
            if($ou->CampoNombre=='AplicaEmpresaCelular' && $ou->VisibleForms=='1') array_push($AplicaEmpresaCelular,true);
            if($ou->CampoNombre=='TrayecLaboralEXT' && $ou->VisibleForms=='1') array_push($TrayecLaboralEXT,true);
        }


        

    

        $pdf = PDF::loadView('ESE.pdf.plantilla',[
            'RefPerResumen'=>$RefPerResumen,
            "TrayecLaboralCriRelacionCompan"=>$TrayecLaboralCriRelacionCompan,
            "TrayecLaboralCriProductividad"=>$TrayecLaboralCriProductividad,
            "TrayecLaboralCriIniciativa"=>$TrayecLaboralCriIniciativa,
            "TrayecLaboralCriPuntualidad"=>$TrayecLaboralCriPuntualidad,
            "TrayecLaboralCriResponsabilida"=>$TrayecLaboralCriResponsabilida,
            "TrayecLaboralObservaciones"=>$TrayecLaboralObservaciones,
            "TrayecLaboralnformo"=>$TrayecLaboralnformo,
            "TrayecLaboralPuestoEvaluaDes"=>$TrayecLaboralPuestoEvaluaDes,
            "TrayecLaboralNombreEmpresa"=>$TrayecLaboralNombreEmpresa,
            "TrayecLaboralEmpleoActual"=>$TrayecLaboralEmpleoActual,
            "TrayecLaboralAplica"=>$TrayecLaboralAplica,
            "AplicaEmpresaTelefono"=>$AplicaEmpresaTelefono,
            "AplicaEmpresaCelular"=>$AplicaEmpresaCelular,
            "TrayecLaboralEXT"=>$TrayecLaboralEXT,
            "TrayecLaboralRazonSocial"=>$TrayecLaboralRazonSocial,
            "TrayecLaboralTelOficina"=>$TrayecLaboralTelOficina,
            "TrayecLaboralEmail"=>$TrayecLaboralEmail,
            "TrayecLaboralGiro"=>$TrayecLaboralGiro,
            "TrayecLaboralCelularJefe"=>$TrayecLaboralCelularJefe,
            "TrayecLaboralDireccion"=>$TrayecLaboralDireccion,
            "TrayecLaboralTuestoInicial"=>$TrayecLaboralTuestoInicial,
            "TrayecLaboralTalarioInicial"=>$TrayecLaboralTalarioInicial,
            "TrayecLaboralIngreso"=>$TrayecLaboralIngreso,
            "TrayecLaboralTltimoPuesto"=>$TrayecLaboralTltimoPuesto,
            "TrayecLaboralTalarioFinal"=>$TrayecLaboralTalarioFinal,
            "TrayecLaboralEgreso"=>$TrayecLaboralEgreso,
            "TrayecLaboralTefeInmediato"=>$TrayecLaboralTefeInmediato,
            "TrayecLaboralPuestoJefeInmed"=>$TrayecLaboralPuestoJefeInmed,
            "TrayecLaboralPrincipalesFunci"=>$TrayecLaboralPrincipalesFunci,
            "TrayecLaboralTipo_de_contrato"=>$TrayecLaboralTipo_de_contrato,
            "TrayecLaboralCuentaConPrestamo"=>$TrayecLaboralCuentaConPrestamo,
            "TrayecLaboralPertenecioSindica"=>$TrayecLaboralPertenecioSindica,
            "TrayecLaboralCualSindicato"=>$TrayecLaboralCualSindicato,
            "TrayecLaboralMotivoSeparacion"=>$TrayecLaboralMotivoSeparacion,
            "TrayecLaboralCausa"=>$TrayecLaboralCausa,
            "TrayecLaboralSeriaRecontratabl"=>$TrayecLaboralSeriaRecontratabl,
            "TrayecLaboralCriHonradez"=>$TrayecLaboralCriHonradez,
            "TrayecLaboralCriCalidadTrabajo"=>$TrayecLaboralCriCalidadTrabajo,
            "TrayecLaboralCriRelacionSuperi"=>$TrayecLaboralCriRelacionSuperi,

            "FotoDomicilioExterior"=>$FotoDomicilioExterior,
            "FotoDomicilioInterior"=>$FotoDomicilioInterior,
            "FotoCandidato"=>$FotoCandidato,
            "CroquisImagen"=>$CroquisImagen,
            "CroquisTiempo"=>$CroquisTiempo,
            "CroquisMedioTransporte"=>$CroquisMedioTransporte,
            "AntLeg"=>$AntLeg,
            "AntLegDescripcion"=>$AntLegDescripcion,
            "AntLegAlgunaVezFueDetenido"=>$AntLegAlgunaVezFueDetenido,
            "LaboFamiliar"=>$LaboFamiliar,
            "LaboFamiliarNombre"=>$LaboFamiliarNombre,
            "LaboFamiliarPuesto"=>$LaboFamiliarPuesto,
            "LaboEnteroVacante"=>$LaboEnteroVacante,
            "LaboDesicionCambioLaboral"=>$LaboDesicionCambioLaboral,
            "LaboDisponibilidadViajar"=>$LaboDisponibilidadViajar,
            "LaboDisponibilidadViajarMotivo"=>$LaboDisponibilidadViajarMotivo,
            "LaboDisponibiliddadCambiarRes"=>$LaboDisponibiliddadCambiarRes,
            "LaboDisponibiliddadCambiarResM"=>$LaboDisponibiliddadCambiarResM,
            "LaboFechaIntegracion"=>$LaboFechaIntegracion,
            "SitEcoDepTieneDependientes"=>$SitEcoDepTieneDependientes,
            "SitEcoDepDependientes"=>$SitEcoDepDependientes,
            "SitEcoCuentaConBeca"=>$SitEcoCuentaConBeca,
            "SitEcoDescripcionBecas"=>$SitEcoDescripcionBecas,
            "SitEcoProgramaSocial"=>$SitEcoProgramaSocial,
            "SitEcoProgramaSocialNombres"=>$SitEcoProgramaSocialNombres,
            "SitEcoDepTrabajaActualmenteHor"=>$SitEcoDepTrabajaActualmenteHor,
            "SitEcoDatoFamiliarObserGen"=>$SitEcoDatoFamiliarObserGen,
            "SitEcoLaViviendaEs"=>$SitEcoLaViviendaEs,
            "SitEcoObservaciones"=>$SitEcoObservaciones,
            "ViviendaTipoLuz"=>$ViviendaTipoLuz,
            "ViviendaTipoAgua"=>$ViviendaTipoAgua,
            "ViviendaTipoGas"=>$ViviendaTipoGas,
            "ViviendaTipoDrenaje"=>$ViviendaTipoDrenaje,
            "ViviendaTipoHabitantes"=>$ViviendaTipoHabitantes,
            "ViviendaTipoTipoCasa"=>$ViviendaTipoTipoCasa,
            "ViviendaTipoDescripcionExterio"=>$ViviendaTipoDescripcionExterio,
            "ViviendaTipoCalidadMobiliario"=>$ViviendaTipoCalidadMobiliario,
            "ViviendaTipoCalidadLimpieza"=>$ViviendaTipoCalidadLimpieza,
            "ViviendaTipoCalidadOrden"=>$ViviendaTipoCalidadOrden,
            "ViviendaTipoCalidadGeneral"=>$ViviendaTipoCalidadGeneral,
            "ViviendaTipoMaterialCasa"=>$ViviendaTipoMaterialCasa,
            "ViviendaTipoNivelSocioeconomic"=>$ViviendaTipoNivelSocioeconomic,
            "SitEcoEgreMenAlimentacion"=>$SitEcoEgreMenAlimentacion,
            "SitEcoEgreMenServicios"=>$SitEcoEgreMenServicios,
            "SitEcoEgreMenCreditos"=>$SitEcoEgreMenCreditos,
            "SitEcoEgreMenGastos"=>$SitEcoEgreMenGastos,
            "SitEcoEgreMenDiversiones"=>$SitEcoEgreMenDiversiones,
            "SitEcoEgreMenOtros"=>$SitEcoEgreMenOtros,
            "SitEcoEgreMenDeficitSolventa"=>$SitEcoEgreMenDeficitSolventa,
            "SitEcoEgreMenTipo"=>$SitEcoEgreMenTipo,
            "SitEcoEgreMenTipoMonto"=>$SitEcoEgreMenTipoMonto,
            "SitEcoEgreMenEconomia"=>$SitEcoEgreMenEconomia,
            "SitEcoEmerAplicaCelular"=>$SitEcoEmerAplicaCelular,
            "SitEcoCortoPlazo"=>$SitEcoCortoPlazo,
            "SitEcoMedianoPlazo"=>$SitEcoMedianoPlazo,
            "SitEcoLargoPlazo"=>$SitEcoLargoPlazo,
            "SitEcoPrincipalesPrincipales"=>$SitEcoPrincipalesPrincipales,
            "SitEcoIngMenDescripcion"=>$SitEcoIngMenDescripcion,
            "SitEcoIngMenTipo"=>$SitEcoIngMenTipo,
            "SitEcoIngMenMonto"=>$SitEcoIngMenMonto,
            "SitEcoIngMenAplica"=>$SitEcoIngMenAplica,
            "SitEcoAutoMarca"=>$SitEcoAutoMarca,
            "SitEcoBienesraices"=>$SitEcoBienesraices,
            "SitEcoUbicacion"=>$SitEcoUbicacion,
            "SitEcoCreditos"=>$SitEcoCreditos,
            "SitEcoCreditosMontoTotal"=>$SitEcoCreditosMontoTotal,
            "SitEcoInversionAhorro"=>$SitEcoInversionAhorro,
            "SitEcoInversionAhorroMonto"=>$SitEcoInversionAhorroMonto,
            "SitEcoAdeudo"=>$SitEcoAdeudo,
            "SitEcoAduedoMonto"=>$SitEcoAduedoMonto,
            "SitEcoAvalNombres"=>$SitEcoAvalNombres,
            "SitEcoCreditoAutomotriz"=>$SitEcoCreditoAutomotriz,
            "SitEcocreditosAdeudos"=>$SitEcocreditosAdeudos,
            "SitEcoComentarios"=>$SitEcoComentarios,
            "SitEcoDepPadres"=>$SitEcoDepPadres,
            "SitEcoDepPadresPorcentaje"=>$SitEcoDepPadresPorcentaje,
            "SitEcoDepTrabajaActualmente"=>$SitEcoDepTrabajaActualmente,
            "SitEcoDatoFamiliarNombre"=>$SitEcoDatoFamiliarNombre,
            "SitEcoDatoFamiliarParentesco"=>$SitEcoDatoFamiliarParentesco,
            "SitEcoDatoFamiliarEdad"=>$SitEcoDatoFamiliarEdad,
            "SitEcoDaboFamiliarEstadoCivil"=>$SitEcoDaboFamiliarEstadoCivil,
            "SitEcoDatoFamiliarOcupacion"=>$SitEcoDatoFamiliarOcupacion,
            "SitEcoDatoFamiliarEmpresa"=>$SitEcoDatoFamiliarEmpresa,
            "SitEcoDatoFamiliarDireccion"=>$SitEcoDatoFamiliarDireccion,
            "SitEcoDatoFamiliarAporta"=>$SitEcoDatoFamiliarAporta,
            "SitEcoDatoFamiliarIngresoMensu"=>$SitEcoDatoFamiliarIngresoMensu,
            "SitEcoDatoFamiliarDependeCandi"=>$SitEcoDatoFamiliarDependeCandi,
            "SitEcoDatoFamiliarAplica"=>$SitEcoDatoFamiliarAplica,
            "SitEcoDatoMedEnfermedadCro"=>$SitEcoDatoMedEnfermedadCro,
            "SitEcoDatoMedEnfermedadCroNomb"=>$SitEcoDatoMedEnfermedadCroNomb,
            "SitEcoDatoMedTratamientoMed"=>$SitEcoDatoMedTratamientoMed,
            "SitEcoDatoMedTratamientoMedNom"=>$SitEcoDatoMedTratamientoMedNom,
            "SitEcoDatoMedAlergico"=>$SitEcoDatoMedAlergico,
            "SitEcoDatoMedAlergiaNombre"=>$SitEcoDatoMedAlergiaNombre,
            "SitEcoDatoMedControlado"=>$SitEcoDatoMedControlado,
            "SitEcoDatoMedControladoNombre"=>$SitEcoDatoMedControladoNombre,
            "SitEcoEmerNombre"=>$SitEcoEmerNombre,
            "SitEcoEmerCelular"=>$SitEcoEmerCelular,
            "SitEcoEmerRelacion"=>$SitEcoEmerRelacion,
            "SitEcoEmerNombreTelefonoFijo"=>$SitEcoEmerNombreTelefonoFijo,
            "SitEcoEmerTipoSangre"=>$SitEcoEmerTipoSangre,
            "SitEcoEmerAplicaTelefono"=>$SitEcoEmerAplicaTelefono,
            "EscolaridadIdiomaNombre"=>$EscolaridadIdiomaNombre,
            "EscolaridadIdiomaNivel"=>$EscolaridadIdiomaNivel,
            "EscolaridadIdiomaComprobante"=>$EscolaridadIdiomaComprobante,
            "EscolaridadIdioma"=>$EscolaridadIdioma,
            "EscolaridadObservaciones"=>$EscolaridadObservaciones,
            "EscolaridadUltimoGrado"=>$EscolaridadUltimoGrado,
            "EscolaridadInstitucion"=>$EscolaridadInstitucion,
            "EscolaridadDomicilio"=>$EscolaridadDomicilio,
            "EscolaridadPeriodo"=>$EscolaridadPeriodo,
            "EscolaridadAnios"=>$EscolaridadAnios,
            "EscolaridadComprobante"=>$EscolaridadComprobante,
            "EscolaridadBeca"=>$EscolaridadBeca,
            "EscolaridadPorcentaje"=>$EscolaridadPorcentaje,
            "EscolaridadPersonaCoroborro"=>$EscolaridadPersonaCoroborro,
            "EscolaridadVerificacionInstitu"=>$EscolaridadVerificacionInstitu,
            "EscolaridadProfesion"=>$EscolaridadProfesion,
            "EscolaridadAplica"=>$EscolaridadAplica,
            "RfcEmpresa"=>$RfcEmpresa,
            "RfcArchivo"=>$RfcArchivo,
            "RfcValidacion"=>$RfcValidacion,
            "RfcAplica"=>$RfcAplica,
            "EdoCtaBanco"=>$EdoCtaBanco,
            "EdoCtaArchivo"=>$EdoCtaArchivo,
            "EdoCtaValidacion"=>$EdoCtaValidacion,
            "EdoCtaFecha"=>$EdoCtaFecha,
            "EdoCtaBanco2"=>$EdoCtaBanco2,
            "Aviso_de_privacidad"=>$Aviso_de_privacidad,
            "EdoCtaFecha2"=>$EdoCtaFecha2,
            "EdoCtaValidacion2"=>$EdoCtaValidacion2,
            "EdoCtaArchivo2"=>$EdoCtaArchivo2,
            "PasaporteNo"=>$PasaporteNo,
            "PasaporteArchivo"=>$PasaporteArchivo,
            "PasaporteValidacion"=>$PasaporteValidacion,
            "PasaporteAplica"=>$PasaporteAplica,
            "CreditoHipotecarioNum"=>$CreditoHipotecarioNum,
            "CreditoHipotecarioMonto"=>$CreditoHipotecarioMonto,
            "CreditoHipotecarioArchivo"=>$CreditoHipotecarioArchivo,
            "CreditoHipotecarioValidacion"=>$CreditoHipotecarioValidacion,
            "CreditoHipotecarioAplica"=>$CreditoHipotecarioAplica,
            "DocumentacionObservaciones"=>$DocumentacionObservaciones,
            "IncidenciaLegalesArchivo"=>$IncidenciaLegalesArchivo,
            "ArchivoActaNacimientoHijo"=>$ArchivoActaNacimientoHijo,
            "AplicaActaNacimientoHijo"=>$AplicaActaNacimientoHijo,
            "CedulaProfesionalNo"=>$CedulaProfesionalNo,
            "CedulaProfesionalValidacion"=>$CedulaProfesionalValidacion,
            "CedulaProfesionalArchivo"=>$CedulaProfesionalArchivo,
            "CedulaProfesional"=>$CedulaProfesional,
            "ImssArchivo"=>$ImssArchivo,
            "ImssValidacion"=>$ImssValidacion,
            "ImssNumAfiliacion"=>$ImssNumAfiliacion,
            "ImssAplica"=>$ImssAplica,
            "CompAguaTitula"=>$CompAguaTitula,
            "CompAguaRelacion"=>$CompAguaRelacion,
            "CompAguaFecha"=>$CompAguaFecha,
            "CompAguaPago"=>$CompAguaPago,
            "CompAguaArchivo"=>$CompAguaArchivo,
            "CompAguaValidacion"=>$CompAguaValidacion,
            "CompGasTitula"=>$CompGasTitula,
            "CompGasRelacion"=>$CompGasRelacion,
            "CompGasFecha"=>$CompGasFecha,
            "CompGasPago"=>$CompGasPago,
            "CompGasArchivo"=>$CompGasArchivo,
            "CompGasValidacion"=>$CompGasValidacion,
            "CompLuzTitula"=>$CompLuzTitula,
            "CompLuzRelacion"=>$CompLuzRelacion,
            "CompLuzFecha"=>$CompLuzFecha,
            "CompLuzPago"=>$CompLuzPago,
            "CompLuzArchivo"=>$CompLuzArchivo,
            "CompLuzValidacion"=>$CompLuzValidacion,
            "CompTelefonoTitula"=>$CompTelefonoTitula,
            "CompTelefonoRelacion"=>$CompTelefonoRelacion,
            "CompTelefonoFecha"=>$CompTelefonoFecha,
            "CompTelefonoPago"=>$CompTelefonoPago,
            "CompTelefonoArchivo"=>$CompTelefonoArchivo,
            "CompTelefonoValidacion"=>$CompTelefonoValidacion,
            "UltimoGradoGrado"=>$UltimoGradoGrado,
            "UltimoGradoArchivo"=>$UltimoGradoArchivo,
            "UltimoGradoValidacion"=>$UltimoGradoValidacion,
            "UltimoGradoProfesion"=>$UltimoGradoProfesion,
            "UltimoGradoAplica"=>$UltimoGradoAplica,
            "CreditoInfonavitMonto"=>$CreditoInfonavitMonto,
            "CreditoInfonavitNum"=>$CreditoInfonavitNum,
            "ArchivoCreditoInfonavit"=>$ArchivoCreditoInfonavit,
            "CreditoInfonavitValidacion"=>$CreditoInfonavitValidacion,
            "CreditoInfonavitAplica"=>$CreditoInfonavitAplica,
            "CreditoFonacotNum"=>$CreditoFonacotNum,
            "CreditoFonacotMonto"=>$CreditoFonacotMonto,
            "CreditoFonacotArchivo"=>$CreditoFonacotArchivo,
            "CreditofonacotValidacion"=>$CreditofonacotValidacion,
            "CreditoFonacotAplica"=>$CreditoFonacotAplica,
            "NoActaMatrimonio"=>$NoActaMatrimonio,
            "AnioActaMatrimonio"=>$AnioActaMatrimonio,
            "FojaActaMatrimonio"=>$FojaActaMatrimonio,
            "LibroActaMatrimonio"=>$LibroActaMatrimonio,
            "ValidacionActaMatrimonio"=>$ValidacionActaMatrimonio,
            "ArchivoActaMatrimonio"=>$ArchivoActaMatrimonio,
            "AplicaActaMatrimonio"=>$AplicaActaMatrimonio,
            "NoActaNacimientoConyugue"=>$NoActaNacimientoConyugue,
            "AnioActaNacimientoConyugue"=>$AnioActaNacimientoConyugue,
            "FojaActaNacimientoConyugue"=>$FojaActaNacimientoConyugue,
            "LibroActaNacimientoConyugue"=>$LibroActaNacimientoConyugue,
            "ValidacionActaNacimientoConyug"=>$ValidacionActaNacimientoConyug,
            "ArchivoActaNacimientoConyugue"=>$ArchivoActaNacimientoConyugue,
            "AplicaActaNacimientoConyugue"=>$AplicaActaNacimientoConyugue,
            "NoActaNacimientoHijo"=>$NoActaNacimientoHijo,
            "AnioNacimientoHijo"=>$AnioNacimientoHijo,
            "FojaActaNacimientoHijo"=>$FojaActaNacimientoHijo,
            "LibroNoActaNacimientoHijo"=>$LibroNoActaNacimientoHijo,
            "ValidacionActaNacimientoHijo"=>$ValidacionActaNacimientoHijo,
            "NoActaNacimiento"=>$NoActaNacimiento,
            "AnioActaNacimineto"=>$AnioActaNacimineto,
            "FojaActaNacimiento"=>$FojaActaNacimiento,
            "LibroActaNacimiento"=>$LibroActaNacimiento,
            "ValidacionActaNacimiento"=>$ValidacionActaNacimiento,
            "ArchivoActaNacimiento"=>$ArchivoActaNacimiento,
            "AplicaActaNacimineto"=>$AplicaActaNacimineto,
            "ClaveIne"=>$ClaveIne,
            "OCRIne"=>$OCRIne,
            "ValidacionIne"=>$ValidacionIne,
            "ArchivoIne"=>$ArchivoIne,
            "AplicaIne"=>$AplicaIne,
            "TipoIdentificacion"=>$TipoIdentificacion,
            "CurpONaturlizacion"=>$CurpONaturlizacion,
            "ValidaionCurp"=>$ValidaionCurp,
            "ArchivoCurp"=>$ArchivoCurp,
            "AplicaCurp"=>$AplicaCurp,
            "ServicioComDomicilio"=>$ServicioComDomicilio,
            "FechaComDomicilio"=>$FechaComDomicilio,
            "TitularComDomicilio"=>$TitularComDomicilio,
            "RelacionComDomicilio"=>$RelacionComDomicilio,
            "ValidacionComDomicilio"=>$ValidacionComDomicilio,
            "ArchivoComprobanteDom"=>$ArchivoComprobanteDom,
            "AplicaComDomicilio"=>$AplicaComDomicilio,
            "CartaRecomendacionEmpresa"=>$CartaRecomendacionEmpresa,
            "CartaRecomendacionArchivo"=>$CartaRecomendacionArchivo,
            "CartaRecomendacionValidacion"=>$CartaRecomendacionValidacion,
            "CartaRecomendacionAplica"=>$CartaRecomendacionAplica,
            "ReciboNominaEmpresa"=>$ReciboNominaEmpresa,
            "ReciboNominaArchivo"=>$ReciboNominaArchivo,
            "ReciboNominaValidacion"=>$ReciboNominaValidacion,
            "ReciboNominaFecha"=>$ReciboNominaFecha,
            "ReciboNominaAplica"=>$ReciboNominaAplica,
            "UltimoGradoEscuela"=>$UltimoGradoEscuela,
            'EdoCivil' => $EdoCivil,
            'CorreoElectronico' => $CorreoElectronico,
            'RefPerNombre' =>$RefPerNombre,
            'RefPerTiempoConocer'=> $RefPerTiempoConocer,
            'RefPerTelefono'=>$RefPerTelefono,
            'RefPerRelacion'=>$RefPerRelacion,
            'RefPerComentarios'=>$RefPerComentarios,
            'RefPerAplica'=>$RefPerAplica,
            "NombreCandidato"=>$NombreCandidato,
            "Domicilio"=>$Domicilio,
            "NumeroInteriorExterior"=>$NumeroInteriorExterior,
            "Colonia"=>$Colonia,
            "MunicipioEstado"=>$MunicipioEstado,
            "CodigoPostal"=>$CodigoPostal,
            "Celular"=>$Celular,
            "Telefono"=>$Telefono,
            "TiempoVivirDomicilio"=>$TiempoVivirDomicilio,
            "DomicilioAnterior"=>$DomicilioAnterior,
            "TiempoVivirDomicilioAnterior"=>$TiempoVivirDomicilioAnterior,
            "EntreCalles"=>$EntreCalles,
            "CorreoElectronico"=>$CorreoElectronico,
            "FechaNacimiento"=>$FechaNacimiento,
            "LugarNacimiento"=>$LugarNacimiento,
            "EdoCivil"=>$EdoCivil,
            "Nacionalidad"=>$Nacionalidad,
            "GradoParticipa"=>$GradoParticipa,
            "MotivoSolicitudBeca"=>$MotivoSolicitudBeca,
            "ViveCon"=>$ViveCon,
            "CandidatoFueraPaisSeisMeses"=>$CandidatoFueraPaisSeisMeses,
            "Edad"=>$Edad,
            "Sexo"=>$Sexo,
            "PuestoCandidato"=>$PuestoCandidato,
            "NombreEscuela"=>$NombreEscuela,
            "Nombredelabeca"=>$Nombredelabeca,
            "DatosGeneralesExtension"=>$DatosGeneralesExtension,
            "EstadoRepublica"=>$EstadoRepublica,
            "ApellidoPaternoCandidato"=>$ApellidoPaternoCandidato,
            "ApellidoMaternoCandidato"=>$ApellidoMaternoCandidato,
            "Calle"=>$Calle,
            "NombreEmpresa"=>$NombreEmpresa,
            "AplicaCelular"=>$AplicaCelular,
            "AplicaTelefono"=>$AplicaTelefono,

            'resulActual1'=>$resultActual1 ,
            'resulActual11'=>$resultActual11,
            'resulActual12'=>$resultActual12

        ]);
        return $pdf->stream();
    }


    public function UpdateCamposME(Request $request,$idP)

    {



        $ts = $request->input('arr');

        $a=count($ts);

        for($t = 0; $t < $a; $t++){



            $IdEntrada = $ts[$t];









            $clasificacion=DB::select("SELECT mee.IdEntrada, mee.Clasificacion, mee.CantidadApariciones, mee.IdAgrupador

            FROM master_ese_entrada mee WHERE mee.IdEntrada = $IdEntrada ");

            $MaxI=0;

            foreach ($clasificacion as $c) {

                $Clas = $c->Clasificacion;

                $ca=$c->CantidadApariciones;

                $agr=$c->IdAgrupador;

            }



            if($Clas == 'N/A'){



                $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_entrada WHERE IdEntrada =$IdEntrada and IdPlantilla=$idP) as Exst");



                    foreach ($queryEXST as $p) {

                        $Exst=$p->Exst;



                    }



                    if(($Exst==0) ){



                        for($j=0;$j<$ca;$j++){

                            $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $IdEntrada ");

                                foreach ($query_maxO as $c) {

                                    $MaxO = $c->MOrden;

                                }

                            $Orden= $MaxO+1;





                            $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                                array(

                                    "IdEntrada" => $IdEntrada,

                                    "IdPlantilla" => $idP,

                                    "Requerido" => 1,

                                    "Orden" => $Orden,

                                    "Indice" => $MaxI

                                    )

                                );

                                $MaxI++;



                        }

                        $j++;

                    }else{



                        $query_maxI=DB::select("Select max(Indice) as MIndice from master_ese_plantilla_entrada where IdEntrada = $IdEntrada and IdPlantilla=$idP ");

                        foreach ($query_maxI as $c) {

                            $MI = $c->MIndice;

                        }

                        $MaxI= $MI+1;



                        for($j=0;$j<$ca;$j++){

                            $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $IdEntrada");

                                foreach ($query_maxO as $c) {

                                    $MaxO = $c->MOrden;

                                }

                            $Orden= $MaxO+1;





                            $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                                array(

                                    "IdEntrada" => $IdEntrada,

                                    "IdPlantilla" => $idP,

                                    "Requerido" => 1,

                                    "Orden" => $Orden,

                                    "Indice" => $MaxI

                                    )

                                );

                                $MaxI++;



                        }

                        $j++;



                    }



            }else{



                $REntradas=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mec.Etiqueta as Contenedor ,mea.Etiqueta as Agrupador,

                mee.Clasificacion,mee.CantidadApariciones,mee.Etiqueta as Campo

                        FROM master_ese_entrada mee

                        inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

                        inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

                        WHERE mee.Clasificacion = '{$Clas}' and mee.IdAgrupador= $agr

                        ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");



                $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_entrada WHERE IdEntrada =$IdEntrada and IdPlantilla=$idP) as Exst");



                foreach ($queryEXST as $p) {

                    $Exst=$p->Exst;



                }



                if(($Exst==0) ){



                    for($j=0;$j<$ca;$j++){

                        for($i=0;$i<count($REntradas);$i++){



                            foreach($REntradas as $name){



                                $IdEntrada          = $REntradas[$i]->IdEntrada;



                                $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $IdEntrada");

                                foreach ($query_maxO as $c) {

                                            $MaxO = $c->MOrden;

                                        }

                                $Orden= $MaxO+1;





                                $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                                    array(

                                        "IdEntrada" => $IdEntrada,

                                        "IdPlantilla" => $idP,

                                        "Requerido" => 1,

                                        "Orden" => $Orden,

                                        "Indice" => $MaxI

                                        )

                                );

                                $i ++;

                            }



                        }



                        $MaxI++;



                    }

                    $j++;



                }else{



                    $query_maxI=DB::select("Select max(Indice) as MIndice

                    from master_ese_plantilla_entrada

                    Inner Join master_ese_entrada on master_ese_entrada.IdEntrada = master_ese_plantilla_entrada.IdEntrada

                    where master_ese_entrada.Clasificacion = '{$Clas}' and IdPlantilla=$idP");



                        foreach ($query_maxI as $c) {

                            $MI = $c->MIndice;

                        }

                        $MaxI= $MI+1;



                    for($j=0;$j<$ca;$j++){

                        for($i=0;$i<count($REntradas);$i++){



                            foreach($REntradas as $name){



                                $IdEntrada          = $REntradas[$i]->IdEntrada;



                                $query_maxO=DB::select("Select max(Orden) as MOrden from master_ese_plantilla_entrada where IdEntrada = $IdEntrada");

                                foreach ($query_maxO as $c) {

                                            $MaxO = $c->MOrden;

                                        }

                                $Orden= $MaxO+1;





                                $AltaEntradaPlantilla=MasterConsultas::exeSQLStatement("create_master_ese_plantilla_entrada", "UPDATE",

                                    array(

                                        "IdEntrada" => $IdEntrada,

                                        "IdPlantilla" => $idP,

                                        "Requerido" => 1,

                                        "Orden" => $Orden,

                                        "Indice" => $MaxI

                                        )

                                );

                                $i ++;

                            }



                        }



                        $MaxI++;



                    }

                    $j++;



                }

            }



        }



        // return redirect('/PlantillaGenerica')

        //         ->with(['success' => ' El registro se guardo con éxito',

        //             'type'    => 'success']);

        return response()->json($idP);

        // return response()->json($Requerido);

    }





    public function DeletePlantilla(Request $request)

    {

        $id=$request->input('datos');

        $ts = $request->input('arr');

        $a=count($ts);

        for($i = 0; $i < $a; $i++){

            $ck = $ts[$i];

            $i++;

            $IdPlantillaEntrada = $ts[$i];

            $i++;

            $Grupo = $ts[$i];

            $i++;

            $Subgrupo = $ts[$i];

            $i++;

            $Clasificacion = $ts[$i];

            $i++;

            $Campo = $ts[$i];

            $i++;

            $Requerido = $ts[$i];

            if ($Requerido=='true') {

                $Requerido=1;

            }else{

                $Requerido=0;

            }

            $i++;

            $VFr = $ts[$i];



            if ($VFr=='true') {

                $VFr=1;

            }else{

                $VFr=0;

            }

            $i++;

            $VRep = $ts[$i];

            if ($VRep=='true') {

                $VRep=1;

            }else{

                $VRep=0;

            }

            $i++;

            $VGrd = $ts[$i];

            if ($VGrd=='true') {

                $VGrd=1;

            }else{

                $VGrd=0;

            }

            $i++;

            $TemE = $ts[$i];

            if ($TemE=='true') {

                $TemE=1;

            }else{

                $TemE=0;

            }





              DB::table('master_ese_plantilla_entrada')->where('IdPlantillaEntrada', '=', $IdPlantillaEntrada)->delete();



        }







        return response()->json($id);



    }



    public function PlantillaR($id)

    {





        // $IdPlantilla = $request->IdPlantilla;

        // dd($id);

        $v= "1";$Descripcion="";



        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",

            array(

                "IdPlantillaEntrada" => '-1',

                "IdPlantilla" => $id

            )

        );



        foreach ($Plantilla as $opt) {

            $Descripcion=$opt->DescripcionPlantilla;

           }



        // $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');



        $campos=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mee.Clasificacion,

        IF(

         mee.Clasificacion<>'N/A',

         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Clasificacion, ' - ', mee.Etiqueta),

         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Etiqueta)

        )Campo



       FROM master_ese_entrada mee

      inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

      inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

      ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");



        $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');



        $tipos=DB::select('SELECT * FROM master_ese_tipos');



        return view("ESE.plantillaG.plantillagenericap",["pentrada"=>$Plantilla, "campos"=>$campos, "servicios"=>$ts, "tipos"=>$tipos, "IdPlantilla"=>$id, "VaIn"=>$v, "Descripcion"=>$Descripcion]);



    }



    public function PlantillaREdit($id)

    {





        // $IdPlantilla = $request->IdPlantilla;

        // dd($id);

        $v= "1";



        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",

            array(

                "IdPlantillaEntrada" => '-1',

                "IdPlantilla" => $id

            )

        );



        $Descripcion=" ";
        foreach ($Plantilla as $opt) {

            $Descripcion=$opt->DescripcionPlantilla;

           }

        // $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');



        $campos=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mee.Clasificacion,

        IF(

         mee.Clasificacion<>'N/A',

         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Clasificacion, ' - ', mee.Etiqueta),

         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Etiqueta)

        )Campo



       FROM master_ese_entrada mee

      inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

      inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

      ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");



        $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');



        $tipos=DB::select('SELECT * FROM master_ese_tipos');



        return view("ESE.plantillaG.plantillagedit",["pentrada"=>$Plantilla, "campos"=>$campos, "servicios"=>$ts, "tipos"=>$tipos, "IdPlantilla"=>$id, "VaIn"=>$v, "Descripcion"=>$Descripcion]);



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



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $v= "1";



        $Plantilla = MasterConsultas::exeSQL("master_ese_plantilla_entrada", "READONLY",

            array(

                "IdPlantillaEntrada" => '-1',

                "IdPlantilla" => $id

            )

        );



        if(count($Plantilla)>1){

            foreach ($Plantilla as $opt) {

                $Descripcion=$opt->DescripcionPlantilla;

               }

        }else{

            $Descripcion='';

        }













        // $c=DB::select('SELECT IdContenedor,Etiqueta FROM master_ese_contenedor');



        $campos=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mee.Clasificacion,

        IF(

         mee.Clasificacion<>'N/A',

         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Clasificacion, ' - ', mee.Etiqueta),

         CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Etiqueta)

        )Campo



        FROM master_ese_entrada mee

        inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

        inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

        ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta ");



        $ts=DB::select('SELECT IdTipoServicio,Descripcion FROM master_ese_tiposervicio');



        $tipos=DB::select('SELECT * FROM master_ese_tipos');



        // return view("ESE.plantillaG.plantillagenericap",["pentrada"=>$Plantilla, "campos"=>$campos, "servicios"=>$ts , "IdPlantilla"=>$id, "VaIn"=>$v]);

        return view("ESE.plantillaG.plantillagedit",["pentrada"=>$Plantilla, "campos"=>$campos, "servicios"=>$ts, "tipos"=>$tipos, "IdPlantilla"=>$id, "VaIn"=>$v, "Descripcion"=>$Descripcion]);



        // foreach ($TipoServicio as  $ts) {

        //     $IdTipoServicio=$ts->IdTipoServicio;

        //     $Descripcion=$ts->Descripcion;



        // }



        //       return view("ESE.catalogos.tiposservicioedit")

        //       ->with('IdTipoServicio', $IdTipoServicio)

        //       ->with('Descripcion', $Descripcion);

    }



    public function llenartabla()

    {



        // $campos=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mec.Etiqueta as Contenedor ,mea.Etiqueta as Agrupador,mee.Clasificacion,

        // mee.CantidadApariciones,IF(mee.Clasificacion='N/A',mee.Etiqueta,'Ver Detalle') as Campo

        //  --         IF(

        //  --          mee.Clasificacion<>'N/A',

        //  --          CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Clasificacion, ' - ', mee.Etiqueta),

        //  --          CONCAT(mec.Etiqueta, ' - ', mea.Etiqueta, ' - ', mee.Etiqueta)

        //  --         )Campo



        //          FROM master_ese_entrada mee

        //          inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

        //          inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

        //          Group By mee.Clasificacion

        //          ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta");



        ////////////////////////-------------------CAMPOS ORG-----------------//////////////////////////////////



//         $campos=DB::select(" (SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mec.Etiqueta as Contenedor ,mea.Etiqueta as Agrupador,mee.Clasificacion,

//         mee.CantidadApariciones,IF(mee.Clasificacion='N/A',mee.Etiqueta,'Ver Detalle') as Campo

//                  FROM master_ese_entrada mee

//                  inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

//                  inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

//                  Group by mea.IdAgrupador,mee.Clasificacion

//                  HAVING mee.Clasificacion <> 'N/A' ORDER BY mee.Orden desc

// )

//                 union

// (

//               SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mec.Etiqueta as Contenedor ,mea.Etiqueta as Agrupador,mee.Clasificacion,

//         mee.CantidadApariciones,IF(mee.Clasificacion='N/A',mee.Etiqueta,'Ver Detalle') as Campo

//                  FROM master_ese_entrada mee

//                  inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

//                  inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor



//                  HAVING mee.Clasificacion = 'N/A' ORDER BY mee.Orden desc

// 								 )");



////////////////////////-------------------FIN CAMPOS ORG-----------------//////////////////////////////////





$campos=DB::select(" (SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mec.Etiqueta as Contenedor ,mea.Etiqueta as Agrupador,mee.Clasificacion,

mee.CantidadApariciones,IF(mee.Clasificacion='N/A',mee.Etiqueta,'Ver Detalle') as Campo,  GROUP_CONCAT(DISTINCT mee.Etiqueta

ORDER BY mee.IdAgrupador,mee.Clasificacion

SEPARATOR ';') AS CE

         FROM master_ese_entrada mee

         inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

         inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

         Group by mea.IdAgrupador,mee.Clasificacion

         HAVING mee.Clasificacion <> 'N/A' ORDER BY mee.Orden desc

)

        union

(

      SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mec.Etiqueta as Contenedor ,mea.Etiqueta as Agrupador,mee.Clasificacion,

mee.CantidadApariciones,IF(mee.Clasificacion='N/A',mee.Etiqueta,'Ver Detalle') as Campo, '' as CE

         FROM master_ese_entrada mee

         inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

         inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor



         HAVING mee.Clasificacion = 'N/A' ORDER BY mee.Orden desc

                         )");



            return response()->json($campos);





    }



    public function llenardetalles($clasificacion,$agrupador)

    {

        $res='';

        $camposc=DB::select("SELECT mee.IdEntrada, mee.IdAgrupador, mec.IdContenedor, mec.Etiqueta as Contenedor ,mea.Etiqueta as Agrupador,

        mee.Clasificacion,mee.CantidadApariciones,mee.Etiqueta as Campo, mee.Formato,mee.Items

                FROM master_ese_entrada mee

                inner join master_ese_agrupador mea ON mee.IdAgrupador = mea.IdAgrupador

                inner join master_ese_contenedor mec ON mea.IdContenedor = mec.IdContenedor

                WHERE mee.Clasificacion = '{$clasificacion}' and mea.IdAgrupador = $agrupador and mee.Clasificacion <> 'N/A'

                ORDER BY mec.Orden, mea.Orden, mee.Clasificacion, mee.Etiqueta");



        foreach ($camposc as $opt) {

            if($opt->Formato == 'Combo' || $opt->Formato=='MatrizTexto' || $opt->Formato=='MatrizFecha'|| $opt->Formato=='MatrizNúmero'){

                $res=$res."<tr><td>$opt->Campo</td><td>$opt->Formato</td><td>$opt->Items</td></tr>";

            }else{

                    $res=$res."<tr><td>$opt->Campo</td><td>$opt->Formato</td></tr>";



            }

          }



                 return response()->json($res);



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

    //     $UpdateTipoServicio=MasterConsultas::exeSQLStatement("update_catalogo_tiposservicio", "UPDATE",

    //     array(

    //         "Descripcion" => $request->input('Descripcion'),

    //         "IdTipoServicio" => $id

    //     )

    // );





    // return redirect('/CatalogoTiposServicio')

    // ->with(['success' =>  $request->input('Descripcion') . ' se actualizó con éxito',

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

        $queryEXST = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_cliente WHERE IdPlantilla =$id) as Exst");

        foreach ($queryEXST as $p) {

            $Exst=$p->Exst;

        }



        if(($Exst==0) ){



            $queryEXSTP = DB::select("SELECT EXISTS(SELECT 1 FROM master_ese_plantilla_entrada WHERE IdPlantilla =$id) as Exst");

            foreach ($queryEXSTP as $p) {

                $ExstP=$p->Exst;

            }



            if(($ExstP==0) ){



                DB::table('master_ese_plantilla')->where('IdPlantilla', '=', $id)->delete();

                return redirect('/PlantillaGenericaP')

                    ->with(['success' => ' El registro se eliminó con éxito',

                        'type'    => 'success']);



            }else{



                $DeletePlantilla=MasterConsultas::exeSQLStatement("delete_plantilla_entrada", "UPDATE",

                array(

                    "id" => $id

                )

                );

                return redirect('/PlantillaGenericaP')

                    ->with(['success' => ' El registro se eliminó con éxito',

                        'type'    => 'success']);



            }



		}else{

            return redirect('/PlantillaGenericaP')

                ->with(['success' => ' No se puede eliminar. Existe una Plantilla Cliente Asociada.',

                    'type'    => 'success']);

        }





    }



    function GetDataPlantilla($DescripcionPlantilla,$TipoServicio){

        $result = DB::select("Select p.*, ts.Descripcion as TipoServicio, met.Tipos  

        From master_ese_plantilla as p   

        Inner Join master_ese_tiposervicio ts on ts.IdTipoServicio = p.IdTipoServicio

        LEFT JOIN master_ese_tipos met on met.IdTipos=p.IdTipos 

        Where  p.DescripcionPlantilla = '$TipoServicio' and 

        ts.Descripcion = '$DescripcionPlantilla'");

        return response()->json($result);

    }

    public function SaveDataPlantilla(Request $request){

        $guardarCambios=DB::table('master_ese_plantilla')

        ->where("IdPlantilla",$request->IdPlantilla)

        ->update([

            "DescripcionPlantilla" => $request->DescripcionPlantilla,

            "NombreArchivo" => $request->NombreArchivoH



        ]);

        return redirect('/PlantillaGenericaP')

        ->with(['success' => ' El registro se actualizo con éxito',

            'type'    => 'success']);

    }

}


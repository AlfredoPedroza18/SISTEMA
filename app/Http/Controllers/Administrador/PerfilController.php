<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use Bican\Roles\Models\Perfil as per;
use App\MasterModulos;
use App\Perfil;
use App\MasterMenu;
use DB;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$perfil = Perfil::all();
        $query="select * from master_perfiles";

        $perfil=DB::select($query);
        return view('administrador.perfil.index',['Perfil' => $perfil]);
    }
    public function getPerfil(Request $request){
                //$perfil = Perfil::all();
        $query="select * from master_perfiles";
        $perfil=DB::select($query);
        return response()->json($perfil);
    }
    public function data($idmenu){
        $data= new MasterMenuController();
        return $data->onePerfil($idmenu);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.perfil.create_perfil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = ['Perfil'=>'required'];
        $validation = Validator::make($input, $rules);

        if($validation->fails()){
		return redirect('modulo/administrador/puestos/create')
                ->with(['mensaje'  =>  'Se requiere Perfil Nómina.',
                'type'    => 'warning']);
        }else{
            // dd($request->IdModulo);
            // $tot=count($request->NombreForm);
            
            //     $Acceder = array();
            //     $Editar = array();
            //     $Eliminar = array();
            //     $Insertar = array();
            //     $Exportar = array();
            //     $Plantilla = array();
            //     $Importar = array();
            //     $Imprimir = array();

            //     $p = array_key_exists('Acceder',$_POST) ? $_POST['Acceder'] : array();
            //     for($v = 0; $v < $tot; $v++){
            //         if(array_key_exists($v,$p)){
            //             $Acceder[$v] = 'Si';
            //         }else{
            //             $Acceder[$v] = 'No';
            //         }
            //     }

            //     $p = array_key_exists('Editar',$_POST) ? $_POST['Editar'] : array();
            //     for($v = 0; $v < $tot; $v++){
            //         if(array_key_exists($v,$p)){
            //             $Editar[$v] = 'Si';
            //         }else{
            //             $Editar[$v] = 'No';
            //         }
            //     }

            //     $p = array_key_exists('Eliminar',$_POST) ? $_POST['Eliminar'] : array();
            //     for($v = 0; $v < $tot; $v++){
            //         if(array_key_exists($v,$p)){
            //             $Eliminar[$v] = 'Si';
            //         }else{
            //             $Eliminar[$v] = 'No';
            //         }
            //     }

                
            //     $p = array_key_exists('Insertar',$_POST) ? $_POST['Insertar'] : array();
            //     for($v = 0; $v < $tot; $v++){
            //         if(array_key_exists($v,$p)){
            //             $Insertar[$v] = 'Si';
            //         }else{
            //             $Insertar[$v] = 'No';
            //         }
            //     }

            //     $p = array_key_exists('Exportar',$_POST) ? $_POST['Exportar'] : array();
            //     for($v = 0; $v < $tot; $v++){
            //         if(array_key_exists($v,$p)){
            //             $Exportar[$v] = 'Si';
            //         }else{
            //             $Exportar[$v] = 'No';
            //         }
            //     }

            //     $p = array_key_exists('Plantilla',$_POST) ? $_POST['Plantilla'] : array();
            //     for($v = 0; $v < $tot; $v++){
            //         if(array_key_exists($v,$p)){
            //             $Plantilla[$v] = 'Si';
            //         }else{
            //             $Plantilla[$v] = 'No';
            //         }
            //     }

            //     $p = array_key_exists('Importar',$_POST) ? $_POST['Importar'] : array();
            //     for($v = 0; $v < $tot; $v++){
            //         if(array_key_exists($v,$p)){
            //             $Importar[$v] = 'Si';
            //         }else{
            //             $Importar[$v] = 'No';
            //         }
            //     }

            //     $p = array_key_exists('Imprimir',$_POST) ? $_POST['Imprimir'] : array();
            //     for($v = 0; $v < $tot; $v++){
            //         if(array_key_exists($v,$p)){
            //             $Imprimir[$v] = 'Si';
            //         }else{
            //             $Imprimir[$v] = 'No';
            //         }
            //     }

            //     dd($Acceder,$Editar,$Eliminar,$Insertar,$Exportar,$Plantilla,$Importar,$Imprimir);

            $perfil= new Perfil();
            $perfil->Perfil           = trim($request->Perfil);
            $perfil->EditaMontos      = trim(isset($request->EditaMontos) ? 'Si' : 'No');
            $perfil->GuardarReportes  = trim(isset($request->GuardarReportes) ? 'Si' : 'No');
            $perfil->Activo           = trim(isset($request->Activo) ? 'Si' : 'No');
            $perfil->AccesoEscritorio = 'Si';
            $perfil->save();

            $sql='';

            if($perfil){
                // dd($request->NombreForm[242]);
                // $newArrayPerfil = $request->NombreForm;
                $tot=count($request->NombreForm);
            
                $Acceder = array();
                $Editar = array();
                $Eliminar = array();
                $Insertar = array();
                $Exportar = array();
                $Plantilla = array();
                $Importar = array();
                $Imprimir = array();

                $p = array_key_exists('Acceder',$_POST) ? $_POST['Acceder'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Acceder[$v] = 'Si';
                    }else{
                        $Acceder[$v] = 'No';
                    }
                }

                $p = array_key_exists('Editar',$_POST) ? $_POST['Editar'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Editar[$v] = 'Si';
                    }else{
                        $Editar[$v] = 'No';
                    }
                }

                $p = array_key_exists('Eliminar',$_POST) ? $_POST['Eliminar'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Eliminar[$v] = 'Si';
                    }else{
                        $Eliminar[$v] = 'No';
                    }
                }

                
                $p = array_key_exists('Insertar',$_POST) ? $_POST['Insertar'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Insertar[$v] = 'Si';
                    }else{
                        $Insertar[$v] = 'No';
                    }
                }

                $p = array_key_exists('Exportar',$_POST) ? $_POST['Exportar'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Exportar[$v] = 'Si';
                    }else{
                        $Exportar[$v] = 'No';
                    }
                }

                $p = array_key_exists('Plantilla',$_POST) ? $_POST['Plantilla'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Plantilla[$v] = 'Si';
                    }else{
                        $Plantilla[$v] = 'No';
                    }
                }

                $p = array_key_exists('Importar',$_POST) ? $_POST['Importar'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Importar[$v] = 'Si';
                    }else{
                        $Importar[$v] = 'No';
                    }
                }

                $p = array_key_exists('Imprimir',$_POST) ? $_POST['Imprimir'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Imprimir[$v] = 'Si';
                    }else{
                        $Imprimir[$v] = 'No';
                    }
                }

               
                for($i=0; $i < $tot; $i++){

                    $NombreForm  = $request->NombreForm[$i];
                    $NombreGrupo = $request->NombreGrupo[$i];
                    $Caption     = $request->Caption[$i];
                    $AccederC     = $Acceder[$i];
                    $EditarC      = $Editar[$i]; 
                    $EliminarC    = $Eliminar[$i];
                    $InsertarC    = $Insertar[$i]; 
                    $ExportarC    = $Exportar[$i];
                    $PlantillaC   = $Plantilla[$i];
                    $ImportarC    = $Importar[$i];
                    $ImprimirC    = $Imprimir[$i];
                    $IdPerfil    = $perfil->IdPerfil;
                    $IdUsuario   = 0;
                
                    
                    if($tot == $i){
                        $sql.="('{$NombreForm}', '{$NombreGrupo}', '{$Caption}', '{$AccederC}', '{$InsertarC}', '{$EditarC}', '{$EliminarC}', '{$ExportarC}', '{$PlantillaC}', '{$ImportarC}', '{$ImprimirC}', $IdPerfil, $IdUsuario)";
                    }else if($i == $tot-1){
                            $sql.="('{$NombreForm}', '{$NombreGrupo}', '{$Caption}', '{$AccederC}', '{$InsertarC}', '{$EditarC}', '{$EliminarC}', '{$ExportarC}', '{$PlantillaC}', '{$ImportarC}', '{$ImprimirC}', $IdPerfil, $IdUsuario)";
                    }else{
                        $sql.="('{$NombreForm}', '{$NombreGrupo}', '{$Caption}', '{$AccederC}', '{$InsertarC}', '{$EditarC}', '{$EliminarC}', '{$ExportarC}', '{$PlantillaC}', '{$ImportarC}', '{$ImprimirC}', $IdPerfil, $IdUsuario), ";
                    }
                }

                $modulos=DB::insert("INSERT INTO master_modulos (NombreForm, NombreGrupo, Caption, Acceder, Insertar, Editar, Eliminar, Exportar, Plantilla, Importar, Imprimir, IdPerfil, IdUsuario) VALUES $sql;");
            }
            if($modulos){
                return redirect()
                    ->route('sig-erp-crm::modulo.administrador.puestos.index')
                    ->with(['success' => $perfil->Perfil . ' se registro con éxito',
                            'type'    => 'success']);
            }else{
                return redirect('modulo/administrador/puestos/create')
                ->with(['mensaje'  =>  'Módulos no asignados.',
                'type'    => 'warning']);
            }
            
            
        }
       
        // $permisos= array();
        // $menunomina = array();
        // $permisos = explode('||',$request->lista_perfiles); 
        // $menunomina = explode('||', $request->lista_menu_nomina);
        // $count=count($permisos);
        // $countmenu = count($menunomina);
        // $posicion=array();
        // $posicionmenu=array();
        // $index=0;
        // $index1=0;
        // $Idmenu=array();$Nombreform=array();$Nombregrupo=array();$caption=array();
        // for($i=0; $i < $count; $i++){
        //    if($permisos[$i] == '-1'){
        //        $posicion[$index]=$i;
        //        $index++;
        //    }
        // }
        // for($i=0; $i < $countmenu; $i++){
        //     if($menunomina[$i] == '-1' || $menunomina[$i] == '-2'){
        //         $posicionmenu[$index1]=$i;
        //         $index1++;
        //     }
        //  }
        //  if(count($posicion)>0){
        //     for($z=0; $z < count($posicion); $z++){
        //        unset($permisos[$posicion[$z]]);
        //     }
        //  }         

        //  if(count($posicionmenu)>0){
        //     for($m=0; $m < count($posicionmenu); $m++){
        //        unset($menunomina[$posicionmenu[$m]]);
        //     }
        //  }

        //  $newArraymenu = array_values($menunomina);
        //  $newArrayPerfil = array_values($permisos);

        //  $index3=0;
        //  for($n=0; $n < count($newArraymenu); $n++){
        //     $result=$this->data($newArraymenu[$n]);
        //     foreach($result as $v){
        //         $Idmenu[$index3]=$v->Idmenu;
        //         $Nombreform[$index3]=$v->Nombreform;
        //         $Nombregrupo[$index3]=$v->Nombregrupo;
        //         $caption[$index3]=$v->caption;
        //         $index3++;
        //     }                
        //  } 
        //  for($b=0; $b< count($newArrayPerfil); $b++){
        //     for($r=0;$r< count($Nombreform);$r++){
        //             $mastermodulo = new MasterModulos(array(
        //                 'IdModulo'=>0,
        //                 'NombreForm'=>$Nombreform[$r],
        //                 'NombreGrupo'=>$Nombregrupo[$r],
        //                 'Caption'=>$caption[$r],
        //                 'Acceder'=>'-',
        //                 'Editar'=>'-',
        //                 'Eliminar'=>'-',
        //                 'Insertar'=>'-',
        //                 'Exportar'=>'-',
        //                 'Plantilla'=>'-',
        //                 'Importar'=>'-',
        //                 'Imprimir'=>'-',
        //                 'IdPerfil'=>$newArrayPerfil[$b],
        //                 'IdUsuario'=>0)
        //                         );
        //             $mastermodulo->save();          
        //         } 
        //  }
       
        // return redirect('modulo/administrador/puestos/create')->with('status','Los datos se guardarón con exito !');
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
        $masterperfiles = DB::table('master_perfiles')->where('IdPerfil',$id)->get();
        if($masterperfiles){
           
           
        
            $lista_permisos_usuario[] = '';

            $modulos = DB::select("Select * From master_modulos Where IdPerfil = $id");
           
            foreach($masterperfiles as $m){
                $PerfilN=$m->Perfil;
                $Activo=$m->Activo;
                $EditaMontos=$m->EditaMontos;
                $GuardarReportes=$m->GuardarReportes;
            }

            return view('administrador.puestos.edit_puesto_p',[
                'perfil'             => $masterperfiles,
                'permisos_asignados' => $lista_permisos_usuario,
                'idusuario'          => $id,
                'perfil'             => $id,
                'modulos'            => $modulos,
                'perfilN'            => $PerfilN,
                'modo'               => 'edicion',
                'Activo'             => $Activo,
                'EditaMontos'        => $EditaMontos,
                'GuardarReportes'    => $GuardarReportes,
            ]);
        }
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
        $input = $request->all();
        $rules = ['Perfil' => 'required:master_perfiles,Perfil,'.$request->Perfil.',Perfil'];
        $validation = Validator::make($input, $rules);

        if($validation->fails()){
            return redirect('modulo/administrador/puestos/'.$id.'/edit')
                ->with(['warning' => ' Se requiere Perfil Nómina.',
                'type'    => 'warning']);
		
        }else{
            $tot=count($request->NombreForm);
            // dd($tot);
            
            $newArrayPerfil = $request->NombreForm;
            // dd($newArrayPerfil);
            $perfil =  Perfil::find($id);

            $perfil->Perfil           = trim($request->Perfil);
            $perfil->EditaMontos      = trim(isset($request->EditaMontos) ? 'Si' : 'No');
            $perfil->GuardarReportes  = trim(isset($request->GuardarReportes) ? 'Si' : 'No');
            $perfil->Activo           = trim(isset($request->Activo) ? 'Si' : 'No');
            $perfil->AccesoEscritorio = 'Si';
            $perfil->save();

            // return redirect()
            //         ->route('sig-erp-crm::modulo.administrador.puestos.index')
            //        ;

            if($perfil){
                $tot=count($request->NombreForm);
                $IdModulo= array();
                $Acceder = array();
                $Editar = array();
                $Eliminar = array();
                $Insertar = array();
                $Exportar = array();
                $Plantilla = array();
                $Importar = array();
                $Imprimir = array();
                
                $modulos = DB::select("Select * From master_modulos Where IdPerfil = $id");
           
                foreach($modulos as $m){
                    $IdModulo[]=$m->IdModulo;
                }

                // dd($IdModulo);

                $p = array_key_exists('Acceder',$_POST) ? $_POST['Acceder'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Acceder[$v] = 'Si';
                    }else{
                        $Acceder[$v] = 'No';
                    }
                }

                $p = array_key_exists('Editar',$_POST) ? $_POST['Editar'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Editar[$v] = 'Si';
                    }else{
                        $Editar[$v] = 'No';
                    }
                }

                $p = array_key_exists('Eliminar',$_POST) ? $_POST['Eliminar'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Eliminar[$v] = 'Si';
                    }else{
                        $Eliminar[$v] = 'No';
                    }
                }

                
                $p = array_key_exists('Insertar',$_POST) ? $_POST['Insertar'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Insertar[$v] = 'Si';
                    }else{
                        $Insertar[$v] = 'No';
                    }
                }

                $p = array_key_exists('Exportar',$_POST) ? $_POST['Exportar'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Exportar[$v] = 'Si';
                    }else{
                        $Exportar[$v] = 'No';
                    }
                }

                $p = array_key_exists('Plantilla',$_POST) ? $_POST['Plantilla'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Plantilla[$v] = 'Si';
                    }else{
                        $Plantilla[$v] = 'No';
                    }
                }

                $p = array_key_exists('Importar',$_POST) ? $_POST['Importar'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Importar[$v] = 'Si';
                    }else{
                        $Importar[$v] = 'No';
                    }
                }

                $p = array_key_exists('Imprimir',$_POST) ? $_POST['Imprimir'] : array();
                for($v = 0; $v < $tot; $v++){
                    if(array_key_exists($v,$p)){
                        $Imprimir[$v] = 'Si';
                    }else{
                        $Imprimir[$v] = 'No';
                    }
                }


                for($i=0; $i < $tot; $i++){
                    $IdModuloC    = $IdModulo[$i];
                    $NombreForm  = $request->NombreForm[$i];
                    $NombreGrupo = $request->NombreGrupo[$i];
                    $Caption     = $request->Caption[$i];
                    $AccederC     = $Acceder[$i];
                    $EditarC      = $Editar[$i]; 
                    $EliminarC    = $Eliminar[$i];
                    $InsertarC    = $Insertar[$i]; 
                    $ExportarC    = $Exportar[$i];
                    $PlantillaC   = $Plantilla[$i];
                    $ImportarC    = $Importar[$i];
                    $ImprimirC    = $Imprimir[$i];
                    $IdPerfil    = $perfil->IdPerfil;
                    $IdUsuario   = 0;
                    // $IdModulo    = $request->IdModulo[$i];
                    // $NombreForm  = $request->NombreForm[$i];
                    // $NombreGrupo = $request->NombreGrupo[$i];
                    // $Caption     = $request->Caption[$i];
                    // $Acceder     = isset($request->Acceder[$i]) ? 'Si' : 'No';
                    // $Editar      = isset($request->Editar[$i]) ? 'Si' : 'No';
                    // $Eliminar    = isset($request->Eliminar[$i]) ? 'Si' : 'No';
                    // $Insertar    = isset($request->Insertar[$i]) ? 'Si' : 'No';
                    // $Exportar    = isset($request->Exportar[$i]) ? 'Si' : 'No';
                    // $Plantilla   = isset($request->Plantilla[$i]) ? 'Si' : 'No';
                    // $Importar    = isset($request->Importar[$i]) ? 'Si' : 'No';
                    // $Imprimir    = isset($request->Imprimir[$i]) ? 'Si' : 'No';
                    // $IdPerfil    = $perfil->IdPerfil;
                    // $IdUsuario   = 0;
                
                    DB::update("update master_modulos set Acceder='{$AccederC}', 
                    Editar='{$EditarC}',
                    Eliminar='{$EliminarC}',
                    Insertar='{$InsertarC}',
                    Exportar='{$ExportarC}',
                    Plantilla='{$PlantillaC}',
                    Importar='{$ImportarC}',
                    Imprimir='{$ImprimirC}'
                    where  IdPerfil='{$IdPerfil}' and IdModulo='{$IdModuloC}'");
                   
                }

                return redirect()
                    ->route('sig-erp-crm::modulo.administrador.puestos.index')
                    ->with(['success' => $perfil->Perfil . ' se actualizó con éxito',
                            'type'    => 'success']);
            }
           
                return redirect('modulo/administrador/perfil/'.$id.'/edit')
                ->with(['mensaje'  =>  'Módulos no asignados.',
                'type'    => 'warning']);
            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perfil       = Perfil::find($id);
        $modulos  = DB::select('SELECT users.*
        FROM master_perfiles
        INNER JOIN users ON master_perfiles.IdPerfil = users.IdPerfil  where master_perfiles.IdPerfil = ?',[$id]);


        if( $perfil ){


            $usuarios = count($modulos);


            if( $usuarios > 0){
                return redirect()
                        ->route('sig-erp-crm::modulo.administrador.puestos.index')
                        ->with(['success' => $perfil->Perfil .' NO se puede eliminar tiene '. $usuarios .' registro(s) asociado(s)',
                                'type'    => 'warning']);

	        }else{

                DB::table('master_modulos')->where('IdPerfil', '=', $perfil->IdPerfil)->delete();
	            $perfil->delete();
	            return redirect()
	                ->route('sig-erp-crm::modulo.administrador.puestos.index')
	                ->with(['success' => ' El registro se eliminó con éxito',
	                        'type'    => 'success']);
	        }



        }else{
            return redirect()
                    ->route('sig-erp-crm::modulo.administrador.puestos.index')
                    ->with(['success' => $perfil->Perfil.' No se puede eliminar, verifique el perfil nómina',
                            'type'    => 'warning']);
        }
    }
}

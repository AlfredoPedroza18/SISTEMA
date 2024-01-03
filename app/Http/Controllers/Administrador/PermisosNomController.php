<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bican\Roles\Models\Role as Puesto;

use DB;



class PermisosNomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $roles=DB::select('select u.*,
          (select Perfil from master_perfiles where IdPerfil = u.IdPerfil ) as Perfil
          from users as u ');

        return view('administrador.nomina.index',['roles' => $roles]);
    }

    public function edit($id){

            $puesto = DB::table('users')->where('Id',$id)->first();
            $perfil = DB::table('master_perfiles')->get();
            $empresa = DB::table('master_empresa')->get();
            $permisos = DB::select("select * from master_empresa_usuario where Activo = 'Si' and IdUsuario = $id");

            $Idperfil=[];
            foreach($perfil as $p){
                $Idperfil[$p->IdPerfil]=$p->Perfil;
            }
            $permiso=[];$c=0;
            foreach($permisos as $p){ $c++;
                $permiso[$c]=$p->IdEmpresa;
            }

            return view('administrador.nomina.edit_permiso',
                ['puesto' => $puesto,'IdPerfil'=>$Idperfil,'empresa'=>$empresa, 'permiso'=>$permiso]);



    }
    public function editESE($id){

        $puesto = DB::table('users')->where('Id',$id)->first();
        $perfil = DB::table('master_perfiles')->get();
        $empresa = DB::table('master_empresa')->get();
        $permisos = DB::select("select * from master_empresa_usuario where Activo = 'Si' and IdUsuario = $id");
        $rolUser = DB::select("SELECT u.id,u.IdRol,
                                IF(u.IdRol = 98,'Analista',
                                IF(u.IdRol = 105,'Lider','Otro rol')
                                ) as rol
                                FROM users u WHERE u.id = $id");

        foreach($rolUser as $r){
            $rolUser = $r->rol;
            $rolF = $r->IdRol;
        }
        $Idperfil=[];
        foreach($perfil as $p){
            $Idperfil[$p->IdPerfil]=$p->Perfil;
        }
        $permiso=[];$c=0;
        foreach($permisos as $p){ $c++;
            $permiso[$c]=$p->IdEmpresa;
        }

        
        $puestoR   = Puesto::find($rolF);
        $lista_permisos_usuario = [];

             foreach ($puestoR->permissions as $permiso_asignado) {
                $lista_permisos_usuario[] = $permiso_asignado->id;
            }
            
        //    dd($lista_permisos_usuario);                
                           
                      
        

        return view('administrador.ESE.edit_permiso',
            ['puesto' => $puesto,
            'IdPerfil'=>$Idperfil,
            'empresa'=>$empresa,
            'permisos_asignados' => $lista_permisos_usuario,
            'permiso'=>$permiso,
            'roluser' => $rolUser]);



    }


    public function save(Request $dat){
      $id = $dat->input('id');
      $Perfil = $dat->input('Perfil');
      $modulo = ($dat->input('modulos') == 'on')?'Si':'No';
      $pass = ($dat->input('pass') == 'on')?'Si':'No';
      $nom = ($dat->input('nom') == 'on')?'Si':'No';
      $users = ($dat->input('users') == 'on')?'Si':'No';
      $editable = ($dat->input('editable') == 'on')?'Si':'No';

      $permiso = DB::table('users')->where('id',$id)->update(
        array('IdPerfil'=>$Perfil,
        'PermisoModuloConexiones'=>$modulo,
        'CambiarContrasena'=>$pass,
        'ModificarNombre'=>$nom,
        'ModificarOtrosUsuarios'=>$users,
        'Editable'=>$editable));

        $empresa = DB::select("select IdEmpresa from master_empresa");
        $permisos = DB::select("select IdEmpresa from master_empresa_usuario where IdUsuario = $id");
        $permiso=[];$c=0;
        foreach($permisos as $p){ $c++;
            $permiso[$c]=$p->IdEmpresa;
        }

        foreach ($empresa as $e) {
            $emp = 'empresa'.$e->IdEmpresa;
            $val = ($dat->input($emp) == 'on')?'Si':'No';

          if(in_array($e->IdEmpresa, $permiso)){
            DB::table('master_empresa_usuario')->where('IdEmpresa',$e->IdEmpresa)->update(
              array('Activo'=>$val));
          }else{
            DB::table('master_empresa_usuario')->insert(
              array('IdEmpresa'=>$e->IdEmpresa,
              'IdUsuario'=>$id,
              'Activo'=>$val));
          }
          $val='';
        }

        return redirect()->action('Administrador\PermisosNomController@index')->with('status','Registro actualizado con exito');
    }

}

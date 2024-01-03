<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bican\Roles\Models\Role as Puesto;
use Bican\Roles\Models\Permission as Permisos;
use App\Http\Requests\PuestoRequest as PuestoValidacion;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;

use DB;



class PuestoController extends Controller
{

    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Puesto::all();
        
        return view('administrador.puestos.index',['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos          = Permisos::all();
        $lista_permisos[0] =  'Listado de permisos';
        unset($lista_permisos[0]);

        
        //Genera el array con los permisos
        return view('administrador.puestos.create_puesto',['permisos' => $permisos,'lista_permisos'     => $permisos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PuestoValidacion $request)
    {   
        $puesto   = Puesto::create($request->all());
        $permisos = explode('||',$request->permisos); 
        $longitud = count($permisos);

        if($puesto){

            if(count($permisos)){
                for($i=0; $i < $longitud; $i++) {   
                    if( !in_array( $permisos[$i],[-1,-2,'root_1'] ) ){
                        $puesto->attachPermission($permisos[$i]); 
                    }
                }
                
            }



            $modulo         = Modulo::where('slug','administrador')->get();
            $submodulo      = SubModulo::where('slug','administrador.puestos')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $puesto->id,
                                        "descripcion"   => "Alta Puesto: " . $puesto->name . ". Permisos: " . $this->getPermisos($puesto)]);

            
            

            return redirect()
                    ->route('sig-erp-crm::modulo.administrador.puestos.index')
                    ->with(['success' => $puesto->name . ' se registro con éxito',
                            'type'    => 'success']);          
        }

        return redirect()
                    ->route('sig-erp-crm::modulo.administrador.puestos.index')
                    ->with(['success' => ' No registrado con éxito',
                            'type'    => 'warning']);          

        
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
        $puesto   = Puesto::find($id);


        if($puesto){
            $permisos               = Permisos::all();
            $lista_permisos[0]      =  'Listado de permisos';
            $lista_permisos_usuario = []; 

            unset($lista_permisos[0]);
            //Genera el array con los permisos
            foreach ($permisos as $permiso ) {
                $lista_permisos[] = $permiso->name;
            }
            
            foreach ($puesto->permissions as $permiso_asignado) {
                $lista_permisos_usuario[] = $permiso_asignado->id;
            }
            
            return view('administrador.puestos.edit_puesto',[
                            'puesto'             => $puesto,
                            'permisos'           => $permisos,
                            'lista_permisos'     => $permisos,
                            'permisos_asignados' => $lista_permisos_usuario
                        ]);
        }


        //Se mostrara mensaje de error si el usuario no se encuentra
        return view('errors.503');
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
        $puesto =  Puesto::find($id);
        if($puesto){
            $permisos = explode('||',$request->permisos);
            $longitud = count($permisos);            

            if($longitud){
                $puesto->detachAllPermissions();
                for($i=0; $i < $longitud; $i++) {
                    if( !in_array( $permisos[$i],[-1,-2,'root_1'] ) ){
                        $puesto->attachPermission($permisos[$i]);                        
                    }
                }                
            }
            

            $puesto->update($request->all());


            $modulo         = Modulo::where('slug','administrador')->get();
            $submodulo      = SubModulo::where('slug','administrador.puestos')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $puesto->id,
                                        "descripcion"   => "Actualización Puesto: " . $puesto->name . ". Permisos: " . $this->getPermisos($puesto)]);

            return redirect()
                  ->route('sig-erp-crm::modulo.administrador.puestos.index')
                  ->with(['success' => $puesto->name . ' se actulizó con éxito',
                          'type'    => 'success']);  
        }

        return redirect()
                    ->route('sig-erp-crm::modulo.administrador.puestos.index')
                    ->with(['success' => ' registro no encontrado',
                            'type'    => 'warning']); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $puesto       = Puesto::find($id);
        $roles_users  = DB::select('  SELECT role_user.* 
                                FROM roles 
                                INNER JOIN role_user ON role_user.role_id = roles.id  where roles.id = ?',[$id]);

        
        if( $puesto ){

        	
            $usuarios = count($roles_users);


            if( $usuarios > 0){
                return redirect()
                        ->route('sig-erp-crm::modulo.administrador.puestos.index')
                        ->with(['success' => $puesto->name .' NO sepuede eliminar tiene '. $usuarios .' Usuario(s) asociado(s)',
                                'type'    => 'warning']);
            
	        }else{


                $modulo         = Modulo::where('slug','administrador')->get();
                $submodulo      = SubModulo::where('slug','administrador.puestos')->get();
                $accion_kardex  = Accion::where('slug','alta')->get();

                $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                            "id_usuario"    => $request->user()->id,
                                            "id_modulo"     => $modulo[0]->id,
                                            "id_submodulo"  => $submodulo[0]->id,
                                            "id_accion"     => $accion_kardex[0]->id,
                                            "id_objeto"     => $puesto->id,
                                            "descripcion"   => "Eliminación Puesto: " . $puesto->name]);

	            $puesto->delete();
	            return redirect()
	                ->route('sig-erp-crm::modulo.administrador.puestos.index')
	                ->with(['success' => $puesto->name . ' se elimino con éxito',
	                        'type'    => 'success']);
	        }
            
            

        }else{
            return redirect()
                    ->route('sig-erp-crm::modulo.administrador.puestos.index')
                    ->with(['success' => $puesto->name.' No se puede eliminar, verifique el puesto',
                            'type'    => 'warning']);
        }
    }




    private function getPermisos($puesto)
    {
        $permisos = "";
        $contador = 0;
        foreach ($puesto->permissions as $permiso) {
                $permisos .= ( $contador == 0 ) ? $permiso->name . ', ' : $permiso->name . ', ' ;
            }

        return $permisos;

    }
}

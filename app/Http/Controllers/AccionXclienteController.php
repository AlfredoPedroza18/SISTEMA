<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Cliente;
use App\AccionXcliente;
use App\Administrador\Kardex;
use App\Administrador\SubModulo;
use App\Administrador\Modulo;
use App\Administrador\Accion;


class AccionXclienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $ruta='';
      $nombre='';
      $carpeta_cliente=$request->id_cliente."_".str_replace(" ","",$request->nombre_comercial);
      $anexo=$request->anexo_archivo;
      $error_size='';
      if($anexo==1){
      $file=$request->file('file_source');
     // $aleatorio=str_random(6);
      $nombre=$file->getClientOriginalName();
    //  $file->move('anexos-accionXcliente'.$request->id_cliente."_".str_replace(" ","",$request->nombre_comercial),$nombre);
      $ruta=public_path()."\\anexos-accionXcliente\\".$request->id_cliente."_".str_replace(" ","",$request->nombre_comercial);    
      //$fichero=mkdir($ruta);

            if (file_exists($ruta))
               $file->move('anexos-accionXcliente\\'.$carpeta_cliente,$nombre);
            else{
          
                mkdir($ruta);
                $file->move('anexos-accionXcliente\\'.$carpeta_cliente,$nombre);
            }




    }//end anexo
    
        $date_inicio        = new \DateTime($request->hr_inicio);
        $fecha_hr_inicio    = $date_inicio->format('Y-m-d\TH:i:s');
        $date_fin           = new \DateTime($request->hr_fin);
        $fecha_hr_fin       = $date_fin->format('Y-m-d\TH:i:s');

              
         $accionXcliente                    = AccionXcliente::create($request->all());
         $accionXcliente->ruta              = $ruta."\\".$nombre;
         $accionXcliente->nombre_archivo    = $nombre;
         $accionXcliente->carpeta_cliente   = $carpeta_cliente;
         $accionXcliente->hr_inicio         = $fecha_hr_inicio;
         $accionXcliente->hr_fin            = $fecha_hr_fin;
         $accionXcliente->save();
          if($accionXcliente){
           

            $modulo         = Modulo::where('slug','crm')->get();
            $submodulo      = SubModulo::where('slug','crm.agenda')->get();
            $accion_kardex  = Accion::where('slug','alta')->get();

            $kardex = Kardex::create([  "id_cn"         => $request->user()->idcn,
                                        "id_usuario"    => $request->user()->id,
                                        "id_modulo"     => $modulo[0]->id,
                                        "id_submodulo"  => $submodulo[0]->id,
                                        "id_accion"     => $accion_kardex[0]->id,
                                        "id_objeto"     => $accionXcliente->id,
                                        "descripcion"   => "Alta Accion X Cliente: " . $this->getActividad($request->actividad) . ", " . $request->descripcion ]);


           return redirect()->route('sig-erp-crm::accionClientes.show', ['id' => $request->id_cliente])->with('alta','success');
         //  return response()->json(['status_alta' => 'success']);
           }
           else{
         return response()->json(['status_alta' => 'wrong']);
         }

      //dd($file);
      //nombre archivo $file->getClientOriginalName();
      //extension $file->getClientOriginalExtension();
      //aplicacion a abrir $file->getMimeType();
      //tamaño $file->getSize(); $max=10*1024
      //maximo de tamaño a subir  $file->getMaxFileSize();
       //el archivo es valido  y se subio correctamente isValid();
      //tipo de error getError();
      //tipo de error getMessageError();
       //ruta move('ruta','archivos');
     // return $file->getSize();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$cliente=Cliente::find($id);// encuentra el id enviado
//query para momstrar los datos del cliente
         $query =    " SELECT ".
                    " clientes.id,".
                    " clientes.nombre_comercial,".
                    " clientes.id_user as cli_idUser,".
                    " clientes.nombre AS nombre_cliente,".
                    " clientes.df_cp AS df_cp,".
                    " clientes.df_ciudad AS df_ciudad,".
                    " clientes.df_colonia AS df_colonia,".
                    " clientes.df_calle AS df_calle,".
                    " clientes.df_num_exterior AS df_num_exterior,".
                    " clientes.df_num_interior AS df_num_interior,".
                    " clientes.dc_cp AS dc_cp,".
                    " clientes.dc_ciudad AS dc_ciudad,".
                    " clientes.dc_colonia AS dc_colonia,".
                    " clientes.dc_calle AS dc_calle,".
                    " clientes.dc_num_exterior AS dc_num_exterior,".
                    " clientes.dc_num_interior AS dc_num_interior,".
                    " clientes.medio_contacto AS medio_contacto,".
                    " tipos_clientes.nombre AS tipo_cliente,".
                    " centros_negocio.nombre AS nombre_cn,".
                    " centros_negocio.nomenclatura AS nomenclatura,".
                    " ejecutivos.nombre AS nombre_ejecutivo,".
                    'CONCAT(contactos.nombre_con," ",contactos.apellido_paterno_con," ",contactos.apellido_materno_con) as nombre_contacto, '.
                    " contactos.departamento AS departamento,".
                    " contactos.cargo AS cargo,".
                    " contactos.telefono1,".
                    " contactos.celular1,".
                    " contactos.pagina_web,".
                    " clientes.status,". 
                    " facturadoras.nombre AS empresa_facturadora". 
                    " FROM        clientes".
                    " LEFT JOIN   centros_negocio ".
                                    "ON clientes.id_cn      = centros_negocio.id  ".
                    " LEFT JOIN   ejecutivos ".
                                    " ON ejecutivos.id_cn   = centros_negocio.id ".
                                    " AND ejecutivos.id      = clientes.id_ejecutivo ". 
                    " LEFT JOIN   contactos ".
                                    " ON contactos.id_cliente = clientes.id ".
                    " LEFT JOIN   tipos_clientes ".
                                    " ON tipos_clientes.id  = clientes.tipo_cliente ".
                    " LEFT JOIN   facturadoras ".
                                    " ON facturadoras.id  = clientes.contrato_a ".

                   " WHERE clientes.id = ? ";
                   

            $cliente = DB::select($query,[$id]);

            $query1="SELECT ".
                    "kardex.id as id,".
                    "kardex.actividad as actividad,".
                    "kardex.descripcion as descripcion,".
                    "DATE_FORMAT(kardex.hr_fin,'%Y-%m-%d') as fecha_accion,".
                    "kardex.fecha_seguimiento as fecha_seguimiento,".
                    "TIMEDIFF(kardex.hr_fin,kardex.hr_inicio) as tiempo_accion,".
                    "kardex.id_cliente as id_cliente,".
                    "kardex.id_user as id_cliente,".
                    "kardex.ruta as ruta,".
                    "kardex.carpeta_cliente as carpeta_cliente,".
                    "kardex.nombre_archivo as nombre_archivo,".
                    "users.name as nombre_user,".
                    "contactos.nombre_con as nombre_contacto ".
                    "from kardex ".
                    "left join users ".
                    "on kardex.id_user=users.id ".
                    "left join clientes ".
                    "on kardex.id_cliente=clientes.id ".
                    "left join (SELECT id,id_cliente,(nombre_con) AS nombre_con,telefono1,celular1 FROM contactos   group by id_cliente) contactos ".
                    "on clientes.id=contactos.id_cliente ".
                    "where kardex.id_cliente = ? ";

             $kardex = DB::select($query1,[$id]);


// query para mostrar el kardex



       




        return view("crm.clientes.crm-accionXcliente",['cliente'=>$cliente,'kardex'=>$kardex]);



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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function downloadAnexo($carpetacliente,$pathToFile)
    {
     
        $ruta=public_path("anexos-accionXcliente\\".$carpetacliente."\\".$pathToFile);

        
        return response()->download($ruta);  
       
    }

    private function getActividad($id = 1)
    {
        $actividad = ["Otra","Llamada","Correo","Cita","Anexo"];

        return $actividad[$id];
    }

}

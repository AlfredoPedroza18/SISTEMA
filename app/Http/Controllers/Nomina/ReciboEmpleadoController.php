<?php


namespace App\Http\Controllers\Nomina;


use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReciboEmpleadoController extends Controller
{


    public function index(Request $request)
    {

      //  $personal=DB::table('master_personal')->get();
        $query=DB::select('SELECT IdEmpresa,FK_Titulo FROM master_empresa');

        $emP = DB::select('SELECT per.*,(select e.FK_Titulo from master_empresa as e where e.IdEmpresa= per.IdEmpresa) as Empresa 
                from master_personal as per');

        return view("administrador.nomina.reciboempleado",['reciboempleado'=>$emP,'empresa'=>$query]);
        
    }
    
    public function indexCliente(Request $request)
    {
        $id = Auth::user()->IdCliente;
      //  $personal=DB::table('master_personal')->get();
        $query=DB::select('SELECT em.IdEmpresa,em.FK_Titulo FROM master_empresa as em inner join master_clientes as c on(c.IdEmpresa=em.IdEmpresa) WHERE c.IdCliente =? ',[$id]);

        $emP = DB::select('SELECT per.*,(select e.FK_Titulo from master_empresa as e where e.IdEmpresa= per.IdEmpresa) as Empresa 
                from master_personal as per inner join master_clientes as c on(c.IdEmpresa=per.IdEmpresa) WHERE c.IdCliente =? ',[$id]);

        return view("administrador.nomina.reciboempleado",['reciboempleado'=>$emP,'empresa'=>$query]);
        
    }

    public function Concentrado(Request $request)
    {

      //  $personal=DB::table('master_personal')->get();

        $query=DB::select('SELECT IdEmpresa,FK_Titulo FROM master_empresa');

        $nomC = DB::select('SELECT nom.*,(select e.FK_Titulo from master_empresa as e where e.IdEmpresa= nom.IdEmpresa) as Empresa,
         (select n.FK_TituloNomina  as nomTitulo from nom_tiponomina as n where n.IdTiponomina= nom.IdTipoNomina) as TipoNomina
                from nom_nomina as nom');

        return view("administrador.nomina.detallesnominaconcentrado",['concentrado'=>$nomC,'empresa'=>$query]);
        
    }

    public function ConcentradoCliente(Request $request)
    {
        $id = Auth::user()->IdCliente;
      //  $personal=DB::table('master_personal')->get();
        $query=DB::select('SELECT em.IdEmpresa,em.FK_Titulo FROM master_empresa as em inner join master_clientes as c on(c.IdEmpresa=em.IdEmpresa) WHERE c.IdCliente =? ',[$id]);

        // $nomC = DB::select('SELECT nom.*,(select e.FK_Titulo from master_empresa as e where e.IdEmpresa= nom.IdEmpresa) as Empresa,
        // (select n.FK_TituloNomina  as nomTitulo from nom_tiponomina as n where n.IdTiponomina= nom.IdTipoNomina) as TipoNomina
        //        from nom_nomina as nom inner join master_clientes as c on(c.IdEmpresa=nom.IdEmpresa) WHERE Estado<> "Nueva" and c.IdCliente =?',[$id]);

        $nomC = DB::select('SELECT nom.*,(select e.FK_Titulo from master_empresa as e where e.IdEmpresa= nom.IdEmpresa) as Empresa,
        (select n.FK_TituloNomina  as nomTitulo from nom_tiponomina as n where n.IdTiponomina= nom.IdTipoNomina) as TipoNomina
               from nom_nomina as nom inner join master_clientes as c on(c.IdEmpresa=nom.IdEmpresa) WHERE Estado<> "Nueva" and c.IdCliente =?',[$id]);

        


        return view("administrador.nomina.detallesnominaconcentrado",['concentrado'=>$nomC,'empresa'=>$query]);
        
    }

    public function show($id)
    {
        $datos=DB::select('select p.IdPersonal,p.IdEmpresa, nom.IdNomina,nom.Titulo, nom.FechaNomina, nom.FechaTerminoNomina, nom.FechaPagoNomina, nom.Estado, nom.UsoNomina from nom_nomina as nom 
                INNER JOIN nom_nominadetalle nomd on nomd.IdNomina=nom.IdNomina 
                LEFT JOIN master_personal p on p.IdPersonal=nomd.IdPersonal
                where (p.IdPersonal=-1 or (p.IdPersonal<>-1 and p.IdPersonal=?))',[$id]);

        $nom=DB::Select('select Nombre, APaterno, AMaterno from master_personal where (IdPersonal=-1 or (IdPersonal<>-1 and IdPersonal=?))',[$id]);

    return view("administrador.nomina.detallesnomina",['detallesnomina' => $datos, 'nombre'=>$nom]);

    }

    public function showCliente($id)
    {
        $datos=DB::select('select p.IdPersonal,p.IdEmpresa, nom.IdNomina,nom.Titulo, nom.FechaNomina, nom.FechaTerminoNomina, nom.FechaPagoNomina, nom.Estado, nom.UsoNomina from nom_nomina as nom 
                INNER JOIN nom_nominadetalle nomd on nomd.IdNomina=nom.IdNomina 
                LEFT JOIN master_personal p on p.IdPersonal=nomd.IdPersonal
                where (p.IdPersonal=-1 or (p.IdPersonal<>-1 and p.IdPersonal=?))',[$id]);

        $nom=DB::Select('select Nombre, APaterno, AMaterno from master_personal where (IdPersonal=-1 or (IdPersonal<>-1 and IdPersonal=?))',[$id]);

    return view("administrador.nomina.detallesnomina",['detallesnomina' => $datos, 'nombre'=>$nom]);

    }


    public function Bempresa(Request $request){
        
        $cod = $request->input('valEmp');
        $queryS=DB::select('SELECT IdEmpresa,FK_Titulo FROM master_empresa');

        $queryB='SELECT Nombre,APaterno,AMaterno,Curp,Rfc,IdEmpresa,IdPersonal 
        FROM master_personal WHERE IdEmpresa = :empresa';

        $bem=DB::select($queryB,[$cod]);
        
        return view("administrador.nomina.empresaB",['empresaB'=>$bem,'empresa'=>$queryS]);
    }

    public function BempresaCliente(Request $request){
        
        $cod = $request->input('valEmp');
        $queryS=DB::select('SELECT IdEmpresa,FK_Titulo FROM master_empresa WHERE IdEmpresa = ?',[$cod]);

        $queryB='SELECT Nombre,APaterno,AMaterno,Curp,Rfc,IdEmpresa,IdPersonal 
        FROM master_personal WHERE IdEmpresa = :empresa';

        $bem=DB::select($queryB,[$cod]);
        
        return view("administrador.nomina.empresaB",['empresaB'=>$bem,'empresa'=>$queryS]);
    }

    public function NominaEmpresa(Request $request){
        
        $cod = $request->input('valEmp');
        $queryS=DB::select('SELECT IdEmpresa,FK_Titulo FROM master_empresa');

        $queryB='SELECT Titulo,FechaNomina,FechaTerminoNomina,FechaPagoNomina,Dias,Estado,IdNomina,IdEmpresa,
        (select e.FK_Titulo from master_empresa as e where e.IdEmpresa= nom_nomina.IdEmpresa) as Empresa,
        (select n.FK_TituloNomina  as nomTitulo from nom_tiponomina as n where n.IdTiponomina= nom_nomina.IdTipoNomina) as TipoNomina 
        FROM nom_nomina WHERE nom_nomina.IdEmpresa = :empresa';

        $bem=DB::select($queryB,[$cod]);
        
        return view("administrador.nomina.concentradoxempresa",['empresaB'=>$bem,'empresa'=>$queryS]);
    }

    public function NominaEmpresaCliente(Request $request){
        
        $cod = $request->input('valEmp');
        $queryS=DB::select('SELECT IdEmpresa,FK_Titulo FROM master_empresa WHERE IdEmpresa = ?',[$cod]);

        $queryB='SELECT Titulo,FechaNomina,FechaTerminoNomina,FechaPagoNomina,Dias,Estado,IdNomina,IdEmpresa,
        (select e.FK_Titulo from master_empresa as e where e.IdEmpresa= nom_nomina.IdEmpresa) as Empresa,
        (select n.FK_TituloNomina  as nomTitulo from nom_tiponomina as n where n.IdTiponomina= nom_nomina.IdTipoNomina) as TipoNomina 
        FROM nom_nomina WHERE nom_nomina.IdEmpresa = :empresa';

        $bem=DB::select($queryB,[$cod]);
        
        return view("administrador.nomina.concentradoxempresa",['empresaB'=>$bem,'empresa'=>$queryS]);
    }


    public function BNomEmp(){
        $id = Auth::user()->IdPersonal;
        //$id=76;
        $datos=DB::select('select p.IdPersonal,p.IdEmpresa, nom.IdNomina,nom.Titulo, nom.FechaNomina, nom.FechaTerminoNomina, nom.FechaPagoNomina, nom.Estado, nom.UsoNomina from nom_nomina as nom 
                INNER JOIN nom_nominadetalle nomd on nomd.IdNomina=nom.IdNomina 
                LEFT JOIN master_personal p on p.IdPersonal=nomd.IdPersonal
                where (p.IdPersonal=-1 or (p.IdPersonal<>-1 and p.IdPersonal=?))',[$id]);

        $nom=DB::Select('select Nombre, APaterno, AMaterno from master_personal where (IdPersonal=-1 or (IdPersonal<>-1 and IdPersonal=?))',[$id]);

        $query='select p.IdPersonal,emp.FK_Titulo
          from master_personal as p
          INNER join
          rh_contratacion as co
          on (co.IdPersonal = p.IdPersonal and  co.IdContratacion = (Select max(IdContratacion) from rh_contratacion where Idpersonal = p.Idpersonal))
          INNER join users u
          on u.IdPersonal = p.IdPersonal
          INNER join master_empresa emp
          on emp.IdEmpresa = p.IdEmpresa
          LEFT join master_ciudad ciu
          on ciu.IdCiudad = p.IdCiudad
          Where p.IdPersonal= ? ';

        /*========CP========*/
        $empleado=DB::select($query,[$id]);

        foreach ($empleado as  $Dempleado) {
           
            $empresa=$Dempleado->FK_Titulo;
            
        }
    return view("administrador.nomina.EmpleadoNomina",['detallesnomina' => $datos, 'nombre'=>$nom, 'empresa'=>$empresa]);
         
    }

    public function idpersonal(Request $request){
        $id = $request->input('valPer');
        $p1 = $request->input('p1');
        $p2 = $request->input('p2');
        $datos=DB::select('select p.IdPersonal,p.IdEmpresa, nom.IdNomina,nom.Titulo, nom.FechaNomina, nom.FechaTerminoNomina, nom.FechaPagoNomina, nom.Estado, nom.UsoNomina from nom_nomina as nom 
                INNER JOIN nom_nominadetalle nomd on nomd.IdNomina=nom.IdNomina 
                LEFT JOIN master_personal p on p.IdPersonal=nomd.IdPersonal
                where (p.IdPersonal=-1 or (p.IdPersonal<>-1 and p.IdPersonal=?))',[$id]);

        $nom=DB::Select('select Nombre, APaterno, AMaterno from master_personal where (IdPersonal=-1 or (IdPersonal<>-1 and IdPersonal=?))',[$id]);

    return view("administrador.nomina.detallesnomina",['detallesnomina' => $datos,
    'nombre'=>$nom,
    'pe1'=>$p1,'pe2'=>$p2]);

    
    }




}
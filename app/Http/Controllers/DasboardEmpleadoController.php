<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class DasboardEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->IdPersonal;
       
            $query='select p.IdPersonal,p.IdEmpresa,p.Nombre,p.Apaterno,p.Amaterno,emp.Logotipo,emp.FK_Titulo
            from master_personal as p
            INNER join
            rh_contratacion as co
            on (co.IdPersonal = p.IdPersonal and  co.IdContratacion = (Select max(IdContratacion) from rh_contratacion where Idpersonal = p.Idpersonal))
            INNER join users u
            on u.IdPersonal = p.IdPersonal
            INNER join master_empresa emp on emp.IdEmpresa = p.IdEmpresa
            LEFT join master_ciudad ciu
            on ciu.IdCiudad = p.IdCiudad
            Where p.IdPersonal= ? ';

            /*========CP========*/
            $empleado=DB::select($query,[$id]);
            $logotipo='';
            $Empresa='';
            foreach ($empleado as  $Dempleado) {
                
                $logotipo=$Dempleado->Logotipo;
                $Empresa=$Dempleado->FK_Titulo;
            }
                $b64 = base64_encode($logotipo);
                $uri = 'data:image/jpeg;base64,' . $b64;

                return view("CuentaEmpleado.dashboardempleado")
                ->with('uri',$uri)
                ->with('empresa',$Empresa);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}

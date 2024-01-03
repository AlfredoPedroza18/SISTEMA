<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $username=$request->input('username');
        $password=$request->input('password');
        $empleado_cliente=DB::table('empleados_cliente')
            ->select('Nombre')
            ->where([
                ['Username', '=', $username],
                ['Password', '=', $password]
            ])
            ->get();
        $staff=DB::table('users')
            ->select('name')
            ->where([
                ['username', '=', $username],
                ['password_aux', '=', $password]
            ])
            ->get();
        return view('login.loginusers', ['empleado_cliente'=>$empleado_cliente, 'staff'=>$staff]);
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
        $username=$request->input('username');
        $password=$request->input('password');
        $empleado_cliente=DB::table('empleados_cliente')
            ->select('Nombre')
            ->where([
                ['Username', '=', $username],
                ['Password', '=', $password]
            ])
            ->get();
        $staff=DB::table('users')
            ->select('name')
            ->where([
                ['username', '=', $username],
                ['password_aux', '=', $password]
            ])
            ->get();
        return view(['empleado_cliente'=>$empleado_cliente, 'staff'=>$staff]);
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

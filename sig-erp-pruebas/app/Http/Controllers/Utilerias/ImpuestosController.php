<?php

namespace App\Http\Controllers\Utilerias;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Utilerias\Impuesto;
use App\Http\Controllers\Controller;

class ImpuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impuestos = Impuesto::all();
        return view('utilerias.impuestos.index', compact('impuestos'));
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
        $this->validate($request, [
            'nombre' => 'required|min:3',
            'tasa' => 'required|numeric|between:0,100|integer',
        ]);

        $impuesto          = new Impuesto;
        $impuesto->id_cn   = auth()->user()->idcn;
        $impuesto->nombre  = $request->input('nombre');
        $impuesto->tasa    = $request->input('tasa');
        $impuesto->save();

        return redirect('utilerias/impuestos');

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
        $impuesto = Impuesto::find( $id );
        return response()->json( $impuesto );
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
        $impuesto = Impuesto::find( $id );

        if( $impuesto )
        {            
            $impuesto->nombre  = $request->input('nombre');
            $impuesto->tasa    = $request->input('tasa');
            $impuesto->save();
        }

        return redirect('utilerias/impuestos');


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

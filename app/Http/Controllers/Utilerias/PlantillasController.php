<?php

namespace App\Http\Controllers\Utilerias;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utilerias\Plantilla;

class PlantillasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantillas = Plantilla::all();
        return view('utilerias.plantillas-cotizacion.index')->with(['plantillas'=>$plantillas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('utilerias.plantillas-cotizacion.create_plantilla');
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
            'descripcion' => 'required',
            'logo' => 'mimes:jpg,jpeg,png'
            //dimensions:min_width=100,max_width=450,max_height=300,min_height=200

        ]);

        
        $path       = $this->createPath('company-logos');
        $pathToLogo = $this->addLogo( $request->file('logo'), $path);
        
        $plantilla = new Plantilla;
        $plantilla->id_cn = $request->user()->idcn;
        $plantilla->nombre = $request->input('nombre');
        $plantilla->descripcion = $request->input('descripcion');
        $plantilla->encabezado = $request->input('encabezado');
        $plantilla->encabezado_fondo = $request->input('encabezado_fondo');
        $plantilla->encabezado_letra = $request->input('encabezado_letra');
        $plantilla->encabezado_detalle_fondo = $request->input('encabezado_detalle_fondo');
        $plantilla->encabezado_detalle_letra = $request->input('encabezado_detalle_letra');
        $plantilla->fecha_total_fondo = $request->input('fecha_total_fondo');
        $plantilla->fecha_total_letra = $request->input('fecha_total_letra');
        $plantilla->letra_general = $request->input('letra_general');
        $plantilla->terminos = $request->input('terminos');
        $plantilla->logo = $pathToLogo;
        $plantilla->save();

        return redirect('utilerias/plantillas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     count
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
        $plantilla = Plantilla::find( $id );

        if( $plantilla )
        {
            return view('utilerias.plantillas-cotizacion.edit_plantilla', compact('plantilla'));
        }

        return back();
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
        $this->validate($request, [
            'logo' => 'mimes:jpg,jpeg,png'
            //dimensions:min_width=100,max_width=450,max_height=300,min_height=200

        ]);
        $plantilla = Plantilla::find( $id );
        if( $plantilla )
        {
            if( $request->hasFile('logo') )
            {
                $path       = $this->createPath('company-logos');
                $pathToLogo = $this->addLogo( $request->file('logo'), $path);   
                $plantilla->logo = $pathToLogo;
                
            }

            $plantilla->nombre = $request->input('nombre');
            $plantilla->descripcion = $request->input('descripcion');
            $plantilla->encabezado = $request->input('encabezado');
            $plantilla->encabezado_fondo = $request->input('encabezado_fondo');
            $plantilla->encabezado_letra = $request->input('encabezado_letra');
            $plantilla->encabezado_detalle_fondo = $request->input('encabezado_detalle_fondo');
            $plantilla->encabezado_detalle_letra = $request->input('encabezado_detalle_letra');
            $plantilla->fecha_total_fondo = $request->input('fecha_total_fondo');
            $plantilla->fecha_total_letra = $request->input('fecha_total_letra');
            $plantilla->letra_general = $request->input('letra_general');
            $plantilla->terminos = $request->input('terminos');            
            $plantilla->save();
        }

        return redirect('/utilerias/plantillas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plantilla = Plantilla::find( $id );
        if( $plantilla )
        {
            $plantilla->status = 0;
            $plantilla->save();
        }

        return redirect('/utilerias/plantillas');
    }

    public function duplicateTemplate( Request $request )
    {
        $plantilla = Plantilla::find( $request->input('id_template') );

        if( $plantilla )
        {
            $copy_template = new Plantilla;
            $copy_template->id_cn = $request->user()->idcn;
            $copy_template->nombre = $request->has('nombre_plantilla') ? $request->input('nombre_plantilla') : $plantilla->nombre . ' (copiado para ' . $request->user()->name . ') ';
            $copy_template->descripcion = $plantilla->descripcion;
            $copy_template->encabezado = $plantilla->encabezado;
            $copy_template->encabezado_fondo = $plantilla->encabezado_fondo;
            $copy_template->encabezado_letra = $plantilla->encabezado_letra;
            $copy_template->encabezado_detalle_fondo = $plantilla->encabezado_detalle_fondo;
            $copy_template->encabezado_detalle_letra = $plantilla->encabezado_detalle_letra;
            $copy_template->fecha_total_fondo = $plantilla->fecha_total_fondo;
            $copy_template->fecha_total_letra = $plantilla->fecha_total_letra;
            $copy_template->letra_general = $plantilla->letra_general;
            $copy_template->terminos = $plantilla->terminos;
            $copy_template->logo = $plantilla->logo;
            $copy_template->save();
        }

        return back();
    }

    protected function addLogo( $file, $path_file )
    {
        $fullPath = $path_file;
        $name_file = $file->getClientOriginalName();
        $file->move($path_file,$name_file);         
        $fullPath .= '\\'.$name_file;

        return $fullPath;

    }

    protected function createPath($ruta)
    {        
        $path = $ruta; 
        if( !file_exists($path) )
        {
            mkdir($path);            
            chmod($path,  0777);
        }

        return $path;
    }
}

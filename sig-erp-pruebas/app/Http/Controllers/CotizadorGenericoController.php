<?php

namespace App\Http\Controllers;

use PDF;
use App\Cliente;
use App\Servicio;
use App\Cotizacion;
use App\CotizacionGeneral;
use App\Utilerias\Impuesto;
use App\Utilerias\Plantilla;
use Illuminate\Http\Request;

use App\Http\Requests;

class CotizadorGenericoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes  = Cliente::clientes()->get();
        $servicios = Servicio::where("status","1")->get();
        $impuestos = Impuesto::all();
        return view("crm.cotizador.crm-cotizador-general", compact('clientes','servicios','impuestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $id )
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

        $cotizacion = new Cotizacion;
        $cotizacion->id_cn = $request->user()->idcn;
        $cotizacion->id_usuario = $request->user()->id;
        $cotizacion->id_cliente = $request->input('id-cliente');
        $cotizacion->id_servicio = CotizacionGeneral::SERVICIO;
        $cotizacion->subtotal = $request->input('subtotal-general-cotizado');
        $cotizacion->descuento = $request->input('descuento-general-cotizado');
        $cotizacion->iva_monto = $request->input('monto-impuesto-cotizado');
        $cotizacion->iva = $request->input('iva-total-general-cotizado');
        $cotizacion->total = $request->input('total-general-cotizado');
        $cotizacion->porcentaje = $request->input('tiene_porcentaje');
        $cotizacion->save();

        $list_detail = [];
        foreach ( $request->input('cotizacion-detail') as $item ) 
        {

            $detail = new CotizacionGeneral;
            $detail->id_producto = $item['id_service'];
            $detail->cantidad = $item['quantity'];
            $detail->costo_unitario = $item['price'];
            $detail->subtotal = $item['subtotal'];
            $detail->iva = $item['iva'];
            $detail->total = $item['total'];

            $list_detail[] = $detail;

        }

        $cotizacion->generales()->saveMany( $list_detail );

        return back();


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

    public function downloadCotizacionGenerica( Request $request )
    {
        /*$colorHeader = '#aefaca';
        $encabezadoPadding = '20px 0px;';
        $pdf = PDF::loadView('crm.cotizador.pdf_cotizaciones.pdf-generico', compact('colorHeader','encabezadoPadding') );
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('reclutamiento-seleccion.pdf');*/


        $cotizacion = Cotizacion::find( $request->input('id_cotizacion') );
        $plantilla  = Plantilla::find( $request->input('id_plantilla') );
        
        if( $cotizacion && $plantilla )
        {
            $colorHeader = '#aefaca';
            $encabezadoPadding = '20px 0px;';
            return view('crm.cotizador.pdf_cotizaciones.pdf-generico', compact('colorHeader','encabezadoPadding','cotizacion','plantilla') );    
        }

        return back();        
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Factura;

use App\Cliente;
use App\Articulo;
use App\User;
class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas=Factura::all();

        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $articulos = Articulo::all();
        $factura = Factura::latest('id')->first();
        $fecha = date("Y-m-d");
        return view('facturas.create',compact('clientes','articulos','factura','fecha'));
    }

    public function store1(Request $request){

        $codigos = $request->codArticulo;
        $unidades = $request->cantidad;

        $i=0;


        foreach($codigos as $c){
           $arti = Articulo::find($c);

          $arti->cantidad = intval($arti->cantidad) - intval($request->cantidad);
          $i++;
          $arti->save(); 
        }
        
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        
        $detalle = array();
   

        $factura = new Factura;

        $factura->fill([
            'ptoVenta' => $request->ptoVenta,
            'numFactura' => $request->numFactura,
            'cuit' => $request->cuit,
            'fecha' => $request->fecha,
            'total' => $request->total,
            'subTotal' => 2700,
            'cliente_id' => 1,
            'user_id' => $request->user_id,
        ])->save();
    
        $ultimo = $factura->id;
        
      
        $factura = Factura::find($ultimo);
        
        
        $datos = $request->codArticulo;

        foreach($datos as $key => $value){
            $detalle[$value] = array(
                'cantidad'=>$request->cantidad[$key],
                'medida'=>'unidad',
                'precioUnitario'=>$request->precioUnitario[$key],
                'subTotal'=>$request->subTotal[$key]);
                            
        }
       
      
      
        $factura->articulos()->attach($detalle);

        $codigos = $request->codArticulo;
        $unidades = $request->cantidad;

        $i=0;


        foreach($codigos as $c){
           $arti = Articulo::find($c);
            

          $arti->cantidad = intval($arti->cantidad) - intval($unidades[$i]);
          $i++;
          $arti->save(); 
        }

        
        
       
   

    return redirect('facturas');

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

<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::join('bodegas', 'bodegas.id', '=', 'productos.id_bodega')
        ->select('bodegas.nombre as nombreBodega', 'productos.id as id', 'productos.nombre as nombre', 'productos.descripcion as descripcion', 'productos.estado as estado')->get();

        return response()->json($productos, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bodegas = Bodega::all();
        
        return response()->json($bodegas, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = Producto::create($request->post());

        return response()->json($producto, 200);
    }

    public function edit(Producto $producto)
    {
        $bodegas = Bodega::all();
        
        return response()->json([
            'bodegas' => $bodegas,
            'producto' => $producto
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->post());

        return response()->json($producto, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return response()->json($producto, 200);
    }

    public function buscar(Request $request) {

        $productos = Producto::where('nombre', $request->post('dato'))->get();
        return response()->json($productos, 200);
    }

    public function filtro(Request $request) {
        if($request->post('filtro') == 'todos'){
            $productos = Producto::join('bodegas', 'bodegas.id', '=', 'productos.id_bodega')
            ->select('bodegas.nombre as nombreBodega', 'productos.id as id', 'productos.nombre as nombre', 'productos.descripcion as descripcion', 'productos.estado as estado')->get();
        } else {
            $productos = Producto::join('bodegas', 'bodegas.id', '=', 'productos.id_bodega')
            ->select('bodegas.nombre as nombreBodega', 'productos.id as id', 'productos.nombre as nombre', 'productos.descripcion as descripcion', 'productos.estado as estado')->where('estado', $request->post('filtro'))->get();
        }

        return response()->json($productos, 200);
    }
}

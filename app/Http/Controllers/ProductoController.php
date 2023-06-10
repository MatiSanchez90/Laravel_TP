<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['productos'] = Producto:: paginate(5);
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.crearproducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Categoria'=>'required|string|max:100',
            'Precio'=>'required|numeric|max:10000000',
            'Descripcion'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);


       //$datosProducto = request()->all();
       $datosProducto = request()->except('_token');
       Producto::insert($datosProducto);
       return response()->json($datosProducto);
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto:: findOrFail($id);
        return view('producto.editarproducto', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosProducto = request()->except(['_token','_method']);
        Producto:: where('id','=',$id)->update($datosProducto);
       
        $producto = Producto:: findOrFail($id);
        return view('producto.editarproducto', compact('producto'));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect('producto');
    }
}

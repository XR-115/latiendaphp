<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
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
        echo "Aquí va la lista de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //SELECCIONAR MARCAS:
        $marcas = Marca::all();
        //SELECCIONAR CATEGORIAS:
        $categorias = Categoria::all();
        //MOSTRAR LA VISTA CON LAS MARCAS
        return view('productos.new')
            ->with('categorias',$categorias)
            ->with('marcas', $marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ACCERDER DATOS FORM
    //    echo "<pre>"; 
    //    var_dump($request->all());
    //    echo "</pre>";

        //CREAR OBJETO Uploadedfile
        $archivo = $request->image;
        //CAPTURAR NOMBRE "Original" DEL ARCHIVO
        //desde el cliente
        $nombre_archivo = $archivo->getClientOriginalName();
        var_dump($nombre_archivo);
        //MOVER EL ARCHIVO A LA CARPETA "public/img"
        $ruta = public_path();
        $archivo->move("$ruta/img", $nombre_archivo);
        // var_dump($ruta);
        //REGISTRAR PRODUCTO
        $producto = new Producto;
        $producto-> nombre = $request->nombre;
        $producto-> desc = $request->description;
        $producto-> precio = $request->precio;
        $producto-> imagen = $nombre_archivo;
        $producto-> marca_id = $request->marca;
        $producto-> categoria_id = $request->categoria;
        $producto->save();
        echo "producto registrado";
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "Aquí va el detalle de producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "Aqui va el form para editar el producto con id: $producto";
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
//dependencia para validar
use Illuminate\Support\Facades\Validator;

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
        //VALIDACIÓN DE DATOS DEL FORMULARIO
        //.1.Establecer las reglas de validación
        //para la 'input data'
        $reglas = [
            "nombre" =>'required|alpha|unique:productos,nombre',
            "description" =>'required|min:10|max:20',
            "precio"=>'required|numeric',
            "image"=>'required|image',
            "marca"=>'required',
            "categoria"=>'required',

        ];

        $mensajes=[
            "required" => "Este campo es obligatorio",
            "alpha" => "Este campo es solo para letras",
            "numeric" => "Solo recibe números",
            "image" => "Debes subir una imágen",
            "min" => "Debes tener un mínimo de :min",
            "max" => "Debes tener un máximo de :max",
            
        ];

        //2.Crear objeto validador
        $validador =Validator::make($request->all(),$reglas, $mensajes);
        //3.Validar
        //fails()retorna: True si falla 
        // False si sirve uwu
        if ($validador->fails()) {
            //Validacion incorrecta
            //Mostrar la vista new 
            //llevando los errores
            return redirect('productos/create')
                ->withErrors($validador);
            //var_dump($validador->errors());
         }else{
                //Validacion correcta
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
            //Redireccionar al formulario
            //Llevando un mensaje de exito
            return redirect('productos/create')
                ->with("mensajito", "producto registrado");
            }
        
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

@extends('layouts.menu')

@section('contenido')

<div class="row">
    <h1 class="cyan-text">Nuevo producto</h1>
</div>
<div>
<div class="row">
    <form action="{{ route('productos.store') }}" 
    class="col s8" method="POST" enctype="multipart/form-data">

    @csrf

        <div class="row">
            <div class="input-field col s8">
                <input type="text" id="nombre" name="nombre" class="validate" >
                <label for="nombre">Nombre de producto</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s8">
                <textarea id="description" name="description" class="materialize-textarea"></textarea>
                <label for="description">Descripción</label>
            </div>
        </div>

        <div class="row">
            <div class="col s8 input-field">
                <input type="text" id="precio" name="precio">
                <label for="precio">Precio</label>
            </div>
        </div>

        <div class="row">
            <div class="file-field input-field col s8">
                <div class="btn">
                    <span>Imagen</span>
                    <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path" type="text" >
                </div>
            </div>
        </div>   
        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">
                    @foreach($marcas as $marca)
                    <option value="{{ $marca->id}}">{{ $marca->nombre }}</option>
                    @endforeach
                </select>
                <label>Seleccion de marca</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id}}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <label>Seleccion de categoria</label>
            </div>
        </div>
        <div class="row"> 
            <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
            <i class=" material-icons cloud_done">cloud_done</i>
  </button></div>
     

    </form>
</div>
</div>
@endsection

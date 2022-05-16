@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="cyan-text">Nuevo producto uwu</h1>
</div>
<div class="row">
    <form class="col s8" method="POST">

        <div class="row">
            <div class="input-field col s8">
                <input id="nombre" name="nombre" type="text">
                <label for="nombre">Nombre de producto</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s8">
                <textarea id="desc" name="desc" class="materialize-textarea"></textarea>
                <label for="desc">Descripción</label>
            </div>
        </div>

        <div class="row">
            <div class="col s8 input-field">
                <input type="text" id="precio" name="precio">
                <label for="precio">Precio</label>
            </div>
        </div>

        <div class="file-field input-field col s8">
            <div class="btn">
                <span>Imagen</span>
                <input type="file" name="imagen">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path" type="text" >
            </div>
        </div>
    </form>
</div>
@endsection
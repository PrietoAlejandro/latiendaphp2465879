@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="deep-orange-text text-darken-1">
        Nuevo producto
    </h1>
    </div>
        <div class="row">
    <form class='col s8' method="POST" action="">

            <div class="row">
                <div class="input-field col s8">
                    <input placeholder="Nombre producto" type="text" id="nombre" name="nombre">
                    <label for="nombre">Nombre del producto</label>
            </div>
                </div>

    <div class="row">
        <div class="input-field col s8">
        <textarea class="materialize-textarea" id="desc" name="desc"></textarea>
        <label for="desc">Descripcion</label>
        </div>
    </div>
            <div class="row">
                <div class="input-field col s8">
                    <input placeholder="Precio del producto" type="text" id="precio" name="precio">
                    <label for="precio">Precio del producto</label>
            </div>
                </div>  
                <div class="row">
                    <div class="file-input input-field col s8">
                        <div class="btn">
                            <span>Imagen...</span>
                            <input type="file" >
                        </div>
                        <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="action">
                    <i class="material-icons right">Guardar</i>
                    </button>
                </div>
    </form>
</div>
@endsection
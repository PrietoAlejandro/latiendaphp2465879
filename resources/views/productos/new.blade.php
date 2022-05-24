@extends('layouts.menu')

@section('contenido')
@if(session('mensaje'))
    <div class="row">
        {{  session('mensaje') }}
    </div>
@endif
<div class="row">
    <h1 class="deep-orange-text text-darken-1">
        Nuevo producto
    </h1>
    </div>
        <div class="row">
    <form class='col s8' method="POST" action="{{ url('productos') }}">
        @csrf
            <div class="row">
                <div class="input-field col s8">
                    <input placeholder="Nombre producto" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
                    <label for="nombre">Nombre del producto</label>
                    <span> {{ $errors->first('nombre') }}</span>
            </div>
                </div>

    <div class="row">
        <div class="input-field col s8">
        <textarea class="materialize-textarea" id="desc" name="desc">{{ old('desc') }}</textarea>
        <label for="desc">Descripcion</label>
        <span> {{ $errors->first('desc') }}</span>
        </div>
    </div>
            <div class="row">
                <div class="input-field col s8">
                    <input placeholder="Precio del producto" type="text" id="precio" name="precio" value="{{ old('precio') }}"v>
                    <label for="precio">Precio del producto</label>
                    <span> {{ $errors->first('precio') }}</span>
            </div>

            <div class="row">
                <div class="col s8 input-field">
                    <select name="marca" id="marca">
                        <option value="">Elije Marca</option>
                        @foreach($marcas as $marca)
                        <option value="{{$marca->id}}">{{ $marca->nombre }}</option>
                        @endforeach
                    </select>
                    <label for="marca">Marca</label>
                    <span> {{ $errors->first('marca') }}</span>
                </div>
            </div>

            <div class="row">
                <div class="col s8 input-field">
                    <select name="categorias" id="categorias">
                    <option value="">Elije Categoria</option>
                        @foreach($categorias as $categorias)
                        <option value="{{ $categorias->id }}">
                            {{ $categorias->nombre }}
                        </option>
                        @endforeach
                    </select>
                    <label for="categoria">Categorias</label>
                    <span> {{ $errors->first('categoria') }}</span>
                </div>
            </div>

                </div>  
                <div class="row">
                    <div class="file-field input-field col s8">
                        <div class="btn cyan darken-2">
                            <span>Imagen...</span>
                            <input type="file" name="imagen">
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
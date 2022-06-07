@extends('layouts.menu')

@section('contenido')
    <div class="row">
        <h1>Catalogo de productos</h1>

    </div>
    @foreach($productos as $producto)
    <div>
        <div class="col s8">
            <div class="card">
            <style>
                .card
                {
                    width: 30%;
                }
            </style>
                <div class="card-image">
                    @if($producto->imagen === null)
                        <img src="{{ asset('img/producto-no-disponible.jpg') }}" alt="">
                    @else
                        <img src="{{ asset('img/'.$producto->imagen) }}" alt=""> 
                    @endif
                </div>  
                    <span class="card-title">{{$producto->nombre}}</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">Disponible</i></a>
                        <div class="card-content">
                            <p>{{ $producto->desc }}</p>
                        </div>
                    <div class="card-action">
                        <a href="{{ route('productos.show', $producto->id) }}">Ver detalles</a>
                    </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
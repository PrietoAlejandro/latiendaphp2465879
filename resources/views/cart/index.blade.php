@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1>Carrito de compra</h1>
</div>
@if(session('cart'))
<div class="row">
    <div class="col s8">
        <table>
            <thead>
                <tr>
                    <th>Nombre del producto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
            @foreach(session('cart') as $producto)
                <tr>
                    <td>{{ $producto[0]["nombre"] }}</td>
                    <td>{{ $producto[0]["cantidad"] }}</td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<strong>
    No hay items en el carrito
</strong>
@endif
<div class="row">
    <form method="post" action="{{ route('cart.destroy', 1)}}">
        @method('DELETE')
        @csrf
    <button class="btn waves-effect waves-light" type="submit" name="action">
                    <i class="material-icons right">Eliminar Carrito</i>
                    </button>
    </form>
</div>
@endsection
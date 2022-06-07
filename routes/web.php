<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ruta paises
Route::get('paises' , function()
{
    $paises=[
        "Colombia" => [
            "capital" => "Bogotá",
            "moneda" =>"Peso",
            "poblacion" => 51.6,
            "ciudades" => [
                "Medellin",
                "Cali",
                "Barranquilla"
            ]
        ],
        "Peru" =>[
            "capital" => "Lima",
            "moneda" =>"Sol",
            "poblacion" => 32.97,
            "ciudades" =>
            [
                "Trujillo",
                "Tacna",
                "Piura"
            ]
        ],
        "Paraguay" => [
            "capital" => "Asuncion",
            "moneda" =>"Guarani paraguayo",
            "poblacion" => 7.133,
            "ciudades" =>
            [
                "Aregua",
                "Caacupe",
                "Encarnacio",
                "Suba"
            ]
        ]
    ];

    //mostar vista de paises
    return view ('paises')
    ->with("paises" , $paises);

});

Route::get('prueba', function()
{
    return view('productos.new');
});

//RUTAS REST
//PRODUCTO

Route::resource('productos', ProductoController::class);
Route::resource('cart', CartController::class,['only' => ['store', 'destroy', 'index']]);
<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
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
        echo "aqui va a ir el catalogo de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccionar categorias y marcas
        $marcas = Marca::all();
        $categorias = Categoria::all();

        return view('productos.new')->with('marcas', $marcas)->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //DEFINIR REGLAS DE VALIDACION
        $reglas = 
        [
            "nombre" => 'required|alpha',
            "desc" => 'required|min:10|max:50',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required'
        ];

        //mensajes personalizados
        $mensajes = 
        [
            "required" => "Campo Obligatorio",
            "numeric" => "Solo Numeros",
            "alpha" => "Solo letras"
        ];

        $v = Validator::make($r->all() , $reglas, $mensajes);

        if($v->fails())
        {
            //validacion fallida
            //redireccionar al formulario de nuevo producto 
            return redirect('productos/create')
                            ->withErrors($v)->withInput();
        }else
        {
            //validacion correcta

            //crear entidad producto:
            $p = new Producto;
                //asignar valores a atributos del nuevo producto
                $p->nombre = $r->nombre;
                $p->desc = $r->desc;
                $p->precio = $r->precio;
                $p->marca_id = $r->marca;
                $p->categoria_id = $r->categorias;
                //grabar el nuevo producto
                $p->save();

                //REDIRECCIONAR A LA RUTA : CREATE 
                return redirect('productos/create')
                ->with('mensaje', 'Producto creado');
                echo "Producto creado";
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
        echo "Aquí va la informacion del producto cuyo id es: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "Aquí va a ir el formulario de edicion del producto cuyo id es: $producto";
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

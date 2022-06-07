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
        //seleccion de productos 
        $productos = Producto::all();
        //mostrar vista del catalogo llevando lista de productos
        return view('productos.index')->with('productos',$productos);
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
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:10|max:50',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required',
            "imagen" => 'required|image'
        ];

        //mensajes personalizados
        $mensajes = 
        [
            "required" => "Campo Obligatorio",
            "numeric" => "Solo Numeros",
            "alpha" => "Solo letras",
            "min" => "Solo permitido minimo 10 letras",
            "max" => "Solo permitido maximo 10 letras",
            "imagen" => "Solo permitido imagenes",
            "unique" => "Campo ya existe "
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
            //ASIGNAR A LA VARIABLE NOMBRE_ARCHIVO

            $nombre_archivo = $r->imagen->getClientOriginalName();
            $archivo = $r->imagen;
            //MOVER EL ARCHIVO EN LA CARPETA PUBLIC 
            var_dump(public_path());
            $ruta = public_path().'/img';
            $archivo->move($ruta, $nombre_archivo);
            //validacion correcta

            //crear entidad producto:
            $p = new Producto;
                //asignar valores a atributos del nuevo producto
                $p->nombre = $r->nombre;
                $p->desc = $r->desc;
                $p->precio = $r->precio;
                $p->imagen = $nombre_archivo;
                $p->marca_id = $r->marca;
                $p->categoria_id = $r->categoria;
                //grabar el nuevo producto
                $p->save();

                //REDIRECCIONAR A LA RUTA : CREATE 
                return redirect('productos/create')
                ->with('mensaje', 'Producto creado');
                
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
        //echo "Aquí va la informacion del producto cuyo id es: $producto";
        //SELECCIONAR PRODUCTO CON ID
        $producto = Producto::find($producto);
        //mostrar vista de detalles llevandole el producto seleccionado
        return view('productos.details')->with('producto', $producto);
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

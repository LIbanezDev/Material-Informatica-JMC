<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioEmail = auth()->user()->email;
        $productos = Producto::where('usuario', $usuarioEmail)->paginate(6);
        $todos_los_productos = Producto::where('usuario', $usuarioEmail)->get();
        $seccion_cantidad = [];
        for($i = 0; $i < count($todos_los_productos); $i++){
            $seccion_cantidad[$todos_los_productos[$i]->seccion] = 0;
        }
        foreach($todos_los_productos as $items){
            $seccion_cantidad[$items->seccion]++;
        }

        return view('productos.lista',compact('productos', 'seccion_cantidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:5|max:100',
            'descripcion' => 'required|min:10',
            'precio' => 'required|integer|gte:10000',
            'seccion' => 'required|min:4|max:100',
        ]);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/',$nombre);
        }else{
            $nombre = 'default.jpg';
        } 

        $producto = new Producto(); 
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->seccion = $request->seccion;
        $producto->imagen = $nombre;
        $producto->precio = $request->precio;
        $producto->usuario = auth()->user()->email;
        $producto->save();

        return back()->with('mensaje', 'Producto Agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos_detalles = Producto::findOrFail($id);  
        return view('productos/detalles_productos', compact('productos_detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|min:5|max:100',
            'descripcion' => 'required|min:10',
            'precio' => 'required|integer|gte:10000',
            'seccion' => 'required|min:4|max:100',
        ]);

        $nota_a_actualizar = Producto::findOrFail($id);
        $nota_a_actualizar->nombre = $request->nombre;
        $nota_a_actualizar->seccion = $request->seccion;
        $nota_a_actualizar->descripcion = $request->descripcion;
        $nota_a_actualizar->precio = $request->precio;


        if($request->hasFile('imagen')){
            $image_path = public_path().'/'.$nota_a_actualizar->imagen;
            if (file_exists($image_path)) {    
                @unlink($image_path);      
            }
            $file = $request->file('imagen');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/',$nombre);
            $nota_a_actualizar->imagen = $nombre;
        }
        
        $nota_a_actualizar->save();

        return back()->with('mensaje', 'Producto Editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto_a_eliminar = Producto::findOrFail($id);
        $image_path = public_path().'/'.$producto_a_eliminar->imagen;
        if (file_exists($image_path)) {    
            @unlink($image_path);      
        }
        $producto_a_eliminar->delete();

        return redirect()->route('productos.index')->with('mensaje', 'Producto eliminado satisfactoriamente');
    }

}

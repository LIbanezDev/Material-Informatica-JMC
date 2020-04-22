<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class HomeController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
   
    public function seccion($seccion)
    {
        $usuarioEmail = auth()->user()->email;
        $productos_detalles = Producto::where([
            ['seccion', $seccion], 
            ['usuario', $usuarioEmail = auth()->user()->email],
        ])->get();
        $productos = Producto::where('usuario', $usuarioEmail)->get(); 
        
        $seccion_cantidad = [];
        for($i = 0; $i < count($productos); $i++){
            $seccion_cantidad[$productos[$i]->seccion] = 0;
        }
        foreach($productos as $items){
            $seccion_cantidad[$items->seccion]++;
        } 
        
        return view('productos/seccion_producto', compact('productos_detalles','seccion_cantidad', 'productos'));
    }
    

}

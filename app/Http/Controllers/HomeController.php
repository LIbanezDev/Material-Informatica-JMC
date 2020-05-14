<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\User;

class HomeController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth')->except('ranking');
    }

    public function perfil()
    {
        return view('usuarios.perfil');
    }
    public function ranking()
    {
        $usuarios_ranking = User::where('puntos', '>', 1)->get();
        $cantidad = count($usuarios_ranking); 
        for($i = 0; $i < $cantidad-1; $i++){
            for($j = 1; $j < $cantidad; $j++){
                if($usuarios_ranking[$j]->puntos > $usuarios_ranking[$i]->puntos){
                    $aux = $usuarios_ranking[$i];
                    $usuarios_ranking[$i] = $usuarios_ranking[$j];
                    $usuarios_ranking[$j] = $aux;
                }
            }
        }
        return view('usuarios.ranking', compact('usuarios_ranking', 'cantidad'));
    }
}

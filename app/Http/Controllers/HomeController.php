<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\User;
use App\Asignatura;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function ranking()
    {
        $usuarios_ranking = DB::table('users')->where('puntos', '>', 1)->orderBy('puntos', 'desc')->paginate(12);
        $i = DB::table('users')->where('puntos', '>', 1)->get();
        $cantidad = count($i);
        $iterador = 1;
        $paginacion = $cantidad;
        return view('usuarios.ranking', compact('usuarios_ranking', 'iterador', 'cantidad', 'paginacion'));
    }
}

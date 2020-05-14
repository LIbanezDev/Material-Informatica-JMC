<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

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
        return view('usuarios.ranking');
    }
}

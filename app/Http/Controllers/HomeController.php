<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\User;
use App\Asignatura;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth')->except('ranking');
    }

    public function perfil()
    {
        $usuario_info = User::findOrFail(auth()->user()->id);
        $asignaturas_favoritas = DB::table('usuario_asignatura')->where('user_id', auth()->user()->id)->get();
        $i = 0;
        foreach($asignaturas_favoritas as $as){
            $asignaturas_favoritas_detalles[$i] = Asignatura::findOrFail($as->asignatura_id); 
            $i++;
        }
        if(!isset($asignaturas_favoritas_detalles)){
            $asignaturas_favoritas_detalles = null;
        }
        return view('usuarios.perfil', compact('usuario_info', 'asignaturas_favoritas_detalles'));
    }

    public function ranking()
    {
        $usuarios_ranking = DB::table('users')->where('puntos', '>', 1)->orderBy('puntos', 'desc')->paginate(4);
        $i = DB::table('users')->where('puntos', '>', 1)->get();
        $cantidad = count($i);
        $iterador = 1;
        $paginacion = 4;
        return view('usuarios.ranking', compact('usuarios_ranking', 'iterador', 'cantidad', 'paginacion'));
    }
    public function addFavorito($id_asignatura, $id_user)
    {
        $cantidad = DB::table('usuario_asignatura')->where('user_id', $id_user)->count();
        
        if($cantidad < 6){
            if(DB::table('usuario_asignatura')->where([
                ['user_id', $id_user],
                ['asignatura_id', $id_asignatura],
            ])->exists())
            {
                return back()->with('message_err1', 'Ya agregaste esta asignatura!');
            }
            DB::insert('insert into usuario_asignatura (asignatura_id, user_id) values (?, ?)', [$id_asignatura, $id_user]); 
            return back()->with('message', 'Se ha agregado asignatura');
        }else{
            return back()->with('message_err2', 'Tu seccion de favoritos está llena');
        }
    }

    public function deleteFavorito($id_asignatura, $id_user)
    {
        DB::table('usuario_asignatura')->where([
            ['user_id', $id_user],
            ['asignatura_id', $id_asignatura],
        ])->delete();

        return back()->with('message', 'Asignatura eliminada de favoritos');
    }
}

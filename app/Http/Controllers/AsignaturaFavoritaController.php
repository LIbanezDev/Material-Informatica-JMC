<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Asignatura;

class AsignaturaFavoritaController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
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

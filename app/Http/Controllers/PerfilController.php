<?php

namespace App\Http\Controllers;
use App\Asignatura;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function infoAndFavoritos()
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
    public function cambiarDatos(Request $request){
        $user = User::findOrFail(auth()->user()->id);
        $imagen_actual_perfil = "";        
        if($user->imagen != null){
            $imagen_actual_perfil = public_path().'/imgsPerfil/'.$user->imagen;
        }            
        if($request->hasFile('imagen')){
            $imagen_subida = $request->file('imagen');
            $extension_imagen_subida = substr($imagen_subida->getClientOriginalName(), strpos($imagen_subida->getClientOriginalName(), ".") + 1);
            if($extension_imagen_subida != "png" && $extension_imagen_subida != "jpg"){
                return back()->with('mensaje_img', 'Extensión incorrecta...');
            }

            $nombre_imagen = time().$imagen_subida->getClientOriginalName();
            $imagen_subida->move(public_path().'/imgsPerfil/',$nombre_imagen);
            $user->name = $request->nombre;
            $user->imagen = $nombre_imagen;
            $user->save();  
            if (file_exists($imagen_actual_perfil)){    
                @unlink($imagen_actual_perfil);      
            }
            return back();         
        }else{
            return back()->with('mensaje_img', 'No subiste imagen...');
        }                      
    }
}

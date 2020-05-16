<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\Archivo;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArchivoTemporalController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function storeArchivo(Request $request){
        if(auth()->user()->id != 1){
            return back();
        }
        if($request->voto == "rechazo"){
            DB::delete('delete from archivo_temporals where id = ?', [$request->id]);
            $image_path = public_path().'/archivosAsignaturas/'.$request->numero_asignatura.'/'.$request->nombre;
            if (file_exists($image_path)) {    
                @unlink($image_path);      
            }
            return back()->with('mensaje', 'Archivo rechazado exitosamente');
        }
        if($request->subido_por != 0){
            $user = User::findOrFail($request->subido_por);
            switch($request->tipo_evaluacion){
                case "Certamen":
                    $user->certamenes += 1;
                    $user->puntos += 3;
                    break;
                case "Laboratorio":
                    $user->laboratorios += 1;
                    $user->puntos += 2;
                    break;
                case "Control":
                    $user->controles += 1;
                    $user->puntos += 2;
                    break;
                case "Apunte / Otro":
                    $user->otros += 1;
                    $user->puntos += 1;
                    break;
            }
            $user->save();
        }

        $archivo = new Archivo(); 
        $archivo->nombre = $request->nombre;
        $archivo->tipo_evaluacion = $request->tipo_evaluacion;
        $archivo->numero_asignatura = $request->numero_asignatura;
        $archivo->semestre = $request->semestre;
        $archivo->formato = $request->formato;
        $archivo->tipo_evaluacion = $request->tipo_evaluacion;

        $request->subido_por == 0 ?  $archivo->subido_por_usuario = null : $archivo->subido_por_usuario = $request->subido_por;
        $archivo->save();

        DB::delete('delete from archivo_temporals where id = ?', [$request->id]);

        return back()->with('mensaje', 'Su archivo se subio exitosamente');
    }
}

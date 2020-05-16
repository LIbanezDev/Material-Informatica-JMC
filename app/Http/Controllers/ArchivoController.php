<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Asignatura;
use App\ArchivoTemporal;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(auth()->user()->id)){
            if(auth()->user()->id == 1){
                $archivos_a_comprobar = ArchivoTemporal::all();
                return view('archivoTemporal.formulario', compact('archivos_a_comprobar'));
            }
        }     
        return back()->with('admin', 'No tienes permiso para agregar archivos :(');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materia_del_archivo = Asignatura::where('nombre', $request->nombre_asignatura)->firstOrFail();

        if($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $nombre = $file->getClientOriginalName();
            $file->move(public_path().'/archivosAsignaturas/'.$materia_del_archivo->id .'/' , $nombre);
        }else{
            return back()->with('mensaje', 'No adjuntaste archivo...');
        }

        $data = $file->getClientOriginalName();    
        $extension_archivo = substr($data, strpos($data, ".") + 1);    
        $archivo = new ArchivoTemporal(); 
        $archivo->nombre = $nombre;
        $archivo->numero_asignatura = $materia_del_archivo->id;
        $archivo->semestre = $materia_del_archivo->semestre;
        $archivo->formato = $extension_archivo;
        $archivo->tipo_evaluacion = $request->tipo_material;
        $request->subido_por == null ? $archivo->subido_por_usuario = 0 : $archivo->subido_por_usuario = $request->subido_por; 
        $archivo->save();

        return back()->with('mensaje', 'Su archivo se encuentra en revisión, gracias!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

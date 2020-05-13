<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Asignatura;
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
        //
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
        $archivo = new Archivo(); 
        $archivo->nombre = $nombre;
        $archivo->asignatura = $materia_del_archivo->id;
        $archivo->semestre = $request->semestre_asignatura;
        $archivo->save();

        return back()->with('mensaje', 'Archivo Agregado!');
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

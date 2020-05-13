<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Archivo;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asignaturas.asignaturasTodas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(isset(auth()->user()->email)){
            if(auth()->user()->email == "lucas.ivergara18@gmail.com"){
                return view('asignaturas.asignaturasCrear');
            }else{
                return back()->with('admin', 'No tienes permiso para agregar asignaturas :(');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nombre' => 'required|min:5|max:100',
        //     'descripcion' => 'required|min:10',
        //     'precio' => 'required|integer|gte:10000',
        //     'seccion' => 'required|min:4|max:100',
        // ]);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/asignaturas/',$nombre);
        }else{
            $nombre = 'default.jpg';
        } 
        $asignatura = new Asignatura(); 
        $asignatura->nombre = $request->nombre;
        $asignatura->descripcion = $request->descripcion;
        $asignatura->imagen = $nombre;
        $asignatura->semestre = $request->semestre;
        $asignatura->save();

        return back()->with('mensaje', 'Asignatura Agregada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignatura_detalles = Asignatura::findOrFail($id);
        $archivos_asignatura = Archivo::where('numero_asignatura', $id)->get();
        $todas_las_asignaturas = Asignatura::all();
        return view('asignaturas.asignaturasDetalles', compact('asignatura_detalles', 'todas_las_asignaturas', 'archivos_asignatura'));
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
        // $producto_a_eliminar = Producto::findOrFail($id);
        // $image_path = public_path().'/'.$producto_a_eliminar->imagen;
        // if (file_exists($image_path)) {    
        //     @unlink($image_path);      
        // }
        // $producto_a_eliminar->delete();

        // return redirect()->route('productos.index')->with('mensaje', 'Producto eliminado satisfactoriamente');
    }
}

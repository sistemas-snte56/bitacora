<?php

namespace App\Http\Controllers;

use App\Models\Admin\Tema;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temas = Tema::all();
        return view('admin.temas.index',compact('temas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.temas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'titulo' => ['required'],
            'descripcion' => ['required'],
        ]);

        // Crear Tema

        $tema = new Tema();
        $tema->titulo = mb_strtoupper($request->input('titulo'), 'UTF-8');
        $tema->descripcion = $request->input('descripcion');
        $tema->slug = Str::slug($request->titulo); // Usa el slug del título si no se proporciona
        $tema->save();

        // return view('admin.temas.index')->with('success_tema', 'Tema registrado...');
        return redirect()->route('tema.index')->with('success_tema', 'Tema registrado...');

  
    }

    /**
     * Display the specified resource.
     */
    public function show(Tema $tema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tema $tema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tema $tema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tema $tema)
    {
        //
    }
}

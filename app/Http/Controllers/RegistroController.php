<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Admin\Tema;
use App\Models\Admin\Genero;
use App\Models\Admin\Usuario;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tema = Tema::findOrFail(2);
        // $generos = Genero::pluck('genero','id'); 
        // Pluck para obtener un array de ID => nombre
        $generos = Genero::pluck('genero', 'id')->toArray(); 


        return view('registro', compact('tema','generos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'select_region' => ['required'],
            'select_delegacion' => ['required'],
            'select_genero' => ['required'],
            'nombre' => ['required'],                        
            'apellido_paterno' => ['required'],  
            'telefono' => ['required','numeric','digits:10'],
            // 'email' => ['required','email|unique:usuarios,email'],
            // 'email' => ['required', 'email', 'unique:usuarios,email'],
            'email' => 'required|email|unique:usuarios,email',
            'rfc' => ['required', 'regex:/^[a-zA-Z]{4}[0-9]{6}[a-zA-Z0-9]{3}$/'],
            // 'email' => ['required','email','unique:maestros,email,'.$maestro->id],
        ]);

        return $request;
        
        $usuario = new Usuario();
        $usuario->id_delegacion = $request->input('select_delegacion');
        $usuario->id_tema = $request->input('tema');
        $usuario->nombre = mb_strtoupper($request->input('nombre'),'UTF-8');
        $usuario->apaterno = mb_strtoupper($request->input('apellido_paterno'),'UTF-8');
        $usuario->amaterno = mb_strtoupper($request->input('apellido_materno'),'UTF-8');
        $usuario->id_genero = $request->input('select_genero');
        $usuario->email = $request->input('email');
        $usuario->telefono = $request->input('telefono');
        $usuario->rfc = mb_strtoupper($request->input('rfc'),'UTF-8');
        $usuario->save();
        
        



        /*



            `id_delegacion` bigint unsigned NOT NULL,
            `id_tema` bigint unsigned NOT NULL,
            `nombre` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `apaterno` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `amaterno` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `id_genero` bigint unsigned NOT NULL,
            `rfc` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `curp` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `npersonal` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `telefono` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `folio` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `dirección` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `cp` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `ciudad` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `estado` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL,


        */
    }

    /**
     * Display the specified resource.
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro $registro)
    {
        //
    }
}

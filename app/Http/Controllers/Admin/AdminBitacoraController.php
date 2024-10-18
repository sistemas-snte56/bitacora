<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Bitacora;
use App\Http\Controllers\Controller;

class AdminBitacoraController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:admin.bitacora.index')->only('index');
        $this->middleware('permission:admin.bitacora.edit')->only('edit','update');
        $this->middleware('permission:admin.bitacora.create')->only('create','store');
        $this->middleware('permission:admin.bitacora.destroy')->only('destroy');
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtén solo las bitácoras del usuario autenticado
        $bitacoras = Bitacora::all(); // Filtra por el ID del usuario autenticado
        return view('admin.bitacoras.index', compact('bitacoras'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

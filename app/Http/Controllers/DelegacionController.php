<?php

namespace App\Http\Controllers;

use App\Models\Admin\Delegacion;
use Illuminate\Http\Request;

class DelegacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $delegaciones = Delegacion::all();
        return view('admin.delegaciones.index',compact('delegaciones'));
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
    public function show(Delegacion $delegacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delegacion $delegacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delegacion $delegacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delegacion $delegacion)
    {
        //
    }
}

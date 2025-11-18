<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temporada;

class TemporadasController extends Controller
{
    public function index()
    {
        return Temporada::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nombre'=> 'required|string',
            'fecha_inico' => 'required|date',
            'fecha_fin' => 'required|date'
        ]);

        return Temporada::created($request->all());
    }

    public function show(string $id)
    {
        return Temporada::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $temporada = Temporada::findOrFail($id);

        $request->validate([
            'nombre'=> 'string',
            'fecha_inicio'=> 'date',
            'fecha_fin'=> 'date'
        ]);

        $temporada->update($request->all());
        return $temporada;
    }

    public function destroy(string $id)
    {
        $temporada = Temporada::findOrFail($id);
        $temporada->delete();
        return response()->json([
            "message"=> "Temporada eliminada correctamente"
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;

class JugadorController extends Controller
{
    public function index()
    {
        return Jugador::with('equipo')->get();
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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'posicion' => 'required|string|max:50',
            'equipo_id' => 'required|exists:equipos,id'
        ]);

        $jugador = Jugador::create($request->all());

        return response()->json($jugador, 201);
    }

    public function show($id)
    {
        return Jugador::with('equipo')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'fecha_nacimiento' => 'sometimes|date',
            'posicion' => 'sometimes|string|max:50',
            'equipo_id' => 'sometimes|exists:equipos,id'
        ]);

        $jugador = Jugador::findOrFail($id);
        $jugador->update($request->all());

        return response()->json($jugador, 200);
    }

    public function destroy($id)
    {
        $jugador = Jugador::findOrFail($id);
        $jugador->delete();

        return response()->json(null, 204);
    }
}

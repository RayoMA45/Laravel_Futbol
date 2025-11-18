<?php

namespace App\Http\Controllers;

use App\Models\Estadio;
use Illuminate\Http\Request;

class EstadioController extends Controller
{
    public function index()
    {
        return Estadio::all();
    }

    // Crear un estadio (POST)
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'ciudad' => 'required|string|max:55',
            'capacidad' => 'required|integer',
        ]);

        $estadio = Estadio::create($request->all());
        return response()->json($estadio, 201);
    }

    // Mostrar un estadio por ID (GET)
    public function show($id)
    {
        return Estadio::findOrFail($id);
    }

    // Actualizar estadio (PUT/PATCH)
    public function update(Request $request, $id)
    {
        $estadio = Estadio::findOrFail($id);
        $estadio->update($request->all());
        return response()->json($estadio, 200);
    }

    // Eliminar estadio (DELETE)
    public function destroy($id)
    {
        $estadio = Estadio::findOrFail($id);
        $estadio->delete();
        return response()->json(null, 204);
    }
}

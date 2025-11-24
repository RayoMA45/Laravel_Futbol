<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadisticasJugador;

class EstadisticasJugadorController extends Controller
{
    public function index()
    {
        return EstadisticasJugador::with(['jugador', 'partido_jugado'])->get();
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
        $validatedData = $request->validate([
            'goles' => 'required|integer',
           'asistencias' => 'required|integer',
            'tarjetas_amarillas' => 'required|integer',
            'tarjetas_rojas' => 'required|integer',
            'minutos_jugados' => 'required|integer',
            'jugador_id' => 'required|exists:jugadores,id',
            'partido_jugado_id' => 'required|exists:partidosjugados,id'
        ]);
        $estadistica = EstadisticasJugador::create($validatedData);

        return response()->json([
            'message' => 'Estadística creada correctamente',
            'data' => $estadistica
        ], 201);
    }


    public function show($id)
    {
        return EstadisticasJugador::with(['jugador', 'partido_jugado'])->findOrFail($id);
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
            'goles' => 'required|integer',
            'asistencias' => 'required|integer',
            'tarjetas_amarillas' => 'required|integer',
            'tarjetas_rojas' => 'required|integer',
            'minutos_jugados' => 'required|integer',
            'jugador_id' => 'required|exists:jugadores,id',
            'partido_jugado_id' => 'required|exists:partidosjugados,id'

        ]);
        $estadistica_jugador = EstadisticasJugador::findOrFail($id);
        $estadistica_jugador->update($request->all());
        return response()->json($estadistica_jugador, 200);
    }

    public function destroy($id)
    {
        $estadistica_jugador = EstadisticasJugador::findOrFail($id);
        $estadistica_jugador->delete();
        return response()->json(null,204);
    }
}

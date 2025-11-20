<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estadisticas_Jugador;

class EstadisticasJugadorController extends Controller
{
    public function index()
    {
        return Estadisticas_Jugador::with(['jugador', 'partido_jugado'])->get();
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
            'goles'=>'required|integer',
            'asistencias'=>'required|integer',
            'tarjetas_amarillas'=>'required|integer',
            'tarjetas_rojas'=>'required|integer',
            'min_jugados'=>'required|integer',
            'jugador_id'=>'required|exists:jugador,id',
            'partido_jugado_id'=>'required|exists:partido_jugado,id'
        ]);
        $estadistica = Estadisticas_Jugador::created($request->all());
        return response()->json($estadistica,201);
    }

    public function show($id)
    {
        return Estadisticas_Jugador::with(['jugador', 'partido_jugado'])->findOrFail($id);
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
            'goles'=>'required|integer',
            'asistencias'=>'required|integer',
            'tarjetas_amarillas'=>'required|integer',
            'tarjetas_rojas'=>'required|integer',
            'min_jugados'=>'required|integer',
            'jugador_id'=>'required|exists:jugador,id',
            'partido_jugado_id'=>'required|exists:partido_jugado,id'
        ]);
        $estadistica_jugador = Estadisticas_Jugador::findOrFail($id);
        $estadistica_jugador->update($request->all());
        return response()->json($estadistica_jugador, 200);
    }

    public function destroy($id)
    {
        $estadistica_jugador = Estadisticas_Jugador::findOrFail($id);
        $estadistica_jugador->delete();
        return response()->json(null,204);
    }
}

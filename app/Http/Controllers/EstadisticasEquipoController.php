<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estadisticas_Equipo;
use App\Models\Estadisticas_Jugador;

class EstadisticasEquipoController extends Controller
{
    public function index()
    {
        return Estadisticas_Jugador::with(['equipo', 'temporada'])->get();
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
            'partidos_ganados'=>'required|integer',
            'partidos_perdidos'=>'required|integer',
            'partidos_empatados'=>'required|integer',
            'gol_favor'=>'required|integer',
            'gol_contra'=>'required|integer',
            'puntos'=>'required|integer',
            'equipo_id'=>'required|exists:equipos,id',
            'temporada_id'=>'required|exists:temporadas,id'
        ]);

        $estadistica = Estadisticas_Equipo::created($request->all());

        return response()->json($estadistica,201);
    }


    public function show($id)
    {
        return Estadisticas_Equipo::with(['equipo', 'temporada'])->findOrFail($id);
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
            'partidos_ganados'=>'required|integer',
            'partidos_perdidos'=>'required|integer',
            'partidos_empatados'=>'required|integer',
            'gol_favor'=>'required|integer',
            'gol_contra'=>'required|integer',
            'puntos'=>'required|integer',
            'equipo_id'=>'required|exists:equipos,id',
            'temporada_id'=>'required|exists:temporadas,id'
        ]);

        $estadistica_equipo = Estadisticas_Equipo::findOrFail($id);
        $estadistica_equipo->update($request->all());

        return response()->json($estadistica_equipo, 200);
    }

    public function destroy($id)
    {
        $estadistica_equipo = Estadisticas_Equipo::findOrFail($id);
        $estadistica_equipo->delete();
        
        return response()->json(null,204);
    }
}

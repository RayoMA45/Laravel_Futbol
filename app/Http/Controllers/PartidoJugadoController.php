<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido_Jugado;
use App\Models\PartidoJugado;

class PartidoJugadoController extends Controller
{
    public function index()
    {
        return PartidoJugado::with(['estadios', 'temporadas', 'arbitros'])->get();
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
            'goles_local'=>'required|integer',
            'goles_visitante'=>'required|integer',
            'local'=>'required|integer',
            'visitante'=>'required|integer',
            'fecha'=>'required|date',
            'temporada_id'=>'required|exists:temporadas,id',
            'estadio_id'=>'required|exists:estadios,id',
            'arbitro_id'=>'required|exists:arbitros,id'
        ]);

        $partido_jugado = PartidoJugado::create($request->all());

        return response()->json($partido_jugado,201);
    }

    public function show($id)
    {
        return PartidoJugado::with(['temporada', 'estadio', 'arbitro'])->findOrFail($id);
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
            'goles_local'=>'required|integer',
            'goles_visitante'=>'required|integer',
            'local'=>'required|integer',
            'visitante'=>'required|integer',
            'fecha'=>'required|date',
            'temporada_id'=>'required|exists:temporadas,id',
            'estadio_id'=>'required|exists:estadios,id',
            'arbitro_id'=>'required|exists:arbitros,id'
        ]);
        $partido_jugado = PartidoJugado::findOrFail($id);
        $partido_jugado->update($request->all());
        return response()->json($partido_jugado, 200);
    }

    public function destroy($id)
    {
        $partido_jugado = PartidoJugado::findOrFail($id);
        $partido_jugado->delete();
        return response()->json(null,204);
    }
}

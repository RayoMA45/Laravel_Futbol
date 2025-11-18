<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;

class EquipoController extends Controller
{
    public function index()
    {
        return Equipo::with('estadio')->get();
        // return Equipo:all();
        // regresa todos los estadios y con with con su estadio
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
            'ciudad' => 'required|string|max:255',
            'titulos' => 'required|integer',
            'estadio_id' => 'required|exists:estadios,id', // valida que exista
        ]);

        $equipo = Equipo::create($request->all());

        return response()->json($equipo, 201);
    }

    public function show($id)
    {
        return Equipo::with('estadio')->findOrFail($id);
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
            'ciudad' => 'sometimes|string|max:255',
            'titulos' => 'sometimes|integer',
            'estadio_id' => 'sometimes|exists:estadios,id',
        ]);

        $equipo = Equipo::findOrFail($id);
        $equipo->update($request->all());

        return response()->json($equipo, 200);
    }

    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        return response()->json(null, 204);
    }
}

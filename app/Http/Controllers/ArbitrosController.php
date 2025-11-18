<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arbitro;

class ArbitrosController extends Controller
{
    public function index()
    {
        return Arbitro::all();
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
            'nombre'=>'required|string|max:100',
            'nacionalidad'=>'required|string|max:100'
        ]);

        $arbitro = Arbitro::created($request->all());
        return response()->json($arbitro, 201);
    }

    public function show( $id)
    {
        return Arbitro::findOrFail($id);
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
        $arbitro = Arbitro::findOrFail($id);
        $arbitro->update($request->all());
        return response()->json($arbitro, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $arbitro = Arbitro::findOrFail($id);
        $arbitro->delete();
        return response()->json(null, 204);
    }
}

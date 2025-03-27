<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
        return response()->json(Sala::all());
    }

    public function show($id)
    {
        $sala = Sala::find($id);
        if (!$sala) {
            return response()->json(['message' => 'Sala no encontrada'], 404);
        }
        return response()->json($sala);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cine' => 'required|exists:cines,id_cine',
            'nombre' => 'required|string|max:50',
            'capacidad' => 'required|integer',
        ]);

        $sala = Sala::create($validated);
        return response()->json($sala, 201);
    }

    public function update(Request $request, $id)
    {
        $sala = Sala::find($id);
        if (!$sala) {
            return response()->json(['message' => 'Sala no encontrada'], 404);
        }

        $validated = $request->validate([
            'id_cine' => 'required|exists:cines,id_cine',
            'nombre' => 'required|string|max:50',
            'capacidad' => 'required|integer',
        ]);

        $sala->update($validated);
        return response()->json($sala);
    }

    public function destroy($id)
    {
        $sala = Sala::find($id);
        if (!$sala) {
            return response()->json(['message' => 'Sala no encontrada'], 404);
        }

        $sala->delete();
        return response()->json(['message' => 'Sala eliminada']);
    }
}

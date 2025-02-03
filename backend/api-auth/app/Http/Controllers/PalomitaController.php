<?php

namespace App\Http\Controllers;

use App\Models\Palomita;
use Illuminate\Http\Request;

class PalomitaController extends Controller
{
    public function index()
    {
        return response()->json(Palomita::all());
    }

    public function show($id)
    {
        $palomita = Palomita::find($id);
        if (!$palomita) {
            return response()->json(['message' => 'Palomita no encontrada'], 404);
        }
        return response()->json($palomita);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pass_usuario' => 'required|string',
        ]);

        $palomita = Palomita::create($validated);
        return response()->json($palomita, 201);
    }

    public function update(Request $request, $id)
    {
        $palomita = Palomita::find($id);
        if (!$palomita) {
            return response()->json(['message' => 'Palomita no encontrada'], 404);
        }

        $validated = $request->validate([
            'pass_usuario' => 'required|string',
        ]);

        $palomita->update($validated);
        return response()->json($palomita);
    }

    public function destroy($id)
    {
        $palomita = Palomita::find($id);
        if (!$palomita) {
            return response()->json(['message' => 'Palomita no encontrada'], 404);
        }

        $palomita->delete();
        return response()->json(['message' => 'Palomita eliminada']);
    }
}

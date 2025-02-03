<?php

namespace App\Http\Controllers;

use App\Models\Cine;
use Illuminate\Http\Request;

class CineController extends Controller
{
    public function index()
    {
        return response()->json(Cine::all());
    }

    public function show($id)
    {
        $cine = Cine::find($id);
        if (!$cine) {
            return response()->json(['message' => 'Cine no encontrado'], 404);
        }
        return response()->json($cine);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        $cine = Cine::create($validated);
        return response()->json($cine, 201);
    }

    public function update(Request $request, $id)
    {
        $cine = Cine::find($id);
        if (!$cine) {
            return response()->json(['message' => 'Cine no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        $cine->update($validated);
        return response()->json($cine);
    }

    public function destroy($id)
    {
        $cine = Cine::find($id);
        if (!$cine) {
            return response()->json(['message' => 'Cine no encontrado'], 404);
        }

        $cine->delete();
        return response()->json(['message' => 'Cine eliminado']);
    }
}

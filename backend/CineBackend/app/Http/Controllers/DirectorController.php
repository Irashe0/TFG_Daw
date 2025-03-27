<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {
        return response()->json(Director::all());
    }

    public function show($id)
    {
        $director = Director::find($id);
        if (!$director) {
            return response()->json(['message' => 'Director no encontrado'], 404);
        }
        return response()->json($director);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'nullable|string|max:100',
        ]);

        $director = Director::create($validated);
        return response()->json($director, 201);
    }

    public function update(Request $request, $id)
    {
        $director = Director::find($id);
        if (!$director) {
            return response()->json(['message' => 'Director no encontrado'], 404);
        }

        $validated = $request->validate([ 
            'nombre' => 'required|string|max:100',
            'apellidos' => 'nullable|string|max:100',
        ]);

        $director->update($validated);
        return response()->json($director);
    }

    public function destroy($id)
    {
        $director = Director::find($id);
        if (!$director) {
            return response()->json(['message' => 'Director no encontrado'], 404);
        }

        $director->delete();
        return response()->json(['message' => 'Director eliminado']);
    }
}

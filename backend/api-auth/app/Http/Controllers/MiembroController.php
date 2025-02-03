<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use Illuminate\Http\Request;

class MiembroController extends Controller
{
    public function index()
    {
        return response()->json(Miembro::all());
    }

    public function show($id)
    {
        $miembro = Miembro::find($id);
        if (!$miembro) {
            return response()->json(['message' => 'Miembro no encontrado'], 404);
        }
        return response()->json($miembro);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:miembros,email',
            'fecha_registro' => 'nullable|date',  
            'id_rol' => 'nullable|exists:roles,id_rol', 
        ]);

        $miembro = Miembro::create($validated);
        return response()->json($miembro, 201);
    }

    public function update(Request $request, $id)
    {
        $miembro = Miembro::find($id);
        if (!$miembro) {
            return response()->json(['message' => 'Miembro no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email',
            'fecha_registro' => 'nullable|date', 
            'id_rol' => 'nullable|exists:roles,id_rol', 
        ]);

        $miembro->update($validated);
        return response()->json($miembro);
    }

    public function destroy($id)
    {
        $miembro = Miembro::find($id);
        if (!$miembro) {
            return response()->json(['message' => 'Miembro no encontrado'], 404);
        }

        $miembro->delete();
        return response()->json(['message' => 'Miembro eliminado']);
    }
}

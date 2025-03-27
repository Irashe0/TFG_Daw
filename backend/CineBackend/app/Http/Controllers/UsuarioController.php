<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function show($id)
    {
        $usuario = User::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        return response()->json($usuario);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_miembro' => 'required|exists:miembros,id_miembro',
            'nombre_usuario' => 'required|string|max:50',
            'id_rol' => 'nullable|exists:roles,id_rol',
        ]);

        $usuario = User::create($validated);
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $validated = $request->validate([
            'id_miembro' => 'required|exists:miembros,id_miembro',
            'nombre_usuario' => 'required|string|max:50',
            'id_rol' => 'nullable|exists:roles,id_rol',
        ]);

        $usuario->update($validated);
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(['message' => 'Usuario eliminado']);
    }
}

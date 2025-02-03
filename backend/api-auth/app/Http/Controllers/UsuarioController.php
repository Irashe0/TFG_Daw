<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json(Usuario::all());
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
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
            'id_palomitas' => 'nullable|exists:palomitas,id_palomitas',
        ]);

        $usuario = Usuario::create($validated);
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $validated = $request->validate([
            'id_miembro' => 'required|exists:miembros,id_miembro',
            'nombre_usuario' => 'required|string|max:50',
            'id_rol' => 'nullable|exists:roles,id_rol',
            'id_palomitas' => 'nullable|exists:palomitas,id_palomitas',
        ]);

        $usuario->update($validated);
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(['message' => 'Usuario eliminado']);
    }
}

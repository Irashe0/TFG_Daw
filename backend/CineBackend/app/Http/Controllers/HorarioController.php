<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        return response()->json(Horario::all());
    }

    public function show($id)
    {
        $horario = Horario::find($id);
        if (!$horario) {
            return response()->json(['message' => 'Horario no encontrado'], 404);
        }
        return response()->json($horario);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelicula_id' => 'required|exists:peliculas,id_pelicula',
            'sala_id' => 'required|exists:salas,id_sala',
            'fecha_hora' => 'required|date',
        ]);

        $horario = Horario::create($validated);
        return response()->json($horario, 201);
    }

    public function update(Request $request, $id)
    {
        $horario = Horario::find($id);
        if (!$horario) {
            return response()->json(['message' => 'Horario no encontrado'], 404);
        }

        $validated = $request->validate([
            'id_pelicula' => 'required|exists:peliculas,id_pelicula',
            'id_sala' => 'required|exists:salas,id_sala',
            'fecha_hora' => 'required|date',
        ]);

        $horario->update($validated);
        return response()->json($horario);
    }

    public function destroy($id)
    {
        $horario = Horario::find($id);
        if (!$horario) {
            return response()->json(['message' => 'Horario no encontrado'], 404);
        }

        $horario->delete();
        return response()->json(['message' => 'Horario eliminado']);
    }
}

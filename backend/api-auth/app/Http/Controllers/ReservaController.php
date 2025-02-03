<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        return response()->json(Reserva::all());
    }

    public function show($id)
    {
        $reserva = Reserva::find($id);
        if (!$reserva) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }
        return response()->json($reserva);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_miembro' => 'required|exists:miembros,id_miembro',
            'id_horario' => 'required|exists:horarios,id_horario',
            'cantidad_entradas' => 'required|integer',
        ]);

        $reserva = Reserva::create($validated);
        return response()->json($reserva, 201);
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        if (!$reserva) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        $validated = $request->validate([
            'id_miembro' => 'required|exists:miembros,id_miembro',
            'id_horario' => 'required|exists:horarios,id_horario',
            'cantidad_entradas' => 'required|integer',
        ]);

        $reserva->update($validated);
        return response()->json($reserva);
    }

    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        if (!$reserva) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        $reserva->delete();
        return response()->json(['message' => 'Reserva eliminada']);
    }
}

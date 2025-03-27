<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        return response()->json(Venta::all());
    }

    public function show($id)
    {
        $venta = Venta::find($id);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }
        return response()->json($venta);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_reserva' => 'required|exists:reservas,id_reserva',
            'fecha_venta' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $venta = Venta::create($validated);
        return response()->json($venta, 201);
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::find($id);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $validated = $request->validate([
            'id_reserva' => 'required|exists:reservas,id_reserva',
            'fecha_venta' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $venta->update($validated);
        return response()->json($venta);
    }

    public function destroy($id)
    {
        $venta = Venta::find($id);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $venta->delete();
        return response()->json(['message' => 'Venta eliminada']);
    }
}

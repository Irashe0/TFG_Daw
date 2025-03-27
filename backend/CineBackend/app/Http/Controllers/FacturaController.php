<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        return response()->json(Factura::all());
    }

    public function show($id)
    {
        $factura = Factura::find($id);
        if (!$factura) {
            return response()->json(['message' => 'Factura no encontrada'], 404);
        }
        return response()->json($factura);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_factura' => 'required|string|max:100',
            'fecha_emision' => 'required|date',
            'total_factura' => 'required|numeric',
            'id_venta' => 'required|exists:ventas,id_venta',
        ]);

        $factura = Factura::create($validated);
        return response()->json($factura, 201);
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::find($id);
        if (!$factura) {
            return response()->json(['message' => 'Factura no encontrada'], 404);
        }

        $validated = $request->validate([
            'numero_factura' => 'required|string|max:100',
            'fecha_emision' => 'required|date',
            'total_factura' => 'required|numeric',
            'id_venta' => 'required|exists:ventas,id_venta',
        ]);

        $factura->update($validated);
        return response()->json($factura);
    }

    public function destroy($id)
    {
        $factura = Factura::find($id);
        if (!$factura) {
            return response()->json(['message' => 'Factura no encontrada'], 404);
        }

        $factura->delete();
        return response()->json(['message' => 'Factura eliminada']);
    }
}

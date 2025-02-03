<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::with('director')->get();
        return response()->json($peliculas);
    }

    public function show($id)
    {
        $pelicula = Pelicula::with('director')->find($id);
        if ($pelicula) {
            return response()->json($pelicula);
        }
        return response()->json(['message' => 'Pelicula no encontrada'], 404);
    }

    public function store(Request $request)
    {
        $pelicula = Pelicula::create($request->all());
        return response()->json($pelicula, 201);
    }

    public function update(Request $request, $id)
    {
        $pelicula = Pelicula::find($id);
        if ($pelicula) {
            $pelicula->update($request->all());
            return response()->json($pelicula);
        }
        return response()->json(['message' => 'Pelicula no encontrada'], 404);
    }

    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        if ($pelicula) {
            $pelicula->delete();
            return response()->json(['message' => 'Pelicula eliminada']);
        }
        return response()->json(['message' => 'Pelicula no encontrada'], 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::select('id_pelicula', 'titulo', 'id_director', 'sinopsis', 'duracion', 'clasificacion', 'productora', 'imagen')
                             ->with('director')
                             ->get();

        return response()->json($peliculas);
    }

    public function show($id)
    {
        $pelicula = Pelicula::select('id_pelicula', 'titulo', 'id_director', 'sinopsis', 'duracion', 'clasificacion', 'productora', 'imagen')
                            ->with('director')
                            ->find($id);

        if ($pelicula) {
            return response()->json($pelicula);
        }
        return response()->json(['message' => 'Pelicula no encontrada'], 404);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'id_director' => 'nullable|integer',
            'sinopsis' => 'nullable|string',
            'duracion' => 'nullable|integer',
            'clasificacion' => 'nullable|string|max:50',
            'productora' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/imagenes');
            $imagenUrl = Storage::url($imagenPath);
        } else {
            $imagenUrl = null;
        }

        $pelicula = Pelicula::create([
            'titulo' => $request->titulo,
            'id_director' => $request->id_director,
            'sinopsis' => $request->sinopsis,
            'duracion' => $request->duracion,
            'clasificacion' => $request->clasificacion,
            'productora' => $request->productora,
            'imagen' => $imagenUrl
        ]);

        return response()->json($pelicula, 201);
    }

    public function update(Request $request, $id)
    {
        $pelicula = Pelicula::find($id);
        if (!$pelicula) {
            return response()->json(['message' => 'Pelicula no encontrada'], 404);
        }

        $request->validate([
            'titulo' => 'nullable|string|max:255',
            'id_director' => 'nullable|integer',
            'sinopsis' => 'nullable|string',
            'duracion' => 'nullable|integer',
            'clasificacion' => 'nullable|string|max:50',
            'productora' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            if ($pelicula->imagen) {
                Storage::delete(str_replace('/storage/', 'public/', $pelicula->imagen));
            }
            
            $imagenPath = $request->file('imagen')->store('public/imagenes');
            $pelicula->imagen = Storage::url($imagenPath);
        }

        $pelicula->update($request->except('imagen'));
        $pelicula->save();

        return response()->json($pelicula);
    }

    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        if ($pelicula) {
            if ($pelicula->imagen) {
                Storage::delete(str_replace('/storage/', 'public/', $pelicula->imagen));
            }

            $pelicula->delete();
            return response()->json(['message' => 'Pelicula eliminada']);
        }
        return response()->json(['message' => 'Pelicula no encontrada'], 404);
    }
}

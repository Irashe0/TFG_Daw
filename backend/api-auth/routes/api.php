<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\CineController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\VentaController;

// Rutas públicas
Route::post('/registro', [AuthController::class, 'registro']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Rutas protegidas
Route::middleware(['auth:sanctum'])->group(function () {

    Route::middleware(['role:admin'])->group(function () {
        Route::apiResource('usuarios', UsuarioController::class);
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('facturas', FacturaController::class);
        Route::apiResource('ventas', VentaController::class);

        Route::post('salas', [SalaController::class, 'store']);
        Route::post('horarios', [HorarioController::class, 'store']);
        Route::post('cines', [CineController::class, 'store']);
        Route::post('peliculas', [PeliculaController::class, 'store']);

        Route::get('/admin/dashboard', function () {
            return 'Panel de administración';
        });
    });

    Route::middleware(['role:editor'])->group(function () {
        Route::put('peliculas/{pelicula}', [PeliculaController::class, 'update']);
        Route::put('horarios/{horario}', [HorarioController::class, 'update']);
    });

    Route::apiResource('directores', DirectorController::class);
    Route::apiResource('reservas', ReservaController::class);
    Route::apiResource('notificaciones', NotificacionController::class);
    Route::apiResource('salas', SalaController::class)->except(['store']);
    Route::apiResource('horarios', HorarioController::class)->except(['store']);
    Route::apiResource('cines', CineController::class)->except(['store']);
    Route::apiResource('peliculas', PeliculaController::class)->except(['store', 'update']);

    Route::any('palomitas', function () {
        return response()->json(['message' => 'Acceso denegado'], 403);
    });
});
